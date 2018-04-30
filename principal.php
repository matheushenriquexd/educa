<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 
	session_start();


 

  if (isset($_GET['sair'])) {
      session_destroy();
      header('location:index.php');
  }

  listaraturma();
  excluirturma();



	
?>
<?php include(HEADER); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron jumbotron">
				<div class="container">
					<p class="lead">Seja-bem vindo ao sistema <b>Educa+ <?php echo($_SESSION['nome']) ?>,</b></p>
					<p class="lead">Nessa tela você acompanha a(s) turma(s) nas quais você foi <b>cadastrado</b> se for um <b>aluno</b>  ou as turma(s) que você <b>cadastrou</b> se for um <b>professor</b>.</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-1">
			<?php if ($turmas) :?>

			<h1>Turmas</h1>

			<?php endif; ?>
		</div>
		<?php if (!$turmas && $_SESSION['classe'] == 'alunos') :?>
			<div class="col-md-12">	
				<div class="alert alert-warning" role="alert">
					  Você nao foi <b>cadastrado</b> em nenhuma turma ainda. Aguarde até que um <b>professor faca o seu cadastro.</b>
			    </div>
		    </div>	
			<?php endif; ?>
		<?php if (!$turmas && $_SESSION['classe'] == 'professores') :?>
			<div class="col-md-12">	
				<div class="alert alert-warning" role="alert">
					  Você nao possui turma <b>cadastrada</b> realize o cadastro de alguma turma para continuar.
					  
			    </div>
		    </div>	
			<?php endif; ?>
		<div class="col-md-1 offset-md-9">
			<?php 
				if($_SESSION['classe'] == 'professores'){
					echo("<a type='button' href='criarnovaturma.php' class='btn btn-success'>Criar Nova Turma</a>");
				}


			 ?>
			
	    </div>
	</div>
		<div class="row">
			<div class="col-md-12">
				
			<?php if ($turmas && $_SESSION['classe'] == "professores") :?>


			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Descricao</th>
			      <th scope="col">Ano</th>
			      <th scope="col">Professor</th>
			      <th scope="col">Açao</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  while($row = $turmas->fetch_assoc()) :?>
				    <tr>
					  <th scope="row"> <?php echo $row['id']; ?></th>
				      <td><?php echo $row['descricao']; ?></td>
				      <td><?php echo $row['ano']; ?></td>
				      <td><?php echo $row['nome']; ?></td>
				 	  <td><a type="button" href="gerenciarturma.php?idturma=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a> <a type="button" href="principal.php?excluirid=<?php echo $row['id']; ?>" class="btn btn-danger">Excluir</a></td>
				 	  
				     
				    </tr>

			    <?php endwhile; ?>
			  </tbody>
			</table>
		<?php endif; ?>
		<?php if ($turmas && $_SESSION['classe'] == "alunos") :?>
				<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Descricao</th>
			      <th scope="col">Ano</th>
			      <th scope="col">Professor</th>
			      <th scope="col">Açao</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  while($row = $turmas->fetch_assoc()) :?>
				    <tr>
					  <th scope="row"> <?php echo $row['id']; ?></th>
				      <td><?php echo $row['descricao']; ?></td>
				      <td><?php echo $row['ano']; ?></td>
				      <td><?php echo $row['professor']; ?></td>
				 	   <td><a type="button" href="gerenciarturmaluno.php?idturma=<?php echo $row['id']; ?>" class="btn btn-primary">Atividades</a></td>
				 	  
				     
				    </tr>

			    <?php endwhile; ?>
			  </tbody>
			</table>
	<?php endif; ?>
	
	
		</div>
		</div>
</div>			


<?php include(FOOTER); ?>