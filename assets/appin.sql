-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2019 at 04:36 AM
-- Server version: 5.7.24
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(245) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(245) DEFAULT NULL,
  `types` tinyint(4) DEFAULT NULL COMMENT '1-admin,2=team member',
  `technology` int(11) DEFAULT NULL,
  `job_type` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL COMMENT '1=male,2=female',
  `image` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `mobile`, `password`, `types`, `technology`, `job_type`, `city`, `address`, `gender`, `image`, `dates`, `status`) VALUES
(1, 'Admin', 'admin@admin.com', '7506569288', '123456', 1, 101, 0, 'bhopal1', 'Mp nagar bhopal', '0', '', '2018-08-02 03:47:20', 1),
(15, 'bhupendra singh jat', 'bjat12121@admin.com', '7506569344', '78df655ceb6a5ff8dec12ddfde18f426668d7152aa595f99a15e850245679f1c70420596e39d43fcce7b2dfaf2115ac0c690cd499ffb0f7580e5f95c3a774a2dhJG07RD8bjn7DPAwy62mkqSFp5f4tRFBtqBrZDev30s=', 2, 6, 0, 'bhopal', 'bho9pal', '', 'p2d930acc.png', '2019-05-04 13:06:19', 1),
(17, 'Yash Jain', 'admin@g.com', '7506569555', '123456', 3, 2, 1, '', 'bhopal', '', '', '2019-05-05 08:55:45', 1),
(18, 'Abhishek Arya', 'abhi@admin.com', '9834324323', '123', 3, 5, 1, '', 'bhopal', '', 'p7657112e.png', '2019-05-08 15:03:34', 1),
(20, 'Charusheela', 'reporting.edu@gmail.com', '8788868975', '6c6d69ef57d31cc8ca6999d770c2ecd64fe75ae8aa12df3cf2bc72c80098cdc04b408f27358ddb549778f81cf60134ae492dd78e007eb6d673efa610064a3979FxFLe7Xt3py352OiJC6v+VucKR6uvI5RJ6MX4syFpoQ=', 2, 0, 0, '', 'Kolar, bhopal', '', '', '2019-05-10 12:35:28', 1),
(21, 'bhupendra singh jat', 'b1234@admin.com', '9887777565', 'd13aa16ea1173e28157d328c8e13bf58638e0a51aec0ca508a26248fa9cfda5fb26d4a11522babd1ddb27971bb93ec8cae765e778bf5b5d1cb631683d0466acfiK63YoU/XEYYYlSJ10NsovLxePARG7OjmoXgbp5SRDA=', 4, 0, 0, '', 'bhopal', '', 'j30a2def9.jpg', '2019-05-10 13:17:23', 1),
(23, 'Vandana Dubey', 'finanace@cyrbom', '9981993324', 'd1d6770ab445ba8974c817a07d1b884162eefe470062df15109eb7b7df4a3368466ad6ad145485eb6da8194edd7912fd17922d900729baf9aa779084fd9d5cddEZ2+huItETNiG+OybPeRhHMfOt9eLVPPp6DeyLsfq2U=', 4, 0, 0, '', '185 2nd floor zone 1 m.p nagar\r\nM.P.Nagar Bhopal', '', '', '2019-05-21 14:45:19', 1),
(25, 'Muddasir Hasshmi', 'Muddasir@cybrom', '9988776655', 'fede9b567eb45fed9023d5aaf67b79d191ac186d9a65122e0e4c34abeac59384686c2070499678cbc4e46b12e99b963f9b905d02228f509d4a0139f6995b4f83AGiDa2XijrE40QMqLDM9yaAkhlpPOYv1GuhEoarE10c=', 3, 19, 0, '', 'Bhopal', '', '', '2019-05-22 07:49:24', 1),
(27, 'Rathish Ravi Sir', 'bpl.trainer02@gmail.com', '7247445227', 'a3564137a8aa63b714de1780522344eea37e394e322dcc4d983c57737a64fce531b33f825260f58815c5f3c5429d6f4e8704c1c1d3a12f5d6f576a4115402795ZHKrKsGk709n+ICZ/sf2gKIUpt5eKTsU75kcJ2nrCDE=', 3, 25, 0, '', 'Bpl', '', '', '2019-05-22 08:04:41', 1),
(28, 'Tahir Sir', 'Tahir@cybrom.com', '7000917556', 'e5ffe0efcf1a74d8acd56de4d6f7e632efe3dfbf376f5dad3156ddd35379c6ed101825bffb97426545570f97498469edda279bbc11448467b0f229c7416704d0hepH+0srpEz47pDfsO6zoqgKas1LyXWTVfo3sMgbOw4=', 3, 14, 0, '', 'Bpl', '', '', '2019-05-22 08:16:45', 1),
(29, 'Ram Sir', 'ramsoftware786@gmail.com', '6260475870', '9367d945f4b61b814846d441a21b3998d8a8d7490228b0c069c34cb5a6e8ab29d14300d265c45b816d3332599c894db899fea42e650b84ac39755fed9d70dffe2v8tuSE6IVO5a5QjahzTXfv2UFgyD2Sy0heiDyhG+nw=', 3, 2, 0, '', 'Bpl', '', '', '2019-05-22 08:33:15', 1),
(31, 'bhupendra 34534343', 'vgff@admin.com', '9887777777', '123456', 4, 0, 0, '', '123456', '', '', '2019-05-23 12:28:56', 1),
(32, 'Mukesh Sahu', 'mukesh@gmail.com', '49857468347', '123456', 3, 9, 1, '', 'Bhopal', '', '', '2019-05-24 08:37:46', 1),
(33, 'Abhisekh Raj', 'bpl.trainer09@gmail.com', '9630338735', '123', 3, 24, 0, '', 'bhopal', '', '', '2019-05-25 11:52:46', 1),
(34, 'Anish Sir', 'bpl.trainer01@gmail.com', '9770782081', '123', 3, 16, 0, '', 'bhopal', '', '', '2019-05-25 12:14:22', 1),
(35, 'Bhupendra Sir', 'bpl.trainer18@gmail.com', '', '123', 3, 20, 1, '', 'bhopal', '', '', '2019-05-25 12:18:53', 1),
(36, 'test', 'admin111@gmail.com', '6655443322', '123456', 3, 7, 1, '', '', '', '', '2019-05-25 14:53:58', 1),
(37, 'syam sharma', 'admin11@admin.com', '9856985677', '123456', 3, NULL, 1, '', 'bhopal\r\nbhopal', '', '', '2019-05-25 21:11:54', 1),
(38, 'syam sharma', 'monuqq@gmail.com', '9856985640', '123456', 3, NULL, 1, '', 'bhopal\r\nbhopal', '', '', '2019-05-25 21:17:23', 1),
(39, 'manish', 'test@gmail.com', '98566985644', '123456', 3, NULL, 0, '', 'bhopal', '', '', '2019-06-02 06:26:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `fees` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `starttime` varchar(255) DEFAULT NULL,
  `endtime` varchar(255) DEFAULT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `course_id`, `lab_id`, `faculty_id`, `fees`, `startdate`, `enddate`, `starttime`, `endtime`, `description`, `status`) VALUES
(12, 28, 19, 17, 0, '2019-06-06', '2019-06-09', '01:00:00', '04:00:00', '', 1),
(13, 28, 19, 17, 0, '2019-06-08', '2019-06-18', '04:00:00', '07:00:00', '', 1),
(14, 28, 19, 17, 0, '2019-06-05', '2019-07-10', '09:30:00', '12:30:00', '', 1),
(15, 19, 10, 25, 0, '2019-06-05', '2019-07-15', '09:30:00', '12:30:00', '', 1),
(16, 19, 10, 25, 0, '2019-06-06', '2019-07-17', '01:00:00', '04:00:00', '', 1),
(17, 19, 10, 25, 0, '2019-06-08', '2019-07-18', '04:00:00', '07:00:00', '', 1),
(18, 25, 11, 27, 0, '2019-06-05', '2019-07-10', '09:30:00', '12:30:00', '', 1),
(19, 25, 11, 27, 0, '2019-06-06', '2019-07-16', '01:00:00', '04:00:00', '', 1),
(20, 25, 11, 27, 0, '2019-06-08', '2019-07-18', '04:00:00', '07:00:00', '', 1),
(21, 23, 17, 28, 0, '2019-06-05', '2019-07-15', '09:30:00', '12:30:00', '', 1),
(22, 23, 17, 28, 0, '2019-06-06', '2019-07-16', '01:00:00', '04:00:00', '', 1),
(23, 23, 17, 28, 0, '2019-06-08', '2019-07-17', '04:00:00', '07:00:00', '', 1),
(24, 6, 16, 17, 0, '2019-06-05', '2019-07-10', '08:00:00', '09:30:00', '', 1),
(29, 14, 8, 18, 0, '2019-06-03', '2019-07-03', '18:00', '19:30', '<p>Android</p>', 1),
(30, 6, 16, 17, 0, '2019-06-05', '2019-07-15', '08:00', '09:30', '', 1),
(31, 6, 16, 27, 0, '2019-06-07', '2019-06-17', '16:00', '17:30', '', 1),
(32, 6, 10, 27, 0, '2019-06-10', '2019-07-20', '19:00', '20:30', '', 1),
(33, 2, 8, 29, 0, '2019-06-08', '2019-07-18', '09:30', '11:00', '', 1),
(34, 18, 8, 29, 0, '2019-06-05', '2019-07-15', '11:00', '12:30', '', 1),
(35, 18, 8, 29, 0, '2019-06-08', '2019-07-18', '13:00', '14:30', '', 1),
(36, 5, 8, 25, 0, '2019-06-06', '2019-07-19', '08:00', '09:30', '', 1),
(37, 16, 8, 34, 0, '2019-06-08', '2019-07-18', '14:30', '16:00', '', 1),
(38, 9, 8, 25, 0, '2019-06-08', '2019-07-18', '19:00', '20:30', '', 1),
(39, 8, 8, 35, 0, '2019-06-07', '2019-07-17', '17:30', '19:00', '', 1),
(40, 8, 19, 33, 0, '2019-06-05', '2019-07-15', '08:00', '09:30', '', 1),
(41, 23, 17, 28, 0, '2019-05-12', '2019-07-15', '19:00', '20:30', '', 1),
(42, 18, 9, 29, 0, '2019-06-12', '2019-07-22', '18:00', '19:00', '', 1),
(43, 5, 18, 38, 0, '2019-05-29', '2019-05-31', '00:00', '15:22', '', 1),
(44, 5, 18, 39, 0, '2019-06-05', '2019-06-30', '08:00', '09:00', '', 1),
(45, 5, 7, 39, 0, '2019-06-15', '2019-06-30', '11:00', '12:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `degree` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `degree`, `name`, `status`) VALUES
(1, 4, 'IT', 1),
(2, 4, 'EC', 1),
(3, 4, 'CS', 1),
(4, 4, 'Others', 1),
(5, 4, 'ME', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

DROP TABLE IF EXISTS `cms`;
CREATE TABLE IF NOT EXISTS `cms` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `page_name` varchar(245) DEFAULT NULL,
  `title` varchar(245) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `portfolio_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `top` int(11) NOT NULL DEFAULT '0',
  `bottom` int(11) NOT NULL DEFAULT '0',
  `controller` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`page_id`, `heading`, `page_name`, `title`, `meta_title`, `meta_keyword`, `meta_description`, `short_description`, `description`, `image`, `portfolio_id`, `status`, `top`, `bottom`, `controller`) VALUES
(1, 'About', 'a_little_about_tni_design', 'A Little About TNI Design', 'About', 'About', 'A Little About TNI Design', 'Architects, interior designers, development directors, project managers, graphic designers, contractors, design consultants, surveyors, and engineers - require comprehensive and accurate architectural designs on time.', '<p>\r\n\r\n</p><p>Residential: TNI Design has created multiple luxury and family homes, either from ground up or remodels. Our team has provided as-built plans, new drawings, interior design, landscaping, and permit processing services.</p><br><p>Commercial: TNI Design works with many sectors including : restaurants, retail, beauty, office and hotels. Services include creative design, drawings, renders, customer journey and the overall experience.</p>\r\n\r\n<br><p></p>', 'p34c13183.png', '', 1, 0, 0, 1),
(2, 'Home', 'tni_design_architectural_3d_rendering_service_provider_in_los', 'TNI Design & Architectural 3D Rendering Service Provider in Los', 'TNI Design', 'TNI Design', 'TNI Design & Architectural 3D Rendering Service Provider in Los', 'TNI Design & Architectural 3D Rendering Service Provider in Los', '<p>\r\n\r\n</p><p>Based in Los Angeles, TNI Design is a team of Architects and Interior Designers providing creative Interior Design, landscaping, imaging and construction documentation services to Private Individuals, Architects, Interior Designers, Businesses, Developers and building construction professionals.</p><p>Our design team has the ability and expertise to produce a custom design that will be relevant, compelling and engaging with the target consumer profile. We show our design recommendations through photo realistic renderings or 3-D walk-throughs, so the client is in no doubt what to expect from the finished product.</p><br><strong>We serve the Residential, Hospitality, Restaurant, and Retail industries.</strong>&nbsp;<br><br><p>Our team has delivered many highly successful design projects, designed and implemented internationally. Services range from concept design, complete interior and exterior facade packages, landscape design, layouts and detailed plans, signage package, furniture and layout, and contractor plans.</p><p>Fees are very competitive, and we have regularly demonstrated savings of over 50% on existing services, at the same or elevated quality.</p>\r\n\r\n<br><p></p>', '', '', 1, 0, 0, 0),
(3, 'Interior Projects', 'interior_project', 'Interior Projects', 'Interior Projects', 'Interior Projects', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Interior Projects', '<p>\r\n\r\n</p><div><div><p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. <br></p></div></div>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1, 0, 0, 0),
(4, 'Architecture', 'architecture', 'Architecture', 'Architecture', 'Architecture', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Architecture', '<p>\r\n\r\n</p><div><div><p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. <br></p></div></div>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1, 0, 0, 0),
(5, 'Landscaping', 'landscaping', 'Landscaping', 'Landscaping', 'Landscaping', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Landscaping', '<p>\r\n\r\n</p><div><div><p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. <br></p></div></div>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1, 0, 0, 0),
(6, 'Procurement', 'procurement', 'Procurement', 'Procurement', 'Procurement', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Procurement', '<p>\r\n\r\n</p><div><div><p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. <br></p></div></div>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '', '', 1, 0, 0, 0),
(7, 'Residential ', 'with_a_multi-talented_international_team_tni_design_brings_a_fresh_approach_to_home_design', 'With a multi-talented international team, TNI Design brings a fresh approach to home design.', 'TNI Design', 'TNI Design', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p>\r\n\r\n</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<br><p></p>', 'p2c65572e.png', '1,2,4', 1, 0, 0, 1),
(8, 'Restaurants', 'tni_design_has_its_roots_in_the_restaurant_world', 'TNI Design has its roots in the restaurant world.', 'TNI Design', 'TNI Design', 'TNI Design has its roots in the restaurant world.', 'Lead designer and CEO, Robert Ancill, is a well known, award winning international restaurant consultant and designer.\r\n\r\nUnder Robert’s leadership, TNI Design has delivered many highly successful restaurant design projects, designed and implemented internationally. Our clients include: Westfield Shopping Mall, Plant Power, Royal Caribbean, Protein House, Caliburger, Steak N Shake, Hungry Trader, Phood Farmacy, and Slapfish, to name a few.\r\n\r\nNo matter what type of restaurant, café or food service concept that is under consideration, TNI Design has the ability and expertise to produce a custom interior design that will be state of the art, compelling and engaging with the target consumer profile.\r\n\r\nOur team have delivered many highly successful restaurant design projects, designed and implemented internationally.', '<p>\r\n\r\n</p><h2>Services range from restaurant concept design, kitchen design, complete interior and outside facade packages, signage package, furniture and layout, and contractor plans.</h2><br><p>Our restaurant design capabilities include: restaurant decor theme creation, complete exterior restaurant façade design or upgrade, exterior restaurant marketing display design and manufacturing, interior restaurant marketing display design, and restaurant decor theme creation.</p><p>Our restaurant design capabilities include: restaurant decor theme creation, complete exterior restaurant façade design or upgrade, exterior restaurant marketing display design and manufacturing, interior restaurant marketing display design, and restaurant decor theme creation.</p>\r\n\r\n<br><p></p>', 'p2aeb8d6b.png', '1,2,6,7,8', 1, 0, 0, 1),
(9, 'Franchise', 'tni_design_provides_a_clear_interior_design_program_fo_franchisors_and_franchisees_with_a_dened_process_delivery_timeline_and_pre-agreed_cost_structure', 'TNI Design provides a clear Interior Design program fo Franchisors and Franchisees. with a de?ned process. delivery timeline and pre-agreed cost structure.', 'TNI Design TNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI ', 'TNI Design TNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI DesignTNI ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'TNI Design provides a clear Interior Design program fo Franchisors and Franchisees. with a de?ned process. delivery timeline and pre-agreed cost structure.', '<p>\r\n\r\n</p><div><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></div><div><div><ul><li>1. Layout – autocad plan</li><li>2. Kitchen and equipment plan</li><li>3. Photo Realistic Renders – 3d Max (interior and exterior)</li><li>4. Final working drawings</li><li>5. Consolidated procurement as required</li></ul></div></div><div><h2>TNI Design provides a clear Interior Design program fo Franchisors and Franchisees. with a de?ned process. delivery timeline and pre-agreed cost structure.</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></div>\r\n\r\n<br><p></p>', 'j27cc30c2.jpg', '1,2,4,5', 1, 0, 0, 1),
(10, 'marketing_imagery', 'architectural_3d_rendering_service_provider_in_los_angeles', 'Architectural 3D Rendering Service Provider in Los Angeles', 'marketing_imagery', 'marketing_imagery', 'marketing_imagery', 'TNI Interiors is a team of Architects and Interior Designers providing outsourced creative Interior design & architectural rendering, 3D renders, Revit 3D models and construction documentation services to Architects, Interior Designers and building construction professionals in and around Los Angeles', '<p>\r\n\r\nTNI Interiors is a team of Architects and <a target=\"_blank\" rel=\"nofollow\" href=\"http://www.tniinteriors.com/content/restaurant-interior-design-architect-services\">Interior Designers </a>providing outsourced creative <a target=\"_blank\" rel=\"nofollow\" href=\"http://www.tniinteriors.com/content/restaurant-interior-design-architect-services\">Interior design &amp; architectural rendering</a>, <a target=\"_blank\" rel=\"nofollow\" href=\"http://www.tniinteriors.com/content/photorealistic-3d-renders\">3D renders</a>, <a target=\"_blank\" rel=\"nofollow\" href=\"http://www.tniinteriors.com/content/revit-3d-models\">Revit 3D models </a>and construction documentation services to Architects, Interior Designers and building construction professionals in and around Los Angeles\r\n\r\n<br></p>', '', '', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `collagecode`
--

DROP TABLE IF EXISTS `collagecode`;
CREATE TABLE IF NOT EXISTS `collagecode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collagecode`
--

INSERT INTO `collagecode` (`id`, `name`, `code`, `status`) VALUES
(4, 'Lakshmi Narain College of Technology', '0103', 1),
(5, 'Lakshmi Narain College of Technology & Science', '0157', 1),
(6, 'Lakshmi Narain College of Technology Excellence', '0176', 1),
(7, 'J.N. College of Technology', '0131', 1),
(8, 'Oriental Institute of Science & Technology', '0105', 1),
(9, 'Oriental College of Technology', '0126', 1),
(10, 'Technocrat Institute of Technology', '0111', 1),
(11, 'Technocrats Institute of Technology [Excellence]', '0191', 1),
(12, 'Technocrats Institute of Technology & Science', '0192', 1),
(13, 'TIT College', '0199', 1),
(14, 'Truba Institute of Engg. & Information Technology', '0114', 1),
(15, 'Truba College of Science & Technology', '0533', 1),
(16, 'NRI Institute of Information Science & Technology', '0115', 1),
(17, 'NRI Institute of Research & Technology', '0511', 1),
(18, 'Radha Raman Institute of Technology & Science', '0132', 1),
(19, 'Radharaman Engineering College', '0158', 1),
(20, 'Sagar Institute of Research & Technology', '0133', 1),
(21, 'Sagar Institute of Research, Technology & Science', '0186', 1),
(22, 'Sagar Institute of Research & Technology Excellence', '0501', 1),
(23, 'Sagar Institute of Science & Technology', '0187', 1),
(24, 'Sagar Institute of Science Technology & Engineering', '0536', 1),
(25, 'Sagar Institute of Science & Technology & Research', '0537', 1),
(26, 'IES\'s College of Technology', '0177', 1),
(27, 'IES Institute of Technology and Management', '0526', 1),
(28, 'Bansal Institute of Science & Technology', '0112', 1),
(29, 'Bansal Institute of Research & Technology', '0173', 1),
(30, 'Bansal Institute of Research, Technology & Science', '0506', 1),
(31, 'All Saints\' College of Technology', '0116', 1),
(32, 'SAM College of Engineering & Technology', '0188', 1),
(33, 'Patel College of Science & Technology', '0128', 1),
(34, 'Trinity Institute of Technology & Research', '0198', 1),
(35, 'Millennium Institute of Technology & Science', '0179', 1),
(36, 'Corporate Institute of Science & Technology', '0502', 1),
(37, 'Scope College of Engineering', '0121', 1),
(38, 'Bhopal Institute of Technology & Science, Bangrasia', '0124', 1),
(39, 'Bhabha Engineering Research Institute', '0129', 1),
(40, 'Rajeev Gandhi Proudyogiki Mahavidylaya', '0159', 1),
(41, 'VNS Group of Institutions', '0161', 1),
(42, 'Acropolis Institute of Technology & Research', '0171', 1),
(43, 'Mittal Institute of Technology', '0180', 1),
(44, 'Surabhi College of Engineering & Technology', '0508', 1),
(45, 'Laxmipati Institute of Science & Technology', '0510', 1),
(46, 'Bagula Mukhi College of Technology', '0525', 1),
(47, 'Vidhyapeeth Institute of Science & Technology', '0531', 1),
(48, 'Sha-Shib College of Technology', '0532', 1),
(49, 'Kopal Institute of Science & Technology', '0538', 1),
(50, 'Millennium Institute of Technology', '0540', 1),
(51, 'Malhotra Technical Research Institute', '0543', 1),
(52, 'University Institute of Technology, RGPV', '0101', 1),
(53, 'others', '1', 1),
(54, 'RKDF Institute Of Science and Technology', '0104', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `technology` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `technology`, `description`, `status`, `date`) VALUES
(6, 'advance java', 2, '<p>MAJOR TRAINING</p>', 1, '2019-05-10 11:49:41'),
(7, 'core java', 2, '<p>core java<br></p>', 1, '2019-05-10 13:47:36'),
(8, 'java', 2, '<p>java</p>', 1, '2019-05-10 14:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

DROP TABLE IF EXISTS `degree`;
CREATE TABLE IF NOT EXISTS `degree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id`, `name`, `semester`, `status`) VALUES
(4, 'B.E', '1,2', 1),
(5, 'Others', NULL, 1),
(6, 'MCA', '1,2,3,4,5,6', 1),
(7, 'B Com', '1,2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(245) DEFAULT NULL,
  `from_email` varchar(245) DEFAULT NULL,
  `subject` varchar(245) DEFAULT NULL,
  `body` text,
  `from_name` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`email_id`, `type`, `from_email`, `subject`, `body`, `from_name`) VALUES
(1, 'newsletter', 'support@tnidesign.com', 'Newsletter', 'Hello {email}<br><br>\r\n\r\nWelcome to TNI Design,\r\n\r\nYou successfully subcribed as newsletter.<div>We will contact you shortly.<br><br>\r\n\r\n\r\nRegards,  \r\n\r\n\r\n\r\nTNI Design</div>', 'TNI Design Support Team'),
(2, 'contact_us', 'support@tnidesign.com', 'Contact Us', 'Hello {user}<br><br>\r\n\r\nWelcome to TNI Design,\r\n\r\nYou successfully contact with admin.<div><br><br>\r\n\r\n\r\nRegards,  \r\n\r\n\r\n\r\nTNI Design\r\n\r\n\r\n<br><br></div>', 'TNI Design Support Team'),
(3, 'forgot_password_admin', 'support@tnidesign.com', 'Forgot Password', 'Hello Admin,<br><br>\r\nYour new login details are as follows-<br><br>\r\nUsername : {usr}<br>\r\nPassword : {passwords}<br><br>\r\nPlease save this email or write down your password as you will need it to login into your account.<br><br>', 'TNI Design Support Team');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` int(11) NOT NULL,
  `job_type` int(11) NOT NULL,
  `name` varchar(245) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` text,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `course`, `job_type`, `name`, `email`, `mobile`, `address`, `description`, `image`, `status`, `date`, `category_id`) VALUES
(1, 1, 1, 'bhupendra singh jat', 'bjat@admin.com', '9887777777', 'bhopal', '<p>hello</p>', 'p1f655d58.png', 1, '2019-04-27 15:01:55', 0),
(2, 1, 1, 'bhupendra singh jat', 'bjat12121@admin.com', '9887777333', 'bhopal', '<p>Hello</p>', '', 1, '2019-05-02 12:54:53', 0),
(3, 4, 1, 'Mukesh', 'admin@admin.com', '9898998787', 'bhopal', '<p>hello</p>', '', 1, '2019-05-02 14:35:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fees_payment`
--

DROP TABLE IF EXISTS `fees_payment`;
CREATE TABLE IF NOT EXISTS `fees_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `feesdate` date NOT NULL,
  `type` int(11) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `datetimes` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_payment`
--

INSERT INTO `fees_payment` (`id`, `s_id`, `batch_id`, `amount`, `feesdate`, `type`, `transaction_type`, `status`, `created_by`, `datetimes`) VALUES
(1, 1, 36, 200, '2019-06-02', 0, 'Cash', 1, '', '2019-06-02 06:29:40'),
(2, 2, 45, 700, '2019-06-02', 0, 'Cash', 0, '', '2019-06-02 07:02:52'),
(3, 3, 36, 200, '2019-06-02', 0, 'Cash', 0, '', '2019-06-02 07:06:49'),
(4, 4, 36, 4500, '2019-06-02', 0, 'Cash', 0, '', '2019-06-02 16:33:46'),
(5, 5, 36, 3000, '2019-06-02', 0, 'Cash', 0, '', '2019-06-02 16:34:36'),
(6, 6, 44, 450, '2019-06-02', 0, 'Cash', 0, '', '2019-06-02 16:39:22'),
(7, 7, 44, 1000, '2019-06-02', 0, 'Cash', 0, '', '2019-06-02 16:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

DROP TABLE IF EXISTS `lab`;
CREATE TABLE IF NOT EXISTS `lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `name`, `zone`, `capacity`, `status`) VALUES
(7, 'Dragon war', 'zone 1', 32, 1),
(8, 'Cyber Greek', 'Zone 1', 26, 1),
(9, 'Magic Grid', 'Zone 1', 26, 1),
(10, 'Hacker Space', 'Zone 2', 32, 1),
(11, 'Nexus', 'Zone 2', 32, 1),
(12, 'IJT', 'Zone 3', 28, 1),
(13, 'Hardware', 'Zone 3', 26, 1),
(14, 'Selfie', 'Zone 3', 25, 1),
(15, 'Think Digital', 'Zone 4', 30, 1),
(16, 'Cybrom 1', 'Zone 4', 30, 1),
(17, 'Cybrom 2', 'Zone 4', 30, 1),
(18, 'Audi 1', 'Zone 5', 40, 1),
(19, 'Audi 2', 'Zone 5', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mapping`
--

DROP TABLE IF EXISTS `mapping`;
CREATE TABLE IF NOT EXISTS `mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active,0=delete',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapping`
--

INSERT INTO `mapping` (`id`, `test_id`, `batch_id`, `IsActive`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 2, 44, 1, NULL, '2019-06-02 16:37:55', NULL, '0000-00-00 00:00:00'),
(2, 2, 45, 1, NULL, '2019-06-02 16:38:18', NULL, '0000-00-00 00:00:00'),
(3, 3, 44, 1, NULL, '2019-06-02 20:03:39', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `status`, `added_date`) VALUES
(1, '10 Tips for Home Renovation', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it', 'ja900aab1.jpg', 1, '2018-09-19 18:30:00'),
(2, '10 Tips for Home Renovation Projects', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it', 'image_2.png', 1, '2018-09-19 18:30:00'),
(3, '10 Tips for Home Design', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it', 'image_3.png', 1, '2018-09-19 18:30:00'),
(4, '10 Tips for Home Renovation Projects', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it', 'p3368a293.png', 1, '2018-09-19 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `permissions_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` tinyint(11) NOT NULL,
  `page_id` tinyint(4) DEFAULT '0',
  `add_access` tinyint(4) DEFAULT '0',
  `edit_access` tinyint(4) DEFAULT '0',
  `delete_access` tinyint(4) DEFAULT '0',
  `view_access` tinyint(4) DEFAULT '0',
  `no_access` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`permissions_id`)
) ENGINE=InnoDB AUTO_INCREMENT=451 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permissions_id`, `admin_id`, `page_id`, `add_access`, `edit_access`, `delete_access`, `view_access`, `no_access`) VALUES
(1, 13, 1, 0, 0, 0, 1, 0),
(2, 13, 2, 1, 0, 0, 0, 0),
(3, 13, 3, 0, 0, 0, 0, 0),
(4, 13, 4, 0, 0, 0, 1, 0),
(5, 13, 5, 0, 0, 0, 0, 0),
(6, 13, 6, 1, 0, 0, 0, 0),
(7, 13, 7, 0, 0, 0, 0, 0),
(8, 13, 8, 0, 0, 0, 1, 0),
(9, 13, 9, 0, 0, 0, 0, 0),
(10, 13, 10, 1, 0, 0, 0, 0),
(11, 13, 11, 0, 0, 0, 1, 0),
(12, 14, 1, 0, 0, 0, 1, 0),
(13, 14, 2, 1, 0, 0, 0, 0),
(14, 14, 3, 0, 0, 0, 0, 0),
(15, 14, 4, 0, 0, 0, 1, 0),
(16, 14, 5, 0, 0, 0, 0, 0),
(17, 14, 6, 1, 0, 0, 0, 0),
(18, 14, 7, 0, 0, 0, 0, 0),
(19, 14, 8, 0, 0, 0, 1, 0),
(20, 14, 9, 0, 0, 0, 0, 0),
(21, 14, 10, 1, 0, 0, 0, 0),
(22, 14, 11, 0, 0, 0, 1, 0),
(56, 15, 1, 0, 0, 0, 0, 1),
(57, 15, 2, 0, 0, 0, 0, 1),
(58, 15, 3, 0, 0, 0, 1, 0),
(59, 15, 4, 0, 0, 0, 0, 1),
(60, 15, 5, 0, 1, 0, 0, 0),
(61, 15, 6, 1, 1, 0, 0, 0),
(62, 15, 7, 1, 1, 0, 1, 0),
(63, 15, 8, 0, 0, 0, 1, 0),
(64, 15, 9, 0, 0, 0, 0, 1),
(65, 15, 10, 0, 0, 0, 0, 1),
(66, 15, 11, 0, 0, 0, 0, 1),
(67, 20, 1, 1, 1, 1, 1, 0),
(68, 20, 2, 1, 1, 1, 1, 0),
(69, 20, 3, 1, 1, 1, 1, 0),
(70, 20, 4, 1, 1, 1, 1, 0),
(71, 20, 5, 1, 1, 1, 1, 0),
(72, 20, 6, 1, 1, 1, 1, 0),
(73, 20, 7, 1, 1, 1, 1, 0),
(74, 20, 8, 1, 1, 1, 1, 0),
(75, 20, 9, 1, 1, 1, 1, 0),
(76, 20, 10, 1, 1, 1, 1, 0),
(77, 20, 11, 1, 1, 1, 1, 0),
(78, 20, 12, 1, 1, 1, 1, 0),
(79, 21, 1, 0, 0, 0, 0, 0),
(80, 21, 2, 0, 0, 0, 0, 0),
(81, 21, 3, 0, 0, 0, 0, 0),
(82, 21, 4, 0, 0, 0, 0, 0),
(83, 21, 5, 0, 0, 0, 0, 0),
(84, 21, 6, 0, 0, 0, 0, 0),
(85, 21, 7, 0, 0, 0, 0, 0),
(86, 21, 8, 0, 0, 0, 0, 0),
(87, 21, 9, 0, 0, 0, 0, 0),
(88, 21, 10, 0, 0, 0, 0, 0),
(89, 21, 11, 0, 0, 0, 0, 0),
(90, 21, 12, 1, 1, 1, 1, 0),
(91, 22, 1, 0, 0, 0, 0, 0),
(92, 22, 2, 0, 0, 0, 0, 0),
(93, 22, 3, 0, 0, 0, 0, 0),
(94, 22, 4, 0, 0, 0, 0, 0),
(95, 22, 5, 0, 0, 0, 0, 0),
(96, 22, 6, 0, 0, 0, 0, 0),
(97, 22, 7, 0, 0, 0, 0, 0),
(98, 22, 8, 0, 0, 0, 0, 0),
(99, 22, 9, 0, 0, 0, 0, 0),
(100, 22, 10, 0, 0, 0, 0, 0),
(101, 22, 11, 0, 0, 0, 0, 0),
(102, 22, 12, 0, 0, 0, 0, 0),
(103, 23, 1, 0, 0, 0, 1, 0),
(104, 23, 2, 0, 0, 0, 1, 0),
(105, 23, 3, 0, 0, 0, 1, 0),
(106, 23, 4, 0, 0, 0, 1, 0),
(107, 23, 5, 0, 0, 0, 1, 0),
(108, 23, 6, 0, 0, 0, 1, 0),
(109, 23, 7, 0, 0, 0, 1, 0),
(110, 23, 8, 0, 0, 0, 1, 0),
(111, 23, 9, 0, 0, 0, 1, 0),
(112, 23, 10, 0, 0, 0, 1, 0),
(113, 23, 11, 1, 1, 1, 1, 0),
(114, 23, 12, 1, 1, 1, 1, 0),
(115, 24, 1, 0, 0, 0, 0, 0),
(116, 24, 2, 0, 0, 0, 0, 0),
(117, 24, 3, 0, 0, 0, 0, 0),
(118, 24, 4, 0, 0, 0, 0, 0),
(119, 24, 5, 0, 0, 0, 0, 0),
(120, 24, 6, 0, 0, 0, 0, 0),
(121, 24, 7, 0, 0, 0, 0, 0),
(122, 24, 8, 0, 0, 0, 0, 0),
(123, 24, 9, 0, 0, 0, 0, 0),
(124, 24, 10, 0, 0, 0, 0, 0),
(125, 24, 11, 0, 0, 0, 0, 0),
(126, 24, 12, 0, 0, 0, 0, 0),
(127, 25, 1, 0, 0, 0, 0, 0),
(128, 25, 2, 0, 0, 0, 0, 0),
(129, 25, 3, 0, 0, 0, 0, 0),
(130, 25, 4, 0, 0, 0, 0, 0),
(131, 25, 5, 0, 0, 0, 0, 0),
(132, 25, 6, 0, 0, 0, 0, 0),
(133, 25, 7, 0, 0, 0, 0, 0),
(134, 25, 8, 0, 0, 0, 0, 0),
(135, 25, 9, 0, 0, 0, 0, 0),
(136, 25, 10, 0, 0, 0, 0, 0),
(137, 25, 11, 0, 0, 0, 0, 0),
(138, 25, 12, 0, 0, 0, 0, 0),
(139, 26, 1, 0, 0, 0, 0, 0),
(140, 26, 2, 0, 0, 0, 0, 0),
(141, 26, 3, 0, 0, 0, 0, 0),
(142, 26, 4, 0, 0, 0, 0, 0),
(143, 26, 5, 0, 0, 0, 0, 0),
(144, 26, 6, 0, 0, 0, 0, 0),
(145, 26, 7, 0, 0, 0, 0, 0),
(146, 26, 8, 0, 0, 0, 0, 0),
(147, 26, 9, 0, 0, 0, 0, 0),
(148, 26, 10, 0, 0, 0, 0, 0),
(149, 26, 11, 0, 0, 0, 0, 0),
(150, 26, 12, 0, 0, 0, 0, 0),
(151, 27, 1, 0, 0, 0, 0, 0),
(152, 27, 2, 0, 0, 0, 0, 0),
(153, 27, 3, 0, 0, 0, 0, 0),
(154, 27, 4, 0, 0, 0, 0, 0),
(155, 27, 5, 0, 0, 0, 0, 0),
(156, 27, 6, 0, 0, 0, 0, 0),
(157, 27, 7, 0, 0, 0, 0, 0),
(158, 27, 8, 0, 0, 0, 0, 0),
(159, 27, 9, 0, 0, 0, 0, 0),
(160, 27, 10, 0, 0, 0, 0, 0),
(161, 27, 11, 0, 0, 0, 0, 0),
(162, 27, 12, 0, 0, 0, 0, 0),
(163, 28, 1, 0, 0, 0, 0, 0),
(164, 28, 2, 0, 0, 0, 0, 0),
(165, 28, 3, 0, 0, 0, 0, 0),
(166, 28, 4, 0, 0, 0, 0, 0),
(167, 28, 5, 0, 0, 0, 0, 0),
(168, 28, 6, 0, 0, 0, 0, 0),
(169, 28, 7, 0, 0, 0, 0, 0),
(170, 28, 8, 0, 0, 0, 0, 0),
(171, 28, 9, 0, 0, 0, 0, 0),
(172, 28, 10, 0, 0, 0, 0, 0),
(173, 28, 11, 0, 0, 0, 0, 0),
(174, 28, 12, 0, 0, 0, 0, 0),
(175, 29, 1, 0, 0, 0, 0, 0),
(176, 29, 2, 0, 0, 0, 0, 0),
(177, 29, 3, 0, 0, 0, 0, 0),
(178, 29, 4, 0, 0, 0, 0, 0),
(179, 29, 5, 0, 0, 0, 0, 0),
(180, 29, 6, 0, 0, 0, 0, 0),
(181, 29, 7, 0, 0, 0, 0, 0),
(182, 29, 8, 0, 0, 0, 0, 0),
(183, 29, 9, 0, 0, 0, 0, 0),
(184, 29, 10, 0, 0, 0, 0, 0),
(185, 29, 11, 0, 0, 0, 0, 0),
(186, 29, 12, 0, 0, 0, 0, 0),
(187, 30, 1, 0, 0, 0, 0, 0),
(188, 30, 2, 0, 0, 0, 0, 0),
(189, 30, 3, 0, 0, 0, 0, 0),
(190, 30, 4, 0, 0, 0, 0, 0),
(191, 30, 5, 0, 0, 0, 0, 0),
(192, 30, 6, 0, 0, 0, 0, 0),
(193, 30, 7, 0, 0, 0, 0, 0),
(194, 30, 8, 0, 0, 0, 0, 0),
(195, 30, 9, 0, 0, 0, 0, 0),
(196, 30, 10, 0, 0, 0, 0, 0),
(197, 30, 11, 0, 0, 0, 0, 0),
(198, 30, 12, 0, 0, 0, 0, 0),
(210, 17, 12, 0, 0, 0, 0, 0),
(223, 31, 1, 0, 0, 0, 0, 0),
(224, 31, 2, 0, 0, 0, 1, 0),
(225, 31, 3, 1, 0, 0, 0, 0),
(226, 31, 4, 0, 0, 0, 0, 0),
(227, 31, 5, 0, 0, 0, 0, 0),
(228, 31, 6, 0, 0, 0, 0, 0),
(229, 31, 7, 0, 0, 0, 0, 0),
(230, 31, 8, 0, 0, 0, 0, 0),
(231, 31, 9, 0, 0, 0, 0, 0),
(232, 31, 10, 0, 0, 0, 0, 0),
(233, 31, 11, 0, 0, 0, 0, 0),
(234, 31, 12, 0, 0, 0, 0, 0),
(247, 32, 1, 0, 0, 0, 1, 0),
(248, 32, 2, 0, 0, 0, 1, 0),
(249, 32, 3, 0, 0, 0, 1, 0),
(250, 32, 4, 0, 0, 0, 1, 0),
(251, 32, 5, 0, 0, 0, 1, 0),
(252, 32, 6, 0, 0, 0, 0, 0),
(253, 32, 7, 0, 0, 0, 0, 0),
(254, 32, 8, 0, 0, 0, 1, 0),
(255, 32, 9, 0, 0, 0, 1, 0),
(256, 32, 10, 0, 0, 0, 0, 0),
(257, 32, 11, 0, 0, 0, 0, 0),
(258, 32, 12, 0, 0, 0, 0, 0),
(270, 18, 12, 0, 0, 0, 0, 0),
(271, 33, 1, 0, 0, 0, 0, 0),
(272, 33, 2, 0, 0, 0, 0, 0),
(273, 33, 3, 0, 0, 0, 0, 0),
(274, 33, 4, 0, 0, 0, 0, 0),
(275, 33, 5, 0, 0, 0, 0, 0),
(276, 33, 6, 0, 0, 0, 0, 0),
(277, 33, 7, 0, 0, 0, 0, 0),
(278, 33, 8, 0, 0, 0, 0, 0),
(279, 33, 9, 0, 0, 0, 0, 0),
(280, 33, 10, 0, 0, 0, 0, 0),
(281, 33, 11, 0, 0, 0, 0, 0),
(282, 33, 12, 0, 0, 0, 0, 0),
(283, 34, 1, 0, 0, 0, 0, 0),
(284, 34, 2, 0, 0, 0, 0, 0),
(285, 34, 3, 0, 0, 0, 0, 0),
(286, 34, 4, 0, 0, 0, 0, 0),
(287, 34, 5, 0, 0, 0, 0, 0),
(288, 34, 6, 0, 0, 0, 0, 0),
(289, 34, 7, 0, 0, 0, 0, 0),
(290, 34, 8, 0, 0, 0, 0, 0),
(291, 34, 9, 0, 0, 0, 0, 0),
(292, 34, 10, 0, 0, 0, 0, 0),
(293, 34, 11, 0, 0, 0, 0, 0),
(294, 34, 12, 0, 0, 0, 0, 0),
(295, 35, 1, 0, 0, 0, 0, 0),
(296, 35, 2, 0, 0, 0, 0, 0),
(297, 35, 3, 0, 0, 0, 0, 0),
(298, 35, 4, 0, 0, 0, 0, 0),
(299, 35, 5, 0, 0, 0, 0, 0),
(300, 35, 6, 0, 0, 0, 0, 0),
(301, 35, 7, 0, 0, 0, 0, 0),
(302, 35, 8, 0, 0, 0, 0, 0),
(303, 35, 9, 0, 0, 0, 0, 0),
(304, 35, 10, 0, 0, 0, 0, 0),
(305, 35, 11, 0, 0, 0, 0, 0),
(306, 35, 12, 0, 0, 0, 0, 0),
(403, 38, 1, 0, 0, 0, 0, 0),
(404, 38, 2, 0, 0, 0, 0, 0),
(405, 38, 3, 0, 0, 0, 0, 0),
(406, 38, 4, 0, 0, 0, 0, 0),
(407, 38, 5, 0, 0, 0, 0, 0),
(408, 38, 6, 0, 0, 0, 0, 0),
(409, 38, 7, 0, 0, 0, 0, 0),
(410, 38, 8, 0, 0, 0, 0, 0),
(411, 38, 9, 0, 0, 0, 0, 0),
(412, 38, 10, 0, 0, 0, 0, 0),
(413, 38, 11, 0, 0, 0, 0, 0),
(414, 38, 12, 0, 0, 0, 0, 0),
(415, 37, 1, 0, 0, 0, 0, 0),
(416, 37, 2, 0, 0, 0, 0, 0),
(417, 37, 3, 0, 0, 0, 0, 0),
(418, 37, 4, 0, 0, 0, 0, 0),
(419, 37, 5, 0, 0, 0, 0, 0),
(420, 37, 6, 0, 0, 0, 0, 0),
(421, 37, 7, 0, 0, 0, 0, 0),
(422, 37, 8, 0, 0, 0, 0, 0),
(423, 37, 9, 0, 0, 0, 0, 0),
(424, 37, 10, 0, 0, 0, 0, 0),
(425, 37, 11, 0, 0, 0, 0, 0),
(426, 37, 12, 0, 0, 0, 0, 0),
(427, 36, 1, 0, 0, 0, 0, 0),
(428, 36, 2, 0, 0, 0, 0, 0),
(429, 36, 3, 0, 0, 0, 0, 0),
(430, 36, 4, 0, 0, 0, 0, 0),
(431, 36, 5, 0, 0, 0, 0, 0),
(432, 36, 6, 0, 0, 0, 0, 0),
(433, 36, 7, 0, 0, 0, 0, 0),
(434, 36, 8, 0, 0, 0, 0, 0),
(435, 36, 9, 0, 0, 0, 0, 0),
(436, 36, 10, 0, 0, 0, 0, 0),
(437, 36, 11, 0, 0, 0, 0, 0),
(438, 36, 12, 0, 0, 0, 0, 0),
(439, 39, 1, 1, 1, 1, 1, 0),
(440, 39, 2, 0, 0, 0, 0, 0),
(441, 39, 3, 0, 0, 0, 0, 0),
(442, 39, 4, 0, 0, 0, 0, 0),
(443, 39, 5, 0, 0, 0, 0, 0),
(444, 39, 6, 0, 0, 0, 0, 0),
(445, 39, 7, 0, 0, 0, 0, 0),
(446, 39, 8, 0, 0, 0, 0, 0),
(447, 39, 9, 0, 0, 0, 0, 0),
(448, 39, 10, 0, 0, 0, 0, 0),
(449, 39, 11, 0, 0, 0, 0, 0),
(450, 39, 12, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `mendetory` tinyint(1) DEFAULT '0',
  `response` text NOT NULL,
  `answare` varchar(255) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active,0=delete',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `test_id`, `question`, `type`, `mendetory`, `response`, `answare`, `IsActive`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(5, 13, 'what is java', 1, 1, '[\"java is programming language\",\"java is scripting language\",\"both\",\"non of these\"]', '1', 1, 17, '2019-05-24 22:08:03', NULL, '0000-00-00 00:00:00'),
(6, 13, 'second question', 1, NULL, '[\"one \",\"two\",\"three\",\"four\"]', '1', 1, 17, '2019-05-24 22:08:52', NULL, '0000-00-00 00:00:00'),
(7, 14, 'How many Data types?', 1, NULL, '[\"2\",\"5\",\"6\",\"8\"]', '2', 1, 18, '2019-05-25 06:47:11', NULL, '0000-00-00 00:00:00'),
(8, 14, 'What would be the output of following: $array = array( 1 => \"a\", \"1\" => \"b\", 1.5 => \"c\", true => \"d\", ); print_r($array);', 1, NULL, '[\"A\",\"B\",\"C\",\"D\"]', '4', 1, 18, '2019-05-25 06:47:36', NULL, '0000-00-00 00:00:00'),
(9, 15, 'What would be the output of the following?  var_dump(0123 == 123); var_dump(\'0123\' == 123);  var_dump(\'0123\' === 123); ', 1, NULL, '[\"A\",\"B\",\"C\",\"D\"]', '', 1, 18, '2019-05-25 06:49:29', NULL, '0000-00-00 00:00:00'),
(10, 15, 'What would be the output of the following?  var_dump(0123 == 123); var_dump(\'0123\' == 123);  var_dump(\'0123\' === 123);;', 2, 1, '[\"A\",\"B\",\"C\",\"D\"]', '', 1, 18, '2019-05-25 06:49:53', NULL, '0000-00-00 00:00:00'),
(11, 13, 'new question', 1, NULL, '[\"one\",\"two\",\"three\",\"four\"]', '1', 1, 17, '2019-05-25 12:51:25', NULL, '0000-00-00 00:00:00'),
(12, 2, 'first question', 1, 1, '[\"one\",\"two\",\"three\",\"four\"]', '1', 1, 39, '2019-06-02 07:03:57', NULL, '0000-00-00 00:00:00'),
(13, 2, 'second question', 1, NULL, '[\"1\",\"2\",\"3\",\"4\"]', '1', 1, 39, '2019-06-02 07:04:18', NULL, '0000-00-00 00:00:00'),
(14, 2, 'three question', 1, NULL, '[\"11\",\"22\",\"33\",\"44\"]', '3', 1, 39, '2019-06-02 07:05:00', NULL, '0000-00-00 00:00:00'),
(15, 2, 'fore question', 1, NULL, '[\"one\",\"two\",\"three\",\"four\"]', '1', 1, 39, '2019-06-02 07:34:53', NULL, '0000-00-00 00:00:00'),
(16, 2, 'five question', 2, NULL, '[\"one\",\"two\",\"three\",\"four\"]', '1,2', 1, 39, '2019-06-02 10:10:21', NULL, '0000-00-00 00:00:00'),
(17, 2, 'six', 1, NULL, '[\"one\",\"two\",\"three\",\"four\"]', '', 1, 39, '2019-06-02 10:10:42', NULL, '0000-00-00 00:00:00'),
(18, 1, 'one', 1, 1, '[\"one\",\"two\",\"three\",\"four\"]', '1', 1, 39, '2019-06-02 16:28:10', NULL, '0000-00-00 00:00:00'),
(19, 1, 'second question', 1, NULL, '[\"1\",\"2\",\"3\",\"4\"]', '1', 1, 39, '2019-06-02 16:28:35', NULL, '0000-00-00 00:00:00'),
(20, 3, 'one', 1, NULL, '[\"one\",\"two\",\"three\",\"four\"]', '1', 1, 39, '2019-06-02 19:53:22', 39, '2019-06-02 20:02:43'),
(21, 3, 'second', 1, NULL, '[\"one\",\"two\",\"three\",\"four\"]', '1', 1, 39, '2019-06-02 20:00:49', NULL, '0000-00-00 00:00:00'),
(22, 3, 'multi', 2, NULL, '[\"one\",\"second\",\"third\",\"four\"]', '1,4', 1, 39, '2019-06-02 20:01:25', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `field`, `value`) VALUES
(1, 'contact_email', 'info@omsoftware.net'),
(2, 'contact_number', '1234567890'),
(3, 'contact_address', 'Saket Nagar bhopal'),
(4, 'general_meta_tags', 'TNI Design'),
(5, 'general_meta_desc', 'TNI Design'),
(6, 'general_meta_title', 'TNI Design'),
(7, 'contact_name', 'TNI Design'),
(96, 'smtp_username', 'neeraj@omsoftware.us'),
(97, 'smtp_password', 'p#T),4M[Jm1d'),
(98, 'smtp_host', 'mail.omsoftware.us'),
(99, 'smtp_port', '25'),
(100, 'managevideo', 'https://youtu.be/Aon82i0k0ps'),
(101, 'managevideo_type', '2'),
(104, 'facebook_url', 'http://www.facebook.com'),
(105, 'linkedin_url', 'http://www.linkedin.com'),
(106, 'google_plus_url', 'http://plus.google.com/'),
(108, 'twitter_url', 'https://twitter.com/login?lang=en'),
(109, 'instagram_url', 'https://www.instagram.com/');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `technology` int(11) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `batch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `college` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `alt_mobile` varchar(255) DEFAULT NULL,
  `adhar` varchar(255) DEFAULT NULL,
  `roll_no` varchar(255) DEFAULT NULL,
  `degree` int(11) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `semister` varchar(255) DEFAULT NULL,
  `totalfees` int(11) DEFAULT NULL,
  `internship` int(11) DEFAULT NULL,
  `testseries` int(11) DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `feesdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `payment_mode` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `technology`, `topic`, `batch_id`, `name`, `college`, `email`, `mobile`, `alt_mobile`, `adhar`, `roll_no`, `degree`, `branch`, `semister`, `totalfees`, `internship`, `testseries`, `fees`, `feesdate`, `address`, `payment_mode`, `status`, `date`) VALUES
(1, 5, '', 36, 'manish', 42, 'manish09.chakravarti@gmail.com', '9856985640', NULL, NULL, '9856985611', 4, '1', '1', 5000, NULL, 1, NULL, NULL, NULL, NULL, 1, '2019-06-02 06:29:40'),
(2, 5, '', 45, 'monu', 42, 'manish@gmail.com', '9856985644', NULL, NULL, '9856985644', 4, '1', '1', 6500, NULL, 1, NULL, NULL, NULL, NULL, 0, '2019-06-02 07:02:52'),
(3, 5, '', 36, 'monu', 42, 'monu@gmail.com', '9856985644', NULL, NULL, '5352531122', 4, '1', '1', 6500, NULL, 1, NULL, NULL, NULL, NULL, 0, '2019-06-02 07:06:49'),
(4, 5, '', 36, 'user one', 42, 'test@gmail.com', '9856985644', NULL, NULL, '9856985612', 4, '1', '1', 5000, NULL, 1, NULL, NULL, NULL, NULL, 0, '2019-06-02 16:33:46'),
(5, 5, '', 36, 'test two', 42, 'test@gmail.com', '9856985641', NULL, NULL, '9856985613', 4, '1', '1', 5000, NULL, 1, NULL, NULL, NULL, NULL, 0, '2019-06-02 16:34:36'),
(6, 5, '', 44, 'user one', 42, 'test@gmail.com', '9856985640', NULL, NULL, '9856985671', 4, '1', '1', 5000, NULL, 1, NULL, NULL, NULL, NULL, 0, '2019-06-02 16:39:22'),
(7, 5, '', 44, 'manish chakravarti', 42, 'manish09.chakravarti@gmail.com', '9856985640', NULL, NULL, '9856985672', 4, '1', '1', 6000, NULL, 1, NULL, NULL, NULL, NULL, 0, '2019-06-02 16:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

DROP TABLE IF EXISTS `technology`;
CREATE TABLE IF NOT EXISTS `technology` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`id`, `name`, `topic`, `status`) VALUES
(5, 'PYTHON', NULL, 1),
(6, 'PYTHON WITH DJANGO', NULL, 1),
(7, 'WEB DEVELOPMENT(PHP)', NULL, 1),
(8, 'WEB DEVELOPMENT(MEAN)', NULL, 1),
(9, 'ANDROID', NULL, 1),
(10, 'ANDROID+IOS', NULL, 1),
(11, 'REDHAT', NULL, 1),
(13, 'CLOUD-AWS', NULL, 1),
(14, 'BID DATA ANALYTICS', NULL, 1),
(16, 'NETWORK SECURITY', NULL, 1),
(18, 'ADVANCE JAVA', NULL, 1),
(19, 'CLOUD(API)', NULL, 1),
(20, 'MACHINE LEARNING', NULL, 1),
(23, 'BIG DATA DEVELOPMENT', NULL, 1),
(24, 'BLOCK CHAIN', NULL, 1),
(25, 'CLOUD WITH AUTOMATION', 'tranning,internship,executive_lecture', 1),
(28, 'BIGDATA MACHINE LEARNING', 'tranning,internship,executive_lecture,project', 1),
(30, 'Core Java', 'tranning,internship', 1),
(31, 'java', 'tranning,internship,executive_lecture', 1),
(32, 'php', 'tranning,internship,executive_lecture', 1);

-- --------------------------------------------------------

--
-- Table structure for table `technology_detail`
--

DROP TABLE IF EXISTS `technology_detail`;
CREATE TABLE IF NOT EXISTS `technology_detail` (
  `faculty_id` int(11) DEFAULT NULL,
  `technology` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IsActive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technology_detail`
--

INSERT INTO `technology_detail` (`faculty_id`, `technology`, `dates`, `status`, `id`, `IsActive`) VALUES
(38, 5, '2019-05-25 21:17:23', 0, 1, 1),
(38, 7, '2019-05-25 21:47:20', 0, 2, 1),
(38, 6, '2019-05-25 21:48:48', 0, 3, 1),
(38, 9, '2019-05-25 21:48:48', 0, 4, 1),
(37, 5, '2019-05-25 22:01:14', 0, 5, 1),
(36, 7, '2019-05-28 19:53:55', 0, 6, 1),
(39, 5, '2019-06-02 06:26:06', 0, 7, 1),
(39, 6, '2019-06-02 06:26:06', 0, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_answares`
--

DROP TABLE IF EXISTS `test_answares`;
CREATE TABLE IF NOT EXISTS `test_answares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_attempt_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answare` varchar(50) DEFAULT NULL,
  `IsCorrect` tinyint(4) NOT NULL DEFAULT '0',
  `IsActive` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active,0=delete',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_answares`
--

INSERT INTO `test_answares` (`id`, `test_attempt_id`, `type`, `question_id`, `answare`, `IsCorrect`, `IsActive`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 1, 1, 12, '1', 1, 1, NULL, '2019-06-02 16:40:56', NULL, '2019-06-02 16:40:56'),
(2, 1, 1, 13, '1', 1, 1, NULL, '2019-06-02 16:40:56', NULL, '2019-06-02 16:40:56'),
(3, 1, 1, 14, '1', 0, 1, NULL, '2019-06-02 16:40:56', NULL, '2019-06-02 16:40:56'),
(4, 1, 1, 15, '1', 1, 1, NULL, '2019-06-02 16:40:56', NULL, '2019-06-02 16:40:56'),
(5, 1, 2, 16, '[\"1\",\"2\"]', 1, 1, NULL, '2019-06-02 16:40:56', NULL, '2019-06-02 16:40:56'),
(6, 1, 1, 17, '1', 0, 1, NULL, '2019-06-02 16:40:56', NULL, '2019-06-02 16:40:56'),
(7, 2, 1, 12, '1', 1, 1, NULL, '2019-06-02 17:21:16', NULL, '2019-06-02 17:21:16'),
(8, 2, 1, 13, '1', 1, 1, NULL, '2019-06-02 17:21:16', NULL, '2019-06-02 17:21:16'),
(9, 2, 1, 14, '1', 0, 1, NULL, '2019-06-02 17:21:16', NULL, '2019-06-02 17:21:16'),
(10, 2, 1, 15, '1', 1, 1, NULL, '2019-06-02 17:21:16', NULL, '2019-06-02 17:21:16'),
(11, 2, 2, 16, '[\"1\",\"2\"]', 1, 1, NULL, '2019-06-02 17:21:16', NULL, '2019-06-02 17:21:16'),
(12, 2, 1, 17, '2', 0, 1, NULL, '2019-06-02 17:21:16', NULL, '2019-06-02 17:21:16'),
(13, 3, 1, 20, '1', 1, 1, NULL, '2019-06-02 20:20:06', NULL, '2019-06-02 20:20:06'),
(14, 3, 1, 21, '1', 1, 1, NULL, '2019-06-02 20:20:06', NULL, '2019-06-02 20:20:06'),
(15, 3, 2, 22, '[\"1\"]', 0, 1, NULL, '2019-06-02 20:20:06', NULL, '2019-06-02 20:20:06'),
(16, 4, 1, 20, '1', 1, 1, NULL, '2019-06-02 20:47:07', NULL, '2019-06-02 20:47:07'),
(17, 4, 1, 21, '1', 1, 1, NULL, '2019-06-02 20:47:07', NULL, '2019-06-02 20:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `test_attempt`
--

DROP TABLE IF EXISTS `test_attempt`;
CREATE TABLE IF NOT EXISTS `test_attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `mapping_id` int(11) DEFAULT NULL,
  `test_id` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active,0=delete',
  `IsComplete` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_attempt`
--

INSERT INTO `test_attempt` (`id`, `student_id`, `mapping_id`, `test_id`, `IsActive`, `IsComplete`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 6, 1, 2, 1, 1, NULL, '2019-06-02 16:40:32', NULL, '2019-06-02 16:41:00'),
(2, 2, 2, 2, 1, 1, NULL, '2019-06-02 17:20:54', NULL, '2019-06-02 17:21:26'),
(3, 6, 3, 3, 1, 1, NULL, '2019-06-02 20:06:32', NULL, '2019-06-02 20:20:12'),
(4, 7, 3, 3, 1, 0, NULL, '2019-06-02 20:20:37', NULL, '2019-06-01 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_series`
--

DROP TABLE IF EXISTS `test_series`;
CREATE TABLE IF NOT EXISTS `test_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `technology` int(11) DEFAULT NULL,
  `cource_name` varchar(255) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active,0=delete',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_series`
--

INSERT INTO `test_series` (`id`, `faculty_id`, `batch_id`, `technology`, `cource_name`, `topic`, `name`, `IsActive`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 39, 0, 5, 'PYTHON', 'core', 'one', 1, 39, '2019-06-02 06:43:56', NULL, '2019-06-01 18:30:00'),
(2, 39, 0, 5, 'PYTHON', 'core', 'two', 1, 39, '2019-06-02 06:44:11', NULL, '2019-06-01 18:30:00'),
(3, 39, 0, 5, 'PYTHON', 'core', 'one', 1, 39, '2019-06-02 16:36:16', NULL, '2019-06-01 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `types` int(11) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(245) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `mobile`, `password`, `address`, `image`, `status`) VALUES
(1, 'kiran', 'kiran@gmail.com', '1234567890', '18a2a6af505e10e0aac3827fee6572384409bd62e0b69a189ac4e2d5bf9088916b06e4e21de973bbdde5188cf782ff231e5f4fb21028c502ded880b02af065707MMFDNzFMi6qXmjZo9jG9tT4r2QK1Jg7Spb4aLrHx2s=', 'saket nagar', 'jc991e79e.jpg', 1),
(3, 'kkk', 'kkk@gmail.com', '07078906725', 'e3fed213fb0a8526f96925c0f3e766474743f6c6318f0073595a9ad60fb3cc4c4d54d91e4baa242e5ae503675a563d53cdb98789aca0f692e0ea75a590668f132YX9UHnMqVpm6QcS/QS59cXXGAk1fvdM5b8BahzRUOQ=', 'alkapuri', '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
