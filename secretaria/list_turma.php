            <?php 
            include_once 'menu_rod/menu_sec.php';

            if (isset($_GET['id'])) {
                $id_classe = mysqli_escape_string($connect, $_GET['id']);
                   
                $contador = 1;
                $sql = "SELECT  * FROM turma t inner join classe c on t.classe = c.id_classe 
                where id_classe = '$id_classe'";
                $resultado = mysqli_query($connect, $sql);
                $linha = mysqli_fetch_array($resultado);
                $classe = $linha['nome_classe'];
            }
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2>Selecione a Turma </h2>
                    <h3><?php echo $classe; ?></h3>
                                   
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
                                            <th class="text-center">Turma</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                   
                                   if (isset($_GET['id'])) {
                                    $id_classe = mysqli_escape_string($connect, $_GET['id']);
                                       
                                    $contador = 1;
                                    $sql = "SELECT  distinct id_classe,nome_classe, nome_turma FROM turma t inner join classe c on t.classe = c.id_classe 
                                     where id_classe = '$id_classe'";
                                    $resultado = mysqli_query($connect, $sql);
                                    while($linha = mysqli_fetch_array($resultado)):

                                    $id_classe = $linha['id_classe'];
                                    $nome_classe = $linha['nome_classe'];
                                    $nome_turma = $linha['nome_turma'];
                                   ;
                                    ?>
                                        <tr class="success" >
                                            <td class="text-center"><?php echo $contador ++; ?></td>
                                            <td class="text-center"><a href="consultar_plano.php?classe=<?php echo $linha['nome_classe']; ?>"><?php echo $linha['nome_turma']; ?></a></td>
                                        </tr>
                                        
                                    <?php endwhile;} ?>
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
            include_once 'menu_rod/rod_sec.php';
            ?>