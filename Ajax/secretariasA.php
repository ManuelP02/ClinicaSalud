<?php

require_once "../Controladores/secretariasC.php";
require_once "../Modelos/secretariasM.php";

class SecretariasA{

	public $Sid;

	public function ESecretariaA(){

		$columna = "id";
		$valor = $this->Sid;

		$resultado = SecretariasC::SecretariaC($columna, $valor);

		echo json_encode($resultado);

	}

}

if(isset($_POST["Sid"])){

	$editarS = new SecretariasA();
	$editarS -> Sid = $_POST["Sid"];
	$editarS -> ESecretariaA();

}