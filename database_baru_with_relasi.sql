-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 05:41 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_printer`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

DROP TABLE IF EXISTS `gejala`;
CREATE TABLE IF NOT EXISTS `gejala` (
  `id` int(11) NOT NULL,
  `gejala` varchar(255) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `gejala`, `kode`, `bobot`) VALUES
(154, 'Kabel data kemungkinan rusak atau sering terlipat sehingga patah', 'G1', 2),
(155, 'Ruang gerak laser scanner tidak optimal', 'G2', 2),
(156, 'Roda gear haus (kering)', 'G3', 6),
(157, 'Kaca scanner reat akibatnya hasil kurang optimal', 'G4', 4),
(158, 'Lampu laser scanner tidak terang', 'G5', 4),
(159, 'Kemungkinan tinta didalam catridge sudah kental', 'G6', 2),
(160, 'Hasil cetakan bergaris-garis', 'G7', 4),
(161, 'Kemungkinan fius F1 dan F2 pada mainboard terputus/korslet', 'G8', 2),
(162, 'ASF unit tidak berputar dengan baik', 'G9', 2),
(163, 'Dynamo motor tidak berfungsi dengan baik', 'G10', 2),
(164, 'Unit mainboard kemungkinan bermasalah', 'G11', 2),
(165, 'Pada saat mencetak kertas tiba-tiba miring', 'G12', 2),
(166, 'Karet ASSY licin', 'G13', 2),
(167, 'ASF ASSY kemungkinan bermasalah pada kancingan roll', 'G14', 4),
(168, 'Chip catridge sudah mulai berbekas', 'G15', 6),
(169, 'Kemungkinan line feed bermasalah', 'G16', 2),
(170, 'Laser infared sensor kemungkinan kotor', 'G17', 2),
(171, 'Terjadi masalah pada kertas (kertas terlipat)', 'G18', 2),
(172, 'Roll penarik kertas kotor.kondisi roll kurang baik', 'G19', 2),
(173, 'Penutup sensor sudah tidak rapat', 'G20', 2),
(174, 'Kabel data pada sensor bermasalah', 'G21', 2),
(175, 'Kabel data terlepas dari unit printer', 'G22', 2),
(176, 'Driver printer corrupt', 'G23', 2),
(177, 'Encorder kotor terkena cipratan tinta atau lainnya', 'G24', 2),
(178, 'Purge unit/pompa berputar lambat', 'G25', 2),
(179, 'Gear pump assy tidak optimal', 'G26', 2),
(180, 'Rolling ASSY tidak bergerak', 'G27', 2),
(181, 'Dioda logic board kemungkinan terlepas', 'G28', 2),
(182, 'Power supply terbakar/korslet', 'G29', 2),
(183, 'Tidak ada aliran listrik pada terminal listrik', 'G30', 2),
(184, 'Kemungkinan catridge chip error', 'G31', 2),
(185, 'Power supply kemungkinan rusak', 'G32', 2),
(186, 'IC logic board kemungkinan rusak', 'G33', 2),
(187, 'Motor dynamo ASSY hangus', 'G34', 2),
(188, 'Paper feed error', 'G35', 2),
(189, 'Kemungkinan catridge tidak terpasang dengan baik', 'G36', 2),
(190, 'Kemungkinan kabel data sensor bermasalah', 'G37', 2),
(191, 'Kesalahan pemilihan drive saat melakukan print', 'G38', 2),
(192, 'Power print tidak menyala', 'G39', 2),
(193, 'Logic board kemungkinan bermasalah', 'G40', 2),
(194, 'Kabel power listrik kemungkinan bermasalah', 'G41', 2),
(195, 'Tinta printer habis', 'G42', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

DROP TABLE IF EXISTS `kerusakan`;
CREATE TABLE IF NOT EXISTS `kerusakan` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kerusakan` varchar(255) NOT NULL,
  `solusi` varchar(255) NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`id`, `kode`, `kerusakan`, `solusi`, `dokumen`) VALUES
(60, 'K1', 'General Error', 'Sebaiknya bila roda gear sudah aus segera berikan pelumas khusus untuk print Epson', '1.pdf'),
(61, 'K2', 'Scanner Error', 'Sebaiknya scanner jangan dikasih beban diatasnya dan jauhkan dari kelembapan karena apabila scanner basah maka lampu laser terputus dan tempatkan printer pada tempat yang aman', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(62, 'K3', 'Head tersumbat/tinta tidak keluar', 'Untuk mengawetkan head print, maka sebaiknya gunakan tinta yang satu merk saat awal pengisian tinta dan juga supaya head terus bagus sebaiknya gunakan mengeprint 2 kali dalam seminggu supaya tidak tersumbat', '3.pdf'),
(63, 'K4', 'Paper jam', 'Supaya printer tidak sering mengalami paper jam maka gunakan kertas standar sesuai saran pabrikan, untuk mengurangi keausan karet assy', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(64, 'K5', 'Mati total', 'Apabila daerah tempat kita tinggal listriknya tidak stabil dan sering mati lampu sebaiknya gunakan stabilizer atau UPS. Dan untuk lebih amannya lagi cabut kabel power listrik dari terminal setelah menggunakan printer', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(65, 'K6', 'Mainboard rusak', 'Supaya mainboard tidak rusak, usahakan selalu berada pada tempat yang tidak berlembab dan juga pada tegangan listrik yang stabil, suppaya mainboard selalu aman gunakan pengatur tegangan misalnya stabilizer atau UPS', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(66, 'K7', 'The paper output is open', 'usahakan selalu penutup dari printer tertutup dan apabila masih muncul keterangan error maka periksa encorder dan bersihkan', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(67, 'K8', 'ASF sensor error', 'Jika sensor bermasalah banyak kemungkinan terjadi yaitu bisa jadi karena kotor atau karena komponen laser terlepas. Oleh karena itu, sebaiknya periksa satu per satu pertiap komponen sensor untuk di bersihkan.', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(68, 'K9', 'Catridge cannot be recognized', 'jangan sesering mungkin melepas cartridge dari unit printer dan jangan menekan chip pada cartridge dan juga jangan sampai terkena tinta atau cairan lainnya pada chip. Hati-hati saat pengambilan cartridge dari unit printer dan saat pengisian tinta', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(69, 'K10', 'Line feed error', 'jangan kenakan tinta pada line feed dan apabila terkena segera mungkin untuk mengambil tissue untuk membersihkannya dengan menggunakan cairan khusus', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(70, 'K11', 'Cannot print the contens on creative park premium', 'ketika melakukan print perhatikan drivernya apabila driver yang diinstal dalam computer lebih dari satu drive. Set default print supaya mengeprint otomatis dan apabila kerusakan pada logic board maka ganti logic boardnya', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(72, 'K12', 'The machine is not connected with the computer', 'periksa kabel printer dan kabel listrik. Ganti kabel atau power supply', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(73, 'K13', 'Printer malfunction', 'cek assy dan apabila rusak maka ganti dengan yang baru', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(74, 'K14', 'Mechanical printer malfunction', 'gunakan alat untuk menstabilkan tegangan listrik atau ganti power supply', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(75, 'K15', 'Lampu indicator power tinta dan kertas berkedip', 'cobalah mematikan printer beberapa saat dan menyalakannya kembali', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(76, 'K16', 'Driver printer error', 'pastikan driver printer telah terpasang', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(77, 'K17', 'The machine is out of paper does not feed', 'periksa tipe kertas yang digunakan karena tipe kertas berpengaruh besar dalam keausan karet assy. Karena itu, selalu cek standar kertas yang disarankan oleh printer', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(78, 'K18', 'Cannot communicate with the scanner', 'periksa tombol power lalu masuk ke pengaturan printer dan pilih run this program as an administrator', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(79, 'K19', 'Blank page', 'cobalah untuk memeriksa tinta jika sudah kering gantilah dengan tinta yang baru', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(80, 'K20', 'Halaman tidak lengkap', 'pastikan pengaturan halaman pada aplikasi yang digunakan sudah benar', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(81, 'K21', 'Kertas tidak bisa keluar', 'cobalah untuk menarik paksa kertas dari printer', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(82, 'K22', 'Mesin printer mencetak terlalu lambat', 'pastikan untuk tidak menjalankan aplikasi lain yang menggunakan banyak memori', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(83, 'K23', 'Font yang tercetak tidak sama', 'pastikan sudah mengganti font yang digunakan dengan font berjenis “true type font”', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(84, 'K24', 'Peringatan tinta habis', 'cobalah melakukan reset pada cartridge tinta. Dengan melakukan reset juga akan berisi penyusunan awal pada pirantu printer', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(85, 'K25', 'Catridge kotor/head cleaning', 'cobalah melakukan head cleaning terlebih dahulu', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(86, 'K26', 'Printer melampui batas pencetakan', 'cobalah reset printer dengan menggunakan software ressetter', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(87, 'K27', 'Printer tidak bisa menyala/mencetak', 'pastikan sambungan kabel data printer apakah sudah terhubung dengan komputer dengan benar', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(88, 'K28', 'Error B200', 'setelah mengisi tinta usahakan chip cartridge bersih agar kerusakan b200 bisal terselesaikan coba ganti power supply nya', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(89, 'K29', 'Other hardware error', 'gunakan stabilizer atau UPS dengan anti mainboard', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf'),
(90, 'K30', 'Tinta printer kering', 'cobalah untuk melakukan deep cleaning atau mengatasinya secara manual', 'Gmail_-_Konfirmasi_Pendaftaran_LPSE.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

DROP TABLE IF EXISTS `pemeriksaan`;
CREATE TABLE IF NOT EXISTS `pemeriksaan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `kerusakan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id`, `tanggal`, `user_id`, `kerusakan_id`) VALUES
(52, '2019-06-20', 1, 60),
(53, '2019-06-25', 1, 62),
(54, '2019-06-25', 1, 62),
(55, '2019-06-25', 14, 65),
(56, '2019-07-01', 7, 60);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_detail`
--

DROP TABLE IF EXISTS `pemeriksaan_detail`;
CREATE TABLE IF NOT EXISTS `pemeriksaan_detail` (
  `id` int(11) NOT NULL,
  `pemeriksaan_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan_detail`
--

INSERT INTO `pemeriksaan_detail` (`id`, `pemeriksaan_id`, `gejala_id`) VALUES
(215, 52, 163),
(216, 52, 176),
(217, 52, 178),
(218, 52, 189),
(219, 53, 154),
(220, 53, 155),
(221, 53, 156),
(222, 53, 157),
(223, 54, 159),
(224, 54, 160),
(225, 54, 161),
(226, 55, 164),
(227, 55, 168),
(228, 55, 186),
(229, 55, 187),
(230, 55, 188),
(231, 56, 156),
(232, 56, 157),
(233, 56, 158);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan`
--

DROP TABLE IF EXISTS `pengetahuan`;
CREATE TABLE IF NOT EXISTS `pengetahuan` (
  `id` int(11) NOT NULL,
  `id_kerusakan` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=372 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(2) NOT NULL,
  `umur` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `level`, `nama`, `hp`, `alamat`, `jk`, `umur`, `email`) VALUES
(1, 'admin', '0cc175b9c0f1b6a831c399e269772661', 1, 'Aministrator', '08132945559', 'Jl. kenair no. 343', 'L', 0, NULL),
(7, 'budi', '0cc175b9c0f1b6a831c399e269772661', 0, 'Firmansyah', '0813280800', 'jl. kenari no. 34', 'L', 20, 'bejo@gmail.com'),
(8, 'bejo', '7fc56270e7a70fa81a5935b72eacbe29', 0, 'Bejo sandix', '0813243595', 'Jl. keramat jadixxx', 'P', 40, NULL),
(9, 'heri', '0cc175b9c0f1b6a831c399e269772661', 0, 'Heru hendriyadi', '45838538r3985', 'Jl. undru no. 4', 'P', 40, NULL),
(10, 'heru', '0cc175b9c0f1b6a831c399e269772661', 0, 'Heru hendriyadi', '083848583', 'Jl. kenari no. 345', 'L', 3, NULL),
(11, 'eko', '0cc175b9c0f1b6a831c399e269772661', 0, 'Eko kurniawan', '03895935893', 'Jl. kenari no. 335', 'L', 25, NULL),
(12, 'test', '202cb962ac59075b964b07152d234b70', 0, 'Test umar', '03909343', 'Hermaafdf ', 'L', 223, NULL),
(13, 'adsd', '0cc175b9c0f1b6a831c399e269772661', 0, 'dfjdkfdjk', '935838945', 'fjdsalfjlf jadsa sasad', 'L', 34, NULL),
(14, 'cindy', '4a8a08f09d37b73795649038408b5f33', 0, 'cindy anita', '085254441889', 'waena', 'P', 0, 'cindy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `referensi`
--

DROP TABLE IF EXISTS `referensi`;
CREATE TABLE IF NOT EXISTS `referensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_printer` varchar(200) NOT NULL,
  `kerusakan_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referensi`
--

INSERT INTO `referensi` (`id`, `nama`, `jenis_printer`, `kerusakan_id`) VALUES
(12, 'P1', '', 60),
(13, 'P3', '', 62),
(14, 'P6', '', 65),
(15, 'Test', '', 60);

-- --------------------------------------------------------

--
-- Table structure for table `referensi_detail`
--

DROP TABLE IF EXISTS `referensi_detail`;
CREATE TABLE IF NOT EXISTS `referensi_detail` (
  `id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `referensi_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referensi_detail`
--

INSERT INTO `referensi_detail` (`id`, `gejala_id`, `referensi_id`) VALUES
(80, 155, 15),
(81, 161, 15),
(82, 187, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kerusakan_id` (`kerusakan_id`);

--
-- Indexes for table `pemeriksaan_detail`
--
ALTER TABLE `pemeriksaan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pemeriksaan` (`pemeriksaan_id`),
  ADD KEY `gejala_id` (`gejala_id`);

--
-- Indexes for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kerusakan` (`id_kerusakan`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referensi`
--
ALTER TABLE `referensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk2kerusakan` (`kerusakan_id`);

--
-- Indexes for table `referensi_detail`
--
ALTER TABLE `referensi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referensi_id` (`referensi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=196;
--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `pemeriksaan_detail`
--
ALTER TABLE `pemeriksaan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=372;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `referensi`
--
ALTER TABLE `referensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `referensi_detail`
--
ALTER TABLE `referensi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`),
  ADD CONSTRAINT `pemeriksaan_ibfk_2` FOREIGN KEY (`kerusakan_id`) REFERENCES `kerusakan` (`id`);

--
-- Constraints for table `pemeriksaan_detail`
--
ALTER TABLE `pemeriksaan_detail`
  ADD CONSTRAINT `fk_pemeriksaan` FOREIGN KEY (`pemeriksaan_id`) REFERENCES `pemeriksaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemeriksaan_detail_ibfk_1` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id`);

--
-- Constraints for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD CONSTRAINT `pengetahuan_ibfk_1` FOREIGN KEY (`id_kerusakan`) REFERENCES `kerusakan` (`id`),
  ADD CONSTRAINT `pengetahuan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id`);

--
-- Constraints for table `referensi`
--
ALTER TABLE `referensi`
  ADD CONSTRAINT `fk2kerusakan` FOREIGN KEY (`kerusakan_id`) REFERENCES `kerusakan` (`id`);

--
-- Constraints for table `referensi_detail`
--
ALTER TABLE `referensi_detail`
  ADD CONSTRAINT `referensi_detail_ibfk_1` FOREIGN KEY (`referensi_id`) REFERENCES `referensi` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
