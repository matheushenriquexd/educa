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

	function marcar_respostas($quant){
		$corretas = 0;
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		for($i = 1; $i <= $quant ; $i++){
			$sql = "select * from alternativa where id=".$_GET['questao'.$i];
			$res = $mysqli->query($sql);
			if($res->num_rows != 0){
			
			while ($row = $res->fetch_assoc()) {
				   if ($row['correta'] == 1){
				   		$corretas++;
				   }

		    }

		}

	}


	$sql = "insert into rendimento(cpf_aluno,id_exercicio,acertos) values ('".$_SESSION['cpf']."',".$_GET['idexercicio'].",$corretas)";
	$res = $mysqli->query($sql);
}



	function verificar_aluno_exec_feito(){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "select * from rendimento where cpf_aluno='".$_SESSION['cpf']."' and id_exercicio=".$_GET['idexercicio'];
		$res = $mysqli->query($sql);
		echo($sql);
		if($res->num_rows != 0){
			return true;
			
		}else{
			return false;
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


	function verificar_login($cpf = null, $senha = null, $classe = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "SELECT * from  $classe where cpf = '$cpf' and senha = '".$senha."'";
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


	function lista_atividades_turma($idturma = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "SELECT * from  exercicio where id_turma=$idturma";
		$res = $mysqli->query($sql);
		global $lista_exerc;
		if($res->num_rows != 0){
			$lista_exerc = $res;
			
		}
	}


	function lista_turma($cpf = null, $classe = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		if($classe == "professores"){
			$sql = "select * from professores,turma where professores.cpf = '".$cpf."' and professores.cpf = turma.professor ";
		}else{
			$sql = "SELECT * FROM turmaxaluno,turma where turmaxaluno.aluno ='$cpf' and turmaxaluno.id = turma.id ";
		}
		
		$res = $mysqli->query($sql);
		if($res->num_rows != 0){
			
			return $res;
			
		}else{
			return null;
		}
	}


	function criarturma($cpf = null, $ano = null, $descricao = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "insert into turma(ano,descricao,id,professor) values ($ano,'$descricao',6524, '$cpf')";
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


	function validar_login($cpf = null, $senha = null, $classe = null){

		try{
			
			if(verificar_login($cpf,md5($senha), $classe)){
				session_start();
				$_SESSION['cpf'] = $cpf;
				$_SESSION['senha'] = md5($senha);
				$_SESSION['classe'] = $classe;


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

	function lista_exercicio($idexercicio = null){
		$mysqli = new mysqli("localhost", "root","","dbeduca");
		$sql = "select * from pergunta,alternativa where alternativa.id_pergunta=pergunta.id and pergunta.id_exercicio = '$idexercicio'";
		$res = $mysqli->query($sql);
		global $exercicios;
		if($res->num_rows != 0){	
			
			$exercicios = $res;
			
		}else{
			return null;
		}
	}




	

?>