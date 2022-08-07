<?php

if($_SESSION["rol"] != "Paciente"){

	echo '
	<script>
	window.location = "inicio";
 	</script>';
 	return;

}
?>

<div class="content-wrapper">

<section class="content-header">
		<h1>Busque en nuestros consultorios</h1>
		<label>Y seleccione el doctor de su preferencia para ver su itenerario de citas.</label>
			</section> 
				<section class="content">
	
	<div class="box">
		

		<div class="box-body">


			<?php 

			$columna = null;
			$valor = null;

			$resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);

			foreach($resultado as $key => $value){

				echo'

			<div class="col-lg-6 col-xs-6">
        
          <div class="small-box" style="background-image: linear-gradient(180deg, #505467 0, #1f3259 50%, #00154b 100%);">
            <div class="inner">
              <h3 style="color: white";>'.$value["nombreconsultorio"].'</h3>';

              echo'<label style="color: #D5D5D5;">Doctores:</label>';
              $columna = "idconsultorio";
              $valor = $value["idconsultorio"];

              $doctores = DoctoresC::VerDoctoresConsultorioC($columna, $valor);

              foreach ($doctores as $key => $value) {
              	echo'<a style="color: white; font-style: italic;" href="Doctor/'.$value["id"].'" style="color: silver;"><p>'.($key+1).'-'.$value["apellido"].' '.$value["nombre"].'</p></a> ';
          
              }

            echo' </div>
          </div>
        </div>



				';


			}

			?>




		</div>

	</div>

</section>


</div>
