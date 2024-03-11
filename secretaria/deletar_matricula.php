
           <?php 
            include_once 'menu_rod/menu_sec.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Apagar Matrícula</h2>   
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
                                if (isset($_GET['id']) && isset($_GET['matricula'])) {
                                        $id = mysqli_escape_string($connect, $_GET['id']);
                                        $matricula = mysqli_escape_string($connect, $_GET['matricula']);

                                        $sql = "SELECT * FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao 
                                        join usuario u on i.id_usuario = u.id_usuario join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe
                                        Where id_matricula = '$id' and num_matricula = '$matricula'";
                                        $resultado = mysqli_query($connect, $sql);
                                        $dados = mysqli_fetch_array($resultado);
                            ?>
                            <form action="del_matricula.php" method="POST">
                            <div class="row">
                            <input type="hidden" name ="id_matricula" value ="<?php echo $dados['id_matricula']; ?>">
                            <input type="hidden" name ="id_inscricao" value ="<?php echo $dados['id_inscricao']; ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                   
                                        <label><p>Tens a Certeza que desejas apagar Matricula nº <?php echo $dados['num_matricula']; ?>. Aluno <?php echo $dados['nome_usuario']; ?>?</p> </label>
                                        
                                    </div>
                                </div>
                                
                                    </div>
                                    <button type="submit" name="btn-apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i> Apagar</button> 
                                    <a href="list_matricula.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>    
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