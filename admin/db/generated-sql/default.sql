
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- commento
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `commento`;

CREATE TABLE `commento`
(
    `Id` INTEGER NOT NULL AUTO_INCREMENT,
    `Id_Monitore` INTEGER NOT NULL,
    `Id_Partecipante` INTEGER NOT NULL,
    `Data_Creazione` DATE NOT NULL,
    `Commento` VARCHAR(1000) NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- evento
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `evento`;

CREATE TABLE `evento`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(50) NOT NULL,
    `descr` VARCHAR(600) NOT NULL,
    `data_inizio` DATE NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `nome` (`nome`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- gruppo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `gruppo`;

CREATE TABLE `gruppo`
(
    `Id` INTEGER NOT NULL AUTO_INCREMENT,
    `Categoria` enum('Snowboard','Sci') DEFAULT 'Sci' NOT NULL,
    `Livello` enum('Freestyle','Buoni','Discreti','Iniziati','Mai Messo') NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- partecipa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `partecipa`;

CREATE TABLE `partecipa`
(
    `Id_Utente` VARCHAR(50) NOT NULL,
    `Id_Evento` INTEGER NOT NULL,
    `Tipo` enum('Libero','Monitore','Aspi','Aiuto','Partecipante') DEFAULT 'Partecipante' NOT NULL,
    `Id_Gruppo` INTEGER,
    PRIMARY KEY (`Id_Utente`,`Id_Evento`),
    INDEX `Evento` (`Id_Evento`),
    INDEX `Gruppo` (`Id_Gruppo`),
    CONSTRAINT `Evento`
        FOREIGN KEY (`Id_Evento`)
        REFERENCES `evento` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `Gruppo`
        FOREIGN KEY (`Id_Gruppo`)
        REFERENCES `gruppo` (`Id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `Utente`
        FOREIGN KEY (`Id_Utente`)
        REFERENCES `utente` (`Username`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- phpauth_attempts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `phpauth_attempts`;

CREATE TABLE `phpauth_attempts`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `ip` CHAR(39) NOT NULL,
    `expiredate` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `ip` (`ip`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- phpauth_config
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `phpauth_config`;

CREATE TABLE `phpauth_config`
(
    `setting` VARCHAR(100) NOT NULL,
    `value` VARCHAR(100),
    UNIQUE INDEX `setting` (`setting`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- phpauth_emails_banned
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `phpauth_emails_banned`;

CREATE TABLE `phpauth_emails_banned`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `domain` VARCHAR(100),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- phpauth_requests
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `phpauth_requests`;

CREATE TABLE `phpauth_requests`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `uid` INTEGER NOT NULL,
    `token` CHAR(20) NOT NULL,
    `expire` DATETIME NOT NULL,
    `type` enum('activation','reset') NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `type` (`type`),
    INDEX `token` (`token`),
    INDEX `uid` (`uid`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- phpauth_sessions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `phpauth_sessions`;

CREATE TABLE `phpauth_sessions`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `uid` INTEGER NOT NULL,
    `hash` CHAR(40) NOT NULL,
    `expiredate` DATETIME NOT NULL,
    `ip` VARCHAR(39) NOT NULL,
    `agent` VARCHAR(200) NOT NULL,
    `cookie_crc` CHAR(40) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- phpauth_users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `phpauth_users`;

CREATE TABLE `phpauth_users`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(100),
    `password` VARCHAR(255),
    `isactive` TINYINT(1) DEFAULT 0 NOT NULL,
    `dt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `email` (`email`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- utente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `utente`;

CREATE TABLE `utente`
(
    `Username` VARCHAR(50) NOT NULL,
    `Nome` VARCHAR(50) NOT NULL,
    `Cognome` VARCHAR(50) NOT NULL,
    `Telefono` VARCHAR(50) DEFAULT '0',
    `Grado` INTEGER DEFAULT 0 NOT NULL,
    `Anno_Nascita` INTEGER NOT NULL,
    `Pass` VARCHAR(500),
    PRIMARY KEY (`Username`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
