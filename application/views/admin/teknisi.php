                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Teknisi
                        <small>Anda dapat menambahkan, mengedit, dan menghapus data teknisi</small>
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Teknisi <button type="button" class="btn" data-toggle="modal" data-target="#add">Add</button></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($teknisi as $row): ?>
                                            <tr>
                                                <td><?=$row->kd_teknisi?></td>
                                                <td><?=$row->nama_teknisi?></td>
                                                <td><?=$row->tempat_lahir?></td>
                                                <td><?=$row->tanggal_lahir?></td>
                                                <td><?=$row->alamat?></td>
                                                <td><?=$row->telp?></td>
                                                <td>
                                                  <button type="button" class="btn btn-primary fa fa-edit" data-toggle="modal" data-target="#edit" onclick="get(<?=$row->kd_teknisi?>)"></button>
                                                  <button type="button" class="btn btn-danger fa fa-trash-o" onclick="deleteData(<?=$row->kd_teknisi?>)"></button>
                                                </td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Kode</th>
                                              <th>Nama</th>
                                              <th>Tempat Lahir</th>
                                              <th>Tanggal Lahir</th>
                                              <th>Alamat</th>
                                              <th>Telepon</th>
                                              <th>OPSI</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->

                <div class="modal fade" id="add" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Tambah Teknisi</h4>
                        </div>
                        <div class="modal-body">
                          <?=form_open('admin/data-teknisi')?>
                              <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Nama</label>
                                <input type="text" name="nama" class="form-control">
                              </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Tempat Lahir</label>
                                  <input type="text" name="tempat_lahir" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Tanggal Lahir</label>
                                  <input type="date" name="tanggal_lahir" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Telepon</label>
                                  <input type="number" name="telepon" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Alamat</label>
                                  <textarea name="alamat" class="form-control" rows="3" cols="80"></textarea>
                                </div>
                              </div>
                              <!-- /.box-body -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                          <input type="submit" name ="add" class="btn btn-primary" value="Simpan">
                        <?=form_close()?>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
              </div>

              <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Teknisi</h4>
                      </div>
                      <div class="modal-body">
                        <?=form_open('admin/data-teknisi')?>
                            <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama</label>
                              <input type="text" name="nama" id="edit_nama" class="form-control">
                            </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="edit_tempat_lahir" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="edit_tanggal_lahir" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Telepon</label>
                                <input type="number" name="telepon" id="edit_telepon" class="form-control">
                              </div>
                              <input type="hidden" name="kd_teknisi" id="edit_kd">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label>
                                <textarea name="alamat" id="edit_alamat" class="form-control" rows="3" cols="80"></textarea>
                              </div>
                            </div>
                            <!-- /.box-body -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <input type="submit" name ="edit" class="btn btn-primary" value="Simpan">
                      <?=form_close()?>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
            </div>


              <script type="text/javascript">

                      function get(id) {
                          $.ajax({
                              url: '<?= base_url('admin/data-teknisi') ?>',
                              type: 'POST',
                              data: {
                                  id: id,
                                  get: true
                              },
                              success: function(response) {
                                  response = JSON.parse(response);
                                  $('#edit_nama').val(response.nama_teknisi);
                                  $('#edit_tanggal_lahir').val(response.tanggal_lahir);
                                  $('#edit_tempat_lahir').val(response.tempat_lahir);
                                  $('#edit_alamat').val(response.alamat);
                                  $('#edit_telepon').val(response.telp);
                                  $('#edit_kd').val(response.kd_teknisi);
                              }
                          });
                      }

                      function deleteData(id) {
                          swal({
                          title: "Hapus?",
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
                                  url: '<?= base_url('admin/data-teknisi') ?>',
                                  type: 'POST',
                                  data: {
                                      delete: true,
                                      id: id
                                  },
                                  success: function() {
                                      window.location = '<?= base_url('admin/data-teknisi') ?>';
                                  }
                              });
                          }
                          });
                      }

                  </script>
