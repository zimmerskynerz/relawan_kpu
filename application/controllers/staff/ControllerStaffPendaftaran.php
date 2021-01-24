<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffPendaftaran extends CI_Controller
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
    public function index()
    {
        $cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'staff') :
            $data_calon_relawan = $this->select_model->getDataCalonRelawan();
            // echo "<pre>";
            // var_dump($data_calon_relawan);
            // die;
            $data = array(
                'folder'              => 'relawan',
                'halaman'             => 'pendaftaran',
                // Data Calon Relawan
                'data_calon_relawan'  => $data_calon_relawan
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function tampil_berkas($id)
    {
        $id_relawan = $id;
        $cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'staff') :
            $data_berkas_Calon = $this->db->get_where('tbl_berkas', ['id_relawan' => $id_relawan])->result();
            $data_diri         = $this->select_model->getDataDiriCalonRelawan($id_relawan);
            // echo "<pre>";
            // var_dump($data_berkas_Calon);
            // die;
            $data = array(
                'folder'              => 'relawan',
                'halaman'             => 'pendaftaran_detail',
                // Data Calon Relawan
                'data_berkas_Calon'  => $data_berkas_Calon,
                'data_diri_relawan'  => $data_diri
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function crudpendaftaran()
    {
        if (isset($_POST['terima_relawan'])) :
            # code...
            $this->update_model->terima_relawan();
            $this->session->set_flashdata('berhasil_konfirmasi', '<div class="berhasil_konfirmasi"></div>');
            redirect('staff/relawan/pendaftaran');
        endif;
        if (isset($_POST['revisi_relawan'])) :
            # code...
            $this->update_model->revisi_relawan();
            $this->session->set_flashdata('berhasil_konfirmasi', '<div class="berhasil_konfirmasi"></div>');
            redirect('staff/relawan/pendaftaran');
        endif;
        if (isset($_POST['tolak_relawan'])) :
            # code...
            $this->update_model->tolak_relawan();
            $this->session->set_flashdata('berhasil_konfirmasi', '<div class="berhasil_konfirmasi"></div>');
            redirect('staff/relawan/pendaftaran');
        endif;
    }
}
        
    /* End of file  ControllerStaffPendaftaran.php */
