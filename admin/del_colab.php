<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
	
	$id_us = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
					
			
					$sql = "DELETE FROM `usuario` WHERE `id_usuario` = $id_us";
					
					if (mysqli_query($connect, $sql)) {
						
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Colaborador(a) Apagado com Sucesso.</div>";
					header('Location:  list_usuario.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Apagar Colaborador(a).</div>";
					header('Location:  list_usuario.php');
				
			//Apagar Professor directamente na Tabela Existente na base de Dados.

			$sql1 = "SELECT id_usuario FROM professor p inner join usuario u on p.id_usuario = u.id_usuario WHERE id_usuario = '$id_us'";
			$resultado = mysqli_query($connect, $sql1);
			
			if (mysqli_num_rows($resultado) == 1) {
		
				$sql_2 = "DELETE FROM `professor` WHERE `id_usuario` = $id_us ";
				
				if (mysqli_query($connect, $sql_2)) {
		
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Professor(a) Apagado com Sucesso.</div>";
				header('Location:  list_usuario.php');
			}else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Apagar Professor(a)!</div>";
				header('Location:  list_usuario.php');
			}	
		}
	}
				
		}
			
	

?>
	
