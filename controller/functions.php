<?php 
	require_once CONFIG; 
	require_once DATABASE; 

	global $quant_quest; 

	function cadastrar_professor_aluno(){
		if (!empty($_POST['dados'])) {
			$dados = "";
			$i = 0;
			foreach ($_POST['dados'] as $value) {
				if($i == 2){
					$value = md5($value);
				}
				$dados .= "'$value',";
				$i++;
			}
			$dados = rtrim($dados, ',');
			if(!empty($_POST['cadastro'])){
				salvar_professor_aluno($dados, $_POST['cadastro']);
				
			}
			
		}
	}


	function verificar_cadastro(){
		if (!empty($_POST['cpf']) && !empty($_POST['senha'])) {
			validar_login($_POST['cpf'], $_POST['senha'], $_POST['classe']);
		}
	}

	function criar_nova_turma(){
		if (!empty($_POST['ano']) && !empty($_POST['descricao'])) {
			  criarturma($_SESSION['cpf'],$_POST['ano'],$_POST['descricao']);
		}
	}

	function verificar_usuario_logado(){
		session_start();
		if((isset($_SESSION['cpf'])) && (isset($_SESSION['senha']))){
			if(verificar_login($_SESSION['cpf'],$_SESSION['senha'], $_SESSION['classe'])){
				echo("Verificado e confirmado");
				 header('location:principal.php');
			}else{
				 header('location:index.php');
			}
		}
				
	}


	function listaraturma(){
		global $turmas;
		$turmas = lista_turma($_SESSION['cpf'],$_SESSION['classe']);
		
	}

	function lista_aluno_turma(){
		if (!empty($_GET['idturma'])) {
			aluno_turma($_GET['idturma']);
		}
	}


	function exercicio(){
		if (!empty($_GET['idexercicio'])) {
			lista_exercicio($_GET['idexercicio']);
		}
	}


	function excluirturma(){
		if (!empty($_GET['excluirid'])) {
			exluirturmabd($_GET['excluirid']);
		}
	}


	function lista_alunos(){
		lista_de_alunos();
	}

	function lista_alternativas($id_pergunta = null){
		return alternativas($id_pergunta)->fetch_assoc();
	}


	function verificar_resposta(){

		if (!empty($_GET['q'])) {
				$quant = $_GET['q'] ;
				marcar_respostas($quant);
		}
	}


	function adicionar_aluno_turma(){
		if (!empty($_GET['idturma']) && !empty($_GET['cpf'])) {
			global $id_turma;
			$id_turma = $_GET['idturma'];
			adicionar_aluno_na_turma($_GET['idturma'],$_GET['cpf']);
		}
	}

	function verificar_exec_feito(){
		if(verificar_aluno_exec_feito()){
			header('location:relatorios.php');
		}
	}
	

	function lista_atividades_por_turma(){
		if (!empty($_GET['idturma'])) {
			lista_atividades_turma($_GET['idturma']);
		}
	}


	function rendimento_aluno(){
		listar_rendimento();
	}


	function criar_atividade(){
		if (!empty($_GET['idturma']) && !empty($_GET['nome_atividade']))  {
			criar_atividade_db($_GET['idturma'],$_GET['nome_atividade']);
		}
		
	}


	function adicionar_pergunta(){
		if (!empty($_GET['idatividade'] && !empty($_GET['enunciado'])))  {
			$alter = [4];
			$alter[0] = $_GET['a1'];
			$alter[1] = $_GET['a2'];
			$alter[2] = $_GET['a3'];
			$alter[3] = $_GET['a4'];
			adicionar_pergunta_db($_GET['idatividade'],$_GET['enunciado'],$alter,$_GET['select']);
		}
	}





?>