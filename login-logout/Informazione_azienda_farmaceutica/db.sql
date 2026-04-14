CREATE DATABASE IF NOT EXISTS azienda_farmaceutica;
USE azienda_farmaceutica;

CREATE TABLE IF NOT EXISTS personale (
    CF CHAR(16) PRIMARY KEY,
    Matricola VARCHAR(60),
    Nome VARCHAR(20),
    Cognome VARCHAR(20),
    DataNascita DATE,
    Ruolo VARCHAR(20),
    Ambito VARCHAR(20),
    Psw TEXT
);

CREATE TABLE IF NOT EXISTS professionisti (
    CF CHAR(16) PRIMARY KEY,
    Matricola VARCHAR(60),
    Nome VARCHAR(20),
    Cognome VARCHAR(20),
    DataNascita DATE,
    Ruolo VARCHAR(20),
    Ambito VARCHAR(20),
    Psw TEXT
);

CREATE TABLE IF NOT EXISTS informatori (
    CF CHAR(16) PRIMARY KEY,
    Matricola VARCHAR(60),
    Nome VARCHAR(20),
    Cognome VARCHAR(20),
    DataNascita DATE,
    Ruolo VARCHAR(20),
    Ambito VARCHAR(20),
    Psw TEXT,
    CF_professionista CHAR(16),
    FOREIGN KEY (CF_professionista) REFERENCES professionisti(CF)
);

CREATE TABLE IF NOT EXISTS visite (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    CF_paziente CHAR(16),
    Data_visita DATETIME,
    Luogo VARCHAR(40),
    Svolta DATETIME,
    Fine DATETIME,
    CF_personale CHAR(16),
    FOREIGN KEY (CF_personale) REFERENCES personale(CF)
);