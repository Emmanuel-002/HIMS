-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 05:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `his_code_camp_bd`
--
CREATE DATABASE IF NOT EXISTS `his_code_camp_bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `his_code_camp_bd`;

-- --------------------------------------------------------

--
-- Table structure for table `his_accounts`
--

CREATE TABLE `his_accounts` (
  `acc_id` int(11) NOT NULL,
  `acc_name` varchar(200) DEFAULT NULL,
  `acc_desc` text DEFAULT NULL,
  `acc_type` varchar(200) DEFAULT NULL,
  `acc_number` varchar(200) DEFAULT NULL,
  `acc_amount` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_accounts`
--

INSERT INTO `his_accounts` (`acc_id`, `acc_name`, `acc_desc`, `acc_type`, `acc_number`, `acc_amount`) VALUES
(1, 'Individual Retirement Account', '<p>IRA&rsquo;s are simply an account where you stash your money for retirement. The concept is pretty simple, your account balance is not taxed UNTIL you withdraw, at which point you pay the taxes there. This allows you to grow your account with interest without taxes taking away from the balance. The net result is you earn more money.</p>', 'Payable Account', '518703294', '25000'),
(2, 'Equity Bank', '<p>Find <em>bank account</em> stock <em>images</em> in HD and millions of other royalty-free stock photos, illustrations and vectors in the Shutterstock collection. Thousands of new</p>', 'Receivable Account', '753680912', '12566'),
(3, 'Test Account Name', '<p>This is a demo test</p>', 'Payable Account', '620157843', '1100');

-- --------------------------------------------------------

--
-- Table structure for table `his_admin`
--

CREATE TABLE `his_admin` (
  `ad_id` int(11) NOT NULL,
  `ad_fname` varchar(200) DEFAULT NULL,
  `ad_lname` varchar(200) DEFAULT NULL,
  `ad_email` varchar(200) DEFAULT NULL,
  `ad_pwd` varchar(200) DEFAULT NULL,
  `ad_dpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_admin`
--

INSERT INTO `his_admin` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`) VALUES
(1, 'CodeCampBD', 'Administrator', 'admin@ccbd.com', '4c7f5919e957f354d57243d37f223cf31e9e7181', 'doc-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `his_admission_history`
--

CREATE TABLE `his_admission_history` (
  `admission_number` varchar(10) NOT NULL,
  `pat_regnumber` varchar(10) NOT NULL,
  `pat_fullname` varchar(50) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `pat_height` float NOT NULL,
  `pat_weight` float NOT NULL,
  `pat_bmi` varchar(10) NOT NULL,
  `pulse_rate` float NOT NULL,
  `pat_bp` float NOT NULL,
  `pat_temp` float NOT NULL,
  `sp02` float NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `bed_number` varchar(10) NOT NULL,
  `doc_number` varchar(10) NOT NULL,
  `date_admitted` datetime NOT NULL,
  `date_discharged` datetime NOT NULL,
  `date_transfered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_admission_history`
--

INSERT INTO `his_admission_history` (`admission_number`, `pat_regnumber`, `pat_fullname`, `diagnosis`, `pat_height`, `pat_weight`, `pat_bmi`, `pulse_rate`, `pat_bp`, `pat_temp`, `sp02`, `room_number`, `bed_number`, `doc_number`, `date_admitted`, `date_discharged`, `date_transfered`) VALUES
('MVGNI1F', '9SKOB', '', 'Malaria Fever', 0, 0, '', 0, 0, 0, 0, '1', '2', 'ccbd', '2023-04-19 00:00:00', '2023-04-20 00:00:00', '0000-00-00 00:00:00'),
('GLE0675', '9SKOB', '', 'A01', 0, 0, '', 0, 0, 0, 0, '3', '3', 'ccbd', '2023-04-20 03:04:31', '2023-04-20 03:04:59', '0000-00-00 00:00:00'),
('FV7H3OJ', '9SKOB', '', 'A01', 0, 0, '', 0, 0, 0, 0, '3', '2', 'ccbd', '2023-04-20 03:04:38', '2023-04-20 03:04:04', '0000-00-00 00:00:00'),
('PL6WZ1Y', '9SKOB', '', 'A01', 0, 0, '', 0, 0, 0, 0, '3', '3', 'ccbd', '2023-04-20 04:00:25', '2023-04-20 04:00:41', '0000-00-00 00:00:00'),
('QAT01G4', '9SKOB', '', 'A01', 0, 0, '', 0, 0, 0, 0, '1', '2', 'ccbd', '2023-04-20 04:07:58', '2023-04-20 04:08:04', '0000-00-00 00:00:00'),
('3V8OYSM', '9SKOB', '', 'A01', 0, 0, '', 0, 0, 0, 0, '3', '2', 'ccbd', '2023-04-20 04:09:29', '2023-04-20 04:09:34', '0000-00-00 00:00:00'),
('PWUE5AI', '9SKOB', '', 'A02', 0, 0, '', 0, 0, 0, 0, '3', '6', 'ccbd', '2023-04-20 04:11:00', '2023-04-20 04:11:04', '0000-00-00 00:00:00'),
('R3ZAM27', '9SKOB', '', 'A01', 0, 0, '', 0, 0, 0, 0, '3', '2', 'ccbd', '2023-04-20 04:12:55', '2023-04-20 04:12:59', '0000-00-00 00:00:00'),
('B5LEZWG', '9SKOB', '', 'A02', 0, 0, '', 0, 0, 0, 0, '3', '2', 'ccbd', '2023-04-20 04:15:31', '2023-04-20 04:15:48', '0000-00-00 00:00:00'),
('4DSM280', '9SKOB', '', 'A01', 0, 0, '', 0, 0, 0, 0, '3', '2', 'ccbd', '2023-04-20 04:21:31', '2023-04-20 04:21:48', '0000-00-00 00:00:00'),
('A13KJUR', '9SKOB', '', 'A01', 0, 0, '', 0, 0, 0, 0, '3', '2', 'ccbd', '2023-04-20 04:22:30', '2023-04-20 04:22:35', '0000-00-00 00:00:00'),
('ITU4AL1', '9SKOB', '', 'A01', 0, 0, '', 0, 0, 0, 0, '3', '2', 'ccbd', '2023-04-20 04:26:35', '2023-04-20 04:26:41', '0000-00-00 00:00:00'),
('LKAI3N8', '9SKOB', '', 'A01', 0, 0, '', 0, 0, 0, 0, '3', '7', 'ccbd', '2023-04-20 05:06:29', '0000-00-00 00:00:00', '2023-04-20 07:35:27'),
('5Y0F4RE', 'HVPI7', '', 'Diarrhea', 0, 0, '', 0, 0, 0, 0, '3', '5', 'ccbd', '2023-04-21 11:05:48', '2023-04-21 11:47:28', '0000-00-00 00:00:00'),
('5Y0F4RE', 'HVPI7', '', 'Diarrhea', 0, 0, '', 0, 0, 0, 0, '3', '5', 'ccbd', '2023-04-21 11:07:08', '2023-04-21 11:47:28', '0000-00-00 00:00:00'),
('718XNGP', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 0, 0, '', 0, 0, 0, 0, '3', '7', 'ccbd', '2023-04-27 01:42:54', '2023-04-27 02:01:24', '0000-00-00 00:00:00'),
('PD6VWY7', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 0, 0, '', 0, 0, 0, 0, '', '', 'ccbd', '2023-04-27 01:56:44', '2023-04-27 02:01:29', '0000-00-00 00:00:00'),
('PD6VWY7', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 0, 0, '', 0, 0, 0, 0, '', '', 'ccbd', '2023-04-27 02:00:59', '2023-04-27 02:01:29', '0000-00-00 00:00:00'),
('E5MRLP1', '9SKOB', 'Emmanuel Oluwasegun Araoye', '', 0, 0, '', 0, 0, 0, 0, '', '', 'ccbd', '2023-04-27 02:01:54', '2023-04-27 02:02:17', '0000-00-00 00:00:00'),
('RIBZPLD', '9SKOB', 'Emmanuel Oluwasegun Araoye', '', 0, 0, '', 0, 0, 0, 0, '', '', 'ccbd', '2023-04-27 02:01:59', '2023-04-27 02:02:21', '0000-00-00 00:00:00'),
('3HAYQEZ', '9SKOB', 'Emmanuel Oluwasegun Araoye', '', 0, 0, '', 0, 0, 0, 0, '', '', 'ccbd', '2023-04-27 02:02:08', '2023-04-27 02:02:25', '0000-00-00 00:00:00'),
('MQS1EWI', '9SKOB', 'Emmanuel Oluwasegun Araoye', '', 0, 0, '', 0, 0, 0, 0, '', '', 'ccbd', '2023-04-27 02:03:16', '0000-00-00 00:00:00', '2023-04-27 09:59:15'),
('8A6V9TW', 'HVPI7', 'Uche Anthony Nwogonuwe', 'Headache', 1.76, 65, '20.98', 25, 120, 36, 40, '3', '4', 'ccbd', '2023-04-27 10:03:24', '2023-04-28 03:17:55', '0000-00-00 00:00:00'),
('IZC6W0B', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 1.78, 65, '20.5', 20, 100, 36, 23, '3', '7', 'ccbd', '2023-04-28 08:21:25', '2023-04-28 08:24:45', '0000-00-00 00:00:00'),
('06FQPUC', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 1.78, 65, '20.5', 20, 100, 35, 23, '3', '6', 'ccbd', '2023-04-28 08:26:03', '2023-04-28 08:26:14', '0000-00-00 00:00:00'),
('E70CMG2', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 1.78, 65, '20.5', 20, 100, 35.5, 23, '3', '4', 'ccbd', '2023-04-28 08:29:28', '2023-04-28 10:05:00', '0000-00-00 00:00:00'),
('AELTGYH', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 1.78, 65, '20.5', 20, 100, 36.6, 23, '3', '7', 'ccbd', '2023-04-28 10:06:09', '2023-04-28 10:13:59', '0000-00-00 00:00:00'),
('DAK4Z07', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 1.78, 65, '20.5', 20, 100, 36, 23, '3', '6', 'ccbd', '2023-04-28 10:22:27', '2023-04-28 10:22:37', '0000-00-00 00:00:00'),
('WFTNIY7', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Headache', 1.78, 65, '20.5', 20, 100, 35, 23, '3', '4', 'ccbd', '2023-04-28 10:25:04', '2023-04-28 10:25:22', '0000-00-00 00:00:00'),
('Z6DMU7L', 'HVPI7', 'Uche Anthony Nwogonuwe', 'Diarrhea', 1.73, 70, '25.02', 12, 100, 35.5, 23, '3', '1', 'ccbd', '2023-04-28 10:35:50', '2023-04-28 10:36:01', '0000-00-00 00:00:00'),
('ACHIB8Q', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 1.78, 65, '20.5', 20, 120, 36.06, 23, '3', '3', 'ccbd', '2023-04-28 11:33:49', '2023-04-28 11:34:01', '0000-00-00 00:00:00'),
('Y38GVUO', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 1.78, 65, '20.5', 12, 100, 36.6, 23, '3', '7', 'ccbd', '2023-04-29 12:08:57', '2023-04-29 12:09:10', '0000-00-00 00:00:00'),
('6O3RG4X', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 1.78, 65, '0.00', 20, 100, 36, 23, '3', '6', 'ccbd', '2023-04-29 06:18:58', '2023-04-29 07:17:36', '0000-00-00 00:00:00'),
('QP602YL', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 1.78, 65, '0.00', 20, 100, 35, 23, '3', '4', 'ccbd', '2023-04-29 07:18:24', '2023-04-29 07:20:21', '0000-00-00 00:00:00'),
('36PZEDJ', '9SKOB', 'Emmanuel Oluwasegun Araoye', 'Diarrhea', 1.78, 65, '0.00', 20, 100, 35.5, 23, '3', '1', 'ccbd', '2023-04-29 07:23:00', '2023-04-29 07:23:10', '0000-00-00 00:00:00'),
('0DGJBYE', 'HVPI7', 'Uche Anthony Nwogonuwe', 'Diarrhea', 1.73, 70, '0.00', 20, 100, 36.06, 23, '3', '7', 'ccbd', '2023-04-29 07:23:52', '2023-04-29 07:27:58', '0000-00-00 00:00:00'),
('08IJZPC', '9SKOB', 'Emmanuel Oluwasegun Araoye', '', 1.78, 65, '0.00', 0, 0, 0, 0, '', '', 'ccbd', '2023-04-30 02:51:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `his_assets`
--

CREATE TABLE `his_assets` (
  `asst_id` int(11) NOT NULL,
  `asst_name` varchar(200) DEFAULT NULL,
  `asst_desc` longtext DEFAULT NULL,
  `asst_vendor` varchar(200) DEFAULT NULL,
  `asst_status` varchar(200) DEFAULT NULL,
  `asst_dept` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_diagnosis_record`
--

CREATE TABLE `his_diagnosis_record` (
  `diagnosis_number` varchar(10) NOT NULL,
  `pat_regnumber` varchar(10) NOT NULL,
  `pat_fullname` varchar(100) NOT NULL,
  `pat_age` int(11) NOT NULL,
  `pat_gender` varchar(20) NOT NULL,
  `dependency` varchar(20) NOT NULL,
  `pat_bp` varchar(10) NOT NULL,
  `pat_height` float NOT NULL,
  `pat_weight` float NOT NULL,
  `pat_bmi` float NOT NULL,
  `pat_temp` float NOT NULL,
  `presenting_complain` varchar(200) NOT NULL,
  `examination` varchar(200) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `management` varchar(200) NOT NULL,
  `doc_number` varchar(20) NOT NULL,
  `date_rec` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_diagnosis_record`
--

INSERT INTO `his_diagnosis_record` (`diagnosis_number`, `pat_regnumber`, `pat_fullname`, `pat_age`, `pat_gender`, `dependency`, `pat_bp`, `pat_height`, `pat_weight`, `pat_bmi`, `pat_temp`, `presenting_complain`, `examination`, `diagnosis`, `management`, `doc_number`, `date_rec`) VALUES
('Z9BDTV', '9SKOB', '', 0, '', '', '100/70', 1.78, 65, 20.52, 36.6, 'Headache', 'High temperature', 'Fever', 'Paracetamol and resting', 'ccbd', '2023-04-19'),
('8KDCZ9', 'HVPI7', '', 0, '', '', '100/80', 1.73, 70, 20.52, 36.06, 'Purging', 'Dehydrated', 'Diarrhea', 'Admit patient, iV fluid, normal saline.', 'ccbd', '2023-04-21'),
('ZL3GH0', 'HVPI7', 'Uche Anthony Nwogonuwe', 0, '', '', '100/80', 1.73, 70, 23.39, 36.06, 'Headache', 'High Temperature', 'Fever', 'Rest', 'ccbd', '2023-04-28'),
('IH849P', '9SKOB', 'Emmanuel Oluwasegun Araoye', 34, 'Male', '', '110/80', 1.78, 68, 21.46, 36.6, 'Headache', 'Dehydrated', 'D10', 'M12', 'ccbd', '2023-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `his_docs`
--

CREATE TABLE `his_docs` (
  `doc_id` int(11) NOT NULL,
  `doc_fname` varchar(200) DEFAULT NULL,
  `doc_lname` varchar(200) DEFAULT NULL,
  `doc_email` varchar(200) DEFAULT NULL,
  `doc_pwd` varchar(200) DEFAULT NULL,
  `doc_dept` varchar(200) DEFAULT NULL,
  `doc_number` varchar(200) DEFAULT NULL,
  `doc_dpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_docs`
--

INSERT INTO `his_docs` (`doc_id`, `doc_fname`, `doc_lname`, `doc_email`, `doc_pwd`, `doc_dept`, `doc_number`, `doc_dpic`) VALUES
(5, 'Aletha', 'White', 'aletha@mail.com', 'password2023#', 'Laboratory', 'BKTWQ', 'defaultimg.jpg'),
(6, 'Emmanuel', 'Araoye', 'emmanuel.araoye@airforce.mil.ng', 'password2023#', 'Surgery | Theatre', 'ccbd', '03.webp'),
(12, 'Jessica', 'Spencer', 'jessica@mail.com', 'password2023#', 'Accounting', '5VIFT', 'usric.png');

-- --------------------------------------------------------

--
-- Table structure for table `his_equipments`
--

CREATE TABLE `his_equipments` (
  `eqp_id` int(11) NOT NULL,
  `eqp_code` varchar(200) DEFAULT NULL,
  `eqp_name` varchar(200) DEFAULT NULL,
  `eqp_vendor` varchar(200) DEFAULT NULL,
  `eqp_desc` longtext DEFAULT NULL,
  `eqp_dept` varchar(200) DEFAULT NULL,
  `eqp_status` varchar(200) DEFAULT NULL,
  `eqp_qty` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_equipments`
--

INSERT INTO `his_equipments` (`eqp_id`, `eqp_code`, `eqp_name`, `eqp_vendor`, `eqp_desc`, `eqp_dept`, `eqp_status`, `eqp_qty`) VALUES
(2, '178640239', 'TestTubes', 'Casio', '<p>Testtubes are used to perform lab tests--</p>', 'Laboratory', 'Functioning', '700000'),
(3, '052367981', 'Surgical Robot', 'Nexus', '<p>Surgical Robots aid in surgey process.</p>', 'Surgical | Theatre', 'Functioning', '100');

-- --------------------------------------------------------

--
-- Table structure for table `his_laboratory`
--

CREATE TABLE `his_laboratory` (
  `lab_id` int(11) NOT NULL,
  `lab_pat_name` varchar(200) DEFAULT NULL,
  `lab_pat_ailment` varchar(200) DEFAULT NULL,
  `lab_pat_number` varchar(200) DEFAULT NULL,
  `lab_pat_tests` longtext DEFAULT NULL,
  `lab_pat_results` longtext DEFAULT NULL,
  `lab_number` varchar(200) DEFAULT NULL,
  `lab_date_rec` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_laboratory`
--

INSERT INTO `his_laboratory` (`lab_id`, `lab_pat_name`, `lab_pat_ailment`, `lab_pat_number`, `lab_pat_tests`, `lab_pat_results`, `lab_number`, `lab_date_rec`) VALUES
(1, 'Lorem Ipsum ', 'Flu', '7EW0L', '<ul><li><a href=\"https://www.medicalnewstoday.com/articles/179211.php\">Non-steroidal anti-inflammatory drugs</a> (NSAIDs) such as <a href=\"https://www.medicalnewstoday.com/articles/161255.php\">aspirin</a> or ibuprofen can help bring a fever down. These are available to purchase over-the-counter or <a target=\"_blank\" href=\"https://amzn.to/2qp3d0b\">online</a>. However, a mild fever may be helping combat the bacterium or virus that is causing the infection. It may not be ideal to bring it down.</li><li>If the fever has been caused by a bacterial infection, the doctor may prescribe an <a href=\"https://www.medicalnewstoday.com/articles/10278.php\">antibiotic</a>.</li><li>If a fever has been caused by a cold, which is caused by a viral infection, NSAIDs may be used to relieve uncomfortable symptoms. Antibiotics have no effect against viruses and will not be prescribed by your doctor for a viral infection.</li></ul>', '<ul><li>If the fever has been caused by a bacterial infection, the doctor may prescribe an <a href=\"https://www.medicalnewstoday.com/articles/10278.php\">antibiotic</a>.</li><li>If a fever has been caused by a cold, which is caused by a viral infection, NSAIDs may be used to relieve uncomfortable symptoms. Antibiotics have no effect against viruses and will not be prescribed by your doctor for a viral infection.</li></ul>', 'K67PL', '2020-01-12 13:32:07'),
(2, 'Mart Developers', 'Fever', '6P8HJ', '<ul><li>Body temperature</li><li>Blood</li><li>Stool</li><li>Urine</li></ul>', '<ul><li>Body Temperature 67 Degree Celcious(Abnormal)</li><li>Blood - Malaria Bacterial Tested Postive</li><li>Stool - Mucus tested postive</li><li>Urine -Urea Level were 20% higher than normal</li></ul><p><strong>Fever Tested Positive</strong></p>', '9DMN5', '2020-01-12 13:41:07'),
(3, 'John Doe', 'Malaria', 'RAV6C', '<p><strong>Pain areas: </strong>in the abdomen or muscles</p><p><strong>Whole body: </strong>chills, fatigue, fever, night sweats, shivering, or sweating</p><p><strong>Gastrointestinal: </strong>diarrhoea, nausea, or vomiting</p><p><strong>Also common: </strong>fast heart rate, headache, mental confusion, or pallor</p>', '<p><strong>Pain areas: </strong>in the abdomen or muscles -Tested Positive</p><p><strong>Whole body: </strong>chills, fatigue, fever, night sweats, shivering, or sweating - Tested Positive</p><p><strong>Gastrointestinal: </strong>diarrhoea, nausea, or vomiting - Tested Positive</p><p>&nbsp;</p>', '90ZNX', '2020-01-13 12:31:48'),
(4, 'Cynthia Connolly', 'Demo Test', '3Z14K', '<p>demo demo demo demo</p>', '<p>54545</p>', 'G0VZU', '2022-10-20 17:48:05'),
(5, 'Christine Moore', 'Demo Test', '4TLG0', '<ol><li>Test One</li><li>Test Two</li><li>Test Three</li><li>Test Four</li><li>Test Five</li></ol>', '<ol><li>Result One</li><li>Result Two</li><li>Result Three</li></ol>', 'RA4UM', '2022-10-22 11:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `his_medical_records`
--

CREATE TABLE `his_medical_records` (
  `mdr_id` int(11) NOT NULL,
  `mdr_number` varchar(200) DEFAULT NULL,
  `mdr_pat_name` varchar(200) DEFAULT NULL,
  `mdr_pat_adr` varchar(200) DEFAULT NULL,
  `mdr_pat_age` varchar(200) DEFAULT NULL,
  `mdr_pat_ailment` varchar(200) DEFAULT NULL,
  `mdr_pat_number` varchar(200) DEFAULT NULL,
  `mdr_pat_prescr` longtext DEFAULT NULL,
  `mdr_date_rec` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_medical_records`
--

INSERT INTO `his_medical_records` (`mdr_id`, `mdr_number`, `mdr_pat_name`, `mdr_pat_adr`, `mdr_pat_age`, `mdr_pat_ailment`, `mdr_pat_number`, `mdr_pat_prescr`, `mdr_date_rec`) VALUES
(1, 'ZNXI4', 'John Doe', '12 900 Los Angeles', '35', 'Malaria', 'RAV6C', '<ul><li>Combination of atovaquone and proguanil (Malarone)</li><li>Quinine sulfate (Qualaquin) with doxycycline (Vibramycin, Monodox, others)</li><li>Mefloquine.</li><li>Primaquine phosphate.</li></ul>', '2020-01-11 15:03:05.9839'),
(2, 'MIA9P', 'Cynthia Connolly', '9 Hill Haven Drive', '22', 'Demo Test', '3Z14K', NULL, '2022-10-18 17:07:46.7306'),
(3, 'F1ZHQ', 'Michael White', '60 Radford Street', '30', 'Demo Test', 'DCRI8', NULL, '2022-10-18 17:08:35.7938'),
(4, 'ZLN0Q', 'Lawrence Bischof', '82 Bryan Street', '32', 'Demo Test', 'ISL1E', '<ol><li>sample</li><li>sampl</li><li>sample</li><li>sample</li></ol>', '2022-10-20 17:22:15.7034'),
(5, 'JKIGQ', 'Michael White', '60 Radford Street', '30', 'Demo Test', 'DCRI8', NULL, '2023-04-16 18:38:47.8982');

-- --------------------------------------------------------

--
-- Table structure for table `his_patient_transfers`
--

CREATE TABLE `his_patient_transfers` (
  `ref_number` varchar(20) NOT NULL,
  `pat_regnumber` varchar(10) NOT NULL,
  `pat_fullname` varchar(50) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `facility` varchar(50) NOT NULL,
  `doc_number` varchar(10) NOT NULL,
  `ref_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_patient_transfers`
--

INSERT INTO `his_patient_transfers` (`ref_number`, `pat_regnumber`, `pat_fullname`, `diagnosis`, `facility`, `doc_number`, `ref_date`) VALUES
('', '9SKOB', 'Fg Offr Emmanuel Oluwasegun Araoye', '', '', 'ccbd', '2023-04-27 09:59:15'),
('REF011', '9SKOB', 'Fg Offr Emmanuel Oluwasegun Araoye', 'A01', '661 NAFH', 'ccbd', '2023-04-20 07:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `his_pat_admission`
--

CREATE TABLE `his_pat_admission` (
  `admission_number` varchar(10) NOT NULL,
  `pat_regnumber` varchar(10) NOT NULL,
  `pat_fullname` varchar(50) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `pat_height` float NOT NULL,
  `pat_weight` float NOT NULL,
  `pat_bmi` float NOT NULL,
  `pulse_rate` float NOT NULL,
  `pat_bp` varchar(10) NOT NULL,
  `pat_temp` float NOT NULL,
  `sp02` float NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `bed_number` varchar(10) NOT NULL,
  `doc_number` varchar(10) NOT NULL,
  `date_admitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_pat_admission`
--

INSERT INTO `his_pat_admission` (`admission_number`, `pat_regnumber`, `pat_fullname`, `diagnosis`, `pat_height`, `pat_weight`, `pat_bmi`, `pulse_rate`, `pat_bp`, `pat_temp`, `sp02`, `room_number`, `bed_number`, `doc_number`, `date_admitted`) VALUES
('08IJZPC', '9SKOB', 'Emmanuel Oluwasegun Araoye', '', 1.78, 65, 0, 0, '', 0, 0, '', '', 'ccbd', '2023-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `his_pat_data`
--

CREATE TABLE `his_pat_data` (
  `pat_regnumber` varchar(50) NOT NULL,
  `pat_title` varchar(20) NOT NULL,
  `pat_number` varchar(20) NOT NULL,
  `dependency` varchar(20) NOT NULL,
  `pat_fname` varchar(20) NOT NULL,
  `pat_mname` varchar(20) NOT NULL,
  `pat_lname` varchar(20) NOT NULL,
  `pat_dob` date NOT NULL,
  `pat_gender` varchar(10) NOT NULL,
  `pat_status` varchar(20) NOT NULL,
  `pat_religion` varchar(20) NOT NULL,
  `pat_trade` varchar(50) NOT NULL,
  `pat_phone` text NOT NULL,
  `pat_email` varchar(50) NOT NULL,
  `pat_address` varchar(100) NOT NULL,
  `pat_unit` varchar(50) NOT NULL,
  `pat_weight` float NOT NULL,
  `pat_height` float NOT NULL,
  `pat_bmi` float NOT NULL,
  `nok_fullname` varchar(50) NOT NULL,
  `nok_phone` text NOT NULL,
  `nok_address` varchar(100) NOT NULL,
  `date_enrolled` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_pat_data`
--

INSERT INTO `his_pat_data` (`pat_regnumber`, `pat_title`, `pat_number`, `dependency`, `pat_fname`, `pat_mname`, `pat_lname`, `pat_dob`, `pat_gender`, `pat_status`, `pat_religion`, `pat_trade`, `pat_phone`, `pat_email`, `pat_address`, `pat_unit`, `pat_weight`, `pat_height`, `pat_bmi`, `nok_fullname`, `nok_phone`, `nok_address`, `date_enrolled`) VALUES
('9SKOB', 'Fg Offr', 'NAF/4661', '', 'Emmanuel', 'Oluwasegun', 'Araoye', '1989-09-21', 'Male', 'Married', 'Christianity', 'IT', '08058983817', 'emmanuel.araoye@airforce.mil.ng', 'Block C R5, Offrs\' Transit Qtrs 041 CD Shasha.', '041 CD', 65, 1.78, 20.5, 'Mr Femi Araoye', '08012345678', 'NAF Base, Ibadan', '2023-04-17 00:00:00'),
('HVPI7', 'Fg Offr', 'NAF/4732', '', 'Uche', 'Anthony', 'Nwogonuwe', '1990-08-22', 'Male', 'Married', 'Christianity', 'Medical', '08101234567', 'uantony@yahoo.com', 'R5 Block D Offrs\' Transit Qts, NAF Base Shasha', '041 CD', 70, 1.73, 25.02, 'Nonso Junior', '08012345678', 'R5 Block D Offrs\' Transit Qts, NAF Base Shasha', '2023-04-19 00:00:00'),
('YRWUX', 'Fg Offr', 'NAF/4561', '', 'Adedayo', '', 'Olatoye', '1990-04-07', 'Male', 'Married', 'Christianity', 'Education', '08111111111', 'olatoye@gmail.com', 'NAF Base Shasha', 'AFCS', 85, 1.76, 25.05, 'Olatoye Testimony', '07012345678', 'NAF Base Shasha', '2023-04-21 10:29:07'),
('D5R86', 'Fg Offr', 'NAF/2222', 'Dependant', 'Uche', 'Anthony', 'Nwogwonuwe', '2005-02-23', 'Female', 'Single', 'Islam', 'Info', '08111111111', 'godfrey@yahoo.com', 'NAF Base, Kaduna', 'AFWC', 85, 1.76, 25.05, 'Godfrey Junior', '08012345678', 'NAF Base, PH', '2023-04-21 11:16:40'),
('7QYAB', 'Fg Offr', 'NAF/2222', 'Self', 'Uche', 'Anthony', 'Nwogwonuwe', '1990-02-28', 'Male', 'Celibate', 'Islam', 'Info', '08111111111', 'olatoye@gmail.com', 'NAF Base, Akure', 'AFWC', 80, 1.65, 25.02, 'Godfrey Junior', '08012345678', 'NAF Base, Ijesha', '2023-04-22 12:02:08'),
('UJ1V2', 'FS', 'NAF10/22225', 'Self', 'Lumo', 'Micheal', 'Fredrick', '1995-10-23', 'Male', 'Married', 'Christianity', 'Comms', '08101234567', 'lumo@gmail.com', 'NAF Base, Yola', '103 STG', 70, 1.74, 24.5, 'Godfrey Junior', '08012345678', 'NAF Base, Shasha.', '2023-04-27 12:38:43'),
('0DCU1', 'Flt Lt', 'NAF/4127', 'Self', 'Bode', '', 'Abiodun', '1986-02-28', 'Male', 'Married', 'Christianity', 'Comms', '07032495282', 'bode@gmail.com', 'NAF Base, Shasha.', '041 CD', 85, 1.79, 24.5, 'Abiodun Jnr', '08112345678', 'NAF Base, Benin.', '2023-04-27 01:38:34'),
('IN7ZC', 'Fg Offr', 'NAF/4732', 'Self', 'Uche', 'Anthony', 'Nwogwonuwe', '1899-01-01', 'Male', 'Married', 'Christianity', 'Medical', '07032495282', 'uantony@yahoo.com', 'NAF Base, Jos', 'AFWC', 70, 1.73, 23.39, 'Godfrey Junior', '08112345678', 'NAF Base, Jos.', '2023-04-28 07:42:26'),
('7U4QR', 'Air Mshl', 'NAF/4732', 'Son', 'Uche', 'Anthony', 'Nwogwonuwe', '1999-01-01', 'Female', 'Complicated', 'Islam', 'Medical', '08111111111', 'bode@gmail.com', 'NAF Base, Jos.', 'AFWC', 65, 1.73, 21.72, 'Godfrey Junior', '08012345678', 'NAF Base, Jos', '2023-04-28 12:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `his_payrolls`
--

CREATE TABLE `his_payrolls` (
  `pay_id` int(11) NOT NULL,
  `pay_number` varchar(200) DEFAULT NULL,
  `pay_doc_name` varchar(200) DEFAULT NULL,
  `pay_doc_number` varchar(200) DEFAULT NULL,
  `pay_doc_email` varchar(200) DEFAULT NULL,
  `pay_emp_salary` varchar(200) DEFAULT NULL,
  `pay_date_generated` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4),
  `pay_status` varchar(200) DEFAULT NULL,
  `pay_descr` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_payrolls`
--

INSERT INTO `his_payrolls` (`pay_id`, `pay_number`, `pay_doc_name`, `pay_doc_number`, `pay_doc_email`, `pay_emp_salary`, `pay_date_generated`, `pay_status`, `pay_descr`) VALUES
(2, 'HUT1B', 'Henry Doe', 'N8TI0', 'henryd@hms.org', '7555', '2022-10-20 17:14:18.3708', 'Paid', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>'),
(3, 'T294L', 'Bryan Arreola', 'YDS7L', 'bryan@mail.com', '15500', '2022-10-20 17:14:50.5588', NULL, '<p>demo demo demo demo demo</p>'),
(4, '3UOXY', 'Jessica Spencer', '5VIFT', 'jessica@mail.com', '4150', '2022-10-22 11:04:36.9626', NULL, '<p>This is a demo payroll description for test!!</p>');

-- --------------------------------------------------------

--
-- Table structure for table `his_pharmaceuticals`
--

CREATE TABLE `his_pharmaceuticals` (
  `phar_id` int(11) NOT NULL,
  `phar_name` varchar(200) DEFAULT NULL,
  `phar_bcode` varchar(200) DEFAULT NULL,
  `phar_desc` longtext DEFAULT NULL,
  `phar_qty` varchar(200) DEFAULT NULL,
  `phar_cat` varchar(200) DEFAULT NULL,
  `phar_vendor` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_pharmaceuticals`
--

INSERT INTO `his_pharmaceuticals` (`phar_id`, `phar_name`, `phar_bcode`, `phar_desc`, `phar_qty`, `phar_cat`, `phar_vendor`) VALUES
(1, 'Paracetamol', '134057629', '<ul><li><strong>Paracetamol</strong>, also known as <strong>acetaminophen</strong> and <strong>APAP</strong>, is a medication used to treat <a href=\"https://en.wikipedia.org/wiki/Pain\">pain</a> and <a href=\"https://en.wikipedia.org/wiki/Fever\">fever</a>. It is typically used for mild to moderate pain relief. There is mixed evidence for its use to relieve fever in children.&nbsp; It is often sold in combination with other medications, such as in many <a href=\"https://en.wikipedia.org/wiki/Cold_medication\">cold medications</a> Paracetamol is also used for severe pain, such as <a href=\"https://en.wikipedia.org/wiki/Cancer_pain\">cancer pain</a> and pain after surgery, in combination with <a href=\"https://en.wikipedia.org/wiki/Opioid_analgesic\">opioid pain medication</a>. It is typically used either by mouth or <a href=\"https://en.wikipedia.org/wiki/Rectally\">rectally</a>, but is also available by <a href=\"https://en.wikipedia.org/wiki/Intravenous\">injection into a vein</a>. Effects last between two and four hours.</li><li>Paracetamol is generally safe at recommended doses.The recommended maximum daily dose for an adult is three to four grams. Higher doses may lead to toxicity, including <a href=\"https://en.wikipedia.org/wiki/Liver_failure\">liver failure</a> Serious skin rashes may rarely occur. It appears to be safe during <a href=\"https://en.wikipedia.org/wiki/Pregnancy\">pregnancy</a> and when <a href=\"https://en.wikipedia.org/wiki/Breastfeeding\">breastfeeding</a>.In those with liver disease, it may still be used, but in lower doses. It is classified as a mild <a href=\"https://en.wikipedia.org/wiki/Analgesic\">analgesic</a>. It does not have significant <a href=\"https://en.wikipedia.org/wiki/Anti-inflammatory\">anti-inflammatory</a> activity. How it works is not entirely clear.</li><li>Paracetamol was first made in 1877. It is the most commonly used medication for pain and fever in both the United States and Europe. It is on the <a href=\"https://en.wikipedia.org/wiki/World_Health_Organization%27s_List_of_Essential_Medicines\">World Health Organization&#39;s List of Essential Medicines</a>, the safest and most effective medicines needed in a <a href=\"https://en.wikipedia.org/wiki/Health_system\">health system</a>.<a href=\"https://en.wikipedia.org/wiki/Paracetamol#cite_note-WHO21st-24\">[24]</a> Paracetamol is available as a <a href=\"https://en.wikipedia.org/wiki/Generic_medication\">generic medication</a> with trade names including <a href=\"https://en.wikipedia.org/wiki/Tylenol_(brand)\">Tylenol</a> and <a href=\"https://en.wikipedia.org/wiki/Panadol_(brand)\">Panadol</a>, among others.The wholesale price in the <a href=\"https://en.wikipedia.org/wiki/Developing_world\">developing world</a> is less than US$0.01 per dose. In the United States, it costs about US$0.04 per dose. In 2019, it was the 17th most prescribed medication in the United States, with more than 29&nbsp;million prescriptions.</li></ul>', '500', 'Antipyretics', 'Dawa Limited Kenya'),
(2, 'Aspirin', '452760813', '<ul><li><strong>Aspirin</strong>, also known as <strong>acetylsalicylic acid</strong> (<strong>ASA</strong>), is a <a href=\"https://en.wikipedia.org/wiki/Medication\">medication</a> used to reduce <a href=\"https://en.wikipedia.org/wiki/Pain\">pain</a>, <a href=\"https://en.wikipedia.org/wiki/Fever\">fever</a>, or <a href=\"https://en.wikipedia.org/wiki/Inflammation\">inflammation</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Specific inflammatory conditions which aspirin is used to treat include <a href=\"https://en.wikipedia.org/wiki/Kawasaki_disease\">Kawasaki disease</a>, <a href=\"https://en.wikipedia.org/wiki/Pericarditis\">pericarditis</a>, and <a href=\"https://en.wikipedia.org/wiki/Rheumatic_fever\">rheumatic fever</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Aspirin given shortly after a <a href=\"https://en.wikipedia.org/wiki/Myocardial_infarction\">heart attack</a> decreases the risk of death.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Aspirin is also used long-term to help prevent further heart attacks, <a href=\"https://en.wikipedia.org/wiki/Ischaemic_stroke\">ischaemic strokes</a>, and <a href=\"https://en.wikipedia.org/wiki/Thrombus\">blood clots</a> in people at high risk.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> It may also decrease the risk of certain types of <a href=\"https://en.wikipedia.org/wiki/Cancer\">cancer</a>, particularly <a href=\"https://en.wikipedia.org/wiki/Colorectal_cancer\">colorectal cancer</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-6\">[6]</a> For pain or fever, effects typically begin within 30 minutes.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Aspirin is a <a href=\"https://en.wikipedia.org/wiki/Nonsteroidal_anti-inflammatory_drug\">nonsteroidal anti-inflammatory drug</a> (NSAID) and works similarly to other NSAIDs but also suppresses the normal functioning of <a href=\"https://en.wikipedia.org/wiki/Platelet\">platelets</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a></li><li>One common <a href=\"https://en.wikipedia.org/wiki/Adverse_effect\">adverse effect</a> is an <a href=\"https://en.wikipedia.org/wiki/Upset_stomach\">upset stomach</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> More significant side effects include <a href=\"https://en.wikipedia.org/wiki/Stomach_ulcer\">stomach ulcers</a>, <a href=\"https://en.wikipedia.org/wiki/Stomach_bleeding\">stomach bleeding</a>, and worsening <a href=\"https://en.wikipedia.org/wiki/Asthma\">asthma</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Bleeding risk is greater among those who are older, drink <a href=\"https://en.wikipedia.org/wiki/Alcohol_(drug)\">alcohol</a>, take other NSAIDs, or are on other <a href=\"https://en.wikipedia.org/wiki/Anticoagulants\">blood thinners</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Aspirin is not recommended in the last part of <a href=\"https://en.wikipedia.org/wiki/Pregnancy\">pregnancy</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> It is not generally recommended in children with <a href=\"https://en.wikipedia.org/wiki/Infection\">infections</a> because of the risk of <a href=\"https://en.wikipedia.org/wiki/Reye_syndrome\">Reye syndrome</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> High doses may result in <a href=\"https://en.wikipedia.org/wiki/Tinnitus\">ringing in the ears</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a></li></ul>', '500', 'Analgesics', 'Cosmos Kenya Limited'),
(3, 'Test Pharma', '465931288', '<p>This is a demo test.&nbsp;This is a demo test.&nbsp;This is a demo test.</p>', '36', 'Antibiotics', 'Cosmos Pharmaceutical Limited');

-- --------------------------------------------------------

--
-- Table structure for table `his_pharmaceuticals_categories`
--

CREATE TABLE `his_pharmaceuticals_categories` (
  `pharm_cat_id` int(11) NOT NULL,
  `pharm_cat_name` varchar(200) DEFAULT NULL,
  `pharm_cat_vendor` varchar(200) DEFAULT NULL,
  `pharm_cat_desc` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_pharmaceuticals_categories`
--

INSERT INTO `his_pharmaceuticals_categories` (`pharm_cat_id`, `pharm_cat_name`, `pharm_cat_vendor`, `pharm_cat_desc`) VALUES
(1, 'Antipyretics', 'Cosmos Kenya Limited', '<ul><li>An <strong>antipyretic</strong> (<a href=\"https://en.wikipedia.org/wiki/Help:IPA/English\">/ËŒ&aelig;ntipaÉªËˆrÉ›tÉªk/</a>, from <em>anti-</em> &#39;against&#39; and <em><a href=\"https://en.wiktionary.org/wiki/pyretic\">pyretic</a></em> &#39;feverish&#39;) is a substance that reduces <a href=\"https://en.wikipedia.org/wiki/Fever\">fever</a>. Antipyretics cause the <a href=\"https://en.wikipedia.org/wiki/Hypothalamus\">hypothalamus</a> to override a <a href=\"https://en.wikipedia.org/wiki/Prostaglandin\">prostaglandin</a>-induced increase in <a href=\"https://en.wikipedia.org/wiki/Thermoregulation\">temperature</a>. The body then works to lower the temperature, which results in a reduction in fever.</li><li>Most antipyretic medications have other purposes. The most common antipyretics in the United States are <a href=\"https://en.wikipedia.org/wiki/Ibuprofen\">ibuprofen</a> and <a href=\"https://en.wikipedia.org/wiki/Aspirin\">aspirin</a>, which are <a href=\"https://en.wikipedia.org/wiki/Nonsteroidal_anti-inflammatory_drugs\">nonsteroidal anti-inflammatory drugs</a> (NSAIDs) used primarily as <a href=\"https://en.wikipedia.org/wiki/Analgesics\">analgesics</a> (pain relievers), but which also have antipyretic properties; and <a href=\"https://en.wikipedia.org/wiki/Acetaminophen\">acetaminophen</a> (paracetamol), an analgesic with weak anti-inflammatory properties.<a href=\"https://en.wikipedia.org/wiki/Antipyretic#cite_note-2\">[2]</a></li></ul>'),
(2, 'Analgesics', 'Dawa Limited Kenya', '<ul><li><p>An <strong>analgesic</strong> or <strong>painkiller</strong> is any member of the group of <a href=\"https://en.wikipedia.org/wiki/Pharmaceutical_drug\">drugs</a> used to achieve analgesia, relief from <a href=\"https://en.wikipedia.org/wiki/Pain\">pain</a>.</p><p>Analgesic drugs act in various ways on the <a href=\"https://en.wikipedia.org/wiki/Peripheral_nervous_system\">peripheral</a> and <a href=\"https://en.wikipedia.org/wiki/Central_nervous_system\">central</a> nervous systems. They are distinct from <a href=\"https://en.wikipedia.org/wiki/Anesthetic\">anesthetics</a>, which temporarily affect, and in some instances completely eliminate, <a href=\"https://en.wikipedia.org/wiki/Sense\">sensation</a>. Analgesics include <a href=\"https://en.wikipedia.org/wiki/Paracetamol\">paracetamol</a> (known in North America as <a href=\"https://en.wikipedia.org/wiki/Acetaminophen\">acetaminophen</a> or simply APAP), the <a href=\"https://en.wikipedia.org/wiki/Nonsteroidal_anti-inflammatory_drug\">nonsteroidal anti-inflammatory drugs</a> (NSAIDs) such as the <a href=\"https://en.wikipedia.org/wiki/Salicylate\">salicylates</a>, and <a href=\"https://en.wikipedia.org/wiki/Opioid\">opioid</a> drugs such as <a href=\"https://en.wikipedia.org/wiki/Morphine\">morphine</a> and <a href=\"https://en.wikipedia.org/wiki/Oxycodone\">oxycodone</a>.</p></li></ul>'),
(3, 'Antibiotics', 'Cosmos Kenya Limited', '<p>Antibiotics</p>');

-- --------------------------------------------------------

--
-- Table structure for table `his_prescriptions`
--

CREATE TABLE `his_prescriptions` (
  `pres_id` int(11) NOT NULL,
  `pres_pat_name` varchar(200) DEFAULT NULL,
  `pres_pat_age` varchar(200) DEFAULT NULL,
  `pres_pat_number` varchar(200) DEFAULT NULL,
  `pres_number` varchar(200) DEFAULT NULL,
  `pres_pat_addr` varchar(200) DEFAULT NULL,
  `pres_pat_type` varchar(200) DEFAULT NULL,
  `pres_date` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4),
  `pres_pat_ailment` varchar(200) DEFAULT NULL,
  `pres_ins` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_prescriptions`
--

INSERT INTO `his_prescriptions` (`pres_id`, `pres_pat_name`, `pres_pat_age`, `pres_pat_number`, `pres_number`, `pres_pat_addr`, `pres_pat_type`, `pres_date`, `pres_pat_ailment`, `pres_ins`) VALUES
(3, 'Mart Developers', '23', '6P8HJ', 'J9DC6', '127001 LocalHost', 'InPatient', '2020-01-11 12:32:39.6963', 'Fever', '<ul><li><a href=\"https://www.medicalnewstoday.com/articles/179211.php\">Non-steroidal anti-inflammatory drugs</a> (NSAIDs) such as <a href=\"https://www.medicalnewstoday.com/articles/161255.php\">aspirin</a> or ibuprofen can help bring a fever down. These are available to purchase over-the-counter or <a target=\"_blank\" href=\"https://amzn.to/2qp3d0b\">online</a>. However, a mild fever may be helping combat the bacterium or virus that is causing the infection. It may not be ideal to bring it down.</li><li>If the fever has been caused by a bacterial infection, the doctor may prescribe an <a href=\"https://www.medicalnewstoday.com/articles/10278.php\">antibiotic</a>.</li><li>If a fever has been caused by a cold, which is caused by a viral infection, NSAIDs may be used to relieve uncomfortable symptoms. Antibiotics have no effect against viruses and will not be prescribed by your doctor for a viral infection.</li></ul>'),
(4, 'John Doe', '30', 'RAV6C', 'HZQ8J', '12 900 NYE', 'OutPatient', '2020-01-11 13:08:46.7368', 'Malaria', '<ul><li>Combination of atovaquone and proguanil (Malarone)</li><li>Quinine sulfate (Qualaquin) with doxycycline (Vibramycin, Monodox, others)</li><li>Mefloquine.</li><li>Primaquine phosphate.</li></ul>'),
(5, 'Lorem Ipsum', '10', '7EW0L', 'HQC3D', '12 9001 Machakos', 'OutPatient', '2020-01-13 12:19:30.3702', 'Flu', '<ul><li><a href=\"https://www.google.com/search?client=firefox-b-e&amp;sxsrf=ACYBGNRW3vlJoag6iJInWVOTtTG_HUTedA:1578917913108&amp;q=flu+decongestant&amp;stick=H4sIAAAAAAAAAOMQFeLQz9U3SK5MTlbiBLGMktNzcnYxMRosYhVIyylVSElNzs9LTy0uScwrAQBMMnd5LgAAAA&amp;sa=X&amp;ved=2ahUKEwjRhNzKx4DnAhUcBGMBHYs1A24Q0EAwFnoECAwQHw\">Decongestant</a></li><li>Relieves nasal congestion, swelling and runny nose.</li><li><a href=\"https://www.google.com/search?client=firefox-b-e&amp;sxsrf=ACYBGNRW3vlJoag6iJInWVOTtTG_HUTedA:1578917913108&amp;q=flu+cough+medicine&amp;stick=H4sIAAAAAAAAAOMQFeLQz9U3SK5MTlbiBLEM89IsLHYxMRosYhVKyylVSM4vTc9QyE1NyUzOzEsFAA_gu9IwAAAA&amp;sa=X&amp;ved=2ahUKEwjRhNzKx4DnAhUcBGMBHYs1A24Q0EAwFnoECAwQIA\">Cough medicine</a></li><li>Blocks the cough reflex. Some may thin and loosen mucus, making it easier to clear from the airways.</li><li><a href=\"https://www.google.com/search?client=firefox-b-e&amp;sxsrf=ACYBGNRW3vlJoag6iJInWVOTtTG_HUTedA:1578917913108&amp;q=flu+nonsteroidal+anti-inflammatory+drug&amp;stick=H4sIAAAAAAAAAOMQFeLQz9U3SK5MTlYCs0yzCit3MTEaLGJVT8spVcjLzysuSS3Kz0xJzFFIzCvJ1M3MS8tJzM1NLMkvqlRIKSpNBwByUiYhRAAAAA&amp;sa=X&amp;ved=2ahUKEwjRhNzKx4DnAhUcBGMBHYs1A24Q0EAwFnoECAwQIQ\">Nonsteroidal anti-inflammatory drug</a></li><li>Relieves pain, decreases inflammation and reduces fever.</li><li><a href=\"https://www.google.com/search?client=firefox-b-e&amp;sxsrf=ACYBGNRW3vlJoag6iJInWVOTtTG_HUTedA:1578917913108&amp;q=flu+analgesic&amp;stick=H4sIAAAAAAAAAOMQFeLQz9U3SK5MTlZiB7EqDSx3MTEaLGLlTcspVUjMS8xJTy3OTAYAbecS9ikAAAA&amp;sa=X&amp;ved=2ahUKEwjRhNzKx4DnAhUcBGMBHYs1A24Q0EAwFnoECAwQIg\">Analgesic</a></li><li>Relieves pain.</li><li><a href=\"https://www.google.com/search?client=firefox-b-e&amp;sxsrf=ACYBGNRW3vlJoag6iJInWVOTtTG_HUTedA:1578917913108&amp;q=flu+antiviral+drug&amp;stick=H4sIAAAAAAAAAOMQFeLQz9U3SK5MTlYCs1KMC0x2MTEaLGIVSsspVUjMK8ksyyxKzFFIKSpNBwDBFxlOLwAAAA&amp;sa=X&amp;ved=2ahUKEwjRhNzKx4DnAhUcBGMBHYs1A24Q0EAwFnoECAwQIw\">Antiviral drug</a></li><li>Reduces viruses&#39; ability to replicate.</li></ul>'),
(6, 'Christine Moore', '28', '4TLG0', '09Y2P', '117 Bleecker Street', 'InPatient', '2022-10-22 10:57:10.7496', 'Demo Test', '<ol><li>This is a demo prescription.</li><li>This is a second demo prescription.</li><li>And this one&#39;s third!</li></ol>');

-- --------------------------------------------------------

--
-- Table structure for table `his_pwdresets`
--

CREATE TABLE `his_pwdresets` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_surgery`
--

CREATE TABLE `his_surgery` (
  `s_id` int(11) NOT NULL,
  `s_number` varchar(200) DEFAULT NULL,
  `s_doc` varchar(200) DEFAULT NULL,
  `s_pat_number` varchar(200) DEFAULT NULL,
  `s_pat_name` varchar(200) DEFAULT NULL,
  `s_pat_ailment` varchar(200) DEFAULT NULL,
  `s_pat_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `s_pat_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_surgery`
--

INSERT INTO `his_surgery` (`s_id`, `s_number`, `s_doc`, `s_pat_number`, `s_pat_name`, `s_pat_ailment`, `s_pat_date`, `s_pat_status`) VALUES
(2, '8KQWD', 'Martin Mbithi', 'RAV6C', 'John Doe', 'Malaria', '2020-01-13 08:50:10.649889', 'Successful'),
(3, '7K18R', 'Bryan Arreola', '3Z14K', 'Cynthia Connolly', 'Demo Test', '2022-10-18 17:26:44.053571', 'Successful'),
(4, 'ECF62', 'Bryan Arreola', '4TLG0', 'Christine Moore', 'Demo Test', '2022-10-22 11:03:33.765255', 'Successful');

-- --------------------------------------------------------

--
-- Table structure for table `his_vendor`
--

CREATE TABLE `his_vendor` (
  `v_id` int(11) NOT NULL,
  `v_number` varchar(200) DEFAULT NULL,
  `v_name` varchar(200) DEFAULT NULL,
  `v_adr` varchar(200) DEFAULT NULL,
  `v_mobile` varchar(200) DEFAULT NULL,
  `v_email` varchar(200) DEFAULT NULL,
  `v_phone` varchar(200) DEFAULT NULL,
  `v_desc` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_vendor`
--

INSERT INTO `his_vendor` (`v_id`, `v_number`, `v_name`, `v_adr`, `v_mobile`, `v_email`, `v_phone`, `v_desc`) VALUES
(1, '6ISKC', 'Cosmos Pharmaceutical Limited', 'P.O. Box 41433, GPO 00100 Nairobi, Kenya', '', 'info@cosmospharmaceuticallimited.com', '+254(20)550700-9', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>');

-- --------------------------------------------------------

--
-- Table structure for table `his_vitals`
--

CREATE TABLE `his_vitals` (
  `vit_id` int(11) NOT NULL,
  `vit_number` varchar(200) DEFAULT NULL,
  `vit_pat_number` varchar(200) DEFAULT NULL,
  `vit_bodytemp` varchar(200) DEFAULT NULL,
  `vit_heartpulse` varchar(200) DEFAULT NULL,
  `vit_resprate` varchar(200) DEFAULT NULL,
  `vit_bloodpress` varchar(200) DEFAULT NULL,
  `vit_daterec` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_vitals`
--

INSERT INTO `his_vitals` (`vit_id`, `vit_number`, `vit_pat_number`, `vit_bodytemp`, `vit_heartpulse`, `vit_resprate`, `vit_bloodpress`, `vit_daterec`) VALUES
(3, '1KB9V', '3Z14K', '38', '77', '12', '90/60', '2022-10-18 17:10:16.904915'),
(4, 'ELYOM', 'BKTWQ', '38', '88', '12', '110/80', '2022-10-18 01:49:55.814783'),
(5, 'AL0J8', 'YDS7L', '36', '72', '15', '90/60', '2022-10-18 17:42:17.500662'),
(6, 'MS2OJ', '4TLG0', '37', '70', '15', '120/80', '2022-10-22 11:01:52.148658');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `his_accounts`
--
ALTER TABLE `his_accounts`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `his_admin`
--
ALTER TABLE `his_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `his_assets`
--
ALTER TABLE `his_assets`
  ADD PRIMARY KEY (`asst_id`);

--
-- Indexes for table `his_docs`
--
ALTER TABLE `his_docs`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `his_equipments`
--
ALTER TABLE `his_equipments`
  ADD PRIMARY KEY (`eqp_id`);

--
-- Indexes for table `his_laboratory`
--
ALTER TABLE `his_laboratory`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `his_medical_records`
--
ALTER TABLE `his_medical_records`
  ADD PRIMARY KEY (`mdr_id`);

--
-- Indexes for table `his_patient_transfers`
--
ALTER TABLE `his_patient_transfers`
  ADD PRIMARY KEY (`ref_number`);

--
-- Indexes for table `his_payrolls`
--
ALTER TABLE `his_payrolls`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `his_pharmaceuticals`
--
ALTER TABLE `his_pharmaceuticals`
  ADD PRIMARY KEY (`phar_id`);

--
-- Indexes for table `his_pharmaceuticals_categories`
--
ALTER TABLE `his_pharmaceuticals_categories`
  ADD PRIMARY KEY (`pharm_cat_id`);

--
-- Indexes for table `his_prescriptions`
--
ALTER TABLE `his_prescriptions`
  ADD PRIMARY KEY (`pres_id`);

--
-- Indexes for table `his_pwdresets`
--
ALTER TABLE `his_pwdresets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `his_surgery`
--
ALTER TABLE `his_surgery`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `his_vendor`
--
ALTER TABLE `his_vendor`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `his_vitals`
--
ALTER TABLE `his_vitals`
  ADD PRIMARY KEY (`vit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `his_accounts`
--
ALTER TABLE `his_accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_admin`
--
ALTER TABLE `his_admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `his_assets`
--
ALTER TABLE `his_assets`
  MODIFY `asst_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_docs`
--
ALTER TABLE `his_docs`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `his_equipments`
--
ALTER TABLE `his_equipments`
  MODIFY `eqp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_laboratory`
--
ALTER TABLE `his_laboratory`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `his_medical_records`
--
ALTER TABLE `his_medical_records`
  MODIFY `mdr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `his_payrolls`
--
ALTER TABLE `his_payrolls`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `his_pharmaceuticals`
--
ALTER TABLE `his_pharmaceuticals`
  MODIFY `phar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_pharmaceuticals_categories`
--
ALTER TABLE `his_pharmaceuticals_categories`
  MODIFY `pharm_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_prescriptions`
--
ALTER TABLE `his_prescriptions`
  MODIFY `pres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `his_pwdresets`
--
ALTER TABLE `his_pwdresets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_surgery`
--
ALTER TABLE `his_surgery`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `his_vendor`
--
ALTER TABLE `his_vendor`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `his_vitals`
--
ALTER TABLE `his_vitals`
  MODIFY `vit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'his_code_camp_bd', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"his_code_camp_bd\",\"phpmyadmin\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-05-01 03:39:46', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
