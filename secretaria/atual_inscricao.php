<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
	
	$num_matricula = mysqli_escape_string($connect, $_POST['num_matricula']);	
    $nome = mysqli_escape_string($connect, $_POST['aluno']);
	$data_nascimento = mysqli_escape_string($connect, $_POST['data_n']);
	$documento = mysqli_escape_string($connect, $_POST['documento']);
	$numero_documento = mysqli_escape_string($connect, $_POST['n_documento']);
    $data_validade= mysqli_escape_string($connect, $_POST['data_val']);
	
    $nacionalidade = mysqli_escape_string($connect, $_POST['nacionalidade']);
	$naturalidade = mysqli_escape_string($connect, $_POST['naturalidade']);
	$residencia = mysqli_escape_string($connect, $_POST['residencia']);
	$municipio = mysqli_escape_string($connect, $_POST['municipio']);
	$cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);
   
  //Dados dos pais
  
  	$nome_pai = mysqli_escape_string($connect, $_POST['nome_pai']);
	$estado_civil_pai = mysqli_escape_string($connect, $_POST['estado_c']);
	$profissao_pai = mysqli_escape_string($connect, $_POST['profissao_p']);
	$situacao_pai = mysqli_escape_string($connect, $_POST['situacao_p']);
	
	$nome_mae = mysqli_escape_string($connect, $_POST['nome_mae']);
   	$estado_civil_mae = mysqli_escape_string($connect, $_POST['estado_civil']);
	$profissao_mae = mysqli_escape_string($connect, $_POST['profissao_m']);
	$situacao_mae = mysqli_escape_string($connect, $_POST['situacao_m']);

	//Dados academico anterior

	$classe_anterior = mysqli_escape_string($connect, $_POST['classe_anterior']);
   	$nome_escola = mysqli_escape_string($connect, $_POST['escola_anterior']);
	$media = mysqli_escape_string($connect, $_POST['media']);
	$classe_pretendida = mysqli_escape_string($connect, $_POST['classe_pretendida']);
	$ano_concluido = mysqli_escape_string($connect, $_POST['ano_academico_concluido']);

	$id = mysqli_escape_string($connect, $_POST['id']); 

		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($num_matricula) or empty($classe_anterior)or empty($classe_pretendida)){
			
			header('Location: list_inscricao.php');
			$_SESSION['msg'] = "<h4 style='color:red';> Erro: Digite o Número de Matrícula.</h4>";
		}else if (empty($classe_anterior)){
			
			header('Location: list_inscricao.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Aluno.</div>";
		}else if (empty($classe_pretendida)){
			
			header('Location: list_inscricao.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite a Classe Pretendida.</div>";
		}else if (empty($nome)){
			
			header('Location: list_matricula.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Nome do Aluno.</div>";
		}else if (empty($numero_documento)){
			
			header('Location: list_inscricao.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Número do Documento.</div>";
		}else{

			 $sql = "UPDATE `inscricao` SET `num_inscricao` = '$num_matricula', `id_usuario` = '$nome', `data_inscricao` = current_timestamp(), 
			 `data_nasc` = '$data_nascimento', `data_validade` = '$data_validade', `nacionalidade` = '$nacionalidade', 
			 `naturalidade` = '$naturalidade', `residencia` = '$residencia', `municipio` = '$municipio',
			  `cidade` = '$cidade', `tel2` = '$telefone', `nome_pai` = '$nome_pai', 
			  `estado_civil_p` = '$estado_civil_pai', `profissao_pai` = '$profissao_pai', `situacao_pai` = '$situacao_pai',
			   `nome_mae` = '$nome_mae', `estado_civil_m` = '$estado_civil_mae', 
			   `profissao_mae` = '$profissao_mae', `situacao_mae` = '$situacao_mae', `classe_anterior` = '$classe_anterior',
			    `escola_anterior` = '$nome_escola', `media_final` = '$media', `classe_pretendida` = '$classe_pretendida',
				 `ano_acad_concluido` = '$ano_concluido' WHERE `inscricao`.`id_inscricao` = $id";
			 	
			 	  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>  Inscrição Actualizada com Sucesso.</div>";
					header('Location: list_inscricao.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Actualizar Inscrição.</div>";
					header('Location: list_inscricao.php');
			}
				
		}
			
	}

?>
	
