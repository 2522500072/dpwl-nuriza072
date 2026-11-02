```php
<?php
class Penyewa_C extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Penyewa_M');
        $dt['datapenyewa'] = $cekdata->datapenyewa();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/penyewaview', $dt);
        $this->load->view('layout/footer');
    }

    public function create_penyewa()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_penyewaview');
        $this->load->view('layout/footer');
    }

    public function simpan()
    {
        $penyewa = $this->load->model('m_master/Penyewa_M');

        if ($penyewa->cekpenyewa($this->load->post('user_plg072'))) {
            echo "<script>
                alert('Nomor user sudah terdaftar!');
                window.history.back();
            </script>";
            exit;
        }

        $ft_ktp = 'ktp' . $this->load->post('user_plg072');
        $ft_sim_a = 'sim_a' . $this->load->post('user_plg072');

        $folder = dirname(__DIR__, 2) . '/img/';

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        // Upload foto KTP
        if (isset($_FILES['ft_ktp']) && $_FILES['ft_ktp']['error'] == 0) {
            $file = $_FILES['ft_ktp'];
            $info = getimagesize($file['tmp_name']);
            $ext = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png'
            ];

            if ($info && isset($ext[$info['mime']]) && $file['size'] <= 2 * 1024 * 1024) {
                $namaFilektp = $ft_ktp . '.' . $ext[$info['mime']];

                if (move_uploaded_file($file['tmp_name'], $folder . $namaFilektp)) {
                    $ft_ktp = $namaFilektp;
                }
            } else {
                echo "<script>
                    alert('Gagal menyimpan gambar KTP. Periksa ukuran dan format!');
                    window.history.back();
                </script>";
                exit;
            }
        }

        // Upload foto SIM A
        if (isset($_FILES['ft_sim_a']) && $_FILES['ft_sim_a']['error'] == 0) {
            $file = $_FILES['ft_sim_a'];
            $info = getimagesize($file['tmp_name']);
            $ext = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png'
            ];

            if ($info && isset($ext[$info['mime']]) && $file['size'] <= 2 * 1024 * 1024) {
                $namaFilesim_a = $ft_sim_a . '.' . $ext[$info['mime']];

                if (move_uploaded_file($file['tmp_name'], $folder . $namaFilesim_a)) {
                    $ft_sim_a = $namaFilesim_a;
                }
            } else {
                echo "<script>
                    alert('Gagal menyimpan gambar SIM A. Periksa ukuran dan format!');
                    window.history.back();
                </script>";
                exit;
            }
        }

        $data = [
            'user_plg072' => $this->load->post('user_plg072'),
            'Sandi072' => $this->load->post('Sandi072'),
            'Nik072' => $this->load->post('Nik072'),
            'nm_lngkp072' => $this->load->post('nm_lngkp072'),
            'no_hp072' => $this->load->post('no_hp072'),
            'almt_lngkp072' => $this->load->post('almt_lngkp072'),
            'ft_ktp' => $ft_ktp,
            'ft_sim_a' => $ft_sim_a
        ];

        $simpan = $penyewa->simpan($data);

        if ($simpan) {
            echo "<script>
                alert('Data penyewa berhasil disimpan!');
                window.location.href = '" . base_url('Penyewa_C/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal disimpan!');
                window.history.back();
            </script>";
        }
    }

    public function edit($user_plg072)
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];

        $penyewa = $this->load->model('m_master/Penyewa_M');
        $dt['penyewa'] = $penyewa->detailpenyewa($user_plg072);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_penyewaview', $dt);
        $this->load->view('layout/footer');
    }

    public function UpdatePenyewa()
    {
        $penyewa = $this->load->model('m_master/Penyewa_M');

        $user_plg072 = $this->load->post('user_plg072');

        $folder = dirname(__DIR__, 2) . '/img/';

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        // Foto KTP lama
        $ft_ktp = $this->load->post('ft_ktp_asli');

        if (isset($_FILES['ft_ktp']) && $_FILES['ft_ktp']['error'] != 4) {
            $file = $_FILES['ft_ktp'];
            $info = getimagesize($file['tmp_name']);
            $ext = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png'
            ];

            if (
                !$info ||
                !isset($ext[$info['mime']]) ||
                $file['size'] > 2 * 1024 * 1024
            ) {
                echo "<script>
                    alert('Format foto KTP harus JPG atau PNG, maksimal 2 MB!');
                    window.history.back();
                </script>";
                exit;
            }

            $ft_ktp = 'ktp' . $user_plg072 . '.' . $ext[$info['mime']];

            if (!move_uploaded_file($file['tmp_name'], $folder . $ft_ktp)) {
                echo "<script>
                    alert('Gagal upload foto KTP!');
                    window.history.back();
                </script>";
                exit;
            }
        }

        // Foto SIM A lama
        $ft_sim_a = $this->load->post('ft_sim_a_asli');

        if (isset($_FILES['ft_sim_a']) && $_FILES['ft_sim_a']['error'] != 4) {
            $file = $_FILES['ft_sim_a'];
            $info = getimagesize($file['tmp_name']);
            $ext = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png'
            ];

            if (
                !$info ||
                !isset($ext[$info['mime']]) ||
                $file['size'] > 2 * 1024 * 1024
            ) {
                echo "<script>
                    alert('Format foto SIM A harus JPG atau PNG, maksimal 2 MB!');
                    window.history.back();
                </script>";
                exit;
            }

            $ft_sim_a = 'sim_a' . $user_plg072 . '.' . $ext[$info['mime']];

            if (!move_uploaded_file($file['tmp_name'], $folder . $ft_sim_a)) {
                echo "<script>
                    alert('Gagal upload foto SIM A!');
                    window.history.back();
                </script>";
                exit;
            }
        }

        $data = [
            'user_plg072' => $user_plg072,
            'Sandi072' => $this->load->post('Sandi072'),
            'Nik072' => $this->load->post('Nik072'),
            'nm_lngkp072' => $this->load->post('nm_lngkp072'),
            'no_hp072' => $this->load->post('no_hp072'),
            'almt_lngkp072' => $this->load->post('almt_lngkp072'),
            'ft_ktp' => $ft_ktp,
            'ft_sim_a' => $ft_sim_a
        ];

        $simpan = $penyewa->UbahDtpenyewa($data);

        if ($simpan) {
            echo "<script>
                alert('Data penyewa berhasil diubah!');
                window.location.href = '" . base_url('Penyewa_C/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal diubah!');
                window.history.back();
            </script>";
        }
    }

    public function hapus($user_plg072)
    {
        $penyewa = $this->load->model('m_master/Penyewa_M');

        $dt['Gambar_Penyewa'] = $penyewa->detailpenyewa($user_plg072);

        if (!$dt['Gambar_Penyewa']) {
            echo "<script>
                alert('Data penyewa tidak ditemukan!');
                window.location.href = '" . base_url('Penyewa_C/index') . "';
            </script>";
            exit;
        }

        $ft_ktp = $dt['Gambar_Penyewa']['ft_ktp'];
        $ft_sim_a = $dt['Gambar_Penyewa']['ft_sim_a'];

        $hapus = $penyewa->HapusDtpenyewa($user_plg072);

        if ($hapus) {
            $folder = dirname(__DIR__, 2) . '/img/';
            $gambar = [$ft_ktp, $ft_sim_a];

            foreach ($gambar as $file) {
                if (!empty($file) && file_exists($folder . $file)) {
                    unlink($folder . $file);
                }
            }

            echo "<script>
                alert('Data penyewa berhasil dihapus!');
                window.location.href = '" . base_url('Penyewa_C/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal dihapus!');
                window.history.back();
            </script>";
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('emailuser');
        $this->session->set_flashdata('pesan', 'Berhasil Logout');
        redirect('login_C/index');
        exit;
    }
}
```