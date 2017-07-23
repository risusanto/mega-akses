<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#bigWrapper{
            width: 100%;
        }
        .header{
            text-align: center;
            font-size: 26px;
            margin-bottom: 50px;
            border-bottom: 5px double black;
            padding-bottom: 15px;
        }

        #logoo{
            margin-top: -210px;
            width: 100px;
            height: 170px;
            margin-left: 5px;
            margin-right: 40px;
        }
        #logoo img{
            width: 130px;
            height: 80px;
        }
        .title{
            margin-left: 50px;
            margin-top: -190px;
        }
        .kontak{
            margin-top: 5px;
            font-size: 18px;
            text-align: center;
        }
        table,th,td{
            border: 1px solid black;
        }
        table {
            border-collapse: collapse;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2
        }
        tr:first-child{
            width: 40px;
        }
        th{
            background-color: #4CAF50;
            color: white;
            /*min-width: 100px;*/
        }
        td{
            padding: 2px;
            padding-left: 10px;
            text-align: center;
        }
	</style>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>">
</head>
<body onload="window.print();">
	<div id="bigWrapper">
		<div class="header">
			<div class="container">
				<img src="<?= base_url('assets/logo.jpeg') ?>">
			</div>
      <br><br><br><br><br><br>
			<div class="title">
				<div class="kontak">
					Jl. Angkatan 66 No. 1859, Pipa Jaya, Kemuning, Kota Palembang <br> Sumatera Selatan 30128
				</div>
			</div>
		</div>
		<div class="content" style="margin: 0 auto; width:100%;">
			<p style="margin-top: -30px; width: 100%; font-weight: bold; font-size: 22px; text-align: center; margin-bottom: 30px;">LAPORAN MAINTENANCE</p>
            <table style="width: 100%;">
		          <thead>
		          <tr>
		            <th>Kode</th>
		            <th>Pelanggan</th>
		            <th>Alamat</th>
		            <th>Telepon</th>
		            <th>Brandwith</th>
		            <th>ISP</th>
		            <th>Jadwal</th>
		            <th>Status</th>
		          </tr>
		          </thead>
		          <tbody>
		            <?php foreach ($jadwal as $row): ?>
		                <tr>
		                  <td><?=$row->kd_maintenance?></td>
		                  <td><?=$row->nama_pelanggan?></td>
		                  <td><?=$row->alamat?></td>
		                  <td><?=$row->no_telp?></td>
		                  <td><?=$row->brandwith?></td>
		                  <td><?=$row->isp?></td>
		                  <td><?=$row->tgl_maintenance?></td>
		                  <td><?=$row->status_maintenance?></td>
		                </tr>
		            <?php endforeach; ?>
		          </tbody>
			      </table>
            <br>
            <br>
            <br>
            <div style="text-align: center; margin-left: 60%; line-height: .1;">
                <p><strong>Tanda Tangan</strong></p>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <p><strong>Direktur</strong></p>
            </div>
		</div>
	</div>
</body>
</html>
