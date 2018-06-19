<?php header('Content-Type: text/html; charset=utf-8');

	/* Verificar se não há sessao ativa. Nesse caso, irá redirecionar 
	   para index.php, que irá redirecionar para login.php. 
	   Útil caso se tente acessar este arquivo diretamente pelo browser,
	   sendo feito o redirecionamento */
	if (session_status() != PHP_SESSION_ACTIVE) {
		header("location: ../view");
	}

	// Como este é um script de include, que está sendo utilizando
	// apenas no ../index.php, os imports do controlador e do JavaScript
	// estão setados para pegarem o caminho válido no momento do include no ../index.php 
	require_once('controller/carroController.php');
	$jsPath = 'view/resources/javascript/funcoes.js';

	// Listar os carros
	$carroController = new CarroController();
	$carros = $carroController -> listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src=<?php echo $jsPath ?> ></script>
</head>
<body>

	<table width='80%' border=0>
		<thead>
			<tr bgcolor='#CCCCCC'>
				<th>ID</th>
				<th>Nome</th>
				<th>Marca</th>
				<th>Ano</th>
				<th>Cor</th>
				<th>Placa</th>
				<th>Ações</th>
			</tr>
		</thead>

		<tbody>

			<?php if ($carros) : ?>

			<?php foreach ($carros as $carro) : ?>
				<tr>
					<td align="center">
						<?php 
							$idCarro = $carro -> getId();
							echo $idCarro;
						?>
					</td>
					<td><?php echo $carro -> getNome(); ?></td>
					<td><?php echo $carro -> getMarca(); ?></td>
					<td><?php echo $carro -> getAno(); ?></td>
					<td><?php echo $carro -> getCor(); ?></td>
					<td><?php echo $carro -> getPlaca(); ?></td>

					<td align="center">
						<button onclick="visualizar(<?php echo $idCarro; ?>)">
							Visualizar
						</button>
						<button onclick="editar(<?php echo $idCarro; ?>)">
							Editar
						</button>
						<button onclick="deletar(<?php echo $idCarro; ?>)">
							Deletar
						</button>
					</td>
				</tr>
			<?php endforeach; ?>

			<?php else : ?>
				<tr>
					<td colspan="6">Nenhum registro encontrado.</td>
				</tr>
			<?php endif; ?>

		</tbody>
	</table>

</body>
</html>