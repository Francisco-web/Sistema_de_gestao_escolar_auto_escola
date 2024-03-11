
           <?php 
            include_once 'menu_rod/menu_admin.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Apagar Pagamento</h2>   
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
                            if (isset($_GET['al'])) {
                                $id = mysqli_escape_string($connect, $_GET['al']);
                                $doc_usuario = mysqli_escape_string($connect, $_GET['us']);
                                $matricula = mysqli_escape_string($connect, $_GET['mt']);
                                $turma = mysqli_escape_string($connect, $_GET['tm']);
                                $classe = mysqli_escape_string($connect, $_GET['cl']);
                            }
                            $sql = "SELECT distinct * FROM aluno_pag a 
                                    inner join matricula m on a.id_matricula = m.id_matricula join turma t on m.id_turma=t.id_turma join classe c on t.classe = c.id_classe 
                                    join pagamento p on a.id_pag = p.id_pag join inscricao i on m.id_inscricao = i.id_inscricao 
                                    JOIN usuario u on i.id_usuario = u.id_usuario WHERE id_aluno_pag = '$id' and num_documento = '$doc_usuario' and num_matricula = '$matricula' and nome_turma = '$turma' and nome_classe = '$classe'";
                                    
                            $resultado = mysqli_query($connect, $sql);
                            $exibirRegistros = mysqli_fetch_array($resultado);
                                        
                                  
                            ?>
                            <form action="del_pag.php" method="POST">
                            <div class="row">
                                <input type="hidden" name ="id" value ="<?php echo  $exibirRegistros['id_aluno_pag']; ?>">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                   
                                    
                                    
                                       <p>Tens a Certeza que desejas apagar o Pagamento referente ao mês de <strong><?php echo $exibirRegistros['mes_pag']; ?></strong> do Aluno  de Matrícula Nº <strong><?php echo $exibirRegistros['num_matricula']; ?>?</strong></p> 
                                        
                                    </div>
                                   
                                <div class="col-md-6">
                                <button type="submit" name="btn-apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i> Apagar</button> 
                                <a href="list_pag.php" class="btn btn-default"><i class= "fa fa-undo"></i> Cancelar</a>        
                                    
                                    </div>
                            </div>
                           
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