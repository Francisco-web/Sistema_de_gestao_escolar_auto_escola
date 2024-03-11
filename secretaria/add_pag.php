
           <?php 
            include_once 'menu_rod/menu_sec.php';

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
                     <h2>Novo Pagamento</h2> 
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

                        <form action="pagamento.php" method="POST">
                            <div class="row">
                            <?php 
											$sql1 = "SELECT * FROM `secretaria` WHERE id_usuario = '$id'";
											$resultado = mysqli_query($connect, $sql1);
											$dados = mysqli_fetch_array($resultado);

										?>
                                    <input type="hidden" name="sec" value="<?php echo $dados['id_secretaria']; ?>" >
										
										
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Aluno</label>
                                        <select name="matricula" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <?php 
											$sql = "SELECT * FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao 
                                            JOIN usuario u on i.id_usuario = u.id_usuario order by nome_usuario";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_matricula']; ?>"><?php echo $dados['nome_usuario']; ?></option>
										<?php } ?>
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pagamento</label>
                                        <select name="id_pag" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <?php 
											$sql = "SELECT * FROM pagamento p inner join classe c on p.id_classe = c.id_classe  order by nome_classe ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_pag']; ?>"><?php echo $dados['tipo_p']; ?> - <?php echo $dados['nome_classe']; ?>/ <?php echo $dados['valor']; ?></option>
										<?php } ?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mês a Pagar</label>
                                        <select name="mes[]" id="" class="form-control" multiple= "multiple">
                                            <option >-- Seleicone --</option>
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
                                        <label>Valor a Pagar</label>
                                        <input type="text" name="valor"  class="form-control" autocomplete="off" />
                                            
                                    </div>
                                </div>   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Multa</label>
                                        <input type="text" name="multa"  class="form-control" autocomplete="off"/>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Desconto</label>
                                        <input type="text" name="desconto"  class="form-control" autocomplete="off" />
                                            
                                    </div>
                                  
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
                                    <th>Matrícula Nº</th>     
                                    <th>Nome </th>
                                    <th>Classe</th>
                                    <th>Mês Pago</th>
                                    <th>Propina</th>
                                    
                                </tr>
                                <?php
                                $contador = 1;
                                $sql = "SELECT distinct num_matricula,nome_usuario,nome_classe,mes_pag,valor_pag FROM aluno_pag a 
                                inner join matricula m on a.id_matricula = m.id_matricula join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe 
                                join pagamento p on a.id_pag = p.id_pag join inscricao i on m.id_inscricao = i.id_inscricao 
                                JOIN usuario u on i.id_usuario = u.id_usuario order by nome_usuario LIMIT  $inicio, $qnt_result_pg";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                ?>
                                <tr>
                                    <td><?php echo $dados['num_matricula']; ?></td>
                                    <td><?php echo $dados['nome_usuario']; ?></td>
                                    <td><?php echo $dados['nome_classe']; ?></td>
                                    <td><?php echo $dados['mes_pag']; ?></td>
                                    <td><?php echo $dados['valor_pag']; ?></td>
                                    
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
                           <!--pagination start-->
                            <section class="panel">
                                <div class="panel-body">
                                    <div>
                                        <ul class="pagination pagination-sm pull-right">
                                        <?php	//selecionador de página a visualizar
                                                    //Limitar os link antes depois
                        
                                                        $max_links = 3; ?>
                            <li><?PHP echo "<a href='add_pag.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='add_pag.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='add_pag.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='add_pag.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                                            <li><?PHP echo "<a href='add_pag.php?pagina=$quantidade_pg'>»</a>"?></li>
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