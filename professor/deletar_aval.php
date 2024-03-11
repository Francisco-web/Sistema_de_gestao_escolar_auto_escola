
           <?php 
            include_once 'menu_rod/menu_prof.php';
            ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Apagar Avaliação</h2>   
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
                            if (isset($_GET['id'])& isset($_GET['cl'])& isset($_GET['tur']) & isset($_GET['pr'])) {
                                        
                                $id_matricula = mysqli_escape_string($connect, $_GET['id']);
                                $classe = mysqli_escape_string($connect, $_GET['cl']);
                                $turma = mysqli_escape_string($connect, $_GET['tur']);
                                $periodo = mysqli_escape_string($connect, $_GET['pr']);
                                    
                                $sql="SELECT distinct * FROM nota n inner join disciplina d on n.id_disciplina = d.id_disciplina 
                                    JOIN matricula m on n.id_matricula = m.id_matricula join turma t on m.id_turma = t.id_turma  
                                    join classe c on t.classe = c.id_classe join inscricao i on m.id_inscricao = i.id_inscricao 
                                    join usuario u on i.id_usuario = u.id_usuario Where num_matricula = '$id_matricula' and nome_classe = '$classe' and nome_turma = '$turma' and t.periodo = '$periodo' ";
                                $resultado = mysqli_query($connect, $sql);
                                $dados = mysqli_fetch_array($resultado);
    
                            ?>
                            <form action="del_aval.php" method="POST">
                            <div class="row">
                            <input type="hidden" name="id"  class="form-control"  value="<?php echo $dados['id_nota']; ?>" />
                            <input type="hidden" name="id_matricula"  class="form-control"  value="<?php echo $dados['id_matricula']; ?>" />
                            <input type="hidden" name="id_disciplina"  class="form-control"  value="<?php echo $dados['id_disciplina']; ?>" />

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Aluno</label>
                                        <select name="aluno" id="" class="form-control" disabled>
                                            <option value="<?php echo $dados['id_matricula']; ?>"><?php echo $dados['nome_usuario']; ?></option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select name="classe" id="" class="form-control" disabled>
                                            <option value="<?php echo $dados['id_classe']; ?>"><?php echo $dados['nome_classe']; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Turma</label>
                                        <select name="turma" id="" class="form-control" disabled>
                                            <option value="<?php echo $dados['id_turma']; ?>"><?php echo $dados['nome_turma']; ?></option>
                                        </select>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discíplina</label>
                                        <select name="disciplina" id=""  class="form-control" disabled>
                                            <option value="<?php echo $dados['id_disciplina']; ?>"><?php echo $dados['nome_disc']; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Trimestre</label>
                                        <select class="form-control" name="trimestre" disabled>
                                            <option value="<?php echo $dados['trimestre']; ?>"<?php if ($dados['trimestre']=='Iº') {
                                                echo "Selected";
                                            } ?> >Iº</option>

                                            <option <?php if ($dados['trimestre']=='IIº') {
                                                echo "Selected";
                                            }?>>IIº</option>
                                            <option <?php if ($dados['trimestre']=='IIIº') {
                                                echo "Selected";
                                            }?>>IIIº</option>
                                             </select>    
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>1º Prova</label>
                                        <input type="text" name="p1"  class="form-control"  value="<?php echo $dados['1p']; ?>" disabled/>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>2º Prova</label>
                                        <input type="text" name="p2"  class="form-control" value="<?php echo $dados['2p']; ?>" disabled/>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Avaliação Contínua</label>
                                        <input type="text" name="ac"  class="form-control" value="<?php echo $dados['ac']; ?>" disabled/>
                                        
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Exame</label>
                                        <input type="text" name="exame"  class="form-control"value="<?php echo $dados['exame']; ?>" disabled/>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Recurso</label>
                                        <input type="text" name="recurso"  class="form-control"  value="<?php echo $dados['recurso']; ?>" disabled/>
                                        
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data de lançamento</label>
                                        <input type="text" name="data"  class="form-control"  value="<?php echo $dados['data_emissisao']; ?>"disabled />
                                        
                                    </div>
                                
                                    <button type="submit" name="btn-apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i> Apagar</button> 
                                    <a href="list_aval.php" class="btn btn-default "><i class="fa fa-undo"></i> Cancelar</a>                       

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
       require_once 'menu_rod/rod_prof.php';
    ?>