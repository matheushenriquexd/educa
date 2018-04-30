<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php';

	session_start();
	adicionar_pergunta();
?>

<?php include(HEADER); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-5 offset-sm-3">
			<form action="gerenciaratividade.php" method="get">
			<div class="form-group">
			    <label for="exampleFormControlTextarea1">Enunciado</label>
			    <textarea class="form-control" name="enunciado" id="exampleFormControlTextarea1" placeholder="Digite aqui o enunciado da questao" rows="3"></textarea>
			  </div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="select" id="exampleRadios1" value="0" checked>
			  <label class="form-check-label" for="exampleRadios1">
			    <div class="form-group">
			    <label for="exampleInputEmail1">Alternativa 1</label>
			    <input style="display:inline-block" name="a1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite aqui a primeira alternativa">
			   
			  </div>
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="select" id="exampleRadios1" value="1">
			  <label class="form-check-label" for="exampleRadios1">
			    <div class="form-group">
			    <label for="exampleInputEmail1">Alternativa 2</label>
			    <input  style="display:inline-block" name="a2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite aqui a segunda alternativa">
			  </div>
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="select" id="exampleRadios1" value="2" >
			  <label class="form-check-label" for="exampleRadios1">
			    <div class="form-group">
			    <label for="exampleInputEmail1">Alternativa 3</label>
			    <input  style="display:inline-block"  name="a3" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite aqui a terceira alternativa">
			   
			  </div>
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="select" id="exampleRadios1" value="3" >
			  <label class="form-check-label" for="exampleRadios1">
			    <div class="form-group">
			    <label for="exampleInputEmail1">Alternativa 4</label>
			    <input  style="display:inline-block"  name="a4" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite aqui a quarta alternativa">
			  
			  </div>
			  </label>
			</div>
			 	<input type="hidden" name="idatividade" value=<?php echo($_GET['idatividade']) ?>>
			   <small id="emailHelp" class="form-text text-muted">* Selecione a alternativa correta.</small>
	
				<br>
			  <button type="submit" class="btn btn-primary">Adicionar</button>
			  </form>
	</div>
		</div>
</div>			

<?php include(FOOTER); ?>