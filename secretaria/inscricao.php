<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-inscricao'])) {
	
	//Cadastro do login_aluno

	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$tipo_documento = mysqli_escape_string($connect, $_POST['documento']);
	$num_documento = mysqli_escape_string($connect, $_POST['n_documento']);
	$sexo = mysqli_escape_string($connect, $_POST['sexo']);
	$tel1 = mysqli_escape_string($connect, $_POST['tel1']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	
	//inscricao
	$num_inscricao = mysqli_escape_string($connect, $_POST['num_inscricao']);
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

		#VALIDAÇÃO DOS CAMPOS 
		
		if (empty($num_inscricao)){
			
			header('Location:add_inscricao.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira o Número de Inscrição!</div>";
		}else if (empty($nome)){
			
			header('Location: add_inscricao.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Aluno.</div>";
		}else if (empty($classe_pretendida)){
			
			header('Location:add_inscricao.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite a Classe Pretendida!</div>";
		}else if (empty($nome)){
			
				header('Location:add_inscricao.php');
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Nome do Aluno!</div>";
			}else if (empty($tipo_documento)){
				
				header('Location:add_inscricao.php');
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Documento de Identificação!</div>";
			}else if (empty($sexo)){
				
				header('Location:add_inscricao.php');
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Sexo!</div>";
			}else if (empty($tel1)){
				
				header('Location:add_inscricao.php');
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Número de Telefone!</div>";
			}else {
				
			$login = $num_inscricao;	
			$senha = $login;
			$senha = md5($senha);

			$sql_log = "INSERT INTO usuario (`id_usuario`, `nome_usuario`,`tipo_documento`,`num_documento`, `sexo`, `tel1`, `email`, `tipo`, `ativo`,`login`,`senha`) 
			VALUES (NULL, '$nome', '$tipo_documento', '$num_documento', '$sexo', '$tel1', '$email', 'Aluno','1', '$login','$senha')";
			 
			 if (mysqli_query($connect, $sql_log)) {
				$last_id = mysqli_insert_id($connect);

			 $sql = "INSERT INTO `inscricao` (`id_inscricao`, `num_inscricao`, `id_usuario`, `data_inscricao`, 
			 `data_nasc`, `data_validade`, `nacionalidade`, `naturalidade`, `residencia`, `municipio`, `cidade`, 
			 `tel2`, `nome_pai`, `estado_civil_p`, `profissao_pai`, `situacao_pai`, `nome_mae`, `estado_civil_m`, 
			 `profissao_mae`, `situacao_mae`, `classe_anterior`, `escola_anterior`, `media_final`, `classe_pretendida`, 
			 `ano_acad_concluido`) 
			 VALUES (NULL, '$num_inscricao', '$last_id', current_timestamp(), '$data_nascimento', '$data_validade', '$nacionalidade', '$naturalidade', 
			 '$residencia', '$municipio', '$cidade', '$telefone', '$nome_pai', '$estado_civil_pai', '$profissao_pai', 
			 '$situacao_pai', '$nome_mae', '$estado_civil_mae', '$profissao_mae', '$situacao_mae', '$classe_anterior', '$nome_escola',
			  '$media', '$classe_pretendida', '$ano_concluido')";
				
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Aluno Inscrito com Sucesso.</div>";
					header('Location: add_inscricao.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Inscrever Novo Aluno !</div>";
					header('Location: add_inscricao.php');
			
				}
			}
				
		}
			
	}

?>
	
