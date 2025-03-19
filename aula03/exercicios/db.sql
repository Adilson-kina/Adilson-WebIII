create database if not exists escola;
use escola;

create table if not exists alunos(
  ra varchar(20),
  nome varchar(20),
  endereco varchar(40),
  curso varchar(40)
);
