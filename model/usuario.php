<?php 

	require_once('pessoa.php');	

	class Usuario extends Pessoa {

		private $id;
		private $senha;

		public function setId($id) {
			$this -> id = $id;
		}

		public function getId() {
			return $this -> id;
		}

		public function setSenha($senha) {
			$this -> senha = $senha;
		}

		public function getSenha() {
			return $this -> senha;
		}
		
	}

?>