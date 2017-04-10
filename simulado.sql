-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 03:44 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simulado`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` int(11) NOT NULL,
  `content` longtext,
  `question_id` int(11) NOT NULL,
  `comment` longtext,
  `gabarito` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `content`, `question_id`, `comment`, `gabarito`) VALUES
(1, '<p>sei la</p>', 1, '<p>Essa resposta est&aacute; errada por que</p>', 0),
(2, '<p>autotexto.</p>', 4, '<p>Sei la</p>', 0),
(3, '<p>hiperlink</p>', 1, '<p>certa</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `content` longtext,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `content`, `user_id`) VALUES
(1, 'Sei la', 1),
(2, '<p>Este &eacute; o meu primeiro teste com o Tynemce.</p>\n<p>Ser&aacute; que via <strong>funcionar!</strong></p>\n<p style="text-align: center;">Texto centralizado</p>\n<p style="text-align: right;">Texto alinhado &agrave; direita</p>\n<p>Texto Alinhado &agrave; esquerda</p>\n<p style="text-align: justify;">Este texto deveria estar com o alinhamento justificado. MAs para isso o texto deve chegar ao final da linha, o que n&atilde;o deve muito facil, ja que a linha &eacute; muito grande.</p>\n<p>&nbsp;</p>', 1),
(3, '<p><img title="resposta desafio - amigas na escola - 1.png" src="../../img/uploads/blobid1491705777956.png" alt="" width="1291" height="666" /></p>\r\n<p>Ser&aacute; que vai dar certo</p>', 1),
(4, '<p>O recurso no BrOffice Writer que permite que um usu&aacute;rio armazene um texto, que possa conter gr&aacute;ficos, tabelas e campos, de modo que se permita rapidamente inseri-lo posteriormente em um documento &eacute; o de:</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions_tags`
--

CREATE TABLE `questions_tags` (
  `question_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_tags`
--

INSERT INTO `questions_tags` (`question_id`, `tag_id`) VALUES
(1, 1),
(2, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `score` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Sei lá');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `type` varchar(45) DEFAULT NULL COMMENT 'Tipo de usuário. Se pode\ncadastrar questões ou apenas\nacessar questões.\nauthor, aluno\n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela usuários';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `username`, `type`) VALUES
(1, 'Antônio', 'eitasenhavea', 'antonio', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alternatives_questions_idx` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questions_users1_idx` (`user_id`);

--
-- Indexes for table `questions_tags`
--
ALTER TABLE `questions_tags`
  ADD PRIMARY KEY (`question_id`,`tag_id`),
  ADD KEY `fk_questions_has_tags_tags1_idx` (`tag_id`),
  ADD KEY `fk_questions_has_tags_questions1_idx` (`question_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_scores_users1_idx` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `fk_alternatives_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questions_tags`
--
ALTER TABLE `questions_tags`
  ADD CONSTRAINT `fk_questions_has_tags_questions1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questions_has_tags_tags1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `fk_scores_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
