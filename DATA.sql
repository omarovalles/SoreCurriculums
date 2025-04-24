
use SoreCurriculums;

create table usuario(
id int auto_increment primary key,
nombre varchar(55) not null,
correo varchar(55) not null,
contrasena varchar(55) not null
);

CREATE TABLE curriculum(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    correo_electronico VARCHAR(150),
    telefono VARCHAR(20),
    direccion TEXT,
    ciudad_provincia VARCHAR(100),
    formacion_academica TEXT,
    experiencia_laboral TEXT,
    habilidades_clave TEXT,
    idiomas VARCHAR(200),
    objetivo_profesional TEXT,
    logros_proyectos TEXT,
    disponibilidad VARCHAR(50),
    redes_profesionales TEXT,
    referencias TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    usuarioid int not null,
    
    
    FOREIGN KEY (usuarioid) REFERENCES usuario(id)
);

create table empresa(
	id int auto_increment primary key,
    nombre varchar(55) not null,
    direccion varchar(100) not null,
    usuarioid int not null,
    
	FOREIGN KEY (usuarioid) REFERENCES usuario(id)

);


CREATE TABLE ofertas (
    idoferta INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    requisitos TEXT,
    salario DECIMAL(10,2),
    ubicacion VARCHAR(100),
    tipo_contrato VARCHAR(50),
    fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_cierre DATE,
    empresaid INT NOT NULL,
    
    FOREIGN KEY (empresaid) REFERENCES empresa(id)
);


select u.id,u.nombre from usuario as u join empresa as e on u.id = e.usuarioid;
