<?php
require_once '../db_connect.php';

        
            $sql = "SELECT nome_usuario FROM usuario WHERE tipo= 'Director' ";
            $resultado = mysqli_query($connect, $sql);
           $dados = mysqli_fetch_array($resultado);
           $director = $dados['nome_usuario'];
               
           
?>
<!DOCTYPE html>
<html lang="Pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convocatória/Nota Informativa</title>

    <style>
        body{
            width: 1000px;
            margin: auto;
            font-family: Times New Roman;
            padding: 50px;

            
        }

        header, .contractP{
            text-align: center;
            
        }


        p{
            text-indent: 50px;
            line-height: 20px;
        }

        hr{
            width: 200px;
            margin: 30px 0 5px 0px;
        }

        .assign{
            display: flex;
            margin-top: 30px;
            margin-left: 350px
        }
        img{
            width: 10%;
            height: 10%;
        }



    </style>
</head>
<body>

    <header>
        <img src="Logotipo.png" alt="logotipo">
        <h4>REPÚBLICA DE ANGOLA <br>MINISTÉRIO DA EDUCAÇÃO <br>COMPLEXO ESCOLAR AUTO ESCOLA </h4>
        
    </header>

    <?php
        if (isset($_GET['id'])) {
            $id = mysqli_escape_string($connect, $_GET['id']);
            $sql = "SELECT * FROM convocatoria WHERE num_conv = '$id' ";
            $resultado = mysqli_query($connect, $sql);
           $dados = mysqli_fetch_array($resultado);
               
           
          
    ?>

    <h3 class="contractP" style="text-decoration: underline"><b><?php echo $dados['tipo']; ?> nº <?php echo $dados['num_conv']; ?></b></h3>

    <p><?php echo $dados['conteudo']; ?></p>

    <p>Luanda, aos <?php echo date('d/m/Y'); ?> .</p>

    <div style="text-align: center; padding: 10px; ">
        <div class="assign">
            <div class="assigner1">
                    <span class="names">A Direcção</span>
                <hr >


                <span class="names"><?php echo $director ?></span>
            </div>
            
        </div>
    </div>

<?php } ?> 
</body>
</html>