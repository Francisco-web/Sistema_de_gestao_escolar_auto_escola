<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-convocatoria'])) {
	$tipo = mysqli_escape_string($connect, $_POST['tipo']);
	$assunto = mysqli_escape_string($connect, $_POST['assunto']);
	$conteudo = mysqli_escape_string($connect, $_POST['conteudo']);
	$id_director = mysqli_escape_string($connect, $_POST['director']);
	
		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($tipo)){
			
			header('Location:add_convocatoria.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Tipo de Comunicado.</div>";

		}elseif (empty($assunto)){
			
			header('add_convocatoria.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Assunto!</div>";

		}elseif (empty($conteudo)){
			
			header('add_convocatoria.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Texto!</div>";

		}else{

			$sql ="INSERT INTO `convocatoria` (`num_conv`, `tipo`, `assunto`, `conteudo`, `data_conv`, `id_usuario`) VALUES (NULL, '$tipo', '$assunto', '$conteudo', current_timestamp(), '$id_director')";
                  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Comunicado Registrado com Sucesso.</div>";
					header('Location: add_convocatoria.php');

				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Registrar Comunicado.</div>";
					header('Location: add_convocatoria.php');
			}
				
		}
			
	}

?>
	
