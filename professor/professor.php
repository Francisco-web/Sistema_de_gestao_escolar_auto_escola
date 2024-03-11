        <?php 
        include_once 'menu_rod/menu_prof.php';
               
        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Area Docente</h2>   
                    
                    </div>
                </div>  
                
                 <!-- /. ROW  -->
                 <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                    <th>Classe</th>
                                    <th>Turma</th>
                                    <th>Periodo</th>
                                    <th>Sala</th>
                            </tr>
                                <?php
                                    
                                
                                $sql= "SELECT  * FROM turma t inner join classe c on t.classe = c.id_classe where id_professor = '$id_professor'order by nome_classe ";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                  
                                ?>
                            <tr>
                                    <td><?php echo $dados['nome_classe']; ?></td>
                                    <td><?php echo $dados['nome_turma']; ?></td>
                                    <td><?php echo $dados['periodo']; ?></td>
                                    <td><?php echo $dados['num_sala']; ?></td>
                                   
                                    <td>
                            </tr>
                            </tbody>
                            <?php endwhile; ?>

                    </table>
                    <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                    <th>Codigo</th>
                                    <th>Discíplina</th>
                                    
                            </tr>
                                <?php
                                    
                                
                                $sql= "SELECT  * FROM disciplina t where id_professor = '$id_professor' order by nome_disc ";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                  
                                ?>
                            <tr>
                                    <td><?php echo $dados['codigo_disc']; ?></td>
                                    <td><?php echo $dados['nome_disc']; ?></td>
                                   
                                    <td>
                            </tr>
                            </tbody>
                            <?php endwhile; ?>

                    </table>
            </div>
           
        </div>
     <!-- /. WRAPPER  -->
         <?php 
        include_once 'menu_rod/rod_prof.php';
        ?>