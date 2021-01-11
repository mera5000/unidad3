create database agenda1;
use agenda

create table t_categorias(id int(11) auto_increment not null, nombre varchar(255) not null, descripcion varchar(255) not null, fecha date
                          ,constraint pk_categorias primary key(id));

create table t_agenda(id int(11) auto_increment not null, id_categoria int(11) not null, nombre varchar(255) not null,
                      apellido_paterno varchar(255), apellido_materno varchar(255), telefono varchar(255) not null,
                      email varchar(255) not null, fecha date, constraint pk_agenda primary key(id),
                      constraint fk_categoria foreign key(id_categoria) references t_categorias(id));                        