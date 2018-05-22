<?php 

	// TODO: cliente pode estar em varios grupos, grupo podem ter varios clientes. criar tabelas grupo e grupo_cliente (n para n)
	class Grupo {

		private $id;
		private $nome; // fidelidade, potencial, vip, local, exterior, etc
		private $descricao;

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}
	}

?>