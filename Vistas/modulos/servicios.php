<?php

if($_SESSION["rol"] != "Administrador"){

	echo '
	<script>
	window.location = "inicio";
 	</script>';
 	return;

}
?>

<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<section class="content-header">
		<h1>Gestor de servicios</h1>
        <!-- Main content -->
        <section class="content">
            <div class="row">
           
                  <div class="box">
                    <div class="box-body">
                      <form method="POST">

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre de servicio (*):</label>
                            <input type="text" class="form-control" required name="servicioN" maxlength="50" placeholder="Nombre"
                            oninvalid="this.setCustomValidity('Ingrese el nombre del servicio')"
                            oninput="this.setCustomValidity('')"
                            >
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Costo (*) DOP:</label>
                            <input type="number" class="form-control" required name="costoservicioN" placeholder="Costo" oninvalid="this.setCustomValidity('Ingrese el costo del servicio')"
    oninput="this.setCustomValidity('')">
                          </div>
                          
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <label>Consultorio al que pertenercerá servicio (*):</label>
                          <select class="form-control selectpicker" name="idconsultorio">
                
                                

                                         <?php 

                                      $columna = null;
                                      $valor = null;

                $resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);

                foreach ($resultado as $key => $value) {
                  echo'<option value="'.$value["idconsultorio"].'">'.$value["nombreconsultorio"].'</option>';
                  
                }


                ?>
              </select><br>
                        

                            </div>
                             
                            
                        

                      
                          </div>
                           <center><button type="submit" class="btn btn-primary btn-lg">Crear servicio</button></center>
                        </form>
                        <?php

                        $crearServ = new ServiciosC();
                        $crearServ -> CrearServicioC();



                        ?>
			
			<table class="table table-bordered table-hover table-striped dt-responsive DT">

				<thead>
						
					<tr>
            <th>N°</th>
						<th>Nombre</th>
						<th>Costo</th>
            <th>Consultorio</th>
						<th>Opciones</th>
					</tr>
           </thead>
        <tbody> 

                    <?php


                    $columna = null;
                    $valor = null;
                    $resultado = ServiciosC::VerServiciosTC($columna, $valor);

                    foreach ($resultado as $key => $value) {
                    	echo'<tr>
						<td>'.($key+1).'</td>

						<td>'.$value["nombre"].'</td>

						<td>'.$value["costo"].' DOP</td>';


            $columna = "idconsultorio";
            $valor = $value["idconsultorio"];

            $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

            echo '<td>'.$consultorio["nombreconsultorio"].'</td>

						<td>
							 <div class="btn-group">

                <a href="http://localhost/clinica/E-S/'.$value["idservicio"].'"">
                  <button class="btn btn-success"> Editar </button>
                </a>
              </div>
							<div class="btn-group">

								<a  onclick="return confirm(\'¿Seguro que desea eliminar el servicio de '.$value["nombre"].' que pertenece al Consultorio de '.$consultorio["nombreconsultorio"].'?\')"href="http://localhost/clinica/servicios/'.$value["idservicio"].'"">
									<button class="btn btn-danger"> Borrar </button>
								</a>
							</div>

						</td>

					</tr>';
                    }


                    ?>
                   	
                        
                        
                    </div>
                  </div>

              </div>

          </div>
      </section>

    </div>

 <?php

 $borrarS = new ServiciosC();
 $borrarS -> BorrarServicioC();


 ?>
 