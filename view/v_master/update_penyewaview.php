```php
<!-- Content Wrapper -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Penyewa</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin_C/index') ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Penyewa_C072/index') ?>">Data Penyewa</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Penyewa</li>
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

                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Form Edit Data Penyewa</h3>
                        </div>

                        <form action="<?= base_url('Penyewa_C072/UpdatePenyewa') ?>"
                              method="post"
                              enctype="multipart/form-data">

                            <div class="card-body">

                                <!-- Username -->
                                <div class="form-group">
                                    <label for="user_plg072">Username Penyewa</label>
                                    <input
                                        type="text"
                                        name="user_plg072"
                                        id="user_plg072"
                                        class="form-control"
                                        value="<?= htmlspecialchars($penyewa['user_plg072'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                        readonly
                                        required>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="Sandi072">Password</label>
                                    <input
                                        type="password"
                                        name="Sandi072"
                                        id="Sandi072"
                                        class="form-control"
                                        placeholder="Masukkan password baru jika ingin mengganti">
                                    <small class="text-muted">
                                        Kosongkan jika password tidak ingin diubah.
                                    </small>
                                </div>

                                <!-- NIK -->
                                <div class="form-group">
                                    <label for="Nik072">Nomor Induk Kependudukan (NIK)</label>
                                    <input
                                        type="text"
                                        name="Nik072"
                                        id="Nik072"
                                        class="form-control"
                                        maxlength="16"
                                        value="<?= htmlspecialchars($penyewa['Nik072'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                        required>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="form-group">
                                    <label for="nm_lngkp072">Nama Lengkap</label>
                                    <input
                                        type="text"
                                        name="nm_lngkp072"
                                        id="nm_lngkp072"
                                        class="form-control"
                                        value="<?= htmlspecialchars($penyewa['nm_lngkp072'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                        required>
                                </div>

                                <!-- Nomor HP -->
                                <div class="form-group">
                                    <label for="no_hp072">Nomor HP</label>
                                    <input
                                        type="tel"
                                        name="no_hp072"
                                        id="no_hp072"
                                        class="form-control"
                                        value="<?= htmlspecialchars($penyewa['no_hp072'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                        required>
                                </div>

                                <!-- Alamat -->
                                <div class="form-group">
                                    <label for="almt_lngkp072">Alamat Lengkap</label>
                                    <textarea
                                        name="almt_lngkp072"
                                        id="almt_lngkp072"
                                        class="form-control"
                                        rows="3"
                                        required><?= htmlspecialchars($penyewa['almt_lngkp072'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                                </div>

                                <!-- Foto KTP -->
                                <div class="form-group">
                                    <label for="ft_ktp">Foto KTP</label>

                                    <?php if (!empty($penyewa['ft_ktp'])) : ?>
                                        <div class="mb-2">
                                            <img
                                                src="<?= base_url('img/' . rawurlencode(basename($penyewa['ft_ktp']))) ?>"
                                                alt="Foto KTP"
                                                style="width:150px; height:100px; object-fit:cover;"
                                                onerror="this.style.display='none';">
                                        </div>
                                    <?php endif; ?>

                                    <input
                                        type="file"
                                        name="ft_ktp"
                                        id="ft_ktp"
                                        class="form-control"
                                        accept="image/*">

                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto KTP.
                                    </small>
                                </div>

                                <!-- Foto SIM A -->
                                <div class="form-group">
                                    <label for="ft_sim_a">Foto SIM A</label>

                                    <?php if (!empty($penyewa['ft_sim_a'])) : ?>
                                        <div class="mb-2">
                                            <img
                                                src="<?= base_url('img/' . rawurlencode(basename($penyewa['ft_sim_a']))) ?>"
                                                alt="Foto SIM A"
                                                style="width:150px; height:100px; object-fit:cover;"
                                                onerror="this.style.display='none';">
                                        </div>
                                    <?php endif; ?>

                                    <input
                                        type="file"
                                        name="ft_sim_a"
                                        id="ft_sim_a"
                                        class="form-control"
                                        accept="image/*">

                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto SIM A.
                                    </small>
                                </div>

                            </div>

                            <!-- Footer -->
                            <div class="card-footer">

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>

                                <a href="<?= base_url('Penyewa_C072/index') ?>"
                                   class="btn btn-secondary">
                                    Kembali
                                </a>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.content-wrapper -->
```