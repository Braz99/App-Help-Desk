<?php

	session_start();

	$perfis_usuario = Array(1 => 'administrativo', 2 => 'user');

	$usuarios = Array(

		Array('id' => 0, 'email' => 'adm@teste.br', 'senha' => '1234', 'perfil_id' => 1, 'nome' => 'Adm'),
		Array('id' => 1, 'email' => 'ceo@teste.br', 'senha' => '1234', 'perfil_id' => 1, 'nome' => 'Ceo'),
		Array('id' => 2, 'email' => 'user@teste.br', 'senha' => 'g4t05', 'perfil_id' => 2, 'nome' => 'Braz Gonçalves Almeida')

	);



	$autenticacao = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	foreach ($usuarios as $user) {


		if ($user['email'] == $_POST["email"] && $user['senha'] == $_POST["senha"]) {
			$autenticacao = true;
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id'];
			$usuario = $user['nome'];
		} 	
	}

	if ($autenticacao) {
			$_SESSION['autenticado'] = 	true;
			$_SESSION['id'] = $usuario_id;
			$_SESSION['perfil_id'] = $usuario_perfil_id;
			$_SESSION['nome'] = $usuario;

			header('Location: home.php');
		} else { 

			$_SESSION['autenticado'] = 	false;
			header('Location:index.php?login=erro');}

  ?>