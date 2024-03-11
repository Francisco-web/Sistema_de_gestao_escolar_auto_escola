
           <?php 
            include_once 'menu_rod/menu_admin.php';

            
            //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                    
            //Setar a quantidade de itens por pagina
            $qnt_result_pg = 4;
                
            //calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Adicionar Colaborador</h2>   
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
                       
                        <form action="colaborador.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" name="nome"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select name="sexo" id="sexo" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Masculino">Masculino</option>
                                        </select>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Documento de Identificação</label>
                                        <select name="documento" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <option value="Acento de Nascimento">Acento de Nascimento</option>
                                        <option value="B.I">B.I</option>
                                        <option value="Cédula">Cédula</option>
                                        </select>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número do Documento</label>
                                        <input type="text" name="num_documento" autocomplete="off" class="form-control" />
                                    </div> 
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telemovel</label>
                                        <input type="text" name="telefone" autocomplete="off" class="form-control" />
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" autocomplete="off" class="form-control" />
                                        </div> 
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Utilizador</label>
                                        <select class="form-control" name="utilizador" id="utilizador">
                                            <option value="">-- Selecione --</option>
                                            <option value="Director">Director</option>
                                            <option value="Professor(a)">Professor(a)</option>
                                            <option value="Secretaria">Secretária</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6"> 
                                                         
                                    <button type="submit" name="btn-colaborador" class="btn btn-primary"><i class="fa fa-save"></i> Adicionar</button> 
                                    <a href="list_usuario.php" class="btn btn-default"><i class="fa fa-undo"></i> Cancelar</a>
                                </div>

                            </div> 
                        </form>
                    </div> 
                    <br>    
                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>#</th>
                                    <th> Nome </th>
                                    <th> Sexo</th>
                                    <th> Email</th>
                                    <th> Utilizador</th>
                                    <th> Login</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                $contador = 1;
                                $sql = "SELECT * FROM usuario where tipo != 'Aluno' order by nome_usuario LIMIT $inicio, $qnt_result_pg";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                ?>
                                <tr>
                                    <td><?php echo $contador++; ?></td>
                                    <td><?php echo $dados['nome_usuario']; ?></td>
                                    <td><?php echo $dados['sexo']; ?></td>
                                    <td><?php echo $dados['email']; ?></td> 
                                    <td><?php echo $dados['tipo']; ?></td>
                                    <td><?php echo $dados['login']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="editar_colab.php?id=<?php echo $dados['id_usuario']; ?>"><i class="fa fa-edit"></i></a>
                                    
                                        <a class="btn btn-default" href="deletar_colab.php?id=<?php echo $dados['id_usuario']; ?>"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile; //Paginção - Somar a quantidade de usuários
                                $result_pg = "SELECT COUNT(id_usuario) AS num_result FROM usuario where tipo!='Aluno'";
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
                            <li><?PHP echo "<a href='registar_usuario.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='registar_usuario.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='registar_usuario.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='registar_usuario.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='registar_usuario.php?pagina=$quantidade_pg'>»</a>"?></li>
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
     <?php 
            include_once 'menu_rod/rod_admin.php'
     ?>