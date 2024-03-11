<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
    
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
			$sql="DELETE FROM `plano_curricular` WHERE `plano_curricular`.`id_plano` = $id";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>  Plano Curricular Apagado com Sucesso.</div>";
					header('Location: add_plano.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Apagar Plano Curricular.</div>";
					header('Location: add_plano.php');
			}
				
		}
			
	

?>
	
