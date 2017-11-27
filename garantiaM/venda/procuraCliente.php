<?php 
	require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/model/ClienteModel.php";
	$clienteModel = new ClienteModel();

	$cpf = $_GET["CPF"];

	$cpf = str_replace(".", "", $cpf);
	$cpf = str_replace("-", "", $cpf);

	$resultado = $clienteModel->consultaCliente($cpf);

	if($resultado == NULL){
		echo "<script type='text/javascript'> alert('Este cliente ainda não está cadastrado no nosso banco de dados!'); </script>";
		echo "<script>location.href = '/garantiaM/venda/index.php';</script>";
	}else{ ?>

<input class="form-control" class="fonte" type="text" autocomplete="off" required name="nomeCliente" value="<?=$resultado["nomeCliente"]?>" readonly><br>

<?php }?>
