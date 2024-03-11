
           <?php 
            include_once 'menu_rod/menu_admin.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Apagar Convocatória/ Nota</h2>   
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
                                $sql = "SELECT * FROM convocatoria WHERE num_conv = '$id' ";
                                $resultado = mysqli_query($connect, $sql);
                                $dados = mysqli_fetch_array($resultado);
                                        
                                  
                            ?>
                            <form action="del_conv.php" method="POST">
                            <div class="row">
                            <input type="hidden" name ="id" value ="<?php echo $dados['num_conv']; ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <select class="form-control" name="tipo" id="tipo" disabled>
                                        <option value="<?php echo $dados['tipo']; ?>">Nota Informativa</option>  
                                        </select>
                                    </div>   
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="date" name="data" class="form-control" value="<?php echo $dados['data_conv']; ?>" disabled/>
                                    </div>
                                </div>

                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <input type="text" name="assunto" class="form-control" value="<?php echo $dados['assunto']; ?>" disabled/>
                                    </div>
                                </div>
                              
                                <div class="col-md-6">                      
                                        <button type="submit" name="btn-apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i> Apagar</button> 
                                        <a href="list_conv.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>
                                    
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