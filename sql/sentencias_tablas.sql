-- Creación de la base de datos
CREATE DATABASE PunoDeTierraDataBase;

-- Usar la base de datos
USE PunoDeTierraDataBase;

-- Creación de la tabla Usuario
CREATE TABLE Usuario (
  UsuarioID INT AUTO_INCREMENT,
  Rol VARCHAR(255),
  Correo VARCHAR(255),
  Nombre VARCHAR(255),
  Celular VARCHAR(20),
  Direccion VARCHAR(255),
  Contraseña VARCHAR(255),
  PRIMARY KEY (UsuarioID)
);

-- Creación de la tabla Evento
CREATE TABLE Evento (
  EventoID INT AUTO_INCREMENT,
  -- Fecha DATE,
  Dia VARCHAR(255),
  Mes VARCHAR(255),
  Anio VARCHAR(255), 
  Hora_inicio VARCHAR(255),
  Hora_termino VARCHAR(255),
  Horas_extra VARCHAR(255),
  Fecha_generaContrato DATE,
  Ludoteca VARCHAR(255),
  Futbolito VARCHAR(255),
  Balcon VARCHAR(255),
  Costo_total VARCHAR(255),
  Costo_restante VARCHAR(255),
  UsuarioID INT,
  PRIMARY KEY (EventoID),
  FOREIGN KEY (UsuarioID) REFERENCES Usuario(UsuarioID) ON DELETE CASCADE ON UPDATE CASCADE
);
