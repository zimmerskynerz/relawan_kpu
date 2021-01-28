// Kirim Berkas
$('.sukses_kirim_berkas').show(function () {
    swal('Berhasil!', 'Berhasil Kirim Berkas!', 'success');
});
  // Kirim Laporan
$('.berhasil_kirim_laporan').show(function () {
  swal('Berhasil!', 'Berhasil Kirim Laporan!', 'success');
});
$('.berhasil_kirim_ulang').show(function () {
  swal('Berhasil!', 'Berhasil Kirim Ulang Laporan!', 'success');
});
$('.gagal_kirim_laporan').show(function () {
  swal('Opsss...!!!', 'Karyawan sudah mengisi laporan tugas harian!', 'error');
});