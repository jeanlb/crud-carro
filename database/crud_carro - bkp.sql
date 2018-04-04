DROP DATABASE IF EXISTS crud_carro;

CREATE DATABASE crud_carro CHARSET=UTF8;

USE crud_carro;

-- tabela pessoa
CREATE TABLE pessoa(
  id                        bigint NOT NULL AUTO_INCREMENT,
  nome                      varchar(45) NOT NULL,
  email                     varchar(255) NOT NULL,

  CONSTRAINT pk_pessoa PRIMARY KEY (id)

) DEFAULT CHARSET=UTF8;

-- tabela usuario
CREATE TABLE usuario (
  id                        bigint NOT NULL AUTO_INCREMENT,
  nome                      varchar(45) NOT NULL,
  email                     varchar(255) NOT NULL,
  senha   					        varchar(45) NOT NULL,

  CONSTRAINT pk_usuario PRIMARY KEY (id),
  CONSTRAINT u_email unique (email)

) DEFAULT CHARSET=UTF8;

-- senha codificada em base64: admin
INSERT INTO usuario VALUES (1, 'admin', 'admin@ifpr.edu.br', 'YWRtaW4=');

-- tabela cliente
CREATE TABLE cliente (
  id                        bigint NOT NULL AUTO_INCREMENT,
  nome                      varchar(45) NOT NULL,
  email                     varchar(255) NOT NULL,
  telefone					        bigint(14) NOT NULL,

  CONSTRAINT pk_cliente PRIMARY KEY (id)

) DEFAULT CHARSET=UTF8;

INSERT INTO cliente VALUES (1, 'Cliente 1', 'cliente1@ifpr.edu.br', 01545999999999);

-- tabela carro
CREATE TABLE carro (
  id                        bigint NOT NULL AUTO_INCREMENT,
  id_cliente 				        bigint NOT NULL,
  nome                      varchar(45) NOT NULL,
  marca                     varchar(45) NOT NULL,
  ano                       integer(4) NOT NULL,
  cor   					          varchar(45),
  placa              		    varchar(8) NOT NULL,
  caminho_imagem 			      varchar(255) DEFAULT NULL,

  CONSTRAINT pk_carro PRIMARY KEY (id),
  CONSTRAINT u_placa UNIQUE (placa),

  -- adicionar chave estrangeira id_cliente a carro 
  CONSTRAINT fk_cliente FOREIGN KEY (id_cliente) REFERENCES cliente (id) ON DELETE CASCADE ON UPDATE CASCADE

) DEFAULT CHARSET=UTF8;

INSERT INTO carro VALUES (1, 1, 'Palio', 'Fiat', 2008, 'Prata', 'MUN5736', NULL);

