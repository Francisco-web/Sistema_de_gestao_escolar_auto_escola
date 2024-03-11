
           <?php 
            include_once 'menu_rod/menu_admin.php';
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Adiconar Horário</h2>                                   
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
                        <form action="plano.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discíplina/ Professor</label>
                                        <select name="disciplina" id="disciplina" class="form-control">
                                            <option value="">-- Selecione --</option> 
                                            <?php 
											$sql = "SELECT distinct nome_disc,id_disciplina,nome_usuario FROM disciplina d inner join professor p on d.id_professor = p.id_professor join usuario u on p.id_usuario = u.id_usuario order by nome_disc";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_disciplina']; ?>"><?php echo $dados['nome_disc']; ?>______<?php echo $dados['nome_usuario']; ?></option>
										<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <input type="text" name="hora" autocomplete="on" class="form-control" placeholder="Hora:Min - Hora:Min" />
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dias de Semana</label>
                                        <select name="d_semana[]" id="d_semana" class="form-control" multiple= "multiple">
										    <option value="Segunda-Feira">Segunda-Feira</option>
                                            <option value="Terça-Feira">Terça-Feira</option>
                                            <option value="Quarta-Feira">Quarta-Feira</option>    
                                            <option value="Quinta-Feira">Quinta-Feira</option>
                                            <option value="Sexta-Feira">Sexta-Feira</option>    
                                        </select>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turma</label>
                                        <select name="turma" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <?php 
											$sql = "SELECT distinct nome_turma, id_turma,nome_classe,periodo FROM turma t inner join classe c on t.classe=c.id_classe
                                            order by nome_turma ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['id_turma']; ?>"><?php echo $dados['nome_turma']; ?>- <?php echo $dados['nome_classe']; ?>- <?php echo $dados['periodo']; ?></option>
										<?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                
                                    <button type="submit" name="btn-plano" class="btn btn-primary"><i class="fa fa-save"></i> Adicionar</button> 
                                    <a href="list_plano.php" class="btn btn-default"><i class="fa fa-undo"></i> cancelar</a> 
                                </div>
                            </div> 
                        </form>
                    </div> 
                    <br>    
                        <section class="panel">
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th>Nº</th>
                                <th>Disciplina</th>
                                <th>Classe</th>
                                <th>Turma</th>
                                <th>Duração</th>
                                <th>Turno</th>
                                <th>Ano</th>
                                <th><i class="fa fa-cogs"></i> Acções</th>
                                
                            </tr>
                            <?php
                            $contador = 1;
                            $sql = "SELECT p.id_plano,t.nome_turma, d.nome_disc,c.nome_classe,p.hora,periodo,p.ano_academico FROM plano_curricular p 
                            inner join disciplina d on p.id_disciplina = d.id_disciplina join turma t on t.id_turma =p.id_turma 
                            join classe c on t.classe = c.id_classe  ORDER BY nome_disc ";
                            $resultado = mysqli_query($connect, $sql);
                            while($dados = mysqli_fetch_array($resultado)):
                            ?>
                            <tr>
                                <td><?php echo $contador++; ?></td>
                                <td><?php echo $dados['nome_disc']; ?></td>
                                <td><?php echo $dados['nome_classe']; ?></td>
                                <td><?php echo $dados['nome_turma']; ?></td>
                                <td><?php echo $dados['hora']; ?></td>
                                <td><?php echo $dados['periodo']; ?></td>
                                <td><?php echo $dados['ano_academico']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="editar_plano.php?id=<?php echo $dados['id_plano']; ?>"><i class="fa fa-edit"></i></a>
                                    
                                        <a class="btn btn-default" href="deletar_plano.php?id=<?php echo $dados['id_plano']; ?>"><i class="fa fa-trash-o"></i></a>
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
     <?php 
       require_once 'menu_rod/rod_admin.php';
    ?>