
-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `subTitle` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `summary` text,
  `bannerPhoto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `subTitle`, `title`, `summary`, `bannerPhoto`) VALUES
(15, 'Hello!', 'I\'m Rasel ahmeed', 'A full stack web developer with excellent experience ', '531171867.png');
