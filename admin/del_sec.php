<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
	
	$id_us = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
					
			
					$sql = "DELETE FROM `secretaria` WHERE `id_secretaria` = $id_us";
					
					if (mysqli_query($connect, $sql)) {
						
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Secretário(a) Apagado com Sucesso.</div>";
					header('Location:  list_sec.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Apagar Secretário(a).</div>";
					header('Location:  list_sec.php');
				
	}
				
		}
			
	

?>
	
