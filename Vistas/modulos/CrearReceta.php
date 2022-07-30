<?php

if($_SESSION["rol"] != "Doctor"){

  echo '
  <script>
  window.location = "inicio";
  </script>';
  return;
}
?>
<?php 
            $id = substr($_GET["url"], 12);
            $tablaBD = "pacientes";
   $resultado = AtencionesM::VerRecM($tablaBD, $id);
    $idpaciente = $id;
   $resultad = PacientesC::VerPacientesNC($tablaBD, $idpaciente);

            echo'
<div class="content-wrapper">
  <section class="content-header">

    <center><h2>Crear receta para '.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'</h2>
<label>Cédula: '.$resultad["documento"].'</label><br>
<label>Sexo: '.$resultad["sexo"].'</label><br>
<label>Fecha de nacimiento: '.$resultad["fecha"].'</label><br>
  <a href="http://localhost/clinica/atencion">
            <button class="btn btn-danger" name="btnEnviar">Regresar <i class="fa fa-arrow-left"></i></button></a>
           
</center>


  </section>
    <section class="content">
      <form method="post">

       <div class="panel panel-primary">
        <div class="panel-body">
              
              <input type="hidden" name="idpaciente" value="'.$id.'">
               <input type="hidden" name="id_doctor" value="'.$_SESSION["id"].'">
               <input type="hidden" name="idconsultorio" value="'.$_SESSION["idconsultorio"].'">
                '
                    
              ?>
            
          
           

              <br>
              <label>Motivo de la consulta (*):</label>

        <textarea class="form-control" name="consultaC" rows="4"></textarea>
        <br>


             <label>Medicamento (*):</label>
    
             <input type="text" class="form-control" name="medicamentoC">

              <br>
              
              <label>Dósis (*):</label>

        <input type="text" class="form-control" name="dosisC">

              <br>
              <label>Duración (*):</label>
              <textarea class="form-control" name="duracionC" rows="3"></textarea>

            
              <br>
              <label>Servicio (*):</label>

              <select class="form-control selectpicker" name="idservicio" required>
                                <?php 

                                      $columna = null;
                                      $valor = null;

                $resultado = ServiciosC::VerServiciosC($columna, $valor);

                foreach ($resultado as $key => $value) {
                  echo'<option value="'.$value["idservicio"].'">'.$value["nombre"].'   - Costo: '.$value["costo"].' DOP</option>';
                  
                }?>
            </select>
              <br>
              <label>Pago (*):</label>

              <input type="number" class="form-control"  name="pagoC" required oninvalid="this.setCustomValidity('Ingrese el pago realizado por el paciente')"
    oninput="this.setCustomValidity('')"> 
            
              <br>
              <label>Plan (*):</label>

              <input type="text" class="form-control"  name="planC">
<br>
              <label>Fecha (*):</label>

              <input type="date" class="form-control"  name="fechaC" required oninvalid="this.setCustomValidity('Ingrese la fecha de creación del servicio')"
    oninput="this.setCustomValidity('')">

              <br>
              <center>
              <button class="btn btn-success" type="submit">Crear Receta</button>
             
            </div>
          </div>

        </div>
      </form>  

            <?php 

        $crear = new AtencionesC();
        $crear -> CrearRecetaC();



        ?> 


</section>
    </div>

  </div>


</div>
 