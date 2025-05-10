-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2025 pada 07.05
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_admin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_acara`
--

CREATE TABLE `tb_acara` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status_akun` enum('Aktif','Tidak Aktif') NOT NULL,
  `level` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `email`, `password`, `status_akun`, `level`) VALUES
(1, 'jungkook', 'kooky', 'jungkook@gmail.com', '12345aa', 'Aktif', 'admin'),
(2, 'Gema', 'op1', 'gema@gmail.com', '12345', 'Tidak Aktif', 'operator'),
(3, 'kooky', 'jungkook', 'a113065ra@gmail.com', '', 'Aktif', 'admin'),
(4, 'Aura', 'afa', 'aurafadlin91@gmail.com', '1130', 'Aktif', ''),
(5, 'Aura', 'aura', 'aurafadhlin@gmail.com', '1245', '', 'admin'),
(6, 'Aura', '', 'aurafadlin91@gmail.com', '', '', ''),
(7, 'Aura', '', 'aurafadhlin@gmail.com', '', '', ''),
(8, 'Aura', '', 'aurafadhlin@gmail.com', '', '', ''),
(9, 'Aur', '', 'aurafadlin91@gmail.com', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `Id` int(10) NOT NULL,
  `Nama_Dokumen` varchar(255) NOT NULL,
  `Jenis_Dokumen` varchar(100) NOT NULL,
  `Tanggal_Unggah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Ukuran_File` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`Id`, `Nama_Dokumen`, `Jenis_Dokumen`, `Tanggal_Unggah`, `Ukuran_File`) VALUES
(1, 'Laporan_Keuangan', '[Dokumen_Keuangan]', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id`, `nama`, `Email`, `jabatan`, `status`) VALUES
(8, 'seokjin', 'jinhit@gmail.com', 'mentor', 'magang'),
(18, 'Aura', 'aurafadlin91@gmail.com', 'karyawan', 'Tetap'),
(21, 'Aur', 'aurafadlin91@gmail.com', '', 'Berlangsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `paket` varchar(500) NOT NULL,
  `status` enum('Berlangsung','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama`, `no_hp`, `email`, `paket`, `status`) VALUES
(1, 'Taehyung', 826517573, 'thv@gmail.com', 'Digital Marketing', 'Berlangsung'),
(2, 'Aura Fadhlin', 218068995, 'aurafadhlin@gmail.com', 'desain grafis', 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_acara`
--
ALTER TABLE `tb_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_acara`
--
ALTER TABLE `tb_acara`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
