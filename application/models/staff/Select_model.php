<?php defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    function getDataStaff()
    {
        // SQL
        // Select * from tbl_login as A inner join tbl_staff as B on A.id_login=B.id_login order by id_login ASC
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_staff as B', 'A.id_login=B.id_login');
        $query  = $this->db->order_by('A.id_login', 'DESC');
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPeriode()
    {
        // SQL
        // Select * from tbl_periode as A inner join tbl_staff as B on A.id_login=B.id_login order by id_login ASC
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_periode');
        $query = $this->db->where('status', 'ADA');
        $query = $this->db->get();
        return $query->result();
    }
    function getDataSoalPeriode()
    {
        $query = $this->db->select('*, A.status as status_soal');
        $query = $this->db->from('tbl_ujian as A');
        $query = $this->db->join('tbl_periode as B', 'A.id_periode=B.id_periode');
        $query = $this->db->where('B.status', 'ADA');
        $query = $this->db->where('A.status !=', 'HAPUS');
        $query = $this->db->get();
        return $query->result();
    }
    function getDataSoal($id_ujian)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_soal');
        $query = $this->db->where('status', 'ADA');
        $query = $this->db->where('id_ujian', $id_ujian);
        $query = $this->db->get();
        return $query->result();
    }
    function getDataCalonRelawan()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_login as A');
        $query = $this->db->join('tbl_relawan as B', 'A.id_login=B.id_login');
        $query = $this->db->where('A.status', 'DAFTAR');
        $query = $this->db->get();
        return $query->result();
    }
    // Ambil data calon pendaftaran
    function getDataDiriCalonRelawan($id_relawan)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_login as A');
        $query = $this->db->join('tbl_relawan as B', 'A.id_login=B.id_login');
        $query = $this->db->where('A.status', 'DAFTAR');
        $query = $this->db->where('B.id_relawan', $id_relawan);
        $query = $this->db->get();
        return $query->row_array();
    }
    // Ambil data Nilai Calon Karyawan
    function getDataNilaiRelawan()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_login as A');
        $query = $this->db->join('tbl_relawan as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_nilai_ujian as C', 'B.id_relawan=C.id_relawan');
        $query = $this->db->where('A.status', 'UJIAN_SELESAI');
        $query = $this->db->get();
        return $query->result();
    }
    // Ambil data relawan aktif
    function getDataRelawanAktif()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_login as A');
        $query = $this->db->join('tbl_relawan as B', 'A.id_login=B.id_login');
        $query = $this->db->where('A.status', 'AKTIF');
        $query = $this->db->or_where('A.status', 'BLOKIR');
        $query = $this->db->get();
        return $query->result();
    }
    function getDataRelawanTUgas($id_tugas)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tugas_relawan as A');
        $query = $this->db->join('tbl_tugas as B', 'A.id_tugas=B.id_tugas');
        $query = $this->db->join('tbl_relawan as C', 'A.id_relawan=C.id_relawan');
        $query = $this->db->where('B.id_tugas', $id_tugas);
        $query = $this->db->get();
        return $query->result();
    }
    // Kelola Gaji
    function getDataGaji($id_relawan)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_gaji');
        $query = $this->db->where('id_relawan', $id_relawan);
        $query = $this->db->order_by('id_gaji', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    // Kelola Laporan
    function getDataCalonRelawanTanggal($bulan, $tahun)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_login as A');
        $query = $this->db->join('tbl_relawan as B', 'A.id_login=B.id_login');
        $query = $this->db->where('month(A.tgl_daftar)', $bulan);
        $query = $this->db->where('year(A.tgl_daftar)', $tahun);
        $query = $this->db->get();
        return $query->result();
    }
    function getGajiRelawanTanggal($bulan, $tahun)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_relawan as A');
        $query = $this->db->join('tbl_gaji as B', 'A.id_relawan=B.id_relawan');
        $query = $this->db->join('tbl_login as C', 'C.id_login=A.id_login');
        $query = $this->db->where('month(B.tgl_gaji)', $bulan);
        $query = $this->db->where('year(B.tgl_gaji)', $tahun);
        $query = $this->db->get();
        return $query->result();
    }
}
