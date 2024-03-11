
           <?php 
            include_once 'menu_rod/menu_sec.php'
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Editar Pagamento</h2>   
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

                           
                            //verificar id
                                if (isset($_GET['id'])) {
                                        $id = mysqli_escape_string($connect, $_GET['id']);
                                        $sql = "SELECT distinct * FROM pagamento p inner join classe c on p.id_classe = c.id_classe  WHERE id_pag = '$id' ";
                                        $resultado = mysqli_query($connect, $sql);
                                        $dados = mysqli_fetch_array($resultado);
                                        
                                  
                            ?>
                            <form action="atual_propina.php" method="POST">
                            <div class="row">
                                <input type="hidden" name ="id" value ="<?php echo $dados['id_pag']; ?>">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo de Pagamento</label>
                                        <select name="pagamento" id="pagamento" class="form-control" >
                                            <option >-- Selecione --</option>
                                            <option value="Confirmação"<?php if ($dados['tipo_p']=='Confirmação') {
                                                echo "Selected";
                                            } ?>>Confirmação</option>

                                            <option <?php if ($dados['tipo_p']=='Exame') {
                                                echo "Selected";
                                            } ?>>Exame</option>

                                            <option <?php if ($dados['tipo_p']=='Matrícula') {
                                                echo "Selected";
                                            } ?>>Matrícula</option>

                                            <option <?php if ($dados['tipo_p']=='Propina') {
                                                echo "Selected";
                                            } ?>>Propina</option>
                                        </select>
                                            
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valor da Propina</label>
                                        <input type="text" name="valor"  class="form-control" value ="<?php echo $dados['valor']; ?>"/>
                                            
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select name="classe" id="classe" class="form-control">
                                            <option value="">-- Selecione --</option>
                                            <option value="<?php echo $dados['id_classe']; ?>" <?php if ($dados['nome_classe']=='Pré') {
                                                echo "Selected";
                                            } ?>>Pré</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='1ª Classe') {
                                                echo "Selected";
                                            } ?>>1ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='2ª Classe') {
                                                echo "Selected";
                                            } ?>>2ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='3ª Classe') {
                                                echo "Selected";
                                            } ?>>3ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='4ª Classe') {
                                                echo "Selected";
                                            } ?>>4ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='5ª Classe') {
                                                echo "Selected";
                                            } ?>>5ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='6ª Classe') {
                                                echo "Selected";
                                            } ?>>6ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='7ª Classe') {
                                                echo "Selected";
                                            } ?>>7ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='8ª Classe') {
                                                echo "Selected";
                                            } ?>>8ª Classe</option>
                                            <option value="<?php echo $dados['id_classe']; ?>"<?php if ($dados['nome_classe']=='9ª Classe') {
                                                echo "Selected";
                                            } ?>>9ª Classe</option>
                                            
                                        </select>

                                    </div>

                                <button type="submit" name="btn-editar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button> 
                                <a href="list_pag.php" class="btn btn-default"><i class= "fa fa-undo"></i> Cancelar</a>        
                                    
                                </div>
                            </div>
                            <?php } ?> 
                        </form>
                    </div> 
                </div> 
            </section>      
            </div>  
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
    
     <!-- /. WRAPPER  -->
     <?php 
       require_once 'menu_rod/rod_sec.php'
    ?>