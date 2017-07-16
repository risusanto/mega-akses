                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Pelanggan
                        <small>Anda dapat menambahkan, mengedit, dan menghapus data pelanggan</small>
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Pelanggan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th>Brandwith</th>
                                                <th>ISP</th>
                                                <th>OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($pelanggan as $row): ?>
                                            <tr>
                                                <td><?=$row->kd_pelanggan?></td>
                                                <td><?=$row->nama_pelanggan?></td>
                                                <td><?=$row->alamat?></td>
                                                <td><?=$row->email?></td>
                                                <td><?=$row->no_telp?></td>
                                                <td><?=$row->brandwith?></td>
                                                <td><?=$row->isp?></td>
                                                <td>
                                                  <button type="button" class="btn btn-primary fa fa-edit" data-toggle="modal" data-target="#edit" onclick="get(<?=$row->kd_pelanggan?>)"></button>
                                                  <button type="button" class="btn btn-danger fa fa-trash-o" onclick="deleteData(<?=$row->kd_pelanggan?>)"></button>
                                                </td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Kode</th>
                                              <th>Nama</th>
                                              <th>Alamat</th>
                                              <th>Email</th>
                                              <th>Telepon</th>
                                              <th>Brandwith</th>
                                              <th>ISP</th>
                                              <th>OPSI</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->

                <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Teknisi</h4>
                        </div>
                        <div class="modal-body">
                          <?=form_open('admin/data-pelanggan')?>
                              <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Nama</label>
                                <input type="text" name="nama" id="edit_nama" class="form-control">
                              </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Telepon</label>
                                  <input type="number" name="telepon" id="edit_telepon" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Email</label>
                                  <input type="text" name="email" id="edit_email" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Brandwith</label>
                                  <input type="text" name="brandwith" id="edit_brandwith" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">ISP</label>
                                  <input type="text" name="isp" id="edit_isp" class="form-control">
                                </div>
                                <input type="hidden" name="kd_pelanggan" id="edit_id">
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
                                url: '<?= base_url('admin/data-pelanggan') ?>',
                                type: 'POST',
                                data: {
                                    id: id,
                                    get: true
                                },
                                success: function(response) {
                                    response = JSON.parse(response);
                                    $('#edit_nama').val(response.nama_pelanggan);
                                    $('#edit_alamat').val(response.alamat);
                                    $('#edit_email').val(response.email);
                                    $('#edit_telepon').val(response.no_telp);
                                    $('#edit_brandwith').val(response.brandwith);
                                    $('#edit_isp').val(response.isp);
                                    $('#edit_id').val(response.kd_pelanggan);
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
                                    url: '<?= base_url('admin/data-pelanggan') ?>',
                                    type: 'POST',
                                    data: {
                                        delete: true,
                                        id: id
                                    },
                                    success: function() {
                                        window.location = '<?= base_url('admin/data-pelanggan') ?>';
                                    }
                                });
                            }
                            });
                        }

                    </script>
