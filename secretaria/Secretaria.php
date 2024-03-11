

        <?php 
            include_once 'menu_rod/menu_sec.php'
        ?> 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Bem Vindo a Secretaria</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">           
			    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-users"></i>
                </span>
                <div class="text-box" >
                <?php
                    $resultado = mysqli_query($connect,"SELECT COUNT(id_matricula) AS num_result FROM matricula");
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

                    <div class="col-md-6 col-sm-6 col-xs-6">           
			    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-copy"></i>
                </span>
                <div class="text-box" >
                <?php
                    $resultado = mysqli_query($connect,"SELECT COUNT(num_conv) AS num_result FROM convocatoria");
                    $dados = mysqli_fetch_array($resultado)
                    ?>
                    <p class="main-text"><?php echo $dados['num_result']; ?> Convocatórias</p>
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
                   
        </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
        <?php 
            include_once 'menu_rod/rod_sec.php';
        ?> 