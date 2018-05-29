<?php header('Content-Type: text/html; charset=utf-8');

	session_start();
	if (!isset($_SESSION['login_user'])) {
		header("location: ../view/login.php");
	}

	// Somente usuário ADM tem permissão para acessar esta página
	if ($_SESSION['login_user']['tipo'] != 'ADM') {
		header("location: ../view/sem_permissao.php");
	}
?>

<html>
<head>
	<title>Adicionar Grupo</title>
</head>

<body>
	<a href="../view">Home</a> | 
	<a href="grupo_list.php">Grupos</a> | 
	<span>Usuário Logado: <?php echo $_SESSION['login_user']['nome']; ?></span> 
	<br/><br/>

	<form action="../controller/grupoController.php" method="POST">
		<table width="35%" border="0">
			<tr> 
				<td>Nome</td>
				<td><input type="text" name="nome" required></td>
			</tr>
			<tr> 
				<td>Descrição</td>
				<td><textarea name="descricao"></textarea></td>
			</tr>
			<tr> 
				<td></td>
				<td>
					<input type="hidden" name="acao" value="inserir">
					<input type="submit" value="Salvar">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

