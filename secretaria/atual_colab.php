<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
    $nome = mysqli_escape_string($connect, $_POST['nome']);
	$sexo = mysqli_escape_string($connect, $_POST['sexo']);
	$telefone = mysqli_escape_string($connect, $_POST['telefone']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$t_documento = mysqli_escape_string($connect, $_POST['t_documento']);
	$num_documento = mysqli_escape_string($connect, $_POST['num_documento']);
    $estado = mysqli_escape_string($connect, $_POST['estado']);
   
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
			$sql="UPDATE `usuario` SET `nome_usuario` = '$nome', 
			`num_documento` = '$num_documento',`tipo_documento` = '$t_documento', `sexo` = '$sexo', 
			`tel1` = '$telefone', `email` = '$email', 
			`tipo` = 'Aluno', `ativo` = '$estado'
			 WHERE `usuario`.`id_usuario` = $id";
  
  if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados do Aluno Editado com Sucesso.</div>";
					header('Location: cadastrar_aluno.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Editar Dados do Aluno!</div>";
					header('Location: cadastrar_aluno.php');
			}
				
			
	}

?>
	
