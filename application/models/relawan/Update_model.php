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
    function kirim_ulang()
    {
        $tgl_ini                 = date('Y-m-d');
        $config['upload_path']   = './assets/berkas_tugas';
        $config['allowed_types'] = 'pdf|doc|docx|ppt|zip|rar';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 30024; // 30MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('link_laporan')) :
            $_FILES['file']['name'] = $_FILES['link_laporan']['name'];
            $_FILES['file']['type'] = $_FILES['link_laporan']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['link_laporan']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['link_laporan']['size'];
            $uploadData = $this->upload->data();
            $data = array(
                'link_laporan' => $uploadData['file_name'],
                'status' => 'KONFIRMASI'
            );
            $this->db->where('id_relawan_tugas', $this->input->post('id_relawan_tugas'));
            $this->db->where('tgl_laporan', $this->input->post('tgl_laporan'));
            $this->db->update('relawan', $data);
        endif;
        $file_pdf    = htmlspecialchars($this->input->post('link_laporan_lama'));
        $materi_lama = './assets/berkas_tugas/' . $file_pdf . '';
        unlink($materi_lama);
    }
}
