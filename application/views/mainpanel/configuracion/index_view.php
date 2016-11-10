<div>
    <?php //echo $submenu_secciones;?>
</div>

<div class="row-fluid sortable">
    <?php
    if (isset($resultado) && ($resultado == "success")) {
        echo '<div class="alert alert-success">';
        echo '<button type="button" class="close" data-dismiss="alert">×</button>';
        echo '<strong>RESULTADO:</strong> La operación se realizó con éxito';
        echo '</div>';
    }
    ?>    
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Parametros de Configuraci&oacute;n</h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>                
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th width="5%">Nro</th>
                        <th width="25%">Parametro</th>
                        <th width="20%">Valor</th>
                        <th width="30%">Descripci&oacute;n</th>
                        <th width="20%">Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    for($i=0; $i<count($configuraciones); $i++)
                    {
                        $current = $configuraciones[$i];
                        $id_configuracion = $current['id'];                        
                        $llave = $current['llave'];
                        $valor = $current['valor'];
                        $descripcion= $current['descripcion'];                        
                        echo '<tr>';
                        echo '<td class="center">'.($i+1).'</td>';                        
                         echo '<td class="center">'.$llave.'</td>';
                        echo '<td>'.$valor.'</td>';                         
                        echo '<td class="center">'.$descripcion.'</td>';                        
                        echo '<td class="center">';
                        echo '<a class="btn btn-info" href="mainpanel/configuracion/edit/'.$id_configuracion.'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>            
        </div>
     </div><!--/span-->
</div><!--/row-->