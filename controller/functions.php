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
			verificar_login($_POST['cpf'], $_POST['senha']);
		}
	}


?>