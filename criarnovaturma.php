<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 
	session_start();

	criar_nova_turma();
	excluirturma();

	
?>


<?php include(HEADER); ?>

<div class="container">
		<div class="row">
				<div class="col-sm-5 offset-sm-3">
						<form action="criarnovaturma.php" method="post">

						 <div class="form-group">
					    <label for="exampleInputEmail1">Descricao</label>
					    <input class="form-control" id="exampleInputEmail1" name="descricao" placeholder="Digite a descricao..">
					    <label for="exampleInputEmail1">Ano</label>
					    <input class="form-control" id="exampleInputEmail1" name="ano" placeholder="Digite o ano da turma..">
						<div class="form-group">
							<Br>
					     <button type="submit" class="btn btn-primary form-control">Criar Turma</button>
					  </div>
					
					</form>
				</div>
		</div>

</div>
<?php include(FOOTER); ?>