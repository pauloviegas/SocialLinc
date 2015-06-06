SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mcsidcb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `mcsidcb` ;

-- -----------------------------------------------------
-- Table `mcsidcb`.`estados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mcsidcb`.`estados` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mcsidcb`.`estados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sigla` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC),
  UNIQUE INDEX `sigla_UNIQUE` (`sigla` ASC))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mcsidcb`.`cidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mcsidcb`.`cidade` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mcsidcb`.`cidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `estado_id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC),
  INDEX `estado_idx` (`estado_id` ASC),
  CONSTRAINT `estadoFK`
    FOREIGN KEY (`estado_id`)
    REFERENCES `mcsidcb`.`estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mcsidcb`.`replacements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mcsidcb`.`replacements` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `mcsidcb`.`replacements` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(45) NOT NULL,
  `result` VARCHAR(45) NOT NULL,
  `cidade_id` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `code_UNIQUE` (`code` ASC),
  INDEX `localidadeFK_idx` (`cidade_id` ASC),
  CONSTRAINT `localidadeFK`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `mcsidcb`.`cidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
