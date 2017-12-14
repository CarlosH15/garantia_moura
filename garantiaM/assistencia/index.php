<?php

session_start();

if(isset($_SESSION["nomeRevendedor"]) != "COMINAS"){
	header ("Location: /garantiaM/login.php");
	exit();
}

ob_start();
?>

<div class="row">
	<div class="offset-sm-1 col-sm-8 offset-sm-1">
		<p> Painel gerencial - Escolha uma opção</p>
	</div>
</div>

<div class="row">
	<div class="offset-sm-1 col-sm-8 offset-sm-1">
		<form action="/garantiaM/assistencia/consulta.php">
			<input class="btn btn-default" type="submit" value="Consulta dados de venda"><br><br>
		</form>
	</div>
</div>
<div class="row">
	<div class="offset-sm-1 col-sm-8 offset-sm-1">
		<form action="/garantiaM/assistencia/revendedores.php">
			<input class="btn btn-default" type="submit" value="Cadastro de revendedores"><br><br>
		</form>
	</div>
</div>
<div class="row">
	<div class="offset-sm-1 col-sm-8 offset-sm-1">
		<form action="/garantiaM/cliente/index.php">
			<input class="btn btn-default" type="submit" value="Cadastro de clientes"><br><br>
		</form>
	</div>
</div>
<div class="row">
	<div class="offset-sm-1 col-sm-8 offset-sm-1">
		<form action="/garantiaM/vendapf/index.php">
			<input class="btn btn-default" type="submit" value="Cadastro de venda para PF"><br><br>
		</form>
	</div>
</div>
<div class="row">
	<div class="offset-sm-1 col-sm-8 offset-sm-1">
		<form action="/garantiaM/vendapj/index.php">
			<input class="btn btn-default" type="submit" value="Cadastro de venda para PJ"><br><br>
		</form>
	</div>
</div>

<?php
$conteudo = ob_get_contents();
ob_end_clean();
$titulo = "Painel gerencial";
include '../layout.php';
?>