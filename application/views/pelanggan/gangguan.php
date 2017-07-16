                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Gangguan
                        <small>Anda dapat melaporkan gangguan yang anda alami</small>
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Gangguan <button type="button" class="btn" data-toggle="modal" data-target="#add">Add</button></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Tanggal</th>
                                                <th>Gangguan</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($gangguan as $row): ?>
                                            <?php if ($row->status != 1): ?>
                                              <tr>
                                                  <td><?=$row->kd_gangguan?></td>
                                                  <td><?=$row->tanggal_gangguan?></td>
                                                  <td><?=$row->gangguan?></td>
                                                  <td>
                                                    <button type="button" class="btn btn-primary fa fa-edit" data-toggle="modal" data-target="#edit" onclick="get(<?=$row->kd_gangguan?>)"></button>
                                                    <button type="button" class="btn btn-danger fa fa-trash-o" onclick="deleteData(<?=$row->kd_gangguan?>)"></button>
                                                  </td>
                                              </tr>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Kode</th>
                                              <th>Tanggal</th>
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

                <div class="modal fade" id="add" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Tambah Teknisi</h4>
                        </div>
                        <div class="modal-body">
                          <?=form_open('pelanggan/laporkan-gangguan')?>
                              <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi Singkat Gangguan</label>
                                <input type="text" name="gangguan" class="form-control">
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
                        <h4 class="modal-title">Edit Gangguan</h4>
                      </div>
                      <div class="modal-body">
                        <?=form_open('pelanggan/laporkan-gangguan')?>
                            <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi Singkat Gangguan</label>
                                <input type="text" name="gangguan" id="edit_gangguan" class="form-control">
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
                              url: '<?= base_url('pelanggan/laporkan-gangguan') ?>',
                              type: 'POST',
                              data: {
                                  id: id,
                                  get: true
                              },
                              success: function(response) {
                                  response = JSON.parse(response);
                                  $('#id').val(response.kd_gangguan);
                                  $('#edit_gangguan').val(response.gangguan);
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
                                  url: '<?= base_url('pelanggan/laporkan-gangguan') ?>',
                                  type: 'POST',
                                  data: {
                                      delete: true,
                                      id: id
                                  },
                                  success: function() {
                                      window.location = '<?= base_url('pelanggan/laporkan-gangguan') ?>';
                                  }
                              });
                          }
                          });
                      }

                  </script>
