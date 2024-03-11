<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
    $tipo = mysqli_escape_string($connect, $_POST['tipo']);
	$conteudo = mysqli_escape_string($connect, $_POST['conteudo']);
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		if (empty($tipo) ){
			
			header('Location:list_conv.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Tipo de Comunicado.</div>";
			
		}else if (empty($conteudo)){
			
			header('Location:list_conv.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Conteudo do Comunicado.</div";
		
		}else {
				
			$sql="UPDATE `convocatoria` SET `tipo` = '$tipo', `conteudo` = '$conteudo', `data_conv` = current_timestamp()
			WHERE `convocatoria`.`num_conv` = $id";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados do Comunicado Alterado com Sucesso.</div>";
					header('Location: list_conv.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Alterar Dados do Comunicado.</div>";
					header('Location: list_conv.php');
			}
				
		}
	}

?>
	
