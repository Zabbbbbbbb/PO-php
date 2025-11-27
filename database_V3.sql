CREATE TABLE `folders` (
  `paginas` varchar(255),
  `titel` varchar(255) PRIMARY KEY,
  `eigenaar` varchar(255)
);

CREATE TABLE `pagina` (
  `titelpagina` varchar(255) PRIMARY KEY,
  `square1_type` varchar(255),
  `square2_type` varchar(255),
  `square3_type` varchar(255),
  `square4_type` varchar(255),
  `square1_inhoud` varchar(255),
  `square2_inhoud` varchar(255),
  `square3_inhoud` varchar(255),
  `square4_inhoud` varchar(255),
  `eigenaar` varchar(255)
);

CREATE TABLE `afbeeldingen` (
  `titel` varchar(255) PRIMARY KEY,
  `data` longblob,
  `eigenaar` varchar(255)
);

CREATE TABLE `account` (
  `naam` varchar(255) PRIMARY KEY,
  `wachtwoord` varchar(255),
  `pfp` varchar(255),
  `moderator` bool,
  `moderator_application` bool,
  `private` bool
);

ALTER TABLE `folders` ADD FOREIGN KEY (`eigenaar`) REFERENCES `account` (`naam`);

ALTER TABLE `pagina` ADD FOREIGN KEY (`eigenaar`) REFERENCES `account` (`naam`);

ALTER TABLE `afbeeldingen` ADD FOREIGN KEY (`eigenaar`) REFERENCES `account` (`naam`);
