-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2017 a las 18:01:11
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
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adm_id` int(11) NOT NULL,
  `adm_nombre` varchar(50) NOT NULL,
  `adm_apellidos` varchar(100) NOT NULL,
  `adm_mail` varchar(100) NOT NULL,
  `adm_pass` varchar(1000) NOT NULL,
  `adm_estat` enum('actiu','inactiu','','') NOT NULL,
  `mes_id` int(11) DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_esdeveniments`
--

CREATE TABLE `tbl_esdeveniments` (
  `esd_id` int(11) NOT NULL,
  `esd_data` date NOT NULL,
  `esd_titol` varchar(100) NOT NULL,
  `esd_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_familia`
--

CREATE TABLE `tbl_familia` (
  `fam_id` int(11) NOT NULL,
  `tut_id_1` int(11) NOT NULL,
  `tut_id_2` int(11) NOT NULL,
  `fam_estat` enum('actiu','inactiu','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mestre`
--

CREATE TABLE `tbl_mestre` (
  `mes_id` int(11) NOT NULL,
  `mes_nombre` varchar(50) NOT NULL,
  `mes_apellidos` varchar(100) NOT NULL,
  `mes_mail` varchar(100) NOT NULL,
  `mes_pass` varchar(1000) NOT NULL,
  `mes_estat` enum('actiu','inactiu','','') NOT NULL,
  `cla_id` int(11) NOT NULL
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
  `obs_id` int(11) NOT NULL
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
  `tut_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipus_usuari`
--

CREATE TABLE `tbl_tipus_usuari` (
  `tip_id` int(11) NOT NULL,
  `tip_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tutor`
--

CREATE TABLE `tbl_tutor` (
  `tut_id` int(11) NOT NULL,
  `tut_nom` varchar(50) NOT NULL,
  `tut_cognom` varchar(100) NOT NULL,
  `tut_mail` varchar(100) NOT NULL,
  `tut_pass` varchar(1000) NOT NULL,
  `tut_estat` enum('actiu','inactiu','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_activitats`
--
ALTER TABLE `tbl_activitats`
  ADD PRIMARY KEY (`act_id`);

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indices de la tabla `tbl_classe`
--
ALTER TABLE `tbl_classe`
  ADD PRIMARY KEY (`cla_id`);

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
-- Indices de la tabla `tbl_mestre`
--
ALTER TABLE `tbl_mestre`
  ADD PRIMARY KEY (`mes_id`);

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
-- Indices de la tabla `tbl_tipus_usuari`
--
ALTER TABLE `tbl_tipus_usuari`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indices de la tabla `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  ADD PRIMARY KEY (`tut_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_activitats`
--
ALTER TABLE `tbl_activitats`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_classe`
--
ALTER TABLE `tbl_classe`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `tbl_mestre`
--
ALTER TABLE `tbl_mestre`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  MODIFY `tut_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
