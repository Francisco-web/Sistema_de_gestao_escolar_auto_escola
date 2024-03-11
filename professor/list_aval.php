<?php 
        include_once 'menu_rod/menu_prof.php';

        $sql = "SELECT  * FROM turma t inner join classe c on t.classe = c.id_classe where id_professor = '$id_professor'order by nome_classe ";
        $resultado = mysqli_query($connect, $sql);
        $linha = mysqli_fetch_array($resultado);
        $turma =['nome_turma']; 
        $classe =['nome_classe'];
        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Consultar Avaliação</h2> 
                     <a class="btn btn-primary" href="add_aval.php"><i class="fa fa-plus"></i> Adicionar Nova</a> 
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
                                            <label>Aluno</label>
                                            <input type="text" name="nome"  class="form-control" />
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Classe</label>
                                            <select name="classe" id="classe" class="form-control">
                                               <option value="">-- Selecione --</option> 
                                                <option value="1c">1ª Classe</option>
                                                <option value="2c">2ª Classe</option>
                                                <option value="3c">3ª Classe</option>
                                                <option value="4c">4ª Classe</option>
                                                <option value="5c">5ª Classe</option>
                                                <option value="6c">6ª Classe</option>
                                                <option value="7c">7ª Classe</option>
                                                <option value="8c">8ª Classe</option>
                                                <option value="9c">9ª Classe</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Turma</label>
                                            <input type="text" name="nome_turma"  class="form-control" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Discíplina</label>
                                            <input type="text" name="nome"  class="form-control" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ano Academico</label>
                                            <input type="text" name="nome"  class="form-control" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Trimestre</label>
                                            <select name="trimestre" id="trimestre" class="form-control">
                                                <option value="">--Selecione--</option>
                                                <option value="1T">1º Trimestre</option>
                                                <option value="2T">2º Trimestre</option>
                                                <option value="3T">3º Trimestre</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">                  
                                    <a href="list_aval.php" class="btn btn-primary"><i class="fa fa-list"></i> Todos</a> 
                                    <input type="submit" value="Pesquisar" class="btn btn-primary"> 
                                </div>
                                
                            </div>
    
                             
                        </form>
                        <br>    
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                    <th>Nome</th>
                                    <th>Discícplina</th>
                                    <th>AF</th>
                                    <th>Trim</th>
                                    <th>1ª P</th> 
                                    <th>2ª P</th>
                                    <th>Classe</th>
                                    <th>Turma</th>
                                    <th>Periodo</th>
                                    
                                   
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                    
                                $sql = "SELECT distinct num_matricula,nome_usuario,nome_disc,ano_academico,trimestre,1p,2p,nome_classe,nome_turma,periodo FROM nota n inner join disciplina d on n.id_disciplina = d.id_disciplina 
                                JOIN matricula m on n.id_matricula = m.id_matricula join turma t on m.id_turma = t.id_turma  
                                join classe c on t.classe = c.id_classe join inscricao i on m.id_inscricao = i.id_inscricao 
                                join usuario u on i.id_usuario = u.id_usuario where d.id_professor='$id_professor' order by nome_usuario";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                    $nota1= $dados['1p'];
                                    $nota2= $dados['2p'];
                                    $media = $nota1 + $nota2;
                                    $media = $media/2; 
                                ?>
                                <tr>
                                    <td><?php echo $dados['nome_usuario']; ?></td>
                                    <td><?php echo $dados['nome_disc']; ?></td>
                                    <td><?php echo $dados['ano_academico']; ?></td>
                                    <td><?php echo $dados['trimestre']; ?></td> 
                                    <td><?php echo  $dados['1p']; ?></td>
                                    <td><?php echo  $dados['2p']; ?></td>
                                    <td><?php echo $dados['nome_classe']; ?></td>
                                    <td><?php echo $dados['nome_turma']; ?></td>
                                    <td><?php echo $dados['periodo'] ?></td>
                                    <td>
                                <div class="btn-group">
                                    <a class="btn btn-default" href="add_aval_al.php?id=<?php echo $dados['num_matricula']; ?>&cl=<?php echo $dados['nome_classe']; ?>&tur=<?php echo $dados['nome_turma']; ?>&pr=<?php echo $dados['periodo']; ?>"><i class="fa fa-plus"></i></a>
                                    <a class="btn btn-default" href="vs_aval.php?id=<?php echo $dados['num_matricula']; ?>&cl=<?php echo $dados['nome_classe']; ?>&tur=<?php echo $dados['nome_turma']; ?>&pr=<?php echo $dados['periodo']; ?>"><i class="fa fa-search-plus"></i></a>
                                    <a class="btn btn-default" href="editar_aval.php?id=<?php echo $dados['num_matricula']; ?>&cl=<?php echo $dados['nome_classe']; ?>&tur=<?php echo $dados['nome_turma']; ?>&pr=<?php echo $dados['periodo']; ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default" href="deletar_aval.php?id=<?php echo $dados['num_matricula']; ?>&cl=<?php echo $dados['nome_classe']; ?>&tur=<?php echo $dados['nome_turma']; ?>&pr=<?php echo $dados['periodo']; ?>"><i class="fa fa-trash-o"></i></a>
                                </div>
                                </td>
                            </tr>
                            </tbody>
                            <?php endwhile; ?>

                    </table>

                    </div> 
                        
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
        <?php 
            include_once 'menu_rod/rod_prof.php';
        ?>