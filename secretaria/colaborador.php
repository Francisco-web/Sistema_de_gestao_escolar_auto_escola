<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-colaborador'])) {
    $nome = mysqli_escape_string($connect, $_POST['nome']);
	$tipo_documento = mysqli_escape_string($connect, $_POST['documento']);
	$num_documento = mysqli_escape_string($connect, $_POST['n_documento']);
	$sexo = mysqli_escape_string($connect, $_POST['sexo']);
	$telefone = mysqli_escape_string($connect, $_POST['telefone']);
	$email = mysqli_escape_string($connect, $_POST['email']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
   
		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($nome)){
			
			header('Location:cadastrar_aluno.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Nome do Aluno!</div>";
		}else if (empty($tipo_documento)){
			
			header('Location:cadastrar_aluno.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Documento de Identificação!</div>";
		}else if (empty($num_documento)){
			
			header('Location:cadastrar_aluno.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Número de Identificação!</dive>";
		}else if (empty($sexo)){
			
			header('Location:cadastrar_aluno.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Sexo!</div>";
		}else if (empty($telefone)){
			
			header('Location:cadastrar_aluno.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Número de Telefone!</div>";
		}else if (empty($email)){
			
			header('Location:cadastrar_aluno.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Email!</div>";
		}else if (empty($senha)){
			
			header('Location:cadastrar_aluno.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite a Senha!</div>";
		
		}else{

			$senha = md5($senha);
			 $sql = "INSERT INTO usuario (`id_usuario`, `nome_usuario`,`tipo_documento`,`num_documento`, `sexo`, `tel1`, `email`, `tipo`, `ativo`,`senha`) 
			VALUES (NULL, '$nome', '$tipo_documento', '$num_documento', '$sexo', '$telefone', '$email', 'Aluno','1', '$senha')";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Aluno Cadastrado com Sucesso.</div>";
					header('Location: cadastrar_aluno.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Falha ao Cadastrar Aluno!</div>";
					header('Location: cadastrar_aluno.php');
			}
				
		}
			
	}

?>
	
