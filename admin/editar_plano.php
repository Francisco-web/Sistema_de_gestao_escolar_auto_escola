
           <?php 
            include_once 'menu_rod/menu_admin.php'
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Editar Plano Curricular</h2>   
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
                                        $sql = "SELECT * FROM plano_curricular pc INNER JOIN disciplina d ON pc.id_disciplina = d.id_disciplina 
                                        join classe c ON pc.classe = c.id_classe join turma t on pc.id_turma = t.id_turma join professor p on d.id_professor = p.id_professor 
                                        join usuario u on p.id_usuario = u.id_usuario WHERE id_plano = '$id' ";
                                        $resultado = mysqli_query($connect, $sql);
                                        $dados = mysqli_fetch_array($resultado);
                                        
                                  
                            ?>
                            <form action="atual_plano.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discíplina</label>
                                        <select name="disciplina" id="disciplina" class="form-control">
                                           
										<option value="<?php echo $dados['id_disciplina']; ?>"><?php echo $dados['nome_disc']; ?></option>
										
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select name="classe" id="classe" class="form-control">
                                            
										<option value="<?php echo $dados['id_classe']; ?>"><?php echo $dados['nome_classe']; ?></option>
										
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <input type="text" name="hora" autocomplete="on" class="form-control" value="<?php echo $dados['hora']; ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turno</label>
                                        <select name="turno" id="classe" class="form-control" >
										    <option value="Manhã"<?php if ($dados['periodo']=='Manhã') {
                                                echo "Selected";
                                            } ?>>Manhã</option>
                                            <option value="Tarde"<?php if ($dados['periodo']=='Tarde') {
                                                echo "Selected";
                                            } ?>>Tarde</option>
                                            <option value="Noite"<?php if ($dados['periodo']=='Noite') {
                                                echo "Selected";
                                            } ?>>Noite</option>    
                                        </select>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dias de Semana</label>
                                        <select name="d_semana[]" id="semana" class="form-control">
										    <option value="Segunda-Feira" <?php if ($dados['dia_sem']=='Segunda-Feira') {
                                                echo "Selected";
                                            } ?>>Segunda-Feira</option>
                                            <option value="Terça-Feira"<?php if ($dados['dia_sem']=='Terça-Feira') {
                                                echo "Selected";
                                            } ?>>Terça-Feira</option>
                                            <option value="Quarta-Feira"<?php if ($dados['dia_sem']=='Quarta-Feira') {
                                                echo "Selected";
                                            } ?>>Quarta-Feira</option>    
                                            <option value="Quinta-Feira"<?php if ($dados['dia_sem']=='Quinta-Feira') {
                                                echo "Selected";
                                            } ?>>Quinta-Feira</option>
                                            <option value="Sexta-Feira"<?php if ($dados['dia_sem']=='Sexta-Feira') {
                                                echo "Selected";
                                            } ?>>Sexta-Feira</option>    
                                        </select>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turma</label>
                                        <select name="turma" class="form-control">
                                        <option value="">-- Selecione --</option>

                                        <option value="<?php echo $dados['id_turma']; ?>"<?php if ($dados['nome_turma']=='A') {
                                                echo "Selected";
                                            } ?>>A</option>
                                            <option value="<?php echo $dados['id_turma']; ?>"<?php if ($dados['nome_turma']=='B') {
                                                echo "Selected";
                                            } ?>>B</option>
                                            <option value="<?php echo $dados['id_turma']; ?>C"<?php if ($dados['nome_turma']=='C') {
                                                echo "Selected";
                                            } ?>>C</option> 
                                             <option value="<?php echo $dados['id_turma']; ?>"<?php if ($dados['nome_turma']=='D') {
                                                echo "Selected";
                                            } ?>>D</option> 
                                             <option value="<?php echo $dados['id_turma']; ?>"<?php if ($dados['nome_turma']=='C') {
                                                echo "Selected";
                                            } ?>>E</option>  
										
                                        </select>
                                    </div>
                                
                                <div class="col-md-6">        
                                    <button type="submit" name="btn-editar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button> 
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