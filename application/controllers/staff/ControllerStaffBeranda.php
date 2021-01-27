<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffBeranda extends CI_Controller
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
            $data_calon_relawan = $this->select_model->getDataCalonRelawan();
            $data = array(
                'folder'              => 'relawan',
                'halaman'             => 'pendaftaran',
                // Data Calon Relawan
                'data_calon_relawan'  => $data_calon_relawan
            );
            $this->load->view('staff/include/index', $data);
        else :
            redirect('login');
        endif;
    }
}
        
    /* End of file  ControllerStaffBeranda.php */
