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

                //pre($listado);
            ?>              
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Asignado a ...</th>
                        <th>Cartera</th>                        
                        <th>Num. Clientes</th>
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
                        $nombreCartera      = $current['nombre'];
                        $nomusuario         = $current['nomusuario'];                        
                        $fg                 = $current['fg'];
                        $idtcab_cartera     = $current['idtcab_cartera'];                        
                        $numCli             = "2";
                        echo '<tr>';
                            echo '<td class="center">'.$orden.'</td>';
                            echo '<td>'.$nomusuario.'</td>';
                            echo '<td>'.$nombreCartera.'</td>';
                            echo '<td>'.$numCli.'</td>';                            
                            echo '<td>'.$fg.'</td>';
                            // if($current['estado']=="A")
                            // {
                            //     echo '<td><span class="label label-success">ACTIVO</span></td>';
                            // }
                            // else
                            // {
                            //     echo '<td><span class="label label-important">INACTIVO</span></td>';
                            // }
                            echo '<td>';

                            echo '<a class="btn btn-info" href="mainpanel/clientes/cartera/edit/'.$idtcab_cartera.'"><i class="icon-edit icon-white"></i> </a> ';
                            echo '<a class="btn btn-danger" href="javascript:deleteCartera(\''.$idtcab_cartera.'\')"><i class="icon-trash icon-white"></i></a>';

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