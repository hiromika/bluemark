-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 15 Mei 2016 pada 15.55
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `koperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bama_configuration`
--

CREATE TABLE IF NOT EXISTS `bama_configuration` (
  `CONFIG_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CONFIG_NAME` varchar(150) NOT NULL,
  `CONFIG_SLUG` varchar(150) NOT NULL,
  `CONFIG_VALUE` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`CONFIG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Application Global Configuration' AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `bama_configuration`
--

INSERT INTO `bama_configuration` (`CONFIG_ID`, `CONFIG_NAME`, `CONFIG_SLUG`, `CONFIG_VALUE`) VALUES
(1, 'App Name', 'APPNAME', 'Sistem Koperasi'),
(2, 'APP VERSION', 'APP_VERSION', '0.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bama_modules`
--

CREATE TABLE IF NOT EXISTS `bama_modules` (
  `MODULE_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MODULE_NAME` varchar(150) NOT NULL,
  `MODULE_SLUG` varchar(150) NOT NULL,
  `MODULE_DESC` text,
  `MODULE_STATUS` int(11) DEFAULT NULL,
  `MODULE_ENABLED` int(11) DEFAULT NULL,
  PRIMARY KEY (`MODULE_ID`),
  UNIQUE KEY `MODULE_SLUG` (`MODULE_SLUG`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data untuk tabel `bama_modules`
--

INSERT INTO `bama_modules` (`MODULE_ID`, `MODULE_NAME`, `MODULE_SLUG`, `MODULE_DESC`, `MODULE_STATUS`, `MODULE_ENABLED`) VALUES
(1, 'Module Management', 'module', 'Module management desc', 1, 1),
(3, 'User Management', 'user', 'User management', 1, 1),
(6, 'Module Permission', 'module_permission', 'Module Permission', 1, 1),
(7, 'Role Navigation', 'role_navigation', 'Role Navigation', 1, 1),
(8, 'Role Permission', 'role_permission', 'Role Permission', 1, 1),
(9, 'Notifikasi', 'notifikasi', 'Modul Notifikasi System', 1, 1),
(10, 'Broadcast', 'broadcast', 'Email Broadcast Viewer', 1, 1),
(18, 'Module Navigation', 'module_navigation', 'Module Navigation Desc', 1, 1),
(22, 'Configuration', 'configuration', 'Module Configuration Desc', 1, 1),
(28, 'Themes Management', 'manage_themes', 'Themes management desc', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bama_navigation`
--

CREATE TABLE IF NOT EXISTS `bama_navigation` (
  `NAVIGATION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODULE_SLUG` varchar(45) DEFAULT NULL,
  `NAVIGATION_SLUG` varchar(255) DEFAULT NULL,
  `NAVIGATION_PARENT` varchar(255) DEFAULT NULL,
  `NAVIGATION_NAME` varchar(45) DEFAULT NULL,
  `NAVIGATION_CLS` varchar(45) DEFAULT NULL,
  `NAVIGATION_LINK` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NAVIGATION_ID`),
  UNIQUE KEY `uniq nav slug` (`NAVIGATION_SLUG`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `bama_navigation`
--

INSERT INTO `bama_navigation` (`NAVIGATION_ID`, `MODULE_SLUG`, `NAVIGATION_SLUG`, `NAVIGATION_PARENT`, `NAVIGATION_NAME`, `NAVIGATION_CLS`, `NAVIGATION_LINK`) VALUES
(1, NULL, 'dashboard', NULL, 'Dashboard', 'icon-desktop', '/'),
(2, 'module_navigation', 'add_remove_module', '3', 'Add/Remove Module', 'icon-group', '/module_navigation'),
(3, 'module', 'module', NULL, 'Modules', 'fa fa-cubes', '#'),
(4, 'user', 'account', NULL, 'Account', 'icon-group', '#'),
(6, 'user', 'users', '4', 'Users', 'icon-group', '/user'),
(7, 'role_navigation', 'manage_navigation', '3', 'Manage Navigation', 'icon-group', '/role_navigation'),
(8, 'module_permission', 'permission', '3', 'Manage Permission', 'icon-group', '/module_permission'),
(9, 'configuration', 'configuration', NULL, 'Configuration', 'icon-cogs', '/configuration'),
(10, 'manage_themes', 'themes', NULL, 'Themes', 'icon-windows', '/manage_themes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bama_permission`
--

CREATE TABLE IF NOT EXISTS `bama_permission` (
  `PERMISSION_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MODULE_ID` bigint(20) NOT NULL,
  `PERMISSION_NAME` varchar(150) DEFAULT NULL,
  `PERMISSION_SLUG` varchar(45) DEFAULT NULL,
  `PERMISSION_DESC` text,
  PRIMARY KEY (`PERMISSION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data untuk tabel `bama_permission`
--

INSERT INTO `bama_permission` (`PERMISSION_ID`, `MODULE_ID`, `PERMISSION_NAME`, `PERMISSION_SLUG`, `PERMISSION_DESC`) VALUES
(1, 1, 'install module', 'install_module', 'install module ya'),
(2, 1, 'uninstall module', 'uninstall_module', 'uninstall module'),
(3, 1, 'edit module', 'edit_module', 'edit module'),
(4, 1, 'delete module', 'delete_module', 'delete module'),
(6, 3, 'add user', 'add_user', 'add user'),
(7, 3, 'edit user', 'edit_user', 'edit user'),
(8, 6, 'add permission', 'add_permission', 'add permission'),
(9, 6, 'edit permission', 'edit_permission', 'Edit Permission'),
(10, 6, 'delete permission', 'delete_permission', 'Delete Permission'),
(11, 6, 'search permission', 'search_permission', 'Search Permission'),
(14, 8, 'Add Role', 'add_role', 'add_role'),
(15, 8, 'Edit Role', 'edit_role', 'Edit Role'),
(16, 8, 'Add Permission', 'add_permission', 'Add Permission'),
(17, 8, 'Edit Permission', 'edit_permission', 'Edit Permission'),
(18, 8, 'Delete Permission', 'delete_permission', 'Delete Permission'),
(19, 8, 'Search Permission', 'search_permission', 'Search Permission'),
(20, 8, 'Delete Role', 'delete_role', 'Delete Role'),
(21, 7, 'Add Role', 'add_role', 'Add Role'),
(22, 7, 'Edit Role', 'edit_role', 'Edit Role'),
(23, 7, 'Delete Role', 'delete_role', 'Delete Role'),
(24, 7, 'Add Navigation', 'add_navigation', 'Add Navigation'),
(25, 7, 'Edit Navigation', 'edit_navigation', 'Edit Navigation'),
(26, 7, 'Delete Navigation', 'delete_navigation', 'Delete Navigation'),
(27, 7, 'Check Role Navigation', 'check_role_navigation', 'Check Role Navigation'),
(28, 18, 'Edit Module', 'edit_module', 'Edit Module'),
(29, 18, 'Install Module', 'install_module', 'Install Module'),
(30, 18, 'UnInstall Module', 'uninstall_module', 'UnInstall Module'),
(31, 18, 'Add Navigation', 'add_navigation', 'Add Navigation'),
(32, 18, 'Edit Navigation', 'edit_navigation', 'Edit Navigation'),
(33, 18, 'Delete Navigation', 'delete_navigation', 'Delete Navigation'),
(34, 18, 'Search Module', 'search_module', 'Search Module'),
(35, 3, 'Delete User', 'delete_user', 'Delete User'),
(36, 3, 'Search user', 'search_user', 'Search user'),
(37, 3, 'Add Role', 'add_role', 'Add Role'),
(38, 3, 'Edit Role', 'edit_role', 'Edit Role'),
(39, 3, 'Delete Role', 'delete_role', 'Delete Role'),
(40, 6, 'Edit Module', 'edit_module', 'Edit Module'),
(41, 6, 'Install Module', 'install_module', 'Install Module'),
(42, 6, 'UnInstall Module', 'uninstall_module', 'Uninstall Module'),
(43, 18, 'search_navigation', 'search_navigation', 'search navigation list'),
(44, 22, 'add_config', 'add_config', 'add_config'),
(45, 22, 'edit_config', 'edit_config', 'edit_config'),
(46, 22, 'delete_config', 'delete_config', 'delete_config'),
(47, 22, 'search_config', 'search_config', 'search_config'),
(48, 28, 'edit theme', 'edit_theme', 'edit_theme'),
(49, 28, 'install_theme', 'install_theme', 'install_theme'),
(50, 28, 'uninstall_theme', 'uninstall_theme', 'uninstall_theme'),
(51, 28, 'search_theme', 'search_theme', 'search_theme'),
(52, 28, 'Set Active', 'set_active', 'Set active a theme'),
(53, 33, 'Tambah Proyek', 'add_project', 'Menambah Proyek'),
(54, 33, 'Ubah Proyek', 'edit_project', 'Mengupdate Proyek'),
(55, 33, 'Hapus Proyek', 'delete_project', 'Menghapus Proyek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bama_role`
--

CREATE TABLE IF NOT EXISTS `bama_role` (
  `ROLE_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ROLE_NAME` varchar(255) DEFAULT NULL,
  `ROLE_DEFAULT_PAGE` int(1) NOT NULL DEFAULT '1' COMMENT '1: Backend 2: CS',
  `ROLE_STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ROLE_ID`),
  KEY `ROLE_NAME` (`ROLE_NAME`) USING BTREE,
  KEY `ROLE_STATUS` (`ROLE_STATUS`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `bama_role`
--

INSERT INTO `bama_role` (`ROLE_ID`, `ROLE_NAME`, `ROLE_DEFAULT_PAGE`, `ROLE_STATUS`) VALUES
(1, 'Super Administrator', 1, 1),
(2, 'Customer Service', 2, 1),
(3, 'Management', 1, 1),
(6, 'Officer', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bama_role_navigation`
--

CREATE TABLE IF NOT EXISTS `bama_role_navigation` (
  `ROLE_NAVIGATION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE_ID` int(11) DEFAULT NULL,
  `NAVIGATION_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ROLE_NAVIGATION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data untuk tabel `bama_role_navigation`
--

INSERT INTO `bama_role_navigation` (`ROLE_NAVIGATION_ID`, `ROLE_ID`, `NAVIGATION_ID`) VALUES
(95, 1, 3),
(97, 1, 4),
(98, 1, 6),
(99, 1, 7),
(100, 1, 1),
(101, 1, 3),
(102, 1, 2),
(103, 1, 7),
(104, 1, 8),
(105, 1, 4),
(106, 1, 6),
(107, 1, 9),
(108, 1, 10),
(148, 1, 1),
(149, 2, 1),
(150, 3, 1),
(151, 4, 1),
(152, 5, 1),
(153, 1, 3),
(154, 2, 3),
(155, 3, 3),
(156, 4, 3),
(157, 1, 2),
(158, 2, 2),
(159, 3, 2),
(160, 4, 2),
(163, 1, 1),
(164, 2, 1),
(165, 3, 1),
(166, 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bama_role_permission`
--

CREATE TABLE IF NOT EXISTS `bama_role_permission` (
  `ROLE_PERMISSION_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ROLE_ID` bigint(20) NOT NULL,
  `PERMISSION_ID` bigint(20) NOT NULL,
  PRIMARY KEY (`ROLE_PERMISSION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data untuk tabel `bama_role_permission`
--

INSERT INTO `bama_role_permission` (`ROLE_PERMISSION_ID`, `ROLE_ID`, `PERMISSION_ID`) VALUES
(5, 1, 1),
(6, 1, 2),
(7, 3, 2),
(8, 3, 1),
(10, 4, 3),
(11, 4, 1),
(12, 1, 6),
(13, 1, 3),
(14, 1, 4),
(15, 1, 8),
(16, 1, 9),
(17, 1, 10),
(19, 1, 11),
(20, 1, 7),
(23, 1, 14),
(24, 1, 15),
(25, 1, 16),
(26, 1, 17),
(27, 1, 18),
(28, 1, 19),
(29, 1, 20),
(30, 1, 21),
(31, 1, 22),
(32, 1, 23),
(33, 1, 24),
(34, 1, 25),
(35, 1, 26),
(36, 1, 27),
(37, 1, 28),
(38, 1, 29),
(39, 1, 30),
(40, 1, 31),
(41, 1, 32),
(42, 1, 33),
(43, 1, 34),
(44, 1, 39),
(45, 1, 35),
(46, 1, 36),
(47, 1, 37),
(48, 1, 38),
(49, 1, 40),
(50, 1, 41),
(51, 1, 42),
(52, 1, 43),
(53, 1, 44),
(54, 1, 45),
(55, 1, 46),
(56, 1, 47),
(57, 1, 48),
(58, 1, 49),
(59, 1, 50),
(60, 1, 51),
(61, 1, 52),
(62, 1, 1),
(63, 3, 1),
(64, 1, 1),
(65, 3, 1),
(66, 1, 1),
(67, 3, 1),
(68, 1, 53),
(69, 1, 54),
(70, 1, 55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bama_theme`
--

CREATE TABLE IF NOT EXISTS `bama_theme` (
  `THEME_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `THEME_NAME` varchar(200) NOT NULL DEFAULT 'Default Theme',
  `THEME_SLUG` varchar(200) DEFAULT 'default',
  `THEME_AUTHOR` varchar(200) DEFAULT 'hariardi@gmail.com',
  `THEME_STATUS` tinyint(1) DEFAULT '0' COMMENT '0: Inactive',
  `THEME_ENABLED` tinyint(1) DEFAULT '0',
  `THEME_ACTIVE` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`THEME_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `bama_theme`
--

INSERT INTO `bama_theme` (`THEME_ID`, `THEME_NAME`, `THEME_SLUG`, `THEME_AUTHOR`, `THEME_STATUS`, `THEME_ENABLED`, `THEME_ACTIVE`) VALUES
(1, 'Default Theme', 'default', 'hariardi@gmail.com', 1, 1, 0),
(3, 'Default2', 'default2', 'test2@gmail.com', 1, 1, 0),
(4, 'Default3', 'default3', 'test2@gmail.com', 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bama_user`
--

CREATE TABLE IF NOT EXISTS `bama_user` (
  `USER_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USER_LOGIN` varchar(25) NOT NULL,
  `USER_PWD` varchar(255) NOT NULL,
  `USER_FULLNAME` varchar(255) DEFAULT 'Default',
  `USER_STATUS` int(1) DEFAULT '0' COMMENT '0: Inactive;',
  `ROLE_ID` bigint(20) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `bama_user`
--

INSERT INTO `bama_user` (`USER_ID`, `USER_LOGIN`, `USER_PWD`, `USER_FULLNAME`, `USER_STATUS`, `ROLE_ID`) VALUES
(1, 'ardi', 'f2ee0636898ad07a06287fcb99dc2394', 'Ardi - Administrator', 1, 1),
(2, 'user_cs', 'f2ee0636898ad07a06287fcb99dc2394', 'Diana Dime - CS', 1, 2),
(5, 'user_officer', 'f2ee0636898ad07a06287fcb99dc2394', 'Officer', 1, 6),
(6, 'Edow', 'f2ee0636898ad07a06287fcb99dc2394', 'Edow', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
