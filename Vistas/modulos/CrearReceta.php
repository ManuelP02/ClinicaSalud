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
  </section>


  <section class="content">

    <div class="box">
 <center>
  <label>Crear receta para: '.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].' <br>Cédula: '.$resultad["documento"].' </label></center>

      <form method="post">

       <div class="panel panel-primary">
        <div class="panel-body">
              
              <input type="hidden" name="idpaciente" value="'.$id.'">
               <input type="hidden" name="id_doctor" value="'.$_SESSION["id"].'">
                '
                    
              ?>
            
          
           

              <br>
              <label>Motivo de la consulta:</label>

        <textarea class="form-control" name="consultaC" required rows="4"></textarea>
        <br>


             <label>Medicamento</label>
    
             <input type="text" class="form-control" name="medicamentoC" required>

              <br>
              
              <label>Dósis:</label>

        <input type="text" class="form-control" name="dosisC" required>

              <br>
              <label>Duración</label>
              <textarea class="form-control" name="duracionC" required rows="3"></textarea>

            
              <br>
              <label>Servicio:</label>

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
              <label>Pago:</label>

              <input type="number" class="form-control"  name="pagoC" required>
            
              <br>
              <label>Plan:</label>

              <input type="text" class="form-control"  name="planC" required>
<br>
              <label>Fecha:</label>

              <input type="date" class="form-control"  name="fechaC" required>

              <br>
              <center>
              <button class="btn btn-success" type="submit">Crear Receta</button>
              <a href="http://localhost/clinica/atencion" button class="btn btn-danger"> Regresar</button></a></center>
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
 