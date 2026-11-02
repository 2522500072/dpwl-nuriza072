
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Entri Data Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin_C/index') ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Mobil_C/index') ?>">Data Mobil</a>
                        </li>
                        <li class="breadcrumb-item active">Entri Mobil</li>
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
                            <h3 class="card-title">Form Entri Data Mobil</h3>
                        </div>

                        <form action="<?= base_url('Mobil_C/UpdateMobil') ?>"
                              method="post"
                              enctype="multipart/form-data">

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="no_plat">Nomor Plat</label>
                                    <input type="text" name="no_plat"
                                           id="no_plat" class="form-control"
                                           placeholder="Masukkan nomor plat"
                                           value="<?= htmlspecialchars($mobil['no_plat'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                           readonly required>
                                </div>

                                <div class="form-group">
                                    <label for="nm_mobil">Nama Mobil</label>
                                    <input type="text" name="nm_mobil"
                                           id="nm_mobil" class="form-control"
                                           placeholder="Masukkan nama mobil"
                                           value="<?= htmlspecialchars($mobil['nm_mobil'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nkursi">Jumlah Kursi</label>
                                            <input type="number" name="nkursi"
                                                   id="nkursi" class="form-control"
                                                   placeholder="Masukkan jumlah kursi"
                                                   value="<?= htmlspecialchars((string)($mobil['nkursi'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nbagasi">Jumlah Bagasi</label>
                                            <input type="number" name="nbagasi"
                                                   id="nbagasi" class="form-control"
                                                   placeholder="Masukkan jumlah bagasi"
                                                   value="<?= htmlspecialchars((string)($mobil['nbagasi'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jns_mobil">Jenis Mobil</label>
                                            <select name="jns_mobil" id="jns_mobil"
                                                    class="form-control" required>
                                                <option value="Sedan" <?= ($mobil['jns_mobil'] ?? '') == 'Sedan' ? 'selected' : '' ?>>Sedan</option>
                                                <option value="Hatchback" <?= ($mobil['jns_mobil'] ?? '') == 'Hatchback' ? 'selected' : '' ?>>Hatchback</option>
                                                <option value="MPV" <?= ($mobil['jns_mobil'] ?? '') == 'MPV' ? 'selected' : '' ?>>MPV</option>
                                                <option value="SUV" <?= ($mobil['jns_mobil'] ?? '') == 'SUV' ? 'selected' : '' ?>>SUV</option>
                                                <option value="Pickup" <?= ($mobil['jns_mobil'] ?? '') == 'Pickup' ? 'selected' : '' ?>>Pickup</option>
                                                <option value="Minibus" <?= ($mobil['jns_mobil'] ?? '') == 'Minibus' ? 'selected' : '' ?>>Minibus</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transmisi">Transmisi</label>
                                            <input type="text" name="transmisi"
                                                   id="transmisi" class="form-control"
                                                   placeholder="Masukkan jenis transmisi"
                                                   value="<?= htmlspecialchars($mobil['transmisi'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="thn_buat">Tahun Pembuatan</label>
                                    <input type="number" name="thn_buat"
                                           id="thn_buat" class="form-control"
                                           placeholder="Masukkan tahun pembuatan"
                                           value="<?= htmlspecialchars((string)($mobil['thn_buat'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="ft_depan">Foto Depan Mobil</label>
                                    <input type="file" name="ft_depan"
                                           id="ft_depan" class="form-control"
                                           accept="image/*">
                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto depan.
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label for="ft_blkg">Foto Belakang Mobil</label>
                                    <input type="file" name="ft_blkg"
                                           id="ft_blkg" class="form-control"
                                           accept="image/*">
                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto belakang.
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label for="ft_interior">Foto Interior Mobil</label>
                                    <input type="file" name="ft_interior"
                                           id="ft_interior" class="form-control"
                                           accept="image/*">
                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto interior.
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label for="hrg_hari">Biaya Sewa Per Hari (Rp)</label>
                                    <input type="number" name="hrg_hari"
                                           id="hrg_hari" class="form-control"
                                           placeholder="Masukkan harga sewa per hari"
                                           value="<?= htmlspecialchars((string)($mobil['hrg_hari'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="cttn_unit">Catatan Unit</label>
                                    <textarea name="cttn_unit" id="cttn_unit"
                                              class="form-control" rows="3"
                                              placeholder="Masukkan catatan unit"><?= htmlspecialchars($mobil['cttn_unit'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status_unit">Status Unit</label>
                                    <input type="text" name="status_unit"
                                           id="status_unit" class="form-control"
                                           placeholder="Masukkan status unit"
                                           value="<?= htmlspecialchars($mobil['status_unit'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>

                                <a href="<?= base_url('Mobil_C/index') ?>"
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