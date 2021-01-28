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
    function kirim_berkas()
    {
        $id_relawan = htmlspecialchars($this->input->post('id_relawan'));
        $config['upload_path']          = './assets/berkas';
        $config['allowed_types']        = 'jpg|png|gif|jpeg';
        $config['encrypt_name']         = true;
        $config['overwrite']            = true;
        $config['max_size']             = 10024; // 10MB
        $this->load->library('upload', $config);
        $keterangan_berkas = $this->input->post('keterangan');
        $jumlah_berkas = count($_FILES['berkas']['name']);
        for ($i = 0; $i < $jumlah_berkas; $i++) {
            if (!empty($_FILES['berkas']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
                $_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
                $_FILES['file']['size'] = $_FILES['berkas']['size'][$i];
                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $data['id_relawan'] = $id_relawan;
                    $data['nm_berkas'] = $keterangan_berkas[$i];
                    $data['link_berkas'] = $uploadData['file_name'];
                    $this->db->insert('tbl_berkas', $data);
                }
            }
        }
    }
    function kirim_laporan()
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
                'tgl_laporan' => $tgl_ini,
                'id_relawan_tugas' => htmlspecialchars($this->input->post('id_relawan_tugas')),
                'link_laporan' => $uploadData['file_name'],
                'komentar' => null,
                'status' => 'KONFIRMASI'
            );
            $this->db->insert('relawan', $data);
        endif;
    }
}
