-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cmsDb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `cmsDb` ;

-- -----------------------------------------------------
-- Schema cmsDb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cmsDb` DEFAULT CHARACTER SET utf8 ;
USE `cmsDb` ;

-- -----------------------------------------------------
-- Table `cmsDb`.`Benutzer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cmsDb`.`Benutzer` ;

CREATE TABLE IF NOT EXISTS `cmsDb`.`Benutzer` (
  `idBenutzer` INT NOT NULL,
  `Benutzername` VARCHAR(16) NULL,
  `Passwort` VARCHAR(30) NULL,
  `Beschreibung` VARCHAR(150) NULL,
  PRIMARY KEY (`idBenutzer`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cmsDb`.`Artikel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cmsDb`.`Artikel` ;

CREATE TABLE IF NOT EXISTS `cmsDb`.`Artikel` (
  `idArtikel` INT NOT NULL COMMENT '	',
  `Autor` INT NULL,
  `Titel` VARCHAR(100) NULL,
  `Artikel` VARCHAR(1000) NULL,
  `Erstelldatum` DATETIME NULL,
  PRIMARY KEY (`idArtikel`),
  INDEX `Autor_idx` (`Autor` ASC),
  CONSTRAINT `idBenutzer`
    FOREIGN KEY (`Autor`)
    REFERENCES `cmsDb`.`Benutzer` (`idBenutzer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cmsDb`.`Kategorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cmsDb`.`Kategorie` ;

CREATE TABLE IF NOT EXISTS `cmsDb`.`Kategorie` (
  `idKategorie` INT NOT NULL,
  `Kategorie` VARCHAR(45) NULL,
  `Beschreibung` VARCHAR(150) NULL,
  PRIMARY KEY (`idKategorie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cmsDb`.`Art_Kat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cmsDb`.`Art_Kat` ;

CREATE TABLE IF NOT EXISTS `cmsDb`.`Art_Kat` (
  `idArt_Kat` INT NOT NULL,
  `idArtikel` INT NULL,
  `idKategorie` INT NULL,
  PRIMARY KEY (`idArt_Kat`),
  INDEX `idArtikel_idx` (`idArtikel` ASC),
  INDEX `idKategorie_idx` (`idKategorie` ASC),
  CONSTRAINT `idArtikel`
    FOREIGN KEY (`idArtikel`)
    REFERENCES `cmsDb`.`Artikel` (`idArtikel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idKategorie`
    FOREIGN KEY (`idKategorie`)
    REFERENCES `cmsDb`.`Kategorie` (`idKategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
