<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('relawan/insert_model');
		$this->load->model('relawan/select_model');
		$this->load->model('relawan/update_model');
		$this->set_timezone();
	}
	public function set_timezone()
	{
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
		if ($cek_data['level'] == 'staff') :
			redirect('staff');
		elseif ($cek_data['level'] == 'relawan') :
			redirect('relawan');
		else :
			$this->load->view('login');
		endif;
	}
	public function daftar()
	{
		$cek_data = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
		if ($cek_data['level'] == 'staff') :
			redirect('staff');
		elseif ($cek_data['level'] == 'relawan') :
			redirect('relawan');
		else :
			$this->load->view('daftar');
		endif;
	}
	public function cek_login()
	{
		$email   = htmlspecialchars($this->input->post('email'));
		$password   = htmlspecialchars($this->input->post('password'));
		$cek_login  = $this->db->get_where('tbl_login', ['email' => $email, 'status' => 'AKTIF'])->row_array();
		if ($cek_login > 0) :
			if (password_verify($password, $cek_login['password'])) :
				$data_login = array(
					'id_login'  => $cek_login['id_login'],
					'email'  	=> $cek_login['email'],
					'level'     => $cek_login['level'],
					'status'    => $cek_login['status']
				);
				if ($cek_login['level'] == 'staff') :
					$this->session->set_userdata($data_login);
					redirect('staff');
				elseif ($cek_login['level'] == 'relawan') :
					$this->session->set_userdata($data_login);
					redirect('relawan');
				else :
					$this->session->sess_destroy();
					$this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Anda Belum Terdaftar!</div>');
					redirect('login');
				endif;
			else :
				// Password salah
				echo 'Gagal Login password';
			endif;
		else :
			// Tidak Ada Email
			echo 'Gagal Login email';
		endif;
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	public function cruddaftar()
	{
		$email     = htmlentities($this->input->post('email'));
		$cek_email = $this->db->get_where('tbl_login', ['email' => $email])->row_array();
		if ($cek_email > 1) :
			# code...
			$this->session->set_flashdata('email_ada', '<div class="alert alert-danger" id="email_ada" role="alert">Email sudah terdaftar!</div>');
			redirect('daftar');
		else :
			$this->insert_model->tambah_login();
			$this->session->set_flashdata('berhasil_daftar', '<div class="alert alert-success" id="berhasil_daftar" role="alert">Berhasil Daftar, SIlahkan Login!</div>');
			redirect('login');
		endif;
	}
}
