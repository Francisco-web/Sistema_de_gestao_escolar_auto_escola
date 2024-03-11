<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-turma'])) {
    $turma = mysqli_escape_string($connect, $_POST['turma']);
    $periodo = mysqli_escape_string($connect, $_POST['periodo']);
    $sala = mysqli_escape_string($connect, $_POST['sala']);
    $classe = mysqli_escape_string($connect, $_POST['classe']);
    $professor = mysqli_escape_string($connect, $_POST['professor']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($turma)){
			
			header('Location:registar_turma.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Nome da Turma </div>";
		}else if (empty($periodo)){
			
			header('Location:registar_turma.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Período.</div>";
		}else if (empty($sala)){
			
			header('Location:registar_turma.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira o Número da Sala.</div>";
		}else if ( empty($classe)){
			
			header('Location:registar_turma.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Classe.</div>";
		}else if ( empty($professor)){
			
			header('Location:registar_turma.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Professor.</div>";
		}else{

			$sql = "INSERT INTO `turma` (`id_turma`, `nome_turma`, `classe`, `periodo`, `num_sala`, `id_professor`) 
					VALUES (NULL, '$turma', '$classe', '$periodo', '$sala', '$professor');";
                
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Turma Cadastrada com Sucesso.</div>";
					header('Location: registar_turma.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Falha ao Cadastrar Turma.</div>";
					header('Location: registar_turma.php');
			}
				
		}
			
	}

?>
	
