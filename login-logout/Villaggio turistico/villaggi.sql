-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 13, 2026 alle 13:02
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `villaggio_turistico`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `villaggi`
--

CREATE TABLE `villaggi` (
  `ID` int(11) NOT NULL,
  `Localita` varchar(20) DEFAULT NULL,
  `Denominazione` varchar(20) DEFAULT NULL,
  `Descrizione` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `villaggi`
--

INSERT INTO `villaggi` (`ID`, `Localita`, `Denominazione`, `Descrizione`) VALUES
(1, 'Olbia', 'Smeraldo Village', 'Resort di lusso fronte mare con accesso privato alla spiaggia.'),
(2, 'Garda', 'Lago Blu Resort', 'Immerso nel verde delle colline del Garda, ideale per famiglie.'),
(3, 'Cortina', 'Alte Cime Lodge', 'Villaggio invernale situato a pochi passi dai principali impianti sciistici.');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `villaggi`
--
ALTER TABLE `villaggi`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `villaggi`
--
ALTER TABLE `villaggi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
