<?php 

require_once "../Controladores/pacientesC.php";
require_once "../Modelos/pacientesM.php";

class PacientesA{

	public $Pid;

	public function EPacienteA(){

		$columna = "idpaciente";
		$valor = $this->Pid;

		$resultado = PacientesC::VerPacientesC($columna, $valor);

		echo json_encode($resultado);



	}

		public $NorepetirD;

		public function NoRepetirDocumentoA(){

		$columna = "documento";

		$valor = $this->NorepetirD;

		$resultado = PacientesC::VerPacientesC($columna, $valor);

		echo json_encode($resultado);

	}

	public $Norepetir;

	public function NoRepetirUsuarioA(){

		$columna = "usuario";

		$valor = $this->Norepetir;

		$resultado = PacientesC::VerPacientesC($columna, $valor);

		echo json_encode($resultado);

	}

}


if(isset($_POST["Pid"])){

	$editarP = new PacientesA();

	$editarP -> Pid = $_POST["Pid"];

	$editarP -> EPacienteA();


}

if(isset($_POST["NorepetirD"])){

	$noRepetirU = new PacientesA();

	$noRepetirU -> NorepetirD = $_POST["NorepetirD"];

	$noRepetirU -> NoRepetirDocumentoA();


}

if(isset($_POST["Norepetir"])){

	$noRepetirU = new PacientesA();

	$noRepetirU -> Norepetir = $_POST["Norepetir"];

	$noRepetirU -> NoRepetirUsuarioA();


}




?>