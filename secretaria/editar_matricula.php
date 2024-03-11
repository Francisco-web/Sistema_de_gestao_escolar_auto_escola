
           <?php 
            include_once 'menu_rod/menu_sec.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Editar Matrícula</h2>   
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
                                if (isset($_GET['id'])) {
                                        
                                    $id = mysqli_escape_string($connect, $_GET['id']);
                                        
                                    $sql = "SELECT u.id_usuario,t.periodo,t.num_sala,i.id_inscricao,u.tipo_documento,m.id_matricula,m.num_matricula,m.tipo,m.ano_academico,m.data_matricula,i.num_inscricao,u.nome_usuario,t.id_turma,t.nome_turma,c.nome_classe 
                                    FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao 
                                    join usuario u on i.id_usuario = u.id_usuario join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe
                                    Where id_matricula = '$id' ";
                                    $resultado = mysqli_query($connect, $sql);
                                    $dados = mysqli_fetch_array($resultado);
                                        
                                  ?>
                                  
                            <form action="atual_matricula.php" method="POST">
                            <div class="row">
                                <input type="hidden" name ="id" value ="<?php echo $dados['id_matricula']; ?>">
                                <input type="hidden" name ="id_inscricao" value ="<?php echo $dados['id_inscricao']; ?>">
                                <input type="hidden" name ="id_usuario" value ="<?php echo $dados['id_usuario']; ?>">  
                                <input type="hidden" name ="turma" value ="<?php echo $dados['id_turma']; ?>">        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Matrícula Nº</label>
                                        <input type="text" name="num_matricula"  class="form-control" value ="<?php echo $dados['num_matricula']; ?>" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" name="nome"  class="form-control" value ="<?php echo $dados['nome_usuario']; ?>" />
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo de Matrícula</label>
                                        <select class="form-control" name="tipo_matricula" id="">
                                            <option value="">-- Selecione --</option>
                                            <option value="Nova"<?php if ($dados['tipo']=='Nova') {
                                                echo "Selected";
                                            } ?> >Nova</option>
                                            <option <?php if ($dados['tipo']=='Confirmação') {
                                                echo "Selected";
                                            }?>>Confirmação</option>
                                            <option <?php if ($dados['tipo']=='Transferência Interna') {
                                                echo "Selected";
                                            }?>>Transferência Interna</option>
                                            <option <?php if ($dados['tipo']=='Transferência Externa') {
                                                echo "Selected";
                                            }?>>Transferência Externa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Documento de Identificação</label>
                                        <select class="form-control" name="t_documento" id="t_documento">
                                            <option>-- Selecione --</option>
                                            <option value="B.I"<?php if ($dados['tipo_documento']=='B.I') {
                                                echo "Selected";
                                            } ?> >Bilhete de Identidade</option>

                                            <option <?php if ($dados['tipo_documento']=='Cédula') {
                                                echo "Selected";
                                            }?>>Cédula</option>

                                            <option <?php if ($dados['tipo_documento']=='Acento de Nascimento') {
                                                echo "Selected";
                                            }?>>Acento de Nascimento</option>

                                            <option <?php if ($dados['tipo_documento']=='S/D') {
                                                echo "Selected";
                                            }?>>Sem Documento</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turma</label>
                                        <input type="text" name=""  class="form-control" value ="<?php echo $dados['nome_turma']; ?>" />
                                    </div>
                                </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Período</label>
                                        <select class="form-control" name="periodo">
                                            <option>-- Selecione --</option>
                                            <option value="Manhã"<?php if ($dados['periodo']=='Manhã') {
                                                echo "Selected";
                                            } ?> >Manhã</option>

                                            <option <?php if ($dados['periodo']=='Tarde') {
                                                echo "Selected";
                                            }?>>Tarde</option>

                                            <option <?php if ($dados['periodo']=='Noite') {
                                                echo "Selected";
                                            }?>>Noite</option>

                                             </select>    
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sala Nº</label>
                                        <select class="form-control" name="sala">
                                            <option>-- Selecione --</option>
                                            <option value="1"<?php if ($dados['num_sala']=='1') {
                                                echo "Selected";
                                            } ?> >1</option>

                                            <option <?php if ($dados['num_sala']=='2') {
                                                echo "Selected";
                                            }?>>2</option>

                                            <option <?php if ($dados['num_sala']=='3') {
                                                echo "Selected";
                                            }?>>3</option>

                                            <option <?php if ($dados['num_sala']=='4') {
                                                echo "Selected";
                                            }?>>4</option>
                                            <option <?php if ($dados['num_sala']=='5') {
                                                echo "Selected";
                                            }?>>5</option>
                                            <option <?php if ($dados['num_sala']=='6') {
                                                echo "Selected";
                                            }?>>6</option>
                                            <option <?php if ($dados['num_sala']=='7') {
                                                echo "Selected";
                                            }?>>7</option>
                                            <option <?php if ($dados['num_sala']=='8') {
                                                echo "Selected";
                                            }?>>8</option>
                                            <option <?php if ($dados['num_sala']=='9') {
                                                echo "Selected";
                                            }?>>9</option>
                                            <option <?php if ($dados['num_sala']=='10') {
                                                echo "Selected";
                                            }?>>10</option>
                                             </select>    
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select name="classe" id="classe" class="form-control">
                                            <option value="">-- Selecione --</option>
                                            <option value="<?php echo $dados['id_classe']; ?>" <?php if ($dados['nome_classe']=='Pré') {
                                                echo "Selected";
                                            } ?>>Pré</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='1ª Classe') {
                                                echo "Selected";
                                            } ?>>1ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='2ª Classe') {
                                                echo "Selected";
                                            } ?>>2ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='3ª Classe') {
                                                echo "Selected";
                                            } ?>>3ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='4ª Classe') {
                                                echo "Selected";
                                            } ?>>4ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='5ª Classe') {
                                                echo "Selected";
                                            } ?>>5ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='6ª Classe') {
                                                echo "Selected";
                                            } ?>>6ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='7ª Classe') {
                                                echo "Selected";
                                            } ?>>7ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='8ª Classe') {
                                                echo "Selected";
                                            } ?>>8ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='9ª Classe') {
                                                echo "Selected";
                                            } ?>>9ª Classe</option>
                                            
                                        </select>

                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ano Academico</label>
                                        <input type="text" name="ano_academico" autocomplete="off" class="form-control" value ="<?php echo $dados['ano_academico']; ?>" />
                                    </div> 
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data de Matrícula</label>
                                        <input type="text" name="data" autocomplete="off" class="form-control" value ="<?php echo $dados['data_matricula']; ?>" disabled/>
                                    </div> 
                                    </div> 
                                    <div class="col-md-6">            
                                        <button type="submit" name="btn-editar" class="btn btn-primary">Guardar</button>
                                        <a class="btn btn-default" href="list_matricula.php"><i class="fa fa-undo" ></i> Cancelar</a>
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
       require_once 'menu_rod/rod_sec.php'
    ?>