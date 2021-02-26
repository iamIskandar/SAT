-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 12:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_batch`
--

CREATE TABLE `tb_batch` (
  `b_date` date NOT NULL,
  `b_time` time NOT NULL,
  `b_qty` int(7) NOT NULL,
  `b_deathQty` int(7) NOT NULL,
  `b_avgWeight` float NOT NULL,
  `b_id` int(7) NOT NULL,
  `b_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_batch`
--

INSERT INTO `tb_batch` (`b_date`, `b_time`, `b_qty`, `b_deathQty`, `b_avgWeight`, `b_id`, `b_no`) VALUES
('2019-12-05', '10:00:00', 995, 5, 1.25, 37, 16),
('2019-12-05', '10:00:00', 990, 10, 1.7, 38, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tb_chicken`
--

CREATE TABLE `tb_chicken` (
  `c_no` int(7) NOT NULL,
  `c_dateRec` date NOT NULL,
  `c_feedQty` int(7) NOT NULL,
  `c_deathQty` int(7) NOT NULL,
  `c_avgWeight` float NOT NULL,
  `c_desc` varchar(100) NOT NULL,
  `c_fcr` float NOT NULL,
  `c_status` int(3) NOT NULL,
  `c_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_chicken`
--

INSERT INTO `tb_chicken` (`c_no`, `c_dateRec`, `c_feedQty`, `c_deathQty`, `c_avgWeight`, `c_desc`, `c_fcr`, `c_status`, `c_id`) VALUES
(53, '2019-12-06', 7, 3, 0, 'Bagi makan reban 1', 0, 2, 37),
(54, '2019-12-07', 8, 2, 0, 'Bagi makan reban 2', 0, 2, 37),
(55, '2019-12-08', 9, 1, 0, 'Bagi makan reban 3', 0, 2, 37),
(56, '2019-12-09', 8, 1, 0, 'Bagi makan reban 4', 0, 2, 37),
(57, '2019-12-10', 7, 0, 0, 'Bagi makan reban 5', 0, 2, 37),
(58, '2019-12-11', 6, 0, 0, 'Bagi makan reban 6', 0, 2, 37),
(59, '2019-12-12', 5, 1, 1.34, 'Bagi makan reban 7', 0, 2, 37),
(60, '2019-12-14', 9, 3, 0, 'Bagi makan reban 8 dan 9 dan 10', 0, 2, 37),
(63, '2019-12-13', 9, 5, 0, 'Banyak ayam mati', 0, 2, 37),
(64, '2019-12-16', 8, 1, 0, 'Bagi makan reban 11 dan 12', 0, 2, 37),
(65, '2019-12-15', 5, 2, 0, 'Ayam lari dari reban', 0, 1, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tb_farm`
--

CREATE TABLE `tb_farm` (
  `f_id` varchar(30) NOT NULL,
  `f_company` varchar(30) NOT NULL DEFAULT '-',
  `f_address` varchar(100) NOT NULL,
  `f_totalCoop` int(7) NOT NULL,
  `f_capacity` int(7) NOT NULL,
  `f_status` int(3) NOT NULL,
  `f_no` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_farm`
--

INSERT INTO `tb_farm` (`f_id`, `f_company`, `f_address`, `f_totalCoop`, `f_capacity`, `f_status`, `f_no`) VALUES
('SAT-anis', 'Anis Sdn. Bhd.', 'Bandar Enstek', 5, 1000, 2, 21),
('SAT-farid', 'Farid Sdn. Bhd.', 'Sepang', 7, 10000, 2, 22),
('', 'Iskandar Enterprise', 'Tanjung Tokong', 25, 1000000, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tb_fieldwork`
--

CREATE TABLE `tb_fieldwork` (
  `fw_no` int(7) NOT NULL,
  `fw_date` date NOT NULL,
  `fw_desc` varchar(100) NOT NULL,
  `fw_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_fieldwork`
--

INSERT INTO `tb_fieldwork` (`fw_no`, `fw_date`, `fw_desc`, `fw_id`) VALUES
(19, '2019-12-01', 'Kemas reban 1', 37),
(20, '2019-12-02', 'Kemas reban 2', 37),
(21, '2019-12-03', 'Kemas reban 3 dan 4', 37),
(22, '2019-12-01', 'Bersihkan reban 1', 38),
(23, '2019-12-02', 'Bersihkan reban 2', 38),
(24, '2019-12-03', 'Bersihkan reban 3 dan 4', 38),
(25, '2019-12-01', 'Kemas reban 1', 39),
(26, '2019-12-02', 'Kemas reban 2', 39),
(27, '2019-12-03', 'Kemas reban 3 dan 4', 39);

-- --------------------------------------------------------

--
-- Table structure for table `tb_harvest`
--

CREATE TABLE `tb_harvest` (
  `h_date` date NOT NULL,
  `h_sellingPrice` float NOT NULL,
  `h_avgWeight` float NOT NULL,
  `h_qty` int(7) NOT NULL,
  `h_liveability` float NOT NULL,
  `h_depletion` int(7) NOT NULL,
  `h_fcr` float NOT NULL,
  `h_feedPrice` float NOT NULL,
  `h_medicPrice` float NOT NULL,
  `h_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_harvest`
--

INSERT INTO `tb_harvest` (`h_date`, `h_sellingPrice`, `h_avgWeight`, `h_qty`, `h_liveability`, `h_depletion`, `h_fcr`, `h_feedPrice`, `h_medicPrice`, `h_id`) VALUES
('2019-12-06', 2.5, 2.4, 200, 0.5, 1, 6.97917, 200, 250, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tb_operationcost`
--

CREATE TABLE `tb_operationcost` (
  `oc_wages` float NOT NULL,
  `oc_rental` float DEFAULT NULL,
  `oc_fMaintainence` float DEFAULT NULL,
  `oc_utility` float DEFAULT NULL,
  `oc_sawDust` float DEFAULT NULL,
  `oc_fuel` float DEFAULT NULL,
  `oc_machinery` float DEFAULT NULL,
  `oc_mMaintainence` float DEFAULT NULL,
  `oc_offManagement` float DEFAULT NULL,
  `oc_gas` float DEFAULT NULL,
  `oc_other` float DEFAULT NULL,
  `oc_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_operationcost`
--

INSERT INTO `tb_operationcost` (`oc_wages`, `oc_rental`, `oc_fMaintainence`, `oc_utility`, `oc_sawDust`, `oc_fuel`, `oc_machinery`, `oc_mMaintainence`, `oc_offManagement`, `oc_gas`, `oc_other`, `oc_id`) VALUES
(200, 0, 0, 100, 0, 0, 45, 0, 0, 20, 0, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `p_id` int(7) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_dateDoc` date NOT NULL,
  `p_dateHarvest` date NOT NULL,
  `p_qtyDoc` int(7) NOT NULL,
  `p_status` int(3) NOT NULL,
  `p_no` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`p_id`, `p_name`, `p_dateDoc`, `p_dateHarvest`, `p_qtyDoc`, `p_status`, `p_no`) VALUES
(37, 'Project-1', '2019-12-01', '2020-01-04', 1000, 6, 21),
(38, 'Project-2', '2019-12-01', '2020-01-04', 1000, 5, 21),
(39, 'Project-3', '2019-12-01', '2020-01-04', 1000, 4, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tb_record`
--

CREATE TABLE `tb_record` (
  `r_date` date NOT NULL,
  `r_nextDate` date NOT NULL,
  `r_feedQty` int(7) NOT NULL,
  `r_day` int(3) NOT NULL,
  `r_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_record`
--

INSERT INTO `tb_record` (`r_date`, `r_nextDate`, `r_feedQty`, `r_day`, `r_id`) VALUES
('2019-12-12', '2019-12-18', 67, 9, 37),
('2019-12-05', '2019-12-12', 0, 0, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `fcr` float NOT NULL,
  `pi` float NOT NULL,
  `gross` float NOT NULL,
  `grossPerBird` float NOT NULL,
  `net` float NOT NULL,
  `netPerBird` float NOT NULL,
  `production` float NOT NULL,
  `totalfeed` float NOT NULL,
  `operationcost` float NOT NULL,
  `rp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_report`
--

INSERT INTO `tb_report` (`fcr`, `pi`, `gross`, `grossPerBird`, `net`, `netPerBird`, `production`, `totalfeed`, `operationcost`, `rp_id`) VALUES
(6.97917, 34.3881, -250, -500, -1190, -595, 480, 3350, 345, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `s_id` int(3) NOT NULL,
  `s_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`s_id`, `s_desc`) VALUES
(1, 'Received'),
(2, 'Approved'),
(3, 'Rejected'),
(4, 'New'),
(5, 'InProgress'),
(6, 'Closed'),
(7, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_temporary`
--

CREATE TABLE `tb_temporary` (
  `t_submitDate` date NOT NULL,
  `t_dateRec` date NOT NULL,
  `t_feedQty` int(7) NOT NULL,
  `t_deathQty` int(7) NOT NULL,
  `t_avgWeight` float NOT NULL,
  `t_desc` varchar(100) NOT NULL,
  `t_status` int(3) DEFAULT NULL,
  `t_no` int(7) DEFAULT NULL,
  `t_fun` int(7) NOT NULL,
  `t_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_temporary`
--

INSERT INTO `tb_temporary` (`t_submitDate`, `t_dateRec`, `t_feedQty`, `t_deathQty`, `t_avgWeight`, `t_desc`, `t_status`, `t_no`, `t_fun`, `t_id`) VALUES
('2019-12-06', '2019-12-15', 5, 2, 0, 'Ayam lari dari reban dan ladang', NULL, 65, 34, NULL),
('2019-12-06', '2019-12-18', 8, 2, 2.7, 'Bagi makan reban 13', 1, NULL, 35, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `u_no` int(7) NOT NULL,
  `u_id` varchar(30) NOT NULL,
  `u_password` varchar(15) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_telNo` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`u_no`, `u_id`, `u_password`, `u_name`, `u_email`, `u_telNo`) VALUES
(1, 'adminsat', '12345', 'admin', '', '0123456789'),
(21, 'SAT-anis', '67890', 'Anis Humaira', 'humaira121028@gmail.com', '011-23159501'),
(22, 'SAT-farid', '67890', 'Farid Siddiq', 'yasashixakaihoho@gmail.com', '014-2257307'),
(23, '', '', 'Irfan Iskandar', 'irfaniskandar791@gmail.com', ' 016-4366212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_batch`
--
ALTER TABLE `tb_batch`
  ADD PRIMARY KEY (`b_no`),
  ADD KEY `p_id` (`b_id`) USING BTREE;

--
-- Indexes for table `tb_chicken`
--
ALTER TABLE `tb_chicken`
  ADD PRIMARY KEY (`c_no`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `c_status` (`c_status`) USING BTREE;

--
-- Indexes for table `tb_farm`
--
ALTER TABLE `tb_farm`
  ADD KEY `f_status` (`f_status`),
  ADD KEY `f_no` (`f_no`);

--
-- Indexes for table `tb_fieldwork`
--
ALTER TABLE `tb_fieldwork`
  ADD PRIMARY KEY (`fw_no`),
  ADD KEY `p_id` (`fw_id`) USING BTREE;

--
-- Indexes for table `tb_harvest`
--
ALTER TABLE `tb_harvest`
  ADD UNIQUE KEY `b_id` (`h_id`);

--
-- Indexes for table `tb_operationcost`
--
ALTER TABLE `tb_operationcost`
  ADD UNIQUE KEY `b_id` (`oc_id`);

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_status` (`p_status`) USING BTREE,
  ADD KEY `p_no` (`p_no`);

--
-- Indexes for table `tb_record`
--
ALTER TABLE `tb_record`
  ADD KEY `p_id` (`r_id`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD KEY `rp_id` (`rp_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tb_temporary`
--
ALTER TABLE `tb_temporary`
  ADD PRIMARY KEY (`t_fun`),
  ADD KEY `t_no` (`t_no`),
  ADD KEY `t_status` (`t_status`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`u_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_batch`
--
ALTER TABLE `tb_batch`
  MODIFY `b_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_chicken`
--
ALTER TABLE `tb_chicken`
  MODIFY `c_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_fieldwork`
--
ALTER TABLE `tb_fieldwork`
  MODIFY `fw_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `p_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_temporary`
--
ALTER TABLE `tb_temporary`
  MODIFY `t_fun` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `u_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_batch`
--
ALTER TABLE `tb_batch`
  ADD CONSTRAINT `tb_batch_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `tb_project` (`p_id`);

--
-- Constraints for table `tb_chicken`
--
ALTER TABLE `tb_chicken`
  ADD CONSTRAINT `tb_chicken_ibfk_2` FOREIGN KEY (`c_status`) REFERENCES `tb_status` (`s_id`),
  ADD CONSTRAINT `tb_chicken_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `tb_project` (`p_id`);

--
-- Constraints for table `tb_farm`
--
ALTER TABLE `tb_farm`
  ADD CONSTRAINT `tb_farm_ibfk_4` FOREIGN KEY (`f_status`) REFERENCES `tb_status` (`s_id`),
  ADD CONSTRAINT `tb_farm_ibfk_5` FOREIGN KEY (`f_no`) REFERENCES `tb_user` (`u_no`);

--
-- Constraints for table `tb_fieldwork`
--
ALTER TABLE `tb_fieldwork`
  ADD CONSTRAINT `tb_fieldwork_ibfk_1` FOREIGN KEY (`fw_id`) REFERENCES `tb_project` (`p_id`);

--
-- Constraints for table `tb_harvest`
--
ALTER TABLE `tb_harvest`
  ADD CONSTRAINT `tb_harvest_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `tb_project` (`p_id`);

--
-- Constraints for table `tb_operationcost`
--
ALTER TABLE `tb_operationcost`
  ADD CONSTRAINT `tb_operationcost_ibfk_1` FOREIGN KEY (`oc_id`) REFERENCES `tb_project` (`p_id`);

--
-- Constraints for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD CONSTRAINT `tb_project_ibfk_2` FOREIGN KEY (`p_status`) REFERENCES `tb_status` (`s_id`),
  ADD CONSTRAINT `tb_project_ibfk_3` FOREIGN KEY (`p_no`) REFERENCES `tb_user` (`u_no`);

--
-- Constraints for table `tb_record`
--
ALTER TABLE `tb_record`
  ADD CONSTRAINT `tb_record_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `tb_project` (`p_id`);

--
-- Constraints for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD CONSTRAINT `tb_report_ibfk_1` FOREIGN KEY (`rp_id`) REFERENCES `tb_batch` (`b_id`);

--
-- Constraints for table `tb_temporary`
--
ALTER TABLE `tb_temporary`
  ADD CONSTRAINT `tb_temporary_ibfk_1` FOREIGN KEY (`t_no`) REFERENCES `tb_chicken` (`c_no`),
  ADD CONSTRAINT `tb_temporary_ibfk_2` FOREIGN KEY (`t_status`) REFERENCES `tb_status` (`s_id`),
  ADD CONSTRAINT `tb_temporary_ibfk_3` FOREIGN KEY (`t_id`) REFERENCES `tb_project` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
