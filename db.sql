
CREATE DATABASE IF NOT EXISTS `scc`;
USE `scc`;

CREATE TABLE IF NOT EXISTS `commento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Monitore` int(11) NOT NULL,
  `Id_Partecipante` int(11) NOT NULL,
  `Data_Creazione` date NOT NULL,
  `Commento` varchar(1000) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descr` varchar(600) NOT NULL,
  `data_inizio` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT IGNORE INTO `evento` (`id`, `nome`, `descr`, `data_inizio`) VALUES
	(1, 'Uscita Andermatt', 'Uscita andermatt posti limitati!', '2020-02-24'),
	(2, 'Settimana di Natale', 'Sttimana di Natale', '2020-12-26'),
	(3, 'Uscita Disentis', 'Uscita a Disentis', '2020-02-20');

CREATE TABLE IF NOT EXISTS `gruppo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Categoria` enum('Snowboard','Sci') NOT NULL DEFAULT 'Sci',
  `Livello` enum('Freestyle','Buoni','Discreti','Iniziati','Mai Messo') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT IGNORE INTO `gruppo` (`Id`, `Categoria`, `Livello`) VALUES
	(1, 'Snowboard', 'Mai Messo'),
	(2, 'Snowboard', 'Iniziati'),
	(3, 'Snowboard', 'Discreti'),
	(4, 'Snowboard', 'Buoni'),
	(5, 'Snowboard', 'Freestyle');

CREATE TABLE IF NOT EXISTS `utente` (
  `Username` varchar(50) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Telefono` varchar(50) DEFAULT '0',
  `Grado` int(11) NOT NULL DEFAULT '0',
  `Anno_Nascita` int(11) NOT NULL,
  `Pass` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT IGNORE INTO `utente` (`Username`, `Nome`, `Cognome`, `Telefono`, `Grado`, `Anno_Nascita`, `Pass`) VALUES
	('mattia.bertoli', 'Mattia', 'Bertoli', '0', 0, 1988, NULL),
	('paolo.guebeli', 'Paolo', 'Guebeli', '078 638 10 54', 0, 2001, '$pcks$64,10000,64$530f8afbc74536b9a963b4f1c4cb738bcea7403d4d606b6e074ec5d3baf39d18$56158864e365bd78f6afda27f9a239bcb3f2b7a4773d4c0d0858c86266119d1e35aae9ca1a4777ed3d85c42caeed0c57cc7e09fe7d152d5d4d4ee08506c2b41a');



CREATE TABLE IF NOT EXISTS `partecipa` (
  `Id_Utente` varchar(50) NOT NULL,
  `Id_Evento` int(11) NOT NULL,
  `Tipo` enum('Libero','Monitore','Aspi','Aiuto','Partecipante') NOT NULL DEFAULT 'Partecipante',
  `Id_Gruppo` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Utente`,`Id_Evento`),
  KEY `Evento` (`Id_Evento`),
  KEY `Gruppo` (`Id_Gruppo`),
  CONSTRAINT `Evento` FOREIGN KEY (`Id_Evento`) REFERENCES `evento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Gruppo` FOREIGN KEY (`Id_Gruppo`) REFERENCES `gruppo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Utente` FOREIGN KEY (`Id_Utente`) REFERENCES `utente` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT IGNORE INTO `partecipa` (`Id_Utente`, `Id_Evento`, `Tipo`, `Id_Gruppo`) VALUES
	('mattia.bertoli', 1, 'Monitore', 4),
	('paolo.guebeli', 1, 'Aiuto', 5);

CREATE TABLE IF NOT EXISTS `phpauth_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` char(39) NOT NULL,
  `expiredate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT IGNORE INTO `phpauth_attempts` (`id`, `ip`, `expiredate`) VALUES
	(6, '192.168.1.22', '2020-07-21 10:52:01'),
	(7, '192.168.1.22', '2020-07-21 10:52:21'),
	(8, '192.168.1.22', '2020-07-21 11:04:52'),
	(9, '192.168.1.22', '2020-07-21 11:05:24'),
	(10, '192.168.1.22', '2020-07-21 11:05:59'),
	(11, '192.168.1.22', '2020-07-21 11:12:34'),
	(12, '192.168.1.22', '2020-07-21 11:12:35'),
	(13, '192.168.1.22', '2020-07-21 11:13:00'),
	(14, '192.168.1.22', '2020-07-21 11:15:19'),
	(15, '192.168.1.22', '2020-07-21 11:15:23'),
	(16, '192.168.1.22', '2020-07-21 11:15:32'),
	(17, '192.168.1.22', '2020-07-21 11:15:52'),
	(18, '192.168.1.22', '2020-07-21 11:17:16'),
	(19, '192.168.1.22', '2020-07-21 11:17:17'),
	(20, '192.168.1.22', '2020-07-21 11:17:58'),
	(21, '192.168.1.22', '2020-07-21 11:18:42'),
	(22, '192.168.1.22', '2020-07-21 11:19:23'),
	(23, '192.168.1.22', '2020-07-21 11:19:44'),
	(24, '192.168.1.22', '2020-07-21 11:20:14'),
	(25, '192.168.1.22', '2020-07-21 11:20:41');

CREATE TABLE IF NOT EXISTS `phpauth_config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  UNIQUE KEY `setting` (`setting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT IGNORE INTO `phpauth_config` (`setting`, `value`) VALUES
	('allow_concurrent_sessions', '0'),
	('attack_mitigation_time', '+30 minutes'),
	('attempts_before_ban', '30'),
	('attempts_before_verify', '5'),
	('bcrypt_cost', '10'),
	('cookie_domain', NULL),
	('cookie_forget', '+30 minutes'),
	('cookie_http', '0'),
	('cookie_name', 'phpauth_session_cookie'),
	('cookie_path', '/'),
	('cookie_remember', '+1 month'),
	('cookie_renew', '+5 minutes'),
	('cookie_secure', '0'),
	('emailmessage_suppress_activation', '0'),
	('emailmessage_suppress_reset', '0'),
	('mail_charset', 'UTF-8'),
	('password_min_score', '3'),
	('recaptcha_enabled', '0'),
	('recaptcha_secret_key', ''),
	('recaptcha_site_key', ''),
	('request_key_expiration', '+10 minutes'),
	('site_activation_page', 'activate'),
	('site_email', 'no-reply@phpauth.cuonic.com'),
	('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
	('site_language', 'en_GB'),
	('site_name', 'PHPAuth'),
	('site_password_reset_page', 'reset'),
	('site_timezone', 'Europe/Paris'),
	('site_url', 'https://github.com/PHPAuth/PHPAuth'),
	('smtp', '0'),
	('smtp_auth', '1'),
	('smtp_debug', '0'),
	('smtp_host', 'smtp.example.com'),
	('smtp_password', 'password'),
	('smtp_port', '25'),
	('smtp_security', NULL),
	('smtp_username', 'email@example.com'),
	('table_attempts', 'phpauth_attempts'),
	('table_emails_banned', 'phpauth_emails_banned'),
	('table_requests', 'phpauth_requests'),
	('table_sessions', 'phpauth_sessions'),
	('table_translations', 'phpauth_translation_dictionary'),
	('table_users', 'phpauth_users'),
	('translation_source', 'php'),
	('verify_email_max_length', '100'),
	('verify_email_min_length', '5'),
	('verify_email_use_banlist', '1'),
	('verify_password_min_length', '3');

CREATE TABLE IF NOT EXISTS `phpauth_emails_banned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `phpauth_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `expire` datetime NOT NULL,
  `type` enum('activation','reset') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `token` (`token`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `phpauth_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `hash` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `phpauth_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
