<?php

class ProfilController extends CI_Controller
{
    public function index()
    {
        $data_login = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row();
        $data_diri  = $this->db->get_where('tbl_relawan', ['id_login' => $this->session->userdata('id_login')])->row();
        $data = array(
            // Halaman Data FOlder
            'aktivitas'     => 'full',
            'folder'        => 'profil',
            'halaman'       => 'index',
            'login'         => $data_login,
            'relawan'       => $data_diri
        );

        return $this->load->view('relawan/include/index', $data);
    }

    public function update()
    {
        if (!empty($_POST['password'])) {
            $this->db->where('id_login', $this->session->userdata('id_login'));
            $this->db->update('tbl_login', ['password' => password_hash($_POST['password'], PASSWORD_BCRYPT)]);
        }

        if (!empty($_POST['email'])) {
            $this->db->where('id_login', $this->session->userdata('id_login'));
            $this->db->update('tbl_login', ['email' => $_POST['email']]);
        }

        $data_relawan = [
            'nm_relawan'    => $_POST['nm_relawan'],
            'no_hp'         => $_POST['no_hp']
        ];

        $this->db->where('id_login', $this->session->userdata('id_login'));
        $this->db->update('tbl_relawan', $data_relawan);
        $this->session->set_flashdata('success', true);
        return redirect('/relawan/profile');
    }
}
