                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Data Permohonan
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
                                                <th>Tanggal Request</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($permohonan as $row): ?>
                                            <?php $pelanggan = $this->pelanggan_m->get_row(['kd_pelanggan' => $row->pemohon]); ?>
                                              <tr>
                                                <td><?=$row->kd_permohonan?></td>
                                                <td><?=$pelanggan->nama_pelanggan?></td>
                                                <td><?=$pelanggan->alamat?></td>
                                                <td><?=$pelanggan->no_telp?></td>
                                                <td><?=$pelanggan->brandwith?></td>
                                                <td><?=$pelanggan->isp?></td>
                                                <td><?=$row->tgl_request?></td>
                                                <td><?=$row->status?></td>
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
                                              <th>Tanggal Request</th>
                                              <th>Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
