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
        $query = $this->db->where('A.status', 'AKTIF');
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
    function getKonfirmasi()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_konfirmasi');
        $query = $this->db->where('id_login', $this->session->userdata('id_login'));
        $query = $this->db->order_by('id_konfirmasi', 'DESC');
        $query = $this->db->get();
        return $query->row_array();
    }
    function getDataTugas($id_relawan)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tugas_relawan as A');
        $query = $this->db->join('tbl_tugas as B', 'A.id_tugas=B.id_tugas');
        $query = $this->db->where('A.id_relawan', $id_relawan);
        $query = $this->db->get();
        return $query->result();
    }
    function getDataTugasDetail($id_relawan, $id_tugas)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tugas_relawan');
        $query = $this->db->where('id_relawan', $id_relawan);
        $query = $this->db->where('id_tugas', $id_tugas);
        $query = $this->db->get();
        return $query->row_array();
    }
}
