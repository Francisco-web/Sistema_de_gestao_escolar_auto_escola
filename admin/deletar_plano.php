
           <?php 
            include_once 'menu_rod/menu_admin.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Apagar Plano Curricular</h2>   
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
                                        $sql = "SELECT * FROM plano_curricular pc INNER JOIN disciplina d ON pc.id_disciplina = d.id_disciplina 
                                        join classe c ON pc.classe = c.id_classe join turma t on pc.id_turma = t.id_turma join professor p on d.id_professor = p.id_professor 
                                        join usuario u on p.id_usuario = u.id_usuario where id_plano = '$id' ";
                                        $resultado = mysqli_query($connect, $sql);
                                        $dados = mysqli_fetch_array($resultado);
                                        
                                  
                            ?>
                            <form action="del_plano.php" method="POST">
                            <div class="row">
                            <input type="hidden" name ="id" value ="<?php echo $dados['id_plano']; ?>">
                            <div class="col-md-6">
                                    <div class="form-group">
                                   
                                       <p>Tens a Certeza que desejas apagar palno Curricular ?</p> 
                                       <p>Hora <strong><?php echo $dados['hora']; ?></strong></p>
                                       <p>Dia da Semana <strong><?php echo $dados['dia_sem']; ?></strong></p>
                                       <p>Discíplina <strong><?php echo $dados['nome_disc']; ?></strong></p>
                                       <p>Periodo <strong><?php echo $dados['turno']; ?></strong></p>
                                       <p>Docente <strong><?php echo $dados['nome_usuario']; ?> </strong></p>
                                   
                                    </div>
                                   
                                    <button type="submit" name="btn-apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i> Apagar</button> 
                                    <a href="list_plano.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>    
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