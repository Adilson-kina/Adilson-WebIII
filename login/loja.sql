create database if not exists LOJA;
use LOJA;


create table if not exists produto (
   id_produto int not null auto_increment primary key,
   cod_prod varchar(10) UNIQUE,
   descricao varchar(40),
   descricao_resumida varchar(20),
   unidade int(2),
   categoria int(3),
   valor double(5,2),
   IPI double(5,2),
   qtde_min  int,
   datcad date,
   datalt date,
   usuario_cad varchar(20),
   usuario_alt varchar(20)
);

INSERT INTO produto (cod_prod, descricao, descricao_resumida, unidade, valor, ipi, qtde_min, datcad, datalt, usuario_cad, usuario_alt) VALUES 
( "2", "Camisa Regata", "Camisa Regata", 2, 45.3, 2.4, 10, CURDATE(),CURDATE(), USER(),USER() );

CREATE TABLE cliente (
    id_cliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(30),
    endereco varchar(30),
    bairro varchar(30),
    cidade varchar(30),
    uf varchar(2),
    cep varchar(8),
    celular varchar(20),
    email varchar(30),
    datcad date,
    datalt date,
    usuario_cad VARCHAR(20),
    usuario_alt VARCHAR(20)
);

INSERT INTO cliente (nome, endereco, bairro, cidade, uf, cep, celular, email, datcad, datalt, usuario_cad, usuario_alt) VALUES 
("Pedro da Silva", "rua do Pedro, 23", "Bar Pedro", "Sao Paulo", "SP", "09203030","11-32429032","pedro@email.com", CURDATE(), CURDATE(), USER(), USER());

CREATE TABLE pedido (
    id_pedido INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    datped DATE,
    numped INT, 
    codcli INT,
    codven INT,
    finalizado VARCHAR(1),
    numnf INT, 
    datnf DATE,
    status VARCHAR(1)
);

INSERT INTO pedido (datped, numped, codcli, codven, status) VALUES
  ('2023-11-15', 2, 3, 1, 'P'),
  ('2023-11-22', 3, 4, 1, 'P'),
  ('2023-11-18', 5, 6, 2, 'P');


/*
SELECT * FROM pedido;
SELECT * FROM pedido WHERE numped = 2;
SELECT p.numped, pd.numped, p.codcli, p.codven, pd.codprod FROM pedido p INNER JOIN pedido_detalhe pd ON p.numped = pd.numped ;
SELECT p.numped, pd.numped, p.codcli, p.codven, pd.codprod FROM pedido p INNER JOIN pedido_detalhe pd ON p.numped = pd.numped WHERE p.numped=3;
SELECT p.numped, pd.numped, p.codcli, p.codven, pd.codprod FROM pedido p INNER JOIN pedido_detalhe pd ON p.numped = pd.numped WHERE p.numped=2;
*/

CREATE TABLE pedido_detalhe (
    id_pedido_det INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codprod VARCHAR(10), 
    valor DECIMAL(7,2),
    qtde INT,
    ipi DECIMAL(5,2),
    datped DATE,
    numped INT,
    FOREIGN KEY (numped) REFERENCES pedido(numped),
    FOREIGN KEY (codprod) REFERENCES produto(cod_prod)
);

ALTER TABLE pedido_detalhe DROP numped, DROP datped;

DROP TABLE pedido_detalhe;

CREATE TABLE pedido_detalhe (
    id_pedido_det INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codprod INT,
    valor DECIMAL(7,2), 
    qtde INT,            
    ipi DECIMAL(5,2),   
    datped DATE,
    numped INT,
    FOREIGN KEY (numped) REFERENCES pedido(numped),  
    FOREIGN KEY (codprod) REFERENCES produto(codprod)
);



