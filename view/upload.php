<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Upload de Arquivo</title>
</head>
<body>

	<form action="" method="POST" enctype="multipart/form-data">
	    Selecione o arquivo para upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload" name="upload">
	</form>
	<br>

	<?php 
		$imagepath = "C:\\uploads\\";
		echo "<img src='".$imagepath."Cartaz 27.08.2017.jpg". "' height='200' width='200' /> "; // nao está funcionando
    	//echo "<img src='".$imagepath.$row['Image']. "' height='200' width='200' /> ";
	?>

</body>
</html>

<?php //Fonte: https://www.w3schools.com/php/php_file_upload.asp

	if (isset($_POST["upload"])) {

		$target_dir = "C:\\uploads\\"; // diretorio do xampp nao dá permissao para upload
		$file_temp_name = $_FILES["fileToUpload"]["tmp_name"]; // nome do arquivo temporario
		$file_name = $_FILES["fileToUpload"]["name"]; // nome do arquivo
		$target_file = $target_dir . basename($file_name); // caminho completo para onde o arquivo deve ser movido
		$uploadOk = 1;

		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Desculpe, o arquivo já existe. ";
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Desculpe, não foi possível realizar o upload do arquivo.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($file_temp_name, $target_file)) {
		        echo "O arquivo ". basename($file_name). " teve seu upload realizado com sucesso.";
		    } else {
		        echo "Desculpe, houve um erro no upload do arquivo.";
		    }
		}

	}

?>