-- GRANT USAGE ON *.* TO 'aulaSQL'@localhost IDENTIFIED BY 'pass';

DROP DATABASE empresa;
CREATE DATABASE IF NOT EXISTS empresa;
USE empresa;

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
INSERT INTO departamentos VALUES ("CONTABILIDAD","CONTA","Avinguda Adame, 7, 5º");
INSERT INTO departamentos VALUES ("SECRETARIA","SECRET","Passeig Ferrer, 358, 9º D");


insert into empleados values ("12345678A","Antonio Pérez", 1000,14, "ELCHE","CONTABILIDAD", "h");
insert into empleados values ("34114356C","Héctor Mireles Hijo", 1800, 12,"ELCHE","CONTABILIDAD", "h");
insert into empleados values ("45117356C","Alejandra Carrasco Segundo", 1000, 12,"ELCHE","CONTABILIDAD", "m");
insert into empleados values ("34434336C","Raquel Bonilla", 1800, 12,"ELCHE","SECRETARIA", "m");
insert into empleados values ("34434356C","Yaiza Noriega", 2800, 14,"ELCHE","SECRETARIA", "m");
insert into empleados values ("34434325D","Rafael Suárez", 1800, 12,"ELCHE","SECRETARIA", "h");
insert into empleados values ("12345678B","Juanito Martínez", 1800,14, "ELCHE","ALMACEN", "h");
insert into empleados values ("34314366F","Diana Centeno Hijo", 1800, 12,"ELCHE","ALMACEN", "m");

