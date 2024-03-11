<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
    $disciplina = mysqli_escape_string($connect, $_POST['disciplina']);
	$classe = mysqli_escape_string($connect, $_POST['classe']);
	$hora = mysqli_escape_string($connect, $_POST['hora']);
	$turma = mysqli_escape_string($connect, $_POST['turma']);
	$ano = date('Y');

	  
		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($disciplina)){
			
			header('Location:add_plano.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Discíplina.</div>";
		
		}else if (empty($classe)){
			
			header('Location:add_plano.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Classe.</div>";
		
		}else if (empty($hora)){
			
			header('Location:add_plano.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira a Hora.</div>";
		
		}else if (empty($turno)){
			
			header('Location:add_plano.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Turno.</div>";
		
		}else if (empty($d_semana)){
			
			header('Location:add_plano.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Dia da Semana.</div>";
		
		}else if (empty($turma)){
			
			header('Location:add_plano.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Turma.</div>";
		
		}else{

                $sql = "UPDATE `plano_curricular` SET `id_plano` =NULL, `id_disciplina`='$disciplina', `id_turma`='$turma',`classe`='$classe', `dia_sem`,`hora`='$d_semana', `turno`='$turno', `ano_academico`='$ano' ";
  
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
}

?>
	
  
?>
	
