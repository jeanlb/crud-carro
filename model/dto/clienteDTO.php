<?php header('Content-Type: text/html; charset=utf-8');

	$include_dirs = array(
		'model/entity/cliente.php',
		'../model/entity/cliente.php'
	);
	
	foreach ($include_dirs as $include_path) {
		if (@file_exists($include_path)) {
			require_once($include_path);
		}
	}

	class ClienteDTO extends Cliente {

		// atributo que não existe na entidade/tabela Cliente. Usado apenas para transferência de dados
		private $grupos;
		private $idGrupos;

		function __construct() {

	 		$argumentos = func_get_args(); // pegar argumentos passados ao construtor
	 		
	 		if (sizeof($argumentos) == 1 && $argumentos[0] instanceof Cliente) {
	 			$cliente = $argumentos[0];
	 			$this -> criarClienteDTO($cliente);
	 		}
		}

		private function criarClienteDTO($cliente) {

			$this -> setId($cliente -> getId());
			$this -> setNome($cliente -> getNome());
			$this -> setEmail($cliente -> getEmail());
			$this -> setTelefone($cliente -> getTelefone());
			$this -> setDataNascimento($cliente -> getDataNascimento());
		}

		public function setGrupos($grupos) {
			$this -> grupos = $grupos;
		}

		public function getGrupos() {
			return $this -> grupos;
		}

		public function setIdGrupos($idGrupos) {
			$this -> idGrupos = $idGrupos;
		}

		public function getIdGrupos() {
			return $this -> idGrupos;
		}

	}

?>