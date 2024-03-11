<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
	
	$tipo_p = mysqli_escape_string($connect, $_POST['pagamento']);	
	$valor = mysqli_escape_string($connect, $_POST['valor']);	
	$classe = mysqli_escape_string($connect, $_POST['classe']);	
	$id = mysqli_escape_string($connect, $_POST['id']);	
	
		#VALIDAÇÃO DOS CAMPOS 
		
		$sql="UPDATE `pagamento` SET `id_classe` = '$classe', `tipo_p` = '$tipo_p', `valor` = '$valor' WHERE `pagamento`.`id_pag` = '$id'";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Registo de Pagamento Editada com Sucesso.</div>";
					header('Location: add_propina.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Editar Registo de Pagamento!</div>";
					header('Location: add_propina.php');
			}
				
					
	}

?>
	
