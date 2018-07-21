-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Mar 2017 pada 17.05
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_aset_uin_rf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_akun`
--

CREATE TABLE IF NOT EXISTS `rf_aset_akun` (
  `ID_Akun` int(3) NOT NULL,
  `ID_Level` int(3) NOT NULL,
  `ID_Unit` int(3) NOT NULL,
  `Nama_Akun` varchar(25) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Online` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_akun`
--

INSERT INTO `rf_aset_akun` (`ID_Akun`, `ID_Level`, `ID_Unit`, `Nama_Akun`, `Username`, `Password`, `Online`) VALUES
(1, 1, 0, 'PUSTIPD', 'pustipd', 'd8656c8ac8738ce436782e57fcfe995e', '0'),
(2, 2, 1, 'Bmn', 'bmn', 'b629bc41942389dbd522db3e04e074fe', '1'),
(3, 3, 13, 'Fakultas', 'fakultas', '87d1457efdc266dc883ebe5caa705cb0', '0'),
(4, 4, 1, 'TU Rektorat', 'tu', 'b6b4ce6df035dcfaa26f3bc32fb89e6a', '0'),
(6, 8, 1, 'Rektor', 'rektor', '7802f18483b28d50a62e65c27e9e12a9', '1'),
(8, 6, 1, 'Kabag Umum Rektorat', 'umumrek', '1a5375523e902e1ce298bcb1ce53cda6', '1'),
(9, 3, 11, 'Dakwah', 'dakwah', '3b3da8f39cbb3563e830c233000a38ea', '0'),
(10, 3, 9, 'Tarbiyah', 'tarbiyah', '28b7dd7a63277140091b5e93e2c7ea96', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_barang`
--

CREATE TABLE IF NOT EXISTS `rf_aset_barang` (
  `ID_Barang` int(5) NOT NULL,
  `ID_Kategori` int(5) NOT NULL,
  `ID_Unit` int(3) NOT NULL,
  `ID_Tipe` int(5) NOT NULL,
  `Merk_Barang` varchar(50) NOT NULL,
  `Tahun_Barang` year(4) NOT NULL,
  `Jumlah_Barang` int(5) NOT NULL,
  `Deskripsi_Barang` text NOT NULL,
  `Harga_Satuan` int(20) NOT NULL,
  `ID_Doc` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_barang`
--

INSERT INTO `rf_aset_barang` (`ID_Barang`, `ID_Kategori`, `ID_Unit`, `ID_Tipe`, `Merk_Barang`, `Tahun_Barang`, `Jumlah_Barang`, `Deskripsi_Barang`, `Harga_Satuan`, `ID_Doc`) VALUES
(1, 2, 13, 2, 'Cannon', 2017, 5, 'DIPO', 20999, 3),
(2, 2, 13, 3, 'Acer', 2017, 3, '-', 898989, 5),
(3, 2, 13, 2, 'Cannon', 2017, 5, '-', 500000, 5),
(4, 1, 14, 13, 'Tannon', 2017, 4, 'DIPO', 350000, 23),
(5, 1, 11, 13, 'Tannon', 2017, 3, '-', 350000, 26),
(6, 1, 13, 13, 'Tannon', 2017, 4, '-', 350000, 9),
(7, 2, 13, 9, 'Sony', 2017, 3, 'DIPO', 0, 14),
(8, 2, 11, 3, 'Acer', 2017, 2, '-', 500000, 27),
(9, 2, 9, 2, 'Cannon', 2017, 1, '-', 500000, 33),
(10, 2, 11, 2, 'Cannon', 2017, 2, '-', 500000, 32),
(11, 2, 13, 2, 'Cannon', 2017, 3, 'DIPO', 500000, 16),
(12, 2, 11, 3, 'Toshiba', 2017, 5, ' -', 760000, 0),
(13, 2, 13, 3, 'Sony', 2017, 2, '-', 800000, 8),
(14, 2, 14, 3, 'Sony', 2017, 4, '-', 670000, 22),
(15, 2, 13, 6, 'HP', 2017, 5, '-', 780000, 7),
(16, 2, 14, 6, 'HP', 2017, 2, '-', 750000, 21),
(17, 2, 14, 1, 'Mediatek', 2017, 3, '-', 350000, 25),
(18, 2, 13, 1, 'Mediatek', 2017, 2, '-', 0, 11),
(19, 2, 13, 10, 'Simbada', 2017, 2, 'DIPO', 0, 12),
(20, 2, 14, 4, 'Toshiba', 2017, 1, '-', 1000000, 20),
(21, 2, 13, 4, 'Toshiba', 2017, 1, '-', 1000000, 6),
(22, 2, 11, 4, 'Acer', 2017, 1, '-', 1000000, 28),
(23, 1, 14, 8, 'Hitachi', 2017, 2, '-', 500000, 24),
(24, 1, 13, 8, 'Hitachi', 2017, 1, '-', 500000, 10),
(25, 1, 11, 12, 'Cannon', 2017, 2, '-', 34, 31),
(26, 2, 13, 2, 'Cannon', 2017, 2, '-', 500000, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_barang_detail`
--

CREATE TABLE IF NOT EXISTS `rf_aset_barang_detail` (
  `id` int(5) NOT NULL,
  `Inventaris` varchar(35) NOT NULL,
  `ID_Brg_Detail` int(5) NOT NULL,
  `ID_Tipe` int(5) NOT NULL,
  `ID_Unit` int(3) NOT NULL,
  `ID_Barang` int(5) NOT NULL,
  `ID_Kondisi` int(2) NOT NULL,
  `ID_Perbaikan` int(5) NOT NULL,
  `ID_Hapus` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_barang_detail`
--

INSERT INTO `rf_aset_barang_detail` (`id`, `Inventaris`, `ID_Brg_Detail`, `ID_Tipe`, `ID_Unit`, `ID_Barang`, `ID_Kondisi`, `ID_Perbaikan`, `ID_Hapus`) VALUES
(1, '025.04.1100.424208.000.2017', 1, 2, 13, 1, 1, 1, 0),
(2, '025.04.1100.424208.000.2017', 2, 2, 13, 1, 1, 0, 0),
(3, '025.04.1100.424208.000.2017', 3, 2, 13, 1, 2, 1, 0),
(4, '025.04.1100.424208.000.2017', 4, 2, 13, 1, 1, 0, 0),
(5, '025.04.1100.424208.000.2017', 5, 2, 13, 1, 1, 1, 0),
(6, '025.04.1100.424208.000.2017', 1, 3, 13, 2, 1, 2, 0),
(7, '025.04.1100.424208.000.2017', 2, 3, 13, 2, 1, 0, 0),
(8, '025.04.1100.424208.000.2017', 3, 3, 13, 2, 1, 2, 0),
(9, '025.04.1100.424208.000.2017', 6, 2, 13, 3, 1, 0, 0),
(10, '025.04.1100.424208.000.2017', 7, 2, 13, 3, 1, 0, 0),
(11, '025.04.1100.424208.000.2017', 8, 2, 9, 9, 1, 5, 0),
(12, '025.04.1100.424208.000.2017', 9, 2, 11, 10, 1, 0, 0),
(13, '025.04.1100.424208.000.2017', 10, 2, 11, 10, 1, 0, 0),
(14, '025.04.1100.424208.000.2017', 11, 2, 13, 11, 1, 0, 0),
(15, '025.04.1100.424208.000.2017', 12, 2, 13, 11, 1, 0, 4),
(16, '025.04.1100.424208.000.2017', 13, 2, 13, 11, 1, 0, 0),
(17, '025.04.1100.424208.000.2017', 14, 2, 13, 11, 1, 0, 0),
(18, '025.04.1100.424208.000.2017', 15, 2, 13, 3, 1, 0, 0),
(19, '025.04.1100.424208.000.2017', 16, 2, 13, 3, 1, 0, 0),
(20, '025.04.1100.424208.000.2017', 17, 2, 13, 3, 1, 0, 0),
(21, '025.04.1100.424208.000.2017', 1, 4, 11, 22, 1, 0, 0),
(22, '025.04.1100.424208.000.2017', 2, 4, 13, 21, 1, 0, 0),
(23, '025.04.1100.424208.000.2017', 3, 4, 14, 20, 1, 0, 0),
(24, '025.04.1100.424208.000.2017', 1, 13, 14, 4, 1, 0, 0),
(25, '025.04.1100.424208.000.2017', 2, 13, 14, 4, 1, 0, 0),
(26, '025.04.1100.424208.000.2017', 3, 13, 14, 4, 1, 0, 0),
(27, '025.04.1100.424208.000.2017', 4, 13, 14, 4, 1, 0, 0),
(28, '025.04.1100.424208.000.2017', 5, 13, 11, 5, 1, 0, 0),
(29, '025.04.1100.424208.000.2017', 6, 13, 11, 5, 1, 3, 0),
(30, '025.04.1100.424208.000.2017', 7, 13, 11, 5, 1, 0, 0),
(31, '025.04.1100.424208.000.2017', 8, 13, 13, 6, 1, 0, 0),
(32, '025.04.1100.424208.000.2017', 9, 13, 13, 6, 1, 0, 0),
(33, '025.04.1100.424208.000.2017', 10, 13, 13, 6, 1, 0, 0),
(34, '025.04.1100.424208.000.2017', 11, 13, 13, 6, 1, 0, 0),
(35, '025.04.1100.424208.000.2017', 1, 8, 14, 23, 1, 0, 0),
(36, '025.04.1100.424208.000.2017', 2, 8, 14, 23, 1, 0, 0),
(37, '025.04.1100.424208.000.2017', 3, 8, 13, 24, 1, 0, 0),
(38, '025.04.1100.424208.000.2017', 4, 3, 11, 8, 1, 0, 0),
(39, '025.04.1100.424208.000.2017', 5, 3, 11, 8, 1, 0, 0),
(40, '025.04.1100.424208.000.2017', 6, 3, 11, 12, 1, 0, 0),
(41, '025.04.1100.424208.000.2017', 7, 3, 11, 12, 1, 0, 0),
(42, '025.04.1100.424208.000.2017', 8, 3, 11, 12, 1, 0, 0),
(43, '025.04.1100.424208.000.2017', 9, 3, 11, 12, 1, 0, 0),
(44, '025.04.1100.424208.000.2017', 10, 3, 11, 12, 1, 0, 0),
(45, '025.04.1100.424208.000.2017', 11, 3, 14, 14, 1, 0, 0),
(46, '025.04.1100.424208.000.2017', 12, 3, 14, 14, 1, 0, 0),
(47, '025.04.1100.424208.000.2017', 13, 3, 14, 14, 1, 0, 0),
(48, '025.04.1100.424208.000.2017', 14, 3, 14, 14, 1, 0, 0),
(49, '025.04.1100.424208.000.2017', 1, 1, 14, 17, 1, 0, 0),
(50, '025.04.1100.424208.000.2017', 2, 1, 14, 17, 1, 0, 0),
(51, '025.04.1100.424208.000.2017', 3, 1, 14, 17, 1, 0, 0),
(52, '025.04.1100.424208.000.2017', 1, 6, 14, 16, 1, 0, 0),
(53, '025.04.1100.424208.000.2017', 2, 6, 14, 16, 1, 0, 0),
(54, '025.04.1100.424208.000.2017', 15, 3, 13, 13, 1, 0, 0),
(55, '025.04.1100.424208.000.2017', 16, 3, 13, 13, 1, 0, 0),
(56, '025.04.1100.424208.000.2017', 3, 6, 13, 15, 1, 0, 0),
(57, '025.04.1100.424208.000.2017', 4, 6, 13, 15, 1, 0, 0),
(58, '025.04.1100.424208.000.2017', 5, 6, 13, 15, 1, 0, 0),
(59, '025.04.1100.424208.000.2017', 6, 6, 13, 15, 1, 0, 0),
(60, '025.04.1100.424208.000.2017', 7, 6, 13, 15, 1, 0, 0),
(61, '025.04.1100.424208.000.2017', 1, 12, 11, 25, 1, 0, 0),
(62, '025.04.1100.424208.000.2017', 2, 12, 11, 25, 2, 4, 0),
(63, '025.04.1100.424208.000.2017', 18, 2, 13, 26, 1, 0, 0),
(64, '025.04.1100.424208.000.2017', 19, 2, 13, 26, 1, 0, 0);

--
-- Trigger `rf_aset_barang_detail`
--
DELIMITER $$
CREATE TRIGGER `Penghapusan Barang` AFTER UPDATE ON `rf_aset_barang_detail`
 FOR EACH ROW BEGIN

IF NOT (NEW.ID_Hapus = OLD.ID_Hapus) THEN

UPDATE rf_aset_barang SET Jumlah_Barang = Jumlah_Barang - 1
WHERE ID_Barang = OLD.ID_Barang;

END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_barang_tipe`
--

CREATE TABLE IF NOT EXISTS `rf_aset_barang_tipe` (
  `ID_Tipe` int(5) NOT NULL,
  `ID_Kategori` int(5) NOT NULL,
  `Nama_Tipe` varchar(30) NOT NULL,
  `ID_Inventaris` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_barang_tipe`
--

INSERT INTO `rf_aset_barang_tipe` (`ID_Tipe`, `ID_Kategori`, `Nama_Tipe`, `ID_Inventaris`) VALUES
(1, 2, 'Radio Hotspot/Switch Hub/Radio', '2.06.02.06.012'),
(2, 2, 'Infokus', '2.05.01.05.028'),
(3, 2, 'LCD', '2.05.01.05.061'),
(4, 2, 'TV', '2.05.02.06.002'),
(5, 2, 'Komputer', '2.12.01.00.000'),
(6, 2, 'Printer', '2.12.02.03.000'),
(7, 3, 'Handycam', '2.05.02.06.046'),
(8, 1, 'UPS', '2.05.02.06.018'),
(9, 2, 'VCD/DVD', '2.05.02.06.003'),
(10, 2, 'Speaker / Sound Sistem', '2.05.02.06.008'),
(11, 2, 'Stabilizer', '2.05.02.06.024'),
(12, 1, 'Mesin Penghancur Kertas', '2.05.01.05.005'),
(13, 1, 'Dispenser', '2.05.02.06.036'),
(14, 2, 'Tester', '2.02.05.06.008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_doc`
--

CREATE TABLE IF NOT EXISTS `rf_aset_doc` (
  `ID_Doc` int(5) NOT NULL,
  `ID_Unit` int(3) NOT NULL,
  `ID_Status_Doc` int(2) NOT NULL,
  `Tanggal_Pengajuan` date NOT NULL,
  `ID_Akun` int(3) NOT NULL,
  `ID_Jenis_Doc` int(2) NOT NULL,
  `File_Doc` varchar(50) NOT NULL,
  `Judul_Doc` varchar(40) NOT NULL,
  `Disposisi_TU` varchar(50) NOT NULL,
  `Disposisi_Rektor` varchar(50) NOT NULL,
  `Disposisi_Umum` varchar(50) NOT NULL,
  `Pengadaan_Doc` varchar(50) NOT NULL,
  `Kwitansi` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_doc`
--

INSERT INTO `rf_aset_doc` (`ID_Doc`, `ID_Unit`, `ID_Status_Doc`, `Tanggal_Pengajuan`, `ID_Akun`, `ID_Jenis_Doc`, `File_Doc`, `Judul_Doc`, `Disposisi_TU`, `Disposisi_Rektor`, `Disposisi_Umum`, `Pengadaan_Doc`, `Kwitansi`) VALUES
(1, 13, 10, '2017-03-17', 3, 1, '13201703171489757364.docx', 'Pengadaan Komputer', '12201703171489757517.doc', '12201703171489757598.docx', '', '', ''),
(2, 13, 9, '2017-03-17', 3, 4, '13201703171489757390.docx', 'Pengadaan Komputer Bekas', '1201703271490597789.pdf', '1201703271490597855.pdf', '1201703271490597914.pdf', '1201703271490601057.pdf', ''),
(3, 13, 12, '2017-03-17', 3, 1, '13201703171489757404.docx', 'Pengadaan Lab II', '12201703171489757535.docx', '12201703171489757608.docx', '12201703171489757640.docx', '1201703171489760152.docx', '1201703171489757743.docx'),
(4, 13, 12, '2017-03-17', 3, 3, '13201703171489757429.docx', 'Penghapusan Aset', '12201703171489763179.docx', '', '', '1201703271490599162.pdf', ''),
(5, 13, 12, '2017-03-17', 3, 1, '13201703171489757458.docx', 'Pengadaan Lab V', '12201703171489757554.docx', '12201703171489757617.docx', '12201703171489757650.docx', '1201703271490597170.pdf', '1201703271490597340.pdf'),
(6, 13, 12, '2017-03-27', 3, 1, '13201703271490594284.pdf', 'Pengadaan TV Fakultas', '1201703271490594825.pdf', '1201703271490594973.pdf', '1201703271490595090.pdf', '1201703271490597202.pdf', '1201703271490597406.pdf'),
(7, 13, 12, '2017-03-27', 3, 1, '13201703271490594308.pdf', 'Pengadaan Printer', '1201703271490594837.pdf', '1201703271490594985.pdf', '1201703271490595103.pdf', '1201703271490597226.pdf', '1201703271490598882.pdf'),
(8, 13, 12, '2017-03-27', 3, 1, '13201703271490594327.pdf', 'Pengadaan LCD', '1201703271490594847.pdf', '1201703271490594997.pdf', '1201703271490595117.pdf', '1201703271490597296.pdf', '1201703271490598861.pdf'),
(9, 13, 12, '2017-03-27', 3, 1, '13201703271490594352.pdf', 'Pengadaan Dispenser', '1201703271490594858.pdf', '1201703271490595026.pdf', '1201703271490595134.pdf', '1201703271490597259.pdf', '1201703271490597523.pdf'),
(10, 13, 12, '2017-03-27', 3, 1, '13201703271490594438.pdf', 'Pengadaan UPS', '1201703271490594875.pdf', '1201703271490595037.pdf', '1201703271490595148.pdf', '1201703271490597309.pdf', '1201703271490597563.pdf'),
(11, 13, 7, '2017-03-27', 3, 1, '13201703271490594464.pdf', 'Pengadaan Radio Hotspot', '1201703271490594887.pdf', '1201703271490595012.pdf', '1201703271490595159.pdf', '1201703271490598357.pdf', ''),
(12, 13, 7, '2017-03-27', 3, 1, '13201703271490594497.pdf', 'Pengadaan Speaker', '1201703271490594898.pdf', '1201703271490595048.pdf', '1201703271490595171.pdf', '1201703271490598332.pdf', ''),
(13, 13, 6, '2017-03-27', 3, 1, '13201703271490594520.pdf', 'Pengadaan Stabilizer', '1201703271490594909.pdf', '1201703271490600154.pdf', '1201703271490600177.pdf', '', ''),
(14, 13, 7, '2017-03-27', 3, 1, '13201703271490594552.pdf', 'Pengadaan DVD Player', '1201703271490594920.pdf', '1201703271490595060.pdf', '1201703271490595185.pdf', '1201703271490596071.pdf', ''),
(15, 13, 12, '2017-03-27', 3, 1, '13201703271490594601.pdf', 'Pengadaan Handycam', '1201703291490777299.pdf', '1201703291490777357.pdf', '1201703301490838647.pdf', '', '1201703301490845405.pdf'),
(16, 13, 12, '2017-03-27', 3, 1, '13201703271490594633.pdf', 'Pengadaan Infokus', '1201703271490596251.pdf', '1201703271490596272.pdf', '1201703271490596314.pdf', '1201703271490596591.pdf', '1201703271490596559.pdf'),
(17, 13, 6, '2017-03-27', 3, 1, '13201703271490594682.pdf', 'Pengadaan Penghancur Kertas', '1201703271490594938.pdf', '1201703291490777345.pdf', '1201703301490838868.pdf', '', ''),
(18, 13, 8, '2017-03-27', 3, 2, '13201703271490594759.pdf', 'Perbaikan Infokus Rusak', '1201703271490597750.pdf', '1201703271490597816.pdf', '1201703271490597903.pdf', '1201703271490597967.pdf', ''),
(19, 13, 3, '2017-03-27', 3, 2, '13201703271490594787.pdf', 'Perbaikan LCD Rusak', '', '', '', '', ''),
(20, 14, 12, '2017-03-27', 3, 1, '13201703271490594284.pdf', 'Pengadaan TV Fakultas', '1201703271490594825.pdf', '1201703271490594973.pdf', '1201703271490595090.pdf', '1201703271490598251.pdf', '1201703271490597424.pdf'),
(21, 14, 12, '2017-03-27', 3, 1, '13201703271490594308.pdf', 'Pengadaan Printer', '1201703271490594837.pdf', '1201703271490594985.pdf', '1201703271490595103.pdf', '1201703271490598432.pdf', '1201703271490597700.pdf'),
(22, 14, 12, '2017-03-27', 3, 1, '13201703271490594327.pdf', 'Pengadaan LCD', '1201703271490594847.pdf', '1201703271490594997.pdf', '1201703271490595117.pdf', '1201703271490598574.pdf', '1201703271490597641.pdf'),
(23, 14, 12, '2017-03-27', 3, 1, '13201703271490594352.pdf', 'Pengadaan Dispenser', '1201703271490594858.pdf', '1201703271490595026.pdf', '1201703271490595134.pdf', '1201703271490595779.pdf', '1201703271490597492.pdf'),
(24, 14, 12, '2017-03-27', 3, 1, '13201703271490594438.pdf', 'Pengadaan UPS', '1201703271490594875.pdf', '1201703271490595037.pdf', '1201703271490595148.pdf', '1201703271490598591.pdf', '1201703271490597545.pdf'),
(25, 14, 12, '2017-03-27', 3, 1, '13201703271490594464.pdf', 'Pengadaan Radio Hotspot', '1201703271490594887.pdf', '1201703271490595012.pdf', '1201703271490595159.pdf', '1201703271490598300.pdf', '1201703271490597665.pdf'),
(26, 11, 12, '2017-03-27', 3, 1, '13201703271490594352.pdf', 'Pengadaan Dispenser', '1201703271490594858.pdf', '1201703271490595026.pdf', '1201703271490595134.pdf', '1201703271490595885.pdf', '1201703271490597506.pdf'),
(27, 11, 12, '2017-03-27', 3, 1, '13201703271490594327.pdf', 'Pengadaan LCD', '1201703271490594847.pdf', '1201703271490594997.pdf', '1201703271490595117.pdf', '1201703271490598605.pdf', '1201703271490597618.pdf'),
(28, 11, 12, '2017-03-27', 3, 1, '13201703271490594284.pdf', 'Pengadaan TV Fakultas', '1201703271490594825.pdf', '1201703271490594973.pdf', '1201703271490595090.pdf', '1201703271490598494.pdf', '1201703271490597389.pdf'),
(29, 13, 12, '2017-03-27', 3, 2, '13201703271490594787.pdf', 'Perbaikan LCD Rusak', '1201703271490597763.pdf', '1201703271490597830.pdf', '1201703271490597892.pdf', '1201703271490599061.pdf', ''),
(30, 11, 8, '2017-03-27', 3, 2, '13201703271490594759.pdf', 'Perbaikan Infokus Rusak', '1201703271490597777.pdf', '1201703271490597842.pdf', '1201703271490597880.pdf', '1201703271490598643.pdf', ''),
(31, 11, 12, '2017-03-27', 3, 1, '13201703271490594682.pdf', 'Pengadaan Penghancur Kertas', '1201703271490594938.pdf', '1201703271490600143.pdf', '1201703271490600188.pdf', '1201703271490600351.pdf', '1201703271490600416.pdf'),
(32, 11, 12, '2017-03-27', 3, 1, '13201703271490594633.pdf', 'Pengadaan Infokus', '1201703271490596229.pdf', '1201703271490596296.pdf', '1201703271490596323.pdf', '1201703271490596656.pdf', '1201703271490596543.pdf'),
(33, 9, 12, '2017-03-27', 3, 1, '13201703271490594633.pdf', 'Pengadaan Infokus', '1201703271490596241.pdf', '1201703271490596286.pdf', '1201703271490596332.pdf', '1201703271490598515.pdf', '1201703271490596521.pdf'),
(34, 11, 5, '2017-03-29', 9, 1, '11201703291490777024.pdf', 'Pengadaan Komputer', '1201703291490777286.pdf', '1201703291490777376.pdf', '', '', ''),
(35, 11, 3, '2017-03-29', 9, 1, '11201703291490777041.pdf', 'Pengadaan Dispenser', '', '', '', '', ''),
(36, 11, 4, '2017-03-29', 9, 1, '11201703291490777068.pdf', 'Pengadaan DVD Player', '1201703291490777323.pdf', '', '', '', ''),
(37, 11, 3, '2017-03-29', 9, 4, '11201703291490777094.pdf', 'Pemindahan AC', '', '', '', '', ''),
(38, 11, 5, '2017-03-29', 9, 2, '11201703291490777229.pdf', 'Perbaikan Dispenser Rusak', '1201703291490777553.pdf', '1201703291490777587.pdf', '', '', ''),
(39, 11, 8, '2017-03-29', 9, 2, '11201703291490777259.pdf', 'Perbaikan Penghancur Kertas', '1201703291490777312.pdf', '1201703291490777366.pdf', '1201703291490777410.pdf', '1201703301490845940.pdf', ''),
(40, 9, 4, '2017-03-29', 10, 1, '9201703291490777463.pdf', 'Pengadaan DVD Player', '1201703291490777543.pdf', '', '', '', ''),
(41, 9, 3, '2017-03-29', 10, 1, '9201703291490777478.pdf', 'Pengadaan Komputer', '', '', '', '', ''),
(42, 9, 4, '2017-03-29', 10, 2, '9201703291490777514.pdf', 'Perbaikan Infokus Rusak', '1201703291490777567.pdf', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_histori_sistem`
--

CREATE TABLE IF NOT EXISTS `rf_aset_histori_sistem` (
  `ID_Histori` int(10) NOT NULL,
  `ID_Akun` int(3) NOT NULL,
  `Judul_Histori` varchar(25) NOT NULL,
  `Tanggal_Histori` date NOT NULL,
  `Waktu_Histori` time NOT NULL,
  `Deskripsi_Histori` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1495 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_histori_sistem`
--

INSERT INTO `rf_aset_histori_sistem` (`ID_Histori`, `ID_Akun`, `Judul_Histori`, `Tanggal_Histori`, `Waktu_Histori`, `Deskripsi_Histori`) VALUES
(1, 1, 'Login', '2016-12-24', '07:11:03', 'Login Sistem'),
(2, 1, 'Logout', '2016-12-24', '07:11:29', 'Logout Sistem'),
(3, 1, 'Login', '2016-12-24', '07:18:00', 'Login Sistem'),
(4, 1, 'Logout', '2016-12-24', '07:18:33', 'Logout Sistem'),
(5, 1, 'Login', '2016-12-24', '07:21:51', 'Login Sistem'),
(6, 1, 'Logout', '2016-12-24', '07:53:01', 'Logout Sistem'),
(7, 1, 'Login', '2016-12-24', '07:53:03', 'Login Sistem'),
(8, 1, 'Logout', '2016-12-24', '07:53:28', 'Logout Sistem'),
(9, 1, 'Login', '2016-12-24', '07:53:37', 'Login Sistem'),
(10, 1, 'Logout', '2016-12-24', '07:53:52', 'Logout Sistem'),
(11, 1, 'Login', '2016-12-24', '07:53:54', 'Login Sistem'),
(12, 1, 'Logout', '2016-12-24', '07:54:34', 'Logout Sistem'),
(13, 2, 'Login', '2016-12-24', '07:54:39', 'Login Sistem'),
(14, 2, 'Logout', '2016-12-24', '07:54:51', 'Logout Sistem'),
(15, 3, 'Login', '2016-12-24', '07:54:57', 'Login Sistem'),
(16, 3, 'Logout', '2016-12-24', '07:55:05', 'Logout Sistem'),
(17, 7, 'Login', '2016-12-24', '07:55:09', 'Login Sistem'),
(18, 7, 'Logout', '2016-12-24', '07:55:28', 'Logout Sistem'),
(19, 1, 'Login', '2016-12-24', '07:55:33', 'Login Sistem'),
(20, 1, 'Logout', '2016-12-24', '07:56:15', 'Logout Sistem'),
(21, 1, 'Login', '2016-12-24', '15:23:46', 'Login Sistem'),
(22, 1, 'Login', '2016-12-24', '18:40:33', 'Login Sistem'),
(23, 1, 'Logout', '2016-12-24', '18:40:38', 'Logout Sistem'),
(24, 1, 'Login', '2016-12-24', '18:40:46', 'Login Sistem'),
(25, 1, 'Logout', '2016-12-24', '18:43:14', 'Logout Sistem'),
(26, 1, 'Login', '2016-12-24', '18:43:22', 'Login Sistem'),
(27, 1, 'Logout', '2016-12-24', '18:43:25', 'Logout Sistem'),
(28, 1, 'Login', '2016-12-24', '18:59:02', 'Login Sistem'),
(29, 1, 'Login', '2016-12-26', '17:04:33', 'Login Sistem'),
(30, 1, 'Login', '2016-12-29', '07:14:05', 'Login Sistem'),
(31, 1, 'Login', '2016-12-30', '09:10:34', 'Login Sistem'),
(32, 1, 'Login', '2017-01-01', '18:33:56', 'Login Sistem'),
(33, 1, 'Login', '2017-01-05', '05:21:55', 'Login Sistem'),
(34, 1, 'Login', '2017-01-12', '01:16:25', 'Login Sistem'),
(35, 1, 'Login', '2017-01-16', '08:41:19', 'Login Sistem'),
(36, 1, 'Login', '2017-01-18', '09:32:00', 'Login Sistem'),
(37, 1, 'Login', '2017-01-25', '02:51:27', 'Login Sistem'),
(38, 1, 'Login', '2017-01-25', '05:16:34', 'Login Sistem'),
(39, 1, 'Input Menu', '2017-01-25', '05:52:23', 'Tambah Menu Permohonan Aset BAru Sistem'),
(40, 1, 'Input Menu', '2017-01-25', '05:53:11', 'Tambah Menu Permohonan Perbaikan Aset Sistem'),
(41, 1, 'Edit Menu', '2017-01-25', '05:53:34', 'Edit Menu Permohonan Baru Sistem'),
(42, 1, 'Edit Menu', '2017-01-25', '05:53:44', 'Edit Menu Permohonan Perbaikan Sistem'),
(43, 1, 'Edit Menu', '2017-01-25', '05:54:14', 'Edit Menu Permohonan Perbaikan Sistem'),
(44, 1, 'Edit Menu', '2017-01-25', '05:54:42', 'Edit Menu Permohonan Perbaikan Sistem'),
(45, 1, 'Input Menu', '2017-01-25', '05:56:02', 'Tambah Menu Permohonan Penghapusan Sistem'),
(46, 1, 'Input Menu', '2017-01-25', '05:56:40', 'Tambah Menu Pelaporan Sistem'),
(47, 1, 'Input Menu', '2017-01-25', '06:08:16', 'Tambah Menu Permohonan Baru Sistem'),
(48, 1, 'Edit Menu', '2017-01-25', '06:09:59', 'Edit Menu Permohonan Baru Sistem'),
(49, 1, 'Edit Menu', '2017-01-25', '06:12:07', 'Edit Menu Permohonan Baru Sistem'),
(50, 1, 'Input Menu', '2017-01-25', '06:13:29', 'Tambah Menu Histori Sistem Sistem'),
(51, 1, 'Input Menu', '2017-01-25', '06:14:33', 'Tambah Menu Historia Sistem'),
(52, 1, 'Edit Menu', '2017-01-25', '06:16:01', 'Edit Menu Permohonan Perbaikan Sistem'),
(53, 1, 'Edit Menu', '2017-01-25', '06:17:50', 'Edit Menu Permohonan Penghapusan Sistem'),
(54, 1, 'Input Menu', '2017-01-25', '06:19:31', 'Tambah Menu Tester Sistem'),
(55, 1, 'Edit Menu', '2017-01-25', '06:21:39', 'Edit Menu Permohonan Penghapusan Sistem'),
(56, 1, 'Edit Menu', '2017-01-25', '06:22:22', 'Edit Menu Permohonan Baru Sistem'),
(57, 1, 'Edit Menu', '2017-01-25', '06:22:42', 'Edit Menu Permohonan Perbaikan Sistem'),
(58, 1, 'Edit Menu', '2017-01-25', '06:23:08', 'Edit Menu Permohonan Penghapusan Sistem'),
(59, 1, 'Edit Menu', '2017-01-25', '06:23:38', 'Edit Menu Histori Sistem Sistem'),
(60, 1, 'Edit Menu', '2017-01-25', '06:24:04', 'Edit Menu Histori Sistem Sistem'),
(61, 1, 'Edit Menu', '2017-01-25', '06:24:32', 'Edit Menu Permohonan Baru Sistem'),
(62, 1, 'Edit Menu', '2017-01-25', '06:24:44', 'Edit Menu Permohonan Penghapusan Sistem'),
(63, 1, 'Edit Menu', '2017-01-25', '06:25:06', 'Edit Menu Permohonan Perbaikan Sistem'),
(64, 1, 'Edit Menu', '2017-01-25', '06:25:25', 'Edit Menu Permohonan Penghapusan Sistem'),
(65, 1, 'Input Menu', '2017-01-25', '06:28:34', 'Tambah Menu Keadaan Aset Sistem'),
(66, 1, 'Input Menu', '2017-01-25', '06:29:26', 'Tambah Menu Permintaan Aset Sistem'),
(67, 1, 'Input Menu', '2017-01-25', '06:30:22', 'Tambah Menu Perbaikan Aset Sistem'),
(68, 1, 'Edit Menu', '2017-01-25', '06:30:55', 'Edit Menu Permohonan Baru Sistem'),
(69, 1, 'Edit Menu', '2017-01-25', '06:31:13', 'Edit Menu Permohonan Penghapusan Sistem'),
(70, 1, 'Input Menu', '2017-01-25', '06:32:27', 'Tambah Menu Register Aset Sistem'),
(71, 1, 'Edit Menu', '2017-01-25', '06:32:50', 'Edit Menu Register Aset Sistem'),
(72, 1, 'Edit Menu', '2017-01-25', '06:39:54', 'Edit Menu Tester Sistem'),
(73, 1, 'Delete Menu Sistem', '2017-01-25', '06:40:01', 'Hapus Menu Sistem > Tester'),
(74, 1, 'Input Menu', '2017-01-25', '06:40:26', 'Tambah Menu Tester Sistem'),
(75, 1, 'Delete Menu Sistem', '2017-01-25', '06:41:47', 'Hapus Menu Sistem > Tester'),
(76, 1, 'Input Modul', '2017-01-25', '06:43:53', 'Tambah Modul Histori Sistem Sistem'),
(77, 1, 'Delete Modul Sistem', '2017-01-25', '06:44:11', 'Hapus Modul Sistem > Histori Sistem'),
(78, 1, 'Input Modul', '2017-01-25', '06:44:37', 'Tambah Modul Histori Sistem Sistem'),
(79, 1, 'Delete Modul Sistem', '2017-01-25', '06:44:42', 'Hapus Modul Sistem > Histori Sistem'),
(80, 1, 'Input Modul', '2017-01-25', '06:46:05', 'Tambah Modul Histori Sistem Sistem'),
(81, 1, 'Delete Modul Sistem', '2017-01-25', '06:46:10', 'Hapus Modul Sistem > Histori Sistem'),
(82, 1, 'Input Modul', '2017-01-25', '06:46:36', 'Tambah Modul Histori Sistem Sistem'),
(83, 1, 'Delete Modul Sistem', '2017-01-25', '06:46:40', 'Hapus Modul Sistem > Histori Sistem'),
(84, 1, 'Input Menu', '2017-01-25', '06:48:22', 'Tambah Menu Daftar Aset Sistem'),
(85, 1, 'Logout', '2017-01-25', '06:57:55', 'Logout Sistem'),
(86, 7, 'Login', '2017-01-25', '06:58:01', 'Login Sistem'),
(87, 7, 'Logout', '2017-01-25', '06:58:15', 'Logout Sistem'),
(88, 3, 'Login', '2017-01-25', '06:58:20', 'Login Sistem'),
(89, 3, 'Logout', '2017-01-25', '07:13:27', 'Logout Sistem'),
(90, 1, 'Login', '2017-01-25', '07:13:32', 'Login Sistem'),
(91, 1, 'Logout', '2017-01-25', '07:16:52', 'Logout Sistem'),
(92, 1, 'Login', '2017-01-25', '07:16:53', 'Login Sistem'),
(93, 1, 'Logout', '2017-01-25', '07:16:59', 'Logout Sistem'),
(94, 3, 'Login', '2017-01-25', '07:17:05', 'Login Sistem'),
(95, 3, 'Logout', '2017-01-25', '07:17:11', 'Logout Sistem'),
(96, 5, 'Login', '2017-01-25', '07:17:17', 'Login Sistem'),
(97, 5, 'Logout', '2017-01-25', '07:17:21', 'Logout Sistem'),
(98, 4, 'Login', '2017-01-25', '07:17:28', 'Login Sistem'),
(99, 4, 'Logout', '2017-01-25', '07:17:32', 'Logout Sistem'),
(100, 7, 'Login', '2017-01-25', '07:17:36', 'Login Sistem'),
(101, 7, 'Logout', '2017-01-25', '07:17:42', 'Logout Sistem'),
(102, 2, 'Login', '2017-01-25', '07:17:46', 'Login Sistem'),
(103, 2, 'Logout', '2017-01-25', '07:18:59', 'Logout Sistem'),
(104, 7, 'Login', '2017-01-25', '07:19:03', 'Login Sistem'),
(105, 7, 'Logout', '2017-01-25', '07:19:08', 'Logout Sistem'),
(106, 3, 'Login', '2017-01-25', '07:19:12', 'Login Sistem'),
(107, 3, 'Logout', '2017-01-25', '07:19:17', 'Logout Sistem'),
(108, 1, 'Login', '2017-01-25', '07:19:21', 'Login Sistem'),
(109, 1, 'Logout', '2017-01-25', '07:22:12', 'Logout Sistem'),
(110, 3, 'Login', '2017-01-25', '07:22:15', 'Login Sistem'),
(111, 3, 'Logout', '2017-01-25', '07:22:25', 'Logout Sistem'),
(112, 2, 'Login', '2017-01-25', '07:24:32', 'Login Sistem'),
(113, 2, 'Logout', '2017-01-25', '07:26:35', 'Logout Sistem'),
(114, 3, 'Login', '2017-01-25', '07:26:39', 'Login Sistem'),
(115, 3, 'Logout', '2017-01-25', '07:26:44', 'Logout Sistem'),
(116, 6, 'Login', '2017-01-25', '07:26:49', 'Login Sistem'),
(117, 6, 'Logout', '2017-01-25', '07:26:55', 'Logout Sistem'),
(118, 7, 'Login', '2017-01-25', '07:26:59', 'Login Sistem'),
(119, 7, 'Logout', '2017-01-25', '07:27:17', 'Logout Sistem'),
(120, 1, 'Login', '2017-01-25', '07:27:32', 'Login Sistem'),
(121, 1, 'Logout', '2017-01-25', '07:32:08', 'Logout Sistem'),
(122, 2, 'Login', '2017-01-25', '07:32:11', 'Login Sistem'),
(123, 2, 'Logout', '2017-01-25', '07:32:19', 'Logout Sistem'),
(124, 3, 'Login', '2017-01-25', '07:32:26', 'Login Sistem'),
(125, 3, 'Logout', '2017-01-25', '07:32:35', 'Logout Sistem'),
(126, 2, 'Login', '2017-01-25', '07:32:39', 'Login Sistem'),
(127, 2, 'Logout', '2017-01-25', '07:36:16', 'Logout Sistem'),
(128, 3, 'Login', '2017-01-25', '07:36:20', 'Login Sistem'),
(129, 3, 'Logout', '2017-01-25', '07:39:36', 'Logout Sistem'),
(130, 2, 'Login', '2017-01-25', '07:39:39', 'Login Sistem'),
(131, 2, 'Logout', '2017-01-25', '07:40:11', 'Logout Sistem'),
(132, 2, 'Login', '2017-01-25', '07:40:13', 'Login Sistem'),
(133, 2, 'Logout', '2017-01-25', '07:40:31', 'Logout Sistem'),
(134, 7, 'Login', '2017-01-25', '07:40:35', 'Login Sistem'),
(135, 7, 'Logout', '2017-01-25', '07:40:40', 'Logout Sistem'),
(136, 6, 'Login', '2017-01-25', '07:40:43', 'Login Sistem'),
(137, 6, 'Logout', '2017-01-25', '07:45:37', 'Logout Sistem'),
(138, 1, 'Login', '2017-01-25', '07:45:41', 'Login Sistem'),
(139, 1, 'Login', '2017-01-25', '09:32:29', 'Login Sistem'),
(140, 1, 'Login', '2017-01-25', '11:05:41', 'Login Sistem'),
(141, 1, 'Logout', '2017-01-25', '11:07:23', 'Logout Sistem'),
(142, 1, 'Login', '2017-01-25', '11:10:54', 'Login Sistem'),
(143, 1, 'Login', '2017-01-25', '15:56:35', 'Login Sistem'),
(144, 1, 'Logout', '2017-01-25', '16:24:27', 'Logout Sistem'),
(145, 6, 'Login', '2017-01-25', '16:24:42', 'Login Sistem'),
(146, 6, 'Logout', '2017-01-25', '16:30:40', 'Logout Sistem'),
(147, 1, 'Login', '2017-01-25', '16:30:47', 'Login Sistem'),
(148, 1, 'Login', '2017-01-26', '14:12:55', 'Login Sistem'),
(149, 1, 'Login', '2017-01-26', '14:58:02', 'Login Sistem'),
(150, 1, 'Login', '2017-01-28', '15:04:03', 'Login Sistem'),
(151, 1, 'Login', '2017-01-28', '16:43:41', 'Login Sistem'),
(152, 1, 'Login', '2017-01-29', '06:01:39', 'Login Sistem'),
(153, 1, 'Login', '2017-01-29', '14:03:00', 'Login Sistem'),
(154, 1, 'Login', '2017-02-01', '09:48:38', 'Login Sistem'),
(155, 1, 'Login', '2017-02-01', '18:19:42', 'Login Sistem'),
(156, 1, 'Login', '2017-02-06', '16:05:00', 'Login Sistem'),
(157, 1, 'Login', '2017-02-07', '03:45:19', 'Login Sistem'),
(158, 1, 'Login', '2017-02-07', '08:55:56', 'Login Sistem'),
(159, 1, 'Login', '2017-02-08', '06:18:05', 'Login Sistem'),
(160, 1, 'Login', '2017-02-11', '05:14:51', 'Login Sistem'),
(161, 1, 'Input Barang', '2017-02-11', '05:39:19', 'Tambah Barang ucakucak'),
(162, 1, 'Input Barang', '2017-02-11', '05:39:19', 'Tambah Barang ucakucak'),
(163, 1, 'Input Barang', '2017-02-11', '05:39:19', 'Tambah Barang ucakucak'),
(164, 1, 'Input Barang', '2017-02-11', '05:39:19', 'Tambah Barang ucakucak'),
(165, 1, 'Input Barang', '2017-02-11', '05:39:20', 'Tambah Barang ucakucak'),
(166, 1, 'Input Barang', '2017-02-11', '05:40:41', 'Tambah Barang ucakucak2'),
(167, 1, 'Input Barang', '2017-02-11', '05:40:41', 'Tambah Barang ucakucak2'),
(168, 1, 'Input Barang', '2017-02-11', '05:40:41', 'Tambah Barang ucakucak2'),
(169, 1, 'Input Barang', '2017-02-11', '05:40:41', 'Tambah Barang ucakucak2'),
(170, 1, 'Input Barang', '2017-02-11', '05:40:41', 'Tambah Barang ucakucak2'),
(171, 1, 'Input Barang', '2017-02-11', '05:42:29', 'Tambah Barang ucakucak3'),
(172, 1, 'Input Barang', '2017-02-11', '05:42:29', 'Tambah Barang ucakucak3'),
(173, 1, 'Input Barang', '2017-02-11', '05:42:29', 'Tambah Barang ucakucak3'),
(174, 1, 'Input Tipe Barang', '2017-02-11', '07:00:45', 'Tambah Tipe Barang Infokus'),
(175, 1, 'Edit Tipe Barang', '2017-02-11', '07:09:55', 'Edit Tipe Barang Infokusa'),
(176, 1, 'Edit Tipe Barang', '2017-02-11', '07:10:03', 'Edit Tipe Barang Infokusa'),
(177, 1, 'Edit Tipe Barang', '2017-02-11', '07:10:41', 'Edit Tipe Barang Infokusa'),
(178, 1, 'Edit Tipe Barang', '2017-02-11', '07:11:37', 'Edit Tipe Barang Infokusa'),
(179, 1, 'Edit Tipe Barang', '2017-02-11', '07:11:44', 'Edit Tipe Barang Infokusa'),
(180, 1, 'Delete Tipe Barang', '2017-02-11', '07:11:47', 'Hapus Tipe Barang > Infokusa'),
(181, 1, 'Delete Tipe Barang', '2017-02-11', '07:11:47', 'Hapus Tipe Barang 1'),
(182, 1, 'Input Tipe Barang', '2017-02-11', '07:15:25', 'Tambah Tipe Barang Infokus'),
(183, 1, 'Edit Tipe Barang', '2017-02-11', '07:15:38', 'Edit Tipe Barang Infokus'),
(184, 1, 'Edit Tipe Barang', '2017-02-11', '07:15:43', 'Edit Tipe Barang Infokus'),
(185, 1, 'Login', '2017-02-11', '09:16:42', 'Login Sistem'),
(186, 1, 'Delete Barang', '2017-02-11', '09:40:43', 'Hapus Barang 2'),
(187, 1, 'Delete Barang', '2017-02-11', '09:40:46', 'Hapus Barang 3'),
(188, 1, 'Delete Barang', '2017-02-11', '09:40:49', 'Hapus Barang 5'),
(189, 1, 'Input Register Aset', '2017-02-11', '10:38:59', 'Register Aset '),
(190, 1, 'Input Tipe Barang', '2017-02-11', '10:53:06', 'Tambah Tipe Barang LCD'),
(191, 1, 'Input Register Aset', '2017-02-11', '10:54:35', 'Register Aset '),
(192, 1, 'Input Register Aset', '2017-02-11', '10:56:05', 'Register Aset '),
(193, 1, 'Input Register Aset', '2017-02-11', '10:59:39', 'Register Aset '),
(194, 1, 'Input Register Aset', '2017-02-11', '11:01:57', 'Register Aset '),
(195, 1, 'Input Register Aset', '2017-02-11', '11:03:14', 'Register Aset '),
(196, 1, 'Input Register Aset', '2017-02-11', '11:03:26', 'Register Aset '),
(197, 1, 'Input Register Aset', '2017-02-11', '11:08:10', 'Register Aset '),
(198, 1, 'Input Barang', '2017-02-11', '11:11:18', 'Tambah Barang 3'),
(199, 1, 'Input Register Aset', '2017-02-11', '11:11:40', 'Register Aset '),
(200, 1, 'Delete Register Aset', '2017-02-11', '11:11:52', 'Hapus Register Aset 40'),
(201, 1, 'Input Unit Kerja', '2017-02-11', '11:14:35', 'Tambah Unit Kerja Sains Dan Teknologi'),
(202, 1, 'Input Unit Kerja', '2017-02-11', '11:14:51', 'Tambah Unit Kerja Syariah'),
(203, 1, 'Input Unit Kerja', '2017-02-11', '11:15:03', 'Tambah Unit Kerja Ekonomi Dan Bisnis'),
(204, 1, 'Input Unit Kerja', '2017-02-11', '11:15:17', 'Tambah Unit Kerja Adab Dan Humaniora'),
(205, 1, 'Input Unit Kerja', '2017-02-11', '11:15:47', 'Tambah Unit Kerja Hushuludin Dan Pemikiran Islam'),
(206, 1, 'Input Unit Kerja', '2017-02-11', '11:16:19', 'Tambah Unit Kerja Tarbiyah Dan Keguruan'),
(207, 1, 'Input Unit Kerja', '2017-02-11', '11:16:37', 'Tambah Unit Kerja Ilmu Politik'),
(208, 1, 'Input Unit Kerja', '2017-02-11', '11:16:45', 'Tambah Unit Kerja Fisikologi'),
(209, 1, 'Edit Sub Unit Kerja', '2017-02-11', '11:17:02', 'Edit Sub Unit Kerja Sistem Informasi'),
(210, 1, 'Input Sub Unit Kerja', '2017-02-11', '11:17:34', 'Tambah Sub Unit Kerja Pendidikan Bahasa Inggris'),
(211, 1, 'Input Sub Unit Kerja', '2017-02-11', '11:17:46', 'Tambah Sub Unit Kerja Kimia'),
(212, 1, 'Input Sub Unit Kerja', '2017-02-11', '11:18:25', 'Tambah Sub Unit Kerja Pendidikan Bahasa Indonesia'),
(213, 1, 'Input Sub Unit Kerja', '2017-02-11', '11:18:50', 'Tambah Sub Unit Kerja Ekonomi Islam'),
(214, 1, 'Input Kategori Barang', '2017-02-11', '11:19:14', 'Tambah Kategori Barang ATK'),
(215, 1, 'Input Tipe Barang', '2017-02-11', '11:20:09', 'Tambah Tipe Barang TV'),
(216, 1, 'Input Tipe Barang', '2017-02-11', '11:21:31', 'Tambah Tipe Barang Radio Hotspot/Switch Hub/Radio Akses Poin'),
(217, 1, 'Input Barang', '2017-02-11', '11:23:19', 'Tambah Barang 5'),
(218, 1, 'Input Register Aset', '2017-02-11', '11:24:08', 'Register Aset '),
(219, 1, 'Input Register Aset', '2017-02-11', '11:33:39', 'Register Aset '),
(220, 1, 'Input Register Aset', '2017-02-11', '11:34:17', 'Register Aset '),
(221, 1, 'Input Register Aset', '2017-02-11', '11:35:28', 'Register Aset '),
(222, 1, 'Input Register Aset', '2017-02-11', '11:35:41', 'Register Aset '),
(223, 1, 'Input Register Aset', '2017-02-11', '11:36:15', 'Register Aset '),
(224, 1, 'Input Register Aset', '2017-02-11', '11:37:05', 'Register Aset '),
(225, 1, 'Input Register Aset', '2017-02-11', '11:37:45', 'Register Aset '),
(226, 1, 'Input Register Aset', '2017-02-11', '11:38:27', 'Register Aset '),
(227, 1, 'Input Register Aset', '2017-02-11', '11:39:26', 'Register Aset '),
(228, 1, 'Input Register Aset', '2017-02-11', '11:39:48', 'Register Aset '),
(229, 1, 'Input Register Aset', '2017-02-11', '11:41:32', 'Register Aset '),
(230, 1, 'Input Register Aset', '2017-02-11', '11:42:07', 'Register Aset '),
(231, 1, 'Input Register Aset', '2017-02-11', '11:43:32', 'Register Aset '),
(232, 1, 'Input Register Aset', '2017-02-11', '11:43:38', 'Register Aset '),
(233, 1, 'Input Register Aset', '2017-02-11', '11:44:28', 'Register Aset '),
(234, 1, 'Input Register Aset', '2017-02-11', '11:45:04', 'Register Aset '),
(235, 1, 'Input Register Aset', '2017-02-11', '11:45:36', 'Register Aset '),
(236, 1, 'Input Register Aset', '2017-02-11', '11:46:30', 'Register Aset '),
(237, 1, 'Input Register Aset', '2017-02-11', '11:47:30', 'Register Aset '),
(238, 1, 'Input Register Aset', '2017-02-11', '11:47:48', 'Register Aset '),
(239, 1, 'Input Register Aset', '2017-02-11', '11:49:11', 'Register Aset '),
(240, 1, 'Input Register Aset', '2017-02-11', '11:49:41', 'Register Aset '),
(241, 1, 'Input Register Aset', '2017-02-11', '11:50:54', 'Register Aset '),
(242, 1, 'Input Register Aset', '2017-02-11', '11:51:29', 'Register Aset '),
(243, 1, 'Input Register Aset', '2017-02-11', '11:51:53', 'Register Aset '),
(244, 1, 'Input Register Aset', '2017-02-11', '11:52:15', 'Register Aset '),
(245, 1, 'Input Register Aset', '2017-02-11', '11:53:48', 'Register Aset '),
(246, 1, 'Input Register Aset', '2017-02-11', '11:54:46', 'Register Aset '),
(247, 1, 'Input Register Aset', '2017-02-11', '11:54:59', 'Register Aset '),
(248, 1, 'Input Register Aset', '2017-02-11', '11:55:44', 'Register Aset '),
(249, 1, 'Input Register Aset', '2017-02-11', '11:56:17', 'Register Aset '),
(250, 1, 'Input Register Aset', '2017-02-11', '11:58:37', 'Register Aset '),
(251, 1, 'Input Register Aset', '2017-02-11', '11:58:42', 'Register Aset '),
(252, 1, 'Input Register Aset', '2017-02-11', '11:59:14', 'Register Aset '),
(253, 1, 'Input Register Aset', '2017-02-11', '12:01:26', 'Register Aset '),
(254, 1, 'Input Register Aset', '2017-02-11', '12:14:22', 'Register Aset '),
(255, 1, 'Input Register Aset', '2017-02-11', '12:14:30', 'Register Aset '),
(256, 1, 'Input Register Aset', '2017-02-11', '12:14:34', 'Register Aset '),
(257, 1, 'Input Register Aset', '2017-02-11', '12:15:03', 'Register Aset '),
(258, 1, 'Input Unit Kerja', '2017-02-11', '12:17:53', 'Tambah Unit Kerja UIN Raden Fatah'),
(259, 1, 'Input Sub Unit Kerja', '2017-02-11', '12:18:10', 'Tambah Sub Unit Kerja LPPM'),
(260, 1, 'Input Unit Kerja', '2017-02-11', '12:18:27', 'Tambah Unit Kerja Pasca Sarjana'),
(261, 1, 'Input Sub Unit Kerja', '2017-02-11', '12:18:47', 'Tambah Sub Unit Kerja Rektorat'),
(262, 1, 'Input Sub Unit Kerja', '2017-02-11', '12:19:00', 'Tambah Sub Unit Kerja BAAK'),
(263, 1, 'Delete Menu Sistem', '2017-02-11', '12:22:15', 'Hapus Menu Sistem > Lokasi Barang'),
(264, 1, 'Edit Modul', '2017-02-11', '12:32:05', 'Edit Modul Dokumen Rektorat Sistem'),
(265, 1, 'Edit Modul', '2017-02-11', '12:33:03', 'Edit Modul Dokumen Unit Kerja Sistem'),
(266, 1, 'Input Menu', '2017-02-11', '12:36:58', 'Tambah Menu Update Aset Sistem'),
(267, 1, 'Delete Menu Sistem', '2017-02-11', '12:40:25', 'Hapus Menu Sistem > Update Aset'),
(268, 1, 'Input Barang', '2017-02-11', '12:43:13', 'Tambah Barang 2'),
(269, 1, 'Input Barang', '2017-02-11', '12:43:30', 'Tambah Barang 2'),
(270, 1, 'Input Register Aset', '2017-02-11', '12:43:39', 'Register Aset '),
(271, 1, 'Input Register Aset', '2017-02-11', '12:43:55', 'Register Aset '),
(272, 1, 'Input Barang', '2017-02-11', '12:44:13', 'Tambah Barang 2'),
(273, 1, 'Input Register Aset', '2017-02-11', '12:44:22', 'Register Aset '),
(274, 1, 'Login', '2017-02-15', '18:34:11', 'Login Sistem'),
(275, 1, 'Input Barang', '2017-02-15', '18:38:42', 'Tambah Barang 3'),
(276, 1, 'Input Register Aset', '2017-02-15', '18:40:09', 'Register Aset '),
(277, 1, 'Edit Menu', '2017-02-15', '18:44:11', 'Edit Menu Pelaporan Sistem'),
(278, 1, 'Edit Menu', '2017-02-15', '18:46:50', 'Edit Menu Permohonan Aset Sistem'),
(279, 1, 'Edit Menu', '2017-02-15', '18:47:09', 'Edit Menu Permohonan Aset Sistem'),
(280, 1, 'Delete Menu Sistem', '2017-02-15', '18:47:18', 'Hapus Menu Sistem > Permohonan Perbaikan'),
(281, 1, 'Delete Menu Sistem', '2017-02-15', '18:47:23', 'Hapus Menu Sistem > Permohonan Penghapusan'),
(282, 1, 'Delete Menu Sistem', '2017-02-15', '18:47:36', 'Hapus Menu Sistem > Permohonan Perbaikan'),
(283, 1, 'Edit Menu', '2017-02-15', '18:48:00', 'Edit Menu Pelaporan Aset Sistem'),
(284, 1, 'Delete Menu Sistem', '2017-02-15', '18:48:11', 'Hapus Menu Sistem > Permohonan Penghapusan'),
(285, 1, 'Edit Menu', '2017-02-15', '18:49:06', 'Edit Menu Data Aset Sistem'),
(286, 1, 'Login', '2017-02-16', '10:03:03', 'Login Sistem'),
(287, 1, 'Login', '2017-02-16', '15:17:48', 'Login Sistem'),
(288, 1, 'Login', '2017-02-16', '18:25:22', 'Login Sistem'),
(289, 1, 'Login', '2017-02-19', '05:05:43', 'Login Sistem'),
(290, 1, 'Logout', '2017-02-19', '05:08:21', 'Logout Sistem'),
(291, 1, 'Login', '2017-02-21', '09:17:48', 'Login Sistem'),
(292, 1, 'Edit User', '2017-02-21', '09:25:03', 'Edit User Pasca Sarjana'),
(293, 1, 'Edit User', '2017-02-21', '09:25:13', 'Edit User Unit Kerja'),
(294, 1, 'Edit User', '2017-02-21', '09:36:17', 'Edit User Admin'),
(295, 1, 'Edit User', '2017-02-21', '09:37:03', 'Edit User Admin'),
(296, 1, 'Edit User', '2017-02-21', '09:38:35', 'Edit User Admin'),
(297, 1, 'Edit User', '2017-02-21', '09:38:53', 'Edit User Fakultas'),
(298, 1, 'Edit User', '2017-02-21', '09:41:03', 'Edit User Pasca Sarjana'),
(299, 1, 'Edit User', '2017-02-21', '09:41:14', 'Edit User Unit Kerja'),
(300, 1, 'Edit User', '2017-02-21', '09:41:28', 'Edit User Kepala Bagian Umum'),
(301, 1, 'Edit User', '2017-02-21', '09:41:38', 'Edit User Rektor'),
(302, 1, 'Edit User', '2017-02-21', '09:49:02', 'Edit User Admin'),
(303, 1, 'Edit User', '2017-02-21', '09:51:05', 'Edit User Unit Kerja'),
(304, 1, 'Edit User', '2017-02-21', '09:51:52', 'Edit User Admin'),
(305, 1, 'Edit User', '2017-02-21', '09:52:09', 'Edit User Unit Kerja'),
(306, 1, 'Edit User', '2017-02-21', '09:53:31', 'Edit User TU Rektorat'),
(307, 1, 'Edit User', '2017-02-21', '09:54:03', 'Edit User TU Rektorat'),
(308, 1, 'Edit User', '2017-02-21', '09:54:26', 'Edit User Dekan'),
(309, 1, 'Edit User', '2017-02-21', '09:54:52', 'Edit User Rektor'),
(310, 1, 'Edit User', '2017-02-21', '09:55:27', 'Edit User Kabag Umum Fakultas'),
(311, 1, 'Input User', '2017-02-21', '09:56:13', 'Tambah User Kabag Umum Rektorat ke dalam Sistem'),
(312, 1, 'Input Permohonan', '2017-02-21', '10:51:49', 'Tambah Permohonan Pengadaan Lab'),
(313, 1, 'Logout', '2017-02-21', '11:34:00', 'Logout Sistem'),
(314, 3, 'Login', '2017-02-21', '11:34:07', 'Login Sistem'),
(315, 3, 'Input Permohonan', '2017-02-21', '11:35:55', 'Tambah Permohonan Pengadaan Komputer'),
(316, 3, 'Logout', '2017-02-21', '11:36:27', 'Logout Sistem'),
(317, 1, 'Login', '2017-02-21', '11:36:33', 'Login Sistem'),
(318, 1, 'Logout', '2017-02-21', '11:55:58', 'Logout Sistem'),
(319, 1, 'Login', '2017-02-21', '11:56:00', 'Login Sistem'),
(320, 1, 'Logout', '2017-02-21', '11:56:35', 'Logout Sistem'),
(321, 3, 'Login', '2017-02-21', '11:56:41', 'Login Sistem'),
(322, 1, 'Login', '2017-02-21', '12:30:57', 'Login Sistem'),
(323, 1, 'Logout', '2017-02-21', '12:31:18', 'Logout Sistem'),
(324, 1, 'Login', '2017-02-21', '12:31:26', 'Login Sistem'),
(325, 1, 'Edit User', '2017-02-21', '12:31:40', 'Edit User Kabag Umum Fakultas'),
(326, 1, 'Logout', '2017-02-21', '12:31:44', 'Logout Sistem'),
(327, 1, 'Login', '2017-02-21', '12:32:25', 'Login Sistem'),
(328, 1, 'Edit User', '2017-02-21', '12:32:38', 'Edit User Kabag Umum Fakultas'),
(329, 1, 'Logout', '2017-02-21', '12:32:51', 'Logout Sistem'),
(330, 1, 'Login', '2017-02-21', '12:33:03', 'Login Sistem'),
(331, 1, 'Edit User', '2017-02-21', '12:33:23', 'Edit User Kabag Umum Fakultas'),
(332, 1, 'Logout', '2017-02-21', '12:33:35', 'Logout Sistem'),
(333, 4, 'Login', '2017-02-21', '12:35:00', 'Login Sistem'),
(334, 4, 'Logout', '2017-02-21', '12:35:30', 'Logout Sistem'),
(335, 1, 'Login', '2017-02-21', '12:35:54', 'Login Sistem'),
(336, 1, 'Logout', '2017-02-21', '12:36:18', 'Logout Sistem'),
(337, 5, 'Login', '2017-02-21', '12:36:26', 'Login Sistem'),
(338, 5, 'Logout', '2017-02-21', '12:37:12', 'Logout Sistem'),
(339, 1, 'Login', '2017-02-21', '18:43:48', 'Login Sistem'),
(340, 1, 'Logout', '2017-02-21', '18:57:57', 'Logout Sistem'),
(341, 3, 'Login', '2017-02-21', '18:58:05', 'Login Sistem'),
(342, 3, 'Logout', '2017-02-21', '18:58:32', 'Logout Sistem'),
(343, 5, 'Login', '2017-02-21', '18:58:41', 'Login Sistem'),
(344, 5, 'Logout', '2017-02-21', '18:59:51', 'Logout Sistem'),
(345, 1, 'Login', '2017-02-21', '19:00:02', 'Login Sistem'),
(346, 1, 'Logout', '2017-02-21', '19:01:28', 'Logout Sistem'),
(347, 1, 'Login', '2017-02-21', '19:01:41', 'Login Sistem'),
(348, 1, 'Edit User', '2017-02-21', '19:02:00', 'Edit User Kabag Umum Fakultas'),
(349, 1, 'Logout', '2017-02-21', '19:02:04', 'Logout Sistem'),
(350, 7, 'Login', '2017-02-21', '19:02:09', 'Login Sistem'),
(351, 7, 'Logout', '2017-02-21', '19:02:27', 'Logout Sistem'),
(352, 1, 'Login', '2017-02-21', '19:02:32', 'Login Sistem'),
(353, 1, 'Edit User', '2017-02-21', '19:02:46', 'Edit User Kabag Umum Fakultas'),
(354, 1, 'Logout', '2017-02-21', '19:02:51', 'Logout Sistem'),
(355, 7, 'Login', '2017-02-21', '19:03:06', 'Login Sistem'),
(356, 7, 'Logout', '2017-02-21', '19:03:22', 'Logout Sistem'),
(357, 1, 'Login', '2017-02-21', '19:03:29', 'Login Sistem'),
(358, 1, 'Logout', '2017-02-21', '19:05:55', 'Logout Sistem'),
(359, 1, 'Login', '2017-02-21', '19:06:00', 'Login Sistem'),
(360, 1, 'Edit Dokumen', '2017-02-21', '19:41:38', 'Edit Dokumen Pengadaan Lab II'),
(361, 1, 'Edit Dokumen', '2017-02-21', '19:45:28', 'Edit Dokumen Pengadaan Lab II'),
(362, 1, 'Edit Dokumen', '2017-02-21', '19:46:18', 'Edit Dokumen Pengadaan Lab'),
(363, 1, 'Delete Dokumen Permohonan', '2017-02-21', '19:53:37', 'Hapus Dokumen Permohonan > Pengadaan Lab'),
(364, 1, 'Edit Dokumen', '2017-02-21', '19:54:36', 'Edit Dokumen Pengadaan Labhuh'),
(365, 1, 'Delete Dokumen Permohonan', '2017-02-21', '19:54:42', 'Hapus Dokumen Permohonan > Pengadaan Labhuh'),
(366, 1, 'Disposisi Dokumen', '2017-02-21', '20:07:56', 'Disposisi Dokumen Pengadaan Lab Ke Dekan'),
(367, 1, 'Disposisi Dokumen', '2017-02-21', '20:08:16', 'Disposisi Dokumen Pengadaan Lab Ke Dekan'),
(368, 1, 'Logout', '2017-02-21', '20:25:10', 'Logout Sistem'),
(369, 7, 'Login', '2017-02-21', '20:25:18', 'Login Sistem'),
(370, 7, 'Logout', '2017-02-21', '20:26:09', 'Logout Sistem'),
(371, 3, 'Login', '2017-02-21', '20:26:23', 'Login Sistem'),
(372, 3, 'Logout', '2017-02-21', '20:26:36', 'Logout Sistem'),
(373, 1, 'Login', '2017-02-21', '20:26:40', 'Login Sistem'),
(374, 1, 'Edit User', '2017-02-21', '20:26:55', 'Edit User Kabag Umum Fakultas'),
(375, 1, 'Logout', '2017-02-21', '20:27:01', 'Logout Sistem'),
(376, 7, 'Login', '2017-02-21', '20:27:05', 'Login Sistem'),
(377, 7, 'Logout', '2017-02-21', '20:29:42', 'Logout Sistem'),
(378, 1, 'Login', '2017-02-21', '20:29:47', 'Login Sistem'),
(379, 1, 'Login', '2017-02-22', '04:51:33', 'Login Sistem'),
(380, 1, 'Logout', '2017-02-22', '04:58:27', 'Logout Sistem'),
(381, 1, 'Login', '2017-02-22', '04:58:33', 'Login Sistem'),
(382, 1, 'Logout', '2017-02-22', '05:10:04', 'Logout Sistem'),
(383, 2, 'Login', '2017-02-22', '05:10:23', 'Login Sistem'),
(384, 2, 'Logout', '2017-02-22', '05:10:27', 'Logout Sistem'),
(385, 1, 'Login', '2017-02-22', '05:11:28', 'Login Sistem'),
(386, 1, 'Logout', '2017-02-22', '05:11:46', 'Logout Sistem'),
(387, 1, 'Login', '2017-02-22', '05:13:16', 'Login Sistem'),
(388, 1, 'Logout', '2017-02-22', '05:15:12', 'Logout Sistem'),
(389, 1, 'Login', '2017-02-22', '05:15:16', 'Login Sistem'),
(390, 1, 'Logout', '2017-02-22', '05:18:00', 'Logout Sistem'),
(391, 1, 'Login', '2017-02-22', '05:18:05', 'Login Sistem'),
(392, 1, 'Logout', '2017-02-22', '05:19:05', 'Logout Sistem'),
(393, 1, 'Login', '2017-02-22', '05:19:09', 'Login Sistem'),
(394, 1, 'Logout', '2017-02-22', '05:20:48', 'Logout Sistem'),
(395, 7, 'Login', '2017-02-22', '05:20:52', 'Login Sistem'),
(396, 7, 'Logout', '2017-02-22', '05:23:20', 'Logout Sistem'),
(397, 1, 'Login', '2017-02-22', '05:23:25', 'Login Sistem'),
(398, 1, 'Logout', '2017-02-22', '05:45:26', 'Logout Sistem'),
(399, 1, 'Login', '2017-02-22', '05:45:30', 'Login Sistem'),
(400, 1, 'Disposisi Dokumen', '2017-02-22', '05:56:07', 'Disposisi Dokumen Pengadaan Lab Ke Dekan'),
(401, 1, 'Edit Dokumen', '2017-02-22', '06:13:42', 'Edit Dokumen '),
(402, 1, 'Edit Dokumen', '2017-02-22', '06:32:24', 'Edit Dokumen '),
(403, 1, 'Edit Dokumen', '2017-02-22', '06:33:56', 'Edit Dokumen '),
(404, 1, 'Login', '2017-02-22', '09:56:57', 'Login Sistem'),
(405, 1, 'Edit Dokumen', '2017-02-22', '10:04:40', 'Edit Dokumen '),
(406, 1, 'Disposisi Dokumen', '2017-02-22', '10:10:09', 'Disposisi Dokumen  Ke Dekan'),
(407, 1, 'Disposisi Dokumen', '2017-02-22', '10:19:47', 'Disposisi Dokumen  Ke Dekan'),
(408, 1, 'Disposisi Dokumen', '2017-02-22', '10:32:28', 'Disposisi Dokumen  Ke Dekan'),
(409, 1, 'Logout', '2017-02-22', '10:42:03', 'Logout Sistem'),
(410, 2, 'Login', '2017-02-22', '10:42:06', 'Login Sistem'),
(411, 2, 'Logout', '2017-02-22', '10:46:20', 'Logout Sistem'),
(412, 3, 'Login', '2017-02-22', '10:46:26', 'Login Sistem'),
(413, 3, 'Logout', '2017-02-22', '10:47:25', 'Logout Sistem'),
(414, 1, 'Login', '2017-02-22', '10:47:30', 'Login Sistem'),
(415, 1, 'Input Menu', '2017-02-22', '11:12:21', 'Tambah Menu Pemindahan Aset Sistem'),
(416, 1, 'Input Menu', '2017-02-22', '11:13:23', 'Tambah Menu Perbaikan Aset Sistem'),
(417, 1, 'Input Menu', '2017-02-22', '11:57:24', 'Tambah Menu Penghapusan Aset Sistem'),
(418, 1, 'Input Register Aset', '2017-02-22', '12:47:47', 'Register Aset '),
(419, 1, 'Input Register Aset', '2017-02-22', '12:48:01', 'Register Aset '),
(420, 1, 'Login', '2017-02-23', '02:24:17', 'Login Sistem'),
(421, 1, 'Login', '2017-02-23', '04:42:00', 'Login Sistem'),
(422, 1, 'Hapus Aset', '2017-02-23', '05:18:33', 'Hapus Aset UIN RF Infokus pada Jurnalistik'),
(423, 1, 'Hapus Aset', '2017-02-23', '05:21:25', 'Hapus Aset UIN RF Infokus pada Jurnalistik'),
(424, 1, 'Login', '2017-02-23', '17:16:14', 'Login Sistem'),
(425, 1, 'Login', '2017-02-23', '20:23:39', 'Login Sistem'),
(426, 1, 'Login', '2017-02-24', '09:14:46', 'Login Sistem'),
(427, 1, 'Edit Barang', '2017-02-24', '09:40:58', 'Edit Barang 2'),
(428, 1, 'Edit Barang', '2017-02-24', '09:41:09', 'Edit Barang 2'),
(429, 1, 'Edit Barang', '2017-02-24', '09:44:42', 'Edit Barang 2'),
(430, 1, 'Edit Kondisi Aset', '2017-02-24', '10:25:21', 'Edit Kondisi Aset 160'),
(431, 1, 'Edit Kondisi Aset', '2017-02-24', '10:25:56', 'Edit Kondisi Aset 179'),
(432, 1, 'Edit Kondisi Aset', '2017-02-24', '10:26:31', 'Edit Kondisi Aset 160'),
(433, 1, 'Edit Kondisi Aset', '2017-02-24', '10:30:08', 'Edit Kondisi Aset Infokus ke '),
(434, 1, 'Edit Kondisi Aset', '2017-02-24', '10:32:02', 'Edit Kondisi Aset Infokus ke Rusak'),
(435, 1, 'Edit Kondisi Aset', '2017-02-24', '10:33:08', 'Edit Kondisi Aset Infokus ke Dalam Perbaikan'),
(436, 1, 'Logout', '2017-02-24', '10:49:07', 'Logout Sistem'),
(437, 7, 'Login', '2017-02-24', '10:49:12', 'Login Sistem'),
(438, 7, 'Logout', '2017-02-24', '10:51:47', 'Logout Sistem'),
(439, 7, 'Login', '2017-02-24', '10:51:51', 'Login Sistem'),
(440, 7, 'Logout', '2017-02-24', '11:13:01', 'Logout Sistem'),
(441, 3, 'Login', '2017-02-24', '11:13:07', 'Login Sistem'),
(442, 3, 'Logout', '2017-02-24', '11:23:28', 'Logout Sistem'),
(443, 1, 'Login', '2017-02-24', '11:23:32', 'Login Sistem'),
(444, 1, 'Input Permohonan', '2017-02-24', '12:03:14', 'Tambah Permohonan Pemindahan Aset'),
(445, 1, 'Input Permohonan', '2017-02-24', '12:04:00', 'Tambah Permohonan Pengadaan Lab II'),
(446, 1, 'Login', '2017-02-24', '12:51:49', 'Login Sistem'),
(447, 1, 'Edit Sub Unit Kerja', '2017-02-24', '12:55:31', 'Edit Sub Unit Kerja Pendidikan Bahasa Indonesia'),
(448, 1, 'Edit Menu', '2017-02-24', '12:57:02', 'Edit Menu Perbaikan Aset Sistem'),
(449, 1, 'Input Menu', '2017-02-24', '13:00:26', 'Tambah Menu Data Aset Sistem'),
(450, 1, 'Logout', '2017-02-24', '13:12:55', 'Logout Sistem'),
(451, 3, 'Login', '2017-02-24', '13:12:59', 'Login Sistem'),
(452, 3, 'Login', '2017-02-24', '14:02:57', 'Login Sistem'),
(453, 3, 'Input Permohonan', '2017-02-24', '14:19:45', 'Tambah Permohonan sg'),
(454, 3, 'Input Permohonan', '2017-02-24', '14:36:49', 'Tambah Permohonan Tester'),
(455, 3, 'Input Permohonan', '2017-02-24', '14:38:26', 'Tambah Permohonan ebni'),
(456, 3, 'Input Permohonan', '2017-02-24', '14:43:53', 'Tambah Permohonan ewq'),
(457, 3, 'Logout', '2017-02-24', '14:53:45', 'Logout Sistem'),
(458, 7, 'Login', '2017-02-24', '14:53:50', 'Login Sistem'),
(459, 7, 'Disposisi Dokumen', '2017-02-24', '14:56:54', 'Disposisi Dokumen ewq Ke Dekan'),
(460, 7, 'Logout', '2017-02-24', '14:57:15', 'Logout Sistem'),
(461, 5, 'Login', '2017-02-24', '14:57:20', 'Login Sistem'),
(462, 5, 'Disposisi Dokumen', '2017-02-24', '14:57:40', 'Disposisi Dokumen ewq Ke Dekan'),
(463, 5, 'Logout', '2017-02-24', '14:58:28', 'Logout Sistem'),
(464, 3, 'Login', '2017-02-24', '14:58:34', 'Login Sistem'),
(465, 3, 'Edit Dokumen', '2017-02-24', '15:00:51', 'Edit Dokumen '),
(466, 3, 'Logout', '2017-02-24', '15:02:44', 'Logout Sistem'),
(467, 4, 'Login', '2017-02-24', '15:02:55', 'Login Sistem'),
(468, 4, 'Logout', '2017-02-24', '15:04:38', 'Logout Sistem'),
(469, 7, 'Login', '2017-02-24', '15:04:48', 'Login Sistem'),
(470, 7, 'Disposisi Dokumen', '2017-02-24', '15:05:07', 'Disposisi Dokumen Pengadaan Komputer Ke Dekan'),
(471, 7, 'Logout', '2017-02-24', '15:05:15', 'Logout Sistem'),
(472, 5, 'Login', '2017-02-24', '15:05:25', 'Login Sistem'),
(473, 5, 'Disposisi Dokumen', '2017-02-24', '15:05:39', 'Disposisi Dokumen Pengadaan Komputer Ke Dekan'),
(474, 5, 'Logout', '2017-02-24', '15:05:43', 'Logout Sistem'),
(475, 7, 'Login', '2017-02-24', '15:05:49', 'Login Sistem'),
(476, 7, 'Logout', '2017-02-24', '15:11:02', 'Logout Sistem'),
(477, 3, 'Login', '2017-02-24', '15:11:09', 'Login Sistem'),
(478, 3, 'Edit Dokumen', '2017-02-24', '15:11:23', 'Edit Dokumen '),
(479, 3, 'Logout', '2017-02-24', '15:11:33', 'Logout Sistem'),
(480, 4, 'Login', '2017-02-24', '15:11:38', 'Login Sistem'),
(481, 4, 'Edit Dokumen', '2017-02-24', '15:20:06', 'Edit Dokumen '),
(482, 4, 'Logout', '2017-02-24', '15:20:15', 'Logout Sistem'),
(483, 6, 'Login', '2017-02-24', '15:20:22', 'Login Sistem'),
(484, 6, 'Disposisi Dokumen', '2017-02-24', '15:23:05', 'Disposisi Dokumen  Ke Dekan'),
(485, 6, 'Logout', '2017-02-24', '15:23:10', 'Logout Sistem'),
(486, 1, 'Login', '2017-02-24', '15:23:31', 'Login Sistem'),
(487, 1, 'Edit User', '2017-02-24', '15:23:52', 'Edit User Kabag Umum Rektorat'),
(488, 1, 'Logout', '2017-02-24', '15:23:56', 'Logout Sistem'),
(489, 8, 'Login', '2017-02-24', '15:24:06', 'Login Sistem'),
(490, 8, 'Logout', '2017-02-24', '15:25:08', 'Logout Sistem'),
(491, 4, 'Login', '2017-02-24', '15:25:14', 'Login Sistem'),
(492, 4, 'Edit Dokumen', '2017-02-24', '15:25:29', 'Edit Dokumen '),
(493, 4, 'Logout', '2017-02-24', '15:25:34', 'Logout Sistem'),
(494, 6, 'Login', '2017-02-24', '15:25:39', 'Login Sistem'),
(495, 6, 'Disposisi Dokumen', '2017-02-24', '15:25:56', 'Disposisi Dokumen  Ke Dekan'),
(496, 6, 'Logout', '2017-02-24', '15:26:01', 'Logout Sistem'),
(497, 8, 'Login', '2017-02-24', '15:26:08', 'Login Sistem'),
(498, 8, 'Disposisi Dokumen', '2017-02-24', '15:26:27', 'Disposisi Dokumen  Ke Dekan'),
(499, 8, 'Logout', '2017-02-24', '15:26:32', 'Logout Sistem'),
(500, 2, 'Login', '2017-02-24', '15:26:36', 'Login Sistem'),
(501, 2, 'Disposisi Dokumen', '2017-02-24', '15:38:00', 'Disposisi Dokumen  Ke Dekan'),
(502, 2, 'Disposisi Dokumen', '2017-02-24', '15:55:26', 'Disposisi Dokumen  Ke Dekan'),
(503, 2, 'Logout', '2017-02-24', '16:01:30', 'Logout Sistem'),
(504, 1, 'Login', '2017-02-24', '16:01:34', 'Login Sistem'),
(505, 1, 'Edit Kondisi Aset', '2017-02-24', '16:02:00', 'Edit Kondisi Aset LCD ke Dalam Perbaikan'),
(506, 1, 'Edit Kondisi Aset', '2017-02-24', '16:02:24', 'Edit Kondisi Aset LCD ke Baik'),
(507, 1, 'Disposisi Dokumen', '2017-02-24', '16:03:03', 'Disposisi Dokumen  Ke Dekan'),
(508, 1, 'Logout', '2017-02-24', '16:03:17', 'Logout Sistem'),
(509, 3, 'Login', '2017-02-24', '16:03:22', 'Login Sistem'),
(510, 3, 'Logout', '2017-02-24', '16:04:44', 'Logout Sistem'),
(511, 1, 'Login', '2017-02-24', '16:04:48', 'Login Sistem'),
(512, 1, 'Edit Kondisi Aset', '2017-02-24', '16:05:10', 'Edit Kondisi Aset LCD ke Dalam Perbaikan'),
(513, 1, 'Logout', '2017-02-24', '16:05:29', 'Logout Sistem'),
(514, 3, 'Login', '2017-02-24', '16:05:37', 'Login Sistem'),
(515, 3, 'Logout', '2017-02-24', '16:08:56', 'Logout Sistem'),
(516, 1, 'Login', '2017-02-24', '16:09:00', 'Login Sistem'),
(517, 1, 'Logout', '2017-02-24', '16:18:28', 'Logout Sistem'),
(518, 3, 'Login', '2017-02-24', '16:18:32', 'Login Sistem'),
(519, 3, 'Logout', '2017-02-24', '16:18:46', 'Logout Sistem'),
(520, 7, 'Login', '2017-02-24', '16:18:52', 'Login Sistem'),
(521, 7, 'Logout', '2017-02-24', '16:19:41', 'Logout Sistem'),
(522, 8, 'Login', '2017-02-24', '16:19:48', 'Login Sistem'),
(523, 8, 'Logout', '2017-02-24', '16:19:58', 'Logout Sistem'),
(524, 1, 'Login', '2017-02-24', '16:20:03', 'Login Sistem'),
(525, 1, 'Login', '2017-02-25', '10:37:11', 'Login Sistem'),
(526, 1, 'Login', '2017-02-25', '14:24:19', 'Login Sistem'),
(527, 1, 'Login', '2017-02-27', '01:45:04', 'Login Sistem'),
(528, 1, 'Login', '2017-02-27', '02:28:44', 'Login Sistem'),
(529, 1, 'Login', '2017-03-08', '04:02:10', 'Login Sistem'),
(530, 1, 'Edit Lokasi Aset', '2017-03-08', '04:26:08', 'Edit Lokasi Aset '),
(531, 1, 'Edit Lokasi Aset', '2017-03-08', '04:26:29', 'Edit Lokasi Aset '),
(532, 1, 'Edit Lokasi Aset', '2017-03-08', '04:38:42', 'Edit Lokasi Aset '),
(533, 1, 'Edit Lokasi Aset', '2017-03-08', '04:39:23', 'Edit Lokasi Aset '),
(534, 1, 'Edit Lokasi Aset', '2017-03-08', '04:40:05', 'Edit Lokasi Aset '),
(535, 1, 'Edit Lokasi Aset', '2017-03-08', '04:49:23', 'Edit Lokasi Aset '),
(536, 1, 'Edit Lokasi Aset', '2017-03-08', '04:51:30', 'Edit Lokasi Aset '),
(537, 1, 'Edit Lokasi Aset', '2017-03-08', '04:51:53', 'Edit Lokasi Aset '),
(538, 1, 'Edit Lokasi Aset', '2017-03-08', '05:06:46', 'Edit Lokasi Aset '),
(539, 1, 'Edit Lokasi Aset', '2017-03-08', '05:07:06', 'Edit Lokasi Aset '),
(540, 1, 'Edit Lokasi Aset', '2017-03-08', '05:12:07', 'Edit Lokasi Aset '),
(541, 1, 'Edit Lokasi Aset', '2017-03-08', '05:16:51', 'Edit Lokasi Aset '),
(542, 1, 'Edit Lokasi Aset', '2017-03-08', '05:20:11', 'Edit Lokasi Aset '),
(543, 1, 'Edit Lokasi Aset', '2017-03-08', '05:20:58', 'Edit Lokasi Aset '),
(544, 1, 'Edit Lokasi Aset', '2017-03-08', '05:22:41', 'Edit Lokasi Aset '),
(545, 1, 'Edit Lokasi Aset', '2017-03-08', '05:23:03', 'Edit Lokasi Aset '),
(546, 1, 'Edit Lokasi Aset', '2017-03-08', '05:24:12', 'Edit Lokasi Aset '),
(547, 1, 'Edit Lokasi Aset', '2017-03-08', '05:26:24', 'Edit Lokasi Aset '),
(548, 1, 'Edit Lokasi Aset', '2017-03-08', '05:27:39', 'Edit Lokasi Aset '),
(549, 1, 'Edit Lokasi Aset', '2017-03-08', '05:32:36', 'Edit Lokasi Aset '),
(550, 1, 'Edit Lokasi Aset', '2017-03-08', '05:33:02', 'Edit Lokasi Aset '),
(551, 1, 'Edit Lokasi Aset', '2017-03-08', '05:33:53', 'Edit Lokasi Aset '),
(552, 1, 'Edit Lokasi Aset', '2017-03-08', '05:34:36', 'Edit Lokasi Aset '),
(553, 1, 'Edit Lokasi Aset', '2017-03-08', '05:36:28', 'Edit Lokasi Aset '),
(554, 1, 'Edit Lokasi Aset', '2017-03-08', '05:36:57', 'Edit Lokasi Aset '),
(555, 1, 'Edit Lokasi Aset', '2017-03-08', '05:38:00', 'Edit Lokasi Aset '),
(556, 1, 'Edit Lokasi Aset', '2017-03-08', '05:38:14', 'Edit Lokasi Aset '),
(557, 1, 'Edit Lokasi Aset', '2017-03-08', '05:39:55', 'Edit Lokasi Aset '),
(558, 1, 'Edit Lokasi Aset', '2017-03-08', '05:40:10', 'Edit Lokasi Aset '),
(559, 1, 'Edit Lokasi Aset', '2017-03-08', '05:41:47', 'Edit Lokasi Aset '),
(560, 1, 'Edit Lokasi Aset', '2017-03-08', '05:42:05', 'Edit Lokasi Aset '),
(561, 1, 'Edit Lokasi Aset', '2017-03-08', '05:47:05', 'Edit Lokasi Aset '),
(562, 1, 'Edit Lokasi Aset', '2017-03-08', '05:47:22', 'Edit Lokasi Aset '),
(563, 1, 'Edit Lokasi Aset', '2017-03-08', '05:58:11', 'Edit Lokasi Aset '),
(564, 1, 'Edit Lokasi Aset', '2017-03-08', '05:58:26', 'Edit Lokasi Aset '),
(565, 1, 'Edit Lokasi Aset', '2017-03-08', '05:59:08', 'Edit Lokasi Aset '),
(566, 1, 'Edit Lokasi Aset', '2017-03-08', '05:59:53', 'Edit Lokasi Aset '),
(567, 1, 'Edit Lokasi Aset', '2017-03-08', '06:01:02', 'Edit Lokasi Aset '),
(568, 1, 'Edit Lokasi Aset', '2017-03-08', '06:04:06', 'Edit Lokasi Aset '),
(569, 1, 'Login', '2017-03-08', '07:16:10', 'Login Sistem'),
(570, 1, 'Input Pejabat', '2017-03-08', '09:56:10', 'Tambah Pejabat Tester ke dalam Sistem'),
(571, 1, 'Input Pejabat', '2017-03-08', '10:00:39', 'Tambah Pejabat Tester ke dalam Sistem'),
(572, 1, 'Delete Pejabat Sistem', '2017-03-08', '10:03:23', 'Hapus Pejabat Sistem > Tester'),
(573, 1, 'Delete Pejabat Sistem', '2017-03-08', '10:03:56', 'Hapus Pejabat Sistem > Tester'),
(574, 1, 'Input Pejabat', '2017-03-08', '10:04:12', 'Tambah Pejabat M. Ebni Hannibal ke dalam Sistem'),
(575, 1, 'Login', '2017-03-08', '11:04:42', 'Login Sistem'),
(576, 1, 'Edit pejabat', '2017-03-08', '11:19:18', 'Edit pejabat Agatha Cicilia'),
(577, 1, 'Edit pejabat', '2017-03-08', '11:19:37', 'Edit pejabat M. Ebni Hannibal'),
(578, 1, 'Edit pejabat', '2017-03-08', '11:25:48', 'Edit pejabat M. Ebni Hannibal'),
(579, 1, 'Edit pejabat', '2017-03-08', '11:26:00', 'Edit pejabat M. Ebni Hannibal'),
(580, 1, 'Edit pejabat', '2017-03-08', '11:32:09', 'Edit pejabat M. Ebni Hannibal'),
(581, 1, 'Edit pejabat', '2017-03-08', '11:32:16', 'Edit pejabat M. Ebni Hannibal'),
(582, 1, 'Edit pejabat', '2017-03-08', '11:33:37', 'Edit pejabat M. Ebni Hannibal'),
(583, 1, 'Input Pejabat', '2017-03-08', '11:38:25', 'Tambah Pejabat Tester ke dalam Sistem'),
(584, 1, 'Edit pejabat', '2017-03-08', '11:38:33', 'Edit pejabat M. Ebni Hannibal'),
(585, 1, 'Edit pejabat', '2017-03-08', '11:38:40', 'Edit pejabat Tester'),
(586, 1, 'Input Pejabat', '2017-03-08', '11:39:01', 'Tambah Pejabat Aries Suhendar ke dalam Sistem'),
(587, 1, 'Delete Pejabat Sistem', '2017-03-08', '11:39:13', 'Hapus Pejabat Sistem > Aries Suhendar'),
(588, 1, 'Delete Pejabat Sistem', '2017-03-08', '11:39:16', 'Hapus Pejabat Sistem > Tester'),
(589, 1, 'Input Pejabat', '2017-03-08', '11:42:24', 'Tambah Pejabat Tester ke dalam Sistem'),
(590, 1, 'Delete Pejabat Sistem', '2017-03-08', '11:42:28', 'Hapus Pejabat Sistem > Tester'),
(591, 1, 'Input Sub Unit Kerja', '2017-03-08', '12:14:44', 'Tambah Sub Unit Kerja Fakultas Dakwah'),
(592, 1, 'Input Sub Unit Kerja', '2017-03-08', '12:14:56', 'Tambah Sub Unit Kerja Fakultas Adab'),
(593, 1, 'Input Sub Unit Kerja', '2017-03-08', '12:15:57', 'Tambah Sub Unit Kerja Fakultas Ekonomi'),
(594, 1, 'Input Sub Unit Kerja', '2017-03-08', '12:16:10', 'Tambah Sub Unit Kerja Fakultas Fisikologi'),
(595, 1, 'Input Sub Unit Kerja', '2017-03-08', '12:16:27', 'Tambah Sub Unit Kerja Fakultas Hushuludin'),
(596, 1, 'Input Sub Unit Kerja', '2017-03-08', '12:16:44', 'Tambah Sub Unit Kerja Fakultas Ilmu Politik'),
(597, 1, 'Input Sub Unit Kerja', '2017-03-08', '12:17:04', 'Tambah Sub Unit Kerja Fakultas Saintek'),
(598, 1, 'Input Sub Unit Kerja', '2017-03-08', '12:17:17', 'Tambah Sub Unit Kerja Fakultas Syariah'),
(599, 1, 'Input Sub Unit Kerja', '2017-03-08', '12:17:29', 'Tambah Sub Unit Kerja Fakultas Tarbiyah'),
(600, 1, 'Login', '2017-03-08', '12:47:52', 'Login Sistem'),
(601, 1, 'Input Register Aset', '2017-03-08', '13:25:19', 'Register Aset '),
(602, 1, 'Input Register Aset', '2017-03-08', '13:26:12', 'Register Aset '),
(603, 1, 'Input Register Aset', '2017-03-08', '13:26:19', 'Register Aset '),
(604, 1, 'Input Register Aset', '2017-03-08', '13:26:28', 'Register Aset '),
(605, 1, 'Input Register Aset', '2017-03-08', '13:26:36', 'Register Aset '),
(606, 1, 'Logout', '2017-03-08', '13:49:39', 'Logout Sistem'),
(607, 3, 'Login', '2017-03-08', '13:49:44', 'Login Sistem'),
(608, 3, 'Logout', '2017-03-08', '13:52:03', 'Logout Sistem'),
(609, 1, 'Login', '2017-03-08', '13:52:07', 'Login Sistem'),
(610, 1, 'Input Register Aset', '2017-03-08', '13:52:21', 'Register Aset '),
(611, 1, 'Logout', '2017-03-08', '13:52:25', 'Logout Sistem'),
(612, 3, 'Login', '2017-03-08', '13:52:29', 'Login Sistem'),
(613, 3, 'Logout', '2017-03-08', '13:57:04', 'Logout Sistem'),
(614, 1, 'Login', '2017-03-08', '13:57:07', 'Login Sistem'),
(615, 1, 'Input Register Aset', '2017-03-08', '13:58:17', 'Register Aset '),
(616, 1, 'Input Register Aset', '2017-03-08', '13:58:24', 'Register Aset '),
(617, 1, 'Input Register Aset', '2017-03-08', '13:58:35', 'Register Aset '),
(618, 1, 'Input Register Aset', '2017-03-08', '13:59:24', 'Register Aset '),
(619, 1, 'Input Register Aset', '2017-03-08', '14:00:58', 'Register Aset '),
(620, 1, 'Input Register Aset', '2017-03-08', '14:01:28', 'Register Aset '),
(621, 1, 'Input Register Aset', '2017-03-08', '14:01:46', 'Register Aset '),
(622, 1, 'Logout', '2017-03-08', '14:03:36', 'Logout Sistem'),
(623, 3, 'Login', '2017-03-08', '14:03:40', 'Login Sistem'),
(624, 3, 'Logout', '2017-03-08', '14:11:00', 'Logout Sistem'),
(625, 6, 'Login', '2017-03-08', '14:11:04', 'Login Sistem'),
(626, 6, 'Logout', '2017-03-08', '14:11:17', 'Logout Sistem'),
(627, 1, 'Login', '2017-03-10', '14:01:58', 'Login Sistem'),
(628, 1, 'Login', '2017-03-10', '18:03:10', 'Login Sistem'),
(629, 1, 'Edit pejabat', '2017-03-10', '18:38:35', 'Edit pejabat M. Ebni Hannibal'),
(630, 1, 'Input Pejabat', '2017-03-10', '18:42:38', 'Tambah Pejabat M. Ebni Hannibal ke dalam Sistem'),
(631, 1, 'Input Unit Kerja', '2017-03-10', '20:42:47', 'Tambah Unit Kerja PUSTIPD'),
(632, 1, 'Login', '2017-03-11', '09:47:01', 'Login Sistem'),
(633, 1, 'Input Register Aset', '2017-03-11', '09:57:30', 'Register Aset '),
(634, 1, 'Delete Menu Sistem', '2017-03-11', '10:19:49', 'Hapus Menu Sistem > Sub Unit Kerja'),
(635, 1, 'Logout', '2017-03-11', '10:21:31', 'Logout Sistem'),
(636, 3, 'Login', '2017-03-11', '10:21:36', 'Login Sistem'),
(637, 3, 'Logout', '2017-03-11', '10:23:27', 'Logout Sistem'),
(638, 7, 'Login', '2017-03-11', '10:23:39', 'Login Sistem'),
(639, 7, 'Logout', '2017-03-11', '10:24:01', 'Logout Sistem'),
(640, 6, 'Login', '2017-03-11', '10:24:06', 'Login Sistem'),
(641, 6, 'Logout', '2017-03-11', '10:24:20', 'Logout Sistem'),
(642, 1, 'Login', '2017-03-11', '10:24:25', 'Login Sistem'),
(643, 1, 'Edit Modul', '2017-03-11', '10:25:39', 'Edit Modul Laporan Sistem'),
(644, 1, 'Logout', '2017-03-11', '10:25:50', 'Logout Sistem'),
(645, 3, 'Login', '2017-03-11', '10:25:55', 'Login Sistem'),
(646, 3, 'Logout', '2017-03-11', '10:26:40', 'Logout Sistem'),
(647, 6, 'Login', '2017-03-11', '10:26:44', 'Login Sistem'),
(648, 6, 'Logout', '2017-03-11', '10:26:55', 'Logout Sistem'),
(649, 8, 'Login', '2017-03-11', '10:27:02', 'Login Sistem'),
(650, 8, 'Logout', '2017-03-11', '10:27:10', 'Logout Sistem'),
(651, 4, 'Login', '2017-03-11', '10:27:15', 'Login Sistem'),
(652, 4, 'Logout', '2017-03-11', '10:27:50', 'Logout Sistem'),
(653, 2, 'Login', '2017-03-11', '10:27:54', 'Login Sistem'),
(654, 2, 'Logout', '2017-03-11', '10:28:27', 'Logout Sistem'),
(655, 1, 'Login', '2017-03-11', '10:28:31', 'Login Sistem'),
(656, 1, 'Edit Modul', '2017-03-11', '10:29:06', 'Edit Modul Data Master Sistem'),
(657, 1, 'Logout', '2017-03-11', '10:29:10', 'Logout Sistem'),
(658, 2, 'Login', '2017-03-11', '10:29:15', 'Login Sistem'),
(659, 2, 'Logout', '2017-03-11', '10:29:25', 'Logout Sistem'),
(660, 1, 'Login', '2017-03-11', '10:29:31', 'Login Sistem'),
(661, 1, 'Edit Modul', '2017-03-11', '10:29:42', 'Edit Modul Data Master Sistem'),
(662, 1, 'Logout', '2017-03-11', '10:31:03', 'Logout Sistem'),
(663, 1, 'Login', '2017-03-11', '10:31:10', 'Login Sistem'),
(664, 1, 'Input Register Aset', '2017-03-11', '10:52:07', 'Register Aset '),
(665, 1, 'Login', '2017-03-12', '09:18:03', 'Login Sistem'),
(666, 1, 'Logout', '2017-03-12', '09:28:42', 'Logout Sistem'),
(667, 2, 'Login', '2017-03-12', '09:28:50', 'Login Sistem'),
(668, 2, 'Logout', '2017-03-12', '09:33:38', 'Logout Sistem'),
(669, 4, 'Login', '2017-03-12', '09:33:51', 'Login Sistem'),
(670, 4, 'Logout', '2017-03-12', '09:34:10', 'Logout Sistem'),
(671, 3, 'Login', '2017-03-12', '09:34:14', 'Login Sistem'),
(672, 3, 'Logout', '2017-03-12', '09:34:32', 'Logout Sistem'),
(673, 7, 'Login', '2017-03-12', '09:34:47', 'Login Sistem'),
(674, 7, 'Logout', '2017-03-12', '09:36:23', 'Logout Sistem'),
(675, 5, 'Login', '2017-03-12', '09:36:33', 'Login Sistem'),
(676, 5, 'Logout', '2017-03-12', '09:37:11', 'Logout Sistem'),
(677, 4, 'Login', '2017-03-12', '09:37:17', 'Login Sistem'),
(678, 4, 'Logout', '2017-03-12', '09:37:25', 'Logout Sistem'),
(679, 3, 'Login', '2017-03-12', '09:37:30', 'Login Sistem'),
(680, 3, 'Logout', '2017-03-12', '09:40:08', 'Logout Sistem'),
(681, 4, 'Login', '2017-03-12', '09:40:12', 'Login Sistem'),
(682, 1, 'Login', '2017-03-12', '09:41:08', 'Login Sistem'),
(683, 4, 'Logout', '2017-03-12', '09:44:12', 'Logout Sistem'),
(684, 3, 'Login', '2017-03-12', '09:44:20', 'Login Sistem'),
(685, 3, 'Logout', '2017-03-12', '09:50:35', 'Logout Sistem'),
(686, 7, 'Login', '2017-03-12', '09:50:43', 'Login Sistem'),
(687, 7, 'Logout', '2017-03-12', '09:53:19', 'Logout Sistem'),
(688, 5, 'Login', '2017-03-12', '09:53:26', 'Login Sistem'),
(689, 5, 'Logout', '2017-03-12', '09:58:26', 'Logout Sistem'),
(690, 7, 'Login', '2017-03-12', '09:58:32', 'Login Sistem'),
(691, 7, 'Disposisi Dokumen', '2017-03-12', '10:01:09', 'Disposisi Dokumen sg Ke Dekan'),
(692, 7, 'Disposisi Dokumen', '2017-03-12', '10:04:57', 'Disposisi Dokumen ebni Ke Dekan'),
(693, 7, 'Logout', '2017-03-12', '10:05:04', 'Logout Sistem'),
(694, 5, 'Login', '2017-03-12', '10:05:08', 'Login Sistem'),
(695, 5, 'Logout', '2017-03-12', '10:06:10', 'Logout Sistem'),
(696, 3, 'Login', '2017-03-12', '10:06:13', 'Login Sistem'),
(697, 3, 'Logout', '2017-03-12', '10:06:28', 'Logout Sistem'),
(698, 5, 'Login', '2017-03-12', '10:06:32', 'Login Sistem'),
(699, 5, 'Disposisi Dokumen', '2017-03-12', '10:06:48', 'Disposisi Dokumen sg Ke Dekan'),
(700, 5, 'Logout', '2017-03-12', '10:06:53', 'Logout Sistem'),
(701, 3, 'Login', '2017-03-12', '10:06:59', 'Login Sistem'),
(702, 3, 'Logout', '2017-03-12', '10:09:02', 'Logout Sistem'),
(703, 5, 'Login', '2017-03-12', '10:09:06', 'Login Sistem'),
(704, 5, 'Disposisi Dokumen', '2017-03-12', '10:10:29', 'Disposisi Dokumen  Ke Dekan'),
(705, 5, 'Logout', '2017-03-12', '10:11:20', 'Logout Sistem'),
(706, 7, 'Login', '2017-03-12', '10:11:32', 'Login Sistem');
INSERT INTO `rf_aset_histori_sistem` (`ID_Histori`, `ID_Akun`, `Judul_Histori`, `Tanggal_Histori`, `Waktu_Histori`, `Deskripsi_Histori`) VALUES
(707, 7, 'Logout', '2017-03-12', '10:11:50', 'Logout Sistem'),
(708, 4, 'Login', '2017-03-12', '10:12:13', 'Login Sistem'),
(709, 4, 'Logout', '2017-03-12', '10:12:33', 'Logout Sistem'),
(710, 3, 'Login', '2017-03-12', '10:12:37', 'Login Sistem'),
(711, 3, 'Edit Dokumen', '2017-03-12', '10:12:51', 'Edit Dokumen '),
(712, 3, 'Logout', '2017-03-12', '10:13:34', 'Logout Sistem'),
(713, 4, 'Login', '2017-03-12', '10:13:37', 'Login Sistem'),
(714, 4, 'Disposisi Dokumen', '2017-03-12', '10:14:06', 'Disposisi Dokumen  ke Rektor'),
(715, 4, 'Logout', '2017-03-12', '10:14:12', 'Logout Sistem'),
(716, 6, 'Login', '2017-03-12', '10:14:20', 'Login Sistem'),
(717, 6, 'Disposisi Dokumen', '2017-03-12', '10:14:45', 'Disposisi Dokumen  Ke Kabagumum'),
(718, 6, 'Logout', '2017-03-12', '10:14:50', 'Logout Sistem'),
(719, 8, 'Login', '2017-03-12', '10:14:56', 'Login Sistem'),
(720, 8, 'Disposisi Dokumen', '2017-03-12', '10:15:22', 'Disposisi Dokumen  Ke BMN'),
(721, 8, 'Logout', '2017-03-12', '10:19:50', 'Logout Sistem'),
(722, 5, 'Login', '2017-03-12', '10:19:54', 'Login Sistem'),
(723, 5, 'Logout', '2017-03-12', '10:20:35', 'Logout Sistem'),
(724, 6, 'Login', '2017-03-12', '10:20:40', 'Login Sistem'),
(725, 6, 'Logout', '2017-03-12', '10:22:23', 'Logout Sistem'),
(726, 8, 'Login', '2017-03-12', '10:22:29', 'Login Sistem'),
(727, 8, 'Logout', '2017-03-12', '10:23:17', 'Logout Sistem'),
(728, 2, 'Login', '2017-03-12', '10:23:21', 'Login Sistem'),
(729, 2, 'Logout', '2017-03-12', '10:26:11', 'Logout Sistem'),
(730, 1, 'Login', '2017-03-12', '10:26:19', 'Login Sistem'),
(731, 1, 'Logout', '2017-03-12', '10:33:50', 'Logout Sistem'),
(732, 2, 'Login', '2017-03-12', '10:33:53', 'Login Sistem'),
(733, 6, 'Login', '2017-03-12', '10:41:50', 'Login Sistem'),
(734, 6, 'Logout', '2017-03-12', '11:20:29', 'Logout Sistem'),
(735, 5, 'Login', '2017-03-12', '11:20:38', 'Login Sistem'),
(736, 5, 'Logout', '2017-03-12', '11:20:44', 'Logout Sistem'),
(737, 3, 'Login', '2017-03-12', '11:20:49', 'Login Sistem'),
(738, 3, 'Logout', '2017-03-12', '11:38:56', 'Logout Sistem'),
(739, 1, 'Login', '2017-03-12', '11:39:01', 'Login Sistem'),
(740, 1, 'Logout', '2017-03-12', '12:06:36', 'Logout Sistem'),
(741, 6, 'Login', '2017-03-12', '12:07:06', 'Login Sistem'),
(742, 2, 'Login', '2017-03-12', '15:58:14', 'Login Sistem'),
(743, 2, 'Input Unit Kerja', '2017-03-12', '15:59:10', 'Tambah Unit Kerja Rektorat'),
(744, 2, 'Input Unit Kerja', '2017-03-12', '15:59:21', 'Tambah Unit Kerja BAAK'),
(745, 2, 'Input Unit Kerja', '2017-03-12', '15:59:31', 'Tambah Unit Kerja PUSTIPD'),
(746, 2, 'Input Unit Kerja', '2017-03-12', '15:59:45', 'Tambah Unit Kerja LPM'),
(747, 2, 'Input Unit Kerja', '2017-03-12', '15:59:53', 'Tambah Unit Kerja LPPM'),
(748, 2, 'Input Unit Kerja', '2017-03-12', '16:00:15', 'Tambah Unit Kerja Perpustakaan'),
(749, 2, 'Input Unit Kerja', '2017-03-12', '16:02:42', 'Tambah Unit Kerja Fakultas Syariah dan Hukum'),
(750, 2, 'Input Unit Kerja', '2017-03-12', '16:03:14', 'Tambah Unit Kerja Fakultas Ushuluddin dan Pemikiran Islam'),
(751, 2, 'Input Unit Kerja', '2017-03-12', '16:03:34', 'Tambah Unit Kerja Fakultas Tarbiyah dan Keguruan'),
(752, 2, 'Input Unit Kerja', '2017-03-12', '16:03:55', 'Tambah Unit Kerja Fakultas Adab dan Humaniora'),
(753, 2, 'Input Unit Kerja', '2017-03-12', '16:04:11', 'Tambah Unit Kerja Fakultas Dakwah dan Komunikasi'),
(754, 2, 'Input Unit Kerja', '2017-03-12', '16:04:32', 'Tambah Unit Kerja Fakultas Ekonomi dan Bisnis Islam'),
(755, 2, 'Input Unit Kerja', '2017-03-12', '16:04:53', 'Tambah Unit Kerja Fakultas Sains dan Teknologi'),
(756, 2, 'Input Unit Kerja', '2017-03-12', '16:05:28', 'Tambah Unit Kerja Fakultas Ilmu Sosisal dan Ilmu Politik'),
(757, 2, 'Input Unit Kerja', '2017-03-12', '16:05:48', 'Tambah Unit Kerja Fakultas Psikologi'),
(758, 2, 'Input Unit Kerja', '2017-03-12', '16:06:06', 'Tambah Unit Kerja Pascasarjana'),
(759, 2, 'Input Barang', '2017-03-12', '16:11:13', 'Tambah Barang 2'),
(760, 2, 'Input Barang', '2017-03-12', '16:12:03', 'Tambah Barang 3'),
(761, 2, 'Input Barang', '2017-03-12', '16:12:38', 'Tambah Barang 1'),
(762, 2, 'Input Barang', '2017-03-12', '16:13:07', 'Tambah Barang 4'),
(763, 2, 'Input Register Aset', '2017-03-12', '16:13:44', 'Register Aset '),
(764, 2, 'Input Register Aset', '2017-03-12', '16:14:08', 'Register Aset '),
(765, 2, 'Edit Lokasi Aset', '2017-03-12', '16:15:00', 'Edit Lokasi Aset '),
(766, 2, 'Hapus Aset', '2017-03-12', '16:16:07', 'Hapus Aset UIN RF Radio Hotspot/Switch Hub/Radio pada '),
(767, 2, 'Logout', '2017-03-12', '16:16:43', 'Logout Sistem'),
(768, 3, 'Login', '2017-03-12', '16:16:47', 'Login Sistem'),
(769, 3, 'Input Permohonan', '2017-03-12', '16:17:46', 'Tambah Permohonan Pengadaan Lab'),
(770, 3, 'Logout', '2017-03-12', '16:19:09', 'Logout Sistem'),
(771, 1, 'Login', '2017-03-12', '16:19:14', 'Login Sistem'),
(772, 1, 'Edit User', '2017-03-12', '16:19:32', 'Edit User Fakultas'),
(773, 1, 'Edit User', '2017-03-12', '16:19:48', 'Edit User Admin'),
(774, 1, 'Logout', '2017-03-12', '16:19:56', 'Logout Sistem'),
(775, 2, 'Login', '2017-03-12', '16:20:01', 'Login Sistem'),
(776, 2, 'Logout', '2017-03-12', '16:20:20', 'Logout Sistem'),
(777, 3, 'Login', '2017-03-12', '16:20:26', 'Login Sistem'),
(778, 3, 'Logout', '2017-03-12', '16:21:13', 'Logout Sistem'),
(779, 2, 'Login', '2017-03-12', '16:21:17', 'Login Sistem'),
(780, 2, 'Input Barang', '2017-03-12', '16:22:14', 'Tambah Barang 2'),
(781, 2, 'Input Register Aset', '2017-03-12', '16:22:33', 'Register Aset '),
(782, 2, 'Logout', '2017-03-12', '16:23:05', 'Logout Sistem'),
(783, 3, 'Login', '2017-03-12', '16:23:11', 'Login Sistem'),
(784, 3, 'Input Permohonan', '2017-03-12', '16:23:32', 'Tambah Permohonan Pengadaan Lab II'),
(785, 3, 'Input Permohonan', '2017-03-12', '16:24:09', 'Tambah Permohonan Pengadaan Lemari'),
(786, 3, 'Input Permohonan', '2017-03-12', '16:24:45', 'Tambah Permohonan Infokus'),
(787, 3, 'Input Permohonan', '2017-03-12', '16:25:19', 'Tambah Permohonan Perbaikan Aset'),
(788, 3, 'Logout', '2017-03-12', '16:25:37', 'Logout Sistem'),
(789, 7, 'Login', '2017-03-12', '16:25:41', 'Login Sistem'),
(790, 7, 'Logout', '2017-03-12', '16:26:14', 'Logout Sistem'),
(791, 1, 'Login', '2017-03-12', '16:26:17', 'Login Sistem'),
(792, 1, 'Edit User', '2017-03-12', '16:26:31', 'Edit User Kabag Umum Fakultas'),
(793, 1, 'Edit User', '2017-03-12', '16:26:41', 'Edit User Dekan'),
(794, 1, 'Logout', '2017-03-12', '16:26:44', 'Logout Sistem'),
(795, 7, 'Login', '2017-03-12', '16:26:48', 'Login Sistem'),
(796, 7, 'Disposisi Dokumen', '2017-03-12', '16:27:02', 'Disposisi Dokumen  Ke Dekan'),
(797, 7, 'Disposisi Dokumen', '2017-03-12', '16:27:14', 'Disposisi Dokumen  Ke Dekan'),
(798, 7, 'Disposisi Dokumen', '2017-03-12', '16:27:25', 'Disposisi Dokumen  Ke Dekan'),
(799, 7, 'Logout', '2017-03-12', '16:27:33', 'Logout Sistem'),
(800, 5, 'Login', '2017-03-12', '16:27:38', 'Login Sistem'),
(801, 5, 'Disposisi Dokumen', '2017-03-12', '16:27:54', 'Disposisi Dokumen  Ke Dekan'),
(802, 5, 'Disposisi Dokumen', '2017-03-12', '16:28:03', 'Disposisi Dokumen  Ke Dekan'),
(803, 5, 'Logout', '2017-03-12', '16:28:07', 'Logout Sistem'),
(804, 3, 'Login', '2017-03-12', '16:28:10', 'Login Sistem'),
(805, 3, 'Edit Dokumen', '2017-03-12', '16:28:36', 'Edit Dokumen '),
(806, 3, 'Logout', '2017-03-12', '16:28:43', 'Logout Sistem'),
(807, 5, 'Login', '2017-03-12', '16:28:47', 'Login Sistem'),
(808, 5, 'Disposisi Dokumen', '2017-03-12', '16:28:59', 'Disposisi Dokumen  Ke Dekan'),
(809, 5, 'Logout', '2017-03-12', '16:29:02', 'Logout Sistem'),
(810, 4, 'Login', '2017-03-12', '16:29:08', 'Login Sistem'),
(811, 4, 'Disposisi Dokumen', '2017-03-12', '16:29:33', 'Disposisi Dokumen  ke Rektor'),
(812, 4, 'Logout', '2017-03-12', '16:29:38', 'Logout Sistem'),
(813, 6, 'Login', '2017-03-12', '16:29:47', 'Login Sistem'),
(814, 6, 'Disposisi Dokumen', '2017-03-12', '16:30:02', 'Disposisi Dokumen  Ke Kabagumum'),
(815, 6, 'Logout', '2017-03-12', '16:30:15', 'Logout Sistem'),
(816, 8, 'Login', '2017-03-12', '16:30:21', 'Login Sistem'),
(817, 8, 'Disposisi Dokumen', '2017-03-12', '16:30:33', 'Disposisi Dokumen  Ke BMN'),
(818, 8, 'Logout', '2017-03-12', '16:30:56', 'Logout Sistem'),
(819, 2, 'Login', '2017-03-12', '16:30:58', 'Login Sistem'),
(820, 2, 'Proses Dokumen', '2017-03-12', '16:31:13', 'Memproses Dokumen '),
(821, 2, 'Proses Dokumen', '2017-03-12', '16:31:31', 'Memproses Dokumen '),
(822, 2, 'Logout', '2017-03-12', '16:31:42', 'Logout Sistem'),
(823, 3, 'Login', '2017-03-12', '16:31:47', 'Login Sistem'),
(824, 3, 'Edit Dokumen', '2017-03-12', '16:32:11', 'Edit Dokumen '),
(825, 3, 'Logout', '2017-03-12', '16:32:14', 'Logout Sistem'),
(826, 4, 'Login', '2017-03-12', '16:32:19', 'Login Sistem'),
(827, 4, 'Disposisi Dokumen', '2017-03-12', '16:32:31', 'Disposisi Dokumen  ke Rektor'),
(828, 4, 'Logout', '2017-03-12', '16:32:34', 'Logout Sistem'),
(829, 6, 'Login', '2017-03-12', '16:32:38', 'Login Sistem'),
(830, 6, 'Disposisi Dokumen', '2017-03-12', '16:32:49', 'Disposisi Dokumen  Ke Kabagumum'),
(831, 6, 'Logout', '2017-03-12', '16:32:55', 'Logout Sistem'),
(832, 8, 'Login', '2017-03-12', '16:32:58', 'Login Sistem'),
(833, 8, 'Disposisi Dokumen', '2017-03-12', '16:33:11', 'Disposisi Dokumen  Ke BMN'),
(834, 8, 'Logout', '2017-03-12', '16:33:14', 'Logout Sistem'),
(835, 2, 'Login', '2017-03-12', '16:33:17', 'Login Sistem'),
(836, 2, 'Proses Dokumen', '2017-03-12', '16:33:32', 'Memproses Dokumen '),
(837, 2, 'Edit Kondisi Aset', '2017-03-12', '16:34:00', 'Edit Kondisi Aset Infokus ke Dalam Perbaikan'),
(838, 2, 'Edit Kondisi Aset', '2017-03-12', '16:34:17', 'Edit Kondisi Aset Infokus ke Baik'),
(839, 2, 'Logout', '2017-03-12', '16:34:33', 'Logout Sistem'),
(840, 4, 'Login', '2017-03-12', '16:35:05', 'Login Sistem'),
(841, 4, 'Logout', '2017-03-12', '16:36:18', 'Logout Sistem'),
(842, 1, 'Login', '2017-03-12', '16:36:22', 'Login Sistem'),
(843, 1, 'Logout', '2017-03-12', '16:37:19', 'Logout Sistem'),
(844, 4, 'Login', '2017-03-12', '16:37:23', 'Login Sistem'),
(845, 4, 'Logout', '2017-03-12', '16:37:44', 'Logout Sistem'),
(846, 6, 'Login', '2017-03-12', '16:37:47', 'Login Sistem'),
(847, 6, 'Logout', '2017-03-12', '16:43:36', 'Logout Sistem'),
(848, 3, 'Login', '2017-03-12', '16:43:38', 'Login Sistem'),
(849, 3, 'Logout', '2017-03-12', '17:03:49', 'Logout Sistem'),
(850, 1, 'Login', '2017-03-12', '17:03:56', 'Login Sistem'),
(851, 1, 'Logout', '2017-03-12', '17:10:06', 'Logout Sistem'),
(852, 2, 'Login', '2017-03-12', '17:10:09', 'Login Sistem'),
(853, 2, 'Input Register Aset', '2017-03-12', '17:10:34', 'Register Aset '),
(854, 2, 'Logout', '2017-03-12', '17:21:52', 'Logout Sistem'),
(855, 1, 'Login', '2017-03-13', '08:30:29', 'Login Sistem'),
(856, 1, 'Logout', '2017-03-13', '09:35:42', 'Logout Sistem'),
(857, 6, 'Login', '2017-03-13', '09:35:57', 'Login Sistem'),
(858, 6, 'Logout', '2017-03-13', '09:36:07', 'Logout Sistem'),
(859, 5, 'Login', '2017-03-13', '09:36:10', 'Login Sistem'),
(860, 5, 'Logout', '2017-03-13', '09:37:07', 'Logout Sistem'),
(861, 1, 'Login', '2017-03-13', '09:37:13', 'Login Sistem'),
(862, 1, 'Login', '2017-03-13', '15:59:19', 'Login Sistem'),
(863, 1, 'Input Pejabat', '2017-03-13', '16:04:53', 'Tambah Pejabat Zurmawan, S.Ag, M.Hum ke dalam Sistem'),
(864, 1, 'Logout', '2017-03-13', '16:06:09', 'Logout Sistem'),
(865, 6, 'Login', '2017-03-13', '16:06:14', 'Login Sistem'),
(866, 6, 'Logout', '2017-03-13', '16:39:59', 'Logout Sistem'),
(867, 2, 'Login', '2017-03-13', '16:40:04', 'Login Sistem'),
(868, 2, 'Edit Lokasi Aset', '2017-03-13', '16:40:39', 'Edit Lokasi Aset '),
(869, 2, 'Edit Lokasi Aset', '2017-03-13', '16:42:09', 'Edit Lokasi Aset '),
(870, 2, 'Logout', '2017-03-13', '16:58:39', 'Logout Sistem'),
(871, 6, 'Login', '2017-03-13', '16:58:43', 'Login Sistem'),
(872, 6, 'Logout', '2017-03-13', '17:04:01', 'Logout Sistem'),
(873, 1, 'Login', '2017-03-13', '17:04:06', 'Login Sistem'),
(874, 1, 'Logout', '2017-03-13', '17:07:37', 'Logout Sistem'),
(875, 8, 'Login', '2017-03-13', '17:07:55', 'Login Sistem'),
(876, 8, 'Logout', '2017-03-13', '17:20:43', 'Logout Sistem'),
(877, 2, 'Login', '2017-03-13', '17:22:04', 'Login Sistem'),
(878, 2, 'Logout', '2017-03-13', '17:22:16', 'Logout Sistem'),
(879, 1, 'Login', '2017-03-14', '03:29:42', 'Login Sistem'),
(880, 1, 'Edit User', '2017-03-14', '03:30:31', 'Edit User Bmn'),
(881, 1, 'Edit User', '2017-03-14', '03:30:54', 'Edit User PUSTIPD'),
(882, 1, 'Logout', '2017-03-14', '03:31:00', 'Logout Sistem'),
(883, 1, 'Login', '2017-03-14', '03:31:07', 'Login Sistem'),
(884, 1, 'Logout', '2017-03-14', '03:31:15', 'Logout Sistem'),
(885, 2, 'Login', '2017-03-14', '03:31:20', 'Login Sistem'),
(886, 2, 'Logout', '2017-03-14', '03:31:25', 'Logout Sistem'),
(887, 2, 'Login', '2017-03-14', '06:27:18', 'Login Sistem'),
(888, 2, 'Login', '2017-03-14', '08:31:05', 'Login Sistem'),
(889, 3, 'Login', '2017-03-15', '02:36:19', 'Login Sistem'),
(890, 3, 'Logout', '2017-03-15', '02:47:07', 'Logout Sistem'),
(891, 3, 'Login', '2017-03-15', '02:47:32', 'Login Sistem'),
(892, 3, 'Input Permohonan', '2017-03-15', '02:49:24', 'Tambah Permohonan rusak'),
(893, 3, 'Logout', '2017-03-15', '02:52:48', 'Logout Sistem'),
(894, 3, 'Login', '2017-03-15', '02:52:54', 'Login Sistem'),
(895, 3, 'Input Permohonan', '2017-03-15', '03:05:48', 'Tambah Permohonan Pengadaan Komputer'),
(896, 3, 'Edit Dokumen', '2017-03-15', '03:06:15', 'Edit Dokumen Pengadaan Komputer'),
(897, 3, 'Input Permohonan', '2017-03-15', '03:07:09', 'Tambah Permohonan Pengadaan Komputer'),
(898, 3, 'Edit Dokumen', '2017-03-15', '03:07:38', 'Edit Dokumen Pengadaan Komputer'),
(899, 3, 'Logout', '2017-03-15', '03:08:07', 'Logout Sistem'),
(900, 7, 'Login', '2017-03-15', '03:08:15', 'Login Sistem'),
(901, 2, 'Login', '2017-03-15', '07:28:49', 'Login Sistem'),
(902, 2, 'Logout', '2017-03-15', '07:28:59', 'Logout Sistem'),
(903, 3, 'Login', '2017-03-15', '07:29:05', 'Login Sistem'),
(904, 3, 'Logout', '2017-03-15', '07:30:05', 'Logout Sistem'),
(905, 3, 'Login', '2017-03-17', '08:33:05', 'Login Sistem'),
(906, 3, 'Input Permohonan', '2017-03-17', '08:39:25', 'Tambah Permohonan Tester II'),
(907, 3, 'Input Permohonan', '2017-03-17', '08:45:44', 'Tambah Permohonan Tester II'),
(908, 3, 'Input Permohonan', '2017-03-17', '09:34:04', 'Tambah Permohonan Pengadaan Lab II'),
(909, 3, 'Input Permohonan', '2017-03-17', '09:49:15', 'Tambah Permohonan Tester II'),
(910, 3, 'Input Permohonan', '2017-03-17', '09:50:43', 'Tambah Permohonan Tester III'),
(911, 3, 'Input Permohonan', '2017-03-17', '09:51:13', 'Tambah Permohonan Tester'),
(912, 3, 'Logout', '2017-03-17', '09:52:47', 'Logout Sistem'),
(913, 4, 'Login', '2017-03-17', '09:52:51', 'Login Sistem'),
(914, 4, 'Disposisi Dokumen', '2017-03-17', '09:58:52', 'Disposisi Dokumen  ke Rektor'),
(915, 4, 'Disposisi Dokumen', '2017-03-17', '09:59:11', 'Disposisi Dokumen  ke Rektor'),
(916, 4, 'Logout', '2017-03-17', '09:59:21', 'Logout Sistem'),
(917, 6, 'Login', '2017-03-17', '09:59:25', 'Login Sistem'),
(918, 6, 'Disposisi Dokumen', '2017-03-17', '09:59:42', 'Disposisi Dokumen  Ke Kabagumum'),
(919, 6, 'Logout', '2017-03-17', '09:59:57', 'Logout Sistem'),
(920, 8, 'Login', '2017-03-17', '10:00:02', 'Login Sistem'),
(921, 8, 'Disposisi Dokumen', '2017-03-17', '10:00:16', 'Disposisi Dokumen  Ke BMN'),
(922, 8, 'Logout', '2017-03-17', '10:00:31', 'Logout Sistem'),
(923, 2, 'Login', '2017-03-17', '10:00:34', 'Login Sistem'),
(924, 2, 'Edit Barang', '2017-03-17', '10:21:54', 'Edit Barang 2'),
(925, 2, 'Edit Barang', '2017-03-17', '10:22:53', 'Edit Barang 2'),
(926, 2, 'Edit Barang', '2017-03-17', '10:23:40', 'Edit Barang 3'),
(927, 2, 'Edit Barang', '2017-03-17', '10:24:59', 'Edit Barang 3'),
(928, 2, 'Edit Barang', '2017-03-17', '10:25:57', 'Edit Barang 2'),
(929, 2, 'Input Register Aset', '2017-03-17', '10:30:21', 'Register Aset '),
(930, 2, 'Proses Dokumen', '2017-03-17', '10:30:21', 'Memproses Dokumen '),
(931, 2, 'Input Register Aset', '2017-03-17', '10:33:16', 'Register Aset '),
(932, 2, 'Input Register Aset', '2017-03-17', '10:34:02', 'Register Aset '),
(933, 2, 'Input Register Aset', '2017-03-17', '10:38:07', 'Register Aset '),
(934, 2, 'Edit Kondisi Aset', '2017-03-17', '10:46:37', 'Edit Kondisi Aset Infokus ke Dalam Perbaikan'),
(935, 2, 'Edit Kondisi Aset', '2017-03-17', '10:59:33', 'Edit Kondisi Aset Infokus ke Baik'),
(936, 2, 'Logout', '2017-03-17', '11:02:27', 'Logout Sistem'),
(937, 3, 'Login', '2017-03-17', '11:02:32', 'Login Sistem'),
(938, 3, 'Logout', '2017-03-17', '11:16:14', 'Logout Sistem'),
(939, 2, 'Login', '2017-03-17', '11:16:18', 'Login Sistem'),
(940, 2, 'Edit Lokasi Aset', '2017-03-17', '11:16:42', 'Edit Lokasi Aset '),
(941, 2, 'Edit Lokasi Aset', '2017-03-17', '11:17:32', 'Edit Lokasi Aset '),
(942, 2, 'Logout', '2017-03-17', '11:19:05', 'Logout Sistem'),
(943, 6, 'Login', '2017-03-17', '11:19:11', 'Login Sistem'),
(944, 6, 'Logout', '2017-03-17', '11:33:44', 'Logout Sistem'),
(945, 2, 'Login', '2017-03-17', '11:33:49', 'Login Sistem'),
(946, 2, 'Logout', '2017-03-17', '11:36:35', 'Logout Sistem'),
(947, 1, 'Login', '2017-03-17', '11:36:43', 'Login Sistem'),
(948, 1, 'Input Menu', '2017-03-17', '11:39:07', 'Tambah Menu Kuwitansi Sistem'),
(949, 1, 'Delete User Sistem', '2017-03-17', '11:39:58', 'Hapus User Sistem > Kabag Umum Fakultas'),
(950, 1, 'Delete User Sistem', '2017-03-17', '11:40:04', 'Hapus User Sistem > Dekan'),
(951, 1, 'Edit Menu', '2017-03-17', '13:04:32', 'Edit Menu Kuwitansi Sistem'),
(952, 1, 'Logout', '2017-03-17', '13:11:19', 'Logout Sistem'),
(953, 4, 'Login', '2017-03-17', '13:11:29', 'Login Sistem'),
(954, 4, 'Logout', '2017-03-17', '13:12:20', 'Logout Sistem'),
(955, 2, 'Login', '2017-03-17', '13:12:23', 'Login Sistem'),
(956, 2, 'Logout', '2017-03-17', '13:12:32', 'Logout Sistem'),
(957, 8, 'Login', '2017-03-17', '13:12:40', 'Login Sistem'),
(958, 8, 'Logout', '2017-03-17', '13:12:48', 'Logout Sistem'),
(959, 3, 'Login', '2017-03-17', '13:12:53', 'Login Sistem'),
(960, 3, 'Logout', '2017-03-17', '13:12:58', 'Logout Sistem'),
(961, 4, 'Login', '2017-03-17', '13:13:01', 'Login Sistem'),
(962, 4, 'Logout', '2017-03-17', '13:13:10', 'Logout Sistem'),
(963, 2, 'Login', '2017-03-17', '13:13:13', 'Login Sistem'),
(964, 2, 'Logout', '2017-03-17', '13:17:03', 'Logout Sistem'),
(965, 6, 'Login', '2017-03-17', '13:17:07', 'Login Sistem'),
(966, 6, 'Logout', '2017-03-17', '13:17:27', 'Logout Sistem'),
(967, 3, 'Login', '2017-03-17', '14:04:05', 'Login Sistem'),
(968, 3, 'Logout', '2017-03-17', '14:06:30', 'Logout Sistem'),
(969, 8, 'Login', '2017-03-17', '14:06:35', 'Login Sistem'),
(970, 8, 'Disposisi Dokumen', '2017-03-17', '14:06:55', 'Disposisi Dokumen  Ke BMN'),
(971, 8, 'Logout', '2017-03-17', '14:07:07', 'Logout Sistem'),
(972, 2, 'Login', '2017-03-17', '14:07:12', 'Login Sistem'),
(973, 2, 'Proses Dokumen', '2017-03-17', '14:07:34', 'Memproses Dokumen '),
(974, 2, 'Proses Dokumen', '2017-03-17', '14:11:20', 'Memproses Dokumen '),
(975, 2, 'Proses Dokumen', '2017-03-17', '14:11:43', 'Memproses Dokumen '),
(976, 2, 'Logout', '2017-03-17', '14:12:02', 'Logout Sistem'),
(977, 3, 'Login', '2017-03-17', '14:12:06', 'Login Sistem'),
(978, 3, 'Logout', '2017-03-17', '14:17:58', 'Logout Sistem'),
(979, 2, 'Login', '2017-03-17', '14:18:01', 'Login Sistem'),
(980, 2, 'Logout', '2017-03-17', '14:28:00', 'Logout Sistem'),
(981, 3, 'Login', '2017-03-17', '14:28:03', 'Login Sistem'),
(982, 3, 'Input Permohonan', '2017-03-17', '14:29:24', 'Tambah Permohonan Pengadaan Komputer'),
(983, 3, 'Input Permohonan', '2017-03-17', '14:29:50', 'Tambah Permohonan Pengadaan Komputer Bekas'),
(984, 3, 'Input Permohonan', '2017-03-17', '14:30:04', 'Tambah Permohonan Pengadaan Lab II'),
(985, 3, 'Input Permohonan', '2017-03-17', '14:30:29', 'Tambah Permohonan Penghapusan Aset'),
(986, 3, 'Input Permohonan', '2017-03-17', '14:30:58', 'Tambah Permohonan Pengadaan Lab V'),
(987, 3, 'Logout', '2017-03-17', '14:31:05', 'Logout Sistem'),
(988, 4, 'Login', '2017-03-17', '14:31:09', 'Login Sistem'),
(989, 4, 'Disposisi Dokumen', '2017-03-17', '14:31:57', 'Disposisi Dokumen  ke Rektor'),
(990, 4, 'Disposisi Dokumen', '2017-03-17', '14:32:15', 'Disposisi Dokumen  ke Rektor'),
(991, 4, 'Disposisi Dokumen', '2017-03-17', '14:32:34', 'Disposisi Dokumen  ke Rektor'),
(992, 4, 'Logout', '2017-03-17', '14:32:40', 'Logout Sistem'),
(993, 6, 'Login', '2017-03-17', '14:32:42', 'Login Sistem'),
(994, 6, 'Disposisi Dokumen', '2017-03-17', '14:33:18', 'Disposisi Dokumen  Ke Kabagumum'),
(995, 6, 'Disposisi Dokumen', '2017-03-17', '14:33:28', 'Disposisi Dokumen  Ke Kabagumum'),
(996, 6, 'Disposisi Dokumen', '2017-03-17', '14:33:37', 'Disposisi Dokumen  Ke Kabagumum'),
(997, 6, 'Logout', '2017-03-17', '14:33:41', 'Logout Sistem'),
(998, 8, 'Login', '2017-03-17', '14:33:45', 'Login Sistem'),
(999, 8, 'Disposisi Dokumen', '2017-03-17', '14:34:00', 'Disposisi Dokumen  Ke BMN'),
(1000, 8, 'Disposisi Dokumen', '2017-03-17', '14:34:10', 'Disposisi Dokumen  Ke BMN'),
(1001, 8, 'Logout', '2017-03-17', '14:34:15', 'Logout Sistem'),
(1002, 3, 'Login', '2017-03-17', '14:34:18', 'Login Sistem'),
(1003, 3, 'Logout', '2017-03-17', '14:34:32', 'Logout Sistem'),
(1004, 2, 'Login', '2017-03-17', '14:34:37', 'Login Sistem'),
(1005, 2, 'Input Barang', '2017-03-17', '14:35:24', 'Tambah Barang 2'),
(1006, 2, 'Input Register Aset', '2017-03-17', '14:35:43', 'Register Aset '),
(1007, 2, 'Proses Dokumen', '2017-03-17', '14:36:15', 'Memproses Dokumen '),
(1008, 2, 'Logout', '2017-03-17', '14:38:18', 'Logout Sistem'),
(1009, 3, 'Login', '2017-03-17', '14:38:21', 'Login Sistem'),
(1010, 3, 'Login', '2017-03-17', '14:58:04', 'Login Sistem'),
(1011, 3, 'Logout', '2017-03-17', '15:13:51', 'Logout Sistem'),
(1012, 2, 'Login', '2017-03-17', '15:13:56', 'Login Sistem'),
(1013, 2, 'Proses Dokumen', '2017-03-17', '15:14:12', 'Memproses Dokumen '),
(1014, 2, 'Proses Dokumen', '2017-03-17', '15:14:38', 'Memproses Dokumen '),
(1015, 2, 'Logout', '2017-03-17', '15:14:48', 'Logout Sistem'),
(1016, 3, 'Login', '2017-03-17', '15:14:52', 'Login Sistem'),
(1017, 3, 'Logout', '2017-03-17', '15:15:32', 'Logout Sistem'),
(1018, 2, 'Login', '2017-03-17', '15:15:36', 'Login Sistem'),
(1019, 2, 'Proses Dokumen', '2017-03-17', '15:15:52', 'Memproses Dokumen '),
(1020, 2, 'Logout', '2017-03-17', '15:17:05', 'Logout Sistem'),
(1021, 2, 'Login', '2017-03-17', '15:17:35', 'Login Sistem'),
(1022, 2, 'Input Barang', '2017-03-17', '15:20:49', 'Tambah Barang 3'),
(1023, 2, 'Input Register Aset', '2017-03-17', '15:21:13', 'Register Aset '),
(1024, 2, 'Input Register Aset', '2017-03-17', '15:23:30', 'Register Aset '),
(1025, 2, 'Logout', '2017-03-17', '15:25:16', 'Logout Sistem'),
(1026, 3, 'Login', '2017-03-17', '15:25:20', 'Login Sistem'),
(1027, 3, 'Logout', '2017-03-17', '16:05:09', 'Logout Sistem'),
(1028, 4, 'Login', '2017-03-17', '16:05:15', 'Login Sistem'),
(1029, 4, 'Disposisi Dokumen', '2017-03-17', '16:06:19', 'Disposisi Dokumen  ke Rektor'),
(1030, 4, 'Logout', '2017-03-17', '16:06:29', 'Logout Sistem'),
(1031, 6, 'Login', '2017-03-17', '16:06:33', 'Login Sistem'),
(1032, 6, 'Logout', '2017-03-17', '16:07:39', 'Logout Sistem'),
(1033, 3, 'Login', '2017-03-17', '16:07:41', 'Login Sistem'),
(1034, 3, 'Logout', '2017-03-17', '16:08:33', 'Logout Sistem'),
(1035, 4, 'Login', '2017-03-17', '16:08:37', 'Login Sistem'),
(1036, 4, 'Logout', '2017-03-17', '16:08:50', 'Logout Sistem'),
(1037, 6, 'Login', '2017-03-17', '16:08:53', 'Login Sistem'),
(1038, 6, 'Logout', '2017-03-17', '16:10:25', 'Logout Sistem'),
(1039, 4, 'Login', '2017-03-17', '16:10:28', 'Login Sistem'),
(1040, 4, 'Logout', '2017-03-17', '16:11:21', 'Logout Sistem'),
(1041, 6, 'Login', '2017-03-17', '16:11:26', 'Login Sistem'),
(1042, 6, 'Logout', '2017-03-17', '16:13:39', 'Logout Sistem'),
(1043, 4, 'Login', '2017-03-17', '16:13:45', 'Login Sistem'),
(1044, 4, 'Logout', '2017-03-17', '16:15:23', 'Logout Sistem'),
(1045, 2, 'Login', '2017-03-17', '16:15:29', 'Login Sistem'),
(1046, 2, 'Logout', '2017-03-17', '16:41:55', 'Logout Sistem'),
(1047, 6, 'Login', '2017-03-17', '16:41:59', 'Login Sistem'),
(1048, 6, 'Logout', '2017-03-17', '16:50:42', 'Logout Sistem'),
(1049, 3, 'Login', '2017-03-17', '16:50:46', 'Login Sistem'),
(1050, 3, 'Logout', '2017-03-17', '16:52:09', 'Logout Sistem'),
(1051, 2, 'Login', '2017-03-17', '16:52:13', 'Login Sistem'),
(1052, 2, 'Logout', '2017-03-17', '16:55:32', 'Logout Sistem'),
(1053, 4, 'Login', '2017-03-17', '16:55:39', 'Login Sistem'),
(1054, 4, 'Logout', '2017-03-17', '16:56:14', 'Logout Sistem'),
(1055, 2, 'Login', '2017-03-17', '16:56:18', 'Login Sistem'),
(1056, 2, 'Hapus Aset', '2017-03-17', '16:56:40', 'Hapus Aset UIN RF Infokus pada '),
(1057, 2, 'Logout', '2017-03-17', '16:57:35', 'Logout Sistem'),
(1058, 3, 'Login', '2017-03-17', '16:57:38', 'Login Sistem'),
(1059, 3, 'Logout', '2017-03-17', '16:59:17', 'Logout Sistem'),
(1060, 6, 'Login', '2017-03-17', '16:59:25', 'Login Sistem'),
(1061, 6, 'Logout', '2017-03-17', '17:09:47', 'Logout Sistem'),
(1062, 1, 'Login', '2017-03-17', '17:09:51', 'Login Sistem'),
(1063, 1, 'Input Menu', '2017-03-17', '17:11:26', 'Tambah Menu Pemindahan Aset Sistem'),
(1064, 1, 'Edit Menu', '2017-03-17', '17:12:34', 'Edit Menu Penghapusan Aset Sistem'),
(1065, 1, 'Input Menu', '2017-03-17', '17:13:54', 'Tambah Menu Penghapusan Aset Sistem'),
(1066, 1, 'Delete Menu Sistem', '2017-03-17', '17:14:07', 'Hapus Menu Sistem > Penghapusan Aset'),
(1067, 1, 'Logout', '2017-03-17', '17:17:43', 'Logout Sistem'),
(1068, 6, 'Login', '2017-03-17', '17:17:49', 'Login Sistem'),
(1069, 6, 'Login', '2017-03-17', '17:48:06', 'Login Sistem'),
(1070, 6, 'Logout', '2017-03-17', '17:52:09', 'Logout Sistem'),
(1071, 6, 'Login', '2017-03-17', '17:56:54', 'Login Sistem'),
(1072, 2, 'Login', '2017-03-18', '06:23:22', 'Login Sistem'),
(1073, 2, 'Logout', '2017-03-18', '06:30:48', 'Logout Sistem'),
(1074, 3, 'Login', '2017-03-18', '06:30:56', 'Login Sistem'),
(1075, 3, 'Logout', '2017-03-18', '06:34:32', 'Logout Sistem'),
(1076, 2, 'Login', '2017-03-18', '06:34:40', 'Login Sistem'),
(1077, 2, 'Logout', '2017-03-18', '07:09:03', 'Logout Sistem'),
(1078, 6, 'Login', '2017-03-18', '07:09:08', 'Login Sistem'),
(1079, 6, 'Logout', '2017-03-18', '07:29:09', 'Logout Sistem'),
(1080, 1, 'Login', '2017-03-18', '07:35:35', 'Login Sistem'),
(1081, 2, 'Login', '2017-03-18', '15:42:32', 'Login Sistem'),
(1082, 2, 'Logout', '2017-03-18', '16:40:55', 'Logout Sistem'),
(1083, 2, 'Login', '2017-03-18', '16:43:18', 'Login Sistem'),
(1084, 2, 'Login', '2017-03-19', '11:29:31', 'Login Sistem'),
(1085, 2, 'Login', '2017-03-21', '14:23:11', 'Login Sistem'),
(1086, 2, 'Logout', '2017-03-21', '14:34:57', 'Logout Sistem'),
(1087, 8, 'Login', '2017-03-21', '14:35:01', 'Login Sistem'),
(1088, 8, 'Logout', '2017-03-21', '14:59:08', 'Logout Sistem'),
(1089, 3, 'Login', '2017-03-22', '03:25:56', 'Login Sistem'),
(1090, 3, 'Logout', '2017-03-22', '03:29:17', 'Logout Sistem'),
(1091, 2, 'Login', '2017-03-22', '03:29:21', 'Login Sistem'),
(1092, 2, 'Login', '2017-03-22', '03:34:44', 'Login Sistem'),
(1093, 1, 'Login', '2017-03-23', '05:49:39', 'Login Sistem'),
(1094, 1, 'Logout', '2017-03-23', '06:31:37', 'Logout Sistem'),
(1095, 2, 'Login', '2017-03-23', '06:32:19', 'Login Sistem'),
(1096, 2, 'Logout', '2017-03-23', '06:45:16', 'Logout Sistem'),
(1097, 2, 'Login', '2017-03-23', '07:08:02', 'Login Sistem'),
(1098, 2, 'Input Barang', '2017-03-23', '08:00:55', 'Tambah Barang 2'),
(1099, 1, 'Login', '2017-03-24', '05:46:46', 'Login Sistem'),
(1100, 1, 'Edit User', '2017-03-24', '05:47:44', 'Edit User TU Rektorat'),
(1101, 1, 'Edit User', '2017-03-24', '05:47:54', 'Edit User Rektor'),
(1102, 1, 'Edit User', '2017-03-24', '05:48:04', 'Edit User Kabag Umum Rektorat'),
(1103, 1, 'Logout', '2017-03-24', '05:48:43', 'Logout Sistem'),
(1104, 2, 'Login', '2017-03-24', '05:48:48', 'Login Sistem'),
(1105, 2, 'Logout', '2017-03-24', '05:53:30', 'Logout Sistem'),
(1106, 6, 'Login', '2017-03-24', '05:53:36', 'Login Sistem'),
(1107, 3, 'Login', '2017-03-24', '05:59:57', 'Login Sistem'),
(1108, 3, 'Login', '2017-03-24', '08:06:22', 'Login Sistem'),
(1109, 3, 'Logout', '2017-03-24', '08:17:54', 'Logout Sistem'),
(1110, 4, 'Login', '2017-03-24', '08:17:59', 'Login Sistem'),
(1111, 4, 'Logout', '2017-03-24', '08:35:42', 'Logout Sistem'),
(1112, 6, 'Login', '2017-03-24', '08:35:51', 'Login Sistem'),
(1113, 6, 'Logout', '2017-03-24', '08:49:00', 'Logout Sistem'),
(1114, 8, 'Login', '2017-03-24', '08:49:05', 'Login Sistem'),
(1115, 8, 'Logout', '2017-03-24', '09:00:44', 'Logout Sistem'),
(1116, 2, 'Login', '2017-03-24', '09:00:47', 'Login Sistem'),
(1117, 2, 'Login', '2017-03-24', '09:52:55', 'Login Sistem'),
(1118, 2, 'Login', '2017-03-27', '07:46:05', 'Login Sistem'),
(1119, 2, 'Input Tipe Barang', '2017-03-27', '07:47:29', 'Tambah Tipe Barang Komputer'),
(1120, 2, 'Input Tipe Barang', '2017-03-27', '07:47:58', 'Tambah Tipe Barang Printer'),
(1121, 2, 'Input Tipe Barang', '2017-03-27', '07:49:12', 'Tambah Tipe Barang Handycam'),
(1122, 2, 'Input Kategori Barang', '2017-03-27', '07:49:25', 'Tambah Kategori Barang Kamera'),
(1123, 2, 'Edit Tipe Barang', '2017-03-27', '07:49:37', 'Edit Tipe Barang Handycam'),
(1124, 2, 'Input Tipe Barang', '2017-03-27', '07:50:31', 'Tambah Tipe Barang UPS'),
(1125, 2, 'Edit Tipe Barang', '2017-03-27', '07:50:44', 'Edit Tipe Barang UPS'),
(1126, 2, 'Input Tipe Barang', '2017-03-27', '07:51:38', 'Tambah Tipe Barang VCD/DVD'),
(1127, 2, 'Input Tipe Barang', '2017-03-27', '07:52:49', 'Tambah Tipe Barang Speaker / Sound Sistem'),
(1128, 2, 'Input Tipe Barang', '2017-03-27', '07:53:31', 'Tambah Tipe Barang Stabilizer'),
(1129, 2, 'Input Tipe Barang', '2017-03-27', '07:54:38', 'Tambah Tipe Barang Mesin Penghancur Kertas'),
(1130, 2, 'Input Tipe Barang', '2017-03-27', '07:55:45', 'Tambah Tipe Barang Dispenser'),
(1131, 2, 'Edit Tipe Barang', '2017-03-27', '07:55:55', 'Edit Tipe Barang Mesin Penghancur Kertas'),
(1132, 2, 'Input Kategori Barang', '2017-03-27', '07:56:15', 'Tambah Kategori Barang Perlengkapan'),
(1133, 2, 'Logout', '2017-03-27', '07:57:15', 'Logout Sistem'),
(1134, 3, 'Login', '2017-03-27', '07:57:20', 'Login Sistem'),
(1135, 3, 'Input Permohonan', '2017-03-27', '07:58:04', 'Tambah Permohonan Pengadaan TV Fakultas'),
(1136, 3, 'Input Permohonan', '2017-03-27', '07:58:28', 'Tambah Permohonan Pengadaan Printer'),
(1137, 3, 'Input Permohonan', '2017-03-27', '07:58:47', 'Tambah Permohonan Pengadaan LCD'),
(1138, 3, 'Input Permohonan', '2017-03-27', '07:59:12', 'Tambah Permohonan Pengadaan Dispenser'),
(1139, 2, 'Login', '2017-03-27', '08:00:11', 'Login Sistem'),
(1140, 3, 'Input Permohonan', '2017-03-27', '08:00:38', 'Tambah Permohonan Pengadaan UPS'),
(1141, 3, 'Input Permohonan', '2017-03-27', '08:01:04', 'Tambah Permohonan Pengadaan Radio Hotspot'),
(1142, 3, 'Input Permohonan', '2017-03-27', '08:01:37', 'Tambah Permohonan Pengadaan Speaker'),
(1143, 3, 'Input Permohonan', '2017-03-27', '08:02:00', 'Tambah Permohonan Pengadaan Stabilizer'),
(1144, 3, 'Input Permohonan', '2017-03-27', '08:02:32', 'Tambah Permohonan Pengadaan DVD Player'),
(1145, 3, 'Input Permohonan', '2017-03-27', '08:03:21', 'Tambah Permohonan Pengadaan Handycam'),
(1146, 3, 'Input Permohonan', '2017-03-27', '08:03:53', 'Tambah Permohonan Pengadaan Infokus'),
(1147, 3, 'Input Permohonan', '2017-03-27', '08:04:42', 'Tambah Permohonan Pengadaan Penghancur Kertas'),
(1148, 3, 'Input Permohonan', '2017-03-27', '08:05:59', 'Tambah Permohonan Perbaikan Infokus Rusak'),
(1149, 3, 'Input Permohonan', '2017-03-27', '08:06:27', 'Tambah Permohonan Perbaikan LCD Rusak'),
(1150, 3, 'Logout', '2017-03-27', '08:06:37', 'Logout Sistem'),
(1151, 4, 'Login', '2017-03-27', '08:06:46', 'Login Sistem'),
(1152, 4, 'Disposisi Dokumen', '2017-03-27', '08:07:05', 'Disposisi Dokumen  ke Rektor'),
(1153, 4, 'Disposisi Dokumen', '2017-03-27', '08:07:17', 'Disposisi Dokumen  ke Rektor'),
(1154, 4, 'Disposisi Dokumen', '2017-03-27', '08:07:27', 'Disposisi Dokumen  ke Rektor'),
(1155, 4, 'Disposisi Dokumen', '2017-03-27', '08:07:38', 'Disposisi Dokumen  ke Rektor'),
(1156, 4, 'Disposisi Dokumen', '2017-03-27', '08:07:55', 'Disposisi Dokumen  ke Rektor'),
(1157, 4, 'Disposisi Dokumen', '2017-03-27', '08:08:07', 'Disposisi Dokumen  ke Rektor'),
(1158, 4, 'Disposisi Dokumen', '2017-03-27', '08:08:18', 'Disposisi Dokumen  ke Rektor'),
(1159, 4, 'Disposisi Dokumen', '2017-03-27', '08:08:29', 'Disposisi Dokumen  ke Rektor'),
(1160, 4, 'Disposisi Dokumen', '2017-03-27', '08:08:40', 'Disposisi Dokumen  ke Rektor'),
(1161, 4, 'Disposisi Dokumen', '2017-03-27', '08:08:58', 'Disposisi Dokumen  ke Rektor'),
(1162, 4, 'Logout', '2017-03-27', '08:09:01', 'Logout Sistem'),
(1163, 6, 'Login', '2017-03-27', '08:09:10', 'Login Sistem'),
(1164, 6, 'Disposisi Dokumen', '2017-03-27', '08:09:33', 'Disposisi Dokumen  Ke Kabagumum'),
(1165, 6, 'Disposisi Dokumen', '2017-03-27', '08:09:45', 'Disposisi Dokumen  Ke Kabagumum'),
(1166, 6, 'Disposisi Dokumen', '2017-03-27', '08:09:57', 'Disposisi Dokumen  Ke Kabagumum'),
(1167, 6, 'Disposisi Dokumen', '2017-03-27', '08:10:12', 'Disposisi Dokumen  Ke Kabagumum'),
(1168, 6, 'Disposisi Dokumen', '2017-03-27', '08:10:26', 'Disposisi Dokumen  Ke Kabagumum'),
(1169, 6, 'Disposisi Dokumen', '2017-03-27', '08:10:37', 'Disposisi Dokumen  Ke Kabagumum'),
(1170, 6, 'Disposisi Dokumen', '2017-03-27', '08:10:48', 'Disposisi Dokumen  Ke Kabagumum'),
(1171, 6, 'Disposisi Dokumen', '2017-03-27', '08:11:00', 'Disposisi Dokumen  Ke Kabagumum'),
(1172, 6, 'Logout', '2017-03-27', '08:11:05', 'Logout Sistem'),
(1173, 8, 'Login', '2017-03-27', '08:11:10', 'Login Sistem'),
(1174, 8, 'Disposisi Dokumen', '2017-03-27', '08:11:30', 'Disposisi Dokumen  Ke BMN'),
(1175, 8, 'Disposisi Dokumen', '2017-03-27', '08:11:43', 'Disposisi Dokumen  Ke BMN'),
(1176, 8, 'Disposisi Dokumen', '2017-03-27', '08:11:57', 'Disposisi Dokumen  Ke BMN'),
(1177, 8, 'Disposisi Dokumen', '2017-03-27', '08:12:14', 'Disposisi Dokumen  Ke BMN'),
(1178, 8, 'Disposisi Dokumen', '2017-03-27', '08:12:28', 'Disposisi Dokumen  Ke BMN'),
(1179, 8, 'Disposisi Dokumen', '2017-03-27', '08:12:39', 'Disposisi Dokumen  Ke BMN'),
(1180, 8, 'Disposisi Dokumen', '2017-03-27', '08:12:51', 'Disposisi Dokumen  Ke BMN'),
(1181, 8, 'Disposisi Dokumen', '2017-03-27', '08:13:05', 'Disposisi Dokumen  Ke BMN'),
(1182, 8, 'Logout', '2017-03-27', '08:13:11', 'Logout Sistem'),
(1183, 2, 'Login', '2017-03-27', '08:13:19', 'Login Sistem'),
(1184, 2, 'Input Barang', '2017-03-27', '08:21:59', 'Tambah Barang 13'),
(1185, 2, 'Proses Dokumen', '2017-03-27', '08:22:41', 'Memproses Dokumen '),
(1186, 2, 'Proses Dokumen', '2017-03-27', '08:22:59', 'Memproses Dokumen '),
(1187, 2, 'Proses Dokumen', '2017-03-27', '08:23:50', 'Memproses Dokumen '),
(1188, 2, 'Input Barang', '2017-03-27', '08:24:17', 'Tambah Barang 13'),
(1189, 2, 'Proses Dokumen', '2017-03-27', '08:24:45', 'Memproses Dokumen '),
(1190, 2, 'Input Barang', '2017-03-27', '08:25:45', 'Tambah Barang 13'),
(1191, 2, 'Proses Dokumen', '2017-03-27', '08:26:05', 'Memproses Dokumen '),
(1192, 2, 'Input Barang', '2017-03-27', '08:27:20', 'Tambah Barang 9'),
(1193, 2, 'Proses Dokumen', '2017-03-27', '08:27:51', 'Memproses Dokumen '),
(1194, 2, 'Input Barang', '2017-03-27', '08:28:23', 'Tambah Barang 3'),
(1195, 2, 'Logout', '2017-03-27', '08:30:10', 'Logout Sistem'),
(1196, 4, 'Login', '2017-03-27', '08:30:14', 'Login Sistem'),
(1197, 4, 'Disposisi Dokumen', '2017-03-27', '08:30:29', 'Disposisi Dokumen  ke Rektor'),
(1198, 4, 'Disposisi Dokumen', '2017-03-27', '08:30:41', 'Disposisi Dokumen  ke Rektor'),
(1199, 4, 'Disposisi Dokumen', '2017-03-27', '08:30:51', 'Disposisi Dokumen  ke Rektor'),
(1200, 4, 'Logout', '2017-03-27', '08:30:55', 'Logout Sistem'),
(1201, 6, 'Login', '2017-03-27', '08:30:58', 'Login Sistem'),
(1202, 6, 'Disposisi Dokumen', '2017-03-27', '08:31:12', 'Disposisi Dokumen  Ke Kabagumum'),
(1203, 6, 'Disposisi Dokumen', '2017-03-27', '08:31:26', 'Disposisi Dokumen  Ke Kabagumum'),
(1204, 6, 'Disposisi Dokumen', '2017-03-27', '08:31:36', 'Disposisi Dokumen  Ke Kabagumum'),
(1205, 6, 'Logout', '2017-03-27', '08:31:39', 'Logout Sistem'),
(1206, 8, 'Login', '2017-03-27', '08:31:42', 'Login Sistem'),
(1207, 8, 'Disposisi Dokumen', '2017-03-27', '08:31:54', 'Disposisi Dokumen  Ke BMN'),
(1208, 8, 'Disposisi Dokumen', '2017-03-27', '08:32:03', 'Disposisi Dokumen  Ke BMN'),
(1209, 8, 'Disposisi Dokumen', '2017-03-27', '08:32:12', 'Disposisi Dokumen  Ke BMN'),
(1210, 8, 'Logout', '2017-03-27', '08:32:17', 'Logout Sistem'),
(1211, 2, 'Login', '2017-03-27', '08:32:20', 'Login Sistem'),
(1212, 2, 'Input Barang', '2017-03-27', '08:32:56', 'Tambah Barang 2'),
(1213, 2, 'Proses Dokumen', '2017-03-27', '08:33:17', 'Memproses Dokumen '),
(1214, 2, 'Proses Dokumen', '2017-03-27', '08:33:35', 'Memproses Dokumen '),
(1215, 2, 'Input Barang', '2017-03-27', '08:34:08', 'Tambah Barang 2'),
(1216, 2, 'Input Barang', '2017-03-27', '08:34:30', 'Tambah Barang 2'),
(1217, 2, 'Proses Dokumen', '2017-03-27', '08:34:42', 'Memproses Dokumen '),
(1218, 2, 'Proses Dokumen', '2017-03-27', '08:34:56', 'Memproses Dokumen '),
(1219, 2, 'Input Register Aset', '2017-03-27', '08:35:22', 'Register Aset '),
(1220, 2, 'Input Register Aset', '2017-03-27', '08:35:43', 'Register Aset '),
(1221, 2, 'Input Register Aset', '2017-03-27', '08:35:59', 'Register Aset '),
(1222, 2, 'Proses Dokumen', '2017-03-27', '08:36:31', 'Memproses Dokumen '),
(1223, 2, 'Proses Dokumen', '2017-03-27', '08:37:36', 'Memproses Dokumen '),
(1224, 2, 'Input Barang', '2017-03-27', '08:40:07', 'Tambah Barang 3'),
(1225, 2, 'Input Barang', '2017-03-27', '08:40:30', 'Tambah Barang 3'),
(1226, 2, 'Input Barang', '2017-03-27', '08:40:54', 'Tambah Barang 3'),
(1227, 2, 'Input Barang', '2017-03-27', '08:41:41', 'Tambah Barang 6'),
(1228, 2, 'Input Barang', '2017-03-27', '08:42:04', 'Tambah Barang 6'),
(1229, 2, 'Input Barang', '2017-03-27', '08:42:37', 'Tambah Barang 1'),
(1230, 2, 'Input Barang', '2017-03-27', '08:43:02', 'Tambah Barang 1'),
(1231, 2, 'Input Barang', '2017-03-27', '08:43:30', 'Tambah Barang 10'),
(1232, 2, 'Input Barang', '2017-03-27', '08:43:53', 'Tambah Barang 4'),
(1233, 2, 'Input Barang', '2017-03-27', '08:44:19', 'Tambah Barang 4'),
(1234, 2, 'Input Barang', '2017-03-27', '08:44:41', 'Tambah Barang 4'),
(1235, 2, 'Input Barang', '2017-03-27', '08:45:16', 'Tambah Barang 8'),
(1236, 2, 'Input Barang', '2017-03-27', '08:45:41', 'Tambah Barang 8'),
(1237, 2, 'Proses Dokumen', '2017-03-27', '08:45:55', 'Memproses Dokumen '),
(1238, 2, 'Proses Dokumen', '2017-03-27', '08:46:10', 'Memproses Dokumen '),
(1239, 2, 'Proses Dokumen', '2017-03-27', '08:46:23', 'Memproses Dokumen '),
(1240, 2, 'Proses Dokumen', '2017-03-27', '08:46:42', 'Memproses Dokumen '),
(1241, 2, 'Proses Dokumen', '2017-03-27', '08:46:54', 'Memproses Dokumen '),
(1242, 2, 'Proses Dokumen', '2017-03-27', '08:47:06', 'Memproses Dokumen '),
(1243, 2, 'Proses Dokumen', '2017-03-27', '08:47:25', 'Memproses Dokumen '),
(1244, 2, 'Proses Dokumen', '2017-03-27', '08:47:39', 'Memproses Dokumen '),
(1245, 2, 'Proses Dokumen', '2017-03-27', '08:47:57', 'Memproses Dokumen '),
(1246, 2, 'Proses Dokumen', '2017-03-27', '08:48:16', 'Memproses Dokumen '),
(1247, 2, 'Proses Dokumen', '2017-03-27', '08:48:29', 'Memproses Dokumen '),
(1248, 2, 'Input Register Aset', '2017-03-27', '08:49:00', 'Register Aset '),
(1249, 2, 'Input Register Aset', '2017-03-27', '08:49:49', 'Register Aset '),
(1250, 2, 'Input Register Aset', '2017-03-27', '08:50:06', 'Register Aset '),
(1251, 2, 'Input Register Aset', '2017-03-27', '08:50:24', 'Register Aset '),
(1252, 2, 'Input Register Aset', '2017-03-27', '08:51:32', 'Register Aset '),
(1253, 2, 'Input Register Aset', '2017-03-27', '08:51:46', 'Register Aset '),
(1254, 2, 'Input Register Aset', '2017-03-27', '08:52:03', 'Register Aset '),
(1255, 2, 'Input Register Aset', '2017-03-27', '08:52:25', 'Register Aset '),
(1256, 2, 'Input Register Aset', '2017-03-27', '08:52:43', 'Register Aset '),
(1257, 2, 'Input Register Aset', '2017-03-27', '08:53:04', 'Register Aset '),
(1258, 2, 'Input Register Aset', '2017-03-27', '08:53:38', 'Register Aset '),
(1259, 2, 'Input Register Aset', '2017-03-27', '08:54:01', 'Register Aset '),
(1260, 2, 'Input Register Aset', '2017-03-27', '08:54:25', 'Register Aset '),
(1261, 2, 'Input Register Aset', '2017-03-27', '08:55:00', 'Register Aset '),
(1262, 2, 'Logout', '2017-03-27', '08:55:30', 'Logout Sistem'),
(1263, 4, 'Login', '2017-03-27', '08:55:33', 'Login Sistem'),
(1264, 4, 'Disposisi Dokumen', '2017-03-27', '08:55:50', 'Disposisi Dokumen  ke Rektor'),
(1265, 4, 'Disposisi Dokumen', '2017-03-27', '08:56:03', 'Disposisi Dokumen  ke Rektor'),
(1266, 4, 'Disposisi Dokumen', '2017-03-27', '08:56:17', 'Disposisi Dokumen  ke Rektor'),
(1267, 4, 'Disposisi Dokumen', '2017-03-27', '08:56:29', 'Disposisi Dokumen  ke Rektor'),
(1268, 4, 'Logout', '2017-03-27', '08:56:35', 'Logout Sistem'),
(1269, 6, 'Login', '2017-03-27', '08:56:38', 'Login Sistem'),
(1270, 6, 'Disposisi Dokumen', '2017-03-27', '08:56:56', 'Disposisi Dokumen  Ke Kabagumum'),
(1271, 6, 'Disposisi Dokumen', '2017-03-27', '08:57:10', 'Disposisi Dokumen  Ke Kabagumum'),
(1272, 6, 'Disposisi Dokumen', '2017-03-27', '08:57:22', 'Disposisi Dokumen  Ke Kabagumum'),
(1273, 6, 'Disposisi Dokumen', '2017-03-27', '08:57:35', 'Disposisi Dokumen  Ke Kabagumum'),
(1274, 6, 'Logout', '2017-03-27', '08:57:40', 'Logout Sistem'),
(1275, 8, 'Login', '2017-03-27', '08:57:43', 'Login Sistem'),
(1276, 8, 'Disposisi Dokumen', '2017-03-27', '08:58:00', 'Disposisi Dokumen  Ke BMN'),
(1277, 8, 'Disposisi Dokumen', '2017-03-27', '08:58:12', 'Disposisi Dokumen  Ke BMN'),
(1278, 8, 'Disposisi Dokumen', '2017-03-27', '08:58:23', 'Disposisi Dokumen  Ke BMN'),
(1279, 8, 'Disposisi Dokumen', '2017-03-27', '08:58:34', 'Disposisi Dokumen  Ke BMN'),
(1280, 8, 'Logout', '2017-03-27', '08:58:38', 'Logout Sistem'),
(1281, 2, 'Login', '2017-03-27', '08:58:42', 'Login Sistem'),
(1282, 2, 'Proses Dokumen', '2017-03-27', '08:59:27', 'Memproses Dokumen '),
(1283, 2, 'Edit Kondisi Aset', '2017-03-27', '09:00:35', 'Edit Kondisi Aset Infokus ke Dalam Perbaikan'),
(1284, 2, 'Proses Dokumen', '2017-03-27', '09:03:31', 'Memproses Dokumen '),
(1285, 2, 'Proses Dokumen', '2017-03-27', '09:03:48', 'Memproses Dokumen '),
(1286, 2, 'Proses Dokumen', '2017-03-27', '09:04:11', 'Memproses Dokumen '),
(1287, 2, 'Proses Dokumen', '2017-03-27', '09:04:47', 'Memproses Dokumen '),
(1288, 2, 'Proses Dokumen', '2017-03-27', '09:05:00', 'Memproses Dokumen '),
(1289, 2, 'Proses Dokumen', '2017-03-27', '09:05:32', 'Memproses Dokumen '),
(1290, 2, 'Proses Dokumen', '2017-03-27', '09:05:57', 'Memproses Dokumen '),
(1291, 2, 'Proses Dokumen', '2017-03-27', '09:06:58', 'Memproses Dokumen '),
(1292, 2, 'Proses Dokumen', '2017-03-27', '09:07:12', 'Memproses Dokumen '),
(1293, 2, 'Proses Dokumen', '2017-03-27', '09:07:26', 'Memproses Dokumen '),
(1294, 2, 'Proses Dokumen', '2017-03-27', '09:07:45', 'Memproses Dokumen '),
(1295, 2, 'Proses Dokumen', '2017-03-27', '09:08:14', 'Memproses Dokumen '),
(1296, 2, 'Proses Dokumen', '2017-03-27', '09:08:35', 'Memproses Dokumen '),
(1297, 2, 'Proses Dokumen', '2017-03-27', '09:08:52', 'Memproses Dokumen '),
(1298, 2, 'Proses Dokumen', '2017-03-27', '09:09:08', 'Memproses Dokumen '),
(1299, 2, 'Proses Dokumen', '2017-03-27', '09:09:34', 'Memproses Dokumen '),
(1300, 2, 'Proses Dokumen', '2017-03-27', '09:09:51', 'Memproses Dokumen '),
(1301, 2, 'Proses Dokumen', '2017-03-27', '09:10:05', 'Memproses Dokumen '),
(1302, 2, 'Proses Dokumen', '2017-03-27', '09:10:27', 'Memproses Dokumen '),
(1303, 2, 'Proses Dokumen', '2017-03-27', '09:10:43', 'Memproses Dokumen '),
(1304, 2, 'Proses Dokumen', '2017-03-27', '09:10:58', 'Memproses Dokumen '),
(1305, 2, 'Input Register Aset', '2017-03-27', '09:14:21', 'Register Aset '),
(1306, 2, 'Input Register Aset', '2017-03-27', '09:14:42', 'Register Aset '),
(1307, 2, 'Proses Dokumen', '2017-03-27', '09:17:41', 'Memproses Dokumen '),
(1308, 2, 'Hapus Aset', '2017-03-27', '09:18:57', 'Hapus Aset UIN RF Infokus pada '),
(1309, 2, 'Proses Dokumen', '2017-03-27', '09:19:22', 'Memproses Dokumen '),
(1310, 2, 'Edit Barang', '2017-03-27', '09:25:42', 'Edit Barang 3'),
(1311, 2, 'Logout', '2017-03-27', '09:34:57', 'Logout Sistem'),
(1312, 4, 'Login', '2017-03-27', '09:35:04', 'Login Sistem'),
(1313, 4, 'Logout', '2017-03-27', '09:35:23', 'Logout Sistem'),
(1314, 6, 'Login', '2017-03-27', '09:35:26', 'Login Sistem'),
(1315, 6, 'Disposisi Dokumen', '2017-03-27', '09:35:43', 'Disposisi Dokumen  Ke Kabagumum'),
(1316, 6, 'Disposisi Dokumen', '2017-03-27', '09:35:54', 'Disposisi Dokumen  Ke Kabagumum'),
(1317, 6, 'Logout', '2017-03-27', '09:35:57', 'Logout Sistem'),
(1318, 8, 'Login', '2017-03-27', '09:36:02', 'Login Sistem'),
(1319, 8, 'Disposisi Dokumen', '2017-03-27', '09:36:17', 'Disposisi Dokumen  Ke BMN'),
(1320, 8, 'Disposisi Dokumen', '2017-03-27', '09:36:28', 'Disposisi Dokumen  Ke BMN'),
(1321, 8, 'Logout', '2017-03-27', '09:36:32', 'Logout Sistem'),
(1322, 2, 'Login', '2017-03-27', '09:36:36', 'Login Sistem'),
(1323, 2, 'Input Barang', '2017-03-27', '09:37:12', 'Tambah Barang 12'),
(1324, 2, 'Proses Dokumen', '2017-03-27', '09:39:11', 'Memproses Dokumen '),
(1325, 2, 'Input Register Aset', '2017-03-27', '09:40:16', 'Register Aset '),
(1326, 2, 'Proses Dokumen', '2017-03-27', '09:50:57', 'Memproses Dokumen '),
(1327, 2, 'Logout', '2017-03-27', '09:58:25', 'Logout Sistem'),
(1328, 6, 'Login', '2017-03-27', '09:58:27', 'Login Sistem'),
(1329, 6, 'Logout', '2017-03-27', '10:01:32', 'Logout Sistem'),
(1330, 2, 'Login', '2017-03-27', '10:01:36', 'Login Sistem'),
(1331, 2, 'Edit Lokasi Aset', '2017-03-27', '10:02:21', 'Edit Lokasi Aset '),
(1332, 2, 'Logout', '2017-03-27', '10:02:53', 'Logout Sistem'),
(1333, 6, 'Login', '2017-03-27', '10:02:56', 'Login Sistem'),
(1334, 6, 'Logout', '2017-03-27', '10:03:33', 'Logout Sistem'),
(1335, 2, 'Login', '2017-03-27', '10:11:53', 'Login Sistem'),
(1336, 2, 'Edit Kondisi Aset', '2017-03-27', '10:12:54', 'Edit Kondisi Aset Infokus ke Baik'),
(1337, 2, 'Login', '2017-03-27', '10:14:12', 'Login Sistem'),
(1338, 2, 'Logout', '2017-03-27', '10:20:50', 'Logout Sistem'),
(1339, 6, 'Login', '2017-03-27', '10:20:55', 'Login Sistem'),
(1340, 2, 'Logout', '2017-03-27', '10:28:02', 'Logout Sistem'),
(1341, 6, 'Login', '2017-03-27', '10:28:05', 'Login Sistem'),
(1342, 6, 'Logout', '2017-03-27', '10:28:14', 'Logout Sistem'),
(1343, 3, 'Login', '2017-03-27', '10:28:18', 'Login Sistem'),
(1344, 3, 'Logout', '2017-03-27', '10:28:41', 'Logout Sistem'),
(1345, 1, 'Login', '2017-03-27', '10:28:44', 'Login Sistem'),
(1346, 1, 'Logout', '2017-03-27', '10:30:12', 'Logout Sistem'),
(1347, 2, 'Login', '2017-03-27', '10:30:16', 'Login Sistem'),
(1348, 2, 'Login', '2017-03-28', '04:15:52', 'Login Sistem'),
(1349, 2, 'Logout', '2017-03-28', '06:06:39', 'Logout Sistem'),
(1350, 3, 'Login', '2017-03-28', '06:10:14', 'Login Sistem'),
(1351, 3, 'Logout', '2017-03-28', '06:38:14', 'Logout Sistem'),
(1352, 4, 'Login', '2017-03-28', '06:40:31', 'Login Sistem'),
(1353, 4, 'Logout', '2017-03-28', '06:44:48', 'Logout Sistem'),
(1354, 8, 'Login', '2017-03-28', '10:47:25', 'Login Sistem'),
(1355, 8, 'Logout', '2017-03-28', '11:33:33', 'Logout Sistem'),
(1356, 2, 'Login', '2017-03-28', '11:33:37', 'Login Sistem'),
(1357, 2, 'Logout', '2017-03-28', '12:07:39', 'Logout Sistem'),
(1358, 3, 'Login', '2017-03-28', '12:07:42', 'Login Sistem'),
(1359, 3, 'Logout', '2017-03-28', '12:42:16', 'Logout Sistem'),
(1360, 6, 'Login', '2017-03-28', '12:42:19', 'Login Sistem'),
(1361, 6, 'Logout', '2017-03-28', '12:43:38', 'Logout Sistem'),
(1362, 1, 'Login', '2017-03-28', '12:43:43', 'Login Sistem'),
(1363, 1, 'Logout', '2017-03-28', '12:46:08', 'Logout Sistem'),
(1364, 2, 'Login', '2017-03-28', '12:46:12', 'Login Sistem'),
(1365, 2, 'Logout', '2017-03-28', '12:47:54', 'Logout Sistem'),
(1366, 1, 'Login', '2017-03-28', '12:47:58', 'Login Sistem'),
(1367, 1, 'Login', '2017-03-28', '14:58:01', 'Login Sistem'),
(1368, 1, 'Logout', '2017-03-28', '15:40:48', 'Logout Sistem'),
(1369, 2, 'Login', '2017-03-28', '15:40:52', 'Login Sistem'),
(1370, 2, 'Logout', '2017-03-28', '15:52:45', 'Logout Sistem'),
(1371, 4, 'Login', '2017-03-28', '15:52:49', 'Login Sistem'),
(1372, 4, 'Logout', '2017-03-28', '15:53:07', 'Logout Sistem'),
(1373, 6, 'Login', '2017-03-28', '15:53:11', 'Login Sistem'),
(1374, 6, 'Logout', '2017-03-28', '15:56:49', 'Logout Sistem'),
(1375, 8, 'Login', '2017-03-28', '15:56:54', 'Login Sistem'),
(1376, 8, 'Logout', '2017-03-28', '15:57:31', 'Logout Sistem'),
(1377, 3, 'Login', '2017-03-28', '15:57:34', 'Login Sistem'),
(1378, 3, 'Logout', '2017-03-28', '15:58:14', 'Logout Sistem'),
(1379, 1, 'Login', '2017-03-28', '15:58:18', 'Login Sistem'),
(1380, 1, 'Logout', '2017-03-28', '15:58:32', 'Logout Sistem'),
(1381, 2, 'Login', '2017-03-28', '16:00:10', 'Login Sistem'),
(1382, 6, 'Login', '2017-03-28', '16:10:20', 'Login Sistem'),
(1383, 1, 'Login', '2017-03-29', '07:52:49', 'Login Sistem'),
(1384, 1, 'Input User', '2017-03-29', '07:53:20', 'Tambah User Dakwah ke dalam Sistem'),
(1385, 1, 'Logout', '2017-03-29', '07:53:25', 'Logout Sistem'),
(1386, 9, 'Login', '2017-03-29', '07:53:30', 'Login Sistem'),
(1387, 9, 'Logout', '2017-03-29', '07:54:19', 'Logout Sistem'),
(1388, 1, 'Login', '2017-03-29', '07:54:24', 'Login Sistem'),
(1389, 1, 'Input User', '2017-03-29', '07:54:51', 'Tambah User Tarbiyah ke dalam Sistem'),
(1390, 1, 'Logout', '2017-03-29', '07:55:05', 'Logout Sistem'),
(1391, 10, 'Login', '2017-03-29', '07:55:11', 'Login Sistem'),
(1392, 10, 'Logout', '2017-03-29', '07:55:41', 'Logout Sistem'),
(1393, 4, 'Login', '2017-03-29', '10:42:23', 'Login Sistem'),
(1394, 4, 'Logout', '2017-03-29', '10:42:35', 'Logout Sistem'),
(1395, 6, 'Login', '2017-03-29', '10:42:38', 'Login Sistem'),
(1396, 6, 'Logout', '2017-03-29', '10:42:45', 'Logout Sistem'),
(1397, 8, 'Login', '2017-03-29', '10:42:50', 'Login Sistem'),
(1398, 8, 'Logout', '2017-03-29', '10:42:58', 'Logout Sistem'),
(1399, 9, 'Login', '2017-03-29', '10:43:07', 'Login Sistem'),
(1400, 9, 'Input Permohonan', '2017-03-29', '10:43:44', 'Tambah Permohonan Pengadaan Komputer'),
(1401, 9, 'Input Permohonan', '2017-03-29', '10:44:01', 'Tambah Permohonan Pengadaan Dispenser'),
(1402, 9, 'Input Permohonan', '2017-03-29', '10:44:28', 'Tambah Permohonan Pengadaan DVD Player'),
(1403, 9, 'Input Permohonan', '2017-03-29', '10:44:54', 'Tambah Permohonan Pemindahan AC'),
(1404, 9, 'Input Permohonan', '2017-03-29', '10:47:09', 'Tambah Permohonan Perbaikan Dispenser Rusak'),
(1405, 9, 'Input Permohonan', '2017-03-29', '10:47:39', 'Tambah Permohonan Perbaikan Penghancur Kertas'),
(1406, 9, 'Logout', '2017-03-29', '10:47:47', 'Logout Sistem'),
(1407, 4, 'Login', '2017-03-29', '10:47:51', 'Login Sistem'),
(1408, 4, 'Disposisi Dokumen', '2017-03-29', '10:48:06', 'Disposisi Dokumen  ke Rektor'),
(1409, 4, 'Disposisi Dokumen', '2017-03-29', '10:48:19', 'Disposisi Dokumen  ke Rektor'),
(1410, 4, 'Disposisi Dokumen', '2017-03-29', '10:48:32', 'Disposisi Dokumen  ke Rektor'),
(1411, 4, 'Disposisi Dokumen', '2017-03-29', '10:48:43', 'Disposisi Dokumen  ke Rektor'),
(1412, 4, 'Logout', '2017-03-29', '10:48:48', 'Logout Sistem'),
(1413, 6, 'Login', '2017-03-29', '10:48:52', 'Login Sistem');
INSERT INTO `rf_aset_histori_sistem` (`ID_Histori`, `ID_Akun`, `Judul_Histori`, `Tanggal_Histori`, `Waktu_Histori`, `Deskripsi_Histori`) VALUES
(1414, 6, 'Disposisi Dokumen', '2017-03-29', '10:49:05', 'Disposisi Dokumen  Ke Kabagumum'),
(1415, 6, 'Disposisi Dokumen', '2017-03-29', '10:49:17', 'Disposisi Dokumen  Ke Kabagumum'),
(1416, 6, 'Disposisi Dokumen', '2017-03-29', '10:49:26', 'Disposisi Dokumen  Ke Kabagumum'),
(1417, 6, 'Disposisi Dokumen', '2017-03-29', '10:49:36', 'Disposisi Dokumen  Ke Kabagumum'),
(1418, 6, 'Logout', '2017-03-29', '10:49:41', 'Logout Sistem'),
(1419, 8, 'Login', '2017-03-29', '10:49:45', 'Login Sistem'),
(1420, 8, 'Disposisi Dokumen', '2017-03-29', '10:50:10', 'Disposisi Dokumen  Ke BMN'),
(1421, 8, 'Logout', '2017-03-29', '10:50:20', 'Logout Sistem'),
(1422, 2, 'Login', '2017-03-29', '10:50:22', 'Login Sistem'),
(1423, 2, 'Logout', '2017-03-29', '10:50:33', 'Logout Sistem'),
(1424, 4, 'Login', '2017-03-29', '10:50:38', 'Login Sistem'),
(1425, 4, 'Logout', '2017-03-29', '10:50:46', 'Logout Sistem'),
(1426, 10, 'Login', '2017-03-29', '10:50:49', 'Login Sistem'),
(1427, 10, 'Input Permohonan', '2017-03-29', '10:51:03', 'Tambah Permohonan Pengadaan DVD Player'),
(1428, 10, 'Input Permohonan', '2017-03-29', '10:51:18', 'Tambah Permohonan Pengadaan Komputer'),
(1429, 10, 'Input Permohonan', '2017-03-29', '10:51:54', 'Tambah Permohonan Perbaikan Infokus Rusak'),
(1430, 10, 'Logout', '2017-03-29', '10:52:05', 'Logout Sistem'),
(1431, 4, 'Login', '2017-03-29', '10:52:08', 'Login Sistem'),
(1432, 4, 'Disposisi Dokumen', '2017-03-29', '10:52:23', 'Disposisi Dokumen  ke Rektor'),
(1433, 4, 'Disposisi Dokumen', '2017-03-29', '10:52:33', 'Disposisi Dokumen  ke Rektor'),
(1434, 4, 'Disposisi Dokumen', '2017-03-29', '10:52:47', 'Disposisi Dokumen  ke Rektor'),
(1435, 4, 'Logout', '2017-03-29', '10:52:50', 'Logout Sistem'),
(1436, 6, 'Login', '2017-03-29', '10:52:53', 'Login Sistem'),
(1437, 6, 'Disposisi Dokumen', '2017-03-29', '10:53:07', 'Disposisi Dokumen  Ke Kabagumum'),
(1438, 6, 'Logout', '2017-03-29', '10:53:12', 'Logout Sistem'),
(1439, 8, 'Login', '2017-03-29', '10:53:15', 'Login Sistem'),
(1440, 8, 'Logout', '2017-03-29', '10:53:38', 'Logout Sistem'),
(1441, 2, 'Login', '2017-03-29', '10:53:43', 'Login Sistem'),
(1442, 2, 'Logout', '2017-03-29', '10:57:21', 'Logout Sistem'),
(1443, 4, 'Login', '2017-03-29', '10:57:24', 'Login Sistem'),
(1444, 4, 'Logout', '2017-03-29', '10:58:15', 'Logout Sistem'),
(1445, 6, 'Login', '2017-03-29', '10:58:18', 'Login Sistem'),
(1446, 6, 'Logout', '2017-03-29', '10:59:01', 'Logout Sistem'),
(1447, 8, 'Login', '2017-03-29', '10:59:05', 'Login Sistem'),
(1448, 8, 'Logout', '2017-03-29', '10:59:53', 'Logout Sistem'),
(1449, 2, 'Login', '2017-03-29', '10:59:56', 'Login Sistem'),
(1450, 2, 'Logout', '2017-03-29', '11:00:04', 'Logout Sistem'),
(1451, 3, 'Login', '2017-03-29', '11:00:06', 'Login Sistem'),
(1452, 3, 'Logout', '2017-03-29', '11:02:39', 'Logout Sistem'),
(1453, 1, 'Login', '2017-03-29', '11:02:42', 'Login Sistem'),
(1454, 2, 'Login', '2017-03-29', '16:40:02', 'Login Sistem'),
(1455, 2, 'Login', '2017-03-29', '17:53:07', 'Login Sistem'),
(1456, 8, 'Login', '2017-03-30', '03:49:41', 'Login Sistem'),
(1457, 8, 'Disposisi Dokumen', '2017-03-30', '03:50:47', 'Disposisi Dokumen  Ke BMN'),
(1458, 8, 'Disposisi Dokumen', '2017-03-30', '03:54:28', 'Disposisi Dokumen  Ke BMN'),
(1459, 2, 'Login', '2017-03-30', '05:30:18', 'Login Sistem'),
(1460, 2, 'Logout', '2017-03-30', '05:32:45', 'Logout Sistem'),
(1461, 2, 'Login', '2017-03-30', '05:32:50', 'Login Sistem'),
(1462, 2, 'Logout', '2017-03-30', '05:33:08', 'Logout Sistem'),
(1463, 2, 'Login', '2017-03-30', '05:33:19', 'Login Sistem'),
(1464, 2, 'Input Unit Kerja', '2017-03-30', '05:34:37', 'Tambah Unit Kerja Kedokteran'),
(1465, 2, 'Input Unit Kerja', '2017-03-30', '05:34:59', 'Tambah Unit Kerja Kedokteran1'),
(1466, 2, 'Delete Unit Kerja', '2017-03-30', '05:35:10', 'Hapus Unit Kerja > Kedokteran1'),
(1467, 2, 'Input Kategori Barang', '2017-03-30', '05:35:53', 'Tambah Kategori Barang Tester'),
(1468, 2, 'Edit Kategori Barang', '2017-03-30', '05:36:07', 'Edit Kategori Barang Tester1'),
(1469, 2, 'Delete Kategori Barang', '2017-03-30', '05:36:13', 'Hapus Kategori Barang > Tester1'),
(1470, 2, 'Delete Kategori Barang', '2017-03-30', '05:36:13', 'Hapus Kategori Barang 5'),
(1471, 2, 'Input Tipe Barang', '2017-03-30', '05:37:17', 'Tambah Tipe Barang Tester'),
(1472, 2, 'Input Barang', '2017-03-30', '05:42:25', 'Tambah Barang 2'),
(1473, 2, 'Input Register Aset', '2017-03-30', '05:43:25', 'Register Aset '),
(1474, 2, 'Edit Lokasi Aset', '2017-03-30', '05:47:12', 'Edit Lokasi Aset '),
(1475, 2, 'Edit Kondisi Aset', '2017-03-30', '05:48:15', 'Edit Kondisi Aset Infokus ke Dalam Perbaikan'),
(1476, 2, 'Edit Kondisi Aset', '2017-03-30', '05:48:38', 'Edit Kondisi Aset Infokus ke Baik'),
(1477, 2, 'Logout', '2017-03-30', '05:50:25', 'Logout Sistem'),
(1478, 6, 'Login', '2017-03-30', '05:50:29', 'Login Sistem'),
(1479, 6, 'Logout', '2017-03-30', '05:50:59', 'Logout Sistem'),
(1480, 2, 'Login', '2017-03-30', '05:51:04', 'Login Sistem'),
(1481, 2, 'Proses Dokumen', '2017-03-30', '05:52:20', 'Memproses Dokumen '),
(1482, 2, 'Logout', '2017-03-30', '05:53:31', 'Logout Sistem'),
(1483, 8, 'Login', '2017-03-30', '05:53:39', 'Login Sistem'),
(1484, 2, 'Login', '2017-03-30', '11:20:27', 'Login Sistem'),
(1485, 2, 'Logout', '2017-03-30', '11:31:48', 'Logout Sistem'),
(1486, 6, 'Login', '2017-03-30', '11:31:52', 'Login Sistem'),
(1487, 1, 'Login', '2017-03-30', '11:49:00', 'Login Sistem'),
(1488, 1, 'Logout', '2017-03-30', '12:03:32', 'Logout Sistem'),
(1489, 2, 'Login', '2017-03-30', '12:03:36', 'Login Sistem'),
(1490, 2, 'Logout', '2017-03-30', '12:21:42', 'Logout Sistem'),
(1491, 3, 'Login', '2017-03-30', '12:21:45', 'Login Sistem'),
(1492, 3, 'Logout', '2017-03-30', '12:28:30', 'Logout Sistem'),
(1493, 2, 'Login', '2017-03-30', '12:28:34', 'Login Sistem'),
(1494, 2, 'Login', '2017-03-30', '13:06:46', 'Login Sistem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_jenis_doc`
--

CREATE TABLE IF NOT EXISTS `rf_aset_jenis_doc` (
  `ID_Jenis_Doc` int(2) NOT NULL,
  `Deskripsi_Doc` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_jenis_doc`
--

INSERT INTO `rf_aset_jenis_doc` (`ID_Jenis_Doc`, `Deskripsi_Doc`) VALUES
(1, 'Permohonan Aset Baru'),
(2, 'Permohonan Perbaikan Aset'),
(3, 'Permohonan Penghapusan Aset'),
(4, 'Permohonan Pemindahan Aset');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_kategori`
--

CREATE TABLE IF NOT EXISTS `rf_aset_kategori` (
  `ID_Kategori` int(5) NOT NULL,
  `Nama_Kategori` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_kategori`
--

INSERT INTO `rf_aset_kategori` (`ID_Kategori`, `Nama_Kategori`) VALUES
(1, 'ATK'),
(2, 'Komputer'),
(3, 'Kamera'),
(4, 'Perlengkapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_kondisi`
--

CREATE TABLE IF NOT EXISTS `rf_aset_kondisi` (
  `ID_Kondisi` int(2) NOT NULL,
  `Nama_Kondisi` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_kondisi`
--

INSERT INTO `rf_aset_kondisi` (`ID_Kondisi`, `Nama_Kondisi`) VALUES
(1, 'Baik'),
(2, 'Rusak'),
(3, 'Dalam Perbaikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_level`
--

CREATE TABLE IF NOT EXISTS `rf_aset_level` (
  `ID_Level` int(3) NOT NULL,
  `Inisial_Level` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_level`
--

INSERT INTO `rf_aset_level` (`ID_Level`, `Inisial_Level`) VALUES
(1, 'Super'),
(2, 'Administrator'),
(3, 'TU Fakultas / Unit Kerja'),
(4, 'TU Rektorat'),
(6, 'Kabag Umum Rektorat'),
(8, 'Rektor UIN RF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_menu`
--

CREATE TABLE IF NOT EXISTS `rf_aset_menu` (
  `ID_Menu` int(3) NOT NULL,
  `Judul_Menu` varchar(25) NOT NULL,
  `Link` varchar(50) DEFAULT NULL,
  `Modul` varchar(50) DEFAULT NULL,
  `Icon` varchar(20) DEFAULT NULL,
  `Level` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_menu`
--

INSERT INTO `rf_aset_menu` (`ID_Menu`, `Judul_Menu`, `Link`, `Modul`, `Icon`, `Level`) VALUES
(1, 'Administrator', '#', NULL, 'fa-cog', '0'),
(2, 'Data Master', '#', NULL, 'fa-archive', '1'),
(3, 'Inventaris', '#', NULL, 'fa-tasks', '1'),
(4, 'Dokumen Rektorat', '#', NULL, ' fa-newspaper-o', '2'),
(5, 'Dokumen Unit Kerja', '#', NULL, ' fa-newspaper-o', '3'),
(6, 'Laporan', '#', NULL, 'fa-print', '2'),
(7, 'Histori', '#', NULL, 'fa-history', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_menu_sub`
--

CREATE TABLE IF NOT EXISTS `rf_aset_menu_sub` (
  `ID_Sub_Menu` int(3) NOT NULL,
  `ID_Menu` int(3) NOT NULL,
  `Judul_Sub` varchar(25) NOT NULL,
  `Icon_Sub` varchar(20) NOT NULL,
  `Link_Sub` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_menu_sub`
--

INSERT INTO `rf_aset_menu_sub` (`ID_Sub_Menu`, `ID_Menu`, `Judul_Sub`, `Icon_Sub`, `Link_Sub`) VALUES
(1, 0, 'Modul', 'fa-credit-card', 'modul'),
(2, 1, 'Pengguna', ' fa-users', 'user'),
(3, 2, 'Unit Kerja', ' fa-institution', 'unit_kerja'),
(6, 2, 'Kategori Barang', 'fa-hdd-o', 'kategori_barang'),
(7, 2, 'Barang', 'fa-hdd-o', 'barang_tipe'),
(8, 1, 'Pejabat', 'fa-user', 'pejabat'),
(9, 5, 'Permohonan Aset', 'fa-newspaper-o', 'doc_baru_kep'),
(10, 4, 'Permohonan Aset', 'fa-newspaper-o', 'doc_baru'),
(13, 5, 'Perbaikan Aset', 'fa-newspaper-o', 'doc_lapor'),
(15, 7, 'Histori Sistem', 'fa-history', 'histori'),
(18, 6, 'Keadaan Aset', 'fa-print', 'lap_kondisi'),
(19, 6, 'Permohonan Aset', 'fa-print', 'lap_pengajuan'),
(21, 3, 'Register Aset', 'fa-tasks', 'reg_aset'),
(23, 3, 'Data Aset', 'fa-tasks', 'daf_aset'),
(24, 2, 'Aset', 'fa-hdd-o', 'barang'),
(25, 3, 'Pemindahan Aset', 'fa fa-tasks', 'pindah_aset'),
(26, 3, 'Perbaikan Aset', 'fa fa-tasks', 'perbaikan_aset'),
(27, 3, 'Penghapusan Aset', 'fa fa-tasks', 'hapus_aset'),
(28, 5, 'Data Aset', 'fa-newspaper-o', 'data-aset'),
(29, 6, 'Kuwitansi', 'fa-file', 'data-kwi'),
(30, 6, 'Pemindahan Aset', 'fa-file-text-o', 'lap_pindah'),
(31, 6, 'Penghapusan Aset', 'fa-file-text-o', 'lap_hapus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_pejabat`
--

CREATE TABLE IF NOT EXISTS `rf_aset_pejabat` (
  `ID_Pejabat` int(3) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `Nama_Pejabat` varchar(40) NOT NULL,
  `Gol_Pejabat` varchar(20) NOT NULL,
  `Jabatan_Pejabat` varchar(40) NOT NULL,
  `Status_Pejabat` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_pejabat`
--

INSERT INTO `rf_aset_pejabat` (`ID_Pejabat`, `NIP`, `Nama_Pejabat`, `Gol_Pejabat`, `Jabatan_Pejabat`, `Status_Pejabat`) VALUES
(1, '196612311909031022', 'Zurmawan, S.Ag, M.Hum', 'IV A', 'Kasubag BMN', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_perbaikan`
--

CREATE TABLE IF NOT EXISTS `rf_aset_perbaikan` (
  `ID_Perbaikan` int(5) NOT NULL,
  `ID_Doc` int(5) NOT NULL,
  `Tahun` year(4) NOT NULL,
  `Kwitansi_Perbaikan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_perbaikan`
--

INSERT INTO `rf_aset_perbaikan` (`ID_Perbaikan`, `ID_Doc`, `Tahun`, `Kwitansi_Perbaikan`) VALUES
(1, 18, 2017, '1201703301490845718.pdf'),
(2, 19, 2017, ''),
(3, 38, 2017, ''),
(4, 39, 2017, ''),
(5, 42, 2017, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_pergerakan`
--

CREATE TABLE IF NOT EXISTS `rf_aset_pergerakan` (
  `ID_Pergerakan` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `ID_Unit_Lama` int(3) NOT NULL,
  `ID_Unit_Baru` int(3) NOT NULL,
  `ID_Doc` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_pergerakan`
--

INSERT INTO `rf_aset_pergerakan` (`ID_Pergerakan`, `id`, `ID_Unit_Lama`, `ID_Unit_Baru`, `ID_Doc`) VALUES
(1, 9, 9, 13, 2),
(2, 10, 9, 13, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_status_doc`
--

CREATE TABLE IF NOT EXISTS `rf_aset_status_doc` (
  `ID_Status_Doc` int(2) NOT NULL,
  `ID_Level` int(3) NOT NULL,
  `Deskripsi_Status_Doc` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_status_doc`
--

INSERT INTO `rf_aset_status_doc` (`ID_Status_Doc`, `ID_Level`, `Deskripsi_Status_Doc`) VALUES
(1, 5, 'Disposisi Ke Dekan'),
(2, 7, 'Acc Dekan'),
(3, 3, 'Pengajuan Ke Rektorat'),
(4, 4, 'Disposisi Ke Rektor'),
(5, 8, 'Acc Rektor'),
(6, 6, 'Disposisi BMN'),
(7, 2, 'Proses Pengadaan'),
(8, 2, 'Proses Perbaikan'),
(9, 2, 'Proses Pemindahan'),
(10, 8, 'Penolakan Rektor'),
(11, 7, 'Penolakan Dekan'),
(12, 2, 'Telah Di Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_aset_unit`
--

CREATE TABLE IF NOT EXISTS `rf_aset_unit` (
  `ID_Unit` int(3) NOT NULL,
  `Nama_Unit` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_aset_unit`
--

INSERT INTO `rf_aset_unit` (`ID_Unit`, `Nama_Unit`) VALUES
(1, 'Rektorat'),
(2, 'BAAK'),
(3, 'PUSTIPD'),
(4, 'LPM'),
(5, 'LPPM'),
(6, 'Perpustakaan'),
(7, 'Fakultas Syariah dan Hukum'),
(8, 'Fakultas Ushuluddin dan Pemikiran Islam'),
(9, 'Fakultas Tarbiyah dan Keguruan'),
(10, 'Fakultas Adab dan Humaniora'),
(11, 'Fakultas Dakwah dan Komunikasi'),
(12, 'Fakultas Ekonomi dan Bisnis Islam'),
(13, 'Fakultas Sains dan Teknologi'),
(14, 'Fakultas Ilmu Sosisal dan Ilmu Politik'),
(15, 'Fakultas Psikologi'),
(16, 'Pascasarjana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rf_aset_akun`
--
ALTER TABLE `rf_aset_akun`
  ADD PRIMARY KEY (`ID_Akun`);

--
-- Indexes for table `rf_aset_barang`
--
ALTER TABLE `rf_aset_barang`
  ADD PRIMARY KEY (`ID_Barang`);

--
-- Indexes for table `rf_aset_barang_detail`
--
ALTER TABLE `rf_aset_barang_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rf_aset_barang_tipe`
--
ALTER TABLE `rf_aset_barang_tipe`
  ADD PRIMARY KEY (`ID_Tipe`);

--
-- Indexes for table `rf_aset_doc`
--
ALTER TABLE `rf_aset_doc`
  ADD PRIMARY KEY (`ID_Doc`);

--
-- Indexes for table `rf_aset_histori_sistem`
--
ALTER TABLE `rf_aset_histori_sistem`
  ADD PRIMARY KEY (`ID_Histori`);

--
-- Indexes for table `rf_aset_jenis_doc`
--
ALTER TABLE `rf_aset_jenis_doc`
  ADD PRIMARY KEY (`ID_Jenis_Doc`);

--
-- Indexes for table `rf_aset_kategori`
--
ALTER TABLE `rf_aset_kategori`
  ADD PRIMARY KEY (`ID_Kategori`);

--
-- Indexes for table `rf_aset_kondisi`
--
ALTER TABLE `rf_aset_kondisi`
  ADD PRIMARY KEY (`ID_Kondisi`);

--
-- Indexes for table `rf_aset_level`
--
ALTER TABLE `rf_aset_level`
  ADD PRIMARY KEY (`ID_Level`);

--
-- Indexes for table `rf_aset_menu`
--
ALTER TABLE `rf_aset_menu`
  ADD PRIMARY KEY (`ID_Menu`);

--
-- Indexes for table `rf_aset_menu_sub`
--
ALTER TABLE `rf_aset_menu_sub`
  ADD PRIMARY KEY (`ID_Sub_Menu`);

--
-- Indexes for table `rf_aset_pejabat`
--
ALTER TABLE `rf_aset_pejabat`
  ADD PRIMARY KEY (`ID_Pejabat`);

--
-- Indexes for table `rf_aset_perbaikan`
--
ALTER TABLE `rf_aset_perbaikan`
  ADD PRIMARY KEY (`ID_Perbaikan`);

--
-- Indexes for table `rf_aset_pergerakan`
--
ALTER TABLE `rf_aset_pergerakan`
  ADD PRIMARY KEY (`ID_Pergerakan`);

--
-- Indexes for table `rf_aset_status_doc`
--
ALTER TABLE `rf_aset_status_doc`
  ADD PRIMARY KEY (`ID_Status_Doc`);

--
-- Indexes for table `rf_aset_unit`
--
ALTER TABLE `rf_aset_unit`
  ADD PRIMARY KEY (`ID_Unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rf_aset_akun`
--
ALTER TABLE `rf_aset_akun`
  MODIFY `ID_Akun` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rf_aset_barang`
--
ALTER TABLE `rf_aset_barang`
  MODIFY `ID_Barang` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `rf_aset_barang_detail`
--
ALTER TABLE `rf_aset_barang_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `rf_aset_barang_tipe`
--
ALTER TABLE `rf_aset_barang_tipe`
  MODIFY `ID_Tipe` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rf_aset_doc`
--
ALTER TABLE `rf_aset_doc`
  MODIFY `ID_Doc` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `rf_aset_histori_sistem`
--
ALTER TABLE `rf_aset_histori_sistem`
  MODIFY `ID_Histori` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1495;
--
-- AUTO_INCREMENT for table `rf_aset_jenis_doc`
--
ALTER TABLE `rf_aset_jenis_doc`
  MODIFY `ID_Jenis_Doc` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rf_aset_kategori`
--
ALTER TABLE `rf_aset_kategori`
  MODIFY `ID_Kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rf_aset_kondisi`
--
ALTER TABLE `rf_aset_kondisi`
  MODIFY `ID_Kondisi` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rf_aset_level`
--
ALTER TABLE `rf_aset_level`
  MODIFY `ID_Level` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rf_aset_menu`
--
ALTER TABLE `rf_aset_menu`
  MODIFY `ID_Menu` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rf_aset_menu_sub`
--
ALTER TABLE `rf_aset_menu_sub`
  MODIFY `ID_Sub_Menu` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `rf_aset_pejabat`
--
ALTER TABLE `rf_aset_pejabat`
  MODIFY `ID_Pejabat` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rf_aset_perbaikan`
--
ALTER TABLE `rf_aset_perbaikan`
  MODIFY `ID_Perbaikan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rf_aset_pergerakan`
--
ALTER TABLE `rf_aset_pergerakan`
  MODIFY `ID_Pergerakan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rf_aset_status_doc`
--
ALTER TABLE `rf_aset_status_doc`
  MODIFY `ID_Status_Doc` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rf_aset_unit`
--
ALTER TABLE `rf_aset_unit`
  MODIFY `ID_Unit` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
