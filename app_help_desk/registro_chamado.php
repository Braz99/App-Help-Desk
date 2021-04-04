<?php  
	 
	session_start();

	if ($_POST['titulo'] == '' || $_POST['categoria'] == '' || $_POST['descricao'] == '') { 
		  header("Location:abrir_chamado.php?campo=erro3");

          } else { 

    $titulo = str_replace('#', '-', $_POST['titulo']);
	$categoria = str_replace('#', '-', $_POST['categoria']);
	$descricao = str_replace('#', '-', $_POST['descricao']);



    $texto = $_SESSION['id']. '#' .$titulo . '#' . $categoria . '#' . $descricao . '#' . $_SESSION['nome'] . '#' . date('d/m/y'). ' ' . PHP_EOL;

	$arquivo = fopen('dados.hd', 'a');

	fwrite($arquivo, $texto);

	fclose($arquivo);
	
	header("Location:abrir_chamado.php?campo=cadastrado");}

?>