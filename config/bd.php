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
		$sql = "SELECT * from  professores where cpf = '$cpf' and senha = '".$senha."'";
		$res = $mysqli->query($sql);
        $count = $res->num_rows;
		if($count != 0){
			return true;
	     }else{
	     	return false;
	     }
	}



	function validar_login($cpf = null, $senha = null){
		try{
			
			if(verificar_login($cpf,md5($senha))){
				$_SESSION['cpf'] = $cpf;
				$_SESSION['senha'] = md5($senha);

			}
			else{
				echo("nao deu certo");
			}


		} catch (Exception $e) { 
			echo("erro");
		 
		} 
	}



	

?>