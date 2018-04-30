<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 
  session_start();

rendimento_aluno();
	
?>

<?php include(HEADER); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron jumbotron">
				<div class="container">
					<p class="lead">Olá <b><?php echo($_SESSION['nome']) ?></b>,</p> 
					<p class="lead">Nessa tela você encontra todas as ativades que você <b>ja realizou.</b> Confira o numero de questão que você acertou. <b>O sistema não permite que você refaça uma atividade.</b></p> 
				</div>
			</div>
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
			     <li class="breadcrumb-item"><a href="gerenciarturmaluno.php">Atividades</a></li>
			      <li class="breadcrumb-item active" aria-current="page">Relatorios</li>
			  </ol>
			</nav>
<?php  while($row = $rendimento->fetch_assoc()) :?>
	
						
				    <table class="table table-bordered">
					  <thead>
					    <tr>
					    <th scope="col">ID Exercicio</th>
					      <th scope="col">Nome Exercicio</th>
					      <th scope="col">Acertos</th>
					    </tr>
					  </thead>
			  <tbody>
				    <tr>
				      <th scope="row"> <?php echo $row['id_exercicio']; ?></th>
					  <th scope="row"> <?php echo $row['titulo']; ?></th>
					  <th scope="row"> <?php echo $row['acertos']; ?></th>
				 	 
				 	  
				     
				    </tr>
				    </table>

<?php endwhile; ?>


			</div>
			</div>
			</div>

<?php include(FOOTER); ?>