-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2021 pada 23.16
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemasaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_ps2_games`
--

CREATE TABLE `table_ps2_games` (
  `ps2_games_id` int(10) NOT NULL,
  `ps2_games_name` varchar(200) NOT NULL,
  `ps2_games_size` int(10) NOT NULL,
  `ps2_games_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_ps2_games`
--

INSERT INTO `table_ps2_games` (`ps2_games_id`, `ps2_games_name`, `ps2_games_size`, `ps2_games_price`) VALUES
(1, 'God Of War 2', 8600, 5000),
(2, 'Resident Evil 4', 4500, 5000),
(3, 'God Hand', 1600, 5000),
(4, '4x4 Evolution', 600, 5000),
(5, '007 Nightfire', 2500, 5000),
(6, '7 Sins', 558, 5000),
(7, '25 To Life', 2000, 5000),
(8, 'Age of Empires 2 The Age Of Kings', 700, 5000),
(9, 'Avatar The Last Airbender Into The Inferno', 2300, 5000),
(10, 'Avatar The Last Airbender The Burning Earth', 2000, 5000),
(11, 'Avatar The Last Airbender', 1700, 5000),
(12, 'Bakugan Battle Brawlers', 3901, 5000),
(13, 'Ben 10 Alien Force Vilgax Attack', 4700, 5000),
(14, 'Ben 10 Alien Force', 2400, 5000),
(15, 'Ben 10 Protector Of Earth', 3500, 5000),
(16, 'Black', 4000, 5000),
(17, 'Blade 2', 1500, 5000),
(18, 'Blood Rayne 2', 4700, 5000),
(19, 'Bully', 4700, 5000),
(20, 'Blood Rayne', 1300, 5000),
(21, 'Bloody Roar 4', 1300, 5000),
(22, 'Burnout 3 Takedown', 2900, 5000),
(23, 'Castlevania Curse Of Darkness', 3600, 5000),
(24, 'Crash Mind Over Mutant', 2100, 5000),
(25, 'Crash Bandicoot The Wrath Of Cortex', 700, 5000),
(26, 'Crash Tag Team', 3600, 5000),
(27, 'Def Jam Fight For NY', 4700, 5000),
(28, 'Devil Kings', 4700, 5000),
(29, 'Devil May Cry', 4700, 5000),
(30, 'Digimon Rumble Arena 2', 1400, 5000),
(31, 'Digimon World Data Squad', 3000, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_recent_buy`
--

CREATE TABLE `table_recent_buy` (
  `recent_buy_id` int(10) NOT NULL,
  `recent_buy_user_id` int(10) NOT NULL,
  `recent_buy_name` varchar(200) NOT NULL,
  `recent_buy_condition` varchar(200) NOT NULL,
  `recent_buy_price` double NOT NULL,
  `recent_buy_amount` int(10) NOT NULL,
  `recent_buy_shipping_cost` double NOT NULL,
  `recent_buy_source` varchar(200) NOT NULL,
  `recent_buy_date` date NOT NULL DEFAULT current_timestamp(),
  `recent_buy_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_recent_buy`
--

INSERT INTO `table_recent_buy` (`recent_buy_id`, `recent_buy_user_id`, `recent_buy_name`, `recent_buy_condition`, `recent_buy_price`, `recent_buy_amount`, `recent_buy_shipping_cost`, `recent_buy_source`, `recent_buy_date`, `recent_buy_description`) VALUES
(1, 1, 'Handphone Realme 5 Pro RAM 4 GB ROM 128 GB Batangan', 'Second', 1700000, 1, 0, 'FB Marketplace', '2020-11-01', ''),
(3, 1, 'HDD WD Blue 2.5 500GB', 'New', 300000, 1, 0, 'USC (Use Com)', '2021-01-29', ''),
(4, 1, 'Case HDD External Orico 2.5 inch 500 GB', 'New', 95000, 1, 0, 'USC (Use Com)', '2021-01-29', ''),
(6, 1, 'Converter Mini AV2VGA', 'New', 85000, 1, 0, 'Champion Computer', '2020-12-28', ''),
(7, 1, 'Keyboard Acer Z1401 Z1402 Advan Soulmate G4D-94232 TNN TNH', 'New', 70000, 1, 0, 'BengkelNotebook', '2021-02-03', ''),
(8, 1, 'SSD ColorFire 120GB', 'New', 260000, 1, 0, 'BengkelNotebook', '2021-02-03', ''),
(9, 1, 'Keyboard Acer Z1401 Z1402 Advan Soulmate G4D-94232 TNN TNH', 'New', 75000, 1, 0, 'USC (Use Com)', '2021-02-03', ''),
(10, 1, 'HDD Seagate 2.5 inch 320 GB', 'New', 200000, 1, 0, 'USC (Use Com)', '2021-01-08', '<p>Punya Nurlinda Sari Harahap untuk Laptopnya.</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_services`
--

CREATE TABLE `table_services` (
  `services_id` int(10) NOT NULL,
  `services_name` varchar(100) NOT NULL,
  `services_description` text NOT NULL,
  `services_cost` double NOT NULL,
  `services_income` double NOT NULL,
  `services_customer_name` varchar(100) NOT NULL DEFAULT 'Customer',
  `services_address` text NOT NULL DEFAULT 'My House',
  `services_start_date` date NOT NULL DEFAULT current_timestamp(),
  `services_estimated_finished_date` date NOT NULL DEFAULT current_timestamp(),
  `services_finished_date` date NOT NULL DEFAULT current_timestamp(),
  `services_status` varchar(50) NOT NULL DEFAULT 'Unfinished'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_services`
--

INSERT INTO `table_services` (`services_id`, `services_name`, `services_description`, `services_cost`, `services_income`, `services_customer_name`, `services_address`, `services_start_date`, `services_estimated_finished_date`, `services_finished_date`, `services_status`) VALUES
(7, 'Install Ulang PC dan Notebook Samsung', '<p>Install ulang PC Windows 10 64-bit dan install ulang Notebook Samsung Windows 7 64-bit.</p>', 20000, 150000, 'Budi', '<p>Jalan Karja Budi No. 26, Medan Johor</p>', '2021-02-09', '2021-02-09', '2021-02-09', 'Finished'),
(8, 'Install Ulang', '<p>Install Ulang Windows 10 64-bit + Software + Driver</p><p>Isi Games:<br />- Need For Speed Most Wanted<br />- GTA San Andreas<br />- Euro Truck Simulator 2<br />- COD 4 MW<br />- Bully<br />- NFS Underground 2</p>', 0, 80000, 'Arman', '', '2021-04-01', '2021-04-01', '2021-04-01', 'Finished');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_windows_games`
--

CREATE TABLE `table_windows_games` (
  `windows_games_id` int(10) NOT NULL,
  `windows_games_name` varchar(200) NOT NULL,
  `windows_games_version` varchar(200) NOT NULL DEFAULT '1',
  `windows_games_size` double DEFAULT 0,
  `windows_games_description` text NOT NULL DEFAULT '\'-\'',
  `windows_games_date` date NOT NULL DEFAULT current_timestamp(),
  `windows_games_price` double NOT NULL DEFAULT 0,
  `windows_games_source` varchar(50) NOT NULL DEFAULT 'FitGirl',
  `windows_games_location` varchar(100) NOT NULL,
  `windows_games_hit` int(10) NOT NULL DEFAULT 0,
  `windows_games_availability` varchar(50) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_windows_games`
--

INSERT INTO `table_windows_games` (`windows_games_id`, `windows_games_name`, `windows_games_version`, `windows_games_size`, `windows_games_description`, `windows_games_date`, `windows_games_price`, `windows_games_source`, `windows_games_location`, `windows_games_hit`, `windows_games_availability`) VALUES
(5, 'Assassins Creed 4 Black Flag Jackdaw Edition', '1', 5194, '<p>Source: FitGirl</p>', '2013-11-20', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(6, 'Age Of Empires 2 Definitive Edition', '1', 6829, '<p>Age of Empires II: Definitive Edition adalah gim video strategi waktu nyata yang dikembangkan oleh Tantalus Media, Forgotten Empires dan Wicked Witch, dan diterbitkan oleh Xbox Game Studios. Gim ini adalah remaster dari game Age of Empires II: The Age of Kings dalam rangka merayakan ulang tahun ke-20 dari gim aslinya.</p>', '2019-11-14', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(7, 'Age Of Empires 2 Gold Edition', '1', 292, '', '1999-09-30', 5000, 'FitGirl', 'Disk4', 0, 'Available'),
(8, 'Alien Shooter', '1', 20, '<p>Source: GameTop</p>', '2003-09-15', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(9, 'Alien Shooter 2 Reloaded', '1', 267, '<p>Source: GameTop</p>', '2009-03-14', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(10, 'Assassins Creed 3 Remastered', '1', 13755, '<p>Plus AC3 Liberation Remastered</p><p>Source: FitGirl</p>', '2019-03-30', 15000, 'FitGirl', 'Disk1', 0, 'Available'),
(11, 'Borderlands 2 Remastered', '1', 10488, '<p>Source: FitGirl</p>', '2012-09-20', 15000, 'FitGirl', 'Disk1', 0, 'Available'),
(12, 'Call Of Duty 4 Modern Warfare', '1', 2141, '', '2007-11-05', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(13, 'Call Of Duty Modern Warfare 2', '1', 6982, '<p>Source: FitGirl</p>', '2009-11-10', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(14, 'Counter Strike 1.6', '1', 212, '', '2000-11-08', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(15, 'Counter Strike Extreme V6', '1', 763, '', '2000-11-08', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(17, 'Dead Effect', '1', 3097, '<p>Source: IGGGAMES</p>', '2013-09-12', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(18, 'Dead Island Definitive Edition', '1', 8227, '<p>Source: FitGirl</p>', '2016-05-31', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(19, 'Dead Space 3 Limited Edition', '1', 3907, '<p>Source: FitGirl</p>', '2013-02-05', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(20, 'Far Cry 3 Digital Deluxe Edition', '1', 4563, '<p>Source: FitGirl</p>', '2012-11-29', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(21, 'Far Cry 4 Gold Edition', '1', 11945, '<p>Source: FitGirl</p>', '2014-11-18', 15000, 'FitGirl', 'Disk1', 0, 'Available'),
(22, 'Feeding Frenzy', '1', 6, '', '2004-02-11', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(23, 'Feeding Frenzy 2', '1', 26, '', '2006-02-06', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(24, 'Grand Theft Auto 3', '1', 586, '', '2001-10-22', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(25, 'Grand Theft Auto San Andreas', '1', 688, '<p>Source: GTAind</p>', '2004-10-26', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(26, 'Grand Theft Auto 5', '1', 40262, '<p>Source: FitGirl</p>', '2013-09-17', 45000, 'FitGirl', 'Disk1', 0, 'Available'),
(27, 'Grand Theft Auto Vice City', '1', 1392, '', '2002-10-27', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(28, 'Just Cause 2 Complete', '1', 3850, '<p>Cracker: PROPHET</p><p>Repacker: PROPHET</p><p>Source: Ova Games</p>', '2010-03-23', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(29, 'Just Cause 4 Day One Edition', '1', 16804, '<p>Source: FitGirl</p>', '2018-12-04', 20000, 'FitGirl', 'Disk1', 0, 'Available'),
(30, 'Little Nightmares Complete Edition', '1', 2179, '<p>Source: FitGirl</p>', '2017-04-28', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(31, 'MotoGP 20', '1', 9391, '<p>Source: FitGirl</p>', '2020-04-23', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(32, 'Need For Speed Most Wanted Black Edition', '1', 2668, '', '2005-11-11', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(33, 'Need For Speed Most Wanted Limited', '1', 2692, '<p>Source: FitGirl</p>', '2012-10-30', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(34, 'Need For Speed Payback Deluxe Edition', '1', 13849, '<p>-</p>', '2017-11-10', 15000, 'FitGirl', 'Disk1', 0, 'Available'),
(35, 'Need For Speed Underground', '1', 783, '', '2003-11-17', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(36, 'Need For Speed Underground 2', '1', 1043, '', '2004-11-09', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(37, 'Plants Vs Zombies', '1', 56, '', '2009-05-05', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(38, 'Point Blank Zepetto', '1', 2525, '<p>Source: <a href=\"www.pointblank.id\">www.pointblank.id</a></p>', '2019-07-12', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(39, 'Pro Evolution Soccer 2013', '1', 8520, '', '2012-09-20', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(40, 'Pro Evolution Soccer 2017', '1', 4720, '<p>Source: FitGirl</p>', '2016-09-13', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(41, 'Resident Evil 2 Remake Deluxe Edition', '1', 15719, '<p>Source: FitGirl</p>', '2019-01-25', 20000, 'FitGirl', 'Disk1', 0, 'Available'),
(42, 'Resident Evil 3 Remake', '1', 14187, '<p>Source: FitGirl</p>', '2020-04-03', 15000, 'FitGirl', 'Disk1', 0, 'Available'),
(43, 'Resident Evil 4 Ultimate HD Edition', '1', 3311, '<p>Source: FitGirl</p>', '1014-02-28', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(44, 'Resident Evil 5 Gold Edition', '1', 3051, '<p>Source: FItGirl</p>', '2009-03-13', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(45, 'Resident Evil 6', '1', 5147, '<p>Source: FitGirl</p>', '2012-10-02', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(46, 'Rise Of The Tomb Raider', '1', 6086, '<p>Source: FitGirl</p>', '2015-11-10', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(47, 'Sekiro Shadow Die Twice GOTY', '1', 8302, '<p>Source: FitGirl</p>', '2019-03-22', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(48, 'Sky Force Anniversary', '1', 125, '', '2015-04-30', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(49, 'Spec Ops The Line', '1', 4601, '<p>Source: FitGirl</p>', '2012-06-26', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(51, 'The Elder Scrolls 5 Skyrim Special Edition', '1', 9080, '<p>Source: FitGirl</p><p>Version: 1.5.97</p>', '2016-10-28', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(52, 'The Sims 4 Deluxe Edition', '1', 26911, '<p>Source: FitGirl</p>', '2014-09-20', 30000, 'FitGirl', 'Disk1', 0, 'Available'),
(53, 'The Witcher 3 Wild Hunt GOTY Edition', '1', 23229, '<p>Source: FitGirl</p>', '2016-08-31', 30000, 'FitGirl', 'Disk1', 0, 'Available'),
(54, 'Titanfall 2', '1', 17610, '<p>Source: FitGirl</p>', '2016-10-26', 20000, 'FitGirl', 'Disk1', 0, 'Available'),
(55, 'World War Z GOTY Edition', '1', 20525, '<p>Source: FitGirl</p>', '2020-05-05', 25000, 'FitGirl', 'Disk1', 0, 'Available'),
(56, 'Zuma Deluxe', '1', 12, '', '2003-12-12', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(57, 'Resident Evil 7 Biohazard Gold Edition', '1', 22704, '<p>Source: FitGirl</p>', '2017-01-24', 25000, 'FitGirl', 'Disk1', 0, 'Available'),
(58, 'Prototype', '1', 5313, '<p>Source: FitGirl</p>', '2009-06-09', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(59, 'Prototype 2', '1', 6428, '<p>Source: FitGirl</p>', '2012-04-24', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(60, 'Battlefield 4 Premium Edition', '1', 15302, '<p>Source: FitGirl</p>', '2013-10-23', 15000, 'FitGirl', 'Disk1', 0, 'Available'),
(61, 'DreadOut Act 0 1 2', '1', 4735, '<p>Cracker: PROPHET</p><p>Repacker: PROPHET</p><p>Source: IGGGAMES</p>', '2014-05-16', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(62, 'DreadOut 2', '1', 12353, '<p>Source: FitGirl</p>', '2020-02-21', 15000, 'FitGirl', 'Disk4', 0, 'Available'),
(63, 'DreadOut Keepers Of The Dark', '1', 3035, '<p>Source: FitGirl</p>', '2016-03-24', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(64, 'Bully Scholarship Edition', '1', 3206, '<p>Source: FitGirl</p>', '2008-10-21', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(68, 'Forza Horizon 4', '1', 45088, '<p>Game Balap</p><p>Source: FitGirl</p>', '2018-09-28', 50000, 'FitGirl', 'Disk3', 0, 'Available'),
(70, 'Age Of Empires 3 Complete', '1', 2025, '<p>Source: FitGirl</p>', '2009-09-15', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(72, 'Avatar The Game', '1', 3749, '<p>Source: Ova Games</p>', '2009-12-01', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(73, 'Batman Arkham City GOTY Edition', '1', 11851, '<p>Source: FitGirl</p>', '2012-09-08', 15000, 'FitGirl', 'Disk2', 0, 'Available'),
(74, 'Borderlands GOTY Enhanced', '1', 5956, '<p>Source: FitGirl</p>', '2019-04-03', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(75, 'Burnout Paradise The Ultimate Box', '1', 1220, '<p>Source: FitGirl</p>', '2008-01-22', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(76, 'Car Mechanic Simulator 2018', '1', 8148, '', '2017-07-28', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(77, 'Crysis', '1', 3542, '<p>Source: FitGirl</p>', '2007-11-13', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(78, 'Crysis Warhead', '1', 3403, '<p>Source: FitGirl</p>', '2008-09-08', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(79, 'Cyberpunk 2077', '1', 39300, '', '2020-12-10', 40000, 'FitGirl', 'Disk2', 0, 'Available'),
(80, 'Dead Effect 2', '1', 4447, '<p>Source: FitGirl</p>', '2016-05-06', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(81, 'Deadpool', '1', 2897, '<p>Source: FitGirl</p>', '2013-06-25', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(82, 'Devil May Cry 1 2 3 HD Collection', '1', 5538, '<p>Source: FitGirl</p>', '2018-03-13', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(83, 'Devil May Cry 4 Special Edition', '1', 5324, '<p>Source: FitGirl</p>', '2015-06-23', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(84, 'DiRT Rally', '1', 9275, '<p>Source: FitGirl</p>', '2015-12-17', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(85, 'Dynasty Warriors 6', '1', 4563, '<p>Cracker: RELOADED</p><p>Repacker: RELOADED</p><p>Source: Ova Games</p>', '2007-11-11', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(86, 'Far Cry New Dawn Deluxe Edition', '1', 12295, '<p>Source: FitGirl</p>', '2019-02-16', 15000, 'FitGirl', 'Disk2', 0, 'Available'),
(87, 'Grand Theft Auto 4 The Complete Edition', '1', 14267, '<p>Source: FitGirl</p>', '2020-03-25', 15000, 'FitGirl', 'Disk2', 0, 'Available'),
(88, 'Left 4 Dead 2', '1', 4840, '<p>Source: FitGirl</p>', '2009-11-17', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(89, 'Metal Gear Solid 5 The Phantom Pain', '1', 11294, '<p>Source: FitGirl</p>', '2015-09-01', 15000, 'FitGirl', 'Disk2', 0, 'Available'),
(90, 'MX vs ATV All Out', '1', 11203, '<p>Source: FitGirl</p>', '2018-03-27', 15000, 'FitGirl', 'Disk2', 0, 'Available'),
(91, 'MXGP 2019 The Official Motocross Videogame', '1', 5531, '<p>Source: FitGirl</p>', '2019-08-27', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(92, 'MXGP 2020 The Official Motocross Videogame', '1', 7836, '<p>Source: FitGirl</p>', '2020-12-16', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(93, 'Naruto Shippuden Ultimate Ninja Storm 4', '1', 28141, '<p>Source: FitGirl</p>', '2016-02-05', 30000, 'FitGirl', 'Disk2', 0, 'Available'),
(94, 'Need For Speed Hot Pursuit', '1', 4096, '<p>Source: FitGirl</p>', '2010-11-16', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(95, 'Offroad Racing Buggy X ATV X Moto', '1', 2920, '<p>Source: FitGirl</p>', '2019-11-14', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(96, 'Ride 4', '1', 19130, '<p>Source: FitGirl</p>', '2020-10-08', 20000, 'FitGirl', 'Disk2', 0, 'Available'),
(97, 'Ancestors Legacy', '1', 10134, '<p>Source: FitGirl</p>', '2018-05-22', 15000, 'FitGirl', 'Disk3', 0, 'Available'),
(98, 'Assassins Creed Odyssey', '1', 37064, '<p>Source: FitGirl</p>', '2018-10-02', 40000, 'FitGirl', 'Disk3', 0, 'Available'),
(99, 'Assassins Creed Origins', '1', 29479, '<p>Source: FitGirl</p>', '2017-10-27', 30000, 'FitGirl', 'Disk3', 0, 'Available'),
(100, 'eFootball PES 2021', '1', 16232, '<p>Source: FitGirl</p>', '2020-09-15', 20000, 'FitGirl', 'Disk3', 0, 'Available'),
(101, 'Fallout New Vegas', '1', 5647, '<p>Source: FitGirl</p>', '2010-10-19', 10000, 'FitGirl', 'Disk3', 0, 'Available'),
(102, 'Fallout 4', '1', 21773, '<p>Source: FitGirl</p>', '2015-11-10', 25000, 'FitGirl', 'Disk3', 0, 'Available'),
(103, 'Far Cry 5', '1', 24871, '<p>Source: FitGirl</p>', '2018-03-27', 25000, 'FitGirl', 'Disk3', 0, 'Available'),
(104, 'Just Cause 3 XL Edition', '1', 17694, '', '2015-12-01', 20000, 'FitGirl', 'Disk3', 0, 'Available'),
(105, 'Naruto Shippuden Ultimate Ninja Storm 3 Full Burst HD', '1', 3668, '<p>Source: FitGirl</p>', '2013-03-05', 10000, 'FitGirl', 'Disk3', 0, 'Available'),
(106, 'One Piece Pirate Warriors 4', '1', 16526, '<p>Source: FitGirl</p>', '2020-03-26', 20000, 'FitGirl', 'Disk3', 0, 'Available'),
(107, 'One Piece Pirate Warriors 3 Gold Edition', '1', 8357, '<p>FitGirl</p>', '2015-03-26', 10000, 'FitGirl', 'Disk3', 0, 'Available'),
(108, 'Pro Evolution Soccer 2019', '1', 15375, '<p>Source: FitGirl</p><p>SmokePatch Version: 19.3.3</p>', '2018-08-30', 20000, 'FitGirl', 'Disk3', 0, 'Available'),
(109, 'SpellForce 3 Fallen God', '1', 15076, '<p>Source: FitGirl</p>', '2020-11-03', 20000, 'FitGirl', 'Disk3', 0, 'Available'),
(110, 'The Elder Scrolls 5 Skyrim Legendary Edition', '1', 4701, '<p>Source: FitGirl</p>', '2013-06-04', 10000, 'FitGirl', 'Disk3', 0, 'Available'),
(111, 'Naruto Shippuden Ultimate Ninja Storm Revolution', '1', 6685, '<p>Source: Ova Games</p>', '2014-09-11', 10000, 'FitGirl', 'Disk3', 0, 'Available'),
(112, 'MXGP The Official Motocross Videogame', '1', 3330, '<p>Cracker: RELOADED</p><p>Repacker: RELOADED</p><p>Source: Ova Games</p>', '2014-11-18', 10000, 'FitGirl', 'Disk3', 0, 'Available'),
(113, 'Call Of Duty Black Ops', '1', 7464, '<p>Source: FitGirl</p>', '2010-11-09', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(114, 'Call Of Duty Black Ops 2', '1', 16124, '<p>Source: FitGirl</p>', '2012-11-12', 20000, 'FitGirl', 'Disk4', 0, 'Available'),
(115, 'Dragon Age Inquisition Digital Deluxe Edition', '1', 20261, '<p>Source: FitGirl</p>', '2014-11-18', 25000, 'FitGirl', 'Disk4', 0, 'Available'),
(116, 'Dragon Age Origins Ultimate Edition', '1', 9338, '<p>Source: FitGirl</p>', '2009-11-09', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(117, 'Final Fantasy 4 The After Years', '1', 424, '<p>Source: FitGirl</p>', '2008-02-18', 5000, 'FitGirl', 'Disk4', 0, 'Available'),
(118, 'Final Fantasy 9', '1', 3397, '<p>Source: FitGirl</p>', '2016-04-14', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(119, 'Final Fantasy 5', '1', 475, '<p>Source: FitGirl</p>', '2015-09-24', 5000, 'FitGirl', 'Disk4', 0, 'Available'),
(120, 'Final Fantasy 8 Remastered', '1', 1903, '<p>Source: FitGirl</p>', '2019-09-03', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(121, 'Final Fantasy 15 Windows Edition', '1', 50375, '<p>Source: FitGirl</p>', '2018-03-07', 55000, 'FitGirl', 'Disk4', 0, 'Available'),
(122, 'Transformers The Game', '1', 158, '', '2007-06-19', 5000, 'FitGirl', 'Disk4', 0, 'Available'),
(123, 'Final Fantasy 6', '1', 611, '<p>Cracker: CODEX</p><p>Repacker: CODEX</p><p>Source: Ova Games</p>', '2015-12-17', 5000, 'FitGirl', 'Disk4', 0, 'Available'),
(124, 'Final Fantasy 7 Remake', '1', 2095, '<p>Cracker: RELOADED</p><p>Repacker: RELOADED</p><p>Source: Ova Games</p>', '2012-08-22', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(125, 'Age Of Empires Gold Edition', '1', 357, '<p>Source: IGGGAMES</p>', '1998-02-02', 5000, 'FitGirl', 'Disk4', 0, 'Available'),
(126, 'Call Of Duty Black Ops 3', '1', 62026, '', '2015-11-06', 65000, 'FitGirl', 'Disk4', 0, 'Available'),
(127, 'Age Of Empires Definitive Edition', '1', 8435, '<p>Source: FitGirl</p>', '2018-02-19', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(128, 'Dark Souls Remastered', '1', 4116, '', '2018-05-24', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(129, 'Assetto Corsa Competizione', 'v1.70', 7934, '', '2018-09-12', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(130, 'Call Of Duty Modern Warfare 3', '1', 11307, '<p>Source: FitGirl</p>', '2011-11-08', 15000, 'FitGirl', 'Disk4', 0, 'Available'),
(131, 'Resident Evil Operation Raccoon City', '1', 6086, '<p>Source: Ova Games</p>', '2012-03-20', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(132, 'Sky Force Reloaded', '1', 207, '', '2017-11-30', 5000, 'FitGirl', 'Disk1', 0, 'Available'),
(133, 'Shank', '1', 1871, '<p>Source: IGGGAMES</p>', '2010-08-24', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(134, 'The Evil Within Complete Edition', '1', 13626, '<p>Source: FitGirl</p>', '2014-10-14', 15000, 'FitGirl', 'Disk1', 0, 'Available'),
(135, 'The Punisher', '1', 1656, '', '2004-04-12', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(136, 'Umbrella Corp', '1', 3897, '<p>Source: FitGirl</p>', '2016-06-23', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(137, 'Resident Evil Revelations Complete Pack', '1', 5485, '<p>Source: Ova Games</p>', '2012-01-26', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(138, 'Resident Evil Revelations 2 Complete Season', '1', 9880, '<p>Source: Ova Games</p>', '2015-02-24', 10000, 'FitGirl', 'Disk1', 0, 'Available'),
(139, 'Dynasty Warriors 7 Xtreme Legends Definitive Edition', '1', 6400, '<p>Source: FitGirl</p>', '2018-12-06', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(140, 'The Amazing Spiderman', '1', 7739, '<p>Cracker: SKIDROW</p><p>Repacker: SKIDROW</p><p>Source: Ova Games</p>', '2012-06-26', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(141, 'The Amazing Spiderman 2', '1', 7984, '<p>Repacker: Plaza</p><p>Source: Ova Games</p>', '2014-04-17', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(142, 'The Evil Within 2', '1', 13292, '<p>Source: FitGirl</p>', '2017-10-13', 15000, 'FitGirl', 'Disk2', 0, 'Available'),
(143, 'X-Men Origins Wolverine', '1', 5181, '<p>Cracker: Elamigos</p><p>Repacker: Elamigos</p><p>Source: Ova Games</p>', '2009-04-29', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(144, 'Left 4 Dead', '1', 4520, '<p>Source: Ova Games</p>', '2008-11-17', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(145, 'Prince Of Persia', '1', 7568, '<p>Source: Ocean Of Games</p>', '2008-12-02', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(146, 'Prince Of Persia The Forgotten Sands', '1', 2090, '<p>Source: Ocean Of Games</p>', '2010-05-18', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(147, 'Prince Of Persia The Sands Of Time', '1', 1077, '<p>Source: Ocean Of Games</p>', '2003-10-28', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(148, 'Prince Of Persia The Two Thrones', '1', 1126, '<p>Source: Ocean Of Games</p>', '2005-06-15', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(149, 'Prince Of Persia Warrior Within', '1', 2040, '<p>Source: Ocean Of Games</p>', '2004-11-30', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(150, 'Shadow of the Tomb Raider', '1', 21264, '<p>Repacker: FitGIrl</p><p>Source: FitGirl</p><p>Status: Tested</p>', '2018-09-12', 25000, 'FitGirl', 'Disk2', 0, 'Available'),
(151, 'The Elder Scroll 3 Morrowind GOTY', '1', 1437, '', '2002-04-29', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(152, 'Tomb Raider GOTY', '1', 17781, '<p>Cracker: PROPHET</p><p>Repacker: PROPHET</p><p>Source: Ova Games</p>', '2013-03-05', 20000, 'FitGirl', 'Disk2', 0, 'Available'),
(153, 'The Elder Scrolls 4 Oblivion GOTY Deluxe Edition', '1', 5422, '', '2009-06-17', 10000, 'FitGirl', 'Disk2', 0, 'Available'),
(154, 'Max Payne 3 Complete Edition', '1', 14555, '<p>Source: FitGirl</p>', '2012-11-22', 15000, 'FitGirl', 'Disk4', 0, 'Available'),
(155, 'Saints Row 4 GOTC Edition', '1', 4382, '<p>Source: FitGirl</p>', '2014-07-16', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(156, 'Saints Row The Third Remastered', '1', 14318, '<p>Source: FitGirl</p>', '2020-05-22', 15000, 'FitGirl', 'Disk4', 0, 'Available'),
(157, 'Dead Space 2', '1', 4174, '<p>Source: FitGirl</p>', '2011-01-25', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(158, 'Dead Space', '1', 2442, '<p>Source: FitGirl</p>', '2008-10-14', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(159, 'Call Of Duty World At War', '1', 5024, '<p>Source: Ocean Of Games</p>', '2008-11-18', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(160, 'Call Of Duty 2', '1', 3707, '<p>Source: Ocean Of Games</p>', '2005-10-25', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(161, 'Call Of Duty United Offensive', '1', 2266, '<p>Source: Ocean Of Games</p>', '2004-09-14', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(162, 'Call Of Duty', '1', 444, '<p>Source: Ocean Of Games</p>', '2003-10-29', 5000, 'FitGirl', 'Disk4', 0, 'Available'),
(163, 'Mass Effect', '1', 3415, '<p>Source: FitGirl</p>', '2007-11-20', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(164, 'Mass Effect 2', '1', 5768, '<p>Source: FitGirl</p>', '2010-01-26', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(165, 'Call Of Duty Infinite Warfare', '1', 42919, '<p>Source: FitGirl</p>', '2016-11-04', 45000, 'FitGirl', 'Disk4', 0, 'Available'),
(166, 'Trials Of Mana', '1', 10611, '<p>Source: FitGirl</p>', '2020-04-24', 15000, 'FitGirl', 'Disk4', 0, 'Available'),
(167, 'Shining Resonance Refrain', '1', 7091, '<p>Source: FitGirl</p>', '2018-07-10', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(168, 'Far Cry Primal Apex Edition', '1', 12686, '<p>Source: FitGirl</p>', '2016-03-01', 15000, 'FitGirl', 'Disk1', 0, 'Available'),
(170, 'Far Cry 2 Fortunes Edition', '1', 2627, '<p>Source: IGGGAMES</p>', '2008-10-22', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(171, 'Far Cry', '1', 2611, '<p>Source: IGGGAMES</p>', '2004-03-23', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(174, 'Accel World Vs Sword Art Online Deluxe Edition', '1', 5068, '<p>Source: FitGirl</p>', '2017-09-12', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(175, 'Sword Art Online Fatal Bullet', '1', 12632, '<p>Source: FitGirl</p><p>Version: 1.7.0</p>', '2018-02-28', 15000, 'FitGirl', 'Disk4', 0, 'Available'),
(176, 'Sword Art Online Re Hollow Fragment', '1', 5696, '<p>Source: FitGirl</p>', '2018-08-21', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(177, 'Sword Art Online Hollow Realization Deluxe Edition', '1', 7189, '<p>Source: FitGirl</p>', '2017-10-27', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(178, 'Sword Art Online Lost Song', '1', 3370, '<p>Source: FitGirl</p>', '2018-11-13', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(179, 'Final Fantasy 3', '1', 583, '<p>Source: FitGirl</p>', '2014-05-27', 5000, 'FitGirl', 'Disk4', 0, 'Available'),
(183, 'Resident Evil 4', '1', 2623, '<p>Source: Nblog</p>', '2005-01-11', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(184, 'Mass Effect 3 Digital Deluxe Edition', '1', 8629, '<p>Source: FitGirl</p>', '2012-03-06', 10000, 'FitGirl', 'Disk4', 0, 'Available'),
(185, 'Warcraft 3', '1', 3768, '<p>Source: IGGGAMES</p>', '2002-07-03', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(186, 'Crysis 3 Digital Deluxe Edition', '1', 7218, '<p>Version: 1.3</p><p>Source: FitGirl</p>', '2013-02-19', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(187, 'Dead Cells', '1', 1019, '<p>Version: 22</p><p>Source: FitGirl</p><p>DLCs: 3</p>', '2017-05-10', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(188, 'F.E.A.R 2 Project Origin', '1', 4291, '<p><strong># DLCs: 1</strong><br />- Reborn</p><p><strong># Source:</strong><br />- FitGirl</p><p><strong># Version:</strong><br />1.05<br />Â </p><p><br /><br />Â </p><p>Â </p>', '2009-02-10', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(189, 'F.E.A.R 3', '1', 2953, '<p><strong># Source:</strong><br />- FitGirl</p><p><strong># Version:</strong><br />- 16.00.20.1060</p>', '2011-06-21', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(190, 'F.E.A.R Platinum Collection', '1', 2726, '<p><strong># Source:</strong><br />- FitGirl</p><p><strong># Version:</strong><br />1.08</p>', '2007-11-06', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(191, 'Yakuza 3 Remastered', '1', 9392, '<p>Source: FitGirl</p>', '2021-01-28', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(192, 'Yakuza 4 Remastered', '1', 13919, '<p>Source: FitGirl</p>', '2021-01-28', 15000, 'FitGirl', 'Disk5', 0, 'Available'),
(193, 'Yakuza 5 Remastered', '1', 13754, '<p>Source: FitGirl</p>', '2021-01-28', 15000, 'FitGirl', 'Disk5', 0, 'Available'),
(194, 'NBA 2K14', '1', 7394, '<p># Cracker:<br />- RELOADED</p><p># Source:<br />- IGGGAMES</p>', '2013-10-01', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(195, 'Mafia Definitive Edition', '1', 11633, '<p># DLC:<br />- Chicago Outfit Pack</p><p># Source:<br />- FitGirl</p><p># Version:<br />- 1.0.1</p>', '2020-09-25', 15000, 'FitGirl', 'Disk5', 0, 'Available'),
(196, 'Mafia 2 Definitive Edition', '1', 11467, '<p># Source:<br />- FitGirl</p>', '2020-05-19', 15000, 'FitGirl', 'Disk5', 0, 'Available'),
(200, 'Dragon Quest Heroes 2 Explorers Edition', '1', 8370, '<p># Source:<br />- FitGirl</p>', '2017-04-25', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(201, 'Battlefield 1 Digital Deluxe Edition', '1', 17431, '<p>Source: FitGirl</p>', '2016-10-20', 20000, 'FitGirl', 'Disk5', 0, 'Available'),
(202, 'Honey Select', '1', 3405, '<p>Source: FitGirl</p>', '2016-09-09', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(203, 'Honey Select 2 Libido', '1', 14148, '<p>Source: FitGirl</p><p>Version: 1.1.3</p>', '2020-05-29', 15000, 'FitGirl', 'Disk5', 0, 'Available'),
(204, 'Mafia 3 Definitive Edition', '1', 20224, '<p>Source: FitGirl</p>', '2020-05-19', 25000, 'FitGirl', 'Disk5', 0, 'Available'),
(205, 'Sleeping Dogs Definitive Edition', '1', 10133, '<p>Additional: Limited Edition</p><p>Source: FitGirl</p>', '2014-10-08', 15000, 'FitGirl', 'Disk5', 0, 'Available'),
(206, 'Sniper Ghost Warrior Contracts', '1', 9079, '<p>DLC: 16</p><p>Source: FitGirl</p><p>Version: 20210125</p>', '2019-11-23', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(207, 'State Of Decay 2 Juggernaunt Edition', '1', 11754, '<p>Version: Build 384867 / Update 15</p><p>&nbsp;</p>', '2020-03-13', 15000, 'FitGirl', 'Disk5', 0, 'Available'),
(211, 'Battlefield 5', 'v1.04 build 3891220', 34860, '', '2018-09-11', 35000, 'FitGirl', 'Disk5', 0, 'Available'),
(212, 'Battlefield Bad Company 2', '1', 5684, '', '2010-03-02', 10000, 'IGGGAMES', 'Disk5', 0, 'Available'),
(213, 'Control Ultimate Edition', 'v.1.12 (Steam)', 19049, '', '2019-08-28', 20000, 'FitGirl', 'Disk5', 0, 'Available'),
(214, 'Kingdoms Of Amalur Re-Reckoning', 'CS 7375 Build 5757348 Update 7', 13993, '', '2020-09-09', 15000, 'FitGirl', 'Disk5', 0, 'Available'),
(215, 'Nioh 2 The Complete Edition', 'v1.25', 27911, '', '2021-02-05', 30000, 'FitGirl', 'Disk5', 0, 'Available'),
(216, 'Ori And The Will Of The Wisp', '1', 3720, '', '2020-03-11', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(217, 'Red Dead Redemption 2', 'Build 1311.23', 69597, '', '2019-12-06', 70000, 'FitGirl', 'Disk5', 0, 'Available'),
(218, 'Snowrunner', 'v12.1', 11917, '', '2020-04-28', 15000, 'FitGirl', 'Disk5', 0, 'Available'),
(219, 'The Medium Deluxe Edition', 'v1.0.157', 15866, '', '2021-01-28', 20000, 'FitGirl', 'Disk5', 0, 'Available'),
(220, 'The Witcher Enhanced Edition Directors Cut', 'v1.5 (GOG)', 3555, '', '2008-09-16', 10000, 'FitGirl', 'Disk5', 0, 'Available'),
(221, 'The Witcher 2 Assassins Of Kings Enhanced Edition', 'v3.4.4.1', 9163, '', '2011-05-17', 10000, 'FitGirl', 'Disk5', 0, 'Available');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_computersoftware`
--

CREATE TABLE `tb_computersoftware` (
  `computersoftware_id` int(10) NOT NULL,
  `computersoftware_name` varchar(255) NOT NULL,
  `computersoftware_description` text NOT NULL DEFAULT '-',
  `computersoftware_price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_computersoftware`
--

INSERT INTO `tb_computersoftware` (`computersoftware_id`, `computersoftware_name`, `computersoftware_description`, `computersoftware_price`) VALUES
(5, 'Adobe Photoshop CS6', '-', 0),
(6, 'Autodesk Autocad 2014', '-', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_nickname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_username`, `user_password`, `user_nickname`) VALUES
(1, 'adminchp', 'passwordchp', 'CHP');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `table_ps2_games`
--
ALTER TABLE `table_ps2_games`
  ADD PRIMARY KEY (`ps2_games_id`);

--
-- Indeks untuk tabel `table_recent_buy`
--
ALTER TABLE `table_recent_buy`
  ADD PRIMARY KEY (`recent_buy_id`),
  ADD KEY `recent_buy_user_id` (`recent_buy_user_id`);

--
-- Indeks untuk tabel `table_services`
--
ALTER TABLE `table_services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indeks untuk tabel `table_windows_games`
--
ALTER TABLE `table_windows_games`
  ADD PRIMARY KEY (`windows_games_id`);

--
-- Indeks untuk tabel `tb_computersoftware`
--
ALTER TABLE `tb_computersoftware`
  ADD PRIMARY KEY (`computersoftware_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `table_ps2_games`
--
ALTER TABLE `table_ps2_games`
  MODIFY `ps2_games_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `table_recent_buy`
--
ALTER TABLE `table_recent_buy`
  MODIFY `recent_buy_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `table_services`
--
ALTER TABLE `table_services`
  MODIFY `services_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `table_windows_games`
--
ALTER TABLE `table_windows_games`
  MODIFY `windows_games_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT untuk tabel `tb_computersoftware`
--
ALTER TABLE `tb_computersoftware`
  MODIFY `computersoftware_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `table_recent_buy`
--
ALTER TABLE `table_recent_buy`
  ADD CONSTRAINT `table_recent_buy_ibfk_1` FOREIGN KEY (`recent_buy_user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
