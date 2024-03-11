
           <?php 
            include_once 'menu_rod/menu_admin.php'
            ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Adicionar Classe</h2>   
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
                        <form action="classe.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Codigo</label>
                                        <input type="text" name="codigo" autocomplete ="off"  class="form-control" />
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <input type="text" name="classe" autocomplete ="off" class="form-control" />
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                
                                 <button type="submit" name="btn-classe" class="btn btn-primary"><i class="fa fa-save"></i> Adicionar</button> 
                                </div> 
                            </div> 
                        </form>
                    </div> 
                    <br>    
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th></i> Codigo</th>
                                    <th></i> Nivel Academico </th>
                                    <th><i class="fa fa-cogs"></i> Acções</th>
                                </tr>
                                <?php
                                $sql = "SELECT * FROM classe ORDER BY id_classe ASC";
                                $resultado = mysqli_query($connect, $sql);
                                while($dados = mysqli_fetch_array($resultado)):
                                ?>
                                <tr>
                                    <td><?php echo $dados['codigo_classe']; ?></td>
                                    <td><?php echo $dados['nome_classe']; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="editar_classe.php?id=<?php echo $dados['id_classe']; ?>"><i class="fa fa-edit"></i></a>
                                    
                                        <a class="btn btn-default" href="deletar_classe.php?id=<?php echo $dados['id_classe']; ?>"><i class="fa fa-trash-o"></i></a>
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
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
     <?php 
       require_once 'menu_rod/rod_admin.php'
    ?>