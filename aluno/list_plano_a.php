
        <?php 
        include_once 'menu_rod/menu_aluno.php';

       
        
        $sql = "SELECT * FROM inscricao i inner join usuario u on i.id_usuario = u.id_usuario 
        join matricula m on m.id_inscricao = i.id_inscricao join turma t on m.id_turma= t.id_turma join classe c on t.classe = c.id_classe  WHERE u.tipo = '$tipo' ";
        $resultado = mysqli_query($connect, $sql);
        $dados = mysqli_fetch_array($resultado);
        $classe = $dados['nome_classe'];
        $turma = $dados['nome_turma'];
        $turno = $dados['periodo'];
        $ano = $dados['ano_academico'];
        
        
        ?> 
        
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-9">
                     <h2>Horário</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                  <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                               
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
                                join usuario u on p.id_usuario = u.id_usuario where nome_classe ='$classe' and periodo ='$turno' and nome_turma = '$turma' and ano_academico = '$ano' order by hora and dia_sem";
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
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    
        <?php 
        include_once 'menu_rod/rod_aluno.php'
        ?> 