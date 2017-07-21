                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Laman Awal
                        <small>Selamat Datang</small>
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <?php
                  $maintenance = $this->maintenance_m->get_num_row(['status_maintenance' => 'dalam proses','kd_pelanggan' => $profile->kd_pelanggan]);
                  $jadwal_instalasi = $this->instalasi_m->get_num_row(['kd_pelanggan' => $profile->kd_pelanggan,'status_instalasi' => 'proses instalasi']);
                 ?>

                <!-- Main content -->
                <section class="content">
                  <?php if ($jadwal_instalasi > 0): ?>
                    <div class="callout callout-info">
                      <h4>Anda mendapatkan <?=$jadwal_instalasi?> jadwal instalasi!</h4>

                      <p>Silahkan klik <a href="<?=base_url('pelanggan/jadwal-instalasi')?>">disini</a> untuk melihat detail.</p>
                    </div>
                  <?php endif; ?>

                  <?php if ($maintenance > 0): ?>
                    <div class="callout callout-danger">
                      <h4>Anda mendapatkan <?=$maintenance?> jadwal maintenance!</h4>

                      <p>Silahkan klik <a href="<?=base_url('pelanggan/jadwal-maintenance')?>">disini</a> untuk melihat detail.</p>
                    </div>
                  <?php endif; ?>
                </section><!-- /.content -->
