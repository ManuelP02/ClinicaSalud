<?php 

Class AtencionesC{

	public function CrearAtencionC(){

		if(isset($_POST["antecedentesC"])){

			$tablaBD = "atencion";

			$atencion = array("idpaciente"=>$_POST["pacienteid"],"antecedentes"=>$_POST["antecedentesC"], "alergias"=>$_POST["alergiasC"], "persona_responsable"=>$_POST["presponsableC"], "intervenciones_quirurgicas"=>$_POST["intervencionesC"], "vacunascompletas"=>$_POST["vacunasC"], "cel"=>$_POST["celC"], "email"=>$_POST["emailC"], "estado_civil"=>$_POST["estadocivilC"], "ocupacion"=>$_POST["ocupacionC"], "fecha"=>$_POST["fechaC"]);

			$resultado = AtencionesM::CrearAtencionM($tablaBD, $atencion);

			if($resultado == true){

				echo'

				<script type="text/javascript">
  					alert("Historial creado exitosamente");
						</script>
				<script>
				window.location = "http://localhost/clinica/atencion";
				</script>';
				return;

				
				
			}//Cierra if



		}//Cierra variable post


	}//Cierra funcion crear atencion

			public function VerAtencionC(){

 		$tablaBD = "atencion";

		$id = substr($_GET["url"], 17);

 		$resultado = AtencionesM::VerHistorialM($tablaBD, $id);




 		if($_SESSION["rol"] == "Paciente" && $resultado["idpaciente"] != $id){
         	echo'

         <script type="text/javascript">
             alert("Usted no posee un historial clínico. comuníquese con su doctor.");
             </script>
         <script>
       window.location = "http://localhost/clinica/inicio";
         </script>';
           return;
         }
			elseif($resultado["idpaciente"] != $id && $_SESSION["rol"] == "Doctor"){
			echo'

         <script type="text/javascript">
             alert("Este usuario no posee un historial, será redirigido para crearlo");
             </script>
         <script>
       window.location = "http://localhost/clinica/CrearAtencion/'.$id.'";
         </script>';
         return;
         }





         	


    
		}





		//Editar 
	 public function ActualizarAtencionC(){

	 	if(isset($_POST["antecedentesE"])){

	 		$tablaBD = "atencion";

		$datosC = array("idpaciente"=>$_POST["idpaciente"], "antecedentes"=>$_POST["antecedentesE"], "alergias"=>$_POST["alergiasE"], "persona_responsable"=>$_POST["presponsableE"], "intervenciones_quirurgicas"=>$_POST["intervencionesE"], "vacunascompletas"=>$_POST["vacunasE"], "cel"=>$_POST["celE"], "email"=>$_POST["emailE"], "estado_civil"=>$_POST["estadocivilE"], "ocupacion"=>$_POST["ocupacionE"], "fecha"=>$_POST["fechaE"]);

	 	$resultado = AtencionesM::ActualizarAtencionM($tablaBD, $datosC);

	 	if($resultado == true){

	 			echo'
	 			 <script type="text/javascript">
             alert("Historial actualizado exitosamente");
             </script>
	 			<script>
	 	 		window.location = "http://localhost/clinica/historialclinico/'.$_POST["idpaciente"].'";
	 	 		</script>';
	 	 		return;
			}//Cierra if


			}///Cierra primer if

		}///Cierra actualizar atencion


		public function ActualizarRecetaC(){

	 	if(isset($_POST["motivoE"])){

	 		$tablaBD = "recetas";

	 	$datosC = array("idreceta"=>$_POST["idreceta"], "idservicio"=>$_POST["idservicio"], "motivo"=>$_POST["motivoE"], "medicamento"=>$_POST["medicamentoE"], "dosis"=>$_POST["dosisE"], "duracion"=>$_POST["duracionE"], "pago"=>$_POST["pagoE"], "plan"=>$_POST["planE"], "fecha"=>$_POST["fechaE"]);

	 	$resultado = AtencionesM::ActualizarRecetaM($tablaBD, $datosC);

	 	if($resultado == true){

	 			echo'
	 			 <script type="text/javascript">
             alert("Receta actualizada exitosamente");
             </script>
	 			<script>
	 	 		window.location = "http://localhost/clinica/GestRecet/'.$_POST["idreceta"].'";
	 	 		</script>';
	 	 		return;
			}//Cierra if


			}///Cierra primer if

		}

		///Crear Receta
			
public function CrearRecetaC(){

		if(isset($_POST["consultaC"])){

			$tablaBD = "recetas";

			$crear = array("id_doctor"=>$_POST["id_doctor"], "idpaciente"=>$_POST["idpaciente"], "idservicio"=>$_POST["idservicio"], "motivo"=>$_POST["consultaC"], "medicamento"=>$_POST["medicamentoC"], "dosis"=>$_POST["dosisC"], "duracion"=>$_POST["duracionC"], "pago"=>$_POST["pagoC"], "plan"=>$_POST["planC"], "fecha"=>$_POST["fechaC"]);

			$resultado = AtencionesM::CrearRecetaM($tablaBD, $crear);

			if($resultado == true){

				echo'

				<script type="text/javascript">
  					alert("Receta Generada Exitosamente");
						</script>
				<script>
				window.location = "http://localhost/clinica/atencion";
				</script>';
				return;
				
			}//Cierra if

		}//Cierra variable post


	}//Cierra funcion crear receta


		static public function VerRecetasC($columna, $valor){

		$tablaBD = "recetas";

		$resultado = AtencionesM::VerRecetasM($tablaBD, $columna, $valor);

		return $resultado;


				}

		static public function VerRecetaC($tablaBD, $id){

		$tablaBD = "recetas";

		$id = substr($_GET["url"], 10);

 		$resultado = AtencionesM::VerRecM($tablaBD, $id);


				}

		//Borrar receta 

	// 	public function BorrarRecetaC(){

	// 	if(isset($_POST["idreceta"])){

	// 		$tablaBD = "recetas";

	// 		$idreceta = $_POST["idreceta"];

	// 		$resultado = AtencionesM::BorrarRecetaM($tablaBD, $idreceta);

	// 		if($resultado == true){
	// 			echo'
	// 			<script type="text/javascript">
 //  					alert("Receta Eliminada Exitosamente");
	// 					</script>
	// 			<script>
	// 			window.location = "http://localhost/clinica/atencion";
	// 			</script>';
	// 			return;


	// 		}

	// 	}


	// }


		








		}

?>