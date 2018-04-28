
<?php
	require_once 'config/config.php'; 
	require_once FUNCTIONS; 
	
	cadastrar_professor_aluno();

?>
<?php include(HEADER); ?>
	<div class="container">
		<div class="row">
				<div class="col-sm-5 offset-sm-3">
						<form action="cadastro.php" method="post">

						 <div class="form-group">
					    <label for="exampleInputEmail1">Nome</label>
					    <input class="form-control" id="exampleInputEmail1" name="dados['nome']" placeholder="Digite seu nome...">
					    <label for="exampleInputEmail1">CPF</label>
					    <input  class="form-control"  name="dados['cpf']" placeholder="Digite seu cpf...">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Senha</label>
						    <input type="password" class="form-control" name="dados['senha']" id="exampleInputPassword1" placeholder="Digite sua senha...">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Confirme sua senha</label>
						    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha novamente...">
						  </div>
						<fieldset class="form-group">
						    <div class="row">
						      <legend class="col-form-label col-sm-2 pt-0">Selecione:</legend>
						      <div class="col-sm-10">
						        <div class="form-check">
						          <input class="form-check-input" name="aluno" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
						          <label class="form-check-label" for="gridRadios1">
						            Aluno
						          </label>
						        </div>
						        <div class="form-check">
						          <input class="form-check-input" name="professor" type="radio" name="gridRadios" id="gridRadios2" value="option2">
						          <label class="form-check-label" for="gridRadios2">
						            Professor
						          </label>
						        </div>
						      </div>
						    </div>
  						</fieldset>
						<br>
						<div class="form-group">
					     <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
					  </div>
					
					</form>
				</div>
		</div>
	
<?php include(FOOTER); ?>