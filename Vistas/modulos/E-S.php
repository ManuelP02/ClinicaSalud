<?php

if($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Administrador"){

	echo '
	<script>
	window.location = "inicio";
 	</script>';
 	return;

}
?>

<div class="content-wrapper">
	
	<section class="content-header">
<?php
	
		$tablaBD = "servicios";
		$idservicio = substr($_GET["url"], 4);
		$resultado = ServiciosM::EditarServiciosM($tablaBD, $idservicio);



		echo'<h1>Editar Servicio: '.$resultado["nombre"].'</h1>';

?>
	</section>
		<section class="content">
			<div class="box">
					
				<div class="box-body">
					
					<form method="post">

						<?php

						$editarS = new ServiciosC();
						$editarS -> EditarServiciosC();
						$editarS -> ActualizarServiciosC();

						?>

					</form>

					<center><a href="http://localhost/clinica/servicios">
						<button class="btn btn-danger">Regresar</button>
					</a></center>

				</div>	

			</div>
			

			</section>


</div>