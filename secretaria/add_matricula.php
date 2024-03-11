
            <?php 
                include_once 'menu_rod/menu_sec.php';

                $sql = "SELECT num_inscricao,nome_usuario,id_inscricao FROM inscricao i inner join usuario u on i.id_usuario = u.id_usuario
                 order by id_inscricao Desc  ";
                $resultado = mysqli_query($connect, $sql);
                $dados = mysqli_fetch_array($resultado);
                $aluno=$dados['nome_usuario'];
                $inscricao=$dados['num_inscricao'];
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
                     <h2>Nova Matrícula</h2> 
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
                        <form action="matricula.php" method="POST">
                            <div class="row">
                                
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Matrícula</label>
                                        <select name="num_matricula" class="form-control">
                                        <?php 
											$sql = "SELECT distinct num_inscricao FROM inscricao i inner join usuario u on i.id_usuario = u.id_usuario where tipo= 'Aluno' ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
                                        <option value="<?php echo $dados['num_inscricao']; ?>" <?php if ($dados['num_inscricao']==$inscricao) {
                                                echo "Selected";
                                            } ?>><?php echo $dados['num_inscricao']; ?></option>
										<?php } ?>
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Aluno</label>
                                        <select name="aluno" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <?php 
											$sql = "SELECT id_inscricao, nome_usuario,num_inscricao FROM inscricao i inner join usuario u on i.id_usuario = u.id_usuario where tipo= 'Aluno'";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
                                        <option value="<?php echo $dados['id_inscricao']; ?>" <?php if ($dados['nome_usuario']==$aluno) {
                                                echo "Selected";
                                            } ?>><?php echo $dados['nome_usuario']; ?></option>
                                       
										<?php } ?>
                                        </select> 
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo de Matrícula</label>
                                        <select class="form-control" name="tipo_matricula" id="">
                                            <option value="">-- Selecione --</option>
                                            <option value="Nova">Nova</option>
                                            <option value="Confirmação">Confirmação</option>
                                            <option value="Transferência Interna">Transferência Interna</option>
                                            <option value="Transferência Externa">Transferência Externa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe/ Turma/ Periodo</label>
                                        <select name="turma" id="turma" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <?php 
											$sql = "SELECT distinct nome_turma, id_turma, nome_classe, periodo FROM turma t inner join classe c on t.classe=c.id_classe order by nome_classe";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_turma']; ?>"><?php echo $dados['nome_classe']; ?>___<?php echo $dados['nome_turma']; ?>___<?php echo $dados['periodo']; ?></option>
										<?php } ?>
                                        </select>
                                    </div>
                                </div>

                               
                               <div class="col-md-6">   
                                    <button type="submit" name="btn-matricula" class="btn btn-primary"><i class="fa fa-save"></i> cadastrar</button> 
                               </div>

                            </div> 
                        </form>
                    </div> 
                    <br>    
                    <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>Matrícula Nº</th>
                                    <th>Aluno</th>
                                    <th>Matrícula</th>
                                    <th>Turma</th>
                                    <th>Periodo</th>
                                    <th>Classe</th>
                                    <th>Data Matrícula</th>
                                    <th>Ano Acad</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                $sql = "SELECT i.num_inscricao,m.id_matricula,m.num_matricula,u.nome_usuario,m.tipo,t.nome_turma, c.nome_classe,
                                m.data_matricula,t.periodo,t.num_sala,m.ano_academico FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao join usuario u on i.id_usuario = u.id_usuario 
                                join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe order by nome_usuario LIMIT  $inicio, $qnt_result_pg";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                ?>
                                <tr>
                                    <td><?php echo $dados['num_matricula']; ?></td>
                                    <td><?php echo $dados['nome_usuario']; ?></td>
                                    <td><?php echo $dados['tipo']; ?></td>
                                    <td><?php echo $dados['nome_turma']; ?></td>
                                    <td><?php echo $dados['periodo']; ?></td>
                                    <td><?php echo $dados['nome_classe']; ?></td>
                                    <td><?php echo $dados['data_matricula']; ?></td>
                                    <td><?php echo $dados['ano_academico']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="vs_matricula.php?id=<?php echo $dados['id_matricula']; ?>&matricula=<?php echo $dados['num_matricula']; ?>&inscricao=<?php echo $dados['num_inscricao']; ?>"><i class="fa fa-search-plus"></i></a>
                                        <a class="btn btn-default" href="editar_matricula.php?id=<?php echo $dados['id_matricula']; ?>"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-default" href="deletar_matricula.php?id=<?php echo $dados['id_matricula']; ?>&matricula=<?php echo $dados['num_matricula']; ?>"><i class="fa fa-trash-o"></i></a>
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
                            <li><?PHP echo "<a href='add_matricula.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='add_matricula.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='add_matricula.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='add_matricula.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='add_matricula.php?pagina=$quantidade_pg'>»</a>"?></li>
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