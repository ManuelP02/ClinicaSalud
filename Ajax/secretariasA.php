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

	public $Norepetir;

	public function NoRepetirSecretarias(){

		$columna = "usuario";

		$valor = $this->Norepetir;

		$resultado = SecretariasC::VerSecC($columna, $valor);

		echo json_encode($resultado);

	}




}

if(isset($_POST["Sid"])){

	$editarS = new SecretariasA();
	$editarS -> Sid = $_POST["Sid"];
	$editarS -> ESecretariaA();

}

if(isset($_POST["Norepetir"])){

	$noRepetirS = new SecretariasA();

	$noRepetirS -> Norepetir = $_POST["Norepetir"];

	$noRepetirS -> NoRepetirSecretarias();


}
