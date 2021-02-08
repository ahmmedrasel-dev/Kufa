
-- --------------------------------------------------------

--
-- Table structure for table `contactInfo`
--

CREATE TABLE `contactInfo` (
  `id` int(10) UNSIGNED NOT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactInfo`
--

INSERT INTO `contactInfo` (`id`, `summary`, `address`, `phone`, `email`) VALUES
(2, 'If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill.', '3161 King Abdulaziz Rd, Ar Rabiyah, Dammam', '+966572868132', 'rahmmed.info@gmail.com');
