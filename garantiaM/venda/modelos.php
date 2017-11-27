<?php 
	require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/model/VendaModel.php";
	$vendaModel = new VendaModel();
?>
	<select class="form-control" name="modelo">
	<option disabled selected>Selecione o modelo...</option>
<?php
	$familia = $_GET["familia"];
	$baterias = $vendaModel->listarBaterias($familia);
		foreach ($baterias as $b) : ?>
			<option value="<?= $b["modeloBateria"]?>"><?= $b["modeloBateria"]?></option>
<?php endforeach; ?>
	</select>