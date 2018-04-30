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
					<div class="jumbotron jumbotron">
						<div class="container">
									<p class="lead">Olá professor(a) <b><?php echo($_SESSION['nome']) ?></b>, nessa tela você cadastrar sua(s) turma(s). Preencha corretamente os dados, para nao haver incosistencia no sistema.</p>
								</div>
					</div>

						<form action="criarnovaturma.php" method="post">

						 <div class="form-group">
						<label for="exampleInputEmail1">Descricao</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao" placeholder="Digite a descricao.."></textarea>
					   
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