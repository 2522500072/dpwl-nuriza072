```php
<?php
class Penyewa_M extends Model
{
    // Menampilkan semua data penyewa
    public function datapenyewa()
    {
        $dtpenyewa = $this->db->prepare(
            "SELECT user_plg072, Sandi072, Nik072, nm_lngkp072,
                    no_hp072, almt_lngkp072, ft_ktp, ft_sim_a
             FROM penyewa"
        );

        $dtpenyewa->execute();

        return $dtpenyewa->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Mengecek username penyewa
    public function cekpenyewa($user_plg072)
    {
        $sql = $this->db->prepare(
            "SELECT user_plg072 FROM penyewa WHERE user_plg072 = ?"
        );

        $sql->bind_param("s", $user_plg072);
        $sql->execute();

        $hasil = $sql->get_result();

        return $hasil->num_rows > 0;
    }

    // Menyimpan data penyewa
    public function simpan($data)
    {
        $sql = $this->db->prepare(
            "INSERT INTO penyewa
            (user_plg072, Sandi072, Nik072, nm_lngkp072,
             no_hp072, almt_lngkp072, ft_ktp, ft_sim_a)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $sql->bind_param(
            "ssssssss",
            $data['user_plg072'],
            $data['Sandi072'],
            $data['Nik072'],
            $data['nm_lngkp072'],
            $data['no_hp072'],
            $data['almt_lngkp072'],
            $data['ft_ktp'],
            $data['ft_sim_a']
        );

        return $sql->execute();
    }

    // Menampilkan detail penyewa berdasarkan username
    public function detailpenyewa($user_plg072)
    {
        $sql = $this->db->prepare(
            "SELECT user_plg072, Sandi072, Nik072, nm_lngkp072,
                    no_hp072, almt_lngkp072, ft_ktp, ft_sim_a
             FROM penyewa
             WHERE user_plg072 = ?"
        );

        $sql->bind_param("s", $user_plg072);
        $sql->execute();

        return $sql->get_result()->fetch_assoc();
    }

    // Mengubah data penyewa
    public function UbahDtpenyewa($data)
    {
        $sql = $this->db->prepare(
            "UPDATE penyewa
             SET Sandi072 = ?,
                 Nik072 = ?,
                 nm_lngkp072 = ?,
                 no_hp072 = ?,
                 almt_lngkp072 = ?,
                 ft_ktp = ?,
                 ft_sim_a = ?
             WHERE user_plg072 = ?"
        );

        $sql->bind_param(
            "ssssssss",
            $data['Sandi072'],
            $data['Nik072'],
            $data['nm_lngkp072'],
            $data['no_hp072'],
            $data['almt_lngkp072'],
            $data['ft_ktp'],
            $data['ft_sim_a'],
            $data['user_plg072']
        );

        return $sql->execute();
    }

    // Menghapus data penyewa
    public function HapusDtpenyewa($user_plg072)
    {
        $sql = $this->db->prepare(
            "DELETE FROM penyewa WHERE user_plg072 = ?"
        );

        $sql->bind_param("s", $user_plg072);

        $hasil = $sql->execute();

        $sql->close();

        return $hasil;
    }
}
```