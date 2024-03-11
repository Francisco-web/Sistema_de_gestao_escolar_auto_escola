<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-disciplina'])) {
    $codigo = mysqli_escape_string($connect, $_POST['codigo']);
	$disciplina = mysqli_escape_string($connect, $_POST['disciplina']);
	$descricao = mysqli_escape_string($connect, $_POST['descricao']);
	$professor = mysqli_escape_string($connect, $_POST['professor']);
	
		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($codigo)){
			
			header('Location:registar_disciplina.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Codigo da Discíplina.</div>";
		
		}else if ( empty($disciplina)){
			
			header('Location:registar_disciplina.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Nome da Discíplina.</div>";
		
		}else if (empty($professor)){
			
			header('Location:registar_disciplina.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Professor.</div>";
		}else{

			$sql ="INSERT INTO disciplina (`id_disciplina`, `codigo_disc`, `nome_disc`, `descricao`, `id_professor`) 
			VALUES (NULL, '$codigo', '$disciplina',' $descricao', '$professor')";
                  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Discíplina Cadastrada com Sucesso.</div>";
					header('Location: registar_disciplina.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Cadastrar Discíplina!</div>";
					header('Location: registar_disciplina.php');
			}
				
		}
			
	}

?>
	
