
        <?php 
        include_once 'menu_rod/menu_aluno.php';

        $user = $_SESSION['UsuarioNome'];

        $sql = "SELECT * FROM inscricao i inner join usuario u on i.id_usuario = u.id_usuario 
        join matricula m on m.id_inscricao = i.id_inscricao 
        join turma t on m.id_turma = t.id_turma join classe c on t.classe= c.id_classe WHERE nome_usuario = '$user' ";
        $resultado = mysqli_query($connect, $sql);
        $dados = mysqli_fetch_array($resultado);
        
        $matricula = $dados['num_matricula'];
        
        $nome = $dados['nome_usuario'];
        $tipo_matricula = $dados['tipo'];
        $telefone = $dados['tel1'];
        $telefone2 = $dados['tel2'];
        $classe = $dados['nome_classe'];
        $email = $dados['email'];
        $utilizador = $dados['tipo'];
        $ano_academico = $dados['ano_academico'];
        $estado =  $dados['ativo'];

        $turma = $dados['nome_turma'];
        $periodo = $dados['periodo'];
        $sala =  $dados['num_sala'];

        $senha =  $dados['senha'];

        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $nome?></h2>   
                     <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                        <br>
                        <form action="" method="POST">
                            <div class="row">
                                    <div class="form-group">
                                        <label>Estudante Nº: </label> <?php echo $matricula?>
                                    </div>
                                <h4>Estado Actual</h4>
                                
                                <div class="form-group">
                                        <label>Matriculado na: </label> <?php echo $classe?>
                                </div>
                                
                                <div class="form-group">
                                    <label>Turma:</label> <?php echo $turma?>
                                </div>

                                <div class="form-group">
                                    <label>Periodo:</label> <?php echo $periodo ?>
                                </div>

                                <div class="form-group">
                                    <label>Sala:</label> <?php echo $sala ?>
                                </div>

                                <div class="form-group">
                                    <label>Estado:</label> <?php echo $estado == 1 ? "Ativo " : "Desactivo ";?>
                                </div>

                                <div class="form-group">
                                    <label>Ano Lectivo:</label> <?php echo $ano_academico?>
                                </div>

                                <br>

                                <h4>Contactos</h4>
                                
                                <div class="form-group">
                                    <label>Telemovel:</label> <?php echo $telefone?>
                                </div>

                                <div class="form-group">
                                    <label>Telemovel(Alternativo):</label> <?php echo $telefone2?>
                                </div>
                                <div class="form-group">
                                    <label>E-Email: </label> <?php echo $email?>
                                </div>

                            </div> 
                        </form>
                    </div> 
                     
                </div>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                 

            </div>
           
        </div>
     <!-- /. WRAPPER  -->
     <?php 
        include_once 'menu_rod/rod_aluno.php';
        ?> 