<?php 

session_start();

if(isset($_SESSION["nomeRevendedor"]) != "COMINAS"){
	header ("Location: /garantiaM/login.php");
	exit();
}

ob_start(); 

$acao = "consulta";

?>

<form method="get" id="formconsulta" action="/garantiaM/assistencia/resultado.php">
	<div class="row">
		<div class="col-sm-8">		
			<b><font size="4px"> Utilize os campos de pesquisa para encontrar a venda necessária. </font></b><br><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8">
			<b><font size="4px"> Selecione o tipo de cliente a ser pesquisado: </font></b><br>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-4">
			<select id="opcCliente" class="form-control">
				<option disabled selected>...</option>
				<option value="cliente">Cliente Final</option>
				<option value="frotista">Frotista</option>
			</select>
		</div>
	</div>

	<br><b><font size="4px"> Código da bateria: </font></b>

	<div class="row">
		<div class="col-sm-5">	
			<input class="form-control" class="fonte" type="text" placeholder="Código" id="codigo" name="codigo" required><br>
		</div>
		<fieldset>
			<div class="col-sm-4">					
				<input class="btn btn-default btn-md" class="fonte" type="submit" value="Pesquisar"></button>
			</div>
		</fieldset>
	</div>

	<div id="resultado"></div>
</form>


</div>

<script type="text/javascript">
	
	$("#formconsulta").on("submit", function(event) {
		event.preventDefault();

		$.ajax({
			url: $("#formconsulta").attr("action"),
			method: $("#formconsulta").attr("method"),
			success: function(){
				$("#resultado").load("resultado.php?codigoPesquisa="+$('#codigo').val()+"&opcCliente="+$('#opcCliente').val());
			}
		})
	});

	jQuery(function($){
		$('#codigo').mask('a-99/99/99-a9-9999');
	});

</script>

<?php  
$conteudo = ob_get_contents();
ob_end_clean();
$titulo = "Consulta";
include "../layout.php";
?>