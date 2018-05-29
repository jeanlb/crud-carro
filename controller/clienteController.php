<?php header('Content-Type: text/html; charset=utf-8');

	/* 
	 * Verificar e pegar localização do arquivo à incluir. É preciso 
	 * verificar a localização devido aos includes realizados em outras páginas.
	 * Exemplo com array. 
	*/
	$include_dirs = array(
		'model/dao/clienteDAO.php',
		'../model/dao/clienteDAO.php',
		'../../model/dao/clienteDAO.php'
	);
	
	foreach ($include_dirs as $include_path) {
		if (@file_exists($include_path)) {
			require_once($include_path);
			break;
		}
	}

	require_once("controller.php");

	class ClienteController extends Controller {

		private $clienteDAO;

		function __construct() {
			$this -> clienteDAO = new ClienteDAO();
			parent :: __construct(); // chamar construtor da classe mae de maneira estatica (::)
		}

		protected function processarAcao() {

			switch ($this -> acao) {
			    case "inserir":
			        $this -> inserir();
			        break;
			    case "atualizar":
			        $this -> atualizar();
			        break;
			    case "deletar":
			        $this -> deletar();
			        break;
			}
		}

		public function listar() {
			return $this -> clienteDAO -> listar();
		}

		public function listarClientesComGrupos() {
			return $this -> clienteDAO -> listarClientesComGrupos();
		}

		public function pegarClientePorId($id) {
			return $this -> clienteDAO -> pegarClientePorId($id);
		}

		public function pegarClienteComGruposPorId($id) {
			return $this -> clienteDAO -> pegarClienteComGruposPorId($id);
		}

		private function inserir() {

			$clienteDTO = new ClienteDTO();
			$clienteDTO -> setNome($_POST['nome']);
			$clienteDTO -> setEmail($_POST['email']);
			$clienteDTO -> setTelefone($_POST['telefone']);
			$clienteDTO -> setDataNascimento($_POST['data_nascimento']);

			if(isset($_POST['id_grupos'])) {
				$clienteDTO -> setIdGrupos($_POST['id_grupos']);
			}

			$foiInserido = $this -> clienteDAO -> inserir($clienteDTO); // chamar o dao para inserir o cliente no banco de dados

			// criar uma mensagem para ser exibida na página principal (de listagem)
			$mensagem = "O cliente " . $clienteDTO -> getNome() . " foi adicionado com sucesso!";
			if ($foiInserido == false) $mensagem = "Erro ao adicionar cliente!";
			$this -> criarMensagem($mensagem);

			$this -> redirecionarPagina();
		}

		private function atualizar() {
			
			$clienteDTO = new ClienteDTO();
			$clienteDTO -> setId($_POST['id']);
			$clienteDTO -> setIdPessoa($_POST['id_pessoa']);
			$clienteDTO -> setNome($_POST['nome']);
			$clienteDTO -> setEmail($_POST['email']);
			$clienteDTO -> setTelefone($_POST['telefone']);
			$clienteDTO -> setDataNascimento($_POST['data_nascimento']);

			if(isset($_POST['id_grupos'])) {
				$clienteDTO -> setIdGrupos($_POST['id_grupos']);
			}

			$foiAtualizado = $this -> clienteDAO -> atualizar($clienteDTO);

			$mensagem = "O cliente " . $clienteDTO -> getNome() . " foi atualizado com sucesso!";
			if (!$foiAtualizado) $mensagem = "Erro ao atualizar cliente!";
			$this -> criarMensagem($mensagem);

			$this -> redirecionarPagina();
		}

		private function deletar() {
			
			$idPessoa = $_GET['id_pessoa'];

			$foiDeletado = $this -> clienteDAO -> deletar($idPessoa);

			// criar uma mensagem para ser exibida na página principal (de listagem)
			$mensagem = "O cliente foi deletado com sucesso!";
			if ($foiDeletado == false) $mensagem = "Erro ao deletar cliente!";
			$this -> criarMensagem($mensagem);

			$this -> redirecionarPagina();
		}

		// redirecionar para a página de listagem de clientes
		protected function redirecionarPagina() {
			header("Location:../view/cliente_list.php");
		}

	}

	// eh preciso instanciar a classe para funcionar o acesso a ela via requisicao
	new ClienteController();

?>