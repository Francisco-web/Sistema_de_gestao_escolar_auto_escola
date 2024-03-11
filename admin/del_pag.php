<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
    
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
			$sql="DELETE FROM `aluno_pag` WHERE `aluno_pag`.`id_aluno_pag` = $id";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>  Pagamento Apagado com Sucesso.</div>";
					header('Location: list_pag.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>  Falha ao Apagar Pagamento!</div>";
					header('Location: list_pag.php');
			}
				
		}
			
	

?>
	
