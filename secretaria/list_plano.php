            <?php 
            include_once 'menu_rod/menu_sec.php'
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2>Consultar Horário</h2>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                    <br>    
                        <section class="panel">
                        <div class="row">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead >
                                        <tr>
                                            <th class="text-center">Linha</th>
                                            <th class="text-center">Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                    $sql = "SELECT * FROM classe order by id_classe Asc ";
                                    $resultado = mysqli_query($connect, $sql);


                                    $contador = 1;
                                    while ($linha = mysqli_fetch_array($resultado)) {
                                    $id_classe = $linha['id_classe'];
                                    $nome_classe = $linha['nome_classe'];
                                    ?>
                                        <tr class="success" >
                                            <td class="text-center"><?php echo $contador ++; ?></td>
                                            <td class="text-center"><a href="list_turma.php?id=<?php echo $id_classe; ?>"><?php echo $nome_classe; ?></a></td>
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
            include_once 'menu_rod/rod_sec.php'
            ?>