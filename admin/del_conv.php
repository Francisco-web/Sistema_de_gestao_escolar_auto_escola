<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
    
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
			$sql="DELETE FROM `convocatoria` WHERE `convocatoria`.`num_conv` = $id";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>  Convocatoria ou Nota Apagada com Sucesso.</div>";
					header('Location: list_conv.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>  Erro: Falha ao Apagar Comunicado.</div>";
					header('Location: list_conv.php');
			}
				
		}
			
	

?>
	
