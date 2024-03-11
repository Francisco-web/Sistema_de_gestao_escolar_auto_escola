<?php
// Conexão
require_once '../db_connect.php';

$codigo = isset($_POST['codigo'])?$_POST['codigo']:"";
$disciplina = isset($_POST['disciplina'])?$_POST['disciplina']:"";
$professor = isset($_POST['professor'])?$_POST['professor']:"";

$sql = "SELECT d.id_disciplina,d.codigo_disc,d.nome_disc,d.descricao,u.nome_usuario FROM disciplina d 
inner join professor p on d.id_professor = p.id_professor join usuario u ON p.id_usuario = u.id_usuario 
Where  codigo_disc like '%$codigo%' 
and nome_disc  like '%disciplina%' and  nome_usuario like '%$professor%'";
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
                     <h2>Consultar Discíplina</h2> 
                     <a href="registar_disciplina.php" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Nova</a>
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
                                        <label>Codigo</label>
                                        <input type="text" name="codigo" autocomplete="off" class="form-control" />
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discíplina</label>
                                        <input type="text" name="disciplina" autocomplete="off" class="form-control" />
                                    </div>    
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Professor da Discíplina</label>
                                        <select name="professor" id="professor" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <?php 
											$sql = "SELECT distinct nome_usuario FROM professor p inner join usuario u on p.id_usuario = u.id_usuario
                                            order by nome_usuario ";
											$resultado = mysqli_query($connect, $sql);
											while($dados = mysqli_fetch_array($resultado)){

										?>
										<option value="<?php echo $dados['nome_usuario']; ?>"><?php echo $dados['nome_usuario']; ?></option>
										<?php } ?>
                                        </select>
                                    </div>
                               
                                    <a href="list_disc.php" type="submit" class="btn btn-primary"><i class="fa fa-list"></i> Todas</a> 
                                    <input type="submit" value="Pesquisar" class="btn btn-primary">
                              
                                </div>
                                

                            </div> 
                        </form>
                    </div> 
                    <br> 
                    <?php 
                        print "<b>*$registros_pesquisa registros encontrados.</b> ";   ?><br><br>

                        <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th> Codigo</th>
                                    <th> Discíplina</th>
                                    <th> Professor</th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                $contador = 1;
                                while($exibirRegistros = mysqli_fetch_array($consulta)):
                                ?>
                                <tr>
                                    <td><?php echo $exibirRegistros['codigo_disc']; ?></td>
                                    <td><?php echo $exibirRegistros['nome_disc']; ?></td>
                                    <td><?php echo $exibirRegistros['nome_professor']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="editar_disc.php?id=<?php echo $exibirRegistros['id_disciplina']; ?>"><i class="fa fa-edit"></i></a>
                                    
                                        <a class="btn btn-danger" href="deletar_disc.php?id=<?php echo $exibirRegistros['id_disciplina'];  ?>"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                                </tbody>
                        </table>
                     
                </div>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
     <?php 
         include_once 'menu_rod/rod_admin.php';
     ?> 
