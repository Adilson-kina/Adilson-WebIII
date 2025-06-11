CREATE DATABASE IF NOT EXISTS loja;
USE loja;

-- 1) Parent tables first ---------------------------------------------------

CREATE TABLE cliente (
  id_cliente   INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  endereco     VARCHAR(30),
  bairro       VARCHAR(30),
  cidade       VARCHAR(30),
  uf           VARCHAR(2),
  cep          VARCHAR(8),
  celular      VARCHAR(20),
  datcad       DATE,
  datalt       DATE
) ENGINE=InnoDB;

CREATE TABLE vendedor (
  id_vendedor  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  celular      VARCHAR(30),
  atuacao      VARCHAR(2),
  comissao     DOUBLE(7,2),
  status       VARCHAR(1)
) ENGINE=InnoDB;

-- 2) Now the usuarios table can safely reference cliente & vendedor --------

CREATE TABLE usuarios (
  name            VARCHAR(40) NOT NULL,
  login           VARCHAR(40) NOT NULL PRIMARY KEY,
  password        VARCHAR(128) NOT NULL,
  email           VARCHAR(40) NOT NULL,
  recEmail        VARCHAR(40),
  signDate        DATE,
  active          BOOL,
  level           INT, 
  id_cliente_fk   INT,
  id_vendedor_fk  INT,
  CONSTRAINT fk_cliente  FOREIGN KEY (id_cliente_fk)  REFERENCES cliente(id_cliente),
  CONSTRAINT fk_vendedor FOREIGN KEY (id_vendedor_fk) REFERENCES vendedor(id_vendedor)
) ENGINE=InnoDB;

-- 3) The rest of your tables -----------------------------------------------

CREATE TABLE produto (
  id_produto         INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  cod_prod           VARCHAR(10) UNIQUE,
  descricao          VARCHAR(40),
  descricao_resumida VARCHAR(20),
  unidade            INT(2),
  categoria          INT(3),
  valor              DOUBLE(5,2),
  ipi                DOUBLE(5,2),
  qtde_min           INT,
  datcad             DATE,
  datalt             DATE,
  usuario_cad        VARCHAR(20),
  usuario_alt        VARCHAR(20)
) ENGINE=InnoDB;

CREATE TABLE pedido (
  id_pedido  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  datped     DATE,
  numped     INT,
  codcli     INT,
  codven     INT,
  finalizado VARCHAR(1),
  numnf      INT(10),
  datnf      DATE,
  status     VARCHAR(1)
) ENGINE=InnoDB;

CREATE TABLE pedido_detalhe (
  id_pedido_det  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  codprod        INT,
  valor          DOUBLE(7,2),
  qtde           INT(5),
  ipi            DOUBLE(5,2),
  datped         DATE,
  numped         INT,
  CONSTRAINT fk_ped  FOREIGN KEY (numped)  REFERENCES pedido(id_pedido),
  CONSTRAINT fk_prod FOREIGN KEY (codprod)  REFERENCES produto(id_produto)
) ENGINE=InnoDB;

CREATE TABLE observacao (
  id_observacao   INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tipo_reclamente VARCHAR(1),
  reclamado       INT,
  reclamente      INT,
  ocorrencia      INT(3),
  observacao      VARCHAR(600),
  data            DATE,
  retorno         VARCHAR(1),
  data_retorno    DATE
) ENGINE=InnoDB;

-- 4) Your initial admin insert ---------------------------------------------

INSERT INTO usuarios 
  (name, login, password, email, recemail, signDate, active, level)
VALUES
  ('adilson', 'adilson',
   '$2y$10$hggmlCtlHQLVcC8OrZjl0.xueUFC/D.EsVxlOLVIpXC4kBHVaxh7u',
   'adilson@gmail.com',
   'justanotheremail@hotmail.com',
   '2024-03-04',
   TRUE,
   0);
