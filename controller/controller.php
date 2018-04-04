<?php header('Content-Type: text/html; charset=utf-8');

	abstract class Controller {

		abstract protected function processarAcao($acao);

		// redirecionar para outra pagina (view)
		abstract protected function redirecionarPagina();

		// criar cookie de duracao por 1 minuto. O "/" significa que esta disponivel em todo aplicacao
		protected function criarMensagem($mensagem) {

			$tempoExpiracao = time() + 60;
			setcookie("message", $mensagem, $tempoExpiracao, "/");
		}
	}

?>