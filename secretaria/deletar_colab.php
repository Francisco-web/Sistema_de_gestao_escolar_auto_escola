
           <?php 
            include_once 'menu_rod/menu_sec.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Apagar Dados do Aluno</h2>   
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
                            <form action="del_colab.php" method="POST">
                            <div class="row">
                            <input type="hidden" name ="id" value ="<?php echo $dados['id_usuario']; ?>" disabled>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                   
                                        <label><p>Tens a Certeza que desejas apagar os dados do Aluno ?</p> </label>
                                        <input type="text" name="nome"  class="form-control" value ="<?php echo $dados['nome_usuario']; ?>" disabled/>
                                        
                                    </div>
                                </div>
                                
                                    </div>
                                    <button type="submit" name="btn-apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i> Apagar</button> 
                                    <a href="cadastrar_aluno.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>    
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