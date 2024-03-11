
        <?php 
            include_once 'menu_rod/menu_sec.php';
            require_once '../db_connect.php';
            
             //Receber o número da página
             $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
             $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                     
             //Setar a quantidade de itens por pagina
             $qnt_result_pg = 6;
                 
             //calcular o inicio visualização
             $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
             

            $inscricao = isset($_POST['num_inscricao'])?$_POST['num_inscricao']:"";
            $aluno = isset($_POST['aluno'])?$_POST['aluno']:"";
            $classe_pretendida = isset($_POST['classe_pretendida'])?$_POST['classe_pretendida']:"";

            $sql = "SELECT * FROM inscricao i  inner join usuario u on i.id_usuario = u.id_usuario 
            Where num_inscricao like '%$inscricao%' and  nome_usuario like '%$aluno%' and classe_pretendida like '%$classe_pretendida%' order by nome_usuario LIMIT  $inicio, $qnt_result_pg";
            $consulta = mysqli_query($connect, $sql);
            $registros_pesquisa = mysqli_num_rows($consulta);
           
        ?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Consultar Inscrição</h2>   
                     <a class="btn btn-primary" href="add_inscricao.php"><i class="fa fa-plus"></i> Adicionar Nova</a>
                    </div>
                </div>   
                <hr />           
                 <!-- /. ROW  -->
                  <?php 
                            if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            ?>
                  <hr />

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                        
                        <form action="" method="POST">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Inscrição Nº</label>
                                        <input type="text" name="num_inscricao"  class="form-control" autocomplete="off"/>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" name="aluno"  class="form-control" autocomplete="off"/>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe Pretendida</label>
                                        <input type="text" name="classe_pretendida"  class="form-control" autocomplete="off"/>
                                        
                                    </div>
                                                      
                                    <a href="list_inscricao.php" class="btn btn-primary"><i class="fa fa-list"></i> Todos</a>     
                                    <input type="submit" class="btn btn-primary" value="Pesquisar">  
                                </div>
                                
                            </div>
    
                             
                        </form>
                        <br>
                        
                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>Nº Inscrição</th>
                                    <th>Nome Estudante</th>
                                    <th>Classe Anterior</th>
                                    <th>Classe Pretendida</th>
                                    <th>Ano Concluído</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                               
                                    while($exibirRegistros = mysqli_fetch_array($consulta)):
                                ?>
                                <tr>
                                    <td><?php echo $exibirRegistros['num_inscricao']; ?></td>
                                    <td><?php echo $exibirRegistros['nome_usuario']; ?></td>
                                    <td><?php echo $exibirRegistros['classe_anterior']; ?></td>
                                    <td><?php echo $exibirRegistros['classe_pretendida']; ?></td>
                                    <td><?php echo $exibirRegistros['ano_acad_concluido']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="vs_inscricao.php?idins=<?php echo $exibirRegistros['id_inscricao']; ?>&inscricao=<?php echo $exibirRegistros['num_inscricao']; ?>&data=<?php echo $exibirRegistros['data_inscricao']; ?>"><i class="fa fa-search-plus"></i></a>
                                    <a class="btn btn-default" href="editar_inscricao.php?idins=<?php echo $exibirRegistros['id_inscricao']; ?>&idus=<?php echo $exibirRegistros['id_usuario']; ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default" href="deletar_inscricao.php?idins=<?php echo $exibirRegistros['id_inscricao']; ?>&idus=<?php echo $exibirRegistros['id_usuario']; ?>"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile; 
                                        //Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(id_inscricao) AS num_result FROM inscricao";
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
                                        <li><?PHP echo "<a href='list_inscricao.php?pagina=1'>«</a>"?></li>

                                                        <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                                        if($pag_ant >= 1){
                                                            ?>

                                                        <li><?PHP echo "<a href='list_inscricao.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                                        <?php	}
                                                        } ?>

                                                                    <li><?PHP echo "<a href='list_inscricao.php?pagina=$pagina'> $pagina</a>";?></li>

                                                                <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                                if($pag_dep <= $quantidade_pg){ 
                                                                                    ?>		
                                                        <li><?PHP echo "<a href='list_inscricao.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                                        <?php	}
                                                        } ?>
                                                        <li><?PHP echo "<a href='list_inscricao.php?pagina=$quantidade_pg'>»</a>"?></li>
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
        <?php 
            include_once 'menu_rod/rod_sec.php'
        ?>  