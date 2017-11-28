<?php 
	require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/model/ClienteModel.php";
	$clienteModel = new ClienteModel();

	$cnpj = $_GET["CNPJ"];

	$cnpj = str_replace(".", "", $cnpj);
	$cnpj = str_replace("-", "", $cnpj);
	$cnpj = str_replace("/", "", $cnpj);

	$resultado = $clienteModel->consultaCliente($cnpj, "Frotista");

	if($resultado == NULL){
		echo "<script type='text/javascript'> alert('Este frotista ainda não está cadastrado no nosso banco de dados!'); </script>";
		echo "<script>location.href = '/garantiaM/vendapj/index.php';</script>";
	}else{ ?>

<input class="form-control" class="fonte" type="text" autocomplete="off" required name="nomeCliente" value="<?=$resultado["nomeCliente"]?>" readonly><br>

<?php }?>
