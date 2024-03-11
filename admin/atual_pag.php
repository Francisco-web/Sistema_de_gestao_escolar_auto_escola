<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-editar'])) {
	
	$estudante = mysqli_escape_string($connect, $_POST['aluno']);
	$id_pagamento = mysqli_escape_string($connect, $_POST['id_pag']);
	$recibo = mysqli_escape_string($connect, $_POST['num_recibo']);
	$mes = mysqli_escape_string($connect, $_POST['mes']);
	$valor = mysqli_escape_string($connect, $_POST['valor']);
	$pagamento = mysqli_escape_string($connect, $_POST['forma_pag']);
	$multa = mysqli_escape_string($connect, $_POST['multa']);
	$desconto = mysqli_escape_string($connect, $_POST['desconto']);
    
	$id = mysqli_escape_string($connect, $_POST['id']);
   
		#VALIDAÇÃO DOS CAMPOS 
		


		$sql="UPDATE `aluno_pag` SET `id_matricula`='$estudante',`id_pag`='$id_pagamento'
		,`num_recibo`='$recibo',`mes_pag`='$mes',`valor_pag`='$valor',`forma_pag`='$pagamento',
		`multa`='$multa',`desconto`='$desconto'WHERE `aluno_pag`.`id_aluno_pag` = $id";
  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados do Pagamento Alterado com Sucesso.</div>";
					header('Location: list_pag.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Alterar Dados do Pagamento.</div>";
					header('Location: list_pag.php');
			}
				
					
	}

?>
	
