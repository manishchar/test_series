-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 06:59 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(245) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(245) DEFAULT NULL,
  `types` tinyint(4) DEFAULT NULL COMMENT '1-admin,2=team member',
  `technology` int(11) NOT NULL,
  `job_type` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL COMMENT '1=male,2=female',
  `image` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `mobile`, `password`, `types`, `technology`, `job_type`, `city`, `address`, `gender`, `image`, `dates`, `status`) VALUES
(1, 'Admin', 'admin@admin.com', '7506569288', 'd13aa16ea1173e28157d328c8e13bf58638e0a51aec0ca508a26248fa9cfda5fb26d4a11522babd1ddb27971bb93ec8cae765e778bf5b5d1cb631683d0466acfiK63YoU/XEYYYlSJ10NsovLxePARG7OjmoXgbp5SRDA=', 1, 101, 0, 'bhopal1', 'Mp nagar bhopal', '0', '', '2018-08-02 03:47:20', 1),
(9, 'rohit4', 'rohit4@gmail.com', '', 'abe9dcab1a002328cde866f90e271789b94fa3f9c4470a75db269dd4347525d62a090dba4b02111003e4d0d607a756dfbdfe8e7106164feb59d95cf0a179345cr0t03CDUk2KLz9ajuWxhl/PZ3q6pXzEin7W+4s9RBOA=', 4, 0, 0, '', '', '', '', '2018-08-16 05:46:42', 1),
(11, 'rohit1 Patel', 'rohit1@gmail.com', '', '3b685715d534a8d30ed7fd223237246e07d6df0dc1239d83b21041ce21c77b9d4bf7938594762bbab520e9379a8fcdc8d32dcc14d99696a0dbc5bfb1a6f090f20oDRrpaSXfwFZubjGvVoweIZRWa1s/CAmqEUvZeVplk=', 4, 0, 0, '', '', '', 'j65397a30.jpeg', '2018-08-16 06:09:57', 1),
(15, 'bhupendra singh jat', 'bjat12121@admin.com', '7506569344', '78df655ceb6a5ff8dec12ddfde18f426668d7152aa595f99a15e850245679f1c70420596e39d43fcce7b2dfaf2115ac0c690cd499ffb0f7580e5f95c3a774a2dhJG07RD8bjn7DPAwy62mkqSFp5f4tRFBtqBrZDev30s=', 2, 6, 0, 'bhopal', 'bho9pal', '', 'p2d930acc.png', '2019-05-04 13:06:19', 1),
(17, 'webcareerpont', 'admin@g.com', '7506569555', 'aaaac327461c1b83ffcda448cf9986b960133920d7e75191f79dee11796fc66c889f024ae37fdc8ed5013a8dd279862788f3c377ff822655f83e9ec68840b2eaZ+xNLNKhvOA/dAKaHw8Lv61M0PlNBxOG4cCnGuaSnrs=', 3, 2, 0, '', 'bhopal', '', '', '2019-05-05 08:55:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `fees` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `course_id`, `lab_id`, `faculty_id`, `fees`, `startdate`, `enddate`, `starttime`, `endtime`, `description`, `status`) VALUES
(2, 1, 2, 1, 5000, '2019-04-23', '2019-04-23', '02:00:00', '03:00:00', '<p>hello</p>', 1),
(4, 3, 3, 2, 20000, '2019-05-17', '2019-05-25', '05:00:00', '07:00:00', '<p>hello</p>', 1),
(5, 1, 4, 3, 20000, '2019-05-11', '2019-05-24', '05:00:00', '07:00:00', '<p>hello</p>', 1),
(6, 3, 4, 3, 1000, '2019-05-25', '2019-05-25', '05:00:00', '07:00:00', '<p>hello</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `degree` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `degree`, `name`, `status`) VALUES
(1, 1, 'IT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `page_id` int(11) NOT NULL,
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
  `controller` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 'marketing_imagery', 'architectural_3d_rendering_service_provider_in_los_angeles', 'Architectural 3D Rendering Service Provider in Los Angeles', 'marketing_imagery', 'marketing_imagery', 'marketing_imagery', 'TNI Interiors is a team of Architects and Interior Designers providing outsourced creative Interior design & architectural rendering, 3D renders, Revit 3D models and construction documentation services to Architects, Interior Designers and building construction professionals in and around Los Angeles', '<p>\r\n\r\nTNI Interiors is a team of Architects and <a target="_blank" rel="nofollow" href="http://www.tniinteriors.com/content/restaurant-interior-design-architect-services">Interior Designers </a>providing outsourced creative <a target="_blank" rel="nofollow" href="http://www.tniinteriors.com/content/restaurant-interior-design-architect-services">Interior design &amp; architectural rendering</a>, <a target="_blank" rel="nofollow" href="http://www.tniinteriors.com/content/photorealistic-3d-renders">3D renders</a>, <a target="_blank" rel="nofollow" href="http://www.tniinteriors.com/content/revit-3d-models">Revit 3D models </a>and construction documentation services to Architects, Interior Designers and building construction professionals in and around Los Angeles\r\n\r\n<br></p>', '', '', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `collagecode`
--

CREATE TABLE `collagecode` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collagecode`
--

INSERT INTO `collagecode` (`id`, `name`, `code`, `status`) VALUES
(1, 'LNCT-E', '0103', 1),
(2, 'LNCT-S', '0157', 1),
(3, 'LNCT', '0176', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `technology` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `technology`, `description`, `status`, `date`) VALUES
(1, 'php', 1, '<p>hello</p>', 1, '2019-04-27 13:45:15'),
(2, 'Python', 3, '<p>Django syllabus:<br></p><p>\r\n\r\nCourse Outline\r\n? Introduction to Django\r\no What is Django?\r\no Django and Python\r\no Django’ s take on MVC: Model, View and Template\r\no DRY programming: Don’t Repeat Yourself\r\no How to get and install Django\r\n? Getting started with Django\r\no About the 3 Core Files: models.py, urls.py, views.py\r\no Setting up database connections\r\no Managing Users &amp; the Django admin tool\r\no Installing and using ‘out of the box’ Django features\r\n? Django URL Patterns and Views\r\no Designing a good URL scheme\r\no Generic Views\r\n? Django Forms\r\no Form classes\r\no Validation\r\no Authentication\r\no Advanced Forms processing techniques\r\n? Django &amp; REST APIs\r\no Django REST framework\r\no Django-piston\r\n? Unit Testing with Django\r\no Overview / Refresher on Unit Testing and why it’s good\r\no Using Python’s unittest2 library\r\no Test\r\no Test Databases\r\no Doctests\r\no Debugging Best Practices\r\n\r\n<br></p>', 1, '2019-04-27 13:51:27'),
(3, 'java', 2, '<p>java</p>', 1, '2019-05-02 12:53:24'),
(4, 'Codeigniter', 1, '<p>Hello</p>', 1, '2019-05-02 14:33:49'),
(5, 'Laravel', 1, '<p>Laravel</p>', 1, '2019-05-03 13:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id`, `name`, `status`) VALUES
(1, 'BE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email_id` int(11) NOT NULL,
  `type` varchar(245) DEFAULT NULL,
  `from_email` varchar(245) DEFAULT NULL,
  `subject` varchar(245) DEFAULT NULL,
  `body` text,
  `from_name` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
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
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `fees_payment` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `feesdate` date NOT NULL,
  `type` int(11) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `datetimes` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lab_no` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `name`, `lab_no`, `capacity`, `status`) VALUES
(1, 'lab 1', 12, 12, 1),
(2, 'Audi', 5, 20, 1),
(3, 'lab 2', 5, 20, 1),
(4, 'Lab 3', 4, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `permissions` (
  `permissions_id` int(11) NOT NULL,
  `admin_id` tinyint(11) NOT NULL,
  `page_id` tinyint(4) DEFAULT '0',
  `add_access` tinyint(4) DEFAULT '0',
  `edit_access` tinyint(4) DEFAULT '0',
  `delete_access` tinyint(4) DEFAULT '0',
  `view_access` tinyint(4) DEFAULT '0',
  `no_access` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(66, 15, 11, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `field` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `technology` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `college` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `alt_mobile` varchar(255) DEFAULT NULL,
  `adhar` varchar(255) DEFAULT NULL,
  `roll_no` varchar(255) NOT NULL,
  `degree` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semister` varchar(255) NOT NULL,
  `totalfees` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `feesdate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `technology`, `batch_id`, `name`, `college`, `email`, `mobile`, `alt_mobile`, `adhar`, `roll_no`, `degree`, `branch`, `semister`, `totalfees`, `fees`, `feesdate`, `address`, `payment_mode`, `status`, `date`) VALUES
(3, 1, 2, 'bhupendra singh jat', 2, 'admin@admin.com', '9887777333', '11111111111', '1233', '12333', 1, '1', '8', 5000, 1000, '2019-05-22', '', 0, 0, '2019-05-02 14:31:20'),
(4, 1, 5, 'bhupendra singh jat', 1, 'admin@admin.com', '9887777777', '11111111111', '1233', '12333', 1, '1', '2', 5000, 1000, '2019-05-16', '', 1, 1, '2019-05-03 15:02:48'),
(5, 1, 2, 'bhupendra singh jat', 3, 'admin@admin.com', '9887777777', '11111111111', '1233', '12333', 1, '1', '2', 5000, 1000, '2019-05-16', '', 1, 1, '2019-05-03 15:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`id`, `name`, `status`) VALUES
(1, 'php', 1),
(2, 'java', 1),
(3, 'python', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `types` int(11) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(245) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `mobile`, `password`, `address`, `image`, `status`) VALUES
(1, 'kiran', 'kiran@gmail.com', '1234567890', '18a2a6af505e10e0aac3827fee6572384409bd62e0b69a189ac4e2d5bf9088916b06e4e21de973bbdde5188cf782ff231e5f4fb21028c502ded880b02af065707MMFDNzFMi6qXmjZo9jG9tT4r2QK1Jg7Spb4aLrHx2s=', 'saket nagar', 'jc991e79e.jpg', 1),
(3, 'kkk', 'kkk@gmail.com', '07078906725', 'e3fed213fb0a8526f96925c0f3e766474743f6c6318f0073595a9ad60fb3cc4c4d54d91e4baa242e5ae503675a563d53cdb98789aca0f692e0ea75a590668f132YX9UHnMqVpm6QcS/QS59cXXGAk1fvdM5b8BahzRUOQ=', 'alkapuri', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `collagecode`
--
ALTER TABLE `collagecode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_payment`
--
ALTER TABLE `fees_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permissions_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `collagecode`
--
ALTER TABLE `collagecode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fees_payment`
--
ALTER TABLE `fees_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
