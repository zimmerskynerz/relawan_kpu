<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffBankSoal extends CI_Controller
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
            $bank_soal       = $this->select_model->getDataSoalPeriode();
            $periode         = $this->select_model->getDataPeriode();
            $data = array(
                'folder'       => 'bank_soal',
                'halaman'      => 'index',
                // Data Staff Periode Ujian
                'data_periode' => $periode,
                'data_bank'    => $bank_soal
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function crudsoal()
    {
        if (isset($_POST['simpan_bank_soal'])) :
            $id_periode     = $this->input->post('id_periode');
            $cek_data = $this->db->get_where('tbl_ujian', ['id_periode' => $id_periode, 'status !=' => 'HAPUS'])->row_array();
            if ($cek_data > 1) :
                $this->session->set_flashdata('gagal_tambah_bank', '<div class="gagal_tambah_bank"></div>');
            else :
                $this->insert_model->simpan_bank_soal($id_periode);
                $this->session->set_flashdata('sukses_tambah_bank', '<div class="sukses_tambah_bank"></div>');
            endif;
            redirect('staff/bank_soal');
        endif;
        if (isset($_POST['hapus_bank_soal'])) :
            $this->update_model->hapus_bank_soal();
            $this->session->set_flashdata('sukses_hapus_bank_soal', '<div class="sukses_hapus_bank_soal"></div>');
            redirect('staff/bank_soal');
        endif;
        if (isset($_POST['aktif_bank_soal'])) :
            $this->update_model->aktif_bank_soal();
            $this->session->set_flashdata('sukses_aktif_bank_soal', '<div class="sukses_aktif_bank_soal"></div>');
            redirect('staff/bank_soal');
        endif;
        if (isset($_POST['blokir_bank_soal'])) :
            $this->update_model->blokir_bank_soal();
            $this->session->set_flashdata('sukses_blokir_bank_soal', '<div class="sukses_blokir_bank_soal"></div>');
            redirect('staff/bank_soal');
        endif;
    }
}
        
    /* End of file  ControllerStaffBankSoal.php */
