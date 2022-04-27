-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 08:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thewings_vishalproperty_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `allot_status`
--

CREATE TABLE `allot_status` (
  `als_id` int(11) NOT NULL,
  `als_title` varchar(255) DEFAULT NULL,
  `als_status` tinyint(1) NOT NULL DEFAULT 1,
  `als_created_at` datetime NOT NULL,
  `als_update_at` datetime DEFAULT NULL,
  `als_update_by` int(11) DEFAULT NULL,
  `als_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `ame_id` int(11) NOT NULL,
  `ame_title` varchar(250) NOT NULL,
  `ame_status` tinyint(1) NOT NULL DEFAULT 1,
  `ame_created_at` datetime NOT NULL,
  `ame_update_at` datetime DEFAULT NULL,
  `ame_update_by` int(11) DEFAULT NULL,
  `ame_created_by` int(11) DEFAULT NULL,
  `ame_for` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`ame_id`, `ame_title`, `ame_status`, `ame_created_at`, `ame_update_at`, `ame_update_by`, `ame_created_by`, `ame_for`) VALUES
(1, 'Maintenance Staff', 1, '2022-03-10 11:26:22', '2022-03-10 11:26:22', NULL, NULL, 'staff'),
(2, 'Water Storage', 1, '2022-03-10 11:26:22', '2022-03-10 11:26:22', NULL, NULL, 'storage'),
(3, 'Security/ Fire Alarm', 1, '2022-03-10 11:26:22', '2022-03-10 11:26:22', NULL, NULL, 'alarm'),
(4, 'Feng Shui/ Vasstu Compliant', 1, '2022-03-10 11:26:22', '2022-03-10 11:26:22', NULL, NULL, 'compliant'),
(5, 'Intercom Facility', 1, '2022-03-10 11:26:22', '2022-03-10 11:26:22', NULL, NULL, 'facility'),
(6, 'park', 1, '2022-03-10 11:26:22', '2022-03-10 11:26:22', NULL, NULL, 'park'),
(7, 'Lift(s)', 1, '2022-03-10 11:26:22', '2022-03-10 11:26:22', NULL, NULL, 'lift');

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(11) UNSIGNED NOT NULL,
  `ap_title` varchar(250) DEFAULT NULL,
  `city_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `ap_title`, `city_id`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Park View Apartments', 1, 1, '2022-04-04 11:01:37', NULL, '2022-04-04 11:01:37', NULL, '2022-04-04 11:01:37', NULL),
(4, 'Dhawalgiri Apartment', 1, 1, '2022-04-04 11:02:10', NULL, '2022-04-04 11:02:10', NULL, '2022-04-04 11:02:10', NULL),
(5, 'Charan Apartments', 1, 1, '2022-04-04 11:02:10', NULL, '2022-04-04 11:02:10', NULL, '2022-04-04 11:02:10', NULL),
(6, 'A1', 14, 1, '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL),
(7, 'DDDD', 15, 1, '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL),
(8, '', 10, 1, '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state_id`) VALUES
(1, 'North and Middle Andaman', 32),
(2, 'South Andaman', 32),
(3, 'Nicobar', 32),
(4, 'Adilabad', 1),
(5, 'Anantapur', 1),
(6, 'Chittoor', 1),
(7, 'East Godavari', 1),
(8, 'Guntur', 1),
(9, 'Hyderabad', 1),
(10, 'Kadapa', 1),
(11, 'Karimnagar', 1),
(12, 'Khammam', 1),
(13, 'Krishna', 1),
(14, 'Kurnool', 1),
(15, 'Mahbubnagar', 1),
(16, 'Medak', 1),
(17, 'Nalgonda', 1),
(18, 'Nellore', 1),
(19, 'Nizamabad', 1),
(20, 'Prakasam', 1),
(21, 'Rangareddi', 1),
(22, 'Srikakulam', 1),
(23, 'Vishakhapatnam', 1),
(24, 'Vizianagaram', 1),
(25, 'Warangal', 1),
(26, 'West Godavari', 1),
(27, 'Anjaw', 3),
(28, 'Changlang', 3),
(29, 'East Kameng', 3),
(30, 'Lohit', 3),
(31, 'Lower Subansiri', 3),
(32, 'Papum Pare', 3),
(33, 'Tirap', 3),
(34, 'Dibang Valley', 3),
(35, 'Upper Subansiri', 3),
(36, 'West Kameng', 3),
(37, 'Barpeta', 2),
(38, 'Bongaigaon', 2),
(39, 'Cachar', 2),
(40, 'Darrang', 2),
(41, 'Dhemaji', 2),
(42, 'Dhubri', 2),
(43, 'Dibrugarh', 2),
(44, 'Goalpara', 2),
(45, 'Golaghat', 2),
(46, 'Hailakandi', 2),
(47, 'Jorhat', 2),
(48, 'Karbi Anglong', 2),
(49, 'Karimganj', 2),
(50, 'Kokrajhar', 2),
(51, 'Lakhimpur', 2),
(52, 'Marigaon', 2),
(53, 'Nagaon', 2),
(54, 'Nalbari', 2),
(55, 'North Cachar Hills', 2),
(56, 'Sibsagar', 2),
(57, 'Sonitpur', 2),
(58, 'Tinsukia', 2),
(59, 'Araria', 4),
(60, 'Aurangabad', 4),
(61, 'Banka', 4),
(62, 'Begusarai', 4),
(63, 'Bhagalpur', 4),
(64, 'Bhojpur', 4),
(65, 'Buxar', 4),
(66, 'Darbhanga', 4),
(67, 'Purba Champaran', 4),
(68, 'Gaya', 4),
(69, 'Gopalganj', 4),
(70, 'Jamui', 4),
(71, 'Jehanabad', 4),
(72, 'Khagaria', 4),
(73, 'Kishanganj', 4),
(74, 'Kaimur', 4),
(75, 'Katihar', 4),
(76, 'Lakhisarai', 4),
(77, 'Madhubani', 4),
(78, 'Munger', 4),
(79, 'Madhepura', 4),
(80, 'Muzaffarpur', 4),
(81, 'Nalanda', 4),
(82, 'Nawada', 4),
(83, 'Patna', 4),
(84, 'Purnia', 4),
(85, 'Rohtas', 4),
(86, 'Saharsa', 4),
(87, 'Samastipur', 4),
(88, 'Sheohar', 4),
(89, 'Sheikhpura', 4),
(90, 'Saran', 4),
(91, 'Sitamarhi', 4),
(92, 'Supaul', 4),
(93, 'Siwan', 4),
(94, 'Vaishali', 4),
(95, 'Pashchim Champaran', 4),
(96, 'Bastar', 36),
(97, 'Bilaspur', 36),
(98, 'Dantewada', 36),
(99, 'Dhamtari', 36),
(100, 'Durg', 36),
(101, 'Jashpur', 36),
(102, 'Janjgir-Champa', 36),
(103, 'Korba', 36),
(104, 'Koriya', 36),
(105, 'Kanker', 36),
(106, 'Kawardha', 36),
(107, 'Mahasamund', 36),
(108, 'Raigarh', 36),
(109, 'Rajnandgaon', 36),
(110, 'Raipur', 36),
(111, 'Surguja', 36),
(112, 'Diu', 29),
(113, 'Daman', 29),
(114, 'Central Delhi', 25),
(115, 'East Delhi', 25),
(116, 'New Delhi', 25),
(117, 'North Delhi', 25),
(118, 'North East Delhi', 25),
(119, 'North West Delhi', 25),
(120, 'South Delhi', 25),
(121, 'South West Delhi', 25),
(122, 'West Delhi', 25),
(123, 'North Goa', 26),
(124, 'South Goa', 26),
(125, 'Ahmedabad', 5),
(126, 'Amreli District', 5),
(127, 'Anand', 5),
(128, 'Banaskantha', 5),
(129, 'Bharuch', 5),
(130, 'Bhavnagar', 5),
(131, 'Dahod', 5),
(132, 'The Dangs', 5),
(133, 'Gandhinagar', 5),
(134, 'Jamnagar', 5),
(135, 'Junagadh', 5),
(136, 'Kutch', 5),
(137, 'Kheda', 5),
(138, 'Mehsana', 5),
(139, 'Narmada', 5),
(140, 'Navsari', 5),
(141, 'Patan', 5),
(142, 'Panchmahal', 5),
(143, 'Porbandar', 5),
(144, 'Rajkot', 5),
(145, 'Sabarkantha', 5),
(146, 'Surendranagar', 5),
(147, 'Surat', 5),
(148, 'Vadodara', 5),
(149, 'Valsad', 5),
(150, 'Ambala', 6),
(151, 'Bhiwani', 6),
(152, 'Faridabad', 6),
(153, 'Fatehabad', 6),
(154, 'Gurgaon', 6),
(155, 'Hissar', 6),
(156, 'Jhajjar', 6),
(157, 'Jind', 6),
(158, 'Karnal', 6),
(159, 'Kaithal', 6),
(160, 'Kurukshetra', 6),
(161, 'Mahendragarh', 6),
(162, 'Mewat', 6),
(163, 'Panchkula', 6),
(164, 'Panipat', 6),
(165, 'Rewari', 6),
(166, 'Rohtak', 6),
(167, 'Sirsa', 6),
(168, 'Sonepat', 6),
(169, 'Yamuna Nagar', 6),
(170, 'Palwal', 6),
(171, 'Bilaspur', 7),
(172, 'Chamba', 7),
(173, 'Hamirpur', 7),
(174, 'Kangra', 7),
(175, 'Kinnaur', 7),
(176, 'Kulu', 7),
(177, 'Lahaul and Spiti', 7),
(178, 'Mandi', 7),
(179, 'Shimla', 7),
(180, 'Sirmaur', 7),
(181, 'Solan', 7),
(182, 'Una', 7),
(183, 'Anantnag', 8),
(184, 'Badgam', 8),
(185, 'Bandipore', 8),
(186, 'Baramula', 8),
(187, 'Doda', 8),
(188, 'Jammu', 8),
(189, 'Kargil', 8),
(190, 'Kathua', 8),
(191, 'Kupwara', 8),
(192, 'Leh', 8),
(193, 'Poonch', 8),
(194, 'Pulwama', 8),
(195, 'Rajauri', 8),
(196, 'Srinagar', 8),
(197, 'Samba', 8),
(198, 'Udhampur', 8),
(199, 'Bokaro', 34),
(200, 'Chatra', 34),
(201, 'Deoghar', 34),
(202, 'Dhanbad', 34),
(203, 'Dumka', 34),
(204, 'Purba Singhbhum', 34),
(205, 'Garhwa', 34),
(206, 'Giridih', 34),
(207, 'Godda', 34),
(208, 'Gumla', 34),
(209, 'Hazaribagh', 34),
(210, 'Koderma', 34),
(211, 'Lohardaga', 34),
(212, 'Pakur', 34),
(213, 'Palamu', 34),
(214, 'Ranchi', 34),
(215, 'Sahibganj', 34),
(216, 'Seraikela and Kharsawan', 34),
(217, 'Pashchim Singhbhum', 34),
(218, 'Ramgarh', 34),
(219, 'Bidar', 9),
(220, 'Belgaum', 9),
(221, 'Bijapur', 9),
(222, 'Bagalkot', 9),
(223, 'Bellary', 9),
(224, 'Bangalore Rural District', 9),
(225, 'Bangalore Urban District', 9),
(226, 'Chamarajnagar', 9),
(227, 'Chikmagalur', 9),
(228, 'Chitradurga', 9),
(229, 'Davanagere', 9),
(230, 'Dharwad', 9),
(231, 'Dakshina Kannada', 9),
(232, 'Gadag', 9),
(233, 'Gulbarga', 9),
(234, 'Hassan', 9),
(235, 'Haveri District', 9),
(236, 'Kodagu', 9),
(237, 'Kolar', 9),
(238, 'Koppal', 9),
(239, 'Mandya', 9),
(240, 'Mysore', 9),
(241, 'Raichur', 9),
(242, 'Shimoga', 9),
(243, 'Tumkur', 9),
(244, 'Udupi', 9),
(245, 'Uttara Kannada', 9),
(246, 'Ramanagara', 9),
(247, 'Chikballapur', 9),
(248, 'Yadagiri', 9),
(249, 'Alappuzha', 10),
(250, 'Ernakulam', 10),
(251, 'Idukki', 10),
(252, 'Kollam', 10),
(253, 'Kannur', 10),
(254, 'Kasaragod', 10),
(255, 'Kottayam', 10),
(256, 'Kozhikode', 10),
(257, 'Malappuram', 10),
(258, 'Palakkad', 10),
(259, 'Pathanamthitta', 10),
(260, 'Thrissur', 10),
(261, 'Thiruvananthapuram', 10),
(262, 'Wayanad', 10),
(263, 'Alirajpur', 11),
(264, 'Anuppur', 11),
(265, 'Ashok Nagar', 11),
(266, 'Balaghat', 11),
(267, 'Barwani', 11),
(268, 'Betul', 11),
(269, 'Bhind', 11),
(270, 'Bhopal', 11),
(271, 'Burhanpur', 11),
(272, 'Chhatarpur', 11),
(273, 'Chhindwara', 11),
(274, 'Damoh', 11),
(275, 'Datia', 11),
(276, 'Dewas', 11),
(277, 'Dhar', 11),
(278, 'Dindori', 11),
(279, 'Guna', 11),
(280, 'Gwalior', 11),
(281, 'Harda', 11),
(282, 'Hoshangabad', 11),
(283, 'Indore', 11),
(284, 'Jabalpur', 11),
(285, 'Jhabua', 11),
(286, 'Katni', 11),
(287, 'Khandwa', 11),
(288, 'Khargone', 11),
(289, 'Mandla', 11),
(290, 'Mandsaur', 11),
(291, 'Morena', 11),
(292, 'Narsinghpur', 11),
(293, 'Neemuch', 11),
(294, 'Panna', 11),
(295, 'Rewa', 11),
(296, 'Rajgarh', 11),
(297, 'Ratlam', 11),
(298, 'Raisen', 11),
(299, 'Sagar', 11),
(300, 'Satna', 11),
(301, 'Sehore', 11),
(302, 'Seoni', 11),
(303, 'Shahdol', 11),
(304, 'Shajapur', 11),
(305, 'Sheopur', 11),
(306, 'Shivpuri', 11),
(307, 'Sidhi', 11),
(308, 'Singrauli', 11),
(309, 'Tikamgarh', 11),
(310, 'Ujjain', 11),
(311, 'Umaria', 11),
(312, 'Vidisha', 11),
(313, 'Ahmednagar', 12),
(314, 'Akola', 12),
(315, 'Amrawati', 12),
(316, 'Aurangabad', 12),
(317, 'Bhandara', 12),
(318, 'Beed', 12),
(319, 'Buldhana', 12),
(320, 'Chandrapur', 12),
(321, 'Dhule', 12),
(322, 'Gadchiroli', 12),
(323, 'Gondiya', 12),
(324, 'Hingoli', 12),
(325, 'Jalgaon', 12),
(326, 'Jalna', 12),
(327, 'Kolhapur', 12),
(328, 'Latur', 12),
(329, 'Mumbai City', 12),
(330, 'Mumbai suburban', 12),
(331, 'Nandurbar', 12),
(332, 'Nanded', 12),
(333, 'Nagpur', 12),
(334, 'Nashik', 12),
(335, 'Osmanabad', 12),
(336, 'Parbhani', 12),
(337, 'Pune', 12),
(338, 'Raigad', 12),
(339, 'Ratnagiri', 12),
(340, 'Sindhudurg', 12),
(341, 'Sangli', 12),
(342, 'Solapur', 12),
(343, 'Satara', 12),
(344, 'Thane', 12),
(345, 'Wardha', 12),
(346, 'Washim', 12),
(347, 'Yavatmal', 12),
(348, 'Bishnupur', 13),
(349, 'Churachandpur', 13),
(350, 'Chandel', 13),
(351, 'Imphal East', 13),
(352, 'Senapati', 13),
(353, 'Tamenglong', 13),
(354, 'Thoubal', 13),
(355, 'Ukhrul', 13),
(356, 'Imphal West', 13),
(357, 'East Garo Hills', 14),
(358, 'East Khasi Hills', 14),
(359, 'Jaintia Hills', 14),
(360, 'Ri-Bhoi', 14),
(361, 'South Garo Hills', 14),
(362, 'West Garo Hills', 14),
(363, 'West Khasi Hills', 14),
(364, 'Aizawl', 15),
(365, 'Champhai', 15),
(366, 'Kolasib', 15),
(367, 'Lawngtlai', 15),
(368, 'Lunglei', 15),
(369, 'Mamit', 15),
(370, 'Saiha', 15),
(371, 'Serchhip', 15),
(372, 'Dimapur', 16),
(373, 'Kohima', 16),
(374, 'Mokokchung', 16),
(375, 'Mon', 16),
(376, 'Phek', 16),
(377, 'Tuensang', 16),
(378, 'Wokha', 16),
(379, 'Zunheboto', 16),
(380, 'Angul', 17),
(381, 'Boudh', 17),
(382, 'Bhadrak', 17),
(383, 'Bolangir', 17),
(384, 'Bargarh', 17),
(385, 'Baleswar', 17),
(386, 'Cuttack', 17),
(387, 'Debagarh', 17),
(388, 'Dhenkanal', 17),
(389, 'Ganjam', 17),
(390, 'Gajapati', 17),
(391, 'Jharsuguda', 17),
(392, 'Jajapur', 17),
(393, 'Jagatsinghpur', 17),
(394, 'Khordha', 17),
(395, 'Kendujhar', 17),
(396, 'Kalahandi', 17),
(397, 'Kandhamal', 17),
(398, 'Koraput', 17),
(399, 'Kendrapara', 17),
(400, 'Malkangiri', 17),
(401, 'Mayurbhanj', 17),
(402, 'Nabarangpur', 17),
(403, 'Nuapada', 17),
(404, 'Nayagarh', 17),
(405, 'Puri', 17),
(406, 'Rayagada', 17),
(407, 'Sambalpur', 17),
(408, 'Subarnapur', 17),
(409, 'Sundargarh', 17),
(410, 'Karaikal', 27),
(411, 'Mahe', 27),
(412, 'Puducherry', 27),
(413, 'Yanam', 27),
(414, 'Amritsar', 18),
(415, 'Bathinda', 18),
(416, 'Firozpur', 18),
(417, 'Faridkot', 18),
(418, 'Fatehgarh Sahib', 18),
(419, 'Gurdaspur', 18),
(420, 'Hoshiarpur', 18),
(421, 'Jalandhar', 18),
(422, 'Kapurthala', 18),
(423, 'Ludhiana', 18),
(424, 'Mansa', 18),
(425, 'Moga', 18),
(426, 'Mukatsar', 18),
(427, 'Nawan Shehar', 18),
(428, 'Patiala', 18),
(429, 'Rupnagar', 18),
(430, 'Sangrur', 18),
(431, 'Ajmer', 19),
(432, 'Alwar', 19),
(433, 'Bikaner', 19),
(434, 'Barmer', 19),
(435, 'Banswara', 19),
(436, 'Bharatpur', 19),
(437, 'Baran', 19),
(438, 'Bundi', 19),
(439, 'Bhilwara', 19),
(440, 'Churu', 19),
(441, 'Chittorgarh', 19),
(442, 'Dausa', 19),
(443, 'Dholpur', 19),
(444, 'Dungapur', 19),
(445, 'Ganganagar', 19),
(446, 'Hanumangarh', 19),
(447, 'Juhnjhunun', 19),
(448, 'Jalore', 19),
(449, 'Jodhpur', 19),
(450, 'Jaipur', 19),
(451, 'Jaisalmer', 19),
(452, 'Jhalawar', 19),
(453, 'Karauli', 19),
(454, 'Kota', 19),
(455, 'Nagaur', 19),
(456, 'Pali', 19),
(457, 'Pratapgarh', 19),
(458, 'Rajsamand', 19),
(459, 'Sikar', 19),
(460, 'Sawai Madhopur', 19),
(461, 'Sirohi', 19),
(462, 'Tonk', 19),
(463, 'Udaipur', 19),
(464, 'East Sikkim', 20),
(465, 'North Sikkim', 20),
(466, 'South Sikkim', 20),
(467, 'West Sikkim', 20),
(468, 'Ariyalur', 21),
(469, 'Chennai', 21),
(470, 'Coimbatore', 21),
(471, 'Cuddalore', 21),
(472, 'Dharmapuri', 21),
(473, 'Dindigul', 21),
(474, 'Erode', 21),
(475, 'Kanchipuram', 21),
(476, 'Kanyakumari', 21),
(477, 'Karur', 21),
(478, 'Madurai', 21),
(479, 'Nagapattinam', 21),
(480, 'The Nilgiris', 21),
(481, 'Namakkal', 21),
(482, 'Perambalur', 21),
(483, 'Pudukkottai', 21),
(484, 'Ramanathapuram', 21),
(485, 'Salem', 21),
(486, 'Sivagangai', 21),
(487, 'Tiruppur', 21),
(488, 'Tiruchirappalli', 21),
(489, 'Theni', 21),
(490, 'Tirunelveli', 21),
(491, 'Thanjavur', 21),
(492, 'Thoothukudi', 21),
(493, 'Thiruvallur', 21),
(494, 'Thiruvarur', 21),
(495, 'Tiruvannamalai', 21),
(496, 'Vellore', 21),
(497, 'Villupuram', 21),
(498, 'Dhalai', 22),
(499, 'North Tripura', 22),
(500, 'South Tripura', 22),
(501, 'West Tripura', 22),
(502, 'Almora', 33),
(503, 'Bageshwar', 33),
(504, 'Chamoli', 33),
(505, 'Champawat', 33),
(506, 'Dehradun', 33),
(507, 'Haridwar', 33),
(508, 'Nainital', 33),
(509, 'Pauri Garhwal', 33),
(510, 'Pithoragharh', 33),
(511, 'Rudraprayag', 33),
(512, 'Tehri Garhwal', 33),
(513, 'Udham Singh Nagar', 33),
(514, 'Uttarkashi', 33),
(515, 'Agra', 23),
(516, 'Allahabad', 23),
(517, 'Aligarh', 23),
(518, 'Ambedkar Nagar', 23),
(519, 'Auraiya', 23),
(520, 'Azamgarh', 23),
(521, 'Barabanki', 23),
(522, 'Badaun', 23),
(523, 'Bagpat', 23),
(524, 'Bahraich', 23),
(525, 'Bijnor', 23),
(526, 'Ballia', 23),
(527, 'Banda', 23),
(528, 'Balrampur', 23),
(529, 'Bareilly', 23),
(530, 'Basti', 23),
(531, 'Bulandshahr', 23),
(532, 'Chandauli', 23),
(533, 'Chitrakoot', 23),
(534, 'Deoria', 23),
(535, 'Etah', 23),
(536, 'Kanshiram Nagar', 23),
(537, 'Etawah', 23),
(538, 'Firozabad', 23),
(539, 'Farrukhabad', 23),
(540, 'Fatehpur', 23),
(541, 'Faizabad', 23),
(542, 'Gautam Buddha Nagar', 23),
(543, 'Gonda', 23),
(544, 'Ghazipur', 23),
(545, 'Gorkakhpur', 23),
(546, 'Ghaziabad', 23),
(547, 'Hamirpur', 23),
(548, 'Hardoi', 23),
(549, 'Mahamaya Nagar', 23),
(550, 'Jhansi', 23),
(551, 'Jalaun', 23),
(552, 'Jyotiba Phule Nagar', 23),
(553, 'Jaunpur District', 23),
(554, 'Kanpur Dehat', 23),
(555, 'Kannauj', 23),
(556, 'Kanpur Nagar', 23),
(557, 'Kaushambi', 23),
(558, 'Kushinagar', 23),
(559, 'Lalitpur', 23),
(560, 'Lakhimpur Kheri', 23),
(561, 'Lucknow', 23),
(562, 'Mau', 23),
(563, 'Meerut', 23),
(564, 'Maharajganj', 23),
(565, 'Mahoba', 23),
(566, 'Mirzapur', 23),
(567, 'Moradabad', 23),
(568, 'Mainpuri', 23),
(569, 'Mathura', 23),
(570, 'Muzaffarnagar', 23),
(571, 'Pilibhit', 23),
(572, 'Pratapgarh', 23),
(573, 'Rampur', 23),
(574, 'Rae Bareli', 23),
(575, 'Saharanpur', 23),
(576, 'Sitapur', 23),
(577, 'Shahjahanpur', 23),
(578, 'Sant Kabir Nagar', 23),
(579, 'Siddharthnagar', 23),
(580, 'Sonbhadra', 23),
(581, 'Sant Ravidas Nagar', 23),
(582, 'Sultanpur', 23),
(583, 'Shravasti', 23),
(584, 'Unnao', 23),
(585, 'Varanasi', 23),
(586, 'Birbhum', 24),
(587, 'Bankura', 24),
(588, 'Bardhaman', 24),
(589, 'Darjeeling', 24),
(590, 'Dakshin Dinajpur', 24),
(591, 'Hooghly', 24),
(592, 'Howrah', 24),
(593, 'Jalpaiguri', 24),
(594, 'Cooch Behar', 24),
(595, 'Kolkata', 24),
(596, 'Malda', 24),
(597, 'Midnapore', 24),
(598, 'Murshidabad', 24),
(599, 'Nadia', 24),
(600, 'North 24 Parganas', 24),
(601, 'South 24 Parganas', 24),
(602, 'Purulia', 24),
(603, 'Uttar Dinajpur', 24),
(604, 'Noida', 23);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Laos'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `superwiser_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `superwiser_id`, `status`, `created_at`, `update_at`, `deleted_at`, `update_by`, `created_by`, `deleted_by`) VALUES
(6, 'A', 8, 0, '2022-03-28 11:43:56', '2022-03-28 13:20:02', '2022-03-28 13:20:11', 1, 1, 1),
(7, 'Software', 4, 1, '2022-03-28 11:52:00', '2022-03-29 15:17:52', NULL, 1, 1, NULL),
(8, 'Test', 6, 0, '2022-03-28 11:52:31', NULL, '2022-03-28 11:52:40', NULL, 1, 1),
(9, 'Sales', 5, 1, '2022-03-28 13:20:23', '2022-03-29 15:16:31', NULL, 1, 1, NULL),
(10, 'sss', 4, 1, '2022-03-30 18:33:01', NULL, NULL, NULL, 1, NULL),
(11, 'AAA', 3, 0, '2022-03-30 18:33:14', NULL, '2022-03-30 18:33:22', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `status`, `created_at`, `update_at`, `deleted_at`, `update_by`, `created_by`, `deleted_by`) VALUES
(49, 'Admin', 1, '2022-04-27 11:11:57', NULL, NULL, NULL, 1, NULL),
(50, 'Demo', 1, '2022-04-27 11:29:14', NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_first_name` varchar(255) NOT NULL,
  `emp_last_name` varchar(255) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(200) DEFAULT NULL,
  `married_staus` varchar(20) DEFAULT NULL,
  `emp_phone` varchar(15) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_date_of_hire` date NOT NULL,
  `emp_date_of_joining` date NOT NULL,
  `emp_date_of_birth` date NOT NULL,
  `emp_gender` varchar(1) NOT NULL,
  `emp_experience` float NOT NULL,
  `worklocation` varchar(255) NOT NULL,
  `emp_designation` int(11) NOT NULL,
  `emp_department` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `emp_status` tinyint(1) NOT NULL DEFAULT 1,
  `emp_created_at` datetime NOT NULL,
  `emp_update_at` datetime DEFAULT NULL,
  `emp_update_by` int(11) DEFAULT NULL,
  `emp_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_id`, `emp_first_name`, `emp_last_name`, `father_name`, `mother_name`, `married_staus`, `emp_phone`, `emp_email`, `emp_date_of_hire`, `emp_date_of_joining`, `emp_date_of_birth`, `emp_gender`, `emp_experience`, `worklocation`, `emp_designation`, `emp_department`, `role_id`, `emp_status`, `emp_created_at`, `emp_update_at`, `emp_update_by`, `emp_created_by`) VALUES
(70, '', 'Test', '', '', '', '', '', 'admin@gmail.com', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', 49, 7, 0, 1, '2022-04-27 11:18:59', NULL, NULL, 1),
(71, '', 'Demo', '', '', '', '', '', 'demo@gmail.com', '0000-00-00', '0000-00-00', '0000-00-00', '', 0, '', 50, 7, 0, 1, '2022-04-27 11:29:54', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_manger_relation`
--

CREATE TABLE `employee_manger_relation` (
  `emr_id` int(11) NOT NULL,
  `emr_emp_id` float NOT NULL DEFAULT 0,
  `emr_manager_id` int(11) NOT NULL,
  `emr_status` tinyint(1) NOT NULL DEFAULT 1,
  `emr_created_at` datetime NOT NULL,
  `emr_update_at` datetime DEFAULT NULL,
  `emr_update_by` int(11) DEFAULT NULL,
  `emr_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_manger_relation`
--

INSERT INTO `employee_manger_relation` (`emr_id`, `emr_emp_id`, `emr_manager_id`, `emr_status`, `emr_created_at`, `emr_update_at`, `emr_update_by`, `emr_created_by`) VALUES
(1, 1, 0, 1, '2022-03-29 18:24:59', '2022-03-29 18:42:27', 1, 1),
(2, 2, 0, 1, '2022-04-25 16:22:28', '2022-04-25 17:02:53', 1, 1),
(3, 3, 0, 1, '2022-04-25 16:48:04', NULL, NULL, 1),
(4, 4, 0, 1, '2022-04-25 16:48:52', NULL, NULL, 1),
(5, 5, 0, 1, '2022-04-25 16:49:56', NULL, NULL, 1),
(6, 6, 0, 1, '2022-04-25 16:51:17', NULL, NULL, 1),
(7, 7, 0, 1, '2022-04-25 16:56:07', NULL, NULL, 1),
(8, 8, 0, 1, '2022-04-25 17:03:42', NULL, NULL, 1),
(9, 9, 0, 1, '2022-04-25 17:04:07', NULL, NULL, 1),
(10, 10, 0, 1, '2022-04-25 17:04:17', NULL, NULL, 1),
(11, 11, 0, 1, '2022-04-25 17:06:43', NULL, NULL, 1),
(12, 12, 0, 1, '2022-04-25 17:08:01', NULL, NULL, 1),
(13, 13, 0, 1, '2022-04-25 17:08:08', NULL, NULL, 1),
(14, 14, 0, 1, '2022-04-25 17:17:27', NULL, NULL, 1),
(15, 15, 0, 1, '2022-04-25 17:28:49', NULL, NULL, 1),
(16, 16, 0, 1, '2022-04-25 17:29:25', NULL, NULL, 1),
(17, 17, 0, 1, '2022-04-25 17:30:48', NULL, NULL, 1),
(18, 18, 0, 1, '2022-04-25 17:31:38', NULL, NULL, 1),
(19, 19, 0, 1, '2022-04-25 17:39:05', NULL, NULL, 1),
(20, 20, 0, 1, '2022-04-25 17:40:11', NULL, NULL, 1),
(21, 21, 0, 1, '2022-04-25 17:40:48', NULL, NULL, 1),
(22, 22, 0, 1, '2022-04-25 17:41:20', NULL, NULL, 1),
(23, 23, 0, 1, '2022-04-25 17:41:51', NULL, NULL, 1),
(24, 24, 0, 1, '2022-04-25 17:42:20', NULL, NULL, 1),
(25, 25, 0, 1, '2022-04-25 17:43:01', NULL, NULL, 1),
(26, 26, 0, 1, '2022-04-25 17:43:24', NULL, NULL, 1),
(27, 27, 0, 1, '2022-04-25 17:50:10', NULL, NULL, 1),
(28, 28, 0, 1, '2022-04-26 11:52:26', NULL, NULL, 1),
(29, 29, 0, 1, '2022-04-26 11:52:42', NULL, NULL, 1),
(30, 30, 0, 1, '2022-04-26 11:52:45', NULL, NULL, 1),
(31, 31, 0, 1, '2022-04-26 11:52:45', NULL, NULL, 1),
(32, 32, 0, 1, '2022-04-26 11:52:46', NULL, NULL, 1),
(33, 33, 0, 1, '2022-04-26 11:52:46', NULL, NULL, 1),
(34, 34, 32, 1, '2022-04-26 11:53:29', NULL, NULL, 1),
(35, 35, 0, 1, '2022-04-26 11:57:47', NULL, NULL, 1),
(36, 36, 35, 1, '2022-04-26 12:25:52', NULL, NULL, 1),
(37, 37, 33, 1, '2022-04-26 12:44:09', NULL, NULL, 1),
(38, 38, 33, 1, '2022-04-26 12:44:36', NULL, NULL, 1),
(39, 39, 33, 1, '2022-04-26 12:45:08', NULL, NULL, 1),
(40, 40, 33, 1, '2022-04-26 12:45:51', NULL, NULL, 1),
(41, 41, 33, 1, '2022-04-26 12:46:24', NULL, NULL, 1),
(42, 42, 33, 1, '2022-04-26 12:47:00', NULL, NULL, 1),
(43, 43, 33, 1, '2022-04-26 12:47:09', NULL, NULL, 1),
(44, 44, 33, 1, '2022-04-26 12:47:16', NULL, NULL, 1),
(45, 45, 33, 1, '2022-04-26 12:47:30', NULL, NULL, 1),
(46, 46, 33, 1, '2022-04-26 12:48:20', NULL, NULL, 1),
(47, 47, 33, 1, '2022-04-26 12:48:33', NULL, NULL, 1),
(48, 48, 33, 1, '2022-04-26 12:49:38', NULL, NULL, 1),
(49, 49, 33, 1, '2022-04-26 12:49:59', NULL, NULL, 1),
(50, 50, 33, 1, '2022-04-26 12:50:34', NULL, NULL, 1),
(51, 51, 33, 1, '2022-04-26 12:50:40', NULL, NULL, 1),
(52, 52, 33, 1, '2022-04-26 12:52:10', NULL, NULL, 1),
(53, 53, 33, 1, '2022-04-26 12:52:17', NULL, NULL, 1),
(54, 54, 33, 1, '2022-04-26 12:53:17', NULL, NULL, 1),
(55, 55, 33, 1, '2022-04-26 12:53:57', NULL, NULL, 1),
(56, 56, 33, 1, '2022-04-26 13:00:28', NULL, NULL, 1),
(57, 57, 33, 1, '2022-04-26 13:01:08', NULL, NULL, 1),
(58, 58, 33, 1, '2022-04-26 13:02:09', NULL, NULL, 1),
(59, 59, 33, 1, '2022-04-26 13:03:00', NULL, NULL, 1),
(60, 60, 33, 1, '2022-04-26 13:03:06', NULL, NULL, 1),
(61, 61, 33, 1, '2022-04-26 13:03:53', NULL, NULL, 1),
(62, 62, 47, 1, '2022-04-26 18:24:28', NULL, NULL, 1),
(63, 63, 48, 1, '2022-04-27 11:03:57', NULL, NULL, 1),
(64, 64, 48, 1, '2022-04-27 11:05:34', NULL, NULL, 1),
(65, 65, 48, 1, '2022-04-27 11:05:38', NULL, NULL, 1),
(66, 66, 48, 1, '2022-04-27 11:07:46', NULL, NULL, 1),
(67, 67, 48, 1, '2022-04-27 11:07:52', NULL, NULL, 1),
(68, 68, 48, 1, '2022-04-27 11:10:14', NULL, NULL, 1),
(69, 69, 49, 1, '2022-04-27 11:13:12', NULL, NULL, 1),
(70, 70, 49, 1, '2022-04-27 11:18:59', NULL, NULL, 1),
(71, 71, 50, 1, '2022-04-27 11:29:54', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_address`
--

CREATE TABLE `emp_address` (
  `empadd_id` int(11) NOT NULL,
  `empadd_address` varchar(255) NOT NULL,
  `empadd_city` int(11) NOT NULL,
  `empadd_state` int(11) NOT NULL,
  `empadd_country` int(11) NOT NULL,
  `alt_number` varchar(15) NOT NULL,
  `empadd_zipcode` varchar(10) NOT NULL,
  `empadd_address_type` enum('CA','PA') NOT NULL DEFAULT 'CA',
  `empadd_status` tinyint(1) NOT NULL DEFAULT 1,
  `empadd_created_at` datetime NOT NULL,
  `empadd_update_at` datetime DEFAULT NULL,
  `empadd_update_by` int(11) DEFAULT NULL,
  `empadd_created_by` int(11) DEFAULT NULL,
  `empadd_emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_address`
--

INSERT INTO `emp_address` (`empadd_id`, `empadd_address`, `empadd_city`, `empadd_state`, `empadd_country`, `alt_number`, `empadd_zipcode`, `empadd_address_type`, `empadd_status`, `empadd_created_at`, `empadd_update_at`, `empadd_update_by`, `empadd_created_by`, `empadd_emp_id`) VALUES
(13, 'd', 0, 36, 100, '', '7', 'CA', 1, '2022-03-29 18:24:59', '2022-03-29 18:42:27', 1, 1, 1),
(14, 'New Ashok  Nagar', 0, 23, 105, '', '110096', 'CA', 1, '2022-04-25 16:22:28', '2022-04-25 17:02:53', 1, 1, 2),
(15, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 16:48:04', NULL, NULL, 1, 3),
(16, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 16:48:52', NULL, NULL, 1, 4),
(17, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 16:49:56', NULL, NULL, 1, 5),
(18, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 16:51:17', NULL, NULL, 1, 6),
(19, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 16:56:07', NULL, NULL, 1, 7),
(20, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:03:42', NULL, NULL, 1, 8),
(21, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:04:07', NULL, NULL, 1, 9),
(22, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:04:17', NULL, NULL, 1, 10),
(23, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:06:43', NULL, NULL, 1, 11),
(24, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:08:01', NULL, NULL, 1, 12),
(25, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:08:08', NULL, NULL, 1, 13),
(26, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:17:27', NULL, NULL, 1, 14),
(27, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:28:49', NULL, NULL, 1, 15),
(28, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:29:25', NULL, NULL, 1, 16),
(29, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:30:48', NULL, NULL, 1, 17),
(30, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:31:38', NULL, NULL, 1, 18),
(31, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:39:05', NULL, NULL, 1, 19),
(32, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:40:11', NULL, NULL, 1, 20),
(33, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:40:48', NULL, NULL, 1, 21),
(34, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:41:20', NULL, NULL, 1, 22),
(35, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:41:51', NULL, NULL, 1, 23),
(36, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:42:20', NULL, NULL, 1, 24),
(37, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:43:01', NULL, NULL, 1, 25),
(38, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:43:24', NULL, NULL, 1, 26),
(39, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-25 17:50:10', NULL, NULL, 1, 27),
(40, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 11:52:26', NULL, NULL, 1, 28),
(41, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 11:52:42', NULL, NULL, 1, 29),
(42, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 11:52:45', NULL, NULL, 1, 30),
(43, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 11:52:45', NULL, NULL, 1, 31),
(44, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 11:52:46', NULL, NULL, 1, 32),
(45, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 11:52:46', NULL, NULL, 1, 33),
(46, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 11:53:29', NULL, NULL, 1, 34),
(47, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 11:57:47', NULL, NULL, 1, 35),
(48, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:25:52', NULL, NULL, 1, 36),
(49, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:44:09', NULL, NULL, 1, 37),
(50, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:44:36', NULL, NULL, 1, 38),
(51, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:45:08', NULL, NULL, 1, 39),
(52, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:45:51', NULL, NULL, 1, 40),
(53, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:46:24', NULL, NULL, 1, 41),
(54, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:47:00', NULL, NULL, 1, 42),
(55, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:47:09', NULL, NULL, 1, 43),
(56, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:47:16', NULL, NULL, 1, 44),
(57, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:47:30', NULL, NULL, 1, 45),
(58, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:48:20', NULL, NULL, 1, 46),
(59, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:48:33', NULL, NULL, 1, 47),
(60, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:49:38', NULL, NULL, 1, 48),
(61, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:49:59', NULL, NULL, 1, 49),
(62, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:50:34', NULL, NULL, 1, 50),
(63, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:50:40', NULL, NULL, 1, 51),
(64, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:52:10', NULL, NULL, 1, 52),
(65, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:52:17', NULL, NULL, 1, 53),
(66, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:53:17', NULL, NULL, 1, 54),
(67, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 12:53:57', NULL, NULL, 1, 55),
(68, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 13:00:28', NULL, NULL, 1, 56),
(69, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 13:01:08', NULL, NULL, 1, 57),
(70, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 13:02:09', NULL, NULL, 1, 58),
(71, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 13:03:00', NULL, NULL, 1, 59),
(72, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 13:03:06', NULL, NULL, 1, 60),
(73, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 13:03:53', NULL, NULL, 1, 61),
(74, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-26 18:24:28', NULL, NULL, 1, 62),
(75, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-27 11:03:57', NULL, NULL, 1, 63),
(76, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-27 11:05:34', NULL, NULL, 1, 64),
(77, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-27 11:05:38', NULL, NULL, 1, 65),
(78, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-27 11:07:46', NULL, NULL, 1, 66),
(79, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-27 11:07:52', NULL, NULL, 1, 67),
(80, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-27 11:10:14', NULL, NULL, 1, 68),
(81, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-27 11:13:12', NULL, NULL, 1, 69),
(82, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-27 11:18:59', NULL, NULL, 1, 70),
(83, '', 0, 23, 105, '', '', 'CA', 1, '2022-04-27 11:29:54', NULL, NULL, 1, 71);

-- --------------------------------------------------------

--
-- Table structure for table `emp_documents`
--

CREATE TABLE `emp_documents` (
  `emp_doc_id` int(11) NOT NULL,
  `emp_doc_title` varchar(255) NOT NULL,
  `emp_doc_path` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `emp_doc_emp_id` int(11) NOT NULL,
  `emp_doc_status` tinyint(1) NOT NULL DEFAULT 1,
  `emp_doc_created_at` datetime NOT NULL,
  `emp_doc_update_at` datetime DEFAULT NULL,
  `emp_doc_update_by` int(11) DEFAULT NULL,
  `emp_doc_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_documents`
--

INSERT INTO `emp_documents` (`emp_doc_id`, `emp_doc_title`, `emp_doc_path`, `emp_doc_emp_id`, `emp_doc_status`, `emp_doc_created_at`, `emp_doc_update_at`, `emp_doc_update_by`, `emp_doc_created_by`) VALUES
(1, 'Employee Documents', '\"[{\\\"title\\\":\\\"adharcard\\\",\\\"path\\\":\\\"\\/uploads\\/employees\\/1648558470_e6ceb4d2722163a139da.png\\\"}]\"', 1, 1, '2022-03-29 18:24:59', NULL, NULL, 1),
(2, 'Employee Documents', '\"[{\\\"title\\\":\\\"adharcard\\\",\\\"path\\\":\\\"\\/uploads\\/employees\\/1650883876_3d2aa89cfcec2746c116.jpg\\\"},{\\\"title\\\":\\\"pancard\\\",\\\"path\\\":\\\"\\/uploads\\/employees\\/1650883878_19e556b998b6d15ecad8.jpg\\\"},{\\\"title\\\":\\\"adharcard\\\",\\\"path\\\":\\\"\\/uploads\\/employees\\/1650883880_0ddb8362150408af5423.jpg\\\"},{\\\"title\\\":\\\"pancard\\\",\\\"path\\\":\\\"\\/uploads\\/employees\\/1650883881_53aaa0ae7da4b700c74e.jpg\\\"},{\\\"title\\\":\\\"adharcard\\\",\\\"path\\\":\\\"\\/uploads\\/employees\\/1650883883_6a6e0acdb60754fe07e8.jpg\\\"}]\"', 2, 1, '2022-04-25 16:22:28', NULL, NULL, 1),
(3, 'Employee Documents', '\"\"', 3, 1, '2022-04-25 16:48:04', NULL, NULL, 1),
(4, 'Employee Documents', '\"\"', 4, 1, '2022-04-25 16:48:52', NULL, NULL, 1),
(5, 'Employee Documents', '\"\"', 5, 1, '2022-04-25 16:49:56', NULL, NULL, 1),
(6, 'Employee Documents', '\"\"', 6, 1, '2022-04-25 16:51:17', NULL, NULL, 1),
(7, 'Employee Documents', '\"\"', 7, 1, '2022-04-25 16:56:07', NULL, NULL, 1),
(8, 'Employee Documents', '\"\"', 8, 1, '2022-04-25 17:03:42', NULL, NULL, 1),
(9, 'Employee Documents', '\"\"', 9, 1, '2022-04-25 17:04:07', NULL, NULL, 1),
(10, 'Employee Documents', '\"\"', 10, 1, '2022-04-25 17:04:17', NULL, NULL, 1),
(11, 'Employee Documents', '\"\"', 11, 1, '2022-04-25 17:06:43', NULL, NULL, 1),
(12, 'Employee Documents', '\"\"', 12, 1, '2022-04-25 17:08:01', NULL, NULL, 1),
(13, 'Employee Documents', '\"\"', 13, 1, '2022-04-25 17:08:08', NULL, NULL, 1),
(14, 'Employee Documents', '\"\"', 14, 1, '2022-04-25 17:17:27', NULL, NULL, 1),
(15, 'Employee Documents', '\"\"', 15, 1, '2022-04-25 17:28:49', NULL, NULL, 1),
(16, 'Employee Documents', '\"\"', 16, 1, '2022-04-25 17:29:25', NULL, NULL, 1),
(17, 'Employee Documents', '\"\"', 17, 1, '2022-04-25 17:30:48', NULL, NULL, 1),
(18, 'Employee Documents', '\"\"', 18, 1, '2022-04-25 17:31:38', NULL, NULL, 1),
(19, 'Employee Documents', '\"\"', 19, 1, '2022-04-25 17:39:05', NULL, NULL, 1),
(20, 'Employee Documents', '\"\"', 20, 1, '2022-04-25 17:40:11', NULL, NULL, 1),
(21, 'Employee Documents', '\"\"', 21, 1, '2022-04-25 17:40:48', NULL, NULL, 1),
(22, 'Employee Documents', '\"\"', 22, 1, '2022-04-25 17:41:20', NULL, NULL, 1),
(23, 'Employee Documents', '\"\"', 23, 1, '2022-04-25 17:41:51', NULL, NULL, 1),
(24, 'Employee Documents', '\"\"', 24, 1, '2022-04-25 17:42:20', NULL, NULL, 1),
(25, 'Employee Documents', '\"\"', 25, 1, '2022-04-25 17:43:01', NULL, NULL, 1),
(26, 'Employee Documents', '\"\"', 26, 1, '2022-04-25 17:43:24', NULL, NULL, 1),
(27, 'Employee Documents', '\"\"', 27, 1, '2022-04-25 17:50:10', NULL, NULL, 1),
(28, 'Employee Documents', '\"\"', 28, 1, '2022-04-26 11:52:26', NULL, NULL, 1),
(29, 'Employee Documents', '\"\"', 29, 1, '2022-04-26 11:52:42', NULL, NULL, 1),
(30, 'Employee Documents', '\"\"', 30, 1, '2022-04-26 11:52:45', NULL, NULL, 1),
(31, 'Employee Documents', '\"\"', 31, 1, '2022-04-26 11:52:45', NULL, NULL, 1),
(32, 'Employee Documents', '\"\"', 32, 1, '2022-04-26 11:52:46', NULL, NULL, 1),
(33, 'Employee Documents', '\"\"', 33, 1, '2022-04-26 11:52:46', NULL, NULL, 1),
(34, 'Employee Documents', '\"\"', 34, 1, '2022-04-26 11:53:29', NULL, NULL, 1),
(35, 'Employee Documents', '\"\"', 35, 1, '2022-04-26 11:57:47', NULL, NULL, 1),
(36, 'Employee Documents', '\"\"', 36, 1, '2022-04-26 12:25:52', NULL, NULL, 1),
(37, 'Employee Documents', '\"\"', 37, 1, '2022-04-26 12:44:09', NULL, NULL, 1),
(38, 'Employee Documents', '\"\"', 38, 1, '2022-04-26 12:44:36', NULL, NULL, 1),
(39, 'Employee Documents', '\"\"', 39, 1, '2022-04-26 12:45:08', NULL, NULL, 1),
(40, 'Employee Documents', '\"\"', 40, 1, '2022-04-26 12:45:51', NULL, NULL, 1),
(41, 'Employee Documents', '\"\"', 41, 1, '2022-04-26 12:46:24', NULL, NULL, 1),
(42, 'Employee Documents', '\"\"', 42, 1, '2022-04-26 12:47:00', NULL, NULL, 1),
(43, 'Employee Documents', '\"\"', 43, 1, '2022-04-26 12:47:09', NULL, NULL, 1),
(44, 'Employee Documents', '\"\"', 44, 1, '2022-04-26 12:47:16', NULL, NULL, 1),
(45, 'Employee Documents', '\"\"', 45, 1, '2022-04-26 12:47:30', NULL, NULL, 1),
(46, 'Employee Documents', '\"\"', 46, 1, '2022-04-26 12:48:20', NULL, NULL, 1),
(47, 'Employee Documents', '\"\"', 47, 1, '2022-04-26 12:48:33', NULL, NULL, 1),
(48, 'Employee Documents', '\"\"', 48, 1, '2022-04-26 12:49:38', NULL, NULL, 1),
(49, 'Employee Documents', '\"\"', 49, 1, '2022-04-26 12:49:59', NULL, NULL, 1),
(50, 'Employee Documents', '\"\"', 50, 1, '2022-04-26 12:50:34', NULL, NULL, 1),
(51, 'Employee Documents', '\"\"', 51, 1, '2022-04-26 12:50:40', NULL, NULL, 1),
(52, 'Employee Documents', '\"\"', 52, 1, '2022-04-26 12:52:10', NULL, NULL, 1),
(53, 'Employee Documents', '\"\"', 53, 1, '2022-04-26 12:52:17', NULL, NULL, 1),
(54, 'Employee Documents', '\"\"', 54, 1, '2022-04-26 12:53:17', NULL, NULL, 1),
(55, 'Employee Documents', '\"\"', 55, 1, '2022-04-26 12:53:57', NULL, NULL, 1),
(56, 'Employee Documents', '\"\"', 56, 1, '2022-04-26 13:00:28', NULL, NULL, 1),
(57, 'Employee Documents', '\"\"', 57, 1, '2022-04-26 13:01:08', NULL, NULL, 1),
(58, 'Employee Documents', '\"\"', 58, 1, '2022-04-26 13:02:09', NULL, NULL, 1),
(59, 'Employee Documents', '\"\"', 59, 1, '2022-04-26 13:03:00', NULL, NULL, 1),
(60, 'Employee Documents', '\"\"', 60, 1, '2022-04-26 13:03:06', NULL, NULL, 1),
(61, 'Employee Documents', '\"\"', 61, 1, '2022-04-26 13:03:53', NULL, NULL, 1),
(62, 'Employee Documents', '\"\"', 62, 1, '2022-04-26 18:24:28', NULL, NULL, 1),
(63, 'Employee Documents', '\"\"', 63, 1, '2022-04-27 11:03:57', NULL, NULL, 1),
(64, 'Employee Documents', '\"\"', 64, 1, '2022-04-27 11:05:34', NULL, NULL, 1),
(65, 'Employee Documents', '\"\"', 65, 1, '2022-04-27 11:05:38', NULL, NULL, 1),
(66, 'Employee Documents', '\"\"', 66, 1, '2022-04-27 11:07:46', NULL, NULL, 1),
(67, 'Employee Documents', '\"\"', 67, 1, '2022-04-27 11:07:52', NULL, NULL, 1),
(68, 'Employee Documents', '\"\"', 68, 1, '2022-04-27 11:10:14', NULL, NULL, 1),
(69, 'Employee Documents', '\"\"', 69, 1, '2022-04-27 11:13:12', NULL, NULL, 1),
(70, 'Employee Documents', '\"\"', 70, 1, '2022-04-27 11:18:59', NULL, NULL, 1),
(71, 'Employee Documents', '\"\"', 71, 1, '2022-04-27 11:29:54', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_emergency_contact`
--

CREATE TABLE `emp_emergency_contact` (
  `emc_id` int(11) NOT NULL,
  `emc_address` varchar(255) NOT NULL,
  `emc_city` int(11) NOT NULL,
  `emc_state` int(11) NOT NULL,
  `emc_country` int(11) NOT NULL,
  `emc_zipcode` varchar(10) NOT NULL,
  `emc_name` varchar(255) NOT NULL,
  `emc_email` varchar(255) NOT NULL,
  `emc_phone_number` varchar(12) NOT NULL,
  `emc_relation` varchar(50) NOT NULL,
  `emc_status` tinyint(1) NOT NULL DEFAULT 1,
  `emc_created_at` datetime NOT NULL,
  `emc_update_at` datetime DEFAULT NULL,
  `emc_update_by` int(11) DEFAULT NULL,
  `emc_created_by` int(11) DEFAULT NULL,
  `emc_emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE `emp_salary` (
  `emps_id` int(11) NOT NULL,
  `emps_bank_name` varchar(255) NOT NULL,
  `emps_account_number` varchar(50) NOT NULL,
  `emps_ifsc_code` varchar(20) NOT NULL,
  `emps_epf_number` varchar(15) NOT NULL,
  `emps_salary` float NOT NULL DEFAULT 0,
  `emps_annual_salary` float NOT NULL DEFAULT 0,
  `emps_emp_id` int(11) NOT NULL,
  `emps_status` tinyint(1) NOT NULL DEFAULT 1,
  `emps_created_at` datetime NOT NULL,
  `emps_update_at` datetime DEFAULT NULL,
  `emps_update_by` int(11) DEFAULT NULL,
  `emps_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`emps_id`, `emps_bank_name`, `emps_account_number`, `emps_ifsc_code`, `emps_epf_number`, `emps_salary`, `emps_annual_salary`, `emps_emp_id`, `emps_status`, `emps_created_at`, `emps_update_at`, `emps_update_by`, `emps_created_by`) VALUES
(1, 'x', '8', 'dd', '7894561236', 700, 0, 1, 1, '2022-03-29 18:24:59', '2022-03-29 18:42:27', 1, 1),
(2, 'Pnb', '47470001201110000', 'PUNB0474700', '3659857458', 100000, 0, 2, 1, '2022-04-25 16:22:28', '2022-04-25 17:02:53', 1, 1),
(3, 'asf', 'aasf', 'fasf', '', 0, 0, 3, 1, '2022-04-25 16:48:04', NULL, NULL, 1),
(4, 'saf', 'saf', 'asf', '', 0, 0, 4, 1, '2022-04-25 16:48:52', NULL, NULL, 1),
(5, 'Pnb', 'asf', 'PUNB0474700', '', 0, 0, 5, 1, '2022-04-25 16:49:56', NULL, NULL, 1),
(6, 'Pnb', 'asf', 'PUNB0474700', '', 0, 0, 6, 1, '2022-04-25 16:51:17', NULL, NULL, 1),
(7, 'Pnb', 'asf', 'PUNB0474700', '', 0, 0, 7, 1, '2022-04-25 16:56:07', NULL, NULL, 1),
(8, 'afs', 'asf', 'asf', '', 0, 0, 8, 1, '2022-04-25 17:03:42', NULL, NULL, 1),
(9, 'afs', 'asf', 'asf', '', 0, 0, 9, 1, '2022-04-25 17:04:07', NULL, NULL, 1),
(10, 'afs', 'asf', 'asf', '', 0, 0, 10, 1, '2022-04-25 17:04:17', NULL, NULL, 1),
(11, 'afs', 'asf', 'asf', '', 0, 0, 11, 1, '2022-04-25 17:06:43', NULL, NULL, 1),
(12, 'afs', 'asf', 'asf', '', 0, 0, 12, 1, '2022-04-25 17:08:01', NULL, NULL, 1),
(13, 'afs', 'asf', 'asf', '', 0, 0, 13, 1, '2022-04-25 17:08:08', NULL, NULL, 1),
(14, 'Pnb', 'asf', 'PUNB0474700', '', 0, 0, 14, 1, '2022-04-25 17:17:27', NULL, NULL, 1),
(15, 'Pnb', 'asf', 'PUNB0474700', '', 0, 0, 15, 1, '2022-04-25 17:28:49', NULL, NULL, 1),
(16, 'Pnb', 'asf', 'PUNB0474700', '', 0, 0, 16, 1, '2022-04-25 17:29:25', NULL, NULL, 1),
(17, 'Pnb', 'asf', 'PUNB0474700', '', 0, 0, 17, 1, '2022-04-25 17:30:48', NULL, NULL, 1),
(18, 'Pnb', 'asf', 'PUNB0474700', '', 0, 0, 18, 1, '2022-04-25 17:31:38', NULL, NULL, 1),
(19, 'afs', 'asf', 'asf', '', 0, 0, 19, 1, '2022-04-25 17:39:05', NULL, NULL, 1),
(20, 'afs', 'asf', 'asf', '', 0, 0, 20, 1, '2022-04-25 17:40:11', NULL, NULL, 1),
(21, 'afs', 'asf', 'asf', '', 0, 0, 21, 1, '2022-04-25 17:40:48', NULL, NULL, 1),
(22, 'afs', 'asf', 'asf', '', 0, 0, 22, 1, '2022-04-25 17:41:20', NULL, NULL, 1),
(23, 'afs', 'asf', 'asf', '', 0, 0, 23, 1, '2022-04-25 17:41:51', NULL, NULL, 1),
(24, 'afs', 'asf', 'asf', '', 0, 0, 24, 1, '2022-04-25 17:42:20', NULL, NULL, 1),
(25, 'afs', 'asf', 'asf', '', 0, 0, 25, 1, '2022-04-25 17:43:01', NULL, NULL, 1),
(26, 'afs', 'asf', 'asf', '', 0, 0, 26, 1, '2022-04-25 17:43:24', NULL, NULL, 1),
(27, 'saf', 'asf', 'saf', '', 0, 0, 27, 1, '2022-04-25 17:50:10', NULL, NULL, 1),
(28, 'asf', 'asf', 'asf', '', 0, 0, 28, 1, '2022-04-26 11:52:26', NULL, NULL, 1),
(29, 'asf', 'asf', 'asf', '', 0, 0, 29, 1, '2022-04-26 11:52:42', NULL, NULL, 1),
(30, 'asf', 'asf', 'asf', '', 0, 0, 30, 1, '2022-04-26 11:52:45', NULL, NULL, 1),
(31, 'asf', 'asf', 'asf', '', 0, 0, 31, 1, '2022-04-26 11:52:45', NULL, NULL, 1),
(32, 'asf', 'asf', 'asf', '', 0, 0, 32, 1, '2022-04-26 11:52:46', NULL, NULL, 1),
(33, 'asf', 'asf', 'asf', '', 0, 0, 33, 1, '2022-04-26 11:52:46', NULL, NULL, 1),
(34, 'sfas', 'sffsaf', 'asf', '', 0, 0, 34, 1, '2022-04-26 11:53:29', NULL, NULL, 1),
(35, 'saf', 's', 'PUNB0474700', '', 0, 0, 35, 1, '2022-04-26 11:57:47', NULL, NULL, 1),
(36, 'afs', 'sf', 'saf', '', 0, 0, 36, 1, '2022-04-26 12:25:52', NULL, NULL, 1),
(37, 'asf', 'saf', 'asf', '', 0, 0, 37, 1, '2022-04-26 12:44:09', NULL, NULL, 1),
(38, 'asf', 'saf', 'asf', '', 0, 0, 38, 1, '2022-04-26 12:44:36', NULL, NULL, 1),
(39, 'asf', 'saf', 'asf', '', 0, 0, 39, 1, '2022-04-26 12:45:08', NULL, NULL, 1),
(40, 'asf', 'saf', 'asf', '', 0, 0, 40, 1, '2022-04-26 12:45:51', NULL, NULL, 1),
(41, 'asf', 'saf', 'asf', '', 0, 0, 41, 1, '2022-04-26 12:46:24', NULL, NULL, 1),
(42, 'asf', 'saf', 'asf', '', 0, 0, 42, 1, '2022-04-26 12:47:00', NULL, NULL, 1),
(43, 'asf', 'saf', 'asf', '', 0, 0, 43, 1, '2022-04-26 12:47:09', NULL, NULL, 1),
(44, 'asf', 'saf', 'asf', '', 0, 0, 44, 1, '2022-04-26 12:47:16', NULL, NULL, 1),
(45, 'asf', 'saf', 'asf', '', 0, 0, 45, 1, '2022-04-26 12:47:30', NULL, NULL, 1),
(46, 'asf', 'saf', 'asf', '', 0, 0, 46, 1, '2022-04-26 12:48:20', NULL, NULL, 1),
(47, 'asf', 'saf', 'asf', '', 0, 0, 47, 1, '2022-04-26 12:48:33', NULL, NULL, 1),
(48, 'asf', 'saf', 'asf', '', 0, 0, 48, 1, '2022-04-26 12:49:38', NULL, NULL, 1),
(49, 'asf', 'saf', 'asf', '', 0, 0, 49, 1, '2022-04-26 12:49:59', NULL, NULL, 1),
(50, 'asf', 'saf', 'asf', '', 0, 0, 50, 1, '2022-04-26 12:50:34', NULL, NULL, 1),
(51, 'asf', 'saf', 'asf', '', 0, 0, 51, 1, '2022-04-26 12:50:40', NULL, NULL, 1),
(52, 'asf', 'saf', 'asf', '', 0, 0, 52, 1, '2022-04-26 12:52:10', NULL, NULL, 1),
(53, 'asf', 'saf', 'asf', '', 0, 0, 53, 1, '2022-04-26 12:52:17', NULL, NULL, 1),
(54, 'asf', 'saf', 'asf', '', 0, 0, 54, 1, '2022-04-26 12:53:17', NULL, NULL, 1),
(55, 'asf', 'saf', 'asf', '', 0, 0, 55, 1, '2022-04-26 12:53:57', NULL, NULL, 1),
(56, 'asf', 'saf', 'asf', '', 0, 0, 56, 1, '2022-04-26 13:00:28', NULL, NULL, 1),
(57, 'asf', 'saf', 'asf', '', 0, 0, 57, 1, '2022-04-26 13:01:08', NULL, NULL, 1),
(58, 'asf', 'saf', 'asf', '', 0, 0, 58, 1, '2022-04-26 13:02:09', NULL, NULL, 1),
(59, 'asf', 'aasf', 'fasf', '', 0, 0, 59, 1, '2022-04-26 13:03:00', NULL, NULL, 1),
(60, 'asf', 'aasf', 'fasf', '', 0, 0, 60, 1, '2022-04-26 13:03:06', NULL, NULL, 1),
(61, 'asf', 'aasf', 'fasf', '', 0, 0, 61, 1, '2022-04-26 13:03:53', NULL, NULL, 1),
(62, 'Pnb', 'aasf', 'fasf', '', 0, 0, 62, 1, '2022-04-26 18:24:28', NULL, NULL, 1),
(63, 'Pnb', '47470001201110000', 'PUNB0474700', '', 0, 0, 63, 1, '2022-04-27 11:03:57', NULL, NULL, 1),
(64, 'Pnb', '47470001201110000', 'PUNB0474700', '', 0, 0, 64, 1, '2022-04-27 11:05:34', NULL, NULL, 1),
(65, 'Pnb', '47470001201110000', 'PUNB0474700', '', 0, 0, 65, 1, '2022-04-27 11:05:38', NULL, NULL, 1),
(66, 'Pnb', '47470001201110000', 'PUNB0474700', '', 0, 0, 66, 1, '2022-04-27 11:07:46', NULL, NULL, 1),
(67, 'Pnb', '47470001201110000', 'PUNB0474700', '', 0, 0, 67, 1, '2022-04-27 11:07:52', NULL, NULL, 1),
(68, 'Pnb', 'aasf', 'PUNB0474700', '', 0, 0, 68, 1, '2022-04-27 11:10:14', NULL, NULL, 1),
(69, 'Pnb', '47470001201110000', 'PUNB0474700', '', 0, 0, 69, 1, '2022-04-27 11:13:12', NULL, NULL, 1),
(70, 'Pnb', '47470001201110000', 'PUNB0474700', '', 0, 0, 70, 1, '2022-04-27 11:18:59', NULL, NULL, 1),
(71, 'Pnb', '47470001201110000', 'PUNB0474700', '', 0, 0, 71, 1, '2022-04-27 11:29:54', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `looking_for` varchar(100) DEFAULT NULL,
  `property_type` varchar(50) DEFAULT NULL,
  `subproperty_type` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `property_in_location` varchar(50) DEFAULT NULL,
  `square_feet` varchar(50) DEFAULT NULL,
  `no_of_beds` varchar(50) DEFAULT NULL,
  `no_of_bathroom` varchar(50) DEFAULT NULL,
  `price_range` varchar(100) NOT NULL,
  `facing` text DEFAULT NULL,
  `floor` varchar(20) DEFAULT NULL,
  `posted_by` int(11) DEFAULT 0,
  `category` int(11) DEFAULT 0,
  `sub_category` int(11) DEFAULT 0,
  `lead_action_status` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0- new 1- inview 2-assign 3-old	',
  `lead_status_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `lead_assigned_to` varchar(200) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `first_name`, `last_name`, `email`, `phone`, `looking_for`, `property_type`, `subproperty_type`, `city`, `state`, `property_in_location`, `square_feet`, `no_of_beds`, `no_of_bathroom`, `price_range`, `facing`, `floor`, `posted_by`, `category`, `sub_category`, `lead_action_status`, `lead_status_id`, `owner_id`, `lead_assigned_to`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(13, 'Shalu', 'S', 'shalu@mail.com', '9874563210', '1', '1', 'Apartment', 'Noida', '23', 'Sector 5', 'Sq 74 - Sq 299', '1', '1', 'Rs 74 - Rs 300', 'North', 'Lower Ground', 2, 1, 0, '0', 0, 1, '0', 1, 0, '2022-04-18 11:09:24', NULL),
(14, 'new test-1', 'last', 'client1@gmail.com', '9876543214', '2', '2', 'Land', 'Lohit', '3', 'Sector 5', 'sq.ft.75 - sq.ft.300', '3', '3', 'Rs5000 - Rs5000', 'North', 'Basement', 3, 2, 0, '0', 0, 1, '0', 1, 0, '2022-04-20 17:54:02', NULL),
(15, 'new test-2', 'last-2', 'client2@gmail.com', '5874589654', '1', '1', 'Land', 'Aurangabad', '4', 'Sector 5', 'sq.ft.75 - sq.ft.300', '3', '3', 'Rs 3318745 - Rs 7140728', 'North - East', 'Ground', 1, 1, 0, '0', 0, 1, '0', 1, 0, '2022-04-20 17:55:25', NULL),
(16, 'again test reload', 'dss', 'clients111@gmail.com', '1452365241', '1', '2', 'Retail', 'North Goa', '26', 'Sector 5', 'sq.ft.75 - sq.ft.300', '3', '3', 'Rs5000 - Rs5000', 'North', '9', 2, 2, 0, '0', 0, 1, '0', 1, 0, '2022-04-20 17:59:30', NULL),
(17, 'again test reloadee', 'dss', 'shalu@sartiaglobal.com', '7485965874', '2', '1', 'Independent House/ Villa', 'Garhwa', '34', 'Sector 5', 'sq.ft.75 - sq.ft.300', '2', '2', 'Rs5000 - Rs5000', 'South - East', '6', 2, 1, 0, '0', 0, 1, '0', 1, 0, '2022-04-20 18:02:00', NULL),
(18, 'asasasasasasasasas', '', 'superamin@gmail.com', '9876543210', '1', '1', 'Serviced Apartment', 'South Goa', '26', 'Sector 5', 'sq.ft.75 - sq.ft.300', '1', '1', 'Rs5000 - Rs5000', 'East', 'Ground', 1, 1, 0, '0', 0, 1, '0', 1, 0, '2022-04-20 18:26:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lead_categories`
--

CREATE TABLE `lead_categories` (
  `id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `devtitle` varchar(255) NOT NULL,
  `header` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `header_file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_categories`
--

INSERT INTO `lead_categories` (`id`, `title`, `devtitle`, `header`, `status`, `header_file`, `created_at`, `updated_at`) VALUES
(1, 'Sell', '', NULL, 1, NULL, '2022-03-15 15:54:14', '2022-03-15 15:54:14'),
(2, 'Rent', '', NULL, 1, NULL, '2022-03-15 15:54:23', '2022-03-15 15:54:23'),
(3, 'PG', '', NULL, 1, NULL, '2022-03-15 15:59:58', '2022-03-15 15:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `lead_sub_categories`
--

CREATE TABLE `lead_sub_categories` (
  `id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `devtitle` varchar(255) NOT NULL,
  `category_id` int(100) NOT NULL,
  `header` text DEFAULT NULL,
  `header_file` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_sub_categories`
--

INSERT INTO `lead_sub_categories` (`id`, `title`, `devtitle`, `category_id`, `header`, `header_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Residential', '', 1, NULL, NULL, 1, '2022-03-15 16:02:22', '2022-03-15 16:02:22'),
(2, 'commercial', '', 1, NULL, NULL, 1, '2022-03-15 16:02:38', '2022-03-15 16:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `localities`
--

CREATE TABLE `localities` (
  `id` int(11) UNSIGNED NOT NULL,
  `locality_title` varchar(250) DEFAULT NULL,
  `city_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `localities`
--

INSERT INTO `localities` (`id`, `locality_title`, `city_id`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`) VALUES
(21, 'Sector 5', 604, 1, '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locatedinsides`
--

CREATE TABLE `locatedinsides` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `ques_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locatedinsides`
--

INSERT INTO `locatedinsides` (`id`, `title`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`, `ques_id`) VALUES
(1, 'IT Park', 1, '2022-03-31 18:02:11', NULL, NULL, NULL, NULL, NULL, 0),
(2, 'Business Park', 1, '2022-03-31 18:02:11', NULL, NULL, NULL, NULL, NULL, 0),
(3, 'Other', 1, '2022-03-31 18:02:11', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meetinglocations`
--

CREATE TABLE `meetinglocations` (
  `id` int(11) UNSIGNED NOT NULL,
  `meeting_id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `is_visited` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meetinglocations`
--

INSERT INTO `meetinglocations` (`id`, `meeting_id`, `property_id`, `is_visited`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(46, 21, 29, 1, 1, '2022-04-18 11:28:18', 1, '2022-04-18 12:05:38', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) UNSIGNED NOT NULL,
  `emp_id` int(11) UNSIGNED NOT NULL,
  `lead_id` int(11) UNSIGNED NOT NULL,
  `meeting_date` date DEFAULT NULL,
  `meeting_time` time DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL,
  `remark_after_meet` varchar(250) DEFAULT NULL,
  `meeting_status` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `emp_id`, `lead_id`, `meeting_date`, `meeting_time`, `purpose`, `remark_after_meet`, `meeting_status`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(21, 1, 13, '2022-04-19', '14:30:00', 'Lorem empsum Lorem empsum Lorem empsum Lorem empsum Lorem empsum', NULL, 1, 1, '2022-04-18 11:17:00', 1, '2022-04-18 11:28:18', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meetingstatuses`
--

CREATE TABLE `meetingstatuses` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meetingstatuses`
--

INSERT INTO `meetingstatuses` (`id`, `title`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Schedule', 1, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL),
(2, 'Conduct', 1, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL),
(3, 'Rescheduled', 1, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL),
(4, 'Postponed', 1, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL),
(5, 'Canceled', 1, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL),
(6, 'Completed', 1, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL, '2022-04-15 06:57:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meetingtimelines`
--

CREATE TABLE `meetingtimelines` (
  `id` int(11) UNSIGNED NOT NULL,
  `meeting_id` int(11) UNSIGNED NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `meeting_status` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2022-03-09-080650', 'App\\Database\\Migrations\\Modules', 'default', 'App', 1646821261, 1),
(3, '2022-03-09-080700', 'App\\Database\\Migrations\\SubModules', 'default', 'App', 1646821261, 1),
(4, '2022-03-09-114530', 'App\\Database\\Migrations\\PropertyType', 'default', 'App', 1646826533, 2),
(5, '2022-03-09-115014', 'App\\Database\\Migrations\\Amenities', 'default', 'App', 1646826675, 3),
(6, '2022-03-09-115124', 'App\\Database\\Migrations\\State', 'default', 'App', 1646826873, 4),
(8, '2022-03-09-115849', 'App\\Database\\Migrations\\PropertyInfo', 'default', 'App', 1646828681, 6),
(12, '2022-03-09-122612', 'App\\Database\\Migrations\\PropertyAddress', 'default', 'App', 1646829918, 7),
(13, '2022-03-09-124902', 'App\\Database\\Migrations\\PropertiesArea', 'default', 'App', 1646830538, 8),
(14, '2022-03-09-125618', 'App\\Database\\Migrations\\PropertiesOwnerInfo', 'default', 'App', 1646830815, 9),
(16, '2022-03-09-130636', 'App\\Database\\Migrations\\PropertyUeserRelation', 'default', 'App', 1646831352, 11),
(17, '2022-03-09-130954', 'App\\Database\\Migrations\\AllotStatus', 'default', 'App', 1646831530, 12),
(18, '2022-03-10-051457', 'App\\Database\\Migrations\\PropertyCategory', 'default', 'App', 1646889409, 13),
(19, '2022-03-11-111543', 'App\\Database\\Migrations\\PropertyAvailbleFor', 'default', 'App', 1646997635, 14),
(21, '2022-03-09-105040', 'App\\Database\\Migrations\\SubSubmodules', 'default', 'App', 1647233974, 15),
(22, '2022-03-09-114117', 'App\\Database\\Migrations\\AddRole', 'default', 'App', 1647233974, 15),
(23, '2022-03-10-052018', 'App\\Database\\Migrations\\UserAccessPermissions', 'default', 'App', 1647233974, 15),
(24, '2022-03-09-071305', 'App\\Database\\Migrations\\AddUsers', 'default', 'App', 1647327140, 16),
(25, '2022-03-09-130053', 'App\\Database\\Migrations\\PropertiesAmenities', 'default', 'App', 1647327140, 16),
(26, '2022-03-25-103413', 'App\\Database\\Migrations\\Designation', 'default', 'App', 1648204624, 17),
(27, '2022-03-25-103845', 'App\\Database\\Migrations\\Departments', 'default', 'App', 1648207407, 18),
(29, '2022-03-30-102006', 'App\\Database\\Migrations\\SubPropertyTypes', 'default', 'App', 1648637435, 19),
(30, '2022-03-31-064957', 'App\\Database\\Migrations\\QuestionsList', 'default', 'App', 1648709798, 20),
(31, '2022-03-31-065011', 'App\\Database\\Migrations\\QuestionsOption', 'default', 'App', 1648710220, 21),
(32, '2022-03-31-121604', 'App\\Database\\Migrations\\ZoneType', 'default', 'App', 1648729244, 22),
(33, '2022-03-31-121622', 'App\\Database\\Migrations\\LocatedInsides', 'default', 'App', 1648729244, 22),
(36, '2022-03-31-124225', 'App\\Database\\Migrations\\Units', 'default', 'App', 1648731495, 23),
(38, '2022-04-01-061337', 'App\\Database\\Migrations\\PropertyMasterKey', 'default', 'App', 1648797819, 24),
(39, '2022-04-01-074134', 'App\\Database\\Migrations\\PropertyMasterValues', 'default', 'App', 1648799078, 25),
(40, '2022-03-09-115439', 'App\\Database\\Migrations\\City', 'default', 'App', 1649057692, 26),
(41, '2022-04-04-072052', 'App\\Database\\Migrations\\Apartment', 'default', 'App', 1649057816, 27),
(42, '2022-04-04-072115', 'App\\Database\\Migrations\\Projects', 'default', 'App', 1649057816, 27),
(43, '2022-04-04-072134', 'App\\Database\\Migrations\\Locality', 'default', 'App', 1649058117, 28),
(44, '2022-04-04-072142', 'App\\Database\\Migrations\\SubLocality', 'default', 'App', 1649058117, 28),
(45, '2022-04-04-073609', 'App\\Database\\Migrations\\PropertyCity', 'default', 'App', 1649058117, 28),
(46, '2022-04-07-045133', 'App\\Database\\Migrations\\VisitorBook', 'default', 'App', 1649308357, 29),
(47, '2022-04-14-054412', 'App\\Database\\Migrations\\MeetingMigration', 'default', 'App', 1649915515, 30),
(48, '2022-04-14-125720', 'App\\Database\\Migrations\\MeetingLocations', 'default', 'App', 1649998611, 31),
(49, '2022-04-14-125752', 'App\\Database\\Migrations\\MeetingTimeline', 'default', 'App', 1649998611, 31),
(50, '2022-04-15-044504', 'App\\Database\\Migrations\\MeetingStatus', 'default', 'App', 1649998658, 32);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `mod_id` int(11) NOT NULL,
  `mod_name` varchar(250) NOT NULL,
  `mod_class` varchar(250) NOT NULL,
  `mod_url` text NOT NULL,
  `mod_status` tinyint(1) NOT NULL DEFAULT 1,
  `mod_created_at` datetime NOT NULL,
  `mod_update_at` datetime DEFAULT NULL,
  `mod_update_by` int(11) DEFAULT NULL,
  `mod_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`mod_id`, `mod_name`, `mod_class`, `mod_url`, `mod_status`, `mod_created_at`, `mod_update_at`, `mod_update_by`, `mod_created_by`) VALUES
(1, 'Dashboard', 'fa fa-dashboard', 'dashboard', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(2, 'Property Inventory', 'fa fa-building-o', 'properties', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(3, 'Lead Management', 'fa-solid fa-list-check', 'all-leads', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(4, 'HR Management', 'fa-solid fa-users', 'all-employees', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(5, 'Finance Management', 'fa fa-money', 'all-expenses', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(6, 'Meetings', 'fa fa-handshake-o', 'meetings', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(7, 'Front Office', 'fas fa-business-time', 'front-office', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(8, 'Software Tutorial', 'fa fa-desktop', 'soft-tutorial', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(9, 'Reports & Statistics', 'fa fa-file', 'lead-status-report', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(10, 'Security', 'fa fa-shield', 'data-storage', 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(11, 'Feedback ', 'fa fa-comments-o', 'feedback', 1, '0000-00-00 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `possession_by`
--

CREATE TABLE `possession_by` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `p_for` varchar(50) NOT NULL DEFAULT 'y',
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `possession_by`
--

INSERT INTO `possession_by` (`id`, `title`, `p_for`, `created_at`, `status`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'WithIn 3 Months', 'y', '2022-04-12 14:25:33', 1, '2022-04-12 14:25:33', '2022-04-12 14:25:33', NULL, NULL, NULL),
(2, 'WithIn 6 Months', 'y', '2022-04-12 14:25:33', 1, '2022-04-12 14:25:33', '2022-04-12 14:25:33', NULL, NULL, NULL),
(3, 'By 2022', 'y', '2022-04-12 14:25:33', 1, '2022-04-12 14:25:33', '2022-04-12 14:25:33', NULL, NULL, NULL),
(4, 'By 2023', 'y', '2022-04-12 14:25:33', 1, '2022-04-12 14:25:33', '2022-04-12 14:25:33', NULL, NULL, NULL),
(5, 'By 2024', 'y', '2022-04-12 14:25:33', 1, '2022-04-12 14:25:33', '2022-04-12 14:25:33', NULL, NULL, NULL),
(6, 'By 2025', 'y', '2022-04-12 14:25:33', 1, '2022-04-12 14:25:33', '2022-04-12 14:25:33', NULL, NULL, NULL),
(7, 'By 2026', 'y', '2022-04-12 14:25:33', 1, '2022-04-12 14:25:33', '2022-04-12 14:25:33', NULL, NULL, NULL),
(8, 'By 2027', 'y', '2022-04-12 14:25:33', 1, '2022-04-12 14:25:33', '2022-04-12 14:25:33', NULL, NULL, NULL),
(9, 'By 2028', 'y', '2022-04-12 14:25:33', 1, '2022-04-12 14:25:33', '2022-04-12 14:25:33', NULL, NULL, NULL),
(10, 'By 2029', 'y', '2022-04-12 14:25:33', 1, '2022-04-12 14:25:33', '2022-04-12 14:25:33', NULL, NULL, NULL),
(11, 'January', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(12, 'February', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(13, 'March', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(14, 'April', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(15, 'May', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(16, 'June', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(17, 'July', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(18, 'August', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(19, 'September', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(20, 'October', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(21, 'November', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL),
(22, 'December', 'm', '2022-04-12 14:28:12', 1, '2022-04-12 14:28:12', '2022-04-12 14:28:12', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_title` varchar(250) DEFAULT NULL,
  `city_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_title`, `city_id`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Residential Project in Noida', 1, 1, '2022-04-04 11:05:33', NULL, '2022-04-04 11:05:33', NULL, '2022-04-04 11:05:33', NULL),
(2, 'IVY County', 1, 1, '2022-04-04 11:05:33', NULL, '2022-04-04 11:05:33', NULL, '2022-04-04 11:05:33', NULL),
(3, 'P1', 14, 1, '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL),
(4, 'P2', 15, 1, '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL),
(5, '', 10, 1, '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `propertiesavailablefors`
--

CREATE TABLE `propertiesavailablefors` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `propertiesavailablefors`
--

INSERT INTO `propertiesavailablefors` (`id`, `title`, `status`, `created_at`, `update_at`, `deleted_at`, `update_by`, `created_by`) VALUES
(1, 'Sell', 1, '2022-03-11 12:22:25', '2022-03-11 12:22:25', '2022-03-11 12:22:25', NULL, NULL),
(2, 'Rent/Lease', 1, '2022-03-11 12:22:25', '2022-03-11 12:22:25', '2022-03-11 12:22:25', NULL, NULL),
(3, 'PG', 1, '2022-03-11 12:22:25', '2022-03-11 12:22:25', '2022-03-11 12:22:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `properties_owner_info`
--

CREATE TABLE `properties_owner_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `alt_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `customer_type` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `anniversary` date DEFAULT NULL,
  `property_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties_owner_info`
--

INSERT INTO `properties_owner_info` (`id`, `name`, `phone_number`, `alt_number`, `email`, `customer_type`, `birthday`, `anniversary`, `property_id`, `status`, `created_at`, `update_at`, `update_by`, `created_by`) VALUES
(13, 'test', 'test@mail.com', '1234567890', '444444444444444', NULL, NULL, NULL, 29, 1, '2022-04-18 11:06:13', NULL, NULL, 0),
(14, '', '', '', '', '', NULL, NULL, 30, 1, '2022-04-20 16:34:40', NULL, NULL, 0),
(15, '', '', '', '', 'Customer Type (Optional)', '2022-03-29', '2022-04-06', 31, 1, '2022-04-20 17:28:59', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `propertycities`
--

CREATE TABLE `propertycities` (
  `id` int(11) UNSIGNED NOT NULL,
  `ct_title` varchar(250) DEFAULT NULL,
  `state_id` int(11) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `propertymasterkeys`
--

CREATE TABLE `propertymasterkeys` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `key_for` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `propertymasterkeys`
--

INSERT INTO `propertymasterkeys` (`id`, `title`, `key_for`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Property Features', 'col-form-label fw-bold fs-6', 1, '2022-04-01 14:34:25', NULL, NULL, NULL, NULL, NULL),
(2, 'Society/ Building Features', 'col-form-label fw-bold fs-6', 1, '2022-04-01 14:34:25', NULL, NULL, NULL, NULL, NULL),
(3, 'Additional Features', 'col-form-label fw-bold fs-6', 1, '2022-04-01 14:34:25', NULL, NULL, NULL, NULL, NULL),
(4, 'Water Source', 'col-form-label fw-bold fs-6', 1, '2022-04-01 14:34:25', NULL, NULL, NULL, NULL, NULL),
(5, 'Overlooking', 'col-form-label fw-bold fs-6', 1, '2022-04-01 14:34:25', NULL, NULL, NULL, NULL, NULL),
(6, 'Other Features', 'col-form-label fw-bold fs-6', 1, '2022-04-01 14:34:25', NULL, NULL, NULL, NULL, NULL),
(7, 'Power Back up', 'col-form-label fw-bold fs-6', 1, '2022-04-01 14:34:25', NULL, NULL, NULL, NULL, NULL),
(8, 'Property Facing', 'col-form-label fw-bold fs-6', 1, '2022-04-01 14:34:25', NULL, NULL, NULL, NULL, NULL),
(9, 'Type of Flooring', 'col-form-label fw-bold fs-6', 1, '2022-04-01 14:34:25', NULL, NULL, NULL, NULL, NULL),
(10, 'Location Advantages', 'col-form-label fw-bold fs-6 p-0 m-0', 1, '2022-04-01 14:34:25', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `propertymastervalues`
--

CREATE TABLE `propertymastervalues` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `short_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `key_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `propertymastervalues`
--

INSERT INTO `propertymastervalues` (`id`, `title`, `short_name`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`, `key_id`) VALUES
(1, 'High Ceiling Height', 'height', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(2, 'False Ceiling Lighting', 'lighting', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(3, 'Piped-gas', 'gas', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(4, 'Internet/wi-fi connectivity', 'connectivity', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(5, 'Centrally air conditioned', 'conitioned', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(6, 'Water Purifier', 'wpurifier', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(7, 'Recently Renovated', 'renovated', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(8, 'Private Garden/Terrace', 'terrace', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(9, 'Natural Light', 'light', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(10, 'Private Airy Rooms', 'roooms', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(11, 'Private Spacious Interiors', 'interior', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 1),
(12, 'Water Softening plant', 'plant', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 2),
(13, 'Shopping Centre', 'center', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 2),
(14, 'Fitness Centre/ GYM', 'gym', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 2),
(15, 'Swimming Pool', 'pool', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 2),
(16, 'Club house/ Community Centre', 'community', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 2),
(17, 'Security Personnel', 'personnel', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 2),
(18, 'Separate entry for servant room', 'room', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 3),
(19, 'Waste Disposal', 'disposal', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 3),
(20, 'No open drainage around', 'around', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 3),
(21, 'Rain water Harvesting', 'harvesting', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 3),
(22, 'Bank Attached Property', 'property', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 3),
(23, 'Low Density Society', 'society', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 3),
(24, 'Municipal Corporation', 'corporation', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 4),
(25, 'Borewell/ Tank', 'tank', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 4),
(26, '24*7 Water', 'water', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 4),
(27, 'Pool', 'home', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 5),
(28, 'Park/ Garden', 'garden', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 5),
(29, 'Club', 'club', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 5),
(30, 'Main Road', 'road', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 5),
(31, 'Others', 'others', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 5),
(32, 'In a gated society', 'gated-society', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 6),
(33, 'Corner Property', 'corner-property', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 6),
(34, 'Pet Friendly', 'pet-friendly', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 6),
(35, 'Wheelchair Friendly', 'wheelchair-friendly', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 6),
(36, 'None', 'backup', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 7),
(37, 'Partial', 'backup', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 7),
(38, 'Full', 'backup', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 7),
(39, 'North', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 8),
(40, 'South', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 8),
(41, 'East', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 8),
(42, 'West', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 8),
(43, 'North-East', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 8),
(44, 'North-West', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 8),
(45, 'South-East', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 8),
(46, 'South-West', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 8),
(47, 'Marble', 'Marble', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(48, 'Concerete', 'Concerete', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(49, 'Polished Concerete', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(50, 'Granite', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(51, 'Ceramic', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(52, 'Mosaic', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(53, 'Cement', 'Cement', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(54, 'Stone', 'Stone', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(55, 'Vinyl', 'Vinyl', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(56, 'Wood', 'Wood', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(57, 'Vitrified', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(58, 'Spartex', 'IPSFinish', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(59, 'Others', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 9),
(60, 'Close to Metro Station', 'station', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 10),
(61, 'Close to School', 'school', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 10),
(62, 'Close to Hospital', 'hospital', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 10),
(63, 'Close to Market', 'market', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 10),
(64, 'Close to Railway Station', 'railway', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 10),
(65, 'Close to Airport', 'airports', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 10),
(66, 'Close to Mall', 'facing', 1, '2022-04-01 14:35:08', NULL, NULL, NULL, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `property_additional_features`
--

CREATE TABLE `property_additional_features` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `property_features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `amenities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `soc_building_features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `additional_features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `water_source` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `overlooking` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `other_features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `power_back_up` varchar(20) DEFAULT NULL,
  `property_facing` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `type_of_flooring` int(11) DEFAULT NULL,
  `w_facing_road` varchar(20) DEFAULT NULL,
  `w_facing_road_unit` varchar(10) DEFAULT NULL,
  `location_adv` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ups` float DEFAULT 0,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_additional_features`
--

INSERT INTO `property_additional_features` (`id`, `property_id`, `property_features`, `amenities`, `soc_building_features`, `additional_features`, `water_source`, `overlooking`, `other_features`, `power_back_up`, `property_facing`, `type_of_flooring`, `w_facing_road`, `w_facing_road_unit`, `location_adv`, `ups`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(13, 29, '[\"High Ceiling Height\",\"Private Airy Rooms\"]', '[\"compliant\"]', '[\"Shopping Centre\"]', '[\"Separate entry for servant room\"]', '[\"Municipal Corporation\"]', '', '[\"Corner Property\"]', 'Full', 'West', 48, '111', 'Meter', '[\"Close to Metro Station\"]', 0, 1, '2022-04-18 11:06:13', '2022-04-18 11:06:13', NULL, 0, NULL, NULL),
(14, 30, '', '', '', '', '', '', '', '', '', 0, '', 'Feet', '', 0, 1, '2022-04-20 16:34:40', '2022-04-20 16:34:40', NULL, 0, NULL, NULL),
(15, 31, '', '', '', '', '', '', '', '', '', 0, '', 'Feet', '', 0, 1, '2022-04-20 17:28:59', '2022-04-20 17:28:59', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_basic_details`
--

CREATE TABLE `property_basic_details` (
  `id` int(11) NOT NULL,
  `property_title` text DEFAULT NULL,
  `looking_for` int(11) NOT NULL,
  `property_type` int(11) NOT NULL,
  `propertySubType` varchar(50) NOT NULL,
  `question_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `isDeleted` tinyint(1) DEFAULT 0,
  `isPublished` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_basic_details`
--

INSERT INTO `property_basic_details` (`id`, `property_title`, `looking_for`, `property_type`, `propertySubType`, `question_data`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `isDeleted`, `isPublished`) VALUES
(29, '4 BHK Apartment for Sell', 1, 1, 'independent-house', NULL, 1, 0, '2022-04-18 11:06:13', '2022-04-18 11:06:13', 0, '0000-00-00 00:00:00', 0, 0, 1),
(30, ' Apartment for Sell', 1, 1, '', NULL, 1, 0, '2022-04-20 16:34:40', '2022-04-20 16:34:40', 0, '0000-00-00 00:00:00', 0, 0, 1),
(31, ' Apartment for Sell', 1, 1, '', NULL, 1, 0, '2022-04-20 17:28:59', '2022-04-20 17:28:59', 0, '0000-00-00 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_category`
--

CREATE TABLE `property_category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) DEFAULT NULL,
  `cat_status` tinyint(1) NOT NULL DEFAULT 1,
  `cat_created_at` datetime NOT NULL,
  `cat_update_at` datetime DEFAULT NULL,
  `cat_update_by` int(11) DEFAULT NULL,
  `cat_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property_category`
--

INSERT INTO `property_category` (`cat_id`, `cat_title`, `cat_status`, `cat_created_at`, `cat_update_at`, `cat_update_by`, `cat_created_by`) VALUES
(1, 'Residential', 1, '2022-03-10 08:41:22', '2022-03-10 08:41:22', NULL, NULL),
(2, 'Commercial', 1, '2022-03-10 08:41:22', '2022-03-10 08:41:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` int(11) NOT NULL,
  `imges_url` text DEFAULT NULL,
  `gallary_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `upload_link_over_sms` tinyint(1) NOT NULL DEFAULT 0,
  `whatsapp_link` tinyint(1) NOT NULL DEFAULT 0,
  `property_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `imges_url`, `gallary_url`, `upload_link_over_sms`, `whatsapp_link`, `property_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, '\"[\\\"\\/uploads\\/proerties\\/20220418\\/1650260109_062b78bb9748c9577d00.jpg\\\"]\"', '', 0, 0, 29, NULL, NULL, NULL),
(10, '\"\"', '', 0, 0, 30, NULL, NULL, NULL),
(11, '\"\"', '', 0, 0, 31, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_location_details`
--

CREATE TABLE `property_location_details` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `appartment` varchar(100) NOT NULL,
  `tower` int(11) DEFAULT NULL,
  `project` varchar(100) DEFAULT NULL,
  `house_number` varchar(10) NOT NULL,
  `locality` int(11) NOT NULL,
  `sub_locality` int(11) DEFAULT NULL,
  `located_inside` int(11) NOT NULL,
  `zone` int(11) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_location_details`
--

INSERT INTO `property_location_details` (`id`, `property_id`, `city`, `appartment`, `tower`, `project`, `house_number`, `locality`, `sub_locality`, `located_inside`, `zone`, `address`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(26, 29, 604, '1', NULL, '1', '45', 21, 41, 3, 3, 'sssss', 1, '2022-04-18 11:06:13', 0, '2022-04-18 11:06:13', 0, '0000-00-00 00:00:00', 0),
(27, 30, 1, '4', 3, '5', '', 21, 0, 2, 1, '', 1, '2022-04-20 16:34:40', 0, '2022-04-20 16:34:40', 0, '0000-00-00 00:00:00', 0),
(28, 31, 8, '4', 2, '5', '', 21, 0, 2, 5, '', 1, '2022-04-20 17:28:59', 0, '2022-04-20 17:28:59', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_priceing`
--

CREATE TABLE `property_priceing` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `ownership` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `price_pr_sqft` float NOT NULL,
  `all_Inclusive_price` tinyint(1) NOT NULL DEFAULT 0,
  `govt_charges_excluded` tinyint(1) NOT NULL DEFAULT 0,
  `price_negotiable` tinyint(1) NOT NULL DEFAULT 0,
  `maintenance` float DEFAULT NULL,
  `maintenance_tenyour` varchar(20) DEFAULT NULL,
  `expected_rental` float DEFAULT NULL,
  `booking_amount` float DEFAULT NULL,
  `annual_dues_payable` float DEFAULT NULL,
  `membership_charge` float NOT NULL,
  `is_pre_leased_or_rent` tinyint(1) NOT NULL DEFAULT 0,
  `current_rent_pr_month` float DEFAULT 0,
  `less_tiy` float DEFAULT 0,
  `a_r_i_percent` float DEFAULT 0,
  `lease_tobusiness_type` varchar(50) DEFAULT NULL,
  `fire_noc_certified` tinyint(1) NOT NULL DEFAULT 0,
  `occupancy_certificate` tinyint(1) NOT NULL DEFAULT 0,
  `office_pre_used` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `desciption` varchar(30) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `cerated_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_priceing`
--

INSERT INTO `property_priceing` (`id`, `property_id`, `ownership`, `price`, `price_pr_sqft`, `all_Inclusive_price`, `govt_charges_excluded`, `price_negotiable`, `maintenance`, `maintenance_tenyour`, `expected_rental`, `booking_amount`, `annual_dues_payable`, `membership_charge`, `is_pre_leased_or_rent`, `current_rent_pr_month`, `less_tiy`, `a_r_i_percent`, `lease_tobusiness_type`, `fire_noc_certified`, `occupancy_certificate`, `office_pre_used`, `desciption`, `status`, `cerated_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(25, 29, '', 45625500, 1000, 1, 0, 0, 0, 'Monthly', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '\"[\\\"backend-office\\\",\\\"frontend-office\\\"]\"', 'dddddddddddddddddddddd', 1, '0000-00-00 00:00:00', NULL, NULL, 0, NULL, NULL),
(26, 30, '', 25000, 250, 0, 0, 0, 0, 'Monthly', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '\"[]\"', '', 1, '0000-00-00 00:00:00', NULL, NULL, 0, NULL, NULL),
(27, 31, '', 25000, 500, 0, 0, 1, 0, 'Monthly', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '\"[]\"', '', 1, '0000-00-00 00:00:00', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_profile`
--

CREATE TABLE `property_profile` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `appartment_is` varchar(100) NOT NULL,
  `no_of_bedroom` varchar(10) NOT NULL,
  `no_of_bathroom` varchar(10) NOT NULL,
  `no_of_balconies` varchar(10) NOT NULL,
  `no_of_diningrooms` varchar(10) NOT NULL,
  `carpet_area` varchar(100) NOT NULL,
  `carpet_area_unit` int(11) NOT NULL,
  `build_up_area` varchar(100) NOT NULL,
  `build_up_area_unit` int(11) NOT NULL,
  `super_build_up_area` varchar(10) NOT NULL,
  `super_build_up_area_unit` int(11) NOT NULL,
  `shop_facade_size` varchar(10) NOT NULL,
  `shop_facade_size_unit` int(11) NOT NULL,
  `other_rooms` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `furnishing` varchar(50) NOT NULL,
  `furnishing_app` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cover_parking` int(11) DEFAULT NULL,
  `open_parking` int(11) DEFAULT NULL,
  `parking_option` varchar(100) DEFAULT NULL,
  `total_no_of_floors` varchar(20) NOT NULL,
  `property_on_floor` varchar(50) NOT NULL,
  `availability_status` varchar(50) NOT NULL,
  `possession_year` int(11) DEFAULT NULL,
  `possession_month` int(11) DEFAULT NULL,
  `property_age` varchar(10) DEFAULT NULL,
  `property_registered` varchar(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_profile`
--

INSERT INTO `property_profile` (`id`, `property_id`, `appartment_is`, `no_of_bedroom`, `no_of_bathroom`, `no_of_balconies`, `no_of_diningrooms`, `carpet_area`, `carpet_area_unit`, `build_up_area`, `build_up_area_unit`, `super_build_up_area`, `super_build_up_area_unit`, `shop_facade_size`, `shop_facade_size_unit`, `other_rooms`, `furnishing`, `furnishing_app`, `cover_parking`, `open_parking`, `parking_option`, `total_no_of_floors`, `property_on_floor`, `availability_status`, `possession_year`, `possession_month`, `property_age`, `property_registered`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(25, 29, '4 BHK', '4', '1', '1', '', '1240', 9, '', 0, '', 0, '4512', 2, '\"[\\\"Pooja Room\\\"]\"', 'furnished', '{\"furnishing_light\":\"1\",\"furnishing_fan\":\"1\",\"furnishing_ac\":\"0\",\"furnishing_tv\":\"0\",\"furnishing_bed\":\"0\",\"furnishing_wardrobe\":\"0\",\"furnishing_geyser\":\"0\",\"furnishing_w_machine\":\"Washing Machine\",\"furnishing_stove\":\"Stove\",\"furnishing_microwave\":\"\",\"furnishing_kitchen\":\"\",\"furnishing_chimney\":\"\",\"furnishing_table\":\"\",\"furnishing_curtains\":\"\",\"furnishing_exh_fan\":\"\"}', 1, 1, NULL, '3', '', 'readytomove', 0, 0, '5-10 years', NULL, 1, '2022-04-18 11:06:13', 1, NULL, NULL, NULL, NULL),
(26, 30, '', '6', '', '', '', '', 0, '', 0, '2500', 1, '', 0, '\"null\"', '', '{\"furnishing_light\":\"0\",\"furnishing_fan\":\"0\",\"furnishing_ac\":\"0\",\"furnishing_tv\":\"0\",\"furnishing_bed\":\"0\",\"furnishing_wardrobe\":\"0\",\"furnishing_geyser\":\"0\",\"furnishing_w_machine\":\"\",\"furnishing_stove\":\"\",\"furnishing_microwave\":\"\",\"furnishing_kitchen\":\"\",\"furnishing_chimney\":\"\",\"furnishing_table\":\"\",\"furnishing_curtains\":\"\",\"furnishing_exh_fan\":\"\"}', 0, 0, NULL, '', '', 'readytomove', 0, 0, '5-10 years', 'yes', 1, '2022-04-20 16:34:40', 1, NULL, NULL, NULL, NULL),
(27, 31, '', '', '', '', '', '', 0, '', 0, '2500', 2, '', 0, '\"null\"', '', '{\"furnishing_light\":\"0\",\"furnishing_fan\":\"0\",\"furnishing_ac\":\"0\",\"furnishing_tv\":\"0\",\"furnishing_bed\":\"0\",\"furnishing_wardrobe\":\"0\",\"furnishing_geyser\":\"0\",\"furnishing_w_machine\":\"\",\"furnishing_stove\":\"\",\"furnishing_microwave\":\"\",\"furnishing_kitchen\":\"\",\"furnishing_chimney\":\"\",\"furnishing_table\":\"\",\"furnishing_curtains\":\"\",\"furnishing_exh_fan\":\"\"}', 2, 2, 'side_by_side', '', '', 'readytomove', 0, 0, '5-10 years', '', 1, '2022-04-20 17:28:59', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `pt_id` int(11) NOT NULL,
  `pt_title` varchar(250) NOT NULL,
  `pt_status` tinyint(1) NOT NULL DEFAULT 1,
  `pt_created_at` datetime NOT NULL,
  `pt_update_at` datetime DEFAULT NULL,
  `pt_update_by` int(11) DEFAULT NULL,
  `pt_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`pt_id`, `pt_title`, `pt_status`, `pt_created_at`, `pt_update_at`, `pt_update_by`, `pt_created_by`) VALUES
(1, 'Furnished', 1, '2022-03-10 08:23:58', '2022-03-10 08:23:58', NULL, NULL),
(2, 'Semi-Furnished', 1, '2022-03-10 08:23:58', '2022-03-10 08:23:58', NULL, NULL),
(3, 'Raw', 1, '2022-03-10 08:23:58', '2022-03-10 08:23:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_user_relation`
--

CREATE TABLE `property_user_relation` (
  `pur_id` int(11) NOT NULL,
  `pur_user_id` int(11) DEFAULT NULL,
  `pur_prop_id` int(11) DEFAULT NULL,
  `pur_allot_status_id` int(11) NOT NULL,
  `pur_status` tinyint(1) NOT NULL DEFAULT 1,
  `pur_created_at` datetime NOT NULL,
  `pur_update_at` datetime DEFAULT NULL,
  `pur_update_by` int(11) DEFAULT NULL,
  `pur_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_user_relation`
--

INSERT INTO `property_user_relation` (`pur_id`, `pur_user_id`, `pur_prop_id`, `pur_allot_status_id`, `pur_status`, `pur_created_at`, `pur_update_at`, `pur_update_by`, `pur_created_by`) VALUES
(3, 4, 29, 1, 1, '2022-04-18 14:39:19', '2022-04-18 14:39:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questionoptions`
--

CREATE TABLE `questionoptions` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `class` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `ques_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questionoptions`
--

INSERT INTO `questionoptions` (`id`, `title`, `class`, `value`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`, `ques_id`, `name`) VALUES
(1, 'Ready to move office space', 'office-type', 'Ready to move office space', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 1, 'office'),
(2, 'Bare shell office space', 'office-type', 'Bare shell office space', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 1, 'office'),
(3, 'Co-working office space', 'office-type', 'Co-working office space', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 1, 'office'),
(4, 'Commercial Shops', 'office-type shop-location office-text1', 'Commercial Shops', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 2, 'retail'),
(5, 'Commercial Showrooms', 'office-type shop-location ', 'commercial-showrooms', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 2, 'retail'),
(6, 'Agricultural/Farm Land', 'office-type', 'Agricultural/Farm Land', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 3, 'land'),
(7, 'Industrial Lands/Plots', 'office-type', 'Industrial Lands/Plots', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 3, 'land'),
(8, 'Ware House', 'office-type', 'Ware House', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 4, 'land'),
(9, 'Cold Storage', 'office-type', 'cold-storage', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 4, 'storage'),
(10, 'Factory', 'office-type', 'Factory', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 5, 'storage'),
(11, 'Manufacturing', 'office-type', 'Manufacturing', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 5, 'industry'),
(12, 'Hotel/Resorts', 'office-type', 'Hotel/Resorts', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 6, 'industry'),
(13, 'Guest-House/Banquet-Halls', 'office-type', 'guest-house', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 6, 'hospitality'),
(14, 'Mall', '', 'Ready to move office space', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 7, 'hospitality'),
(15, 'Commercial Project', '', 'Ready to move office space', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 7, 'location'),
(16, 'Residential Project', '', 'Ready to move office space', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 7, 'location'),
(17, 'Retail Complex/Building', '', 'Ready to move office space', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 7, 'location'),
(18, 'Market/High Street', '', 'Ready to move office space', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 7, 'location'),
(19, 'Others', 'show-other field', 'Ready to move office space', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 7, 'location'),
(20, 'Mall', 'office-type', 'Ready to move office space', 1, '2022-03-31 13:27:21', NULL, NULL, NULL, NULL, NULL, 7, 'location');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `class` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `belongs_to_prop_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `class`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`, `belongs_to_prop_category`) VALUES
(1, 'What kind of office is it?', 'office-text fw-bold fs-6 hide-office-text', 1, '2022-03-31 12:56:33', NULL, '2022-03-31 12:56:33', NULL, NULL, NULL, 2),
(2, 'What type of retail space do you have?', 'office-text1 fw-bold fs-6 hide-office-text', 1, '2022-03-31 12:56:33', NULL, '2022-03-31 12:56:33', NULL, NULL, NULL, 2),
(3, 'What kind of land is it?', 'office-text2 fw-bold fs-6 hide-office-text', 1, '2022-03-31 12:56:33', NULL, '2022-03-31 12:56:33', NULL, NULL, NULL, 2),
(4, 'What kind of storage is it?', 'office-text3 fw-bold fs-6 hide-office-text', 1, '2022-03-31 12:56:33', NULL, '2022-03-31 12:56:33', NULL, NULL, NULL, 2),
(5, 'What kind of Industry is it?', 'office-text4 fw-bold fs-6 hide-office-tex', 1, '2022-03-31 12:56:33', NULL, '2022-03-31 12:56:33', NULL, NULL, NULL, 2),
(6, 'What kind of hospitality is it?', 'office-text5 fw-bold fs-6 hide-office-text', 1, '2022-03-31 12:56:33', NULL, '2022-03-31 12:56:33', NULL, NULL, NULL, 2),
(7, 'Your shop is located inside?', 'office-text5 fw-bold fs-6 hide-office-text', 1, '2022-03-31 12:56:33', NULL, '2022-03-31 12:56:33', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_name`, `setting_value`, `type`, `deleted`) VALUES
(1, 'timezone', 'Asia/Calcutta', '', 0),
(10, 'email_sent_from_name', '', 'app', 0),
(11, 'accepted_file_formats', 'jpg,jpeg,png,doc,xlsx,txt,pdf,zip', 'app', 0),
(12, 'allow_partial_invoice_payment_from_clients', '1', 'app', 0),
(13, 'allowed_ip_addresses', '', 'app', 0),
(14, 'app_title', 'DIVIEDUCARE CAREER SOLUTIONS', 'app', 0),
(15, 'client_can_pay_invoice_without_login', '1', 'app', 0),
(16, 'company_address', 'B-37 3rd Floor, Sector 2,\r\nNoida, U.P - 201301, India', 'app', 0),
(17, 'company_email', 'info@kk.com', 'app', 0),
(18, 'company_name', 'Kishore Kumar', 'app', 0),
(19, 'company_phone', '+91 783 846 9950', 'app', 0),
(20, 'company_vat_number', '', 'app', 0),
(21, 'company_website', 'www.example.com', 'app', 0),
(22, 'conversion_rate', '', 'app', 0),
(23, 'currency_position', 'left', 'app', 0),
(24, 'currency_symbol', '₹', 'app', 0),
(25, 'date_format', 'd-m-Y', 'app', 0),
(26, 'decimal_separator', '.', 'app', 0),
(27, 'default_currency', 'INR', 'app', 0),
(28, 'default_due_date_after_billing_date', '', 'app', 0),
(29, 'default_left_menu', '', 'app', 0),
(30, 'default_template', '1', 'app', 0),
(31, 'default_theme_color', '557bbb', 'app', 0),
(32, 'email_protocol', 'smtp', 'app', 0),
(33, 'email_sent_from_address', 'nileshgautam@sartiaglobal.com', 'app', 0),
(34, 'email_sent_from_name', 'Kishore kumar', 'app', 0),
(36, 'email_smtp_pass', 'Sartia@@2022', 'app', 0),
(37, 'email_smtp_port', '465', 'app', 0),
(38, 'email_smtp_security_type', 'none', 'app', 0),
(39, 'email_smtp_user', 'nilesh.sartia@gmail.com', 'app', 0),
(40, 'enable_footer', '1', 'app', 0),
(41, 'enable_rich_text_editor', '1', 'app', 0),
(42, 'favicon', 'a:1:{s:9:\"file_name\";s:30:\"_file619f601002f42-favicon.png\";}', 'app', 0),
(43, 'first_day_of_week', '0', 'app', 0),
(44, 'footer_copyright_text', 'Kishore kumar @2022', 'app', 0),
(45, 'footer_menus', '', 'app', 0),
(46, 'initial_number_of_the_invoice', '1', 'app', 0),
(47, 'invoice_color', '', 'app', 0),
(48, 'invoice_footer', '<p><br></p>', 'app', 0),
(49, 'invoice_logo', '', 'app', 0),
(50, 'invoice_prefix', '', 'app', 0),
(51, 'invoice_style', 'style_1', 'app', 0),
(52, 'item_purchase_code', '321321a', 'app', 0),
(53, 'language', 'english', 'app', 0),
(54, 'module_announcement', '1', 'app', 0),
(55, 'module_attendance', '1', 'app', 0),
(56, 'module_chat', '1', 'app', 0),
(57, 'module_estimate', '1', 'app', 0),
(58, 'module_estimate_request', '1', 'app', 0),
(59, 'module_event', '1', 'app', 0),
(60, 'module_expense', '1', 'app', 0),
(61, 'module_gantt', '1', 'app', 0),
(62, 'module_help', '1', 'app', 0),
(63, 'module_invoice', '1', 'app', 0),
(64, 'module_knowledge_base', '1', 'app', 0),
(65, 'module_lead', '1', 'app', 0),
(66, 'module_leave', '1', 'app', 0),
(67, 'module_message', '1', 'app', 0),
(68, 'module_note', '1', 'app', 0),
(69, 'module_order', '1', 'app', 0),
(70, 'module_project_timesheet', '1', 'app', 0),
(71, 'module_proposal', '1', 'app', 0),
(72, 'module_ticket', '1', 'app', 0),
(73, 'module_timeline', '1', 'app', 0),
(74, 'module_todo', '1', 'app', 0),
(75, 'no_of_decimals', '2', 'app', 0),
(76, 'rows_per_page', '10', 'app', 0),
(77, 'rtl', '0', 'app', 0),
(78, 'scrollbar', 'jquery', 'app', 0),
(79, 'send_bcc_to', '', 'app', 0),
(80, 'send_invoice_due_after_reminder', '', 'app', 0),
(81, 'send_invoice_due_pre_reminder', '', 'app', 0),
(82, 'send_recurring_invoice_reminder_before_creation', '', 'app', 0),
(83, 'show_background_image_in_signin_page', 'yes', 'app', 0),
(84, 'show_logo_in_signin_page', 'yes', 'app', 0),
(85, 'show_theme_color_changer', 'yes', 'app', 0),
(86, 'signin_page_background', 'a:4:{s:9:\"file_name\";s:82:\"system_file619f5dd0e9fee-tumblr_a61aadb6fe435f084ce331662effeb6d_70a42eb8_1280.jpg\";s:9:\"file_size\";s:6:\"146675\";s:7:\"file_id\";N;s:12:\"service_type\";N;}', 'app', 0),
(87, 'site_logo', 'a:1:{s:9:\"file_name\";s:32:\"_file619f5e00e79a7-site-logo.png\";}', 'app', 0),
(88, 'task_point_range', '5', 'app', 0),
(89, 'time_format', 'small', 'app', 0),
(90, 'timezone', 'Asia/Kolkata', 'app', 0),
(91, 'users_can_input_only_total_hours_instead_of_period', '', 'app', 0),
(92, 'users_can_start_multiple_timers_at_a_time', '', 'app', 0),
(93, 'weekends', '0,6', 'app', 0),
(94, 'email_smtp_host', 'ssl://smtp.gmail.com', 'app', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'BIHAR', 105),
(5, 'GUJRAT', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'MANIPUR', 105),
(14, 'MEGHALAYA', 105),
(15, 'MIZORAM', 105),
(16, 'NAGALAND', 105),
(17, 'ORISSA', 105),
(18, 'PUNJAB', 105),
(19, 'RAJASTHAN', 105),
(20, 'SIKKIM', 105),
(21, 'TAMIL NADU', 105),
(22, 'TRIPURA', 105),
(23, 'UTTAR PRADESH', 105),
(24, 'WEST BENGAL', 105),
(25, 'DELHI', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARANCHAL', 105),
(34, 'JHARKHAND', 105),
(35, 'CHATTISGARH', 105);

-- --------------------------------------------------------

--
-- Table structure for table `sublocalities`
--

CREATE TABLE `sublocalities` (
  `id` int(11) UNSIGNED NOT NULL,
  `sublocality_title` varchar(250) DEFAULT NULL,
  `locality_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subpropertytypes`
--

CREATE TABLE `subpropertytypes` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  `class` varchar(250) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `data_for` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subpropertytypes`
--

INSERT INTO `subpropertytypes` (`id`, `title`, `value`, `class`, `cat_id`, `data_for`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Apartment', 'apartment', 'property-for', 1, 'sell rent pg', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(2, 'Independent House/ Villa', 'independent-house', 'property-for', 1, 'sell rent pg', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(3, 'Independent/Builder Floor', 'builder-Floor', 'property-for', 1, 'sell rent pg', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(4, 'Land', 'Land', 'property-for', 1, 'sell', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(5, '1Rk/Studio Apartment', 'studio-apartment', 'property-for', 1, 'sell rent pg', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(6, 'Serviced Apartment', 'serviced-apartment', 'property-for', 1, 'sell rent pg', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(7, 'Farmhouse', 'farmhouse', 'property-for', 1, 'sell rent', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(8, 'Others', 'others', 'property-for', 1, 'sell rent', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(9, 'Office', 'Office', 'radio question1', 2, '', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(10, 'Retail', 'Retail', 'radio question2', 2, '', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(11, 'Land', 'Land', 'radio question3', 2, '', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(12, 'Storage', 'Storage', 'radio question4', 2, '', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(13, 'Industry', 'Industry', 'radio question5', 2, '', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(14, 'Hospitality', 'Hospitality', 'radio question6', 2, '', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL),
(15, 'Others', 'Others', 'radio question7', 2, '', 1, '2022-03-30 16:46:57', NULL, '2022-03-30 16:46:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_modules`
--

CREATE TABLE `sub_modules` (
  `sm_id` int(11) NOT NULL,
  `sm_name` varchar(250) NOT NULL,
  `sm_class` varchar(250) NOT NULL,
  `sm_url` text NOT NULL,
  `sm_mod_id` int(11) NOT NULL,
  `sm_status` tinyint(1) NOT NULL DEFAULT 1,
  `sm_created_at` datetime NOT NULL,
  `sm_update_at` datetime DEFAULT NULL,
  `sm_update_by` int(11) DEFAULT NULL,
  `sm_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_modules`
--

INSERT INTO `sub_modules` (`sm_id`, `sm_name`, `sm_class`, `sm_url`, `sm_mod_id`, `sm_status`, `sm_created_at`, `sm_update_at`, `sm_update_by`, `sm_created_by`) VALUES
(1, 'All Properties', '', 'properties', 2, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(2, 'Add Properties', '', 'add-properties', 2, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(3, 'Duplicate Properties', '', 'duplicate-properties', 2, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(4, 'Property History', '', 'property-history', 2, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(5, 'Allot Property', '', 'allot-property', 2, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(6, 'All Leads', '', 'all-leads', 3, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(7, 'Add Leads', '', 'add-leads', 3, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(8, 'Leads Status', '', 'leads-status', 3, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(9, 'Leads Category', '', 'leads-category', 3, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(10, 'Leads Sub Category', '', 'leads-sub-category', 3, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(11, 'Duplicate Leads', '', 'leads-duplicate', 3, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(12, 'Assign Leads', '', 'assign-leads', 3, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(13, 'Agent Lead Commission', '', 'agent-lead-commission', 3, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(14, 'Employees', 'sub-menu-employee', '', 4, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(15, 'Departments', '', 'all-departments', 4, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(16, 'Add Roles & Permissions', '', 'all-designation', 4, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(17, 'Add Roles & Permissions', '', 'all-roles', 4, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(18, 'Attandance', '', 'attandance', 4, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(19, 'Teams & Agents', '', 'all-teams', 4, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(20, 'Payroll', '', 'payroll', 4, 0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(21, 'Leaves', '', 'leaves', 4, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(22, 'Expenses', 'sub-menu-emplyee', 'all-expenses', 5, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(23, 'Income', '', 'all-income', 5, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(24, 'Profit & Loss', '', 'all-profit-loss', 5, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(25, 'Lead Status Report', '', 'lead-status-report', 9, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(26, 'Agent Commission Report', '', 'agent-commission-report', 9, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(27, 'Employee Sales Report', '', 'employee-sales-report', 9, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(28, 'Sales Report', '', 'sales-report', 9, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(29, 'Visit Report', '', 'visit-report', 9, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(30, 'data-storage', '', 'data-storage', 10, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(31, 'data-backup', '', 'data-backup', 10, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(32, 'Data Extraction', '', 'data-extraction', 10, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(33, 'System', '', 'system', 10, 1, '0000-00-00 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_modules`
--

CREATE TABLE `sub_sub_modules` (
  `ssm_id` int(11) NOT NULL,
  `ssm_name` varchar(250) NOT NULL,
  `ssm_class` varchar(250) NOT NULL,
  `ssm_url` text NOT NULL,
  `sm_id` int(11) DEFAULT NULL,
  `ssm_status` tinyint(1) NOT NULL DEFAULT 1,
  `ssm_created_at` datetime NOT NULL,
  `ssm_update_at` datetime DEFAULT NULL,
  `ssm_update_by` int(11) DEFAULT NULL,
  `ssm_created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_sub_modules`
--

INSERT INTO `sub_sub_modules` (`ssm_id`, `ssm_name`, `ssm_class`, `ssm_url`, `sm_id`, `ssm_status`, `ssm_created_at`, `ssm_update_at`, `ssm_update_by`, `ssm_created_by`) VALUES
(27, 'All Employees', '', 'all-employees', 14, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(28, 'Add Employees', '', 'add-employees', 14, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(29, 'All Teams & Agents', '', 'all-teams', 19, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(30, 'Add Teams & Agents', '', 'add-teams', 19, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(31, 'All Expenses', '', 'all-expenses', 22, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(32, 'Expense Type', '', 'expense-type', 22, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(33, 'Expense Report', '', 'expense-report', 22, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(34, 'All Income', '', 'all-income', 23, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(35, 'Add Income', '', 'add-income', 23, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(36, 'Income Report', '', 'income-report', 23, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(37, 'all-profit-loss', '', 'all-profit-loss', 24, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(38, 'add-profit-loss', '', 'add-profit-loss', 24, 1, '0000-00-00 00:00:00', NULL, NULL, NULL),
(39, 'profile-loss-report', '', 'profile-loss-report', 24, 1, '0000-00-00 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tower`
--

CREATE TABLE `tower` (
  `id` int(11) NOT NULL,
  `tower` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tower`
--

INSERT INTO `tower` (`id`, `tower`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(2, 'apex tower', 1, 1, '2022-04-19 12:41:34', NULL, NULL, NULL, NULL),
(3, 'Apex-11 tower', 1, 1, '2022-04-19 12:49:08', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `ques_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `title`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`, `ques_id`) VALUES
(1, 'Sq.yards', 1, '2022-03-31 18:28:35', NULL, NULL, NULL, NULL, NULL, 0),
(2, 'Sq.m.', 1, '2022-03-31 18:28:35', NULL, NULL, NULL, NULL, NULL, 0),
(3, 'acres', 1, '2022-03-31 18:28:35', NULL, NULL, NULL, NULL, NULL, 0),
(4, 'cents', 1, '2022-03-31 18:28:35', NULL, NULL, NULL, NULL, NULL, 0),
(5, 'bigha', 1, '2022-03-31 18:28:35', NULL, NULL, NULL, NULL, NULL, 0),
(6, 'kottah', 1, '2022-03-31 18:28:35', NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Kanal', 1, '2022-03-31 18:28:35', NULL, NULL, NULL, NULL, NULL, 0),
(8, 'ground', 1, '2022-03-31 18:28:35', NULL, NULL, NULL, NULL, NULL, 0),
(9, 'Sq.ft.', 1, '2022-04-12 07:44:19', NULL, '2022-04-12 07:44:19', NULL, '2022-04-12 07:44:19', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `emp_id` int(11) NOT NULL,
  `pass` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_role_id`, `updated_at`, `created_at`, `emp_id`, `pass`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '$2y$10$HQYMF2lgJnnurR/e3IY4VuDbdVlIl7.6F1tHTedsCrG6ZweSnALX2', 1, NULL, '2022-03-15 12:23:40', 1, ''),
(52, 'Test ', 'admin@gmail.com', '$2y$10$9qBiIZIwqEfja09ybQJgEO6d6MBHyl1DgSiorf/rV/uQSfKB2BGFi', 2, NULL, '2022-04-27 11:18:59', 70, 'GTXz5CIV'),
(53, 'Demo ', 'demo@gmail.com', '$2y$10$7iOItq0u/g/Jp1fi4CMcQeYug3QykTE743HJFWa9jYZxrCHg1DJwi', 2, NULL, '2022-04-27 11:29:54', 71, 'xnInk8l3');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_permissions`
--

CREATE TABLE `user_access_permissions` (
  `uap_id` int(11) NOT NULL,
  `uap_user_id` int(11) DEFAULT NULL,
  `user_role_id` int(11) NOT NULL,
  `uap_permission` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `uap_full_access` tinyint(1) NOT NULL DEFAULT 1,
  `uap_status` tinyint(1) NOT NULL DEFAULT 1,
  `uap_update_by` int(11) DEFAULT NULL,
  `uap_created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `uap_sub_sub_modules` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_permissions`
--

INSERT INTO `user_access_permissions` (`uap_id`, `uap_user_id`, `user_role_id`, `uap_permission`, `uap_full_access`, `uap_status`, `uap_update_by`, `uap_created_by`, `updated_at`, `created_at`, `uap_sub_sub_modules`) VALUES
(1, 1, 1, '[{\"module_id\":1,\"full_access\":true,\"role_id\":1,\"submodule\":[{\"id\":1,\"role_id\":1},{\"id\":2,\"role_id\":1},{\"id\":3,\"role_id\":1}]}]', 1, 1, NULL, NULL, NULL, '2022-03-14 11:40:56', ''),
(2, 2, 2, '[{\"module_id\":1,\"full_access\":true,\"role_id\":1,\"submodule\":[{\"id\":1,\"role_id\":1},{\"id\":2,\"role_id\":1},{\"id\":3,\"role_id\":1}]}]', 1, 1, NULL, NULL, NULL, '2022-03-14 11:40:56', ''),
(3, 3, 3, '[{\"module_id\":1,\"full_access\":false,\"role_id\":3},{\"module_id\":2,\"full_access\":true,\"role_id\":3,\"submodule\":[{\"id\":1,\"role_id\":3},{\"id\":2,\"role_id\":3},{\"id\":3,\"role_id\":3},{\"id\":4,\"role_id\":3}]},{\"module_id\":3,\"full_access\":true,\"role_id\":3,\"submodule\":[{\"id\":1,\"role_id\":3},{\"id\":2,\"role_id\":3},{\"id\":3,\"role_id\":3},{\"id\":4,\"role_id\":3}]},{\"module_id\":4,\"full_access\":true,\"role_id\":3,\"submodule\":[{\"id\":1,\"role_id\":3},{\"id\":2,\"role_id\":3},{\"id\":3,\"role_id\":3},{\"id\":4,\"role_id\":3}]},{\"module_id\":5,\"full_access\":true,\"role_id\":3,\"submodule\":[{\"id\":1,\"role_id\":3},{\"id\":2,\"role_id\":3},{\"id\":3,\"role_id\":3},{\"id\":4,\"role_id\":3}]},{\"module_id\":6,\"full_access\":true,\"role_id\":3,\"submodule\":[{\"id\":1,\"role_id\":3},{\"id\":2,\"role_id\":3},{\"id\":3,\"role_id\":3},{\"id\":4,\"role_id\":3}]}]', 0, 1, NULL, NULL, NULL, '2022-03-14 11:40:56', '[{\"submodule_id\":14,\"role_id\":4,\"sub_mod_name\":\"Employees\",\"sub_submodule\":\"[{\\\"id\\\":1,\\\"role_id\\\":3},{\\\"id\\\":2,\\\"role_id\\\":3}]\"},{\"submodule_id\":22,\"role_id\":4,\"sub_mod_name\":\"Expenses\",\"sub_submodule\":\"[{\\\"id\\\":6,\\\"role_id\\\":3},{\\\"id\\\":7,\\\"role_id\\\":3},{\\\"id\\\":8,\\\"role_id\\\":3},{\\\"id\\\":9,\\\"role_id\\\":3}]\"}]'),
(4, 4, 4, '[{\"module_id\":2,\"full_access\":true,\"role_id\":4,\"submodule\":[{\"id\":2,\"role_id\":3},{\"id\":3,\"role_id\":3},{\"id\":4,\"role_id\":3}]},{\"module_id\":3,\"full_access\":true,\"role_id\":4,\"submodule\":[{\"id\":1,\"role_id\":4},{\"id\":2,\"role_id\":3},{\"id\":3,\"role_id\":3},{\"id\":4,\"role_id\":3}]}]', 1, 1, NULL, NULL, NULL, '2022-03-14 11:40:56', ''),
(29, 52, 49, '[{\"module_id\":\"2\",\"full_access\":\"false\",\"role_id\":\"1\",\"submodule\":[{\"id\":\"1\",\"role_id\":\"3\"},{\"id\":\"2\",\"role_id\":\"3\"},{\"id\":\"5\",\"role_id\":\"3\"}]},{\"module_id\":\"4\",\"full_access\":\"false\",\"role_id\":\"1\",\"submodule\":[{\"id\":\"14\",\"role_id\":\"1\"}]}]', 0, 1, 1, 1, NULL, '2022-04-27 11:11:57', '[{\"submodule_id\":\"14\",\"role_id\":\"4\",\"sub_mod_name\":\"Employees\",\"sub_submodule\":[{\"id\":\"27\",\"role_id\":\"2\"},{\"id\":\"28\",\"role_id\":\"3\"}]}]'),
(31, 53, 50, '[{\"module_id\":\"2\",\"full_access\":\"false\",\"role_id\":\"1\",\"submodule\":[{\"id\":\"1\",\"role_id\":\"1\"},{\"id\":\"2\",\"role_id\":\"1\"},{\"id\":\"5\",\"role_id\":\"1\"}]},{\"module_id\":\"4\",\"full_access\":\"false\",\"role_id\":\"1\",\"submodule\":[{\"id\":\"14\",\"role_id\":\"1\"},{\"id\":\"15\",\"role_id\":\"1\"},{\"id\":\"16\",\"role_id\":\"1\"},{\"id\":\"19\",\"role_id\":\"1\"}]},{\"module_id\":\"5\",\"full_access\":\"false\",\"role_id\":\"1\",\"submodule\":[{\"id\":\"22\",\"role_id\":\"1\"},{\"id\":\"23\",\"role_id\":\"1\"}]},{\"module_id\":\"6\",\"full_access\":\"true\",\"role_id\":\"1\"}]', 0, 1, 1, 1, NULL, '2022-04-27 11:29:14', '[{\"submodule_id\":\"14\",\"role_id\":\"4\",\"sub_mod_name\":\"Employees\",\"sub_submodule\":[{\"id\":\"27\",\"role_id\":\"1\"},{\"id\":\"28\",\"role_id\":\"1\"}]},{\"submodule_id\":\"19\",\"role_id\":\"4\",\"sub_mod_name\":\"Teams & Agents\",\"sub_submodule\":[{\"id\":\"29\",\"role_id\":\"1\"},{\"id\":\"30\",\"role_id\":\"1\"}]},{\"submodule_id\":\"22\",\"role_id\":\"4\",\"sub_mod_name\":\"Expenses\",\"sub_submodule\":[{\"id\":\"31\",\"role_id\":\"1\"},{\"id\":\"32\",\"role_id\":\"1\"},{\"id\":\"33\",\"role_id\":\"1\"}]}]');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `r_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `role_permission` text DEFAULT NULL,
  `type` enum('Super Admin','Admin','User','Staff') DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`r_id`, `name`, `role_permission`, `type`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Super Admin', 'a:1:{i:0;s:4:\"crud\";}', 'Super Admin', 1, NULL, '2022-03-14 11:53:56'),
(2, 'Admin', 'a:1:{i:0;s:3:\"rcu\";}', 'User', 1, NULL, '2022-03-14 11:53:56'),
(3, 'Manager', 'a:1:{i:0;s:2:\"rc\";}', 'User', 1, NULL, '2022-03-14 11:53:56'),
(4, 'Executive', 'a:1:{i:0;s:1:\"c\";}', 'User', 1, NULL, '2022-03-14 11:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles_tb`
--

CREATE TABLE `user_roles_tb` (
  `id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `menu_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`menu_id`)),
  `sub_menu_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`sub_menu_id`)),
  `roles_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles_id`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles_tb`
--

INSERT INTO `user_roles_tb` (`id`, `designation_id`, `menu_id`, `sub_menu_id`, `roles_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 25, '[\"2\",\"6\",\"7\",\"8\"]', '[\"1\",\"2\"]', '[\"2,1,1\",\"2,1,2\",\"2,1,3\",\"2,1,4\",\"2,2,1\",\"2,2,2\",\"2,2,3\",\"2,2,4\"]', 1, 1, NULL, NULL, '2022-04-22 06:34:51', NULL, NULL),
(2, 26, '[\"2\",\"3\"]', '[\"1\",\"2\",\"5\",\"6\",\"7\",\"8\",\"9\"]', '[\"3,6,1\",\"3,6,2\",\"3,6,3\",\"3,6,4\",\"3,7,1\",\"3,7,2\",\"3,7,3\",\"3,7,4\",\"3,8,1\",\"3,8,2\",\"3,8,3\",\"3,8,4\",\"3,9,1\",\"3,9,2\",\"3,9,3\",\"3,9,4\"]', 1, 1, NULL, NULL, '2022-04-22 07:34:07', NULL, NULL),
(3, 27, 'null', '[\"1\",\"2\",\"5\"]', 'null', 1, 1, NULL, NULL, '2022-04-22 07:52:59', NULL, NULL),
(4, 28, 'null', 'null', 'null', 1, 1, NULL, NULL, '2022-04-22 07:56:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitorbooks`
--

CREATE TABLE `visitorbooks` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `meeting_with` int(11) UNSIGNED NOT NULL,
  `purpose` varchar(250) DEFAULT NULL,
  `visitor_id_title` varchar(100) DEFAULT NULL,
  `visitor_id_no` varchar(20) DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitorbooks`
--

INSERT INTO `visitorbooks` (`id`, `name`, `phone`, `email`, `meeting_with`, `purpose`, `visitor_id_title`, `visitor_id_no`, `in_time`, `out_time`, `status`, `created_at`, `created_by`, `updated_at`, `update_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'BB', '9847456321', 'na@mail.com', 1, 'ddddd', 'Aadhar', '1234567890112646', '11:09:12', '14:12:39', 0, '2022-04-11 11:09:12', NULL, '2022-04-14 18:35:39', NULL, '2022-04-14 18:35:39', 1),
(2, 'Shalu', '9874563210', 'a@mail.com', 1, 'test', 'Pan', '12345678904', '13:25:12', '14:33:10', 1, '2022-04-11 13:25:12', NULL, '2022-04-11 14:33:10', NULL, '2022-04-11 14:13:33', 1),
(3, 'C', '9874563210', 'c@mail.com', 1, 'SASSAAS', 'Pan', '1234565', '16:40:57', '11:09:10', 1, '2022-04-11 16:40:57', NULL, '2022-04-14 11:09:10', NULL, NULL, NULL),
(4, 'Nilesh', '9874563210', '', 1, 'Test', '', '', '11:08:53', '18:35:03', 0, '2022-04-14 11:08:53', NULL, '2022-04-14 18:35:32', NULL, '2022-04-14 18:35:32', 1),
(5, 'A', '9847456326', 'a@mail.com', 1, 'jkhgjkiuhkjjjjjjjjjjjjjjjjjjjjjjjj', 'fgfhgfhg', '89789789798789789797', '18:34:01', NULL, 1, '2022-04-14 18:34:01', NULL, '2022-04-14 18:34:01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zonetypes`
--

CREATE TABLE `zonetypes` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `ques_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zonetypes`
--

INSERT INTO `zonetypes` (`id`, `title`, `status`, `created_at`, `created_by`, `update_at`, `update_by`, `deleted_at`, `deleted_by`, `ques_id`) VALUES
(1, 'Industrial', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0),
(2, 'Commercial', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0),
(3, 'Residential', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Transport and Communication', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0),
(5, 'Public Utilities', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0),
(6, 'Public and Semi Public Use', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Open Spaces', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0),
(8, 'Agricultural Zone', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0),
(9, 'Natural Conservation Zone', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0),
(10, 'Government Use', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0),
(11, 'Others', 1, '2022-03-31 18:02:21', NULL, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allot_status`
--
ALTER TABLE `allot_status`
  ADD PRIMARY KEY (`als_id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`ame_id`);

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_emp_department_foreign` (`emp_department`),
  ADD KEY `employees_emp_designation_foreign` (`emp_designation`);

--
-- Indexes for table `employee_manger_relation`
--
ALTER TABLE `employee_manger_relation`
  ADD PRIMARY KEY (`emr_id`);

--
-- Indexes for table `emp_address`
--
ALTER TABLE `emp_address`
  ADD PRIMARY KEY (`empadd_id`),
  ADD KEY `emp_address_empadd_emp_id_foreign` (`empadd_emp_id`);

--
-- Indexes for table `emp_documents`
--
ALTER TABLE `emp_documents`
  ADD PRIMARY KEY (`emp_doc_id`),
  ADD KEY `emp_documents_emp_doc_emp_id_foreign` (`emp_doc_emp_id`);

--
-- Indexes for table `emp_emergency_contact`
--
ALTER TABLE `emp_emergency_contact`
  ADD PRIMARY KEY (`emc_id`),
  ADD KEY `emp_emergency_contact_emc_emp_id_foreign` (`emc_emp_id`);

--
-- Indexes for table `emp_salary`
--
ALTER TABLE `emp_salary`
  ADD PRIMARY KEY (`emps_id`),
  ADD KEY `emp_salary_emps_emp_id_foreign` (`emps_emp_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_categories`
--
ALTER TABLE `lead_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_sub_categories`
--
ALTER TABLE `lead_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `localities`
--
ALTER TABLE `localities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locatedinsides`
--
ALTER TABLE `locatedinsides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetinglocations`
--
ALTER TABLE `meetinglocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetingstatuses`
--
ALTER TABLE `meetingstatuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetingtimelines`
--
ALTER TABLE `meetingtimelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`mod_id`);

--
-- Indexes for table `possession_by`
--
ALTER TABLE `possession_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `propertiesavailablefors`
--
ALTER TABLE `propertiesavailablefors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties_owner_info`
--
ALTER TABLE `properties_owner_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `propertycities`
--
ALTER TABLE `propertycities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertymasterkeys`
--
ALTER TABLE `propertymasterkeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertymastervalues`
--
ALTER TABLE `propertymastervalues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propertymastervalues_key_id_foreign` (`key_id`);

--
-- Indexes for table `property_additional_features`
--
ALTER TABLE `property_additional_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_basic_details`
--
ALTER TABLE `property_basic_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_category`
--
ALTER TABLE `property_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_location_details`
--
ALTER TABLE `property_location_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_priceing`
--
ALTER TABLE `property_priceing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_profile`
--
ALTER TABLE `property_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `property_user_relation`
--
ALTER TABLE `property_user_relation`
  ADD PRIMARY KEY (`pur_id`);

--
-- Indexes for table `questionoptions`
--
ALTER TABLE `questionoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques_id` (`ques_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sublocalities`
--
ALTER TABLE `sublocalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sublocalities_locality_id_foreign` (`locality_id`);

--
-- Indexes for table `subpropertytypes`
--
ALTER TABLE `subpropertytypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subpropertytypes_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `sub_modules`
--
ALTER TABLE `sub_modules`
  ADD PRIMARY KEY (`sm_id`),
  ADD KEY `sub_modules_sm_mod_id_foreign` (`sm_mod_id`);

--
-- Indexes for table `sub_sub_modules`
--
ALTER TABLE `sub_sub_modules`
  ADD PRIMARY KEY (`ssm_id`);

--
-- Indexes for table `tower`
--
ALTER TABLE `tower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `user_access_permissions`
--
ALTER TABLE `user_access_permissions`
  ADD PRIMARY KEY (`uap_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user_roles_tb`
--
ALTER TABLE `user_roles_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitorbooks`
--
ALTER TABLE `visitorbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zonetypes`
--
ALTER TABLE `zonetypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allot_status`
--
ALTER TABLE `allot_status`
  MODIFY `als_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `ame_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=605;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `employee_manger_relation`
--
ALTER TABLE `employee_manger_relation`
  MODIFY `emr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `emp_address`
--
ALTER TABLE `emp_address`
  MODIFY `empadd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `emp_documents`
--
ALTER TABLE `emp_documents`
  MODIFY `emp_doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `emp_emergency_contact`
--
ALTER TABLE `emp_emergency_contact`
  MODIFY `emc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_salary`
--
ALTER TABLE `emp_salary`
  MODIFY `emps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lead_categories`
--
ALTER TABLE `lead_categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lead_sub_categories`
--
ALTER TABLE `lead_sub_categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `localities`
--
ALTER TABLE `localities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `locatedinsides`
--
ALTER TABLE `locatedinsides`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meetinglocations`
--
ALTER TABLE `meetinglocations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `meetingstatuses`
--
ALTER TABLE `meetingstatuses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meetingtimelines`
--
ALTER TABLE `meetingtimelines`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `possession_by`
--
ALTER TABLE `possession_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `propertiesavailablefors`
--
ALTER TABLE `propertiesavailablefors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `properties_owner_info`
--
ALTER TABLE `properties_owner_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `propertycities`
--
ALTER TABLE `propertycities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `propertymasterkeys`
--
ALTER TABLE `propertymasterkeys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `propertymastervalues`
--
ALTER TABLE `propertymastervalues`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `property_additional_features`
--
ALTER TABLE `property_additional_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `property_basic_details`
--
ALTER TABLE `property_basic_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `property_category`
--
ALTER TABLE `property_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `property_location_details`
--
ALTER TABLE `property_location_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `property_priceing`
--
ALTER TABLE `property_priceing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `property_profile`
--
ALTER TABLE `property_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_user_relation`
--
ALTER TABLE `property_user_relation`
  MODIFY `pur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questionoptions`
--
ALTER TABLE `questionoptions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sublocalities`
--
ALTER TABLE `sublocalities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subpropertytypes`
--
ALTER TABLE `subpropertytypes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_modules`
--
ALTER TABLE `sub_modules`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sub_sub_modules`
--
ALTER TABLE `sub_sub_modules`
  MODIFY `ssm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tower`
--
ALTER TABLE `tower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user_access_permissions`
--
ALTER TABLE `user_access_permissions`
  MODIFY `uap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_roles_tb`
--
ALTER TABLE `user_roles_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitorbooks`
--
ALTER TABLE `visitorbooks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zonetypes`
--
ALTER TABLE `zonetypes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
