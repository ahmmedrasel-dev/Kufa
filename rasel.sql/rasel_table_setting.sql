
-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `websiteTitle` varchar(255) DEFAULT NULL,
  `headerLogo` varchar(255) DEFAULT NULL,
  `favIcon` varchar(255) DEFAULT NULL,
  `footerText` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `websiteTitle`, `headerLogo`, `favIcon`, `footerText`) VALUES
(3, 'Kufa - Personal Portfolio Websitee', '1439707086.png', '752197696.png', 'Kufa © 2021 | Develop By <strong>  <a href=\'facebook.com/rahmmed47\'>Rasel</a>');
