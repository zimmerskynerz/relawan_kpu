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
// Menu Halaman Nilai
$route['staff/relawan/nilai']                   = 'staff/ControllerStaffNilai/index';
$route['staff/relawan/crudnilai']               = 'staff/ControllerStaffNilai/crudnilai';
// Menu Halaman Relawan
$route['staff/relawan/relawan']                 = 'staff/ControllerStaffRelawan/index';
$route['staff/relawan/crudrelawan']             = 'staff/ControllerStaffRelawan/crudrelawan';
// Menu Halaman Tugas
$route['staff/relawan/tugas']                   = 'staff/ControllerStaffTugas/index';
$route['staff/relawan/detail_tugas/(:any)']     = 'staff/ControllerStaffTugas/detail_tugas/$1';
$route['staff/relawan/laporan_tugas/(:any)']    = 'staff/ControllerStaffTugas/laporan_tugas/$1';
$route['staff/relawan/crudtugas']               = 'staff/ControllerStaffTugas/crudtugas';
// Menu Halaman Gaji
$route['staff/relawan/gaji']                    = 'staff/ControllerStaffGaji/index';
$route['staff/relawan/detail_gaji/(:any)']      = 'staff/ControllerStaffGaji/detail_gaji/$1';
$route['staff/relawan/crudgaji']                = 'staff/ControllerStaffGaji/crudgaji';
// Menu Laporan
$route['staff/laporan/pendaftaran']             = 'staff/ControllerStaffLaporan/pendaftaran';
$route['staff/laporan/gaji_relawan']            = 'staff/ControllerStaffLaporan/gaji_relawan';


// Halaman Relawan
$route['relawan']                                       = 'relawan/ControllerRelawanBeranda/index';
$route['relawan/beranda']                               = 'relawan/ControllerRelawanBeranda/index';
$route['relawan/beranda/cruddaftar']                    = 'relawan/ControllerRelawanBeranda/cruddaftar';
// Halaman Ujian
$route['relawan/ujian/mulai/(:any)']                    = 'relawan/ControllerRelawanUjian/index/$1';
$route['relawan/ujian/mulai/(:any)/(:num)']             = 'relawan/ControllerRelawanUjian/index/$1/$2';
$route['relawan/ujian/store_jawaban']                   = 'relawan/ControllerRelawanUjian/storeJawaban';
$route['relawan/ujian/cek_number']                      = 'relawan/ControllerRelawanUjian/cekNumber';
$route['relawan/ujian/cek_soal']                        = 'relawan/ControllerRelawanUjian/cekSoal';
$route['relawan/ujian/selesai_ujian']                   = 'relawan/ControllerRelawanUjian/selesaiUjian';
// Hlaman Tugas
$route['relawan/tugas']                                 = 'relawan/ControllerRelawanTugas/index';
$route['relawan/tugas/absen_tugas/(:any)']              = 'relawan/ControllerRelawanTugas/absen_tugas/$1';
$route['relawan/tugas/crudabsen']                       = 'relawan/ControllerRelawanTugas/crudabsen';
// Halaman Relawan
$route['relawan/sertifikat']                            = 'relawan/ControllerRelawanSertifikat/index';
$route['relawan/profile']                               = 'relawan/ControllerRelawanProfile/index';
$route['relawan/sertifikat']                            = 'relawan/SertifikatController/index';
$route['relawan/sertifikat/pdf']                        = 'relawan/SertifikatController/pdf';
