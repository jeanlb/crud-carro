<?php 

	class Cliente {

		private $id;
		private $nome;
		private $email;
		private $telefone;

		public function setId($id) {
			$this -> id = $id;
		}

		public function getId() {
			return $this -> id;
		}

		public function setNome($nome) {
			$this -> nome = $nome;
		}

		public function getNome() {
			return $this -> nome;
		}

		public function setEmail($email) {
			$this -> email = $email;
		}

		public function getEmail() {
			return $this -> email;
		}

		public function setTelefone($telefone) {
			$this -> telefone = $telefone;
		}

		public function getTelefone() {
			return $this -> telefone;
		}
		
	}

?>