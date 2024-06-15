/* ===== CREANDO LA BASE DE DARTOS ===== */

create database if not exists sis_presupuestos default character set latin1 collate latin1_swedish_ci;
use sis_presupuestos;

/* ===== CREANDO TABLA DE USUARIOS ===== */

create table usuario(
    id int(11) not null primary key auto_increment,
    nombre varchar(200) not null,
    usuario varchar(200) not null,
    password varchar(200) not null,
    perfil varchar(100) not null,
    estado int(11) not null default 1,
    ultimo_login datetime not null,
    fecha timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
) engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA DE CONTACTO DE CLIENTE ===== */

create table contacto_cliente(
    id_contacto int(11) not null primary key auto_increment,
    nombre_contacto varchar(150) not null,
    apellidos_contacto varchar(200) not null,
    telefono_contacto varchar(12) not null,
    correo_contacto varchar(150) not null,
    fecha_contacto timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA DE EMPRESA ===== */

create table empresa(
    id_empresa int(11) not null primary key auto_increment,
    nombre_empresa varchar(200) not null,
    ruc_empresa varchar(200) not null,
    direccion_empresa varchar(200) not null,
    telefono_empresa varchar(12) not null,
    correo_empresa varchar(200) not null,
    fecha_empresa timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;


create table proveedor(
    id_proveedor int(11) not null primary key auto_increment,
    nombre_proveedor varchar(150) not null,
    telefono_proveedor varchar(12) not null,
    correo_proveedor varchar(100) not null,
    direccion_proveedor varchar(200) not null,
    fecha_proveedor timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA DE CLIENTE ===== */

create table cliente(
    id_cliente int(11) not null primary key auto_increment,
    nombre_cliente varchar(200) not null,
    telefono_cliente varchar(12) not null,
    correo_cliente varchar(150) not null,
    contacto_em_cliente varchar(12),
    fecha_cliente timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA DE PROYECTO ===== */

create table proyecto(
    id_proyecto int(11) not null primary key auto_increment,
    id_cliente int(11) not null,
    nombre_proyecto varchar(200) not null,
    ubicacion_proyecto varchar(200) not null,
    fecha_proyecto datetime not null,
    descri_proyecto text not null,
    foreign key(id_cliente) references cliente(id_cliente) on update cascade on delete cascade
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA DE MATERIAL ===== */

create table material(
    id_material int(11) not null primary key auto_increment,
    id_proveedor int(11) not null,
    nombre_material varchar(200) not null,
    tipo_material varchar(150) not null,
    marca_material varchar(150) not null,
    cantidad_material int(11) not null,
    precio_compra_material varchar(50) not null,
    precio_venta_material varchar(50) not null,
    fecha_material timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    foreign key(id_proveedor) references proveedor(id_proveedor) on update cascade on delete cascade
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA DE TRABAJADOR ===== */

create table trabajador(
    id_trabajador int(11) not null primary key auto_increment,
    nombre_trabajador varchar(200) not null,
    especialidad_trabajador varchar(150) not null,
    dni_trabajador char(8) not null,
    telefono_trabajador varchar(12) not null,
    funcion_trabajador varchar(150) not null,
    tiempo_trab_trabajador int(11) not null,
    sueldo_men_trabajador varchar(50) not null,
    sueldo_sem_trabajador varchar(50) not null,
    sueldo_dia_trabajador varchar(50) not null,
    sueldo_proyecto varchar(50) not null,
    fecha_trabajador timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA PRESUPUESTO MATERIALES ===== */

create table pres_materiales(
    id_pres_mat int(11) not null primary key auto_increment,
    id_proyecto int(11) not null,
    id_material int(11) not null,
    cantidad_utilizada int(11) not null,
    costo_total varchar(50) not null,
    fecha_pres_materiales timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    foreign key(id_proyecto) references proyecto(id_proyecto) on update cascade on delete cascade,
    foreign key(id_material) references material(id_material) on update cascade on delete cascade
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA PRESUPUESTO TRABAJADORES ===== */

create table pres_trabajadores(
    id_pres_trab int(11) not null primary key auto_increment,
    id_proyecto int(11) not null,
    id_trabajador int(11) not null,
    tiempo_trabajo varchar(50) not null,
    sueldo_acordado varchar(50) not null,
    cantidad_tiempo int(11) not null,
    costo_total_trab varchar(50) not null,
    fecha_pres_traba timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    foreign key(id_proyecto) references proyecto(id_proyecto) on update cascade on delete cascade,
    foreign key(id_trabajador) references trabajador(id_trabajador) on update cascade on delete cascade
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA DE TERRENO ===== */

create table terreno(
    id_terreno int(11) not null primary key auto_increment,
    id_proyecto int(11) not null,
    medida varchar(50) not null,
    precio varchar(50) not null,
    total varchar(50) not null,
    fecha_pres_traba timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    foreign key(id_proyecto) references proyecto(id_proyecto) on update cascade on delete cascade
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA DE EQUIPOS Y MAQUINARIAS ===== */

create table equipo_maqui(
    id_em int(11) not null primary key auto_increment,
    nombre_em varchar(200) not null,
    tipo_em varchar(100) not null,
    cantidad_em int(11) not null,
    modelo_em varchar(30) not null,
    ultimo_uso_em datetime not null,
    id_trabajador int(11) not null,
    foreign key(id_trabajador) references trabajador(id_trabajador) on update cascade on delete cascade
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

/* ===== CREANDO TABLA DE PRESUPUESTO FINAL ===== */

create table presupuesto(
    id_presu int(11) not null primary key auto_increment,
    id_proyecto int(11) not null,
    porcentaje_ganancia varchar(50) not null,
    costo_parcial varchar(50) not null,
    costo_final varchar(50) not null,
    fecha_presupuesto timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    foreign key(id_proyecto) references proyecto(id_proyecto) on update cascade on delete cascade
)engine=InnoDB default charset=utf8 collate=utf8_spanish_ci;

