CREATE azienda_farmaceutica IF NOT EXISTS;
USE azienda_farmaceutica;

create TABLE personale (
    CF CHARACTER(16) PRIMARY KEY,
    Matricola varchar(60),
    Nome varchar(20),
    Cognome varchar(20),
    DataNascita date,
    Ruolo varchar(20),
    Ambito varchar(20),
    Psw text
);

CREATE TABLE visite (
    ID int PRIMARY KEY AUTO_INCREMENT,
    ID_paziente int,
    Data_visita datetime,
    Luogo varchar(40),
    Svolta datetime,
    Fine datetime,
    
    CF_personale int,
    FOREIGN KEY (CF_personale) REFERENCES personale(CF)
);

CREATE TABLE professionisti (
    CF CHARACTER(16) PRIMARY KEY,
    Matricola varchar(60),
    Nome varchar(20),
    Cognome varchar(20),
    DataNascita date,
    Ruolo varchar(20),
    Ambito varchar(20),
    Psw text
);

CREATE TABLE informatori (
    CF CHARACTER(16) PRIMARY KEY,
    Matricola varchar(60),
    Nome varchar(20),
    Cognome varchar(20),
    DataNascita date,
    Ruolo varchar(20),
    Ambito varchar(20),
    Psw text
)
    