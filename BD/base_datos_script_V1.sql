CREATE TABLE PERSONA(
	id_persona int primary key AUTO_INCREMENT,
    per_apellido varchar(50),
    per_nombre	varchar(50),
    per_telefono varchar(9),
    per_correo varchar(50)
);

CREATE TABLE ALUMNO(
    id_alumno int PRIMARY KEY AUTO_INCREMENT,
    id_persona int,
    alum_estado_pago varchar(50),
    FOREIGN KEY (id_persona) REFERENCES PERSONA(id_persona) ON UPDATE CASCADE
);

CREATE TABLE INSTRUCTOR(
    id_instructor int PRIMARY KEY AUTO_INCREMENT,
    id_persona int,
    alum_estado_pago varchar(50),
    FOREIGN KEY (id_persona) REFERENCES PERSONA(id_persona) ON UPDATE CASCADE
);

CREATE TABLE ADMINISTRADOR(
    id_administrador int PRIMARY KEY AUTO_INCREMENT,
    admin_correo int,
    admin_contra varchar(50),
    id_persona int,
    FOREIGN KEY (id_persona) REFERENCES PERSONA(id_persona) ON UPDATE CASCADE
);


create table coche(
	id_coche int primary key AUTO_INCREMENT,
	coche_modelo varchar(50) not null,
	coche_tipo varchar(250) not null,
	coche_placa varchar(20) not null,
	coche_marca varchar(20) not null	
);

create table curso
(
id_curso int primary key AUTO_INCREMENT,
cur_nombre varchar(50) not null,
cur_horas varchar(50) not null,
cur_descripcion varchar(50) not null

);


create table programacion
(
id_programacion int primary key AUTO_INCREMENT,
    
id_instructor int,
id_curso int,
id_alumno int,
id_coche int,
    
pro_num_clase varchar(100),
pro_fecha datetime,
pro_descripcion text,
    
FOREIGN KEY (id_instructor) REFERENCES INSTRUCTOR(id_instructor) ON UPDATE CASCADE,
FOREIGN KEY (id_curso) REFERENCES CURSO(id_curso) ON UPDATE CASCADE,
FOREIGN KEY (id_coche) REFERENCES COCHE(id_coche) ON UPDATE CASCADE,
FOREIGN KEY (id_alumno) REFERENCES ALUMNO(id_alumno) ON UPDATE CASCADE

);





