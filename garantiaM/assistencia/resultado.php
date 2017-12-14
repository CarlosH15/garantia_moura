<?php 

require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/model/VendaModel.php";

$vendaModel = new VendaModel();

$codigoPesquisa = $_POST['codigoBateria'];

$codigoPesquisa = str_replace("-", "", $codigoPesquisa);
$codigoPesquisa = str_replace("/", "", $codigoPesquisa);

$codigoPesquisa = strtoupper($codigoPesquisa);

$dados = $vendaModel->consultar($codigoPesquisa);



echo "

<br>
<div class='row'>
	<div class='col-sm-8'>		
		<b><font size='4px'> Resultados da pesquisa: </font></b><br><br>
	</div>
</div>

<div class='row'>
	<div class='col-sm-8'>
		<b><font size='4px'> Nome do cliente: </font></b><input class='form-control' class='fonte' type='text' value='$dados[nomeCliente]' readonly>
	</div>
</div>

<div class='row'>
	<div class='col-sm-8'>
		<b><font size='4px'> Nome do revendedor: </font></b><input class='form-control' class='fonte' type='text' value='$dados[nomeRevendedor]' readonly>
	</div>
</div>

<div class='row'>
	<div class='col-sm-8'>
		<b><font size='4px'> Modelo da bateria: </font></b><input class='form-control' class='fonte' type='text' value='$dados[descricaoBateria]' readonly>
	</div>
</div>

<div class='row'>
	<div class='col-sm-8'>
		<b><font size='4px'> Código da bateria: </font></b><input class='form-control' class='fonte' type='text' value='$dados[codigoBateria]' readonly>
	</div>
</div>

<div class='row'>
	<div class='col-sm-8'>
		<b><font size='4px'> Data da compra: </font></b><input class='form-control' class='fonte' type='text' value='$dados[dataVenda]' readonly>
	</div>
</div>

<br>

<div class='row'>
	<div class='col-sm-8'>
		<fieldset>
			<b><font size='4px'>&nbsp Download cartão de garantia. </font></b>
			<a href='../upload/$dados[caminho1]' download>
				<img src='../img/download.png' width='30px' style='float : left;'>
			</a>
		</fieldset>
	</div>
</div>

<div class='row'>
	<div class='col-sm-8'>
		<fieldset>
			<b><font size='4px'>&nbsp Download código da bateria. </font></b>
			<a href='../upload/$dados[caminho2]' download>
				<img src='../img/download.png' width='30px' style='float : left;'>
			</a>
		</fieldset>
	</div>
</div>

<div class='row'>
	<div class='col-sm-8'>
		<fieldset>
			<b><font size='4px'>&nbsp Download nota/cupom fiscal. </font></b>
			<a href='../upload/$dados[caminho3]' download>
				<img src='../img/download.png' width='30px' style='float : left;'>
			</a>
		</fieldset>
	</div>
</div>

";



?>