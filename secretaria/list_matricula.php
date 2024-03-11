
        <?php 
            include_once 'menu_rod/menu_sec.php';

            //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                    
            //Setar a quantidade de itens por pagina
            $qnt_result_pg = 6;
                
            //calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            $aluno = isset($_POST['aluno'])?$_POST['aluno']:"";
            $ano = isset($_POST['ano'])?$_POST['ano']:"";

            $classe = isset($_POST['classe'])?$_POST['classe']:"";
            $turma = isset($_POST['turma'])?$_POST['turma']:"";

            $sql = "SELECT m.id_matricula,m.num_matricula,m.tipo,m.ano_academico,i.num_inscricao,u.nome_usuario,t.nome_turma,c.nome_classe 
            FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao 
            join usuario u on i.id_usuario = u.id_usuario join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe
            Where nome_usuario like '%$aluno%' and nome_classe like '%$classe%' and nome_turma like '%$turma%' and ano_academico like '%$ano%' 
            order by nome_usuario LIMIT $inicio, $qnt_result_pg ";
            $consulta = mysqli_query($connect, $sql);
            $registros_pesquisa = mysqli_num_rows($consulta);
        ?>   
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Consultar Matrícula</h2> 
                     <a class="btn btn-primary" href="add_matricula.php"><i class="fa fa-plus"></i> Adicionar Nova</a>
                    </div>
                </div> 
                
                 <!-- /. ROW  -->
                  <hr />
                  <?php 
                    if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    }
                ?>
             
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                        
                        <form action="" method="POST">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome Estudante</label>
                                        <input type="text" name="aluno"  class="form-control" />
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <input type="text" name="classe"  class="form-control" />
                                        
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turma</label>
                                        <input type="text" name="turma"  class="form-control" />
                                        
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ano Academico</label>
                                        <input type="text" name="ano"  class="form-control" />
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <a type="submit" name="usuario" class="btn btn-primary"><i class="fa fa-list"></i> Todos</a> 
                                    <input type="submit" value="Pesquisar" class="btn btn-primary"> 
                              
                                </div>

                            </div> 
                        </form>
                    </div> 
                    </div> 
                   
                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>Nº Inscrição</th>
                                    <th>Nº Matrícula</th>
                                    <th>Aluno</th>
                                    <th>Matrícula</th>
                                    <th>Turma</th>
                                    <th>Classe</th>
                                    <th>Ano Academico</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                
                                 while($exibirRegistros = mysqli_fetch_array($consulta)):
                                ?>
                                <tr>
                                    <td><?php echo $exibirRegistros['num_inscricao']; ?></td>
                                    <td><?php echo $exibirRegistros['num_matricula']; ?></td>
                                    <td><?php echo $exibirRegistros['nome_usuario']; ?></td>
                                    <td><?php echo $exibirRegistros['tipo']; ?></td>
                                    <td><?php echo $exibirRegistros['nome_turma']; ?></td>
                                    <td><?php echo $exibirRegistros['nome_classe']; ?></td>
                                    <td><?php echo $exibirRegistros['ano_academico']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="vs_matricula.php?id=<?php echo $exibirRegistros['id_matricula']; ?>&matricula=<?php echo $exibirRegistros['num_matricula']; ?>&inscricao=<?php echo $exibirRegistros['num_inscricao']; ?>"><i class="fa fa-search-plus"></i></a>
                                        <a class="btn btn-default" href="editar_matricula.php?id=<?php echo $exibirRegistros['id_matricula']; ?>"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-default" href="deletar_matricula.php?id=<?php echo $exibirRegistros['id_matricula']; ?>&matricula=<?php echo $exibirRegistros['num_matricula']; ?> "><i class="fa fa-trash-o"></i></a>
                                        <a class="btn btn-default" href="../FPDF/ficha_matricula.php?id=<?php echo $exibirRegistros['id_matricula']; ?>&matricula=<?php echo $exibirRegistros['num_matricula']; ?>&inscricao=<?php echo $exibirRegistros['num_inscricao']; ?>"><i class="fa fa-print"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile;
                                    //Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(id_matricula) AS num_result FROM matricula";
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
                            <li><?PHP echo "<a href='list_matricula.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='list_matricula.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='list_matricula.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='list_matricula.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='list_matricula.php?pagina=$quantidade_pg'>»</a>"?></li>
                        </ul>
                    </div> 
              </div>
            </section>
            <!--pagination end-->
                     
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <?php 
            include_once 'menu_rod/rod_sec.php'
        ?> 