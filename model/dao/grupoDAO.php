<?php 

	require_once('conexao.php');
	require_once('../model/entity/grupo.php');
	
	class GrupoDAO extends Conexao {

		// select c.id, g.nome from cliente c, grupo g, grupo_cliente gc where gc.id_cliente = c.id and gc.id_grupo = g.id;

	}

 ?>