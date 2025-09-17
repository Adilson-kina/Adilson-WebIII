create database if not exists automoveis;
use automoveis;

create table if not exists veiculos(
  id int auto_increment primary key not null,
  modelo varchar(30) not null,
  ano int(4) not null,
  placa varchar(10) unique not null,
  data_cadastro date not null
);

-- Modificacao 20/08
alter table veiculos
add column valor double(10, 2) not null,
add column cor varchar(15) not null;

-- Modificacao 03/09
alter table veiculos
add column seguro bool not null,
add column documento int(2) not null,
add column ocorrencia int(2) not null,
add column bloqueio int(1) not null; -- por que aqui int e em cima bool?


-- Aparentemente int(numero) esta deprecado
-- https://dev.mysql.com/doc/relnotes/mysql/8.0/en/news-8-0-17.html#mysqld-8-0-17-deprecation-removal
