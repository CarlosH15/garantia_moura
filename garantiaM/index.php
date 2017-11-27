<?php 
	session_start();

	if(isset($_SESSION["idRevendedor"]) == false){
		header ("Location: login.php");
		exit();
	}

	ob_start(); 
?>

<div class="row">
	<div class="offset-sm-1 col-sm-8 offset-sm-1">
		<p> Você está logado como <?php echo $_SESSION["nomeRevendedor"] ?>.</p>
		<p> Seja bem-vindo ao programa de cadastro de vendas com garantia estendida da Cominas - Filial da baterias Moura em Patos de Minas.</p>
	</div>
</div>


<?php

$conteudo = ob_get_contents();
ob_end_clean();
$titulo = "Cominas - Comercial Minas de Baterias";
include "/layout.php";
?>