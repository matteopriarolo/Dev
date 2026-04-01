CREATE DATABASE Conti_bancari;
USE Conti_bancari;
create TABLE Conti (
    NumeroConto int AUTO_INCREMENT PRIMARY KEY,
    Cognome varchar(25),
    Nome varchar(25),
    DataNascita date,
    CC varchar(16)
);

create TABLE Movimenti (
    ID int AUTO_INCREMENT PRIMARY KEY,
	DataRegistrazione date,
    Credito boolean,
    Causale varchar(255),
    Importo float,
    NumeroConto int,
    FOREIGN KEY (NumeroConto) REFERENCES Conti(NumeroConto)
)