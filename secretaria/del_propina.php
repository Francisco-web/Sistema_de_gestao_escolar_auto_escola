<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
    
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
			$sql="DELETE FROM `pagamento` WHERE `id_pag` = $id";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Registo de Pagamento Apagado com Sucesso.</div>";
					header('Location: add_propina.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Apagar Registo de Pagamento!</div>";
					header('Location: add_propina.php');
			}
				
		}
			
	

?>
	
