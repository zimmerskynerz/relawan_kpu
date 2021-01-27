<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffRelawan extends CI_Controller
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
            $data_relawan = $this->select_model->getDataRelawanAktif();
            $data = array(
                'folder'              => 'relawan',
                'halaman'             => 'index',
                // Data Calon Relawan
                'data_relawan'  => $data_relawan
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function crudrelawan()
    {
        if (isset($_POST['reset_password'])) :
            $this->update_model->reset_password_relawan();
            $this->session->set_flashdata('sukses_reset_password', '<div class="sukses_reset_password"></div>');
            redirect('staff/relawan/relawan');
        endif;
        if (isset($_POST['blokir_relawan'])) :
            $this->update_model->blokir_relawan();
            $this->session->set_flashdata('sukses_blokir_relawan', '<div class="sukses_blokir_relawan"></div>');
            redirect('staff/relawan/relawan');
        endif;
        if (isset($_POST['aktif_relawan'])) :
            $this->update_model->aktif_relawan();
            $this->session->set_flashdata('sukses_aktif_relawan', '<div class="sukses_aktif_relawan"></div>');
            redirect('staff/relawan/relawan');
        endif;
    }
}
        
    /* End of file  ControllerStaffRelawan.php */
