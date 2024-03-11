
           <?php 
            include_once 'menu_rod/menu_sec.php';

            //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                    
            //Setar a quantidade de itens por pagina
            $qnt_result_pg = 6;
                
            //calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;


            $matricula = isset($_POST['matricula'])?$_POST['matricula']:"";
            $estudante = isset($_POST['estudante'])?$_POST['estudante']:"";
            $mes = isset($_POST['mes'])?$_POST['mes']:"";
            $ano = isset($_POST['ano'])?$_POST['ano']:"";

            $sql = "SELECT distinct id_aluno_pag,num_documento,nome_turma,num_matricula,nome_usuario,nome_classe,mes_pag,valor_pag FROM aluno_pag a 
            inner join matricula m on a.id_matricula = m.id_matricula join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe 
            join pagamento p on a.id_pag = p.id_pag join inscricao i on m.id_inscricao = i.id_inscricao 
            JOIN usuario u on i.id_usuario = u.id_usuario where num_matricula like '%$matricula%' and mes_pag like '%$mes%' and nome_usuario like '%$estudante%' 
             and ano_academico Like '%$ano%' order by id_aluno_pag DESC LIMIT  $inicio, $qnt_result_pg";
            $consulta = mysqli_query($connect, $sql);
            $registros_pesquisa = mysqli_num_rows($consulta);
            
            ?>                 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Consultar Pagamento</h2> 
                     <a href="add_pag.php" class="btn btn-primary "><i class="fa fa-plus"></i> Adicionar Novo</a>
                     <a href="add_propina.php" class="btn btn-primary "><i class="fa fa-plus"></i> Nova Propina</a>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                        <?php 
                            if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                         ?>

                        <form action="" method="POST">
                            
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Matrícula Nº</label>
                                        <input type="text" name="matricula"  class="form-control" />
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Aluno</label>
                                        <input type="text" name="estudante"  class="form-control" />
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mês Pago</label>
                                        <select name="mes" id="" class="form-control">
                                            <option value="">--Selecione--</option>
                                            <option value="Janeiro">Janeiro</option>
                                            <option value="Fevereiro">Fevereiro</option>
                                            <option value="Março">Março</option>
                                            <option value="Abril">Abril</option>
                                            <option value="Maio">Maio</option>
                                            <option value="Junho">Junho</option>
                                            <option value="Julho">Julho</option>
                                            <option value="Agosto">Agosto</option>
                                            <option value="Setembro">Setembro</option>
                                            <option value="Outubro">Outubro</option>
                                            <option value="Novembro">Novembro</option>
                                            <option value="Dezembro">Dezembro</option>
                                        </select>
                                        
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ano Academico</label>
                                        <input type="text" name="ano"  class="form-control" />
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">                           
                                    <a type="submit" href="list_pag.php" class="btn btn-primary"><i class="fa fa-list"></i> Todos</a> 
                                    <input type="submit" class="btn btn-primary" value="Pesquisar">
                              
                                </div>

                            </div> 
                        </form>
                    </div> 
                    </div>
                                     
                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>Matrícula</th>
                                    <th>Aluno</th>
                                    <th>Classe</th>
                                    <th>Mês Pago</th>
                                    <th>Propina</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                while($exibirRegistros = mysqli_fetch_array($consulta)):
                                ?>
                                <tr>
                                    
                                    <td><?php echo $exibirRegistros['num_matricula']; ?></td>
                                    <td><?php echo $exibirRegistros['nome_usuario']; ?></td>
                                    <td><?php echo $exibirRegistros['nome_classe']; ?></td>
                                    <td><?php echo $exibirRegistros['mes_pag']; ?></td>
                                    <td><?php echo $exibirRegistros['valor_pag']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="vs_pagamento.php?al=<?php echo $exibirRegistros['id_aluno_pag']; ?> & mt=<?php echo $exibirRegistros['num_matricula']; ?> & us=<?php echo $exibirRegistros['num_documento']; ?> & tm=<?php echo $exibirRegistros['nome_turma']; ?> & cl=<?php echo $exibirRegistros['nome_classe']; ?>"><i class="fa fa-search-plus"></i></a>
                                        <a class="btn btn-default"  onclick= editar()><i class="fa fa-edit"></i></a>
                                    
                                        <a class="btn btn-default" onclick= apagar()><i class="fa fa-trash-o"></i></a>
                                        <a class="btn btn-default" href="../FPDF/recibo_pagamento.php?id=<?php echo $exibirRegistros['id_aluno_pag']; ?>&matricula=<?php echo $exibirRegistros['num_matricula']; ?>&us=<?php echo $nome;?>"><i class="fa fa-print"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile; 
                                    //Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(id_aluno_pag) AS num_result FROM aluno_pag";
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
                            <li><?PHP echo "<a href='list_pag.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='list_pag.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='list_pag.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='list_pag.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='list_pag.php?pagina=$quantidade_pg'>»</a>"?></li>
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

    <?php 
            include_once 'menu_rod/rod_sec.php'
    ?> 