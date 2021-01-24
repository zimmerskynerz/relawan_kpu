<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerRelawanBeranda extends CI_Controller
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
        $data_login = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data_diri  = $this->db->get_where('tbl_relawan', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data_konfirmasi = $this->select_model->getKonfirmasi();
        $data_soal  = $this->select_model->getDataSoalPeriode();
        if ($data_login['level'] == 'relawan') :
            if ($data_login['status'] == 'PROSES_DAFTAR') :
                // Relawan Baru Daftar atau Ditolak pendaftarannya karena tidak memenuhi syarat
                $halaman      = 'proses_daftar';
                $aktifitas    = 'limit';
            elseif ($data_login['status'] == 'GAGAL') :
                // Relawan Menunggu Konfirmasi Berkas Dari Staff
                $halaman      = 'gagal';
                $aktifitas    = 'limit';
            elseif ($data_login['status'] == 'DAFTAR') :
                // Relawan Menunggu Konfirmasi Berkas Dari Staff
                $halaman      = 'konfirmasi_berkas';
                $aktifitas    = 'limit';
            elseif ($data_login['status'] == 'UJIAN') :
                // Halaman dimana Relawan Dikonfirmasi Lulus Administrasi dan siap ujian
                $halaman      = 'ujian';
                $aktifitas    = 'limit';
            elseif ($data_login['status'] == 'SELESAI') :
                // Relawan Menunggu Konfirmasi Berkas Dari Staff
                $halaman      = 'ujian';
                $aktifitas    = 'selesai';
            else :
                // Halaman dimana Relawan sudah diterima dan siap menjalankan tugasnya sebagai relawan demokrasi
                $halaman      = 'index';
                $aktifitas    = 'full';
            endif;
            $data = array(
                // Halaman Data FOlder
                'aktivitas'       => $aktifitas,
                'folder'          => 'beranda',
                'halaman'         => $halaman,
                // halaman data diri
                'data_diri'       => $data_diri,
                'data_login'      => $data_login,
                'data_konfirmasi' => $data_konfirmasi,
                'data_bank'       => $data_soal
            );
            $this->load->view('relawan/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function cruddaftar()
    {
        if (isset($_POST['kirim_konfirmasi'])) :
            $this->update_model->ubah_data();
            $this->insert_model->kirim_berkas();
            $this->update_model->ubah_login();
            $this->session->set_flashdata('sukses_kirim_berkas', '<div class="sukses_kirim_berkas"></div>');
            redirect('relawan');
        endif;
    }
}
        
    /* End of file  ControllerRelawanBeranda.php */
