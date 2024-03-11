<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
    
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
			$sql="DELETE FROM `classe` WHERE `classe`.`id_classe` = $id";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>  Classe Apagado com Sucesso.</div>";
					header('Location: registar_nivel.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Apagar Classe.</div>";
					header('Location: registar_nivel.php');
			}
				
		}
			
	

?>
	
