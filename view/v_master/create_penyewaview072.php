```php
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Entri Data Penyewa</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin_C/index') ?>">Home</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Penyewa_C/index') ?>">Data Penyewa</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Entri Penyewa
                        </li>
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

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Entri Data Penyewa</h3>
                        </div>

                        <form action="<?= base_url('Penyewa_C/simpan') ?>"
                              method="post"
                              enctype="multipart/form-data">

                            <div class="card-body">

                                <!-- Username Penyewa -->
                                <div class="form-group">
                                    <label for="user_plg072">Username Penyewa</label>
                                    <input type="text"
                                           name="user_plg072"
                                           id="user_plg072"
                                           class="form-control"
                                           placeholder="Masukkan username penyewa"
                                           required>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="Sandi072">Password</label>
                                    <input type="password"
                                           name="Sandi072"
                                           id="Sandi072"
                                           class="form-control"
                                           placeholder="Masukkan password"
                                           required>
                                </div>

                                <!-- NIK -->
                                <div class="form-group">
                                    <label for="Nik072">NIK</label>
                                    <input type="text"
                                           name="Nik072"
                                           id="Nik072"
                                           class="form-control"
                                           placeholder="Masukkan NIK"
                                           maxlength="20"
                                           required>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="form-group">
                                    <label for="nm_lngkp072">Nama Lengkap</label>
                                    <input type="text"
                                           name="nm_lngkp072"
                                           id="nm_lngkp072"
                                           class="form-control"
                                           placeholder="Masukkan nama lengkap"
                                           required>
                                </div>

                                <!-- Nomor HP -->
                                <div class="form-group">
                                    <label for="no_hp072">Nomor HP</label>
                                    <input type="text"
                                           name="no_hp072"
                                           id="no_hp072"
                                           class="form-control"
                                           placeholder="Masukkan nomor HP"
                                           required>
                                </div>

                                <!-- Alamat Lengkap -->
                                <div class="form-group">
                                    <label for="almt_lngkp072">Alamat Lengkap</label>
                                    <textarea name="almt_lngkp072"
                                              id="almt_lngkp072"
                                              class="form-control"
                                              rows="3"
                                              placeholder="Masukkan alamat lengkap"
                                              required></textarea>
                                </div>

                                <!-- Foto KTP -->
                                <div class="form-group">
                                    <label for="ft_ktp">Foto KTP</label>
                                    <input type="file"
                                           name="ft_ktp"
                                           id="ft_ktp"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png"
                                           required>
                                </div>

                                <!-- Foto SIM A -->
                                <div class="form-group">
                                    <label for="ft_sim_a">Foto SIM A</label>
                                    <input type="file"
                                           name="ft_sim_a"
                                           id="ft_sim_a"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png"
                                           required>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan
                                </button>

                                <a href="<?= base_url('Penyewa_C/index') ?>"
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
