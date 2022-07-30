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
  <center><h2>Crear historial clínico para '.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'</h2>
<label>Cédula: '.$resultad["documento"].'</label><br>
<label>Sexo: '.$resultad["sexo"].'</label><br>
<label>Fecha de nacimiento: '.$resultad["fecha"].'</label><br>
  <a href="http://localhost/clinica/atencion">
            <button class="btn btn-danger" name="btnEnviar">Regresar <i class="fa fa-arrow-left"></i></button></a>
           
</center>

            

  </section>

    ';

?>
    <section class="content">

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
              <label>Antecedentes (*):</label>

        <textarea class="form-control" name="antecedentesC" required rows="5" 
        oninvalid="this.setCustomValidity('Ingrese los antecedentes')"
    oninput="this.setCustomValidity('')"
        ></textarea>
        <br>


             <label>Alergias (*):</label>
    
             <input type="text"   class="form-control" value=""name="alergiasC" required
             oninvalid="this.setCustomValidity('Ingrese las alergias del paciente')"
    oninput="this.setCustomValidity('')"
             >

              <br>
              
              <label>Persona responsable y parentesco (*):</label>

        <input type="text" class="form-control" id="presponsableC" name="presponsableC" required
        oninvalid="this.setCustomValidity('Ingrese la persona responsable')"
    oninput="this.setCustomValidity('')"
        >

              <br>
              <label>Intervenciones quirurgicas separadas por una coma (,)</label>
              <textarea class="form-control" id="intervencionesC" name="intervencionesC" required rows="3"
              oninvalid="this.setCustomValidity('Ingrese las intervenciones')"
    oninput="this.setCustomValidity('')"
              ></textarea>

            
              <br>
              <label>Vacunas completas (*):</label>
              <small>En caso de faltar, especificar las que falten.</small>
              <br>
              <small>En caso de estar completas, rellenar campo con "SI"</small>

              <input type="text" class="form-control" id="vacunasC" name="vacunasC" required
                oninvalid="this.setCustomValidity('Ingrese las vacunas')"
    oninput="this.setCustomValidity('')"
              >

          
              <br>
              <label>Cel (*):</label>

              <input type="number" class="form-control" id="celC" name="celC" required oninvalid="this.setCustomValidity('Ingrese el número telefónico')"
    oninput="this.setCustomValidity('')">
            
              <br>
            
              <br>
              <label>Email (*):</label>

              <input type="text" class="form-control" id="emailC" name="emailC" required oninvalid="this.setCustomValidity('Ingrese el correo electrónico')"
    oninput="this.setCustomValidity('')">
<br>
              <label>Estado civil (*):</label>

              <input type="text" class="form-control" id="estadocivilC" name="estadocivilC" required oninvalid="this.setCustomValidity('Ingrese el estado civil')"
    oninput="this.setCustomValidity('')">

            
              <br>
              <label>Ocupacion (*):</label>

              <input type="text" class="form-control" id="ocupacionC" name="ocupacionC" required oninvalid="this.setCustomValidity('Ingrese la ocupación')"
    oninput="this.setCustomValidity('')">
 
         
              <br>
              <label>Fecha creación de historial (*):</label>

              <input type="date" class="form-control" id="fechaC" name="fechaC" value=""required oninvalid="this.setCustomValidity('Ingrese la fecha de creación del historial')"
    oninput="this.setCustomValidity('')">

              <br>
              <center>
              <button class="btn btn-success" type="submit">Crear historial</button>
              </center>
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
 