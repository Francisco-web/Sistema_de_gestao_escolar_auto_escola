
           <?php 
            include_once 'menu_rod/menu_admin.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Apagar Colaborador</h2>   
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
                             if (isset($_GET['id']) && isset($_GET['tp'])) {
                                $id = mysqli_escape_string($connect, $_GET['id']);
                                $tipo = mysqli_escape_string($connect, $_GET['tp']);
                                $sql = "SELECT * FROM usuario WHERE id_usuario = '$id' and tipo = '$tipo' ";
                                $resultado = mysqli_query($connect, $sql);
                                $dados = mysqli_fetch_array($resultado);
                                
                          
                    ?>
                    <form action="del_colab.php" method="POST">
                    <div class="row">
                    <input type="hidden" name ="id" value ="<?php echo $dados['id_usuario']; ?>">
                    <div class="col-md-6">
                            <div class="form-group">
                           
                               <p><strong>Tens a Certeza que desejas apagar o usuario <?php echo $dados['nome_usuario']; ?> ?</strong></p> 
                                
                            </div>
                           
                            <button type="submit" name="btn-apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i> Apagar</button> 
                            <a href="list_usuario.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>    
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
       require_once 'menu_rod/rod_admin.php';
    ?>