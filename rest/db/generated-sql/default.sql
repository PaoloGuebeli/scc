
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
