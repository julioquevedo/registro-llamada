<div>
    <?php echo $lista_sub_menu;?>
</div>
<div class="row-fluid sortable">
  
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Cartera de Clientes</h2>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary" href="mainpanel/clientes/cartera/nuevo">CREAR CARTERA</a>            
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
                        <th>Teleoperador</th>
                        <th>Nom Cartera</th>                        
                        <th>Num de Clientes</th>
                        <th>Creado</th>                        
                        <th>Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                   
                    for($i=0; $i<count($listado); $i++)
                    {
                        $current            = $listado[$i];
                        $ruc                = $current['ruc'];
                        $razon_social       = $current['razon_social'];                        
                        $nombre_comercial   = $current['nombre_comercial'];
                        $telefono01         = $current['telefono01'];                        
                        $id_cliente         = $current['id_cliente'];                                                

                        echo '<tr>';
                            echo '<td class="center">'.$orden.'</td>';
                            echo '<td>'.$ruc.'</td>';
                            echo '<td>'.$razon_social.'</td>';
                            echo '<td>'.$nombre_comercial.'</td>';                            
                            echo '<td>'.$telefono01.'</td>';
                            if($current['estado']=="A")
                            {
                                echo '<td><span class="label label-success">ACTIVO</span></td>';
                            }
                            else
                            {
                                echo '<td><span class="label label-important">INACTIVO</span></td>';
                            }
                            echo '<td>';

                            echo '<a class="btn btn-info" href="mainpanel/clientes/edit/'.$id_cliente.'"><i class="icon-edit icon-white"></i> </a> ';
                            echo '<a class="btn btn-danger" href="javascript:deleteCliente(\''.$id_cliente.'\')"><i class="icon-trash icon-white"></i></a>';

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