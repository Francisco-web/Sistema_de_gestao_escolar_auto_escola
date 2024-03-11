
           <?php 
            include_once 'menu_rod/menu_admin.php'
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Editar Classe</h2>   
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
                                        $sql = "SELECT * FROM classe WHERE id_classe = '$id' ";
                                        $resultado = mysqli_query($connect, $sql);
                                        $dados = mysqli_fetch_array($resultado);
                                        
                                  
                            ?>
                            <form action="atual_classe.php" method="POST">
                            <div class="row">
                            <input type="hidden" name ="id" value ="<?php echo $dados['id_classe']; ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Codigo</label>
                                        <input type="text" name="codigo" autocomplete="off" class="form-control" value ="<?php echo $dados['codigo_classe']; ?>" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nível Academico</label>
                                        <input type="text" name="classe" autocomplete="off" class="form-control" value ="<?php echo $dados['nome_classe']; ?>" />

                                        </select>
                                            
                                    </div>
                                </div>
                                
                                <div class="col-md-6">        
                                    <button type="submit" name="btn-editar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button> 
                                    <a href="registar_nivel.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>    
                                
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
       require_once 'menu_rod/rod_admin.php'
    ?>