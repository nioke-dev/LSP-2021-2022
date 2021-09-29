-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Sep 2021 pada 04.18
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psb`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlahPendaftar` ()  BEGIN
SELECT COUNT(*) FROM pendaftar;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `task` varchar(35) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `task`, `time`) VALUES
(1, 'Insert data ke tabel pendaftar', '2021-09-28 08:14:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `idjurusan` int(11) NOT NULL,
  `namajurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`idjurusan`, `namajurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Teknik Kendaraan Ringan Otomotif'),
(3, 'Tata Busana'),
(4, 'Teknik Pemesinan'),
(5, 'Teknik Instalasi Tenaga Listrik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `idpendaftar` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `asal` varchar(50) NOT NULL,
  `pil1` varchar(50) NOT NULL,
  `pil2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`idpendaftar`, `nama`, `ttl`, `jk`, `alamat`, `asal`, `pil1`, `pil2`) VALUES
(1, 'Syafira', 'Prob, 8 Mei 2019', 'Perempuan', 'Gending', 'SMP 1 Kota', 'Rekayasa Perangkat Lunak', 'Tata Busana'),
(2, 'Ana', 'Prob, 8 Mei 2019', 'Perempuan', 'Gending', 'SMP Pajarakan', 'Teknik Instalasi Tenaga Listrik', 'Teknik Kendaraan Ringan Otomotif'),
(3, 'Muhammad Nurul Mustofa', 'Probolinggo 8 Januari 2004', 'Laki Laki', 'Banyuanyar Lor', 'SMPN 2 Gending', 'Rekayasa Perangkat Lunak', 'Teknik Instalasi Tenaga Listrik');

--
-- Trigger `pendaftar`
--
DELIMITER $$
CREATE TRIGGER `before_insert` BEFORE INSERT ON `pendaftar` FOR EACH ROW INSERT INTO history
VALUES ('',CONCAT('Insert data ke tabel pendaftar'), now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `idpendaftar` int(11) NOT NULL,
  `idjurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idpendaftar`, `idjurusan`) VALUES
(1, 1, 3),
(2, 2, 5),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_peserta`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_peserta` (
`idpendaftar` int(11)
,`nama` varchar(35)
,`asal` varchar(50)
,`pil1` varchar(50)
,`pil2` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_peserta`
--
DROP TABLE IF EXISTS `view_peserta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_peserta`  AS   (select `pendaftar`.`idpendaftar` AS `idpendaftar`,`pendaftar`.`nama` AS `nama`,`pendaftar`.`asal` AS `asal`,`pendaftar`.`pil1` AS `pil1`,`pendaftar`.`pil2` AS `pil2` from `pendaftar` where `pendaftar`.`idpendaftar` <> 0 group by `pendaftar`.`idpendaftar`)  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idjurusan`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`idpendaftar`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `idjurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `idpendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
