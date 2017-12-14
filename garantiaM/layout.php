<!DOCTYPE html>
<html lang="pt-BR">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="icon" href="/garantiaM/img/icone.ico">
	<title><?php echo $titulo; ?></title>

	<script type="text/javascript" src="/garantiaM/js/jquery.js"></script>

	<script type="text/javascript" src="/garantiaM/js/jquery-3.2.1.min.js"></script>

	<script type="text/javascript" src="/garantiaM/js/jquery.maskedinput.js"></script>

	<link rel="stylesheet" type="text/css" href="/garantiaM/style.css">

	<!-- Bootstrap Core CSS -->
	<link href="/garantiaM/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Theme CSS -->
	<link href="/garantiaM/css/freelancer.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="/garantiaM/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

	<!-- Navigation -->
	<nav  class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #F1CA34;" id="mainNav">
		<div class="container">

			<?php if(!isset($_SESSION["idRevendedor"])): ?>

				<a href="/garantiaM/index.php"><img src="/garantiaM/img/icone.jpg" width="50" height="50"/></a>

				<a class="navbar-brand js-scroll-trigger" href="/garantiaM/index.php"><strong><font color="#041040">&nbsp Programa de Garantia Estendida</font></strong></a>

			<?php endif; ?>

			<?php if(isset($_SESSION["idRevendedor"])): ?>

				<?php if($_SESSION["nomeRevendedor"] == "COMINAS"){ ?>

				<a href="/garantiaM/index.php"><img src="/garantiaM/img/icone.jpg" width="50" height="50"/></a>

				<a class="navbar-brand js-scroll-trigger" href="/garantiaM/index.php"><strong><font color="#041040">&nbsp COMINAS</font></strong></a>

				<?php }else{ ?>

				<a href="/garantiaM/index.php"><img src="/garantiaM/img/rpm.png" width="102" height="50"/></a>

				<a class="navbar-brand js-scroll-trigger" href="/garantiaM/index.php"><strong><font color="#041040">&nbsp Garantia</font></strong></a>

				<?php } ?>
				
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					Menu
					<i class="fa fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<?php if($_SESSION["nomeRevendedor"] != "COMINAS"){ ?>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="/garantiaM/vendapf/index.php"><font color="#041040">Cliente Final</font></a>
						</li>

						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="/garantiaM/vendapj/index.php"><font color="#041040">Frotista</font></a>
						</li>

						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="/garantiaM/cliente/index.php"><font color="#041040">Cadastro de cliente</font></a>
						</li>
						
						<?php }else{ ?>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="/garantiaM/assistencia/index.php"><font color="#041040">Início</font></a>
						</li>
						<?php } ?>

						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="/garantiaM/controller/RevendedorController.php?acao=logout"><font color="#041040">Sair</font></a>
						</li>

					</ul>
				</div> 
			<?php endif;?>
		</div>
	</nav>

	<header>
		<div class="container">

			<?php echo $conteudo; ?>

		</div>
	</header>

	<img class="marca" src="/garantiaM/img/marca.jpg" height="80"/>
	<script src="/garantiaM/vendor/jquery/jquery.min.js"></script>
	<script src="/garantiaM/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="/garantiaM/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Contact Form JavaScript -->
	<script src="/garantiaM/js/jqBootstrapValidation.js"></script>

	<!-- Custom scripts for this template -->
	<script src="/garantiaM/js/freelancer.min.js"></script>


</body>
</html>