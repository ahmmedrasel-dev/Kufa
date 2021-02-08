
-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `summary` text,
  `thumbnail` varchar(255) DEFAULT NULL,
  `featureimage` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `category`, `summary`, `thumbnail`, `featureimage`, `status`) VALUES
(18, 'Poster Design', 'Graphics Design', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '18.jpg', '1461933557.jpg', 1),
(19, 'Development', 'Web Applicationn', 'unknown printer took a galley of type and scrambled it to make a type specimen book.', '2006720571.jpg', '1642238305.jpg', 1),
(20, 'Interior', 'Interior Design', 'Electronic typesetting, remaining essentially unchanged. It was popularised', '418900846.jpg', '492492792.jpg', 1);
