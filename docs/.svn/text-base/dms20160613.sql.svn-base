-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 09:04 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bama_configuration`
--

CREATE TABLE IF NOT EXISTS `bama_configuration` (
  `CONFIG_ID` bigint(20) NOT NULL,
  `CONFIG_NAME` varchar(150) NOT NULL,
  `CONFIG_SLUG` varchar(150) NOT NULL,
  `CONFIG_VALUE` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Application Global Configuration';

--
-- Dumping data for table `bama_configuration`
--

INSERT INTO `bama_configuration` (`CONFIG_ID`, `CONFIG_NAME`, `CONFIG_SLUG`, `CONFIG_VALUE`) VALUES
(1, 'App Name', 'APPNAME', 'Sistem Koperasi'),
(2, 'APP VERSION', 'APP_VERSION', '0.1');

-- --------------------------------------------------------

--
-- Table structure for table `bama_modules`
--

CREATE TABLE IF NOT EXISTS `bama_modules` (
  `MODULE_ID` bigint(20) NOT NULL,
  `MODULE_NAME` varchar(150) NOT NULL,
  `MODULE_SLUG` varchar(150) NOT NULL,
  `MODULE_DESC` text,
  `MODULE_STATUS` int(11) DEFAULT NULL,
  `MODULE_ENABLED` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bama_modules`
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
(28, 'Themes Management', 'manage_themes', 'Themes management desc', 1, 1),
(29, 'References', 'references', 'Referensi E-Arsip DJBM', 1, 1),
(30, 'Content Type', 'content_type', 'Tipe Konten E-Arsip DJBM', 1, 1),
(31, 'Maps', 'maps', 'Pemetaan E-Arsip DJBM', 1, 1),
(32, 'Survey Data', 'survey_data', 'Data Survey E-Arsip DJBM', 1, 1),
(33, 'Report', 'reports', 'Laporan E-Arsip DJBM', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bama_navigation`
--

CREATE TABLE IF NOT EXISTS `bama_navigation` (
  `NAVIGATION_ID` int(11) NOT NULL,
  `MODULE_SLUG` varchar(45) DEFAULT NULL,
  `NAVIGATION_SLUG` varchar(255) DEFAULT NULL,
  `NAVIGATION_PARENT` varchar(255) DEFAULT NULL,
  `NAVIGATION_NAME` varchar(45) DEFAULT NULL,
  `NAVIGATION_CLS` varchar(45) DEFAULT NULL,
  `NAVIGATION_LINK` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bama_navigation`
--

INSERT INTO `bama_navigation` (`NAVIGATION_ID`, `MODULE_SLUG`, `NAVIGATION_SLUG`, `NAVIGATION_PARENT`, `NAVIGATION_NAME`, `NAVIGATION_CLS`, `NAVIGATION_LINK`) VALUES
(1, NULL, 'dashboard', NULL, 'Dashboard', 'fa fa-dashboard', '/'),
(2, 'module_navigation', 'add_remove_module', '3', 'Add/Remove Module', 'icon-group', '/module_navigation'),
(3, 'module', 'module', NULL, 'Modules', 'fa fa-cubes', '#'),
(4, 'user', 'account', NULL, 'Account', 'fa fa-user', '#'),
(6, 'user', 'users', '4', 'Users', 'icon-group', '/user'),
(7, 'role_navigation', 'manage_navigation', '3', 'Manage Navigation', 'icon-group', '/role_navigation'),
(8, 'module_permission', 'permission', '3', 'Manage Permission', 'icon-group', '/module_permission'),
(9, 'configuration', 'configuration', NULL, 'Configuration', 'fa fa-cog', '/configuration'),
(10, 'manage_themes', 'themes', NULL, 'Themes', 'fa fa-paint-brush', '/manage_themes'),
(11, 'references', 'references', NULL, 'Referensi', 'fa fa-book', '#'),
(12, 'references', 'taxonomy', '11', 'Taksonomi', '', '/references/taxonomy'),
(13, 'references', 'bsns_unit', '11', 'Unit Kerja', NULL, '/references/unit_kerja'),
(14, 'references', 'doc_type', '11', 'Tipe Dokumen', NULL, '/references/tipe_dokumen'),
(15, 'references', 'archive', '11', 'Arsip', NULL, '/references/arsip'),
(16, 'content_type', 'content_type', NULL, 'Struktur Konten', 'fa fa-file', '/content_type'),
(17, 'maps', 'maps', NULL, 'Pemetaan', 'fa fa-map-marker', '/maps'),
(18, 'survey_data', 'survey_data', NULL, 'Data Survey', 'fa fa-briefcase', '/survey_data'),
(19, 'reports', 'reports', NULL, 'Laporan', 'fa fa-bar-chart', '#'),
(20, 'reports', 'report_summary', '19', 'Summary Data Survey', NULL, '/reports/summary');

-- --------------------------------------------------------

--
-- Table structure for table `bama_permission`
--

CREATE TABLE IF NOT EXISTS `bama_permission` (
  `PERMISSION_ID` bigint(20) NOT NULL,
  `MODULE_ID` bigint(20) NOT NULL,
  `PERMISSION_NAME` varchar(150) DEFAULT NULL,
  `PERMISSION_SLUG` varchar(45) DEFAULT NULL,
  `PERMISSION_DESC` text
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bama_permission`
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
-- Table structure for table `bama_role`
--

CREATE TABLE IF NOT EXISTS `bama_role` (
  `ROLE_ID` bigint(20) NOT NULL,
  `ROLE_NAME` varchar(255) DEFAULT NULL,
  `ROLE_DEFAULT_PAGE` int(1) NOT NULL DEFAULT '1' COMMENT '1: Backend 2: CS',
  `ROLE_STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bama_role`
--

INSERT INTO `bama_role` (`ROLE_ID`, `ROLE_NAME`, `ROLE_DEFAULT_PAGE`, `ROLE_STATUS`) VALUES
(1, 'Super Administrator', 1, 1),
(2, 'Customer Service', 2, 1),
(3, 'Management', 1, 1),
(6, 'Officer', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bama_role_navigation`
--

CREATE TABLE IF NOT EXISTS `bama_role_navigation` (
  `ROLE_NAVIGATION_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) DEFAULT NULL,
  `NAVIGATION_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bama_role_navigation`
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
(166, 6, 1),
(167, 1, 11),
(168, 1, 12),
(169, 1, 13),
(170, 1, 14),
(171, 1, 15),
(172, 1, 16),
(173, 1, 17),
(174, 1, 18),
(175, 1, 19),
(176, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `bama_role_permission`
--

CREATE TABLE IF NOT EXISTS `bama_role_permission` (
  `ROLE_PERMISSION_ID` bigint(20) NOT NULL,
  `ROLE_ID` bigint(20) NOT NULL,
  `PERMISSION_ID` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bama_role_permission`
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
-- Table structure for table `bama_theme`
--

CREATE TABLE IF NOT EXISTS `bama_theme` (
  `THEME_ID` bigint(20) unsigned NOT NULL,
  `THEME_NAME` varchar(200) NOT NULL DEFAULT 'Default Theme',
  `THEME_SLUG` varchar(200) DEFAULT 'default',
  `THEME_AUTHOR` varchar(200) DEFAULT 'hariardi@gmail.com',
  `THEME_STATUS` tinyint(1) DEFAULT '0' COMMENT '0: Inactive',
  `THEME_ENABLED` tinyint(1) DEFAULT '0',
  `THEME_ACTIVE` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bama_theme`
--

INSERT INTO `bama_theme` (`THEME_ID`, `THEME_NAME`, `THEME_SLUG`, `THEME_AUTHOR`, `THEME_STATUS`, `THEME_ENABLED`, `THEME_ACTIVE`) VALUES
(1, 'Default Theme', 'default', 'hariardi@gmail.com', 1, 1, 0),
(3, 'Default2', 'default2', 'test2@gmail.com', 1, 1, 0),
(4, 'Default3', 'default3', 'test2@gmail.com', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bama_user`
--

CREATE TABLE IF NOT EXISTS `bama_user` (
  `USER_ID` bigint(20) NOT NULL,
  `USER_LOGIN` varchar(25) NOT NULL,
  `USER_PWD` varchar(255) NOT NULL,
  `USER_FULLNAME` varchar(255) DEFAULT 'Default',
  `USER_STATUS` int(1) DEFAULT '0' COMMENT '0: Inactive;',
  `ROLE_ID` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bama_user`
--

INSERT INTO `bama_user` (`USER_ID`, `USER_LOGIN`, `USER_PWD`, `USER_FULLNAME`, `USER_STATUS`, `ROLE_ID`) VALUES
(1, 'ardi', 'f2ee0636898ad07a06287fcb99dc2394', 'Ardi - Administrator', 1, 1),
(2, 'user_cs', 'f2ee0636898ad07a06287fcb99dc2394', 'Diana Dime - CS', 1, 2),
(5, 'user_officer', 'f2ee0636898ad07a06287fcb99dc2394', 'Officer', 1, 6),
(6, 'admin', 'f2ee0636898ad07a06287fcb99dc2394', 'admin', 1, 1),
(7, 'edow', 'bd276a5ec50f2112678a25fe2a3669b5', 'Edow', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_archive`
--

CREATE TABLE IF NOT EXISTS `dm_archive` (
  `id` bigint(19) unsigned NOT NULL,
  `code` varchar(32) NOT NULL,
  `cabinet` varchar(32) NOT NULL,
  `rack` varchar(32) NOT NULL,
  `box` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `crby` bigint(20) NOT NULL,
  `crdt` datetime NOT NULL,
  `upby` bigint(20) DEFAULT NULL,
  `updt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_archive`
--

INSERT INTO `dm_archive` (`id`, `code`, `cabinet`, `rack`, `box`, `description`, `crby`, `crdt`, `upby`, `updt`) VALUES
(1, 'ASP111', '1', '1', '1', '', 7, '2016-06-02 16:53:47', 7, '2016-06-02 17:36:09'),
(2, 'ASP121', '1', '2', '1', '', 7, '2016-06-02 16:53:47', NULL, NULL),
(3, 'ASP133', '1', '3', '3', '', 7, '2016-06-02 16:53:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dm_archive_log`
--

CREATE TABLE IF NOT EXISTS `dm_archive_log` (
  `id` bigint(19) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1:in; 2:out;',
  `date` datetime NOT NULL,
  `unit_id` bigint(19) unsigned NOT NULL,
  `memo_no` varchar(128) NOT NULL,
  `pic` varchar(128) NOT NULL,
  `archive_id` bigint(19) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dm_content_type`
--

CREATE TABLE IF NOT EXISTS `dm_content_type` (
  `id` bigint(19) unsigned NOT NULL,
  `parent` bigint(19) unsigned NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL,
  `description` text,
  `crby` bigint(20) NOT NULL,
  `crdt` datetime NOT NULL,
  `upby` bigint(20) DEFAULT NULL,
  `updt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_content_type`
--

INSERT INTO `dm_content_type` (`id`, `parent`, `name`, `description`, `crby`, `crdt`, `upby`, `updt`) VALUES
(1, 0, 'Provinsi', 'Provinsi di Indonesia', 7, '2016-06-09 17:09:01', NULL, NULL),
(2, 1, 'Daerah Administrasi', 'Daerah Administrasi di Provinsi', 7, '2016-06-09 17:09:01', NULL, NULL),
(17, 1, 'Kabupaten ', 'Kabupaten di Provinsi ', 7, '2016-06-13 15:06:57', 7, '2016-06-13 20:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `dm_content_type_attr`
--

CREATE TABLE IF NOT EXISTS `dm_content_type_attr` (
  `id` bigint(19) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `content_type_id` bigint(19) unsigned NOT NULL,
  `label` varchar(128) NOT NULL,
  `type` smallint(1) NOT NULL COMMENT '1: text; 2:number; 3:date; 4:combo; 5:checkbox; 6:radio; 999:Taxonomy;',
  `required` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:true; 2:false;',
  `show_in_table` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:true; 2:false;',
  `taxonomy_id` bigint(19) DEFAULT NULL,
  `content_reference` bigint(20) DEFAULT NULL COMMENT 'Content Type ID sebagai Referensi untuk Node',
  `crby` bigint(20) NOT NULL,
  `crdt` datetime NOT NULL,
  `upby` bigint(20) DEFAULT NULL,
  `updt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_content_type_attr`
--

INSERT INTO `dm_content_type_attr` (`id`, `name`, `content_type_id`, `label`, `type`, `required`, `show_in_table`, `taxonomy_id`, `content_reference`, `crby`, `crdt`, `upby`, `updt`) VALUES
(1, 'nama_provinsi', 1, 'Nama Provinsi', 1, 1, 1, 0, 0, 7, '2016-06-10 01:52:07', NULL, NULL),
(2, 'kode_provinsi', 1, 'Kode Provinsi', 1, 1, 1, 0, 0, 7, '2016-06-10 01:52:07', NULL, NULL),
(3, 'nama_daerah', 2, 'Nama Daerah', 1, 1, 1, 0, 0, 7, '2016-06-10 01:52:07', NULL, NULL),
(4, 'kode_daerah', 2, 'Kode Daerah', 1, 1, 1, 0, 0, 7, '2016-06-10 01:52:07', NULL, NULL),
(5, 'provinsi_daerah', 2, 'Provinsi', 9999, 1, 1, 3, 0, 7, '2016-06-10 01:52:07', NULL, NULL),
(31, 'kode_kabupaten', 17, 'Kode Kabupaten', 1, 1, 1, 0, 0, 7, '2016-06-13 15:06:57', 7, '2016-06-13 20:54:54'),
(32, 'nama_kabupaten', 17, 'Nama Kabupaten', 1, 1, 1, 0, 0, 7, '2016-06-13 15:06:57', 7, '2016-06-13 20:54:54'),
(33, 'referensi', 17, 'Referensi', 999, 1, 1, 3, 0, 7, '2016-06-13 15:06:57', 7, '2016-06-13 20:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `dm_doc`
--

CREATE TABLE IF NOT EXISTS `dm_doc` (
  `id` bigint(19) unsigned NOT NULL,
  `doc_no` varchar(128) NOT NULL,
  `page_total` int(5) NOT NULL,
  `node_id` bigint(19) unsigned NOT NULL,
  `doc_type_id` bigint(19) unsigned NOT NULL,
  `archive_id` bigint(19) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dm_doc_type`
--

CREATE TABLE IF NOT EXISTS `dm_doc_type` (
  `id` bigint(19) unsigned NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `parent` bigint(20) NOT NULL DEFAULT '0',
  `unit_id` bigint(19) unsigned NOT NULL,
  `crby` bigint(20) NOT NULL,
  `crdt` datetime NOT NULL,
  `upby` bigint(20) DEFAULT NULL,
  `updt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_doc_type`
--

INSERT INTO `dm_doc_type` (`id`, `name`, `parent`, `unit_id`, `crby`, `crdt`, `upby`, `updt`) VALUES
(1, 'AMDAL', 0, 2, 7, '2016-05-31 19:55:48', NULL, NULL),
(2, 'Dokumen Lelang', 0, 1, 7, '2016-05-31 20:02:08', NULL, NULL),
(3, 'Visibility Study', 0, 2, 7, '2016-05-31 20:02:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dm_node`
--

CREATE TABLE IF NOT EXISTS `dm_node` (
  `id` bigint(19) unsigned NOT NULL,
  `content_type_id` bigint(19) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_node`
--

INSERT INTO `dm_node` (`id`, `content_type_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dm_node_value`
--

CREATE TABLE IF NOT EXISTS `dm_node_value` (
  `id` bigint(19) unsigned NOT NULL,
  `attr_id` bigint(19) unsigned NOT NULL,
  `node_id` bigint(19) unsigned NOT NULL,
  `attr_value` text
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_node_value`
--

INSERT INTO `dm_node_value` (`id`, `attr_id`, `node_id`, `attr_value`) VALUES
(1, 1, 1, 'DKI Jakarta'),
(2, 2, 1, 'B'),
(3, 3, 2, 'Jakarta Selatan'),
(4, 4, 2, 'BKZ'),
(5, 5, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `dm_taxonomy`
--

CREATE TABLE IF NOT EXISTS `dm_taxonomy` (
  `id` bigint(19) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `parent` bigint(20) NOT NULL DEFAULT '0',
  `crby` bigint(20) NOT NULL,
  `crdt` datetime NOT NULL,
  `upby` bigint(20) DEFAULT NULL,
  `updt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_taxonomy`
--

INSERT INTO `dm_taxonomy` (`id`, `name`, `description`, `parent`, `crby`, `crdt`, `upby`, `updt`) VALUES
(2, 'Firefox', 'Win 98+ / OSX.2+', 3, 6, '2016-05-24 17:44:32', NULL, NULL),
(3, 'Internet', 'Win 95+', 0, 6, '2016-05-24 17:44:32', NULL, NULL),
(4, 'Internet Explorer 7', 'Win XP SP2+', 0, 6, '2016-05-24 17:44:32', NULL, NULL),
(5, 'Chrome', 'Win 95+', 0, 6, '2016-05-24 17:44:32', NULL, NULL),
(11, 'AOL Browser ', 'Win XP SP', 3, 1, '0000-00-00 00:00:00', 1, '2016-05-26 16:59:18'),
(13, 'Coba child', 'b', 0, 7, '2016-05-31 17:06:53', 7, '2016-05-31 17:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `dm_term`
--

CREATE TABLE IF NOT EXISTS `dm_term` (
  `id` bigint(19) unsigned NOT NULL,
  `label` varchar(128) NOT NULL,
  `taxonomy_id` bigint(19) unsigned NOT NULL,
  `crby` bigint(20) NOT NULL,
  `crdt` datetime NOT NULL,
  `upby` bigint(20) DEFAULT NULL,
  `updt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_term`
--

INSERT INTO `dm_term` (`id`, `label`, `taxonomy_id`, `crby`, `crdt`, `upby`, `updt`) VALUES
(1, 'Website', 3, 1, '2016-05-27 19:23:21', NULL, NULL),
(2, 'Video Stream', 3, 1, '2016-05-27 19:23:21', NULL, NULL),
(3, 'File Share', 3, 1, '2016-05-27 19:23:21', NULL, NULL),
(7, 'Thunderbird', 2, 1, '2016-05-27 19:55:21', NULL, NULL),
(8, 'Ihsan', 2, 7, '2016-05-28 11:31:14', NULL, NULL),
(9, 'Coba', 2, 7, '2016-05-28 11:34:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dm_unit`
--

CREATE TABLE IF NOT EXISTS `dm_unit` (
  `id` bigint(19) unsigned NOT NULL,
  `initial` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` bigint(20) NOT NULL,
  `crby` bigint(20) NOT NULL,
  `crdt` datetime NOT NULL,
  `upby` bigint(20) DEFAULT NULL,
  `updt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_unit`
--

INSERT INTO `dm_unit` (`id`, `initial`, `name`, `parent`, `crby`, `crdt`, `upby`, `updt`) VALUES
(1, 'TU', 'Tata Usaha', 0, 7, '2016-05-29 01:02:38', NULL, NULL),
(2, 'SES', 'Sekretariat', 0, 7, '2016-05-29 01:48:03', NULL, NULL),
(3, 'HUMAS', 'Hubungan Masyarakat', 0, 7, '2016-05-29 01:48:34', 7, '2016-05-29 03:15:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bama_configuration`
--
ALTER TABLE `bama_configuration`
  ADD PRIMARY KEY (`CONFIG_ID`);

--
-- Indexes for table `bama_modules`
--
ALTER TABLE `bama_modules`
  ADD PRIMARY KEY (`MODULE_ID`),
  ADD UNIQUE KEY `MODULE_SLUG` (`MODULE_SLUG`) USING BTREE;

--
-- Indexes for table `bama_navigation`
--
ALTER TABLE `bama_navigation`
  ADD PRIMARY KEY (`NAVIGATION_ID`),
  ADD UNIQUE KEY `uniq nav slug` (`NAVIGATION_SLUG`) USING BTREE;

--
-- Indexes for table `bama_permission`
--
ALTER TABLE `bama_permission`
  ADD PRIMARY KEY (`PERMISSION_ID`);

--
-- Indexes for table `bama_role`
--
ALTER TABLE `bama_role`
  ADD PRIMARY KEY (`ROLE_ID`),
  ADD KEY `ROLE_NAME` (`ROLE_NAME`) USING BTREE,
  ADD KEY `ROLE_STATUS` (`ROLE_STATUS`) USING BTREE;

--
-- Indexes for table `bama_role_navigation`
--
ALTER TABLE `bama_role_navigation`
  ADD PRIMARY KEY (`ROLE_NAVIGATION_ID`);

--
-- Indexes for table `bama_role_permission`
--
ALTER TABLE `bama_role_permission`
  ADD PRIMARY KEY (`ROLE_PERMISSION_ID`);

--
-- Indexes for table `bama_theme`
--
ALTER TABLE `bama_theme`
  ADD PRIMARY KEY (`THEME_ID`);

--
-- Indexes for table `bama_user`
--
ALTER TABLE `bama_user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `dm_archive`
--
ALTER TABLE `dm_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_archive_log`
--
ALTER TABLE `dm_archive_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_to_archive_idx` (`archive_id`);

--
-- Indexes for table `dm_content_type`
--
ALTER TABLE `dm_content_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_content_type_attr`
--
ALTER TABLE `dm_content_type_attr`
  ADD PRIMARY KEY (`id`,`name`,`content_type_id`),
  ADD KEY `attr_to_taxonomy_idx` (`taxonomy_id`),
  ADD KEY `attr_to_content_type_idx` (`content_type_id`);

--
-- Indexes for table `dm_doc`
--
ALTER TABLE `dm_doc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_to_node_idx` (`node_id`),
  ADD KEY `doc_to_type_idx` (`doc_type_id`),
  ADD KEY `doc_to_archive_idx` (`archive_id`);

--
-- Indexes for table `dm_doc_type`
--
ALTER TABLE `dm_doc_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_type_to_unit_idx` (`unit_id`);

--
-- Indexes for table `dm_node`
--
ALTER TABLE `dm_node`
  ADD PRIMARY KEY (`id`),
  ADD KEY `node_to_content_type_idx` (`content_type_id`);

--
-- Indexes for table `dm_node_value`
--
ALTER TABLE `dm_node_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `value_to_node_idx` (`node_id`),
  ADD KEY `value_to_attr_idx` (`attr_id`);

--
-- Indexes for table `dm_taxonomy`
--
ALTER TABLE `dm_taxonomy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dm_term`
--
ALTER TABLE `dm_term`
  ADD PRIMARY KEY (`id`),
  ADD KEY `term_to_taxonomy_idx` (`taxonomy_id`);

--
-- Indexes for table `dm_unit`
--
ALTER TABLE `dm_unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bama_configuration`
--
ALTER TABLE `bama_configuration`
  MODIFY `CONFIG_ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bama_modules`
--
ALTER TABLE `bama_modules`
  MODIFY `MODULE_ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `bama_navigation`
--
ALTER TABLE `bama_navigation`
  MODIFY `NAVIGATION_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `bama_permission`
--
ALTER TABLE `bama_permission`
  MODIFY `PERMISSION_ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `bama_role`
--
ALTER TABLE `bama_role`
  MODIFY `ROLE_ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bama_role_navigation`
--
ALTER TABLE `bama_role_navigation`
  MODIFY `ROLE_NAVIGATION_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `bama_role_permission`
--
ALTER TABLE `bama_role_permission`
  MODIFY `ROLE_PERMISSION_ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `bama_theme`
--
ALTER TABLE `bama_theme`
  MODIFY `THEME_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bama_user`
--
ALTER TABLE `bama_user`
  MODIFY `USER_ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dm_archive`
--
ALTER TABLE `dm_archive`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dm_archive_log`
--
ALTER TABLE `dm_archive_log`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_content_type`
--
ALTER TABLE `dm_content_type`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `dm_content_type_attr`
--
ALTER TABLE `dm_content_type_attr`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `dm_doc`
--
ALTER TABLE `dm_doc`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_doc_type`
--
ALTER TABLE `dm_doc_type`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dm_node`
--
ALTER TABLE `dm_node`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_node_value`
--
ALTER TABLE `dm_node_value`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dm_taxonomy`
--
ALTER TABLE `dm_taxonomy`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dm_term`
--
ALTER TABLE `dm_term`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dm_unit`
--
ALTER TABLE `dm_unit`
  MODIFY `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dm_archive_log`
--
ALTER TABLE `dm_archive_log`
  ADD CONSTRAINT `log_to_archive` FOREIGN KEY (`archive_id`) REFERENCES `dm_archive` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dm_content_type_attr`
--
ALTER TABLE `dm_content_type_attr`
  ADD CONSTRAINT `attr_to_content_type` FOREIGN KEY (`content_type_id`) REFERENCES `dm_content_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dm_doc`
--
ALTER TABLE `dm_doc`
  ADD CONSTRAINT `doc_to_archive` FOREIGN KEY (`archive_id`) REFERENCES `dm_archive` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doc_to_node` FOREIGN KEY (`node_id`) REFERENCES `dm_node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doc_to_type` FOREIGN KEY (`doc_type_id`) REFERENCES `dm_doc_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dm_doc_type`
--
ALTER TABLE `dm_doc_type`
  ADD CONSTRAINT `doc_type_to_unit` FOREIGN KEY (`unit_id`) REFERENCES `dm_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dm_node`
--
ALTER TABLE `dm_node`
  ADD CONSTRAINT `node_to_content_type` FOREIGN KEY (`content_type_id`) REFERENCES `dm_content_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dm_node_value`
--
ALTER TABLE `dm_node_value`
  ADD CONSTRAINT `value_to_attr` FOREIGN KEY (`attr_id`) REFERENCES `dm_content_type_attr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `value_to_node` FOREIGN KEY (`node_id`) REFERENCES `dm_node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dm_term`
--
ALTER TABLE `dm_term`
  ADD CONSTRAINT `term_to_taxonomy` FOREIGN KEY (`taxonomy_id`) REFERENCES `dm_taxonomy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
