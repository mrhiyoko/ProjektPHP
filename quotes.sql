-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Sty 2019, 15:34
-- Wersja serwera: 10.1.30-MariaDB
-- Wersja PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `qoute` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `quotes`
--

INSERT INTO `quotes` (`id`, `author`, `qoute`) VALUES
(1, 'Ernest Hemingway', 'There is nothing to writing. All you do is sit down at a typewriter and bleed.'),
(2, 'Terry Pratchett', 'The trouble with having an open mind, of course, is that people will insist on coming along and trying to put things in it.'),
(7, 'Ernest Hemingway', 'Happiness in intelligent people is the rarest thing I know.'),
(8, 'Terry Pratchett', 'Time is a drug. Too much of it kills you.'),
(9, 'Ernest Hemingway', 'The world breaks everyone, and afterward, many are strong at the broken places.'),
(10, 'Terry Pratchett', 'In the beginning there was nothing, which exploded.'),
(11, 'Ernest Hemingway', 'I drink to make other people more interesting.'),
(12, 'Terry Pratchett', 'And what would humans be without love?\"\r\nRARE, said Death.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
