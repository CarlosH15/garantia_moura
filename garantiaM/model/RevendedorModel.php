<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/garantiaM/config/BancoDados.php";


class RevendedorModel{

	private $bd;

	function __construct(){
		$this->bd = BancoDados::obterConexao();
	}


	public function autenticacao($cnpj){

		$consulta = $this->bd->prepare("select * from revendedor where cnpjRevendedor = :cnpj");

		$consulta->bindParam(":cnpj", $cnpj);

		$consulta->execute();

		$revendedor = $consulta->fetch();

		return $revendedor;

	}

	public function login($cnpj, $senha){

		$senhaCripto = sha1($senha);

		$consulta = $this->bd->prepare("select * from revendedor where cnpjRevendedor = :cnpj and senhaRevendedor = :senha");

		$consulta->bindParam(":cnpj", $cnpj);
		$consulta->bindParam(":senha", $senhaCripto);

		$consulta->execute();

		$revendedor = $consulta->fetch();

		return $revendedor;

	}

	public function editar($cnpj, $senha){
		$senhaCripto = sha1($senha);

		$edicao = $this->bd->prepare("update revendedor set senhaRevendedor = :senha where cnpjRevendedor = :cnpj");

		$edicao->bindParam(":cnpj", $cnpj);
		$edicao->bindParam(":senha", $senhaCripto);

		$edicao->execute();
	}

	public function inserir($nome, $cnpj){
		$insercao = $this->bd->prepare("INSERT INTO revendedor(nomeRevendedor, cnpjRevendedor) VALUES (:nomeCliente, :cnpj)");

		$insercao->bindParam(":nomeCliente", $nome);
		$insercao->bindParam(":cnpj", $cnpj);

		$insercao->execute();
	}


}

