
        <?php 
        include_once 'menu_rod/menu_prof.php';
         //Receber o número da página
         $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
         $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                 
         //Setar a quantidade de itens por pagina
         $qnt_result_pg = 3;
             
         //calcular o inicio visualização
         $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Adicionar Avaliação</h2> 
                    
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
                        <form action="avaliacao.php" method="POST">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select name="classe" id="classe" class="form-control">
                                        <option value="">--Selecione--</option>
                                        <?php 
											$sql = "SELECT distinct * FROM turma t inner join classe c on t.classe = c.id_classe where id_professor='$id_professor'order by nome_classe";
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
                                        <label>Turma</label>
                                        <select name="turma" id="turma" class="form-control">
                                            <option value="">--Selecione--</option>
                                            <?php 
											$sql = "SELECT distinct * FROM turma where id_professor ='$id_professor'order by nome_turma ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){
                                                $turma = $dados['id_turma'];
										?>
										<option value="<?php echo $dados['id_turma']; ?>" ><?php echo $dados['nome_turma']; ?></option>
                                       
										<?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Aluno</label>
                                        <select name="aluno" id="" class="form-control">
                                        <option value="">--Selecione--</option>
                                        <?php 
											$sql = "SELECT * FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao join usuario u on i.id_usuario = u.id_usuario where id_turma = '$turma'";
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
                                        <label>Discíplina</label>
                                        <select name="disciplina" id="" class="form-control">
                                        <option value="">--Selecione--</option>
                                        <?php 
											$sql = "SELECT distinct * FROM disciplina where id_professor ='$id_professor' order by nome_disc ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_disciplina']; ?>"><?php echo $dados['nome_disc']; ?></option>
                                       
										<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Trimestre</label>
                                       <select name="trimestre" id="" class="form-control">
                                            <option value="">--Selecione--</option>
                                            <option value="Iº">Iº</option>
                                            <option value="IIº">IIº</option>
                                            <option value="IIIº">IIIº</option>
                                       </select>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>1º Prova</label>
                                        <input type="text" name="p1"  class="form-control"  />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>2º Prova</label>
                                        <input type="text" name="p2"  class="form-control"  />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Avaliação Contínua</label>
                                        <input type="text" name="ac"  class="form-control"  />
                                        
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Exame</label>
                                        <input type="text" name="exame"  class="form-control"/>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Recurso</label>
                                        <input type="text" name="recurso"  class="form-control"  />
                                        
                                    </div>
                                </div>    
                               
                                <div class="col-md-6">
                                    <button type="submit" name="btn-lancar" class="btn btn-primary"><i class="fa fa-save"></i> Lançar Nota</button> 
                                    <a href="list_aval.php" class="btn btn-default "><i class="fa fa-undo"></i> Cancelar</a>                       

                                </div>
                                
                            </div>
                        </form>
                        <hr>   
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                    <th>Nome</th>
                                    <th>Classe</th>
                                    <th>T</th>
                                    <th>P</th>
                                    <th>Disc</th>
                                    <th>AF</th>
                                    <th>T</th>
                                    <th>1ª P</th> 
                                    <th>2ª P</th>
                                    <th>Ac</th>
                                    <th>E</th>
                                    <th>R</th>
                                    <th>M</th>
                                    <th>Ap</th>
                                   
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                
                                $sql = "SELECT * FROM nota n inner join disciplina d on n.id_disciplina = d.id_disciplina 
                                JOIN matricula m on n.id_matricula = m.id_matricula join turma t on m.id_turma = t.id_turma  
                                join classe c on t.classe = c.id_classe join inscricao i on m.id_inscricao = i.id_inscricao 
                                join usuario u on i.id_usuario = u.id_usuario where t.id_professor = $id_professor order by nome_usuario LIMIT  $inicio, $qnt_result_pg ";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                    $nota1= $dados['1p'];
                                    $nota2= $dados['2p'];
                                    $media = $nota1 + $nota2;
                                    $media = $media/2;
                                
                                ?>
                                <tr>
                                    <td><?php echo $dados['nome_usuario']; ?></td>
                                    <td><?php echo $dados['codigo_classe']; ?></td>
                                    <td><?php echo $dados['nome_turma']; ?></td>
                                    <td><?php echo $dados['periodo']; ?></td>
                                    <td><?php echo $dados['codigo_disc']; ?></td>
                                    <td><?php echo $dados['ano_academico']; ?></td>
                                    <td><?php echo $dados['trimestre']; ?></td> 
                                    <td><?php echo  $dados['1p']; ?></td>
                                    <td><?php echo $dados['2p']; ?></td>
                                    <td><?php echo $dados['ac']; ?></td>
                                    <td><?php echo $dados['exame'] ?></td>
                                    <td><?php echo $dados['recurso']; ?></td>
                                    <td><?php echo $media ?></td>
                                    <td><?php echo  $media >= 05 ? "Bom" : "Mau";?></td>
                                    <td>
                                <div class="btn-group">
                                    <a class="btn btn-default" href="editar_aval.php?id=<?php echo $dados['num_matricula']; ?>&cl=<?php echo $dados['nome_classe']; ?>&tur=<?php echo $dados['nome_turma']; ?>&pr=<?php echo $dados['periodo']; ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default" href="deletar_aval.php?id=<?php echo $dados['num_matricula']; ?>&cl=<?php echo $dados['nome_classe']; ?>&tur=<?php echo $dados['nome_turma']; ?>&pr=<?php echo $dados['periodo']; ?>"><i class="fa fa-trash-o"></i></a>
                                </div>
                                </td>
                            </tr>
                            <?php endwhile;//Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(id_nota) AS num_result FROM nota n inner join disciplina d on n.id_disciplina = d.id_disciplina 
                                    JOIN matricula m on n.id_matricula = m.id_matricula join turma t on m.id_turma = t.id_turma  
                                    join classe c on t.classe = c.id_classe join inscricao i on m.id_inscricao = i.id_inscricao 
                                    join usuario u on i.id_usuario = u.id_usuario where t.id_professor = $id_professor ";
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
                            <li><?PHP echo "<a href='add_aval.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='add_aval.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='registar_disciplina.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='add_aval.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='add_aval.php?pagina=$quantidade_pg'>»</a>"?></li>
                        </ul>
                    </div> 
              </div>
            </section>
            <!--pagination end-->
                                
                    </div> 
                        
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <?php 
        include_once 'menu_rod/rod_prof.php';
        ?>