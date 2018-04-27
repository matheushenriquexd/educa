<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 

	verificar_cadastro();

	verificar_usuario_logado();
?>
<?php include(HEADER); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron jumbotron">
				  <div class="container">
				    <h1 class="display-4">Educa+</h1>
				    <p class="lead">Seja-bem vindo ao sistema Educa+.</p>
				  </div>
				</div>
							
			
			</div>
		</div>
		<div class="row">
				<div class="col-sm-5 offset-sm-3">
					<form action="index.php" method="post">
					  <div class="form-group">
					    <label for="exampleInputEmail1">CPF : </label>
					    <input class="form-control" name="cpf" placeholder="Digite seu cpf...">
					   
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Senha</label>
					    <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha...">
					  </div>
						<fieldset class="form-group">
						    <div class="row">
						      <legend class="col-form-label col-sm-2 pt-0">Selecione:</legend>
						      <div class="col-sm-10">
						        <div class="form-check">
						          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
						          <label class="form-check-label" for="gridRadios1">
						            Aluno
						          </label>
						        </div>
						        <div class="form-check">
						          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
						          <label class="form-check-label" for="gridRadios2">
						            Professor
						          </label>
						        </div>
						      </div>
						    </div>
  						</fieldset>
						<br>
					  <button type="submit" class="btn btn-primary">Entrar</button>
					  Nao possui conta ?  
					  	<a href="cadastro.php">clique aqui e cadastre-se.</a>
					</form>
				</div>
		</div>
	
<?php include(FOOTER); ?>