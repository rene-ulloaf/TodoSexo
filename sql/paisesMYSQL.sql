-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 06-01-2010 a las 09:12:44
-- Versión del servidor: 6.0.4
-- Versión de PHP: 6.0.0-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `todosexo`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`)
-- 

CREATE TABLE `paises` (
  `idPais` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `idioma` smallint(6) NOT NULL,
  `gentilicioMasc` varchar(50) NOT NULL,
  `gentilicioFem` varchar(50) NOT NULL,
  `bandera` varchar(150) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=218 ;

-- 
-- Volcar la base de datos para la tabla todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`)
-- 

INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (1, 'Afganistan', 0, 'Afgano', 'Afgana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (2, 'Albania', 0, 'Albano', 'Albana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (3, 'Alemania', 0, 'Aleman', 'Alemana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (4, 'Andorra', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (5, 'Angola', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (6, 'Antigua y Barbuda', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (7, 'Antillas Holandesas', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (8, 'Arabia Saudita', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (9, 'Argelia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (10, 'Argentina', 1, 'Argentino', 'Argentina', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (11, 'Armenia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (12, 'Aruba', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (13, 'Australia', 0, 'Australiano', 'Australiana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (14, 'Austria', 0, 'Austriaco', 'Austriaca', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (15, 'Azerbaijan', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (16, 'Bahamas', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (17, 'Bahrain', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (18, 'Bangladesh', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (19, 'Barbados', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (20, 'Belarusia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (21, 'Belgica', 0, 'Belga', 'Belga', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (22, 'Belice', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (23, 'Benin', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (24, 'Bermudas', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (25, 'Bolivia', 1, 'Boliaviano', 'Boliaviana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (26, 'Bosnia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (27, 'Botswana', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (28, 'Brasil', 0, 'Brasileño', 'Brasileña', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (29, 'Brunei Darussulam', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (30, 'Bulgaria', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (31, 'Burkina Faso', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (32, 'Burundi', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (33, 'Butan', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (34, 'Camboya', 0, 'Camboyano', 'Camboyana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (35, 'Camerun', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (36, 'Canada', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (37, 'Cape Verde', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (38, 'Chad', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (39, 'Chile', 1, 'Chileno', 'Chilena', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (40, 'China', 0, 'Chino', 'China', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (41, 'Chipre', 0, 'Chipriota', 'Chipriota', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (42, 'Colombia', 1, 'Colombiano', 'Colombiana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (43, 'Comoros', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (44, 'Congo', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (45, 'Corea del Norte', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (46, 'Corea del Sur', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (47, 'Costa de Marfíl', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (48, 'Costa Rica', 1, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (49, 'Croasia', 0, 'Croata', 'Croata', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (50, 'Cuba', 1, 'Cubano', 'Cubana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (51, 'Dinamarca', 0, 'Danés', 'Danesa', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (52, 'Djibouti', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (53, 'Dominica', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (54, 'Ecuador', 1, 'Ecuatoriano', 'Ecuatoriana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (55, 'Egipto', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (56, 'El Salvador', 1, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (57, 'Emiratos Arabes Unidos', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (58, 'Eritrea', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (59, 'Eslovenia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (60, 'España', 1, 'Español', 'Española', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (61, 'Estados Unidos', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (62, 'Estonia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (63, 'Etiopia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (64, 'Fiji', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (65, 'Filipinas', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (66, 'Finlandia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (67, 'Francia', 0, 'Francés', 'Francesa', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (68, 'Gabon', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (69, 'Gambia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (70, 'Georgia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (71, 'Ghana', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (72, 'Granada', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (73, 'Grecia', 0, 'Griego', 'Griega', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (74, 'Groenlandia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (75, 'Guadalupe', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (76, 'Guam', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (77, 'Guatemala', 1, 'Guatemalteco', 'Guatemalteca', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (78, 'Guayana Francesa', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (79, 'Guerney', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (80, 'Guinea', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (81, 'Guinea-Bissau', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (82, 'Guinea Equatorial', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (83, 'Guyana', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (84, 'Haiti', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (85, 'Holanda', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (86, 'Honduras', 0, 'Holandés', 'Holandesa', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (87, 'Hong Kong', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (88, 'Hungria', 0, 'Húngaro', 'Húngara', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (89, 'India', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (90, 'Indonesia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (91, 'Irak', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (92, 'Iran', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (93, 'Irlanda', 0, 'Irlandés', 'Irlandesa', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (94, 'Islandia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (95, 'Islas Caiman', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (96, 'Islas Faroe', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (97, 'Islas Malvinas', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (98, 'Islas Marshall', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (99, 'Islas Solomon', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (100, 'Islas Virgenes Britanicas', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (101, 'Islas Virgenes (U.S.)', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (102, 'Israel', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (103, 'Italia', 0, 'Italiano', 'Italiana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (104, 'Jamaica', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (105, 'Japon', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (106, 'Jersey', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (107, 'Jordania', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (108, 'Kazakhstan', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (109, 'Kenia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (110, 'Kiribati', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (111, 'Kuwait', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (112, 'Kyrgyzstan', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (113, 'Laos', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (114, 'Latvia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (115, 'Lesotho', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (116, 'Libano', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (117, 'Liberia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (118, 'Libia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (119, 'Liechtenstein', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (120, 'Lituania', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (121, 'Luxemburgo', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (122, 'Macao', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (123, 'Macedonia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (124, 'Madagascar', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (125, 'Malasia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (126, 'Malawi', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (127, 'Maldivas', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (128, 'Mali', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (129, 'Malta', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (130, 'Marruecos', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (131, 'Martinica', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (132, 'Mauricio', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (133, 'Mauritania', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (134, 'Mexico', 1, 'Mexicano', 'Mexicana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (135, 'Micronesia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (136, 'Moldova', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (137, 'Monaco', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (138, 'Mongolia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (139, 'Mozambique', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (140, 'Myanmar (Burma)', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (141, 'Namibia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (142, 'Nepal', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (143, 'Nicaragua', 1, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (144, 'Niger', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (145, 'Nigeria', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (146, 'Noruega', 0, 'Noruego', 'Noruega', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (147, 'Nueva Caledonia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (148, 'Nueva Zealandia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (149, 'Oman', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (150, 'Pakistan', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (151, 'Palestina', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (152, 'Panama', 1, 'Panameño', 'Panameña', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (153, 'Papua Nueva Guinea', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (154, 'Paraguay', 1, 'Paraguayo', 'Paraguaya', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (155, 'Peru', 1, 'Peruano', 'Peruana', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (156, 'Polinesia Francesa', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (157, 'Polonia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (158, 'Portugal', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (159, 'Puerto Rico', 1, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (160, 'Qatar', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (161, 'Reino Unido', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (162, 'Republica Centroafricana', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (163, 'Republica Checa', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (164, 'Republica Democratica del Congo', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (165, 'Republica Dominicana', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (166, 'Republica Eslovaca', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (167, 'Reunion', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (168, 'Ruanda', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (169, 'Rumania', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (170, 'Rusia', 0, 'Ruso', 'Rusa', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (171, 'Sahara', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (172, 'Samoa', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (173, 'San Cristobal-Nevis (St. Kitts)', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (174, 'San Marino', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (175, 'San Vincente y las Granadinas', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (176, 'Santa Helena', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (177, 'Santa Lucia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (178, 'Santa Sede (Vaticano)', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (179, 'Sao Tome & Principe', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (180, 'Senegal', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (181, 'Seychelles', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (182, 'Sierra Leona', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (183, 'Singapur', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (184, 'Siria', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (185, 'Somalia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (186, 'Sri Lanka (Ceilan)', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (187, 'Sudan', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (188, 'Suecia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (189, 'Suiza', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (190, 'Sur Africa', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (191, 'Surinam', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (192, 'Swaziland', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (193, 'Tailandia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (194, 'Taiwan', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (195, 'Tajikistan', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (196, 'Tanzania', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (197, 'Timor Oriental', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (198, 'Togo', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (199, 'Tokelau', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (200, 'Tonga', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (201, 'Trinidad & Tobago', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (202, 'Tunisia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (203, 'Turkmenistan', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (204, 'Turquia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (205, 'Ucrania', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (206, 'Uganda', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (207, 'Union Europea', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (208, 'Uruguay', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (209, 'Uzbekistan', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (210, 'Vanuatu', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (211, 'Venezuela', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (212, 'Vietnam', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (213, 'Yemen', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (214, 'Yugoslavia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (215, 'Zambia', 0, '', '', '');
INSERT INTO todosexo.paises (`idPais`,`nombre`,`idioma`,`gentilicioMasc`,`gentilicioFem`,`bandera`) VALUES (216, 'Zimbabwe', 0, '', '', '');
