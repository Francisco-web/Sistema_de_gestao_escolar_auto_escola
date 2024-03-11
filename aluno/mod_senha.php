
        <?php 
        include_once 'menu_rod/menu_aluno.php';
        ?> 
        
       
         
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                    
                        <section class="panel">
                            <br>
                            <?php 
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }

                        ?>
                        <div class='alert alert-info' role='alert'>
                        <h1>Modificar Senha</h1>
                        <br>
                        <form action="senha.php" method="POST">
                            <div class="row">
                            <input type="hidden" name="id" autocomplete="off" class="form-control" value="<?php echo $id_user; ?>"/>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Senha Antiga</label>
                                        <input type="password" name="senha_a" class="form-control" />
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nova Senha</label>
                                        <input type="password" name="senha_n"  class="form-control" />
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirmar Nova Senha</label>
                                        <input type="password" name="senha_c"  class="form-control" />
                                    </div>
                   
                                    <button type="submit" name="btn-senha" class="btn btn-primary"><i class="fa fa-save"></i> Mudar senha</button> 
                                </div> 
                            </div>
                             
                        </form>
                        </div> 
                    </div> 
                        
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <?php 
        include_once 'menu_rod/rod_aluno.php';
            
        ?> 