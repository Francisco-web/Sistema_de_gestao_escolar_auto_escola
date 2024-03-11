<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
    
	$id = mysqli_escape_string($connect, $_POST['id']);
	$id_matricula = mysqli_escape_string($connect, $_POST['id_matricula']);
	$id_disc = mysqli_escape_string($connect, $_POST['id_disciplina']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
			$sql="DELETE FROM `nota` WHERE `nota`.`id_nota` = $id and id_matricula= $id_matricula and id_disciplina= $id_disc";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>  Avaliação Apagado com Sucesso.</div>";
					header('Location: list_aval.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>  Falha ao Apagar Avaliação!</div>";
					header('Location: list_aval.php');
			}
				
		}
			
	

?>
	
