
          <?php 
            include_once 'menu_rod/menu_admin.php';

            if (isset($_GET["ntm"])) {
                $turma = mysqli_escape_string($connect, $_GET['ntm']);
                $classe = mysqli_escape_string($connect, $_GET['cl']);
                $periodo = mysqli_escape_string($connect, $_GET['pd']);
                
              }
                $sql = "SELECT distinct pc.id_plano,pc.dia_sem,pc.hora,pc.ano_academico,
                pc.id_disciplina,d.codigo_disc,d.nome_disc,c.codigo_classe,c.nome_classe,nome_turma,periodo 
                FROM plano_curricular pc INNER JOIN disciplina d ON pc.id_disciplina = d.id_disciplina 
                join turma t on pc.id_turma=t.id_turma join classe c ON t.classe = c.id_classe where nome_turma='$turma' and nome_classe='$classe' and periodo ='$periodo'";
                    $resultado = mysqli_query($connect, $sql);
                    $dados = mysqli_fetch_array($resultado);
                        
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2>Horário da <?php echo $dados['nome_classe']; ?> / Turma: <?php echo $dados['nome_turma']; ?>
                    /Periodo:<?php echo $dados['periodo']; ?></h2>
                                   
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
                                    <th>Hora</th>
                                    <th>Dia da Semana</th>
                                    <th>Discíplinas</th>
                                    <th>Docente</th>
                                </tr>
                                <?php
                                    
                                $sql = "SELECT distinct*FROM plano_curricular pc INNER JOIN disciplina d ON pc.id_disciplina = d.id_disciplina 
                                join turma t on pc.id_turma = t.id_turma  join classe c ON t.classe = c.id_classe join professor p on d.id_professor = p.id_professor 
                                join usuario u on p.id_usuario = u.id_usuario where nome_turma = '$turma' and nome_classe='$classe' and periodo ='$periodo' order by hora and dia_sem";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):

                                ?>
                                <tr>
                                <td><?php echo $dados['hora']; ?></td>
                                <td><?php echo $dados['dia_sem']; ?></td>
                                <td><?php echo $dados['nome_disc']; ?></td>
                                <td><?php echo $dados['nome_usuario']; ?></td>
                            </tr>
                                <?php endwhile; ?>
                            
                            </tbody>
                    </table>
                        </section>
                                        
                    </div>
                     
                </div>            
                           
                     
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->

     <?php 
            include_once 'menu_rod/rod_admin.php';
        ?>