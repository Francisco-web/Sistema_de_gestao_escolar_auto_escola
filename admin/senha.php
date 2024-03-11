<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-senha'])) {
	$senha_a = mysqli_escape_string($connect, $_POST['senha_a']);
	$senha_n = mysqli_escape_string($connect, $_POST['senha_n']);
	$senha_c = mysqli_escape_string($connect, $_POST['senha_c']);
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($senha_a)){
			
			header('Location:vs_perfil.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro:Insira a Senha Antiga!</div>";
		   
		}else if (empty($senha_n)){

			header('Location:vs_perfil.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira a Senha Nova! </div>";
		   
		}else if ($senha_n !== $senha_c ){

			header('Location:vs_perfil.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira a Senha de Confirmação ou Verifique se a Senha inserida é igual a Nova Senha!</div>";
		   
		}else{
				
			//encriptografar senha

			$senha_a = md5($senha_a);
			$senha_n = md5($senha_n);

			$sql = "SELECT senha FROM usuario WHERE id_usuario = '$id' and senha = '$senha_a'";
			
				$resultado = mysqli_query($connect, $sql);
				if (mysqli_num_rows($resultado) === 1) {
			
					$sql_2 = "UPDATE `usuario` SET `senha` = '$senha_n' WHERE `usuario`.`id_usuario` = $id";
					mysqli_query($connect, $sql_2);
				# code...
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Senha alterada com Sucesso.</div>";
				header('Location: vs_perfil.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Alterar Senha! Tenta Novamente!</div>";
					header('Location: vs_perfil.php');
			}
				
		}
		   	
	}


?>
	
