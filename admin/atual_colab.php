<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
    $nome = mysqli_escape_string($connect, $_POST['nome']);
	$sexo = mysqli_escape_string($connect, $_POST['sexo']);
	$n_bi = mysqli_escape_string($connect, $_POST['num_doc']);
	$t_doc = mysqli_escape_string($connect, $_POST['documento']);
	$telefone = mysqli_escape_string($connect, $_POST['telemovel']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$utilizador = mysqli_escape_string($connect, $_POST['utilizador']);
    $estado = mysqli_escape_string($connect, $_POST['estado']);
   
	$id = mysqli_escape_string($connect, $_POST['id']);

		#VALIDAÇÃO DOS CAMPOS 
		
			$sql="UPDATE `usuario` SET `nome_usuario` = '$nome',`tipo_documento` = '$t_doc',
			`num_documento` = '$n_bi', `sexo` = '$sexo', 
			`tel1` = '$telefone', `email` = '$email', 
			`tipo` = '$utilizador', `ativo` = '$estado'
			 WHERE `usuario`.`id_usuario` = $id";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados do Colaborador Alterado com Sucesso.</div>";
					header('Location: list_usuario.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Alterar Dados do Colaborador!</div>";
					header('Location: list_usuario.php');
			}
				
			
	}

?>
	
