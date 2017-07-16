                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Atur Jadwal Maintenance
                        <small>Atur jadwal maintenance berdasarkan aduan gangguan oleh pelanggan</small>
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Maintenance</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Telepon</th>
                                                <th>Alamat</th>
                                                <th>Gangguan</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($gangguan as $row): ?>
                                            <?php if ($this->gangguan_m->get_row(['kd_gangguan' => $row->kd_gangguan])->status != 1 ): ?>
                                            <tr>
                                              <td><?=$row->kd_gangguan?></td>
                                              <td><?=$row->nama_pelanggan?></td>
                                              <td><?=$row->no_telp?></td>
                                              <td><?=$row->alamat?></td>
                                              <td><?=$row->gangguan?></td>
                                              <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#atur" onclick="atur_jadwal(<?=$row->kd_gangguan?>)">Atur Jadwal</button>
                                              </td>
                                            </tr>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Kode</th>
                                              <th>Nama</th>
                                              <th>Telepon</th>
                                              <th>Alamat</th>
                                              <th>Gangguan</th>
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
                      <?=form_open('leader/atur-jadwal-maintenance')?>
                      <div class="modal-body">
                            <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Tanggal Instalasi</label>
                              <input type="date" name="tgl_maintenance" class="form-control">
                            </div>
                            <input type="hidden" name="kd_pelanggan" id="id" value="">
                            <input type="hidden" name="kd_gangguan" id='kd' value="">
                            </div>
                            <!-- /.box-body -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <input type="submit" name ="atur_maintenance" class="btn btn-primary" value="Simpan">
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
                              url: '<?= base_url('leader/atur-jadwal-maintenance') ?>',
                              type: 'POST',
                              data: {
                                  id: id,
                                  get: true
                              },
                              success: function(response) {
                                  response = JSON.parse(response);
                                  $('#id').val(response.kd_pelanggan);
                                  $('#kd').val(response.kd_gangguan);
                              }
                          });
                      }

                  </script>
