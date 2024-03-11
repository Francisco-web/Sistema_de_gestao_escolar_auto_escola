
           <?php 
            include_once 'menu_rod/menu_admin.php';
              
            ?> 

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Editar Discíplina</h2>   
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
                                        $sql = "SELECT d.id_disciplina,d.codigo_disc,d.nome_disc,d.descricao,u.nome_usuario,p.id_professor FROM disciplina d 
                                        inner join professor p on d.id_professor = p.id_professor join usuario u on p.id_usuario = u.id_usuario WHERE id_disciplina = '$id' ";
                                        $resultado = mysqli_query($connect, $sql);
                                       $dados = mysqli_fetch_array($resultado);
                                        
                                  
                            ?>
                             <form action="atual_disc.php" method="POST">
                            <div class="row">
                            <input type="hidden" name ="id" value ="<?php echo $dados['id_disciplina']; ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Codigo</label>
                                        <input type="text" name="codigo" autocomplete="off" class="form-control"value ="<?php echo $dados['codigo_disc']; ?>" />
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discíplina</label>
                                        <input type="text" name="disciplina" autocomplete="on" class="form-control" value ="<?php echo $dados['nome_disc']; ?>"/>
                                    </div>    
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea class="form-control" name="descricao" id="descricao" cols="10" rows="4" autocomplete="off"><?php echo $dados['descricao']; ?></textarea>
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Professor da Discíplina</label>
                                        <select name="professor" id="professor" class="form-control">
                                        
                                        <option value="<?php  echo $dados['id_professor']?>"><?php  echo $dados['nome_usuario']?></option> 
                                               
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="btn-editar" class="btn btn-primary"><i class="fa fa-save"></i> Cadastrar</button> 
                                    <a href="list_disc.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>    
                                </div>
                            </div> 
                        </form>
                        <?php } ?>
                       
                    </div> 
                </div> 
            </section>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
    
     <!-- /. WRAPPER  -->
     <?php 
       require_once 'menu_rod/rod_admin.php'
    ?>