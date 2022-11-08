-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `curso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estagiario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estagiario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `matricula` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `endereco` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(45) NULL,
  `celular` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `periodo` VARCHAR(45) NOT NULL,
  `turma` VARCHAR(45) NOT NULL,
  `turno` VARCHAR(45) NOT NULL,
  `composicao_carga_horaria` VARCHAR(255) NULL,
  `carga_horaria` VARCHAR(45) NULL,
  `data_inicio` BIGINT NULL,
  `data_termino` BIGINT NULL,
  `data_inicio_aditivo` BIGINT NULL,
  `data_termino_aditijo` BIGINT NULL,
  `data_recisao` BIGINT NULL,
  `apolice` VARCHAR(255) BINARY NULL,
  `seguradora` VARCHAR(255) NULL,
  `id_curso` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_estagiario_curso_idx` (`id_curso` ASC),
  CONSTRAINT `fk_estagiario_curso`
    FOREIGN KEY (`id_curso`)
    REFERENCES `curso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `coordenador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coordenador` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `graduacao` VARCHAR(255) NOT NULL,
  `pos_graduacao` VARCHAR(255) NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `nucleo` VARCHAR(255) NOT NULL,
  `turno` VARCHAR(255) NOT NULL,
  `id_curso` INT NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_coordenador_curso1_idx` (`id_curso` ASC),
  CONSTRAINT `fk_coordenador_curso1`
    FOREIGN KEY (`id_curso`)
    REFERENCES `curso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ponto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` BIGINT NOT NULL,
  `hora_entrada` TIME NOT NULL,
  `hora_saida` TIME NOT NULL,
  `id_estagiario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ponto_estagiario1_idx` (`id_estagiario` ASC),
  CONSTRAINT `fk_ponto_estagiario1`
    FOREIGN KEY (`id_estagiario`)
    REFERENCES `estagiario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `atividade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `atividade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `atividade` TEXT NOT NULL,
  `id_ponto` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_atividade_ponto1_idx` (`id_ponto` ASC),
  CONSTRAINT `fk_atividade_ponto1`
    FOREIGN KEY (`id_ponto`)
    REFERENCES `ponto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `resposta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resposta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_curso` INT NOT NULL,
  `questao1` TEXT NOT NULL,
  `questao2` TEXT NOT NULL,
  `questao3` TEXT NOT NULL,
  `questao4` TEXT NOT NULL,
  `questao5` TEXT NOT NULL,
  `questao6` TEXT NOT NULL,
  `id_estagiario` INT NOT NULL,
  PRIMARY KEY (`id`, `id_curso`),
  INDEX `fk_perguntas_estagiario1_idx` (`id_estagiario` ASC),
  INDEX `fk_perguntas_curso1_idx` (`id_curso` ASC),
  CONSTRAINT `fk_perguntas_estagiario1`
    FOREIGN KEY (`id_estagiario`)
    REFERENCES `estagiario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perguntas_curso1`
    FOREIGN KEY (`id_curso`)
    REFERENCES `curso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `parecer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `parecer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `parecer` TEXT NULL,
  `id_coordenador` INT NOT NULL,
  `id_estagiario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_parecer_coordenador1_idx` (`id_coordenador` ASC),
  INDEX `fk_parecer_estagiario1_idx` (`id_estagiario` ASC),
  CONSTRAINT `fk_parecer_coordenador1`
    FOREIGN KEY (`id_coordenador`)
    REFERENCES `coordenador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_parecer_estagiario1`
    FOREIGN KEY (`id_estagiario`)
    REFERENCES `estagiario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
