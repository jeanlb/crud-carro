// carro
function visualizar(id) {
    /* no crud-carro/index.php (no qual está incluso o carro_list_include.php), 
       o redirecionamento com js só funciona com window.location */
    window.location = 'view/carro_view.php?id=' + id;
}

function editar(id) {
    // funciona da mesma forma que no visualizar. nesta requisição também há redirecionamento de página
  	window.location = 'view/carro_edit.php?id=' + id;
}

function deletar(id) {
  // já neste funciona com window.location.href. nesta requisição não há redirecionamento de página no browser
	if (confirm('Tem certeza de que deseja deletar este carro?')) {
  		window.location.href = 'controller/carroController.php?acao=deletar&id=' + id;
 	}
}

// cliente
function editarCliente(id) {
    /* no crud-carro/view/cliente_list.php, o redirecionamento com js 
       funciona tanto com window.location como com window.location.href. */
  	window.location.href = '../view/cliente_edit.php?id=' + id;
}

function deletarCliente(idPessoa) {
	if (confirm('Tem certeza de que deseja deletar este cliente?')) {
  		window.location.href = '../controller/clienteController.php?acao=deletar&id_pessoa=' + idPessoa;
 	}
}

// usuario
function deletarUsuario(idPessoa) {
	if (confirm('Tem certeza de que deseja deletar este usuário?')) {
  		window.location.href = '../controller/usuarioController.php?acao=deletar&id_pessoa=' + idPessoa;
 	}
}

// grupo
function deletarGrupo(idGrupo) {
  if (confirm('Tem certeza de que deseja deletar este grupo?')) {
      window.location.href = '../controller/grupoController.php?acao=deletar&id_grupo=' + idGrupo;
  }
}

/*
function logout() {
  	window.location.href='../controller/loginController.php?acao=logout';
}
*/