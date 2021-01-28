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
    function reset_password_relawan()
    {
        $data_login = array(
            'password'       => password_hash('RELAWAN123abc', PASSWORD_DEFAULT)
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_login', $data_login);
    }
    function blokir_relawan()
    {
        $data_login = array(
            'status'       => 'BLOKIR'
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_login', $data_login);
    }
    function aktif_relawan()
    {
        $data_login = array(
            'status'       => 'AKTIF'
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
    // Kelola Pendaftaran
    public function terima_relawan()
    {
        $data_diri = array(
            'status' => 'UJIAN'
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_login', $data_diri);
    }
    public function revisi_relawan()
    {
        $data_diri = array(
            'status' => 'PROSES_DAFTAR'
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_login', $data_diri);
        $data_konfirmasi = array(
            'id_konfirmasi'     => '',
            'id_login'          => htmlspecialchars($this->input->post('id_login')),
            'tgl_konfirmasi'    => date('Y-m-d'),
            'alasan'            => htmlspecialchars($this->input->post('alasan'))
        );
        $this->db->insert('tbl_konfirmasi', $data_konfirmasi);
        $this->db->where('id_relawan', htmlspecialchars($this->input->post('id_relawan')));
        $this->db->delete('tbl_berkas');
    }
    public function tolak_relawan()
    {
        $data_diri = array(
            'status' => 'GAGAL'
        );
        $this->db->where('id_login', htmlspecialchars($this->input->post('id_login')));
        $this->db->update('tbl_login', $data_diri);
        $data_konfirmasi = array(
            'id_konfirmasi'     => '',
            'id_login'          => htmlspecialchars($this->input->post('id_login')),
            'tgl_konfirmasi'    => date('Y-m-d'),
            'alasan'            => htmlspecialchars($this->input->post('alasan'))
        );
        $this->db->insert('tbl_konfirmasi', $data_konfirmasi);
        $this->db->where('id_relawan', htmlspecialchars($this->input->post('id_relawan')));
        $this->db->delete('tbl_berkas');
    }
    public function terima_calon_relawan()
    {
        $data_login = array(
            'status' => 'AKTIF'
        );
        // var_dump($data_login);
        // die;
        $this->db->where('email', htmlentities($this->input->post('email')));
        $this->db->update('tbl_login', $data_login);
        $data_diri = array(
            'gaji' => 1200000
        );
        $this->db->where('id_relawan', htmlentities($this->input->post('id_relawan')));
        $this->db->update('tbl_relawan', $data_diri);
    }
    public function gagal_calon_relawan()
    {
        $data_login = array(
            'status' => 'GAGAL'
        );
        $this->db->where('email', htmlentities($this->input->post('email')));
        $this->db->update('tbl_login', $data_login);
    }
    // Kelola Tugas
    public function hapus_tugas()
    {
        $data_tugas = array(
            'status'          => 'HAPUS'
        );
        $this->db->where('id_tugas', $this->input->post('id_tugas'));
        $this->db->update('tbl_tugas', $data_tugas);
    }
    public function ubah_tugas()
    {
        $data_tugas = array(
            'nm_tugas'        => htmlentities($this->input->post('nm_tugas')),
            'detail_tugas'    => htmlentities($this->input->post('detail_tugas')),
            'jml_laporan'     => htmlentities($this->input->post('jml_laporan'))
        );
        $this->db->where('id_tugas', $this->input->post('id_tugas'));
        $this->db->update('tbl_tugas', $data_tugas);
    }
    public function terima_laporan()
    {
        $data_tugas = array(
            'komentar' => 'Sudah Diterima',
            'status'   => 'SELESAI'
        );
        $this->db->where('id_relawan_tugas', $this->input->post('id_relawan_tugas'));
        $this->db->where('tgl_laporan', $this->input->post('tgl_laporan'));
        $this->db->update('relawan', $data_tugas);
    }
    public function revisi_laporan()
    {
        $data_tugas = array(
            'komentar' => htmlentities($this->input->post('komentar')),
            'status'   => 'REVISI'
        );
        $this->db->where('id_relawan_tugas', $this->input->post('id_relawan_tugas'));
        $this->db->where('tgl_laporan', $this->input->post('tgl_laporan'));
        $this->db->update('relawan', $data_tugas);
    }
}
