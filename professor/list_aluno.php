
          <?php 
            include_once 'menu_rod/menu_prof.php';
           
            
             //Receber o número da página
             $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
             $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                     
             //Setar a quantidade de itens por pagina
             $qnt_result_pg = 6;
                 
             //calcular o inicio visualização
             $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            if (isset($_GET["id"]) && isset($_GET["p"]) && isset($_GET["tm"])) {
                $id_classe = mysqli_escape_string($connect, $_GET['id']);
                $periodo = mysqli_escape_string($connect, $_GET['p']);
                $turma = mysqli_escape_string($connect, $_GET['tm']);
              }

            $nome = isset($_POST['nome'])?$_POST['nome']:"";
            $matricula = isset($_POST['matricula'])?$_POST['matricula']:"";
            $sql = "SELECT * FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao join usuario u on i.id_usuario = u.id_usuario join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe 
            JOIN professor p on t.id_professor = p.id_professor where num_matricula like '$matricula%' and nome_usuario like '$nome%' and t.classe ='$id_classe' and nome_turma='$turma' and t.periodo='$periodo' LIMIT  $inicio, $qnt_result_pg";
            $consulta = mysqli_query($connect, $sql);
            $registros_pesquisa = mysqli_num_rows($consulta);
             
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                       
                        <h2>Lista dos Alunos Matriculados</h2>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />

                  <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                       
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nº Matrícula</label>
                                        <input type="text" name="matricula"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" name="nome"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-default" value="Pesquisar"> 
                                </div>
                                <br>
                            

                            </div> 
                        </form>   
                        
                            </div> 
                            <table class="table">
                                <thead >
                                    <tr>
                                    <th class="text-left">Nº Matrícula</th>
                                    <th class="text-left">Nome do Aluno</th>
                                    <th class="text-left">Periodo</th>
                                    <th class="text-left">Turma</th>
                                    <th class="text-left">Classe</th>
                                    <th><i class="fa fa-cogs"></i> Acção</th>
                                    
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php
                     
                                        while($exibirRegistros = mysqli_fetch_array($consulta)):
                                    ?>
                                    <tr class="success">

                                        <td class="text-left"><?php echo $exibirRegistros['num_matricula']; ?></td>
                                        <td class="text-left"><?php echo $exibirRegistros['nome_usuario']; ?></td>
                                        <td class="text-left"><?php echo $exibirRegistros['periodo']; ?></td>
                                         <td class="text-left"><?php echo $exibirRegistros['nome_turma']; ?></td>
                                        <td class="text-left"><?php echo $exibirRegistros['nome_classe']; ?></td>
                                       <td> 
                                            <div class="btn-group">
                                                <a class="btn btn-default" href="vs_aval.php?id=<?php echo $exibirRegistros['num_matricula']; ?>&cl=<?php echo $exibirRegistros['nome_classe']; ?>&tur=<?php echo $exibirRegistros['nome_turma']; ?>&pr=<?php echo $exibirRegistros['periodo']; ?>"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <?php endwhile; //Paginção - Somar a quantidade de usuários
                                $result_pg = "SELECT COUNT(id_matricula) AS num_result FROM matricula";
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
                            <li><?PHP echo "<a href='list_aluno.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='list_aluno.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='list_aluno.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='list_aluno.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='list_aluno.php?pagina=$quantidade_pg'>»</a>"?></li>
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
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->

     <?php 
            include_once 'menu_rod/rod_prof.php'
        ?>