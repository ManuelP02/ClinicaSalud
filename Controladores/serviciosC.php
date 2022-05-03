<?php


	class ServiciosC{

		///Crear servicios 

		public function CrearServicioC(){

			if(isset($_POST["servicioN"])){

				$tablaBD = "servicios";

				$datos = array("nombre"=>$_POST["servicioN"], "costo"=>$_POST["costoservicioN"], "idconsultorio"=>$_POST["idconsultorio"]);

				$resultado = ServiciosM::CrearServicioM($tablaBD, $datos);

				if($resultado == true){

				echo '<script>

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

		$tablaBD = "servicios";
		$idservicio = substr($_GET["url"], 4);
		$resultado = ServiciosM::EditarServiciosM($tablaBD, $idservicio);

		echo '<div class="form-group">
							
							<h2>Nombre:</h2>
	<input type="text" class="form-control input-lg" name="nombre" value="'.$resultado["nombre"].'">

	<input type="hidden" class="form-control input-lg" name="idservicio" value="'.$resultado["idservicio"].'">
	<h2>Costo:</h2>
	<label>DOP(*)</label>
		<input type="text" class="form-control input-lg" name="costoE" value="'.$resultado["costo"].'">
		<h2>Consultorio:</h2>
		<select class="form-control selectpicker input-lg" name="idconsultorio"	>';
			$columna = null;
            $valor = null;
            $resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);
                   foreach ($resultado as $key => $value) {
                  echo'<option value="'.$value["idconsultorio"].'">'.$value["nombreconsultorio"].'</option>';
                  
                }

							echo'</select><br>
							<center>

							<button class="btn btn-primary" type="submit">Guardar Cambios</button>

							</center></div>';


							

							

						


	}

		public function ActualizarServiciosC(){

		if(isset($_POST["nombre"])){

			$tablaBD = "servicios";

			$datosC = array("idservicio"=>$_POST["idservicio"], "nombre"=>$_POST["nombre"], "costo"=>$_POST["costoE"], "idconsultorio"=>$_POST["idconsultorio"]);

			$resultado = ServiciosM::ActualizarServiciosM($tablaBD, $datosC);

			if($resultado == true){

				echo '

								<script type="text/javascript">
  					alert("Servicio Actualizado Exitosamente");
						</script>

				<script>

				window.location = "http://localhost/clinica/servicios";

				</script>';


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