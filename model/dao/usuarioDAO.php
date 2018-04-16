<?php 

	require_once('conexao.php');
	require_once('../model/entity/usuario.php');
	
	class UsuarioDAO extends Conexao {

		public function pegarUsuarioPorEmailSenha($email, $senha) {
			$this -> conectar();

			$senha = base64_encode($senha); // codificar para base64

			// $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ? LIMIT 1";
			$sql = "SELECT u.id, u.senha, p.nome, p.email FROM usuario u, pessoa p WHERE u.id_pessoa = p.id and p.email = ? and u.senha = ? LIMIT 1";

			$stmt = $this -> conexao -> prepare($sql);
			$stmt -> bind_param("ss", $email, $senha);
			$stmt -> execute();

			$resultado = $stmt -> get_result(); 

			// caso as linhas acima dêem erro com o prepared statement, devido a versao do php (na 7 funciona), usar:
			// $sql = "SELECT * FROM usuario WHERE email = '" .$email. "' AND senha = '" .$senha. "' LIMIT 1";
			// $resultado = $this -> conexao -> query($sql);

			$usuario = new Usuario();
			while ($row = $resultado -> fetch_assoc()) {
				$usuario = $this -> criarUsuarioDeArray($row);
			}

			$stmt -> close();
			$this -> desconectar();

			return $usuario;
		}

		private function criarUsuarioDeArray($row) {
		    
		    $usuario = new Usuario();
		    $usuario -> setId($row["id"]);
			$usuario -> setNome($row["nome"]);
			$usuario -> setEmail($row["email"]);
			$usuario -> setSenha(base64_decode($row["senha"])); // decodificar senha
			
		    return $usuario; 
		}

	}

 ?>