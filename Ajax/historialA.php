<?php 


require_once "../Controladores/atencionC.php";
require_once "../Modelos/atencionM.php";

class HistorialA{

	public $idpaciente;

	public function VHistorialA(){

		$columna = "idpaciente";
		$valor = $this->idpaciente;

		$resultado = atencionC::historialesC($columna, $valor);

		echo json_encode($resultado);


	}


}

if(isset($_POST["idpaciente"])){

	$Vh = new HistorialA();
	$Vh -> idpaciente = $_POST["idpaciente"];
	$Vh -> VHistorialA();


}