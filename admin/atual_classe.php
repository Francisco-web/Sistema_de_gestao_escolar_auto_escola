<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
    $codigo = mysqli_escape_string($connect, $_POST['codigo']);
    $classe = mysqli_escape_string($connect, $_POST['classe']);
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
		$sql="UPDATE `classe` SET `codigo_classe` = '$codigo', `nome_classe` = '$classe' WHERE `classe`.`id_classe` = $id";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados da Classe Alterado com Sucesso.</div>";
					header('Location: registar_nivel.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Alterar Dados da Classe.</div>";
					header('Location: registar_nivel.php');
			}
				
					
	}

?>
	
