<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-lancar'])) {
    $aluno = mysqli_escape_string($connect, $_POST['aluno']);
	$turma = mysqli_escape_string($connect, $_POST['turma']);
	$disciplina = mysqli_escape_string($connect, $_POST['disciplina']);
	$trimestre = mysqli_escape_string($connect, $_POST['trimestre']);
	$p1 = mysqli_escape_string($connect, $_POST['p1']);
	$p2 = mysqli_escape_string($connect, $_POST['p2']);
	$ac = mysqli_escape_string($connect, $_POST['ac']);
	$recurso = mysqli_escape_string($connect, $_POST['recurso']);
	$exame = mysqli_escape_string($connect, $_POST['exame']);
	$data = mysqli_escape_string($connect, $_POST['data']);
	
	$id_nota = mysqli_escape_string($connect, $_POST['id']);
	
	#VALIDAÇÃO DOS CAMPOS 
		if (empty($aluno)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Aluno.</div>";
		}else if (empty($turma)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Turma.</div>";
		
		}else if (empty($disciplina)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Discíplina.</div>";
		
		}else if (empty($trimestre)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Trimestre.</div>";
		
		}else{

                $sql = "UPDATE `nota` SET `id_disciplina` = '$disciplina', `id_matricula` = '$aluno', `id_turma` = '$turma',`trimestre` = '$trimestre', `1p` = '$p1', `2p` = '$p2', `ac` = '$ac', `recurso` = '$recurso', `exame` = '$exame', `data_emissisao` = '$data' WHERE `nota`.`id_nota` = '$id_nota'";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Nota Alterada com Sucesso.</div>";
					header('Location: list_aval.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Alterar Nota.</div>";
					header('Location: list_aval.php');
			}
				
		}
			
	}

?>
	
