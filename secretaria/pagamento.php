<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-pagamento'])) {

	$matricula = mysqli_escape_string($connect, $_POST['matricula']);
	
	$id_sec = mysqli_escape_string($connect, $_POST['sec']);

	$pagamento = mysqli_escape_string($connect, $_POST['id_pag']);
	
	$ano = date('yhs');
	$num = random_int(6,$ano);
	$recibo = $num;

	$valor = mysqli_escape_string($connect, $_POST['valor']);
	
	$multa = mysqli_escape_string($connect, $_POST['multa']);
	
	$desconto = mysqli_escape_string($connect, $_POST['desconto']);
	
	foreach ($_POST['mes'] as $key => $value) {
		$mes = mysqli_escape_string($connect, $_POST['mes'][$key]);
	
		#VALIDAÇÃO DOS CAMPOS 
		if (empty($matricula)){
			
			header('Location:add_pag.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Aluno!</div>";
		}else if (empty($pagamento)){
			
			header('Location:add_pag.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Pagamento!</div>";
		}else if (empty($mes)){
			
			header('Location:add_pag.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Mês!</div>";
		}else if (empty($valor)){
			
			header('Location:add_pag.php');
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira o Valor a pagar!</div>";
		}else{

			$sql ="INSERT INTO `aluno_pag` (`id_aluno_pag`, `id_matricula`, `id_secretaria`, `id_pag`, `num_recibo`, `mes_pag`, `valor_pag`, `forma_pag`, `multa`, `desconto`, `data_pag`) 
					VALUES (NULL, '$matricula', '$id_sec', '$pagamento', '$recibo', '$mes', '$valor', 'Dinheiro', '$multa', '$desconto', current_timestamp())";
           
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Pagamento de Propina Registado com Sucesso.</div>";
					header('Location: add_pag.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Registar Pagamento de Propina!</div>";
					header('Location: add_pag.php');
			}
				
		
			
	}
}
}

?>
	
