<?php
// Conexão
require_once '../db_connect.php';

//Receber o número da página
$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
//Setar a quantidade de itens por pagina
$qnt_result_pg = 4;
	
//calcular o inicio visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

$nome = isset($_POST['nome'])?$_POST['nome']:"";
$sexo = isset($_POST['sexo'])?$_POST['sexo']:"";
$bi = isset($_POST['bi'])?$_POST['bi']:"";
$tipo = isset($_POST['tipo'])?$_POST['tipo']:"";

$sql = "SELECT * FROM usuario Where tipo != 'Aluno' and nome_usuario like '$nome%' 
and tipo like '$tipo%' and sexo like '$sexo%' and  num_documento like '$bi%' order by nome_usuario LIMIT $inicio, $qnt_result_pg ";
$consulta = mysqli_query($connect, $sql);
$registros_pesquisa = mysqli_num_rows($consulta);


?>
      
           <?php 
            include_once 'menu_rod/menu_admin.php';
            ?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Consultar Colaborador</h2> 
                     <a href="registar_usuario.php" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Novo</a>
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
                                        <label>Nome</label>
                                        <input type="text" name="nome"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select class="form-control" name="sexo" id="sexo">
                                            <option value="">-- Selecione --</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="Masculino">Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Numero de ID</label>
                                        <input type="text" name="bi"  class="form-control" />
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Utilizador</label>
                                        <select class="form-control" name="tipo" id="">
                                            <option value="">-- Selecione --</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Professor">Professor</option>
                                            <option value="Secretaria">Secretaria</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">                      
                                    <a href="list_prof.php" type="submit" class="btn btn-warning"><i class="fa fa-list"></i> List. Prof.</a> 
                                    <a href="list_sec.php" type="submit" class="btn btn-warning"><i class="fa fa-list"></i> List. Sec.</a> 
                                    <a href="list_usuario.php" type="submit" class="btn btn-default"><i class="fa fa-list"></i> Todos</a> 
                                    <input type="submit" value="Pesquisar" class="btn btn-primary">

                              
                                </div>

                            </div> 
                        </form>
                    </div> 
                    </div> 
                   
                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    
                                    <th> Nome </th>
                                    <th> Sexo</th>
                                    <th> Email</th>
                                    <th> Utilizador</th>
                                    <th> Login</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                while($exibirRegistros = mysqli_fetch_array($consulta)):
                                ?>
                                <tr>
                                    <td><?php echo $exibirRegistros['nome_usuario']; ?></td>
                                    <td><?php echo $exibirRegistros['sexo']; ?></td>
                                    <td><?php echo $exibirRegistros['email']; ?></td>
                                    <td><?php echo $exibirRegistros['tipo']; ?></td>
                                    <td><?php echo $exibirRegistros['login']; ?></td>

                                    <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="vs_perfil.php?usid=<?php echo $exibirRegistros['id_usuario']; ?>&tpus=<?php echo $exibirRegistros['tipo']; ?>"><i class="fa fa-search-plus"></i></a>
                                    <a class="btn btn-default" href="editar_colab.php?id=<?php echo $exibirRegistros['id_usuario']; ?>&tp=<?php echo $exibirRegistros['tipo']; ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default" href="deletar_colab.php?id=<?php echo $exibirRegistros['id_usuario']; ?>&tp=<?php echo $exibirRegistros['tipo']; ?>"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile;//Paginção - Somar a quantidade de usuários
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
                            <li><?PHP echo "<a href='list_usuario.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='list_usuario.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='list_usuario.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='list_usuario.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='list_usuario.php?pagina=$quantidade_pg'>»</a>"?></li>
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
         include_once 'menu_rod/rod_admin.php';
     ?> 
