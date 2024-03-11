
           <?php 
            include_once 'menu_rod/menu_admin.php'
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Editar Convocatória</h2>   
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
                            <form action="atual_conv.php" method="POST">
                            <div class="row">
                            <input type="hidden" name ="id" value ="<?php echo $dados['num_conv']; ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <select class="form-control" name="tipo" id="tipo">
                                        <option value="<?php echo $dados['tipo']; ?>">Nota Informativa</option>  
                                        </select>
                                    </div>   
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="date" name="data" class="form-control" value="<?php echo $dados['data_conv']; ?>" />
                                    </div>
                                </div>

                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <textarea class="form-control ckeditor" name="obs" id="obs" cols="10" rows="3"><?php echo $dados['observacao']; ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Conteúdo</label>
                                        <textarea class="form-control ckeditor" name="conteudo" id="conteudo" cols="30" rows="10"><?php echo $dados['conteudo']; ?></textarea>
                                    </div>
                                </div>   
                                <div class="col-md-6">                      
                                        <button type="submit" name="btn-editar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button> 
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