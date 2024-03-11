
        <?php 
        include_once 'menu_rod/menu_prof.php'
        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <br>
                            <?php
                               if (isset($_GET['id'])& isset($_GET['cl'])& isset($_GET['tur']) & isset($_GET['pr'])) {
                                        
                                $matricula = mysqli_escape_string($connect, $_GET['id']);
                                $classe = mysqli_escape_string($connect, $_GET['cl']);
                                $turma = mysqli_escape_string($connect, $_GET['tur']);
                                $periodo = mysqli_escape_string($connect, $_GET['pr']);
                                }
                                $sql = "SELECT * FROM nota n inner join disciplina d on n.id_disciplina = d.id_disciplina 
                                JOIN matricula m on n.id_matricula = m.id_matricula join turma t on m.id_turma = t.id_turma  
                                join classe c on t.classe = c.id_classe join inscricao i on m.id_inscricao = i.id_inscricao 
                                join usuario u on i.id_usuario = u.id_usuario Where num_matricula = '$matricula' and nome_classe = '$classe' and nome_turma = '$turma' and t.periodo = '$periodo'and d.id_professor = '$id_professor'";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                            
                            ?>
                        
                       
                        <form action="" method="POST">
                        
                        <div class="row">
                        <h3>Detalhes de Avaliação</h3>
                        
                                 <table class="table table-striped table-advance table-hover">
                                    
                                    <tr>
                                    <td ><strong> Nome: </strong> <?php echo $dados['nome_usuario']; ?></td>
                                    <td ><strong> Matricula: </strong><?php echo $dados['num_matricula']; ?></td>
                                    <td ><strong> Classe: </strong><?php echo $dados['nome_classe']; ?></td>
                                    <td ><strong> Periodo: </strong><?php echo $dados['periodo']; ?></td>
                                    <td ><strong> Turma: </strong><?php echo $dados['nome_turma']; ?></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td ><strong> Sala: </strong> <?php echo $dados['num_sala']; ?></td>
                                    <td ><strong> Ano Lectivo: </strong><?php echo $dados['ano_academico']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    </tr>
                                    
                                    <tr>
                                    <td ><strong> Encarregados de Educação: </strong> <?php echo $dados['nome_pai']; ?> (Pai) e <?php echo $dados['nome_mae']; ?> (Mãe)</td>
                                    <td><strong>Discíplina:</strong> <?php echo $dados['nome_disc']; ?> </td>
                                    <td ></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    <?php endwhile; ?>
                                    <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                    <th>Trimestre</th>
                                    <th>1ª Prova</th> 
                                    <th>2ª Prova</th>
                                    <th>Avaliação Continua</th>
                                    <th>Exame</th>
                                    <th>Recurso</th>
                                    <th>Media</th>
                                    <th>Aproveitamento</th>
                                   
                                    <th></th>
                                </tr>
                                <?php
                                    
                                $sql = "SELECT * FROM nota n inner join disciplina d on n.id_disciplina = d.id_disciplina 
                                JOIN matricula m on n.id_matricula = m.id_matricula join turma t on m.id_turma = t.id_turma  
                                join classe c on t.classe = c.id_classe join inscricao i on m.id_inscricao = i.id_inscricao 
                                join usuario u on i.id_usuario = u.id_usuario where num_matricula = '$matricula' and nome_classe = '$classe' and nome_turma = '$turma' and t.periodo = '$periodo'and d.id_professor='$id_professor' order by nome_usuario";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                    $nota1= $dados['1p'];
                                    $nota2= $dados['2p'];
                                    $media = $nota1 + $nota2;
                                    $media = $media/2; 
                                ?>
                                <tr>
                                    <td><?php echo $dados['trimestre']; ?></td> 
                                    <td><?php echo  $dados['1p']; ?></td>
                                    <td><?php echo $dados['2p']; ?></td>
                                    <td><?php echo $dados['ac']; ?></td>
                                    <td><?php echo $dados['exame'] ?></td>
                                    <td><?php echo $dados['recurso']; ?></td>
                                    <td><?php echo $media ?></td>
                                    <td><?php echo  $media >= 05 ? "Bom" : "Mau";?></td>
                                    <td></td>
                                
                                </tr>
                                </tbody>
                                <?php endwhile; ?>

                                </table>
                                </table>
                                <div class="form-group">
                                <a href="" class="btn btn-default"><i class="fa fa-print"></i> imprimir</a>     
                                <a href="list_aval.php" class="btn btn-default"><i class="fa fa-undo"></i> Voltar</a>     
                                </div>
                            </div>

                        </form>
                       
                        </div>
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