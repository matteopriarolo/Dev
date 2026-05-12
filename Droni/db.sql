CREATE DATABASE IF NOT EXISTS DroneRescueLab;
USE DroneRescueLab;

CREATE TABLE tipi_drone (
    id_tipo_drone INT PRIMARY KEY,
    nome_tipo VARCHAR(100),
    descrizione TEXT
);

CREATE TABLE droni (
    id_drone INT PRIMARY KEY,
    nome VARCHAR(100),
    modello VARCHAR(100),
    autonomia_minuti INT,
    peso_massimo_kg DECIMAL(5,2),
    id_tipo_drone INT,
    FOREIGN KEY (id_tipo_drone) REFERENCES tipi_drone(id_tipo_drone)
);

CREATE TABLE piloti (
    id_pilota INT PRIMARY KEY,
    nome VARCHAR(100),
    cognome VARCHAR(100),
    brevetto VARCHAR(100),
    anni_esperienza INT,
    email VARCHAR(100),
    telefono VARCHAR(20)
);

CREATE TABLE zone (
    id_zona INT PRIMARY KEY,
    nome_zona VARCHAR(100),
    comune VARCHAR(100),
    provincia VARCHAR(100),
    tipo_area VARCHAR(100),
    livello_rischio VARCHAR(50)
);

CREATE TABLE clienti (
    id_cliente INT PRIMARY KEY,
    nome_cliente VARCHAR(100),
    tipo_cliente VARCHAR(50),
    telefono VARCHAR(20),
    email VARCHAR(100),
    indirizzo VARCHAR(255)
);

CREATE TABLE missioni (
    id_missione INT PRIMARY KEY,
    titolo VARCHAR(100),
    descrizione TEXT,
    data_missione DATE,
    ora_inizio TIME,
    durata_prevista INT,
    stato_missione VARCHAR(50),
    priorita VARCHAR(50),
    id_drone INT,
    id_pilota INT,
    id_zona INT,
    id_cliente INT,
    FOREIGN KEY (id_drone) REFERENCES droni(id_drone),
    FOREIGN KEY (id_pilota) REFERENCES piloti(id_pilota),
    FOREIGN KEY (id_zona) REFERENCES zone(id_zona),
    FOREIGN KEY (id_cliente) REFERENCES clienti(id_cliente)
);

CREATE TABLE rapporti_missione (
    id_rapporto INT PRIMARY KEY,
    id_missione INT UNIQUE,
    esito VARCHAR(100),
    note_finali TEXT,
    foto_rilevate TEXT,
    problemi_riscontrati TEXT,
    data_rapporto DATE,
    FOREIGN KEY (id_missione) REFERENCES missioni(id_missione)
);

CREATE TABLE utenti (
    id_utente INT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(255),
    ruolo VARCHAR(50)
);