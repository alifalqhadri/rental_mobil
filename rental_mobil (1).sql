-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2024 pada 07.41
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `status` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`id`, `nama_user`, `username`, `email`, `alamat`, `password`, `foto`, `status`) VALUES
(7, 'admin', 'admin', 'admin@gmail.com', 'makassar', 'admin', '6576d4a3d659c.jpeg', '0'),
(9, 'user', 'user1', 'fahrulshevadiscord@gmail.com', 'makassar', 'fahrul123', NULL, '0'),
(10, 'User2', 'user3', 'fahrulshevavanjovie@gmail.com', 'makassar', 'fahrul123', NULL, '1'),
(11, 'rahmat', 'rahmat', 'rahmat123@gmail.com', 'barru', '123', '66838a50e59f1.png', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_merk`
--

CREATE TABLE `tbl_merk` (
  `id_merk` int(11) NOT NULL,
  `merk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_merk`
--

INSERT INTO `tbl_merk` (`id_merk`, `merk`) VALUES
(8, 'Toyota'),
(9, 'Suzuki'),
(11, 'Honda ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `dd` varchar(10) DEFAULT NULL,
  `tahun` date DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `harga` varchar(100) NOT NULL DEFAULT '0',
  `merk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id`, `nama`, `warna`, `dd`, `tahun`, `gambar`, `harga`, `merk`) VALUES
(19, 'Mobil 2', 'Orange', 'DD 3456 UR', '2023-12-13', '6578fe07d8df6.jpg', '15400', 9),
(20, 'Mobil 1', 'Hitam', 'DD 8829 PP', '2023-12-06', '6578fe301c935.jpg', '10000', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `pinjam` date DEFAULT NULL,
  `kembali` date DEFAULT NULL,
  `denda` varchar(100) DEFAULT '0',
  `status` varchar(1) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `id_mobil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `pinjam`, `kembali`, `denda`, `status`, `id_user`, `id_mobil`) VALUES
(1, '2023-12-13', '2023-12-20', '0', '1', 7, 20),
(2, '2023-11-30', '2023-12-20', '10000', '1', 7, 19),
(3, '2023-12-06', '2023-12-25', '0', '1', 7, 20),
(4, '2023-12-25', '2023-12-25', '10000', '1', 7, 19),
(5, '2024-07-02', '2024-07-03', '0', '0', 10, 19),
(6, '2024-07-03', '2024-07-04', '0', '0', 10, 19),
(7, '2024-07-01', '2024-07-04', '0', '0', 10, 20),
(8, '2024-07-03', '2024-07-04', '0', '0', 10, 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_merk`
--
ALTER TABLE `tbl_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_mobil_ibfk_2` (`merk`);

--
-- Indeks untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_merk`
--
ALTER TABLE `tbl_merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD CONSTRAINT `tbl_mobil_ibfk_2` FOREIGN KEY (`merk`) REFERENCES `tbl_merk` (`id_merk`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD CONSTRAINT `tbl_pesanan_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `tbl_mobil` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pesanan_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `tbl_akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
