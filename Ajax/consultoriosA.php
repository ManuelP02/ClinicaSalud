<?php 

require_once "../Controladores/consultoriosC.php";
require_once "../Modelos/consultoriosM.php";


class ConsultoriosA{

	public $Cid;

	public function EditarC(){
		$columna = "idconsultorio";
		$valor = $this->Cid;

		$resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);

		echo json_encode($resultado);

	}

	public $Norepetir;

	public function NoRepetirConsultorioA(){
		$columna = "nombreconsultorio";
		$valor = $this->Norepetir;

		$resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);

		echo json_encode($resultado);
	}

}


if(isset($_POST["Cid"])){

	$editarC = new ConsultoriosA();
	$editarC -> Cid = $_POST["Cid"];
	$editarC -> EditarC();


}

if(isset($_POST["Norepetir"])){

	$noRepetirC = new ConsultoriosA();

	$noRepetirC -> Norepetir = $_POST["Norepetir"];

	$noRepetirC -> NoRepetirConsultorioA();


}