<?php
// Conexão
require_once '../db_connect.php';
// A sess�o precisa ser iniciada em cada p�gina diferente
if (!isset($_SESSION)) session_start();

// Verifica se n�o h� a vari�vel da sess�o que identifica o usu�rio
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioTipo'] !== "Secretaria")) {
	// Destr�i a sess�o por seguran�a
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: ../index.php"); exit;
}

date_default_timezone_set('Africa/Luanda');

$data = date('D');
$hora = date('H:i A');
$mes = date('M');
$dia = date('d');
$ano = date('Y');

$semana = array(
    'Sun' => 'Domingo',
    'Mon' => 'Segunda-Feira',
    'Tue' => 'Terca-Feira',
    'Wed' => 'Quarta-Feira',
    'Thu' => 'Quinta-Feira',
    'Fri' => 'Sexta-Feira',
    'Sat' => 'Sábado'
);

$mes_extenso = array(
    'Jan' => 'Janeiro',
    'Feb' => 'Fevereiro',
    'Mar' => 'Marco',
    'Apr' => 'Abril',
    'May' => 'Maio',
    'Jun' => 'Junho',
    'Jul' => 'Julho',
    'Aug' => 'Agosto',
    'Nov' => 'Novembro',
    'Sep' => 'Setembro',
    'Oct' => 'Outubro',
    'Dec' => 'Dezembro'
);

$id = $_SESSION['UsuarioID'];
$tipo = $_SESSION['UsuarioTipo'];
$nome = $_SESSION['UsuarioNome'];
?>
<!DOCTYPE html>
<html >
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Secretaria Online - SGE Auto Escola</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/dustom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="secretaria.php">Auto Escola</a> 
            </div>
            <span style="color: white;
                padding: 15px 50px 5px 50px;
                float: left;
                font-size: 16px;">

                <?php echo $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}". " ______ "; ?>
                <?php echo "    Hora: {$hora}"; ?>

            </span>

            <div id="navbar" class="navbar-collapse collapse">       
                <ul  class="nav navbar-right">
						<li class="dropdown">
						<a style="color:green"; href="#" data-toggle="dropdown" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-user"></i> <?php echo $_SESSION['UsuarioTipo']; ?>  <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
							
								<a href="vs_perfil.php?usid=<?php echo $id; ?> & tpus=<?php echo $tipo; ?> "><i class="fa fa-user"></i> Perfil</a>
								</li>
							<li>
								<a href="../logout.php"><i class="fa fa-sign-out"></i> Sair</a>
							</li>
						</ul>
					</li>
				</ul>
            </div> 
            </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="../assets/img/logotipo.png" class="user-image img-responsive" alt="logotipo"/>
                    </li>
					
                   <li>
                        <a class="active-menu"  href="Secretaria.php"><i class="fa fa-home fa-3x"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop fa-2x "></i>Gestão Academica<span ></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="list_inscricao.php"></i>Inscrição</a>
                            </li>
                            <li>
                                <a href="list_matricula.php">Matrícula</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a   href="list_conv.php"><i class="fa fa-copy fa-2x"></i>Convocatória</a>
                    </li>  
                    <li>
                        <a  href="list_pag.php"><i class="fa fa-money fa-2x"></i>Pagamento</a>
                    </li>
                    <li>
                        <a  href="list_plano.php"><i class="fa fa-copy fa-2x"></i>Horário</a>
                    </li>
                       
                </ul>
               
            </div>
            
        </nav> 
        <!-- /. NAV SIDE  -->