<?php


class ConsultoriosC{

	///Crear Consultorios
	public function CrearConsultorioC(){

		if(isset($_POST["consultorioN"])){

			$tablaBD = "consultorios";

			$consultorio = array("nombreconsultorio"=>$_POST["consultorioN"]);

			$consu = $_POST['consultorioN'];

			$resultado = ConsultoriosM::CrearConsultorioM($tablaBD, $consultorio, $consu);


			if($resultado == true){

				echo '
				<script type="text/javascript">
  					alert("Consultorio creado exitosamente");
						</script>
				<script>

				window.location = "http://localhost/clinica/consultorios";

				</script>';


			}


		}


	}



	///Ver consultorios

	static public function VerConsultoriosC($columna, $valor){

		$tablaBD = "consultorios";

		$resultado = ConsultoriosM::VerConsultoriosM($tablaBD, $columna, $valor);

		return $resultado;


	}

	
	



	///Eliminar consultorios

	public function BorrarConsultorioC(){

		if(isset($_GET["Cid"])){
			$tablaBD = "consultorios";

			$idconsultorio = $_GET["Cid"];
			
			$resultado = ConsultoriosM::BorrarConsultorioM($tablaBD, $idconsultorio);

			if($resultado == true){

				echo '
				<script type="text/javascript">
  					alert("Consultorio eliminado exitosamente");
						</script>
				<script>

				window.location = "http://localhost/clinica/consultorios";

				</script>';


			}
		}



	}


	///Editar consultorios

	public function EditarConsultoriosC(){
		if(isset($_POST["Cid"])){
		$tablaBD = "consultorios";
		$idconsultorio = $_POST["Cid"];
		$resultado = ConsultoriosM::EditarConsultoriosM($tablaBD, $idconsultorio);
}

	}


	///Actualizar consultorios

	public function ActualizarConsultoriosC(){

		if(isset($_POST["Cid"])){

			$tablaBD = "consultorios";
			$datosC = array("idconsultorio"=>$_POST["Cid"], "nombreconsultorio"=>$_POST["consultorioE"]);

			$resultado =ConsultoriosM::ActualizarConsultoriosM($tablaBD, $datosC);

			if($resultado == true){

				echo '
				<script type="text/javascript">
  					alert("Consultorio actualizado exitosamente");
						</script>
				<script>

				window.location = "http://localhost/clinica/consultorios";

				</script>';


			}


		}




	}

}


?>