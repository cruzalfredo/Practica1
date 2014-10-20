/*
SQLyog Ultimate v11.42 (64 bit)
MySQL - 5.6.16 : Database - ejercicio1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ejercicio1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ejercicio1`;

/*Table structure for table `alumnogrupo` */

DROP TABLE IF EXISTS `alumnogrupo`;

CREATE TABLE `alumnogrupo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Grupo` int(11) DEFAULT NULL,
  `ID_Alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDGrupo` (`ID_Grupo`),
  KEY `IDAlumno` (`ID_Alumno`),
  CONSTRAINT `IDAlumno` FOREIGN KEY (`ID_Alumno`) REFERENCES `usuario` (`ID`),
  CONSTRAINT `IDGrupo` FOREIGN KEY (`ID_Grupo`) REFERENCES `grupo` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `alumnogrupo` */

insert  into `alumnogrupo`(`ID`,`ID_Grupo`,`ID_Alumno`) values (3,1,NULL),(8,1,23),(9,1,23),(14,3,22),(15,3,22),(16,3,22),(17,2,20),(18,2,24),(19,2,25);

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) DEFAULT NULL,
  `Avatar` varchar(100) DEFAULT NULL,
  `Orden` varchar(100) DEFAULT NULL,
  `Estatus` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `grupo` */

insert  into `grupo`(`ID`,`Nombre`,`Avatar`,`Orden`,`Estatus`) values (1,'TIC-54','','',2),(2,'TIC-72','','',1),(3,'TIC-73','','',1),(4,'TIC-41',NULL,NULL,1),(5,'TIC-32',NULL,NULL,2),(6,'TIC-50',NULL,NULL,1);

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Materia` varchar(90) NOT NULL,
  `Estatus` int(50) DEFAULT NULL,
  `Avatar` varchar(50) DEFAULT NULL,
  `Orden` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `unique_ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

insert  into `materia`(`ID`,`Materia`,`Estatus`,`Avatar`,`Orden`) values (1,'ProgramaciÃ³n',1,'Materia de ProgramaciÃ³n',NULL),(2,'Matematicas',1,'',NULL),(3,'Base de Datos',2,'',NULL),(4,'AdministraciÃ³n',2,'EstÃ¡ es la materia de AdministraciÃ³n del tiempo',NULL),(5,'Hola',1,'hola2',NULL),(6,'GeografÃ­a',1,'EstÃ¡ es la materia de GeografÃ­a',NULL),(7,'EconomÃ­a',2,'',NULL);

/*Table structure for table `materiagrupo` */

DROP TABLE IF EXISTS `materiagrupo`;

CREATE TABLE `materiagrupo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Grupo` int(11) DEFAULT NULL,
  `ID_Materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDsGrupos` (`ID_Grupo`),
  KEY `IDsMaterias` (`ID_Materia`),
  CONSTRAINT `IDsGrupos` FOREIGN KEY (`ID_Grupo`) REFERENCES `grupo` (`ID`),
  CONSTRAINT `IDsMaterias` FOREIGN KEY (`ID_Materia`) REFERENCES `materia` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `materiagrupo` */

insert  into `materiagrupo`(`ID`,`ID_Grupo`,`ID_Materia`) values (3,1,2),(4,2,4),(6,1,4);

/*Table structure for table `materiamaestro` */

DROP TABLE IF EXISTS `materiamaestro`;

CREATE TABLE `materiamaestro` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Materia` int(11) NOT NULL,
  `ID_Maestro` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Maestro` (`ID_Maestro`),
  KEY `ID_Materia` (`ID_Materia`),
  CONSTRAINT `MateriaMaestro_ibfk_1` FOREIGN KEY (`ID_Materia`) REFERENCES `materia` (`ID`),
  CONSTRAINT `MateriaMaestro_ibfk_2` FOREIGN KEY (`ID_Maestro`) REFERENCES `usuario` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `materiamaestro` */

insert  into `materiamaestro`(`ID`,`ID_Materia`,`ID_Maestro`) values (21,2,2),(30,6,3),(33,3,3),(34,2,3),(38,3,22),(40,2,22),(44,5,3),(45,5,22),(46,6,22),(47,1,22),(48,6,24),(49,2,24),(50,1,24);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) DEFAULT NULL,
  `ApellidoPaterno` varchar(200) DEFAULT NULL,
  `ApellidoMaterno` varchar(200) DEFAULT NULL,
  `Telefono` varchar(200) DEFAULT NULL,
  `Calle` varchar(200) DEFAULT NULL,
  `NumeroExterior` int(10) DEFAULT NULL,
  `NumeroInterior` int(10) DEFAULT NULL,
  `Colonia` varchar(200) DEFAULT NULL,
  `Municipio` varchar(200) DEFAULT NULL,
  `Estado` varchar(200) DEFAULT NULL,
  `CP` int(10) DEFAULT NULL,
  `Correo` varchar(200) DEFAULT NULL,
  `Usuario` varchar(200) DEFAULT NULL,
  `Contrasena` varchar(200) DEFAULT NULL,
  `Nivel` varchar(200) DEFAULT NULL,
  `Estatus` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`ID`,`Nombre`,`ApellidoPaterno`,`ApellidoMaterno`,`Telefono`,`Calle`,`NumeroExterior`,`NumeroInterior`,`Colonia`,`Municipio`,`Estado`,`CP`,`Correo`,`Usuario`,`Contrasena`,`Nivel`,`Estatus`) values (2,'Victor Massiel','Juarez','MartÃ­nez',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'victor2','qwerty','2','1'),(3,'Cruz Alfredo','Bibiano','MontaÃ±o',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cruz3','qwerty','2','1'),(20,'Marcos','campos','Ulloa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'marcos20','qwerty','3','1'),(22,'Cruz Alfredo','Bibiano','MontaÃ±o',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cruz22','qwerty','3','1'),(23,'Marcos','Martines','MontaÃ±o',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'marcos23','qwerty','3','1'),(24,'Juan','PÃ©rez','Mondragon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'juan24','qwerty','3','1'),(25,'Hugo','Sanchez','Mora',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hugo25','qwerty','3','1'),(26,'Administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin','qwerty','1','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
