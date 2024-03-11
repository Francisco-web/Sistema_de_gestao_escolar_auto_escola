<?php
require_once '../db_connect.php';
// Iniciar Sessão
session_start();

#VALIDA OS INPUTS 
if (isset($_POST['btn-pagamento'])) {
	$valor = mysqli_escape_string($connect, $_POST['valor']);
	$pagamento = mysqli_escape_string($connect, $_POST['pagamento']);
	
	$classe = mysqli_escape_string($connect, $_POST['classe']);
	
		#VALIDAÇÃO DOS CAMPOS 

		if (empty($pagamento)){
			
			header('Location:add_propina.php');
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione o Pagamento!</div>";
            
		}else if (empty($valor)){
			
			header('Location:add_propina.php');
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira o Valor!</div>";
            
		}else if (empty($classe)){
			
			header('Location:add_propina.php');
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Selecione a Classe!</div>";
            
		}else{

			$sql ="INSERT INTO `pagamento` (`id_pag`, `id_classe`, `tipo_p`, `valor`) 
            VALUES (NULL, '$classe', '$pagamento', '$valor');";
                  
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Cadastramento feito com Sucesso.</div>";
					header('Location: add_propina.php');
				}else{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Falha ao Cadastrar de Pagamento!</div>";
					header('Location: add_propina.php');
			}
				
		}
			
	}


?>
	
