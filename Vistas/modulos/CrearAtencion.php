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
$id = substr($_GET["url"], 14);
    $tablaBD = "pacientes";
   $idpaciente = $id;
   $resultad = PacientesC::VerPacientesNC($tablaBD, $idpaciente);
   echo'<div class="content-wrapper">
  <section class="content-header">

  </section>

  <section class="content">

    <div class="box">
     <center>
  <label>Crear historial para: '.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].' <br>Cédula: '.$resultad["documento"].' </label></center>
    ';

?>


      <form method="post">

       <div class="panel panel-primary">
        <div class="panel-body">

          <?php 
            $id = substr($_GET["url"], 14);
              echo'<input type="hidden" name="pacienteid" value="'.$id.'">';

             ?>
             <?php 
             $tablaBD = "atencion";
             $resultado = AtencionesM::VerHistorialM($tablaBD, $id);
          if($id == $resultado["idpaciente"]){

        echo'

        <script type="text/javascript">
            alert("Este usuario ya tiene un historial, será redirigido al mismo");
            </script>
        <script>
        window.location = "http://localhost/clinica/historialclinico/'.$resultado["idpaciente"].'";
        </script

        ';
        ///'.$resultado["idpaciente"].'
      }
?>
              <br>
              <label>Antecedentes:</label>

        <textarea class="form-control" name="antecedentesC" required rows="5"></textarea>
        <br>


             <label>Alergias</label>
    
             <input type="text"   class="form-control" value=""name="alergiasC" required>

              <br>
              
              <label>Persona responsable y parentesco:</label>

        <input type="text" class="form-control" id="presponsableC" name="presponsableC" required>

              <br>
              <label>Intervenciones quirurgicas separadas por una coma (,)</label>
              <textarea class="form-control" id="intervencionesC" name="intervencionesC" required rows="3"></textarea>

            
              <br>
              <label>Vacunas completas:</label>
              <small>En caso de faltar, especificar las que falten.</small>
              <br>
              <small>En caso de estar completas, rellenar campo con "SI"</small>

              <input type="text" class="form-control" id="vacunasC" name="vacunasC" required>

          
              <br>
              <label>Cel:</label>

              <input type="number" class="form-control" id="celC" name="celC" required>
            
              <br>
            
              <br>
              <label>Email:</label>

              <input type="text" class="form-control" id="emailC" name="emailC" required>
<br>
              <label>Estado civil:</label>

              <input type="text" class="form-control" id="estadocivilC" name="estadocivilC" required>

            
              <br>
              <label>Ocupacion:</label>

              <input type="text" class="form-control" id="ocupacionC" name="ocupacionC" required>
 
         
              <br>
              <label>Fecha creación de historial:</label>

              <input type="date" class="form-control" id="fechaC" name="fechaC" value=""required>

              <br>
              <center>
              <button class="btn btn-success" type="submit">Crear historial</button>
              <a href="http://localhost/clinica/atencion" button class="btn btn-danger"> Regresar</button></a></center>
            </div>



          </div>

        </div> 
    

      </form>  
      <?php 

        $crear = new AtencionesC();
        $crear -> CrearAtencionC();



        ?> 
</section>
    </div>

  </div>


</div>
 