<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffTugas extends CI_Controller
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
            $data_tugas = $this->db->get_where('tbl_tugas', ['status' => 'ADA'])->result();
            $data = array(
                'folder'              => 'tugas',
                'halaman'             => 'index',
                // Data Calon Relawan
                'data_tugas'  => $data_tugas
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function detail_tugas($id)
    {
        $id_tugas = $id;
        $data_tugas = $this->db->get_where('tbl_tugas', ['id_tugas' => $id_tugas])->row_array();
        $cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'staff') :
            $data_tugas_relawan = $this->select_model->getDataRelawanTUgas($id_tugas);
            $data_relawan = $this->select_model->getDataRelawanAktif();
            $data = array(
                'folder'              => 'tugas',
                'halaman'             => 'tugas',
                // Data Calon Relawan
                'data_tugas_relawan'  => $data_tugas_relawan,
                'data_relawan'        => $data_relawan,
                'data_tugas'          => $data_tugas
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function laporan_tugas($id)
    {
        $id_relawan_tugas = $id;
        $cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'staff') :
            $data_laporan = $this->db->get_where('relawan', ['id_relawan_tugas' => $id_relawan_tugas])->result();
            // var_dump($data_laporan);
            // die;
            $data = array(
                'folder'              => 'tugas',
                'halaman'             => 'laporan',
                // Data Calon Relawan
                'data_laporan'  => $data_laporan
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function crudtugas()
    {
        if (isset($_POST['simpan_tugas'])) :
            $this->insert_model->simpan_tugas();
            $this->session->set_flashdata('sukses_simpan_tugas', '<div class="sukses_simpan_tugas"></div>');
            redirect('staff/relawan/tugas');
        endif;
        if (isset($_POST['hapus_tugas'])) :
            $this->update_model->hapus_tugas();
            $this->session->set_flashdata('sukses_hapus_tugas', '<div class="sukses_hapus_tugas"></div>');
            redirect('staff/relawan/tugas');
        endif;
        if (isset($_POST['ubah_tugas'])) :
            $this->update_model->ubah_tugas();
            $this->session->set_flashdata('sukses_ubah_tugas', '<div class="sukses_ubah_tugas"></div>');
            redirect('staff/relawan/tugas');
        endif;
        if (isset($_POST['bagi_tugas'])) :
            $id_tugas   = $this->input->post('id_tugas');
            $id_relawan = $this->input->post('id_relawan');
            $cek_data = $this->db->get_where('tugas_relawan', ['id_tugas' => $id_tugas, 'id_relawan' => $id_relawan, 'status' => 'PROSES'])->row_array();
            if ($cek_data > 0) :
                $this->session->set_flashdata('gagal_bagi_tugas', '<div class="gagal_bagi_tugas"></div>');
            else :
                $this->insert_model->bagi_tugas();
                $this->session->set_flashdata('sukses_bagi_tugas', '<div class="sukses_bagi_tugas"></div>');
            endif;
            redirect('staff/relawan/detail_tugas/' . $id_tugas . '');
        endif;
        if (isset($_POST['terima_laporan'])) :
            # code...
            $id_relawan_tugas = $this->input->post('id_relawan_tugas');
            $this->update_model->terima_laporan();
            $this->session->set_flashdata('sukses_terima_laporan', '<div class="sukses_terima_laporan"></div>');
            redirect('staff/relawan/laporan_tugas/' . $id_relawan_tugas . '');
        endif;
        if (isset($_POST['revisi_laporan'])) :
            # code...
            $id_relawan_tugas = $this->input->post('id_relawan_tugas');
            $this->update_model->revisi_laporan();
            $this->session->set_flashdata('sukses_revisi_laporan', '<div class="sukses_revisi_laporan"></div>');
            redirect('staff/relawan/laporan_tugas/' . $id_relawan_tugas . '');
        endif;
    }
}
        
    /* End of file  ControllerStaffTugas.php */
