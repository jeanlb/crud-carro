<?php header('Content-Type: text/html; charset=utf-8');

	require_once('conexao.php');
	require_once('../model/carro.php');
	
	class CarroDAO extends Conexao {

		function inserir($carro) {
			$this -> conectar();

			$stmt = $this -> conexao -> prepare("INSERT INTO carro (id_cliente, nome, marca, ano, cor, placa, caminho_imagem) 
				VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt -> bind_param("ississs", $carro -> getIdCliente(), $carro -> getNome(), $carro -> getMarca(), 
				$carro -> getAno(), $carro -> getCor(), $carro -> getPlaca(), $carro -> getCaminhoImagem());

			// TODO: colocar log no lugar de echo
			if ($stmt -> execute() === TRUE) {
			    echo "<font color='green'>O carro " . $carro -> getNome() . " foi inserido com sucesso!<br>";
			} else {
			    echo "Erro na inserção do carro.<br>";
			}

			$stmt -> close();
		    $this -> desconectar();
		}

		function atualizar($carro) {
			$this -> conectar();

			$stmt = $this -> conexao -> prepare("UPDATE carro SET nome = ? ,  
				marca = ? , ano = ? , cor = ? , placa = ?, caminho_imagem = ? WHERE id = ?");

			$stmt -> bind_param("ssisssi", $carro -> getNome(), $carro -> getMarca(), 
				$carro -> getAno(), $carro -> getCor(), $carro -> getPlaca(), 
				$carro -> getCaminhoImagem(), $carro -> getId());

			if ($stmt -> execute() === TRUE) {
			    echo $carro -> getNome() . " foi atualizado com sucesso!<br>";
			} else {
			    echo "Erro na atualização do carro.<br>";
			}

			$stmt -> close();
			$this -> desconectar();
		}

		public function listar() {
			$this -> conectar();

			$sql = "SELECT * FROM carro";
			$resultado = $this -> conexao -> query($sql);

		    $lista_carro = array();
			while ($row = $resultado -> fetch_assoc()) {
				$carro = $this -> criarCarroDeArray($row);
			    $lista_carro[] = $carro;
			}

			$this -> desconectar();

			return $lista_carro;
		}

		public function consultar($nome) {
			$this -> conectar();

			$stmt = $this -> conexao -> prepare("SELECT * FROM carro WHERE nome = ?");
			$stmt -> bind_param("s", $nome);
			$stmt -> execute();
			$resultado = $stmt -> get_result();

			$lista_carro = array();
			while ($row = $resultado -> fetch_assoc()) {
				$carro = $this -> criarCarroDeArray($row);
			    $lista_carro[] = $carro;
			}

			$stmt -> close();
			$this -> desconectar();

			return $lista_carro;
		}

		public function pegarCarroPorId($id) {
			$this -> conectar();

			$stmt = $this -> conexao -> prepare("SELECT * FROM carro WHERE id = ? LIMIT 1");
			$stmt -> bind_param("i", $id);
			$stmt -> execute();
			$resultado = $stmt -> get_result();

			$carro = new Carro();
			while ($row = $resultado -> fetch_assoc()) {
				$carro = $this -> criarCarroDeArray($row);
			}

			$stmt -> close();
			$this -> desconectar();

			return $carro;
		}

		private function criarCarroDeArray($row) {
		    
		    $carro = new Carro();
		    $carro -> setId($row["id"]);
			$carro -> setNome($row["nome"]);
			$carro -> setMarca($row["marca"]);
			$carro -> setAno($row["ano"]);
			$carro -> setCor($row["cor"]);
			$carro -> setPlaca($row["placa"]);
			$carro -> setCaminhoImagem($row["caminho_imagem"]);

		    return $carro; 
		}

		public function deletar($id) {
			$this -> conectar();

			$sql = "DELETE FROM carro WHERE id = " . $id;

			if ($this -> conexao -> query($sql) === TRUE) {
			    echo "Registro deletado com sucesso!<br>";
			} else {
			    echo "Erro ao tentar deletar registro: " . $this -> conexao -> error;
			}

			$this -> desconectar();
		}

	}

?>