create database LOJA;
USE LOJA;

CREATE TABLE produto (
   id_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   cod_prod VARCHAR(10) UNIQUE,
   descricao VARCHAR(40),
   descricao_resumida VARCHAR(20),
   unidade INT(2),
   categoria int(3),
   valor DOUBLE(5,2),
   IPI DOUBLE(5,2),
   qtde_min  INT,
   datcad DATE,
   datalt DATE,
   usuario_cad VARCHAR(20),
   usuario_alt VARCHAR(20));