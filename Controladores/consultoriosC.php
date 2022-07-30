<?php


class ConsultoriosC{

	///Crear Consultorios
	public function CrearConsultorioC(){

		if(isset($_POST["consultorioN"])){

			$tablaBD = "consultorios";

			$consultorio = array("nombreconsultorio"=>$_POST["consultorioN"]);

			$resultado = ConsultoriosM::CrearConsultorioM($tablaBD, $consultorio);


			if($resultado == true){

				echo '<script>

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

		if(substr($_GET["url"], 13)){

			$tablaBD = "consultorios";

			$idconsultorio = substr($_GET["url"], 13);
			
			$resultado = ConsultoriosM::BorrarConsultorioM($tablaBD, $idconsultorio);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/consultorios";

				</script>';


			}
		}



	}


	///Editar consultorios

	public function EditarConsultoriosC(){

		$tablaBD = "consultorios";
		$idconsultorio = substr($_GET["url"], 4);
		$resultado = ConsultoriosM::EditarConsultoriosM($tablaBD, $idconsultorio);

		echo '<div class="form-group">
							
							<h2>Nombre:</h2>
	<input type="text" class="form-control input-lg" name="consultorioE" value="'.$resultado["nombreconsultorio"].'">
	<input type="hidden" class="form-control input-lg" name="Cid" value="'.$resultado["idconsultorio"].'">

							<br>

							<button class="btn btn-primary" type="submit">Guardar Cambios</button>
							<a href="http://localhost/clinica/consultorios">
							<button class="btn btn-danger">Regresar</button></a>	
						</div>';


	}


	///Actualizar consultorios

	public function ActualizarConsultoriosC(){

		if(isset($_POST["consultorioE"])){

			$tablaBD = "consultorios";
			$datosC = array("idconsultorio"=>$_POST["Cid"], "nombreconsultorio"=>$_POST["consultorioE"]);

			$resultado =ConsultoriosM::ActualizarConsultoriosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/consultorios";

				</script>';


			}


		}




	}

}


?>