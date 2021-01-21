<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    // Kelola Data Staff
    function ubah_staff()
    {
        $data_login = array(
            'email'       => htmlspecialchars($this->input->post('email'))
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_login', $data_login);
        $data_staff = array(
            'nm_staff'      => htmlspecialchars($this->input->post('nm_staff')),
            'alamat'        => htmlspecialchars($this->input->post('alamat')),
            'no_hp'         => htmlspecialchars($this->input->post('no_hp'))
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_staff', $data_staff);
    }
    function aktif_staff()
    {
        $data_login = array(
            'status'       => 'AKTIF'
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_login', $data_login);
    }
    function blokir_staff()
    {
        $data_login = array(
            'status'       => 'BLOKIR'
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_login', $data_login);
    }
    function reset_password()
    {
        $data_login = array(
            'password'       => password_hash('STAFF123abc', PASSWORD_DEFAULT)
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_login', $data_login);
    }
    // Kelola Data Periode
    function ubah_periode()
    {
        $data_periode = array(
            'tgl_mulai'          => $this->input->post('tgl_mulai'),
            'tgl_selesai'        => $this->input->post('tgl_selesai'),
            'jml_relawan'        => $this->input->post('jml_relawan')
        );
        $this->db->where('id_periode', $this->input->post('id_periode'));
        $this->db->update('tbl_periode', $data_periode);
    }
    function hapus_periode()
    {
        $data_periode = array(
            'status' => 'HAPUS'
        );
        $this->db->where('id_periode', $this->input->post('id_periode'));
        $this->db->update('tbl_periode', $data_periode);
    }
    function hapus_bank_soal()
    {
        $data_bank = array(
            'status'           => 'HAPUS'
        );
        $this->db->where('id_ujian', htmlentities($this->input->post('id_ujian')));
        $this->db->update('tbl_ujian', $data_bank);
    }
    function aktif_bank_soal()
    {
        $data_bank = array(
            'jml_soal'         => $this->input->post('jml_soal'),
            'status'           => 'AKTIF'
        );
        $this->db->where('id_ujian', htmlentities($this->input->post('id_ujian')));
        $this->db->update('tbl_ujian', $data_bank);
    }
    function blokir_bank_soal()
    {
        $data_bank = array(
            'status'           => 'PROSES'
        );
        $this->db->where('id_ujian', htmlentities($this->input->post('id_ujian')));
        $this->db->update('tbl_ujian', $data_bank);
    }
    public function ubah_soal()
    {
        $id_soal = htmlspecialchars($this->input->post('id_soal'));
        $data = array(
            'soal' => $this->input->post('mytextarea'),
            'jawaban' => $this->input->post('jawaban_benar')
        );
        $this->db->where('id_soal', htmlspecialchars($this->input->post('id_soal')));
        $this->db->update('tbl_soal', $data);
        $data1 = array(
            'ket_jawaban' => $this->input->post('jawabanA')
        );
        $data2 = array(
            'ket_jawaban' => $this->input->post('jawabanB')
        );
        $data3 = array(
            'ket_jawaban' => $this->input->post('jawabanC')
        );
        $data4 = array(
            'ket_jawaban' => $this->input->post('jawabanD')
        );
        $data5 = array(
            'ket_jawaban' => $this->input->post('jawabanE')
        );
        $this->db->where('id_soal', $id_soal);
        $this->db->where('jawaban', 'A');
        $this->db->update('tbl_jawaban', $data1);
        $this->db->where('id_soal', $id_soal);
        $this->db->where('jawaban', 'B');
        $this->db->update('tbl_jawaban', $data2);
        $this->db->where('id_soal', $id_soal);
        $this->db->where('jawaban', 'C');
        $this->db->update('tbl_jawaban', $data3);
        $this->db->where('id_soal', $id_soal);
        $this->db->where('jawaban', 'D');
        $this->db->update('tbl_jawaban', $data4);
        $this->db->where('id_soal', $id_soal);
        $this->db->where('jawaban', 'E');
        $this->db->update('tbl_jawaban', $data5);
    }
    public function hapus_soal()
    {
        $data = array(
            'status' => 'HAPUS'
        );
        $this->db->where('id_soal', htmlspecialchars($this->input->post('id_soal')));
        $this->db->update('tbl_soal', $data);
    }
}
