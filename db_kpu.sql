-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2021 pada 03.38
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.22

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
  `id_tugas` int(9) NOT NULL
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
  `gaji` int(9) DEFAULT NULL,
  `status` text NOT NULL
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
  `nm_ujian` text NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `tgl_tambah` date NOT NULL,
  `jml_soal` int(11) DEFAULT NULL,
  `status` enum('AKTIF','PROSES','HAPUS') NOT NULL DEFAULT 'PROSES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indeks untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD PRIMARY KEY (`id_ujian`);

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
  MODIFY `id_login` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_periode`
--
ALTER TABLE `tbl_periode`
  MODIFY `id_periode` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id_tugas` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  MODIFY `id_ujian` int(5) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
