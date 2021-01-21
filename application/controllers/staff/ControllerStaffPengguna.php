<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffPengguna extends CI_Controller
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
            $data_staff       = $this->select_model->getDataStaff();
            $data = array(
                'folder'      => 'pengguna',
                'halaman'     => 'index',
                // Data Staff Pengguna
                'data_staff'  => $data_staff
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function crudpengguna()
    {
        if (isset($_POST['simpan_staff'])) :
            $cek_data = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
            if ($cek_data > 1) :
                $this->session->set_flashdata('gagal_tambah_staff', '<div class="gagal_tambah_staff"></div>');
            else :
                $this->insert_model->simpan_staff();
                $this->session->set_flashdata('sukses_tambah_staff', '<div class="sukses_tambah_staff"></div>');
            endif;
            redirect('staff/pengguna');
        endif;
        if (isset($_POST['ubah_staff'])) :
            $cek_data = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
            if ($cek_data > 1) :
                $this->session->set_flashdata('gagal_ubah_staff', '<div class="gagal_ubah_staff"></div>');
            else :
                $this->update_model->ubah_staff();
                $this->session->set_flashdata('sukses_ubah_staff', '<div class="sukses_ubah_staff"></div>');
            endif;
            redirect('staff/pengguna');
        endif;
        if (isset($_POST['aktif_staff'])) :
            $this->update_model->aktif_staff();
            $this->session->set_flashdata('sukses_aktif_staff', '<div class="sukses_aktif_staff"></div>');
            redirect('staff/pengguna');
        endif;
        if (isset($_POST['blokir_staff'])) :
            $this->update_model->blokir_staff();
            $this->session->set_flashdata('sukses_blokir_staff', '<div class="sukses_blokir_staff"></div>');
            redirect('staff/pengguna');
        endif;
        if (isset($_POST['reset_password'])) :
            $this->update_model->reset_password();
            $this->session->set_flashdata('sukses_reset_password', '<div class="sukses_reset_password"></div>');
            redirect('staff/pengguna');
        endif;
    }
}
        
    /* End of file  ControllerStaffPengguna.php */
