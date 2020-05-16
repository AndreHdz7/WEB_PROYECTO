
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


DROP SCHEMA IF EXISTS `WEB_DBA` ;


CREATE SCHEMA IF NOT EXISTS `WEB_DBA` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `WEB_DBA` ;

DROP TABLE IF EXISTS `WEB_DBA`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `WEB_DBA`.`usuarios` (
  `numBoleta` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `contrasea` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NULL,
  PRIMARY KEY (`numBoleta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE UNIQUE INDEX `numBoleta_UNIQUE` ON `WEB_DBA`.`usuarios` (`numBoleta` ASC);

CREATE UNIQUE INDEX `contrasea_UNIQUE` ON `WEB_DBA`.`usuarios` (`contrasea` ASC);


DROP TABLE IF EXISTS `WEB_DBA`.`materias_disponibles` ;

CREATE TABLE IF NOT EXISTS `WEB_DBA`.`materias_disponibles` (
  `idMateria` INT NOT NULL,
  `materia` VARCHAR(45) NOT NULL,
  `profesor` VARCHAR(45) NOT NULL,
  `cupo` INT NOT NULL,
  `salon` VARCHAR(10) NOT NULL,
  `horario` TIME NOT NULL,
  PRIMARY KEY (`idMateria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE UNIQUE INDEX `idMateria_UNIQUE` ON `WEB_DBA`.`materias_disponibles` (`idMateria` ASC);

DROP TABLE IF EXISTS `WEB_DBA`.`materia_seleccionadas` ;

CREATE TABLE IF NOT EXISTS `WEB_DBA`.`materia_seleccionadas` (
  `idRegistro` TINYINT NOT NULL,
  `idMateria_seleccionadas` INT NOT NULL,
  `numBoleta_seleccionadas` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRegistro`),
  CONSTRAINT `fk_materias_seleccionadas`
    FOREIGN KEY (`idMateria_seleccionadas`)
    REFERENCES `WEB_DBA`.`materias_disponibles` (`idMateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_numBoleta_seleccionadas`
    FOREIGN KEY (`numBoleta_seleccionadas`)
    REFERENCES `WEB_DBA`.`usuarios` (`numBoleta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci
PACK_KEYS = DEFAULT;

CREATE INDEX `fk_materias_seleccionadas_idx` ON `WEB_DBA`.`materia_seleccionadas` (`idMateria_seleccionadas` ASC);

CREATE INDEX `fk_numBoleta_seleccionadas_idx` ON `WEB_DBA`.`materia_seleccionadas` (`numBoleta_seleccionadas` ASC);

DROP TABLE IF EXISTS `WEB_DBA`.`revision_materias` ;

CREATE TABLE IF NOT EXISTS `WEB_DBA`.`revision_materias` (
  `RegistroBool` TINYINT NOT NULL DEFAULT 0,
  `idRegistro` TINYINT NOT NULL,
  `archivos` BLOB NULL,
  PRIMARY KEY (`RegistroBool`),
  CONSTRAINT `fk_revision_materias_1`
    FOREIGN KEY (`idRegistro`)
    REFERENCES `WEB_DBA`.`materia_seleccionadas` (`idRegistro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE INDEX `fk_revision_materias_1_idx` ON `WEB_DBA`.`revision_materias` (`idRegistro` ASC);


DROP TABLE IF EXISTS `WEB_DBA`.`perfil` ;

CREATE TABLE IF NOT EXISTS `WEB_DBA`.`perfil` (
  `idBoleta_perfil` VARCHAR(45) NOT NULL,
  `mensaje_privado` MEDIUMTEXT NULL,
  `mensaje_publico` MEDIUMTEXT NULL,
  PRIMARY KEY (`idBoleta_perfil`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

DROP TABLE IF EXISTS `WEB_DBA`.`mensaje_publico` ;

CREATE TABLE IF NOT EXISTS `WEB_DBA`.`mensaje_publico` (
  `idmensaje_publico` INT NOT NULL,
  `mensaje_publico` MEDIUMTEXT NULL,
  PRIMARY KEY (`idmensaje_publico`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


DROP TABLE IF EXISTS `WEB_DBA`.`mensaje_privado` ;

CREATE TABLE IF NOT EXISTS `WEB_DBA`.`mensaje_privado` (
  `idmensaje_privado` INT NOT NULL,
  `mensaje_privado` MEDIUMTEXT NULL,
  `numBoleta_privado` VARCHAR(45) NULL,
  PRIMARY KEY (`idmensaje_privado`),
  CONSTRAINT `fk_numBoleta_privado`
    FOREIGN KEY (`numBoleta_privado`)
    REFERENCES `WEB_DBA`.`usuarios` (`numBoleta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;

CREATE INDEX `fk_numBoleta_privado_idx` ON `WEB_DBA`.`mensaje_privado` (`numBoleta_privado` ASC);


DROP TABLE IF EXISTS `WEB_DBA`.`mensajes` ;

CREATE TABLE IF NOT EXISTS `WEB_DBA`.`mensajes` (
  `idmensaje_publico_m` INT NULL,
  `idmensaje_privado_m` INT NULL,
  `idBoleta_perfil_m` VARCHAR(45) NULL,
  CONSTRAINT `fk_idmensaje_publico_m`
    FOREIGN KEY (`idmensaje_publico_m`)
    REFERENCES `WEB_DBA`.`mensaje_publico` (`idmensaje_publico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idmensaje_privado_m`
    FOREIGN KEY (`idmensaje_privado_m`)
    REFERENCES `WEB_DBA`.`mensaje_privado` (`idmensaje_privado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idBoleta_perfi_m`
    FOREIGN KEY (`idBoleta_perfil_m`)
    REFERENCES `WEB_DBA`.`perfil` (`idBoleta_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `idmensaje_publico_m_idx` ON `WEB_DBA`.`mensajes` (`idmensaje_publico_m` ASC);

CREATE INDEX `fk_idmensaje_privado_idx` ON `WEB_DBA`.`mensajes` (`idmensaje_privado_m` ASC);

CREATE INDEX `fk_idBoleta_perfi_m_idx` ON `WEB_DBA`.`mensajes` (`idBoleta_perfil_m` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
START TRANSACTION;
USE `WEB_DBA`;
INSERT INTO `WEB_DBA`.`usuarios` (`numBoleta`, `correo`, `contrasea`, `usuario`) VALUES ('2018631571', 'thedjdave98@gmail.com', '123456', 'davidmor');
INSERT INTO `WEB_DBA`.`usuarios` (`numBoleta`, `correo`, `contrasea`, `usuario`) VALUES ('2018631572', 'correotest@gmail.com', '111111', '');
COMMIT;
START TRANSACTION;
USE `WEB_DBA`;
INSERT INTO `WEB_DBA`.`materias_disponibles` (`idMateria`, `materia`, `profesor`, `cupo`, `salon`, `horario`) VALUES (1, 'Base de Datos', 'Erika Rubio', 30, '2cm1', '');
INSERT INTO `WEB_DBA`.`materias_disponibles` (`idMateria`, `materia`, `profesor`, `cupo`, `salon`, `horario`) VALUES (2, 'WEB', 'Leon Montiel', 30, '2cm2', '');
COMMIT;
START TRANSACTION;
USE `WEB_DBA`;
INSERT INTO `WEB_DBA`.`materia_seleccionadas` (`idRegistro`, `idMateria_seleccionadas`, `numBoleta_seleccionadas`) VALUES (1, 1, '2018631571');
INSERT INTO `WEB_DBA`.`materia_seleccionadas` (`idRegistro`, `idMateria_seleccionadas`, `numBoleta_seleccionadas`) VALUES (1, 2, '2018631571');
COMMIT;
START TRANSACTION;
USE `WEB_DBA`;
INSERT INTO `WEB_DBA`.`revision_materias` (`RegistroBool`, `idRegistro`, `archivos`) VALUES (1, 1, NULL);
COMMIT;

