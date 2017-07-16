<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Admin extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->data['username'] = $this->session->userdata('username');
    $this->data['id_role'] = $this->session->userdata('id_role');
    if (!isset($this->data['id_role']) || $this->data['id_role'] != 1) {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('id_role');
			$this->flashmsg('Anda harus login terlebih dahulu!', 'warning');
      redirect('login');
      exit;
    }
    $this->load->model('user_m');
  }

  public function index()
  {
    $this->data['title'] = 'Dashboard'.$this->title;
    $this->data['content'] = 'admin/dashboard';

    $this->template($this->data,'admin');
  }

  public function data_pelanggan()
  {
    $this->load->model('pelanggan_m');

    if ($this->POST('get') && $this->POST('id')) {
				$data = $this->pelanggan_m->get_row(['kd_pelanggan' => $this->POST('id')]);
				echo json_encode($data);
				exit;
		}

    if ($this->POST('edit')) {
      $req = ['nama','isp','brandwith','email','alamat','telepon'];
      if (!$this->pelanggan_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('admin/data-permohonan');
        exit;
      }
      $data_pelanggan = [
        'nama_pelanggan' => $this->POST('nama'),
        'alamat' => $this->POST('alamat'),
        'no_telp' => $this->POST('telepon'),
        'email' => $this->POST('email'),
        'brandwith' => $this->POST('brandwith'),
        'isp' => $this->POST('isp')
      ];
      $this->pelanggan_m->update($this->POST('kd_pelanggan'),$data_pelanggan);
      $this->flashmsg('Berhasil disimpan!');
      redirect('admin/data-pelanggan');
      exit;
    }

    if ($this->POST('delete')) {
      $username = $this->pelanggan_m->get_row(['kd_pelanggan' => $this->POST('id')])->email;
      $this->user_m->delete($username);
      exit;
    }

    if ($this->POST('survey') && $this->POST('id')) {
        $this->load->model('survey_m');
				$data = $this->survey_m->get_row(['kd_permohonan' => $this->POST('id')]);
				echo json_encode($data);
				exit;
		}

    $this->data['pelanggan'] = $this->pelanggan_m->get();
    $this->data['title'] = 'Data Pelanggan'.$this->title;
    $this->data['content'] = 'admin/pelanggan';

    $this->template($this->data,'admin');
  }

  public function data_teknisi()
  {
    $this->load->model('teknisi_m');

    if ($this->POST('get') && $this->POST('id')) {
				$data = $this->teknisi_m->get_row(['kd_teknisi' => $this->POST('id')]);
				echo json_encode($data);
				exit;
		}

    if ($this->POST('edit')) {
      $req = ['nama','tanggal_lahir','tempat_lahir','alamat','telepon'];
      if (!$this->teknisi_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('admin/data-teknisi');
        exit;
      }
      $data_teknisi = [
        'nama_teknisi' => $this->POST('nama'),
        'tanggal_lahir' => $this->POST('tanggal_lahir'),
        'tempat_lahir' => $this->POST('tempat_lahir'),
        'alamat' => $this->POST('alamat'),
        'telp' => $this->POST('telepon')
      ];
      $this->teknisi_m->update($this->POST('kd_teknisi'),$data_teknisi);
      $this->flashmsg('Data berhasil disimpan!');
      redirect('admin/data-teknisi');
      exit;
    }

    if ($this->POST('delete') && $this->POST('id')) {
      $this->teknisi_m->delete($this->POST('id'));
      exit;
    }

    if ($this->POST('add')) {
      $req = ['nama','tanggal_lahir','tempat_lahir','alamat','telepon'];
      if (!$this->teknisi_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('admin/data-teknisi');
        exit;
      }
      $data_teknisi = [
        'nama_teknisi' => $this->POST('nama'),
        'tanggal_lahir' => $this->POST('tanggal_lahir'),
        'tempat_lahir' => $this->POST('tempat_lahir'),
        'alamat' => $this->POST('alamat'),
        'telp' => $this->POST('telepon')
      ];
      $this->teknisi_m->insert($data_teknisi);
      $this->flashmsg('Data berhasil disimpan!');
      redirect('admin/data-teknisi');
      exit;
    }

    $this->data['teknisi'] = $this->teknisi_m->get();
    $this->data['title'] = 'Data Teknisi'.$this->title;
    $this->data['content'] = 'admin/teknisi';

    $this->template($this->data,'admin');
  }

  public function data_permohonan()
  {
    $this->load->model('permohonan_m');
    $this->load->model('survey_m');
    $this->load->model('pelanggan_m');

    if ($this->POST('tolak')) {
      $username = $this->pelanggan_m->get_row(['kd_pelanggan' => $this->POST('id')])->email;
      $this->user_m->delete($username);
      exit;
    }

    if ($this->POST('setujui')) {
      $this->pelanggan_m->update($this->POST('id'), ['status' => 1]);
      $this->permohonan_m->update_where(['pemohon' => $this->POST('id')],['status' => 'disetujui']);
      exit;
    }

    if ($this->POST('add')) {
      $req = ['nama','isp','brandwith','email','alamat','telepon'];
      if (!$this->permohonan_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('admin/data-permohonan');
        exit;
      }
      $data_user = [
        'username' => $this->POST('email'),
        'password' => md5('123456'),
        'id_role' => 3
      ];
      $this->user_m->insert($data_user);
      $data_pelanggan = [
        'nama_pelanggan' => $this->POST('nama'),
        'alamat' => $this->POST('alamat'),
        'no_telp' => $this->POST('telepon'),
        'email' => $this->POST('email'),
        'brandwith' => $this->POST('brandwith'),
        'isp' => $this->POST('isp')
      ];
      $this->pelanggan_m->insert($data_pelanggan);
      $pelanggan = $this->db->insert_id();
      $data_permohonan = [
        'pemohon' => $pelanggan,
        'tgl_request' => date('d/m/Y'),
        'status' => 'menunggu proses survey'
      ];
      $this->permohonan_m->insert($data_permohonan);
      $data_survey = [
        'pelanggan' => $pelanggan,
        'kd_permohonan' => $this->db->insert_id()
      ];
      $this->survey_m->insert($data_survey);
      $this->flashmsg('Data berhasil disimpan!');
      redirect('admin/data-permohonan');
      exit;

    }

    $this->data['permohonan'] = $this->permohonan_m->get();
    $this->data['title'] = 'Data Permohonan'.$this->title;
    $this->data['content'] = 'admin/permohonan';

    $this->template($this->data,'admin');
  }

  public function barang_masuk()
  {
    $this->load->model('barang_masuk_m');

    if ($this->POST('get') && $this->POST('id')) {
				$data = $this->barang_masuk_m->get_row(['kd_barangmasuk' => $this->POST('id')]);
				echo json_encode($data);
				exit;
		}

    if ($this->POST('delete')) {
      $this->barang_masuk_m->delete($this->POST('id'));
      exit;
    }

    if ($this->POST('edit')) {
      $req = ['nama','tanggal_masuk','stok'];
      if (!$this->barang_masuk_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('admin/barang-masuk');
        exit;
      }
      $data_barang = [
        'nama_barang' => $this->POST('nama'),
        'tanggal_masuk' => $this->POST('tanggal_masuk'),
        'stok' => $this->POST('stok')
      ];
      $this->barang_masuk_m->update($this->POST('id'),$data_barang);
      $this->flashmsg('Data berhasil disimpan');
      redirect('admin/barang-masuk');
      exit;
    }

    if ($this->POST('add')) {
      $req = ['nama','tanggal_masuk','stok'];
      if (!$this->barang_masuk_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('admin/barang-masuk');
        exit;
      }
      $data_barang = [
        'nama_barang' => $this->POST('nama'),
        'tanggal_masuk' => $this->POST('tanggal_masuk'),
        'stok' => $this->POST('stok')
      ];
      $this->barang_masuk_m->insert($data_barang);
      $this->flashmsg('Data berhasil disimpan');
      redirect('admin/barang-masuk');
      exit;
    }

    $this->data['barang'] = $this->barang_masuk_m->get();
    $this->data['title'] = 'Data Barang Masuk'.$this->title;
    $this->data['content'] = 'admin/barang-masuk';

    $this->template($this->data,'admin');
  }
}
