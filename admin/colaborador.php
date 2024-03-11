<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();
#VALIDA OS INPUTS 
if (isset($_POST['btn-colaborador'])) {
    $nome = mysqli_escape_string($connect, $_POST['nome']);
	$sexo = mysqli_escape_string($connect, $_POST['sexo']);
	$t_documento = mysqli_escape_string($connect, $_POST['documento']);
	$num_documento = mysqli_escape_string($connect, $_POST['num_documento']);
	$telefone = mysqli_escape_string($connect, $_POST['telefone']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$utilizador = mysqli_escape_string($connect, $_POST['utilizador']);
	
	$ano = date('Yhs');
	$login = random_int(6,$ano);
	$senha = $login;
		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($nome) ){
			
			header('Location:registar_usuario.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Nome.</div>";
		
		}else if (empty($sexo)){
		
			header('Location:registar_usuario.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Sexo.</div>";
		
		}else if (empty($telefone)){
		
		header('Location:registar_usuario.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Número de Telefone.</div>";
	
		} else if (empty($email)){
			
		header('Location:registar_usuario.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Email.</div>";

		} else if (empty($utilizador)){
				
		header('Location:registar_usuario.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Utilizador.</div>";

		} else if (empty($senha)){
				
		header('Location:registar_usuario.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira a Senha.</div>";

		} else{

			$senha = md5($senha);
			$sql = "INSERT INTO `usuario` ( `nome_usuario`, `tipo_documento`, `num_documento`, `sexo`, `tel1`, `email`, `tipo`, `ativo`, `login`, `senha`) 
			VALUES ('$nome', '$t_documento', '$num_documento', '$sexo', '$telefone', '$email', '$utilizador', '1', '$login', '$senha')";
				
			
			if (mysqli_query($connect, $sql)) {
				$last_id = mysqli_insert_id($connect);

				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Director(a) Cadastrado(a) com Sucesso.</div>";
					header('Location: registar_usuario.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Cadastrar Director!</div>";
					header('Location: registar_usuario.php');
				
				}
				
				//Cadastrar Professor directamente na Tabela Existente na base de Dados.

				$sql1 = "SELECT id_usuario FROM usuario WHERE id_usuario = '$last_id' and tipo = 'Professor(a)'";
				$resultado = mysqli_query($connect, $sql1);
				
				if (mysqli_num_rows($resultado) == 1) {
			
					$sql_2 = "INSERT INTO `professor`(`id_professor`, `id_usuario`) VALUES (null,'$last_id')";
					
					if (mysqli_query($connect, $sql_2)) {
			
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Professor(a) Cadastrado(a) com Sucesso.</div>";
					header('Location:  registar_usuario.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Cadastrar Professor(a)!</div>";
					header('Location:  registar_usuario.php');
				}	
			}	
			// Cadastrar Secretaria Directamente na Tabela Existente na BD

				$sql3 = "SELECT id_usuario FROM usuario WHERE id_usuario = '$last_id' and tipo = 'secretaria'";
				$resultado = mysqli_query($connect, $sql3);
				
				if (mysqli_num_rows($resultado) == 1) {
			
					$sql4 = "INSERT INTO `secretaria`(`id_secretaria`, `id_usuario`) VALUES (null,'$last_id')";
					
					if (mysqli_query($connect, $sql4)) {
			
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Secretário(a) Cadastrado(a) com Sucesso.</div>";
					header('Location:  registar_usuario.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Cadastrar Secretário(a)!</div>";
					header('Location:  registar_usuario.php');
				}	
			}	
	
		}
	}

?>
	
