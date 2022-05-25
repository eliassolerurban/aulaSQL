-- GRANT USAGE ON *.* TO 'aulaSQL'@localhost IDENTIFIED BY 'pass';

DROP DATABASE jardineria;
CREATE DATABASE IF NOT EXISTS jardineria;
USE jardineria;

CREATE TABLE departamentos(
    codD VARCHAR(32) PRIMARY KEY,
    nombre VARCHAR(32) NOT NULL,
    direcc VARCHAR(32)
);

CREATE TABLE empleados(
    dni CHAR(9) PRIMARY KEY,
    nomemp VARCHAR(32) UNIQUE NOT NULL,
    salemp FLOAT NOT NULL DEFAULT 900 CHECK (salemp >= 900),
    comisione INT NOT NULL,  
    direcc VARCHAR(32),
    cargoE VARCHAR(32) NOT NULL,
    sexemp enum('h', 'm'),
    CONSTRAINT FK_EMP_DEP FOREIGN KEY (cargoE) REFERENCES departamentos(codD)
);

INSERT INTO departamentos VALUES ("ALMACEN","DEP ALMACEN 2.0","Ruela Barrientos, 04, Bajo 2º");
INSERT INTO departamentos VALUES ("CONTABILIDAD","CONTAWIN","Avinguda Adame, 7, 5º");
INSERT INTO departamentos VALUES ("SECRETARIA","CONTAWIN","Avinguda Adame, 7, 5º");

insert into empleados values ("12345678A","Antonio Pérez", 1000,14, "ELCHE","CONTABILIDAD", "h");
insert into empleados values ("12345678b","Juanito Martínez", 2000,12, "ELCHE","ALMACEN", "h");
insert into empleados values ("12345678c","Juanito Ballesta", 2000, 12,"ELCHE","SECRETARIA", "h");

