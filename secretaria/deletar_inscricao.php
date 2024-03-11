
           <?php 
            include_once 'menu_rod/menu_sec.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Apagar Inscrição</h2>   
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
                             if (isset($_GET['idins'])&& isset($_GET['idus'])) {

                               $id_ins = mysqli_escape_string($connect, $_GET['idins']);

                                $sql = "SELECT * FROM inscricao i  inner join usuario u on i.id_usuario = u.id_usuario  WHERE id_inscricao = '$id_ins' ";
                                $resultado = mysqli_query($connect, $sql);
                                $dados = mysqli_fetch_array($resultado);
                                  
                            ?>
                            <form action="del_inscricao.php" method="POST">
                            <div class="row">
                            <input type="hidden" name="id_ins" value="<?php echo $dados['id_inscricao']; ?>">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                       <select name="aluno" class=" form-control">
                                           
                                           <option value ="<?php echo $dados['id_usuario']; ?>"><?php echo $dados['nome_usuario']; ?></option>
                                       </select>
                                       
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
                            
                            <!--/Dados do estudante-->
                                
                           
                            <!--Dados Cademicos Anteriores-->
                            
                                <h3>Dados Academicos</h3>
                                <div class="panel panel-primary">
                                </div> <br>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Classe Anterior</label>
                                            <input type="text" name="classe_anterior" autocomplete="off" class="form-control" value ="<?php echo $dados['classe_anterior']; ?>"/>
                                            
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
                                                <input type="text" name="classe_pretendida" autocomplete="off" class="form-control" value ="<?php echo $dados['classe_pretendida']; ?>"/>
                                                
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ano Academico Concluido</label>
                                                <input type="text" name="ano_academico_concluido" autocomplete="off" class="form-control" value ="<?php echo $dados['ano_acad_concluido']; ?>"/>
                                                
                                            </div>
                                       
                                    <button type="submit" name="btn-apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i> Apagar</button> 
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