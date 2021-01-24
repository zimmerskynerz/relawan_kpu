<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    // Kirim Berkas dan ubah login
    function ubah_data()
    {
        $data_relawan = array(
            'kota_lahir'       => htmlspecialchars($this->input->post('kota_lahir')),
            'j_kelamin'        => htmlspecialchars($this->input->post('j_kelamin')),
            'no_hp'            => htmlspecialchars($this->input->post('no_hp')),
            'alamat'           => htmlspecialchars($this->input->post('alamat'))
        );
        $this->db->where('id_relawan', htmlspecialchars($this->input->post('id_relawan')));
        $this->db->update('tbl_relawan', $data_relawan);
    }
    function ubah_login()
    {
        $data_relawan = array(
            'status'       => 'DAFTAR'
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_login', $data_relawan);
    }
}
