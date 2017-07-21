                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Laman Awal
                        <small>Selamat Datang</small>
                    </h1>
                </section>
                <?php
                    $permohonan = $this->permohonan_m->get_num_row(['status' => 'survey telah dilaksanakan']);
                 ?>
                <!-- Main content -->
                <section class="content">
                  <?php if ($permohonan > 0): ?>
                    <div class="callout callout-warning">
                      <h4>Terdapat <?=$permohonan?> Telah dilakukan</h4>

                      <p>Silahkan konfirmasi persetujuan instalasi <a href="<?=base_url('admin/data-permohonan')?>">disini</a>.</p>
                    </div>
                  <?php endif; ?>
                </section><!-- /.content -->
