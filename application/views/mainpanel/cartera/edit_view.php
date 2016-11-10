<div>
    <?php echo $lista_sub_menu;?>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar Cliente</h2>
            <div class="box-icon">

            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/clientes/actualizar" method="post" 
                  enctype="multipart/form-data" onsubmit="return valida_clientes()">
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
                        <label class="control-label" for="typeahead">RUC *</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="ruc" name="ruc" value="<?php echo $cliente->ruc; ?>" required maxlength="8">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Raz&oacute;n Social *</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="razon_social" name="razon_social" value="<?php echo $cliente->razon_social; ?>" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">CIIU *</label>
                        <div class="controls">
                            <input type="text" class="span2 typeahead" id="ciiu" name="ciiu" value="<?php echo $cliente->ciiu; ?>" required>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Fecha Fundaci&oacute;n *</label>
                        <div class="controls">
                            <input type="text" class="span2 typeahead" id="f_fundacion" name="f_fundacion" value="<?php echo $cliente->f_fundacion; ?>" required>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">N. Trabajadores *</label>
                        <div class="controls">
                            <input type="text" class="span2 typeahead" id="n_trabajadores" name="n_trabajadores" value="<?php echo $cliente->n_trabajadores; ?>" required>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Nombre Comercial*</label>
                        <div class="controls">
                            <input type="text" class="span2 typeahead" id="nombre_comercial" name="nombre_comercial" value="<?php echo $cliente->nombre_comercial; ?>" required>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Direcci&oacute;n *</label>
                        <div class="controls">
                            <input type="text" class="span2 typeahead" id="direccion" name="direccion" value="<?php echo $cliente->direccion; ?>" required>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Distrito *</label>
                        <div class="controls">
                            <input type="text" class="span2 typeahead" id="distrito" name="distrito" value="<?php echo $cliente->distrito; ?>" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Provincia *</label>
                        <div class="controls">
                            <input type="text" class="span2 typeahead" id="provincia" name="provincia" value="<?php echo $cliente->provincia; ?>" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Departamento *</label>
                        <div class="controls">
                            <input type="text" class="span2 typeahead" id="departamento" name="departamento" value="<?php echo $cliente->departamento; ?>" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Teléfono 1</label>
                        <div class="controls">
                            <input type="text" class="span3 typeahead" id="telefono01" name="telefono01" value="<?php echo $cliente->telefono01; ?>" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Teléfono 2</label>
                        <div class="controls">
                            <input type="text" class="span3 typeahead" id="telefono02" name="telefono02" value="<?php echo $cliente->telefono02; ?>" >
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Teléfono 3</label>
                        <div class="controls">
                            <input type="text" class="span3 typeahead" id="telefono03" name="telefono03" value="<?php echo $cliente->telefono03; ?>" >
                        </div>
                    </div>   
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Celular 1</label>
                        <div class="controls">
                            <input type="text" class="span3 typeahead" id="celular01" name="celular01" value="<?php echo $cliente->celular01; ?>" >
                        </div>
                    </div>                      
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Fax 1</label>
                        <div class="controls">
                            <input type="text" class="span3 typeahead" id="fax01" name="fax01" value="<?php echo $cliente->fax01; ?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Fax 2</label>
                        <div class="controls">
                            <input type="text" class="span3 typeahead" id="fax02" name="fax02" value="<?php echo $cliente->fax02; ?>" >
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Email *</label>
                        <div class="controls">
                            <input type="email" class="span3 typeahead" id="email" name="email" value="<?php echo $cliente->email; ?>" required>
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Direcci&oacute;n Web</label>
                        <div class="controls">
                            <input type="email" class="span3 typeahead" id="direccion_web" name="direccion_web" value="<?php echo $cliente->direccion_web; ?>" >
                        </div>
                    </div>                                        
                    <div class="control-group">
                        <label class="control-label">Estado</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="estado" id="estado1" value="A" <?php if($cliente->estado=="A") echo 'checked="checked"'; ?>>
                                Activo
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="estado" id="estado2" value="I" <?php if($cliente->estado=="I") echo 'checked="checked"'; ?>>
                                Inactivo
                            </label>
                        </div>
                    </div>                    
                     


                    <div class="form-actions">
                        <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $cliente->id_cliente; ?>">
                        
                        <input type="submit" class="btn btn-primary" value="GRABAR">
                        &nbsp;&nbsp;
                        <a class="btn btn-danger" href="mainpanel/clientes/listado">VOLVER AL LISTADO</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->