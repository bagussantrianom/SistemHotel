-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2021 pada 13.47
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotelku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) UNSIGNED NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `berkas`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '1628915636_0013f1e9aa2bb8690e39.png', 'pembayaran', '2021-08-13 23:33:56', '2021-08-13 23:33:56'),
(2, '1629010863_5df487ac27bd2b6b46f3.png', 'h7uhu7', '2021-08-15 02:01:03', '2021-08-15 02:01:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-08-14-041848', 'App\\Database\\Migrations\\Berkas', 'default', 'App', 1628914830, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id` int(11) NOT NULL,
  `kode_kamar` varchar(255) DEFAULT NULL,
  `nama_kamar` varchar(255) DEFAULT NULL,
  `harga_kamar` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kamar`
--

INSERT INTO `tb_kamar` (`id`, `kode_kamar`, `nama_kamar`, `harga_kamar`) VALUES
(6, 'KM01', 'Standart Room', 250000),
(7, 'KM02', 'Suite Room', 350000),
(20, 'KM03', 'adwa', 12414124);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_checkin` varchar(255) DEFAULT NULL,
  `tgl_checkout` varchar(255) DEFAULT NULL,
  `dewasa` varchar(1) DEFAULT NULL,
  `anakanak` varchar(1) DEFAULT NULL,
  `tipe_kamar` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nomor` varchar(12) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sewa`
--

INSERT INTO `tb_sewa` (`id`, `nama`, `tgl_checkin`, `tgl_checkout`, `dewasa`, `anakanak`, `tipe_kamar`, `email`, `nomor`, `bukti_bayar`, `Status`) VALUES
(42, 'Bagus', '8/12/2021', '8/13/2021', '1', '1', 'Standart Room', 'bagus@gmail.com', '082259871563', '1629098895_07cf6cd86fc4c4d174a2.png', 'Ditolak'),
(43, 'Muhammad Rahman', '8/30/2021', '8/31/2021', '2', '3', 'Suite Room', 'rahman@gmail.com', '085754698512', '1629104074_70bbe33abf1fd49e95fc.png', 'Diterima'),
(44, 'Fatimah Zahra', '8/25/2021', '8/26/2021', '2', '', 'Standart Room', 'fatimah@gmail.com', '085745896521', '1629104113_7093c383e621d3f38922.png', 'Diterima'),
(49, 'Ahmad Fauzi', '8/25/2021', '8/26/2021', '2', '1', 'Standart Room', 'fauzi@gmail.com', '085785429653', '1629120615_955e89ca021aec786b64.png', 'Ditolak'),
(58, 'Putri Rahmawati', '8/29/2021', '8/30/2021', '1', '1', 'Standart Room', 'putri@gmail.com', '085789745632', '1629127243_2e7ce1d302088e4c4064.png', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipekamar`
--

CREATE TABLE `tb_tipekamar` (
  `id` int(11) NOT NULL,
  `tipe_kamar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tipekamar`
--

INSERT INTO `tb_tipekamar` (`id`, `tipe_kamar`) VALUES
(1, 'Standart Room'),
(2, 'Suite Room');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tipekamar`
--
ALTER TABLE `tb_tipekamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tb_tipekamar`
--
ALTER TABLE `tb_tipekamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
