<?php

class Mobil_C extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['datamobil'] = $cekdata->datamobil();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/mobilview', $dt);
        $this->load->view('layout/footer');
    }

    public function create_mobil()
    {
        $info['nm_user'] = explode(
            '@',
            $this->session->userdata('emailuser')
        )[0];

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_mobilview');
        $this->load->view('layout/footer');
    }

    public function simpan()
    {
        $mobil = $this->load->model('m_master/Mobil_M');

        // Mengambil nomor plat
        $no_plat = $this->load->post('no_plat');

        // Memeriksa nomor plat
        if ($mobil->cekplat($no_plat)) {
            echo "<script>
                alert('Nomor plat sudah terdaftar!');
                window.history.back();
            </script>";
            exit;
        }

        // Menentukan nama dasar foto
        $ft_depan = 'Depan' . $no_plat;
        $ft_blkg = 'Belakang' . $no_plat;
        $ft_interior = 'Interior' . $no_plat;

        // Lokasi folder img
        $folder = dirname(__DIR__, 2) . '/img/';

        // Membuat folder jika belum tersedia
        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        // Daftar foto yang diunggah
        $foto = [
            'ft_depan' => $ft_depan,
            'ft_blkg' => $ft_blkg,
            'ft_interior' => $ft_interior
        ];

        $namaFoto = [];

        // Proses upload ketiga foto
        foreach ($foto as $field => $namaDasar) {

            // Memeriksa apakah file sudah diunggah
            if (
                !isset($_FILES[$field]) ||
                $_FILES[$field]['error'] != UPLOAD_ERR_OK
            ) {
                echo "<script>
                    alert('Foto " . $field . " wajib diunggah!');
                    window.history.back();
                </script>";
                exit;
            }

            $file = $_FILES[$field];

            // Memeriksa format gambar
            $info = getimagesize($file['tmp_name']);

            $ext = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png'
            ];

            // Validasi gambar dan ukuran maksimal 2 MB
            if (
                !$info ||
                !isset($ext[$info['mime']]) ||
                $file['size'] > 2 * 1024 * 1024
            ) {
                echo "<script>
                    alert('Foto harus JPG/PNG dan maksimal 2 MB!');
                    window.history.back();
                </script>";
                exit;
            }

            // Nama file lengkap beserta ekstensi
            $namaLengkap = $namaDasar . '.' . $ext[$info['mime']];

            // Memindahkan foto ke folder img
            if (
                !move_uploaded_file(
                    $file['tmp_name'],
                    $folder . $namaLengkap
                )
            ) {
                echo "<script>
                    alert('Gagal menyimpan foto ke folder img!');
                    window.history.back();
                </script>";
                exit;
            }

            // Menyimpan nama file lengkap
            $namaFoto[$field] = $namaLengkap;
        }

        // Data mobil yang akan disimpan
        $data = [
            'no_plat' => $no_plat,
            'nm_mobil' => $this->load->post('nm_mobil'),
            'nkursi' => $this->load->post('nkursi'),
            'nbagasi' => $this->load->post('nbagasi'),
            'jns_mobil' => $this->load->post('jns_mobil'),
            'transmisi' => $this->load->post('transmisi'),
            'thn_buat' => $this->load->post('thn_buat'),

            // Nama file lengkap disimpan ke database
            'ft_depan' => $namaFoto['ft_depan'],
            'ft_blkg' => $namaFoto['ft_blkg'],
            'ft_interior' => $namaFoto['ft_interior'],

            'hrg_hari' => $this->load->post('hrg_hari'),
            'cttn_unit' => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        // Menyimpan data ke database
        $simpan = $mobil->simpan($data);

        if ($simpan) {
            echo "<script>
                alert('Data mobil berhasil disimpan!');
                window.location.href = '" .
                base_url('Mobil_C/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal disimpan!');
                window.history.back();
            </script>";
        }
    }
}