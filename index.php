<?php header('Content-Type: text/html; charset=utf-8');

	session_start();
	if (!isset($_SESSION['login_user'])) {
		header("location: view/login.php");
	}
?>

<html lang="pt-br">
<head>	
	<meta charset="utf-8">
	<title>Homepage da Concessionária</title>
	<link rel="stylesheet" type="text/css" href="view/resources/css/estilos.css">
</head>

<body>
	<a href="view/carro_create.php">Adicionar um Carro</a> | 
	<a href="view/cliente_list.php">Clientes</a> | 

	<?php 
		// Somente usuário ADM tem permissão para acessar este link
		if ($_SESSION['login_user']['tipo'] == 'ADM') {
			echo "<a href='view/usuario_list.php'>Usuários</a> | ";
			echo "<a href='view/grupo_list.php'>Grupos</a> | ";
		}
	?>

	<a href="view/report/carros.php" target="_blank">Gerar PDF</a> | 
	<a href="controller/loginController.php?acao=logout">Deslogar</a> | 
	<span>Bem-vindo, <?php echo $_SESSION['login_user']['nome']; ?>!</span> 
	<br/><br/>

	<div class="messages">
		<?php
			// TODO: ao clicar em voltar, a mensagem continua. fazer com session array
			if(isset($_COOKIE["message"])) {
			    $msg = $_COOKIE["message"] . "<br/><br/>";
			    setcookie("message", "", time() - 60, '/'); // expirar o cookie
			} else {
			    $msg = "";
			}

			echo $msg;
		?>
	</div>

	<?php include("view/carro_list_include.php"); ?>

</body>
</html>
