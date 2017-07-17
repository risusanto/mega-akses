                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Jadwal Maintenance
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Jadwal</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Pelanggan</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Brandwith</th>
                                                <th>ISP</th>
                                                <th>Jadwal</th>
                                                <th>Opsi</th>
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
                                                <td>
                                                  <?php if ($row->status_maintenance == 'dalam proses'): ?>
                                                    <button type="button" class="btn btn-success" onclick="selesai(<?=$row->kd_maintenance?>)">Selesai</button>
                                                    <?php else: ?>
                                                      <?=$row->status_maintenance?>
                                                  <?php endif; ?>
                                                </td>
                                              </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Kode</th>
                                              <th>Pelanggan</th>
                                              <th>Alamat</th>
                                              <th>Telepon</th>
                                              <th>Brandwith</th>
                                              <th>ISP</th>
                                              <th>Jadwal</th>
                                              <th>Opsi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->

              <script type="text/javascript">

                      function selesai(id) {
                          swal({
                          title: "Konfirmasi",
                          text: "Maintenance telah selesai?",
                          type: "info",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "Selesai",
                          cancelButtonText: "Belum",
                          closeOnConfirm: true,
                          closeOnCancel: true
                          },
                          function(isConfirm){
                          if (isConfirm) {
                              $.ajax({
                                  url: '<?= base_url('leader/jadwal-maintenance') ?>',
                                  type: 'POST',
                                  data: {
                                      selesai: true,
                                      id: id
                                  },
                                  success: function() {
                                      window.location = '<?= base_url('leader/jadwal-maintenance') ?>';
                                  }
                              });
                          }
                          });
                      }

                  </script>
