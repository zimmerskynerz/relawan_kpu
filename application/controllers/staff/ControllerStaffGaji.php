<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffGaji extends CI_Controller
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
                'folder'              => 'gaji',
                'halaman'             => 'index',
                // Data Calon Relawan
                'data_relawan'        => $data_relawan
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function detail_gaji($id)
    {
        $id_relawan = $id;
        $cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'staff') :
            $data_gaji = $this->select_model->getDataGaji($id_relawan);
            $data = array(
                'folder'              => 'gaji',
                'halaman'             => 'detail_gaji',
                // Data Calon Relawan
                'data_gaji'           => $data_gaji,
                'id_relawan'          => $id_relawan
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function crudgaji()
    {
        if (isset($_POST['simpan_gaji'])) :
            $id_relawan = $this->input->post('id_relawan');
            $bulan      = date('m');
            $tahun      = date('Y');
            $cek_gaji = $this->db->get_where('tbl_gaji', ['id_relawan' => $id_relawan, 'month(tgl_gaji)' => $bulan, 'year(tgl_gaji)' => $tahun])->row_array();
            if ($cek_gaji > 0) :
                $this->session->set_flashdata('gagal_gaji', '<div class="gagal_gaji"></div>');
                redirect('staff/relawan/detail_gaji/' . $id_relawan . '');
            else :
                $this->insert_model->simpan_gaji($id_relawan);
                $this->session->set_flashdata('berhasil_gaji', '<div class="berhasil_gaji"></div>');
                redirect('staff/relawan/detail_gaji/' . $id_relawan . '');
            endif;
        endif;
    }
}
        
    /* End of file  ControllerStaffGaji.php */
