<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
    
	$id = mysqli_escape_string($connect, $_POST['id_matricula']);
	$idins = mysqli_escape_string($connect, $_POST['id_inscricao']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
			$sql="DELETE FROM `matricula` WHERE `matricula`.`id_matricula` = $id and id_inscricao = $idins";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Matrícula Apagada com Sucesso.</div>";
					header('Location: list_matricula.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Apagar Matrícula!</div>";
					header('Location: list_matricula.php');
			}
				
		}
			
	

?>
	
