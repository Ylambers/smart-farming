-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 11:37 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_path` longtext COLLATE utf8_unicode_ci,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `user_id`, `topic`, `description`, `media_path`, `date_posted`) VALUES
(1, 1, 1, 'Bla', NULL, '2019-01-09 12:13:13'),
(2, 1, 1, 'sdasd', '475791f501eafa96f494502e3e9d335c.png', '2019-01-09 13:01:52'),
(3, 1, 1, 'Plah', '33330200043d51086a7bc0eaed20ec09.jpeg', '2019-01-09 13:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `subcategory`, `title`, `description`) VALUES
(1, NULL, 'Drones', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kvk` int(11) NOT NULL,
  `verifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `user_id`, `title`, `description`, `website_url`, `kvk`, `verifiedBy`) VALUES
(1, 1, 'Basen', 'bla', 'geweldig.nl', 3423434, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_function`
--

CREATE TABLE `company_function` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_member`
--

CREATE TABLE `company_member` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_member`
--

INSERT INTO `company_member` (`id`, `company_id`, `user_id`) VALUES
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `company_member_function`
--

CREATE TABLE `company_member_function` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `function_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_sector`
--

CREATE TABLE `company_sector` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `sector_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `ranking_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `first_name`, `last_name`, `date_of_birth`, `ranking_id`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', 1, NULL, '$2y$13$XvCcr00r8oaR0V5eAaEfY.ELYOOm3BO30g.2qbAXtqI9IiQsdpGVi', '2019-01-11 09:25:50', NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', 'Yaron', 'Lambers', '1995-08-10', 2),
(2, 'user', 'user', 'user@gmail.com', 'user@gmail.com', 1, NULL, '$2y$13$xysXbaCaFULdQxcv3w6ylOA91jV5ahHthv6APFTPMlt1x5vYBG5AC', '2018-12-17 09:36:47', NULL, NULL, 'a:0:{}', 'pietje', 'fiets', '2008-02-10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `response_id` int(11) DEFAULT NULL,
  `message_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_send` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `moderator_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upvote_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id`, `title`, `description`, `upvote_amount`) VALUES
(1, 'Godlike', 'meer dan 1000 punten', 1000),
(2, 'Master', 'Meer dan 100 punten', 100),
(3, 'Test', '-', 100),
(4, 'Test', '-', 100),
(5, 'Test', '-', 100),
(6, 'Test', '-', 100),
(7, 'Test', '-', 100),
(8, 'Test', '-', 100),
(9, 'Test', '-', 100),
(10, 'Test', '-', 100),
(11, 'Test', '-', 100),
(12, 'Test', '-', 100),
(13, 'Test', '-', 100),
(14, 'Test', '-', 100),
(15, 'Test', '-', 100),
(16, 'Test', '-', 100),
(17, 'Test', '-', 100),
(18, 'Test', '-', 100),
(19, 'Test', '-', 100),
(20, 'Test', '-', 100),
(21, 'Test', '-', 100),
(22, 'Test', '-', 100),
(23, 'Test', '-', 100),
(24, 'Test', '-', 100),
(25, 'Test', '-', 100),
(26, 'Test', '-', 100),
(27, 'Test', '-', 100),
(28, 'Test', '-', 100),
(29, 'Test', '-', 100),
(30, 'Test', '-', 100),
(31, 'Test', '-', 100),
(32, 'Test', '-', 100),
(33, 'Test', '-', 100),
(34, 'Test', '-', 100),
(35, 'Test', '-', 100),
(36, 'Test', '-', 100),
(37, 'Test', '-', 100),
(38, 'Test', '-', 100),
(39, 'Test', '-', 100),
(40, 'Test', '-', 100),
(41, 'Test', '-', 100),
(42, 'Test', '-', 100),
(43, 'Test', '-', 100),
(44, 'Test', '-', 100),
(45, 'Test', '-', 100),
(46, 'Test', '-', 100),
(47, 'Test', '-', 100),
(48, 'Test', '-', 100),
(49, 'Test', '-', 100),
(50, 'Test', '-', 100),
(51, 'Test', '-', 100),
(52, 'Test', '-', 100),
(53, 'Test', '-', 100),
(54, 'Test', '-', 100),
(55, 'Test', '-', 100),
(56, 'Test', '-', 100),
(57, 'Test', '-', 100),
(58, 'Test', '-', 100),
(59, 'Test', '-', 100),
(60, 'Test', '-', 100),
(61, 'Test', '-', 100),
(62, 'Test', '-', 100),
(63, 'Test', '-', 100),
(64, 'Test', '-', 100),
(65, 'Test', '-', 100),
(66, 'Test', '-', 100),
(67, 'Test', '-', 100),
(68, 'Test', '-', 100),
(69, 'Test', '-', 100),
(70, 'Test', '-', 100),
(71, 'Test', '-', 100),
(72, 'Test', '-', 100),
(73, 'Test', '-', 100),
(74, 'Test', '-', 100),
(75, 'Test', '-', 100),
(76, 'Test', '-', 100),
(77, 'Test', '-', 100),
(78, 'Test', '-', 100),
(79, 'Test', '-', 100),
(80, 'Test', '-', 100),
(81, 'Test', '-', 100),
(82, 'Test', '-', 100),
(83, 'Test', '-', 100),
(84, 'Test', '-', 100),
(85, 'Test', '-', 100),
(86, 'Test', '-', 100),
(87, 'Test', '-', 100),
(88, 'Test', '-', 100),
(89, 'Test', '-', 100),
(90, 'Test', '-', 100),
(91, 'Test', '-', 100),
(92, 'Test', '-', 100),
(93, 'Test', '-', 100),
(94, 'Test', '-', 100),
(95, 'Test', '-', 100),
(96, 'Test', '-', 100),
(97, 'Test', '-', 100),
(98, 'Test', '-', 100),
(99, 'Test', '-', 100),
(100, 'Test', '-', 100),
(101, 'Test', '-', 100),
(102, 'Test', '-', 100),
(103, 'Test', '-', 100),
(104, 'Test', '-', 100),
(105, 'Test', '-', 100),
(106, 'Test', '-', 100),
(107, 'Test', '-', 100),
(108, 'Test', '-', 100),
(109, 'Test', '-', 100),
(110, 'Test', '-', 100),
(111, 'Test', '-', 100),
(112, 'Test', '-', 100),
(113, 'Test', '-', 100),
(114, 'Test', '-', 100),
(115, 'Test', '-', 100),
(116, 'Test', '-', 100),
(117, 'Test', '-', 100),
(118, 'Test', '-', 100),
(119, 'Test', '-', 100),
(120, 'Test', '-', 100),
(121, 'Test', '-', 100),
(122, 'Test', '-', 100),
(123, 'Test', '-', 100),
(124, 'Test', '-', 100),
(125, 'Test', '-', 100),
(126, 'Test', '-', 100),
(127, 'Test', '-', 100),
(128, 'Test', '-', 100),
(129, 'Test', '-', 100),
(130, 'Test', '-', 100),
(131, 'Test', '-', 100),
(132, 'Test', '-', 100),
(133, 'Test', '-', 100),
(134, 'Test', '-', 100),
(135, 'Test', '-', 100),
(136, 'Test', '-', 100),
(137, 'Test', '-', 100),
(138, 'Test', '-', 100),
(139, 'Test', '-', 100),
(140, 'Test', '-', 100),
(141, 'Test', '-', 100),
(142, 'Test', '-', 100),
(143, 'Test', '-', 100),
(144, 'Test', '-', 100),
(145, 'Test', '-', 100),
(146, 'Test', '-', 100),
(147, 'Test', '-', 100),
(148, 'Test', '-', 100),
(149, 'Test', '-', 100),
(150, 'Test', '-', 100),
(151, 'Test', '-', 100),
(152, 'Test', '-', 100),
(153, 'Test', '-', 100),
(154, 'Test', '-', 100),
(155, 'Test', '-', 100),
(156, 'Test', '-', 100),
(157, 'Test', '-', 100),
(158, 'Test', '-', 100),
(159, 'Test', '-', 100),
(160, 'Test', '-', 100),
(161, 'Test', '-', 100),
(162, 'Test', '-', 100),
(163, 'Test', '-', 100),
(164, 'Test', '-', 100),
(165, 'Test', '-', 100),
(166, 'Test', '-', 100),
(167, 'Test', '-', 100),
(168, 'Test', '-', 100),
(169, 'Test', '-', 100),
(170, 'Test', '-', 100),
(171, 'Test', '-', 100),
(172, 'Test', '-', 100),
(173, 'Test', '-', 100),
(174, 'Test', '-', 100),
(175, 'Test', '-', 100),
(176, 'Test', '-', 100),
(177, 'Test', '-', 100),
(178, 'Test', '-', 100),
(179, 'Test', '-', 100),
(180, 'Test', '-', 100),
(181, 'Test', '-', 100),
(182, 'Test', '-', 100),
(183, 'Test', '-', 100),
(184, 'Test', '-', 100),
(185, 'Test', '-', 100),
(186, 'Test', '-', 100),
(187, 'Test', '-', 100),
(188, 'Test', '-', 100),
(189, 'Test', '-', 100),
(190, 'Test', '-', 100),
(191, 'Test', '-', 100),
(192, 'Test', '-', 100),
(193, 'Test', '-', 100),
(194, 'Test', '-', 100),
(195, 'Test', '-', 100),
(196, 'Test', '-', 100),
(197, 'Test', '-', 100),
(198, 'Test', '-', 100),
(199, 'Test', '-', 100),
(200, 'Test', '-', 100),
(201, 'Test', '-', 100),
(202, 'Test', '-', 100),
(203, 'Test', '-', 100),
(204, 'Test', '-', 100),
(205, 'Test', '-', 100),
(206, 'Test', '-', 100),
(207, 'Test', '-', 100),
(208, 'Test', '-', 100),
(209, 'Test', '-', 100),
(210, 'Test', '-', 100),
(211, 'Test', '-', 100),
(212, 'Test', '-', 100),
(213, 'Test', '-', 100),
(214, 'Test', '-', 100),
(215, 'Test', '-', 100),
(216, 'Test', '-', 100),
(217, 'Test', '-', 100),
(218, 'Test', '-', 100),
(219, 'Test', '-', 100),
(220, 'Test', '-', 100),
(221, 'Test', '-', 100),
(222, 'Test', '-', 100),
(223, 'Test', '-', 100),
(224, 'Test', '-', 100),
(225, 'Test', '-', 100),
(226, 'Test', '-', 100),
(227, 'Test', '-', 100),
(228, 'Test', '-', 100),
(229, 'Test', '-', 100),
(230, 'Test', '-', 100),
(231, 'Test', '-', 100),
(232, 'Test', '-', 100),
(233, 'Test', '-', 100),
(234, 'Test', '-', 100),
(235, 'Test', '-', 100),
(236, 'Test', '-', 100),
(237, 'Test', '-', 100),
(238, 'Test', '-', 100),
(239, 'Test', '-', 100),
(240, 'Test', '-', 100),
(241, 'Test', '-', 100),
(242, 'Test', '-', 100),
(243, 'Test', '-', 100),
(244, 'Test', '-', 100),
(245, 'Test', '-', 100),
(246, 'Test', '-', 100),
(247, 'Test', '-', 100),
(248, 'Test', '-', 100),
(249, 'Test', '-', 100),
(250, 'Test', '-', 100),
(251, 'Test', '-', 100),
(252, 'Test', '-', 100),
(253, 'Test', '-', 100),
(254, 'Test', '-', 100),
(255, 'Test', '-', 100),
(256, 'Test', '-', 100),
(257, 'Test', '-', 100),
(258, 'Test', '-', 100),
(259, 'Test', '-', 100),
(260, 'Test', '-', 100),
(261, 'Test', '-', 100),
(262, 'Test', '-', 100),
(263, 'Test', '-', 100),
(264, 'Test', '-', 100),
(265, 'Test', '-', 100),
(266, 'Test', '-', 100),
(267, 'Test', '-', 100),
(268, 'Test', '-', 100),
(269, 'Test', '-', 100),
(270, 'Test', '-', 100),
(271, 'Test', '-', 100),
(272, 'Test', '-', 100),
(273, 'Test', '-', 100),
(274, 'Test', '-', 100),
(275, 'Test', '-', 100),
(276, 'Test', '-', 100),
(277, 'Test', '-', 100),
(278, 'Test', '-', 100),
(279, 'Test', '-', 100),
(280, 'Test', '-', 100),
(281, 'Test', '-', 100),
(282, 'Test', '-', 100),
(283, 'Test', '-', 100),
(284, 'Test', '-', 100),
(285, 'Test', '-', 100),
(286, 'Test', '-', 100),
(287, 'Test', '-', 100),
(288, 'Test', '-', 100),
(289, 'Test', '-', 100),
(290, 'Test', '-', 100),
(291, 'Test', '-', 100),
(292, 'Test', '-', 100),
(293, 'Test', '-', 100),
(294, 'Test', '-', 100),
(295, 'Test', '-', 100),
(296, 'Test', '-', 100),
(297, 'Test', '-', 100),
(298, 'Test', '-', 100),
(299, 'Test', '-', 100),
(300, 'Test', '-', 100),
(301, 'Test', '-', 100),
(302, 'Test', '-', 100),
(303, 'Test', '-', 100),
(304, 'Test', '-', 100),
(305, 'Test', '-', 100),
(306, 'Test', '-', 100),
(307, 'Test', '-', 100),
(308, 'Test', '-', 100),
(309, 'Test', '-', 100),
(310, 'Test', '-', 100),
(311, 'Test', '-', 100),
(312, 'Test', '-', 100),
(313, 'Test', '-', 100),
(314, 'Test', '-', 100),
(315, 'Test', '-', 100),
(316, 'Test', '-', 100),
(317, 'Test', '-', 100),
(318, 'Test', '-', 100),
(319, 'Test', '-', 100),
(320, 'Test', '-', 100),
(321, 'Test', '-', 100),
(322, 'Test', '-', 100),
(323, 'Test', '-', 100),
(324, 'Test', '-', 100),
(325, 'Test', '-', 100),
(326, 'Test', '-', 100),
(327, 'Test', '-', 100),
(328, 'Test', '-', 100),
(329, 'Test', '-', 100),
(330, 'Test', '-', 100),
(331, 'Test', '-', 100),
(332, 'Test', '-', 100),
(333, 'Test', '-', 100),
(334, 'Test', '-', 100),
(335, 'Test', '-', 100),
(336, 'Test', '-', 100),
(337, 'Test', '-', 100),
(338, 'Test', '-', 100),
(339, 'Test', '-', 100),
(340, 'Test', '-', 100),
(341, 'Test', '-', 100),
(342, 'Test', '-', 100),
(343, 'Test', '-', 100),
(344, 'Test', '-', 100),
(345, 'Test', '-', 100),
(346, 'Test', '-', 100),
(347, 'Test', '-', 100),
(348, 'Test', '-', 100),
(349, 'Test', '-', 100),
(350, 'Test', '-', 100),
(351, 'Test', '-', 100),
(352, 'Test', '-', 100),
(353, 'Test', '-', 100),
(354, 'Test', '-', 100),
(355, 'Test', '-', 100),
(356, 'Test', '-', 100),
(357, 'Test', '-', 100),
(358, 'Test', '-', 100),
(359, 'Test', '-', 100),
(360, 'Test', '-', 100),
(361, 'Test', '-', 100),
(362, 'Test', '-', 100),
(363, 'Test', '-', 100),
(364, 'Test', '-', 100),
(365, 'Test', '-', 100),
(366, 'Test', '-', 100),
(367, 'Test', '-', 100),
(368, 'Test', '-', 100),
(369, 'Test', '-', 100),
(370, 'Test', '-', 100),
(371, 'Test', '-', 100),
(372, 'Test', '-', 100),
(373, 'Test', '-', 100),
(374, 'Test', '-', 100),
(375, 'Test', '-', 100),
(376, 'Test', '-', 100),
(377, 'Test', '-', 100),
(378, 'Test', '-', 100),
(379, 'Test', '-', 100),
(380, 'Test', '-', 100),
(381, 'Test', '-', 100),
(382, 'Test', '-', 100),
(383, 'Test', '-', 100),
(384, 'Test', '-', 100),
(385, 'Test', '-', 100),
(386, 'Test', '-', 100),
(387, 'Test', '-', 100),
(388, 'Test', '-', 100),
(389, 'Test', '-', 100),
(390, 'Test', '-', 100),
(391, 'Test', '-', 100),
(392, 'Test', '-', 100),
(393, 'Test', '-', 100),
(394, 'Test', '-', 100),
(395, 'Test', '-', 100),
(396, 'Test', '-', 100),
(397, 'Test', '-', 100),
(398, 'Test', '-', 100),
(399, 'Test', '-', 100),
(400, 'Test', '-', 100),
(401, 'Test', '-', 100),
(402, 'Test', '-', 100),
(403, 'Test', '-', 100),
(404, 'Test', '-', 100),
(405, 'Test', '-', 100),
(406, 'Test', '-', 100),
(407, 'Test', '-', 100),
(408, 'Test', '-', 100),
(409, 'Test', '-', 100),
(410, 'Test', '-', 100),
(411, 'Test', '-', 100),
(412, 'Test', '-', 100),
(413, 'Test', '-', 100),
(414, 'Test', '-', 100),
(415, 'Test', '-', 100),
(416, 'Test', '-', 100),
(417, 'Test', '-', 100),
(418, 'Test', '-', 100),
(419, 'Test', '-', 100),
(420, 'Test', '-', 100),
(421, 'Test', '-', 100),
(422, 'Test', '-', 100),
(423, 'Test', '-', 100),
(424, 'Test', '-', 100),
(425, 'Test', '-', 100),
(426, 'Test', '-', 100),
(427, 'Test', '-', 100),
(428, 'Test', '-', 100),
(429, 'Test', '-', 100),
(430, 'Test', '-', 100),
(431, 'Test', '-', 100),
(432, 'Test', '-', 100),
(433, 'Test', '-', 100),
(434, 'Test', '-', 100),
(435, 'Test', '-', 100),
(436, 'Test', '-', 100),
(437, 'Test', '-', 100),
(438, 'Test', '-', 100),
(439, 'Test', '-', 100),
(440, 'Test', '-', 100),
(441, 'Test', '-', 100),
(442, 'Test', '-', 100),
(443, 'Test', '-', 100),
(444, 'Test', '-', 100),
(445, 'Test', '-', 100),
(446, 'Test', '-', 100),
(447, 'Test', '-', 100),
(448, 'Test', '-', 100),
(449, 'Test', '-', 100),
(450, 'Test', '-', 100),
(451, 'Test', '-', 100),
(452, 'Test', '-', 100),
(453, 'Test', '-', 100),
(454, 'Test', '-', 100),
(455, 'Test', '-', 100),
(456, 'Test', '-', 100),
(457, 'Test', '-', 100),
(458, 'Test', '-', 100),
(459, 'Test', '-', 100),
(460, 'Test', '-', 100),
(461, 'Test', '-', 100),
(462, 'Test', '-', 100),
(463, 'Test', '-', 100),
(464, 'Test', '-', 100),
(465, 'Test', '-', 100),
(466, 'Test', '-', 100),
(467, 'Test', '-', 100),
(468, 'Test', '-', 100),
(469, 'Test', '-', 100),
(470, 'Test', '-', 100),
(471, 'Test', '-', 100),
(472, 'Test', '-', 100),
(473, 'Test', '-', 100),
(474, 'Test', '-', 100),
(475, 'Test', '-', 100),
(476, 'Test', '-', 100),
(477, 'Test', '-', 100),
(478, 'Test', '-', 100),
(479, 'Test', '-', 100),
(480, 'Test', '-', 100),
(481, 'Test', '-', 100),
(482, 'Test', '-', 100),
(483, 'Test', '-', 100),
(484, 'Test', '-', 100),
(485, 'Test', '-', 100),
(486, 'Test', '-', 100),
(487, 'Test', '-', 100),
(488, 'Test', '-', 100),
(489, 'Test', '-', 100),
(490, 'Test', '-', 100),
(491, 'Test', '-', 100),
(492, 'Test', '-', 100),
(493, 'Test', '-', 100),
(494, 'Test', '-', 100),
(495, 'Test', '-', 100),
(496, 'Test', '-', 100),
(497, 'Test', '-', 100),
(498, 'Test', '-', 100),
(499, 'Test', '-', 100),
(500, 'Test', '-', 100),
(501, 'Test', '-', 100),
(502, 'Test', '-', 100),
(503, 'Test', '-', 100),
(504, 'Test', '-', 100),
(505, 'Test', '-', 100),
(506, 'Test', '-', 100),
(507, 'Test', '-', 100),
(508, 'Test', '-', 100),
(509, 'Test', '-', 100),
(510, 'Test', '-', 100),
(511, 'Test', '-', 100),
(512, 'Test', '-', 100),
(513, 'Test', '-', 100),
(514, 'Test', '-', 100),
(515, 'Test', '-', 100),
(516, 'Test', '-', 100),
(517, 'Test', '-', 100),
(518, 'Test', '-', 100),
(519, 'Test', '-', 100),
(520, 'Test', '-', 100),
(521, 'Test', '-', 100),
(522, 'Test', '-', 100),
(523, 'Test', '-', 100),
(524, 'Test', '-', 100),
(525, 'Test', '-', 100),
(526, 'Test', '-', 100),
(527, 'Test', '-', 100),
(528, 'Test', '-', 100),
(529, 'Test', '-', 100),
(530, 'Test', '-', 100),
(531, 'Test', '-', 100),
(532, 'Test', '-', 100),
(533, 'Test', '-', 100),
(534, 'Test', '-', 100),
(535, 'Test', '-', 100),
(536, 'Test', '-', 100),
(537, 'Test', '-', 100),
(538, 'Test', '-', 100),
(539, 'Test', '-', 100),
(540, 'Test', '-', 100),
(541, 'Test', '-', 100),
(542, 'Test', '-', 100),
(543, 'Test', '-', 100),
(544, 'Test', '-', 100),
(545, 'Test', '-', 100),
(546, 'Test', '-', 100),
(547, 'Test', '-', 100),
(548, 'Test', '-', 100),
(549, 'Test', '-', 100),
(550, 'Test', '-', 100),
(551, 'Test', '-', 100),
(552, 'Test', '-', 100),
(553, 'Test', '-', 100),
(554, 'Test', '-', 100),
(555, 'Test', '-', 100),
(556, 'Test', '-', 100),
(557, 'Test', '-', 100),
(558, 'Test', '-', 100),
(559, 'Test', '-', 100),
(560, 'Test', '-', 100),
(561, 'Test', '-', 100),
(562, 'Test', '-', 100),
(563, 'Test', '-', 100),
(564, 'Test', '-', 100),
(565, 'Test', '-', 100),
(566, 'Test', '-', 100),
(567, 'Test', '-', 100),
(568, 'Test', '-', 100),
(569, 'Test', '-', 100),
(570, 'Test', '-', 100),
(571, 'Test', '-', 100),
(572, 'Test', '-', 100),
(573, 'Test', '-', 100),
(574, 'Test', '-', 100),
(575, 'Test', '-', 100),
(576, 'Test', '-', 100),
(577, 'Test', '-', 100),
(578, 'Test', '-', 100),
(579, 'Test', '-', 100),
(580, 'Test', '-', 100),
(581, 'Test', '-', 100),
(582, 'Test', '-', 100),
(583, 'Test', '-', 100),
(584, 'Test', '-', 100),
(585, 'Test', '-', 100),
(586, 'Test', '-', 100),
(587, 'Test', '-', 100),
(588, 'Test', '-', 100),
(589, 'Test', '-', 100),
(590, 'Test', '-', 100),
(591, 'Test', '-', 100),
(592, 'Test', '-', 100),
(593, 'Test', '-', 100),
(594, 'Test', '-', 100),
(595, 'Test', '-', 100),
(596, 'Test', '-', 100),
(597, 'Test', '-', 100),
(598, 'Test', '-', 100),
(599, 'Test', '-', 100),
(600, 'Test', '-', 100),
(601, 'Test', '-', 100),
(602, 'Test', '-', 100),
(603, 'Test', '-', 100),
(604, 'Test', '-', 100),
(605, 'Test', '-', 100),
(606, 'Test', '-', 100),
(607, 'Test', '-', 100),
(608, 'Test', '-', 100),
(609, 'Test', '-', 100),
(610, 'Test', '-', 100),
(611, 'Test', '-', 100),
(612, 'Test', '-', 100),
(613, 'Test', '-', 100),
(614, 'Test', '-', 100),
(615, 'Test', '-', 100),
(616, 'Test', '-', 100),
(617, 'Test', '-', 100),
(618, 'Test', '-', 100),
(619, 'Test', '-', 100),
(620, 'Test', '-', 100),
(621, 'Test', '-', 100),
(622, 'Test', '-', 100),
(623, 'Test', '-', 100),
(624, 'Test', '-', 100),
(625, 'Test', '-', 100),
(626, 'Test', '-', 100),
(627, 'Test', '-', 100),
(628, 'Test', '-', 100),
(629, 'Test', '-', 100),
(630, 'Test', '-', 100),
(631, 'Test', '-', 100),
(632, 'Test', '-', 100),
(633, 'Test', '-', 100),
(634, 'Test', '-', 100),
(635, 'Test', '-', 100),
(636, 'Test', '-', 100),
(637, 'Test', '-', 100),
(638, 'Test', '-', 100),
(639, 'Test', '-', 100),
(640, 'Test', '-', 100),
(641, 'Test', '-', 100),
(642, 'Test', '-', 100),
(643, 'Test', '-', 100),
(644, 'Test', '-', 100),
(645, 'Test', '-', 100),
(646, 'Test', '-', 100),
(647, 'Test', '-', 100),
(648, 'Test', '-', 100),
(649, 'Test', '-', 100),
(650, 'Test', '-', 100),
(651, 'Test', '-', 100),
(652, 'Test', '-', 100),
(653, 'Test', '-', 100),
(654, 'Test', '-', 100),
(655, 'Test', '-', 100),
(656, 'Test', '-', 100),
(657, 'Test', '-', 100),
(658, 'Test', '-', 100),
(659, 'Test', '-', 100),
(660, 'Test', '-', 100),
(661, 'Test', '-', 100),
(662, 'Test', '-', 100),
(663, 'Test', '-', 100),
(664, 'Test', '-', 100),
(665, 'Test', '-', 100),
(666, 'Test', '-', 100),
(667, 'Test', '-', 100),
(668, 'Test', '-', 100),
(669, 'Test', '-', 100),
(670, 'Test', '-', 100),
(671, 'Test', '-', 100),
(672, 'Test', '-', 100),
(673, 'Test', '-', 100),
(674, 'Test', '-', 100),
(675, 'Test', '-', 100),
(676, 'Test', '-', 100),
(677, 'Test', '-', 100),
(678, 'Test', '-', 100);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `answer_id`, `topic_id`, `user_id`, `vote`) VALUES
(8, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `sector_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_path` longtext COLLATE utf8_unicode_ci,
  `date_posted` datetime NOT NULL,
  `date_edited` datetime DEFAULT NULL,
  `solved` tinyint(1) DEFAULT NULL,
  `topic_type` enum('question','demand','supply') COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `user_id`, `category_id`, `title`, `text`, `sub_category`, `media_path`, `date_posted`, `date_edited`, `solved`, `topic_type`, `activated`) VALUES
(1, 1, 1, 'Mijn drone werkt niet', 'Hellpp', 'motoren', NULL, '2018-12-20 12:03:45', NULL, 0, 'question', 0),
(2, 1, 1, 'Mijn drone werkt niet', 'Hellpp', 'motoren', NULL, '2018-12-20 12:36:27', '2018-12-20 12:36:58', 0, 'demand', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topic_type`
--

CREATE TABLE `topic_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_sector`
--

CREATE TABLE `user_sector` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sector_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DADD4A25A76ED395` (`user_id`),
  ADD KEY `IDX_DADD4A259D40DE1B` (`topic`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_64C19C1DDCA448` (`subcategory`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4FBF094F18C69B73` (`kvk`),
  ADD KEY `IDX_4FBF094FA76ED395` (`user_id`),
  ADD KEY `IDX_4FBF094F1C4DBF30` (`verifiedBy`);

--
-- Indexes for table `company_function`
--
ALTER TABLE `company_function`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D2390350979B1AD6` (`company_id`);

--
-- Indexes for table `company_member`
--
ALTER TABLE `company_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4D7B9E0D979B1AD6` (`company_id`),
  ADD KEY `IDX_4D7B9E0DA76ED395` (`user_id`);

--
-- Indexes for table `company_member_function`
--
ALTER TABLE `company_member_function`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_72828FAA7597D3FE` (`member_id`),
  ADD KEY `IDX_72828FAA67048801` (`function_id`);

--
-- Indexes for table `company_sector`
--
ALTER TABLE `company_sector`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_763CBD9D979B1AD6` (`company_id`),
  ADD KEY `IDX_763CBD9DDE95C867` (`sector_id`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`),
  ADD KEY `IDX_957A647920F64684` (`ranking_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6BD307FA76ED395` (`user_id`),
  ADD KEY `IDX_B6BD307FFBF32840` (`response_id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D7E7CCC8A76ED395` (`user_id`),
  ADD KEY `IDX_D7E7CCC8D0AFA354` (`moderator_id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D8892622AA334807` (`answer_id`),
  ADD KEY `IDX_D8892622A76ED395` (`user_id`),
  ADD KEY `IDX_D88926221F55203D` (`topic_id`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_389B7831F55203D` (`topic_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9D40DE1BA76ED395` (`user_id`),
  ADD KEY `IDX_9D40DE1B12469DE2` (`category_id`);

--
-- Indexes for table `topic_type`
--
ALTER TABLE `topic_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sector`
--
ALTER TABLE `user_sector`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2EF1C2D5A76ED395` (`user_id`),
  ADD KEY `IDX_2EF1C2D5DE95C867` (`sector_id`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FEFDAB8EA76ED395` (`user_id`),
  ADD KEY `IDX_FEFDAB8E1F55203D` (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_function`
--
ALTER TABLE `company_function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_member`
--
ALTER TABLE `company_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_member_function`
--
ALTER TABLE `company_member_function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_sector`
--
ALTER TABLE `company_sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=679;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topic_type`
--
ALTER TABLE `topic_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_sector`
--
ALTER TABLE `user_sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `FK_DADD4A259D40DE1B` FOREIGN KEY (`topic`) REFERENCES `topic` (`id`),
  ADD CONSTRAINT `FK_DADD4A25A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C1DDCA448` FOREIGN KEY (`subcategory`) REFERENCES `category` (`id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `FK_4FBF094F1C4DBF30` FOREIGN KEY (`verifiedBy`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_4FBF094FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `company_function`
--
ALTER TABLE `company_function`
  ADD CONSTRAINT `FK_D2390350979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_member`
--
ALTER TABLE `company_member`
  ADD CONSTRAINT `FK_4D7B9E0D979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4D7B9E0DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_member_function`
--
ALTER TABLE `company_member_function`
  ADD CONSTRAINT `FK_72828FAA67048801` FOREIGN KEY (`function_id`) REFERENCES `company_function` (`id`),
  ADD CONSTRAINT `FK_72828FAA7597D3FE` FOREIGN KEY (`member_id`) REFERENCES `company_member` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_sector`
--
ALTER TABLE `company_sector`
  ADD CONSTRAINT `FK_763CBD9D979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `FK_763CBD9DDE95C867` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`);

--
-- Constraints for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD CONSTRAINT `FK_957A647920F64684` FOREIGN KEY (`ranking_id`) REFERENCES `ranking` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_B6BD307FFBF32840` FOREIGN KEY (`response_id`) REFERENCES `message` (`id`);

--
-- Constraints for table `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `FK_D7E7CCC8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_D7E7CCC8D0AFA354` FOREIGN KEY (`moderator_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_D88926221F55203D` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`),
  ADD CONSTRAINT `FK_D8892622A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_D8892622AA334807` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`);

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `FK_389B7831F55203D` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`);

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `FK_9D40DE1B12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_9D40DE1BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `user_sector`
--
ALTER TABLE `user_sector`
  ADD CONSTRAINT `FK_2EF1C2D5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_2EF1C2D5DE95C867` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`);

--
-- Constraints for table `view`
--
ALTER TABLE `view`
  ADD CONSTRAINT `FK_FEFDAB8E1F55203D` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`),
  ADD CONSTRAINT `FK_FEFDAB8EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
