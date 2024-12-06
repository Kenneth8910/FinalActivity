-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 03:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineresume`
--

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `civil_status` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `objective` text DEFAULT NULL,
  `tertiary` varchar(255) DEFAULT NULL,
  `tertiary_address` varchar(255) DEFAULT NULL,
  `tertiary_course` varchar(100) DEFAULT NULL,
  `tertiary_academic_year` varchar(255) DEFAULT NULL,
  `secondary` varchar(255) DEFAULT NULL,
  `secondary_address` varchar(255) DEFAULT NULL,
  `secondary_academic_year` varchar(255) DEFAULT NULL,
  `junior_high` varchar(255) DEFAULT NULL,
  `junior_high_address` varchar(255) DEFAULT NULL,
  `junior_academic_year` varchar(255) DEFAULT NULL,
  `primary_school` varchar(255) DEFAULT '',
  `primary_address` varchar(255) DEFAULT NULL,
  `primary_academic_year` varchar(255) DEFAULT NULL,
  `application_status` varchar(255) DEFAULT NULL,
  `application_link` varchar(255) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `first_name`, `middle_name`, `last_name`, `address`, `cellphone`, `email`, `birthdate`, `age`, `civil_status`, `religion`, `gender`, `objective`, `tertiary`, `tertiary_address`, `tertiary_course`, `tertiary_academic_year`, `secondary`, `secondary_address`, `secondary_academic_year`, `junior_high`, `junior_high_address`, `junior_academic_year`, `primary_school`, `primary_address`, `primary_academic_year`, `application_status`, `application_link`) VALUES
(1, 'Kenneth', 'Dela Cruz', 'Hernandez', '03 Tenejero, Pulilan, Bulacan', '09270340740', 'hkenneth2218@gmail.com', '2001-09-22', 23, 'Single', 'Catholic', 'Male', 'I am seeking for a job where my knowledge and experience will not only be refined but also improve the status of the company.', 'Baliwag Polytechnic College', 'Poblacion, Baliuag, Bulacan', 'Bachelor of Science in Information Technology', '2021 - Present', 'Next Generation Technological College', 'Banga 1st, Plaridel, Bulacan', '2018-2020', 'BAJET CASTILLO HIGH SCHOOL', 'Longos, Pulilan, Bulacan', '2017 - 2018', 'Pulilan, Central, School', 'Poblacion, Pulilan, Bulacan', '2008 - 2014', 'Rejected', 'https://ph.indeed.com/?r=us'),
(2, 'Edmark', '', 'Labis', '9139 Abraham St. Tiaong Baliwag, Bulacan', '0926-270-6101', 'edmarklabis03@gmail.com', '2001-12-03', 22, 'Single', '', 'Male', 'To secure a challenging position in a dynamic IT environment where I can utilize my technical skills and knowledge to contribute to the organizations growth and success.', 'BALIWAG POLYTECHNIC COLLEGE', 'Poblacion, Baliwag, Bulacan', 'Bachelor of Science in Information Technology', '2021-Present', 'ASIAN INSTITUTE OF SCIENCE AND TECHNOLOGY', 'Plaza Naning Poblacion Baliwag, Bulacan', '2018-2020', 'VIRGEN DELAS FLORES HIGH SCHOOL', 'Virgen Delas Flores, Baliwag, Bulacan', '2014-2018', 'STA. BARBARA ELEMENTARY SCHOOL', 'Sta. Barbara, Baliwag, Bulacan', '2008-2014', 'Applied', 'https://www.jobstreet.com/'),
(3, 'John Alvaro', 'F.', 'Juani', '339 Magalang St., Bagong Nayon, Baliwag, Bulacan', '0928-228-5531', 'johnjuani178@gmail.com', '2024-12-04', 22, 'Single', '', 'Male', 'To use my knowledge and technical skills to gain experience in the field. My goal is to contribute to projects, learn from industry, and improve my skills, preparing myself for a successful career in technology.', 'Dalubhasaang Politekniko ng Lungsod ng Baliwag', '2nd Floor BMG Bldg., Poblacion, Baliuag, Bulacan', 'Bachelor of Science in Information Technology', '2021 - Present', 'Dalubhasaang Politekniko ng Lungsod ng Baliwag SHS', '2nd Floor BMG Bldg., Poblacion, Baliuag, Bulacan', '2019 - 2021', 'Mariano Ponce National High School', 'Benigno S. Aquino Ave, Bagong Nayon, Baliwag, Bulacan', '2015 - 2021', 'Baliwag North Central School', 'Sto. Cristo, Baliwag, Bulacan', '2008 - 2015', 'Applied', 'https://ph.indeed.com/?r=us'),
(4, 'Aldrin', 'C.', 'Espiritu', '255 St. 2 Mangga, Candaba, Pampanga', ' 9364233142', 'aldrinespiritu12@gmail.com', '2002-02-27', 22, 'Single', '', 'Male', 'To enhance my working capacities and succeed in an environment of growth and excellence and earn a job which provides me job satisfaction and self-devevlopment and help me achieve personal as well as organizational goals.', 'Baliwag Polythecnic College', 'Poblacion Baliwag Bulacan', 'Bachelor of Science in Information Technology', '', 'Mangga High School', 'Mangga, Candaba, Pampanga', '', '', '', '', 'Hinukay Elementary School', 'Hinukay Baliwag Bulacan', '', 'Applied', 'https://www.jobstreet.com/'),
(5, 'Chielo Marie', NULL, 'Lontoc', '173 Rose St. Sulivan Baliwag Bulacan', '91649606605', 'lontocchielogmail.com', NULL, NULL, 'Single', NULL, NULL, 'To enhance my working capacities and succeed in an environment of growth and excellence and earn a job which provides me job satisfaction and self-development and help me achieve personal as well as organizational goals.', 'Baliwag Polythecnic College', 'Poblacion Baliwag Bulacan', '\r\nBachelor of Science in Information Technology', NULL, 'Sulivan National High School', 'Sulivan Baliwag Bulacan', NULL, 'Sulivan National High School', 'Sulivan Baliwag Bulacan', NULL, 'Tilapayong Elementary School', 'Tilapayong Baliwag Bulacan', NULL, 'Interviewed', 'https://ph.indeed.com/?r=us'),
(6, 'James', 'E.', 'Referente', 'Pagala, Baliuag, Bulacan', '09612728417', 'referentejames04@gmail.com', '2024-09-04', 21, 'Single', '', 'Male', 'Seeking for a company where I can leverage my skills and experiences that i earn on my academic journey to contribute effectively towards the company\'s mission while furthering my professional growth and development.', 'Dalubhasaang Politekniko ng Lungsod ng Baliwag', 'Poblacion, Baliwag, Bulacan', 'Bachelor of Science in Information Technology', '2021 - Present', 'Dalubhasaang Politekniko ng Lungsod ng Baliwag', 'Poblacion, Baliwag, Bulacan', '2019 - 2021', 'Mariano Ponce National High School', '', '2015 - 2021', '', '', '', 'Hired ', 'https://www.jobstreet.com/'),
(7, 'Genesis', NULL, 'Navales', '', '09761268685', 'genesisnavales0604@gmail.com', NULL, NULL, NULL, NULL, NULL, 'I.T Student pursuing his career.', 'Baliwag Polytechnic College', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Interviewed', 'https://ph.indeed.com/?r=us'),
(8, 'Luis Miguel', 'P.', 'Burzon', '0261 nia road makinabang baliwag bulacan', '0946-695-83', 'Miguelburzon06@gmail.com', '2002-11-06', 22, 'Single', NULL, 'Male', 'I am open to constructive criticism to grow professionally and further develop my skills, knowledge and experience, enabling me to face and overcome my challenges of today\'s evolving work environment.', 'BALIWAG POLYTECHNIC COLLEGE', 'Poblacion, Baliwag, Bulacan', 'Bachelor of Science in Information Technology', '2021-Present', 'NEXT GENERATION TECHNOLOGICAL COLLEGE', 'Plaza Naning Poblacion Baliwag, Bulacan', '2019-2021', 'BAJET CASTILLO HIGH SCHOOL', 'Longos, Pulilan, Bulacan', '2015-2019', 'MAKINABANG ELEMENTARY SCHOOL', 'Makinabang, Baliwag, Bulacan', '2009-2015', 'Hired ', 'https://www.jobstreet.com/'),
(9, 'Isiah', 'Geosan', 'Geronimo', '421, Tilapayong Baliwag Bulacan', '0923 3345678', 'isenisen@gmail.com', '2024-12-12', 22, 'Single', '', 'Male', 'to use my knowledge and skills to gain experience in the field of information technology.\r\n', 'Baliwag Polytechnic College', 'Poblacion, Baliuag, Bulacan', 'Bachelor of Science in Information Technology', '2021 - Present', 'STI college', '', '2019-2021', 'Sulivan National High school', '', '2015-2019', 'Tilapayong Elementary school', '', '', 'Hired ', 'https://ph.indeed.com/?r=us');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
