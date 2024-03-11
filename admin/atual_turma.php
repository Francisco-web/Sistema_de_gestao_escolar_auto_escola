<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
    $turma = mysqli_escape_string($connect, $_POST['turma']);
    $periodo = mysqli_escape_string($connect, $_POST['periodo']);
    $sala = mysqli_escape_string($connect, $_POST['sala']);
    $classe = mysqli_escape_string($connect, $_POST['classe']);
    $professor = mysqli_escape_string($connect, $_POST['professor']);
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($turma) ){
			
			header('Location:registar_turma.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Digite o Nome da Turma.</div>";
		}else if (empty($periodo)){
			
			header('Location:registar_turma.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Insira o periodo.</div>";
		}else if (empty($sala)){
			
			header('Location:registar_turma.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Insira o Numero da Sala.</div>";
		}else if (empty($classe)){
			
			header('Location:registar_turma.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Selecione a Classe.</div>";
		}else if (empty($professor)){
			
			header('Location:registar_turma.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Selecone o Professor.</div>";
		}else{

			$sql="UPDATE `turma` SET `nome_turma` = '$turma', `classe` = '$classe', `periodo` = '$periodo', `num_sala` = '$sala', 
			`id_professor` = '$professor' WHERE `turma`.`id_turma` = $id";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados da Turma Alterado com Sucesso.</div>";
					header('Location: registar_turma.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Falha ao Editar Dados da Turma!</div>";
					header('Location: registar_turma.php');
			}
				
		}
			
	}

?>
	
