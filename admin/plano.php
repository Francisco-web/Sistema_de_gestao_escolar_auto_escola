<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-plano'])) {
    $disciplina = mysqli_escape_string($connect, $_POST['disciplina']);
	$hora = mysqli_escape_string($connect, $_POST['hora']);
	$turma = mysqli_escape_string($connect, $_POST['turma']);
	$ano = date('Y');

	foreach ($_POST['d_semana'] as $key => $value) {
		$d_semana = mysqli_escape_string($connect, $_POST['d_semana'][$key]);

		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($disciplina)){
			
			header('Location:add_plano.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Discíplina.</div>";
		
		}else if (empty($hora)){
			
			header('Location:add_plano.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira a Hora.</div>";
		
		}else if (empty($d_semana)){
			
			header('Location:add_plano.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Dia da Semana.</div>";
		
		}else if (empty($turma)){
			
			header('Location:add_plano.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Turma.</div>";
		
		}else{

                $sql = "INSERT INTO `plano_curricular` (`id_plano`, `id_disciplina`, `id_turma`, `dia_sem`,`hora`, `ano_academico`) 
				VALUES (NULL, '$disciplina','$turma','$d_semana', '$hora', '$ano')";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Plano Curriular Cadastrado com Sucesso.</div>";
					header('Location: add_plano.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Cadastrar Plano Curricular!</div>";
					header('Location: add_plano.php');
			}
				
		}
			
	}

}

?>
	
