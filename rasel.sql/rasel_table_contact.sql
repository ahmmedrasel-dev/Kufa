
-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `readStatus` int(11) NOT NULL DEFAULT '1' COMMENT 'status 1 = unread, status = 2 read',
  `deleteStatus` int(11) NOT NULL DEFAULT '1' COMMENT 'status 1 =  no delete, status = 2 delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `readStatus`, `deleteStatus`) VALUES
(1, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', 'Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.', 2, 2),
(2, 'Sydul Islam', 'sydul.info@gmail.com', 'Updated Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.', 2, 2),
(3, 'Sazal Ahmmed', 'sazal.ahmmed@gmail.com', 'Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins,', 2, 1),
(4, 'Abul Kalam ', 'abulkalam@gmail.com', 'Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.', 2, 1),
(5, 'Rohan Islam', 'rohan.islam@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, ', 2, 1),
(6, 'Habibur Rahman', 'habib.contact@gmail.com', 'If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill.', 1, 1),
(7, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', 'HI there this is demo mail.', 1, 1),
(8, 'Jahangir Alom', 'jahangr.bd@gmail.com', 'If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill.', 1, 1),
(9, 'Jahangir Alom', 'jahangr.bd@gmail.com', 'If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill.', 1, 1),
(10, 'Jahangir Alom', 'jahangr.bd@gmail.com', 'If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill.', 1, 1),
(11, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', 'jalsfj dlasjdf ajsdlf asjfas,fj,dasfj asdjflasj ', 1, 1),
(12, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', ' aslfd alsdf, asjf;l as,dfl ,alsjdflsja f,sdjflajsldj ,asdjf ,', 1, 1),
(13, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', 'If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill.', 1, 1),
(14, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', 'If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill.', 1, 1),
(15, 'Ismail ali', 'ismail.ali@gmaill.com', ' ajldf asldfj lafsjf ,alsjf asdfljas', 1, 1),
(16, 'Jhangir ', 'rahmmed.info@gmail.com', ' ajsdlf lasjf lasf laskdfl aslfjlasj lajlds las jl alsfd,asfls jsdl jdswoerow lasld ', 1, 1),
(17, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', 'rlaksjdf alksfjlas falsfj ,lawe ,fds a', 1, 1),
(18, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', 'rlaksjdf alksfjlas falsfj ,lawe ,fds a', 1, 1),
(19, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', 'rlaksjdf alksfjlas falsfj ,lawe ,fds a', 1, 1),
(20, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', 'rlaksjdf alksfjlas falsfj ,lawe ,fds a', 2, 1),
(21, 'Rasel Ahmmed', 'rahmmed.info@gmail.com', 'rlaksjdf alksfjlas falsfj ,lawe ,fds a', 2, 1);
