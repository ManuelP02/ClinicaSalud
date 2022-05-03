<?php

class RecetasC{

		public function CrearRecetaC(){

		if(isset($_POST["consultaC"])){

			$tablaBD = "recetas";

			$crear = array("idpaciente"=>$_POST["idpaciente"],"idservicio"=>$_POST["idservicio"], "motivo"=>$_POST["consultaC"], "medicamento"=>$_POST["medicamentoC"], "dosis"=>$_POST["dosisC"], "duracion"=>$_POST["duracionC"], "pago"=>$_POST["pagoC"], "plan"=>$_POST["planC"], "fecha"=>$_POST["fechaC"]);

			$resultado = RecetasM::CrearRecetaM($tablaBD, $crear);

			if($resultado == true){

				echo'

				<script type="text/javascript">
  					alert("Receta creada exitosamente");
						</script>
				<script>
				window.location = "http://localhost/clinica/atencion";
				</script>';
				return;
				
			}//Cierra if

		}//Cierra variable post


	}//Cierra funcion crear atencion





	}

?>