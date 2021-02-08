
-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(10) UNSIGNED NOT NULL,
  `counter_icon` varchar(255) DEFAULT NULL,
  `counter_number` int(10) UNSIGNED DEFAULT NULL,
  `counter_title` varchar(255) DEFAULT NULL,
  `counter_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `counter_icon`, `counter_number`, `counter_title`, `counter_status`) VALUES
(5, 'fas fa-sitemap', 900, 'Graphics Design', 1),
(6, 'fas fa-desktop', 875, 'Web Design', 1),
(7, 'fas fa-sitemap', 356, 'Web Development ', 1),
(8, 'fas fa-bullseye', 863, 'Digital Markeitng', 1);
