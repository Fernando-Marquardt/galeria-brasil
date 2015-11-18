CREATE SCHEMA IF NOT EXISTS `galeria_brasil` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `galeria_brasil` ;

-- -----------------------------------------------------
-- Table `galeria_brasil`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galeria_brasil`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(150) NOT NULL ,
  `email` VARCHAR(150) NOT NULL ,
  `login` VARCHAR(30) NOT NULL ,
  `senha` VARCHAR(32) NOT NULL ,
  `nivel` TINYINT NOT NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galeria_brasil`.`config`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galeria_brasil`.`config` (
  `chave` VARCHAR(120) NOT NULL ,
  `valor` VARCHAR(250) NULL ,
  PRIMARY KEY (`chave`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galeria_brasil`.`galeria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galeria_brasil`.`galeria` (
  `id_galeria` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(250) NOT NULL ,
  `data` TIMESTAMP NOT NULL ,
  `local` VARCHAR(80) NULL ,
  `diretorio` VARCHAR(250) NOT NULL ,
  `capa` VARCHAR(250) NULL ,
  PRIMARY KEY (`id_galeria`) )
ENGINE = InnoDB;