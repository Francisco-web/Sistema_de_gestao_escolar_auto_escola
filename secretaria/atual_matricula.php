<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
	$id_matricula = mysqli_escape_string($connect, $_POST['id']);
	$id_inscricao = mysqli_escape_string($connect, $_POST['id_inscricao']);
	$id_usuario = mysqli_escape_string($connect, $_POST['id_usuario']);
	$id_turma = mysqli_escape_string($connect, $_POST['turma']);
	$id_classe = mysqli_escape_string($connect, $_POST['classe']);

	$matricula_n = mysqli_escape_string($connect, $_POST['num_matricula']);
	$tipo_m = mysqli_escape_string($connect, $_POST['tipo_matricula']);
	$t_documento = mysqli_escape_string($connect, $_POST['t_documento']);
	$periodo = mysqli_escape_string($connect, $_POST['periodo']);
	$sala = mysqli_escape_string($connect, $_POST['sala']);
	$ano_academico = mysqli_escape_string($connect, $_POST['ano_academico']);
	$data = mysqli_escape_string($connect, $_POST['data']);
	
    if (empty($id_turma)){
			
		header('Location:list_matricula.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Seleciona a Turma.</div>";
	}else if (empty($id_classe)){
		
		header('Location:list_matricula.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Classe.</div>";
	}else if (empty($matricula_n)){
		
		header('Location:list_matricula.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Número de Matrícula.</div>";
	}else if (empty($tipo_m)){
		
		header('Location:list_matricula.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Matrícula.</div>";
	}else if (empty($t_documento)){
		
		header('Location:list_matricula.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Documento de Identificação.</div>";
	}else if (empty($periodo)){
		
		header('Location:list_matricula.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Periodo.</div>";
	}else if (empty($sala)){
		
		header('Location:list_matricula.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Sala.</div>";
	}else if (empty($ano_academico)){
		
		header('Location:list_matricula.php');
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Ano Academico.</div>";
	}else{
    
		#VALIDAÇÃO DOS CAMPOS 

		$sql ="UPDATE `matricula` SET `num_matricula` = '$matricula_n', `tipo` = '$tipo_m', `id_inscricao` = '$id_inscricao', `id_turma` = '$id_turma', `ano_academico` = '$ano_academico', `data_matricula` = '$data' WHERE `matricula`.`id_matricula` = $id_matricula";
                  
			if (mysqli_query($connect, $sql)) {
				
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Matrícula Editada com Sucesso.</div>";
					header('Location: list_matricula.php');
			}else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Editar matrícula.</div>";
				header('Location: list_matricula.php');
			}
				
		}
			
	}

?>
	
