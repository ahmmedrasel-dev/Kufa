
-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `summary` text,
  `aboutPhoto` varchar(255) DEFAULT 'default_img.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `summary`, `aboutPhoto`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, sed repudiandae odit deserunt, quas quibusdam necessitatibus nesciunt eligendi esse sit non reprehenderit quisquam asperiores maxime blanditiis culpa vitae velit. Numquam!', '1059596169.png');
