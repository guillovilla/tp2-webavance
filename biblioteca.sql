
CREATE TABLE IF NOT EXISTS `usager` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(45) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `courriel` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 64
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `emprunt` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `date_emprunt` DATE NOT NULL,
  `usager_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_emprunt_usager_idx` (`usager_id` ASC) VISIBLE,
  CONSTRAINT `fk_emprunt_usager`
    FOREIGN KEY (`usager_id`)
    REFERENCES `biblioteque`.`usager` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `livre` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(45) NOT NULL,
  `auteur` VARCHAR(45) NOT NULL,
  `isbn` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `emprunt_livre` (
  `emprunt_id` INT(11) NOT NULL,
  `livre_id` INT(11) NOT NULL,
  `date_retour` DATE NOT NULL,
  PRIMARY KEY (`emprunt_id`, `livre_id`),
  INDEX `fk_emprunt_has_livre_livre1_idx` (`livre_id` ASC) VISIBLE,
  INDEX `fk_emprunt_has_livre_emprunt1_idx` (`emprunt_id` ASC) VISIBLE,
  CONSTRAINT `fk_emprunt_has_livre_emprunt1`
    FOREIGN KEY (`emprunt_id`)
    REFERENCES `biblioteque`.`emprunt` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_emprunt_has_livre_livre1`
    FOREIGN KEY (`livre_id`)
    REFERENCES `biblioteque`.`livre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
