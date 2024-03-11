
           <?php 
            include_once 'menu_rod/menu_sec.php';

            //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                    
            //Setar a quantidade de itens por pagina
            $qnt_result_pg = 6;
                
            //calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
            $id_sec = $_SESSION['UsuarioID'];
            
            ?>     
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Cadastro de Pagamento</h2> 
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
                        <form action="propina.php" method="POST">
                            <div class="row">
                                  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo de Pagamento</label>
                                        <select name="pagamento" id="pagamento" class="form-control" >
                                            <option >-- Selecione --</option>
                                            <option value="Cartão de Estudante">Cartão de Estudante</option>
                                            <option value="Confirmação">Confirmação</option>
                                            <option value="Certificado">Certificado</option>
                                            <option value="Declaração">Declaração</option>
                                            <option value="Exame">Exame</option>
                                            <option value="Matrícula">Matrícula</option>
                                            <option value="Propina">Propina</option>
                                            <option value="Transferência Interna">Transferência Interna</option>
                                            <option value="Transferência Externa">Transferência Externa</option>
                                            <option value="Recurso">Recurso</option>
                                        </select>
                                            
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input type="text" name="valor"  class="form-control" autocomplete="on" />
                                            
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select name="classe" id="classe" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <?php 
											$sql = "SELECT * FROM classe";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_classe']; ?>"><?php echo $dados['nome_classe']; ?></option>
										<?php } ?>
                                        </select>
                                    </div>
                                
                                    <div class="form-group"> 
                                  
                                  <button type="submit" name="btn-pagamento" class="btn btn-primary"><i class="fa fa-save"></i> cadastrar</button> 
                                  <a type="btn" href="list_pag.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>              
                                
                                </div>

                            </div> 
                        </form>
                    </div> 
                    <br>    
                    <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>Pagamento</th>     
                                    <th>Classe </th>
                                    <th>Valor</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>                
                                </tr>
                                <?php
                               
                                $sql = "SELECT distinct id_pag,tipo_p,nome_classe,valor FROM pagamento p inner join classe c on p.id_classe = c.id_classe order by nome_classe ASC LIMIT  $inicio, $qnt_result_pg";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                ?>
                                <tr>
	
                                    <td><?php echo $dados['tipo_p']; ?></td>
                                    <td><?php echo $dados['nome_classe']; ?></td>
                                    <td><?php echo $dados['valor']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="editar_propina.php?id=<?php echo $dados['id_pag']; ?>&tp=<?php echo $dados['tipo_p']; ?>"><i class="fa fa-edit"></i></a>
                                    
                                        <a class="btn btn-default" href="deletar_propina.php?id=<?php echo $dados['id_pag']; ?>&tp=<?php echo $dados['tipo_p']; ?>"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    </td>
                                    
                                </tr>
                                <?php endwhile; 
                                    //Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(id_pag) AS num_result FROM pagamento";
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
                            <li><?PHP echo "<a href='add_propina.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='add_propina.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='add_propina.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='add_propina.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                                            <li><?PHP echo "<a href='add_propina.php?pagina=$quantidade_pg'>»</a>"?></li>
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
            include_once 'menu_rod/rod_sec.php';
            ?> 