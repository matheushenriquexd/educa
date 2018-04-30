<?php 


	function executar_sql($sql = null){
		if (empty($mysqli)) {
			$mysqli = new mysqli("localhost", "root","","dbteste");
		}
		
		return $mysqli->query($sql);
	}

	function salvar_professor_aluno($dados = null, $table = null){
		
		try{
			executar_sql("INSERT into $table (nome,cpf,senha) values "."($dados)");
			
			header('location: index.php');

		} catch (Exception $e) { 
			echo("erro");
		 
		} 
		
	}

	function marcar_respostas($quant){
		$corretas = 0;
		for($i = 1; $i <= $quant ; $i++){
			$sql = "select * from alternativa where id=".$_GET['questao'.$i];
			$res = executar_sql($sql);
			if($res->num_rows != 0){
			
			while ($row = $res->fetch_assoc()) {
				   if ($row['correta'] == 1){
				   		$corretas++;
				   }

		    }

		}

	}


	$sql = "insert into rendimento(cpf_aluno,id_exercicio,acertos) values ('".$_SESSION['cpf']."',".$_GET['idexercicio'].",$corretas)";
	$res = executar_sql($sql);
	header('location: relatorios.php');
}



	function verificar_aluno_exec_feito(){
		$sql = "select * from rendimento where cpf_aluno='".$_SESSION['cpf']."' and id_exercicio=".$_GET['idexercicio'];
		if(executar_sql($sql)->num_rows != 0){
			return true;
			
		}else{
			return false;
		}
	}



	function adicionar_pergunta_db($idatividade = null, $enunciado = null, $alter , $select){
		$sql = "insert into pergunta(enunciado,id_exercicio) values ('$enunciado', $idatividade)";
		if(executar_sql($sql)){
			$id_pergunta;
			$correta = 0;
			$sql = "select * from pergunta where enunciado='$enunciado' and id_exercicio=$idatividade";
		    $res = executar_sql($sql);
		    while ($row = $res->fetch_assoc()) {
		    	$id_pergunta = $row['id'];
		    }


		    for($i = 0; $i < 4; $i++){
		    	if($i == $select){
		    		$correta = 1;
		    	}else{
		    		$correta = 0;
		    	}

		    	$sql = "insert into alternativa(texto_alternativa,correta,id_pergunta) values ('$alter[$i]',$correta,$id_pergunta)";
		    	executar_sql($sql);

		    }

		    echo("<div class='col-md-12'>	
				<div class='alert alert-success' role='alert'>
					  Adicionado com sucesso.
					  
			    </div>
		    </div>	");
		   

		}else{
			echo($sql);
		}
	}


	function aluno_turma($idturma = null){
		$sql = "select * from turmaxaluno where id=$idturma";
		global $id_turma;
		$id_turma = $idturma;
		$res = executar_sql($sql);
		global $resposta;
		if($res->num_rows != 0){
			

			$resposta = $res;
			
		}else{
			$resposta = null;
		}
	}


	function verificar_login($cpf = null, $senha = null, $classe = null){
		$sql = "SELECT * from  $classe where cpf = '$cpf' and senha = '".$senha."'";
		$res = executar_sql($sql);
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
		$sql = "SELECT * from  exercicio where id_turma=$idturma";
		$res = executar_sql($sql);
		global $lista_exerc;
		if($res->num_rows != 0){
			$lista_exerc = $res;
			
		}
	}


	function lista_turma($cpf = null, $classe = null){
		if($classe == "professores"){
			$sql = "select * from professores,turma where professores.cpf = '".$cpf."' and professores.cpf = turma.professor ";
		}else{
			$sql = "SELECT * FROM turmaxaluno,turma where turmaxaluno.aluno ='$cpf' and turmaxaluno.id = turma.id ";
		}
		
		$res = executar_sql($sql);
		if($res->num_rows != 0){
			
			return $res;
			
		}else{
			return null;
		}
	}


	function criarturma($cpf = null, $ano = null, $descricao = null){
		$sql = "insert into turma(ano,descricao,professor) values ($ano,'$descricao', '$cpf')";
		$res = executar_sql($sql);
		if($res){	
			header('location: principal.php');
			
		}else{
			echo("n deu certto");
		}
	}


	function listar_rendimento(){
		$sql = "select * from rendimento,exercicio where rendimento.cpf_aluno ='".$_SESSION['cpf']."' and rendimento.id_exercicio = exercicio.id ";
		$res = executar_sql($sql);
		global $rendimento;
		if($res){	
			$rendimento = $res;
			
		}else{
			$rendimento = null;
		}
	}



	function exluirturmabd($id = null){
		$sql = "delete from turmaxaluno where id = $id";
		$res = executar_sql($sql);
		if($res){	
			header('location: principal.php');
		}
	}


	function exluiratividade($id = null){
		$sql = "delete from turma where id = $id";
		$res = executar_sql($sql);
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
		$sql = "SELECT cpf,nome FROM alunos";
		$res = executar_sql($sql);
		global $alunos;
		if($res->num_rows != 0){
			$alunos = $res;

		}else{
		}
	}



	function adicionar_aluno_na_turma($idturma = null, $cpfaluno = null){
		$sql = "insert into turmaxaluno(aluno,id) values ('$cpfaluno',$idturma);";
		$res = executar_sql($sql);
		if($res){	
			header('location: gerenciarturma.php?idturma='.$idturma);
			
		}else{
			echo($sql);
		}
	}

	function lista_exercicio($idexercicio = null){
		$sql = "select * from pergunta,alternativa where alternativa.id_pergunta=pergunta.id and pergunta.id_exercicio = '$idexercicio'";
		$res = executar_sql($sql);
		global $exercicios;
		if($res->num_rows != 0){	
			
			$exercicios = $res;
			
		}else{
			return null;
		}
	}


	function criar_atividade_db($idturma = null, $nome_atividade = null){
		$sql = "insert into exercicio(id_turma, titulo) values ($idturma,'$nome_atividade')";
		$res = executar_sql($sql);
		if($res){
			header('location: gerenciarturma.php?idturma='.$idturma);
		   
		
			
		}else{
			echo($sql);
		}
	}




	

?>