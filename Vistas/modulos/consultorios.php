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
<section class="content">
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
				<button class="btn btn-success EditarConsultorio" Cid="'.$value["idconsultorio"].'" data-toggle="modal" data-target="#EditarConsultorio">Editar</button></div>

					<div class="btn-group">
			<button id="datos" data-toggle="modal" data-target="#EliminarConsultorio" class="btn btn-danger" Cid="'.$value["idconsultorio"].'">Borrar</button>
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


</div>

<div class="modal fade" rol="dialog" id="CrearConsultorio">
	<div class="modal-dialog"> 
		<div class="modal-content"> 

			<form method="post" role="form">
				
						<div class="modal-body">
								<div class="box-body"> 

									<div class="form-group"> 

										<h2>Nombre de consultorio:</h2>
									<input type="text" class="form-control input-lg" name="consultorioN" id="consultorioN" placeholder="Ingrese nuevo consultorio" required oninvalid="this.setCustomValidity('Ingrese el nombre del consultorio')"
    				oninput="this.setCustomValidity('')"
					><br>
					<div class="modal-footer">
					<button type="submit" class="btn btn-success">Crear</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

					</form>
						</div>

									</div>



								</div>

							
						</div>

		</div>


	</div>

</div>

<div class="modal fade" rol="dialog" id="EditarConsultorio">

			<div class="modal-dialog">

				<div class="modal-content">

					<form method="post" role="form">
				
						<div class="modal-body">

							<div class="box-body">

								<div class="form-group">

									<h2>Editar consultorio:</h2>
					<input type="text" class="form-control input-lg" name="consultorioE" id="consultorioE">
					<input type="hidden" id="Cid" name="Cid">
						<div class="modal-footer">
					<button type="submit" class="btn btn-success">Crear</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


	<?php

			$crearC = new ConsultoriosC();
			$crearC -> CrearConsultorioC();

			?>

				<?php

						$editarC = new ConsultoriosC();
						$editarC -> EditarConsultoriosC();
						$editarC -> ActualizarConsultoriosC();

						?>
