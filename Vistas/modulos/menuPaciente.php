  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        
        <li>
          <a href="http://localhost/clinica/inicio">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>
        </li>
        </li>
      
          <li>
                          <?php

          echo'<a href="http://localhost/clinica/Recetas/'.$_SESSION["idpaciente"].'">';
            
                          ?>
            <i class="fa fa-list-alt"></i>
            <span>Recetas</span>
          </a>
        </li>


                        <li>
                           <?php
          echo'<a href="http://localhost/clinica/historialpacient/'.$_SESSION["idpaciente"].'">
            <i class="fa fa-address-card"></i>
            <span>Historial clínico</span>
          </a>
        </li>';?>
            <li>
          <a href="http://localhost/clinica/Ver-consultorios">
            <i class="fa fa-calendar-plus-o"></i>
            <span>Agendar cita</span>
          </a>
        </li>
                        <li>
                          <?php

          echo'<a href="http://localhost/clinica/historial/'.$_SESSION["idpaciente"].'">';
            
                          ?>
            <i class="fa fa-history"></i>
            <span>Historial de citas</span>
          </a>
        </li>
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>