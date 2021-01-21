<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffPeriode extends CI_Controller
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
            $data_periode       = $this->select_model->getDataPeriode();
            $data = array(
                'folder'      => 'periode',
                'halaman'     => 'index',
                // Data Staff Periode
                'data_periode'  => $data_periode
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
    public function crudperiode()
    {
        if (isset($_POST['simpan_periode'])) :
            $tanggal_akhir = $this->input->post('tgl_selesai');
            $tahun         = date('Y', strtotime($tanggal_akhir));
            $cek_data = $this->db->get_where('tbl_periode', ['tahun' => $tahun, 'status' => 'ADA'])->row_array();
            if ($cek_data > 1) :
                $this->session->set_flashdata('gagal_tambah_periode', '<div class="gagal_tambah_periode"></div>');
            else :
                $this->insert_model->simpan_periode($tahun);
                $this->session->set_flashdata('sukses_tambah_periode', '<div class="sukses_tambah_periode"></div>');
            endif;
            redirect('staff/periode');
        endif;
        if (isset($_POST['ubah_periode'])) :
            $this->update_model->ubah_periode();
            $this->session->set_flashdata('sukses_ubah_periode', '<div class="sukses_ubah_periode"></div>');
            redirect('staff/periode');
        endif;
        if (isset($_POST['hapus_periode'])) :
            $this->update_model->hapus_periode();
            $this->session->set_flashdata('sukses_hapus_periode', '<div class="sukses_hapus_periode"></div>');
            redirect('staff/periode');
        endif;
    }
}
        
    /* End of file  ControllerStaffPeriode.php */
