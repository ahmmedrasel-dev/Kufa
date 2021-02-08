
-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `services_title` varchar(255) NOT NULL,
  `services_summary` varchar(255) NOT NULL,
  `services_icon` varchar(255) NOT NULL,
  `services_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services_title`, `services_summary`, `services_icon`, `services_status`) VALUES
(17, 'Digital Marketing', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'fas fa-magic', 1),
(18, 'Web Development', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'fas fa-magic', 1),
(19, 'Email Marketing', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'fas fa-bullseye', 1),
(20, 'Lead Generation', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, ', 'fas fa-sitemap', 1),
(21, 'Web Development', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from', 'fas fa-bullseye', 1),
(22, 'UI Designer', 'lorem ipsume dolar ammet sfla slfjsl l ltheke the elkwoa weloioa elw wjsd ', 'fas fa-desktop', 1);
