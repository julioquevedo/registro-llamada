
<div>
    <?php //echo $submenu_secciones;?>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar Registro</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/registros/actualizar" method="post" enctype="multipart/form-data" >
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
                        <label class="control-label" for="typeahead">Nombre</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="nombre" name="nombre" value="<?php echo $registro->nombre;?>" required="">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Email</label>
                        <div class="controls">
                            <input type="email" class="span6 typeahead" id="email" name="email" value="<?php echo $registro->email; ?>" required="">
                        </div>
                    </div>    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Telefono</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="telefono" name="telefono" value="<?php echo $registro->telefono; ?>" required="">
                        </div>
                    </div>                       
                    <div class="control-group">
                        <label class="control-label">Estado</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="estado" id="estado1" value="A"<?php if($registro->estado=="A") echo ' checked="checked"'; ?>>
                                Activo
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="estado" id="estado2" value="I"<?php if($registro->estado=="I") echo ' checked="checked"'; ?>>
                                Inactivo
                            </label>
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Usuario</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="usuario" name="usuario" value="<?php echo $registro->usuario;?>" required="">
                        </div>
                    </div>                                     
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Password</label>
                        <div class="controls">
                            <input type="text" class="span4 typeahead" id="password" name="password" value="<?php echo $registro->password; ?>" required="">
                        </div>
                    </div>  
                  
                     
                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary" value="GRABAR">
                        <input type="hidden" name="idRegistro" value="<?php echo $registro->id; ?>">
                        &nbsp;&nbsp;
                        <a class="btn btn-danger" href="mainpanel/registros/listado">VOLVER AL LISTADO</a>
                    </div>

                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->