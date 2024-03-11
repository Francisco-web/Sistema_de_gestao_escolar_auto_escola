
        <?php 
        include_once 'menu_rod/menu_aluno.php'
        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    
                        <h2>Classificação</h2>
                        <section class="panel">
                               
                            <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                            <p style="color:rgb(11, 11, 100);">AF - Ano de Frequência |1P -1ª Prova |2P -2ª Prova |AC -Avaliação Contínua|E - Exame |R - Recurso |M - Média |Ap - Aproveitamento</p>

                                    <th>Discícplina</th>
                                    <th>AF</th>
                                    <th>1ª P</th>
                                    <th>2ª P</th>
                                    <th>Ac</th>
                                    <th>E</th>
                                    <th>R</th>
                                    <th>M</th>
                                    <th>Ap</th>
                                   
                                </tr>
                                <?php
                                
                                $sql = "SELECT distinct * FROM nota n inner join matricula m on n.id_matricula = m.id_matricula 
                                join turma t on m.id_matricula = t.id_turma
                                join classe c on t.classe = c.id_classe join disciplina d on n.id_disciplina = d.id_disciplina join inscricao i on m.id_inscricao = i.id_inscricao 
                                join usuario u on i.id_usuario = u.id_usuario Where nome_usuario = '$nome' and u.tipo = '$tipo'and i.id_usuario = '$id' order by nome_disc";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):

                                    $nota1= $dados['1p'];
                                    $nota2= $dados['2p'];
                                    $media = $nota1 + $nota2;
                                    $media = $media/2;
                                    
                                    $recurso = $dados['recurso']; 
                                    $exame = $dados['exame'];
                                     
                                ?>
                                <tr>
                                    <td><?php echo $dados['nome_disc']; ?></td>
                                    <td><?php echo $dados['ano_academico']; ?></td>
                                    <td><?php echo  $dados['1p']; ?></td>
                                    <td><?php echo $dados['2p']; ?></td>
                                    <td><?php echo $dados['ac']; ?></td>
                                    <td><?php echo $dados['exame'] ?></td>
                                    <td><?php echo $dados['recurso']; ?></td>
                                    <td><?php echo $media ?></td>
                                    <td><?php echo  $media >= 05 ? "Bom" : "Mau";?></td>
                                
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
            include_once 'menu_rod/rod_aluno.php'
        ?> 