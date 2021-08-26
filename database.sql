CREATE DATABASE bancoApi;

USE bancoApi;

CREATE TABLE cuenta (
idCuenta INT NOT NULL AUTO_INCREMENT, 
balance INT, 
PRIMARY KEY (idCuenta)
);

CREATE TABLE postCuenta (
idPost INT NOT NULL AUTO_INCREMENT, 
tipo VARCHAR(64),
idCuentaOrigen INT,
idCuentaDestino INT,
PRIMARY KEY (idPost),
FOREIGN KEY (idCuentaOrigen) REFERENCES cuenta(idCuenta);
FOREIGN KEY (idCuentaDestino) REFERENCES cuenta(idCuenta);
);
CREATE TABLE getCuenta
idGet INT NOT NULL AUTO_INCREMENT, 
idCuentaOrigen INT,
PRIMARY KEY (idPost),
FOREIGN KEY (idCuentaOrigen) REFERENCES cuenta(idCuenta);
);