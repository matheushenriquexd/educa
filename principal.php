<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 
	session_start();


 

  if (isset($_GET['sair'])) {
      session_destroy();
      header('location:index.php');
  }

  listaraturma();



	
?>
<?php include(HEADER); ?>
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron jumbotron">
				  <div class="container">
				    <p class="lead">Seja-bem vindo ao sistema <?php $_SESSION['nome'] ?></p>
				  </div>
				</div>
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Descricao</th>
			      <th scope="col">Ano</th>
			      <th scope="col">Professor</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  while($row = $turmas->fetch_assoc()) :?>
				    <tr>
					  <th scope="row"> <?php echo $row['id']; ?></th>
				      <td><?php echo $row['descricao']; ?></td>
				      <td><?php echo $row['ano']; ?></td>
				      <td><?php echo $row['nome']; ?></td>
				 
				     
				    </tr>

			    <?php endwhile; ?>
			  </tbody>
			</table>
		</div>
		</div>
</div>			


<?php include(FOOTER); ?>