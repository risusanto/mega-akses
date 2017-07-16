                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Barang Masuk
                        <small>Anda dapat menambahkan, mengedit, dan menghapus barang masuk</small>
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Barang Masuk <button type="button" class="btn" data-toggle="modal" data-target="#add">Add</button></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Nama Barang</th>
                                                <th>stok</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($barang as $row): ?>
                                            <tr>
                                                <td><?=$row->kd_barangmasuk?></td>
                                                <td><?=$row->tanggal_masuk?></td>
                                                <td><?=$row->nama_barang?></td>
                                                <td><?=$row->stok?></td>
                                                <td>
                                                  <button type="button" class="btn btn-primary fa fa-edit" data-toggle="modal" data-target="#edit" onclick="get(<?=$row->kd_barangmasuk?>)"></button>
                                                  <button type="button" class="btn btn-danger fa fa-trash-o" onclick="deleteData(<?=$row->kd_barangmasuk?>)"></button>
                                                </td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Kode</th>
                                              <th>Tanggal Masuk</th>
                                              <th>Nama Barang</th>
                                              <th>stok</th>
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
                          <?=form_open('admin/barang-masuk')?>
                              <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Nama Barang</label>
                                <input type="text" name="nama" class="form-control">
                              </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Tanggal Masuk</label>
                                  <input type="date" name="tanggal_masuk" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Stok</label>
                                  <input type="number" name="stok" class="form-control">
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
                        <?=form_open('admin/barang-masuk')?>
                            <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Nama Barang</label>
                                <input type="text" name="nama" id="edit_nama" class="form-control">
                              </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Tanggal Masuk</label>
                                  <input type="date" name="tanggal_masuk" id="edit_tanggal_masuk" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Stok</label>
                                  <input type="number" name="stok" id="edit_stok" class="form-control">
                                </div>
                                <input type="hidden" name="id" id="id" value="">
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
                              url: '<?= base_url('admin/barang-masuk') ?>',
                              type: 'POST',
                              data: {
                                  id: id,
                                  get: true
                              },
                              success: function(response) {
                                  response = JSON.parse(response);
                                  $('#edit_nama').val(response.nama_barang);
                                  $('#edit_tanggal_masuk').val(response.tanggal_masuk);
                                  $('#edit_stok').val(response.stok);
                                  $('#id').val(response.kd_barangmasuk);
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
                                  url: '<?= base_url('admin/barang-masuk') ?>',
                                  type: 'POST',
                                  data: {
                                      delete: true,
                                      id: id
                                  },
                                  success: function() {
                                      window.location = '<?= base_url('admin/barang-masuk') ?>';
                                  }
                              });
                          }
                          });
                      }

                  </script>
