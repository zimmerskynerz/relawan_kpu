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
                'laporan_tugas'            => $laporan_tugas,
                'id_relawan_tugas'         => $id_relawan_tugas,
                'id_tugas'                 => $id_tugas
            );
            $this->load->view('relawan/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function crudabsen()
    {
        if (isset($_POST['kirim_laporan'])) :
            # code...
            $id_tugas = htmlentities($this->input->post('id_tugas'));
            $tgl_laporan = date('Y-m-d');
            $id_relawan_tugas = htmlentities($this->input->post('id_relawan_tugas'));
            $cek_laporan = $this->db->get_where('relawan', ['tgl_laporan' => $tgl_laporan, 'id_relawan_tugas' => $id_relawan_tugas])->row_array();
            if ($cek_laporan > 0) :
                # code...
                $this->session->set_flashdata('gagal_kirim_laporan', '<div class="gagal_kirim_laporan"></div>');
            else :
                $this->insert_model->kirim_laporan();
                $this->session->set_flashdata('berhasil_kirim_laporan', '<div class="berhasil_kirim_laporan"></div>');
            endif;
            // $this->insert_model->simpan_gaji($id_relawan);
            redirect('relawan/tugas/absen_tugas/' . $id_tugas . '');
        endif;
        if (isset($_POST['kirim_ulang'])) :
            # code...
            $id_tugas = htmlentities($this->input->post('id_tugas'));
            $this->update_model->kirim_ulang();
            $this->session->set_flashdata('berhasil_kirim_ulang', '<div class="berhasil_kirim_ulang"></div>');
            redirect('relawan/tugas/absen_tugas/' . $id_tugas . '');
        endif;
    }
}
        
    /* End of file  ControllerRelawanTugas.php */
