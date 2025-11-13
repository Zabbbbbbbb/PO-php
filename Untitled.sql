CREATE TABLE `folders` (
  `paginas` varchar(255),
  `titel` varchar(255) PRIMARY KEY,
  `eigenaar` varchar(255)
);

CREATE TABLE `pagina` (
  `titelpagina` varchar(255) PRIMARY KEY,
  `Inhoud` varchar(255),
  `afbeeldingen_posities` varchar(255),
  `eigenaar` varchar(255)
);

CREATE TABLE `account` (
  `naam` varchar(255) PRIMARY KEY,
  `wachtwoord` varchar(255),
  `moderator` bool
);

ALTER TABLE `folders` ADD FOREIGN KEY (`eigenaar`) REFERENCES `account` (`naam`);

ALTER TABLE `pagina` ADD FOREIGN KEY (`eigenaar`) REFERENCES `account` (`naam`);
