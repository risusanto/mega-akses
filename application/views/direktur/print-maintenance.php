<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
  <!-- font Awesome -->
  <link href="<?=base_url('assets/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="<?=base_url('assets/css/ionicons.min.css')?>" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="<?=base_url('assets/css/AdminLTE.css')?>" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> PT Mega Akses Persada.
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
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
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
