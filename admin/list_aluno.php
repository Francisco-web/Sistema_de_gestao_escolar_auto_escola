<?php 
include_once 'menu_rod/menu_admin.php';

require_once '../db_connect.php';

//Receber o número da página
$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
//Setar a quantidade de itens por pagina
$qnt_result_pg = 6;
	
//calcular o inicio visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

$nome = isset($_POST['nome'])?$_POST['nome']:"";
$matricula = isset($_POST['matricula'])?$_POST['matricula']:"";
$classe = isset($_POST['classe'])?$_POST['classe']:"";
$turma = isset($_POST['turma'])?$_POST['turma']:"";
$ano_lectivo = isset($_POST['ano'])?$_POST['ano']:"";


$sql = "SELECT id_matricula,num_matricula, nome_usuario, nome_classe,periodo, nome_turma, ano_academico FROM matricula m inner join inscricao i 
on m.id_inscricao = i.id_inscricao join usuario u on i.id_usuario = u.id_usuario 
 join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe
Where num_matricula like '%$matricula%' and nome_usuario like '%$nome%' 
and nome_classe like '%$classe%' and nome_turma like '%$turma%' and ano_academico like '$ano_lectivo%' order by nome_usuario LIMIT $inicio, $qnt_result_pg  ";
$consulta = mysqli_query($connect, $sql);
$registros_pesquisa = mysqli_num_rows($consulta);

?>   
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Consultar Alunos</h2>   
                        <h5> </h5>
                    </div>
                </div>    
                <br> 
                     
                <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nº Matrícula</label>
                                        <input type="text" name="matricula" autocomplete="off" class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" name="nome" autocomplete="off" class="form-control" />
                                        
                                    </div>
                                </div>
                                   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select name="classe" id="" class="form-control">
                                        <option value="">--Selecione--</option>
                                        <?php 
											$sql = "SELECT distinct id_classe, nome_classe FROM classe order by id_classe ASC ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['nome_classe']; ?>"><?php echo $dados['nome_classe']; ?></option>
										<?php } ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turma</label>
                                        <input type="text" name="turma" autocomplete="off" class="form-control" />    

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ano Academico</label>
                                        <input type="text" name="ano" autocomplete="off" class="form-control" />
                                        
                                    </div>
                                    <a href="list_aluno.php" class="btn btn-primary"><i class="fa fa-list"></i> Todos</a>     
                                    <input type="submit" class="btn btn-primary" value="Pesquisar"> 
                                </div>

                            </div> 
                        </form>   
                 <!-- /. ROW  -->
                 <hr>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th>Nº Matrícula</th>
                                <th>Aluno</th>
                                <th>Turma</th>
                                <th>Periodo</th>
                                <th>Classe</th>
                                <th>Ano</th>
                                <th><i class="fa fa-cogs"></i> Ver</th>
                            </tr>
                            <?php
                     
                                while($exibirRegistros = mysqli_fetch_array($consulta)):
                            ?>
                            <tr>
                                
                                <td><?php echo $exibirRegistros['num_matricula']; ?></td>
                                <td><?php echo $exibirRegistros['nome_usuario']; ?></td>
                                <td><?php echo $exibirRegistros['nome_turma']; ?></td>
                                <td><?php echo $exibirRegistros['periodo']; ?></td>
                                <td><?php echo $exibirRegistros['nome_classe']; ?></td>
                                <td><?php echo $exibirRegistros['ano_academico']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="vs_aluno.php?id=<?php echo $exibirRegistros['id_matricula']; ?>&cn=<?php echo $exibirRegistros['nome_classe']; ?>&an=<?php echo $exibirRegistros['ano_academico']; ?>"><i class="fa fa-search-plus"></i></a>
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
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
   
            <?php 
            include_once 'menu_rod/rod_admin.php'
            ?>  