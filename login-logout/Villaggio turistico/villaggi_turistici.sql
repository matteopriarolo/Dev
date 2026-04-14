-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 14, 2026 alle 09:08
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `villaggi_turistici`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `contratto`
--

CREATE TABLE `contratto` (
  `id` int(11) NOT NULL,
  `matricola` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codice_villaggio` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codice_figura` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_inizio` date NOT NULL,
  `data_fine` date NOT NULL
) ;

--
-- Dump dei dati per la tabella `contratto`
--

INSERT INTO `contratto` (`id`, `matricola`, `codice_villaggio`, `codice_figura`, `data_inizio`, `data_fine`) VALUES
(1, 'M001', 'V001', 'bag', '2023-06-01', '2023-09-30'),
(2, 'M001', 'V002', 'bag', '2024-06-01', '2024-09-30'),
(3, 'M002', 'V003', 'ani', '2023-05-15', '2023-10-15'),
(4, 'M003', 'V004', 'cam', '2022-05-01', '2022-10-31'),
(5, 'M003', 'V005', 'cuo', '2023-05-01', '2023-10-31'),
(6, 'M005', 'V001', 'cap', '2023-04-01', '2023-10-31'),
(7, 'M007', 'V006', 'bag', '2023-06-01', '2023-09-15'),
(8, 'M009', 'V002', 'rec', '2022-06-01', '2022-09-30'),
(9, 'M011', 'V005', 'spo', '2024-05-01', '2024-10-31'),
(10, 'M013', 'V007', 'cuo', '2023-04-15', '2023-11-15'),
(11, 'M015', 'V003', 'ani', '2024-05-15', '2024-10-15'),
(12, 'M016', 'V004', 'rec', '2024-04-01', '2024-10-31'),
(13, 'M017', 'V001', 'bag', '2022-06-01', '2022-09-30'),
(14, 'M017', 'V003', 'bag', '2023-06-01', '2023-09-30'),
(15, 'M018', 'V006', 'cam', '2024-05-01', '2024-10-31'),
(16, 'M020', 'V007', 'cap', '2024-04-01', '2024-11-30'),
(17, 'M001', 'V003', 'bag', '2026-04-01', '2026-10-31'),
(18, 'M002', 'V001', 'ani', '2026-03-15', '2026-10-15'),
(19, 'M004', 'V002', 'rec', '2026-04-01', '2026-10-31'),
(20, 'M006', 'V004', 'cam', '2026-03-01', '2026-10-31'),
(21, 'M007', 'V005', 'bag', '2026-04-01', '2026-10-31'),
(22, 'M008', 'V006', 'ani', '2026-03-20', '2026-10-20'),
(23, 'M009', 'V007', 'cuo', '2026-04-01', '2026-11-30'),
(24, 'M010', 'V001', 'bag', '2026-04-01', '2026-09-30'),
(25, 'M011', 'V002', 'spo', '2026-03-01', '2026-10-31'),
(26, 'M012', 'V003', 'ani', '2026-04-01', '2026-10-31'),
(27, 'M013', 'V004', 'cuo', '2026-03-15', '2026-11-15'),
(28, 'M014', 'V005', 'rec', '2026-04-01', '2026-10-31'),
(29, 'M017', 'V006', 'bag', '2026-04-01', '2026-09-30'),
(30, 'M019', 'V007', 'ani', '2026-04-01', '2026-10-31'),
(31, 'M020', 'V001', 'cap', '2026-01-01', '2026-12-31'),
(32, 'M005', 'V002', 'cap', '2026-02-01', '2026-12-31'),
(33, 'M003', 'V003', 'cap', '2026-03-01', '2026-12-31'),
(34, 'M009', 'V005', 'cap', '2026-04-01', '2026-12-31'),
(35, 'M003', 'V001', 'cam', '2026-04-01', '2026-10-31'),
(36, 'M004', 'V001', 'spo', '2026-04-01', '2026-10-31'),
(37, 'M006', 'V001', 'cuo', '2026-04-01', '2026-10-31'),
(38, 'M008', 'V001', 'rec', '2026-04-01', '2026-10-31'),
(39, 'M012', 'V001', 'mnt', '2026-04-01', '2026-10-31'),
(40, 'M014', 'V001', 'ani', '2026-04-01', '2026-10-31'),
(41, 'M015', 'V001', 'bag', '2026-04-01', '2026-10-31'),
(42, 'M016', 'V001', 'cam', '2026-04-01', '2026-10-31'),
(43, 'M018', 'V001', 'spo', '2026-04-01', '2026-10-31');

-- --------------------------------------------------------

--
-- Struttura della tabella `figura`
--

CREATE TABLE `figura` (
  `codice` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `figura`
--

INSERT INTO `figura` (`codice`, `descrizione`) VALUES
('ani', 'Animatore / Animatrice'),
('bag', 'Bagnino / Bagnina'),
('cam', 'Cameriere / Cameriera'),
('cap', 'Capovillaggio'),
('cuo', 'Cuoco / Cuoca'),
('mnt', 'Addetto manutenzione'),
('rec', 'Receptionist'),
('spo', 'Istruttore sportivo');

-- --------------------------------------------------------

--
-- Struttura della tabella `persona`
--

CREATE TABLE `persona` (
  `matricola` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cognome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascita` date NOT NULL,
  `madrelingua` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seconda_lingua` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `persona`
--

INSERT INTO `persona` (`matricola`, `cognome`, `nome`, `data_nascita`, `madrelingua`, `seconda_lingua`) VALUES
('M001', 'Rossi', 'Marco', '1990-03-15', 'italiano', 'inglese'),
('M002', 'Bianchi', 'Laura', '1988-07-22', 'italiano', 'francese'),
('M003', 'Ferrari', 'Davide', '1995-11-03', 'italiano', 'spagnolo'),
('M004', 'Conti', 'Sofia', '1992-05-18', 'italiano', 'tedesco'),
('M005', 'Gallo', 'Andrea', '1985-09-30', 'italiano', 'inglese'),
('M006', 'Ricci', 'Elena', '1993-01-25', 'italiano', 'russo'),
('M007', 'Martini', 'Luca', '1991-06-14', 'italiano', 'tedesco'),
('M008', 'Greco', 'Valentina', '1997-04-08', 'italiano', 'inglese'),
('M009', 'Bruno', 'Alessandro', '1989-12-20', 'italiano', 'francese'),
('M010', 'Romano', 'Chiara', '1994-08-11', 'italiano', 'spagnolo'),
('M011', 'Müller', 'Hans', '1987-02-17', 'tedesco', 'italiano'),
('M012', 'Schmidt', 'Erika', '1990-10-05', 'tedesco', 'inglese'),
('M013', 'Weber', 'Klaus', '1983-07-29', 'tedesco', 'francese'),
('M014', 'Fischer', 'Anna', '1996-03-12', 'tedesco', 'italiano'),
('M015', 'Dupont', 'Pierre', '1986-11-23', 'francese', 'tedesco'),
('M016', 'García', 'María', '1992-04-07', 'spagnolo', 'tedesco'),
('M017', 'Smith', 'James', '1988-09-16', 'inglese', 'italiano'),
('M018', 'Novak', 'Jana', '1994-06-30', 'ceco', 'tedesco'),
('M019', 'Pellegrini', 'Giulia', '1999-01-19', 'italiano', 'inglese'),
('M020', 'Fontana', 'Roberto', '1980-05-02', 'italiano', 'tedesco'),
('M2', 'a', 'a', '2026-04-22', '', 'a'),
('M3', 'b', 'b', '2026-04-09', '', 'b');

-- --------------------------------------------------------

--
-- Struttura della tabella `villaggio`
--

CREATE TABLE `villaggio` (
  `codice` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `denominazione` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localita` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `villaggio`
--

INSERT INTO `villaggio` (`codice`, `denominazione`, `localita`) VALUES
('V001', 'Villaggio Azzurro', 'Rimini'),
('V002', 'Club del Sole', 'Jesolo'),
('V003', 'Baia dei Pini', 'Vieste'),
('V004', 'Marina Resort', 'Tropea'),
('V005', 'Isolabella Village', 'Sardegna'),
('V006', 'Riviera degli Ulivi', 'Cefalù'),
('V007', 'Costa Smeralda Club', 'Porto Cervo');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `contratto`
--
ALTER TABLE `contratto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricola` (`matricola`),
  ADD KEY `codice_villaggio` (`codice_villaggio`),
  ADD KEY `codice_figura` (`codice_figura`);

--
-- Indici per le tabelle `figura`
--
ALTER TABLE `figura`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`matricola`);

--
-- Indici per le tabelle `villaggio`
--
ALTER TABLE `villaggio`
  ADD PRIMARY KEY (`codice`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `contratto`
--
ALTER TABLE `contratto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `contratto`
--
ALTER TABLE `contratto`
  ADD CONSTRAINT `contratto_ibfk_1` FOREIGN KEY (`matricola`) REFERENCES `persona` (`matricola`),
  ADD CONSTRAINT `contratto_ibfk_2` FOREIGN KEY (`codice_villaggio`) REFERENCES `villaggio` (`codice`),
  ADD CONSTRAINT `contratto_ibfk_3` FOREIGN KEY (`codice_figura`) REFERENCES `figura` (`codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
