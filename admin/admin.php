
        <?php 
        include_once 'menu_rod/menu_admin.php';
        ?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Area Administrativa </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <!-- o fazer a contagem dos itens cadastrado na bd -->
                  <hr />
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-users"></i>
                </span>
                <div class="text-box" >
                    <?php
                    $resultado = mysqli_query($connect,"SELECT COUNT(num_matricula) AS num_result FROM matricula");
                    $dados = mysqli_fetch_array($resultado);
                    ?>
                    <p class="main-text"><?php echo $dados['num_result']; ?> Alunos</p>
                    
                </div>
             </div>
		     </div>   
                <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-home"></i>
                </span>
                <div class="text-box" >
                    <?php
                      $resultado = mysqli_query($connect,"SELECT COUNT(id_turma) AS num_result FROM turma");
                      while($dados = mysqli_fetch_array($resultado)):
                        ?>
                   
                    <p class="main-text"> <?php echo $dados['num_result']; ?> Turmas</p> 
                    <?php endwhile; ?>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                <?php
                    $resultado = mysqli_query($connect,"SELECT COUNT(num_conv) AS num_result FROM convocatoria");
                    while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <p class="main-text"><?php echo $dados['num_result']; ?> Conv</p>
                    <?php endwhile; ?>
                </div>
             </div>
		     </div>
                   
            
        <!--Segunda Parte do dashboard-->

            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-leaf"></i>
                </span>
                <div class="text-box" >
                <?php
                    $resultado = mysqli_query($connect,"SELECT COUNT(id_classe) AS num_result FROM classe");
                    while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <p class="main-text"><?php echo $dados['num_result']; ?> Classes</p>
                    <?php endwhile; ?>
                </div>
             </div>
		     </div>
                   
                <div class="col-md-4 col-sm-6 col-xs-6">           
			    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-book"></i>
                </span>
                <div class="text-box" >
                <?php
                    $resultado = mysqli_query($connect,"SELECT COUNT(id_disciplina) AS num_result FROM disciplina");
                    while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <p class="main-text"><?php echo $dados['num_result']; ?> Discíplinas</p>
                    <?php endwhile; ?>
                </div>
             </div>
		     </div>
             <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-users"></i>
                </span>
                <div class="text-box" >
                <?php
                    $resultado = mysqli_query($connect,"SELECT COUNT(id_usuario) AS num_result FROM usuario Where tipo != 'Aluno'");
                    while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <p class="main-text"><?php echo $dados['num_result']; ?> Colab</p>
                    <?php endwhile; ?>
                </div>
             </div>
		     </div>
                   
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <?php 
       require_once 'menu_rod/rod_admin.php';
    ?> 
