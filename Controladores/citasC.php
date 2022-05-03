<?php 

	class CitasC{

		//Pedir citas pacientes

		public function EnviarCitaC(){

			if(isset($_POST["Did"])){

				$tablaBD = "citas";

				$Did = substr($_GET["url"], 7);

				$datosC = array("Did"=>$_POST["Did"], "Pid"=>$_POST["Pid"], "nyaC"=>$_POST["nyaC"], "Cid"=>$_POST["Cid"], "documentoC"=>$_POST["documentoC"], "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

				$resultado = CitasM::EnviarCitaM($tablaBD, $datosC);

				if($resultado == true){

						echo '

						<script type="text/javascript">
  					alert("Cita creada exitosamente");
						</script>

						<script>

							window.location = "Doctor/"'.$Did.';

						</script>


				';
				

				
				
			}

				}


			}
		


		///Mostrar citas

		public function	VerCitas(){

			$tablaBD = "citas";

			$resultado = CitasM::VerCitasM($tablaBD);

			return $resultado;


		}

			public function	VerCitasP(){

			$tablaBD = "citas";

			$id = $_SESSION["idpaciente"];

			$resultado = CitasM::VerCitasMP($tablaBD, $id);

			return $resultado;


		}



		///Pedir citas como doctor

		public function PedirCitaDoctorC(){

			if(isset($_POST["Did"])){

				$tablaBD = "citas";

				$Did = substr($_GET["url"], 6);

				$datosC = array("Did"=>$_POST["Did"], "Cid"=>$_POST["Cid"], "nombreP"=>$_POST["nombreP"], "documentoP"=>$_POST["documentoP"], "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

				$resultado = CitasM::PedirCitaDoctorM($tablaBD, $datosC);

				if($resultado == true){

					echo'

					<script>

						window.location = "Citas/"'.$Did.';


					</script>

					';


				}

			}


		}


	}




?>