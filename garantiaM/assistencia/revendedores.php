<?php
session_start();

if(isset($_SESSION["nomeRevendedor"]) != "COMINAS"){
	header ("Location: /garantiaM/login.php");
	exit();
}

ob_start(); 
require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/model/RevendedorModel.php";
$revendedorModel = new RevendedorModel();
$acao = "cadastro";
?>

<form method="post" id="formrevendedor" enctype="multipart/form-data" action="/garantiaM/controller/RevendedorController.php?acao=<?=$acao?>">
	<div class="row">
		<div class="col-sm-8">		
			<b><font size="4px"> Nome do revendedor:   </font></b><input class="form-control" class="fonte" type="text" placeholder="Nome" name="nomeRevendedor" autocomplete="off" required><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">		
			<b><font size="4px"> CNPJ do revendedor:   </font></b><input class="form-control" class="fonte" type="text" placeholder="CNPJ" name="CNPJ" id="cnpj" autocomplete="off" required maxlength="14"><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">					
			<input class="btn btn-default btn-lg" class="fonte" type="submit"></button>
		</div>
	</div>
</form>

<script type="text/javascript">
	jQuery(function($){
		$("#cnpj").mask("99.999.999/9999-99");
	});
</script>

<?php  
	$conteudo = ob_get_contents();
	ob_end_clean();
	$titulo = "Consulta";
	include "../layout.php";
?>