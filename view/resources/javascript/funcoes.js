// carro
function visualizar(id) {
  	window.location.href='../view/view.php?id=' + id;
}

function editar(id) {
  	window.location.href='../view/edit.php?id=' + id;
}

function deletar(id) {
	if (confirm('Tem certeza de que deseja deletar este carro?')) {
  		window.location.href='../controller/carroController.php?acao=deletar&id=' + id;
 	}
}

// cliente
function editarCliente(id) {
  	window.location.href='../view/editar_cliente.php?id=' + id;
}

function deletarCliente(idPessoa) {
	if (confirm('Tem certeza de que deseja deletar este cliente?')) {
  		window.location.href='../controller/clienteController.php?acao=deletar&id_pessoa=' + idPessoa;
 	}
}

/*
function logout() {
  	window.location.href='../controller/loginController.php?acao=logout';
}
*/