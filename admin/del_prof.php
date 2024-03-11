<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
	
	$id_us = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
					
			
					$sql = "DELETE FROM `professor` WHERE `id_professor` = $id_us";
					
					if (mysqli_query($connect, $sql)) {
						
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Professor(a) Apagado com Sucesso.</div>";
					header('Location:  list_prof.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Apagar Professor(a).</div>";
					header('Location:  list_prof.php');
				
	}
				
		}
			
	

?>
	
