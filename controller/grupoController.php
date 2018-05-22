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
				default:
					break;
			}
		}

		protected function redirecionarPagina() {
			header("Location:../view");
		}

	}

	// eh preciso instanciar a classe para funcionar o acesso a ela via requisicao
	new GrupoController();

?>