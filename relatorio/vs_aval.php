<?php
require_once '../db_connect.php';

        
            $sql = "SELECT nome_usuario FROM usuario WHERE tipo= 'Admin' ";
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
        if (isset($_GET['nc'])& isset($_GET['nc'])& isset($_GET['nc'])) {
            $classe = mysqli_escape_string($connect, $_GET['nc']);
            $periodo = mysqli_escape_string($connect, $_GET['pd']);
            $turma = mysqli_escape_string($connect, $_GET['tm']);

            
           
          
    ?>
                                    <?php   
                                    
                                    $sql = "SELECT distinct nome_classe,nome_turma,periodo,nome_usuario FROM nota n inner join matricula m on n.id_matricula = m.id_matricula join turma t on m.id_turma = t.id_turma JOIN classe c on t.classe = c.id_classe join inscricao i on m.id_inscricao = i.id_inscricao  
                                    join disciplina d on n.id_disciplina= d.id_disciplina join professor p on d.id_professor=p.id_professor join usuario u on p.id_usuario=u.id_usuario WHERE nome_classe='$classe' and nome_turma='$turma' and periodo = '$periodo' ";
                                    $resultado = mysqli_query($connect, $sql);
                                    $dados = mysqli_fetch_array($resultado);
                                       
                                   
                                    ?>
                                    <br>
                                   <table width="1000" colls >
                                    <tr>
                                    <td >Segunda</td>
                                    <td>Terça </td>
                                    <td>Quarta</td>
                                    </tr>
                                    <tr>
                                    <td>Quinta</td>
                                    <td>Sexta</td>
                                    <td>Sábado</td>
                                    </tr>
                                    </table>

    <div class="col-l-4">
                            <table class="table">
                            <tbody>
                            <tr>
                                    <th>Classe</th>
                                    <th>Turma</th>
                                    <th>Turno</th>
                                    <th>Professor</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                
                                <tr>
                                    <td><?php echo $dados['nome_classe']; ?></td>
                                    <td><?php echo $dados['nome_turma']; ?></td>
                                    <td><?php echo $dados['periodo']; ?></td>
                                    <td><?php echo $dados['nome_usuario']; ?></td>

                                   
                            </tr> 

                            </tbody>
                           

                    </table>
                    </div>            

<?php  }  ?> 
</body>
</html>