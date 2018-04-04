<?php header('Content-Type: text/html; charset=utf-8');

	require_once("../dao/carroDAO.php");

	$carro = new Carro();
	$carro -> setId($_POST['id']);
	$carro -> setNome($_POST['nome']);
	$carro -> setMarca($_POST['marca']);
	$carro -> setAno($_POST['ano']);
	$carro -> setCor($_POST['cor']);
	$carro -> setPlaca($_POST['placa']);

	$carroDAO = new CarroDAO();
	$carroDAO -> atualizar($carro);

	// redireciona para pagina principal (index.php)
	header("Location:../view");
?>