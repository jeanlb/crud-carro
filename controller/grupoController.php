<?php header('Content-Type: text/html; charset=utf-8');

	require_once("controller.php");
	require_once("../model/dao/grupoDAO.php");

	class GrupoController extends Controller {

		private $grupoDAO;

		function __construct() {
			$this -> grupoDAO = new GrupoDAO();
			parent :: __construct(); // chamar construtor da classe mae de maneira estatica (::)
		}

		protected function processarAcao() {

			switch ($this -> acao) {
			    case "inserir":
			        $this -> inserir();
			        break;
			    case "deletar":
			        $this -> deletar();
			        break;
			}
		}

		public function listar() {
			return $this -> grupoDAO -> listar();
		}

		private function inserir() {

			$grupo = new Grupo();
			$grupo -> setNome($_POST['nome']);
			$grupo -> setDescricao($_POST['descricao']);

			$foiInserido = $this -> grupoDAO -> inserir($grupo);

			// criar uma mensagem para ser exibida na página principal (de listagem)
			$mensagem = "O grupo " . $grupo -> getNome() . " foi adicionado com sucesso!";
			if ($foiInserido == false) $mensagem = "Erro ao adicionar grupo!";
			$this -> criarMensagem($mensagem);

			$this -> redirecionarPagina();
		}

		private function deletar() {
			
			$idGrupo = $_GET['id_grupo'];

			$foiDeletado = $this -> grupoDAO -> deletar($idGrupo);

			// criar uma mensagem para ser exibida na página principal (de listagem)
			$mensagem = "O grupo foi deletado com sucesso!";
			if ($foiDeletado == false) $mensagem = "Erro ao deletar grupo!";
			$this -> criarMensagem($mensagem);

			$this -> redirecionarPagina();
		}

		protected function redirecionarPagina() {
			header("Location:../view/grupo_list.php");
		}

	}

	// eh preciso instanciar a classe para funcionar o acesso a ela via requisicao
	new GrupoController();

?>