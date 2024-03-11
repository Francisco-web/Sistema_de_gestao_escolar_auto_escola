
           <?php 
            include_once 'menu_rod/menu_sec.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Editar Dados do Aluno</h2>   
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
                                        $sql = "SELECT * FROM usuario WHERE id_usuario = '$id' ";
                                        $resultado = mysqli_query($connect, $sql);
                                        $dados = mysqli_fetch_array($resultado);
                                        
                                  ?>
                            <form action="atual_colab.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="hidden" name ="id" value ="<?php echo $dados['id_usuario']; ?>">

                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" name="nome"  class="form-control" value ="<?php echo $dados['nome_usuario']; ?>" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select class="form-control" name="sexo" id="sexo">
                                            <option>-- Selecione --</option>
                                            <option value="Feminino"<?php if ($dados['sexo']=='Feminino') {
                                                echo "Selected";
                                            } ?> >Feminino</option>

                                            <option <?php if ($dados['sexo']=='Masculino') {
                                                echo "Selected";
                                            }?>>Masculino</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Documento Nº</label>
                                        <input type="text" name="num_documento"  class="form-control" value ="<?php echo $dados['num_documento']; ?>" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email"  class="form-control" value ="<?php echo $dados['email']; ?>" />
                                        
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
                                        <label>Telemovel</label>
                                        <input type="text" name="telefone" autocomplete="off" class="form-control" value ="<?php echo $dados['tel1']; ?>" />
                                    </div> 
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control" name="estado" id="estado">
                                            <option>-- Selecione --</option>
                                            <option value="1"<?php if ($dados['ativo']=='1') {
                                                echo "Selected";
                                            } ?> >Activo</option>

                                            <option <?php if ($dados['ativo']=='0') {
                                                echo "Selected";
                                            }?>>Desactivo</option>
                                             </select>    
                                    </div>
                                                     
                                    <button type="submit" name="btn-editar" class="btn btn-primary">Guardar</button>
                                    <a class="btn btn-default" href="cadastrar_aluno.php"><i class="fa fa-undo" ></i> Cancelar</a>
                              
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