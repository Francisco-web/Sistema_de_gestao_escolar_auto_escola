
        <?php 
            include_once 'menu_rod/menu_sec.php';

             //Receber o número da página
             $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
             $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                     
             //Setar a quantidade de itens por pagina
             $qnt_result_pg = 6;
                 
             //calcular o inicio visualização
             $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
        ?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Convocatórias </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-9">
                        <section class="panel">
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th>Nº</th>
                                <th>tipo</th>
                                <th>Data</th>
                                <th>Imprimir</th>
                            </tr>
                            <?php
                            $sql = "SELECT * FROM convocatoria order by num_conv DESC LIMIT  $inicio, $qnt_result_pg";
                            $resultado = mysqli_query($connect, $sql);
                            while($dados = mysqli_fetch_array($resultado)):
                            ?>

                           
                             <tr>
                                 <td><?php echo $dados['num_conv']; ?></td>
                                 <td><?php echo $dados['tipo']; ?></td>
                                 <td><?php echo $dados['data_conv']; ?></td>

                                <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="../relatorio/nota.php?id=<?php echo $dados['num_conv']; ?>"><i class="fa fa-print"></i></a>
                                </div>
                                </td>
                            </tr>
                            <?php endwhile; 
                                //Paginção - Somar a quantidade de usuários
                                $result_pg = "SELECT COUNT(num_conv) AS num_result FROM convocatoria";
                                $resultado_pg = mysqli_query($connect, $result_pg);
                                $row_pg = mysqli_fetch_assoc($resultado_pg);
                                //echo $row_pg['num_result'];
                                //Quantidade de pagina 
                                $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg); 
                            ?>
                            </tbody>
                        </table>
                        <section class="panel">
                <div class="panel-body">
                    <div>
                        <ul class="pagination pagination-sm pull-right">
                                        <?php	//selecionador de página a visualizar
                                                    //Limitar os link antes depois
                        
                                                        $max_links = 3; ?>
                            <li><?PHP echo "<a href='list_conv.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='list_conv.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='list_conv.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='list_conv.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='list_conv.php?pagina=$quantidade_pg'>»</a>"?></li>
                        </ul>
                    </div> 
              </div>
            </section>
            <!--pagination end-->
                    </div>
                     
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <?php 
        include_once 'menu_rod/rod_sec.php';
    ?> 