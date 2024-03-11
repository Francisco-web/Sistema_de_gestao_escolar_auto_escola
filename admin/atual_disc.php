<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
    $codigo = mysqli_escape_string($connect, $_POST['codigo']);
	$disciplina = mysqli_escape_string($connect, $_POST['disciplina']);
	$descricao = mysqli_escape_string($connect, $_POST['descricao']);
	$professor = mysqli_escape_string($connect, $_POST['professor']);
	$id = mysqli_escape_string($connect, $_POST['id']);
	
		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($codigo) ){
			
			header('Location:list_disc.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Codigo da Discíplina.</div>";
			
		}else if (empty($disciplina)){
			
			header('Location:list_disc.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Nome da Discíplina.</div";
		
		}else if (empty($professor)){
			
			header('Location:list_disc.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: selecione o Professor.</div>";
		}else{

			$sql ="UPDATE `disciplina` SET `codigo_disc` = '$codigo',`nome_disc` = '$disciplina',`descricao` = '$descricao'
			,`id_professor` = '$professor' WHERE `disciplina`.`id_disciplina` = $id";
                  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados da Discíplina Alterado com Sucesso.</div>";
					header('Location: list_disc.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Alterar Dados da Discíplina.</div>";
					header('Location: list_disc.php');
			}
				
		}
			
	}

?>
	
