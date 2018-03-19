-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2017 at 01:11 PM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobhunter_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_awards`
--

CREATE TABLE IF NOT EXISTS `company_awards` (
  `idcompany_awards` int(11) NOT NULL AUTO_INCREMENT,
  `company_awards_name` varchar(150) DEFAULT NULL,
  `company_awards_img` varchar(150) DEFAULT NULL,
  `company_awards_description` varchar(500) DEFAULT NULL,
  `company_awards_link` varchar(150) DEFAULT NULL,
  `company_awards_year` year(4) DEFAULT NULL,
  `company_profile_idcompany_profile` int(11) NOT NULL,
  `company_profile` int(11) NOT NULL,
  PRIMARY KEY (`idcompany_awards`,`company_profile_idcompany_profile`,`company_profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_branches`
--

CREATE TABLE IF NOT EXISTS `company_branches` (
  `idcompany_branches` int(11) NOT NULL AUTO_INCREMENT,
  `company_branches_name` varchar(250) NOT NULL,
  `company_branches_address` varchar(500) NOT NULL,
  `company_branches_tele` int(15) NOT NULL,
  `company_branches_idcompany` int(5) NOT NULL,
  PRIMARY KEY (`idcompany_branches`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company_branches`
--

INSERT INTO `company_branches` (`idcompany_branches`, `company_branches_name`, `company_branches_address`, `company_branches_tele`, `company_branches_idcompany`) VALUES
(1, 'Colombo', 'No.1, high-Level rd, Colombo', 112525253, 3),
(2, 'Kandy', 'No 7/25, Main Rd, Kandy', 812526278, 3),
(3, 'Kegalle', 'N0.34/8, Senanayake rd,Kegalle', 352456785, 3);

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE IF NOT EXISTS `company_profile` (
  `idcompany_profile` int(11) NOT NULL AUTO_INCREMENT,
  `company_profile_name` varchar(100) DEFAULT NULL,
  `company_profile_slogon` varchar(250) DEFAULT NULL,
  `company_profile_propic` varchar(150) DEFAULT NULL,
  `company_profile_about` varchar(1000) DEFAULT NULL,
  `company_profile_email` varchar(100) DEFAULT NULL,
  `company_profile_linkedin` varchar(150) DEFAULT NULL,
  `company_profile_facebook` varchar(150) DEFAULT NULL,
  `company_profile_gplus` varchar(250) NOT NULL,
  `company_profile_twitter` varchar(250) NOT NULL,
  `company_profile_website` varchar(150) DEFAULT NULL,
  `company_profile_content_idcompany` int(11) NOT NULL,
  `company_profile_location` varchar(500) DEFAULT NULL,
  `company_profile_since` date DEFAULT NULL,
  `company_profile_pwd` varchar(150) NOT NULL,
  `company_profile_verify` varchar(50) NOT NULL,
  `company_profile_active` int(2) NOT NULL,
  `company_profile_hq` varchar(500) NOT NULL,
  `company_profile_hq_contact` varchar(15) NOT NULL,
  PRIMARY KEY (`idcompany_profile`,`company_profile_content_idcompany`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`idcompany_profile`, `company_profile_name`, `company_profile_slogon`, `company_profile_propic`, `company_profile_about`, `company_profile_email`, `company_profile_linkedin`, `company_profile_facebook`, `company_profile_gplus`, `company_profile_twitter`, `company_profile_website`, `company_profile_content_idcompany`, `company_profile_location`, `company_profile_since`, `company_profile_pwd`, `company_profile_verify`, `company_profile_active`, `company_profile_hq`, `company_profile_hq_contact`) VALUES
(3, 'ZacSeed IT solutions', 'Simplicity is the Ultimate Sophistication', '3.jpg', 'All corporations are companies, but not all companies are corporations. Company is a much broader term than corporation, and it encompasses a lot of different types of businesses. <br> These are a few of the key differences between a company and a corporation', 'vimukthisineth@gmail.com', 'linkedin.com/in/vimukthi-sineth-836baa136/', 'https://www.facebook.com/vimukthi.sineth', '', '', 'http://zacseed.com/', 0, 'No99,BOP313, Pulasthgama, Polonnaruwa', '2016-03-07', 'insider123', '742y8vxVHh', 1, 'No.1, high-Level rd, Colombo ', '0112525253');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile_branches`
--

CREATE TABLE IF NOT EXISTS `company_profile_branches` (
  `idcompany_profile_branches` int(11) NOT NULL AUTO_INCREMENT,
  `company_profile_branches_name` varchar(150) DEFAULT NULL,
  `company_profile_branches_location` varchar(150) DEFAULT NULL,
  `company_profile_branches_tele1` int(11) DEFAULT NULL,
  `company_profile_branches_tele2` int(11) DEFAULT NULL,
  `company_profile_branches_tele3` int(11) DEFAULT NULL,
  `company_profile_idcompany_profile` int(11) NOT NULL,
  `company_profile` int(11) NOT NULL,
  PRIMARY KEY (`idcompany_profile_branches`,`company_profile_idcompany_profile`,`company_profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_profile_content`
--

CREATE TABLE IF NOT EXISTS `company_profile_content` (
  `idcompany_profile_content` int(11) NOT NULL AUTO_INCREMENT,
  `company_profile_content_aboutus_heading` varchar(500) DEFAULT NULL,
  `company_profile_content_aboutus_p` varchar(1000) DEFAULT NULL,
  `company_profile_content_history_heading` varchar(500) DEFAULT NULL,
  `company_profile_content_history_p` varchar(1000) DEFAULT NULL,
  `company_profile_content_vision` varchar(500) DEFAULT NULL,
  `company_profile_content_mission` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idcompany_profile_content`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_profile_executives`
--

CREATE TABLE IF NOT EXISTS `company_profile_executives` (
  `idcompany_profile_executives` int(11) NOT NULL AUTO_INCREMENT,
  `company_profile_executives_name` varchar(150) DEFAULT NULL,
  `company_profile_executives_position` varchar(100) DEFAULT NULL,
  `company_profile_executives_pic` varchar(150) DEFAULT NULL,
  `company_profile_executives_contact` varchar(500) DEFAULT NULL,
  `company_profile_idcompany_profile` int(11) NOT NULL,
  `company_profile_idcompany` int(11) NOT NULL,
  PRIMARY KEY (`idcompany_profile_executives`,`company_profile_idcompany_profile`,`company_profile_idcompany`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `company_profile_executives`
--

INSERT INTO `company_profile_executives` (`idcompany_profile_executives`, `company_profile_executives_name`, `company_profile_executives_position`, `company_profile_executives_pic`, `company_profile_executives_contact`, `company_profile_idcompany_profile`, `company_profile_idcompany`) VALUES
(1, 'Sineth', 'CEO', 'J6Z1CAnlm4.jpg', 'https://www.facebook.com/vimukthi.sineth', 3, 0),
(10, 'Heshani Prabodha', 'CFO', 'jHFbnlCvXA.jpg', 'https://www.facebook.com/heshani.bandaranayake.1', 3, 0),
(11, 'Sachith Viduranga', 'Senior Software Engineer', 'IwtepKOfRy.jpg', NULL, 3, 0),
(12, 'Keshara Piyumal', 'Senior Designer', '7H4Lho9O2c.jpg', NULL, 3, 0),
(13, 'Nirmani Kaushlya', 'Assistant designer', 'i4P5UdgD3H.jpg', '', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_recognitions`
--

CREATE TABLE IF NOT EXISTS `company_recognitions` (
  `idcompany_recognitions` int(11) NOT NULL AUTO_INCREMENT,
  `company_recognitions_author` varchar(100) DEFAULT NULL,
  `company_recognitions_author_position` varchar(100) DEFAULT NULL,
  `company_recognitions_title` varchar(500) DEFAULT NULL,
  `company_recognitions_content` varchar(1000) DEFAULT NULL,
  `company_recognitions_likes` int(11) DEFAULT NULL,
  `company_recognitions_year` year(4) NOT NULL,
  `company_recognitions_venue` varchar(150) NOT NULL,
  `company_profile_idcompany_profile` int(11) NOT NULL,
  `company_profile_company_idcompany_profile` int(11) NOT NULL,
  PRIMARY KEY (`idcompany_recognitions`,`company_profile_idcompany_profile`,`company_profile_company_idcompany_profile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company_recognitions`
--

INSERT INTO `company_recognitions` (`idcompany_recognitions`, `company_recognitions_author`, `company_recognitions_author_position`, `company_recognitions_title`, `company_recognitions_content`, `company_recognitions_likes`, `company_recognitions_year`, `company_recognitions_venue`, `company_profile_idcompany_profile`, `company_profile_company_idcompany_profile`) VALUES
(1, 'Dr.E.L Ekanayake', NULL, 'SLS Certificate', 'Best customer service', NULL, 2016, 'B.M.I.C.H.', 3, 0),
(2, 'Mr.D.M perera', NULL, 'GEMO ISSO', 'The best costomer service', NULL, 2017, 'B.M.I.C.H.', 3, 0),
(3, 'Mr. Akila', NULL, 'ISO 9001', 'Certified', NULL, 2002, 'Hotel Mt. Laveniya', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_tele`
--

CREATE TABLE IF NOT EXISTS `company_tele` (
  `idcompany_tele` int(11) NOT NULL AUTO_INCREMENT,
  `company_tele_name` varchar(100) DEFAULT NULL,
  `company_tele_position` varchar(45) DEFAULT NULL,
  `company_tele_tele` int(11) DEFAULT NULL,
  `company_profile_idcompany_profile` int(11) NOT NULL,
  PRIMARY KEY (`idcompany_tele`,`company_profile_idcompany_profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_vacancy`
--

CREATE TABLE IF NOT EXISTS `company_vacancy` (
  `idcompany_vacancy` int(11) NOT NULL AUTO_INCREMENT,
  `company_vacancy_position` varchar(45) DEFAULT NULL,
  `company_vacancy_count` int(11) DEFAULT NULL,
  `company_vacancy_sallary` float DEFAULT NULL,
  `company_vacancy_branch` varchar(45) DEFAULT NULL,
  `company_vacancy_additional` varchar(500) DEFAULT NULL,
  `company_profile_idcompany_profile` int(11) NOT NULL,
  `company_vacancy_status` int(11) NOT NULL,
  `company_vacancy_catagory` varchar(150) NOT NULL,
  `company_vacancy_level` varchar(150) NOT NULL,
  PRIMARY KEY (`idcompany_vacancy`,`company_profile_idcompany_profile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `company_vacancy`
--

INSERT INTO `company_vacancy` (`idcompany_vacancy`, `company_vacancy_position`, `company_vacancy_count`, `company_vacancy_sallary`, `company_vacancy_branch`, `company_vacancy_additional`, `company_profile_idcompany_profile`, `company_vacancy_status`, `company_vacancy_catagory`, `company_vacancy_level`) VALUES
(1, 'Intern', 5, 15000, 'Colombo', 'Graduated', 3, 0, 'Managment, Accountant etc', '0'),
(3, 'Senior Software Engineer', 2, 120000, 'Kandy', 'Recomended, 2 Years Experiance', 3, 0, 'IT, Software Engineering, Computing etc.', 'Expert'),
(4, 'web designer', 10, 0, 'Kandy', 'at least 2 year working experience, cima', 3, 0, 'IT, Software Engineering, Computing etc.', 'Trained beginer'),
(5, 'Web developer', 5, 0, 'Colombo', 'CIMA, Webdesigning degree\r\n', 3, 0, 'IT, Software Engineering, Computing etc.', 'Trainee'),
(6, 'software developer', 4, 0, 'Colombo', 'B.sc hon Software engineering digree,', 3, 0, 'IT, Software Engineering, Computing etc.', 'Trainee'),
(7, 'software engineer', 2, 0, 'Kandy', 'B.sc software engineering', 3, 0, 'IT, Software Engineering, Computing etc.', 'Trained beginer'),
(8, 'assistant accontant', 5, 0, 'Colombo', 'CIMA, ', 3, 0, 'Managment, Accountant etc', 'Experianced'),
(9, '', 0, 0, '', '', 3, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_vacancy_apply`
--

CREATE TABLE IF NOT EXISTS `company_vacancy_apply` (
  `student_profile_idstudent_profile` int(11) NOT NULL,
  `company_vacancy_idcompany` int(11) NOT NULL,
  `company_vacancy` int(11) NOT NULL,
  PRIMARY KEY (`student_profile_idstudent_profile`,`company_vacancy_idcompany`,`company_vacancy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_vacancy_apply`
--

INSERT INTO `company_vacancy_apply` (`student_profile_idstudent_profile`, `company_vacancy_idcompany`, `company_vacancy`) VALUES
(15, 1, 0),
(15, 3, 0),
(15, 4, 0),
(15, 5, 0),
(15, 7, 0),
(28, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recrutment`
--

CREATE TABLE IF NOT EXISTS `recrutment` (
  `idrecrutment` int(11) NOT NULL AUTO_INCREMENT,
  `recrutment_date` date DEFAULT NULL,
  `company_vacancy_idcompany_vacancy` int(11) NOT NULL,
  `company_vacancy_company_profile` int(11) NOT NULL,
  PRIMARY KEY (`idrecrutment`,`company_vacancy_idcompany_vacancy`,`company_vacancy_company_profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recrutment_has_student_profile`
--

CREATE TABLE IF NOT EXISTS `recrutment_has_student_profile` (
  `recrutment_idrecrutment` int(11) NOT NULL,
  `recrutment_company_vacancy` int(11) NOT NULL,
  `recrutment_company_vacancy_` int(11) NOT NULL,
  `student_profile_idstudent_profile` int(11) NOT NULL,
  PRIMARY KEY (`recrutment_idrecrutment`,`recrutment_company_vacancy`,`recrutment_company_vacancy_`,`student_profile_idstudent_profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_accademic_al`
--

CREATE TABLE IF NOT EXISTS `student_accademic_al` (
  `idstudent_accademic_al` int(11) NOT NULL AUTO_INCREMENT,
  `student_accademic_al_profile_id` int(11) NOT NULL,
  `student_accademic_al_year` year(4) NOT NULL,
  `student_accademic_al_subject` varchar(45) DEFAULT NULL,
  `student_accademic_al_grade` varchar(2) DEFAULT NULL,
  `student_accademic_al_index` int(11) NOT NULL,
  PRIMARY KEY (`idstudent_accademic_al`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student_accademic_al`
--

INSERT INTO `student_accademic_al` (`idstudent_accademic_al`, `student_accademic_al_profile_id`, `student_accademic_al_year`, `student_accademic_al_subject`, `student_accademic_al_grade`, `student_accademic_al_index`) VALUES
(1, 15, 2015, 'Physics', 'B', 6008399),
(2, 15, 2015, 'Chemistry', 'C', 6008399),
(3, 15, 2015, 'Combined Mathematics', 'S', 6008399),
(4, 15, 2015, 'General English', 'A', 6008399),
(5, 28, 2015, 'Physical Science', 'AB', 6167170),
(6, 29, 2015, 'Chemestry', 'B', 6862314);

-- --------------------------------------------------------

--
-- Table structure for table `student_accademic_ol`
--

CREATE TABLE IF NOT EXISTS `student_accademic_ol` (
  `idstudent_accademic_ol_index` int(11) NOT NULL AUTO_INCREMENT,
  `student_accademic_ol_subject` varchar(45) DEFAULT NULL,
  `student_accademic_ol_grade` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`idstudent_accademic_ol_index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_accademic_university`
--

CREATE TABLE IF NOT EXISTS `student_accademic_university` (
  `idstudent_accademic_university` int(11) NOT NULL AUTO_INCREMENT,
  `student_id_accademic_university` int(11) NOT NULL,
  `student_accademic_university_year` int(2) DEFAULT NULL,
  `student_accademic_university_semester` int(11) DEFAULT NULL,
  `student_accademic_university_gpa` float DEFAULT NULL,
  `student_accademic_university_credits` int(2) NOT NULL,
  PRIMARY KEY (`idstudent_accademic_university`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student_accademic_university`
--

INSERT INTO `student_accademic_university` (`idstudent_accademic_university`, `student_id_accademic_university`, `student_accademic_university_year`, `student_accademic_university_semester`, `student_accademic_university_gpa`, `student_accademic_university_credits`) VALUES
(2, 15, 1, 1, 3.8, 16),
(3, 15, 1, 2, 3.75, 17),
(4, 15, 2, 1, 4, 15),
(5, 15, 2, 2, 3.5, 17),
(6, 28, 1, 1, 3.12, 18);

-- --------------------------------------------------------

--
-- Table structure for table `student_comments`
--

CREATE TABLE IF NOT EXISTS `student_comments` (
  `idstudent_comments` int(11) NOT NULL AUTO_INCREMENT,
  `student_comments_authorid` int(11) DEFAULT NULL,
  `student_comments_comment` varchar(500) DEFAULT NULL,
  `student_commentscol` varchar(45) DEFAULT NULL,
  `student_profile_idstudent_profile` int(11) NOT NULL,
  `student_profile_student_accademic` int(11) NOT NULL,
  PRIMARY KEY (`idstudent_comments`,`student_profile_idstudent_profile`,`student_profile_student_accademic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE IF NOT EXISTS `student_profile` (
  `idstudent_profile` int(11) NOT NULL AUTO_INCREMENT,
  `student_first_name` varchar(500) DEFAULT NULL,
  `student_last_name` varchar(250) NOT NULL,
  `student_full_name` varchar(500) NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `student_profile_dob` date NOT NULL,
  `student_university` varchar(150) DEFAULT NULL,
  `student_faculty` varchar(100) DEFAULT NULL,
  `student_course` varchar(100) DEFAULT NULL,
  `student_accademic_start` date NOT NULL,
  `student_rating` float NOT NULL,
  `student_stuid` varchar(45) DEFAULT NULL,
  `student_nic` varchar(10) DEFAULT NULL,
  `student_address` varchar(250) DEFAULT NULL,
  `student_district` varchar(45) DEFAULT NULL,
  `student_dob` date DEFAULT NULL,
  `student_about` varchar(9999) DEFAULT NULL,
  `student_pro_pic` varchar(500) DEFAULT NULL,
  `student_facebook` varchar(150) DEFAULT NULL,
  `student_linkedin` varchar(150) DEFAULT NULL,
  `student_mobile` int(11) DEFAULT NULL,
  `student_email` varchar(100) DEFAULT NULL,
  `student_accademic` int(11) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `email_verification` varchar(11) NOT NULL,
  `account_active` int(11) NOT NULL,
  PRIMARY KEY (`idstudent_profile`),
  UNIQUE KEY `student_email` (`student_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`idstudent_profile`, `student_first_name`, `student_last_name`, `student_full_name`, `student_gender`, `student_profile_dob`, `student_university`, `student_faculty`, `student_course`, `student_accademic_start`, `student_rating`, `student_stuid`, `student_nic`, `student_address`, `student_district`, `student_dob`, `student_about`, `student_pro_pic`, `student_facebook`, `student_linkedin`, `student_mobile`, `student_email`, `student_accademic`, `pwd`, `email_verification`, `account_active`) VALUES
(15, 'Vimukthi', 'Sineth', 'D.M. Vimukthi Sineth Dissanayake', 'Male', '1995-08-19', 'University of Kelaniya', 'Science', 'B.Sc. in Software Engineering', '2017-03-08', 9.23, 'SE/2015/009', '952320610v', 'No 99g, BOP 313, Pulasthigama', 'Polonnaruwa', '1995-08-19', 'I''m a skilled problem solver. That''s why i''m a good software engineer. I have confident that i can find a solution for any problem comes to me.', '15.jpg', 'https://www.facebook.com/vimukthi.sineth', 'linkedin.com/in/vimukthi-sineth-836baa136/', 712141384, 'dissanay_se15009@stu.kln.ac.lk', 0, 'insider123', 'W3yGldb9tY', 1),
(28, 'Hesh', 'Bandaranayake', 'B.M.H.P Bandaranayake', 'Female', '1995-06-03', 'University of Kelaniya', NULL, 'B.Sc in Software Engineering', '2017-03-27', 0, NULL, NULL, '35/1/A Kiribathkumbura', 'Kandy', NULL, 'Dream it,\r\nWish it,\r\nDo it.', '28.jpg', NULL, NULL, NULL, 'bandaran_se15006@stu.kln.ac.lk', 0, '123@srilanka', 'prWHIgb6oc', 1),
(29, 'Piyadigamage', 'Sachith Viduranga', 'Piyadigamage Sachith Viduranga', 'Male', '0000-00-00', 'University of Kelaniya', NULL, 'B.Sc, in Software Engineering', '2017-03-08', 0, NULL, NULL, 'No 14/a,lucky wijerathna place,Chinabay', 'Trincomalee', NULL, NULL, '29.jpg', NULL, NULL, NULL, 'ariyathi_se15004@stu.kln.ac.lk', 0, '0702108735', 'saHiu7zwIJ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_profile_has_student_accademic_al`
--

CREATE TABLE IF NOT EXISTS `student_profile_has_student_accademic_al` (
  `student_profile_idstudent_profile` int(11) NOT NULL,
  `student_accademic_al_idstudent_accademic_al` int(11) NOT NULL,
  PRIMARY KEY (`student_profile_idstudent_profile`,`student_accademic_al_idstudent_accademic_al`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_profile_has_student_accademic_ol`
--

CREATE TABLE IF NOT EXISTS `student_profile_has_student_accademic_ol` (
  `student_profile_idstudent_profile` int(11) NOT NULL,
  `student_accademic_ol_idstudent_accademic_ol_index` int(11) NOT NULL,
  PRIMARY KEY (`student_profile_idstudent_profile`,`student_accademic_ol_idstudent_accademic_ol_index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_projects`
--

CREATE TABLE IF NOT EXISTS `student_projects` (
  `idstudent_projects` int(11) NOT NULL AUTO_INCREMENT,
  `student_projects_title` varchar(150) DEFAULT NULL,
  `student_projects_short_description` varchar(2000) NOT NULL,
  `student_projects_description` varchar(9999) DEFAULT NULL,
  `student_projects_image` varchar(100) DEFAULT NULL,
  `student_projects_year` year(4) DEFAULT NULL,
  `student_projects_institute` varchar(45) DEFAULT NULL,
  `student_projects_client` varchar(45) DEFAULT NULL,
  `student_projects_budjet` float DEFAULT NULL,
  `student_projects_link` varchar(150) DEFAULT NULL,
  `student_projects_img1` varchar(150) DEFAULT NULL,
  `student_projects_img2` varchar(150) DEFAULT NULL,
  `student_projects_img3` varchar(150) DEFAULT NULL,
  `student_projects_superviser` varchar(150) DEFAULT NULL,
  `student_projects_superviser_contact` varchar(150) DEFAULT NULL,
  `student_projects_likes` int(11) DEFAULT NULL,
  `student_profile_idstudent_profile` int(11) NOT NULL,
  `student_projects_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`idstudent_projects`,`student_profile_idstudent_profile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `student_projects`
--

INSERT INTO `student_projects` (`idstudent_projects`, `student_projects_title`, `student_projects_short_description`, `student_projects_description`, `student_projects_image`, `student_projects_year`, `student_projects_institute`, `student_projects_client`, `student_projects_budjet`, `student_projects_link`, `student_projects_img1`, `student_projects_img2`, `student_projects_img3`, `student_projects_superviser`, `student_projects_superviser_contact`, `student_projects_likes`, `student_profile_idstudent_profile`, `student_projects_order`) VALUES
(1, 'Android App', 'I was asked to build an android app to promote part time jobs', 'Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit. Donec id elit non mi porta.Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit. Donec id elit non mi porta.', '15.jpg', 2016, NULL, 'Manpower', 25000, 'http://zacseed.com/', '151.jpg', '152.jpg', '153.jpg', 'Dr. Carmel', '776233251', 2, 15, 1),
(12, 'Mysql DBMS', 'A daily collection finance company system software', 'bjbjb gjkbjh  jjk', '15Mysql DBMS2015.jpg', 2015, '', 'SSD Holdings', 25000, 'bjbkj', '15Mysql DBMS20151.jpg', '15Mysql DBMS20152.jpg', '15Mysql DBMS20153.jpg', 'Dr. Gamini', '0726233851', NULL, 15, NULL),
(15, 'Zacseed.com Website', 'The official website of ZacSeed Software Solutions PVT LTD', 'I designed this website as i was asked to be simple, straight and strong. And they were very happy with my work', '15Zacseed.com Website2016.jpg', 2016, '', 'ZacSeed Software Solutions PVT LTD', 18000, 'http://zacseed.com/', '15Zacseed.com Website20161.jpg', '15Zacseed.com Website20162.jpg', '15Zacseed.com Website20163.jpg', 'Chanura Shehan', '0702513552', NULL, 15, NULL),
(16, 'Software Bettans shoe company', 'Easy to enter the data, Calculations via this software', '', '28Software Bettans shoe company2015.jpg', 2015, 'Esoft metro campus', 'No', 0, 'www.project.com', '28Software Bettans shoe company20151.jpg', '28Software Bettans shoe company20152.jpg', '28Software Bettans shoe company20153.jpg', 'Miss.Thilini Dinusha', 'hmtdinu@gmail.com', NULL, 28, NULL),
(17, 'Software for pizzahut', 'Creative and easy to use', 'The pizzahut has a manual system for their calculations, ordering and other costumer services. This software makes easy to do their work properly and efficiently.', '28Software for pizzahut2014.jpg', 2014, 'Esoft metro campus', 'MR.D.M.V.S Dissanayake', 0, 'www.pizzahut.lk', '28Software for pizzahut20141.jpg', '28Software for pizzahut20142.jpg', '28Software for pizzahut20143.jpg', 'Miss K.L Herath', '0778965345', NULL, 28, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
