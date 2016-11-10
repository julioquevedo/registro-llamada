
<ul class="nav nav-tabs nav-stacked main-menu">
    <li class="nav-header hidden-tablet">SECCIONES</li>
    <li <?php if($current_section=='encuesta'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/encuesta/lista"><i class="icon-th"></i><span class="hidden-tablet"> Gestion de Encuestas</span></a></li>          
<!--     <li <?php if($current_section=='trabajos'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/trabajos/nuevo"><i class="icon-th"></i><span class="hidden-tablet"> Asignar Encuestas</span></a></li>    -->   
    <li <?php if($current_section=='clientes'){echo 'class="active"';}?>><a class="ajax-link" href="mainpanel/clientes/listado"><i class="icon-th"></i><span class="hidden-tablet"> Clientes</span></a></li>  
    
    <li class="nav-header hidden-tablet">Configuración</li>
    <li><a class="ajax-link" href="mainpanel/mis-datos"><i class="icon-lock"></i><span class="hidden-tablet"> Datos de Acceso</span></a></li>
    <li><a class="ajax-link" href="mainpanel/registros/listado"><i class="icon-lock"></i><span class="hidden-tablet"> Usuarios</span></a></li>
</ul>
