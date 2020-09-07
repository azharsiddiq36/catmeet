-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2020 at 06:24 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anabul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatting`
--

CREATE TABLE `tbl_chatting` (
  `chatting_id` int(11) NOT NULL,
  `chatting_text` text NOT NULL,
  `chatting_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chatting_status` enum('delivered','send','read') NOT NULL,
  `chatting_kontak_id` int(11) NOT NULL,
  `chatting_pengguna_id` int(11) NOT NULL,
  `chatting_pengguna_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chatting`
--

INSERT INTO `tbl_chatting` (`chatting_id`, `chatting_text`, `chatting_tanggal`, `chatting_status`, `chatting_kontak_id`, `chatting_pengguna_id`, `chatting_pengguna_id2`) VALUES
(1, 'Pagi Bro', '2020-03-22 13:00:08', 'read', 1, 1, 5),
(2, 'Pagi Juga', '2020-03-22 14:00:08', 'read', 1, 5, 1),
(3, 'Apa benar ini pemilik kucing asdasd', '2020-03-22 13:14:37', 'read', 1, 1, 5),
(4, 'iya benar, kenapa tu ?', '2020-03-22 13:15:08', 'read', 1, 5, 1),
(5, 'Dude ?', '2020-03-23 12:11:11', 'delivered', 2, 1, 2),
(6, 'Yo Whats up\'s?', '2020-03-23 12:43:51', 'read', 3, 11, 1),
(7, 'Kucingnya ready?', '2020-04-14 22:23:40', 'read', 1, 1, 5),
(8, 'ready gan, udah konak doi', '2020-04-14 22:25:13', 'read', 1, 5, 1),
(9, 'jantan apa betina?', '2020-04-15 09:28:06', 'delivered', 1, 1, 5),
(11, 'betina', '2020-04-15 09:34:43', 'delivered', 1, 1, 5),
(12, 'lah kok jawab sendiri wkwkwk', '2020-04-15 09:50:58', 'delivered', 1, 1, 5),
(18, 'gan?', '2020-04-15 15:25:27', 'delivered', 1, 1, 12),
(19, 'tes', '2020-04-15 15:31:26', 'read', 1, 1, 12),
(20, 'bro', '2020-04-15 16:02:55', 'read', 11, 1, 12),
(21, 'Sory gan baru on', '2020-04-15 16:05:44', 'read', 1, 5, 1),
(22, 'please', '2020-04-15 16:10:29', 'read', 11, 1, 12),
(23, 'halo', '2020-05-15 10:56:35', 'delivered', 3, 1, 2),
(24, '5ee', '2020-06-29 22:33:54', 'read', 11, 1, 12),
(25, 'kepala', '2020-06-29 22:34:23', 'read', 11, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_diri`
--

CREATE TABLE `tbl_data_diri` (
  `data_diri_id` int(11) NOT NULL,
  `data_diri_pengguna_id` int(11) NOT NULL,
  `data_diri_foto_ktp` varchar(50) NOT NULL,
  `data_diri_foto_pengguna` varchar(50) DEFAULT NULL,
  `data_diri_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_diri`
--

INSERT INTO `tbl_data_diri` (`data_diri_id`, `data_diri_pengguna_id`, `data_diri_foto_ktp`, `data_diri_foto_pengguna`, `data_diri_tanggal`) VALUES
(1, 1, 'kucing.png', 'kucing.png', '2019-10-14 10:45:29'),
(11, 5, '1572458314055.jpg', '1572458322402.jpg', '2019-10-31 00:58:42'),
(12, 2, '1572458687983.jpg', '1572458698617.jpg', '2019-10-31 01:04:55'),
(18, 11, '1572459700494.jpg', '1572459708209.jpg', '2019-10-31 01:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_informasi`
--

CREATE TABLE `tbl_informasi` (
  `informasi_id` int(11) NOT NULL,
  `informasi_nama` varchar(50) NOT NULL,
  `informasi_jenis_kucing` varchar(50) NOT NULL,
  `informasi_deskripsi` text NOT NULL,
  `informasi_temperamen` varchar(100) NOT NULL,
  `informasi_rentang_hidup` varchar(100) NOT NULL,
  `informasi_wikipedia_url` varchar(100) NOT NULL,
  `informasi_berat` varchar(50) NOT NULL,
  `informasi_asal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`informasi_id`, `informasi_nama`, `informasi_jenis_kucing`, `informasi_deskripsi`, `informasi_temperamen`, `informasi_rentang_hidup`, `informasi_wikipedia_url`, `informasi_berat`, `informasi_asal`) VALUES
(1, 'Kucing Bulu Pendek Warna Point', 'Domestik', 'adalah <a href=\"https://id.wikipedia.org/wiki/Ras_kucing\" target=\"\" rel=\"\">ras kucing</a> <a href=\"https://id.wikipedia.org/wiki/Kucing_domestik\" target=\"\" rel=\"\">domestik</a> yang merupakan variasi dimakan ayam', 'Mantap', '10 tahun', 'https://id.wikipedia.org/wiki/Kucing_bulu_pendek_warna_poin', '5 kg', 'Amerika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_kontes`
--

CREATE TABLE `tbl_jenis_kontes` (
  `jenis_kontes_id` int(11) NOT NULL,
  `jenis_kontes_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_kontes`
--

INSERT INTO `tbl_jenis_kontes` (`jenis_kontes_id`, `jenis_kontes_nama`) VALUES
(1, 'International Cat Show'),
(2, 'National Cat Show'),
(3, 'Propaganda Cat Show');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'persia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `komentar_id` int(11) NOT NULL,
  `komentar_pengguna_id` int(11) NOT NULL,
  `komentar_deskripsi` text NOT NULL,
  `komentar_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `komentar_postingan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`komentar_id`, `komentar_pengguna_id`, `komentar_deskripsi`, `komentar_tanggal`, `komentar_postingan_id`) VALUES
(1, 2, 'Mantap Gan, Sertakan Link tapi', '2019-10-15 21:16:10', 1),
(2, 2, 'Masih menunggu Link nya gan', '2019-10-17 21:16:10', 1),
(3, 1, 'Ayam apa kucing?', '2020-04-04 11:49:22', 1),
(4, 1, 'gas?', '2020-04-04 12:51:28', 1),
(5, 1, 'oke lah', '2020-04-04 13:03:39', 1),
(6, 1, 'Whiskas?', '2020-04-04 13:24:12', 2),
(7, 1, 'Serius?', '2020-04-04 13:24:37', 2),
(8, 1, 'sip', '2020-04-04 13:25:27', 1),
(9, 1, 'oke', '2020-04-04 13:31:48', 1),
(10, 1, 'sip', '2020-04-04 13:38:59', 1),
(11, 1, 'serius', '2020-04-04 13:39:22', 2),
(12, 1, 'Ga jelas', '2020-04-04 14:01:06', 3),
(13, 1, 'ga jelas', '2020-04-08 14:39:11', 4),
(14, 1, 'yuu', '2020-06-29 22:13:33', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontak`
--

CREATE TABLE `tbl_kontak` (
  `kontak_id` int(11) NOT NULL,
  `kontak_pengguna_id` int(11) NOT NULL,
  `kontak_pengguna_id2` int(11) NOT NULL,
  `kontak_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kontak_tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kontak`
--

INSERT INTO `tbl_kontak` (`kontak_id`, `kontak_pengguna_id`, `kontak_pengguna_id2`, `kontak_tanggal`, `kontak_tanggal_update`) VALUES
(1, 1, 5, '2020-03-22 12:59:50', '2020-04-15 00:00:00'),
(2, 2, 1, '2020-03-22 20:52:07', '2020-03-23 13:43:51'),
(3, 11, 1, '2020-03-23 12:42:43', '2020-05-15 10:56:35'),
(11, 1, 12, '2020-04-15 16:02:55', '2020-06-29 10:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontes`
--

CREATE TABLE `tbl_kontes` (
  `kontes_id` int(10) NOT NULL,
  `kontes_nama` varchar(120) NOT NULL,
  `kontes_lokasi` varchar(120) NOT NULL,
  `kontes_provinsi` varchar(50) NOT NULL,
  `kontes_kabupaten` varchar(50) NOT NULL,
  `kontes_kecamatan` varchar(50) NOT NULL,
  `kontes_desa` varchar(50) NOT NULL,
  `kontes_description` text NOT NULL,
  `kontes_jenis` int(10) NOT NULL,
  `kontes_details` text NOT NULL,
  `kontes_kuota` int(10) NOT NULL,
  `kontes_tanggal_mulai` date NOT NULL,
  `kontes_tanggal_selesai` date NOT NULL,
  `kontes_status` enum('menunggu','disetujui','selesai','ditolak') NOT NULL,
  `kontes_biaya` bigint(20) NOT NULL,
  `kontes_jumlah_pemesan` int(10) NOT NULL,
  `kontes_nomor` varchar(20) NOT NULL,
  `kontes_foto` varchar(100) NOT NULL,
  `kontes_pengaju_id` int(11) NOT NULL,
  `kontes_tanggal_pengajuan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kontes`
--

INSERT INTO `tbl_kontes` (`kontes_id`, `kontes_nama`, `kontes_lokasi`, `kontes_provinsi`, `kontes_kabupaten`, `kontes_kecamatan`, `kontes_desa`, `kontes_description`, `kontes_jenis`, `kontes_details`, `kontes_kuota`, `kontes_tanggal_mulai`, `kontes_tanggal_selesai`, `kontes_status`, `kontes_biaya`, `kontes_jumlah_pemesan`, `kontes_nomor`, `kontes_foto`, `kontes_pengaju_id`, `kontes_tanggal_pengajuan`) VALUES
(2, 'Covid 19 Cat Show', 'online', 'Sumatera Utara', 'Kab. Tapanuli Selatan', ' Tano Tombangan Angkola', 'Panabari Huta Tonga', 'Kontes dilakukan secara onlen', 1, '1. punya hp\r\n2. punya duit\r\n3. punya kucing', 90, '2020-05-15', '2020-05-15', 'selesai', 10000, 22, '081275753271', 'earth1.png', 1, '2020-05-01 11:45:21'),
(3, 'Covid-19 Cat Show', 'online', 'Jawa Barat', 'Kab. Purwakarta', ' Pasawahan', 'Selaawi', 'Dana kontes akan disumbangkan untuk kegiatan melawan covid 19', 1, '1. peserta merekam anabul dirumah masing-masing\r\n2. video dengan like terbanyak akan di jadikan pemenang\r\n3. catshow akan di upload ke instagram catmate dengan hastag #melawancovid19', 18, '2020-05-15', '2020-05-18', 'selesai', 20000, 2, '081275753271', 'calendar1.png', 1, '2020-05-01 11:48:59'),
(4, 'coba', 'nsjsmsk', 'ACEH', 'KABUPATEN SIMEULUE', 'TEUPAH SELATAN', 'LATIUNG', 'bsnsnak', 1, '1. sbsnsjsk\n', 20, '2020-05-03', '2020-05-04', 'menunggu', 200, 0, '081275753271', 'IMG_20200229_153522.jpg', 1, '2020-05-03 14:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kucing`
--

CREATE TABLE `tbl_kucing` (
  `kucing_id` int(11) NOT NULL,
  `kucing_nama` varchar(50) NOT NULL,
  `kucing_jenis` varchar(50) NOT NULL,
  `kucing_pengguna_id` int(10) NOT NULL,
  `kucing_jk` enum('jantan','betina') NOT NULL,
  `kucing_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kucing`
--

INSERT INTO `tbl_kucing` (`kucing_id`, `kucing_nama`, `kucing_jenis`, `kucing_pengguna_id`, `kucing_jk`, `kucing_foto`) VALUES
(1, 'putiah', 'abyssinian', 1, 'betina', 'putiah.jpg'),
(2, 'lepay', 'abyssinian', 1, 'jantan', 'lepay.jpg'),
(4, 'Taiga', 'toyger', 1, 'betina', 'IMG-20200308-WA0000.jpg'),
(6, 'Tamrin', 'Devon Rex', 12, 'jantan', 'IMG_20200415_0826511.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasangan`
--

CREATE TABLE `tbl_pasangan` (
  `pasangan_id` int(11) NOT NULL,
  `pasangan_kucing_id` int(11) NOT NULL,
  `pasangan_hari` varchar(200) NOT NULL,
  `pasangan_tanggal_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pasangan_pengguna_id` int(11) NOT NULL,
  `pasangan_status` enum('menunggu','selesai') NOT NULL,
  `pasangan_tanggal_expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pasangan`
--

INSERT INTO `tbl_pasangan` (`pasangan_id`, `pasangan_kucing_id`, `pasangan_hari`, `pasangan_tanggal_post`, `pasangan_pengguna_id`, `pasangan_status`, `pasangan_tanggal_expired`) VALUES
(8, 4, 'senin,selasa,rabu,kamis,jumat,sabtu,minggu', '2020-03-18 14:16:13', 1, 'menunggu', '2020-03-25 20:33:45'),
(9, 1, 'senin,selasa,kamis,jumat', '2020-03-19 11:28:23', 5, 'menunggu', '2020-03-26 11:28:23'),
(10, 6, 'senin,rabu,jumat,minggu', '2020-04-15 08:27:56', 12, 'menunggu', '2020-04-22 08:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `pembayaran_pemesanan_id` int(11) NOT NULL,
  `pembayaran_pengguna_id` int(11) NOT NULL,
  `pembayaran_jumlah` bigint(20) NOT NULL,
  `pembayaran_bukti` varchar(100) DEFAULT NULL,
  `pembayaran_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pembayaran_status` enum('menunggu','selesai','setuju','ditolak') NOT NULL,
  `pembayaran_kontes_id` int(11) NOT NULL,
  `pembayaran_jenis` enum('saldo','resi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`pembayaran_id`, `pembayaran_pemesanan_id`, `pembayaran_pengguna_id`, `pembayaran_jumlah`, `pembayaran_bukti`, `pembayaran_tanggal`, `pembayaran_status`, `pembayaran_kontes_id`, `pembayaran_jenis`) VALUES
(12, 1, 1, 20000, 'Menu_0121.png', '2020-05-14 05:25:03', 'setuju', 2, 'resi'),
(13, 2, 1, 40000, NULL, '2020-05-14 17:15:10', 'setuju', 3, 'saldo'),
(14, 3, 1, 40000, 'IMG-20200514-WA0023.jpg', '2020-05-15 10:43:16', 'setuju', 2, 'resi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `pemesanan_pengguna_id` int(11) NOT NULL,
  `pemesanan_jumlah` bigint(20) NOT NULL,
  `pemesanan_total` bigint(20) NOT NULL,
  `pemesanan_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pemesanan_status` enum('menunggu','setuju','ditolak') NOT NULL,
  `pemesanan_kontes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`pemesanan_id`, `pemesanan_pengguna_id`, `pemesanan_jumlah`, `pemesanan_total`, `pemesanan_tanggal`, `pemesanan_status`, `pemesanan_kontes_id`) VALUES
(1, 1, 2, 40000, '2020-05-14 16:32:56', 'menunggu', 3),
(2, 1, 2, 40000, '2020-05-14 16:32:56', 'menunggu', 3),
(3, 1, 4, 40000, '2020-05-15 10:40:27', 'menunggu', 2),
(4, 1, 4, 40000, '2020-07-02 08:35:50', 'menunggu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penarikan`
--

CREATE TABLE `tbl_penarikan` (
  `penarikan_id` int(11) NOT NULL,
  `penarikan_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penarikan_jumlah` bigint(20) NOT NULL,
  `penarikan_bank` varchar(20) NOT NULL,
  `penarikan_no_rek` varchar(50) NOT NULL,
  `penarikan_pengaju` int(11) NOT NULL,
  `penarikan_status` enum('menunggu','setuju') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penarikan`
--

INSERT INTO `tbl_penarikan` (`penarikan_id`, `penarikan_tanggal`, `penarikan_jumlah`, `penarikan_bank`, `penarikan_no_rek`, `penarikan_pengaju`, `penarikan_status`) VALUES
(1, '2020-06-05 13:43:26', 20000, 'BRI Syariah', '123456789', 1, 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(10) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_username` varchar(120) NOT NULL,
  `pengguna_foto` text NOT NULL,
  `pengguna_password` varchar(128) NOT NULL,
  `pengguna_email` varchar(120) NOT NULL,
  `pengguna_hak_akses` enum('administrator','pengguna') NOT NULL,
  `pengguna_jenis_kelamin` enum('Masukkan Jenis Kelamin','l','p') NOT NULL,
  `pengguna_alamat` text NOT NULL,
  `pengguna_status` enum('aktif','nonaktif') NOT NULL,
  `pengguna_provinsi` varchar(50) DEFAULT NULL,
  `pengguna_kabupaten` varchar(50) DEFAULT NULL,
  `pengguna_kecamatan` varchar(50) DEFAULT NULL,
  `pengguna_desa` varchar(50) DEFAULT NULL,
  `pengguna_nomor` varchar(50) NOT NULL,
  `pengguna_latitude` text,
  `pengguna_longitude` text,
  `pengguna_saldo` bigint(20) NOT NULL,
  `pengguna_tgl_buat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_rekening` varchar(120) DEFAULT NULL,
  `pengguna_nama_rekening` varchar(120) DEFAULT NULL,
  `pengguna_bank` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_username`, `pengguna_foto`, `pengguna_password`, `pengguna_email`, `pengguna_hak_akses`, `pengguna_jenis_kelamin`, `pengguna_alamat`, `pengguna_status`, `pengguna_provinsi`, `pengguna_kabupaten`, `pengguna_kecamatan`, `pengguna_desa`, `pengguna_nomor`, `pengguna_latitude`, `pengguna_longitude`, `pengguna_saldo`, `pengguna_tgl_buat`, `pengguna_rekening`, `pengguna_nama_rekening`, `pengguna_bank`) VALUES
(1, 'Azhar Siddiq', 'azhar', 'IMG-20200313-WA0086.jpg', '943811a65c02a2b0563d2d997b83d016', 'azharsiddiq36@gmail.com', 'administrator', 'l', 'jalan suka karya 13', 'aktif', 'Riau', 'Kota Pekanbaru', 'Kecamatan Tampan', 'Simpang Baru', '081275753721', '0.47859690000000005', '101.3641564', 220000, '2019-10-14 11:39:30', NULL, NULL, NULL),
(2, 'admin', 'siddiq', 'kucing.png', '943811a65c02a2b0563d2d997b83d016', 'administrator@gmail.com', 'pengguna', 'l', 'jalan pahlawan', 'aktif', 'Riau', 'Kota Pekanbaru', 'Kecamatan Tampan', 'Simpang Baru', '081277532712123', '0', '0', 0, '2019-10-14 11:39:30', NULL, NULL, NULL),
(5, 'Agitry Wahyu', 'agitry', 'malayan.jpg', '943811a65c02a2b0563d2d997b83d016', 'agitrywahyu10@gmail.com', 'pengguna', 'Masukkan Jenis Kelamin', 'belum', 'aktif', 'Riau', 'kabupaten bengkalis', 'Mandau', 'Talang Mandi', 'belum', 'belum', 'belum', 0, '2019-10-25 01:07:41', NULL, NULL, NULL),
(11, 'azhar siddiq', 'azhar36', 'IMG_20191104_105508.jpg', '943811a65c02a2b0563d2d997b83d016', '', 'pengguna', 'Masukkan Jenis Kelamin', 'belum', 'aktif', 'Riau', 'Bengkalis', 'Mandau', 'Talang Mandi', '081275753271', 'belum', 'belum', 0, '2019-10-27 09:50:05', NULL, NULL, NULL),
(12, 'andre vari antoni', 'andre', 'rsz_success.jpg', '943811a65c02a2b0563d2d997b83d016', 'andre@rockstar.com', 'pengguna', 'l', 'jalan suka karya 13', 'aktif', 'Riau', 'Bengkalis Regency', 'Mandau', 'Talang Mandi', '081275753721', '1.2583366', '101.2212385', 0, '2020-04-15 08:24:14', NULL, NULL, NULL),
(13, 'ajar', 'ajar', 'belum', '943811a65c02a2b0563d2d997b83d016', 'azhar.siddiq@students.uin-suska.ac.id', 'pengguna', 'Masukkan Jenis Kelamin', 'belum', 'aktif', 'belum', 'belum', 'belum', 'belum', '081275753271', 'belum', 'belum', 0, '2020-07-19 19:36:33', NULL, NULL, NULL),
(14, 'asda', 'asda', 'belum', '943811a65c02a2b0563d2d997b83d016', 'ads@gmail.com', 'pengguna', 'Masukkan Jenis Kelamin', 'belum', 'nonaktif', 'belum', 'belum', 'belum', 'belum', '081275753271', 'belum', 'belum', 0, '2020-07-28 14:54:09', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengisian`
--

CREATE TABLE `tbl_pengisian` (
  `pengisian_id` int(11) NOT NULL,
  `pengisian_pengaju_id` int(11) NOT NULL,
  `pengisian_status` enum('menunggu','diterima','ditolak') NOT NULL,
  `pengisian_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pengisian_jumlah` bigint(20) NOT NULL,
  `pengisian_bukti` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengisian`
--

INSERT INTO `tbl_pengisian` (`pengisian_id`, `pengisian_pengaju_id`, `pengisian_status`, `pengisian_tanggal`, `pengisian_jumlah`, `pengisian_bukti`) VALUES
(1, 1, 'menunggu', '2020-06-03 02:40:36', 20000, 'commerce.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjadwalan`
--

CREATE TABLE `tbl_penjadwalan` (
  `penjadwalan_id` int(11) NOT NULL,
  `penjadwalan_deskripsi` text NOT NULL,
  `penjadwalan_tanggal` date NOT NULL,
  `penjadwalan_id_pengaju` int(11) NOT NULL,
  `penjadwalan_status` enum('setuju','menunggu','batal') NOT NULL,
  `penjadwalan_lokasi` text NOT NULL,
  `penjadwalan_id_penerima` int(11) NOT NULL,
  `penjadwalan_id_kucing_pengaju` int(11) NOT NULL,
  `penjadwalan_id_kucing_penerima` int(11) NOT NULL,
  `penjadwalan_tgl_pengajuan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penjadwalan_tgl_terima` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjadwalan`
--

INSERT INTO `tbl_penjadwalan` (`penjadwalan_id`, `penjadwalan_deskripsi`, `penjadwalan_tanggal`, `penjadwalan_id_pengaju`, `penjadwalan_status`, `penjadwalan_lokasi`, `penjadwalan_id_penerima`, `penjadwalan_id_kucing_pengaju`, `penjadwalan_id_kucing_penerima`, `penjadwalan_tgl_pengajuan`, `penjadwalan_tgl_terima`) VALUES
(2, 'Perkawinan Kucing', '2020-04-29', 12, 'setuju', 'jalan senapelan', 1, 6, 1, '2020-04-18 15:23:01', '2020-04-24 08:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_postingan`
--

CREATE TABLE `tbl_postingan` (
  `postingan_id` int(11) NOT NULL,
  `postingan_deskripsi` text NOT NULL,
  `postingan_id_pengguna` int(11) NOT NULL,
  `postingan_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postingan_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_postingan`
--

INSERT INTO `tbl_postingan` (`postingan_id`, `postingan_deskripsi`, `postingan_id_pengguna`, `postingan_tanggal`, `postingan_status`) VALUES
(1, 'ayam', 1, '2019-08-15 00:00:00', 'aktif'),
(2, 'makanan kucing paling bagus apa ya ?\n', 1, '2020-04-03 16:07:15', 'aktif'),
(3, 'Mantap Mantap', 1, '2020-04-04 13:59:41', 'aktif'),
(4, 'apapapapapapappapapapalapappspapalslslallLalzlzlLL', 1, '2020-04-08 14:39:00', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `report_id` int(11) NOT NULL,
  `report_alasan` text NOT NULL,
  `report_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report_postingan_id` int(11) NOT NULL,
  `report_pengguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`report_id`, `report_alasan`, `report_tanggal`, `report_postingan_id`, `report_pengguna_id`) VALUES
(1, 'Tidak Tampan', '2019-10-17 17:04:01', 1, 1),
(2, 'Tidak tau', '2020-04-03 16:22:08', 2, 1),
(3, 'Tidak relevan', '2020-04-04 13:59:57', 3, 1),
(4, '', '2020-04-24 20:50:48', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saldo`
--

CREATE TABLE `tbl_saldo` (
  `saldo_id` int(11) NOT NULL,
  `saldo_jenis` enum('debit','kredit') NOT NULL,
  `saldo_pengguna_id` int(11) NOT NULL,
  `saldo_jumlah` bigint(20) NOT NULL,
  `saldo_keterangan` text NOT NULL,
  `saldo_bukti` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_saldo`
--

INSERT INTO `tbl_saldo` (`saldo_id`, `saldo_jenis`, `saldo_pengguna_id`, `saldo_jumlah`, `saldo_keterangan`, `saldo_bukti`) VALUES
(1, 'debit', 1, 40000, 'pembayaran tiket untuk event Covid 19 Cat Show', NULL),
(2, 'debit', 1, 40000, 'pembayaran tiket untuk event Covid 19 Cat Show', NULL),
(3, 'debit', 1, 40000, 'pembayaran tiket untuk event Covid 19 Cat Show', NULL),
(4, 'debit', 1, 40000, 'pembayaran tiket untuk event Covid-19 Cat Show', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toko`
--

CREATE TABLE `tbl_toko` (
  `toko_id` int(10) NOT NULL,
  `toko_nama` varchar(50) NOT NULL,
  `toko_latitude` text NOT NULL,
  `toko_longitude` text NOT NULL,
  `toko_deskripsi` text NOT NULL,
  `toko_nomor` varchar(50) NOT NULL,
  `toko_provinsi` varchar(50) NOT NULL,
  `toko_kabupaten` varchar(50) NOT NULL,
  `toko_kecamatan` varchar(50) NOT NULL,
  `toko_desa` varchar(50) NOT NULL,
  `toko_pengguna_id` int(10) NOT NULL,
  `toko_status` enum('menunggu','aktif','nonaktif') NOT NULL,
  `toko_alamat` text NOT NULL,
  `toko_tanggal_pengajuan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `toko_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_toko`
--

INSERT INTO `tbl_toko` (`toko_id`, `toko_nama`, `toko_latitude`, `toko_longitude`, `toko_deskripsi`, `toko_nomor`, `toko_provinsi`, `toko_kabupaten`, `toko_kecamatan`, `toko_desa`, `toko_pengguna_id`, `toko_status`, `toko_alamat`, `toko_tanggal_pengajuan`, `toko_foto`) VALUES
(1, 'Ayam CatShop mantap', '1.2398856', '101.2621087', 'menjual ayam dan mainan', '0812757532716464', 'Riau', 'Kabupaten Bengkalis', 'Kecamatan Mandau', 'Talang Mandi', 1, 'aktif', 'mantap', '2019-08-24 18:39:28', 'chartreux4.jpg'),
(2, 'Tampol Pet Shop', '12763912', '12412', 'menjual segala jenis kebutuhan hidup semasa corona', '081275753271', 'riau', 'bengkalis', 'mandau', 'talang mandi', 5, 'aktif', 'jalan pahlawan no 178', '2020-03-31 13:27:51', 'chartreux4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  ADD PRIMARY KEY (`chatting_id`);

--
-- Indexes for table `tbl_data_diri`
--
ALTER TABLE `tbl_data_diri`
  ADD PRIMARY KEY (`data_diri_id`);

--
-- Indexes for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`informasi_id`);

--
-- Indexes for table `tbl_jenis_kontes`
--
ALTER TABLE `tbl_jenis_kontes`
  ADD PRIMARY KEY (`jenis_kontes_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indexes for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  ADD PRIMARY KEY (`kontak_id`);

--
-- Indexes for table `tbl_kontes`
--
ALTER TABLE `tbl_kontes`
  ADD PRIMARY KEY (`kontes_id`);

--
-- Indexes for table `tbl_kucing`
--
ALTER TABLE `tbl_kucing`
  ADD PRIMARY KEY (`kucing_id`);

--
-- Indexes for table `tbl_pasangan`
--
ALTER TABLE `tbl_pasangan`
  ADD PRIMARY KEY (`pasangan_id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`);

--
-- Indexes for table `tbl_penarikan`
--
ALTER TABLE `tbl_penarikan`
  ADD PRIMARY KEY (`penarikan_id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `tbl_pengisian`
--
ALTER TABLE `tbl_pengisian`
  ADD PRIMARY KEY (`pengisian_id`);

--
-- Indexes for table `tbl_penjadwalan`
--
ALTER TABLE `tbl_penjadwalan`
  ADD PRIMARY KEY (`penjadwalan_id`);

--
-- Indexes for table `tbl_postingan`
--
ALTER TABLE `tbl_postingan`
  ADD PRIMARY KEY (`postingan_id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD PRIMARY KEY (`saldo_id`);

--
-- Indexes for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  MODIFY `chatting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_data_diri`
--
ALTER TABLE `tbl_data_diri`
  MODIFY `data_diri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  MODIFY `informasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_jenis_kontes`
--
ALTER TABLE `tbl_jenis_kontes`
  MODIFY `jenis_kontes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  MODIFY `kontak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_kontes`
--
ALTER TABLE `tbl_kontes`
  MODIFY `kontes_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_kucing`
--
ALTER TABLE `tbl_kucing`
  MODIFY `kucing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_pasangan`
--
ALTER TABLE `tbl_pasangan`
  MODIFY `pasangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_penarikan`
--
ALTER TABLE `tbl_penarikan`
  MODIFY `penarikan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_pengisian`
--
ALTER TABLE `tbl_pengisian`
  MODIFY `pengisian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_penjadwalan`
--
ALTER TABLE `tbl_penjadwalan`
  MODIFY `penjadwalan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_postingan`
--
ALTER TABLE `tbl_postingan`
  MODIFY `postingan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  MODIFY `saldo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  MODIFY `toko_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `statuspembayaran` ON SCHEDULE EVERY 1 DAY STARTS '2020-04-28 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO Update tbl_pembayaran SET pembayaran_status = 'selesai' WHERE date(pembayaran_expired) = CURDATE()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
