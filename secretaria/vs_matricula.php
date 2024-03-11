
        <?php 
        include_once 'menu_rod/menu_sec.php'
        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <br>
                            <?php
                                if (isset($_GET['id'])&& isset($_GET['matricula'])&& isset($_GET['inscricao'])) {
                                $id_matricula = mysqli_escape_string($connect, $_GET['id']);
                                $inscricao = mysqli_escape_string($connect, $_GET['inscricao']);
                                $matricula = mysqli_escape_string($connect, $_GET['matricula']);
                                }
                                $sql = "SELECT * FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao 
                                join usuario u on i.id_usuario = u.id_usuario join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe  Where id_matricula = '$id_matricula' and num_matricula = '$matricula' and num_inscricao = '$inscricao' ";
                                $resultado = mysqli_query($connect, $sql);
                                $dados = mysqli_fetch_array($resultado);
        
                                $matricula = $dados['num_matricula'];
        
                                $tipo_matricula = $dados['tipo'];
                                $telefone = $dados['tel1'];
                                $telefone2 = $dados['tel2'];
                                $classe = $dados['nome_classe'];
                                $email = $dados['email'];
                                $utilizador = $dados['tipo'];
                                $ano_academico = $dados['ano_academico'];
                                $sala =  $dados['num_sala'];

                                $turma = $dados['nome_turma'];
                                $periodo = $dados['periodo'];
                                $data_m =  $dados['data_matricula'];

                                $documento =  $dados['tipo_documento'];
                                $documento_n =  $dados['num_documento'];
                                
                                $nome = $dados['nome_usuario'];
                                $sexo =  $dados['sexo'];
                                $doc = $dados['tipo_documento'];
                              
                                $nome_p = $dados['nome_pai'];
                                $nome_m = $dados['nome_mae'];
                            
                            ?>
                        
                       
                        <form action="" method="POST">
                        
                        <div class="row">
                        <h3>Detalhes da Matrícula</h3>
                        
                                 <table class="table table-striped table-advance table-hover">
                                    
                                    <tr>
                                    <td ><strong> Nome: </strong> <?php echo $nome; ?></td>
                                    <td ><strong> Matricula: </strong><?php echo $matricula; ?></td>
                                    <td ><strong> Classe: </strong><?php echo $classe; ?></td>
                                    <td ><strong> Periodo: </strong><?php echo $periodo; ?></td>
                                    <td ><strong> Turma: </strong><?php echo $turma; ?></td>
                                    </tr>
                                    <tr>
                                    <td ><strong> Sala: </strong> <?php echo $sala; ?></td>
                                    <td ><strong> Ano Lectivo: </strong><?php echo $ano_academico; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    
                                    <tr>
                                    <td ><strong> Encarregados de Educação: </strong> <?php echo $nome_p; ?> (Pai) e <?php echo $nome_m; ?> (Mãe)</td>
                                    <td ><strong> Matricula </strong> <?php echo $tipo_matricula; ?></td>
                                    <td ><strong> Doc. idenificação: </strong> <?php echo $documento; ?><strong> Nº </strong> <?php echo $documento_n; ?></td>
                                    <td>............................</td>
                                    <td>.........................</td>
                                    </tr>
                                    <tr>
                                    <td><strong>Data de Matricula:</strong> <?php echo $data_m; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                </table>
                                <div class="form-group">
                                <a href="" class="btn btn-default"><i class="fa fa-print"></i> imprimir</a>     
                                <a href="list_matricula.php" class="btn btn-default"><i class="fa fa-undo"></i> Voltar</a>     
                                </div>
                        </form>
                        </div>
                    </div> 
                        
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
        <?php 
        include_once 'menu_rod/rod_sec.php'
        ?> 