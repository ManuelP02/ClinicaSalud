<?php

if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] != "Secretaria"){

	echo '
	<script>
	window.location = "inicio";
 	</script>';
 	return;

}
?>
<?php

$borrarC = new ConsultoriosC();

$borrarC -> BorrarConsultorioC();

?>
<div class="content-wrapper">

<section class="content-header">
		<h1>Gestor de consultorios</h1>
</section> 

<div class="box">
		
		<div class="box-header">
			
		<center><button class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#CrearConsultorio">Crear Consultorio</button>
</center>


		</div>


		<div class="box-body">
			
			<table class="table table-bordered table-hover table-striped DT">

				<thead>
						
					<tr>
						
						<th>N°</th>
						<th>Nombre</th>
						<th>Opciones</th>
					</tr>

				</thead>
				<tbody>

					<?php

					$columna = null; 
					$valor = null;

					$resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);

					foreach ($resultado as $key => $value) {
						echo '<tr>
						
						<td>'.($key+1).'</td>

						<td>'.$value["nombreconsultorio"].'</td>

						<td>
							
							<div class="btn-group">
								<a href="http://localhost/clinica/E-C/'.$value["idconsultorio"].'">
									<button class="btn btn-success">  Editar</button>
								</a>
								</div>
								<div class="btn-group">

								<a onclick="return confirm(\'¿Seguro que desea eliminar el consultorio de '.$value["nombreconsultorio"].'?\')" href="http://localhost/clinica/consultorios/'.$value["idconsultorio"].'"">
									<button class="btn btn-danger"> Borrar </button>
								</a>
							</div>

						</td>

					</tr>';
					}

					?>

				</tbody>
			</table>

		</div>

	</div>

</section>


</div>

<div class="modal fade" rol="dialog" id="CrearConsultorio">

			<div class="modal-dialog">

				<div class="modal-content">

					<form method="post" role="form">

						<div class="modal-body">

							<div class="box-body">

								<div class="form-group">

									<h2>Nombre de consultorio:</h2>
									<input type="text" class="form-control input-lg" name="consultorioN" id="consultorioN" placeholder="Ingrese nuevo consultorio" required
					oninvalid="this.setCustomValidity('Ingrese el nombre del consultorio')"
    				oninput="this.setCustomValidity('')"
					><br>
						<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Crear</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>
	<?php

			$crearC = new ConsultoriosC();
			$crearC -> CrearConsultorioC();

			?>