<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 
	session_start();
	lista_alunos();

	adicionar_aluno_turma();

?>


<?php include(HEADER); ?>

<div class="container">
		<div class="row">
				<div class="col-sm-5 offset-sm-3">
						<form action="adicionaraluno.php" method="get">
						<div class="form-group">
						    <label for="exampleFormControlSelect1">Aluno</label>
						    <select name="cpf" class="form-control" id="exampleFormControlSelect1">
						    	<?php  while($row = $alunos->fetch_assoc()) :?>
						      		<option value=<?php echo($row['cpf']) ?>> <?php echo($row['cpf'].'-'.$row['nome']) ?></option>
						       <?php endwhile; ?>
						      <option value="" selected disabled hidden>Selecione o aluno</option>
						    </select>
						    <input type="hidden" name="idturma" value=<?php echo($_GET['idturma']) ?>>
						  </div>
					     <button type="submit" class="btn btn-primary form-control">Adicionar</button>
					  </div>
					
					</form>
				</div>
		</div>

</div>
<?php include(FOOTER); ?>