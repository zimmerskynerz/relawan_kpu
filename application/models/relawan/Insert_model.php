<?php defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    function tambah_login()
    {
        $data_login = array(
            'id_login'    => '',
            'email'       => htmlentities($this->input->post('email')),
            'password'    => password_hash('STAFF123abc', PASSWORD_DEFAULT),
            'level'       => 'relawan',
            'status'      => 'PROSES_DAFTAR',
            'tgl_daftar'  => date('Y-m-d')
        );
        $this->db->insert('tbl_login', $data_login);
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
        $id_login = $cek_data['id_login'];
        $data_relawan = array(
            'id_login'      => $id_login,
            'id_relawan'    => '',
            'nm_relawan'    => htmlspecialchars($this->input->post('nm_relawan')),
            'tgl_lahir'     => htmlspecialchars($this->input->post('tgl_lahir')),
            'kota_lahir'    => null,
            'j_kelamin'     => null,
            'alamat'        => null,
            'gaji'          => null
        );
        $this->db->insert('tbl_relawan', $data_relawan);
    }
}
