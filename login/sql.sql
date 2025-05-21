-- Create Database
CREATE DATABASE LOJA;

-- Use the database
USE LOJA;

---------- PRODUTO
CREATE TABLE produto (
   id_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   cod_prod VARCHAR(10) UNIQUE,
   descricao VARCHAR(40),
   descricao_resumida VARCHAR(20),
   unidade INT,
   categoria INT,
   valor DOUBLE(5,2),
   IPI DOUBLE(5,2),
   qtde_min INT,
   datcad DATE,
   datalt DATE,
   usuario_cad VARCHAR(20),
   usuario_alt VARCHAR(20)
);

---------- CLIENTE
CREATE TABLE cliente (
    id_cliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30),
    endereco VARCHAR(30),
    bairro VARCHAR(30),
    cidade VARCHAR(30),
    uf VARCHAR(2),
    cep VARCHAR(8),
    celular VARCHAR(20),
    email VARCHAR(30),
    datcad DATE,
    datalt DATE,
    usuario_cad VARCHAR(20),
    usuario_alt VARCHAR(20)
);

--------- TABELA PEDIDO
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

---- TABELA PEDIDO DETALHE
CREATE TABLE pedido_detalhe (
    id_pedido_det INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codprod INT,
    valor DOUBLE(7,2),
    qtde INT,
    ipi DOUBLE(5,2),
    datped DATE,
    numped INT,
    FOREIGN KEY (numped) REFERENCES pedido(id_pedido),
    FOREIGN KEY (codprod) REFERENCES produto(id_produto)
);

-- INSERIR PRODUTO
INSERT INTO produto (cod_prod, descricao, descricao_resumida, unidade, valor, ipi, qtde_min, datcad, datalt, usuario_cad, usuario_alt) 
VALUES ("2", "Camisa Regata", "Camisa Regata", 2, 45.3, 2.4, 10, CURDATE(), CURDATE(), USER(), USER());

-- INSERIR CLIENTE
INSERT INTO cliente (nome, endereco, bairro, cidade, uf, cep, celular, email, datcad, datalt, usuario_cad, usuario_alt) 
VALUES ("Pedro da Silva", "rua do Pedro, 23", "Bar Pedro", "Sao Paulo", "SP", "09203030", "11-32429032", "pedro@email.com", CURDATE(), CURDATE(), USER(), USER());

--- INSERIR DADOS PEDIDO ---
INSERT INTO pedido (datped, numped, codcli, codven, finalizado) 
VALUES 
('2023-11-15', 2, 3, 1, 'P'),
('2024-11-24', 1, 3, 1, 'P'),
('2024-11-20', 1, 3, 1, 'P');

--- TESTANDO ----
SELECT * FROM pedido;
SELECT * FROM pedido WHERE numped = 2;
SELECT p.numped, p.codcli, p.codven, pd.codprod 
FROM pedido p 
INNER JOIN pedido_detalhe pd ON p.numped = pd.numped;

SELECT p.numped, pd.numped, p.codcli, p.codven, pd.codprod 
FROM pedido p 
INNER JOIN pedido_detalhe pd ON p.numped = pd.numped 
WHERE p.numped = 3;

SELECT p.numped, pd.numped, p.codcli, p.codven, pd.codprod 
FROM pedido p 
INNER JOIN pedido_detalhe pd ON p.numped = pd.numped 
WHERE p.numped = 2;

--- PADRÃO PARA COLUNA STATUS
-- P  PROCESSAMENTO
-- C  CANCELADO
-- A  ANALISE
-- L  LIBERADO
-- F  FINALIZADO

--- INSERINDO DADOS EM TABELA PEDIDO_DETALHE ----
INSERT INTO pedido_detalhe (codprod, valor, qtde, ipi, datped, numped) 
VALUES 
(1, 7.50, 5, 3.5, "2023-11-28", 2),
(3, 7.50, 5, 3.5, "2023-11-28", 2),
(5, 7.50, 5, 3.5, "2023-11-28", 2),
(6, 7.50, 5, 3.5, "2023-11-28
CREATE DATABASE LOJA;

-- Use the database
USE LOJA;

---------- PRODUTO
CREATE TABLE produto (
   id_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   cod_prod VARCHAR(10) UNIQUE,
   descricao VARCHAR(40),
   descricao_resumida VARCHAR(20),
   unidade INT,
   categoria INT,
   valor DOUBLE(5,2),
   IPI DOUBLE(5,2),
   qtde_min INT,
   datcad DATE,
   datalt DATE,
   usuario_cad VARCHAR(20),
   usuario_alt VARCHAR(20)
);

---------- CLIENTE
CREATE TABLE cliente (
    id_cliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30),
    endereco VARCHAR(30),
    bairro VARCHAR(30),
    cidade VARCHAR(30),
    uf VARCHAR(2),
    cep VARCHAR(8),
    celular VARCHAR(20),
    email VARCHAR(30),
    datcad DATE,
    datalt DATE,
    usuario_cad VARCHAR(20),
    usuario_alt VARCHAR(20)
);

--------- TABELA PEDIDO
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

---- TABELA PEDIDO DETALHE
CREATE TABLE pedido_detalhe (
    id_pedido_det INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codprod INT,
    valor DOUBLE(7,2),
    qtde INT,
    ipi DOUBLE(5,2),
    datped DATE,
    numped INT,
    FOREIGN KEY (numped) REFERENCES pedido(id_pedido),
    FOREIGN KEY (codprod) REFERENCES produto(id_produto)
);

-- INSERIR PRODUTO
INSERT INTO produto (cod_prod, descricao, descricao_resumida, unidade, valor, ipi, qtde_min, datcad, datalt, usuario_cad, usuario_alt) 
VALUES ("2", "Camisa Regata", "Camisa Regata", 2, 45.3, 2.4, 10, CURDATE(), CURDATE(), USER(), USER());

-- INSERIR CLIENTE
INSERT INTO cliente (nome, endereco, bairro, cidade, uf, cep, celular, email, datcad, datalt, usuario_cad, usuario_alt) 
VALUES ("Pedro da Silva", "rua do Pedro, 23", "Bar Pedro", "Sao Paulo", "SP", "09203030", "11-32429032", "pedro@email.com", CURDATE(), CURDATE(), USER(), USER());

--- INSERIR DADOS PEDIDO ---
INSERT INTO pedido (datped, numped, codcli, codven, finalizado) 
VALUES 
('2023-11-15', 2, 3, 1, 'P'),
('2024-11-24', 1, 3, 1, 'P'),
('2024-11-20', 1, 3, 1, 'P');

--- TESTANDO ----
SELECT * FROM pedido;
SELECT * FROM pedido WHERE numped = 2;
SELECT p.numped, p.codcli, p.codven, pd.codprod 
FROM pedido p 
INNER JOIN pedido_detalhe pd ON p.numped = pd.numped;

SELECT p.numped, pd.numped, p.codcli, p.codven, pd.codprod 
FROM pedido p 
INNER JOIN pedido_detalhe pd ON p.numped = pd.numped 
WHERE p.numped = 3;

SELECT p.numped, pd.numped, p.codcli, p.codven, pd.codprod 
FROM pedido p 
INNER JOIN pedido_detalhe pd ON p.numped = pd.numped 
WHERE p.numped = 2;

--- PADRÃO PARA COLUNA STATUS
-- P  PROCESSAMENTO
-- C  CANCELADO
-- A  ANALISE
-- L  LIBERADO
-- F  FINALIZADO

--- INSERINDO DADOS EM TABELA PEDIDO_DETALHE ----
INSERT INTO pedido_detalhe (codprod, valor, qtde, ipi, datped, numped) 
VALUES 
(1, 7.50, 5, 3.5, "2023-11-28", 2),
(3, 7.50, 5, 3.5, "2023-11-28", 2),
(5, 7.50, 5, 3.5, "2023-11-28", 2),
(6, 7.50, 5, 3.5, "2023-11-28", 2),
(3, 7.50, 5, 3.5, "2023-11-26", 1),
(5, 7.50, 5, 3.5, "2023-11-26", 1);

SELECT * FROM pedido_detalhe;

------- TABELAS COMPLEMENTARES
CREATE TABLE vendedor (
    id_vendedor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30),
    email VARCHAR(30),
    celular VARCHAR(30),
    atuacao VARCHAR(2),
    comissao DOUBLE(7,2),
    status VARCHAR(1)
);

CREATE TABLE observacao (
    id_observacao INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipo_reclamante VARCHAR(1),
    reclamado INT,
    reclamante INT,
    ocorrencia INT,
    observacao VARCHAR(600),
    data DATE,
    retorno VARCHAR(1),
    data_retorno DATE
);

---------------------------------------------------
---- DICAS
-- Para modificar a coluna CEP na tabela cliente
ALTER TABLE cliente MODIFY COLUMN cep VARCHAR(8);

-- Para deletar todos os dados da tabela pedido
DELETE FROM pedido;

---- ALTER TABLE ---
-- Para deletar colunas na tabela pedido_detalhe
-- ALTER TABLE pedido_detalhe DROP nome_coluna1, DROP nome_coluna2;
