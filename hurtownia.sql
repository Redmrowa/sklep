-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Sty 2022, 19:19
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `hurtownia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `Id_kategorii` int(6) UNSIGNED NOT NULL,
  `nazwa_kategorii` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`Id_kategorii`, `nazwa_kategorii`) VALUES
(1, 'płyty OSB'),
(2, 'łączniki'),
(3, 'kołki'),
(4, 'płyty gipsowo-włókno'),
(5, 'profile sufitowe'),
(6, 'płyty gipsowe'),
(7, 'pędzle');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `ID_koszyka` int(6) UNSIGNED NOT NULL,
  `nazwa_koszyk` varchar(20) DEFAULT NULL,
  `cena_koszyk` int(10) DEFAULT NULL,
  `ilosc_koszyk` int(10) DEFAULT NULL,
  `nazwa_sesji` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(6) UNSIGNED NOT NULL,
  `kategoria_id` int(6) NOT NULL,
  `nazwa` varchar(30) NOT NULL,
  `cena` float NOT NULL,
  `ilosc_produktow` int(10) NOT NULL,
  `opis` varchar(250) DEFAULT NULL,
  `zdjecie` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `kategoria_id`, `nazwa`, `cena`, `ilosc_produktow`, `opis`, `zdjecie`) VALUES
(1, 1, 'Płyta OSB-3 12 mm 2500mm x 125', 55, 1007, 'Płyty OSB3 ze względu na odporność na działanie wilgoci zawartej w powietrzu, niską nasiąkliwość i pęcznienie szczególnie nadaje się do budowy budynków w technologii szkieletowej. Posiada odpowiednie parametry techniczne w zakresie wytrzymałości gwar', 'sql\\osb.jpeg'),
(2, 1, 'Płyta OSB-3 15 mm 2500mm x 125', 65, 423, 'Płyty OSB3 ze względu na odporność na działanie wilgoci zawartej w powietrzu, niską nasiąkliwość i pęcznienie szczególnie nadaje się do budowy budynków w technologii szkieletowej. Posiada odpowiednie parametry techniczne w zakresie wytrzymałości gwar', 'sql/osb.jpeg'),
(3, 1, 'Płyta OSB-3 18 mm 2500mm x 125', 82, 237, 'Płyty OSB3 ze względu na odporność na działanie wilgoci zawartej w powietrzu, niską nasiąkliwość i pęcznienie szczególnie nadaje się do budowy budynków w technologii szkieletowej. Posiada odpowiednie parametry techniczne w zakresie wytrzymałości gwar', 'sql/osb.jpeg'),
(4, 6, 'Płyta gipsowa woda GKB I 120x2', 25, 330, 'Płyty stosuje się do wykonania przegród budowlanych posiadających określoną odporność wodoodporną.', 'sql/plyta biala.gif'),
(5, 6, 'Płyta gipsowa ogień GKF 120x26', 20, 316, 'Płyty stosuje się do wykonania przegród budowlanych posiadających określoną odporność wodoodporną.', 'sql/plyta biala.gif'),
(6, 5, 'Profil sufitowy CD60 / 3mb suf', 6, 900, 'Grubość ścianki profilu, minimum 0,5 mm, zabezpieczenie antykorozyjne, cynk', 'sql/cd.jpg'),
(7, 5, 'Profil sufitowy CD60 / 4mb suf', 8, 250, 'Grubość ścianki profilu, minimum 0,5 mm, zabezpieczenie antykorozyjne, cynk', 'sql/cd.jpg'),
(8, 4, 'Płyta gipsowo-włóknowa Fireboa', 115, 896, 'Płyty Fireboard używane są do wykonywania okładzin ścian i sufitów, ścian działowych i sufitów podwieszanych', 'sql/plyta_Fireboard.jpg'),
(9, 4, 'Płyta gipsowo-włóknowa Fireboa', 130, 894, 'Płyty stosuje się do wykonania przegród budowlanych posiadających określoną odporność wodoodporną.', 'sql/plyta_Fireboard.jpg'),
(10, 7, 'Pędzel angielski płaski 1,5 cz', 2.5, 1010, 'Nadaje się szczególnie do pracy z farbami i lakierami na bazie rozpuszczalników. Zapewnia  pełniejsze i gładsze pokrycie powierzchni.', 'sql/fd00a6ac4661dd28fa01c478cfc1d397.jfif'),
(11, 7, 'Pędzel angielski płaski 2,5 cz', 3.8, 900, 'Nadaje się szczególnie do pracy z farbami i lakierami na bazie rozpuszczalników. Zapewnia  pełniejsze i gładsze pokrycie powierzchni.', 'sql/fd00a6ac4661dd28fa01c478cfc1d397.jfif'),
(12, 3, 'Kołki rozporowe ramowe przetyk', 24.8, 900, 'Kołek rozporowy ramowy przetykowy z wkrętem do drewna z łbem sześciokątnym 10x100', 'sql/c18898fd0161cccd7690ad6c9fa3b2db.jfif'),
(13, 3, 'Kołki rozporowe ramowe przetyk', 28.3, 855, 'Kołek rozporowy ramowy przetykowy z wkrętem do drewna z łbem sześciokątnym 10x115', 'sql/c18898fd0161cccd7690ad6c9fa3b2db.jfif'),
(14, 3, 'Kołki rozporowe ramowe przetyk', 32.6, 900, 'Kołek rozporowy ramowy przetykowy z wkrętem do drewna z łbem sześciokątnym 10x130', 'sql/c18898fd0161cccd7690ad6c9fa3b2db.jfif'),
(15, 2, 'Łącznik kątowy 40x40x20', 0.5, 894, 'Łącznik ciesielski do drewna, blacha cynk a= 40, b= 40, c= 20', 'sql/0ad3cad39896a86cb0fd4e46bf33d071.jfif'),
(16, 2, 'Łącznik kątowy 40x40x50', 0.8, 1000, 'Łącznik ciesielski do drewna, blacha cynk a= 40, b= 40, c= 50', 'sql/0ad3cad39896a86cb0fd4e46bf33d071.jfif');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sesje`
--

CREATE TABLE `sesje` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_sesji` varchar(100) NOT NULL,
  `id_produktu` int(6) DEFAULT NULL,
  `ilosc` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sesje`
--

INSERT INTO `sesje` (`id`, `id_sesji`, `id_produktu`, `ilosc`) VALUES
(1, '', 0, 0),
(48, 'asLEOyzYbx', 0, 0),
(54, 'TsiWiAUyIv', 0, 0),
(55, 'lcorzdwjkO', 0, 0),
(58, 'lcorzdwjkO', 10, 3),
(59, 'lcorzdwjkO', 15, 2),
(60, 'lcorzdwjkO', 12, 2),
(61, 'lcorzdwjkO', 12, 2),
(62, 'lcorzdwjkO', 12, 3),
(63, 'kHOXnsBSuq', 0, 0),
(67, 'QSyvmzJOyK', 0, 0),
(74, 'RGcPFOIuuZ', 0, 0),
(75, 'MHwMgcyBKG', 0, 0),
(76, 'txUnwTNbex', 0, 0),
(77, 'PywNJIyZQF', 0, 0),
(78, 'PywNJIyZQF', 3, 3),
(79, 'PywNJIyZQF', 3, 3),
(80, 'PywNJIyZQF', 2, 3),
(81, 'PywNJIyZQF', 2, 3),
(82, 'PywNJIyZQF', 2, 3),
(83, 'PywNJIyZQF', 6, 3),
(84, 'PywNJIyZQF', 1, 2),
(85, 'PywNJIyZQF', 8, 3),
(86, 'PywNJIyZQF', 8, 3),
(87, 'PywNJIyZQF', 8, 3),
(88, 'PywNJIyZQF', 8, 3),
(89, 'PywNJIyZQF', 8, 3),
(90, 'PywNJIyZQF', 8, 3),
(91, 'PywNJIyZQF', 8, 3),
(92, 'PywNJIyZQF', 8, 3),
(93, 'PywNJIyZQF', 8, 3),
(94, 'PywNJIyZQF', 8, 3),
(95, 'PywNJIyZQF', 8, 3),
(96, 'PywNJIyZQF', 8, 3),
(97, 'PywNJIyZQF', 8, 3),
(98, 'PywNJIyZQF', 8, 3),
(99, 'PywNJIyZQF', 8, 3),
(100, 'PywNJIyZQF', 15, 5),
(101, 'PywNJIyZQF', 15, 5),
(102, 'PywNJIyZQF', 15, 5),
(103, 'PywNJIyZQF', 15, 5),
(104, 'PywNJIyZQF', 15, 5),
(105, 'PywNJIyZQF', 15, 5),
(106, 'PywNJIyZQF', 15, 5),
(107, 'PywNJIyZQF', 15, 5),
(108, 'PywNJIyZQF', 15, 5),
(109, 'PywNJIyZQF', 15, 5),
(110, 'PywNJIyZQF', 15, 5),
(111, 'PywNJIyZQF', 15, 5),
(112, 'PywNJIyZQF', 15, 5),
(113, 'PywNJIyZQF', 15, 5),
(114, 'PywNJIyZQF', 15, 5),
(115, 'PywNJIyZQF', 15, 5),
(116, 'PywNJIyZQF', 15, 5),
(117, 'PywNJIyZQF', 15, 5),
(118, 'PywNJIyZQF', 15, 5),
(119, 'PywNJIyZQF', 15, 5),
(120, 'PywNJIyZQF', 15, 5),
(121, 'PywNJIyZQF', 15, 5),
(122, 'PywNJIyZQF', 15, 5),
(123, 'PywNJIyZQF', 15, 5),
(124, 'PywNJIyZQF', 15, 5),
(125, 'djsKDFnvRZ', 0, 0),
(126, 'MhyYUawasO', 0, 0),
(127, 'MNaHMultBn', 0, 0),
(128, 'uyIHiAgccx', 0, 0),
(130, 'KmJImmVGWs', 0, 0),
(131, 'PAQGxJEYHv', 0, 0),
(135, 'PAQGxJEYHv', 1, 3),
(136, 'pwqTyVFPUA', 0, 0),
(137, 'oIEuCtJHyF', 0, 0),
(138, 'SbKrauCPpl', 0, 0),
(141, 'EtMiGLXsJC', 0, 0),
(142, 'UjYgnUaKgB', 0, 0),
(147, 'UjYgnUaKgB', 1, 5),
(148, 'IjPhnhOHsb', 0, 0),
(149, 'WkZdNmwvwA', 0, 0),
(153, 'hBuLdITFlF', 0, 0),
(155, 'psBcYeMyWE', 0, 0),
(157, 'nPZwYBmdVs', 0, 0),
(163, 'bqgOspAQUW', 0, 0),
(166, 'bqgOspAQUW', 2, 7),
(167, 'bqgOspAQUW', 3, 5),
(168, 'bqgOspAQUW', 1, 6),
(169, 'bqgOspAQUW', 14, 5),
(170, 'fUqYWVWDgt', 0, 0),
(171, 'bKgqbFnOJL', 0, 0),
(172, 'bKgqbFnOJL', 2, 5),
(173, 'AFypeqcKqf', 0, 0),
(174, 'dluZbwtREr', 0, 0),
(175, 'dluZbwtREr', 1, 4),
(176, 'FrhnWUwquM', 0, 0),
(177, 'KSAhgvKxPr', 0, 0),
(178, 'KSAhgvKxPr', 6, 5),
(179, 'KSAhgvKxPr', 3, 4),
(180, 'KSAhgvKxPr', 8, 5),
(181, 'fmDyiTMnHX', 0, 0),
(182, 'fmDyiTMnHX', 6, 4),
(183, 'OxgfaJTHJy', 0, 0),
(184, 'JepEjcrASb', 0, 0),
(185, 'PvOkPiGUyP', 0, 0),
(186, 'PvOkPiGUyP', 1, 5),
(187, 'qTSJHKaDjv', 0, 0),
(188, 'qTSJHKaDjv', 1, 4),
(189, 'qTSJHKaDjv', 13, 4),
(190, 'vkiuRpikCl', 0, 0),
(191, 'vkiuRpikCl', 2, 3),
(192, 'vkiuRpikCl', 2, 2),
(193, 'vkiuRpikCl', 13, 3),
(194, 'vkiuRpikCl', 1, 2),
(195, 'vkiuRpikCl', 2, 1),
(196, 'vkiuRpikCl', 2, 3),
(197, 'vkiuRpikCl', 1, 3),
(198, 'vkiuRpikCl', 2, 2),
(199, 'vkiuRpikCl', 13, 6),
(200, 'vkiuRpikCl', 2, 3),
(201, 'vkiuRpikCl', 9, 5),
(202, 'zDMxTUbRwF', 0, 0),
(203, 'TlSXKKmlIB', 0, 0),
(204, 'TlSXKKmlIB', 3, 4),
(205, 'kLFWGMxzRC', 0, 0),
(206, 'kOwlzaGDDK', 0, 0),
(207, 'hQlodzsQnU', 0, 0),
(208, 'WOrgvHSlOE', 0, 0),
(209, 'tsKYIFCMgZ', 0, 0),
(210, 'uHefafxwjO', 0, 0),
(211, 'uHefafxwjO', 2, 9),
(212, 'uHefafxwjO', 14, 9),
(213, 'EdhsZhfIGV', 0, 0),
(214, 'SwwFKdpQaq', 0, 0),
(215, 'AXjOYslIBE', 0, 0),
(216, 'HyduLbgLDP', 0, 0),
(217, 'HyduLbgLDP', 13, 3),
(218, 'lKuHPBTDCV', 0, 0),
(219, 'ufSZJrCutG', 0, 0),
(220, 'qdOSfflqOY', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sesje_czyszcz`
--

CREATE TABLE `sesje_czyszcz` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_sesji` varchar(100) NOT NULL,
  `id_produktu` int(6) DEFAULT NULL,
  `ilosc` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sesje_czyszcz`
--

INSERT INTO `sesje_czyszcz` (`id`, `id_sesji`, `id_produktu`, `ilosc`) VALUES
(0, 'TlSXKKmlIB', 3, 4),
(1, '', 0, 0),
(48, 'asLEOyzYbx', 0, 0),
(54, 'TsiWiAUyIv', 0, 0),
(55, 'lcorzdwjkO', 0, 0),
(58, 'lcorzdwjkO', 10, 3),
(59, 'lcorzdwjkO', 15, 2),
(60, 'lcorzdwjkO', 12, 2),
(61, 'lcorzdwjkO', 12, 2),
(62, 'lcorzdwjkO', 12, 3),
(63, 'kHOXnsBSuq', 0, 0),
(67, 'QSyvmzJOyK', 0, 0),
(74, 'RGcPFOIuuZ', 0, 0),
(75, 'MHwMgcyBKG', 0, 0),
(76, 'txUnwTNbex', 0, 0),
(77, 'PywNJIyZQF', 0, 0),
(78, 'PywNJIyZQF', 3, 3),
(79, 'PywNJIyZQF', 3, 3),
(80, 'PywNJIyZQF', 2, 3),
(81, 'PywNJIyZQF', 2, 3),
(82, 'PywNJIyZQF', 2, 3),
(83, 'PywNJIyZQF', 6, 3),
(84, 'PywNJIyZQF', 1, 2),
(85, 'PywNJIyZQF', 8, 3),
(86, 'PywNJIyZQF', 8, 3),
(87, 'PywNJIyZQF', 8, 3),
(88, 'PywNJIyZQF', 8, 3),
(89, 'PywNJIyZQF', 8, 3),
(90, 'PywNJIyZQF', 8, 3),
(91, 'PywNJIyZQF', 8, 3),
(92, 'PywNJIyZQF', 8, 3),
(93, 'PywNJIyZQF', 8, 3),
(94, 'PywNJIyZQF', 8, 3),
(95, 'PywNJIyZQF', 8, 3),
(96, 'PywNJIyZQF', 8, 3),
(97, 'PywNJIyZQF', 8, 3),
(98, 'PywNJIyZQF', 8, 3),
(99, 'PywNJIyZQF', 8, 3),
(100, 'PywNJIyZQF', 15, 5),
(101, 'PywNJIyZQF', 15, 5),
(102, 'PywNJIyZQF', 15, 5),
(103, 'PywNJIyZQF', 15, 5),
(104, 'PywNJIyZQF', 15, 5),
(105, 'PywNJIyZQF', 15, 5),
(106, 'PywNJIyZQF', 15, 5),
(107, 'PywNJIyZQF', 15, 5),
(108, 'PywNJIyZQF', 15, 5),
(109, 'PywNJIyZQF', 15, 5),
(110, 'PywNJIyZQF', 15, 5),
(111, 'PywNJIyZQF', 15, 5),
(112, 'PywNJIyZQF', 15, 5),
(113, 'PywNJIyZQF', 15, 5),
(114, 'PywNJIyZQF', 15, 5),
(115, 'PywNJIyZQF', 15, 5),
(116, 'PywNJIyZQF', 15, 5),
(117, 'PywNJIyZQF', 15, 5),
(118, 'PywNJIyZQF', 15, 5),
(119, 'PywNJIyZQF', 15, 5),
(120, 'PywNJIyZQF', 15, 5),
(121, 'PywNJIyZQF', 15, 5),
(122, 'PywNJIyZQF', 15, 5),
(123, 'PywNJIyZQF', 15, 5),
(124, 'PywNJIyZQF', 15, 5),
(125, 'djsKDFnvRZ', 0, 0),
(126, 'MhyYUawasO', 0, 0),
(127, 'MNaHMultBn', 0, 0),
(128, 'uyIHiAgccx', 0, 0),
(130, 'KmJImmVGWs', 0, 0),
(131, 'PAQGxJEYHv', 0, 0),
(135, 'PAQGxJEYHv', 1, 3),
(136, 'pwqTyVFPUA', 0, 0),
(137, 'oIEuCtJHyF', 0, 0),
(138, 'SbKrauCPpl', 0, 0),
(141, 'EtMiGLXsJC', 0, 0),
(142, 'UjYgnUaKgB', 0, 0),
(147, 'UjYgnUaKgB', 1, 5),
(148, 'IjPhnhOHsb', 0, 0),
(149, 'WkZdNmwvwA', 0, 0),
(153, 'hBuLdITFlF', 0, 0),
(155, 'psBcYeMyWE', 0, 0),
(157, 'nPZwYBmdVs', 0, 0),
(163, 'bqgOspAQUW', 0, 0),
(166, 'bqgOspAQUW', 2, 7),
(167, 'bqgOspAQUW', 3, 5),
(168, 'bqgOspAQUW', 1, 6),
(169, 'bqgOspAQUW', 14, 5),
(170, 'fUqYWVWDgt', 0, 0),
(171, 'bKgqbFnOJL', 0, 0),
(172, 'bKgqbFnOJL', 2, 5),
(173, 'AFypeqcKqf', 0, 0),
(174, 'dluZbwtREr', 0, 0),
(175, 'dluZbwtREr', 1, 4),
(176, 'FrhnWUwquM', 0, 0),
(177, 'KSAhgvKxPr', 0, 0),
(178, 'KSAhgvKxPr', 6, 5),
(179, 'KSAhgvKxPr', 3, 4),
(180, 'KSAhgvKxPr', 8, 5),
(181, 'fmDyiTMnHX', 0, 0),
(182, 'fmDyiTMnHX', 6, 4),
(183, 'OxgfaJTHJy', 0, 0),
(184, 'JepEjcrASb', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sesje_uzytkownik`
--

CREATE TABLE `sesje_uzytkownik` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_sesji_var` varchar(100) NOT NULL,
  `login` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sesje_uzytkownik`
--

INSERT INTO `sesje_uzytkownik` (`id`, `id_sesji_var`, `login`) VALUES
(0, 'bqgOspAQUW', 'dupa12'),
(0, 'dluZbwtREr', 'FirmaX'),
(0, 'FrhnWUwquM', 'dupa123'),
(0, 'KSAhgvKxPr', 'dupa123'),
(0, 'fmDyiTMnHX', 'dupa123'),
(0, 'OxgfaJTHJy', 'FirmaX'),
(0, 'JepEjcrASb', 'dupa123'),
(0, 'PvOkPiGUyP', 'FirmaX'),
(0, 'qTSJHKaDjv', 'dupa123'),
(0, 'vkiuRpikCl', 'dupa123'),
(0, 'zDMxTUbRwF', 'FirmaX'),
(0, 'TlSXKKmlIB', 'FirmaX'),
(0, 'kLFWGMxzRC', 'FirmaX'),
(0, 'kOwlzaGDDK', 'Admin'),
(0, 'hQlodzsQnU', 'FirmaX'),
(0, 'WOrgvHSlOE', 'Admin'),
(0, 'tsKYIFCMgZ', 'Admin'),
(0, 'uHefafxwjO', 'FirmaX'),
(0, 'EdhsZhfIGV', 'Admin'),
(0, 'SwwFKdpQaq', 'test3'),
(0, 'AXjOYslIBE', 'Admin'),
(0, 'HyduLbgLDP', 'test3'),
(0, 'lKuHPBTDCV', 'Admin'),
(0, 'ufSZJrCutG', 'test3'),
(0, 'qdOSfflqOY', 'Admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `ID_uzytkownicy` int(6) UNSIGNED NOT NULL,
  `uzytkownik` varchar(30) NOT NULL,
  `haslo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`ID_uzytkownicy`, `uzytkownik`, `haslo`) VALUES
(1, 'FirmaX', 'root'),
(3, 'aaaaa', 'aaaaa'),
(4, 'qqqqq', 'qqqqq'),
(5, 'dupa123', '12345'),
(6, 'Zajecia', 'qwerty'),
(7, 'Admin', '$2y$10$f3d/CafIipjmlEfRegzZFeRstxc148JoKEp8bAs6GWzHl/Kh26wxa'),
(8, 'test', '$2y$10$wDp5gCbyaa/BSaF1.LGVxei'),
(9, 'test2', '$2y$10$apSAb6/7kFMq7M3qlF8RX.9'),
(10, 'test3', '$2y$10$K4LuUlbz8fjaO0NB44TqYe.fNPB9182PG8fuobMiSDHkl/T7YllEG');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_sesji` varchar(100) NOT NULL,
  `id_produktu` int(6) DEFAULT NULL,
  `ilosc` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`Id_kategorii`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`ID_koszyka`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sesje`
--
ALTER TABLE `sesje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sesje_czyszcz`
--
ALTER TABLE `sesje_czyszcz`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`ID_uzytkownicy`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `Id_kategorii` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `ID_koszyka` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT dla tabeli `sesje`
--
ALTER TABLE `sesje`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `ID_uzytkownicy` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
