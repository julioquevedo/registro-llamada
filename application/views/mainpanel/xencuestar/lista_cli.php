<div class="row-fluid sortable">
  
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Fecha de Trabajo: <?php echo Ymd_2_dmY($trabajo->f_inicio);?></h2>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary" href="mainpanel/xencuestar/lista">VOLVER</a>            
        </div>
        <div class="box-content">
            <h3>Lista de Clientes</h3>
            <?php
                if($this->session->userdata('success'))
                {
                    echo '<div class="alert alert-success">';
                    echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                    echo $this->session->userdata('success');
                    echo '</div>';
                    $this->session->unset_userdata('success');
                }
                if($this->session->userdata('error'))
                {
                    echo '<div class="alert alert-error">';
                    echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                    echo $this->session->userdata('error');
                    echo '</div>';
                    $this->session->unset_userdata('error');
                } 
            ?>              
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Clientes</th>
                        <th>DNI</th>                        
                        <th>Teléfonos</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                    $id_lista=$trabajo->id_lista;
                    $id_trabajo=$trabajo->id_trabajo;                    
                    for($i=0; $i<count($listado); $i++)
                    {
                        $current      = $listado[$i];
                        $id_cliente      = $current['id_cliente'];                        
                        $telefonos      = $current['telefonos'];                        
                        $dni    = $current['dni'];                        
                        $nombre    = $current['nombres'];
                        $apellidos    = $current['apellidos'];                        
                        $avance    = '5/30 - 30%';

                        echo '<tr>';
                            echo '<td class="center">'.$orden.'</td>';
                            echo '<td>'.$nombre.' '.$apellidos.'</td>';
                            echo '<td>'.$dni.'</td>';
                            echo '<td>'.$telefonos.'</td>';  //important       success                    
                            echo '<td><span class="label label-important">PENDIENTE</span></td>';
                            echo '<td>';
                            echo '<a class="btn btn-danger" href="javascript:iniciarEncuesta(\''.$id_cliente.'\',\''.$id_trabajo.'\',\''.$id_lista.'\')"> ENCUESTAR</a>';
                            echo '</td>';                            
                        echo '</tr>';
                        $orden++;
                    }
                ?>
                </tbody>
            </table>            
        </div>
     </div><!--/span-->
</div><!--/row-->