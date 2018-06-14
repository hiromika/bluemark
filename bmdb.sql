-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2018 at 02:33 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c22portalbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE IF NOT EXISTS `detail_user` (
  `id_user` int(11) NOT NULL,
  `kode_user` int(4) unsigned zerofill NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jenis_kelamin` smallint(6) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL DEFAULT '1999-01-01',
  `agama` varchar(20) NOT NULL DEFAULT '0',
  `tlp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` varchar(250) NOT NULL DEFAULT '/assets/image/profile.jpg',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_user`, `kode_user`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `tlp`, `email`, `alamat`, `sekolah`, `status`, `foto`) VALUES
(1, 0001, 'Admin', 1, 'Jakarta', '1995-08-16', '1', '088808548577', 'bmlearning@gmail.com', '', 'Unsada', '', './assets/image//night-walk-park-hd-wallpaper.jpg'),
(33, 0033, 'Suhardiansyah', 1, 'Jakarta', '1995-08-13', '1', 'suhardiansyah', 'suhardiansyah.hardi@gmail.com', 'jakarta', 'UNSADA', 'Gabut', './assets/image/about.png'),
(36, 0036, 'Farahiyah Hanifati', 2, 'Jakarta', '1996-06-24', '1', 'farahiyahhani', 'farahiyahhanifati24@gmail.com', 'jalan robusta raya gang sekolahan H.asmat RT001/07 no.49, pondok kopi, duren sawit, jakarta timur. 13460', '', '', './assets/image/images_(50).jpg'),
(43, 0043, 'dika', 1, 'jakarta', '2000-01-11', '1', 'bagusunsada@g', 'bagusunsada@gmail.com', 'Jakarta raya', '', '', './assets/image/11232587_1590374164563730_1068388785_n.jpg'),
(59, 0059, 'Pungky Muranto', 1, 'Jakarta', '1995-03-19', '1', '087772325600', 'pungkymuranto@gmail.com', 'H.I PUP Sektor V Blok I-11 No3B RT02/RW30', 'Universitas Darma Persada', 'Aktif', '/assets/image/profile.jpg'),
(80, 0080, 'ahya fadhlul salam', 0, '', '1999-01-01', '0', '', 'anjas.sutrisna@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(87, 0087, 'anggini eka putri', 0, '', '1999-01-01', '0', '', 'angginiekaputri25@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(89, 0089, 'yusfa tri bagustia', 0, '', '1999-01-01', '0', '', 'yusfatribagus@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(100, 0100, 'dewi yolanda elisabeth', 0, '', '1999-01-01', '0', '', 'dewiyolibeth@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(101, 0101, 'pangestu apri setiawan', 0, '', '1999-01-01', '0', '', 'Pangestu.apri.s@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(102, 0102, 'Arif Syaifudin', 0, '', '1999-01-01', '0', '', 'arifsyaifudin72@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(103, 0103, 'Achmad Sayuti,S.Kom.', 1, 'isi', '1993-09-01', '0', '0987654321', 'embowth@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(106, 0106, 'bambang S', 1, 'Jakarta', '1999-02-18', '1', '7648769', 'bambang@gmail.com', 'Cakung', 'asd', 'asd', './assets/image/bluemark_logo1.png'),
(117, 0117, 'Muftirandy Prayitno', 1, 'Manado', '1995-03-11', '1', 'muftirandy15@', 'r.diagonalley@gmail.com', 'Jl. Swasembada barat 23 ', 'Universitas Darma Persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(118, 0118, 'irsyad kholif ', 0, '', '1999-01-01', '0', '', 'vxsetsuna@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(119, 0119, 'Yulianto Nugroho', 0, '', '1999-01-01', '0', '', 'yn_sasuke14@yahoo.com', '', '', '', '/assets/image/profile.jpg'),
(120, 0120, 'Abdul Malik Kamalullah', 1, 'Purworejo', '1994-07-29', '1', '081315749722', 'kamalmalix@gmail.com', 'Kp. Jembatan No.30 RT/RW. 03/010\r\nCipinang Besar Selatan, Jatinegara, Jakarta Timur', 'Universitas Darma Persada', 'Pelajar', '/assets/image/profile.jpg'),
(122, 0122, 'Vieqri samputra', 1, 'Jakarta', '1996-08-12', '1', '089652386177', 'Vieqris@gmail.com', 'Bekasi', '', '', './assets/image/PhotoGrid_1485443984940.png'),
(123, 0123, 'Julfikri syahna', 1, 'Bekasi', '1995-07-21', '1', '082297129801', 'rdthiky@gmail.com', 'Bekasi regensi 1 blok 1 9 no.18', 'Universitas darma persada', 'Insya allah nikah', './assets/image/Screenshot_2017-08-26-18-21-32_com_instagram_android.png'),
(124, 0124, 'Acep azizirrohim', 1, 'Bekasi', '1996-12-08', '1', '081515824262', 'azizirohimacep@gmail.com', 'jln.caman raya rt/rw.003/004 no.73 jatibening pondok gede Bekasi', 'Universitas Darma Persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(126, 0126, 'Ilham Ramadhan', 1, '', '1999-01-01', '3', 'ilhamabaa97@g', 'ilhamabaa97@gmail.com', 'Jl.bunyu', '', '', '/assets/image/profile.jpg'),
(139, 0139, 'Riswan Alam Nauli', 0, '', '1999-01-01', '0', '', 'riswanalam181215@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(141, 0141, 'syahrul ramadhan', 0, '', '1999-01-01', '0', 'syahrulr98010', 'syahrulr980104@gmail.com', 'Trias estate blok G.9 no.48 kelurahan wanasari, kecamatan cibitung - kabupaten bekasi', '', '', '/assets/image/profile.jpg'),
(142, 0142, 'Supriyanto', 1, 'Jakarta', '1999-09-24', '1', '087887922414', 'supriyantopdw12@gmail.com', 'Jl. D.I. Panjaitan GG. Remaja II RT 004/03 No. 16, Cipinang Besar Utara, Jatinegara-Jakarta Timur', 'UNIVERSITAS DARMA PERSADA', 'aktif', './assets/image/merah.jpg'),
(143, 0143, 'Isnainy imro atun s ', 0, '', '1999-01-01', '0', '', 'isnainysholecha@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(145, 0145, 'rudi istianto', 0, '', '1999-01-01', '0', '', 'istiantorudi048@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(149, 0149, 'Muhammad Faisal Yudiansah', 0, '', '1999-01-01', '0', 'mfaisal.yudia', 'mfaisal.yudiansah@gmail.com', 'Jalan Kelurahan Raya. Komplek Duren Sawit Baru. Blok C5 no.24.\nKelurahan Duren Sawit. RT 06/RW 01', '', '', '/assets/image/profile.jpg'),
(150, 0150, 'Jodi istiawan', 1, 'Bekasi', '1998-02-16', '1', '082260115861', 'sabililah90@gmail.com', 'Jl.sabililah no 6 rt.03/02 Pondok ungu Bekasi Barat', 'Universitas darma persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(152, 0152, 'nanda fitri damayanti', 0, '', '1999-01-01', '0', '', 'nandafitri29@yahoo.co.id', '', '', '', '/assets/image/profile.jpg'),
(154, 0154, 'adityasetiaone', 0, '', '1999-01-01', '0', '', 'aditya.setiaone32@gmaol.com', '', '', '', '/assets/image/profile.jpg'),
(155, 0155, 'Bagus Unsada', 0, '', '1999-01-01', '0', 'bagusunsada@g', 'bagusunsada@gmail.com', 'jakarta', '', '', '/assets/image/profile.jpg'),
(158, 0158, 'Muhammad Ido Malda', 0, '', '1999-01-01', '0', 'idomalda@gmai', 'idomalda@gmail.com', 'Jl benteng mas 6 rt. 10 rw. 6 kelurahan sunter kelurahan tanjung Priok', '', '', '/assets/image/profile.jpg'),
(159, 0159, 'alpin', 1, '', '1999-01-01', '0', 'alpinthemove@', 'alpinthemove@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(162, 0162, 'Denis Ahmad', 0, '', '1999-01-01', '0', '', 'denisahmad0676@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(163, 0163, 'Dwi irawan', 0, '', '1999-01-01', '0', 'dwirawan66@gm', 'dwirawan66@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(164, 0164, 'Franklin Kurama', 0, '', '1999-01-01', '0', '', 'Purengkurama@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(168, 0168, 'Elin Marliana', 0, '', '1999-01-01', '0', '', 'elinmarliana13@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(172, 0172, 'hardi', 0, '', '1999-01-01', '0', '', 'game.hardid@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(187, 0187, 'FIKRI FADILLAH', 0, '', '1999-01-01', '0', 'fikri.fadilla', 'fikri.fadillah102@gmail.com', 'Jl. Kpkandang sapi rt 06/ rw 006 cakung Timur Jakarta Timur ', '', '', '/assets/image/profile.jpg'),
(188, 0188, 'ALFIAN AGUS SAPUTRO', 0, '', '1999-01-01', '0', 'alfianagussap', 'alfianagussaputro@gmail.com', 'jln.raya narogong km9 Gg.manggis 2 RT 06/04 kel.bojong menteng kec.rawalumbu', '', '', '/assets/image/profile.jpg'),
(189, 0189, 'ARIS KRISTIAN', 0, '', '1999-01-01', '0', 'arissantosjun', 'arissantosjunior@gmail.com', 'taman harapan baru blok o3 no 28 bekasi utara ', '', '', '/assets/image/profile.jpg'),
(190, 0190, 'ARIS SARWANTO', 0, '', '1999-01-01', '0', 'arisarwanto28', 'arisarwanto28@gmail.com', '', '', '', './assets/image//images_(2)1.png'),
(191, 0191, 'ANGGA WAHYU SYAHDILLAH', 0, '', '1999-01-01', '0', 'wahyuslowresp', 'wahyuslowrespect@gmail.com', 'Kp.jembatan cipinang besar selatan', '', '', '/assets/image/profile.jpg'),
(192, 0192, 'AHMAD ZAILANI', 0, '', '1999-01-01', '0', 'ahmadzailani7', 'ahmadzailani727@gmail.com', 'jl.swadaya 8 no 10a komplek ikip duren sawit ', '', '', '/assets/image/profile.jpg'),
(193, 0193, 'AGUS ILHAM PANGESTU', 0, '', '1999-01-01', '0', 'agusilham01@g', 'agusilham01@gmail.com', 'Cipinang Muara 3', '', '', '/assets/image/profile.jpg'),
(194, 0194, 'DEVI RAHMAYANTI', 2, 'Jakarta', '1998-12-09', '1', 'devirahmayant', 'devirahmayanti0912@gmail.com', 'jl.kp warung jengkol rt001/rw013 kelurahan pegangsan dua kecamatan kelapa gading jakarta utara no.26 kode pos 14250', 'Universitas darma persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(195, 0195, 'ISNAINI NUR HIDAYAT', 0, '', '1999-01-01', '0', 'isnaininurhid', 'isnaininurhidayat@gmail.com', 'Jl.swakarsa 1 no.9,Pondok Kelapa', '', '', './assets/image//IMG_20170926_1930581.jpg'),
(196, 0196, 'YOGA SAPUTRA', 0, '', '1999-01-01', '0', 'yogachibeloye', 'yogachibeloye@gmail.com', 'Bekasi,jatiasih', '', '', '/assets/image/profile.jpg'),
(197, 0197, 'RIZKY REZEKi', 1, 'Jakarta', '2000-01-25', '1', 'rizkymaulida0', 'rizkymaulida0@gmail.com', 'jalan pancawarga 3 rt 12 rw 05 no 40 kecamatan jatinegara kelurahan cipinang besar selatan jakarta timur ', 'universitas darma persada', 'lajang ', '/assets/image/profile.jpg'),
(198, 0198, 'NUR HIDAYAT RAMADHON', 1, 'Jakarta', '1995-02-13', '1', '085693823054', 'hidayatsullivan@gmail.com', 'Pondok kelapa, Jakarta timur', 'UNSADA', 'lajang', '/assets/image/profile.jpg'),
(199, 0199, 'MUHAMAD SODIQ', 0, '', '1999-01-01', '0', 'sodiqtok15@gm', 'sodiqtok15@gmail.com', 'Jl.kp.baru klender', '', '', '/assets/image/profile.jpg'),
(200, 0200, 'RIAN HARIANTO', 0, '', '1999-01-01', '0', 'patman.jalu@g', 'patman.jalu@gmail.com', 'Ko Pedurenan RT 04 RW 06 Jatiluhur jatiasih kota bekasi', '', '', '/assets/image/profile.jpg'),
(201, 0201, 'WAHYU  APRIYANTO', 0, '', '1999-01-01', '0', 'wapriyanto9@g', 'wapriyanto9@gmail.com', 'Jl.Remaja 3 jatinegara kaum, pulogadung', '', '', '/assets/image/profile.jpg'),
(202, 0202, 'GUNAWAN SUPRIYADI', 1, 'INDRAMAYU', '1997-03-10', '1', 'suwan6944@gma', 'suwan6944@gmail.com', 'Jl.kandang Besar Rt.002/004,ujung menteng,cakung,jakarta Timur', 'UNIVERSITAS DHARMA PERSADA', '', '/assets/image/profile.jpg'),
(203, 0203, 'RUDI ISTIANTO', 0, '', '1999-01-01', '0', 'istiantorudi0', 'istiantorudi048@gmail.com', 'Jln taruna dalam no17 rt01 rw03 jaktim', '', '', '/assets/image/profile.jpg'),
(204, 0204, 'ERNANDA AMALIA ARUM', 0, '', '1999-01-01', '0', 'ernandaamalia', 'ernandaamalia12@gmail.com', 'Jl driewanti no 93 rt0/04 Pekayon jaya bekasi selatan', '', '', '/assets/image/profile.jpg'),
(205, 0205, 'ALVIN PRISIN TOMASOA', 0, '', '1999-01-01', '0', 'prisinalvin@g', 'prisinalvin@gmail.com', 'perum.graha mustika media blokf', '', '', '/assets/image/profile.jpg'),
(206, 0206, 'ADIMAS PRAYOGA PANGESTU', 0, '', '1999-01-01', '0', 'adimaspangest', 'adimaspangestu02@gmail.com', 'Jln. Bukit 8 No.02\nRt 003 Rw 010\nDesa/kelurahan Ciwaduk\nKecamatan Cilegon - Banten', '', '', '/assets/image/profile.jpg'),
(207, 0207, 'DONI DWI RAHARJO', 0, '', '1999-01-01', '0', 'sidonidwiraha', 'sidonidwiraharjo@gmail.com', 'jl. pulogebang raya', '', '', '/assets/image/profile.jpg'),
(208, 0208, 'CHANDRA HARYANTO', 0, '', '1999-01-01', '0', '', 'chandraxtkj@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(209, 0209, 'LUQMAN HIDAYAT', 0, '', '1999-01-01', '0', 'hluqman00@gma', 'hluqman00@gmail.com', 'Jl. Swadaya 3,rt:008/001, no:014, Cipinang Melayu, Makasar', '', '', '/assets/image/profile.jpg'),
(210, 0210, 'MARSHAL NATARETH G.', 1, 'jakarta', '1999-01-01', '2', 'nazareth.mars', 'nazareth.marshall24@gmail.com', 'jalan kemayoran gempol no 60', '', '', '/assets/image/profile.jpg'),
(211, 0211, 'MEGA PANGASTUTI', 2, 'tegal', '1998-03-26', '0', 'megapangastut', 'megapangastuti03@gmail.com', 'Jl. Bintara 8 rt 3 rw 3 no 149 ', '', '', '/assets/image/profile.jpg'),
(212, 0212, 'MUHAMAD WAHIDIN', 0, '', '1999-01-01', '0', 'ademwahidin@g', 'ademwahidin@gmail.com', 'jl.sawo no.14 gunung sahari selatan', '', '', '/assets/image/profile.jpg'),
(213, 0213, 'MUHAMMAD RIFAI HIDAYATULLAH', 0, '', '1999-01-01', '0', 'rifaihidayatu', 'rifaihidayatullah202@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(214, 0214, 'Lahar Notonegoro', 0, '', '1999-01-01', '0', 'laharnotonego', 'laharnotonegoro1998@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(215, 0215, 'prodensio veto meo', 0, '', '1999-01-01', '0', 'prodensioveto', 'prodensioveto@gmail.com', 'jl.bamaloverz', '', '', '/assets/image/profile.jpg'),
(216, 0216, 'Alif andi maryudi', 0, '', '1999-01-01', '0', 'alifandisuron', 'alifandisurono@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(217, 0217, 'FIKRI HADITYA RAMADHAN', 0, '', '1999-01-01', '0', '', 'fikrihaditya@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(218, 0218, 'Chairul Rizki', 0, '', '1999-01-01', '0', 'Chairulrizki8', 'Chairulrizki87@gmail.com', 'Jl. Raya pulogebang kp kandang besar Rt 03 RW 04 NO 67', '', '', '/assets/image/profile.jpg'),
(219, 0219, 'Norma Zerlina Amadea', 0, '', '1999-01-01', '0', 'norma.zerlina', 'norma.zerlina@gmail.com', 'Jalan robusta raya blok Q7 no.9 Pondok Kopi, Duren Sawit, Jakarta Timur', '', '', '/assets/image/profile.jpg'),
(220, 0220, 'Nugroho Adi Pratomo', 0, '', '1999-01-01', '0', 'nugrohoadi.pr', 'nugrohoadi.pratomo99@gmail.com', 'Bekasi', '', '', '/assets/image/profile.jpg'),
(221, 0221, 'Yoga Faradila Anwar', 0, '', '1999-01-01', '0', 'yfaradila@gma', 'yfaradila@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(222, 0222, 'Agung Setiawan', 0, '', '1999-01-01', '0', 'agungsetiawan', 'agungsetiawan5665@gmail.com', 'Buaran Jakarta timur ', '', '', '/assets/image/profile.jpg'),
(223, 0223, 'vega humaira', 2, 'Jakarta', '1999-01-01', '1', '08', 'vee.ariamuh13@gmail.com', 'Jl. Palbatu 1 Jakarta Selatan', '', 'Single', '/assets/image/profile.jpg'),
(224, 0224, 'Fahmi Hidayat', 0, '', '1999-01-01', '0', 'hidayatfahmi1', 'hidayatfahmi17@gmail.com', 'Jalan Buaran Perkasa B1/6', '', '', '/assets/image/profile.jpg'),
(225, 0225, 'Fajar Rifai', 0, '', '1999-01-01', '0', 'fajarrifai19@', 'fajarrifai19@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(226, 0226, 'Taryana Levianda', 0, '', '1999-01-01', '0', 'taryanalevian', 'taryanalevianda18@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(227, 0227, 'Ricky Fitrah Abhari', 0, '', '1999-01-01', '0', '', 'rickyunsada@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(228, 0228, 'Anjas Mawi', 0, '', '1999-01-01', '0', 'anjasmawi19@g', 'anjasmawi19@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(229, 0229, 'Gilang Sadewo', 0, '', '1999-01-01', '0', 'gilangsadewo7', 'gilangsadewo71@gmail.com', 'Jl. RA Kartini gang mawar 3 bekasi timur', '', '', '/assets/image/profile.jpg'),
(230, 0230, 'Agung Kurniawan', 0, '', '1999-01-01', '0', 'agung.excuriv', 'agung.excurive@live.com', 'Jl. Caringin Raya Kp. Babakan Mustikasari Mustika Jaya Kota Bekasi', '', '', '/assets/image/profile.jpg'),
(231, 0231, 'Muhammad Fadilah', 0, '', '1999-01-01', '0', 'mfadilah613@g', 'mfadilah613@gmail.com', 'Jalan robusta raya blok Q7 no.9 Pondok Kopi, Duren Sawit, Jakarta Timur', '', '', '/assets/image/profile.jpg'),
(232, 0232, 'Kurniawan Dwi Yulianto', 0, '', '1999-01-01', '0', 'kurniawan.dwi', 'kurniawan.dwiy98@gmail.com', 'Jl. Raya Bekasi Km. 23 Rt.02/05, Cakung Barat, Jakarta Timur', '', '', '/assets/image/profile.jpg'),
(233, 0233, 'Nanang Fauzan Najib', 0, '', '1999-01-01', '0', '', 'nanangfauzan15@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(234, 0234, 'Syahrul Ramadhan', 0, '', '1999-01-01', '0', 'syahrull98010', 'syahrull980104@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(235, 0235, 'Riswan Alam Nauli', 0, '', '1999-01-01', '0', 'riswanalam182', 'riswanalam18215@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(236, 0236, 'Akhbar Restu Saputra', 0, '', '1999-01-01', '0', 'akbarsaputra1', 'akbarsaputra1003@gmail.com', 'Kp. Rawa Badung Rt.008/07 No.39 Kel. Jatinegara Kec. Cakung ', '', '', '/assets/image/profile.jpg'),
(237, 0237, 'Albert', 0, '', '1999-01-01', '0', 'albertsar28@g', 'albertsar28@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(238, 0238, 'Muslih Badruttamam', 1, 'Bekasi', '1999-07-28', '1', '0', 'muslihb15@asia.com', 'Jl Panda 1 Blok D No.30', 'Universitas Darma Persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(239, 0239, 'Davis Chaliq.H', 1, 'Tangerang', '1999-11-11', '1', '081284537864', 'dvskhaliq@gmail.com', 'Kavling Taman Wisata Blok A12/28 Kel.Bahagia Kec.Babelan Bekasi Utara', 'Universitas Darma Persada', 'Jomblo', '/assets/image/profile.jpg'),
(240, 0240, 'Revina Tania Pratiwi', 0, '', '1999-01-01', '0', 'taniaterania@', 'taniaterania@gmail.com', 'Jln. Supriadi RT002 RW04 No. 22 Utan Kayu Utara Jakarta Timur', '', '', '/assets/image/profile.jpg'),
(241, 0241, 'Bayu Puja Utama', 0, '', '1999-01-01', '0', '', 'bayujapamungkas@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(242, 0242, 'Bagoes Dharmawan', 0, '', '1999-01-01', '0', '', 'bagoes.dharmawan521@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(243, 0243, 'Rizky Aditya', 0, '', '1999-01-01', '0', '', 'rizkya31@dr.com', '', '', '', '/assets/image/profile.jpg'),
(244, 0244, 'Muhammad Rizki', 0, '', '1999-01-01', '0', 'rizkimuhammad', 'rizkimuhammad1206@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(245, 0245, 'Izzul Fikri', 1, 'Brebes', '1999-08-22', '1', 'izzulf22@gmai', 'izzulf22@gmail.com', 'Jl. Kampung sumur', 'Universitas Darma Persada', 'Belum Menikah', '/assets/image/profile.jpg'),
(246, 0246, 'Achmad Sopyan', 0, '', '1999-01-01', '0', 'achmadsopyan5', 'achamadsopyansy@gmail.com', 'kampung dua', '', '', '/assets/image/profile.jpg'),
(247, 0247, 'Ihsanudin', 0, '', '1999-01-01', '0', 'vray06079@gma', 'vray06079@gmail.com', 'JL.Bintara 9', '', '', '/assets/image/profile.jpg'),
(248, 0248, 'Muhamad Yusuf', 1, 'Bekasi', '1999-10-26', '1', '08998460737', 'muhamadyusuf500@gmail.com', 'Perum.Dukuh Zambrud Blok S9 No.8', 'Universitas Darma Persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(249, 0249, 'Supriyanto', 1, 'Jakarta', '1999-09-24', '1', 'supriyantopdw', 'supriyantopdw12@gmail.com', 'Jl. D.I. Panjaitan GG. Remaja II Rt 004/03 No. 16 Cipinang Besar Utara, Jatinegara-Jakarta Timur', 'UNIVERSITAS DARMA PERSADA', 'aktif', './assets/image//merah2.jpg'),
(250, 0250, 'M.Jihad Akbar Riyadi', 0, '', '1999-01-01', '0', '', 'akbarm2777@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(251, 0251, 'Fani Dendika', 0, '', '1999-01-01', '0', '', 'fanidendika35@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(252, 0252, 'Erik Kuswanto', 0, '', '1999-01-01', '0', 'erickstevenoa', 'erickstevenoaki22@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(253, 0253, 'M.Syamsul Muhyidin', 0, '', '1999-01-01', '0', '', 'syamsulmuhyidin@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(254, 0254, 'Aditya Darmawan', 0, '', '1999-01-01', '0', '', 'adityaqolby313@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(255, 0255, 'Mumammad Faisal Yudiansah', 0, '', '1999-01-01', '0', '', 'mfaisal.yudiansah@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(256, 0256, 'Muhammad Rafiqi Fadli', 0, '', '1999-01-01', '0', '', 'rafifadli@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(258, 0258, 'ARI RAMADHANI', 0, '', '1999-01-01', '0', '', '2016230037@gmail.com', 'Jln.baru cakung ', '', '', '/assets/image/profile.jpg'),
(259, 0259, 'IKSAN', 0, '', '1999-01-01', '0', 'Iksanbaehaki0', '2016230036@gmail.com', 'Jl.wiradarma blok v-7 rt 03 rw 07 cipinang melayu', '', '', '/assets/image/profile.jpg'),
(260, 0260, 'Muhamad Yusuf', 1, 'Bekasi', '1999-10-26', '1', '08998460737', 'muhamadyusuf500@gmail.com', 'Perum. Dukuh Zambrud Blok S9 No.8', 'Universitas Darma Persada', 'Pelajar/Mahasiswa', '/assets/image/profile.jpg'),
(261, 0261, 'Aris Sarwanto', 1, 'Jakarta', '1999-01-01', '1', '083838545813', 'arisarwanto28@gmail.com', 'Klender', '', '', '/assets/image/profile.jpg'),
(265, 0265, 'Ernanda Amalia Arum', 0, '', '1999-01-01', '0', '', 'ernandaamalia12@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(266, 0266, 'FelixAcoup', 0, '', '1999-01-01', '0', '', 'jamespagnp@mail.ru', '', '', '', '/assets/image/profile.jpg'),
(267, 0267, 'Dika aditiya', 0, '', '1999-01-01', '0', '', 'dikaaditiya1808@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(268, 0268, 'Dika aditiya', 0, '', '1999-01-01', '0', 'dikaaditiya13', 'dikaaditiya1301@gmail.com', 'Kp.baru rt009/rw008 cakung barat cakung jaktim ', '', '', '/assets/image/profile.jpg'),
(269, 0269, 'Mustopa kamaludin', 1, 'Jakarta', '1995-04-18', '1', '083891316300', 'mustopakamall29@gmail.com', 'Pangkalan jati', 'Dharma persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(280, 0280, 'Kamaludin', 1, 'Jakarta', '1995-04-18', '1', 'mustopakamall', 'mustopakamall29@gmail.com', 'Pangkalan jati V', 'Dharma persada', 'Mahasiswa', './assets/image//IMG-20170708-WA00221.jpg'),
(282, 0282, 'DIKA TIO PRATAMA', 0, '', '1999-01-01', '0', '', 'dika@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(283, 0283, 'MITCHELL MARCEL', 0, '', '1999-01-01', '0', 'mitchell@gmai', 'mitchell@gmail.com', '*null', '', '', '/assets/image/profile.jpg'),
(288, 0288, 'Rian Riyana', 1, 'Majalengka', '1997-03-24', '1', 'rianriyana926', 'rianriyana926@gmail.com', 'Jln.Raya hankam Gg.Pintu air rt04/011 kel.jatirahayu kec.pondok melati', 'Universitas Dharma Persada', '', '/assets/image/profile.jpg'),
(289, 0289, 'Qalam Mauladi Muhammad', 0, '', '1999-01-01', '0', '', 'qalamborghini26@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(290, 0290, 'spongebopsquera', 0, '', '1999-01-01', '0', '', 'zaenalbanker@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(291, 0291, 'nrf', 0, '', '1999-01-01', '0', '', 'nurrahman_firmansah@yahoo.com', '', '', '', '/assets/image/profile.jpg'),
(292, 0292, 'Kholif', 1, 'Jakarta', '1996-07-23', '1', '085819450400', 'irsyadkholif23@gmail.com', 'Puri Cendana', '', '', '/assets/image/profile.jpg'),
(295, 0295, 'Alvin Prisin', 0, '', '1999-01-01', '0', '', 'prisinalvin@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(296, 0296, 'Yona Hergalina', 0, '', '1999-01-01', '0', 'yonahergalina', 'yonahergalina75@gmail.com', 'jalan kebon nanas utara 2, otista 3 no.22 cipinang cempedak , jatinegara, jakarta timur', '', '', '/assets/image/profile.jpg'),
(297, 0297, 'WIWIN MAFIROH', 0, '', '1999-01-01', '0', 'wiwinmafiroh@', 'wiwinmafiroh@gmail.com', 'Vila Mutiara Gading G6 No 01 RT 005 RW 014 Desa Setia Asih Kecamatan Tarumajaya Kabupaten Bekasi 17216', '', '', '/assets/image/profile.jpg'),
(298, 0298, 'NABELLA GITA RAHMA', 0, '', '1999-01-01', '0', 'nabela.gitar0', 'nabela.gitaros@gmail.com', 'Kp poncol no.65 Rt.05/01 jakasetia, Bekasi Selatan. Bekasi. Jawa barat ', '', '', '/assets/image/profile.jpg'),
(299, 0299, 'MUHAMMAD TEGAR PRAKASA', 0, '', '1999-01-01', '0', 'tegar.prakasa', 'tegar.prakasa456@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(300, 0300, 'DZULFAJRI ABDILLAH', 0, '', '1999-01-01', '0', 'dzulfajriabdi', 'dzulfajriabdillah4@gmail.com', 'Jalan raya pulogebang gg kemuning rt 002/03 no 70 ', '', '', '/assets/image/profile.jpg'),
(301, 0301, 'WIDHISTYA PUJI SASONGKO', 0, '', '1999-01-01', '0', 'widhistya1@gm', 'widhistya1@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(302, 0302, 'ROMMY FIRLIANSYAH', 1, 'Cilegon', '1996-12-29', '1', '089624854344', 'rommyfirliansyah29@gmail.com', 'Kp pisangan rt rw : 008/005 no : 61\r\nPenggilingan cakung jakarta timur 13940', 'Universitas darma persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(303, 0303, 'DWIKI ANGGORO SYAFITRI', 0, '', '1999-01-01', '0', '', 'dwikeys@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(304, 0304, 'MUHAMMAD ZAHIDIN NUR', 0, '', '1999-01-01', '0', 'zahidin98@gma', 'zahidin98@gmail.com', 'jln.annur', '', '', '/assets/image/profile.jpg'),
(305, 0305, 'HARIS MUNANDAR', 1, 'Sukoharjo', '1995-05-09', '1', '081310116965', 'harhismunandar2@gmail.com', 'Jl. Bintara 12A', 'Universitas Darma Persada', '', '/assets/image/profile.jpg'),
(306, 0306, 'KADAFI NURARIS SETYO ADJI', 0, '', '1999-01-01', '0', 'khadafinurari', 'khadafinuraris11@gmail.com', 'Ko.buaran RT003/003 no.40 Cakung barat, Cakung, Jakarta 13910', '', '', '/assets/image/profile.jpg'),
(307, 0307, 'MUHAMMAD AKNA FATURAHMAN', 1, 'Jakarta', '1997-08-12', '1', 'aknafatur@gma', 'aknafatur@gmail.com', 'Pasar Pagi Bintara Blok A No 36 RT 001 RW 015 Bintara Bekasi Barat', 'Universitas Darma Persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(308, 0308, 'BRIAN ADYATMA', 0, '', '1999-01-01', '0', 'brianadyatmal', 'brianadyatmal@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(309, 0309, 'AHMAD SANDI SETIAWAN', 0, '', '1999-01-01', '0', 'test@gmail.co', 'test@gmail.com', 'Kp. Cimuning, bekasi timur', '', '', '/assets/image/profile.jpg'),
(310, 0310, 'Rommy firliansyah', 1, 'Cilegon', '1996-12-29', '1', '089624854344', 'Rommyfirliansyah29@gmail.com', 'Kp pisangan rt/rw : 08/05 mo : 61\r\nPenggilingan cakung jakarta timur 13940', 'Universitas darma persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(311, 0311, 'Brian adyatma', 1, 'Bekasi', '1997-10-24', '1', '083871870798', 'brian.adyatma1@gmail.com', 'Pondok ungu permai blok ac 3 no 3 rt 10 rw 09 kel bahagia kec babelan kab bekasi', 'Universitas darma persada', 'Lajang', '/assets/image/profile.jpg'),
(312, 0312, 'Didik Daroji', 1, 'Boyolali', '1996-07-16', '1', '085887739984', 'didikdaroji@gmail.com', 'Kp.pisangan, pd.kopi, jakarta timur', 'Universitas Darma Persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(313, 0313, 'Alam Giri', 0, '', '1999-01-01', '0', '', 'alamgw97@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(314, 0314, 'Dwiki Anggoro', 1, 'Jakarta', '1996-02-20', '1', 'dwikeys@gmail', 'dwikeys@gmail.com', 'Jalan rawa sari 3 cipayung jaya, cipayung, depok', 'Universitas darma persada', '', '/assets/image/profile.jpg'),
(315, 0315, 'Irsyad Kholif M', 0, '', '1999-01-01', '0', '', 'irsyadkholif23@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(316, 0316, 'INDRA JUNIYANTO', 0, '', '1999-01-01', '0', 'indrajuniyant', 'indrajuniyanto96@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(317, 0317, 'YUFAN NICO DEMORA', 0, '', '1999-01-01', '0', 'nicoyufan@gma', 'nicoyufan@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(319, 0319, 'RIZKI AKBAR', 0, '', '1999-01-01', '0', 'rizkiakbar408', 'rizkiakbar408@gmail.com', 'Jl.Bintara 08 ,Rt 03 Rw 03 , no.4 ,Bekasi Barat', '', '', '/assets/image/profile.jpg'),
(321, 0321, 'akira', 0, '', '1999-01-01', '0', '', 'akira.idn@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(326, 0326, 'pariston', 0, '', '1999-01-01', '0', '', 'vxsetsuna@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(327, 0327, 'suhar', 0, '', '1999-01-01', '0', '', 'game.hardid@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(328, 0328, 'Choirul Satriyo Utomo', 0, '', '1999-01-01', '0', 'choirul.satri', 'choirul.satriyo@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(329, 0329, 'ARIPIN ALI ', 0, '', '1999-01-01', '0', '', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(330, 0330, 'RIKI DWICAKSONO ', 0, '', '1999-01-01', '0', 'rikidwics@gma', 'rikidwics@gmail.com', 'Jl. Kampung Pertanian RT 04/01 No 46, Klender Duren Sawit Jakarta Timur', '', '', '/assets/image/profile.jpg'),
(331, 0331, 'AGAM ARIA DAMAR', 0, '', '1999-01-01', '0', 'agam.aria.dam', 'agam.aria.damar@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(332, 0332, 'ANDRIYANSYAH ', 0, '', '1999-01-01', '0', '', 'andryansyahh4@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(333, 0333, 'dian chandra pratama', 0, '', '1999-01-01', '0', '', 'dianchandra1403@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(334, 0334, 'TAUFIK HIDAYAT ', 0, '', '1999-01-01', '0', 'opiksoul.12@g', 'opiksoul.12@gmail.com', 'Sumedang', '', '', '/assets/image/profile.jpg'),
(335, 0335, 'TRI ANGEL PANGESTU ', 0, '', '1999-01-01', '0', '', 'triangelpangestu@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(336, 0336, 'AGUS PRAYOGO ', 0, '', '1999-01-01', '0', 'Agusoxtan1993', 'Agusoxtan1993@gamil.com', 'Bekasi', '', '', '/assets/image/profile.jpg'),
(337, 0337, 'ALFIN RUSDIANSYAH', 0, '', '1999-01-01', '0', 'alfin1rusdian', 'alfin1rusdiansyah@gmail.com', 'pondok bambu', '', '', '/assets/image/profile.jpg'),
(338, 0338, 'SINTA YULIA FITRI', 0, '', '1999-01-01', '0', 'bmlearningcom', 'bmlearningcommunity@gmail.com', 'Jalan Penggilingan Raya, rt/rw 002/06', '', '', '/assets/image/profile.jpg'),
(339, 0339, 'MUHAMAD FATHAN ', 0, '', '1999-01-01', '0', 'socerart@gmai', 'socerart@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(340, 0340, 'ADI STEINHARDT ', 0, '', '1999-01-01', '0', '', 'adste23@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(341, 0341, 'DENY PRIYANTO ', 0, '', '1999-01-01', '0', 'denthn@gmail.', 'denthn@gmail.com', 'Perum Pondok CIpta Blok A No. 125', '', '', '/assets/image/profile.jpg'),
(342, 0342, 'REZA ARIF SETIAWAN ', 0, '', '1999-01-01', '0', 'rezaarifsetia', 'rezaarifsetiawan97@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(343, 0343, 'MUHAMMAD ALDO TRIATMOJO ', 0, '', '1999-01-01', '0', 'bmlearningcom', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(344, 0344, 'ADAM ROBBY SAPUTRA ', 0, '', '1999-01-01', '0', 'bmlearningcom', 'bmlearningcommunity@gmail.com', 'JL.Malaka Hijau', '', '', '/assets/image/profile.jpg'),
(345, 0345, 'HAFIDZ ABDILLAH SIDQI ', 0, '', '1999-01-01', '0', '', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(346, 0346, 'MOHAMMAD FAHREZA RABANI ', 0, '', '1999-01-01', '0', '', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(347, 0347, 'NICKO ADY PRADANA ', 0, '', '1999-01-01', '0', 'nickoadyprada', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(348, 0348, 'RIRI JUHARI ', 0, '', '1999-01-01', '0', 'bmlearningcom', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(349, 0349, 'MOCHAMMAD RIANDI ', 0, '', '1999-01-01', '0', '', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(350, 0350, 'INDRA SAPUTRA ', 0, '', '1999-01-01', '0', 'bmlearningcom', 'bmlearningcommunity@gmail.com', 'Kp.cibuntu', '', '', '/assets/image/profile.jpg'),
(351, 0351, 'MUHAMMAD RIFKI AMDANI', 0, '', '1999-01-01', '0', 'bmlearningcom', 'bmlearningcommunity@gmail.com', 'Jl.Pisang raja 3 no 12 harapan baru 1 bekasi barat', '', '', '/assets/image/profile.jpg'),
(352, 0352, 'PRAMITHA WAHYU NINDIANTI ', 0, '', '1999-01-01', '0', '', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(353, 0353, 'LUKEN RAFLIANSYAH BUKHORI', 0, '', '1999-01-01', '0', 'bmlearningcom', 'bmlearningcommunity@gmail.com', 'Jl. R. H. Umar, Rt. 02/015, Kel. Jakamulya, Kec. Bekasi Selatan (Depan Kantor Kel. Jakamulya) ', '', '', '/assets/image/profile.jpg'),
(354, 0354, 'AGUNG PRASETYO SUDARTO ', 0, '', '1999-01-01', '0', 'agung_prasety', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(355, 0355, 'MUTIARA NUR AFIFAH ', 0, '', '1999-01-01', '0', 'mutia.afifah2', 'bmlearningcommunity@gmail.com', 'Mangun jaya 2', '', '', '/assets/image/profile.jpg'),
(356, 0356, 'REGY RAMADHAN ', 0, '', '1999-01-01', '0', 'bmlearningcom', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(357, 0357, 'MOHAMMAD TEGAR PRIABUDI ', 0, '', '1999-01-01', '0', '', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(358, 0358, 'ADAM ARRAFI PIAY ', 0, '', '1999-01-01', '0', 'bmlearningcom', 'bmlearningcommunity@gmail.com', 'Vila mutiara gading 2 blok c 11/12a, desa karang satria, kec tambun utara, kab bekasi', '', '', '/assets/image/profile.jpg'),
(359, 0359, 'ILHAM FITRIANSAH', 0, '', '1999-01-01', '0', '', 'bmlearningcommunity@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(360, 0360, 'Nicko ady pradana', 0, '', '1999-01-01', '0', '', 'nickoadypradana41@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(362, 0362, 'Adi Steinhardt', 0, '', '1999-01-01', '0', '', 'adste23@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(363, 0363, 'USTON TANTOWI', 0, '', '1999-01-01', '0', '', 'ustont@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(364, 0364, 'mohamad wahyudin', 0, '', '1999-01-01', '0', '', 'Wahyumohamad23@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(365, 0365, 'PUTRI ARINDA ERNAWAN', 0, '', '1999-01-01', '0', 'putriarinda72', 'putri@gmail.com', 'depok', '', '', '/assets/image/profile.jpg'),
(366, 0366, 'NURCHOLIFAH', 0, '', '1999-01-01', '0', '', 'nurcholifah@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(367, 0367, 'SUKARNO INDRA SETYAWAN', 0, '', '1999-01-01', '0', '', 'sukarno@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(368, 0368, 'MUHAMMAD BAGASKORO DWIANSYAH', 0, '', '1999-01-01', '0', '', 'bagas@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(369, 0369, 'HEGY MONDA RIZKY', 0, '', '1999-01-01', '0', '', 'hegy@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(370, 0370, 'Bayu Hermawan', 1, 'Jakarta', '1995-06-15', '1', '87811360236', 'bayuhermawan135@gmail.com', '', 'UNSADA', '', '/assets/image/profile.jpg'),
(371, 0371, 'adli lazuardi', 0, '', '1999-01-01', '0', 'Lazuardiadli2', 'Lazuardiadli22@gmail.com', 'Jl palad rawakuning', '', '', '/assets/image/profile.jpg'),
(372, 0372, 'linda yustiningsih', 0, '', '1999-01-01', '0', '', 'Lindyus06@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(373, 0373, 'BryanSkype', 0, '', '1999-01-01', '0', '', 'ashley@bestusamakemoney.tk', '', '', '', '/assets/image/profile.jpg'),
(374, 0374, 'AWALUDDIN SUNU NURDIANTO', 0, '', '1999-01-01', '0', '', 'bmlearning@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(375, 0375, 'RENDY SUPRIYANDANA', 1, 'Jakarta', '1998-04-02', '1', 'rendisupruyan', 'rendisupruyandana@gmail.com', 'Bekasi', 'Universitas Darma Persata', 'Mahasiswa', '/assets/image/profile.jpg'),
(376, 0376, 'MUHAMMAD KAZRUNI YAHYA', 0, '', '1999-01-01', '0', '', 'user@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(377, 0377, 'NAZELIKA PUTRI AYU NALURITA', 0, '', '1999-01-01', '0', 'nazelikaputri', 'user@gmail.com', 'Jl.Haji Dogol Rt007/016, Duren Sawit, Jakarta Timur', '', '', '/assets/image/profile.jpg'),
(378, 0378, 'VIRA METTA KARUNASARI', 2, 'Bekasi ', '1999-06-04', '4', 'viravina66@gm', 'viravina66@gmail.com', 'Jl. Wibawa Mukti Rt 03 / 04, Jatiasih - Bekasi ', 'Universitas Darma Persada ', 'Mahasiswa ', '/assets/image/profile.jpg'),
(379, 0379, 'MUHAMMAD IKHWAN AMINUDIEN', 1, 'Brebes, Jawa Tengah', '1998-03-30', '1', '087776399346', 'muhammadikhwn@gmail.com', 'Perumahan Mandosi Permai, Jl Pelikan Blok P No.3, Jatiasih, Bekasi', 'Universitas Darma Persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(380, 0380, 'ANGGA PRADINA RAMDANI', 0, '', '1999-01-01', '0', '', 'user@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(381, 0381, 'MOCH RAY VARANDY', 0, '', '1999-01-01', '0', 'user@gmail.co', 'user@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(382, 0382, 'ERRY MARULI TUA', 1, 'Jakarta', '1995-07-06', '2', 'emtfriends07@', 'emtfriends07@gmail.com', 'Jl Kelapa Sawit I', 'Universitas Darma Persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(383, 0383, 'JULIAN ARDILLAH ABHIRITY', 0, '', '1999-01-01', '0', '', 'user@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(384, 0384, 'DEO ANDIKA', 0, '', '1999-01-01', '0', 'user@gmail.co', 'user@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(385, 0385, 'RIZKY PRATAMA', 0, '', '1999-01-01', '0', 'user@gmail.co', 'user@gmail.com', 'Jl.plk', '', '', '/assets/image/profile.jpg'),
(386, 0386, 'LIOSHA PAGUA THAMA', 1, 'LAMPUNG', '1999-09-27', '1', 'yosaacool32@g', 'yosaacool32@gmail.com', 'Kp.bakom RT/RW 001/002 kec,bantargebang kota bekasi', 'UNIVERSITAS DARMA PERSADA', 'Mahasiswa', '/assets/image/profile.jpg'),
(387, 0387, 'AGNIEL CRISTIANTO', 1, 'Jakarta', '1999-08-28', '2', '082210319292', 'agnil.cristianto@gmail.com', 'Komplek PU Sapta Taruna 3\r\nJl. Koperpu Raya No.10 RT.01/RW.034\r\nKec.Rawalumbu Kel.Bojong Rawalumbu', 'Universitas Darma Persada', 'Mahasiswa', '/assets/image/profile.jpg'),
(388, 0388, 'DIAZ IKHSAN RIZALDY', 0, '', '1999-01-01', '0', 'user@gmail.co', 'user@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(389, 0389, 'muhammad kazruni yahya', 0, '', '1999-01-01', '0', '', 'dhenzkazruni@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(390, 0390, 'FumikoReaw', 0, '', '1999-01-01', '0', '', 'FumikoReaw@5ooi8oiz.xzzy.info', '', '', '', '/assets/image/profile.jpg'),
(391, 0391, 'MUHAMAD GILANG NURFADILA PUTRA ', 0, '', '1999-01-01', '0', 'user@gmail.co', 'user@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(392, 0392, 'PRISKA AGNES TUMBELAKA', 0, '', '1999-01-01', '0', '', 'user@gmail.com', '', '', '', '/assets/image/profile.jpg'),
(393, 0393, 'ARIF MAY WANTO', 1, 'BEKASI', '1999-05-14', '1', '085693693407', 'ARIF_MAY_WANTO@YAHOO.COM', 'Pulau Karimun Jawa 19 No.158 Rt/Rw 07/13 perumnas 3, Aren Jaya, Bekasi Timur, Bekasi 17111', 'UNIVERSITAS DARMA PERSADA', '', '/assets/image/profile.jpg'),
(394, 0394, 'INDAH DIAN LESTARI', 2, 'Bekasi', '1999-09-29', '1', 'l.indahdian@y', 'l.indahdian@yahoo.com', 'Jalan prof.moh.yamin gg.anggur no.28 rt/rw 01/05 duren jaya bekasi timur kota bekasi 17111', 'UNIVERSITAS DARMA PERSADA', '', '/assets/image/profile.jpg'),
(395, 0395, 'FelicitaOn', 0, '', '1999-01-01', '0', '', 'FelicitaOn@sevuodrd.xzzy.info', '', '', '', '/assets/image/profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `id_role` int(12) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id_role`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'Instruktur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dok`
--

CREATE TABLE IF NOT EXISTS `tb_dok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_dok` varchar(100) NOT NULL,
  `judul_dok` varchar(400) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl` date NOT NULL,
  `abstrak` text NOT NULL,
  `keyword` text NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `id_jen` int(11) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `upload_file` text NOT NULL,
  `name_file` varchar(100) NOT NULL,
  `size_file` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tb_dok`
--

INSERT INTO `tb_dok` (`id`, `no_dok`, `judul_dok`, `tahun`, `tgl`, `abstrak`, `keyword`, `penulis`, `id_jen`, `id_kat`, `upload_file`, `name_file`, `size_file`, `harga`, `status`, `image1`, `image2`, `image3`) VALUES
(23, 'TIF001', 'Pengantar algoritma pemgoraman', 2017, '2017-09-17', 'algoritma', 'algo', 'Team', 3, 6, './assets/kategori/3/Ebook-ALPROG.pdf', 'Ebook-ALPROG.pdf', '2053.84', 50000, 1, './assets/image//upload124.jpg', '//', '//'),
(24, 'TIF003', 'Rekayasa Perangkat Lunak', 2017, '2017-09-17', 'Software', 'RPL', 'Team', 3, 6, './assets/kategori/3/Ebook_RPL.pdf', 'Ebook_RPL.pdf', '1796.82', 50000, 1, './assets/image//upload122.jpg', '//', '//'),
(25, 'TIF005', 'Jaringan Komputer', 2017, '2017-09-17', 'Jarkom', 'Jarkom', 'Team', 3, 7, './assets/kategori/3/Ebook_JarkomI.pdf', 'Ebook_JarkomI.pdf', '11124.23', 50000, 0, '//', '//', '//'),
(26, 'TIF001-1', 'Praktikum Algoritma Pemograman', 2017, '2017-09-17', 'Praktikum alprog', 'Alprog', 'Team', 3, 6, './assets/kategori/3/COVER6.docx', 'COVER6.docx', '11.25', 40000, 1, './assets/image//upload116.jpg', '//', '//'),
(27, 'TIF002', 'TEORI BAHASA AUTOMATA', 2018, '2018-03-10', 'Materi Teori bahasa Automata', 'TBA', 'Team', 3, 11, './assets/kategori/3/Ebook_TBA2.pdf', 'Ebook_TBA2.pdf', '1718.91', 60000, 1, './assets/image//upload130.jpg', '//', '//'),
(28, 'TIF004', 'Arsitektur dan Organisasi Komputer', 2018, '2018-03-13', 'AOK', 'arsitektur dan organisasi komputer', 'Team', 3, 11, './assets/kategori/3/BAMA_SPT_MASA_JULI_2016.pdf', 'BAMA_SPT_MASA_JULI_2016.pdf', '26.1', 50000, 1, './assets/image//upload128.jpg', '//', '//'),
(29, 'TIF005', 'SISTEM BASIS DATA', 2018, '2018-03-21', 'Sistem Basis Data', 'Sistem, Basis data', 'TIM', 3, 11, './assets/kategori/3/ebook_sbd.pdf', 'ebook_sbd.pdf', '2300.94', 50000, 1, './assets/image//upload134.jpg', '//', '//');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dok_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_dok_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_dok_jenis`
--

INSERT INTO `tb_dok_jenis` (`id`, `nama_jenis`, `keterangan`) VALUES
(1, 'Modul', 'asd'),
(3, 'Buku Digital', 'ebook');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dok_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_dok_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_dok_kategori`
--

INSERT INTO `tb_dok_kategori` (`id`, `nama_kategori`, `keterangan`) VALUES
(2, 'SQL', 'asd'),
(4, 'XML', 'asd'),
(5, 'PHP', 'Modul PHP'),
(6, 'Basic Programming', 'Dasar dasar pemograman'),
(7, 'Networking', 'jaringan Internet'),
(8, 'Basis Data', 'Data base'),
(9, 'Artificial Intelegence', 'AI'),
(10, 'Multimedia', 'media'),
(11, 'TEORI', 'Buku Teori');

-- --------------------------------------------------------

--
-- Table structure for table `tb_download`
--

CREATE TABLE IF NOT EXISTS `tb_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_dok` int(11) NOT NULL,
  `link` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_download`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE IF NOT EXISTS `tb_event` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `judul_event` varchar(200) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`id`, `judul_event`, `tgl`, `isi`, `gambar`) VALUES
(1, 'Workshop Android', '2018-03-13 19:39:20', '<p>Syarat Dan Ketentuan :</p><p></p><ul><li>Silahkan Daftar Terlebih Dahulu Pada <a target="_blank" rel="nofollow" href="http://portal.bmlearning.org/dashboard/register">http://portal.bmlearning.org/dashboard/register</a> <br></li><li>Workshop Diadakan Setiap Hari Sabtu Mulai Tanggal 24 Maret 2018, Bertempat di \r\n\r\nJalan Taman Malaka selatan Blok b 12 No5, Jakarta Timur\r\n\r\n.</li><li>Workshop Dimulai Pukul 10:00 - sd selesai.</li><li>Dianjurkan Memebawa Leptop Masing - Masing.</li></ul><p></p><p><br></p>', './assets/image//Untitled-11.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum`
--

CREATE TABLE IF NOT EXISTS `tb_forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `judul_forum` text NOT NULL,
  `isi_forum` text NOT NULL,
  `file` text NOT NULL,
  `tgl_forum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tb_forum`
--

INSERT INTO `tb_forum` (`id`, `id_user`, `id_kelas`, `judul_forum`, `isi_forum`, `file`, `tgl_forum`) VALUES
(21, 33, 1, 'Forum Class SESI 1', '<h5>Welcome<h5>', '', '2018-03-13 19:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum_komen`
--

CREATE TABLE IF NOT EXISTS `tb_forum_komen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `komen` text NOT NULL,
  `tgl_komen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_forum_komen`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_forum_statistik`
--

CREATE TABLE IF NOT EXISTS `tb_forum_statistik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=324 ;

--
-- Dumping data for table `tb_forum_statistik`
--

INSERT INTO `tb_forum_statistik` (`id`, `ip`, `id_forum`, `hits`) VALUES
(1, '139.192.236.78', 11, 1),
(2, '139.192.236.78', 9, 1),
(3, '178.154.171.11', 6, 1),
(4, '213.180.203.65', 5, 1),
(5, '139.192.236.78', 1, 1),
(6, '37.9.113.103', 4, 1),
(7, '213.180.203.65', 2, 1),
(8, '139.0.142.8', 11, 1),
(9, '64.233.173.19', 9, 1),
(10, '52.71.155.178', 11, 1),
(11, '139.192.236.78', 7, 1),
(12, '139.192.236.78', 5, 1),
(13, '139.192.236.78', 3, 1),
(14, '139.192.236.78', 2, 1),
(15, '37.9.113.100', 4, 1),
(16, '95.108.181.59', 5, 1),
(17, '95.108.181.59', 2, 1),
(18, '178.154.171.29', 8, 1),
(19, '178.154.171.34', 2, 1),
(20, '178.154.171.87', 7, 1),
(21, '95.108.181.70', 8, 1),
(22, '178.154.171.60', 7, 1),
(23, '178.154.171.40', 4, 1),
(24, '178.154.171.38', 3, 1),
(25, '213.180.203.58', 6, 1),
(26, '213.180.203.29', 7, 1),
(27, '66.249.65.152', 11, 1),
(28, '66.249.65.152', 1, 1),
(29, '66.249.65.152', 8, 1),
(30, '66.249.65.152', 4, 1),
(31, '66.249.65.154', 6, 1),
(32, '66.249.65.152', 2, 1),
(33, '66.249.65.152', 9, 1),
(34, '66.249.65.152', 5, 1),
(35, '66.249.65.154', 3, 1),
(36, '66.249.65.154', 7, 1),
(37, '66.249.65.152', 12, 1),
(38, '66.249.65.152', 10, 1),
(39, '141.8.142.5', 6, 1),
(40, '95.108.181.70', 7, 1),
(41, '111.94.198.102', 13, 1),
(42, '185.156.172.140', 13, 1),
(43, '37.9.113.174', 3, 1),
(44, '37.9.113.174', 6, 1),
(45, '114.124.245.181', 13, 1),
(46, '114.124.232.133', 13, 1),
(47, '114.124.210.191', 13, 1),
(48, '114.124.172.150', 13, 1),
(49, '114.124.168.166', 13, 1),
(53, '114.124.165.159', 11, 1),
(56, '89.28.24.190', 9, 1),
(55, '89.28.24.190', 11, 1),
(57, '89.28.24.190', 8, 1),
(58, '89.28.24.190', 7, 1),
(59, '37.9.113.174', 7, 1),
(60, '141.8.132.13', 3, 1),
(61, '37.9.113.174', 17, 1),
(62, '37.9.113.174', 15, 1),
(63, '37.9.113.174', 8, 1),
(64, '213.180.203.9', 7, 1),
(65, '95.108.181.104', 15, 1),
(66, '5.255.253.6', 6, 1),
(67, '87.250.224.33', 15, 1),
(68, '87.250.224.33', 17, 1),
(69, '87.250.224.33', 8, 1),
(70, '87.250.224.33', 7, 1),
(71, '141.8.132.13', 6, 1),
(72, '141.8.142.6', 15, 1),
(73, '37.9.113.68', 3, 1),
(74, '37.9.113.100', 2, 1),
(75, '95.108.181.110', 6, 1),
(76, '95.108.181.116', 17, 1),
(77, '141.8.142.3', 7, 1),
(78, '141.8.142.79', 15, 1),
(79, '141.8.183.33', 3, 1),
(80, '95.108.181.86', 5, 1),
(81, '111.94.198.102', 11, 1),
(82, '141.8.183.33', 9, 1),
(83, '95.108.181.86', 7, 1),
(84, '95.108.181.86', 2, 1),
(85, '87.250.224.215', 17, 1),
(86, '141.8.132.13', 17, 1),
(87, '141.8.132.13', 5, 1),
(88, '37.9.113.79', 6, 1),
(89, '178.154.171.31', 2, 1),
(90, '95.108.213.28', 3, 1),
(91, '5.45.207.59', 4, 1),
(92, '141.8.142.70', 5, 1),
(93, '95.108.213.28', 6, 1),
(94, '5.255.253.6', 2, 1),
(95, '37.9.113.79', 1, 1),
(96, '95.108.181.104', 3, 1),
(97, '141.8.142.50', 17, 1),
(98, '213.180.203.56', 2, 1),
(99, '5.45.207.17', 1, 1),
(100, '37.9.113.174', 2, 1),
(101, '146.185.223.125', 11, 1),
(102, '146.185.223.125', 9, 1),
(103, '146.185.223.125', 8, 1),
(104, '146.185.223.125', 7, 1),
(105, '37.9.113.168', 1, 1),
(106, '37.9.113.174', 4, 1),
(107, '87.250.224.33', 2, 1),
(108, '111.95.210.246', 11, 1),
(109, '37.9.113.168', 17, 1),
(110, '37.9.113.168', 2, 1),
(111, '37.9.113.174', 24, 1),
(112, '37.9.113.168', 4, 1),
(113, '178.137.17.173', 11, 1),
(114, '111.95.131.193', 11, 1),
(115, '111.95.131.193', 2, 1),
(116, '95.108.181.59', 24, 1),
(117, '95.108.181.86', 4, 1),
(118, '213.180.203.11', 1, 1),
(119, '141.8.142.3', 9, 1),
(120, '141.8.142.6', 24, 1),
(121, '95.108.181.110', 3, 1),
(122, '141.8.132.13', 2, 1),
(123, '141.8.142.3', 24, 1),
(124, '5.45.207.41', 9, 1),
(125, '180.76.15.144', 11, 1),
(126, '118.137.218.182', 11, 1),
(127, '46.119.124.1', 11, 1),
(128, '141.8.142.79', 2, 1),
(129, '213.180.203.56', 4, 1),
(130, '5.45.207.59', 1, 1),
(131, '139.192.238.214', 11, 1),
(132, '87.250.224.103', 9, 1),
(133, '64.233.173.20', 9, 1),
(137, '64.233.173.18', 11, 1),
(145, '213.180.203.55', 4, 1),
(147, '87.250.224.33', 1, 1),
(148, '87.250.224.33', 9, 1),
(150, '141.8.183.38', 5, 1),
(151, '5.255.253.6', 9, 1),
(152, '178.154.200.30', 4, 1),
(153, '87.250.224.215', 1, 1),
(154, '180.76.15.9', 8, 1),
(155, '95.108.181.59', 1, 1),
(157, '87.250.224.33', 10, 1),
(158, '95.108.181.110', 9, 1),
(159, '37.9.113.79', 10, 1),
(160, '141.8.132.31', 1, 1),
(161, '95.108.181.51', 4, 1),
(162, '87.250.224.33', 5, 1),
(167, '87.250.224.33', 4, 1),
(170, '87.250.224.33', 13, 1),
(174, '66.249.66.90', 8, 1),
(176, '66.249.73.148', 9, 1),
(323, '180.76.15.138', 21, 1),
(179, '66.249.73.152', 11, 1),
(322, '5.101.221.19', 21, 1),
(321, '94.103.231.235', 21, 1),
(320, '188.68.0.119', 21, 1),
(183, '180.76.15.8', 11, 1),
(184, '180.76.15.139', 11, 1),
(185, '95.108.181.91', 11, 1),
(319, '185.89.100.91', 21, 1),
(318, '180.76.15.24', 21, 1),
(188, '87.250.224.33', 11, 1),
(189, '180.76.15.21', 8, 1),
(190, '178.154.200.5', 11, 1),
(317, '178.154.200.10', 24, 1),
(192, '180.76.15.157', 8, 1),
(316, '180.76.15.158', 21, 1),
(315, '66.249.79.47', 18, 1),
(314, '66.249.79.47', 8, 1),
(313, '66.249.79.50', 21, 1),
(312, '180.76.15.156', 21, 1),
(311, '66.249.79.47', 11, 1),
(310, '66.249.79.53', 9, 1),
(309, '180.76.15.10', 21, 1),
(308, '66.249.79.50', 20, 1),
(307, '62.210.103.31', 21, 1),
(204, '95.108.181.91', 5, 1),
(306, '62.210.103.31', 18, 1),
(305, '111.95.35.85', 21, 1),
(207, '95.108.181.91', 12, 1),
(208, '95.108.181.91', 3, 1),
(209, '180.76.15.5', 11, 1),
(210, '114.124.247.202', 8, 1),
(304, '202.62.19.131', 21, 1),
(212, '125.166.22.133', 0, 1),
(213, '125.166.22.133', 279, 1),
(214, '125.166.22.133', 2, 1),
(215, '178.154.200.10', 5, 1),
(303, '66.249.80.22', 21, 1),
(302, '66.102.6.243', 21, 1),
(218, '180.76.15.162', 8, 1),
(301, '112.215.152.228', 21, 1),
(300, '180.76.15.19', 21, 1),
(221, '5.45.207.14', 3, 1),
(299, '5.188.216.73', 21, 1),
(298, '95.181.176.29', 21, 1),
(224, '95.108.181.91', 17, 1),
(297, '141.101.132.107', 21, 1),
(296, '95.108.181.91', 18, 1),
(295, '213.32.93.218', 21, 1),
(294, '66.249.71.52', 21, 1),
(293, '103.10.66.70', 21, 1),
(230, '95.108.181.91', 8, 1),
(231, '95.108.181.91', 2, 1),
(232, '66.249.79.68', 8, 1),
(233, '66.249.69.227', 8, 1),
(234, '87.250.224.95', 7, 1),
(235, '178.154.200.4', 10, 1),
(236, '141.8.142.90', 1, 1),
(237, '37.9.113.171', 15, 1),
(238, '141.8.142.212', 15, 1),
(239, '37.9.113.138', 13, 1),
(240, '141.8.142.90', 9, 1),
(242, '141.8.142.90', 6, 1),
(292, '69.30.226.234', 21, 1),
(244, '178.154.171.7', 6, 1),
(245, '5.45.207.90', 24, 1),
(246, '95.108.181.90', 1, 1),
(247, '37.9.113.136', 4, 1),
(291, '158.69.23.126', 18, 1),
(250, '87.250.224.85', 11, 1),
(251, '95.108.181.91', 20, 1),
(290, '66.249.71.70', 21, 1),
(253, '141.8.142.90', 20, 1),
(289, '66.102.6.192', 21, 1),
(255, '178.154.171.7', 20, 1),
(256, '87.250.224.215', 20, 1),
(288, '66.102.6.222', 21, 1),
(287, '95.108.181.91', 21, 1),
(259, '178.154.200.10', 3, 1),
(260, '213.180.203.27', 3, 1),
(286, '111.95.128.149', 21, 1),
(262, '87.250.224.215', 8, 1),
(263, '95.108.181.91', 10, 1),
(264, '95.108.181.91', 7, 1),
(265, '95.108.181.91', 15, 1),
(285, '66.249.64.86', 21, 1),
(267, '95.108.181.91', 9, 1),
(268, '95.108.181.91', 13, 1),
(284, '118.137.63.131', 21, 1),
(270, '95.108.181.91', 1, 1),
(271, '95.108.181.91', 24, 1),
(272, '95.108.181.91', 6, 1),
(283, '66.249.73.86', 20, 1),
(282, '180.76.15.148', 11, 1),
(281, '180.76.15.142', 11, 1),
(280, '54.173.35.129', 18, 1),
(278, '95.108.181.91', 4, 1),
(279, '66.249.66.90', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `id_instruktur` int(11) NOT NULL,
  `kelas` text NOT NULL,
  `jumlah_sesi` int(11) NOT NULL,
  `kuota` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `id_event`, `id_instruktur`, `kelas`, `jumlah_sesi`, `kuota`) VALUES
(1, 1, 33, 'SESI 1', 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas_absensi`
--

CREATE TABLE IF NOT EXISTS `tb_kelas_absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `status` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=551 ;

--
-- Dumping data for table `tb_kelas_absensi`
--

INSERT INTO `tb_kelas_absensi` (`id`, `id_kelas`, `id_user`, `id_jadwal`, `status`) VALUES
(301, 10, 60, 89, ''),
(302, 10, 60, 90, ''),
(303, 10, 60, 91, ''),
(304, 10, 60, 92, ''),
(305, 10, 61, 89, ''),
(306, 10, 61, 90, ''),
(307, 10, 61, 91, ''),
(308, 10, 61, 92, ''),
(309, 10, 62, 89, ''),
(310, 10, 62, 90, ''),
(311, 10, 62, 91, ''),
(312, 10, 62, 92, ''),
(313, 10, 63, 89, ''),
(314, 10, 63, 90, ''),
(315, 10, 63, 91, ''),
(316, 10, 63, 92, ''),
(317, 10, 64, 89, ''),
(318, 10, 64, 90, ''),
(319, 10, 64, 91, ''),
(320, 10, 64, 92, ''),
(321, 10, 65, 89, ''),
(322, 10, 65, 90, ''),
(323, 10, 65, 91, ''),
(324, 10, 65, 92, ''),
(325, 10, 66, 89, ''),
(326, 10, 66, 90, ''),
(327, 10, 66, 91, ''),
(328, 10, 66, 92, ''),
(550, 1, 292, 12, ''),
(549, 1, 292, 11, ''),
(548, 1, 292, 10, ''),
(547, 1, 292, 9, ''),
(546, 1, 292, 8, ''),
(545, 1, 292, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_kelas_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `tgl_kelas` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_kelas_jadwal`
--

INSERT INTO `tb_kelas_jadwal` (`id`, `id_kelas`, `tgl_kelas`, `jam_mulai`, `jam_akhir`, `status`) VALUES
(7, 1, '2018-03-24', '10:00:00', '16:00:00', 0),
(8, 1, '2018-03-31', '10:00:00', '16:00:00', 0),
(9, 1, '2018-04-07', '10:00:00', '16:00:00', 0),
(10, 1, '2018-04-14', '10:00:00', '16:00:00', 0),
(11, 1, '2018-04-21', '10:00:00', '16:00:00', 0),
(12, 1, '2018-04-28', '10:00:00', '16:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas_terdaftar`
--

CREATE TABLE IF NOT EXISTS `tb_kelas_terdaftar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `tb_kelas_terdaftar`
--

INSERT INTO `tb_kelas_terdaftar` (`id`, `id_event`, `id_kelas`, `id_user`, `date`) VALUES
(76, 3, 10, 60, '0000-00-00 00:00:00'),
(77, 3, 10, 61, '0000-00-00 00:00:00'),
(78, 3, 10, 62, '0000-00-00 00:00:00'),
(79, 3, 10, 63, '0000-00-00 00:00:00'),
(80, 3, 10, 64, '0000-00-00 00:00:00'),
(81, 3, 10, 65, '0000-00-00 00:00:00'),
(82, 3, 10, 66, '0000-00-00 00:00:00'),
(93, 2, 12, 21, '2017-08-10 14:10:20'),
(94, 1, 1, 292, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_message`
--

CREATE TABLE IF NOT EXISTS `tb_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_user_to` tinyint(4) NOT NULL,
  `subject` text NOT NULL,
  `msg` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_message`
--

INSERT INTO `tb_message` (`id`, `id_user`, `id_user_to`, `subject`, `msg`, `date`, `status`) VALUES
(1, 33, 1, 'test msg', '<p>test</p>', '2017-12-08 23:20:45', 0),
(2, 1, 33, 'asd', '<p>asd</p>', '2017-12-08 23:26:58', 0),
(5, 43, 1, 'FAQ', '<p>Hai Min<br></p>', '2018-01-04 07:40:18', 0),
(4, 1, 33, 'sub', '<p>isi</p>', '2017-12-08 23:29:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_message_rep`
--

CREATE TABLE IF NOT EXISTS `tb_message_rep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_msg` int(11) NOT NULL,
  `id_user_` int(11) NOT NULL,
  `id_user_to_` int(11) NOT NULL,
  `msg` text NOT NULL,
  `tgl_msg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_` tinyint(4) NOT NULL DEFAULT '0',
  `status_v` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_message_rep`
--

INSERT INTO `tb_message_rep` (`id`, `id_msg`, `id_user_`, `id_user_to_`, `msg`, `tgl_msg`, `status_`, `status_v`) VALUES
(1, 1, 33, 1, '<p>test</p>', '2017-12-08 23:20:45', 1, 1),
(2, 2, 1, 33, '<p>asd</p>', '2017-12-08 23:26:58', 1, 0),
(3, 4, 1, 33, '<p>isi</p>', '2017-12-08 23:29:20', 1, 1),
(4, 4, 33, 1, '<p>test</p>', '2017-12-08 23:55:08', 1, 1),
(5, 4, 1, 1, '<p>test</p>', '2017-12-09 00:02:10', 0, 1),
(6, 4, 33, 1, '<p>test</p>', '2017-12-09 00:31:13', 0, 1),
(7, 4, 33, 1, '<p>test</p>', '2017-12-09 00:31:20', 0, 1),
(8, 5, 43, 1, '<p>Hai Min<br></p>', '2018-01-04 07:40:18', 1, 1),
(9, 5, 1, 43, '<p>Yes<br></p>', '2018-01-04 07:40:48', 0, 1),
(10, 4, 33, 1, '<p>test</p>', '2018-01-31 13:03:06', 0, 1),
(11, 4, 1, 1, '<p>hmm</p>', '2018-01-31 13:12:10', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(22) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '1',
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expired` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `status_kon` tinyint(4) NOT NULL DEFAULT '0',
  `exp_down` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bukti` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=238 ;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_transaksi`, `id_user`, `id_dok`, `harga`, `jumlah`, `tgl_transaksi`, `expired`, `status`, `status_kon`, `exp_down`, `bukti`, `keterangan`) VALUES
(167, 'TIF00228394', 343, 27, 60197, 1, '2018-03-21 22:50:42', '2018-03-23 22:49:04', 1, 1, '2018-04-19 22:50:42', '', 'Pembayaran via kordinator kelas'),
(168, 'TIF00235539', 43, 27, 60168, 1, '2018-03-22 05:24:53', '2018-03-24 05:24:53', 0, 0, '0000-00-00 00:00:00', '', ''),
(169, 'TIF00242750', 337, 27, 60277, 1, '2018-03-22 07:16:12', '2018-03-24 05:49:20', 1, 1, '2018-04-20 07:16:12', '', 'alfin'),
(170, 'TIF00288478', 306, 27, 60311, 1, '2018-03-22 07:16:28', '2018-03-24 06:22:58', 1, 1, '2018-04-20 07:16:28', '', 'Saya sudah membayar ke Rifki amdhani TIF-B'),
(171, 'TIF00223991', 297, 27, 60325, 1, '2018-03-22 07:16:41', '2018-03-24 06:32:13', 1, 1, '2018-04-20 07:16:41', '', 'Saya Telah Melakukan Pembayaran'),
(172, 'TIF00234258', 354, 27, 60407, 1, '2018-03-22 07:16:56', '2018-03-24 06:34:04', 1, 1, '2018-04-20 07:16:56', '', 'Sudah dibayar'),
(173, 'TIF00254051', 339, 27, 60355, 1, '2018-03-22 07:17:07', '2018-03-24 06:37:56', 1, 1, '2018-04-20 07:17:07', '', 'Sama alfin'),
(174, 'TIF00256374', 351, 27, 60416, 1, '2018-03-22 07:17:15', '2018-03-24 06:55:22', 1, 1, '2018-04-20 07:17:15', '', 'saya telah membayar'),
(175, 'TIF00244437', 298, 27, 60144, 1, '2018-03-22 07:17:30', '2018-03-24 07:11:14', 1, 0, '2018-04-20 07:17:30', '', ''),
(176, 'TIF00227006', 296, 27, 60369, 1, '2018-03-22 07:17:41', '2018-03-24 07:13:38', 1, 0, '2018-04-20 07:17:41', '', ''),
(177, 'TIF00243025', 330, 27, 60321, 1, '2018-03-22 10:55:15', '2018-03-24 08:12:24', 1, 1, '2018-04-20 10:55:15', '', 'TIF MALAM'),
(178, 'TIF00266626', 341, 27, 60343, 1, '2018-03-22 10:58:21', '2018-03-24 09:12:59', 1, 1, '2018-04-20 10:58:21', '', 'Pembayaran Cash via Alfin Rusdiansyah'),
(179, 'TIF00237610', 338, 27, 60314, 1, '2018-03-22 21:21:58', '2018-03-24 15:47:20', 1, 1, '2018-04-20 21:21:58', '', 'Alfin rusdiansyah'),
(180, 'TIF00223800', 334, 27, 60129, 1, '2018-03-22 21:21:51', '2018-03-24 19:22:58', 1, 1, '2018-04-20 21:21:51', '', 'Alfin'),
(181, 'TIF00233123', 347, 27, 60115, 1, '2018-03-26 08:05:03', '2018-03-26 10:21:14', 1, 0, '2018-04-24 08:05:03', '', ''),
(182, 'TIF00222510', 356, 27, 60294, 1, '2018-03-26 08:04:50', '2018-03-26 19:31:24', 1, 0, '2018-04-24 08:04:50', '', ''),
(183, 'TIF00283304', 353, 27, 60417, 1, '2018-03-26 08:04:37', '2018-03-26 19:32:51', 1, 1, '2018-04-24 08:04:37', '', 'saya sudah membayar'),
(184, 'TIF00265008', 358, 27, 60461, 1, '2018-03-26 08:04:20', '2018-03-26 19:35:07', 1, 1, '2018-04-24 08:04:20', '', 'Saya twlah melakukan pembayaran'),
(185, 'TIF00275484', 319, 27, 60370, 1, '2018-03-26 08:04:12', '2018-03-26 21:55:38', 1, 1, '2018-04-24 08:04:12', '', 'Sudah melakukan pembayaran'),
(186, 'TIF00233927', 300, 27, 60261, 1, '2018-03-26 08:04:02', '2018-03-26 23:01:07', 1, 1, '2018-04-24 08:04:02', '', 'Sudah bayar ke ketua kelas.. Rifki amdani'),
(187, 'TIF00278975', 299, 27, 60242, 1, '2018-03-26 08:03:52', '2018-03-27 15:21:30', 1, 1, '2018-04-24 08:03:52', '', 'saya telah membayar melalui ketua kelas'),
(188, 'TIF00290782', 348, 27, 60427, 1, '2018-04-03 06:22:16', '2018-03-28 11:38:38', 1, 0, '2018-05-02 06:22:16', '', ''),
(189, 'TIF00272914', 355, 27, 60344, 1, '2018-04-03 06:17:53', '2018-04-01 13:11:12', 1, 0, '2018-05-02 06:17:53', '', ''),
(192, 'TIF00219489', 328, 27, 60455, 1, '2018-04-03 19:50:45', '2018-04-05 19:39:19', 1, 1, '2018-05-02 19:50:45', '', 'Sudah bayar ke alfin'),
(193, 'TIF00212410', 331, 27, 60441, 1, '2018-04-03 19:50:28', '2018-04-05 19:39:59', 1, 1, '2018-05-02 19:50:28', '', 'test'),
(194, 'TIF00280057', 342, 27, 60204, 1, '2018-04-03 19:50:07', '2018-04-05 19:46:43', 1, 1, '2018-05-02 19:50:07', '', 'Alfin'),
(195, 'TIF00292355', 336, 27, 60122, 1, '2018-04-03 20:08:09', '2018-04-05 19:57:54', 1, 1, '2018-05-02 20:08:09', '', 'Alfin'),
(229, 'TIF00544603', 378, 29, 50186, 1, '2018-05-17 23:10:00', '2018-05-18 13:11:35', 1, 0, '2018-06-15 23:10:00', '', ''),
(197, 'TIF00220266', 350, 27, 60325, 1, '2018-04-10 16:53:07', '2018-04-12 10:50:58', 1, 0, '2018-05-09 16:53:07', '', ''),
(198, 'TIF00264554', 365, 27, 60318, 1, '2018-04-10 19:37:11', '2018-04-12 19:35:56', 1, 1, '2018-05-09 19:37:11', '', 'alfin'),
(199, 'TIF00511170', 218, 29, 50456, 1, '2018-04-16 21:17:50', '2018-04-17 16:11:55', 1, 0, '2018-05-15 21:17:50', '', ''),
(200, 'TIF00557764', 189, 29, 50397, 1, '2018-04-16 21:18:16', '2018-04-17 16:14:25', 1, 1, '2018-05-15 21:18:16', '', 'pemayaran sama ketua kelas'),
(201, 'TIF00511237', 202, 29, 50444, 1, '2018-04-16 21:18:23', '2018-04-17 16:14:45', 1, 1, '2018-05-15 21:18:23', '', 'Bayar sama ketua kelas'),
(202, 'TIF00562506', 196, 29, 50269, 1, '2018-04-16 21:18:31', '2018-04-17 16:23:42', 1, 1, '2018-05-15 21:18:31', '', 'Pembayaran sama ketua kelas'),
(203, 'TIF00538364', 204, 29, 50443, 1, '2018-04-16 21:18:41', '2018-04-17 16:25:22', 1, 0, '2018-05-15 21:18:41', '', ''),
(204, 'TIF00582867', 211, 29, 50352, 1, '2018-04-16 21:18:48', '2018-04-17 16:36:13', 1, 1, '2018-05-15 21:18:48', '', 'Pembayaran sama ketua kelas '),
(205, 'TIF00512303', 201, 29, 50230, 1, '2018-04-16 21:18:55', '2018-04-18 08:52:01', 1, 1, '2018-05-15 21:18:55', '', 'Pembayaran melalui ketua kelas'),
(206, 'TIF00583227', 210, 29, 50378, 1, '2018-04-16 21:19:03', '2018-04-18 17:46:54', 1, 1, '2018-05-15 21:19:03', '', 'Pembayaran diketua klas'),
(207, 'TIF00532062', 200, 29, 50141, 1, '2018-04-16 21:19:10', '2018-04-18 17:59:06', 1, 0, '2018-05-15 21:19:10', '', ''),
(208, 'TIF00577167', 197, 29, 50281, 1, '2018-04-16 21:19:19', '2018-04-18 18:48:00', 1, 1, '2018-05-15 21:19:19', '', 'Pembayaran melalui ketua kelas'),
(209, 'TIF00544346', 195, 29, 50334, 1, '2018-04-16 21:19:26', '2018-04-18 18:51:35', 1, 1, '2018-05-15 21:19:26', '', 'Pembayaran melalui ketua kelas '),
(210, 'TIF00530385', 192, 29, 50255, 1, '2018-04-17 05:17:49', '2018-04-18 22:17:38', 1, 1, '2018-05-16 05:17:49', '', 'Pembayaran sama ketua kelas'),
(211, 'TIF00578274', 212, 29, 50173, 1, '2018-04-17 05:17:55', '2018-04-18 22:22:12', 1, 1, '2018-05-16 05:17:55', '', 'sudah sama gunawan'),
(212, 'TIF00560874', 198, 29, 50210, 1, '2018-04-17 05:18:05', '2018-04-18 22:36:31', 1, 1, '2018-05-16 05:18:05', '', 'pembayaran sama ketua kelas'),
(213, 'TIF00549132', 188, 29, 50246, 1, '2018-04-17 05:18:14', '2018-04-18 22:50:03', 1, 0, '2018-05-16 05:18:14', '', ''),
(214, 'TIF00520194', 190, 29, 50476, 1, '2018-04-17 05:18:22', '2018-04-18 23:36:26', 1, 0, '2018-05-16 05:18:22', '', ''),
(215, 'TIF00537474', 194, 29, 50207, 1, '2018-05-18 14:40:19', '2018-04-19 08:50:40', 1, 1, '2018-06-16 14:40:19', '', 'Nama : Devi Rahmayanti nim: 2017230027'),
(216, 'TIF00566254', 193, 29, 50431, 1, '2018-04-17 19:25:05', '2018-04-19 10:39:07', 1, 1, '2018-05-16 19:25:05', '', 'Pembayaran Oleh Ketua Kelas'),
(218, 'TIF00214109', 371, 27, 60234, 1, '2018-04-24 21:07:50', '2018-04-21 14:43:13', 1, 1, '2018-05-23 21:07:50', '', 'Alfin rusdiansyah'),
(219, 'TIF00597182', 218, 29, 50202, 1, '2018-05-11 19:39:49', '2018-04-26 08:18:00', 1, 0, '2018-06-09 19:39:49', '', ''),
(221, 'TIF00545752', 387, 29, 50312, 1, '2018-04-26 22:14:54', '2018-04-28 21:52:06', 1, 0, '2018-05-25 22:14:54', '', ''),
(227, 'TIF00581302', 377, 29, 50131, 1, '2018-05-02 21:01:17', '2018-05-04 19:01:10', 1, 0, '2018-05-31 21:01:17', '', ''),
(224, 'TIF00553574', 375, 29, 50100, 1, '2018-04-28 20:27:41', '2018-04-29 18:14:25', 1, 0, '2018-05-27 20:27:41', '', ''),
(225, 'TIF00549946', 386, 29, 50273, 1, '2018-04-28 20:27:49', '2018-04-29 23:12:30', 1, 0, '2018-05-27 20:27:49', '', ''),
(226, 'TIF00555806', 382, 29, 50154, 1, '2018-05-01 21:39:30', '2018-05-02 13:39:07', 1, 0, '2018-05-30 21:39:30', '', ''),
(230, 'TIF00532506', 218, 29, 50114, 1, '2018-05-17 23:09:34', '2018-05-19 21:07:42', 1, 0, '2018-06-15 23:09:34', '', ''),
(232, 'TIF00532370', 391, 29, 50434, 1, '2018-05-21 10:22:51', '2018-05-23 08:23:58', 1, 0, '2018-06-19 10:22:51', '', ''),
(233, 'TIF00568719', 385, 29, 50247, 1, '2018-05-24 08:37:47', '2018-05-25 21:20:51', 1, 0, '2018-06-22 08:37:47', '', ''),
(234, 'TIF00568771', 388, 29, 50334, 1, '2018-05-24 08:38:01', '2018-05-26 07:45:56', 1, 0, '2018-06-22 08:38:01', '', ''),
(235, 'TIF00527043', 384, 29, 50283, 1, '2018-05-24 10:13:31', '2018-05-26 08:40:16', 1, 0, '2018-06-22 10:13:31', '', ''),
(236, 'TIF00511895', 381, 29, 50436, 1, '2018-05-24 10:13:09', '2018-05-26 09:07:39', 1, 0, '2018-06-22 10:13:09', '', ''),
(237, 'TIF00538397', 394, 29, 50400, 1, '2018-05-25 23:21:59', '2018-05-27 09:43:05', 1, 0, '2018-06-23 23:21:59', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=396 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `full_name`, `email`, `level`, `verified`) VALUES
(1, 'admin', 'f2ee0636898ad07a06287fcb99dc2394', 'admin', '', '1', 1),
(33, 'hardi', 'dddb1b27f1a7d7601a6a0f7e2ca92926', 'hardi', 'suhardiansyah.hardi@gmail.com', '3', 1),
(36, 'Farahiyahanifa', '2194b55baf477297149a278bd7a66bdf', 'Farahiyah Hanifati', 'farahiyahhanifati24@gmail.com', '2', 1),
(43, 'bama', 'e67a7144f9a51413e6b6fd01566be7c7', 'bama', '', '3', 1),
(59, 'Pungky', 'fe3861f0b4a594c6769f1dbea503f7b1', 'Muranto', 'pungkymuranto@gmail.com', '2', 1),
(80, 'ahya', 'be10d2fe5ba934493bb07b39bc73a617', 'ahya fadhlul salam', '', '2', 1),
(87, 'anggini', 'd97da029b20e89bcbef0b884b2f7a7f3', 'anggini eka putri', '', '2', 1),
(89, 'yusfa', '03ef81aae8e36a011ecbb0b801e6b584', 'yusfa tri bagustia', '', '2', 1),
(100, 'dewi', 'ed1d859c50262701d92e5cbf39652792', 'dewi yolanda elisabeth', '', '2', 1),
(101, 'pangestu', 'aa57bc4eee32968f4887688c87df9c0d', 'pangestu apri setiawan', '', '2', 1),
(102, 'arif', '03ccd0c384b26142685776e5baec7a92', 'Arif Syaifudin', '', '2', 1),
(103, 'sayuti', 'c4e471d67eaa6ad8e9e261cd3c6bc399', 'achmad sayuti', '', '3', 1),
(106, 'bambang', 'fe20d6263cd9ca466077eeeed3181e8e', 'bambang S', '', '2', 1),
(117, 'Muftirandy', '486e406cdda98dfa2e69bde6b0a4d305', 'Muftirandy Prayitno', 'r.diagonalley@gmail.com', '2', 1),
(118, 'Harlequines', '76c399a315fbd2fd08c4eac37031b128', 'irsyad kholif ', 'vxsetsuna@gmail.com', '2', 1),
(119, 'Yulianto', '74ee55083a714aa3791f8d594fea00c9', 'Yulianto Nugroho', 'yn_sasuke14@yahoo.com', '2', 1),
(120, 'kamalmalix', '26b049c69f4e3eec44dcc95b9473bf47', 'Abdul Malik Kamalullah', 'kamalmalix@gmail.com', '2', 1),
(122, 'Vieqri', '2d0d3ef38033fccdeb17abc71f665c76', 'Vieqri samputra', 'Vieqris@gmail.com', '2', 1),
(123, 'Iki', 'c49c7f6183422cba8565d8f757bf87bf', 'Julfikri syahna', 'rdthiky@gmail.com', '2', 1),
(124, 'Acep', '60926dc8918b9b66b512ebcdad41451b', 'Acep azizirrohim', 'azizirohimacep@gmail.com', '2', 1),
(126, 'Ilham', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Ramadhan', 'ilhamabaa97@gmail.com', '2', 1),
(139, 'Riswan', '0065feca02e0ac3f10f6ea30950853bb', 'Riswan Alam Nauli', 'riswanalam181215@gmail.com', '2', 1),
(141, 'syahrul', 'bc9f887c94cf017291f936539f2a1d6d', 'syahrul ramadhan', 'syahrulr980104@gmail.com', '2', 1),
(142, 'supriyantodms', '1033c16032d0aa37023b46c71f797f1d', 'Supriyanto', 'supriyantopdw12@gmail.com', '2', 1),
(143, 'Isnainy imro atun s', '5ee37305768faf482caccbb530176179', 'Isnainy imro atun s ', 'isnainysholecha@gmail.com', '2', 1),
(145, 'rudi', '5c806bc4d0b60480470e77b3273e9e79', 'rudi istianto', 'istiantorudi048@gmail.com', '2', 1),
(149, 'mfaisalyudiansah', '8ef08edab9046ad79ea2c243ec510b13', 'Muhammad Faisal Yudiansah', 'mfaisal.yudiansah@gmail.com', '2', 1),
(150, 'Jodi', 'f5656f11816a4e065c2494844dcf8aab', 'Jodi istiawan', 'sabililah90@gmail.com', '2', 1),
(152, 'nandaftr', '936bed245510a8da696bbf93309e7a2a', 'nanda fitri damayanti', 'nandafitri29@yahoo.co.id', '2', 1),
(155, 'bagus', '17b38fc02fd7e92f3edeb6318e3066d8', 'Bagus Unsada', '', '2', 1),
(158, 'ido', '8a193602d32a8a504465077e16561a92', 'Muhammad Ido Malda', '', '2', 1),
(159, 'alpin', 'd9be8dacc34375b56ac0a93a46a014c8', 'alpin', '', '2', 1),
(162, 'denis', 'c3875d07f44c422f3b3bc019c23e16ae', 'Denis Ahmad', '', '2', 1),
(163, 'dwi', '7aa2602c588c05a93baf10128861aeb9', 'Dwi irawan', '', '2', 1),
(164, 'franklin', '9c1f33ca0b1f1b1055c3144d69853927', 'Franklin Kurama', '', '2', 1),
(168, 'elinmarliana', '1355fe91837ca89f60208666b02965f9', 'Elin Marliana', 'elinmarliana13@gmail.com', '2', 0),
(187, '2017230001', '63f925937b073baa7a4d90008bb3e794', 'FIKRI FADILLAH', '', '2', 1),
(188, '2017230012', '68b25e01e54ea70c8cac11fbf0a6dd04', 'ALFIAN AGUS SAPUTRO', '', '2', 1),
(189, '2017230003', 'dd7b3891e3fd651f5a39d7b71f9311a1', 'ARIS KRISTIAN', '', '2', 1),
(190, '2017230088', 'f0c7610fd17a3aab0eb46f5796f6eabb', 'ARIS SARWANTO', '', '2', 1),
(191, '2017230120', '44304a82e15c871690a3907c058664b4', 'ANGGA WAHYU SYAHDILLAH', '', '2', 1),
(192, '2017230017', '4f6fcd289054ef4120f5a7402b33d403', 'AHMAD ZAILANI', '', '2', 1),
(193, '2017230004', '464a82c165670bcf1b3a7aa6c48fdfbf', 'AGUS ILHAM PANGESTU', '', '2', 1),
(194, '2017230027', '490f379281ceab4927ce83ad556198f2', 'DEVI RAHMAYANTI', '', '2', 1),
(195, '2017230066', '917edcad86faa39c1359f1978e948d3b', 'ISNAINI NUR HIDAYAT', '', '2', 1),
(196, '2017230145', '75258424ffe1188d60db650d11dd6b16', 'YOGA SAPUTRA', '', '2', 1),
(197, '2017230064', '757c48ef9152e91d906795a0e80ae75d', 'RIZKY REZEKY', '', '2', 1),
(198, '2017230049', '1d824792c14e261bfd020e50db3ba13b', 'NUR HIDAYAT RAMADHON', '', '2', 1),
(199, '2017230115', 'c31bde3b555f3e85dd3b0539ef215238', 'MUHAMAD SODIQ', '', '2', 1),
(200, '2017230006', '5e9abc22f4f0ed0655734bdbdf74c39c', 'RIAN HARIANTO', '', '2', 1),
(201, '2017230018', 'f25ab7fdca6eeabdc58ef755c7ce74ab', 'WAHYU  APRIYANTO', '', '2', 1),
(202, '2017230078', '3968965ba98d925c7d4ff3e1b77ec8de', 'GUNAWAN SUPRIYADI', '', '2', 1),
(203, '2017230091', '8f387740665893b42e33565f319a4ce6', 'RUDI ISTIANTO', '', '2', 1),
(204, '2017230075', 'dadbce0b401bb92584e57a4270598388', 'ERNANDA AMALIA ARUM', '', '2', 1),
(205, '2017230082', '2588572ced2ba16a2e2b0460c8cad15d', 'ALVIN PRISIN TOMASOA', '', '2', 1),
(206, '2017230185', 'e34ab9c571b9b5ff652675f6ff1ae003', 'ADIMAS PRAYOGA PANGESTU', '', '2', 1),
(207, '2017230058', '1d2941bf33fcdd121b1112b4b0b2b5c9', 'DONI DWI RAHARJO', '', '2', 1),
(208, '2017230083', '0697a4b69c4671da08b9bb634c868519', 'CHANDRA HARYANTO', '', '2', 1),
(209, '2017230021', '842c6b4173e9abf1c18712fdc56fad9f', 'LUQMAN HIDAYAT', '', '2', 1),
(210, '2017230119', 'e175af90ddb1b6e620576cdb73638eec', 'MARSHAL NATARETH G.', '', '2', 1),
(211, '2017230040', '518130a17e846108e10f28a96031cda4', 'MEGA PANGASTUTI', '', '2', 1),
(212, '2017230020', 'd5da51f2bc9481bd9a7b41b980027e2c', 'MUHAMAD WAHIDIN', '', '2', 1),
(213, '2017230035', '381503aec7ecf079e347a289953403bb', 'MUHAMMAD RIFAI HIDAYATULLAH', '', '2', 1),
(214, '2016230010', '0c5c2f79e7c115172a3d0ee1f866ce9d', 'Lahar Notonegoro', '', '2', 1),
(215, '2016230031', '854b92c54f5b0c7728e2f5c785d24e33', 'prodensio veto meo', '', '2', 1),
(216, '2016230035', '4ad097efcdecd122d23fb065740e4a3c', 'Alif andi maryudi', '', '2', 1),
(217, '2016230022', '25f1223cdb02aed73cebc2fb19bb0f85', 'FIKRI HADITYA RAMADHAN', '', '2', 1),
(218, '2016230016', 'b8240c820385dc9acfb190ded9795507', 'Chairul Rizki', '', '2', 1),
(219, '2013230072', '607c51e82ee9a84ec0d1f7b4eeb49659', 'Norma Zerlina Amadea', '', '2', 1),
(220, '2016230030', '489846b34925cee09dde3167363e09c2', 'Nugroho Adi Pratomo', '', '2', 1),
(221, '2016230044', '4013bf2f5da87bb2c45b5402b11146c2', 'Yoga Faradila Anwar', '', '2', 1),
(222, '2016230039', '344c333d98bb3e414ddce2d783beeb2f', 'Agung Setiawan', '', '2', 1),
(223, '2016230007', '466b9a019e2201b75b52704f4b50edb8', 'vega humaira', '', '2', 1),
(224, '2016230026', '970ced11bcfe30152d3a0d7759aa25eb', 'Fahmi Hidayat', '', '2', 1),
(225, '2016230127', 'c350a8080e8d8588882c8170ebf020f0', 'Fajar Rifai', '', '2', 1),
(226, '2016230034', '3225fda1385a6f7795cbd8104a5e375f', 'Taryana Levianda', '', '2', 1),
(227, '2012230007', 'afe2bb352d4caff4a29fc9d33ea9f75e', 'Ricky Fitrah Abhari', '', '2', 1),
(228, '2016230023', '3b0443fd62afb9bddd500640fcbc4266', 'Anjas Mawi', '', '2', 1),
(229, '2016230015', 'ee9c576db3ac0833c04eb0a84e882fa7', 'Gilang Sadewo', '', '2', 1),
(230, '2016230018', '0a2459e554ac8eda3b8fb924b4467d6b', 'Agung Kurniawan', '', '2', 1),
(231, '2013230041', '32d68ffe04bde6e7667bfaf684e38d14', 'Muhammad Fadilah', '', '2', 1),
(232, '2016230020', '34fba9f02fe1a2b533920e1a954bc779', 'Kurniawan Dwi Yulianto', '', '2', 1),
(233, '2016230001', '7171cc6ce73415b9f376e85e30f033d9', 'Nanang Fauzan Najib', '', '2', 1),
(234, '2017230138', '67a40fa27dc0ff58bb919788c67cbe57', 'Syahrul Ramadhan', '', '2', 1),
(235, '2017230134', '583a5117dd67b0bcc1a689d83b0f0ed0', 'Riswan Alam Nauli', '', '2', 1),
(236, '2017230111', '804fcaec1586e42afb800015dd5f3175', 'Akhbar Restu Saputra', '', '2', 1),
(237, '2017230136', '4f1d180252a7a5a65d4eab04f480d833', 'Albert', '', '2', 1),
(238, '2017230105', 'ddfacf75dcf5e5af6fa1dedd89752875', 'Muslih Badruttamam', '', '2', 1),
(239, '2017230113', '98af89df1037b41a0f0a2756bb959268', 'Davis Chaliq.H', '', '2', 1),
(240, '2017230123', '9a276ba1468e0a08199a3aae35314e3b', 'Revina Tania Pratiwi', '', '2', 1),
(241, '2017230137', '0d9775d96b0f81a0d447fad6ec58fcd3', 'Bayu Puja Utama', '', '2', 1),
(242, '2017230131', '47d9f3d36ecd3c0abc2f59d54e3fa575', 'Bagoes Dharmawan', '', '2', 1),
(243, '2017230116', '5aad4c7346b0d767fcd6d1c46070bb60', 'Rizky Aditya', '', '2', 1),
(244, '2017230118', '7c1e920a77dc0ba1504a31dd785b9bcc', 'Muhammad Rizki', '', '2', 1),
(245, '2017230130', 'fc16f2cdf2d22e0a0720f7cb2464e7db', 'Izzul Fikri', '', '2', 1),
(246, '2017230219', 'dbb36a7e0ee196f3ed87c69f0defe3c0', 'Achmad Sopyan', '', '2', 1),
(247, '2017230125', '73df5b153ffe8ca148fb10a5d28e3fa4', 'Ihsanudin', '', '2', 1),
(248, '2017230114', 'd532ff6c6c9dfc4367311a2ad580d198', 'Muhamad Yusuf', '', '2', 1),
(249, '2017230108', 'b299770c5571c08a9f3acaeb0e7dd1e2', 'Supriyanto', '', '2', 1),
(250, '2017230132', 'ec850a0a2fb7f7971431eaed3477bc69', 'M.Jihad Akbar Riyadi', '', '2', 1),
(251, '2017230103', '615d0c1533e2a2db9113d0e24d887cb3', 'Fani Dendika', '', '2', 1),
(252, '2017230121', 'abb55b2580fca03cb02e11eddd2cca74', 'Erik Kuswanto', '', '2', 1),
(253, '2017230110', 'f7ad97c9bdaa450cce2507213395a510', 'M.Syamsul Muhyidin', '', '2', 1),
(254, '2017230140', 'eac1afe1f56d202c2ebefb6929befbf6', 'Aditya Darmawan', '', '2', 1),
(255, '2017230135', '954d4221c33798822a78d0acd1c3643c', 'Mumammad Faisal Yudiansah', '', '2', 1),
(256, '2017230100', '4e605a02a163c0e1da0b7be3b94c6bfd', 'Muhammad Rafiqi Fadli', '', '2', 1),
(258, '2016230037', 'd41d8cd98f00b204e9800998ecf8427e', 'ARI', '', '2', 1),
(259, '2016230036', '21f97b4c6f21e1ef9c42c9cd27a534e1', 'IKSAN', '', '2', 1),
(260, 'Muhamad Yusuf', 'bd1c6325c3c10f6da1a1e5e681ea9815', 'Muhamad Yusuf', 'muhamadyusuf500@gmail.com', '2', 1),
(261, 'Arisrwnt', '130ee211ca12e1856abeed0be07dd923', 'Aris Sarwanto', 'arisarwanto28@gmail.com', '2', 1),
(265, 'Ernanda', '11ee9f6a90f83d9a4666b21f1e80be85', 'Ernanda Amalia Arum', 'ernandaamalia12@gmail.com', '2', 1),
(266, 'FelixAcoup', 'fee9cc9b4f6d526c9eab4b15ecc4fb8e', 'FelixAcoup', 'jamespagnp@mail.ru', '2', 0),
(267, 'Dika1808', 'd41d8cd98f00b204e9800998ecf8427e', 'Dika aditiya', 'dikaaditiya1808@gmail.com', '2', 1),
(268, 'Dika0818', 'c55e48b89f13ad177e8370eb0430894c', 'Dika aditiya', 'dikaaditiya1301@gmail.com', '2', 1),
(269, 'Mustopa', 'd41d8cd98f00b204e9800998ecf8427e', 'Mustopa kamaludin', 'mustopakamall29@mail.com', '2', 1),
(280, 'mus', 'dbf98a717a258332f1cb7299f6cf0ec2', 'Kamaludin', 'mustopakamall29@gmail.com', '2', 1),
(282, '2016230011', '1d319625456c40b7646d1ae70dcab0d1', 'DIKA TIO PRATAMA', '', '2', 1),
(283, '2016230012', 'd34c18263a48def33f98e55a8623310f', 'MITCHELL MARCEL', '', '2', 1),
(288, '2017230141', '45cc2e164a4ba2d8f3ee639c4a12338c', '2017230141', 'rianriyana926@gmail.com', '2', 1),
(289, '2017230106', 'a01fdb5e047e05c546a96eca66922f7e', 'Qalam Mauladi Muhammad', 'qalamborghini26@gmail.com', '2', 0),
(290, 'google123', 'ddf24a16d87276a474856621a2ae70c9', 'spongebopsquera', 'zaenalbanker@gmail.com', '2', 0),
(291, 'nrf', '7eda9a0d45d4dbfa99e06d4f402c2e67', 'nrf', 'nurrahman_firmansah@yahoo.com', '2', 0),
(292, 'Irsyad', '07c856678f2551cc8aacef2efac386f5', 'Kholif', 'irsyadkholif23@gmail.com', '2', 0),
(295, 'alvin', 'fa7196b7fae3a165dd22cae4921d5261', 'Alvin Prisin', 'prisinalvin@gmail.com', '2', 0),
(296, '2016230075', '300c8958d4b5501c3f9fee3e117ef910', 'Yona Hergalina', '', '2', 1),
(297, '2016230061', '90eb7a3f6f00004868b482e65df6959a', 'WIWIN MAFIROH', '', '2', 1),
(298, '2016230076', '3e461c5be77d0408d2fb38442d54b4b1', 'NABELLA GITA RAHMA', '', '2', 1),
(299, '2016230087', '2db614290dfd3f511b3782905a887ba9', 'MUHAMMAD TEGAR PRAKASA', '', '2', 1),
(300, '2016230078', '7dce45100a1b3a164e723aa4b4dc876b', 'DZULFAJRI ABDILLAH', '', '2', 1),
(301, '2015230038', '65b85ed8c0ca0f7a83b3ffd23de118b8', 'WIDHISTYA PUJI SASONGKO', '', '2', 1),
(302, '2015230015', '6345af15f816b15194a5830c91747b1e', 'ROMMY FIRLIANSYAH', '', '2', 1),
(303, '2015230021', '2d335d675a6d391de510e407986b80a5', 'DWIKI ANGGORO SYAFITRI', '', '2', 1),
(304, '2016230086', '881940a1adfca5a24f64a2a5d8fa5c72', 'MUHAMMAD ZAHIDIN NUR', '', '2', 1),
(305, '2015230903', '6bc5024bd48be56b1d516f143ca7207a', 'HARIS MUNANDAR', '', '2', 1),
(306, '2016230048', '5b33de464e25bb1ceff39d82b756c3d4', 'KADAFI NURARIS SETYO ADJI', '', '2', 1),
(307, '2015230028', 'b9fab0d0a22b7d855eaad75c92e1804b', 'MUHAMMAD AKNA FATURAHMAN', '', '2', 1),
(308, '2015230042', 'b5749c5b6adf02c0303ee5ebebb07320', 'BRIAN ADYATMA', '', '2', 1),
(309, '2016230081', 'f354a9f1d11c8ded5e9398389d4c3527', 'AHMAD SANDI SETIAWAN', '', '2', 1),
(310, 'Rommy', '1572541b4c30ccd7655bc21cc7bf8fd0', 'Rommy firliansyah', 'Rommyfirliansyah29@gmail.com', '2', 1),
(311, 'officialadyatma', '539a0a2321f6308f1e1e3a1b053cb3ac', 'Brian adyatma', 'brian.adyatma1@gmail.com', '2', 1),
(312, 'Didik', '86c633fe4bb4828ddd9f9813750478d0', 'Didik Daroji', 'didikdaroji@gmail.com', '2', 1),
(313, 'DirtyZap', '56ca8904af9361be1e8b17ad29895af1', 'Alam Giri', 'alamgw97@gmail.com', '2', 1),
(314, 'Dwikeys', '8f9cd42edda7eddaa8456b4f264b9345', 'Dwiki Anggoro', 'dwikeys@gmail.com', '2', 1),
(315, 'rute89', 'faf75907babe49d537df0b0508edc6b8', 'Irsyad Kholif M', 'irsyadkholif23@gmail.com', '2', 1),
(316, '2016230080', '999ba7e050213cf8dd7f94469054f713', 'INDRA JUNIYANTO', '', '2', 1),
(317, '2015230043', '65a20d413c652e32612b82e3c8e89501', 'YUFAN NICO DEMORA', '', '2', 1),
(319, '2016230052', '4fd9c58c370456ab4b36c27aa43aa1d5', 'RIZKI AKBAR', '', '2', 1),
(321, 'akiraar', '96e79218965eb72c92a549dd5a330112', 'akira', 'akira.idn@gmail.com', '2', 1),
(326, 'pariston', 'd41d8cd98f00b204e9800998ecf8427e', 'pariston', 'vxsetsuna@gmail.com', '2', 1),
(327, 'hard', 'd64a84456adc959f56de6af685d0dadd', 'suhar', 'game.hardid@gmail.com', '2', 1),
(328, '2016230025', '1ca8a02830fcad1165c3b0001e72c101', 'Choirul Satriyo Utomo', '', '2', 1),
(329, '2016230043', '00ecc189f5c76bf5e6915293b0b3eccc', 'ARIPIN ALI ', '', '2', 1),
(330, '2016230050', '5eac083dc10b0f84e9b7c7a4730acf48', 'RIKI DWICAKSONO ', '', '2', 1),
(331, '2016230079', '7f224fa5d54eb1fe33d8e02c9e2cb086', 'AGAM ARIA DAMAR', '', '2', 1),
(332, '2016230088', 'cb54759ef4fc2fb93613e35c84dd1a9f', 'ANDRIYANSYAH ', '', '2', 1),
(333, '2016230089', 'fc8e7eae8b4b04662941591891e7e9c6', 'dian chandra pratama', '', '2', 1),
(334, '2016230092', 'cdeaef104b527540f7c50762042e22fe', 'TAUFIK HIDAYAT ', '', '2', 1),
(335, '2016230110', '24d25baeac7da2f70e302b2ca74c39d0', 'TRI ANGEL PANGESTU ', '', '2', 1),
(336, '2016230116', 'dec6336ebba8159b220566a1d64992c6', 'AGUS PRAYOGO ', '', '2', 1),
(337, '2016230124', 'b9060d77ee1733f865201761af4f4a15', 'ALFIN RUSDIANSYAH', '', '2', 1),
(338, '2016230141', '14a06589f09cf1bb13ed70ad468a5164', 'SINTA YULIA FITRI', '', '2', 1),
(339, '2016230147', '06d807de6edb1289e221eab9d9560b0b', 'MUHAMAD FATHAN ', '', '2', 1),
(340, '2016230150', '6f385c8bf6c7c6cfd08a80c5f9d87787', 'ADI STEINHARDT ', '', '2', 1),
(341, '2016230152', '0f17224badd67bca164f331aea488b7c', 'DENY PRIYANTO ', '', '2', 1),
(342, '2016230161', 'c913eda8e5b031f4da08e1aecc8953c3', 'REZA ARIF SETIAWAN ', '', '2', 1),
(343, '2016230903', '9ef5225ae995868308cb655614623e78', 'MUHAMMAD ALDO TRIATMOJO ', '', '2', 1),
(344, '2017230904', '50fbdde30c5753e933720c4ebb345bfa', 'ADAM ROBBY SAPUTRA ', '', '2', 1),
(345, '2017230905', 'c4b3a4c2fbcdeb59ec45e9bbea2ee807', 'HAFIDZ ABDILLAH SIDQI ', '', '2', 1),
(346, '2016230047', '21ef3b65726270d7eb457b07aeadb999', 'MOHAMMAD FAHREZA RABANI ', '', '2', 1),
(347, '2016230049', '950f9f435317cbb9816145083cbbad65', 'NICKO ADY PRADANA ', '', '2', 1),
(348, '2016230051', '5b81022b3340cbafabd561456d24e907', 'RIRI JUHARI ', '', '2', 1),
(349, '2016230054', 'e2eaca6f507708be3b9ff43511433f87', 'MOCHAMMAD RIANDI ', '', '2', 1),
(350, '2016230057', 'f42f0c4e2ddcc65c01e25d514e3b37b6', 'INDRA SAPUTRA ', '', '2', 1),
(351, '2016230060', '8af249f30538963974576c3cade56bd1', 'MUHAMMAD RIFKI AMDANI', '', '2', 1),
(352, '2016230062', 'f440448739c0a9822eb8a82d83d348c0', 'PRAMITHA WAHYU NINDIANTI ', '', '2', 1),
(353, '2016230064', '6ade1cde9bae8d3a13f52428bb3283a8', 'LUKEN RAFLIANSYAH BUKHORI', '', '2', 1),
(354, '2016230067', 'c7480674873096ff2bff73a722731f2b', 'AGUNG PRASETYO SUDARTO ', '', '2', 1),
(355, '2016230068', '80c605ecd2277ad1ce7465c2d2471c63', 'MUTIARA NUR AFIFAH ', '', '2', 1),
(356, '2016230071', 'b1f8dc19cc37c4a11aecfbccf485a308', 'REGY RAMADHAN ', '', '2', 1),
(357, '2016230077', '61b31c5637ee9aa06073b204a88f1d74', 'MOHAMMAD TEGAR PRIABUDI ', '', '2', 1),
(358, '2016230083', '7abefa3f2538574e604e1c5bd60c8af1', 'ADAM ARRAFI PIAY ', '', '2', 1),
(359, '2016230046', '67c8597cb5aa245b41a9b194a0c46a57', 'ILHAM FITRIANSAH', '', '2', 1),
(360, 'Nicko ady', 'b47b131eb0e210cf9312cd057f09a0cf', 'Nicko ady pradana', 'nickoadypradana41@gmail.com', '2', 0),
(362, 'Adi', 'd45209ceb141624c4379a75945c9564b', 'Adi Steinhardt', 'adste23@gmail.com', '2', 1),
(363, '2016230094', '0bb5fa8e00f67b48daaed12a0eaa3e7f', 'USTON TANTOWI', '', '2', 1),
(364, '2016230112', '8d21b383acb1cefc42dbf6271090201a', 'mohamad wahyudin', '', '2', 1),
(365, '2016230004', 'd2a5679868e917fe638ad1d876cf4a60', 'PUTRI ARINDA ERNAWAN', '', '2', 1),
(366, '2017230096', 'c9a166c1ebe2c954b2fdeafbfe704990', 'NURCHOLIFAH', '', '2', 1),
(367, '2017230908', '00dcace0246b134f2c98d856eb5b0566', 'SUKARNO INDRA SETYAWAN', '', '2', 1),
(368, '2016230045', '255b6c94aa924d0a67bae41f867b415a', 'MUHAMMAD BAGASKORO DWIANSYAH', '', '2', 1),
(369, '2016230085', '7d2f4dd4dcd137bfb8ff7633e0c239fc', 'HEGY MONDA RIZKY', '', '2', 1),
(370, '2014230036', 'd41d8cd98f00b204e9800998ecf8427e', 'Bayu Hermawan', '', '2', 1),
(371, '2016230114', '42ae227e48c8f1eb954f2e90dfbabcd6', 'adli lazuardi', '', '2', 1),
(372, '2016230055', '7aa807e3ec27a069edfa1b7a44b76e39', 'linda yustiningsih', '', '2', 1),
(373, 'BryanSkype', '32017262e0e0b815b3c9918639cda724', 'BryanSkype', 'ashley@bestusamakemoney.tk', '2', 0),
(374, '2017239001', 'af466f9be0cd86ff84dbbcadac236583', 'AWALUDDIN SUNU NURDIANTO', '', '2', 1),
(375, '2017230024', '8b37acfa5e698b54d9713c02bb01621c', 'RENDY SUPRIYANDANA', '', '2', 1),
(376, '2017230037', '45e99e8eb3b3987b3d7f2b420b4dc56b', 'MUHAMMAD KAZRUNI YAHYA', '', '2', 1),
(377, '2017230036', 'e7aa62555f859d9ecfefda0f4bd45827', 'NAZELIKA PUTRI AYU NALURITA', '', '2', 1),
(378, '2017230032', '14096f09186e340265ef8f6286284ea9', 'VIRA METTA KARUNASARI', '', '2', 1),
(379, '2017230041', 'e5295ecee59acb5dd18b1427884d09c5', 'MUHAMMAD IKHWAN AMINUDIEN', '', '2', 1),
(380, '2017230045', '14834851d1d9fcbf41f2421560eb3a51', 'ANGGA PRADINA RAMDANI', '', '2', 1),
(381, '2017230046', 'b360b2fc889d4909f19b418f2ef71429', 'MOCH RAY VARANDY', '', '2', 1),
(382, '2017230019', '95d642ece52da99444fe3153134de1d9', 'ERRY MARULI TUA', '', '2', 1),
(383, '2017230008', '637bd009f2409c0945d39f10738d1cb9', 'JULIAN ARDILLAH ABHIRITY', '', '2', 1),
(384, '2017230048', '163ac4cc88547f313683533482833279', 'DEO ANDIKA', '', '2', 1),
(385, '2017230015', 'e58ec4318e0e161b0189d8025039ce9a', 'RIZKY PRATAMA', '', '2', 1),
(386, '2017230025', '59ab4fc0dbcad1df8dc47ab7aef90702', 'LIOSHA PAGUA THAMA', '', '2', 1),
(387, '2017230023', '96b2ebec280320b3279e5c394859efa9', 'AGNIEL CRISTIANTO', '', '2', 1),
(388, '2017230039', 'cefb0d2a61f9867974103494981c7745', 'DIAZ IKHSAN RIZALDY', '', '2', 1),
(389, 'kazruni27', 'ec9f85017edb3396616ec9dc51ffa7c3', 'muhammad kazruni yahya', 'dhenzkazruni@gmail.com', '2', 0),
(390, 'FumikoReaw', '754be15b0731549ababbbb86cda7c81c', 'FumikoReaw', 'FumikoReaw@5ooi8oiz.xzzy.info', '2', 0),
(391, '2017230026', '191b9c21228abd58f81fe9ce18a1ea5d', 'MUHAMAD GILANG NURFADILA PUTRA ', '', '2', 1),
(392, '2017230044', 'a785f250a83b63870fd01189318f5fad', 'PRISKA AGNES TUMBELAKA', '', '2', 1),
(393, '2017230014', '3a6ecc52eb584af0e6e21f17e0c7b38b', 'ARIF MAY WANTO', '', '2', 1),
(394, '2017230013', '68011a2a7024c8ebcfcd2140736eb23c', 'INDAH DWI LESTARI', '', '2', 1),
(395, 'FelicitaOn', 'ac500b7e50ff4bf5f62636c5d4990f6f', 'FelicitaOn', 'FelicitaOn@sevuodrd.xzzy.info', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_verification_code`
--

CREATE TABLE IF NOT EXISTS `tb_verification_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `code` int(6) NOT NULL,
  `expire` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `tb_verification_code`
--

INSERT INTO `tb_verification_code` (`id`, `id_user`, `code`, `expire`) VALUES
(5, 120, 3563, '2017-09-19 12:13:08'),
(6, 33, 5160, '2017-09-19 12:59:44'),
(7, 33, 2964, '2017-09-19 15:45:06'),
(8, 131, 3962, '2017-09-19 17:22:29'),
(9, 132, 9911, '2017-09-19 17:23:42'),
(11, 133, 2787, '2017-09-19 17:31:14'),
(17, 134, 3380, '2017-09-19 18:55:26'),
(18, 36, 9874, '2017-09-19 19:51:43'),
(19, 135, 2783, '2017-09-20 00:38:42'),
(20, 136, 9792, '2017-09-20 03:07:11'),
(21, 137, 2183, '2017-09-20 18:29:27'),
(22, 138, 3200, '2017-09-20 20:33:17'),
(23, 139, 9401, '2017-09-20 20:57:45'),
(24, 140, 3879, '2017-09-20 23:39:16'),
(25, 141, 1183, '2017-09-21 16:49:03'),
(26, 142, 4044, '2017-09-21 20:32:14'),
(27, 143, 5689, '2017-09-21 21:24:15'),
(28, 144, 4027, '2017-09-22 19:58:57'),
(29, 145, 8672, '2017-09-22 20:01:27'),
(30, 148, 5187, '2017-09-25 13:23:32'),
(31, 149, 5333, '2017-09-25 21:04:57'),
(32, 150, 3979, '2017-09-25 21:41:25'),
(33, 151, 2340, '2017-09-25 23:17:39'),
(34, 152, 8699, '2017-09-26 06:16:51'),
(35, 153, 6946, '2017-09-26 12:09:42'),
(36, 154, 4157, '2017-09-27 10:45:09'),
(37, 167, 5821, '2017-10-03 10:54:47'),
(38, 168, 1306, '2017-10-03 11:49:29'),
(39, 171, 2411, '2017-10-04 12:09:33'),
(40, 172, 4059, '2017-10-04 15:30:55'),
(41, 171, 6064, '2017-10-04 23:24:44'),
(42, 173, 5665, '2017-10-09 13:45:41'),
(43, 176, 4943, '2017-10-10 15:40:36'),
(44, 177, 5674, '2017-10-11 11:29:29'),
(45, 257, 3850, '2017-10-13 02:27:45'),
(46, 260, 8953, '2017-10-13 22:32:42'),
(47, 261, 3642, '2017-10-14 07:10:41'),
(48, 265, 9581, '2017-10-14 07:57:08'),
(49, 266, 5242, '2017-10-14 15:46:39'),
(50, 267, 6543, '2017-10-16 17:52:47'),
(51, 268, 4528, '2017-10-16 17:55:23'),
(52, 269, 5480, '2017-10-16 18:40:45'),
(53, 276, 1527, '2017-10-16 18:56:07'),
(54, 280, 3997, '2017-10-16 19:03:26'),
(55, 281, 4569, '2017-10-16 19:07:32'),
(56, 286, 1894, '2017-10-18 13:42:32'),
(57, 287, 7399, '2017-10-18 13:44:49'),
(58, 288, 5332, '2017-10-18 13:52:37'),
(59, 288, 8618, '2017-10-18 14:42:59'),
(60, 289, 1300, '2017-10-18 15:04:36'),
(61, 290, 9301, '2017-10-19 20:32:11'),
(62, 291, 4331, '2017-10-23 20:35:04'),
(63, 292, 1145, '2017-10-30 19:50:32'),
(64, 295, 3286, '2017-10-31 14:05:20'),
(65, 310, 3208, '2017-11-08 20:42:28'),
(66, 311, 9610, '2017-11-08 20:43:10'),
(67, 312, 2440, '2017-11-08 20:55:51'),
(68, 313, 9078, '2017-11-08 22:50:28'),
(69, 314, 9613, '2017-11-08 23:06:44'),
(70, 315, 2769, '2017-11-27 20:44:45'),
(71, 318, 3507, '2017-12-14 03:58:47'),
(72, 321, 8476, '2018-02-20 14:28:54'),
(73, 326, 6008, '2018-03-13 20:15:50'),
(74, 292, 9642, '2018-03-13 20:22:27'),
(75, 327, 3688, '2018-03-20 15:01:44'),
(76, 360, 1884, '2018-03-24 10:40:54'),
(77, 362, 2632, '2018-04-03 20:08:19'),
(78, 373, 7160, '2018-04-18 23:30:18'),
(79, 389, 4350, '2018-04-28 16:59:19'),
(80, 390, 3577, '2018-05-05 20:41:16'),
(81, 395, 7249, '2018-06-12 23:47:55');
