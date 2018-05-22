<?php 
	/* 
		Redirecionar para página principal ao acessar a pasta
	   	onde está localizado este arquivo indice (index).
	   	Útil para evitar que usuários vejam o conteúdo da pasta
	   	(e sem precisar fazer configurações no Apache).
	   	Caso o projeto tenha muitas pastas, em ambiente de produção
	   	a melhor opção é configurar o Apache para não ser permitido 
	   	visualizar o conteúdo das pastas pelo browser (para não ter 
	   	que criar vários index.php como este nas pastas).
	*/
	header("Location: ../");
?>