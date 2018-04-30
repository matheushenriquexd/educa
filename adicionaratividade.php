<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 

	criar_atividade();

?>
<?php include(HEADER); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-5 offset-sm-3">
			<form action="adicionaratividade.php" method="get">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nome Atividade : </label>
			    <input class="form-control" name="nome_atividade" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o nome da atividade...">
			    <input type="hidden" name="idturma" value=<?php echo $_GET['idturma'] ?>
			  </div>
			  <Br>
			  <button type="submit" class="btn btn-primary">Criar</button>
			</form>
		</div>
	</div>
</div>
<?php include(FOOTER); ?>