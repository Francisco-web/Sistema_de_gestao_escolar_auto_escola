
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
                                if (isset($_GET['idins']) && isset($_GET['inscricao']) && isset($_GET['data'])) {
                                $id_inscricao = mysqli_escape_string($connect, $_GET['idins']);
                                $n_inscricao = mysqli_escape_string($connect, $_GET['inscricao']);
                                $data_inscricao = mysqli_escape_string($connect, $_GET['data']);
                                
                                }
                                $sql = "SELECT * FROM inscricao i inner join usuario u on i.id_usuario = u.id_usuario where id_inscricao = '$id_inscricao' and data_inscricao ='$data_inscricao' and num_inscricao ='$n_inscricao'";
                                $resultado = mysqli_query($connect, $sql);
                                $dados = mysqli_fetch_array($resultado);
                                
                                $num_inscricao = $dados['num_inscricao'];
                                $telefone = $dados['tel1'];
                                $telefone2 = $dados['tel2'];
                                $email = $dados['email'];
                               
                                //Dados Academicos Anterior
                               
                                $classe_anterior = $dados['classe_anterior'];
                                $escola_anterior =  $dados['escola_anterior'];
                                $classe_pretendida =  $dados['classe_pretendida'];
                                $media_final =  $dados['media_final'];
                                $ano_concluido =  $dados['ano_acad_concluido'];
                                                    
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
                        
                       
                        <form action="" method="POST">
                        
                        <div class="row">
                        <h3>Dados Pessoais</h3>
                                <div class="panel panel-primary">
                                 </div><br>  
                        
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
                            <!--/Dados do estudante-->
                                
                            <!--Dados dos pais-->
                            
                            <div class="row">
                                <h3>Filiação</h3>
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
                                <!--Dados Academico-->
                                <h3>Dados Academico</h3>
                                <div class="panel panel-primary">
                                 </div><br>
                                 
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label> Inscrição Nº: </label> <?php echo $num_inscricao;?>
                                </div>
                                </div>
                                
                                <div class="col-md-6">    
                                <div class="form-group">
                                    <label>Escola Anterior:</label> <?php echo $escola_anterior;?>
                                </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                        <label>Classe anterior: </label> <?php echo $classe_anterior;?>
                                </div>
                                </div>

                                <div class="col-md-6">    
                                <div class="form-group">
                                    <label>Media Final:</label> <?php echo $media_final; ?>
                                </div>
                                </div>

                                <div class="col-md-6">    
                                <div class="form-group">
                                    <label>Ano de Conclusão:</label> <?php echo $ano_concluido;?>
                                </div>
                                </div>
                                
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Classe Pretendida:</label> <?php echo $classe_pretendida;?>
                                </div>
                                </div>
                                
                                <h3>Contactos</h3>
                                <div class="panel panel-primary">
                                 </div><br>

                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telemovel:</label> <?php echo $telefone?>
                                </div>
                                </div>

                                <div class="col-md-6">   
                                <div class="form-group">
                                    <label>Telemovel(Alternativo):</label> <?php echo $telefone2?>
                                </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-Email: </label> <?php echo $email?>
                                </div>
                               
                                    <div class="form-group">
                                    <a href="list_inscricao.php" class="btn btn-default"><i class="fa fa-undo"></i> Voltar</a>     
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
        include_once 'menu_rod/rod_sec.php';
        ?> 