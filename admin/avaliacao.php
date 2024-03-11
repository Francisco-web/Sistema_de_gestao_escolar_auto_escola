<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-lancar'])) {
    $aluno = mysqli_escape_string($connect, $_POST['aluno']);
	$classe = mysqli_escape_string($connect, $_POST['classe']);
	$turma = mysqli_escape_string($connect, $_POST['turma']);
	$disciplina = mysqli_escape_string($connect, $_POST['disciplina']);
	$ano_academico = mysqli_escape_string($connect, $_POST['ano_academico']);
	$trimestre = mysqli_escape_string($connect, $_POST['trimestre']);
	$p1 = mysqli_escape_string($connect, $_POST['p1']);
	$p2 = mysqli_escape_string($connect, $_POST['p2']);
	$ac = mysqli_escape_string($connect, $_POST['ac']);
	$recurso = mysqli_escape_string($connect, $_POST['recurso']);
	$exame = mysqli_escape_string($connect, $_POST['exame']);
	$media = mysqli_escape_string($connect, $_POST['media']);
	$resultado = mysqli_escape_string($connect, $_POST['resultado']);
	
	#VALIDAÇÃO DOS CAMPOS 
		if (empty($aluno)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Aluno.</div>";
		}else if (empty($classe)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Classe.</div>";
		
		}else if (empty($turma)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Turma.</div>";
		
		}else if (empty($disciplina)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Discíplina.</div>";
		
		}else if (empty($trimestre)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Trimestre.</div>";
		
		}else if (empty($p1)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira a Nota da 1ª Prova.</div>";
		
		}else if (empty($p2)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira a Nota 2ª Prova.</div>";
		}else if (empty($recurso)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira a Nota do Recurso.</div>";
		
		}else if (empty($resultado)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Resultado.</div>";
		
		}else if (empty($exame)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira a Nota do Exame.</div>";
		
		}else if (empty($media)){
			
			header('Location:add_aval.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira a Média.</div>";
		}else{

                $sql = "INSERT INTO `nota` (`id_nota`, `id_turma`, `id_disciplina`, `id_matricula`, `trimestre`, `1p`, `2p`, `ac`, `recurso`, `exame`, `media`, `resultado`, `data_emissisao`, `ano_academico`) 
				VALUES (NULL, '$turma', '$disciplina', '$aluno', '$trimestre', '$p1', '$p2', '$ac', '$recurso', '$exame', '$media', '$resultado', current_timestamp(), '$ano_academico')";
  
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
	
