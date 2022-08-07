      <div class="content-wrapper">
      	<section class="content-header">
		<h1>Gestor de Reportes de recetas por Doctores</h1>
        <!-- Main content -->
        <section class="content">
            <div class="row">
           
                  <div class="box">
                    <div class="box-body">
                      <form method="POST" action="docRecetasPdf" target="_blank">

                          <div class="form-group ">
                            <label>Seleccione el doctor</label>
                          <select class="form-control selectpicker" id="iddoctor" name="iddoctor">
                
                                

                                         <?php 

                                      $columna = null;
                                      $valor = null;

                $resultado = DoctoresC::VerDoctoresC($columna, $valor);

                foreach ($resultado as $key => $value) {
                  echo'<option value="'.$value["id"].'"> '.$value["nombre"].' '.$value["apellido"].' — '; 
                  $columna = "idconsultorio";
                   $valor = $value["idconsultorio"];

                  $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);
                  echo '<td>'.$consultorio["nombreconsultorio"].'</td>
                  
                  </option>
                  ';
                 
                }


                ?>
              </select>
              <br>
               <center><button type="submit" class="btn btn-success">Ver PDF de doctor</button></center>