
           <?php 
            include_once 'menu_rod/menu_admin.php'
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Listar Professores(as)</h2>   
                    </div>
                </div>            
  
                 <!-- /. ROW  -->
                    <hr>
                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>#</th>
                                    <th> Nome </th>
                                    <th> Sexo</th>
                                    <th> Doc</th>
                                    <th> Doc.Nº</th>
                                    <th> Util.</th>
                                    <th> Email</th>
                                    <th> Login</th>
                                    <th><i class="fa fa-cogs"></i> Acção</th>
                                </tr>
                                <?php
                                $contador = 1;
                                $sql = "SELECT * FROM professor p inner join usuario u on p.id_usuario = u.id_usuario where tipo = 'Professor(a)' order by nome_usuario";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                ?>
                                <tr>
                                    <td><?php echo $contador++; ?></td>
                                    <td><?php echo $dados['nome_usuario']; ?></td>
                                    <td><?php echo $dados['sexo']; ?></td>
                                    <td><?php echo $dados['tipo_documento']; ?></td>
                                    <td><?php echo $dados['num_documento']; ?></td>
                                    <td><?php echo $dados['tipo']; ?></td>
                                    <td><?php echo $dados['email']; ?></td>
                                    <td><?php echo $dados['login']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                    
                                        <a class="btn btn-default" href="deletar_prof.php?id=<?php echo $dados['id_professor']; ?>&tp=<?php echo $dados['tipo']; ?>"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                                </tbody>
                        </table>
                          <!-- botão voltar -->
                        <a href="list_usuario.php" class="btn btn-default"><i class="fa fa-undo" ></i> Voltar</a>
                     
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
     <?php 
            include_once 'menu_rod/rod_admin.php'
     ?>