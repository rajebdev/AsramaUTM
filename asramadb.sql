-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 01:58 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+07:00";

--
-- Database: `asramadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `nim` char(12) DEFAULT NULL,
  `pass_foto` char(1) DEFAULT NULL,
  `surat_pernyataan` char(1) DEFAULT NULL,
  `ktp_penghuni` char(1) DEFAULT NULL,
  `ktp_ayah` char(1) DEFAULT NULL,
  `ktp_ibu` char(1) DEFAULT NULL,
  `kartu_keluarga` char(1) DEFAULT NULL,
  `kwitansi_daftar` char(1) DEFAULT NULL,
  `kwitansi_karakter` char(1) DEFAULT NULL,
  `surat_dokter` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` char(2) NOT NULL,
  `nama_fakultas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
('00', 'Belum Dipilih'),
('01', 'Hukum'),
('02', 'Ekonomi dan Bisnis'),
('03', 'Pertanian'),
('04', 'Teknik'),
('05', 'Ilmu Sosial dan Budaya'),
('06', 'Ilmu Pendidikan'),
('07', 'Ilmu Keislaman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hobi`
--

CREATE TABLE `tbl_hobi` (
  `nim` char(12) DEFAULT NULL,
  `ket_hobi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hobi`
--

INSERT INTO `tbl_hobi` (`nim`, `ket_hobi`) VALUES
('170211100003', 'Bernyanyi'),
('170221100121', 'Berenang'),
('170231100031', 'memasak'),
('170331100201', 'Berolahraga'),
('170411100003', 'Menari'),
('170411100061', 'Bernyanyi'),
('170511100038', 'Membaca'),
('170521100076', 'menluis'),
('170611100032', 'Menulis'),
('170621100021', 'Traveling');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jalurmasuk`
--

CREATE TABLE `tbl_jalurmasuk` (
  `id_jalurmasuk` char(1) NOT NULL,
  `ket_jalurmasuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jalurmasuk`
--

INSERT INTO `tbl_jalurmasuk` (`id_jalurmasuk`, `ket_jalurmasuk`) VALUES
('0', 'Belum Dipilih'),
('1', 'SNMPTN'),
('2', 'SBMPTN'),
('3', 'Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` char(3) NOT NULL,
  `id_fakultas` char(2) DEFAULT NULL,
  `ket_jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `id_fakultas`, `ket_jurusan`) VALUES
('000', '00', 'Belum Dipilih'),
('011', '01', 'Ilmu Hukum'),
('021', '02', 'Manajemen'),
('022', '02', 'Akuntansi'),
('023', '02', 'Ekonomi Pembangunan'),
('024', '02', 'Enterprenuership'),
('031', '03', 'Teknologi Industri Pertanian'),
('032', '03', 'Agribisnis'),
('033', '03', 'Agroekoteknologi'),
('034', '03', 'Ilmu Kelautan'),
('041', '04', 'Teknik Informatika'),
('042', '04', 'Teknik Industri'),
('043', '04', 'Teknik Elektro'),
('044', '04', 'Teknik Mekatronika'),
('045', '04', 'Sistem Informasi'),
('051', '05', 'Sastra Inggris'),
('052', '05', 'Sosiologi'),
('053', '05', 'Ilmu Komunikasi'),
('054', '05', 'Psikologi'),
('061', '06', 'PGSD'),
('062', '06', 'Pendidikan Informatika'),
('063', '06', 'Pendidikan IPA'),
('064', '06', 'Pendidikan Anak Usia Dini'),
('065', '06', 'Pendidikan bahasa dan sastra indonesia'),
('071', '07', 'Hukum Bisnis Syariah'),
('072', '07', 'Ekonomi Syariah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelamin`
--

CREATE TABLE `tbl_kelamin` (
  `id_kelamin` char(1) NOT NULL,
  `ket_kelamin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelamin`
--

INSERT INTO `tbl_kelamin` (`id_kelamin`, `ket_kelamin`) VALUES
('0', 'Belum Dipilih'),
('1', 'Laki-laki'),
('2', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` char(4) NOT NULL,
  `ket_level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `ket_level`) VALUES
('100', 'Pendaftar'),
('1337', 'Administrator'),
('999', 'Musahil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `username` varchar(32) NOT NULL,
  `id_level` char(4) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_created` datetime DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `id_level`, `password`, `user_created`, `photo`) VALUES
('admin', '1337', '21232f297a57a5a743894a0e4a801fc3', '2019-11-06 00:00:00', 'default.jpg'),
('M170411100003', '999', '76eb649c047cbecad7c36e71374bc9a5', '2019-11-09 14:00:00', 'defaulft.jpg'),
('M170411100061', '999', '9c66f75befa26d06779a8db1a1518061', '2019-11-06 00:00:00', 'default.jpg'),
('U170211100003', '100', '9693519a041ae1b4fca8f3f7f3d17234', '2019-11-13 00:00:00', 'default.jpg'),
('U170221100121', '100', '45a73564aacc33cff0bf8bf9e72370f5', '2019-11-14 00:00:00', 'default.jpg'),
('U170231100031', '100', '21f1256217c52a6cdaa51f34bf1b4131', '2019-11-13 00:00:00', 'default.jpg'),
('U170331100201', '100', '5ddc47513696be03631bd326219bf74b', '2019-11-14 00:00:00', 'default.jpg'),
('U170411100003', '100', '76eb649c047cbecad7c36e71374bc9a5', '2019-11-06 00:00:00', 'default.jpg'),
('U170411100061', '100', '9c66f75befa26d06779a8db1a1518061', '2019-11-06 00:00:00', 'default.jpg'),
('U170511100038', '100', 'f79cc6cb526401cb0d46d01db5bc453a', '2019-11-14 00:00:00', 'default.jpg'),
('U170521100076', '100', '82682943a05de360abb183236c632bd6', '2019-11-14 00:00:00', 'default.jpg'),
('U170611100032', '100', '6d808ecfd24037ca31db96e3cb1d1e1e', '2019-11-06 00:00:00', 'default.jpg'),
('U170621100021', '100', 'e78c63834c00efd39839d3ec7b7a49a2', '2019-11-14 00:00:00', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_musahil`
--

CREATE TABLE `tbl_musahil` (
  `nim_musahil` char(12) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_musahil`
--

INSERT INTO `tbl_musahil` (`nim_musahil`, `username`, `nama`) VALUES
('170411100003', 'M170411100003', 'Anas Trikrisna Gowo Rezky'),
('170411100061', 'M170411100061', 'Wijanarko Putra Rajeb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orangtua`
--

CREATE TABLE `tbl_orangtua` (
  `nim` char(12) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `telp_ayah` varchar(16) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `telp_ibu` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organisasi`
--

CREATE TABLE `tbl_organisasi` (
  `nim` char(12) DEFAULT NULL,
  `nama_organisasi` varchar(255) DEFAULT NULL,
  `tahun_masuk` char(4) DEFAULT NULL,
  `tahun_selesai` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_organisasi`
--

INSERT INTO `tbl_organisasi` (`nim`, `nama_organisasi`, `tahun_masuk`, `tahun_selesai`) VALUES
('170211100003', 'PERFEK', '2017', '2018'),
('170221100121', 'RATI', '2018', '2019'),
('170231100031', 'SEFIS', '2017', '2018'),
('170331100201', 'PORGAFTA', '2017', '2018'),
('170411100003', 'SOKET', '2017', '2018'),
('170411100061', 'ITC', '2017', '2019'),
('170511100038', 'ORGASIB', '2018', '2019'),
('170521100076', 'ORGASIB', '2016', '2017'),
('170611100032', 'POFKIP', '2017', '2018'),
('170621100021', 'POFKIP', '2016', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `nim` char(12) NOT NULL,
  `id_jurusan` char(3) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `id_kelamin` char(1) DEFAULT NULL,
  `id_jalurmasuk` char(1) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` char(10) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kode_kelurahan` varchar(10) DEFAULT NULL,
  `kode_pos` char(5) DEFAULT NULL,
  `tanggal_mendaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`nim`, `id_jurusan`, `username`, `id_kelamin`, `id_jalurmasuk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `kode_kelurahan`, `kode_pos`, `tanggal_mendaftar`) VALUES
('170211100003', '021', 'U170211100003', '2', '2', 'Adelia Afanda', 'Sumenep', '1998-10-14', '082163852040', 'kalianget', '87171637', '63372', '2019-11-07 00:00:00'),
('170221100121', '021', 'U170221100121', '1', '2', 'Yoga Presetyo', 'Gresik', '1998-04-1', '082188627596', 'Cerme', '45174597', '97423', '2019-11-07 00:00:00'),
('170231100031', '023', 'U170231100031', '1', '1', 'Putra Nugroho', 'Jombang', '1999-10-9', '083189917576', 'Ploso', '35171117', '61483', '2019-11-07 00:00:00'),
('170331100201', '023', 'U170331100201', '1', '1', 'Malik Latif', 'Madiun', '1999-05-28', '082186307329', 'kartoharjo', '98351323', '61115', '2019-11-07 00:00:00'),
('170411100003', '041', 'U170411100003', '1', '1', 'Anas Trikrisna Gowo Rezky', 'Nganjuk', '1999-10-17', '082163852040', 'Rejoso', '65171637', '63002', '2019-11-07 00:00:00'),
('170411100061', '041', 'U170411100061', '1', '1', 'Wijanarko Putra Rajeb', 'Jombang', '1999-10-17', '083189917576', 'Bakalan', '35171117', '61483', '2019-11-07 00:00:00'),
('170511100038', '051', 'U170511100038', '2', '1', 'Arwinda Mifta Zulfida', 'Surabaya', '1999-09-12', '083189918630', 'Benowo', '35179835', '61902', '2019-11-07 00:00:00'),
('170521100076', '051', 'U170521100076', '2', '1', 'Putri Kurnia', 'Sidoarjo', '1999-01-13', '083189918630', 'Krian', '35179835', '61902', '2019-11-07 00:00:00'),
('170611100032', '061', 'U170611100032', '1', '3', 'Zainul Mustofa', 'Mojokerto', '1999-01-21', '083189918630', 'Dawar', '35179835', '61902', '2019-11-07 00:00:00'),
('170621100021', '061', 'U170621100021', '1', '3', 'Edy Prasetyo', 'Mojokerto', '1999-01-17', '083189918630', 'Dawar', '35179835', '61902', '2019-11-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` char(2) NOT NULL,
  `ket_pendidikan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_pendidikan`, `ket_pendidikan`) VALUES
('01', 'SMA'),
('02', 'SMK'),
('03', 'MA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prestasi`
--

CREATE TABLE `tbl_prestasi` (
  `nim` char(12) DEFAULT NULL,
  `nama_prestasi` varchar(255) DEFAULT NULL,
  `tahun_prestasi` char(4) DEFAULT NULL,
  `berkas_prestasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayatpendidikan`
--

CREATE TABLE `tbl_riwayatpendidikan` (
  `id_pendidikan` char(2) DEFAULT NULL,
  `nim` char(12) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `tahun_lulus` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayatpendidikan`
--

INSERT INTO `tbl_riwayatpendidikan` (`id_pendidikan`, `nim`, `nama_sekolah`, `tahun_lulus`) VALUES
('01', '170211100003', 'SMA Negeri 1 Sumenep', '2017'),
('01', '170221100121', 'SMA Negeri 1 Cerme', '2017'),
('01', '170231100031', 'SMA Negeri 1 jombang', '2017'),
('02', '170331100201', 'SMK Negeri 1 Madiun', '2017'),
('02', '170411100003', 'SMK Negeri 1 Nganjuk', '2017'),
('01', '170411100061', 'SMA Negeri 1 Jombang', '2017'),
('01', '170511100038', 'SMA Negeri 15 Surabaya', '2018'),
('01', '170521100076', 'SMA Negeri 1 Sidoarjo', '2016'),
('01', '170611100032', 'SMA Negeri 1 Mojokerto', '2017'),
('01', '170621100021', 'SMA Negeri 1 Mojokerto', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayatsakit`
--

CREATE TABLE `tbl_riwayatsakit` (
  `nim` char(12) DEFAULT NULL,
  `nama_penyakit` varchar(255) DEFAULT NULL,
  `ket_penyakit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_validasiberkas`
--

CREATE TABLE `tbl_validasiberkas` (
  `nim` char(12) DEFAULT NULL,
  `pass_foto` char(1) DEFAULT NULL,
  `surat_pernyataan` char(1) DEFAULT NULL,
  `ktp_penghuni` char(1) DEFAULT NULL,
  `ktp_ayah` char(1) DEFAULT NULL,
  `ktp_ibu` char(1) DEFAULT NULL,
  `kartu_keluarga` char(1) DEFAULT NULL,
  `kwitansi_daftar` char(1) DEFAULT NULL,
  `kwitansi_karakter` char(1) DEFAULT NULL,
  `surat_dokter` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD KEY `FK_RELATIONSHIP_14` (`nim`);

--
-- Indexes for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tbl_hobi`
--
ALTER TABLE `tbl_hobi`
  ADD KEY `FK_RELATIONSHIP_7` (`nim`);

--
-- Indexes for table `tbl_jalurmasuk`
--
ALTER TABLE `tbl_jalurmasuk`
  ADD PRIMARY KEY (`id_jalurmasuk`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `FK_RELATIONSHIP_4` (`id_fakultas`);

--
-- Indexes for table `tbl_kelamin`
--
ALTER TABLE `tbl_kelamin`
  ADD PRIMARY KEY (`id_kelamin`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `FK_RELATIONSHIP_5` (`id_level`);

--
-- Indexes for table `tbl_musahil`
--
ALTER TABLE `tbl_musahil`
  ADD PRIMARY KEY (`nim_musahil`),
  ADD KEY `FK_RELATIONSHIP_16` (`username`);

--
-- Indexes for table `tbl_orangtua`
--
ALTER TABLE `tbl_orangtua`
  ADD KEY `FK_RELATIONSHIP_11` (`nim`);

--
-- Indexes for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD KEY `FK_RELATIONSHIP_9` (`nim`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `FK_RELATIONSHIP_1` (`id_kelamin`),
  ADD KEY `FK_RELATIONSHIP_2` (`id_jalurmasuk`),
  ADD KEY `FK_RELATIONSHIP_3` (`id_jurusan`),
  ADD KEY `FK_RELATIONSHIP_6` (`username`);

--
-- Indexes for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD KEY `FK_RELATIONSHIP_8` (`nim`);

--
-- Indexes for table `tbl_riwayatpendidikan`
--
ALTER TABLE `tbl_riwayatpendidikan`
  ADD KEY `FK_RELATIONSHIP_12` (`nim`),
  ADD KEY `FK_RELATIONSHIP_17` (`id_pendidikan`);

--
-- Indexes for table `tbl_riwayatsakit`
--
ALTER TABLE `tbl_riwayatsakit`
  ADD KEY `FK_RELATIONSHIP_10` (`nim`);

--
-- Indexes for table `tbl_validasiberkas`
--
ALTER TABLE `tbl_validasiberkas`
  ADD KEY `FK_RELATIONSHIP_15` (`nim`);

ALTER TABLE `tbl_berkas`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_hobi`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_jurusan`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`id_fakultas`) REFERENCES `tbl_fakultas` (`id_fakultas`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_login`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id_level`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_musahil`
  ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`username`) REFERENCES `tbl_login` (`username`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_orangtua`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_organisasi`
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`id_kelamin`) REFERENCES `tbl_kelamin` (`id_kelamin`) ON UPDATE CASCADE ON DELETE RESTRICT,
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`id_jalurmasuk`) REFERENCES `tbl_jalurmasuk` (`id_jalurmasuk`) ON UPDATE CASCADE ON DELETE RESTRICT,
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`) ON UPDATE CASCADE ON DELETE RESTRICT,
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`username`) REFERENCES `tbl_login` (`username`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_prestasi`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_riwayatpendidikan`
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE ON DELETE RESTRICT,
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`id_pendidikan`) REFERENCES `tbl_pendidikan` (`id_pendidikan`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_riwayatsakit`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `tbl_validasiberkas`
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE ON DELETE RESTRICT;
COMMIT;

