<?php defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    function simpan_staff()
    {
        $data_login = array(
            'id_login'    => '',
            'email'       => htmlentities($this->input->post('email')),
            'password'    => password_hash('STAFF123abc', PASSWORD_DEFAULT),
            'level'       => 'staff',
            'status'      => 'AKTIF',
            'tgl_daftar'  => date('Y-m-d')
        );
        $this->db->insert('tbl_login', $data_login);
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
        $id_login = $cek_data['id_login'];
        $data_staff = array(
            'id_login'      => $id_login,
            'nm_staff'      => htmlspecialchars($this->input->post('nm_staff')),
            'alamat'        => htmlspecialchars($this->input->post('alamat')),
            'no_hp'         => htmlspecialchars($this->input->post('no_hp'))
        );
        $this->db->insert('tbl_staff', $data_staff);
    }
    function simpan_periode($tahun)
    {
        $data_periode = array(
            'id_periode'         => '',
            'tahun'              => $tahun,
            'tgl_mulai'          => $this->input->post('tgl_mulai'),
            'tgl_selesai'        => $this->input->post('tgl_selesai'),
            'jml_relawan'        => $this->input->post('jml_relawan'),
            'status'             => 'ADA'
        );
        $this->db->insert('tbl_periode', $data_periode);
    }
    function simpan_bank_soal($id_periode)
    {
        $data_bank = array(
            'id_ujian'         => '',
            'id_periode'       => $id_periode,
            'tgl_tambah'       => date('Y-m-d'),
            'jml_soal'         => $this->input->post('jml_soal'),
            'status'           => 'PROSES'
        );
        $this->db->insert('tbl_ujian', $data_bank);
    }
    function tambah_soal()
    {
        $data = array(
            'id_soal' => '',
            'id_ujian' => $this->input->post('id_ujian'),
            'soal' => $this->input->post('mytextarea'),
            'jawaban' => $this->input->post('jawaban_benar'),
            'status' => 'PROSES'
        );
        $this->db->insert('tbl_soal', $data);
        $data_soal = $this->db->get_where('tbl_soal', ['soal' => $this->input->post('mytextarea')])->row_array();
        $id_soal = $data_soal['id_soal'];
        $data1 = array(
            'id_soal' => $id_soal,
            'jawaban' => 'A',
            'ket_jawaban' => $this->input->post('jawabanA')
        );
        $data2 = array(
            'id_soal' => $id_soal,
            'jawaban' => 'B',
            'ket_jawaban' => $this->input->post('jawabanB')
        );
        $data3 = array(
            'id_soal' => $id_soal,
            'jawaban' => 'C',
            'ket_jawaban' => $this->input->post('jawabanC')
        );
        $data4 = array(
            'id_soal' => $id_soal,
            'jawaban' => 'D',
            'ket_jawaban' => $this->input->post('jawabanD')
        );
        $data5 = array(
            'id_soal' => $id_soal,
            'jawaban' => 'E',
            'ket_jawaban' => $this->input->post('jawabanE')
        );
        $this->db->insert('tbl_jawaban', $data1);
        $this->db->insert('tbl_jawaban', $data2);
        $this->db->insert('tbl_jawaban', $data3);
        $this->db->insert('tbl_jawaban', $data4);
        $this->db->insert('tbl_jawaban', $data5);
        $data23 = array(
            'status' => 'ADA'
        );
        $this->db->where('id_soal', $id_soal);
        $this->db->update('tbl_soal', $data23);
    }
    function simpan_tugas()
    {
        $data_tugas = array(
            'id_tugas'        => '',
            'nm_tugas'        => htmlentities($this->input->post('nm_tugas')),
            'detail_tugas'    => htmlentities($this->input->post('detail_tugas')),
            'jml_laporan'     => htmlentities($this->input->post('jml_laporan')),
            'status'          => 'ADA'
        );
        $this->db->insert('tbl_tugas', $data_tugas);
    }
    function bagi_tugas()
    {
        $data_bagi = array(
            'id_relawan_tugas'   => '',
            'id_tugas'           => htmlentities($this->input->post('id_tugas')),
            'id_relawan'         => htmlentities($this->input->post('id_relawan')),
            'status'             => 'PROSES'
        );
        $this->db->insert('tugas_relawan', $data_bagi);
    }
    function simpan_gaji($id_relawan)
    {
        $cek_gaji = $this->db->get_where('tbl_relawan', ['id_relawan' => $id_relawan])->row_array();
        $tgl_gaji = date('Y-m-d');
        $gaji     = $cek_gaji['gaji'];
        $data_gaji = array(
            'id_gaji' => '',
            'id_relawan' => $id_relawan,
            'jml_gaji' => $gaji,
            'tgl_gaji' => $tgl_gaji
        );
        $this->db->insert('tbl_gaji', $data_gaji);
    }
}
