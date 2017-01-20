create database bd_recuperaciones;

use bd_recuperaciones;

create table docente(
    rut varchar(12),
    nombre varchar(100),
    activo boolean,
    primary key(rut)
);

insert into docente values('16828943-k','Patricio Nicolás Pérez Pinto', true);
insert into docente values('16564067-5','Julia Fabiola Muñoz Ampuero', true);

create table carrera(
    id int auto_increment,
    nombre varchar(100),
    primary key(id)
);

insert into carrera values(null, 'Construcción Civil');
insert into carrera values(null, 'Ingeniería de Ejecución Agropecuaria');
insert into carrera values(null, 'Ingeniería de Ejecución en Administración');
insert into carrera values(null, 'Ingeniería en Informática');
insert into carrera values(null, 'Ingeniería en Prevención de Riesgos');
insert into carrera values(null, 'Servicio Social');
insert into carrera values(null, 'Técnico en Geominería');
insert into carrera values(null, 'Técnico en Operaciones Mineras');
insert into carrera values(null, 'Técnico en Trabajo Social');
insert into carrera values(null, 'Contabilidad General');
insert into carrera values(null, 'Gastronomía Internacional y Tradicional Chilena');
insert into carrera values(null, 'Preparador Físico');
insert into carrera values(null, 'Prevención de Riesgos');
insert into carrera values(null, 'Técnico Agrícola');
insert into carrera values(null, 'Técnico en Administración');
insert into carrera values(null, 'Técnico en Análisis Químico');
insert into carrera values(null, 'Técnico en Construcciones Civiles');
insert into carrera values(null, 'Técnico en Educación Especial');
insert into carrera values(null, 'Técnico en Educación Parvularia');
insert into carrera values(null, 'Técnico en Enfermería de Nivel Superior');
insert into carrera values(null, 'Técnico en Odontología Mención Higienista Dental');
insert into carrera values(null, 'Técnico en Podología Clínica');
insert into carrera values(null, 'Técnico en Veterinaria y Producción Pecuaria');
insert into carrera values(null, 'Topografía');

create table recuperacion(
    id int auto_increment,
    docente varchar(12),
    carrera varchar(100),
    asignatura varchar(100),
    seccion int,
    fechaAusencia date,
    motivo varchar(100),
    fechaRecuperacion date,
    horario varchar(20),
    horas int,
    sala varchar(100),
    infoExtra varchar(150),
    fecha datetime,
    primary key(id),
    foreign key(docente) references docente(rut)
);
