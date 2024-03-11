<?php
// Conexão

include_once 'menu_rod/menu_sec.php';
           
require_once '../db_connect.php';

                //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                    
            //Setar a quantidade de itens por pagina
            $qnt_result_pg = 6;
                
            //calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;


$nome = isset($_POST['nome'])?$_POST['nome']:"";
$sexo = isset($_POST['sexo'])?$_POST['sexo']:"";
$bi = isset($_POST['bi'])?$_POST['bi']:"";

$sql = "SELECT distinct nome_usuario,sexo,num_documento, email FROM matricula m inner join inscricao i on m.id_inscricao = i.id_inscricao 
join usuario u on i.id_usuario = u.id_usuario Where nome_usuario like '$nome%' 
and sexo like '$sexo%' and  num_documento like '$bi%' order by nome_usuario LIMIT  $inicio, $qnt_result_pg";
$consulta = mysqli_query($connect, $sql);
$registros_pesquisa = mysqli_num_rows($consulta);

?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Consultar Login (Aluno)</h2> 
                     <a href="cadastrar_aluno.php" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Novo</a>
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
                                            <option value="Feminino">Feminino</option>
                                            <option value="Masculino">Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Documento Nº</label>
                                        <input type="text" name="bi"  class="form-control" />
                                        
                                    </div>
                                                     
                                    <a href="list_usuario.php" type="submit" class="btn btn-primary"><i class="fa fa-list"></i> Todos</a> 
                                    <input type="submit" value="Pesquisar" class="btn btn-primary">
                              
                                </div>

                            </div> 
                        </form>
                    </div> 
                    </div> 

                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th># </th>
                                    <th>Nome </th>
                                    <th>Sexo</th>
                                    <th>Documento Nº</th>
                                    <th>Email</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                    $contador = 1;
                                while($exibirRegistros = mysqli_fetch_array($consulta)):
                                ?>
                                <tr>
                                    <td><?php echo $contador ++; ?></td>
                                    <td><?php echo $exibirRegistros['nome_usuario']; ?></td>
                                    <td><?php echo $exibirRegistros['sexo']; ?></td>
                                    <td><?php echo $exibirRegistros['num_documento']; ?></td>
                                    <td><?php echo $exibirRegistros['email']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="editar_colab.php?id=<?php echo $exibirRegistros['id_usuario']; ?>"><i class="fa fa-edit"></i></a>
                                    
                                        <a class="btn btn-default" href="deletar_colab.php?id=<?php echo $exibirRegistros['id_usuario'];  ?>"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile; 
                                        //Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(id_matricula) AS num_result FROM matricula";
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
         include_once 'menu_rod/rod_sec.php';
     ?> 
