<div>
    <?php echo $lista_sub_menu;?>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Generar una nueva Asignaci&oacute;n</h2>
            <div class="box-icon">

            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/asignaciones/grabar" method="post" enctype="multipart/form-data" onsubmit="return valida_asignacion()">
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Asignacion *</label>
                        <div class="controls">
                            <input type="text" placeholder="Nombre de la asignacion" class="span6 typeahead" id="nombre" name="nombre" value="" required maxlength="100">
                        </div>
                    </div>  
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Inicio *</label>
                        <div class="controls">
                            <input type="text" class="span3 typeahead" id="f_inicio_asignacion" name="f_inicio_asignacion" value="" required >
                        </div>
                    </div>   
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Fin *</label>
                        <div class="controls">
                            <input type="text" class="span3 typeahead" id="f_fin_asignacion" name="f_fin_asignacion" value="" required >
                        </div>
                    </div>                                                      
                <fieldset>
                    
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

                    <legend>Encuesta</legend>                   
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Seleccione *</label>
                        <div class="controls">
                            <select name="usuarios_id" id="usuarios_id" required>
                            <?php
                            foreach ($listado_encuestas as $key => $value) {
                                echo '<option value="'.$value['id_encu'].'">'.$value['tit_encu'].'</option>';
                            }
                            ?>
                            </select>  
                        </div>
                    </div>                

                    <legend>Operador</legend>                   
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Seleccione *</label>
                        <div class="controls">
                            <select name="usuarios_id" id="usuarios_id" required>
                            <?php
                            foreach ($listado_operadores as $key => $value) {
                                echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                            }
                            ?>
                            </select>  
                        </div>
                    </div>  
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Cartera *</label>
                        <div class="controls">
                            <select name="cartera_id" id="cartera_id" required>
                            <option>Ninguna...</option>
                            </select>  
                        </div>
                    </div> 


                    <div class="control-group">
                        <label class="control-label" for="typeahead">Clientes: </label>
                        <div class="controls ">
                            <div class="wropccli">
                            <?php
                            foreach ($listado_clientes as $key => $value) {
                                //echo '<div class="capaCli">';
                                //echo '<input type="checkbox" value="'.$value['id_cliente'].'" name="clientes[]" class="checkCli">'.$value['nombre_comercial'];
                                //echo '</div>';

                            }
                            ?>
                            </div>
                        </div>
                    </div>                                                              
                    <div class="control-group">
                        <label class="control-label">Estado</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="estado" id="estado1" value="A" checked="checked">
                                Activo
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="estado" id="estado2" value="I">
                                Inactivo
                            </label>
                        </div>
                    </div>                    
                    

                    
                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary" value="GRABAR">
                        &nbsp;&nbsp;
                        <a class="btn btn-danger" href="mainpanel/clientes/cartera">VOLVER AL LISTADO</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->