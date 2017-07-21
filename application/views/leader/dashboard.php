                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Laman Awal
                        <small>Selamat Datang</small>
                    </h1>
                    <?= $this->session->flashdata('msg') ?>
                </section>

                <?php
                $idx = 0;
                    $permohonan = $this->permohonan_m->get_num_row(['status' => 'menunggu proses survey']);
                    foreach ($langgan as $key) {
                      $cek = $this->instalasi_m->get_row(['kd_pelanggan' => $key->kd_pelanggan,'status_instalasi' => 'proses instalasi']);
                      if (!isset($cek)) {
                        $idx++;
                      }
                    }
                    $gangguan = $this->gangguan_m->get_num_row(['status' => 0]);
                 ?>

                <!-- Main content -->
                <section class="content">
                  <?php if ($permohonan > 0): ?>
                    <div class="callout callout-warning">
                      <h4>Terdapat <?=$permohonan?> Permohonan</h4>

                      <p>Diharapkan untuk melakukan survey silahkan klik <a href="<?=base_url('leader/data-permohonan')?>">disini</a>.</p>
                    </div>
                  <?php endif; ?>
                  <?php if ($idx > 0): ?>
                    <div class="callout callout-info">
                      <h4><?=$idx?> pelanggan belum diatur jadwal konfirmasi!</h4>

                      <p>Silahkan atur jadwal konfirmasi <a href="<?=base_url('leader/atur-jadwal-instalasi')?>">disini</a>.</p>
                    </div>
                  <?php endif; ?>
                  <?php if ($gangguan > 0): ?>
                    <div class="callout callout-danger">
                      <h4>Terdapat <?=$gangguan?> permohonan maintenance!</h4>

                      <p>Silahkan mengatur jadwal maintenance <a href="<?=base_url('leader/atur-jadwal-maintenance')?>">disini</a>.</p>
                    </div>
                  <?php endif; ?>
                </section><!-- /.content -->
