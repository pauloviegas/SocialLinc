SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

USE `mcsidcb` ;

-- -----------------------------------------------------
-- Table `estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `estado` ;

CREATE TABLE IF NOT EXISTS `estado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sigla` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `estado` (`id` ASC);

CREATE UNIQUE INDEX `nome_UNIQUE` ON `estado` (`nome` ASC);

CREATE UNIQUE INDEX `sigla_UNIQUE` ON `estado` (`sigla` ASC);


-- -----------------------------------------------------
-- Table `cidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cidade` ;

CREATE TABLE IF NOT EXISTS `cidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `estado_id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `estadoFK`
    FOREIGN KEY (`estado_id`)
    REFERENCES `estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `cidade` (`id` ASC);

CREATE UNIQUE INDEX `nome_UNIQUE` ON `cidade` (`nome` ASC);

CREATE INDEX `estado_idx` ON `cidade` (`estado_id` ASC);


-- -----------------------------------------------------
-- Table `replacements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `replacements` ;

CREATE TABLE IF NOT EXISTS `replacements` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(45) NOT NULL,
  `result` VARCHAR(45) NOT NULL,
  `cidade_id` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `localidadeFK`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `cidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `replacements` (`id` ASC);

CREATE UNIQUE INDEX `code_UNIQUE` ON `replacements` (`code` ASC);

CREATE INDEX `localidadeFK_idx` ON `replacements` (`cidade_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- Inserção dos Estados (a ordem de inserção é crucial, primeiro estados, segundo cidades, terceiro "cidades estaduais")
DELETE FROM `estado`;
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(01,'amazonas','am');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(02,'amapá','ap');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(03,'bahia','ba');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(04,'ceará','ce');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(05,'distrito federal','df');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(06,'espírito santo','es');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(07,'maranhão','ma');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(08,'minas gerais','mg');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(09,'pará','pa');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(10,'paraíba','pb');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(11,'pernambuco','pe');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(12,'piauí','pi');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(13,'paraná','pr');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(14,'rio de janeiro','rj');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(15,'rio grande do norte','rn');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(16,'rio grande do sul','rs');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(17,'santa catarina','sc');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(18,'são paulo','sp');
INSERT INTO `estado`(`id`,`nome`,`sigla`)VALUES(19,'federal','f');

-- Inserção das cidades
DELETE FROM `cidade`;
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(01,01,'Coari');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(02,01,'Manacapuru');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(03,01,'Manaquiri');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(04,02,'Serra do Navio');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(05,03,'Guanambi');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(06,03,'Itaberaba');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(07,03,'Itabuna');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(08,03,'Juazeiro');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(09,03,'Lauro de Freitas');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(10,03,'Nilo Peçanha');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(11,03,'Piraí do Norte');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(12,03,'Uruçucá');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(13,03,'Vitória da Conquista');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(14,04,'Araripe');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(15,04,'Barreira');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(16,04,'Brejo Santo');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(17,04,'Jaguaruana');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(18,04,'Maracanaú');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(19,04,'Milhã');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(20,04,'Quixeramobim');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(21,04,'São Gonçalo do Amarante');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(22,04,'Varjota');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(23,04,'Viçosa do Ceará');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(24,05,'Estrutural');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(25,06,'Cariacica');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(26,07,'São José do Ribamar');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(27,08,'Nepomuceno');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(28,08,'Pimenta');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(29,08,'Rio Acima');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(30,09,'Conceição do Araguaia');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(31,09,'Curuçá');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(32,09,'Goianésia do Pará');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(33,09,'Itaituba');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(34,09,'Marituba');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(35,09,'Paragominas');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(36,09,'Trairão');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(37,09,'Tucuruí');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(38,09,'Uruará');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(39,10,'Cabaceiras');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(40,10,'Cachoeira dos Índios');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(41,10,'Esperança');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(42,10,'Itaporanga');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(43,10,'Lagoa Seca');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(44,10,'Nova Floresta');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(45,10,'Pocinhos');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(46,10,'Queimadas');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(47,10,'São João do Rio do Peixe');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(48,11,'Bodocó');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(49,11,'Casinhas');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(50,11,'Correntes');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(51,12,'Inhuma');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(52,12,'Regeneração');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(53,12,'São José do Divino');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(54,13,'Assis Chateaubriand');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(55,13,'Bandeirantes');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(56,13,'Ibiporã');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(57,13,'Palmas');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(58,13,'Quatro Barras');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(59,13,'Santa Cecília do Pavão');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(60,13,'São Miguel do Iguaçu');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(61,13,'Toledo');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(62,14,'Engenheiro Paulo de Frontin');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(63,14,'Maricá');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(64,14,'São José do Vale do Rio Preto');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(65,15,'São João do Sabugi');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(66,16,'Candelária');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(67,16,'Jari');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(68,16,'Não-me-toque');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(69,16,'Nova Bassano');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(70,16,'Santo Ângelo');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(71,16,'São Miguel das Missões');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(72,17,'Joaçaba');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(73,18,'Casa Branca');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(74,18,'Descalvado');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(75,18,'Guararapes');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(76,18,'Lourdes');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(77,18,'Penápolis');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(78,18,'Presidente Epitácio');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(79,18,'Santa Gertrudes');
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(80,18,'Socorro');
-- Inserção dos dados de cidades "estaduais"
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(81,01,concat('Estado de ',(upper((select sigla from `estado` where id=01)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(82,02,concat('Estado de ',(upper((select sigla from `estado` where id=02)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(83,03,concat('Estado de ',(upper((select sigla from `estado` where id=03)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(84,04,concat('Estado de ',(upper((select sigla from `estado` where id=04)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(85,05,concat('Estado de ',(upper((select sigla from `estado` where id=05)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(86,06,concat('Estado de ',(upper((select sigla from `estado` where id=06)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(87,07,concat('Estado de ',(upper((select sigla from `estado` where id=07)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(88,08,concat('Estado de ',(upper((select sigla from `estado` where id=08)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(89,09,concat('Estado de ',(upper((select sigla from `estado` where id=09)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(90,10,concat('Estado de ',(upper((select sigla from `estado` where id=10)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(91,11,concat('Estado de ',(upper((select sigla from `estado` where id=11)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(92,12,concat('Estado de ',(upper((select sigla from `estado` where id=12)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(93,13,concat('Estado de ',(upper((select sigla from `estado` where id=13)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(94,14,concat('Estado de ',(upper((select sigla from `estado` where id=14)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(95,15,concat('Estado de ',(upper((select sigla from `estado` where id=15)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(96,16,concat('Estado de ',(upper((select sigla from `estado` where id=16)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(97,17,concat('Estado de ',(upper((select sigla from `estado` where id=17)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(98,18,concat('Estado de ',(upper((select sigla from `estado` where id=18)))));
INSERT INTO `cidade`(`id`,`estado_id`,`nome`)VALUES(99,19,'federal');