-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 11:59 PM
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
('2019-12-11', '11:00:00', 1000, 0, 0.05, 48, 25),
('2019-12-11', '11:30:00', 1000, 0, 0.05, 49, 26),
('2019-12-11', '11:00:00', 1000, 0, 0.06, 48, 27),
('2019-12-11', '11:00:00', 1000, 0, 0.04, 48, 28),
('2019-12-11', '11:00:00', 1000, 0, 0.05, 48, 29),
('2019-12-11', '11:30:00', 1000, 0, 0.06, 49, 30),
('2019-12-11', '11:30:00', 1000, 0, 0.04, 49, 31);

-- --------------------------------------------------------

--
-- Table structure for table `tb_chicken`
--

CREATE TABLE `tb_chicken` (
  `c_no` int(7) NOT NULL,
  `c_dateRec` date NOT NULL,
  `c_feedType` int(3) NOT NULL,
  `c_feedQty` int(7) NOT NULL,
  `c_deathQty` int(7) NOT NULL,
  `c_avgWeight` float NOT NULL,
  `c_desc` varchar(100) NOT NULL,
  `c_status` int(3) NOT NULL,
  `c_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('sat-iskandar', 'iskandar comel', 'tanjung takong', 10, 10000, 2, 31),
('sat-anis', 'anis meh', 'bandar enstek', 10, 10000, 2, 32),
('sat-farid', 'farid yeet', 'nilai sepang', 10, 10000, 2, 33),
('sat-adam', 'adam band', 'pulau pinang', 10, 10000, 2, 34),
('sat-azila', 'azila rock', 'kampung pandan', 10, 10000, 2, 35),
('sat-haizam', 'haizam osem', 'Taman Norba', 10, 10000, 2, 36),
('sat-fatihah', 'fatihah hero', 'seremban lama', 10, 10000, 2, 37),
('sat-sina', 'anis wink', 'puchong selangor', 10, 10000, 2, 38),
('sat-iskandar', 'lolipop sdn bhd', 'lolipop station', 3, 20, 2, 40);

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
(28, '2019-11-25', 'kemas 1', 48),
(29, '2019-11-26', 'kemas 2', 48),
(30, '2019-11-27', 'kemas 3 and 4', 48),
(31, '2019-11-25', 'kemas 1', 49),
(32, '2019-11-26', 'kemas 2 and 2.5', 49),
(33, '2019-11-27', 'kemas 3', 49),
(34, '2019-11-25', 'kemas 1 and 1.5', 50),
(35, '2019-11-26', 'kemas 2', 50),
(36, '2019-11-27', 'kemas 3', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_harvest`
--

CREATE TABLE `tb_harvest` (
  `h_date` date NOT NULL,
  `h_sellingPrice` float NOT NULL,
  `h_avgWeight` float NOT NULL,
  `h_qty` int(7) NOT NULL,
  `h_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_operationcost`
--

CREATE TABLE `tb_operationcost` (
  `oc_starterPrice` float NOT NULL,
  `oc_crumblePrice` float NOT NULL,
  `oc_growerPrice` float NOT NULL,
  `oc_medicPrice` float NOT NULL,
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
(48, 'project-1', '2019-11-25', '2020-01-05', 3000, 5, 31),
(49, 'project-2', '2019-11-25', '2020-01-05', 1000, 5, 31),
(50, 'project-3', '2019-11-25', '2020-01-05', 1000, 4, 31);

-- --------------------------------------------------------

--
-- Table structure for table `tb_record`
--

CREATE TABLE `tb_record` (
  `r_date` date NOT NULL,
  `r_nextDate` date NOT NULL,
  `r_chickenQty` int(11) NOT NULL,
  `r_mortality` float NOT NULL,
  `r_livability` float NOT NULL,
  `r_currentQty` int(11) NOT NULL,
  `r_harvestQty` int(7) NOT NULL,
  `r_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_record`
--

INSERT INTO `tb_record` (`r_date`, `r_nextDate`, `r_chickenQty`, `r_mortality`, `r_livability`, `r_currentQty`, `r_harvestQty`, `r_id`) VALUES
('2019-12-11', '2011-12-26', 4000, 0, 0, 4000, 0, 48),
('2019-12-11', '2011-12-26', 3000, 0, 0, 3000, 0, 49);

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
(7, 'Feed Starter'),
(8, 'Feed Crumble'),
(9, 'Feed Grower');

-- --------------------------------------------------------

--
-- Table structure for table `tb_temporary`
--

CREATE TABLE `tb_temporary` (
  `t_submitDate` date NOT NULL,
  `t_dateRec` date NOT NULL,
  `t_feedType` int(3) NOT NULL,
  `t_feedQty` int(7) NOT NULL,
  `t_deathQty` int(7) NOT NULL,
  `t_cullsQty` int(7) NOT NULL,
  `t_avgWeight` float NOT NULL,
  `t_desc` varchar(100) NOT NULL,
  `t_status` int(3) DEFAULT NULL,
  `t_no` int(7) DEFAULT NULL,
  `t_fun` int(7) NOT NULL,
  `t_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(28, '', '', 'Mohammad Irfan Iskandar Bin Za', 'irfaniskandar791@gmail.com', '016-4366212'),
(29, '', '', 'Mohammad Irfan Iskandar Bin Za', 'irfaniskandar791@gmail.com', '016-4366212'),
(30, '', '', 'Mohammad Irfan Iskandar Bin Za', 'irfaniskandar791@gmail.com', '016-4366212'),
(31, 'sat-iskandar', '258', 'Irfan Iskandar Comel', 'irfaniskandar791@gmail.com', '016-4317464'),
(32, 'sat-anis', '0123', 'Anis Humaira Meh', 'humaira121028@gmail.com', '011-23159504'),
(33, 'sat-farid', '67890', 'Farid Siddiq Yeet', 'humaira121028@gmail.com', '014-2257307'),
(34, 'sat-adam', '67890', 'Adam Mukhriz Band', 'irfaniskandar791@gmail.com', '016-4366217'),
(35, 'sat-azila', '67890', 'Azila Amat Rock', 'humaira121028@gmail.com', '014-2257307'),
(36, 'sat-haizam', '67890', 'Haizam Hashim Osem', 'humaira12108@gmail.com', '011-23159504'),
(37, 'sat-fatihah', '67890', 'Fatihah Razi Hero', 'humaira121028@gmail.com', '011-23159504'),
(38, 'sat-sina', '67890', 'Anis Humaira Wink', 'humiara121028@gmail.com', '011-23159504'),
(40, 'lolipop', '012', 'lolipop', 'lolipop@gmail.com', '016-4366212');

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
  ADD KEY `c_status` (`c_status`) USING BTREE,
  ADD KEY `c_feedType` (`c_feedType`);

--
-- Indexes for table `tb_farm`
--
ALTER TABLE `tb_farm`
  ADD PRIMARY KEY (`f_no`),
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
  ADD PRIMARY KEY (`r_id`),
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
  ADD KEY `t_id` (`t_id`),
  ADD KEY `t_feedType` (`t_feedType`);

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
  MODIFY `b_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_chicken`
--
ALTER TABLE `tb_chicken`
  MODIFY `c_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_fieldwork`
--
ALTER TABLE `tb_fieldwork`
  MODIFY `fw_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `p_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_temporary`
--
ALTER TABLE `tb_temporary`
  MODIFY `t_fun` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `u_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  ADD CONSTRAINT `tb_chicken_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `tb_project` (`p_id`),
  ADD CONSTRAINT `tb_chicken_ibfk_4` FOREIGN KEY (`c_feedType`) REFERENCES `tb_status` (`s_id`);

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
  ADD CONSTRAINT `tb_report_ibfk_1` FOREIGN KEY (`rp_id`) REFERENCES `tb_project` (`p_id`);

--
-- Constraints for table `tb_temporary`
--
ALTER TABLE `tb_temporary`
  ADD CONSTRAINT `tb_temporary_ibfk_1` FOREIGN KEY (`t_no`) REFERENCES `tb_chicken` (`c_no`),
  ADD CONSTRAINT `tb_temporary_ibfk_2` FOREIGN KEY (`t_status`) REFERENCES `tb_status` (`s_id`),
  ADD CONSTRAINT `tb_temporary_ibfk_3` FOREIGN KEY (`t_id`) REFERENCES `tb_project` (`p_id`),
  ADD CONSTRAINT `tb_temporary_ibfk_4` FOREIGN KEY (`t_feedType`) REFERENCES `tb_status` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
