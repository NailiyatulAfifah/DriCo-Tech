-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Feb 2019 pada 02.11
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis`) VALUES
('KBBMW', 'BMW'),
('KBHND', 'Honda'),
('KBHYD', 'Hyundai'),
('KBMTS', 'Mitsubishi'),
('KBNSN', 'Nissan'),
('KBSZK', 'Suzuki'),
('KBTYT', 'Toyota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `kode_mobil` varchar(6) NOT NULL,
  `tipe_mobil` varchar(100) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `tahun` year(4) NOT NULL,
  `stok` int(3) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`kode_mobil`, `tipe_mobil`, `id_kategori`, `tahun`, `stok`, `harga`) VALUES
('HND034', 'Honda Civic Type R', 'KBHND', 2018, 11, 35700),
('MTS045', 'Subaru Legacy', 'KBMTS', 2007, 3, 22545),
('SZK021', 'Suzuki Ertiga GL AT', 'KBSZK', 2018, 34, 39900),
('TYT045', 'Toyota 86', 'KBTYT', 2019, 24, 26505);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `no_nota` int(5) NOT NULL,
  `kode_mobil` varchar(6) NOT NULL,
  `no_transaksi` int(4) NOT NULL,
  `username` varchar(5) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`no_nota`, `kode_mobil`, `no_transaksi`, `username`, `jumlah`) VALUES
(1, 'HND034', 345, 'KSR01', 0),
(5, 'HND034', 351, '', 1),
(6, 'HND034', 352, '', 1),
(7, 'MTS045', 353, '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(4) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `username` varchar(5) NOT NULL,
  `pembeli` varchar(100) NOT NULL,
  `total_harga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tanggal_beli`, `username`, `pembeli`, `total_harga`) VALUES
(1, '2019-02-07', 'KSR02', 'Patricia', '35700'),
(2, '2019-01-30', 'KSR01', 'Mutiara Kartika', '56400'),
(346, '2019-02-07', 'KSR02', 'Cipak', '35700'),
(347, '2019-02-07', 'KSR02', 'Cipak', '35700'),
(348, '2019-02-07', 'KSR02', 'Cipak', '35700'),
(349, '2019-02-07', 'KSR02', 'Rani', '35700'),
(350, '2019-02-07', 'KSR02', 'Rani', '35700'),
(351, '2019-02-07', 'KSR02', 'Rani', '35700'),
(352, '2019-02-07', 'KSR02', 'Rani', '35700'),
(353, '2019-02-07', 'KSR01', '', '45090');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(5) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `divisi_bagian` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `nama_user`, `tgl_lahir`, `divisi_bagian`, `email`, `password`) VALUES
('ADM01', 'Nailiyatul Afifah', '2002-07-11', 'Admin', 'nailiyatulafifah@gmail.com', 'adm01'),
('ADM02', 'Firda Reinika', '2001-07-04', 'Admin', 'firdareinika@gmail.com', 'adm02'),
('KSR01', 'Danny Bramantyo', '2002-05-01', 'Kasir', 'dannybramantyo@gmail.com', 'ksr01'),
('KSR02', 'Alfira Santa Praja', '2001-07-20', 'Kasir', 'alfirasanta@gmail.com', 'ksr02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`kode_mobil`),
  ADD UNIQUE KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`no_nota`),
  ADD KEY `no_transaksi` (`no_transaksi`),
  ADD KEY `user` (`username`),
  ADD KEY `kode_mobil` (`kode_mobil`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `no_nota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `kode_mobil` FOREIGN KEY (`kode_mobil`) REFERENCES `mobil` (`kode_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
