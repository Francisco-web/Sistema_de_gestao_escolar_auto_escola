
           <?php 
            include_once 'menu_rod/menu_admin.php';

        //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                
        //Setar a quantidade de itens por pagina
        $qnt_result_pg = 7;
            
        //calcular o inicio visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Adicionar Disciplina</h2>   
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
                        <form action="disciplina.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Codigo</label>
                                        <input type="text" name="codigo" autocomplete="on" class="form-control" />
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discíplina</label>
                                        <input type="text" name="disciplina" autocomplete="on" class="form-control" />
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea class="form-control" name="descricao" id="descricao" cols="10" rows="4" autocomplete="off"></textarea>
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Professor da Discíplina</label>
                                        <select name="professor" id="professor" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <?php 
											$sql = "SELECT distinct nome_usuario, id_professor FROM professor p inner join usuario u on p.id_usuario = u.id_usuario 
                                            order by nome_usuario ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_professor']; ?>"><?php echo $dados['nome_usuario']; ?></option>
										<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="btn-disciplina" class="btn btn-primary"><i class="fa fa-save"></i> Adicionar</button> 
                                    <a class="btn btn-default" href="list_disc.php"><i class="fa fa-undo"></i> Cancelar</a>            
                                </div>
                            </div> 
                        </form>
                    </div> 
                    <br>    
                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th> Codigo</th>
                                    <th> Disciplina</th>
                                    <th> Descrição</th>
                                    <th> Professor</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                $sql = "SELECT d.id_disciplina,d.codigo_disc,d.nome_disc,d.descricao,u.nome_usuario FROM disciplina d 
                                inner join professor p on d.id_professor = p.id_professor join usuario u on p.id_usuario = u.id_usuario order by nome_disc LIMIT  $inicio, $qnt_result_pg ";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                ?>
                                <tr>
                                    <td><?php echo $dados['codigo_disc']; ?></td>
                                    <td><?php echo $dados['nome_disc']; ?></td>
                                    <td><?php echo $dados['descricao']; ?></td>
                                    <td><?php echo $dados['nome_usuario']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="editar_disc.php?id=<?php echo $dados['id_disciplina']; ?>"><i class="fa fa-edit"></i></a>
                                    
                                        <a class="btn btn-default" href="deletar_disc.php?id=<?php echo $dados['id_disciplina']; ?>"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile;//Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(id_disciplina) AS num_result FROM disciplina";
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
                            <li><?PHP echo "<a href='registar_discplina.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='registar_disciplina.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='registar_disciplina.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='registar_disciplina.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='registar_disciplina.php?pagina=$quantidade_pg'>»</a>"?></li>
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
            include_once 'menu_rod/rod_admin.php'
            ?>