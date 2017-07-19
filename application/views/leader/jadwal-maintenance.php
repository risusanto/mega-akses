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
                                                <th>Teknisi</th>
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
                                                <td><?=$this->teknisi_m->get_row(['kd_teknisi' => $row->kd_teknisi])->nama_teknisi?></td>
                                                <td>
                                                  <?php if ($row->status_maintenance == 'dalam proses'): ?>
                                                    <button type="button" class="btn btn-primary" onclick="selesai(<?=$row->kd_maintenance?>)">Selesai</button>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#atur" onclick="atur_jadwal(<?=$row->kd_maintenance?>)">Ganti Jadwal</button>
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
                                              <th>Teknisi</th>
                                              <th>Opsi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->

                <div class="modal fade" id="atur" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Atur Jadwal</h4>
                        </div>
                        <?=form_open('leader/jadwal-maintenance')?>
                        <div class="modal-body">
                              <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Maintenance</label>
                                <input type="date" name="tgl_maintenance" id="tgl" class="form-control">
                              </div>
                              <input type="hidden" name="kd_maintenance" id="id" value="">
                              </div>
                              <!-- /.box-body -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                          <input type="submit" name ="atur" class="btn btn-primary" value="Simpan">
                        <?=form_close()?>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
              </div>

              <script type="text/javascript">

                        function atur_jadwal(id) {
                            $.ajax({
                                url: '<?= base_url('leader/jadwal-maintenance') ?>',
                                type: 'POST',
                                data: {
                                    id: id,
                                    get: true
                                },
                                success: function(response) {
                                    response = JSON.parse(response);
                                    $('#id').val(response.kd_maintenance);
                                    $('#tgl').val(response.tgl_maintenance);
                                }
                            });
                        }

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
