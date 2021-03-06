<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 

	
	session_start();
	lista_atividades_por_turma();

?>
<?php include(HEADER); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">


	<div class="jumbotron jumbotron">
				<div class="container">
					<p class="lead">Olá <b><?php echo($_SESSION['nome']) ?></b>, nessa tela você encontra todas as ativades que o professor da sua turma registrou. Não esqueça de realizar as atividades. ;)</p>
				</div>
	</div>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
	     <li class="breadcrumb-item active" aria-current="page">Atividades</li>
	  </ol>
	</nav>
		
	
				    <table class="table table-bordered">
					  <thead>
					    <tr>
					    <th scope="col">ID</th>
					      <th scope="col">Nome Exercicio</th>
					      <th scope="col">Açao</th>
					    </tr>
					  </thead>
			  <tbody>
			  	<?php  while($row = $lista_exerc->fetch_assoc()) :?>
				    <tr>
				      <th scope="row"> <?php echo $row['id']; ?></th>
					  <th scope="row"> <?php echo $row['titulo']; ?></th>
				 	   <td><a type="button" href="exercicio.php?idexercicio=<?php echo $row['id']; ?>" class="btn btn-primary">Fazer Exercicio</a></td>
				 	  
				     
				    </tr>
				 

			    <?php endwhile; ?>

			       </table>

			</div>
			</div>
			</div>
<?php include(FOOTER); ?>