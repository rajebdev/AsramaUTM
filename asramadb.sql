-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2019 pada 08.21
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS asramadb;
USE asramadb;


--
-- Database: `asramadb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` bigint(20) NOT NULL,
  `judul_berita` text NOT NULL,
  `post_date` char(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `post_date`, `isi`) VALUES
(1, 'Antusiasme Jamaah Sholawat Menggapai Syafaat Nabi Muhammad SAW', ' 02-12-2019', '<p>Bangkalan, Rabu (20/11/2019) Antusiasme ribuan jamaah sholawat hadiri acara ‘’Asrama Bersholawat’’, sudah menjadi kegiatan istiqomah satiap tahun di bulan <em>Maulud</em> bagi Asrama Mahasiswa UTM menggelar acara ‘’Asrama Bersholawat’’. Berbeda dari tahun-tahun sebelumnya, pada tahun ini ‘’Asrama Bersholawat’’ yang mengusung tema ‘’Raih Syafaat dengan Sholawat, Tingkatkan Iman dan Taqwa dengan Meneladani Akhlak Nabi Muhammad SAW’’ ini dihadiri ribuan warga Asrama Mahasiswa UTM dan juga masyarakat umum. Praacara dimulai sekitar pukul 18.15 WIB dengan suguhan penampilan grup sholawat al banjari andalan Asrama Mahasiswa UTM “ Nahdlatus Syubban”. Tepat pukul 19.30 acara dibuka oleh MC  kemudian disusul dengan pembacaan ayat suci alquran yg dilantunkan oleh salah satu warga asrama putra. Kemudian disusul dengan sambutan oleh Bapak Agung Ali Fahmi (Wakil Rektor III UTM) sekaligus membuka acara ‘’Asrama Bersholawat’’ ini.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/SISPENGMA-UTM/uploaded/news_image/SholawatAsrama_f_5de13b2ebb918.jpg\"></p>\r\n\r\n<p>Berselang beberapa menit usai sambutan sekaligus pembukaan, jama’ah sholawat dari masyarakat umum mulai berdatangan memadati area acara ‘’Asrama Bersholawat’’. Selain oleh jama’ah sholawat dari masyarakat umum halaman asrama juga ramai berjajar pedagang yang turut memadati area acara. Mendapati kondisi yang sangat padat ramai, seluruh panitia siaga dan sedia dalam mengatur dan memberi panduan. Meski tidak semua jamaah sholawat mendapat alas tempat duduk namun tak sedikitpun mengurangi antusias dan jamaah sholawat untuk tetap mengikuti acara demi acara.</p>\r\n\r\n<p>Asrama bersholawat ini dirangkai tidak hanya menghadirkan RKH. Karror Aschal dan grup sholawatnya saja, namun juga turut mengundang K.H Imam Makhsus Ridwan sebagai penceramah agama. Lengkaplah sudah acara ini sebagai bentuk rasa syukur dan tentunya menambah kecintaan kita dalam upaya meraih syafaat nabi Muhammad SAW.</p>\r\n'),
(7, 'Keluarga Besar Asrama UTM melaksanakan sholat Ghaib untuk Almarhum BJ Habibie Presiden ke 3 RI', ' 02-12-2019', '<p>Berbeda dengan kegiatan jumat manis biasanya, selain melakukan istighosah dan doa bersama, warga asrama mahasiswa UTM pada malam ini juga melaksanakan sholat ghoib untuk Presiden RI yang ke-3 Alm. B.J. Habibie dan sholat tasbih berjamaah, pada kamis, 12 September 2019 di halaman gedung A.</p>\r\n\r\n<p>Acara sholat ghoib dan tasbih kali ini diikuti oleh kurang lebih 1000 orang.  jama’ah yang hadir hari terdiri dari warga, pengurus dan pengelola dan civitas akademika UTM, khusus acara ini terbuka untuk umum. Turut hadir dalam acara tersebut direktur Asrama bapak Ach. Khozaimi, Bapak Badrus Syamsi selaku sekretaris Asrama dan jajaran pengelola Asrama yang lain.</p>\r\n\r\n<p>Kegiatan ini dimulai dengan pembacaan surah Yasin Surah Al-Waqi’ah dan surah Al-Mulk yang dilakukan sebelum adzan Maghrib dan pahalanya dikhususkan untuk Almarhum BJ. Habibie.</p>\r\n\r\n<p>Sebelum sholat ghaib dimulai, direktur asrama memberikan penjelasan mengenai tata cara shalat ghaib, selain itu beliau juga menyampaikan ucapan bela sungkawa yang mendalam atas wafatnya president RI ke-3. “Atas nama keluarga besar Asrama UTM, kami mengucapkan belasungkawa yang dalam atas meninggalnya kader terbaik bangsa yaitu Prof. BJ. Habibie president RI ke 3, semoga Almarhum diampuni segala dosanya, diterima segala amal baiknya dan mendapatkan tempat yang baik di sisi Allah swt”. Direktur Asrama juga mengajak seluruh warga asrama agar mendedikasikan diri untuk bangsa seperti yang sudah dilakukan oleh BJ. Habibie.</p>\r\n\r\n<p>Setelah melakukan sholat ghaib, tahlil dan doa bersama, acara ditutup dengan melaksanakan sholat isya’ berjamaah.</p>\r\n\r\n<p><img alt=\"\" src=\"http://asrama.trunojoyo.ac.id/wp-content/uploads/2019/09/20190912_181357-1024x576.jpeg\"></p>\r\n'),
(999, 'INFORMASI PENDAFTARAN', ' 15-12-2019', '<h1>Pendaftaran Penghuni Baru Asrama Mahasiswa Universitas Trunojoyo Madura</h1>\r\n\r\n<ul>\r\n <li>Pendaftarann diawali dengan pendaftaran Offline di Asrama mahasiswa Universitas Trunojoyo Madura 05 Mei - 06 Juli 2020</li>\r\n <li>Para Calon Pendaftar Datang dan membawa Berkas diantara lain :<br>\r\n  \r\n <ul>\r\n  <li>Berkas Kelulusan SBM/SNMPTN/Mandiri</li>\r\n  <li>Verifikasi Pendaftaran Mahasiswa Universitas Trunojoyo Madura</li>\r\n  <li>Kartu Identitas<br>\r\n   </li>\r\n </ul>\r\n Semua berkas dibawa untuk mendapatkanToken sebagai verifikasi Akun Login Sistem Penghuni Asrama untuk mengisi bio data diri dan informasi lainnya</li>\r\n <li>Setalah Semua dilakukan pengisian, Mahasiswa kembali menuju asrama Universitas Trunojoyo Madura, setelah melakukan pembayaran, Untuk mendapatkan informasi kamar yang akan dihuni</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `nim` char(12) NOT NULL,
  `pass_foto` varchar(255) DEFAULT NULL,
  `surat_pernyataan` varchar(255) DEFAULT NULL,
  `ktp_penghuni` varchar(255) DEFAULT NULL,
  `ktp_ayah` varchar(255) DEFAULT NULL,
  `ktp_ibu` varchar(255) DEFAULT NULL,
  `kartu_keluarga` varchar(255) DEFAULT NULL,
  `kwitansi_daftar` varchar(255) DEFAULT NULL,
  `kwitansi_karakter` varchar(255) DEFAULT NULL,
  `surat_dokter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`nim`, `pass_foto`, `surat_pernyataan`, `ktp_penghuni`, `ktp_ayah`, `ktp_ibu`, `kartu_keluarga`, `kwitansi_daftar`, `kwitansi_karakter`, `surat_dokter`) VALUES
('170411100061', '170411100061.jpg', '170411100061.png', '170411100061.jpg', 'default.jpg', '170411100061.jpg', '170411100061.jpg', '170411100061.png', 'default.jpg', '170411100061.jpg'),
('170411100888', '170411100888.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg'),
('170611100032', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` char(2) NOT NULL,
  `nama_fakultas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_fakultas`
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
-- Struktur dari tabel `tbl_gedung`
--

CREATE TABLE `tbl_gedung` (
  `id_gedung` char(3) CHARACTER SET utf8mb4 NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `jenis_kelamin` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gedung`
--

INSERT INTO `tbl_gedung` (`id_gedung`, `keterangan`, `jenis_kelamin`) VALUES
('A', 'Gedung Laki - laki', '1'),
('B', 'Gedung Perempuan', '2'),
('C', 'Gedung Perempuan', '2'),
('D', 'Gedung Perempuan', '2'),
('E', 'Gedung Perempuan', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hobi`
--

CREATE TABLE `tbl_hobi` (
  `id` int(11) NOT NULL,
  `nim` char(12) DEFAULT NULL,
  `ket_hobi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hobi`
--

INSERT INTO `tbl_hobi` (`id`, `nim`, `ket_hobi`) VALUES
(1, '170211100003', 'Bernyanyi'),
(2, '170221100121', 'Berenang'),
(3, '170231100031', 'memasak'),
(4, '170331100201', 'Berolahraga'),
(5, '170411100003', 'Menari'),
(7, '170511100038', 'Membaca'),
(8, '170521100076', 'menluis'),
(9, '170611100032', 'Menulis'),
(10, '170621100021', 'Traveling'),
(11, '170411100061', 'Bernyanyi Nyayi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jalurmasuk`
--

CREATE TABLE `tbl_jalurmasuk` (
  `id_jalurmasuk` char(1) NOT NULL,
  `ket_jalurmasuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jalurmasuk`
--

INSERT INTO `tbl_jalurmasuk` (`id_jalurmasuk`, `ket_jalurmasuk`) VALUES
('0', 'Belum Dipilih'),
('1', 'SNMPTN'),
('2', 'SBMPTN'),
('3', 'Mandiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` char(3) NOT NULL,
  `id_fakultas` char(2) DEFAULT NULL,
  `ket_jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jurusan`
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
-- Struktur dari tabel `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `id_kamar` char(4) NOT NULL,
  `id_gedung` char(3) CHARACTER SET utf8mb4 NOT NULL,
  `kondisi` char(1) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`id_kamar`, `id_gedung`, `kondisi`) VALUES
('A101', 'A', '1'),
('A102', 'A', '2'),
('A103', 'A', '1'),
('A104', 'A', '1'),
('A105', 'A', '1'),
('B101', 'B', '1'),
('B102', 'B', '3'),
('B103', 'B', '1'),
('B201', 'B', '1'),
('B202', 'B', '2'),
('C101', 'C', '2'),
('C102', 'C', '1'),
('C103', 'C', '2'),
('C201', 'C', '1'),
('C202', 'C', '2'),
('D101', 'D', '1'),
('D102', 'D', '1'),
('D103', 'D', '1'),
('D201', 'D', '2'),
('D202', 'D', '1'),
('E101', 'E', '3'),
('E102', 'E', '1'),
('E103', 'E', '3'),
('E201', 'E', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelamin`
--

CREATE TABLE `tbl_kelamin` (
  `id_kelamin` char(1) NOT NULL,
  `ket_kelamin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelamin`
--

INSERT INTO `tbl_kelamin` (`id_kelamin`, `ket_kelamin`) VALUES
('0', 'Belum Dipilih'),
('1', 'Laki-laki'),
('2', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kondisi_kamar`
--

CREATE TABLE `tbl_kondisi_kamar` (
  `id_kondisi` char(1) CHARACTER SET utf8mb4 NOT NULL,
  `keterangan` varchar(64) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kondisi_kamar`
--

INSERT INTO `tbl_kondisi_kamar` (`id_kondisi`, `keterangan`) VALUES
('1', 'Layak'),
('2', 'Cukup Layak'),
('3', 'Tidak Layak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` char(4) NOT NULL,
  `ket_level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `ket_level`) VALUES
('100', 'Pendaftar'),
('1337', 'Administrator'),
('999', 'Musahil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `username` varchar(32) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_level` char(4) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `user_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `password`, `id_level`, `photo`, `user_created`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '1337', 'default.jpg', '2019-11-06 00:00:00'),
('Admin101', 'f6fdffe48c908deb0f4c3bd36c032e72', '1337', 'Admin.jpg', '2018-04-01 00:00:00'),
('M170411100003', '76eb649c047cbecad7c36e71374bc9a5', '999', 'defaulft.jpg', '2019-11-09 14:00:00'),
('M170411100049', '41e0071d498843480bb42775a818f855', '999', 'M1704111000495de2338aa56a5.jpg', '2017-06-03 00:00:00'),
('M170411100061', '9c66f75befa26d06779a8db1a1518061', '999', 'M1704111000615dfb1f918eb82.jpg', '2019-11-06 00:00:00'),
('U170211100003', 'ef7fc46e194c92d6c1491c1be99abe5a', '100', 'default.jpg', '2019-11-13 00:00:00'),
('U170221100121', '45a73564aacc33cff0bf8bf9e72370f5', '100', 'default.jpg', '2019-11-14 00:00:00'),
('U170231100031', '21f1256217c52a6cdaa51f34bf1b4131', '100', 'default.jpg', '2019-11-13 00:00:00'),
('U170331100201', '5ddc47513696be03631bd326219bf74b', '100', 'default.jpg', '2019-11-14 00:00:00'),
('U170411100003', '9301c292b7abcc42523507917e17151e', '100', 'default.jpg', '2019-11-06 00:00:00'),
('U170411100049', '6919b0da565ba5fbace53fa22149e76a', '100', 'M1704111000495de2338aa56a5.jpg', '2019-11-03 00:00:00'),
('U170411100061', '9c66f75befa26d06779a8db1a1518061', '100', 'M1704111000615dfb1f918eb82.jpg', '2019-11-06 00:00:00'),
('U170411100888', 'aa84f76e3b2f2f9295feadbbc2b45903', '100', 'default.jpg', '2019-12-19 11:40:19'),
('U170411100999', 'd714ca044aeded65c5d6418d3d19bf46', '100', 'default.jpg', '2019-12-16 12:58:16'),
('U170511100038', 'f79cc6cb526401cb0d46d01db5bc453a', '100', 'default.jpg', '2019-11-14 00:00:00'),
('U170521100076', '82682943a05de360abb183236c632bd6', '100', 'default.jpg', '2019-11-14 00:00:00'),
('U170611100032', '6d808ecfd24037ca31db96e3cb1d1e1e', '100', 'default.jpg', '2019-11-06 00:00:00'),
('U170621100021', 'e78c63834c00efd39839d3ec7b7a49a2', '100', 'default.jpg', '2019-11-14 00:00:00'),
('U1706600999', '1879b88bca6ff366c224c21c9bbe5095', '100', 'default.jpg', '2019-12-16 11:48:27'),
('U190411100012', 'fb7706e74375ced06a876e20898d0a7f', '100', 'U190411100053.jpg', '2019-11-03 00:00:00'),
('U190411100049', '8724aa758c2f662d79952870ef486ea6', '100', 'U190411100049.jpg', '2019-11-06 05:24:14'),
('U190411100050', 'b89dcf83a35e09b516eee3d3e55e173e', '100', 'U190411100050.jpg', '2019-11-06 05:24:14'),
('U190411100051', 'a916a3d6a3de61b07731a92ca424db0a', '100', 'U190411100051.jpg', '2019-11-06 05:24:14'),
('U190411100052', 'a8e210c6a109dac22eb5af9e7db9bed3', '100', 'U190411100052.jpg', '2019-11-06 05:24:14'),
('U190411100053', '6d291c30d0df3110e4dc39ad4afe0b9e', '100', 'U190411100053.jpg', '2019-11-06 05:24:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_musahil`
--

CREATE TABLE `tbl_musahil` (
  `nim_musahil` char(12) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_musahil`
--

INSERT INTO `tbl_musahil` (`nim_musahil`, `username`, `nama`) VALUES
('170411100003', 'M170411100003', 'Anas Trikrisna Gowo Rezky'),
('170411100061', 'M170411100061', 'Wijanarko Putra Rajeb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orangtua`
--

CREATE TABLE `tbl_orangtua` (
  `nim` char(12) NOT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `telp_ayah` varchar(16) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `telp_ibu` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_orangtua`
--

INSERT INTO `tbl_orangtua` (`nim`, `nama_ayah`, `pekerjaan_ayah`, `telp_ayah`, `nama_ibu`, `pekerjaan_ibu`, `telp_ibu`) VALUES
('170411100061', 'Wasis', 'Petani', '08155611551', 'Jumani', 'Buruh Tani Aja', ''),
('170411100888', '', '', '', '', '', ''),
('170411100999', 'Wasis', 'Petani', '08155611551', 'Jumani', 'Buruh Tani', ''),
('1706600999', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_organisasi`
--

CREATE TABLE `tbl_organisasi` (
  `id` int(11) NOT NULL,
  `nim` char(12) DEFAULT NULL,
  `nama_organisasi` varchar(255) DEFAULT NULL,
  `tahun_masuk` char(4) DEFAULT NULL,
  `tahun_selesai` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_organisasi`
--

INSERT INTO `tbl_organisasi` (`id`, `nim`, `nama_organisasi`, `tahun_masuk`, `tahun_selesai`) VALUES
(2, '170221100121', 'RATI', '2018', '2019'),
(3, '170231100031', 'SEFIS', '2017', '2018'),
(4, '170331100201', 'PORGAFTA', '2017', '2018'),
(5, '170411100003', 'SOKET', '2017', '2018'),
(6, '170411100061', 'ITC', '2017', '2019'),
(7, '170511100038', 'ORGASIB', '2018', '2019'),
(8, '170521100076', 'ORGASIB', '2016', '2017'),
(9, '170611100032', 'POFKIP', '2017', '2018'),
(10, '170621100021', 'POFKIP', '2016', '2018'),
(12, '170411100061', 'Warga Lab', '2018', '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `nim` char(12) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_jurusan` char(3) DEFAULT NULL,
  `id_jalurmasuk` char(1) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` char(10) DEFAULT NULL,
  `id_kelamin` char(1) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kode_kelurahan` varchar(10) DEFAULT NULL,
  `kode_pos` char(5) DEFAULT NULL,
  `tanggal_mendaftar` datetime DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `validasi` char(1) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`nim`, `nama`, `id_jurusan`, `id_jalurmasuk`, `tempat_lahir`, `tanggal_lahir`, `id_kelamin`, `no_telp`, `alamat`, `kode_kelurahan`, `kode_pos`, `tanggal_mendaftar`, `username`) VALUES
('170211100003', 'Adelia Afanda', '021', '2', 'Sumenep', '1998-10-14', '2', '082163852040', 'kalianget', '87171637', '63372', '2019-11-07 00:00:00', 'U170211100003'),
('170221100121', 'Yoga Presetyo', '021', '2', 'Gresik', '1998-04-1', '1', '082188627596', 'Cerme', '45174597', '97423', '2019-11-07 00:00:00', 'U170221100121'),
('170231100031', 'Putra Nugroho', '023', '1', 'Jombang', '1999-10-9', '1', '083189917576', 'Ploso', '35171117', '61483', '2019-11-07 00:00:00', 'U170231100031'),
('170331100201', 'Malik Latif', '023', '1', 'Madiun', '1999-05-28', '1', '082186307329', 'kartoharjo', '98351323', '61115', '2019-11-07 00:00:00', 'U170331100201'),
('170411100003', 'Anas Trikrisna Gowo Rezky', '041', '1', 'Nganjuk', '1999-10-17', '1', '082163852040', 'Rejoso', '65171637', '63002', '2019-11-07 00:00:00', 'U170411100003'),
('170411100049', 'Reynaldi', '041', '2', 'Bandung', '1998-04-08', '1', '081332826907', 'Perumahan Angkatan Lau BRAI AL 3 no 8', NULL, NULL, '2017-06-08 00:00:00', 'U170411100049'),
('170411100061', 'Wijanarko Putra Rajeb', '044', '3', 'Jombang', '1999-08-17', '1', '083189917576', 'Bakalan', '35171117', '61483', '2019-11-07 00:00:00', 'U170411100061'),
('170411100888', '', '000', '0', '', '', '0', '', '', '', '', '2019-12-19 11:40:19', 'U170411100888'),
('170411100999', 'Wijanarko', '041', '2', 'Jombang', '2019-12-16', '1', '1234008077', 'Sumobito', '', '', '2019-12-16 12:58:16', 'U170411100999'),
('170511100038', 'Arwinda Mifta Zulfida', '051', '1', 'Surabaya', '1999-09-12', '2', '083189918630', 'Benowo', '35179835', '61902', '2019-11-07 00:00:00', 'U170511100038'),
('170521100076', 'Putri Kurnia', '051', '1', 'Sidoarjo', '1999-01-13', '2', '083189918630', 'Krian', '35179835', '61902', '2019-11-07 00:00:00', 'U170521100076'),
('170611100032', 'Zainul Mustofa', '061', '3', 'Mojokerto', '1999-01-21', '1', '083189918630', 'Dawar', '35179835', '61902', '2019-11-07 00:00:00', 'U170611100032'),
('170621100021', 'Edy Prasetyo', '061', '3', 'Mojokerto', '1999-01-17', '1', '083189918630', 'Dawar', '35179835', '61902', '2019-11-07 00:00:00', 'U170621100021'),
('1706600999', '', '000', '0', '', '', '0', '', '', '', '', '2019-12-16 11:48:27', 'U1706600999'),
('190411100012', 'Ahmad Khairun', '022', '1', 'Jombang', '1999-12-02', '1', '0813212221', 'Jombang Undipu Regency', '', NULL, '2019-12-10 00:00:00', 'U190411100012'),
('190411100049', 'Risky Alamsyah', '041', '1', 'Bandung', '1999-03-22', '1', '0819274829128', 'Perumahan Bukit Randuagung indah blok al 3 no 8', NULL, NULL, '2019-12-18 00:00:00', 'U190411100049'),
('190411100050', 'Dony Arifin', '041', '1', 'Tulungagung', '2000-07-02', '1', '08192748121312', 'Perumahan Indah Tulungagung', NULL, NULL, '2019-12-15 00:00:00', 'U190411100050'),
('190411100051', 'johan abdul', '041', '1', 'Surabaya', '2000-11-12', '1', '08191232121312', 'Perumahan Indah Surabaya', NULL, NULL, '2019-12-29 00:00:00', 'U190411100051'),
('190411100052', 'Anang ruksamu', '041', '1', 'Blitar', '2000-05-22', '1', '0813138121312', 'Blitar hill Regency', NULL, NULL, '2019-12-09 00:00:00', 'U190411100052'),
('190411100053', 'Tomi Riansyah', '041', '1', 'Bangkalan', '2000-09-17', '1', '0815124121312', 'Perumahan Cendana Kamal', NULL, NULL, '2019-12-01 00:00:00', 'U190411100053');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` char(2) NOT NULL,
  `ket_pendidikan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_pendidikan`, `ket_pendidikan`) VALUES
('01', 'SD'),
('02', 'SMP'),
('03', 'SMA'),
('04', 'Pondok Pesantren');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penghuni_tetap`
--

CREATE TABLE `tbl_penghuni_tetap` (
  `nim` char(12) NOT NULL,
  `kamar` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penghuni_tetap`
--

INSERT INTO `tbl_penghuni_tetap` (`nim`, `kamar`) VALUES
('190411100049', 'A101'),
('190411100050', 'A101'),
('190411100051', 'A101'),
('170411100049', 'A102'),
('190411100012', 'A104'),
('190411100052', 'A105');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prestasi`
--

CREATE TABLE `tbl_prestasi` (
  `id` int(11) NOT NULL,
  `nim` char(12) DEFAULT NULL,
  `nama_prestasi` varchar(255) DEFAULT NULL,
  `tahun_prestasi` char(4) DEFAULT NULL,
  `berkas_prestasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prestasi`
--

INSERT INTO `tbl_prestasi` (`id`, `nim`, `nama_prestasi`, `tahun_prestasi`, `berkas_prestasi`) VALUES
(1, '170411100061', 'Juara 1 Lomba Makan Kerupuk', '2017', 'narkokrupuk.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayatpendidikan`
--

CREATE TABLE `tbl_riwayatpendidikan` (
  `id` int(11) NOT NULL,
  `nim` char(12) DEFAULT NULL,
  `id_pendidikan` char(2) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `tahun_lulus` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_riwayatpendidikan`
--

INSERT INTO `tbl_riwayatpendidikan` (`id`, `nim`, `id_pendidikan`, `nama_sekolah`, `tahun_lulus`) VALUES
(2, '170221100121', '03', 'SMA Negeri 1 Cerme', '2017'),
(3, '170231100031', '03', 'SMA Negeri 1 jombang', '2017'),
(4, '170331100201', '03', 'SMK Negeri 1 Madiun', '2017'),
(5, '170411100003', '03', 'SMK Negeri 1 Nganjuk', '2017'),
(6, '170411100061', '03', 'SMA Negeri 1 Jombang', '2017'),
(7, '170511100038', '03', 'SMA Negeri 15 Surabaya', '2018'),
(8, '170521100076', '03', 'SMA Negeri 1 Sidoarjo', '2016'),
(9, '170611100032', '03', 'SMA Negeri 1 Mojokerto', '2017'),
(10, '170621100021', '03', 'SMA Negeri 1 Mojokerto', '2016'),
(11, '170411100061', '01', 'SDN Bakalan', '2011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayatsakit`
--

CREATE TABLE `tbl_riwayatsakit` (
  `id` int(11) NOT NULL,
  `nim` char(12) DEFAULT NULL,
  `nama_penyakit` varchar(255) DEFAULT NULL,
  `ket_penyakit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_riwayatsakit`
--

INSERT INTO `tbl_riwayatsakit` (`id`, `nim`, `nama_penyakit`, `ket_penyakit`) VALUES
(1, '170411100061', 'Batuk', 'Kadang lama Kali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_validasiberkas`
--

CREATE TABLE `tbl_validasiberkas` (
  `nim` char(12) NOT NULL,
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
-- Dumping data untuk tabel `tbl_validasiberkas`
--

INSERT INTO `tbl_validasiberkas` (`nim`, `pass_foto`, `surat_pernyataan`, `ktp_penghuni`, `ktp_ayah`, `ktp_ibu`, `kartu_keluarga`, `kwitansi_daftar`, `kwitansi_karakter`, `surat_dokter`) VALUES
('170211100003', '0', '0', '0', '0', '1', '0', '0', '0', '0'),
('170411100061', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
('170411100888', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('170511100038', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('170611100032', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('1706600999', '1', '1', '1', '1', '0', '0', '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `FK_RELATIONSHIP_14` (`nim`);

--
-- Indeks untuk tabel `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indeks untuk tabel `tbl_hobi`
--
ALTER TABLE `tbl_hobi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RELATIONSHIP_7` (`nim`);

--
-- Indeks untuk tabel `tbl_jalurmasuk`
--
ALTER TABLE `tbl_jalurmasuk`
  ADD PRIMARY KEY (`id_jalurmasuk`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `FK_RELATIONSHIP_4` (`id_fakultas`);

--
-- Indeks untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_gedung` (`id_gedung`),
  ADD KEY `kondisi` (`kondisi`);

--
-- Indeks untuk tabel `tbl_kelamin`
--
ALTER TABLE `tbl_kelamin`
  ADD PRIMARY KEY (`id_kelamin`);

--
-- Indeks untuk tabel `tbl_kondisi_kamar`
--
ALTER TABLE `tbl_kondisi_kamar`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indeks untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `FK_RELATIONSHIP_5` (`id_level`);

--
-- Indeks untuk tabel `tbl_musahil`
--
ALTER TABLE `tbl_musahil`
  ADD PRIMARY KEY (`nim_musahil`),
  ADD KEY `FK_RELATIONSHIP_16` (`username`);

--
-- Indeks untuk tabel `tbl_orangtua`
--
ALTER TABLE `tbl_orangtua`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `FK_RELATIONSHIP_11` (`nim`);

--
-- Indeks untuk tabel `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RELATIONSHIP_9` (`nim`);

--
-- Indeks untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `FK_RELATIONSHIP_1` (`id_kelamin`),
  ADD KEY `FK_RELATIONSHIP_2` (`id_jalurmasuk`),
  ADD KEY `FK_RELATIONSHIP_3` (`id_jurusan`),
  ADD KEY `FK_RELATIONSHIP_6` (`username`);

--
-- Indeks untuk tabel `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indeks untuk tabel `tbl_penghuni_tetap`
--
ALTER TABLE `tbl_penghuni_tetap`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kamar` (`kamar`);

--
-- Indeks untuk tabel `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RELATIONSHIP_8` (`nim`);

--
-- Indeks untuk tabel `tbl_riwayatpendidikan`
--
ALTER TABLE `tbl_riwayatpendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RELATIONSHIP_12` (`nim`),
  ADD KEY `FK_RELATIONSHIP_17` (`id_pendidikan`);

--
-- Indeks untuk tabel `tbl_riwayatsakit`
--
ALTER TABLE `tbl_riwayatsakit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RELATIONSHIP_10` (`nim`);

--
-- Indeks untuk tabel `tbl_validasiberkas`
--
ALTER TABLE `tbl_validasiberkas`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `FK_RELATIONSHIP_15` (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT untuk tabel `tbl_hobi`
--
ALTER TABLE `tbl_hobi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayatpendidikan`
--
ALTER TABLE `tbl_riwayatpendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayatsakit`
--
ALTER TABLE `tbl_riwayatsakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_hobi`
--
ALTER TABLE `tbl_hobi`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`id_fakultas`) REFERENCES `tbl_fakultas` (`id_fakultas`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id_level`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_musahil`
--
ALTER TABLE `tbl_musahil`
  ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`username`) REFERENCES `tbl_login` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_orangtua`
--
ALTER TABLE `tbl_orangtua`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`id_kelamin`) REFERENCES `tbl_kelamin` (`id_kelamin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`id_jalurmasuk`) REFERENCES `tbl_jalurmasuk` (`id_jalurmasuk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`username`) REFERENCES `tbl_login` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_riwayatpendidikan`
--
ALTER TABLE `tbl_riwayatpendidikan`
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`id_pendidikan`) REFERENCES `tbl_pendidikan` (`id_pendidikan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_riwayatsakit`
--
ALTER TABLE `tbl_riwayatsakit`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_validasiberkas`
--
ALTER TABLE `tbl_validasiberkas`
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`) ON UPDATE CASCADE;
COMMIT;
