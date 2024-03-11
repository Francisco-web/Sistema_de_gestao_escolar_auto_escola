
        <?php 
        include_once 'menu_rod/menu_aluno.php'
        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <br>
                            <?php
                                 $nome_usuario = $_SESSION['UsuarioNome'];
                                $sql = "SELECT * FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao 
                                join usuario u on i.id_usuario = u.id_usuario Where nome_usuario = '$nome_usuario' ";
                                $resultado = mysqli_query($connect, $sql);
                                $dados = mysqli_fetch_array($resultado);
        
                                $nome = $dados['nome_usuario'];
                                $sexo =  $dados['sexo'];
                                $doc = $dados['tipo_documento'];
                                $num_doc = $dados['num_documento'];
                                $data_validade = $dados['data_validade'];
                                $nacionalidade = $dados['nacionalidade'];
                                $naturalidade = $dados['naturalidade'];
                                $residencia = $dados['residencia'];
                                $municipio = $dados['municipio'];
                                $cidade = $dados['cidade'];

                                $nome_p = $dados['nome_pai'];
                                $est_civil_p = $dados['estado_civil_p'];
                                $prof_pai =  $dados['profissao_pai'];
                                $sit_pai =  $dados['situacao_pai'];

                                $nome_m = $dados['nome_mae'];
                                $est_civil_m = $dados['estado_civil_m'];
                                $prof_mae =  $dados['profissao_mae'];
                                $sit_mae =  $dados['situacao_mae'];
                            
                            ?>
                        
                        <h2>Dados Pessoais</h2>
                        <br>
                        <div class='alert alert-info' role='alert'>
                        <form action="turma.php" method="POST">
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome: </label>
                                       <?php echo $nome; ?>
                                    </div>
                                </div> 
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Documento de Identificação: </label>
                                        <?php echo $doc; ?>                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nº do Documento :</label>
                                        <?php echo $num_doc; ?>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Validade do Doc: </label>
                                        <?php echo $data_validade; ?>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nacionalidade: </label>
                                        <?php echo $nacionalidade; ?>
                                            
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Natural de: </label>
                                        <?php echo $naturalidade; ?>
                                            
                                    </div>
                                </div>
 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Residência:</label>
                                        <?php echo $residencia; ?>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Muncípio:</label>
                                       <?php echo $municipio; ?>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cidade: </label>
                                        <?php echo $cidade; ?>
                                    </div> 
                                </div>
                                
                                
                        </div>
                        </div>    
                            <!--/Dados do estudante-->
                                
                            <!--Dados dos pais-->
                            <div class='alert alert-info' role='alert'>
                            <div class="row">
                                <h2>Filiação</h2>
                                
                                <div class="panel panel-primary">
                                 </div><br>   
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pai: </label>
                                            <?php echo $nome_p; ?>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estado Civil: </label>
                                            <?php echo $est_civil_p; ?>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Profissão: </label>
                                            <?php echo $prof_pai; ?>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Situação: </label>
                                                <?php echo $sit_pai; ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mãe: </label>
                                                    <?php echo $nome_m; ?>
                                                    
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estado Civil: </label>
                                            <?php echo $est_civil_m; ?>
                                            
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Profissão: </label>
                                                    <?php echo $prof_mae; ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <label>Situação: </label>
                                                        <?php echo $sit_mae; ?>
                                                        
                                                </div>
                                            </div>
                                
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
        include_once 'menu_rod/rod_aluno.php'
        ?> 