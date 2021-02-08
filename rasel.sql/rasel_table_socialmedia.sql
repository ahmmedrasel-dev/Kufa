
-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL,
  `sociallink` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `icon`, `sociallink`, `status`) VALUES
(27, 'fab fa-instagram', 'instagram.com/', 1),
(29, 'fab fa-facebook-f', 'facebook.com', 1),
(30, 'fab fa-pinterest', 'pintarest.com', 1),
(31, 'fab fa-youtube', 'youtube.com', 1);
