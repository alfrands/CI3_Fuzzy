-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 12:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekrut_ppsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id` int(11) NOT NULL,
  `id_berkas` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `foto_ktp` text NOT NULL,
  `foto_kk` text NOT NULL,
  `foto_pernyataan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id`, `nama_kriteria`, `bobot`) VALUES
(1, 'Kartu Tanda Penduduk (KTP)', '0.31'),
(2, 'Kartu Keluarga (KK)', '0.345'),
(3, 'Surat Pernyataan', '0.345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id` int(11) NOT NULL,
  `id_pendaftaran` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `ttl` text NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `tgl_pendaftaran` datetime NOT NULL,
  `status_verifikasi` varchar(50) NOT NULL,
  `status_pendaftaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `id_pengumuman` int(10) NOT NULL,
  `ket_pengumuman` text CHARACTER SET latin1 DEFAULT NULL,
  `tgl_pengumuman` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`id_pengumuman`, `ket_pengumuman`, `tgl_pengumuman`) VALUES
(1, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><strong><u>Keterangan :</u></strong></span></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;1.&nbsp;Registrasi daftar ulang dilaksanakan pada tanggal 8 &ndash; 11 Juli 2022&nbsp;pukul 08.00 &ndash; 14.00.</span></span></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;2. Mencetak dan membawa Surat Pengumuman ini sebagai bukti&nbsp; lulus seleksi.</span></span></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">&nbsp; &nbsp; &nbsp; &nbsp; 3.&nbsp;Membawa materi Rp. 6000,- sebanyak 2 lembar.</span></span></span></span></p>\r\n</body>\r\n</html>\r\n', '2021-04-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `id_penilaian` varchar(20) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kriteria_penduduk` varchar(11) NOT NULL,
  `kriteria_keluarga` varchar(11) NOT NULL,
  `kriteria_pernyataan` varchar(11) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `area_kerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kriteria`
--

CREATE TABLE `tbl_sub_kriteria` (
  `id_sub` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_kriteria`
--

INSERT INTO `tbl_sub_kriteria` (`id_sub`, `id_kriteria`, `nama_kriteria`, `nilai`, `keterangan`) VALUES
(1, 1, 'Kartu Tanda Penduduk (KTP)', '1', 'KTP DKI dan alamat di Pondok Kopi Jakarta Timur'),
(2, 1, 'Kartu Tanda Penduduk (KTP)', '0.75', 'KTP DKI dan alamat di Jakarta Timur (bukan Pondok Kopi)'),
(3, 1, 'Kartu Tanda Penduduk (KTP)', '0.5', 'KTP DKI dan alamat di Jakarta (bukan Pondok Kopi Jakarta Timur)'),
(4, 1, 'Kartu Tanda Penduduk (KTP)', '0.25', 'Tidak mempunyai KTP'),
(5, 1, 'Kartu Tanda Penduduk (KTP)', '0', 'KTP non DKI'),
(6, 2, 'Kartu Keluarga (KK)', '1', 'KK DKI dan alamat di Pondok Kopi Jakarta Timur'),
(7, 2, 'Kartu Keluarga (KK)', '0.75', 'KK DKI dan alamat di Jakarta Timur (bukan Pondok Kopi)'),
(8, 2, 'Kartu Keluarga (KK)', '0.5', 'KK DKI dan alamat di Jakarta (bukan Pondok Kopi Jakarta Timur)'),
(9, 2, 'Kartu Keluarga (KK)', '0', 'KK non DKI'),
(10, 3, 'Surat Pernyataan', '1', 'Tidak sedang menjabat sebagai pengurus RT/RW/LMK/FKDM'),
(11, 3, 'Surat Pernyataan', '0', 'Sedang menjabat sebagai pengurus RT/RW/LMK/FKDM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` text CHARACTER SET latin1 DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `website` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `telp` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `kabupaten` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `ketua_panitia` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nip_ketua` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tahun` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `no_surat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `kepsek` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nip_kepsek` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `level` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_lengkap`, `alamat`, `email`, `website`, `telp`, `kabupaten`, `ketua_panitia`, `nip_ketua`, `tahun`, `no_surat`, `kepsek`, `nip_kepsek`, `level`, `tgl_daftar`) VALUES
(1, 'admin', 'admin123', 'PPSU PONDOK KOPI', 'Jalan Arabika 3 Blok W. 7 RT. 009/06 Jakarta Timur', 'dki@jakarta.go.id', 'jakarta.go.id', '(021) 8631961', 'Pondok Kopi', 'Dra. Rahayu Ningtyas', '198909153007101112', '2022', '001/MA.11.12/KP.00.02/IV/2021', 'Drs. Asnawi Yanto', '198909153007101112', 'admin', '2021-12-21 00:00:00'),
(2, 'tim', 'tim123', 'PPSU PONDOK KOPI', 'Jalan Medan Merdeka Selatan 8-9 Jakarta Pusat, Jakarta, Indonesia', 'dki@jakarta.go.id', 'jakarta.go.id', '(+6221) 382 2255', 'Jakarta Timur', 'Dra. Rahayu Ningtyas', '198909153007101112', '2022', NULL, NULL, NULL, 'tim', '2021-12-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verifikasi`
--

CREATE TABLE `tbl_verifikasi` (
  `id_verifikasi` int(10) NOT NULL,
  `isi` text CHARACTER SET latin1 DEFAULT NULL,
  `ket` text CHARACTER SET latin1 DEFAULT NULL,
  `tgl_verifikasi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_verifikasi`
--

INSERT INTO `tbl_verifikasi` (`id_verifikasi`, `isi`, `ket`, `tgl_verifikasi`) VALUES
(1, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p style=\"margin-left:0in; margin-right:0in\"><u><strong><span style=\"font-size:11pt\"><span style=\"line-height:107%\"><span style=\"font-family:Calibri,sans-serif\">Materi Tes Potensi Akademik</span></span></span></strong></u></p>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:11pt\"><span style=\"line-height:107%\"><span style=\"font-family:Calibri,sans-serif\">Bahasa Indonesia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 10 Soal</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"line-height:107%\"><span style=\"font-family:Calibri,sans-serif\">Matematika&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 10 Soal</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"line-height:107%\"><span style=\"font-family:Calibri,sans-serif\">IPA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 10 Soal</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"line-height:107%\"><span style=\"font-family:Calibri,sans-serif\">PAI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 10 Soal</span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><u>Hari Tanggal tes : </u></strong></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;tanggal 06&nbsp;Juli 2021</span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><u>Waktu Tes potensi Akademik :</u></strong></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp; &nbsp; &nbsp; &nbsp; Sesi 1&nbsp; : 07.00 - 09.00</span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp; &nbsp; &nbsp; &nbsp; Sesi 2&nbsp; : 09.30 - 11.30</span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">*<em>catatan : </em></span></span></strong><br />\r\n<strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><em>jadwal ujian bisa berubah sewaktu - waktu&nbsp; Update infomasi di web PPDB </em></span></span><em><span style=\"font-size:11.0pt\">peserta ujian datang 15&nbsp; menit sebelum&nbsp;tes dimulai.</span></em></strong></p>\r\n</body>\r\n</html>\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web`
--

CREATE TABLE `tbl_web` (
  `id_web` int(10) NOT NULL,
  `status_rekrutmen` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web`
--

INSERT INTO `tbl_web` (`id_web`, `status_rekrutmen`, `tgl_diubah`) VALUES
(1, 'buka', '2022-01-01 00:04:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_verifikasi`
--
ALTER TABLE `tbl_verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`);

--
-- Indexes for table `tbl_web`
--
ALTER TABLE `tbl_web`
  ADD PRIMARY KEY (`id_web`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_verifikasi`
--
ALTER TABLE `tbl_verifikasi`
  MODIFY `id_verifikasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_web`
--
ALTER TABLE `tbl_web`
  MODIFY `id_web` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
