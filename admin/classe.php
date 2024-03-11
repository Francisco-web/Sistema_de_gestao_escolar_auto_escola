<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-classe'])) {
    $codigo = mysqli_escape_string($connect, $_POST['codigo']);
    $classe = mysqli_escape_string($connect, $_POST['classe']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($codigo)){
			
			header('Location:registar_nivel.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Codigo da Classe.</div>";
		
		}else if (empty($classe)){
			
			header('Location:registar_nivel.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Nome da Classe.</div>";
		}else{

                $sql = "INSERT INTO classe(nome_classe,codigo_classe)
                VALUES('$classe', '$codigo')";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Classe Adicionada com Sucesso.</div>";
					header('Location: registar_nivel.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Adicionar Classe.</div>";
					header('Location: registar_nivel.php');
			}
				
		}
			
	}

?>
	
