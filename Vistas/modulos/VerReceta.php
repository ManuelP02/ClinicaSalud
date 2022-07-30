<?php
if($_SESSION["rol"] != "Paciente" && $_SESSION["rol"] != "Doctor"){

  echo '
  <script>
  window.location = "inicio";
  </script>';
  return;

}
?>      


       <?php 
    $tablaBD = "recetas";

    $id = substr($_GET["url"], 10);

    $resultado = AtencionesM::VerRecM($tablaBD, $id);

     $tablaBD = "pacientes";
   $idpaciente = $resultado["idpaciente"];
   $resultad = PacientesC::VerPacientesNC($tablaBD, $idpaciente);



echo'

    <div class="content-wrapper">
   <section class="content-header">
   <center>
     <h2>Su receta '.$resultad["nombre"].' '.$resultad["Apaterno"].'</h2>
     <a href="http://localhost/clinica/Recetas/'.$resultado["idpaciente"].'" <button class="btn btn-danger"> Regresar <i class="fa fa-arrow-left"></i></button></a></center>
   </section>

   <section class="content">



    <div class="box-body">  
       <form action="http://localhost/clinica/pdfrec" target="_blank" method="POST">

        <div class="panel panel-primary">
         <div class="panel-body">

      <label>Motivo de la consulta:</label>
    
    <input type="hidden" class="form-control" name="idreceta" value="'.$resultado["idreceta"].'"></input>

        <input type="hidden" class="form-control" name="nombrep" value="'.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'">
     <input type="hidden" class="form-control" name="documento" value="'.$resultad["documento"].'"></input>


       <input type="text" class="form-control" name="motivo" readonly value="'.$resultado["motivo"].'"></input>
 <br>

         <label>Medicamentos:</label>

               <input type="text" class="form-control" name="medicamento" readonly value="'.$resultado["medicamento"].'">
 <br>
               <label>Dósis:</label>

         <input type="text" class="form-control" name="dosis" readonly value="'.$resultado["dosis"].'">

           
               <br>
               <label>Duración:</label>
              <input type="text" class="form-control" name="duracion" readonly value="'.$resultado["duracion"].'">

            

          
               <br>
               <label>Plan:</label>

               <input type="text" class="form-control"  name="plan" readonly value="'.$resultado["plan"].'">
               <br>
               ';

               $tablaBD = "doctores";
               $columna = "id";
               $valor = $resultado["id_doctor"];
               $doctores = DoctoresM::VerDoctoresTM($tablaBD, $columna, $valor);

               echo'<label>Creada por:</label>

               <input type="text" class="form-control"  readonly name="doctor" value="Dr. '.$doctores["nombre"].' '.$doctores["apellido"].'">

            
               <br>
               <label>Fecha:</label>

               <input type="date" class="form-control" name="fecha" readonly value="'.$resultado["fecha"].'" name="email">';
 
                
        
            echo'   <br>
             </div>

             <center>
<button class="btn btn-success" type="submit"> Descargar Receta en PDF <i class="fa fa-download"></button></i>
    
</center>
        <hr>
         
    
       </form>'; 

echo'
<form action="http://localhost/clinica/pdfserv" target="_blank" method="POST">
<section class="content">

     <div class="box">


    <div class="box-body">  
    ';
               $tablaBD = "servicios";
               $columna = "idservicio";
               $valor = $resultado["idservicio"];
               $servicio = ServiciosM::VerServiciosTM($tablaBD, $columna, $valor);
               echo' 
               <input type="hidden" class="form-control" name="idreceta" value="'.$resultado["idreceta"].'"></input>
            <input type="hidden" class="form-control" name="idservicio" value="'.$servicio["idservicio"].'"></input>


        <input type="hidden" class="form-control" name="nombrep" value="'.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'">
     <input type="hidden" class="form-control" name="documento" value="'.$resultad["documento"].'"></input>
                    <input type="hidden" class="form-control" name="fecha" readonly value="'.$resultado["fecha"].'">

               <center><h2>Descargar factura</h2>
               <label>Servicio generado por receta:</label>
         <input type="text" class="form-control" name="servicio" readonly value="'.$servicio["nombre"].' - Costo: '.$servicio["costo"].' DOP">

         <br>
         <label>Pago del servicio:</label>

         <input type="text" class="form-control" name="pago" readonly value="'.$resultado["pago"].' DOP">
         <br>
         <center>
<button class="btn btn-primary" type="submit"> Descargar Factura en PDF <i class="fa fa-download"></button></i>
    
</center>
       ';
             $tablaBD = "doctores";
               $columna = "id";
               $valor = $resultado["id_doctor"];
               $doctores = DoctoresM::VerDoctoresTM($tablaBD, $columna, $valor);

      echo'<input type="hidden" class="form-control" name="doctor" value="Dr. '.$doctores["nombre"].' '.$doctores["apellido"].'">

      </form>
      ';

