create database if not exists login;
use login;

---------- SYSTEM USERS
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

---------- PRODUTO
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

---------- CLIENTE
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
    usuario_alt VARCHAR(20));

--------- Tabela Pedido
CREATE TABLE pedido (id_pedido INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 datped date,
 numped int,
 codcli int,
 codven int,
 finalizado varchar(1),
 numnf int (10),
 datnf date,
 status varchar(1));

---- Tabela Pedido Detalhe
CREATE TABLE pedido_detalhe (id_pedido_det INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      codprod int,
      valor double(7,2),
      qtde int (5),
      ipi double(5,2),
      datped date,
      numped int,
      FOREIGN KEY (numped) REFERENCES pedido(id_pedido),
      FOREIGN KEY (codprod) REFERENCES produto(id_produto));

------- Tabelas complementares
CREATE TABLE vendedor (
    id_vendedor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(30),
    email varchar(30),
    celular varchar(30),
    atuacao varchar(2),
    comissao double(7,2),
    status varchar(1));

CREATE TABLE observacao (
    id_observacao INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipo_reclamente varchar(1),
    reclamado int,
    reclamente int,
    ocorrencia int (3),
    observacao varchar(600),
    data date,
    retorno varchar(1),
    data_retorno date);


-- placeholder data
insert into usuarios (name, login, password, email, recEmail, signDate, active, level) values
("joao", "joao", "$2y$10$hggmlCtlHQLVcC8OrZjl0.xueUFC/D.EsVxlOLVIpXC4kBHVaxh7u", "joaosembraco@gmail.com", "batatassada@gmail.com", "2024-03-04", true, 1);

