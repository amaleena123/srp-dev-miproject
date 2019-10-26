-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2019 at 06:02 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ma_dagangan`
--

CREATE TABLE `ma_dagangan` (
  `dagang_id` int(5) NOT NULL,
  `dagang_lrmp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dagang_nofail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dagang_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dagang_tarikhlulus` date NOT NULL,
  `dagang_rumus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dagang_kategori` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dagang_kegunaan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dagang_kelas_racun` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dagang_jumlah` decimal(10,0) NOT NULL,
  `dagang_metrik` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dagang_pengilang_id` int(5) NOT NULL,
  `dagang_tarikhdaftar` int(11) NOT NULL,
  `dagang_pgguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ma_dagangan`
--

INSERT INTO `ma_dagangan` (`dagang_id`, `dagang_lrmp`, `dagang_nofail`, `dagang_nama`, `dagang_tarikhlulus`, `dagang_rumus`, `dagang_kategori`, `dagang_kegunaan`, `dagang_kelas_racun`, `dagang_jumlah`, `dagang_metrik`, `dagang_pengilang_id`, `dagang_tarikhdaftar`, `dagang_pgguna_id`) VALUES
(1, 'REN001', '100', 'Fumakilla', '2019-10-14', 'rumus1', 'kategori1', 'test', 'test', '1', '12', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ma_ejen`
--

CREATE TABLE `ma_ejen` (
  `ejen_id` int(5) NOT NULL,
  `ejen_mypestid` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ejen_kategori` char(1) COLLATE utf8_unicode_ci DEFAULT '1',
  `ejen_firstnama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ejen_lastnama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ejen_mykad` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ejen_jantina` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ejen_telefon` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ejen_emel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ejen_emel2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ejen_alamat1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ejen_alamat2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ejen_bandar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ejen_poskod` int(5) NOT NULL,
  `ejen_negeri` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ejen_negara` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ejen_syarikat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ejen_noroc` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ejen_pgguna_id` int(5) DEFAULT NULL,
  `ejen_tarikhdaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ma_ejen`
--

INSERT INTO `ma_ejen` (`ejen_id`, `ejen_mypestid`, `ejen_kategori`, `ejen_firstnama`, `ejen_lastnama`, `ejen_mykad`, `ejen_jantina`, `ejen_telefon`, `ejen_emel`, `ejen_emel2`, `ejen_alamat1`, `ejen_alamat2`, `ejen_bandar`, `ejen_poskod`, `ejen_negeri`, `ejen_negara`, `ejen_syarikat`, `ejen_noroc`, `ejen_pgguna_id`, `ejen_tarikhdaftar`) VALUES
(1, 'Callington', '1', 'Abby Lew', 'Kow Lian', '681018106150', '2', '60134532989', 'abbylew@callington.com', 'azarabian@callington.com', 'B-3-9, 3rd Floor, Block B, Megan Avenue II,', 'No 12. Jalan Yap Kwan Seng', NULL, 50450, 'Kuala Lumpur', 'Malaysia', 'TBC', 'TBC', 1, '2019-10-16 00:00:00'),
(7, 'Ejen2', '1', 'Richard', 'Yukun', '820823145482', NULL, '019213231', 'Richard@ymail.com', 'richard@gmail.com', 'no 23', 'kg sg choh', NULL, 48000, 'Selangor', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ma_pembekal`
--

CREATE TABLE `ma_pembekal` (
  `pembekal_id` int(5) NOT NULL,
  `pembekal_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_alamat1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_alamat2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_bandar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_poskod` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_negeri` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_negara` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_pgguna_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_tarikhdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='table pembekal';

-- --------------------------------------------------------

--
-- Table structure for table `ma_pengilang`
--

CREATE TABLE `ma_pengilang` (
  `pembekal_id` int(5) NOT NULL,
  `pembekal_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_alamat1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_alamat2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_bandar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_poskod` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_negeri` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_negara` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_pgguna_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pembekal_tarikhdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='table pembekal';

-- --------------------------------------------------------

--
-- Table structure for table `ma_perawisaktif`
--

CREATE TABLE `ma_perawisaktif` (
  `perawisaktif_id` int(5) NOT NULL,
  `perawisaktif_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `perawisaktif_mypestid` int(15) NOT NULL,
  `perawisaktif_chemisnama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `perawisaktif_casno` int(11) NOT NULL,
  `perawisaktif_myhskod` int(11) NOT NULL,
  `perawisaktif_ahtnkod` int(11) NOT NULL,
  `perawisaktif_standard` int(11) NOT NULL,
  `perawisaktif_labs` int(11) NOT NULL,
  `perawisaktif_thirdparty` int(11) NOT NULL,
  `perawisaktif_kategori` int(11) NOT NULL,
  `perawisaktif_kaedah` int(11) NOT NULL,
  `perawisaktif_tahunlulus` int(11) NOT NULL,
  `perawisaktif_peratusan` int(11) NOT NULL,
  `perawisaktif_rumusan` int(11) NOT NULL,
  `perawisaktif_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `perawisaktif_tarikhdaftar` int(11) NOT NULL,
  `perawisaktif_pgguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_syarikat`
--

CREATE TABLE `ma_syarikat` (
  `organisasi_id` int(5) NOT NULL,
  `organisasi_mypestid` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_noroc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_tarikhroc` date NOT NULL,
  `organisasi_alamat1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_alamat2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_poskod` int(5) NOT NULL,
  `organisasi_bandar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_negeri` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_negara` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_telefon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_faks` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_emel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_status` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `organisasi_pgguna_id` int(5) NOT NULL,
  `organisasi_tarikhdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rel_modul_pengguna`
--

CREATE TABLE `rel_modul_pengguna` (
  `modulpgguna_id` int(5) NOT NULL,
  `modulpgguna_modul_id` int(5) NOT NULL,
  `modulpgguna_pgguna_id` int(5) NOT NULL,
  `modulpgguna_pendaftar_id` int(5) NOT NULL,
  `modulpgguna_tarikhdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='R MtoM modul dan pengguna';

-- --------------------------------------------------------

--
-- Table structure for table `rel_racun_kegunaan`
--

CREATE TABLE `rel_racun_kegunaan` (
  `racunguna_id` int(5) NOT NULL,
  `racunguna_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `racunguna_tarikhdaftar` datetime NOT NULL,
  `racunguna_pendaftar_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sel_racun_kategori`
--

CREATE TABLE `sel_racun_kategori` (
  `racunkat_id` int(5) NOT NULL,
  `racunkat_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `racunkat_tarikhdaftar` datetime NOT NULL,
  `racunkat_pentadbir_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sel_racun_kategori`
--

INSERT INTO `sel_racun_kategori` (`racunkat_id`, `racunkat_nama`, `racunkat_tarikhdaftar`, `racunkat_pentadbir_id`) VALUES
(1, 'Pertanian', '2019-10-20 00:00:00', 1),
(2, 'Isi rumah', '2019-10-14 00:00:00', 1),
(3, 'Kesihatan awam', '2019-10-14 00:00:00', 1),
(4, 'Perindustrian', '2019-10-14 00:00:00', 1),
(5, 'Veterinar', '2019-10-14 00:00:00', 1),
(6, 'Lain-lain', '2019-10-14 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `set_modul`
--

CREATE TABLE `set_modul` (
  `modul_id` int(5) NOT NULL,
  `modul_nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `modul_pendaftar_id` int(5) NOT NULL,
  `modul_tarikhdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_paras`
--

CREATE TABLE `set_paras` (
  `paras_id` int(5) NOT NULL,
  `paras_kategori` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `paras_tarikhdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='paras pengguna';

-- --------------------------------------------------------

--
-- Table structure for table `set_pengguna`
--

CREATE TABLE `set_pengguna` (
  `pgguna_id` int(5) NOT NULL DEFAULT '0',
  `pgguna_nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pgguna_firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pgguna_lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pgguna_emeljbtn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pgguna_emelpersonal` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pgguna_status` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `pgguna_tarikhdaftar` datetime NOT NULL,
  `pgguna_pendaftar_id` int(5) NOT NULL,
  `pgguna_paras_id` int(5) NOT NULL,
  `pgguna_modul_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Pengguna';

--
-- Triggers `set_pengguna`
--
DELIMITER $$
CREATE TRIGGER `tg_pengguna_insert` BEFORE INSERT ON `set_pengguna` FOR EACH ROW SET NEW.pgguna_id = CONCAT('KRP', LPAD(LAST_INSERT_ID(), 2, '0'))
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ma_dagangan`
--
ALTER TABLE `ma_dagangan`
  ADD PRIMARY KEY (`dagang_id`);

--
-- Indexes for table `ma_ejen`
--
ALTER TABLE `ma_ejen`
  ADD PRIMARY KEY (`ejen_id`);

--
-- Indexes for table `ma_pembekal`
--
ALTER TABLE `ma_pembekal`
  ADD PRIMARY KEY (`pembekal_id`);

--
-- Indexes for table `ma_pengilang`
--
ALTER TABLE `ma_pengilang`
  ADD PRIMARY KEY (`pembekal_id`);

--
-- Indexes for table `ma_perawisaktif`
--
ALTER TABLE `ma_perawisaktif`
  ADD PRIMARY KEY (`perawisaktif_id`);

--
-- Indexes for table `ma_syarikat`
--
ALTER TABLE `ma_syarikat`
  ADD PRIMARY KEY (`organisasi_id`),
  ADD UNIQUE KEY `organisasi_emel` (`organisasi_emel`);

--
-- Indexes for table `rel_modul_pengguna`
--
ALTER TABLE `rel_modul_pengguna`
  ADD PRIMARY KEY (`modulpgguna_id`);

--
-- Indexes for table `rel_racun_kegunaan`
--
ALTER TABLE `rel_racun_kegunaan`
  ADD PRIMARY KEY (`racunguna_id`);

--
-- Indexes for table `sel_racun_kategori`
--
ALTER TABLE `sel_racun_kategori`
  ADD PRIMARY KEY (`racunkat_id`);

--
-- Indexes for table `set_modul`
--
ALTER TABLE `set_modul`
  ADD PRIMARY KEY (`modul_id`);

--
-- Indexes for table `set_pengguna`
--
ALTER TABLE `set_pengguna`
  ADD PRIMARY KEY (`pgguna_id`),
  ADD UNIQUE KEY `pgguna_nama` (`pgguna_nama`),
  ADD UNIQUE KEY `pgguna_emeljbtn` (`pgguna_emeljbtn`),
  ADD UNIQUE KEY `pgguna_emelpersonal` (`pgguna_emelpersonal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ma_dagangan`
--
ALTER TABLE `ma_dagangan`
  MODIFY `dagang_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ma_ejen`
--
ALTER TABLE `ma_ejen`
  MODIFY `ejen_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ma_pembekal`
--
ALTER TABLE `ma_pembekal`
  MODIFY `pembekal_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ma_pengilang`
--
ALTER TABLE `ma_pengilang`
  MODIFY `pembekal_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rel_racun_kegunaan`
--
ALTER TABLE `rel_racun_kegunaan`
  MODIFY `racunguna_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sel_racun_kategori`
--
ALTER TABLE `sel_racun_kategori`
  MODIFY `racunkat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
