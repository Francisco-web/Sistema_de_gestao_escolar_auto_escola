<?php 
            include_once 'menu_rod/menu_prof.php';

            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2>Selecione a Classe, Turma e Periodo</h2>
                                   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                        <section class="panel">
                        <div class="row">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead >
                                        <tr>
                                            <th class="text-center">Linha</th>
                                            <th class="text-center">Classe</th>
                                            <th class="text-center">Turma</th>
                                            <th class="text-center">Periodo</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $contador = 1;

                                    $sql = "SELECT distinct id_classe,nome_classe,nome_turma,periodo FROM turma t inner join classe c on t.classe = c.id_classe where id_professor = '$id_professor'order by nome_classe ";
                                    $resultado = mysqli_query($connect, $sql);
                                    while ($linha = mysqli_fetch_array($resultado)) {

                                    ?>
                                        <tr class="success" >
                                            <td class="text-center"><?php echo $contador ++; ?></td>
                                            <td class="text-center"><a href="list_aluno.php?id=<?php echo $linha['id_classe']; ?>&p=<?php echo $linha['periodo']; ?>&tm=<?php echo $linha['nome_turma']; ?>"><?php echo $linha['nome_classe'];?></a></td>
                                            <td class="text-center"><a href="list_aluno.php?id=<?php echo $linha['id_classe']; ?>&p=<?php echo $linha['periodo']; ?>&tm=<?php echo $linha['nome_turma']; ?>"><?php echo $linha['nome_turma'];?></a></td>
                                            <td class="text-center"><a href="list_aluno.php?id=<?php echo $linha['id_classe']; ?>&p=<?php echo $linha['periodo']; ?>&tm=<?php echo $linha['nome_turma']; ?>"><?php echo $linha['periodo'];?></a></td>
                                        </tr>
                                        
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                     
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
     <?php 
            include_once 'menu_rod/rod_prof.php'
            ?>