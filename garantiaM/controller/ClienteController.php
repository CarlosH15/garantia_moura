<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/model/ClienteModel.php";

$clienteModel = new ClienteModel();

$acao = $_GET["acao"];

if($acao == "create"){

	if(isset($_POST["CPF"])){
		$nomeCliente = $_POST["nomeCliente"];
		$cpf = $_POST["CPF"];
		$cpf = str_replace(".", "", $cpf);
		$cpf = str_replace("-", "", $cpf);
		$resultado = $clienteModel->consultaCliente($cpf, "Final");
	}

	if(isset($_POST["CNPJ"])){
		$nomeCliente = $_POST["nomeFrotista"];
		$cnpj = $_POST["CNPJ"];
		$cnpj = str_replace("-", "", $cnpj);
		$cnpj = str_replace("/", "", $cnpj);
		$cnpj = str_replace(".", "", $cnpj);
		$resultado = $clienteModel->consultaCliente($cnpj, "Frotista");
	}

	if($resultado == NULL){
		if(isset($cnpj)){
			$clienteModel->inserir($nomeCliente, $cnpj, "Frotista");
			echo "<script type='text/javascript'> alert('Frotista cadastrado com sucesso!'); </script>";
		}else if(isset($cpf)){
			$clienteModel->inserir($nomeCliente, $cpf, "Final");
			echo "<script type='text/javascript'> alert('Cliente cadastrado com sucesso!'); </script>";
		}
		echo "<script>location.href = '/garantiaM/cliente/index.php';</script>";
	}else{
		echo "<script type='text/javascript'> alert('Este cliente já está cadastrado no nosso banco de dados!'); </script>";
		echo "<script>location.href = '/garantiaM/cliente/index.php';</script>";
	}

}


?>