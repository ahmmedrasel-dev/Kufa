
-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `brand_logo`, `status`) VALUES
(16, '1785349449.png', 1),
(17, '510810914.png', 1),
(18, '1026530221.png', 1),
(19, '1836265945.png', 1),
(20, '877698819.png', 1),
(21, '36947008.png', 1),
(22, '960847764.png', 1);
