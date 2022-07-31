<?php 

require_once "../Controladores/serviciosC.php";
require_once "../Modelos/serviciosM.php";

class ServiciosA{

	public $Norepetir;

	public function NoRepetirServicioA(){
		$columna = "nombre";
		$valor = $this->Norepetir;

		$resultado = ServiciosC::VerServiciosC($columna, $valor);

		echo json_encode($resultado);
	}


}

if(isset($_POST["Norepetir"])){

	$noRepetirS = new ServiciosA();

	$noRepetirS -> Norepetir = $_POST["Norepetir"];

	$noRepetirS -> NoRepetirServicioA();


}