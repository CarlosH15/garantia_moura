<?php

session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/model/VendaModel.php";

$vendaModel = new VendaModel();

$tipoCliente = $_GET["tipoCliente"];

if($tipoCliente == "pf"){
	$registro = $_POST["CPF"];
	$registro = str_replace(".", "", $registro);
	$registro = str_replace("-", "", $registro);
}else if($tipoCliente == "pj"){
	$registro = $_POST["CNPJ"];
	$registro = str_replace(".", "", $registro);
	$registro = str_replace("-", "", $registro);
	$registro = str_replace("/", "", $registro);
}

$diretorio = "../upload/";
$idRevendedor = $_SESSION["idRevendedor"];
$modeloBateria = $_POST["modelo"];
$codigoBateria = $_POST["codigoBateria"];
$placa = $_POST["placa"];
$numeroNF = $_POST["numeroNF"];
$dataVenda = $_POST["dataVenda"];
$imagem1 = $_FILES['imagem1'];
$imagem2 = $_FILES['imagem2'];
$imagem3 = $_FILES['imagem3'];

$codigoBateria = strtoupper($codigoBateria);
$placa = strtoupper($placa);

$placa = str_replace("-", "", $placa);

$codigoBateria = str_replace("/", "", $codigoBateria);
$codigoBateria = str_replace("-", "", $codigoBateria);

$dataVenda = date("Y-m-d",strtotime(str_replace('/','-',$dataVenda)));

$extensao1 = strtolower(substr($_FILES['imagem1']['name'], -4));

$extensao2 = strtolower(substr($_FILES['imagem2']['name'], -4));

$extensao3 = strtolower(substr($_FILES['imagem3']['name'], -4));

if(isset($_FILES['imagem1']) && isset($_FILES['imagem2']) && isset($_FILES['imagem3'])){
	if((strcmp($extensao1, '.jpg') == 0 || strcmp($extensao1, '.png') == 0 || strcmp($extensao1, '.gif') == 0 || strcmp($extensao1, '.pdf') == 0) && 
		(strcmp($extensao2, '.jpg') == 0 || strcmp($extensao2, '.png') == 0 || strcmp($extensao2, '.gif') == 0 || strcmp($extensao2, '.pdf') == 0) &&
		(strcmp($extensao3, '.jpg') == 0 || strcmp($extensao3, '.png') == 0 || strcmp($extensao3, '.gif') == 0 || strcmp($extensao3, '.pdf') == 0)){

		$novo_nome1 = $numeroNF . "1" . md5(time()) . $extensao1;
	$novo_nome2 = $numeroNF . "2" . md5(time()) . $extensao2;
	$novo_nome3 = $numeroNF . "3" . md5(time()) . $extensao3;

	move_uploaded_file($_FILES['imagem1']['tmp_name'], $diretorio.$novo_nome1);
	move_uploaded_file($_FILES['imagem2']['tmp_name'], $diretorio.$novo_nome2);
	move_uploaded_file($_FILES['imagem3']['tmp_name'], $diretorio.$novo_nome3);

	$vendaModel->inserir($idRevendedor, $registro, $modeloBateria, $dataVenda, $placa, $numeroNF, $codigoBateria, $novo_nome1, $novo_nome2, $novo_nome3, $tipoCliente);
}else{
	echo "<script type='text/javascript'> alert('Alguma das extensões não conferem'); </script>";
	echo "<script>location.href = '../index.php';</script>";
}
}

echo "<script type='text/javascript'> alert('Venda cadastrada com sucesso'); </script>";
echo "<script>location.href = '../index.php';</script>";

?>