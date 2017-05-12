-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2017 a las 17:52:44
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_willy_wonka`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_activitats`
--

CREATE TABLE `tbl_activitats` (
  `act_id` int(11) NOT NULL,
  `act_data` date NOT NULL,
  `act_titol` varchar(100) NOT NULL,
  `act_text` text NOT NULL,
  `cla_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_classe`
--

CREATE TABLE `tbl_classe` (
  `cla_id` int(11) NOT NULL,
  `cla_nom` varchar(100) NOT NULL,
  `cla_curs` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_classe`
--

INSERT INTO `tbl_classe` (`cla_id`, `cla_nom`, `cla_curs`) VALUES
(1, 'roigs', 0),
(2, 'verds', 1),
(3, 'grocs', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_document`
--

CREATE TABLE `tbl_document` (
  `doc_id` int(11) NOT NULL,
  `doc_tipus` enum('circular','menu','documentacio inicial') NOT NULL,
  `doc_nom` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_esdeveniments`
--

CREATE TABLE `tbl_esdeveniments` (
  `esd_id` int(11) NOT NULL,
  `esd_data` date NOT NULL,
  `esd_titol` varchar(100) NOT NULL,
  `esd_text` text NOT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_familia`
--

CREATE TABLE `tbl_familia` (
  `fam_id` int(11) NOT NULL,
  `usu_id1` int(11) NOT NULL,
  `usu_id2` int(11) NOT NULL,
  `fam_estat` enum('actiu','inactiu','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_familia`
--

INSERT INTO `tbl_familia` (`fam_id`, `usu_id1`, `usu_id2`, `fam_estat`) VALUES
(2, 2, 3, 'actiu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_frase`
--

CREATE TABLE `tbl_frase` (
  `frase_id` int(11) NOT NULL,
  `frase_text` varchar(100) NOT NULL,
  `frase_data` date NOT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nen`
--

CREATE TABLE `tbl_nen` (
  `nen_id` int(11) NOT NULL,
  `nen_nom` varchar(50) NOT NULL,
  `nen_cognoms` varchar(50) NOT NULL,
  `nen_data_naixement` date NOT NULL,
  `nen_alergies` varchar(500) NOT NULL,
  `nen_trastorns` varchar(500) NOT NULL,
  `nen_malaltia` varchar(500) NOT NULL,
  `nen_foto` varchar(500) NOT NULL,
  `fam_id` int(11) NOT NULL,
  `obs_id` int(11) NOT NULL,
  `cla_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_observacions`
--

CREATE TABLE `tbl_observacions` (
  `obs_id` int(11) NOT NULL,
  `obs_data` date NOT NULL,
  `obs_text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `sto_id` int(11) NOT NULL,
  `sto_nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_stock_nen`
--

CREATE TABLE `tbl_stock_nen` (
  `stonen_id` int(11) NOT NULL,
  `sto_id` int(11) NOT NULL,
  `nen_id` int(11) NOT NULL,
  `stonen_quantitat` enum('ple','alerta','escola','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_suro`
--

CREATE TABLE `tbl_suro` (
  `sur_id` int(11) NOT NULL,
  `sur_data` date NOT NULL,
  `sur_titol` varchar(100) NOT NULL,
  `sur_text` text NOT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuari`
--

CREATE TABLE `tbl_usuari` (
  `usu_id` int(11) NOT NULL,
  `usu_nom` varchar(50) NOT NULL,
  `usu_cognoms` varchar(100) NOT NULL,
  `usu_mail` varchar(100) NOT NULL,
  `usu_pass` varchar(1000) NOT NULL,
  `usu_estat` enum('actiu','inactiu','','') NOT NULL,
  `usu_tipus` enum('admin','mestre','tutor','') NOT NULL,
  `mes_id` int(11) DEFAULT NULL,
  `cla_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuari`
--

INSERT INTO `tbl_usuari` (`usu_id`, `usu_nom`, `usu_cognoms`, `usu_mail`, `usu_pass`, `usu_estat`, `usu_tipus`, `mes_id`, `cla_id`) VALUES
(1, 'Roger', 'Fusté Arroyo', 'rfuste18@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'admin', 0, NULL),
(2, 'Josep', 'Fuste Guillamón', 'jfuste@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'tutor', NULL, NULL),
(3, 'carme', 'arroyo pacheco', 'carroyo@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'tutor', NULL, NULL),
(4, 'Anna', 'Bordonaba Ridao', 'a@a.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'tutor', NULL, NULL),
(5, 'Roger', 'Fuste Arroyo', 'r@r.r', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'tutor', NULL, NULL),
(6, 'Yolanda', 'Arroyo Pacheco', 'yolan@y.y', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'mestre', NULL, NULL),
(7, 'tutor1', 'proba', '1@1.1', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'tutor', NULL, NULL),
(10, 'mestr1', 'mestre1 proba', 'me@me.me', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'tutor', NULL, NULL),
(11, 'mestreguay', 'niosdf', '1@1.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'tutor', NULL, NULL),
(12, 'sad', 'asd', '2@2.2', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'mestre', NULL, NULL),
(13, 'A', 'A', 'a@a.a1', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'mestre', NULL, 1),
(14, 'prova', 'fopdsinf', '22@22.22', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'actiu', 'mestre', NULL, NULL),
(15, 'sadsadas', 'dafds', '2@2.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'mestre', NULL, NULL),
(16, 'Roger', 'Fuste', 'rfuste18@tutor.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'tutor', NULL, NULL),
(17, 'Anna', 'Bordonaba Ridao', 'abordo@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'actiu', 'tutor', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_activitats`
--
ALTER TABLE `tbl_activitats`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `FK_cla_id_1` (`cla_id`);

--
-- Indices de la tabla `tbl_classe`
--
ALTER TABLE `tbl_classe`
  ADD PRIMARY KEY (`cla_id`);

--
-- Indices de la tabla `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indices de la tabla `tbl_esdeveniments`
--
ALTER TABLE `tbl_esdeveniments`
  ADD PRIMARY KEY (`esd_id`),
  ADD KEY `FK_usu_id_esd` (`usu_id`);

--
-- Indices de la tabla `tbl_familia`
--
ALTER TABLE `tbl_familia`
  ADD PRIMARY KEY (`fam_id`),
  ADD KEY `FK_usu_id1` (`usu_id1`),
  ADD KEY `FK_usu_id2` (`usu_id2`);

--
-- Indices de la tabla `tbl_frase`
--
ALTER TABLE `tbl_frase`
  ADD KEY `FK_usu_idfrase` (`usu_id`);

--
-- Indices de la tabla `tbl_nen`
--
ALTER TABLE `tbl_nen`
  ADD PRIMARY KEY (`nen_id`),
  ADD KEY `FK_fam_id` (`fam_id`),
  ADD KEY `FK_obs_id` (`obs_id`);

--
-- Indices de la tabla `tbl_observacions`
--
ALTER TABLE `tbl_observacions`
  ADD PRIMARY KEY (`obs_id`);

--
-- Indices de la tabla `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`sto_id`);

--
-- Indices de la tabla `tbl_stock_nen`
--
ALTER TABLE `tbl_stock_nen`
  ADD PRIMARY KEY (`stonen_id`),
  ADD KEY `FK_nen_id` (`nen_id`),
  ADD KEY `FK_sto_id` (`sto_id`);

--
-- Indices de la tabla `tbl_suro`
--
ALTER TABLE `tbl_suro`
  ADD PRIMARY KEY (`sur_id`),
  ADD KEY `FK_usu_id` (`usu_id`);

--
-- Indices de la tabla `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `FK_cla_id` (`cla_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_activitats`
--
ALTER TABLE `tbl_activitats`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_classe`
--
ALTER TABLE `tbl_classe`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_esdeveniments`
--
ALTER TABLE `tbl_esdeveniments`
  MODIFY `esd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_familia`
--
ALTER TABLE `tbl_familia`
  MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_nen`
--
ALTER TABLE `tbl_nen`
  MODIFY `nen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_observacions`
--
ALTER TABLE `tbl_observacions`
  MODIFY `obs_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `sto_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_stock_nen`
--
ALTER TABLE `tbl_stock_nen`
  MODIFY `stonen_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_suro`
--
ALTER TABLE `tbl_suro`
  MODIFY `sur_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_activitats`
--
ALTER TABLE `tbl_activitats`
  ADD CONSTRAINT `FK_cla_id_1` FOREIGN KEY (`cla_id`) REFERENCES `tbl_classe` (`cla_id`);

--
-- Filtros para la tabla `tbl_esdeveniments`
--
ALTER TABLE `tbl_esdeveniments`
  ADD CONSTRAINT `FK_usu_id_esd` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuari` (`usu_id`);

--
-- Filtros para la tabla `tbl_familia`
--
ALTER TABLE `tbl_familia`
  ADD CONSTRAINT `FK_usu_id1` FOREIGN KEY (`usu_id1`) REFERENCES `tbl_usuari` (`usu_id`),
  ADD CONSTRAINT `FK_usu_id2` FOREIGN KEY (`usu_id2`) REFERENCES `tbl_usuari` (`usu_id`);

--
-- Filtros para la tabla `tbl_frase`
--
ALTER TABLE `tbl_frase`
  ADD CONSTRAINT `FK_usu_idfrase` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuari` (`usu_id`);

--
-- Filtros para la tabla `tbl_nen`
--
ALTER TABLE `tbl_nen`
  ADD CONSTRAINT `FK_fam_id` FOREIGN KEY (`fam_id`) REFERENCES `tbl_familia` (`fam_id`),
  ADD CONSTRAINT `FK_obs_id` FOREIGN KEY (`obs_id`) REFERENCES `tbl_observacions` (`obs_id`);

--
-- Filtros para la tabla `tbl_stock_nen`
--
ALTER TABLE `tbl_stock_nen`
  ADD CONSTRAINT `FK_nen_id` FOREIGN KEY (`nen_id`) REFERENCES `tbl_nen` (`nen_id`),
  ADD CONSTRAINT `FK_sto_id` FOREIGN KEY (`sto_id`) REFERENCES `tbl_stock` (`sto_id`);

--
-- Filtros para la tabla `tbl_suro`
--
ALTER TABLE `tbl_suro`
  ADD CONSTRAINT `FK_usu_id` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuari` (`usu_id`);

--
-- Filtros para la tabla `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  ADD CONSTRAINT `FK_cla_id` FOREIGN KEY (`cla_id`) REFERENCES `tbl_classe` (`cla_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
