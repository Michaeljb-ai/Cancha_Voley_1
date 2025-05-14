create DATABASE canchas_alquiler;
USE canchas_alquiler;

-- Crear la tabla de roles
CREATE TABLE tb_rol (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(50) NOT NULL UNIQUE
);

-- Insertar roles predeterminados
INSERT INTO tb_rol (nombre_rol) VALUES
('admin'),
('cliente');

-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_rol INT NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_rol) REFERENCES tb_rol(id_rol) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Insertar usuarios de ejemplo
INSERT INTO usuarios (nombre, email, usuario, password, id_rol) VALUES
('Admin', 'admin@example.com', 'admin', 'admin123', 1),
('Juan Maicol', 'juan@example.com', 'juan', 'juan123', 2),
('Maria Mercedes', 'maria@example.com', 'maria', 'maria123', 2);

CREATE TABLE tb_cliente(
id_cliente int primary key auto_increment,
dni int(8) unique,
nombre varchar(30) null,
apellido varchar(30) null,
correo varchar(30) unique,
estado enum("Activo","Desactivo") default "Activo",
contrasena varchar(50) null,
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO tb_cliente (nombre, correo, contrasena) VALUES
('Carlos Pérez', 'juan@example.com', 'peres123'),
('Rosalinda López', 'maria@example.com', 'rosa123');