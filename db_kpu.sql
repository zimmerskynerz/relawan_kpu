-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2021 pada 05.21
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
  `id_relawan` int(9) NOT NULL,
  `id_periode` int(5) NOT NULL,
  `id_tugas` int(9) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id_relawan` int(9) NOT NULL,
  `nm_berkas` text NOT NULL,
  `link_berkas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_berkas`
--



-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `id_gaji` bigint(20) NOT NULL,
  `id_relawan` int(9) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jawaban_relawan`
--

CREATE TABLE `tbl_jawaban_relawan` (
  `id_relawan` int(9) DEFAULT NULL,
  `id_soal` bigint(20) NOT NULL,
  `jawaban` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `id_konfirmasi` int(9) NOT NULL,
  `id_login` bigint(20) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`id_konfirmasi`, `id_login`, `tgl_konfirmasi`, `alasan`) VALUES
(1, 3, '2021-01-24', 'Foto Kurang Persisi');

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
(1, 'staff@kpu.co.id', '$2y$10$MqUBpjBHKNir5BA0u79hXuj/2n3Xs2iM3/vrpEzPD.37/lKXwvA7a', 'staff', 'AKTIF', '2021-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_ujian`
--

CREATE TABLE `tbl_nilai_ujian` (
  `id_relawan` int(9) NOT NULL,
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


-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_relawan`
--

CREATE TABLE `tbl_relawan` (
  `id_login` bigint(20) NOT NULL,
  `id_relawan` int(9) NOT NULL,
  `nm_relawan` text NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kota_lahir` text DEFAULT NULL,
  `j_kelamin` enum('L','P') DEFAULT NULL,
  `no_hp` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `gaji` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_relawan`
--

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
- --------------------------------------------------------

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
  ADD KEY `use_id_relawan02` (`id_relawan`);

--
-- Indeks untuk tabel `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `use_id_relawan05` (`id_relawan`);

--
-- Indeks untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD KEY `use_idsoal1` (`id_soal`);

--
-- Indeks untuk tabel `tbl_jawaban_relawan`
--
ALTER TABLE `tbl_jawaban_relawan`
  ADD KEY `use_id_soal01` (`id_soal`),
  ADD KEY `use_id_relawan03` (`id_relawan`);

--
-- Indeks untuk tabel `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `use_id_login90` (`id_login`);

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
  ADD KEY `use_id_ujian02` (`id_ujian`),
  ADD KEY `use_id_relawan04` (`id_relawan`);

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
-- AUTO_INCREMENT untuk tabel `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  MODIFY `id_konfirmasi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_periode`
--
ALTER TABLE `tbl_periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_relawan`
--
ALTER TABLE `tbl_relawan`
  MODIFY `id_relawan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `use_id_relawan02` FOREIGN KEY (`id_relawan`) REFERENCES `tbl_relawan` (`id_relawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD CONSTRAINT `use_id_relawan05` FOREIGN KEY (`id_relawan`) REFERENCES `tbl_relawan` (`id_relawan`);

--
-- Ketidakleluasaan untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD CONSTRAINT `use_idsoal1` FOREIGN KEY (`id_soal`) REFERENCES `tbl_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `tbl_jawaban_relawan`
--
ALTER TABLE `tbl_jawaban_relawan`
  ADD CONSTRAINT `use_id_relawan03` FOREIGN KEY (`id_relawan`) REFERENCES `tbl_relawan` (`id_relawan`),
  ADD CONSTRAINT `use_id_soal01` FOREIGN KEY (`id_soal`) REFERENCES `tbl_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD CONSTRAINT `use_id_login90` FOREIGN KEY (`id_login`) REFERENCES `tbl_login` (`id_login`);

--
-- Ketidakleluasaan untuk tabel `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  ADD CONSTRAINT `use_id_periode02` FOREIGN KEY (`id_periode`) REFERENCES `tbl_periode` (`id_periode`),
  ADD CONSTRAINT `use_id_relawan04` FOREIGN KEY (`id_relawan`) REFERENCES `tbl_relawan` (`id_relawan`),
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
