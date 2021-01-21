<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerStaffBeranda extends CI_Controller
{

    public function index()
    {
        $data = array(
            'folder'      => 'beranda',
            'halaman'     => 'index'
        );
        $this->load->view('staff/include/index', $data);
    }
}
        
    /* End of file  ControllerStaffBeranda.php */
