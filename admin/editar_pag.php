
           <?php 
            include_once 'menu_rod/menu_admin.php'
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
                                if (isset($_GET['al'])) {
                                        $id = mysqli_escape_string($connect, $_GET['al']);
                                        $doc_usuario = mysqli_escape_string($connect, $_GET['us']);
                                        $matricula = mysqli_escape_string($connect, $_GET['mt']);
                                        $turma = mysqli_escape_string($connect, $_GET['tm']);
                                        $classe = mysqli_escape_string($connect, $_GET['cl']);

                                        $sql = "SELECT distinct * FROM aluno_pag a 
                                        inner join matricula m on a.id_matricula = m.id_matricula join turma t on m.id_turma=t.id_turma join classe c on t.classe = c.id_classe 
                                        join pagamento p on a.id_pag = p.id_pag join inscricao i on m.id_inscricao = i.id_inscricao 
                                        JOIN usuario u on i.id_usuario = u.id_usuario WHERE id_aluno_pag = '$id' and num_documento = '$doc_usuario' and num_matricula = '$matricula' and nome_turma = '$turma' and nome_classe = '$classe'";
                                        $resultado = mysqli_query($connect, $sql);
                                        $dados = mysqli_fetch_array($resultado);
                                        
                            ?>
                            <form action="atual_pag.php" method="POST">
                            <div class="row">
                                <input type="hidden" name ="id" value ="<?php echo $dados['id_aluno_pag']; ?>">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nº Matrícula</label>
                                        <input type="text" name="matricula"  class="form-control" value ="<?php echo $dados['num_matricula']; ?>"/>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Recibo Nº</label>
                                        <input type="text" name="num_recibo"  class="form-control" value ="<?php echo $dados['num_recibo']; ?>"/>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Estudante</label>
                                        <select name="aluno" id="" class="form-control">
                                        <option value ="<?php echo $dados['id_matricula']; ?>"><?php echo $dados['nome_usuario']; ?></option>
                                        </select>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mês </label>
                                        <select name="mes" id="" class="form-control">
                                            <option value="">--Nenhum--</option>
                                            <option value="Janeiro"<?php if ($dados['mes_pag']=='Janeiro') {
                                                echo "Selected";
                                            } ?>>Janeiro</option>
                                            <option <?php if ($dados['mes_pag']=='Fevereiro') {
                                                echo "Selected";
                                            } ?>>Fevereiro</option>
                                            <option <?php if ($dados['mes_pag']=='Março') {
                                                echo "Selected";
                                            } ?>>Março</option>
                                            <option <?php if ($dados['mes_pag']=='Abril') {
                                                echo "Selected";
                                            } ?>>Abril</option>
                                            <option <?php if ($dados['mes_pag']=='Maio') {
                                                echo "Selected";
                                            } ?>>Maio</option>
                                            <option <?php if ($dados['mes_pag']=='Junho') {
                                                echo "Selected";
                                            } ?>>Junho</option>
                                            <option <?php if ($dados['mes_pag']=='Julho') {
                                                echo "Selected";
                                            } ?>>Julho</option>
                                            <option <?php if ($dados['mes_pag']=='Agosto') {
                                                echo "Selected";
                                            } ?>>Agosto</option>
                                            <option <?php if ($dados['mes_pag']=='Setembro') {
                                                echo "Selected";
                                            } ?>>Setembro</option>
                                            <option <?php if ($dados['mes_pag']=='Outubro') {
                                                echo "Selected";
                                            } ?>>Outubro</option>
                                            <option <?php if ($dados['mes_pag']=='Novembro') {
                                                echo "Selected";
                                            } ?>>Novembro</option>
                                            <option <?php if ($dados['mes_pag']=='Dezembro') {
                                                echo "Selected";
                                            } ?>>Dezembro</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo de Pagamento</label>
                                        <select name="id_pag" class="form-control" >
                                            <option value="<?php echo $dados['id_pag']; ?>"><?php echo $dados['tipo_p']; ?> - <?php echo $dados['nome_classe']; ?>/ <?php echo $dados['valor']; ?></option>
                                            
                                        </select>
                                            
                                    </div>
                                </div>                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valor </label>
                                        <input type="text" name="valor"  class="form-control" value ="<?php echo $dados['valor_pag']; ?>"/>
                                            
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Multa</label>
                                        <input type="text" name="multa"  class="form-control" value ="<?php echo $dados['multa']; ?>"/>
                                            
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Desconto</label>
                                        <input type="text" name="desconto"  class="form-control" value ="<?php echo $dados['desconto']; ?>"/>
                                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data Pagamento</label>
                                        <input type="text" name="desconto"  class="form-control" value ="<?php echo $dados['data_pag']; ?>" disabled/>
                                            
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
       require_once 'menu_rod/rod_admin.php'
    ?>