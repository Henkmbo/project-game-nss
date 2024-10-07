-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 07 okt 2024 om 14:37
-- Serverversie: 8.0.31
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-game-nss`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` varchar(4) NOT NULL,
  `answerText` varchar(255) NOT NULL,
  `answerId` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `answerId` (`answerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `answers`
--

INSERT INTO `answers` (`id`, `answerText`, `answerId`) VALUES
('hy5f', 'testantwoord1', '6yuR');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` varchar(4) NOT NULL,
  `questionText` varchar(255) NOT NULL,
  `questionId` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `questionId` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `questions`
--

INSERT INTO `questions` (`id`, `questionText`, `questionId`) VALUES
('hy4E', 'testvraag1', 'ki9O');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `questionshasanswers`
--

DROP TABLE IF EXISTS `questionshasanswers`;
CREATE TABLE IF NOT EXISTS `questionshasanswers` (
  `questionId` varchar(4) NOT NULL,
  `answerId` varchar(4) NOT NULL,
  PRIMARY KEY (`questionId`,`answerId`),
  KEY `fk_answer` (`answerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `questionshasanswers`
--

INSERT INTO `questionshasanswers` (`questionId`, `answerId`) VALUES
('ki9O', '6yuR');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` varchar(4) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userIsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPassword`, `userIsActive`) VALUES
('3efW', 'Gert', 'admin', 'admin1', 1);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `questionshasanswers`
--
ALTER TABLE `questionshasanswers`
  ADD CONSTRAINT `fk_answer` FOREIGN KEY (`answerId`) REFERENCES `answers` (`answerId`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_question` FOREIGN KEY (`questionId`) REFERENCES `questions` (`questionId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
