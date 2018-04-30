<?php
	require_once 'config/config.php'; 
	require_once 'controller/functions.php'; 

	if(!isset($_SESSION)){
    	session_start();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema Educa+</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		  <a class="navbar-brand" href="#">E+</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		    	<?php if(empty($_SESSION['cpf'])) :?>
		      <li class="nav-item active">

		        <a class="nav-link" href="#">Ínicio <span class="sr-only">(current)</span></a>
		        <?php endif; ?>
		      </li>
		    	<?php if(!empty($_SESSION['cpf'])) :?>
				<ul class="navbar-nav mr-auto">
			       <li class="nav-item active">
			        <a class="nav-link" href="principal.php">Principal</a>
			      </li>
			    </ul>

			    <ul class="nav navbar-nav ml-auto">
			       <li class="nav-item active">
			        <a class="nav-link" href="relatorios.php">Relatorio</a>
			      </li>
			    </ul>	    
		       <ul class="nav navbar-nav ml-auto">
			       <li class="nav-item active">
			        <a class="nav-link" href="principal.php?sair=true">Sair</a>
			      </li>
			    </ul>
			    <?php endif; ?>
		    </ul>
		  </div>
	</nav>
	
</body>
</html>