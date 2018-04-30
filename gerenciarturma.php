<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 

	lista_aluno_turma();
	lista_atividades_por_turma();
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
			<h1>Atividades : </h1>
		</div>
		<div class="col-md-1 offset-md-7">
			<a type="button" href="adicionaratividade.php?idturma=<?php echo($_GET['idturma']) ?>" class="btn btn-success">Adicionar Atividade</a>
	    </div>
	</div>
		<div class="row">
			<div class="col-md-12">
				
		

			<table class="table table-bordered">
			  <thead>
			    <tr>
			    	<th scope="col">#</th>
			      <th scope="col">Nome Atividade</th>
			       <th scope="col">Acao</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  while($row = $lista_exerc->fetch_assoc()) :?>
				    <tr>
					  <th scope="row"> <?php echo $row['id']; ?></th>
					    <th scope="row"> <?php echo $row['titulo']; ?></th>
				 	  <td><a type="button" href="principal.php?excluirid=<?php echo $row['id']; ?>" class="btn btn-danger">Excluir</a> <a type="button" href="gerenciaratividade.php?idatividade=<?php echo $row['id']; ?>" class="btn btn-primary">Adicionar Perguntas</a></td>
				 	  
				     
				    </tr>

			    <?php endwhile; ?>
			  </tbody>
			</table>
		</div>
		</div>

		<br>
	
	<div class="row">
		<div class="col-md-3">
			<h1>Alunos : </h1>
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