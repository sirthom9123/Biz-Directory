-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2020 at 01:24 PM
-- Server version: 5.7.29
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mchaghhr_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `surname`, `name`, `level`, `password`) VALUES
('madh', 'Paneng', 'Princess', 'User', '356a192b7913b04c54574d18c28d46e6395428ab'),
('madw', 'Motshabi', 'Tshiamo', 'Admin', '356a192b7913b04c54574d18c28d46e6395428ab'),
('visto', 'Pule', 'Sethunya', 'Admin', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Table structure for table `bbee`
--

CREATE TABLE `bbee` (
  `id` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `names` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `race` varchar(30) NOT NULL,
  `enterprise_name` varchar(60) NOT NULL,
  `reg_number` varchar(20) NOT NULL,
  `res_address` varchar(100) NOT NULL,
  `turnover` varchar(60) NOT NULL,
  `sub_contract` varchar(20) NOT NULL,
  `enterprise_type` varchar(30) NOT NULL,
  `classification` varchar(30) NOT NULL,
  `join_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bbee`
--

INSERT INTO `bbee` (`id`, `email`, `telephone`, `surname`, `names`, `gender`, `race`, `enterprise_name`, `reg_number`, `res_address`, `turnover`, `sub_contract`, `enterprise_type`, `classification`, `join_date`, `status`) VALUES
('1987/0076/07', 'missford1@gmail.com', '0728589151', 'Ford', 'mpho Ford', 'Female', 'Black', 'Mpho Ford (Pty) Ltd ', '1987/0076/07', '797 Augrabies Avenue\r\nLittle Falls', 'R5 000 000 - R10 000 000', 'No', 'Private Company', 'Supplier', '2019-07-04', 1),
('8611195293085', 'bongani@mmfinconsult.co.za', '0820630330', 'Mahlori', 'Jordie', 'Male', 'Black', 'Violet Sky Resources', '2009/1259125/23', '13 Boundary Lane Pakdene', 'R5 000 000 - R10 000 000', 'No', 'Private Company', 'Other', '2019-10-24', 1),
('8880145497701', 'tmahlori@yahoo.com', '0789582111', 'Mahlori', 'Thabo Mahlori', 'Male', 'Black', 'TMBWB', '2000047998', '115 Chiawelo, Chris Hani Road,1818\r\n7 Naivasha Road, Sunninghill', 'R500 000 - R5 000 000', 'No', 'Private Company', 'Manufacturer', '2019-10-24', 1),
('9006030567098', 'nomajay@icloud.com', '0113345678', 'Sibanda', 'Noma', 'Female', 'Black', 'Rainmaker', '20198887777', 'Ululate 2', 'R5 000 000 - R10 000 000', 'No', 'Private Company', 'Other', '2019-07-18', 1),
('9103221234088', 'dr.tshix@gmail.com', '0817716044', 'Motshabi', 'Tshiamo Motshabi', 'Male', 'Black', 'QR Air', '2016/11996/07', '123 Pretoria', '0 - R50 000', 'No', '(Pty) Limited', 'Professional Service Provider', '2019-05-28', 1),
('9105305206088', 'airstor2391@gmail.com', '0817114066', 'Motshabi', 'Ditebogo', 'Male', 'Black', 'Tsotso Enterprise', '2019/11715/07', '60 Lourierpark, Bloemfontein, Free State, 9300', '0 - R50 000', 'No', '(Pty) Limited', 'Manufacturer', '2019-10-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `username` varchar(20) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `enterprise_name` varchar(50) NOT NULL,
  `enterprise_type` varchar(50) NOT NULL,
  `tax_number` varchar(50) NOT NULL,
  `registration_date` date NOT NULL,
  `province` varchar(30) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `location` varchar(40) NOT NULL,
  `postal_address` varchar(100) NOT NULL,
  `physical_address` varchar(100) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `website` varchar(30) NOT NULL,
  `business_turnover` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `employees` int(11) NOT NULL,
  `assets` varchar(30) NOT NULL,
  `account` varchar(5) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `approved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`username`, `reg_no`, `enterprise_name`, `enterprise_type`, `tax_number`, `registration_date`, `province`, `municipality`, `location`, `postal_address`, `physical_address`, `telephone`, `email`, `website`, `business_turnover`, `category`, `status`, `employees`, `assets`, `account`, `bank`, `logo`, `description`, `approved`) VALUES
('bongani', '2009/1259125/23', 'Violet Sky Resources ', 'Private Company', '99999999999', '2019-10-24', 'Gauteng', 'Johannesburg ', 'Gauteng', 'Postnet Suite 5', '13 Boundary Lane Oakdene ', '0820630330', 'bongani@mmfinconsult.co.za', 'www.violetskygroup.com', '347000000', 'Mining and Quarrying', '', 60, 'R25000000', 'Yes', 'ABSA', '', 'Mining and civil related services ', 1),
('mphoford ', '1965/00502/07', 'Mpho Ford (Pty) Ltd ', 'Private Company', '8756760000', '2019-07-04', 'Gauteng', 'Mogale ', 'Roodepoort ', 'same as physical ', '797 Augrabies Avenue \r\nLittle Falls \r\nRoodepoort', '0728589151', 'missford1@gmail.com', 'www.mpho.co.za', 'R50 million ', 'Manufucturing', '', 100, '20000000', 'Yes', 'FNB', '', 'BEE Analysis ', 1),
('Nomajay@icloud.com', '2019007', 'NISC', 'Private Company', '2999888', '2019-09-24', 'Gauteng', 'Randburg', 'Gauteng ', '345 Sharonlea ', '345 sharonlea ', '0124471234', 'nomajay@icloud.con', 'Www.nisc.com', '50000', 'Advertising', '', 109, '4000000', 'Yes', 'FNB', '', 'ICT services', 1),
('Thabo Mizo 1', '2018888', 'TMBVC', 'Private Company', '1996662', '2018-09-02', 'Gauteng', 'Johannesburg', 'gauteng', '7 Naivasha Road, Sunninghill', '115 Chiawelo, Chris Hani Road,1818', '0796278211', 'tmahlori@yahoo.com', '', '10000', 'Construction', '', 20, '10000', 'Yes', 'FNB', '', 'Building ', 1),
('tshiamo', '2016/119332/07', 'QR Air', '(Pty) Limited', '920522325', '2016-02-20', 'Gauteng', 'Tshwane', 'Pretoria', '713 PO Box', '713 Stanza Bopape', '0813975090', 'qraircorp@gmail.com', 'qrair.com', '200000', 'IT Solutions', '', 4, '500000', 'Yes', 'FNB', 'tshiamo.jpg', 'We are testing but we are a software development company from the free state but are located in pretoria south africa.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_members`
--

CREATE TABLE `company_members` (
  `ID` varchar(20) NOT NULL,
  `reg_no` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `other_names` varchar(30) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `postal_address` varchar(100) NOT NULL,
  `residential_address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `race` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `academic_qualifications` varchar(160) NOT NULL,
  `profession` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_members`
--

INSERT INTO `company_members` (`ID`, `reg_no`, `surname`, `other_names`, `telephone`, `email`, `postal_address`, `residential_address`, `gender`, `race`, `DOB`, `academic_qualifications`, `profession`) VALUES
('8080145490087', '2018888', 'Mahlor', 'Thabo', '0119864545', 'tmahlori@yahoo.com', '14555', '115 Chiawelo ', 'Male', 'Black', '1991-12-06', 'Honours', 'Manager'),
('85020267088', '1965/00502/07', 'Ford ', 'mpho ', '0728589151', 'missford1@gmail.com', '75 Moke street \r\nFourways \r\n1786\r\n', '75 Moke street \r\nFourways \r\n1786', 'Female', 'Black', '2020-09-04', 'Honours', 'Transformation Manager '),
('8611195293085', '', 'Mahlori', 'Bongani Jordie', '0110569124', 'bongani@mmfinconsult.co.za', 'Postnet Suite 5 Glenvista ', '11 Pine Valley Eye Of Africa ', 'Male', 'Black', '1986-11-19', 'Honours', 'Accountant '),
('9103225214088', '2016/119332/07', 'Motshabi', 'Tshiamo', '0813975090', 'qraircorp@gmail.com', '713 PO Box', '713 Stanza Bopape', 'Male', 'Black', '1991-03-22', 'Degree', 'Software Developer'),
('929705678907', '2019007', 'Sibanda ', 'Nona', '0114471234', 'nomajay@icloud.com', '345 Sharonlea ', '345 Sharonlea ', 'Female', 'Black', '1992-07-06', 'Degree', 'Sales exec');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `complaint` varchar(20) NOT NULL,
  `complaint_code` varchar(20) NOT NULL,
  `message` varchar(160) NOT NULL,
  `date_submitted` datetime NOT NULL,
  `seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deregistrations`
--

CREATE TABLE `deregistrations` (
  `id` int(11) NOT NULL,
  `i_d` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` text NOT NULL,
  `date_deregistered` datetime NOT NULL,
  `processed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `names` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `race` varchar(30) NOT NULL,
  `postal_address` varchar(60) NOT NULL,
  `residential_address` varchar(60) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `profession` varchar(30) NOT NULL,
  `join_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `surname`, `names`, `email`, `password`, `status`) VALUES
('bongani', 'Mahlori', 'Bongani', 'bongani@mmfinconsult.co.za', '834685d5e100cb8803ab413254e105dd3406c61a', 1),
('jaydee', 'Dice', 'Judicious', 'pule@devfix.co.za', '21bd12dc183f740ee76f27b78eb39c8ad972a757', 1),
('madh', 'Molorane', 'Mothusi', 'molorane.mothusi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('madw', 'Molorane', 'Khahliso', 'kmolorane@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 1),
('mphoford ', 'Ford ', 'mpho ', 'missford1@gmail.com', 'bba42333aeba71020f37191cf8de07236d81a0b7', 1),
('Nomajay', 'Sibanda', 'Noma', 'nomajay@icloud.com', 'f3cacb3aba7a9a451576f6a975101b04c354d137', 1),
('Nomajay@icloud.com', 'Sibanda', 'Noma', 'nomajay@icloud.com', '1905bc4c9537a6a265f123ff1c6d6b81759dcb82', 1),
('Thabo Mizo 1', 'Mahlori', 'Thabo', 'tmahlori@yahoo.com', '402a01f7b4e7d82314e8c2ae30ce48638ebc88c2', 1),
('Thabo Mizo 2', 'Mahlori', 'Thabo ', 'tmahlori@yahoo.com', 'fbd2502cff32597d479ca0e29005a1829b5629e4', 1),
('tshiamo', 'Motshabi', 'Tshiamo', 'qraircorp@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('tsotso', 'Motshab', 'Ditebogo', 'airstor2391@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bbee`
--
ALTER TABLE `bbee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `company_members`
--
ALTER TABLE `company_members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deregistrations`
--
ALTER TABLE `deregistrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deregistrations`
--
ALTER TABLE `deregistrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
