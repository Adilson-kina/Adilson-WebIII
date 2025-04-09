create database if not exists login;
use login;

create table usuarios (
  id int not null auto_increment,
  name varchar(40) not null,
  login varchar(40),
  password varchar(128) not null,
  email varchar(40) not null,
  recEmail varchar(40),
  signDate date,
  active bool,
  level int,
  primary key (id)
);

insert into usuarios (name, login, password, email, recEmail, signDate, active, level) values
("joao", "joao", "1234", "joaosembraco@gmail.com", "batatassada@gmail.com", "2024-03-04", true, 1);
