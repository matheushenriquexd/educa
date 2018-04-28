<?php 

	function salvar_professor_aluno($dados = null, $table = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		try{
			$sql = "INSERT into $table (nome,cpf,senha) values "."($dados)";
			$res = $mysqli->query($sql);
			header('location: index.php');

		} catch (Exception $e) { 
			echo("erro");
		 
		} 
		
	}


	function aluno_turma($idturma = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "select * from turmaxaluno where id=$idturma";
		global $id_turma;
		$id_turma = $idturma;
		$res = $mysqli->query($sql);
		if($res->num_rows != 0){
			global $resposta;

			$resposta = $res;
			
		}else{
			echo("123");
		}
	}


	function verificar_login($cpf = null, $senha = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "SELECT * from  professores where cpf = '$cpf' and senha = '".$senha."'";
		$res = $mysqli->query($sql);
        $count = $res->num_rows;
		if($count != 0){
			while ($row = $res->fetch_assoc()) {
				   session_start();
		           $_SESSION['nome'] = $row["nome"];
		    }
			return true;
	     }else{
	     	return false;
	     }
	}


	function lista_turma($cpf = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "select * from professores,turma where professores.cpf = '".$cpf."' and professores.cpf = turma.professor ";
		$res = $mysqli->query($sql);
		if($res->num_rows != 0){
			
			return $res;
			
		}else{
			return null;
		}
	}


	function criarturma($cpf = null, $ano = null, $descricao = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "insert into turma(ano,descricao,id,professor) values ($ano,'$descricao',654, '$cpf')";
		$res = $mysqli->query($sql);
		if($res){	
			header('location: principal.php');
			
		}else{
			echo("n deu certto");
		}
	}



	function exluirturmabd($id = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "delete from turma where id = $id";
		$res = $mysqli->query($sql);
		if($res){	
			header('location: principal.php');
		}
	}


	function validar_login($cpf = null, $senha = null){

		try{
			
			if(verificar_login($cpf,md5($senha))){
				session_start();
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


	function lista_de_alunos(){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "SELECT cpf,nome FROM alunos";
		$res = $mysqli->query($sql);
		global $alunos;
		if($res->num_rows != 0){
			$alunos = $res;

		}else{
		}
	}



	function adicionar_aluno_na_turma($idturma = null, $cpfaluno = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "insert into turmaxaluno(aluno,id) values ('$cpfaluno',$idturma);";
		$res = $mysqli->query($sql);
		if($res){	
			header('location: gerenciarturma.php?idturma='.$idturma);
			
		}else{
			echo($sql);
		}
	}



	

?>