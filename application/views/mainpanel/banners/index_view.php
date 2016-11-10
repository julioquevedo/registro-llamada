<div>
    <ul class="breadcrumb">
       <li><a href="mainpanel/banners">Banner</a> <span class="divider">/</span></li>
       <li><a href="mainpanel/banners/nuevo">Nuevo Banner</a> <span class="divider">/</span></li>
       <li><a href="mainpanel/clientes/listado">Clientes</a> </li>              
    </ul>
</div>
<div class="row-fluid sortable">
   
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Banners</h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>                                                
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
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
            <table class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Imagen</th>
                        <th>Orden</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    $orden = 1;
                    foreach($banners as $banner)
                    {
                            $pic = '<img src="files/banners/'.$banner->imagen.'" class="img-responsive"/>';
                        
                        echo '<tr>';
                        echo '<td class="center">'.$orden.'</td>';
                        echo '<td class="celdaImagen" >'.$pic.'</td>';
                        echo '<td>'.$banner->orden.'</td>';
                        if($banner->estado=="A")
                        {
                            echo '<td><span class="label label-success">ACTIVO</span></td>';
                        }
                        else
                        {
                            echo '<td><span class="label label-important">INACTIVO</span></td>';
                        }
                        echo '<td>';
                        echo '<a class="btn btn-success" href="javascript:showBanner(\''.$banner->imagen.'\')"><i class="icon-zoom-in icon-white"></i>  Ver</a> ';
                        echo '<a class="btn btn-info" href="mainpanel/banners/edit/'.$banner->idbanner.'"><i class="icon-edit icon-white"></i>  Editar</a> ';
                        echo '<a class="btn btn-danger" href="javascript:deleteBanner(\''.$banner->idbanner.'\')"><i class="icon-trash icon-white"></i>Borrar</a>';
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