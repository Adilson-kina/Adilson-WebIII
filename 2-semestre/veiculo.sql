create database if not exists veiculos;
use veiculos;

create table if not exists automovel
(
  id int auto_increment not null,
  modelo varchar(30) not null,
  ano int(4) not null,
  placa varchar(8) not null,
  data_cadastro date not null,
  unique(placa),
  primary key(id)
)
