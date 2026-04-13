CREATE DATABASE villaggio_turistico;
USE villaggio_turistico;

CREATE TABLE Personale (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(20),
    Cognome VARCHAR(20),
    Data_nascita DATE,
    CC VARCHAR(16),
    Madrelingua VARCHAR(20),
    Seconda_lingua VARCHAR(20)
);

CREATE TABLE Villaggi (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Localita VARCHAR(20),
    Denominazione VARCHAR(20),
    Descrizione VARCHAR(200)
);
CREATE TABLE Ruoli (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(20),
    Descrizione VARCHAR(20)
);

CREATE TABLE Contratti (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Inizio DATETIME,
    Fine DATETIME,
    Stipendio FLOAT,
    Descrizione VARCHAR(20),
    ID_Personale INT,
    ID_Villaggio INT,
    ID_Ruolo INT,
    FOREIGN KEY (ID_Personale) REFERENCES Personale(ID),
    FOREIGN KEY (ID_Villaggio) REFERENCES Villaggi(ID),
    FOREIGN KEY (ID_Ruolo) REFERENCES Ruoli(ID)
);



INSERT INTO Personale (Nome, Cognome, Data_nascita, CC, Madrelingua, Seconda_lingua) VALUES
('Marco', 'Rossi', '1990-05-15', 'RSSMRC90E15H501Z', 'Italiano', 'Inglese'),
('Giulia', 'Bianchi', '1995-09-20', 'BNCHGL95P60L219J', 'Italiano', 'Francese'),
('Hans', 'Müller', '1988-12-02', 'MLLHNS88T02Z112G', 'Tedesco', 'Italiano'),
('Elena', 'Verdi', '1992-03-10', 'VRDLNE92C50F205K', 'Italiano', 'Spagnolo');


INSERT INTO Villaggi (Localita, Denominazione, Descrizione) VALUES
('Olbia', 'Smeraldo Village', 'Resort di lusso fronte mare con accesso privato alla spiaggia.'),
('Garda', 'Lago Blu Resort', 'Immerso nel verde delle colline del Garda, ideale per famiglie.'),
('Cortina', 'Alte Cime Lodge', 'Villaggio invernale situato a pochi passi dai principali impianti sciistici.');

INSERT INTO Ruoli (Nome, Descrizione) VALUES
('Animatore', 'Intrattenimento'),
('Cuoco', 'Servizio Cucina'),
('Receptionist', 'Accoglienza Ospiti'),
('Manutentore', 'Gestione Tecnica');

INSERT INTO Contratti (Inizio, Fine, Stipendio, Descrizione, ID_Personale, ID_Villaggio, ID_Ruolo) VALUES
('2024-06-01 09:00:00', '2024-08-31 18:00:00', 1500.50, 'Stagionale Estivo', 1, 1, 1),
('2024-06-01 08:30:00', '2024-09-15 17:30:00', 1800.00, 'Responsabile Cucina', 2, 1, 2),
('2023-12-01 09:00:00', '2024-03-31 18:00:00', 1650.00, 'Stagionale Inverno', 3, 3, 3),
('2024-05-01 08:00:00', '2024-10-31 17:00:00', 1400.00, 'Tuttofare', 4, 2, 4);