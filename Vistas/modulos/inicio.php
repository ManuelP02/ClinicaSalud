<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            

               

                    <?php 

                    $inicio = new InicioC();
                    $inicio -> MostrarInicioC();
                    echo'
                     <div class="box-footer" style="text-align: right;">

                      Clinica salud 2022 &copy; Todos los derechos reservados
                                       <br>';
                        
                        if($_SESSION["rol"] == "Administrador"){
                          echo ' <a href="inicio-editar">
                          <br>
                          <center><button class="btn btn-success btn-lg">Editar inicio</button></center>
                        </a>';

                        }


                    ?>




                      

                      </div>
                       
                        </section>
            

                      </div>
                  
                    


                    