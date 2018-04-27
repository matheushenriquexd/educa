<?php 
	require_once CONFIG; 
	require_once DATABASE; 
	function cadastrar_professor(){
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
			salvar_professor($dados);
		}
	}


	function verificar_cadastro(){
		if (!empty($_POST['cpf']) && !empty($_POST['senha'])) {
			validar_login($_POST['cpf'], $_POST['senha']);
		}
	}

	function deslogar(){

	}

	function verificar_usuario_logado(){
		session_start();
		if((isset($_SESSION['cpf'])) && (isset($_SESSION['senha']))){
			if(verificar_login($_SESSION['cpf'],$_SESSION['senha'])){
				echo("Verificado e confirmado");
				 header('location:principal.php');
			}else{
				 header('location:index.php');
			}
		}
				
	}


	function listaraturma(){
		global $turmas;
		$turmas = lista_turma($_SESSION['cpf']);
		
	}


?>