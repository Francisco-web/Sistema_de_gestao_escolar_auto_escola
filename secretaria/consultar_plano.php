
          <?php 
            include_once 'menu_rod/menu_sec.php';

            if (isset($_GET["classe"])) {
                $nome_classe = mysqli_escape_string($connect, $_GET['classe']);
                
              }
               
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2>Horário da <?php echo $nome_classe; ?></h2>
                                   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                  
                    <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                          
                    </div> 
                    <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <tr>
                                    <th>Hora</th>
                                    <th>Dia da Semana</th>
                                    <th>Discíplinas</th>
                                    <th>Turno</th>
                                    <th>Docente</th>
                                </tr>
                                <?php
                         if (isset($_GET["classe"])) {
                            $nome_classe = mysqli_escape_string($connect, $_GET['classe']);
                          }
                            $sql = "SELECT  * FROM plano_curricular pc INNER JOIN disciplina d ON pc.id_disciplina = d.id_disciplina 
                             join turma t on pc.id_turma = t.id_turma join classe c ON t.classe = c.id_classe join professor p on d.id_professor = p.id_professor 
                            join usuario u on p.id_usuario = u.id_usuario where nome_classe ='$nome_classe' order by dia_sem";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                    
                            ?>
                    
                                <tr>
                                
                                <td><?php echo $dados['hora']; ?></td>
                                <td><?php echo $dados['dia_sem']; ?></td>
                                <td><?php echo $dados['nome_disc']; ?></td>
                                <td><?php echo $dados['periodo']; ?></td>
                                <td><?php echo $dados['nome_usuario']; ?></td>
                                
                                </tr>
                               
                                </tbody>
                            </table>
                        </section>
                        <?php endwhile; ?>                 
                    </div>
                     
                </div>            
                           
                     
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->

     <?php 
            include_once 'menu_rod/rod_sec.php';
        ?>