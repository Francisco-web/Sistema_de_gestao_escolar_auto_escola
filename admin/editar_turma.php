
           <?php 
            include_once 'menu_rod/menu_admin.php'
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Editar Turma</h2>   
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
                                        $sql = "SELECT * FROM turma t INNER join professor p on t.id_professor = p.id_professor 
                                        join usuario u on p.id_usuario = u.id_usuario join classe c on t.classe = c.id_classe  WHERE id_turma = '$id' ";
                                        $resultado = mysqli_query($connect, $sql);
                                        $dados = mysqli_fetch_array($resultado);
                                        
                                  
                            ?>
                            <form action="atual_turma.php" method="POST">
                            <div class="row">
                            <input type="hidden" name ="id" value ="<?php echo $dados['id_turma']; ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turma</label>
                                        <select name="turma" id="turma" class="form-control">
                                            <option value="">-- Selecione --</option>
                                            <option value="A" <?php if ($dados['nome_turma']=='A') {
                                                echo "Selected";
                                            } ?>>A</option>
                                            <option <?php if ($dados['nome_turma']=='B') {
                                                echo "Selected";
                                            } ?>>B</option>
                                            <option <?php if ($dados['nome_turma']=='C') {
                                                echo "Selected";
                                            } ?>>C</option>
                                            <option <?php if ($dados['nome_turma']=='D') {
                                                echo "Selected";
                                            } ?>>D</option>
                                            
                                        </select>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turno</label>
                                        <select name="periodo" id="periodo" class="form-control">
                                            <option value="">-- Selecione --</option>
                                            <option value="<?php echo $dados['periodo']; ?>" <?php if ($dados['periodo']=='Manhã') {
                                                echo "Selected";
                                            } ?>>Manhã</option>
                                            <option <?php if ($dados['periodo']=='Tarde') {
                                                echo "Selected";
                                            } ?>>Tarde</option>
                                            <option <?php if ($dados['periodo']=='Noite') {
                                                echo "Selected";
                                            } ?>>Noite</option>
                                        </select>
                                            
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Professor Responsável</label>
                                        <select name="professor" id="professor" class="form-control">
										<option value="<?php echo $dados['id_professor']; ?>"><?php echo $dados['nome_usuario']; ?></option>
										
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sala</label>
                                        <input type="text" name="sala" autocomplete="off" class="form-control" value="<?php echo $dados['num_sala']; ?>"/>
                                    </div> 
                                       
                                    <button type="submit" name="btn-editar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button> 
                                    <a class="btn btn-default" href="registar_turma.php"><i class="fa fa-undo"></i> Cancelar</a>
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
       require_once 'menu_rod/rod_admin.php'
    ?>