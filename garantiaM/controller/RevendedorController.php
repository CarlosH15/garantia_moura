<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/model/RevendedorModel.php";

$revendedorModel = new RevendedorModel();

$acao = $_GET["acao"];

if($acao == "cadastro"){
	$nome = $_POST["nomeRevendedor"];
	$cnpj = $_POST["CNPJ"];

	$cnpj = str_replace(".", "", $cnpj);
	$cnpj = str_replace("-", "", $cnpj);
	$cnpj = str_replace("/", "", $cnpj);

	$nome = strtoupper($nome);

	$revendedorModel->inserir($nome, $cnpj);
	echo "<script type='text/javascript'> alert('Revendedor inserido no banco!'); </script>";
	echo "<script>location.href='/garantiaM/assistencia/revendedores/login.php'</script>";
}else if($acao == "login"){

	$cnpj = $_POST["cnpjRevendedor"];
	$senha = $_POST["senha"];

	$cnpj = str_replace(".", "", $cnpj);
	$cnpj = str_replace("-", "", $cnpj);
	$cnpj = str_replace("/", "", $cnpj);

	$revendedor = $revendedorModel->autenticacao($cnpj);

	if($revendedor == false){
		echo "<script type='text/javascript'> alert('Este CNPJ não tem acesso ao nosso portal, favor entrar em contato para efetuarmos o cadastro!'); </script>";
		echo "<script>location.href='/garantiaM/login.php'</script>";
	}else{
		if($revendedor["senhaRevendedor"] == NULL){ //existe o revendedor mas ainda não tem senha
			echo "<script type='text/javascript'> alert('Sua senha a partir de agora é: $senha'); </script>";
			$revendedorModel->editar($cnpj, $senha);
			session_start();
			$_SESSION["nomeRevendedor"] = $resultado["nomeRevendedor"];
			$_SESSION["idRevendedor"] = $resultado["idRevendedor"];

			echo "<script>location.href='/garantiaM/index.php'</script>";			
		}else{ //existe o revendedor e tem senha
			$resultado = $revendedorModel->login($cnpj, $senha);
			if($resultado == false){ //revendedor e/ou senha incorretos
				echo "<script type='text/javascript'> alert('Usuário ou senha inválidos!'); </script>";
				echo "<script>location.href='/garantiaM/login.php'</script>";
			}else{ // revendedor e senha corretos
				if ($revendedor["nomeRevendedor"] == "COMINAS") { // administrador
					session_start();
					$_SESSION["nomeRevendedor"] = $resultado["nomeRevendedor"];
					$_SESSION["idRevendedor"] = $resultado["idRevendedor"];

					echo "<script>location.href='/garantiaM/assistencia/index.php'</script>";
				}else{ // comum
					session_start();
					$_SESSION["nomeRevendedor"] = $resultado["nomeRevendedor"];
					$_SESSION["idRevendedor"] = $resultado["idRevendedor"];

					echo "<script>location.href='/garantiaM/index.php'</script>";
				}
			}

		}
	}}else if($acao == "logout"){
		session_start();
		session_destroy();
		header ("Location: ../login.php");
		exit();
	}

	?>
