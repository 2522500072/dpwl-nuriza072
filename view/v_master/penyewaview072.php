```php
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <a href="<?= base_url('Penyewa_C/create_penyewa') ?>"
                               class="btn btn-primary mb-3">
                                <i class="fas fa-plus"></i> Tambah Data Penyewa
                            </a>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nomor HP</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Foto KTP</th>
                                        <th>Foto SIM A</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (!empty($datapenyewa)) : ?>

                                        <?php foreach ($datapenyewa as $p) : ?>
                                            <tr>
                                                <td>
                                                    <?= htmlspecialchars($p['user_plg072']) ?>
                                                </td>

                                                <td>
                                                    <?= htmlspecialchars($p['Nik072']) ?>
                                                </td>

                                                <td>
                                                    <?= htmlspecialchars($p['nm_lngkp072']) ?>
                                                </td>

                                                <td>
                                                    <?= htmlspecialchars($p['no_hp072']) ?>
                                                </td>

                                                <td>
                                                    <?= htmlspecialchars($p['almt_lngkp072']) ?>
                                                </td>

                                                <!-- Foto KTP -->
                                                <td>
                                                    <?php if (!empty($p['ft_ktp'])) : ?>
                                                        <img
                                                            src="<?= base_url('img/' . rawurlencode(basename($p['ft_ktp']))) ?>"
                                                            style="width: 80px; height: 60px; object-fit: cover;"
                                                            alt="Foto KTP"
                                                            onerror="this.style.display='none';">
                                                    <?php else : ?>
                                                        Tidak ada foto
                                                    <?php endif; ?>
                                                </td>

                                                <!-- Foto SIM A -->
                                                <td>
                                                    <?php if (!empty($p['ft_sim_a'])) : ?>
                                                        <img
                                                            src="<?= base_url('img/' . rawurlencode(basename($p['ft_sim_a']))) ?>"
                                                            style="width: 80px; height: 60px; object-fit: cover;"
                                                            alt="Foto SIM A"
                                                            onerror="this.style.display='none';">
                                                    <?php else : ?>
                                                        Tidak ada foto
                                                    <?php endif; ?>
                                                </td>

                                                <!-- Tombol aksi -->
                                                <td>
                                                    <a
                                                        href="<?= base_url('Penyewa_C/edit/' . rawurlencode($p['user_plg072'])) ?>"
                                                        class="btn btn-warning btn-sm">
                                                        Edit
                                                    </a>

                                                    <a
                                                        href="<?= base_url('Penyewa_C/hapus/' . rawurlencode($p['user_plg072'])) ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data penyewa ini?')">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    <?php else : ?>

                                        <tr>
                                            <td colspan="8" class="text-center">
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
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
```