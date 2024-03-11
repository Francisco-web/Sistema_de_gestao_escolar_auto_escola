<?php
  # CONEXÃO Com A Base De Dados
  require_once 'db_connect.php';

  # Inicia Sessão
  session_start();
    
  if (isset($_SESSION['UsuarioTipo'])) {

    switch ($_SESSION['UsuarioTipo']) {
       case 'Director':
         header('location: admin.php');
         break;
       
         case 'Secretaria':
         header('location: secretaria.php');
         break;
  
         case 'Professor(a)':
         header('location: professor.php');
         break;

         case 'Aluno':
         header('location: estudante.php');
         break;
  
         default:
         
         break;
       
     }
    }

  if (isset($_POST['btn-entrar'])) {
    
   // Verifica se houve POST e se o usu�rio ou a senha �(s�o) vazio(s)
if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['senha']))) {
  
  $_SESSION['msg'] = " <div class='alert alert-danger' role='alert'> <i class='fa fa-warning'></i> Campos de Preechimento Obrgatório </div>";
    }else{


  $login = mysqli_escape_string($connect, $_POST['login']);
  $senha = mysqli_escape_string($connect, $_POST['senha']);


  // Valida��o do usu�rio/senha digitados
  $sql = "SELECT `id_usuario`, `nome_usuario`, `tipo`, `login`, `Ativo` FROM `usuario` WHERE (`login` = '". $login ."') AND (`senha` = '". md5($senha) ."') AND (`ativo` = 1) LIMIT 1";
  $query = mysqli_query($connect, $sql);
  if (mysqli_num_rows($query) == 1) {

    $resultado =  mysqli_fetch_array($query);
    $_SESSION['UsuarioID'] = $resultado['id_usuario'];
    $_SESSION['UsuarioNome'] = $resultado['nome_usuario'];
    $_SESSION['UsuarioTipo'] = $resultado['tipo'];
    $_SESSION['UsuarioLogin'] = $resultado['login'];

    switch ($_SESSION['UsuarioTipo']) {
      case 'Secretaria':
        header('location: secretaria/secretaria.php');
        break;
      
        case 'Director':
        header('location: admin/admin.php');
        break;

        case 'Professor(a)':
        header('location: professor/professor.php');
        break;
        
        case 'Aluno':
        header('location: aluno/estudante.php');
        break;

        default:
        
        break;
      
    }
    }
  }
  }

  
?>


<!DOCTYPE html>
<html lang="Pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login - SGE Auto Escola </title>

     <!-- CUSTOM STYLES-->
     <link href="assets/css/dustom.css" rel="stylesheet" />
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/lgn.css">
</head>
<body >
 <div class="container">
<img src="assets/img/logotipo.png" alt="logotipo">
        <h1 ><strong> SGE-Auto Escola</strong></h1>

        <?php
          if (isset($_SESSION['msg'])) {
              
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">
              
          <input type="text" name="login" placeholder= "Login" autocomplete="off">
          
          <input type="password" name="senha" placeholder= "Senha" autocomplete="off">

          <button  type="submit" name="btn-entrar">Entrar</button>
        </form>
     </div>
</body>
</html>