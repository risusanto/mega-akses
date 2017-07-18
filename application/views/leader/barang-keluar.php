                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Barang Keluar
                        <small>Anda dapat menambahkan, mengedit, dan menghapus barang keluar</small>
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Barang Keluar <button type="button" class="btn" data-toggle="modal" data-target="#add">Add</button></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Sisa stok</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($barang as $row): ?>
                                            <tr>
                                                <td><?=$row->kd_barangmasuk?></td>
                                                <td><?=$row->tanggal_masuk?></td>
                                                <td><?=$row->nama_barang?></td>
                                                <td><?=$row->jumlah?></td>
                                                <td><?=$row->stok?></td>
                                                <td>
                                                  <button type="button" class="btn btn-danger fa fa-trash-o" onclick="deleteData(<?=$row->kd_barangkeluar?>)"></button>
                                                </td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Kode</th>
                                              <th>Tanggal Masuk</th>
                                              <th>Nama Barang</th>
                                              <th>Jumlah</th>
                                              <th>Sisa Stok</th>
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
                          <h4 class="modal-title">Barang Keluar</h4>
                        </div>
                        <div class="modal-body">
                          <?=form_open('leader/barang-keluar')?>
                              <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Barang</label>
                                <select class="form-control" name="barang">
                                  <option value="">- Pilih dari daftar -</option>
                                  <?php foreach ($barang_masuk as $row): ?>
                                    <option value="<?=$row->kd_barangmasuk?>"><?=$row->nama_barang?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Tanggal Keluar</label>
                                  <input type="date" name="tanggal" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Jumlah</label>
                                  <input type="number" name="jumlah" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Keperluan</label>
                                  <textarea name="keperluan" rows="8" class="form-control" cols="80"></textarea>
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


              <script type="text/javascript">

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
                                  url: '<?= base_url('leader/barang-keluar') ?>',
                                  type: 'POST',
                                  data: {
                                      delete: true,
                                      id: id
                                  },
                                  success: function() {
                                      window.location = '<?= base_url('leader/barang-keluar') ?>';
                                  }
                              });
                          }
                          });
                      }

                  </script>
