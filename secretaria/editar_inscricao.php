
           <?php 
            include_once 'menu_rod/menu_sec.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Editar Inscrição</h2>   
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

                           
                            //verificar id
                                if (isset($_GET['idins'])) {
                                        $id_inscricao = mysqli_escape_string($connect, $_GET['idins']);
                                        $id_usuario =  mysqli_escape_string($connect, $_GET['idus']);
                                        $sql = "SELECT * FROM inscricao i  inner join usuario u on i.id_usuario = u.id_usuario  WHERE id_inscricao = '$id_inscricao' ";
                                        $resultado = mysqli_query($connect, $sql);
                                        $dados = mysqli_fetch_array($resultado);
                                        
                                  
                            ?>
                            <form action="atual_inscricao.php" method="POST">
                            <div class="row">
                            <input type="hidden" name ="id" value ="<?php echo $dados['id_inscricao']; ?>">
                                 
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Matricula Nº</label>
                                        <input type="text" name="num_matricula"  class="form-control" autocomplete="off" value ="<?php echo $dados['num_inscricao']; ?>"/>
                                       
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" value ="<?php echo $dados['nome_usuario']; ?>" class="form-control" autocomplete="off" >
                                        <input type="hidden" name="aluno" value ="<?php echo $dados['id_usuario']; ?>"  class="form-control" autocomplete="off" >
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="date" name="data_n"  class="form-control" autocomplete="off" value ="<?php echo $dados['data_nasc']; ?>"/>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Documento de Identificação</label>
                                        <input type="text" name="documento"  class="form-control" autocomplete="off" value ="<?php echo $dados['tipo_documento']; ?>"/>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nº do Documento</label>
                                        <input type="text" name="n_documento"  class="form-control" autocomplete="off" value ="<?php echo $dados['num_documento']; ?>"/>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data Validade</label>
                                        <input type="date" name="data_val"  class="form-control" autocomplete="off" value ="<?php echo $dados['data_validade']; ?>"/>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nacionalidade</label>
                                        <input type="text" name="nacionalidade"  class="form-control" autocomplete="off " value ="<?php echo $dados['nacionalidade']; ?>"/>
                                            
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Natural de </label>
                                        <input type="text" name="naturalidade"  class="form-control" autocomplete="off" value ="<?php echo $dados['naturalidade']; ?>"/>
                                            
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Residência</label>
                                        <input type="text" name="residencia" autocomplete="off" class="form-control" value ="<?php echo $dados['residencia']; ?>" />
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Muncípio</label>
                                        <input type="text" name="municipio" autocomplete="off" class="form-control" value ="<?php echo $dados['municipio']; ?>"/>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" name="cidade" autocomplete="off" class="form-control" value ="<?php echo $dados['cidade']; ?>"/>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telelefone</label>
                                        <input type="text" name="telefone" autocomplete="off" class="form-control" value ="<?php echo $dados['tel2']; ?>"/>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" autocomplete="off" class="form-control" value ="<?php echo $dados['email']; ?>"/>
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
                                            <input type="text" name="nome_pai" autocomplete="off" class="form-control" value ="<?php echo $dados['nome_pai']; ?>"/>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estado Civil</label>
                                            <input type="text" name="estado_c" autocomplete="off" class="form-control" value ="<?php echo $dados['estado_civil_p']; ?>"/>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Profissão</label>
                                            <input type="text" name="profissao_p" autocomplete="off" class="form-control" value ="<?php echo $dados['profissao_pai']; ?>" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Situação</label>
                                                <input type="text" name="situacao_p" autocomplete="off" class="form-control" value ="<?php echo $dados['situacao_pai']; ?>"/>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nome da Mãe</label>
                                                    <input type="text" name="nome_mae" autocomplete="off" class="form-control" value ="<?php echo $dados['nome_mae']; ?>"/>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estado Civil</label>
                                            <input type="text" name="estado_civil" autocomplete="off" class="form-control" value ="<?php echo $dados['estado_civil_m']; ?>"/>
                                            
                                        </div>
                                    </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Profissão</label>
                                                    <input type="text" name="profissao_m" autocomplete="off" class="form-control" value ="<?php echo $dados['profissao_mae']; ?>"/>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <label>Situação</label>
                                                        <input type="text" name="situacao_m" autocomplete="off" class="form-control" value ="<?php echo $dados['situacao_mae']; ?>" />
                                                        
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
                                        <select name="classe_anterior" id="classe_anterior" class="form-control">
                                            <option value="">-- Selecione --</option>
                                            <option value="Pré" <?php if ($dados['classe_anterior']=='Pré') {
                                                echo "Selected";
                                            } ?>>Pré</option>
                                            <option <?php if ($dados['classe_anterior']=='1ª Classe') {
                                                echo "Selected";
                                            } ?>>1ª Classe</option>
                                            <option <?php if ($dados['classe_anterior']=='2ª Classe') {
                                                echo "Selected";
                                            } ?>>2ª Classe</option>
                                            <option <?php if ($dados['classe_anterior']=='3ª Classe') {
                                                echo "Selected";
                                            } ?>>3ª Classe</option>
                                            <option <?php if ($dados['classe_anterior']=='4ª Classe') {
                                                echo "Selected";
                                            } ?>>4ª Classe</option>
                                            <option <?php if ($dados['classe_anterior']=='5ª Classe') {
                                                echo "Selected";
                                            } ?>>5ª Classe</option>
                                            <option <?php if ($dados['classe_anterior']=='6ª Classe') {
                                                echo "Selected";
                                            } ?>>6ª Classe</option>
                                            <option <?php if ($dados['classe_anterior']=='7ª Classe') {
                                                echo "Selected";
                                            } ?>>7ª Classe</option>
                                            <option <?php if ($dados['classe_anterior']=='8ª Classe') {
                                                echo "Selected";
                                            } ?>>8ª Classe</option>
                                            <option <?php if ($dados['classe_anterior']=='9ª Classe') {
                                                echo "Selected";
                                            } ?>>9ª Classe</option>
                                            
                                        </select>

                                    </div>
                                </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome da Escola Anterior</label>
                                            <input type="text" name="escola_anterior" autocomplete="off" class="form-control" value ="<?php echo $dados['escola_anterior']; ?>"/>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Media Final</label>
                                            <input type="text" name="media" autocomplete="off" class="form-control" value ="<?php echo $dados['media_final']; ?>" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe Pretendida</label>
                                        <select name="classe_pretendida" id="classe_pretendida" class="form-control">
                                            <option value="">-- Selecione --</option>
                                            <option value="Pré" <?php if ($dados['classe_pretendida']=='Pré') {
                                                echo "Selected";
                                            } ?>>Pré</option>
                                            <option <?php if ($dados['classe_pretendida']=='1ª Classe') {
                                                echo "Selected";
                                            } ?>>1ª Classe</option>
                                            <option <?php if ($dados['classe_pretendida']=='2ª Classe') {
                                                echo "Selected";
                                            } ?>>2ª Classe</option>
                                            <option <?php if ($dados['classe_pretendida']=='3ª Classe') {
                                                echo "Selected";
                                            } ?>>3ª Classe</option>
                                            <option <?php if ($dados['classe_pretendida']=='4ª Classe') {
                                                echo "Selected";
                                            } ?>>4ª Classe</option>
                                            <option <?php if ($dados['classe_pretendida']=='5ª Classe') {
                                                echo "Selected";
                                            } ?>>5ª Classe</option>
                                            <option <?php if ($dados['classe_pretendida']=='6ª Classe') {
                                                echo "Selected";
                                            } ?>>6ª Classe</option>
                                            <option <?php if ($dados['classe_pretendida']=='7ª Classe') {
                                                echo "Selected";
                                            } ?>>7ª Classe</option>
                                            <option <?php if ($dados['classe_pretendida']=='8ª Classe') {
                                                echo "Selected";
                                            } ?>>8ª Classe</option>
                                            <option <?php if ($dados['classe_pretendida']=='9ª Classe') {
                                                echo "Selected";
                                            } ?>>9ª Classe</option>
                                            
                                        </select>

                                    </div>
                                </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ano Academico Concluido</label>
                                                <input type="text" name="ano_academico_concluido" autocomplete="off" class="form-control" value ="<?php echo $dados['ano_acad_concluido']; ?>"/>
                                                
                                            </div>
                                       
                                    <button type="submit" name="btn-editar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button> 
                                <a class="btn btn-default" href="list_inscricao.php"><i class="fa fa-undo"></i> Cancelar</a>    
                                </div>
                            </div>
                            <?php } ?> 
                        </form>
                    </div> 
                </div> 
            </section>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
    
     <!-- /. WRAPPER  -->
     <?php 
       require_once 'menu_rod/rod_sec.php';
    ?>