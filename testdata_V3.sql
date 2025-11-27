-- Testdata voor tabel: account
INSERT INTO `account` (`naam`, `wachtwoord`, `pfp`,`moderator`, `moderator_application`, `private`) VALUES
('admin', 'admin123', 'rusty axe', TRUE, TRUE, TRUE),
('johan', 'wachtwoord1', 'shiny axe', FALSE, TRUE, TRUE),
('emma', '1234', 'goblin', FALSE, FALSE, TRUE),
('sophie', 'securepass', 'sun', TRUE, TRUE, FALSE),
('milan', 'test123', 'goblin', FALSE, TRUE, TRUE);

-- Testdata voor tabel: folders
INSERT INTO `folders` (`paginas`, `titel`, `eigenaar`) VALUES
('home,about,contact', 'Website Hoofdfolder', 'admin'),
('portfolio,cv,projecten', 'Persoonlijke Pagina Johan', 'johan'),
('blog1,blog2,blog3', 'Blog Collectie Emma', 'emma'),
('handleiding,voorwaarden', 'Documentatie', 'sophie'),
('recept1,recept2', 'Kookmap Milan', 'milan');

-- Testdata voor tabel: afbeeldingen
INSERT INTO `afbeeldingen` (`titel`, `data`, `eigenaar`) VALUES
('foto1', 0x89504E470D0A1A0A0000000D49484452000000010000000108060000001F15C4890000000A49444154789C636000000200010005FE02FEA7E64FBA0000000049454E44AE426082, 'admin'),
('foto2', 0x89504E470D0A1A0A0000000D494844520000000100000001080200000090F4FA0B0000000A49444154789C636000000200010005FE02FEA7E64FBA0000000049454E44AE426082, 'johan'),
('foto3', 0x89504E470D0A1A0A0000000D49484452000000010000000108030000006E21D4060000000A49444154789C636000000200010005FE02FEA7E64FBA0000000049454E44AE426082, 'emma'),
('cvfoto', 0x89504E470D0A1A0A0000000D4948445200000001000000010804000000A7D3E1F90000000A49444154789C636000000200010005FE02FEA7E64FBA0000000049454E44AE426082, 'johan'),
('afbeelding1', 0x89504E470D0A1A0A0000000D4948445200000001000000010805000000B2C7E9FA0000000A49444154789C636000000200010005FE02FEA7E64FBA0000000049454E44AE426082, 'sophie'),
('pdficoon', 0x89504E470D0A1A0A0000000D4948445200000001000000010806000000C3D4E7F90000000A49444154789C636000000200010005FE02FEA7E64FBA0000000049454E44AE426082, 'sophie');

-- Testdata voor tabel: pagina
INSERT INTO `pagina` (`titelpagina`, `square1_type`, `square2_type`, `square3_type`, `square4_type`, `square1_inhoud`, `square2_inhoud`, `square3_inhoud`, `square4_inhoud`, `eigenaar`) VALUES
('about', 'text', 'text', 'image', 'image', 'Dit is de about-pagina van onze site.', 'Hier lees je meer over wie we zijn.', 'teamfoto', 'kantoorgebouw', 'emma'),
('contact', 'image', 'text', 'text', 'image', 'kaart-locatie', 'Neem gerust contact met ons op.', 'We reageren meestal binnen 24 uur.', 'telefoon-icoon', 'johan'),
('galerij', 'image', 'image', 'image', 'text', 'landschap1', 'stad2', 'dierenfoto3', 'Welkom in de galerij! Bekijk onze mooiste beelden.', 'milan'),
('nieuws', 'text', 'image', 'text', 'image', 'Welkom bij het laatste nieuws.', 'breaking-news-foto', 'Hier verzamelen we updates en artikelen.', 'krant-icoon', 'admin'),
('services', 'text', 'text', 'image', 'text', 'Onze diensten zijn gericht op kwaliteit.', 'We bieden meerdere opties aan.', 'service-icon', 'Neem contact op voor meer informatie.', 'sophie');
