<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/config/BancoDados.php";

class ClienteModel{

	private $bd;

	function __construct(){
		$this->bd = BancoDados::obterConexao();
	}

	public function consultaCliente($registro, $tipoCliente){
		if($tipoCliente == "Frotista"){
			$consulta = $this->bd->prepare("SELECT * FROM cliente inner join frotista on cliente.idCliente = frotista.idClienteFrotista WHERE frotista.cnpjClienteFrotista = :registro");
		}else if($tipoCliente == "Final"){
			$consulta = $this->bd->prepare("SELECT * FROM cliente inner join final on cliente.idCliente = final.idClienteFinal WHERE final.cpfClienteFinal = :registro");
		}

		$consulta->bindParam(":registro", $registro);

		$consulta->execute();

		$resultado = $consulta->fetch();

		return $resultado;
	}


	public function inserir($nome, $registro, $tipoCliente){
		if($tipoCliente == "Frotista"){
			$insercao = $this->bd->prepare("INSERT INTO cliente(nomeCliente) values (:nomeCliente); INSERT INTO frotista(idClienteFrotista, cnpjClienteFrotista) values((SELECT MAX(idCliente) from cliente where nomeCliente = :nomeCliente), :registro)");
		}else if($tipoCliente == "Final"){
			$insercao = $this->bd->prepare("INSERT INTO cliente(nomeCliente) values (:nomeCliente); INSERT INTO final(idClienteFinal, cpfClienteFinal) values((SELECT MAX(idCliente) from cliente where nomeCliente = :nomeCliente), :registro)");
		}

			$insercao->bindParam(":nomeCliente", $nome);
			$insercao->bindParam(":registro", $registro);

			$insercao->execute();

	}
}

?>