<?php 

	require_once('conexao.php');
	require_once('../model/entity/grupo.php');
	
	class GrupoDAO extends Conexao {

		public function inserir($grupo) {

			$foiInserido = false;
			$this -> conectar();

			$stmt = $this -> conexao -> prepare("INSERT INTO grupo (nome, descricao) VALUES (?, ?)");
			$stmt -> bind_param("ss", $grupo -> getNome(), $grupo -> getDescricao());

			if ($stmt -> execute() === TRUE) $foiInserido = true;

			$stmt -> close();
		    $this -> desconectar();

		    return $foiInserido;
		}

		public function listar() {
			$this -> conectar();

			$sql = "SELECT * FROM grupo ORDER BY nome ASC";
			$resultado = $this -> conexao -> query($sql);

		    $lista_grupo = array();
			while ($row = $resultado -> fetch_assoc()) {
				$grupo = $this -> criarGrupoDeArray($row);
			    $lista_grupo[] = $grupo;
			}

			$this -> desconectar();

			return $lista_grupo;
		}

		private function criarGrupoDeArray($row) {
		    
		    $grupo = new Grupo();
		    $grupo -> setId($row["id"]);
			$grupo -> setNome($row["nome"]);
			$grupo -> setDescricao($row["descricao"]);

		    return $grupo; 
		}

		public function deletar($idGrupo) {

			$foiDeletado = false;
			$this -> conectar();

			$sql = "DELETE FROM grupo WHERE id = " . $idGrupo;

			if ($this -> conexao -> query($sql) === TRUE) {
				$foiDeletado = true;
			    echo "Registro deletado com sucesso!<br>";
			} else {
			    echo "Erro ao tentar deletar registro: " . $this -> conexao -> error;
			}

			$this -> desconectar();

			return $foiDeletado;
		}

	}

 ?>