-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2021 pada 05.53
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kpu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `relawan`
--

CREATE TABLE `relawan` (
  `id_relawan` varchar(12) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `id_tugas` int(9) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id_relawan` varchar(12) NOT NULL,
  `nm_berkas` text NOT NULL,
  `ket_berkas` text NOT NULL,
  `scan_berkas` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `id_gaji` bigint(20) NOT NULL,
  `id_relawan` varchar(12) NOT NULL,
  `jml_gaji` int(9) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tgl_diambil` date DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jawaban`
--

CREATE TABLE `tbl_jawaban` (
  `id_soal` bigint(20) NOT NULL,
  `jawaban` varchar(1) NOT NULL,
  `ket_jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jawaban`
--

INSERT INTO `tbl_jawaban` (`id_soal`, `jawaban`, `ket_jawaban`) VALUES
(1, 'A', '23'),
(1, 'B', 'ewfsdf'),
(1, 'C', 'dsfsdf'),
(1, 'D', 'dsfsdf'),
(1, 'E', 'dsfsdf'),
(2, 'A', 'lembaga hierarkis'),
(2, 'B', 'lembaga structural'),
(2, 'C', 'lembaga permanen (tetap)'),
(2, 'D', 'lembaga administrasi pemilu'),
(2, 'E', 'lembaga non-struktural'),
(3, 'A', 'dewan etik'),
(3, 'B', 'komisi etik'),
(3, 'C', 'majelis kehormatan'),
(3, 'D', 'dewan kehormatan'),
(3, 'E', 'mahkamah etik'),
(4, 'A', 'tidak benar'),
(4, 'B', 'benar'),
(4, 'C', 'ragu-ragu'),
(4, 'D', 'tidak Salah'),
(4, 'E', 'salah'),
(5, 'A', 'pernyataan salah dan alasan benar'),
(5, 'B', 'pernyataan salah dan alasan salah'),
(5, 'C', 'pernyataan benar dan alasan salah'),
(5, 'D', 'pernyataan benar dan alasan benar, ada hubungan sebab akibat'),
(5, 'E', 'pernyataan benar dan alasan benar, tidak ada hubungan sebab akibat'),
(6, 'A', 'tidak tahu'),
(6, 'B', 'ragu-ragu'),
(6, 'C', 'salah'),
(6, 'D', 'benar'),
(6, 'E', 'semua benar'),
(7, 'A', 'tidak tahu'),
(7, 'B', 'kurang benar'),
(7, 'C', 'semua salah'),
(7, 'D', 'semua benar'),
(7, 'E', 'salah'),
(8, 'A', 'pernyataan benar dan alasan benar, tidak ada hubungan sebab akibat'),
(8, 'B', 'pernyataan benar dan alasan benar, ada hubungan sebab akibat'),
(8, 'C', 'pernyataan benar dan alasan salah'),
(8, 'D', 'pernyataan salah dan alasan salah'),
(8, 'E', 'pernyataan salah dan alasan benar'),
(9, 'A', 'tidak menghadiri rapat pleno yang menjadi tugas dan kewajibannya karena sakit'),
(9, 'B', 'melanggar sumpah/janji jabatan dan/atau kode etik penyelenggara Pemilu'),
(9, 'C', 'melakukan perbuatan yang terbukti menghambat PPK, PPS, KPPS, PPLN dan KPPSLN dalam mengambil keputusan dan penetapan sebagaimana ketentuan peraturan perundang-undangan'),
(9, 'D', 'dipidana penjara berdasarkan putusan pengadilan yang telah memperoleh kekuatan hukum tetap karena melakukan tindak pidana Pemilu dan/atau tindak pidana lainnya'),
(9, 'E', 'semua jawaban benar'),
(10, 'A', 'UU Nomor 11/2006, UU Nomor 8/2012 dan UU Nomor 42/2008'),
(10, 'B', 'UU Nomor 42/2018, UU Nomor 8/2011 dan UU Nomor 11/2006'),
(10, 'C', 'UU Nomor 15/2011, UU Nomor 8/2012 dan UU Nomor 10/2016'),
(10, 'D', 'UU Nomor 11/2011, UU Nomor 8/2012 dan UU Nomor 42/2008'),
(10, 'E', 'UU Nomor 15/2012, UU Nomor 8/2011 dan UU Nomor 24/2008'),
(11, 'A', 'pembubaran partai politik'),
(11, 'B', 'sanksi pidana pemilu'),
(11, 'C', 'sanksi etik'),
(11, 'D', 'sanksi administrasi Pemilu'),
(11, 'E', 'sanksi tidak mengikuti pemilu berikutnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jawaban_relawan`
--

CREATE TABLE `tbl_jawaban_relawan` (
  `id_relawan` varchar(12) DEFAULT NULL,
  `id_soal` bigint(20) NOT NULL,
  `jawaban` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` bigint(20) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` text NOT NULL,
  `level` enum('relawan','staff','ketua') NOT NULL,
  `status` text NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `email`, `password`, `level`, `status`, `tgl_daftar`) VALUES
(1, 'staff@kpu.co.id', '$2y$10$MqUBpjBHKNir5BA0u79hXuj/2n3Xs2iM3/vrpEzPD.37/lKXwvA7a', 'staff', 'AKTIF', '2021-01-01'),
(2, 'staff01@kpu.co.id', '$2y$10$5hg3i51jWY4AdjGjM0gGkeLyDth19dg9xDSVLLkDEiKpNKdlsye3a', 'staff', 'AKTIF', '2021-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_ujian`
--

CREATE TABLE `tbl_nilai_ujian` (
  `id_relawan` varchar(12) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `id_ujian` int(5) NOT NULL,
  `nilai_ujian` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_periode`
--

CREATE TABLE `tbl_periode` (
  `id_periode` int(5) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jml_relawan` int(5) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_periode`
--

INSERT INTO `tbl_periode` (`id_periode`, `tahun`, `tgl_mulai`, `tgl_selesai`, `jml_relawan`, `status`) VALUES
(1, 2021, '2021-01-19', '2021-02-06', 23, 'HAPUS'),
(2, 2021, '2021-01-20', '2021-02-06', 23, 'ADA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_relawan`
--

CREATE TABLE `tbl_relawan` (
  `id_login` bigint(20) NOT NULL,
  `id_relawan` varchar(12) NOT NULL,
  `nm_relawan` text NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kota_lahir` text DEFAULT NULL,
  `j_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `gaji` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` bigint(20) NOT NULL,
  `id_ujian` int(5) NOT NULL,
  `soal` text NOT NULL,
  `jawaban` varchar(1) DEFAULT NULL,
  `status` enum('PROSES','ADA','HAPUS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_soal`
--

INSERT INTO `tbl_soal` (`id_soal`, `id_ujian`, `soal`, `jawaban`, `status`) VALUES
(1, 1, '<p>asasas</p>', 'C', 'HAPUS'),
(2, 1, '<p><span xss=removed>Kedudukan KPU, KPU/KIP Provinsi, dan KPU/KIP Kabupaten/Kota secara kelembagaan adalah:</span></p>', 'D', 'ADA'),
(3, 1, '<p><span xss=removed>Sesuai peraturan KPU (PKPU) Nomor 10 Tahun 2018 tentang sosialisasi, pendidikan pemilih dan partisipasi masyarakat. Apabila terdapat rekomendasi dari Badan Pengawas Pemilu (Bawaslu) terhadap pelanggaran etika lembaga survei dan jajak pendapat dan penghitungan cepat hasil pemilu yang berawal dari pengaduan masyarakat. Maka KPU dapat membentuk:</span></p>', 'A', 'ADA'),
(4, 1, '<p><span xss=removed>Dalam penyusunan Daerah Pemilihan (Dapil), prinsip kesetaraan nilai suara, yaitu mengupayakan nilai suara atau harga kursi yang setara antara 1 (satu) dapil dengan dapil lainnya dengan prinsip 1 (satu) suara, 1 (satu) nilai.</span></p>', 'B', 'ADA'),
(5, 1, '<p xss=removed>Sesuai ketentuan Pasal 75 ayat (1) UU Nomor 7 Tahun 2017 tentang Pemilihan Umum, bahwa kedudukan Peraturan KPU dan Keputusan KPU adalah untuk menyelenggarakan Pemilu.</p>\r\n<p xss=removed>Sebab</p>\r\n<p xss=removed>Peraturan KPU yang berkaitan dengan pelaksanaan tahapan Pemilu wajib dikonsultasikan oleh Komisi Pemilihan Umum dengan Dewan Perwakilan Rakyat (DPR) dan Pemerintah melalui Rapat Dengar Pendapat (RDP).</p>', 'D', 'ADA'),
(6, 1, '<p><span xss=removed>Dalam pasal 19 ayat (1) UUD Tahun 1945 menegaskan bahwa anggota Dewan Perwakilan Rakyat (DPR) berasal dari Partai Politik (Parpol) yang dipilih rakyat melalui Pemilihan Umum</span></p>', 'C', 'ADA'),
(7, 1, '<p><span xss=removed>Bila ada putusan Mahkamah Agung (MA) terkait upaya hukum atas putusan pelanggaran administrasi Pemilu bersifat final dan mengikat.</span></p>', 'E', 'ADA'),
(8, 1, '<p xss=removed>Dalam hal terjadi rapat pleno KPU/KIP Kabupaten/Kota untuk menetapkan hasil Pemilu tidak tercapai kuorum, maka rapat pleno ditunda paling lama 3 (tiga) jam.</p>\r\n<p xss=removed>Sebab</p>\r\n<p xss=removed>Dalam rapat pleno KPU/KIP Kabupaten/Kota untuk menetapkan hasil Pemilu tidak dilakukan pemungutan suara</p>', 'B', 'ADA'),
(9, 1, '<p><span xss=removed>Berikut ini persyaratan pemberhentian dengan tidak hormat bagi anggota PPK, PPS, KPPS, PPLN dan KPPSLN, kecuali:</span></p>', 'A', 'ADA'),
(10, 1, '<p><span xss=removed>UU Nomor 7 Tahun 2017 tentang Pemilihan Umum (Pemilu) mencabut beberapa UU, yaitu:</span></p>', 'C', 'ADA'),
(11, 1, '<p><span xss=removed>Apabila Partai Politik yang memenuhi syarat mengajukan Pasangan Calon Presiden dan Wakil Presiden namun tidak mengajukan bakal pasangan calon, maka Partai Politik tersebut dapat dikenai sanksi berupa:</span></p>', 'E', 'ADA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id_login` bigint(20) NOT NULL,
  `nm_staff` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_staff`
--

INSERT INTO `tbl_staff` (`id_login`, `nm_staff`, `alamat`, `no_hp`) VALUES
(2, 'Rama Restu', 'Ds. Hadipolo, RT. 05/ RW. 05, Kec. Jekulo, Kab. Kudus', '0895411547434');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `id_tugas` int(9) NOT NULL,
  `nm_tugas` text NOT NULL,
  `detail_tugas` text NOT NULL,
  `status` enum('ADA','HAPUS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ujian`
--

CREATE TABLE `tbl_ujian` (
  `id_ujian` int(5) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `tgl_tambah` date NOT NULL,
  `jml_soal` int(11) DEFAULT NULL,
  `status` enum('AKTIF','PROSES','HAPUS') NOT NULL DEFAULT 'PROSES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ujian`
--

INSERT INTO `tbl_ujian` (`id_ujian`, `id_periode`, `tgl_tambah`, `jml_soal`, `status`) VALUES
(1, 2, '2021-01-20', 10, 'AKTIF');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `relawan`
--
ALTER TABLE `relawan`
  ADD KEY `use_id_periode01` (`id_periode`),
  ADD KEY `use_id_tugas01` (`id_tugas`),
  ADD KEY `use_id_relawan01` (`id_relawan`);

--
-- Indeks untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD KEY `use_id_relawan009` (`id_relawan`);

--
-- Indeks untuk tabel `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `use_id_relawan04` (`id_relawan`);

--
-- Indeks untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD KEY `use_idsoal1` (`id_soal`);

--
-- Indeks untuk tabel `tbl_jawaban_relawan`
--
ALTER TABLE `tbl_jawaban_relawan`
  ADD KEY `use_id_relawan02` (`id_relawan`),
  ADD KEY `use_id_soal01` (`id_soal`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  ADD KEY `use_id_periode02` (`id_periode`),
  ADD KEY `use_id_relawan03` (`id_relawan`),
  ADD KEY `use_id_ujian02` (`id_ujian`);

--
-- Indeks untuk tabel `tbl_periode`
--
ALTER TABLE `tbl_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `tbl_relawan`
--
ALTER TABLE `tbl_relawan`
  ADD PRIMARY KEY (`id_relawan`),
  ADD KEY `use_id_login` (`id_login`);

--
-- Indeks untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `use_id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD KEY `use_id_login23` (`id_login`);

--
-- Indeks untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `use_id_periode06` (`id_periode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  MODIFY `id_gaji` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_periode`
--
ALTER TABLE `tbl_periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id_tugas` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  MODIFY `id_ujian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `relawan`
--
ALTER TABLE `relawan`
  ADD CONSTRAINT `use_id_periode01` FOREIGN KEY (`id_periode`) REFERENCES `tbl_periode` (`id_periode`),
  ADD CONSTRAINT `use_id_relawan01` FOREIGN KEY (`id_relawan`) REFERENCES `tbl_relawan` (`id_relawan`),
  ADD CONSTRAINT `use_id_tugas01` FOREIGN KEY (`id_tugas`) REFERENCES `tbl_tugas` (`id_tugas`);

--
-- Ketidakleluasaan untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD CONSTRAINT `use_id_relawan009` FOREIGN KEY (`id_relawan`) REFERENCES `tbl_relawan` (`id_relawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD CONSTRAINT `use_id_relawan04` FOREIGN KEY (`id_relawan`) REFERENCES `tbl_relawan` (`id_relawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD CONSTRAINT `use_idsoal1` FOREIGN KEY (`id_soal`) REFERENCES `tbl_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `tbl_jawaban_relawan`
--
ALTER TABLE `tbl_jawaban_relawan`
  ADD CONSTRAINT `use_id_relawan02` FOREIGN KEY (`id_relawan`) REFERENCES `tbl_relawan` (`id_relawan`),
  ADD CONSTRAINT `use_id_soal01` FOREIGN KEY (`id_soal`) REFERENCES `tbl_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  ADD CONSTRAINT `use_id_periode02` FOREIGN KEY (`id_periode`) REFERENCES `tbl_periode` (`id_periode`),
  ADD CONSTRAINT `use_id_relawan03` FOREIGN KEY (`id_relawan`) REFERENCES `tbl_relawan` (`id_relawan`),
  ADD CONSTRAINT `use_id_ujian02` FOREIGN KEY (`id_ujian`) REFERENCES `tbl_ujian` (`id_ujian`);

--
-- Ketidakleluasaan untuk tabel `tbl_relawan`
--
ALTER TABLE `tbl_relawan`
  ADD CONSTRAINT `use_id_login` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`);

--
-- Ketidakleluasaan untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD CONSTRAINT `use_id_ujian` FOREIGN KEY (`id_ujian`) REFERENCES `tbl_ujian` (`id_ujian`);

--
-- Ketidakleluasaan untuk tabel `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD CONSTRAINT `use_id_login23` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`);

--
-- Ketidakleluasaan untuk tabel `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD CONSTRAINT `use_id_periode06` FOREIGN KEY (`id_periode`) REFERENCES `tbl_periode` (`id_periode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
