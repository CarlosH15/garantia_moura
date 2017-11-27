<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/model/VendaModel.php";
$vendaModel = new VendaModel();
$acao = "create";
?>

<form method="post" id="formvenda" enctype="multipart/form-data" action="/garantiaM/controller/VendaController.php?acao=<?=$acao?>">
	<div class="row">
		<div class="col-sm-8">
			<b><font size="4px"> Cliente: </font></b>
			<div class="input-group">
				<input class="form-control" class="fonte" type="text" placeholder="Pesquise o cliente pelo número do CPF" id="CPF" maxlength="14" autocomplete="off" required name="CPF">
				<span class="input-group-btn">
					<button class="btn btn-default" id="btnPesquisar">
						<span>Pesquisar</span>
					</button>
				</span>
			</div>
		</div>	
	</div>

	<br>
	
	<div class="row">
		<div class="col-sm-8">
			<div id="inputCliente">	
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8">
			<b><font size="4px"> Modelo da bateria: </font></b>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">			
			<select required class="form-control" name="familia" id="familia">
				<option disabled selected>Selecione a família...</option>
				<option value="1">Moura</option>
				<option value="2">Zetta</option>
				<option value="3">Moto</option>
			</select>
		</div>
		<div class="col-sm-4" id="modelo">
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<br><b><font size="4px"> Código da bateria: </font></b>
		</div>

		<div class="col-sm-4">
			<br><b><font size="4px"> Placa do carro: </font></b>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<input class="form-control" class="fonte" type="text" placeholder="Código" id="CodBateria" name="codigoBateria" autocomplete="off" required maxlength="15">
		</div>
		
		<div class="col-sm-4">
			<input class="form-control" class="fonte" type="text" placeholder="Placa do carro" id="placa" name="placa" autocomplete="off" required maxlength="10">
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<br><b><font size="4px"> Número da nota fiscal: </font></b>
		</div>

		<div class="col-sm-4">
			<br><b><font size="4px"> Data da venda: </font></b>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<input class="form-control" class="fonte" type="text" placeholder="Número da nota" name="numeroNF" autocomplete="off" required maxlength="15"><br>
		</div>

		<div class="col-sm-4">
			<input class="form-control" widht=50px type="date" name="dataEmissao" required><br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8">
			<b><font size="4px"> Envio de imagens: (formatos permitidos: '.jpg, .png, .gif, .pdf')</font></b><br>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-8">
			<b><font size="3px"> Cartão de garantia preenchido:
			</div>
		</div>

		<div class="row">
			<div class="col-sm-8">
				<input class="btn btn-default" type="file" name="imagem1" required><br>
			</div>
		</div>


		<div class="row">
			<div class="col-sm-8">
				<b><font size="3px"> Código da bateria com cartão do lado:
				</div>
			</div>

			<div class="row">
				<div class="col-sm-8">
					<input class="btn btn-default" type="file" name="imagem2" required><br>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<b><font size="3px"> Nota ou cupom fiscal:
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8">
						<input class="btn btn-default" type="file" name="imagem3" required><br><br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">					
						<input class="btn btn-default btn-lg" class="fonte" type="submit"></button>
					</div>
				</div>
			</form>
		</div>


		<?php
		
		echo "<script type='text/javascript'>
		$('select#familia').change(function(){					
			$('#modelo').load('modelos.php?familia='+$('#familia').val());
		})

		jQuery(function($){
			$('#CPF').mask('999.999.999-99');
		});

		jQuery(function($){
			$('#CodBateria').mask('a-99/99/99-a9-9999');
		});

		jQuery(function($){
			$('#placa').mask('aaa-9999');
		});

		$('button#btnPesquisar').click(function(){
			$('#inputCliente').load('procuraCliente.php?CPF='+$('#CPF').val());
		})

		</script>";

		?>