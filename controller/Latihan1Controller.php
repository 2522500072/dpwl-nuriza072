<?php
class Latihan1Controller extends Controller
{
    public function index()
    {
        $data['datamhs'] = $this->load->model('Latihan1Model')->getDataMhs();
        $this->session->set_userdata('nmuser', 'Nuriza');
        $data['nama_user'] = $this->session->userdata('nmuser');
        $this->load->view('Latihan1View', $data);
    }
}
?>