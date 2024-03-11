
           <?php 
            include_once 'menu_rod/menu_admin.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Apagar Turma</h2>   
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
                                        $sql = "SELECT * FROM turma t INNER join professor p on t.id_professor = p.id_professor 
                                        join usuario u on p.id_usuario = u.id_usuario join classe c on t.classe = c.id_classe WHERE id_turma = '$id' ";
                                        $resultado = mysqli_query($connect, $sql);
                                        $dados = mysqli_fetch_array($resultado);
                                        
                                  
                            ?>
                            <form action="del_turma.php" method="POST">
                            <div class="row">
                                <input type="hidden" name ="id" value ="<?php echo $dados['id_turma']; ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label >
                                   <p>Tens a Certeza que deseja apagar a Turma <strong><?php echo $dados['nome_turma']; ?> </strong >periodo<strong > <?php echo $dados['periodo']; ?></strong > do Professor <strong ><?php echo $dados['nome_usuario']; ?></strong > ?</p> 
                                    </label>
                                    </div>
                                
                                    <button type="submit" name="btn-apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i> Apagar</button> 
                                    <a href="registar_turma.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>    
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