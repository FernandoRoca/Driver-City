SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema divercity
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `divercity` ;
CREATE SCHEMA IF NOT EXISTS `divercity` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `divercity` ;

-- -----------------------------------------------------
-- Table `clasificacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `clasificacion` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `clasificacion` (
  `id_clasificacion` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `descripcion` TEXT NULL,
  `observacion` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_clasificacion`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `principal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `principal` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `principal` (
  `id_principal` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `imagen` VARCHAR(500) NOT NULL,
  `observacion` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id_principal`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `negocio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `negocio` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `negocio` (
  `id_negocio` INT NOT NULL AUTO_INCREMENT,
  `id_principal` INT NOT NULL,
  `nombre` VARCHAR(500) NOT NULL,
  `direccion` VARCHAR(500) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `web` VARCHAR(200) NULL DEFAULT 'null',
  `logo` VARCHAR(500) NOT NULL,
  `posicion_x` DOUBLE NOT NULL,
  `posicion_y` DOUBLE NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_final` DATE NOT NULL,
  `observacion` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_negocio`, `id_principal`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `contacto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `contacto` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `contacto` (
  `id_contacto` INT NOT NULL AUTO_INCREMENT,
  `id_negocio` INT NOT NULL,
  `nombre` VARCHAR(200) NOT NULL,
  `telefono` INT(10) NULL DEFAULT NULL,
  `celular` INT(10) NULL DEFAULT NULL,
  `observacion` VARCHAR(15) NULL DEFAULT 'null',
  PRIMARY KEY (`id_contacto`, `id_negocio`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `evento` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` INT NOT NULL AUTO_INCREMENT,
  `id_principal` INT NOT NULL,
  `nombre` VARCHAR(500) NOT NULL,
  `lugar` VARCHAR(500) NOT NULL,
  `hora` VARCHAR(100) NOT NULL,
  `imagen` VARCHAR(500) NOT NULL,
  `descripcion` VARCHAR(2000) NOT NULL,
  `posicion_x` VARCHAR(500) NOT NULL,
  `posicion_y` VARCHAR(500) NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_final` DATE NOT NULL,
  `observacion` VARCHAR(100) NULL DEFAULT 'null',
  PRIMARY KEY (`id_evento`, `id_principal`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `contacto_evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `contacto_evento` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `contacto_evento` (
  `id_contacto_evento` INT NOT NULL AUTO_INCREMENT,
  `id_evento` INT NOT NULL,
  `nombre` VARCHAR(200) NOT NULL,
  `telefono` INT(10) NULL DEFAULT NULL,
  `celular` INT(10) NULL DEFAULT NULL,
  `observacion` VARCHAR(15) NULL DEFAULT 'null',
  PRIMARY KEY (`id_contacto_evento`, `id_evento`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `estado_negocio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `estado_negocio` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `estado_negocio` (
  `id_estado_negocio` INT NOT NULL AUTO_INCREMENT,
  `id_negocio` INT NOT NULL,
  `estado_negocio` VARCHAR(50) NULL DEFAULT 'null',
  `observacion` VARCHAR(50) NULL DEFAULT 'null',
  PRIMARY KEY (`id_estado_negocio`, `id_negocio`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `imagen_negocio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imagen_negocio` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `imagen_negocio` (
  `id_imagen_negocio` INT NOT NULL AUTO_INCREMENT,
  `id_negocio` INT NOT NULL,
  `ubicacion` VARCHAR(200) NOT NULL,
  `observacion` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_imagen_negocio`, `id_negocio`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pelicula`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pelicula` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `pelicula` (
  `id_pelicula` INT NOT NULL AUTO_INCREMENT,
  `id_negocio` INT NOT NULL,
  `nombre` VARCHAR(500) NOT NULL,
  `director` VARCHAR(500) NOT NULL,
  `genero` VARCHAR(100) NOT NULL,
  `imagen` TEXT NOT NULL,
  `sinopsis` TEXT NOT NULL,
  `trailer` TEXT NOT NULL,
  `observacion` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_pelicula`, `id_negocio`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `dia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dia` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `dia` (
  `id_dia` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_dia`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `promocion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `promocion` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `promocion` (
  `id_promocion` INT NOT NULL AUTO_INCREMENT,
  `id_negocio` INT NOT NULL,
  `id_dia` INT NOT NULL,
  `imagen` VARCHAR(200) NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NOT NULL,
  `observacion` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_promocion`, `id_negocio`, `id_dia`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `negocio_clasificacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `negocio_clasificacion` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `negocio_clasificacion` (
  `id_negocio_clasificacion` INT NOT NULL AUTO_INCREMENT,
  `id_clasificacion` INT NOT NULL,
  `id_negocio` INT NOT NULL,
  `observacion` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_negocio_clasificacion`, `id_clasificacion`, `id_negocio`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `horario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` INT NOT NULL AUTO_INCREMENT,
  `id_negocio` INT NOT NULL,
  `id_dia` INT NOT NULL,
  `hora_inicio` TIME NOT NULL,
  `hora_fin` TIME NOT NULL,
  `observacion` VARCHAR(50) NULL DEFAULT 'null',
  PRIMARY KEY (`id_horario`, `id_negocio`, `id_dia`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `punto_venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `punto_venta` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `punto_venta` (
  `id_punto_venta` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `direccion` VARCHAR(500) NULL DEFAULT 'null',
  `observacion` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_punto_venta`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `punto_venta_evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `punto_venta_evento` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `punto_venta_evento` (
  `id_punto_venta_evento` INT NOT NULL AUTO_INCREMENT,
  `id_evento` INT NOT NULL,
  `id_punto_venta` INT NOT NULL,
  `observacion` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_punto_venta_evento`, `id_evento`, `id_punto_venta`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `horario_pelicula`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `horario_pelicula` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `horario_pelicula` (
  `id_horario_pelicula` INT NOT NULL AUTO_INCREMENT,
  `id_pelicula` INT NOT NULL,
  `horario` TIME NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NOT NULL,
  PRIMARY KEY (`id_horario_pelicula`, `id_pelicula`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `publicidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `publicidad` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `publicidad` (
  `id_publicidad` INT NOT NULL AUTO_INCREMENT,
  `imagen` VARCHAR(500) NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NOT NULL,
  `tiempo` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`id_publicidad`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `empresa` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `logo` TEXT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `observacion` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_empresa`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `contacto_empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `contacto_empresa` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `contacto_empresa` (
  `id_contacto_empresa` INT NOT NULL AUTO_INCREMENT,
  `id_empresa` INT NOT NULL,
  `nombre` VARCHAR(200) NOT NULL,
  `telefono` INT(10) NOT NULL,
  `celular` INT(10) NOT NULL,
  `observacion` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_contacto_empresa`, `id_empresa`))
ENGINE = InnoDB;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
