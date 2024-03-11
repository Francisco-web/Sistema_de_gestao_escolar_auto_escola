            <?php 
            include_once 'menu_rod/menu_admin.php';

               //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                
        //Setar a quantidade de itens por pagina
        $qnt_result_pg = 20;
            
        //calcular o inicio visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2>Consultar Horário</h2>
                    <a href="add_plano.php" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Plano</a> 
                                   
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
                                            <th class="text-center">Classe</th>
                                            <th class="text-center">Turma</th>
                                            <th class="text-center">Turno</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                    $sql = "SELECT * FROM turma t inner join classe c on t.classe = c.id_classe order by nome_classe LIMIT  $inicio, $qnt_result_pg";
                                    $resultado = mysqli_query($connect, $sql);

                                    $contador = 1;
                                    while ($linha = mysqli_fetch_array($resultado)) {
                                    $id_classe = $linha['id_classe'];
                                    $nome_classe = $linha['nome_classe'];
                                    $turma = $linha['nome_turma'];
                                    $periodo = $linha['periodo'];
                                    ?>
                                        <tr class="success" >
                                            <td class="text-center"><?php echo $contador ++; ?></td>
                                            <td class="text-center"><a href="consultar_plano.php?ntm=<?php echo $turma; ?> & cl=<?php echo $nome_classe; ?> & pd=<?php echo $periodo; ?>"><?php echo $nome_classe; ?></a></td>
                                            <td class="text-center"><a href="consultar_plano.php?ntm=<?php echo $turma; ?> & cl=<?php echo $nome_classe; ?> & pd=<?php echo $periodo; ?>"><?php echo $turma; ?></a></td>
                                            <td class="text-center"><a href="consultar_plano.php?ntm=<?php echo $turma; ?> & cl=<?php echo $nome_classe; ?> & pd=<?php echo $periodo; ?>"><?php echo $periodo; ?></a></td>
                                        </tr>
                                        
                                        <?php } //Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(id_turma) AS num_result FROM turma";
                                    $resultado_pg = mysqli_query($connect, $result_pg);
                                    $row_pg = mysqli_fetch_assoc($resultado_pg);
                                    //echo $row_pg['num_result'];
                                    //Quantidade de pagina 
                                    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg); 
                                ?>
                                </tbody>
                        </table>
                      <!--pagination start-->
			<section class="panel">
                <div class="panel-body">
                    <div>
                        <ul class="pagination pagination-sm pull-right">
                                        <?php	//selecionador de página a visualizar
                                                    //Limitar os link antes depois
                        
                                                        $max_links = 3; ?>
                            <li><?PHP echo "<a href='list_plano.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='list_plano.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='list_plano.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='list_plano.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='list_plano.php?pagina=$quantidade_pg'>»</a>"?></li>
                        </ul>
                    </div> 
              </div>
            </section>
            <!--pagination end-->
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
            include_once 'menu_rod/rod_admin.php'
            ?>