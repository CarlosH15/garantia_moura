<?php ob_start(); 

$acao = "login";

?>

<form method="post" id="formlogin" action="/garantiaM/controller/RevendedorController.php?acao=<?=$acao?>">
	<div class="row">
		<div class="col-sm-8">		
			<b><font size="4px"> Atenção! Caso você ainda não tenha acessado este portal nenhuma vez, sua primeira senha digitada será usada também nas próximas sessões. </font></b><br><br>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-4">		
			<b><font size="4px"> CNPJ:   </font></b><input class="form-control" class="fonte" type="text" placeholder="CNPJ" id="cnpj" name="cnpjRevendedor" required><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">		
			<b><font size="4px"> Senha:   </font></b><input class="form-control" class="fonte" type="password" placeholder="Senha" name="senha" required><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">					
			<input class="btn btn-default btn-lg" class="fonte" type="submit"></button>
		</div>
	</div>
</form>


</div>


<script type="text/javascript">

	jQuery(function($){
		$("#cnpj").mask("99.999.999/9999-99");
	});

</script>

<?php  
$conteudo = ob_get_contents();
ob_end_clean();
$titulo = "Login";
include "layout.php";
?>