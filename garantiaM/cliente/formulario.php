<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/model/ClienteModel.php";
$clienteModel = new ClienteModel();
$acao = "create";
?>

<div class="row">
	<div class="col-sm-8">
		<b><font size="4px"> --- Cadastro de clientes --- </font></b><br>
	</div>
</div>

<form method="post" id="formclientefinal" enctype="multipart/form-data" action="/garantiaM/controller/ClienteController.php?acao=<?=$acao?>">
	
	<div class="row">
		<div class="col-sm-8">		
			<b><font size="4px"> Nome do cliente:   </font></b><input class="form-control" class="fonte" type="text" placeholder="Nome" name="nomeCliente" autocomplete="off" required>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">		
			<b><font size="4px"> CPF do cliente:   </font></b><input class="form-control" class="fonte" type="text" placeholder="CPF" name="CPF" id="cpf" autocomplete="off" required><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">					
			<input class="btn btn-default btn-lg" class="fonte" type="submit"></button>
		</div>
	</div>
	<br><br>
</form>

<div class="row">
	<div class="col-sm-8">
		<b><font size="4px"> --- Cadastro de frotistas --- </font></b><br>
	</div>
</div>

<form method="post" id="formfrotista" enctype="multipart/form-data" action="/garantiaM/controller/ClienteController.php?acao=<?=$acao?>">
	
	<div class="row">
		<div class="col-sm-8">		
			<b><font size="4px"> Nome do frotista:   </font></b><input class="form-control" class="fonte" type="text" placeholder="Nome" name="nomeCliente" autocomplete="off" required>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">		
			<b><font size="4px"> CNPJ do frotista:   </font></b><input class="form-control" class="fonte" type="text" placeholder="CNPJ" name="CNPJ" id="cnpj" autocomplete="off" required><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">					
			<input class="btn btn-default btn-lg" class="fonte" type="submit"></button>
		</div>
	</div>
</form>

<script type='text/javascript'>
	jQuery(function($){
		$('#cpf').mask('999.999.999-99');
	});

	jQuery(function($){
		$('#cnpj').mask('99.999.999/9999-99');
	});

</script>
