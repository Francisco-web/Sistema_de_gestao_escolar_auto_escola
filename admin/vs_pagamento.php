
        <?php 
        include_once 'menu_rod/menu_admin.php'
        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                        <h2>Visualizar Pagamento</h2> 
                            <br>
                            <?php
                                if (isset($_GET['al'])) {
                                    $id = mysqli_escape_string($connect, $_GET['al']);
                                    $doc_usuario = mysqli_escape_string($connect, $_GET['us']);
                                    $matricula = mysqli_escape_string($connect, $_GET['mt']);
                                    $turma = mysqli_escape_string($connect, $_GET['tm']);
                                    $classe = mysqli_escape_string($connect, $_GET['cl']);
                                }
                                $sql = "SELECT distinct * FROM aluno_pag a 
                                        inner join matricula m on a.id_matricula = m.id_matricula join turma t on m.id_turma=t.id_turma join classe c on t.classe = c.id_classe 
                                        join pagamento p on a.id_pag = p.id_pag join inscricao i on m.id_inscricao = i.id_inscricao 
                                        JOIN usuario u on i.id_usuario = u.id_usuario WHERE id_aluno_pag = '$id' and num_documento = '$doc_usuario' and num_matricula = '$matricula' and nome_turma = '$turma' and nome_classe = '$classe'";
                                        
                                $resultado = mysqli_query($connect, $sql);
                                $exibirRegistros = mysqli_fetch_array($resultado);
        
                            ?>
                        
                        <div class="row">
                        
                            <h3>Dados Academico (<?php echo  $exibirRegistros['nome_usuario'] ?>)</h3>
                            <div class="panel panel-primary">
                            </div><br>  
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Matrícula Nº: </label>
                                     <?php echo  $exibirRegistros['num_matricula'] ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ano Academico: </label>
                                    <?php echo $exibirRegistros['ano_academico'] ?>
                                </div>
                            </div>  
                                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Turma: </label>
                                    <?php echo  $exibirRegistros['nome_turma'] ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Classe: </label>
                                    <?php echo  $exibirRegistros['nome_classe'] ?>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Periodo: </label>
                                    <?php echo  $exibirRegistros['periodo'] ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sala Nº: </label>
                                    <?php echo  $exibirRegistros['num_sala'] ?>
                                </div>
                            </div>  
                            
                            <h3>Dados De Pagamento</h3>
                            <div class="panel panel-primary">
                            </div>                      
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>Recibo Nº</th>
                                    <th>Mês</th>
                                    <th>Montante</th>
                                    <th>Modo Pag</th>
                                    <th>Multa</th>
                                    <th>Desconto</th>
                                    <th>Pagamento</th>
                                    <th>Data & Hora</th>
                                </tr>
                               
                                <tr>
                                    
                                    <td><?php echo $exibirRegistros['num_recibo']; ?></td>
                                    <td><?php echo $exibirRegistros['mes_pag']; ?></td>
                                    <td><?php echo $exibirRegistros['valor_pag']; ?></td>
                                    <td><?php echo $exibirRegistros['forma_pag']; ?></td>
                                    <td><?php echo $exibirRegistros['multa']; ?></td>
                                    <td><?php echo $exibirRegistros['desconto']; ?></td>
                                    <td><?php echo $exibirRegistros['tipo_p']; ?></td>
                                    <td><?php echo $exibirRegistros['data_pag']; ?></td>
                                    
                                </tr>
                              
                                </tbody>
                        </table>
                        <a href="list_pag.php" class="btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
                                   
                                
                                
                                
                        </div>  
                       
                        </section>
                    </div> 
                        
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
        <?php 
        include_once 'menu_rod/rod_admin.php'
        ?> 