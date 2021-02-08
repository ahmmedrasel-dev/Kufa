
-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `year`, `subject`, `status`) VALUES
(2, 2010, 'Higher Secondary School Certificate', 2),
(3, 2021, 'PHD of Interaction Design & Animation', 1),
(4, 2018, 'Master of Database Administration', 1),
(5, 2010, 'Bachelor of Computer Engineering', 1),
(6, 2008, 'Diploma of Computer', 1);
