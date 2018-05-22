USE crud_carro;

DROP TABLE IF EXISTS grupo;

-- tabela grupo
CREATE TABLE grupo (
  id                        bigint not null auto_increment,
  nome                      varchar(45) not null,
  descricao                 varchar(255) not null,

  CONSTRAINT pk_grupo PRIMARY KEY (id)

) DEFAULT CHARSET=UTF8;

INSERT INTO grupo VALUES (1, 'Fidelidade', 'grupo de clientes fieis a concessionaria'),
(2, 'Potencial', 'grupo de clientes em potencial para compras'), (3, 'VIP', 'grupo de clientes VIP'), 
(4, 'Local', 'grupo de clientes da localidade'), (5, 'Exterior', 'grupo de clientes no exterior');

DROP TABLE IF EXISTS grupo_cliente;

-- tabela grupo_cliente
CREATE TABLE grupo_cliente (
  id_grupo                  bigint not null,
  id_cliente                bigint not null,

  CONSTRAINT fk_grupo_cliente FOREIGN KEY (id_grupo) REFERENCES grupo (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_cliente_grupo FOREIGN KEY (id_cliente) REFERENCES cliente (id) ON DELETE CASCADE ON UPDATE CASCADE

) DEFAULT CHARSET=UTF8;

INSERT INTO grupo_cliente VALUES (1, 1), (1, 2), (2, 1), (2, 2); 