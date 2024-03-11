
           <?php 
            include_once 'menu_rod/menu_admin.php';

            //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                
        //Setar a quantidade de itens por pagina
        $qnt_result_pg = 6;
            
        //calcular o inicio visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            $num_convocatoria = isset($_POST['numero'])?$_POST['numero']:"";
            $tipo_convocatoria = isset($_POST['tipo'])?$_POST['tipo']:"";
            $data_convocatoria = isset($_POST['data'])?$_POST['data']:"";

            $sql = "SELECT * FROM convocatoria  where  num_conv like '%$num_convocatoria%' 
            and tipo  like '%$tipo_convocatoria%' and  data_conv like '%$data_convocatoria%' LIMIT  $inicio, $qnt_result_pg";
            $consulta = mysqli_query($connect, $sql);
            $registros_pesquisa = mysqli_num_rows($consulta);

            ?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Consultar Comunicado</h2>   
                     <?php 
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                     <a class="btn btn-primary" href="add_convocatoria.php"><i class="fa fa-plus"></i> Adicionar Novo</a>

                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                        
                        <form action="" method="POST">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Número do Comunicado</label>
                                    <input type="text" name="numero"  class="form-control" />
                                    
                                </div>
                            </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>tipo Comunicado</label>
                                        <select name="tipo" id="" class="form-control" >
                                        <option >-- Selecione --</option>
                                        <option value="Convocatória">Convocatória</option>
                                        <option value="Nota Informativa">Nota Informativa</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data de Registro </label>
                                        <input type="date" name="data" autocomplete="off" class="form-control" />
                                        
                                    </div>
                                
                                 <a class="btn btn-primary" href="list_conv.php"><i class="fa fa-list"></i> Todos</a>
                                 <input type="submit" class="btn btn-primary" value= "Pesquisar">
                                
                                </div> 
                        </form>
                        </section> 
                        </div> 
                        </div> 
                      
                    <?php 
                        print "<div class='alert alert-info' role='alert'> * $registros_pesquisa Comunicados(s) Encontrado(s).</div> ";   ?><br>  
                        
                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>Nº</th>
                                    <th>Tipo</th>
                                    <th>assunto</th>
                                    <th>Data</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                              
                                while($exibirRegistros = mysqli_fetch_array($consulta)):
                               ?>

                              
                                <tr>
                                    <td><?php echo $exibirRegistros['num_conv']; ?></td>
                                    <td><?php echo $exibirRegistros['tipo']; ?></td>
                                    <td><?php echo $exibirRegistros['assunto']; ?></td>
                                    <td><?php echo $exibirRegistros['data_conv']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="editar_conv.php?id=<?php echo $exibirRegistros['num_conv']; ?>"><i class="fa fa-edit"></i></a>
                                    
                                        <a class="btn btn-default" href="deletar_conv.php?id=<?php echo $exibirRegistros['num_conv']; ?>"><i class="fa fa-trash-o"></i></a>
                                        
                                        <a class="btn btn-default" href="../relatorio/nota.php?id=<?php echo $exibirRegistros['num_conv']; ?>"><i class="fa fa-print"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile;//Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(num_conv) AS num_result FROM convocatoria";
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
                            <li><?PHP echo "<a href='list_conv.php?pagina=1'>«</a>"?></li>

                                            <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                            if($pag_ant >= 1){
                                                ?>

                                            <li><?PHP echo "<a href='list_conv.php?pagina=$pag_ant'>$pag_ant</a>"?></li>
                                            <?php	}
                                            } ?>

                                                        <li><?PHP echo "<a href='list_conv.php?pagina=$pagina'> $pagina</a>";?></li>

                                                    <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                    if($pag_dep <= $quantidade_pg){ 
                                                                        ?>		
                                            <li><?PHP echo "<a href='list_conv.php?pagina=$pag_dep'>$pag_dep</a>";?></li>
                                            <?php	}
                                            } ?>
                                            <li><?PHP echo "<a href='list_conv.php?pagina=$quantidade_pg'>»</a>"?></li>
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