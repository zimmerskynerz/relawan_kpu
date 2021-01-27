<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffLaporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('staff/insert_model');
        $this->load->model('staff/select_model');
        $this->load->model('staff/update_model');
        $this->set_timezone();
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function pendaftaran()
    {
        $cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'staff') :
            if (isset($_POST['lihat_laporan_pendaftaran'])) :
                $bulan = htmlentities($this->input->post('bulan'));
                $tahun = htmlentities($this->input->post('tahun'));
            else :
                $bulan = date('m');
                $tahun = date('Y');
            endif;
            $data_calon_relawan = $this->select_model->getDataCalonRelawanTanggal($bulan, $tahun);
            $data = array(
                'folder'              => 'laporan',
                'halaman'             => 'pendaftaran',
                // Data Calon Relawan
                'data_calon_relawan'  => $data_calon_relawan
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function gaji_relawan()
    {
        $cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'staff') :
            if (isset($_POST['lihat_laporan_gaji'])) :
                $bulan = htmlentities($this->input->post('bulan'));
                $tahun = htmlentities($this->input->post('tahun'));
            else :
                $bulan = date('m');
                $tahun = date('Y');
            endif;
            $data_calon_relawan = $this->select_model->getGajiRelawanTanggal($bulan, $tahun);
            $data = array(
                'folder'              => 'laporan',
                'halaman'             => 'gaji',
                // Data Calon Relawan
                'data_calon_relawan'  => $data_calon_relawan
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
}
        
    /* End of file  ControllerStaffLaporan.php */
