<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 

  exercicio();
	
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
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
              <label class="form-check-label" for="exampleRadios1">
               <?php echo $row['texto_alternativa']; ?>
              </label>
               </div>
                  <?php 
                  $i++;    ?> 
          <?php endwhile; ?>
        
      
      </div>
    </div>
</div>
<?php include(FOOTER); ?>