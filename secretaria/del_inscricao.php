<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-apagar'])) {
    
	$id_ins = mysqli_escape_string($connect, $_POST['id_ins']);
	$id_us = mysqli_escape_string($connect, $_POST['aluno']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
				$sql="DELETE FROM `inscricao` WHERE `inscricao`.`id_inscricao`= '$id_ins' and id_usuario='$id_us'";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Inscrição Apagada com Sucesso.</div>";
					header('Location: list_inscricao.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Falha ao Apagar Inscrição!</div>";
					header('Location: list_inscricao.php');
			}
				
		}
			
	

?>
	
