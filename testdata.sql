-- Testdata voor tabel: account
INSERT INTO `account` (`naam`, `wachtwoord`, `moderator`) VALUES
('admin', 'admin123', TRUE),
('johan', 'wachtwoord1', FALSE),
('emma', '1234', FALSE),
('sophie', 'securepass', TRUE),
('milan', 'test123', FALSE);

-- Testdata voor tabel: folders
INSERT INTO `folders` (`paginas`, `titel`, `eigenaar`) VALUES
('home,about,contact', 'Website Hoofdfolder', 'admin'),
('portfolio,cv,projecten', 'Persoonlijke Pagina Johan', 'johan'),
('blog1,blog2,blog3', 'Blog Collectie Emma', 'emma'),
('handleiding,voorwaarden', 'Documentatie', 'sophie'),
('recept1,recept2', 'Kookmap Milan', 'milan');

-- Testdata voor tabel: pagina
INSERT INTO `pagina` (`titelpagina`, `Inhoud`, `afbeeldingen_posities`, `eigenaar`) VALUES
('home', 'Welkom op de homepage!', 'banner:top,logo:left', 'admin'),
('about', 'Over ons bedrijf en missie.', 'foto1:right', 'admin'),
('contact', 'Neem contact met ons op via e-mail of telefoon.', 'icon:top', 'admin'),

('portfolio', 'Bekijk mijn werk en projecten.', 'foto1:left,foto2:right', 'johan'),
('cv', 'Mijn opleidingen en ervaring.', 'cvfoto:top', 'johan'),
('projecten', 'Overzicht van lopende projecten.', 'schema:bottom', 'johan'),

('blog1', 'Eerste blog over reizen.', 'foto1:top', 'emma'),
('blog2', 'Tweede blog over koken.', 'foto2:left', 'emma'),
('blog3', 'Derde blog over programmeren.', 'foto3:right', 'emma'),

('handleiding', 'Stappenplan voor installatie.', 'afbeelding1:top', 'sophie'),
('voorwaarden', 'Gebruiksvoorwaarden van de site.', 'pdficoon:right', 'sophie'),

('recept1', 'Pasta met pesto recept.', 'foto1:left', 'milan'),
('recept2', 'Brownies recept.', 'foto2:top', 'milan');
