-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 25, 2020 at 06:42 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Codflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `duration` int(11) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `media_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`id`, `genre_id`, `media_id`, `season`, `episode`, `title`, `status`, `duration`, `release_date`, `summary`, `media_url`) VALUES
(1, 4, 2, 1, 1, 'Noël mortel', 'sortie', 1420, '1989-12-17', 'Après avoir assisté au spectacle de Noël de Bart et Lisa à l\'école élémentaire de Springfield, Marge leur demande ce qu\'ils désirent recevoir comme cadeaux pour Noël : Bart demande un tatouage et Lisa demande un poney, mais Marge refuse de leur offrir ces cadeaux', 'https://www.youtube.com/embed/302zdsKnYQc%27'),
(2, 4, 2, 1, 2, 'Bart le génie', 'sortie', 1335, '1990-01-14', 'En jouant au Scrabble avec sa famille pour se préparer au test de QI qu\'il devra effectuer le lendemain, Bart, qui ne prend pas le jeu au sérieux, place toutes ses lettres au hasard, ce qui forme un mot inexistant causant la rage d\'Homer qui le poursuit dans la maison.', 'https://www.youtube.com/embed/WtC2e5qlIF4%27'),
(3, 4, 2, 2, 1, 'Aide-toi, le ciel t\'aidera', 'sortie', 1307, '1990-10-11', 'Une fois que Martin a fini son exposé, Mme Krapabelle demande à Bart de présenter le sien sur le livre L\'Île au trésor qu\'il est censé avoir lu. Bien évidemment, Bart ne l\'a jamais ouvert et tente d\'en faire une explication sans convaincre personne.', 'https://www.youtube.com/embed/mQbshj7ls5o%27'),
(4, 4, 2, 2, 2, 'Simpson et Delila', 'sortie', 1272, '1990-10-18', 'Pendant un programme télévisé, Homer voit une publicité qui vante les mérites de Dimoxinil, un produit miracle qui permet de faire pousser les cheveux. Il court voir un médecin afin qu\'il lui prescrive le traitement mais ce dernier coûte 1 000 $. En discutant avec Lenny et Carl, il apprend que son traitement peut être pris en charge par son assurance maladie. Il s\'empresse donc de retourner voir le médecin à la clinique du cheveu pour obtenir le produit miracle.', 'https://www.youtube.com/embed/LV-CzpastW0%27');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `media_id`, `start_date`, `finish_date`, `watch_duration`) VALUES
(3, 1, 2, '2020-06-25 00:00:00', NULL, 0),
(4, 1, 3, '2020-06-25 00:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`) VALUES
(1, 3, 'Les indestructibles', 'movie', 'released', '1977-10-12', 'Bob Paar était jadis l\'un des plus grands super-héros de la planète. Tout le monde connaissait Mr. Indestructible, le héros qui, chaque jour, sauvait des centaines de vies et combattait le mal. Aujourd\'\'hui, Mr. Indestructible est un petit expert en assurances qui n\'\'affronte plus que l\'\'ennui et un tour de taille en constante augmentation.', 'https://www.youtube.com/embed/wZ8l1AavXWM'),
(2, 3, 'Les Simpsons', 'série', 'released', '1989-12-17', 'Lorsqu\'Homer pollue gravement le lac de Springfield, une agence de protection de l\'environnement décide de mettre la ville en quarantaine en l\'isolant sous un énorme dôme. Les Springfieldiens, fous de rage, sont bien décidés à lyncher le coupable. Devant cette vague d\'animosité, les Simpson n\'ont d\'autre choix que de fuir et de s\'exiler en Alaska.', 'https://www.youtube.com/embed/SR8WWFzrZAg'),
(3, 1, 'Terminator', 'movie', 'released', '1984-04-13', 'Un Terminator, robot d\'aspect humain, est envoyé d\'un futur où sa race livre aux hommes une guerre sans merci. Sa mission est de trouver et d\'éliminer Sarah Connor avant qu\'elle ne donne naissance à John, appelé à devenir le chef de la résistance. Cette dernière envoie un de ses membres, Reese, aux trousses du cyborg.', 'https://www.youtube.com/embed/EpdAcA6ziiA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'coding@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);
