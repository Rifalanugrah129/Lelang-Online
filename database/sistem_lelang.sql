-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2021 pada 09.09
-- Versi server: 10.4.6-MariaDB-log
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_lelang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(5) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `harga_awal` int(11) DEFAULT NULL,
  `deskripsi_barang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `tanggal`, `harga_awal`, `deskripsi_barang`) VALUES
(' BR01', 'mobil', '2222-03-31', 120000000, 'bagus seperti baru gress'),
(' BR02', 'motor', '2021-12-12', 19000000, 'baru gress'),
(' BR03', '123', '0000-00-00', 0, ''),
(' BR04', '', '0000-00-00', 1000000, ''),
(' BR05', '', '0000-00-00', 0, ''),
(' BR06', '', '0000-00-00', 0, ''),
(' BR07', '', '0000-00-00', 0, ''),
(' BR08', '', '0000-00-00', 0, ''),
(' BR09', 'SDAS', '0000-00-00', 0, ''),
(' BR10', '', '0000-00-00', 0, ''),
(' BR11', '', '0000-00-00', 123, '123'),
(' BR12', 'adsa', '0000-00-00', 0, ''),
(' BR13', '12313', '0000-00-00', 0, ''),
(' BR14', '1231232', '0000-00-00', 0, ''),
(' BR15', '13123', '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` char(5) NOT NULL,
  `id_lelang` char(5) DEFAULT NULL,
  `id_barang` char(5) DEFAULT NULL,
  `id_user` char(5) DEFAULT NULL,
  `penawaran_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(' HL02', ' LE01', ' BR01', ' MS01', 1200000000),
(' HL03', ' LE01', ' BR01', ' MS01', 2312),
(' HL04', ' LE01', ' BR01', ' MS01', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lelang`
--

CREATE TABLE `lelang` (
  `id_lelang` char(5) NOT NULL,
  `id_barang` char(5) DEFAULT NULL,
  `tgl_lelang` date DEFAULT NULL,
  `harga_akhir` int(11) DEFAULT NULL,
  `id_user` char(5) DEFAULT NULL,
  `id_petugas` char(5) DEFAULT NULL,
  `status` enum('dibuka','ditutup') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `harga_akhir`, `id_user`, `id_petugas`, `status`) VALUES
(' LE01', ' BR04', '2021-03-11', 12000000, ' MS04', ' PT03', 'ditutup'),
(' LE03', ' BR01', '0000-00-00', 0, ' MS01', ' PT01', 'dibuka'),
(' LE04', ' BR01', '0000-00-00', 1, ' MS01', ' PT01', 'dibuka'),
(' LE05', ' BR01', '0000-00-00', 121, ' MS01', ' PT01', 'dibuka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` char(5) NOT NULL,
  `level` enum('administrator','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
('LV1', 'administrator'),
('LV2', 'petugas'),
('LV3', 'administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_user` char(5) NOT NULL,
  `nama_lengkap` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `telp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`) VALUES
(' MS01', 'asep suderajat', 'faizal', '2334', 5345455),
(' MS02', '', '', '', 0),
(' MS03', '', '', '', 0),
(' MS04', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` char(5) NOT NULL,
  `nama_petugas` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `id_level` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(' PT01', 'asep', 'faizal', '32344', 'LV1'),
(' PT02', '', '', '', 'LV1'),
(' PT03', '', '', '', 'LV1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_lelang`) REFERENCES `lelang` (`id_lelang`),
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `masyarakat` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `masyarakat` (`id_user`),
  ADD CONSTRAINT `lelang_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
