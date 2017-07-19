                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Atur Jadwal Instalasi
                        <small>Atur jadwal instalasi pada pelanggan yang telah disetujui</small>
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Pelanggan Baru</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Telepon</th>
                                                <th>Alamat</th>
                                                <th>Brandwith</th>
                                                <th>ISP</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($pelanggan as $row): ?>
                                            <?php $cek = $this->instalasi_m->get_row(['kd_pelanggan' => $row->kd_pelanggan]);?>
                                            <?php if ($row->status == 1 || $row->status == 2): ?>
                                            <tr>
                                              <td><?=$row->kd_pelanggan?></td>
                                              <td><?=$row->nama_pelanggan?></td>
                                              <td><?=$row->no_telp?></td>
                                              <td><?=$row->alamat?></td>
                                              <td><?=$row->brandwith?></td>
                                              <td><?=$row->isp?></td>
                                              <td>
                                                <?php if (!isset($cek)): ?>
                                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#atur" onclick="atur_jadwal(<?=$row->kd_pelanggan?>)">Atur Jadwal</button>
                                                  <?php else: ?>
                                                  Selesai
                                                <?php endif; ?>
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
                                              <th>Brandwith</th>
                                              <th>ISP</th>
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
                      <?=form_open('leader/atur-jadwal-instalasi')?>
                      <div class="modal-body">
                            <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Tanggal Instalasi</label>
                              <input type="date" name="tgl_instalasi" id="detail_nama" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Teknisi</label>
                              <select name="teknisi" class="form-control">
                                <?php foreach ($teknisi as $row): ?>
                                    <option value="">- Pilih Teknisi -</option>
                                    <option value="<?=$row->kd_teknisi?>"><?=$row->nama_teknisi?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <input type="hidden" name="kd_pelanggan" id="id" value="">
                            </div>
                            <!-- /.box-body -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <input type="submit" name ="atur_instalasi" class="btn btn-primary" value="Simpan">
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
                              url: '<?= base_url('leader/atur-jadwal-instalasi') ?>',
                              type: 'POST',
                              data: {
                                  id: id,
                                  get: true
                              },
                              success: function(response) {
                                  response = JSON.parse(response);
                                  $('#id').val(response.kd_pelanggan);
                              }
                          });
                      }

                  </script>
