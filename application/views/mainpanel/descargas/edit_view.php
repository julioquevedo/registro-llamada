<div>
    <ul class="breadcrumb">
        <li><a href="mainpanel/descargas/listado">Listar de Descargas</a> <span class="divider">/</span> </li>

        <li><a href="mainpanel/descargas/nuevo">Nueva Descarga</a></li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar Descarga</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/descargas/actualizar" method="post" enctype="multipart/form-data" >
                <fieldset>
                    <legend>Modifique los datos deseados</legend>
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
                    <div class="control-group">
                        <label class="control-label required" for="typeahead">Categor&iacute;a </label>                        
                        <div class="controls">
                            <select name="categoria" id="categoria" required>
                            <option value="0">Elija una categor&iacute;a...</option>
                            <option value="manual"<?php if($descarga->categoria=="manual") echo ' selected'; ?>>Manual de usuario</option>
                            <option value="software"<?php if($descarga->categoria=="software") echo ' selected'; ?>>Software</option>
                            <option value="brochure"<?php if($descarga->categoria=="brochure") echo ' selected'; ?>>Brochure</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">T&iacute;tulo</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="titulo" name="titulo" value="<?php echo $descarga->titulo;?>" required="">
                        </div>
                    </div>
                       
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Orden</label>
                        <div class="controls">
                            <input type="text" class="span1 typeahead" id="orden" name="orden" value="<?php echo $descarga->orden; ?>" required="">
                        </div>
                    </div>    
                    <div class="control-group">
                        <label class="control-label">Estado</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="estado" id="estado1" value="A"<?php if($descarga->estado=="A") echo ' checked="checked"'; ?>>
                                Activo
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="estado" id="estado2" value="I"<?php if($descarga->estado=="I") echo ' checked="checked"'; ?>>
                                Inactivo
                            </label>
                        </div>
                    </div>                                      

                    <div class="control-group">
                        <label class="control-label" for="textarea2">Sumilla</label>
                        <div class="controls">
                            <textarea id="sumilla" name="sumilla" rows="3"><?php echo $descarga->sumilla;?></textarea>
                        </div>
                    </div>  

                    <div class="control-group">
                        <label class="control-label" for="typeahead">URL</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="url" name="url" value="<?php echo $descarga->url; ?>">
                            (Si llena este campo no debe subir un archivo)
                        </div>
                    </div>               
    
                    <div class="control-group">
                        <label class="control-label">Cambiar Archivo</label>                    
                        <div class="controls">
                        <?php
                            if($descarga->url==="")
                            {
                                // Se ha subido el archivo
                                $enlace = '<a href="mainpanel/dow/archivo/3dx7832dw'.$descarga->id_descarga.'" target="_blank">'.$descarga->archivo.'</a>';
                            }
                            else
                            {
                                $enlace = '<a href="'.$descarga->url.'" target="_blank">Descargar Archivo</a>';                                
                            }
                            echo $enlace;                                     
                        ?>                       
                          <input type="file" name="archivo">
                        </div>
                    </div><!--control-group-->
 
                     
                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary" value="GRABAR">
                        <input type="hidden" name="idDescarga" value="<?php echo $descarga->id_descarga; ?>">
                        <input type="hidden" name="archivoantg" value="<?php echo $descarga->archivo; ?>">
                        &nbsp;&nbsp;
                        <a class="btn btn-danger" href="mainpanel/descargas/listado">VOLVER AL LISTADO</a>
                    </div>

                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->