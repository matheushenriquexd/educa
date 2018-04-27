<?php 

	function salvar_professor($dados = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		try{
			$sql = "INSERT into professores (nome,cpf,senha) values "."($dados)";
			$res = $mysqli->query($sql);
			header('location: index.php');

		} catch (Exception $e) { 
			echo("erro");
		 
		} 
		
	}


	function verificar_login($cpf = null, $senha = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		try{
			$sql = "SELECT * from  professores where cpf = '$cpf'";
			$res = $mysqli->query($sql);
			$count = $res->num_rows;
			
			if($count != 0){
				echo("dfasdas");
			}else{
				echo("nao deu certo");
			}


		} catch (Exception $e) { 
			echo("erro");
		 
		} 
	}


?>