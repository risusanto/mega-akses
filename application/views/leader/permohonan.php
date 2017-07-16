                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Permohonan
                        <small>Anda dapat menambahkan, mengedit, dan menghapus data permohonan</small>
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Permohonan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Pemohon</th>
                                                <th>Tanggal Request</th>
                                                <th>Status</th>
                                                <th>Survey</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($permohonan as $row): ?>
                                            <?php if ($row->status != 'disetujui'): ?>
                                              <?php $pelanggan = $this->pelanggan_m->get_row(['kd_pelanggan' => $row->pemohon]) ?>
                                            <tr>
                                                <td><?=$row->kd_permohonan?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pemohon" onclick="get_pemohon(<?=$row->pemohon?>)"><?=$pelanggan->nama_pelanggan?></button>
                                                </td>
                                                <td><?=$row->tgl_request?></td>
                                                <td><?=$row->status?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#survey" onclick="get_survey(<?=$row->kd_permohonan?>)">Isi</button>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Kode</th>
                                              <th>Pemohon</th>
                                              <th>Tanggal Request</th>
                                              <th>Status</th>
                                              <th>Survey</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->

              <div class="modal fade" id="pemohon" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Detail Pemohon</h4>
                      </div>
                      <div class="modal-body">
                            <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama</label>
                              <input type="text" name="nama" id="detail_nama" class="form-control">
                            </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" name="email" id="detail_email" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Telepon</label>
                                <input type="number" name="telepon" id="detail_telepon" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Brandwith</label>
                                <input type="text" name="brandwith" id="detail_brandwith" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">ISP</label>
                                <input type="text" name="isp" id="detail_isp" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label>
                                <input type="text" id="detail_alamat" class="form-control">
                              </div>
                            </div>
                            <!-- /.box-body -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="survey" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Isi Survey</h4>
                    </div>
                    <div class="modal-body">
                      <?=form_open('leader/data-permohonan')?>
                          <div class="box-body">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Jarak Spilter</label>
                            <input type="text" id="survey_jarak" name="jarak_spilter" class="form-control">
                          </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Keterangan</label>
                              <input type="text" id="survey_keterangan" name="keterangan" class="form-control">
                            </div>
                            <input type="hidden" id="kd_survey" name="id" value="">
                            <input type="hidden" name="permohonan" id="permohonan" value="">
                          <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                      <input type="submit" name ="edit_survey" class="btn btn-primary" value="Simpan">
                    <?=form_close()?>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
          </div>

              <script type="text/javascript">

                      function get_pemohon(id) {
                          $.ajax({
                              url: '<?= base_url('leader/data-permohonan') ?>',
                              type: 'POST',
                              data: {
                                  id: id,
                                  get: true
                              },
                              success: function(response) {
                                  response = JSON.parse(response);
                                  $('#detail_nama').val(response.nama_pelanggan);
                                  $('#detail_alamat').val(response.alamat);
                                  $('#detail_email').val(response.email);
                                  $('#detail_telepon').val(response.no_telp);
                                  $('#detail_brandwith').val(response.brandwith);
                                  $('#detail_isp').val(response.isp);
                              }
                          });
                      }

                      function get_survey(id) {
                          $.ajax({
                              url: '<?= base_url('leader/data-permohonan') ?>',
                              type: 'POST',
                              data: {
                                  id: id,
                                  survey: true
                              },
                              success: function(response) {
                                  response = JSON.parse(response);
                                  $('#survey_jarak').val(response.jarak_spilter);
                                  $('#survey_keterangan').val(response.keterangan);
                                  $('#kd_survey').val(response.kd_survey);
                                  $('#permohonan').val(response.kd_permohonan);
                              }
                          });
                      }

                      function tolak(id) {
                          swal({
                          title: "Tolak Permohonan",
                          text:"Data akan dihapus, dan tidak dapat dikembalikan, yakin ingin melanjutkan?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "Ya",
                          cancelButtonText: "Tidak",
                          closeOnConfirm: true,
                          closeOnCancel: true
                          },
                          function(isConfirm){
                          if (isConfirm) {
                              $.ajax({
                                  url: '<?= base_url('admin/data-permohonan') ?>',
                                  type: 'POST',
                                  data: {
                                      tolak: true,
                                      id: id
                                  },
                                  success: function() {
                                      window.location = '<?= base_url('admin/data-permohonan') ?>';
                                  }
                              });
                          }
                          });
                      }

                      function setujui(id) {
                          swal({
                          title: "Setujui Permohonan?",
                          type: "info",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "Ya",
                          cancelButtonText: "Tidak",
                          closeOnConfirm: true,
                          closeOnCancel: true
                          },
                          function(isConfirm){
                          if (isConfirm) {
                              $.ajax({
                                  url: '<?= base_url('admin/data-permohonan') ?>',
                                  type: 'POST',
                                  data: {
                                      setujui: true,
                                      id: id
                                  },
                                  success: function() {
                                      window.location = '<?= base_url('admin/data-permohonan') ?>';
                                  }
                              });
                          }
                          });
                      }

                  </script>
