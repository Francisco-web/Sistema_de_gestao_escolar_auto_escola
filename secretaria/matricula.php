<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-matricula'])) {
	$matricula = mysqli_escape_string($connect, $_POST['num_matricula']);
	$nome = mysqli_escape_string($connect, $_POST['aluno']);
	$tipo_m = mysqli_escape_string($connect, $_POST['tipo_matricula']);
	$turma = mysqli_escape_string($connect, $_POST['turma']);
	
    $ano = date('Y');
	
		#VALIDAÇÃO DOS CAMPOS 

		if (empty($matricula)){
			
			header('Location:add_matricula.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira o Número de Matrícula.</div>";
		}else if (empty($nome)){
			
			header('Location:add_matricula.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Aluno.</div>";
		}else if (empty($tipo_m)){
			
			header('Location:add_matricula.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o tipo de Matrícula.</dive>";
		}else if (empty($turma)){
			
			header('Location:add_matricula.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Turma.</div>";
		}else{

			$sql ="INSERT INTO matricula (id_matricula,num_matricula, tipo, id_inscricao, id_turma,ano_academico , data_matricula) 
			VALUES (null,'$matricula', '$tipo_m', '$nome', '$turma', '$ano', current_timestamp())";
                  
				if (mysqli_query($connect, $sql)) {
				
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Aluno Matriculado com Sucesso.</div>";
					header('Location: add_matricula.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao matricular Aluno.</div>";
					header('Location: add_matricula.php');
			}
				
		}
			
	}

?>
	
