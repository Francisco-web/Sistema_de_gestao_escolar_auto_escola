
           <?php 
            include_once 'menu_rod/menu_admin.php';

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
                     <h2>Adicionar Turma</h2>   
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
                            <form action="turma.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turma</label>
                                        <input type="text" name="turma" autocomplete="off" class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turno</label>
                                        <select name="periodo" id="periodo" class="form-control">
                                            <option value="">-- Selecione --</option>
                                            <option value="Manhã">Manhã</option>
                                            <option value="Tarde">Tarde</option>
                                            <option value="Noite">Noite</option>
                                        </select>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select name="classe" id="classe" class="form-control">
                                            <option value="">-- Selecione --</option> 
                                            <?php 
											$sql = "SELECT distinct * FROM classe order by id_classe ASC  ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_classe']; ?>"><?php echo $dados['nome_classe']; ?></option>
										<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Professor Responsável</label>
                                        <select name="professor" id="professor" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <?php 
											$sql = "SELECT distinct p.id_professor,u.nome_usuario FROM professor p 
                                            inner JOIN usuario u ON p.id_usuario = u.id_usuario order by nome_usuario ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_professor']; ?>"><?php echo $dados['nome_usuario']; ?></option>
										<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sala</label>
                                        <input type="text" name="sala" autocomplete="off" class="form-control" />
                                    </div> 
                                     
                                    <button type="submit" name="btn-turma" class="btn btn-primary"><i class="fa fa-save"></i> Adicionar</button> 
                                    <a class="btn btn-default" href="Admin.php"><i class="fa fa-undo"></i> Cancelar</a>           
                                </div>
                            </div> 
                        </form>
                    </div> 
                    <br>    
                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th> Turma</th>
                                    <th> Periodo</th>
                                    <th> Sala nº</th>
                                    <th> Classe</th>
                                    <th> Responsavel</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                $sql = "SELECT t.id_turma, t.nome_turma, c.nome_classe, t.periodo, t.num_sala, u.nome_usuario FROM turma t 
                                inner join professor p on t.id_professor = p.id_professor join usuario u on p.id_usuario = u.id_usuario join classe c on t.classe = c.id_classe  
                                order by nome_turma LIMIT  $inicio, $qnt_result_pg";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                ?>
                                <tr>
                                     <td><?php echo $dados['nome_turma']; ?></td> 
                                    <td><?php echo $dados['periodo']; ?></td>
                                    <td><?php echo $dados['num_sala']; ?></td>    
                                    <td><?php echo $dados['nome_classe']; ?></td>
                                    <td><?php echo $dados['nome_usuario']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="editar_turma.php?id=<?php echo $dados['id_turma']; ?>"><i class="fa fa-edit"></i></a>
                                    
                                        <a class="btn btn-default" href="deletar_turma.php?id=<?php echo $dados['id_turma']; ?>"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile; 
                                        //Paginção - Somar a quantidade de usuários
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
                            <li><?PHP echo "<a href='registar_turma.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='registar_turma.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='registar_turma.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='registar_turma.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='registar_turma.php?pagina=$quantidade_pg'>»</a>"?></li>
                        </ul>
                    </div> 
              </div>
            </section>
            <!--pagination end-->
                     
                </div> 
            </section>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
    
     <!-- /. WRAPPER  -->
     <?php 
       require_once 'menu_rod/rod_admin.php';
    ?>