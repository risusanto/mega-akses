                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Jadwal Maintenance
                        <small>Jadwal maintenance anda</small>
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
                                                <th>Brandwith</th>
                                                <th>ISP</th>
                                                <th>Jadwal</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($jadwal as $row): ?>
                                            <?php if ($row->kd_pelanggan == $profile->kd_pelanggan): ?>
                                              <tr>
                                                <td><?=$row->kd_maintenance?></td>
                                                <td><?=$row->brandwith?></td>
                                                <td><?=$row->isp?></td>
                                                <td><?=$row->tgl_maintenance?></td>
                                                <td><?=$row->status_maintenance?></td>
                                              </tr>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Kode</th>
                                              <th>Brandwith</th>
                                              <th>ISP</th>
                                              <th>Jadwal</th>
                                              <th>Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
