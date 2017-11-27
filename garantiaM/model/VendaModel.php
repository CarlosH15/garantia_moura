<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/config/BancoDados.php";

class VendaModel{

	private $bd;

	function __construct(){
		$this->bd = BancoDados::obterConexao();
	}

	public function inserir($idRevendedor, $idCliente, $modeloBateria, $dataVenda, $placaCarro, $numeroNotaFiscal, $codigoBateria, $imagem1, $imagem2, $imagem3, $tipoCliente){
		
		$findIdBateria = $this->bd->prepare("select idBateria from bateria where modeloBateria = :modeloBateria");
		$findIdBateria->bindParam(":modeloBateria", $modeloBateria);
		$findIdBateria->execute();
		$idBateriaEncontrado = $findIdBateria->fetch();

		if($tipoCliente == "final"){
			$findIdCliente = $this->bd->prepare("select idClienteFinal as idCliente from final where cpf = :cpf"); // mudar codigo
			$findIdCliente->bindParam(":cpf", $registro);
		}else if($tipoCliente == "frotista"){
			$findIdCliente = $this->bd->prepare("select idClienteFrotista as idCliente from frotista where cnpj = :cnpj"); // mudar codigo
			$findIdCliente->bindParam(":cnpj", $registro);
		}

		$findIdCliente->execute();
		$idClienteEncontrado = $findIdCliente->fetch();

		$insercao = $this->bd->prepare("INSERT INTO venda (idRevendedor, idCliente, idBateria, dataVenda, placaCarro, numeroNotaFiscal, codigoBateria, imagem1, imagem2, imagem3) VALUES (:idRevendedor, :idCliente, :idBateria, :dataVenda, :placaCarro, :numeroNotaFiscal, :codigoBateria, :imagem1, :imagem2, :imagem3)");

		$insercao->bindParam(":idRevendedor", $idRevendedor);
		$insercao->bindParam(":idCliente", $idClienteEncontrado["idCliente"]);
		$insercao->bindParam(":idBateria", $idBateriaEncontrado["idBateria"]);
		$insercao->bindParam(":dataVenda", $dataVenda);
		$insercao->bindParam(":placaCarro", $placaCarro);
		$insercao->bindParam(":numeroNotaFiscal", $numeroNotaFiscal);
		$insercao->bindParam(":codigoBateria", $codigoBateria);
		$insercao->bindParam(":imagem1", $imagem1);
		$insercao->bindParam(":imagem2", $imagem2);
		$insercao->bindParam(":imagem3", $imagem3);

		$insercao->execute();	

	}

	public function listarBaterias($familia){
		$consulta = $this->bd->prepare("select * from bateria where idFamiliaBateria = :familia order by modeloBateria");

		$consulta->bindParam(":familia", $familia);

		$consulta->execute();

		$baterias = $consulta->fetchAll();

		return $baterias;
	}

	public function consultar($codigoBateria){
		$consulta = $this->bd->prepare("SELECT cliente.nomeCliente AS nomeCliente, revendedor.nomeRevendedor AS nomeRevendedor, bateria.modeloBateria AS descricaoBateria, venda.idBateria AS codigoBateria, venda.dataVenda as dataVenda, venda.imagem1 as caminho1, venda.imagem2 as caminho2, venda.imagem3 as caminho3 from venda inner join cliente on cliente.idCliente = venda.idCliente inner join revendedor on revendedor.idRevendedor = venda.idRevendedor inner join bateria on bateria.idBateria = venda.idBateria where venda.codigoBateria = :codigoBateria");

		$consulta->bindParam(":codigoBateria", $codigoBateria);

		$consulta->execute();

		$dados = $consulta->fetch();

		return $dados;
	}
}

?>