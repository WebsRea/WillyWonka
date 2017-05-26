-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2017 a las 19:33:49
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
CREATE DATABASE bd_willy_wonka;

USE bd_willy_wonka; 
--
-- Estructura de tabla para la tabla `tbl_activitats`
--

CREATE TABLE `tbl_activitats` (
  `act_id` int(11) NOT NULL,
  `act_data_ini` date NOT NULL,
  `act_data_fi` date NOT NULL,
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
  `cla_curs` int(1) NOT NULL,
  `cla_foto` varchar(200) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tbl_familia`
--

CREATE TABLE `tbl_document` (
  `doc_id` int(11) NOT NULL,
  `doc_tipus` enum('circular','menu','documentacio_inicial') NOT NULL,
  `doc_nom` varchar(500) NOT NULL,
  `doc_ruta` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tbl_esdeveniments`
--

CREATE TABLE `tbl_esdeveniments` (
  `esd_id` int(11) NOT NULL,
  `esd_titol` varchar(100) NOT NULL,
  `esd_data_ini` date NOT NULL,
  `esd_data_fin` date NOT NULL,
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
  `obs_id` int(11) NULL,
  `cla_id` int(11) NULL
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
  `sto_nom` varchar(50) NOT NULL,
  `sto_foto` varchar(20) NOT NULL
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
  `mes_id` int (11) NULL,
  `cla_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `tbl_usuari`
--
CREATE TABLE `tbl_frase` (
`frase_id` int(11) NOT NULL,
`frase_text` varchar(100) NOT NULL,
`frase_data` date NOT NULL,
`usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Estructura de tabla para la tabla `tbl_usuari`
--
CREATE TABLE `tbl_img_cla` (
`imgCla_id` int(11) NOT NULL,
`imgCla_ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;







--
-- Indices de la tabla `tbl_activitats`
--
ALTER TABLE `tbl_activitats`
  ADD PRIMARY KEY (`act_id`);

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
  ADD PRIMARY KEY (`esd_id`);

--
-- Indices de la tabla `tbl_familia`
--
ALTER TABLE `tbl_familia`
  ADD PRIMARY KEY (`fam_id`);

--
-- Indices de la tabla `tbl_familia`
--
ALTER TABLE `tbl_frase`
  ADD PRIMARY KEY (`frase_id`);

--
-- Indices de la tabla `tbl_nen`
--
ALTER TABLE `tbl_nen`
  ADD PRIMARY KEY (`nen_id`);

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
  ADD PRIMARY KEY (`stonen_id`);

--
-- Indices de la tabla `tbl_suro`
--
ALTER TABLE `tbl_suro`
  ADD PRIMARY KEY (`sur_id`);

--
-- Indices de la tabla `tbl_usuari`
--
ALTER TABLE `tbl_usuari`
  ADD PRIMARY KEY (`usu_id`);

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
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_frase`
--
ALTER TABLE `tbl_frase`
  MODIFY `frase_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_nen`
--
ALTER TABLE `tbl_nen`
  MODIFY `nen_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Filtros para la tabla `tbl_activitats`
--
ALTER TABLE `tbl_activitats`
  ADD CONSTRAINT `FK_cla_id_1` FOREIGN KEY (`cla_id`) REFERENCES `tbl_classe` (`cla_id`);

--
-- Filtros para la tabla `tbl_familia`
--
ALTER TABLE `tbl_familia`
  ADD CONSTRAINT `FK_usu_id1` FOREIGN KEY (`usu_id1`) REFERENCES `tbl_usuari` (`usu_id`),
  ADD CONSTRAINT `FK_usu_id2` FOREIGN KEY (`usu_id2`) REFERENCES `tbl_usuari` (`usu_id`);

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

--
-- Filtros para la tabla `tbl_esdeveniments`
--
ALTER TABLE `tbl_esdeveniments`
  ADD CONSTRAINT `FK_usu_id_esd` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuari` (`usu_id`);

--
-- Filtros para la tabla `tbl_suro`
--
ALTER TABLE `tbl_frase`
  ADD CONSTRAINT `FK_usu_idfrase` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuari` (`usu_id`);



--
-- Volcado de datos para la tabla `tbl_usuari`
--

INSERT INTO `tbl_usuari` (`usu_id`, `usu_nom`, `usu_cognoms`, `usu_mail`, `usu_pass`, `usu_estat`, `usu_tipus`, `mes_id`, `cla_id`) VALUES
(1, 'Gladys', 'Gladys Wonka', 'wonkagladys@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', '1', 'admin', 'no', NULL);

--
--
-- Volcado de datos para la tabla `tbl_stock`
--
INSERT INTO `tbl_stock` (`sto_id`, `sto_nom`, `sto_foto`) 
  VALUES (NULL, 'Bolquers', '002-baby-1.png'), (NULL, 'Tovalloletes', '004-paper.png'), (NULL, 'Crema', '001-beauty.png'), (NULL, 'Mudes', '015-fashion-1.png'), (NULL, 'Pitets', '018-fashion.png'), (NULL, 'Xumets', '020-tool.png');
-- Índices para tablas volcadas
--

INSERT INTO `tbl_esdeveniments` (`esd_titol`, `esd_data_ini`, `esd_data_fin`, `esd_text`, `usu_id`) VALUES ('Dia del xocolata', '2017-10-02', '2017-10-06', 'Aquests dies celebrem el dia de la xocolata.', '1'), ('Castanyera', '2017-10-30', '2017-11-03', 'Celebrem la castanyada a la nostra llar.', '1'), ('Dia Steve Irwin', '2017-11-27', '2017-12-01', 'La seva preocupació pels animals ens inspira aquesta setmana.', '1'), ('Nadal', '2017-12-11', '2017-12-15', 'Celebrem el Nadal a la Llar.', '1'), ('Winter Light Festival', '2018-01-15', '2018-01-19', 'Aquesta setmana omplim de llum la llar.', '1'), ('Carnestoltes', '2018-02-05', '2018-02-09', 'Carnestoltes a la LLar.', '1'), ('Holi Festiva Jr', '2018-03-19', '2018-03-23', 'Ens agraden els colors!.', '1'), ('Sant Jordi', '2018-04-16', '2018-04-20', 'Llibre i roses, històries i contes.', '1'), ('Cultures del món', '2018-05-21', '2018-05-25', 'Celebrem la setmana de les cultures.', '1'), ('Festa de estiu' , '2018-06-18', '2018-06-21', 'Celebracions per donar la benvinguda a aquesta estació.', '1');

INSERT INTO `tbl_img_cla` (`imgCla_id`, `imgCla_ruta`) VALUES (NULL, 'bombons.png'), (NULL, 'bracets.png'), (NULL, 'chocolata.png'), (NULL, 'cireres.png'), (NULL, 'cupcake.png'), (NULL, 'merengue.png'), (NULL, 'nutella.png'), (NULL, 'ous.png'), (NULL, 'pastis.png'), (NULL, 'pometes.png');





/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;