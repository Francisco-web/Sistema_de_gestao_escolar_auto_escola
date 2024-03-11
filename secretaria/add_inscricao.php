
        <?php 
        include_once 'menu_rod/menu_sec.php';
        $numero= date('ym');
        $numero1= date('y');
        $inscricao= random_int(11,$numero1);
       
        
        
        ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Novo Aluno</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                        <?php 
                            if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            ?>
                        <form action="inscricao.php" method="POST" enctype="multipart/form-data">
                            <div class="row">

                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Inscrição Nº</label>
                                        <input type="text" name="num_inscricao"  value="<?php echo $numero; ?><?php echo $inscricao; ?>" class="form-control" autocomplete="on"/>
                                            
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" name="nome" class="form-control" autocomplete="on"/>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="date" name="data_n"  class="form-control" autocomplete="on"/>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Documento de Identificação</label>
                                        <select name="documento" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <option value="B.I">Bilhete de Identificação</option>
                                        <option value="Cédula">Cédula</option>
                                        <option value="Acento de Nascimento">Acento de Nascimento</option>
                                        <option value="S/D">S/D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Documento Nº</label>
                                        <input type="text" name="n_documento"  class="form-control" autocomplete="off"/>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select name="sexo" id="sexo" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Masculino">Masculino</option>
                                        </select>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data Validade</label>
                                        <input type="date" name="data_val"  class="form-control" autocomplete="on"/>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nacionalidade</label>
                                        <input type="text" name="nacionalidade"  class="form-control" autocomplete="on"/>
                                            
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Natural de </label>
                                        <input type="text" name="naturalidade"  class="form-control" autocomplete="on"/>
                                            
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Residência</label>
                                        <input type="text" name="residencia" autocomplete="on" class="form-control" />
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Muncípio</label>
                                        <input type="text" name="municipio" autocomplete="on" class="form-control" />
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" name="cidade" autocomplete="on" class="form-control" />
                                    </div> 
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telemovel</label>
                                        <input type="text" name="tel1" autocomplete="off" class="form-control" />
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telelefone (Alternativo)</label>
                                        <input type="text" name="telefone" autocomplete="off" class="form-control" />
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" autocomplete="off" class="form-control" />
                                        </div> 
                                </div>

                                
                            </div>    
                            <!--/Dados do estudante-->
                                
                            <!--Dados dos pais-->
                            
                            <div class="row">
                                <h3>Dados dos Pais</h3>
                                <div class="panel panel-primary">
                                 </div><br>   
                                   
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome do Pai</label>
                                            <input type="text" name="nome_pai" autocomplete="on" class="form-control" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estado Civil</label>
                                            <input type="text" name="estado_c" autocomplete="on" class="form-control" />
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Profissão</label>
                                            <input type="text" name="profissao_p" autocomplete="on" class="form-control" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Situação</label>
                                                <input type="text" name="situacao_p" autocomplete="on" class="form-control" />
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nome da Mãe</label>
                                                    <input type="text" name="nome_mae" autocomplete="on" class="form-control" />
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estado Civil</label>
                                            <input type="text" name="estado_civil" autocomplete="on" class="form-control" />
                                            
                                        </div>
                                    </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Profissão</label>
                                                    <input type="text" name="profissao_m" autocomplete="on" class="form-control" />
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <label>Situação</label>
                                                        <input type="text" name="situacao_m" autocomplete="on" class="form-control" />
                                                        
                                                </div>
                                            </div>
                               
                            </div>
                            <!--Dados Cademicos Anteriores-->
                            
                            <div class="row">
                                <h3>Dados Academicos</h3>
                                <div class="panel panel-primary">
                                </div> <br>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe Anterior</label>
                                        <select name="classe_anterior" class="form-control">
                                            <option value="">-- Selecione --</option>
                                            <option value="Pré" >Pré</option>
                                            <option value="1ª Classe">1ª Classe</option>
                                            <option value="2ª Classe">2ª Classe</option>
                                            <option value="3ª Classe">3ª Classe</option>
                                            <option value="4ª Classe">4ª Classe</option>
                                            <option value="5ª Classe">5ª Classe</option>
                                            <option value="6ª Classe">6ª Classe</option>
                                            <option value="7ª Classe">7ª Classe</option>
                                            <option value="8ª Classe">8ª Classe</option>
                                            <option value="9ª Classe">9ª Classe</option>
                                            
                                        </select>

                                    </div>
                                </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome da Escola Anterior</label>
                                            <input type="text" name="escola_anterior" autocomplete="on" class="form-control" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Media Final</label>
                                            <input type="text" name="media" autocomplete="on" class="form-control" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe Pretendida</label>
                                        <select name="classe_pretendida" class="form-control">
                                            <option value="">-- Selecione --</option>
                                            <option value="Pré" >Pré</option>
                                            <option value="1ª Classe">1ª Classe</option>
                                            <option value="2ª Classe">2ª Classe</option>
                                            <option value="3ª Classe">3ª Classe</option>
                                            <option value="4ª Classe">4ª Classe</option>
                                            <option value="5ª Classe">5ª Classe</option>
                                            <option value="6ª Classe">6ª Classe</option>
                                            <option value="7ª Classe">7ª Classe</option>
                                            <option value="8ª Classe">8ª Classe</option>
                                            <option value="9ª Classe">9ª Classe</option>
                                            
                                        </select>

                                    </div>
                                </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ano Academico Concluido</label>
                                                <input type="text" name="ano_academico_concluido" autocomplete="on" class="form-control" />
                                                
                                            </div>
                                                          
                                        <button type="submit" name="btn-inscricao" class="btn btn-primary"><i class="fa fa-save"></i> Cadastrar</button> 
                                        <a class="btn btn-default" href="list_inscricao.php"><i class="fa fa-undo"></i> Cancelar</a>

                                    </div>
                                
                            </div>
    
                             
                        </form>
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