<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 
  session_start();
   verificar_exec_feito();

  exercicio();

  verificar_resposta();


	
?>
<?php include(HEADER); ?>
<div class="container">
    <div class="row">
      <div class="col-sm-5 offset-sm-3">
        <h1>Exercio XPTO</h1>
         <?php 
                $i = 0; 
                $q = 0;

              ?> 
        <form action="exercicio.php" method="get">
         
          
          <?php  while($row = $exercicios->fetch_assoc()) :?>
               <?php 
                  $ultimo_encunciado;
              

                if($i == 0){
                    $q++;
                    echo "<b> $q - ".$row['enunciado']."</b>";
                    $ultimo_encunciado = $row['enunciado'];
                }

                if($ultimo_encunciado != $row['enunciado']){
                    $q++;
                    echo "<br>";
                    echo "<b> $q - ".$row['enunciado']."</b>";
                    $ultimo_encunciado = $row['enunciado'];
                }

              ?> 
            
              <div class="form-check">
              <input class="form-check-input" type="radio" name=questao<?php echo $q ?>   id="exampleRadios1" value=<?php echo $row['id'] ?> >
              <label class="form-check-label" for="exampleRadios1">
               <?php echo $row['texto_alternativa']; ?>
              </label>

              
               </div>
                  <?php 
                  $i++;    

                  ?> 


          <?php endwhile; ?>
              <br>
              <input type="hidden" name="q" value=<?php echo $q ?>>
               <input type="hidden" name="idexercicio" value=<?php echo $_GET['idexercicio'] ?>>
             <button type="submit" class="btn btn-primary form-control">Enviar Resposta</button>
          </form>
        
      
      </div>
    </div>
</div>
<?php include(FOOTER); ?>