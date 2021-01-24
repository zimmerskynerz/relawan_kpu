<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']     = 'auth';
$route['404_override']           = 'lostpage';
$route['translate_uri_dashes']   = FALSE;

// Halaman Depan Relawan
$route['login']                      = 'Auth/index';
$route['logout']                     = 'Auth/logout';
$route['daftar']                     = 'Auth/daftar';
$route['cruddaftar']                 = 'Auth/cruddaftar';
$route['cek_login']                  = 'Auth/cek_login';

// Halaman Utama Staff KPU
$route['staff']                                 = 'staff/ControllerStaffBeranda/index';
$route['staff/beranda']                         = 'staff/ControllerStaffBeranda/index';
// Halaman Pengguna
$route['staff/pengguna']                        = 'staff/ControllerStaffPengguna/index';
$route['staff/pengguna/crudpengguna']           = 'staff/ControllerStaffPengguna/crudpengguna';
// Halaman Kelola Periode
$route['staff/periode']                         = 'staff/ControllerStaffPeriode/index';
$route['staff/periode/crudperiode']             = 'staff/ControllerStaffPeriode/crudperiode';
$route['staff/periode/list_pendaftar/(:any)']   = 'staff/ControllerStaffPeriode/list_pendaftar/$1';
// Halaman Kelola Soal Pendaftaran
$route['staff/bank_soal']                       = 'staff/ControllerStaffBankSoal/index';
$route['staff/bank_soal/crudsoal']              = 'staff/ControllerStaffBankSoal/crudsoal';
// Sub Halaman Lihat Soal
$route['staff/bank_soal/lihat_soal/(:any)']     = 'staff/ControllerStaffSoal/lihat_soal/$1';
$route['staff/bank_soal/tambah_soal/(:any)']    = 'staff/ControllerStaffSoal/tambah_soal/$1';
$route['staff/bank_soal/edit_soal/(:any)']      = 'staff/ControllerStaffSoal/edit_soal/$1';
$route['staff/bank_soal/jawabansoal']           = 'staff/ControllerStaffSoal/jawabansoal';
// Menu Halaman Relawan
$route['staff/relawan/pendaftaran']             = 'staff/ControllerStaffPendaftaran/index';
$route['staff/relawan/tampil_berkas/(:any)']    = 'staff/ControllerStaffPendaftaran/tampil_berkas/$1';
$route['staff/relawan/crudpendaftaran']         = 'staff/ControllerStaffPendaftaran/crudpendaftaran';


// Halaman Relawan
$route['relawan']                                       = 'relawan/ControllerRelawanBeranda/index';
$route['relawan/beranda']                               = 'relawan/ControllerRelawanBeranda/index';
$route['relawan/beranda/cruddaftar']                    = 'relawan/ControllerRelawanBeranda/cruddaftar';
$route['relawan/ujian/mulai/(:any)']                    = 'relawan/ControllerRelawanUjian/index/$1';
$route['relawan/ujian/mulai/(:any)/(:num)']             = 'relawan/ControllerRelawanUjian/index/$1/$2';
$route['relawan/ujian/store_jawaban']                   = 'relawan/ControllerRelawanUjian/storeJawaban';
$route['relawan/ujian/cek_number']                      = 'relawan/ControllerRelawanUjian/cekNumber';
$route['relawan/ujian/cek_soal']                        = 'relawan/ControllerRelawanUjian/cekSoal';
$route['relawan/ujian/selesai_ujian']                   = 'relawan/ControllerRelawanUjian/selesaiUjian';
