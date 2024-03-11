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

                $sql = "INSERT INTO `nota` (`id_nota`, `id_disciplina`, `id_matricula`,`id_turma`, `trimestre`, `1p`, `2p`, `ac`, `recurso`, `exame`,`data_emissisao`) 
				VALUES (NULL, '$disciplina', '$aluno', '$turma', '$trimestre', '$p1', '$p2', '$ac', '$recurso', '$exame', current_timestamp())";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Nota Lançada com Sucesso.</div>";
					header('Location: add_aval.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Lançar Nota.</div>";
					header('Location: add_aval.php');
			}
				
		}
			
	}

?>
	
