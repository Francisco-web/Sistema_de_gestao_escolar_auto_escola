
        <?php 
        include_once 'menu_rod/menu_admin.php';

        ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Adicionar Nota</h2> 
                    
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
                                        <label>Aluno</label>
                                        <select name="aluno" id="" class="form-control">
                                        <option value="">--Selecione--</option>
                                        <?php 
											$sql = "SELECT * FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao join usuario u on i.id_usuario = u.id_usuario ";
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
                                        <label>Classe</label>
                                        <select name="classe" id="" class="form-control">
                                        <option value="">--Selecione--</option>
                                        <?php 
											$sql = "SELECT distinct * FROM classe order by nome_classe ";
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
                                        <select name="turma" id="" class="form-control">
                                            <option value="">--Selecione--</option>
                                            <?php 
											$sql = "SELECT distinct * FROM turma order by nome_turma ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_turma']; ?>"><?php echo $dados['nome_turma']; ?></option>
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
											$sql = "SELECT distinct * FROM disciplina order by nome_disc ";
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
                                        <label>Ano Academico</label>
                                        <input type="text" name="ano_academico"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Trimestre</label>
                                        <input type="text" name="trimestre"  class="form-control" />
                                       
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>1º Prova</label>
                                        <input type="text" name="p1"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>2º Prova</label>
                                        <input type="text" name="p2"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Avaliação Contínua</label>
                                        <input type="text" name="ac"  class="form-control" />
                                        
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Exame</label>
                                        <input type="text" name="exame"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Recurso</label>
                                        <input type="text" name="recurso"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Média</label>
                                        <input type="text" name="media"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Resultado</label>
                                        <input type="text" name="resultado"  class="form-control" />
                                        
                                    </div>
                                
                                    <button type="submit" name="btn-lancar" class="btn btn-primary"><i class="fa fa-save"></i> Lançar Nota</button> 
                                    <a href="list_aval.php" class="btn btn-default "><i class="fa fa-undo"></i> Cancelar</a>                       

                                </div>
                                
                            </div>
                        </form>
                        <hr>   
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                    <th>Matrícula</th>
                                    <th>Nome</th>
                                    <th>Discíplina</th>
                                    <th>1ª P</th>
                                    <th>2ª P</th>
                                    <th>AC</th>
                                    <th>Media</th>
                                    <th>Resultado</th>
                                    <th>Ano Academico </th>
                                   
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                    
                                $sql = "SELECT distinct m.num_matricula,u.nome_usuario,n.ano_academico,t.nome_turma,c.nome_classe, d.nome_disc, n.1p,n.2p,n.ac 
                                FROM nota n inner join disciplina d on n.id_disciplina = d.id_disciplina 
                                join turma t on n.id_turma = t.id_turma JOIN matricula m on n.id_matricula = m.id_matricula 
                                join classe c on m.id_classe = c.id_classe join inscricao i on m.id_inscricao = i.id_inscricao 
                                join professor p on d.id_professor = p.id_professor join usuario u on i.id_usuario = u.id_usuario order by nome_usuario";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                    $nota1= $dados['1p'];
                                    $nota2= $dados['2p'];
                                    $media = $nota1 + $nota2;
                                    $media = $media/2; 
                                ?>
                                <tr>
                                    <td><?php echo $dados['num_matricula']; ?></td>
                                    <td><?php echo $dados['nome_usuario']; ?></td>
                                    <td><?php echo $dados['nome_disc']; ?></td>
                                    <td><?php echo $dados['1p']; ?></td>
                                    <td><?php echo $dados['2p']; ?></td>
                                    <td><?php echo $dados['ac']; ?></td>
                                    <td><?php echo $media ?></td>
                                    <td><?php echo  $media >= 10 ? "Aprovado/a " : "Reprovado/a ";?></td>
                                    <td><?php echo $dados['ano_academico']; ?></td>
                                    <td>
                                <div class="btn-group">
                                    <a class="btn btn-default" href="editar_turma.php?id=<?php echo $dados['id_turma']; ?>"><i class="fa fa-search-plus"></i></a>
                                    <a class="btn btn-default" href="editar_turma.php?id=<?php echo $dados['id_turma']; ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default" href="delectar_turma.php?id=<?php echo $dados['id_turma']; ?>"><i class="fa fa-trash-o"></i></a>
                                </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            </tbody>
                    </table>

                    </div> 
                        
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <?php 
        include_once 'menu_rod/rod_admin.php';
        ?>