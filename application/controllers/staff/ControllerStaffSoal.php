<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffSoal extends CI_Controller
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
    public function lihat_soal($id)
    {
        $id_ujian = $id;
        $cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'staff') :
            $data_soal       = $this->select_model->getDataSoal($id_ujian);
            $data = array(
                'folder'      => 'soal',
                'halaman'     => 'index',
                // Data Staff Periode
                'data_soal'  => $data_soal,
                'id_ujian'   => $id_ujian
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function tambah_soal($id)
    {
        $id_ujian = $id;
        $cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'staff') :
            $data_soal       = $this->select_model->getDataSoal($id_ujian);
            $data = array(
                'folder'      => 'soal',
                'halaman'     => 'tambah_soal',
                // Data Staff Periode
                'data_soal'  => $data_soal,
                'id_ujian'   => $id_ujian
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function edit_soal($id)
    {
        $id_soal = $id;
        $cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'staff') :
            $detail_soal = $this->db->get_where('tbl_soal', ['id_soal' => $id_soal])->row_array();
            $id_ujian  = $detail_soal['id_ujian'];
            $jawaban_A = $this->db->get_where('tbl_jawaban', ['id_soal' => $id_soal, 'jawaban' => 'A'])->row_array();
            $jawaban_B = $this->db->get_where('tbl_jawaban', ['id_soal' => $id_soal, 'jawaban' => 'B'])->row_array();
            $jawaban_C = $this->db->get_where('tbl_jawaban', ['id_soal' => $id_soal, 'jawaban' => 'C'])->row_array();
            $jawaban_D = $this->db->get_where('tbl_jawaban', ['id_soal' => $id_soal, 'jawaban' => 'D'])->row_array();
            $jawaban_E = $this->db->get_where('tbl_jawaban', ['id_soal' => $id_soal, 'jawaban' => 'E'])->row_array();
            $data = array(
                'folder'      => 'soal',
                'halaman'     => 'edit_soal',
                // Data Tugas
                'id_ujian'  => $id_ujian,
                'detail_soal' => $detail_soal,
                'jawaban_A' => $jawaban_A,
                'jawaban_B' => $jawaban_B,
                'jawaban_C' => $jawaban_C,
                'jawaban_D' => $jawaban_D,
                'jawaban_E' => $jawaban_E
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function jawabansoal()
    {
        if (isset($_POST['tambah_soal'])) :
            # code...
            $id_ujian = htmlentities($this->input->post('id_ujian'));
            $this->insert_model->tambah_soal();
            $this->session->set_flashdata('sukses_tambah_soal', '<div class="sukses_tambah_soal"></div>');
            redirect('staff/bank_soal/lihat_soal/' . $id_ujian . '');
        endif;
        if (isset($_POST['ubah_soal'])) :
            # code...
            $id_ujian = htmlentities($this->input->post('id_ujian'));
            $this->update_model->ubah_soal();
            $this->session->set_flashdata('sukses_ubah_soal', '<div class="sukses_ubah_soal"></div>');
            redirect('staff/bank_soal/lihat_soal/' . $id_ujian . '');
        endif;
        if (isset($_POST['hapus_soal'])) :
            # code...
            $id_ujian = htmlentities($this->input->post('id_ujian'));
            $this->update_model->hapus_soal();
            $this->session->set_flashdata('sukses_hapus_soal', '<div class="sukses_hapus_soal"></div>');
            redirect('staff/bank_soal/lihat_soal/' . $id_ujian . '');
        endif;
    }
}
        
    /* End of file  ControllerStaffSoal.php */
