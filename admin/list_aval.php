<?php 
        include_once 'menu_rod/menu_admin.php';
        
                //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                
        //Setar a quantidade de itens por pagina
        $qnt_result_pg = 6;
            
        //calcular o inicio visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        $matricula = isset($_POST['matricula'])?$_POST['matricula']:"";
        $aluno = isset($_POST['nome'])?$_POST['nome']:"";
        $turma = isset($_POST['turma'])?$_POST['turma']:"";
        $disciplina = isset($_POST['disciolina'])?$_POST['disciplina']:"";
        $classe = isset($_POST['classe'])?$_POST['classe']:"";
        $ano = isset($_POST['ano'])?$_POST['ano']:"";

        $sql = "SELECT distinct nome_classe,nome_turma,nome_usuario,periodo,t.id_professor,id_classe FROM nota n inner join turma t on n.id_turma = t.id_turma JOIN classe c on t.classe = c.id_classe   
        join disciplina d on n.id_disciplina= d.id_disciplina join professor p on d.id_professor=p.id_professor join usuario u on p.id_usuario=u.id_usuario where nome_usuario like '%$aluno%' 
        and  nome_turma like '%$turma%' and  nome_classe like '%$classe%'and  nome_disc like '%$disciplina%' LIMIT  $inicio, $qnt_result_pg";
         $consulta = mysqli_query($connect, $sql);
         $registros_pesquisa = mysqli_num_rows($consulta);
        
        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Consultar Avaliação</h2>  
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                        
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Aluno</label>
                                            <input type="text" name="nome"  class="form-control" />
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Classe</label>
                                            <select name="classe" id="classe" class="form-control">
                                               <option value="">-- Selecione --</option> 
                                                <option value="1ª Classe">1ª Classe</option>
                                                <option value="2ª Classe">2ª Classe</option>
                                                <option value="3ª Classe">3ª Classe</option>
                                                <option value="4ª Classe">4ª Classe</option>
                                                <option value="5ª Classe">5ª Classe</option>
                                                <option value="6ª Classe">6ª Classe</option>
                                                <option value="7ª Classe">7ª Classe</option>
                                                <option value="8ª Classe">8ª Classe</option>
                                                <option value="9ª Classe">9ª Classe</option>
                                            </select>
                                            
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
                                            <label>Discíplina</label>
                                            <input type="text" name="disciplina"  class="form-control" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ano Academico</label>
                                            <input type="text" name="ano"  class="form-control" />
                                            
                                        </div>
                                                     
                                    <a href="list_aval.php" class="btn btn-primary"><i class="fa fa-list"></i> Todos</a> 
                                    <input type="submit" value="Pesquisar" class="btn btn-primary"> 
                                </div>
                                
                            </div>
                        </form>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                            <tbody>
                            <tr>
                                    <th>Classe</th>
                                    <th>Turma</th>
                                    <th>Turno</th>
                                    <th>Professor</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                    
                                    while($exibirRegistros = mysqli_fetch_array($consulta)):
                                   
                                ?>
                                <tr>
                                    <td><?php echo $exibirRegistros['nome_classe']; ?></td>
                                    <td><?php echo $exibirRegistros['nome_turma']; ?></td>
                                    <td><?php echo $exibirRegistros['periodo']; ?></td>
                                    <td><?php echo $exibirRegistros['nome_usuario']; ?></td>

                                    <td>
                                <div class="btn-group">
                                    
                                    <a class="btn btn-default" href="vs_aval.php?id=<?php echo $exibirRegistros['id_classe']; ?>&p=<?php echo $exibirRegistros['periodo']; ?>&tm=<?php echo $exibirRegistros['nome_turma']; ?>"><i class="fa fa-search-plus"></i></a>
                                    <a class="btn btn-default" href="editar_nota.php?nc=<?php echo $exibirRegistros['nome_classe']; ?>&tm=<?php echo $exibirRegistros['nome_turma']; ?>&pd=<?php echo $exibirRegistros['periodo']; ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default" href="../FPDF/vs_aval.php?nc=<?php echo $exibirRegistros['nome_classe']; ?>&tm=<?php echo $exibirRegistros['nome_turma']; ?>&pd=<?php echo $exibirRegistros['periodo']; ?>"><i class="fa fa-print"></i></a>
                                </div>
                                </td>
                            </tr> <?php endwhile; //Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT distinct  COUNT(id_nota) AS num_result,nome_classe,nome_turma,nome_usuario,periodo FROM nota n inner join turma t on n.id_turma = t.id_turma JOIN classe c on t.classe = c.id_classe join disciplina d on n.id_disciplina= d.id_disciplina join professor p on d.id_professor=p.id_professor join usuario u on p.id_usuario=u.id_usuario ";
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
                            <li><?PHP echo "<a href='list_aval.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='list_aval.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='list_aval.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='list_aval.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='list_aval.php?pagina=$quantidade_pg'>»</a>"?></li>
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
            include_once 'menu_rod/rod_admin.php';
        ?>