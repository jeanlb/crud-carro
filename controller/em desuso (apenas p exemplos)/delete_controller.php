<?php header('Content-Type: text/html; charset=utf-8');

	require_once("../dao/carroDAO.php");

	if(isset($_GET['id'])) {
		//getting id of the data from url
		$id = $_GET['id'];

		$carroDAO = new CarroDAO();
		$carroDAO -> deletar($id);

		// redireciona para pagina principal (index.php)
		header("Location:../view");
	}
	
?>

