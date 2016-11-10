<div>
    <?php echo $lista_sub_menu;?>
</div>
<div class="row-fluid sortable">
  
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Listado de Trabajos</h2>
            
        </div>
        <div class="box-content">
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
                        <th>Usuario</th>
                        <th>Fecha de Inicio</th>                        
                        <th>Avance</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                   
                    for($i=0; $i<count($listado); $i++)
                    {
                        $current      = $listado[$i];
                        $id_trabajo      = $current['id_trabajo'];                        
                        $f_inicio      = $current['f_inicio'];
                        $id_usuario    = $current['id_usuario'];                        
                        $nombre    = $current['nombre'];
                        $avance    = '0%';

                        echo '<tr>';
                            echo '<td class="center">'.$orden.'</td>';
                            echo '<td>'.$nombre.'</td>';
                            echo '<td>'.$f_inicio.'</td>';
                            echo '<td>'.$avance.'</td>';                            
                            if($current['estado']=="A")
                            {
                                echo '<td><span class="label label-success">ACTIVO</span></td>';
                            }
                            else
                            {
                                echo '<td><span class="label label-important">INACTIVO</span></td>';
                            }
                            echo '<td>';

                            echo '<a class="btn btn-info" href="mainpanel/trabajos/edit/'.$id_trabajo.'"><i class="icon-edit icon-white"></i> </a> ';
                            echo '<a class="btn btn-danger" href="javascript:deleteTrabajo(\''.$id_trabajo.'\')"><i class="icon-trash icon-white"></i></a>';

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