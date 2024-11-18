create database sistema_login;
use sistema_login;

create table usuario (
    id_usuario int primary key auto_increment,
    nome varchar(80) not null,
    data_nascimento date not null,
    email varchar (100) not null unique,
    senha varchar (90),
    endereco text
);