
<div>
    <?php //echo $submenu_secciones;?>
</div>
<div class="row-fluid">
 
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Listado de Teleoperadores</h2>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary" href="mainpanel/registros/nuevo">NUEVO TELEOPERADOR</a>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
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
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Tipo</th>                        
                        <th>Registro</th>                        
                        <th>Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                    //var_dump($registros);
                    foreach($registros as $registro)
                    {
                        $nivel=$registro->nivel;
                        switch ($nivel) {
                            case '0':
                                $tipo='Administrador';
                                break;
                            case '1':
                                $tipo='Jefe de Teleoperador';
                                break;                            
                            case '2':
                                $tipo='Teleoperador';
                                break; 
                        }
                        echo '<tr>';
                        echo '<td class="center">'.$orden.'</td>';
                        echo '<td>'.$registro->nombre.'</td>';
                        echo '<td>'.$registro->usuario.'</td>';
                        if($registro->estado=="A")
                        {
                            echo '<td><span class="label label-success">ACTIVO</span></td>';
                        }
                        else
                        {
                            echo '<td><span class="label label-important">INACTIVO</span></td>';
                        }                        
                        echo '<td>'.$tipo.'</td>';
                        echo '<td>'.substr($registro->fecha_registro,0,16).'</td>';                        
                        echo '<td>';                        
                        echo '<a class="btn btn-info" href="mainpanel/registros/edit/'.$registro->id.'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                        echo '<a class="btn btn-danger" href="javascript:delRegistro(\''.$registro->id.'\')"><i class="icon-trash icon-white"></i>Borrar</a>';
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