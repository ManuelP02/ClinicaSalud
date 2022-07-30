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
			
			<form method="post">
				
				<div class="col-md-6 col-xs-12">
					<label>Ingresar nombre de consultorio (*):</label>
					<input type="text" class="form-control" name="consultorioN" placeholder="Ingrese nuevo consultorio" required
					oninvalid="this.setCustomValidity('Ingrese el nombre del consultorio')"
    				oninput="this.setCustomValidity('')"
					><br>
					<center><button type="submit" style="border-radius: 5px;" class="btn btn-primary">Crear consultorio</button></center>
				</div>
				
			
			</form>

			<?php

			$crearC = new ConsultoriosC();
			$crearC -> CrearConsultorioC();

			?>

		</div>

		<div class="box-body">
			
			<table class="table table-bordered table-hover table-striped">

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
