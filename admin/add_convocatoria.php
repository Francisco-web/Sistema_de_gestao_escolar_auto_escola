   <?php 
            include_once 'menu_rod/menu_admin.php';
            ?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Novo Comunicado</h2> 
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

                        ?>
                        <form action="convocatoria.php" method="POST">
                            <div class="row">
                            <input type="hidden" name="director" value="<?php echo $id; ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <select class="form-control" name="tipo" id="tipo">
                                        <option value="">-- Selecione --</option> 
                                        <option value="Convocatoria">Convocatoria</option> 
                                        <option value="Nota Informativa">Nota Informativa</option>  
                                        </select>
                                    </div>   
                                </div>
                       
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Assunto</label>
                                        <input type="text" name="assunto"  class="form-control" />
                                    </div>
                                </div>   

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Conteúdo</label>
                                        <textarea id="editor_conteudo" name="conteudo" rows="6"></textarea>
                                    </div>
                                </div>   
                                <div class="col-md-6">                      
                                        <button type="submit" name="btn-convocatoria" class="btn btn-primary"><i class="fa fa-save"></i> Adicionar</button> 
                                        <a href="list_conv.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>
                                    
                                    </div>
                               
                            </div>
                        </form>
                    </div>
                </div>      
         
        
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->

    
     <?php 
         include_once 'menu_rod/rod_admin.php';
      ?> 