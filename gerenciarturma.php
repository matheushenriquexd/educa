<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 

	lista_aluno_turma();
	session_start();

?>
<?php include(HEADER); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron jumbotron">
				<div class="container">
					<p class="lead">Seja-bem vindo ao sistema <b><?php echo($_SESSION['nome']) ?></b></p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-3">
			<h1>Turma <?php echo($_GET['idturma']) ?></h1>
		</div>
		<div class="col-md-1 offset-md-7">
			<a type="button" href="adicionaraluno.php?idturma=<?php echo($_GET['idturma']) ?>" class="btn btn-success">Adicionar Aluno</a>
	    </div>
	</div>
		<div class="row">
			<div class="col-md-12">
				
		

			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">Aluno</th>
			       <th scope="col">Acao</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  while($row = $resposta->fetch_assoc()) :?>
				    <tr>
					  <th scope="row"> <?php echo $row['aluno']; ?></th>
				 	  <td><a type="button" href="principal.php?excluirid=<?php echo $row['id']; ?>" class="btn btn-danger">Excluir</a></td>
				 	  
				     
				    </tr>

			    <?php endwhile; ?>
			  </tbody>
			</table>
		</div>
		</div>
</div>			

<?php include(FOOTER); ?>