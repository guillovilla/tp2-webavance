
CREATE TABLE IF NOT EXISTS `usager` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(45) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `courriel` VARCHAR(45) NOT NULL,
  `avatar` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `emprunt` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `date_emprunt` DATE NOT NULL,
  `usager_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_emprunt_usager_idx` (`usager_id` ASC) VISIBLE,
  CONSTRAINT `fk_emprunt_usager`
    FOREIGN KEY (`usager_id`)
    REFERENCES `biblioteque`.`usager` (`id`)
    ON DELETE CASCADE);


CREATE TABLE IF NOT EXISTS `livre` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(45) NOT NULL,
  `auteur` VARCHAR(45) NOT NULL,
  `isbn` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));



CREATE TABLE IF NOT EXISTS `emprunt_livre` (
  `emprunt_id` INT(11) NOT NULL,
  `livre_id` INT(11) NOT NULL,
  `date_retour` DATE NOT NULL,
  PRIMARY KEY (`emprunt_id`, `livre_id`),
  INDEX `fk_emprunt_has_livre_livre1_idx` (`livre_id` ASC),
  INDEX `fk_emprunt_has_livre_emprunt1_idx` (`emprunt_id` ASC),
  CONSTRAINT `fk_emprunt_has_livre_emprunt1`
    FOREIGN KEY (`emprunt_id`)
    REFERENCES `biblioteque`.`emprunt` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_emprunt_has_livre_livre1`
    FOREIGN KEY (`livre_id`)
    REFERENCES `biblioteque`.`livre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `privilege` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `privilege` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `tempPassword` VARCHAR(45) NULL DEFAULT NULL,
  `privilege_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  INDEX `fk_user_privilege1_idx` (`privilege_id` ASC),
  CONSTRAINT `fk_user_privilege1`
    FOREIGN KEY (`privilege_id`)
    REFERENCES `ecommerce`.`privilege` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
