<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
	
	$id_professor = mysqli_escape_string($connect, $_POST['id_prof']);
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
			$sql="DELETE FROM `disciplina` WHERE `disciplina`.`id_disciplina` = $id and id_professor = $id_professor";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>  Discíplina Apagada com Sucesso.</div>";
					header('Location: registar_disciplina.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>  Falha ao Apagar Discíplina!</div>";
					header('Location: registar_disciplina.php');
			}
				
		}
			
	

?>
	
