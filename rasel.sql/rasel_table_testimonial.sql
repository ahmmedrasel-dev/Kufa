
-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(10) UNSIGNED NOT NULL,
  `clientName` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `clientPhoto` varchar(255) DEFAULT NULL,
  `clientComment` text,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `clientName`, `designation`, `clientPhoto`, `clientComment`, `status`) VALUES
(8, 'Rasel Ahmmed', 'Full Stack Web Developerr', '1402372603.png', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter', 1),
(9, 'Taslima Rahman', 'Digital Marketer', '453484739.jpg', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying', 1);
