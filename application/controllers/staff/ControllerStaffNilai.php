<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffNilai extends CI_Controller
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
            $data_calon_relawan = $this->select_model->getDataNilaiRelawan();
            // echo "<pre>";
            // var_dump($data_calon_relawan);
            // die;
            $data = array(
                'folder'              => 'nilai',
                'halaman'             => 'index',
                // Data Calon Relawan
                'data_calon_relawan'  => $data_calon_relawan
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function crudnilai()
    {
        if (isset($_POST['lulus_relawan'])) :
            # code...
            $this->update_model->terima_calon_relawan();
            $this->session->set_flashdata('berhasil_konfirmasi_ujian', '<div class="berhasil_konfirmasi_ujian"></div>');
            redirect('staff/relawan/nilai');
        endif;
        if (isset($_POST['gagal_relawan'])) :
            # code...
            $this->update_model->gagal_calon_relawan();
            $this->session->set_flashdata('berhasil_konfirmasi_ujian', '<div class="berhasil_konfirmasi_ujian"></div>');
            redirect('staff/relawan/nilai');
        endif;
    }
}
        
    /* End of file  ControllerStaffNilai.php */
