
        <?php 
        include_once 'menu_rod/menu_prof.php';

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

                        //verificar id
                        if (isset($_GET['id'])& isset($_GET['cl'])& isset($_GET['tur']) & isset($_GET['pr'])) {
                                        
                            $id_matricula = mysqli_escape_string($connect, $_GET['id']);
                            $classe = mysqli_escape_string($connect, $_GET['cl']);
                            $turma = mysqli_escape_string($connect, $_GET['tur']);
                            $periodo = mysqli_escape_string($connect, $_GET['pr']);
                                
                            $sql = "SELECT * FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao 
                            join usuario u on i.id_usuario = u.id_usuario join turma t on m.id_turma = t.id_turma join classe c on t.classe = c.id_classe
                            Where num_matricula = '$id_matricula' and nome_classe = '$classe' and nome_turma = '$turma' and t.periodo = '$periodo' ";
                            $resultado = mysqli_query($connect, $sql);
                            $dados = mysqli_fetch_array($resultado);

                            $num_matricula = $dados['num_matricula'];     
                            $nome = $dados['nome_usuario'];
                            $classe =  $dados['nome_classe'];
                            $turma =  $dados['nome_turma'];
                            
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
										<option value="<?php echo $dados['id_matricula']; ?>" <?php if ($dados['nome_usuario']==$nome) {
                                                echo "Selected";
                                            } ?>><?php echo $dados['nome_usuario']; ?></option>
                                       
										<?php } ?>
                                        </select>
                                    </div>
                                </div> 
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
										<option value="<?php echo $dados['id_classe']; ?>" <?php if ($dados['nome_classe'] == $classe) {
                                                echo "Selected";
                                            } ?>><?php echo $dados['nome_classe']; ?></option>
                                       
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

										?>
										<option value="<?php echo $dados['id_turma']; ?>" <?php if ($dados['nome_turma'] ==$turma) {
                                                echo "Selected";
                                            } ?>><?php echo $dados['nome_turma']; ?></option>
                                       
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
											$sql = "SELECT distinct * FROM disciplina where id_professor='$id_professor' order by nome_disc ";
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
                                            <option >--Selecione--</option>
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
                                    <th>Discícplina</th>
                                    <th>AF</th>
                                    <th>Trim</th>
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
                                
                                $sql = "SELECT distinct m.num_matricula,u.nome_usuario,m.ano_academico,t.nome_turma,c.nome_classe, d.nome_disc,n.exame,n.recurso, n.1p,n.2p,n.ac,n.trimestre 
                                FROM nota n inner join disciplina d on n.id_disciplina = d.id_disciplina 
                                JOIN matricula m on n.id_matricula = m.id_matricula join turma t on m.id_turma = t.id_turma  
                                join classe c on t.classe = c.id_classe join inscricao i on m.id_inscricao = i.id_inscricao 
                                join usuario u on i.id_usuario = u.id_usuario where num_matricula ='$num_matricula'and nome_turma='$turma' and nome_classe= '$classe'order by nome_usuario";
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
                            <?php endwhile;?>
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
        include_once 'menu_rod/rod_prof.php';
        ?>