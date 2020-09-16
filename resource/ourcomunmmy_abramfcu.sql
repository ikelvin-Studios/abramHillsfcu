-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 09:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourcomunmmy_abramfcu`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_users_tb`
--

CREATE TABLE `db_users_tb` (
  `dir` int(20) NOT NULL,
  `acc_user` varchar(20) NOT NULL,
  `acc_pass` varchar(50) NOT NULL,
  `acc_name` varchar(60) NOT NULL,
  `acc_type` set('Savings','Military','Credit','Business','Checking') NOT NULL,
  `acc_num` varchar(20) NOT NULL,
  `acc_dob` varchar(20) NOT NULL,
  `acc_balance` varchar(20) NOT NULL,
  `has_invest` set('yes','no') NOT NULL,
  `invest_revenue` varchar(20) NOT NULL,
  `invest_plan` varchar(30) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `reg_date` varchar(20) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `status` set('enabled','disabled','deleted') NOT NULL,
  `acc_pin` int(10) NOT NULL,
  `buyer` varchar(20) NOT NULL,
  `qn1` varchar(100) NOT NULL,
  `qn1_ans` varchar(100) NOT NULL,
  `qn2` varchar(100) NOT NULL,
  `qn2_ans` varchar(100) NOT NULL,
  `last_login` varchar(250) NOT NULL,
  `trans_attempt` text NOT NULL,
  `admin` varchar(30) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_users_tb`
--

INSERT INTO `db_users_tb` (`dir`, `acc_user`, `acc_pass`, `acc_name`, `acc_type`, `acc_num`, `acc_dob`, `acc_balance`, `has_invest`, `invest_revenue`, `invest_plan`, `country`, `state`, `region`, `city`, `reg_date`, `start_date`, `end_date`, `status`, `acc_pin`, `buyer`, `qn1`, `qn1_ans`, `qn2`, `qn2_ans`, `last_login`, `trans_attempt`, `admin`) VALUES
(23, 'angela1414', 'angie1234', 'Angela Uttley', 'Savings', '1455811', '', '9,570,000.00', 'yes', '600,000.00', '401k', 'USA', '', '', '', '2019-11-01', '2019-11-01', '', 'deleted', 821795, '', 'High School friend', 'Anastasia', 'First car', 'Ford', '', '', 'admin'),
(24, 'Samantha22', 'Mac5050', 'Samantha Michaels', 'Savings', '672281', '', '9,389,211.00', 'yes', '720,276.00', '401K', 'USA', '', '', '', '', '2019-11-09', '', 'enabled', 413226, '', 'High School Friend?', 'Anastasia', 'First Car', 'Ford', '', '', 'admin'),
(25, 'micky6060', 'Tilden2010', 'Michael Tilden', 'Savings', '5909923', '', '8,049,229.00', 'yes', '230,003.00', '401K', 'USA', '', '', '', '2019-11-12', '2019-11-12', '', 'deleted', 605023, '', 'High School Friend ', 'William', 'First Car', 'Ford', '', '', 'admin'),
(26, 'marymat2020', 'Blessed1989', 'Mary Perez', 'Savings', '26706378', '', '3,100,107.00', 'yes', '210,889.00', '401k', 'USA', 'New York', '', '', '', '2019-11-18', '2019-11-17', 'deleted', 572892, '', 'First Car', 'Ford', 'High School Friend', 'Janet', '', '', 'admin'),
(27, 'bella1980', 'Blessed2020', 'Patience Isabella', 'Savings', '20307887', '', '3,056,708.00', 'yes', '200,000.00', '401k', 'USA', 'Oklahoma', '', '', '2019-12-02', '2019-12-02', '', 'disabled', 302619, '', 'First Car', 'Ford', 'High School Friend', 'Janet', '', '', 'admin'),
(28, 'Donna2010', 'Mcl5050', 'Donna McLaughlin', 'Savings', '5507331', '', '4,559,900', 'yes', '79,900', '401k', 'USA', '', '', '', '2019-12-25', '2019-12-25', '', 'deleted', 786681, '', 'Best friend name', 'Anastasia', 'First car', 'Ford', '', '', 'admin'),
(29, 'eemty8091', 'myeverything2992', 'Emily Lyons', 'Business', '90092785347626', '', '11,550,786.00', 'yes', '1,070.00', 'Investment', '', '', '', '', '', '2020-04-15', '', 'enabled', 403746, '', 'What is the name of your best friend in high school', 'Linda', 'What is the name of your favorite pet', 'Lori', '', '', 'admin'),
(30, 'abh203952', 'g746xq1', 'Susan K Heidlebaugh', 'Savings', '9016347213', '', '1,995.00', 'yes', '6,000,000.00', 'Bank Of America Investment', '', '', '', '', '', '2020-05-29', '', 'enabled', 463914, '', 'What is the first name of your best friend in high school', 'Sandy', 'What is your favorite color', 'Orange', '', '', 'admin'),
(31, 'marina123', 'Lovedad5050', 'Marina Warren', 'Savings', '5567899', '', '2,890,099.00', 'yes', '401k', '200,000.00', '', '', '', '', '', '2020-07-15', '2020-07-15', 'enabled', 261949, '', 'Your best friend name', 'Anastasia', 'Fathers middle name', 'Allen', '', '', 'admin'),
(32, 'Vera1985', 'Blessed2020', 'Vera Tennyson', 'Savings', '072978020201', '', '4,800,281.00', 'yes', '1,00.90', 'Investments ', 'United States Of Ame', 'Wyoming', '', '', '', '2020-07-24', '2020-07-21', 'enabled', 669977, 'Unilever Company Ltd', 'Name of first car', 'Corolla', 'Name of Childhood friend', 'Sandy', '', '', 'admin'),
(33, 'randy73', 'construction@77', 'Randy Fischer', 'Business', '1007686026', '', '900,789.00', 'yes', '2,508,000.00', 'Investment Plan', '', '', '', '', '2020-08-06', '2020-08-06', '', 'enabled', 336264, '', 'What is your best friend name in high school', 'Michael', 'What is the name of your first car', 'Ford', '', '', 'admin'),
(34, 'kapo01', 'pass2go#', 'Kapo Banks', 'Savings', '', '', '$23,445.00', 'yes', '$3,641,030.67', '401K', '', '', '', '', '2020-09-16', '2020-09-16', '2020-09-16', 'enabled', 986873, '', 'What', 'this', 'Who', 'me', '', '', 'admin'),
(35, 'Client', 'passtonight', 'Some Name', 'Savings', '3245367485', '', '$44,536.00', 'yes', '$2,356,746.51', '401k', '', '', '', '', '2020-09-16', '2020-09-16', '', 'enabled', 985669, '', 'what', 'this', 'who', 'me', '', '', 'faith');

-- --------------------------------------------------------

--
-- Table structure for table `site_tb`
--

CREATE TABLE `site_tb` (
  `dir` int(5) NOT NULL,
  `auth` set('yes','no') NOT NULL,
  `admin` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `routing_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_tb`
--

INSERT INTO `site_tb` (`dir`, `auth`, `admin`, `pass`, `routing_no`) VALUES
(1, 'yes', 'admin', 'pass1234', 680392),
(2, 'yes', 'faith', 'pass4321', 680392);

-- --------------------------------------------------------

--
-- Table structure for table `transact_tb`
--

CREATE TABLE `transact_tb` (
  `dir` int(10) NOT NULL,
  `acc_dir` int(10) NOT NULL,
  `process_method` set('credit','debit') NOT NULL,
  `pay_type` set('deposit','withdrawal','transfer') NOT NULL,
  `value` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` set('enabled','disabled','deleted') NOT NULL,
  `trans_status` set('done','pending','processing','failed','declined','processed') NOT NULL DEFAULT 'processed',
  `bankname` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `balance` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transact_tb`
--

INSERT INTO `transact_tb` (`dir`, `acc_dir`, `process_method`, `pay_type`, `value`, `date`, `time`, `status`, `trans_status`, `bankname`, `description`, `balance`) VALUES
(1, 23, '', 'withdrawal', '324,324,424.00', '2019-11-20', '2019-11-04 04:07', 'deleted', 'processed', 'Try', 'Payment For Nothing', ''),
(2, 23, '', 'deposit', '12000', '2019-11-04', '2019-11-04 04:14', 'deleted', 'pending', '', 'Transaction made to Account Name: Joe Menis, Account Number: 43254676475277697 [Routing Number: 475986]', ''),
(3, 28, '', 'deposit', '50000.00', '2019-12-25', '2019-12-25 09:12', 'deleted', 'processed', '', 'Transaction made to Account Name: Michael Beeman, Account Number: 518123036 [Routing Number: 322271627]', ''),
(4, 28, '', 'deposit', '11740', '2019-12-30', '2019-12-30 01:09', 'enabled', 'pending', '', 'Transaction made to Account Name: StefanRyznyk, Account Number: 8261881 [Routing Number: 00662]', ''),
(5, 28, '', 'deposit', '', '2020-01-22', '2020-01-22 10:15', 'enabled', 'pending', '', 'Transaction made to Account Name: , Account Number:  [Routing Number: ]', ''),
(6, 28, '', 'deposit', '50000.00', '2020-01-26', '2020-01-26 12:54', 'enabled', 'pending', '', 'Transaction made to Account Name: michaelbeeman, Account Number: 518123036 [Routing Number: 322271627]', ''),
(7, 28, '', 'deposit', '', '2020-01-26', '2020-01-26 12:56', 'enabled', 'pending', '', 'Transaction made to Account Name: , Account Number:  [Routing Number: ]', ''),
(8, 29, '', 'deposit', '200', '2020-04-15', '2020-04-15 05:20', 'deleted', 'pending', '', 'Transaction made to Account Name: Yaw Kee, Account Number: 9886655 [Routing Number: 900098776]', ''),
(9, 29, '', 'deposit', '11,550,000.00', '2020-04-15', '2020-04-15 09:07', 'enabled', 'processed', 'HSBC Bank of Canada', 'International Business', ''),
(10, 29, '', 'deposit', '52500', '2020-04-17', '2020-04-17 05:03', 'enabled', 'declined', '', 'Transaction made to Account Name: Wanda Bennett, Account Number: 305008383783 [Routing Number: 026009593]', ''),
(11, 29, '', 'deposit', '52500', '2020-05-12', '2020-05-12 09:17', 'enabled', 'pending', '', 'Transaction made to Account Name: Wanda Bennett, Account Number: 305008383783 [Routing Number: 026009593]', ''),
(12, 30, '', 'deposit', '1,900.00', '2020-06-16', '2020-06-16 02:48', 'enabled', 'processed', '', 'Deposited', ''),
(13, 32, '', 'deposit', '40000', '2020-08-01', '2020-08-01 09:02', 'enabled', 'pending', '', 'Transaction made to Account Name: johnny bowman, Account Number: 021000021 [Routing Number: 68130433]', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_users_tb`
--
ALTER TABLE `db_users_tb`
  ADD PRIMARY KEY (`dir`);

--
-- Indexes for table `site_tb`
--
ALTER TABLE `site_tb`
  ADD PRIMARY KEY (`dir`);

--
-- Indexes for table `transact_tb`
--
ALTER TABLE `transact_tb`
  ADD PRIMARY KEY (`dir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_users_tb`
--
ALTER TABLE `db_users_tb`
  MODIFY `dir` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `site_tb`
--
ALTER TABLE `site_tb`
  MODIFY `dir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transact_tb`
--
ALTER TABLE `transact_tb`
  MODIFY `dir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
