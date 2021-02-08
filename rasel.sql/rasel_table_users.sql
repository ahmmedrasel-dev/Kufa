
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `status`, `password`) VALUES
(14, 'Hasina Parvin', '+966572868699', 'Hasina.info24@gmail.com', 1, '$2y$10$SvNq7j814FIGFvru.24kGOlLmmam63tQaqqJKvCAUkX8rUXuUOlti'),
(18, 'Rasel Ahmmed', '0167292472999', 'Rasel.demo1@gmail.com', 1, '$2y$10$2CqiS5gVOmLEroFGE4oRh.cbpEXEq9kJ.00guCeaU84JFj1.34V9y'),
(19, 'Azad Milon', '0167292472682', 'Azad.milon24@gmail.com', 1, '$2y$10$ufTDc6eNQFYVZsBjqq63oeH83NwZfssW3wMIYrTY4KY0yRGIK.6pO'),
(20, 'Hasina Parvin', '019724792482', 'Hasina-pavin89@gmail.com', 1, '$2y$10$7h.CtDodfINvfRsQrX8mSO4kpgflRHNIviL0gALkrSMB2o6jr2WL6'),
(21, 'Sazol Ahmmed', '0197242984292', 'Sazol.ahmmed00@gmail.com', 1, '$2y$10$NRIfKHjelBTQeaD3aBvKje8lJ5K/eLLIW7kKOUqy6otjmP90g0jQ.'),
(22, 'Rohan Islam', '01782949242', 'Rohan.diu24@gmail.com', 1, '$2y$10$SWC9LC4AcOUKlBcByTVhtOdQ03vc4aa5xToYexCclxAQLTYDYyqna'),
(23, 'Jishan Khan', '9279274202048', 'Jishan.khan24@gmail.com', 1, '$2y$10$KNvrqfsAEP93HhPh4A0YAOMZUhGig7oEIEgeJ/G0asBkq2nDjIVYK'),
(24, 'Ismail Ali', '+966572868167', 'ismailali.sa2@gmail.com', 1, '$2y$10$OVt9xQQmTXrKLft7DrYW9OOfr4L2kmERnPz18.AmqxLQqBtWb.R1.'),
(25, 'Sagir Ahmmed', '016729209302', 'Sagir.ahmmed23@gmail.com', 1, '$2y$10$uE3xl/WvfeR/NjpnUeieLubPQOlV1IcYADGprOdoJyYVy1ryeZktK'),
(26, 'Habibur Rahman', '01929293842', 'Habibur.rahman09@gmail.com', 1, '$2y$10$jEoWozYlzNrBlFkRGuVJDeRD3yMH7AGXNYkDA6W48AXpbz/uUeSte');
