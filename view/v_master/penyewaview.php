```php
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">
          <h1 class="m-0">Data Penyewa</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="<?= base_url('Admin_C/index') ?>">Home</a>
            </li>
            <li class="breadcrumb-item active">Data Penyewa</li>
          </ol>
        </div>

      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Data Penyewa</h3>
            </div>

            <div class="card-body">

              <a href="<?= base_url('Penyewa_C072/create_penyewa') ?>"
                 class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah Data Penyewa
              </a>

              <div class="table-responsive">
                <table class="table table-bordered table-striped">

                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Username</th>
                      <th>NIK</th>
                      <th>Nama Lengkap</th>
                      <th>No. HP</th>
                      <th>Alamat Lengkap</th>
                      <th>Foto KTP</th>
                      <th>Foto SIM A</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php if (!empty($datapenyewa)) : ?>

                      <?php $no = 1; ?>

                      <?php foreach ($datapenyewa as $p) : ?>
                        <tr>

                          <td><?= $no++ ?></td>

                          <td>
                            <?= htmlspecialchars($p['user_plg072'] ?? '') ?>
                          </td>

                          <td>
                            <?= htmlspecialchars($p['Nik072'] ?? '') ?>
                          </td>

                          <td>
                            <?= htmlspecialchars($p['nm_lngkp072'] ?? '') ?>
                          </td>

                          <td>
                            <?= htmlspecialchars($p['no_hp072'] ?? '') ?>
                          </td>

                          <td>
                            <?= htmlspecialchars($p['almt_lngkp072'] ?? '') ?>
                          </td>

                          <!-- Foto KTP -->
                          <td>
                            <?php if (!empty($p['ft_ktp'])) : ?>
                              <img
                                src="<?= base_url('img/' . rawurlencode(basename($p['ft_ktp']))) ?>"
                                alt="Foto KTP"
                                style="width:80px;height:60px;object-fit:cover;"
                                onerror="this.outerHTML='<span class=\'text-danger\'>Foto tidak ditemukan</span>';">
                            <?php else : ?>
                              <span class="text-muted">Belum ada foto</span>
                            <?php endif; ?>
                          </td>

                          <!-- Foto SIM A -->
                          <td>
                            <?php if (!empty($p['ft_sim_a'])) : ?>
                              <img
                                src="<?= base_url('img/' . rawurlencode(basename($p['ft_sim_a']))) ?>"
                                alt="Foto SIM A"
                                style="width:80px;height:60px;object-fit:cover;"
                                onerror="this.outerHTML='<span class=\'text-danger\'>Foto tidak ditemukan</span>';">
                            <?php else : ?>
                              <span class="text-muted">Belum ada foto</span>
                            <?php endif; ?>
                          </td>

                          <!-- Tombol Aksi -->
                          <td>
                            <a
                              href="<?= base_url('Penyewa_C072/edit/' . rawurlencode($p['user_plg072'])) ?>"
                              class="btn btn-warning btn-sm mb-1">
                              <i class="fas fa-edit"></i> Edit
                            </a>

                            <a
                              href="<?= base_url('Penyewa_C072/hapus/' . rawurlencode($p['user_plg072'])) ?>"
                              class="btn btn-danger btn-sm mb-1"
                              onclick="return confirm('Apakah Anda yakin ingin menghapus data penyewa ini?')">
                              <i class="fas fa-trash"></i> Hapus
                            </a>
                          </td>

                        </tr>
                      <?php endforeach; ?>

                    <?php else : ?>

                      <tr>
                        <td colspan="9" class="text-center">
                          Belum ada data penyewa.
                        </td>
                      </tr>

                    <?php endif; ?>
                  </tbody>

                </table>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <div class="p-3">
    <h5>Informasi</h5>
    <p>Halaman data penyewa.</p>
  </div>
</aside>
<!-- /.control-sidebar -->
```