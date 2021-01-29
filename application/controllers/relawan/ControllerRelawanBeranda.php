<?php defined('BASEPATH') or exit('No direct script access allowed');

use Carbon\Carbon;
use Carbon\CarbonInterval;

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
        $data_soal  = self::isSelesai($data_soal);
        $cert       = self::isCert($data_login['tgl_daftar']);

        if ($data_login['level'] == 'relawan') :
            if ($data_login['status'] == 'PROSES_DAFTAR') :
                // Relawan Baru Daftar atau Ditolak pendaftarannya karena tidak memenuhi syarat
                $halaman      = 'proses_daftar';
                $folder       = 'beranda';
                $aktifitas    = 'limit';
            elseif ($data_login['status'] == 'GAGAL') :
                // Relawan Menunggu Konfirmasi Berkas Dari Staff
                $halaman      = 'gagal';
                $folder       = 'beranda';
                $aktifitas    = 'limit';
            elseif ($data_login['status'] == 'DAFTAR') :
                // Relawan Menunggu Konfirmasi Berkas Dari Staff
                $halaman      = 'konfirmasi_berkas';
                $folder       = 'beranda';
                $aktifitas    = 'limit';
            elseif ($data_login['status'] == 'UJIAN') :
                // Halaman dimana Relawan Dikonfirmasi Lulus Administrasi dan siap ujian
                $halaman      = 'ujian';
                $folder       = 'beranda';
                $aktifitas    = 'limit';
            elseif ($data_login['status'] == 'UJIAN_SELESAI') :
                // Relawan Menunggu Konfirmasi Berkas Dari Staff
                $nilai        = $this->db->get_where('tbl_nilai_ujian', ['id_relawan' => $data_diri['id_relawan']])->row_array();
                $halaman      = 'ujian_selesai';
                $folder       = 'beranda';
                $aktifitas    = 'limit';
            else :
                // Halaman dimana Relawan sudah diterima dan siap menjalankan tugasnya sebagai relawan demokrasi
                $nilai        = $this->db->get_where('tbl_nilai_ujian', ['id_relawan' => $data_diri['id_relawan']])->row_array();
                $halaman      = 'index';
                $folder       = 'tugas';
                $aktifitas    = 'full';
            endif;
            $id_relawan = $data_diri['id_relawan'];
            $data_tugas = $this->select_model->getDataTugas($id_relawan);
            $data = array(
                // Halaman Data FOlder
                'aktivitas'       => $aktifitas,
                'folder'          => $folder,
                'halaman'         => $halaman,
                // halaman data diri
                'data_diri'       => $data_diri,
                'data_login'      => $data_login,
                'data_konfirmasi' => $data_konfirmasi,
                'data_bank'       => $data_soal,
                'nilai'           => $nilai,
                'data_tugas'      => $data_tugas,
                'cert'            => $cert
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

    /**
     * time based validation
     * 
     * @param object $query
     * @return object $query
     */
    public static function isSelesai($query)
    {
        $new_data_ujian = [];
        if (count($query) > 0) {
            foreach ($query as $data) {
                $now    = Carbon::now();
                $start  = Carbon::createFromFormat('Y-m-d', $data->tgl_mulai)->format('Y-m-d');
                $end    = Carbon::createFromFormat('Y-m-d', $data->tgl_selesai)->format('Y-m-d');

                $start  = Carbon::parse($start);
                $end    = Carbon::parse($end);
                if ($now->between($start, $end)) {
                    $data->isSelesai = false;
                } else {
                    $data->isSelesai = true;
                }

                $new_data_ujian[] = $data;
            }
        }

        return $new_data_ujian;
    }

    /**
     * check sertifikat (+3 bulan)
     * 
     * @param date $date
     * @return boolean
     */
    public static function isCert($date)
    {
        $start = new Carbon($date);
        $later = $start->addMonth(3)->toDateString();
        $now = Carbon::now()->toDateString();

        return ($now >= $later) ? true : false;
    }
}
        
    /* End of file  ControllerRelawanBeranda.php */
