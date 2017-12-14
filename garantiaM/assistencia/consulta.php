<?php 

session_start();

if(isset($_SESSION["nomeRevendedor"]) != "COMINAS"){
	header ("Location: /garantiaM/index.php");
	exit();
}

ob_start(); 

?>

<form method="post" id="formconsulta" action="/garantiaM/assistencia/resultado.php">
	<div class="row">
		<div class="col-sm-8">		
			<b><font size="5px"> Utilize o campo de pesquisa para encontrar a venda necessária. </font></b>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<br><b><font size="4px"> Código da bateria: </font></b>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-5">
			<input class="form-control" class="fonte" type="text" placeholder="Código" id="CodBateria" name="codigoBateria" autocomplete="off" required maxlength="15">
		</div>
		<fieldset>
			<div class="col-sm-4">					
				<input class="btn btn-default btn-md" class="fonte" id="sera" type="button" value="Pesquisar"></button>
			</div>
		</fieldset>
	</div>

	<div id="resultado"></div>
</form>

</div>

<script>
	$("#formconsulta").on("submit" ,function(event) {
	 		 event.preventDefault();

	 		 $.ajax({
	 		 	url: $("#formconsulta").attr("action"),
	 		 	method: $("#formconsulta").attr("method"),
	 		 	data: $("#formconsulta").serialize(),
	 		 	success: function(data){
	 		 		$("#resultado").html(data);
	 		 	}
	 		 })
	  	});
</script>

<?php  
$conteudo = ob_get_contents();
ob_end_clean();
$titulo = "Consulta";
include "../layout.php";
?>