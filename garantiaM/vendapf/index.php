<?php

session_start();

if(isset($_SESSION["idRevendedor"]) == false){
	header ("Location: /garantiaM/login.php");
	exit();
}

	ob_start();
?>
	<div id="formulario">
		<?php include "formulario.php"; ?>
	</div>

<?php
	$conteudo = ob_get_contents();
	ob_end_clean();
	$titulo = "Venda para cliente final";
	include '../layout.php';
?>