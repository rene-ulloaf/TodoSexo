BEGIN;
--COMMIT;
--ROLLBACK;

CREATE DATABASE IF NOT EXISTS TodoSexo;
/*CREATE DATABASE `todosexo`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';*/

CREATE TABLE `acompananteDescripcion` (
  `idAcompananteDescripcion` int(11) NOT NULL AUTO_INCREMENT,
  `idAcompanante` int(11) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  PRIMARY KEY (`idAcompananteDescripcion`),
  KEY `FK_acompanantedescripcion_1` (`idAcompanante`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `colorOjos` (
  `idColorOjos` smallint(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idColorOjos`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `colorPelo` (
  `idColorPelo` smallint(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idColorPelo`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `contextura` (
  `idContextura` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idContextura`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `depilacion` (
  `idDepilacion` smallint(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idDepilacion`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `formaPago` (
  `idFormaPago` smallint(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idFormaPago`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `planes` (
  `idPlan` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPlan`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `precio` (
  `idPrecio` int(11) NOT NULL AUTO_INCREMENT,
  `idAcompanante` int(11) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `periodo` varchar(200) NOT NULL,
  `defecto` tinyint(1) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPrecio`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `estilos` (
  `idEstilo` smallint(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idEstilo`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `preferenciaSexual` (
  `idPreferencia` smallint(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPreferencia`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `paises` (
  `idPais` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `idioma` smallint(6) NOT NULL,
  `gentilicioMasc` varchar(50) NOT NULL,
  `gentilicioFem` varchar(50) NOT NULL,
  `bandera` varchar(150) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `sexoAcompanante` (
  `idSexo` smallint(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `textura` (
  `idTextura` smallint(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idTextura`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `tipo_foto` (
  `idTipoFoto` smallint(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idTipoFoto`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `planTipoFoto` (
  `idPlan` smallint(6) NOT NULL,
  `idTipoFoto` smallint(6) NOT NULL,
  `altoImg` int(11) NOT NULL,
  `anchoImg` int(11) NOT NULL,
  `cantidadFotos` int(11) NOT NULL,
  KEY `idPlan` (`idPlan`),
  KEY `idTipoFoto` (`idTipoFoto`),
  CONSTRAINT `plantipofoto_fk` FOREIGN KEY (`idPlan`) REFERENCES `planes` (`idPlan`),
  CONSTRAINT `plantipofoto_fk1` FOREIGN KEY (`idTipoFoto`) REFERENCES `tipo_foto` (`idTipoFoto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `acompanantes` (
  `idAcompanante` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apodo` varchar(50) NOT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `eMail` varchar(50) DEFAULT NULL,
  `nacionalidad` smallint(6) NOT NULL,
  `fecNacimiento` date NOT NULL,
  `estatura` smallint(6) NOT NULL,
  `medidas` varchar(11) NOT NULL,
  `idContextura` smallint(6) NOT NULL,
  `idTextura` smallint(6) NOT NULL,
  `idColorOjos` smallint(6) NOT NULL,
  `idColorPelo` smallint(6) NOT NULL,
  `idDepilacion` smallint(6) NOT NULL,
  `Sexo` smallint(6) NOT NULL,
  `ubicacion` varchar(500) NOT NULL,
  `idPlan` smallint(6) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idAcompanante`),
  KEY `FK_acompanantes_1` (`idColorOjos`),
  KEY `FK_acompanantes_4` (`idTextura`),
  KEY `FK_acompanantes_6` (`Sexo`),
  KEY `FK_acompanantes_7` (`idPlan`),
  KEY `FK_acompanantes_2` (`nacionalidad`),
  CONSTRAINT `FK_acompanantes_1` FOREIGN KEY (`idColorOjos`) REFERENCES `colorOjos` (`idColorOjos`),
  CONSTRAINT `FK_acompanantes_2` FOREIGN KEY (`nacionalidad`) REFERENCES `paises` (`idPais`) ON UPDATE CASCADE,
  CONSTRAINT `FK_acompanantes_4` FOREIGN KEY (`idTextura`) REFERENCES `textura` (`idTextura`),
  CONSTRAINT `FK_acompanantes_6` FOREIGN KEY (`Sexo`) REFERENCES `sexoAcompanante` (`idSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `estiloAcompanante` (
  `idAcompanante` int(11) NOT NULL,
  `idEstilo` smallint(6) NOT NULL,
  KEY `FK_estiloacompanante_1` (`idAcompanante`),
  KEY `FK_estiloacompanante_2` (`idEstilo`),
  CONSTRAINT `FK_estiloacompanante_1` FOREIGN KEY (`idAcompanante`) REFERENCES `acompanantes` (`idAcompanante`),
  CONSTRAINT `FK_estiloacompanante_2` FOREIGN KEY (`idEstilo`) REFERENCES `estilos` (`idEstilo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `formaPagoAcompanante` (
  `idAcompanante` int(11) NOT NULL,
  `idFormaPago` smallint(6) NOT NULL,
  KEY `FK_formapagoacompanante_1` (`idAcompanante`),
  KEY `FK_formapagoacompanante_2` (`idFormaPago`),
  CONSTRAINT `FK_formapagoacompanante_1` FOREIGN KEY (`idAcompanante`) REFERENCES `acompanantes` (`idAcompanante`),
  CONSTRAINT `FK_formapagoacompanante_2` FOREIGN KEY (`idFormaPago`) REFERENCES `formaPago` (`idFormaPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

CREATE TABLE `fotos` (
  `idFoto` int(11) NOT NULL AUTO_INCREMENT,
  `idAcompanante` int(11) NOT NULL,
  `ruta` varchar(500) NOT NULL,
  `tipo` smallint(6) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idFoto`),
  KEY `FK_fotos_1` (`idAcompanante`),
  KEY `FK_fotos_2` (`tipo`),
  CONSTRAINT `FK_fotos_1` FOREIGN KEY (`idAcompanante`) REFERENCES `acompanantes` (`idAcompanante`),
  CONSTRAINT `FK_fotos_2` FOREIGN KEY (`tipo`) REFERENCES `tipo_foto` (`idTipoFoto`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `preferenciaAcompanante` (
  `idAcompanante` int(11) NOT NULL,
  `idPreferencia` smallint(6) NOT NULL,
  KEY `FK_preferenciaacompanante_1` (`idAcompanante`),
  KEY `FK_preferenciaacompanante_2` (`idPreferencia`),
  CONSTRAINT `FK_preferenciaacompanante_1` FOREIGN KEY (`idAcompanante`) REFERENCES `acompanantes` (`idAcompanante`),
  CONSTRAINT `FK_preferenciaacompanante_2` FOREIGN KEY (`idPreferencia`) REFERENCES `preferenciaSexual` (`idPreferencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

CREATE TABLE `acompananteMail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100),
  `eMail` varchar(50),
  `usuario` int(11),
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `visitas` (
  `Codigo` int(11) NOT NULL auto_increment,
  `Fecha` date NOT NULL,
  `SistemaOperativo` varchar(20) NOT NULL,
  `Explorador` varchar(30) NOT NULL,
  `Version` varchar(20) NOT NULL,
  `Beta` tinyint(1) NOT NULL,
  `Javascript` tinyint(1) NOT NULL,
  `JavaApplets` tinyint(1) NOT NULL,
  `Cookies` tinyint(1) NOT NULL,
  `ActivexControls` tinyint(1) NOT NULL,
  `Ajax` tinyint(1) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `MacAddress` varchar(20) default NULL,
  `Pais` varchar(10) NOT NULL,
  PRIMARY KEY  (`Codigo`),
  UNIQUE KEY `Codigo` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `colorOjos` (`idColorOjos`, `descripcion`, `vigente`) VALUES (0, 'Ninguno', 0);
Update `colorOjos` Set `idColorOjos` = 0 Where `idColorOjos` = 1;
INSERT INTO `colorOjos` (`idColorOjos`, `descripcion`, `vigente`) VALUES (1, 'Cafe', 1);
INSERT INTO `colorOjos` (`idColorOjos`, `descripcion`, `vigente`) VALUES (2, 'Verdes', 1);
INSERT INTO `colorOjos` (`idColorOjos`, `descripcion`, `vigente`) VALUES (3, 'Pardos', 1);
INSERT INTO `colorOjos` (`idColorOjos`, `descripcion`, `vigente`) VALUES (4, 'Azules', 1);

INSERT INTO `colorPelo` (`idColorPelo`, `descripcion`, `vigente`) VALUES (0, 'Ninguno', 0);
Update `colorPelo` Set `idColorPelo` = 0 Where `idColorPelo` = 1;
INSERT INTO `colorPelo` (`idColorPelo`, `descripcion`, `vigente`) VALUES (1, 'Negro', 1);
INSERT INTO `colorPelo` (`idColorPelo`, `descripcion`, `vigente`) VALUES (2, 'Rubio', 1);
INSERT INTO `colorPelo` (`idColorPelo`, `descripcion`, `vigente`) VALUES (3, 'Casta&ntilde;o', 1);
INSERT INTO `colorPelo` (`idColorPelo`, `descripcion`, `vigente`) VALUES (4, 'Pelirrojo', 1);

INSERT INTO `contextura` (`idContextura`, `nombre`, `vigente`) VALUES (0, 'Ninguna', 0);
Update `contextura` Set `idContextura` = 0 Where `idContextura` = 1;
INSERT INTO `contextura` (`idContextura`, `nombre`, `vigente`) VALUES (1, 'Delgada', 1);
INSERT INTO `contextura` (`idContextura`, `nombre`, `vigente`) VALUES (2, 'Mediana', 1);

INSERT INTO `depilacion` (`idDepilacion`, `descripcion`, `vigente`) VALUES (0, 'Ninguna', 0);
Update `depilacion` Set `idDepilacion` = 0 Where `idDepilacion` = 1;
INSERT INTO `depilacion` (`idDepilacion`, `descripcion`, `vigente`) VALUES (1, 'Ex&oacute;tica', 1);
INSERT INTO `depilacion` (`idDepilacion`, `descripcion`, `vigente`) VALUES (2, 'Total', 1);
INSERT INTO `depilacion` (`idDepilacion`, `descripcion`, `vigente`) VALUES (3, 'Moicano', 1);
INSERT INTO `depilacion` (`idDepilacion`, `descripcion`, `vigente`) VALUES (4, 'Tradicional', 1);

INSERT INTO `estilos` (`idEstilo`, `descripcion`, `vigente`) VALUES (0, 'Ninguno', 0);
Update `estilos` Set `idEstilo` = 0 Where `idEstilo` = 1;
INSERT INTO `estilos` (`idEstilo`, `descripcion`, `vigente`) VALUES (1, 'Amateur', 1);
INSERT INTO `estilos` (`idEstilo`, `descripcion`, `vigente`) VALUES (2, 'Madura', 1);
INSERT INTO `estilos` (`idEstilo`, `descripcion`, `vigente`) VALUES (3, 'HardCore', 1);

INSERT INTO `formaPago` (`idFormaPago`, `descripcion`, `vigente`) VALUES (0, 'Ninguna', 0);
Update `formaPago` Set `idFormaPago` = 0 Where `idFormaPago` = 1;
INSERT INTO `formaPago` (`idFormaPago`, `descripcion`, `vigente`) VALUES (1, 'Efectivo', 1);
INSERT INTO `formaPago` (`idFormaPago`, `descripcion`, `vigente`) VALUES (2, 'Cheque', 1);

INSERT INTO `preferenciaSexual` (`idPreferencia`, `descripcion`, `vigente`) VALUES (0, 'Ninguna', 0);
Update `preferenciaSexual` Set `idPreferencia` = 0 Where `idPreferencia` = 1;
INSERT INTO `preferenciaSexual` (`idPreferencia`, `descripcion`, `vigente`) VALUES (1, 'Hetero', 1);
INSERT INTO `preferenciaSexual` (`idPreferencia`, `descripcion`, `vigente`) VALUES (2, 'Homosexual', 1);
INSERT INTO `preferenciaSexual` (`idPreferencia`, `descripcion`, `vigente`) VALUES (3, 'Parejas', 1);
INSERT INTO `preferenciaSexual` (`idPreferencia`, `descripcion`, `vigente`) VALUES (4, 'Grupales', 1);

INSERT INTO `sexoAcompanante` (`idSexo`, `descripcion`, `vigente`) VALUES (0, 'Seleccionar', 1);
Update `sexoAcompanante` Set `idSexo` = 0 Where `idSexo` = 1;
INSERT INTO `sexoAcompanante` (`idSexo`, `descripcion`, `vigente`) VALUES (1, 'Femenino', 1);
INSERT INTO `sexoAcompanante` (`idSexo`, `descripcion`, `vigente`) VALUES (2, 'Masculino', 1);
INSERT INTO `sexoAcompanante` (`idSexo`, `descripcion`, `vigente`) VALUES (3, 'Bisexual', 1);
INSERT INTO `sexoAcompanante` (`idSexo`, `descripcion`, `vigente`) VALUES (4, 'Lesbiana', 1);
INSERT INTO `sexoAcompanante` (`idSexo`, `descripcion`, `vigente`) VALUES (5, 'Travesti', 1);

INSERT INTO `textura` (`idTextura`, `descripcion`, `vigente`) VALUES (0, 'Ninguna', 0);
Update `textura` Set `idTextura` = 0 Where `idTextura` = 1;
INSERT INTO `textura` (`idTextura`, `descripcion`, `vigente`) VALUES (1, 'Morena', 1);
INSERT INTO `textura` (`idTextura`, `descripcion`, `vigente`) VALUES (2, 'Rubia', 1);
INSERT INTO `textura` (`idTextura`, `descripcion`, `vigente`) VALUES (3, 'Trigue&ntilde;a', 1);
INSERT INTO `textura` (`idTextura`, `descripcion`, `vigente`) VALUES (4, 'Mulata', 1);
INSERT INTO `textura` (`idTextura`, `descripcion`, `vigente`) VALUES (5, 'Asiatica', 1);

INSERT INTO `tipo_foto` (`idTipoFoto`, `descripcion`, `vigente`) VALUES (0, 'Ninguna', 0);
Update `tipo_foto` Set `idTipoFoto` = 0 Where `idTipoFoto` = 1;
INSERT INTO `tipo_foto` (`idTipoFoto`, `descripcion`, `vigente`) VALUES (1, 'Presentaci&oacute;n', 1);
INSERT INTO `tipo_foto` (`idTipoFoto`, `descripcion`, `vigente`) VALUES (2, 'Detalle', 1);
INSERT INTO `tipo_foto` (`idTipoFoto`, `descripcion`, `vigente`) VALUES (3, 'DetalleGrande', 1);

INSERT INTO `planes` (`idPlan`, `nombre`, `vigente`) VALUES (0, 'Ninguno', 0);
Update `planes` Set `idPlan` = 0 Where `idPlan` = 1;
INSERT INTO `planes` (`idPlan`, `nombre`, `vigente`) VALUES (1, 'Vip', 1);
INSERT INTO `planes` (`idPlan`, `nombre`, `vigente`) VALUES (2, 'Premiun', 1);
INSERT INTO `planes` (`idPlan`, `nombre`, `vigente`) VALUES (3, 'Gold', 1);
INSERT INTO `planes` (`idPlan`, `nombre`, `vigente`) VALUES (4, 'Silver', 1);

INSERT INTO `planTipoFoto` (`idPlan`,`idTipoFoto`, `altoImg`, `anchoImg`,`cantidadFotos`) VALUES (1,1,170,120,1);
INSERT INTO `planTipoFoto` (`idPlan`,`idTipoFoto`, `altoImg`, `anchoImg`,`cantidadFotos`) VALUES (1,2,400,600,20);
INSERT INTO `planTipoFoto` (`idPlan`,`idTipoFoto`, `altoImg`, `anchoImg`,`cantidadFotos`) VALUES (2,1,150,100,1);
INSERT INTO `planTipoFoto` (`idPlan`,`idTipoFoto`, `altoImg`, `anchoImg`,`cantidadFotos`) VALUES (2,2,400,600,20);
INSERT INTO `planTipoFoto` (`idPlan`,`idTipoFoto`, `altoImg`, `anchoImg`,`cantidadFotos`) VALUES (3,1,130,80,1);
INSERT INTO `planTipoFoto` (`idPlan`,`idTipoFoto`, `altoImg`, `anchoImg`,`cantidadFotos`) VALUES (3,2,400,600,20);
INSERT INTO `planTipoFoto` (`idPlan`,`idTipoFoto`, `altoImg`, `anchoImg`,`cantidadFotos`) VALUES (4,1,110,60,1);
INSERT INTO `planTipoFoto` (`idPlan`,`idTipoFoto`, `altoImg`, `anchoImg`,`cantidadFotos`) VALUES (4,2,400,600,20);
