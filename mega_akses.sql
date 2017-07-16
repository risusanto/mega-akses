-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 16 Jul 2017 pada 17.15
-- Versi Server: 5.7.17-log
-- PHP Version: 7.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt_mega_akses`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `kd_barangkeluar` bigint(20) NOT NULL,
  `tanggal_keluar` varchar(20) DEFAULT NULL,
  `nama_barang` text,
  `keperluan` text,
  `kd_pelanggan` bigint(20) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kd_barangmasuk` bigint(20) NOT NULL,
  `tanggal_masuk` varchar(20) DEFAULT NULL,
  `nama_barang` text,
  `stok` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`kd_barangmasuk`, `tanggal_masuk`, `nama_barang`, `stok`) VALUES
(1, '2017-07-10', 'Modem Huawei Z09', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gangguan`
--

CREATE TABLE `gangguan` (
  `kd_gangguan` bigint(20) NOT NULL,
  `kd_pelanggan` bigint(20) DEFAULT NULL,
  `tanggal_gangguan` varchar(20) DEFAULT NULL,
  `gangguan` text,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gangguan`
--

INSERT INTO `gangguan` (`kd_gangguan`, `kd_pelanggan`, `tanggal_gangguan`, `gangguan`, `status`) VALUES
(1, 3, '2017-07-16', 'macet modemnyo wak', 1),
(2, 3, '2017-07-16', 'Modemnyo panas nian wak', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `instalasi`
--

CREATE TABLE `instalasi` (
  `kd_instalasi` bigint(20) NOT NULL,
  `kd_pelanggan` bigint(20) DEFAULT NULL,
  `tgl_request` varchar(20) DEFAULT NULL,
  `tgl_instalasi` varchar(20) DEFAULT '-',
  `status_instalasi` varchar(20) DEFAULT NULL,
  `kd_teknisi` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `instalasi`
--

INSERT INTO `instalasi` (`kd_instalasi`, `kd_pelanggan`, `tgl_request`, `tgl_instalasi`, `status_instalasi`, `kd_teknisi`) VALUES
(1, 3, '2017-07-16', '2017-07-18', 'selesai', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintenance`
--

CREATE TABLE `maintenance` (
  `kd_maintenance` bigint(20) NOT NULL,
  `kd_pelanggan` bigint(20) DEFAULT NULL,
  `tgl_maintenance` varchar(20) DEFAULT '-',
  `tgl_selesai` varchar(20) DEFAULT '-',
  `status_maintenance` varchar(20) DEFAULT 'dalam proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `maintenance`
--

INSERT INTO `maintenance` (`kd_maintenance`, `kd_pelanggan`, `tgl_maintenance`, `tgl_selesai`, `status_maintenance`) VALUES
(2, 3, '2017-07-20', '2017-07-16', 'selesai'),
(3, 3, '2017-07-20', '2017-07-16', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_pelanggan` bigint(20) NOT NULL,
  `nama_pelanggan` varchar(64) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `brandwith` varchar(64) DEFAULT NULL,
  `isp` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama_pelanggan`, `alamat`, `no_telp`, `email`, `brandwith`, `isp`, `status`) VALUES
(3, 'Ari Susanto', 'kskaksaksasa', '08932323', 'risusanto@outlook.com', '4GB', 'MDP', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan`
--

CREATE TABLE `permohonan` (
  `kd_permohonan` bigint(20) NOT NULL,
  `pemohon` bigint(20) DEFAULT NULL,
  `tgl_request` varchar(20) DEFAULT NULL,
  `status` varchar(36) DEFAULT 'menunggu survey'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`kd_permohonan`, `pemohon`, `tgl_request`, `status`) VALUES
(3, 3, '16/07/2017', 'disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` tinyint(4) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'tim_leader'),
(3, 'pelanggan'),
(4, 'direktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey`
--

CREATE TABLE `survey` (
  `kd_survey` bigint(20) NOT NULL,
  `pelanggan` bigint(20) DEFAULT NULL,
  `jarak_spilter` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `kd_permohonan` bigint(20) DEFAULT NULL,
  `status` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `survey`
--

INSERT INTO `survey` (`kd_survey`, `pelanggan`, `jarak_spilter`, `keterangan`, `kd_permohonan`, `status`) VALUES
(3, 3, '49 KM', 'Layak', 3, 'survey telah dilaksanakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `kd_teknisi` tinyint(4) NOT NULL,
  `nama_teknisi` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` varchar(20) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`kd_teknisi`, `nama_teknisi`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telp`) VALUES
(2, 'Ari Susanto', 'Palembang', '1996-06-01', 'Jl. Patra Tani Kec Indralaya Utara Kab. Ogan Ilir Sumsel 60223', '082280940093');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_role` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `id_role`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('leader', 'c444858e0aaeb727da73d2eae62321ad', 2),
('risusanto@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`kd_barangkeluar`),
  ADD KEY `pelanggan_fk` (`kd_pelanggan`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kd_barangmasuk`);

--
-- Indexes for table `gangguan`
--
ALTER TABLE `gangguan`
  ADD PRIMARY KEY (`kd_gangguan`),
  ADD KEY `fk_kd_pelanggan` (`kd_pelanggan`);

--
-- Indexes for table `instalasi`
--
ALTER TABLE `instalasi`
  ADD PRIMARY KEY (`kd_instalasi`),
  ADD KEY `fk_kdpelanggan` (`kd_pelanggan`),
  ADD KEY `fk_teknisi` (`kd_teknisi`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`kd_maintenance`),
  ADD KEY `fk_kd_pelanggan2` (`kd_pelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`),
  ADD KEY `fk_email` (`email`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`kd_permohonan`),
  ADD KEY `fk_pemohon` (`pemohon`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`kd_survey`),
  ADD KEY `fk_pelanggan` (`pelanggan`),
  ADD KEY `fk_permohonan` (`kd_permohonan`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`kd_teknisi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `kd_barangkeluar` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `kd_barangmasuk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gangguan`
--
ALTER TABLE `gangguan`
  MODIFY `kd_gangguan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `instalasi`
--
ALTER TABLE `instalasi`
  MODIFY `kd_instalasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `kd_maintenance` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `kd_pelanggan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `kd_permohonan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `kd_survey` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `kd_teknisi` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `pelanggan_fk` FOREIGN KEY (`kd_pelanggan`) REFERENCES `pelanggan` (`kd_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gangguan`
--
ALTER TABLE `gangguan`
  ADD CONSTRAINT `fk_kd_pelanggan` FOREIGN KEY (`kd_pelanggan`) REFERENCES `pelanggan` (`kd_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `instalasi`
--
ALTER TABLE `instalasi`
  ADD CONSTRAINT `fk_kdpelanggan` FOREIGN KEY (`kd_pelanggan`) REFERENCES `pelanggan` (`kd_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teknisi` FOREIGN KEY (`kd_teknisi`) REFERENCES `teknisi` (`kd_teknisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `fk_kd_pelanggan2` FOREIGN KEY (`kd_pelanggan`) REFERENCES `pelanggan` (`kd_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `fk_pemohon` FOREIGN KEY (`pemohon`) REFERENCES `pelanggan` (`kd_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`pelanggan`) REFERENCES `pelanggan` (`kd_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_permohonan` FOREIGN KEY (`kd_permohonan`) REFERENCES `permohonan` (`kd_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
