
<div>
    <?php //echo $submenu_secciones;?>
</div>
<div class="row-fluid">
 
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Ultimas encuestas creadas</h2>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary" href="mainpanel/encuesta/nuevo/paso1">CREAR ENCUESTA</a>
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
                        <th>T&iacute;tulo</th>
                        <th>Desc</th>                        
                        <th>Usuario</th>
                        <th>Registrado</th>
                        <th>Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                    //var_dump($listados);
                    foreach($listados as $listado)
                    {
                        echo '<tr>';
                        echo '<td class="center">'.$orden.'</td>';
                        echo '<td>'.$listado->tit_encu.'</td>';
                        echo '<td>'.$listado->desc_encu.'</td>';
                        echo '<td>'.$listado->nombre.' ('.$listado->usuario.')</td>';                    
                        echo '<td>'.substr($listado->fg,0,16).'</td>';                        
                        echo '<td>';                        
                        echo '<a class="btn btn-info" href="mainpanel/encuesta/edit/'.$listado->id_encu .'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                        echo '<a class="btn btn-danger" href="javascript:delEncuesta(\''.$listado->id_encu.'\')"><i class="icon-trash icon-white"></i>Borrar</a>';
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