
        <?php 
        include_once 'menu_rod/menu_sec.php'
        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <br>
                            <?php
                                if (isset($_GET['usid'])) {
                                $id = mysqli_escape_string($connect, $_GET['usid']);
                                $tipo = mysqli_escape_string($connect, $_GET['tpus']);
                                }
                                $sql = "SELECT * FROM usuario Where id_usuario = '$id' and tipo ='$tipo' ";
                                $resultado = mysqli_query($connect, $sql);
                                $dados = mysqli_fetch_array($resultado);
   
                            ?>
                        
                       
                        <form action="" method="POST">
                        
                        <div class="row">
                        <h3><?php echo $dados['nome_usuario']; ?> (<?php echo $dados['tipo']; ?>)</h3>
                                <div class="panel panel-primary">
                                 </div><br>  
                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Documento de Identificação: </label>
                                        <?php echo $dados['tipo_documento']; ?>                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nº do Documento :</label>
                                        <?php echo $dados['num_documento']; ?>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sexo: </label>
                                        <?php echo $dados['sexo']; ?>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefone: </label>
                                        <?php echo $dados['tel1']; ?>
                                            
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email: </label>
                                        <?php echo $dados['email']; ?>
                                            
                                    </div>
                                </div>
 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Login:</label>
                                        <?php echo $dados['login']; ?>
                                    </div> 
                                </div>

                        </form>
                        </div>
                    </div> 
                    <div >    
                     
                        <h1>Modificar Senha</h1>
                        <br> 
                        <?php 
                            if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            ?>
                        <form action="senha.php" method="POST">
                            <div class="row">
                            <input type="hidden" name="id" autocomplete="off" class="form-control" value="<?php echo $id; ?>"/>

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
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
        <?php 
        include_once 'menu_rod/rod_sec.php'
        ?> 