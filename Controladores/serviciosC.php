<?php


	class ServiciosC{

		///Crear servicios 

		public function CrearServicioC(){

			if(isset($_POST["servicioN"])){

				$tablaBD = "servicios";

				$datos = array("nombre"=>$_POST["servicioN"], "costo"=>$_POST["costoservicioN"], "idconsultorio"=>$_POST["idconsultorio"]);

				$resultado = ServiciosM::CrearServicioM($tablaBD, $datos);

				if($resultado == true){

				echo '<script type="text/javascript">
  					alert("Servicio Creado Exitosamente");
  					window.location = "http://localhost/clinica/servicios";
						</script>';
			}


			}

		}



		///Ver servicios
		static public function VerServiciosC($columna, $valor){


			$tablaBD = "servicios";

			$resultado = ServiciosM::VerServiciosM($tablaBD, $columna, $valor);

			return $resultado;



		}

			static public function VerServiciosTC($columna, $valor){


			$tablaBD = "servicios";

			$resultado = ServiciosM::VerServiciosTM($tablaBD, $columna, $valor);

			return $resultado;



		}

		public function EditarServiciosC(){
		if(isset($_POST["Sid"])){
		$tablaBD = "servicios";
		$idservicio = $_POST["Sid"];
		$resultado = ServiciosM::EditarServiciosM($tablaBD, $idservicio);
		}	

						


	}

		public function ActualizarServiciosC(){

			if(isset($_POST["Sid"])){

			$tablaBD = "servicios";

			$datosC = array("idservicio"=>$_POST["Sid"], "nombre"=>$_POST["servicioE"], "costo"=>$_POST["costoservicioE"], "idconsultorio"=>$_POST["idconsultorio"]);

			$resultado = ServiciosM::ActualizarServiciosM($tablaBD, $datosC);

			if($resultado == true){

				echo '

								<script type="text/javascript">
  					alert("Servicio Actualizado Exitosamente");
  					window.location = "http://localhost/clinica/servicios";
						</script>

			';


			}


		}




	}



		///Borrar Servicios

		public function BorrarServicioC(){

			if(substr($_GET["url"], 10)){

				$tablaBD = "servicios";

				$idservicio = substr($_GET["url"], 10);

				$resultado = ServiciosM::BorrarServicioM($tablaBD, $idservicio);

				if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/servicios";

				</script>';
			}



			}


		}
	




	}


?>