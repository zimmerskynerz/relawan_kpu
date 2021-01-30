<?php

require_once 'vendor/autoload.php';

use Carbon\Carbon;

if (!function_exists('isCertable')) {
    function isCertable()
    {
        $CI = &get_instance();
        $data = $CI->db->get_where('tbl_login', ['id_login' => $CI->session->userdata('id_login')])->row();
        $start = new Carbon($data->tgl_daftar);
        $later = $start->addMonth(3)->toDateString();
        $now = Carbon::now()->toDateString();

        return ($now >= $later) ? true : false;
    }
}
