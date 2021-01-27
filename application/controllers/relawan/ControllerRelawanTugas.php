<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerRelawanTugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('relawan/insert_model');
        $this->load->model('relawan/select_model');
        $this->load->model('relawan/update_model');
        $this->set_timezone();
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $cek_data     = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data_relawan = $this->db->get_where('tbl_relawan', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'relawan') :
            $id_relawan = $data_relawan['id_relawan'];
            $data_tugas = $this->select_model->getDataTugas($id_relawan);
            $data = array(
                'folder'              => 'tugas',
                'halaman'             => 'index',
                'aktivitas'           => 'full',
                // Data Calon Relawan
                'data_tugas'  => $data_tugas
            );
            $this->load->view('relawan/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function absen_tugas($id)
    {
        $id_tugas     = $id;
        $cek_data     = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data_relawan = $this->db->get_where('tbl_relawan', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'relawan') :
            $id_relawan = $data_relawan['id_relawan'];
            $data_tugas = $this->select_model->getDataTugasDetail($id_relawan, $id_tugas);
            $id_relawan_tugas = $data_tugas['id_relawan_tugas'];
            $laporan_tugas  = $this->db->get_where('relawan', ['id_relawan_tugas' => $id_relawan_tugas])->result();
            $data = array(
                'folder'                   => 'tugas',
                'halaman'                  => 'detail_tugas',
                'aktivitas'                => 'full',
                // Data Laporan
                'laporan_tugas'            => $laporan_tugas
            );
            $this->load->view('relawan/include/index', $data);
        else :
            redirect('login');
        endif;
    }
}
        
    /* End of file  ControllerRelawanTugas.php */
