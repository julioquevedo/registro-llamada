<div>
    <?php echo $lista_sub_menu;?>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar Trabajo</h2>
            <div class="box-icon">

            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/trabajos/actualizar" method="post" 
                  enctype="multipart/form-data" onsubmit="return valida_trabajo()">
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
                        <label class="control-label" for="typeahead">Usuarios *</label>
                        <div class="controls">
                            <select name="id_usuario" id="id_usuario" required>
                            <option value="0">Seleccione al usuario...</option>
                            <?php
                            foreach ($usuarios as $key => $value) {
                                if($trabajo->id_usuario==$value->id){
                                    echo '<option value="'.$value->id.'" selected>'.$value->nombre.'</option>';    
                                }else{
                                    echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';    
                                }
                                
                            }
                            ?>
                            </select>  
                        </div>
                    </div>
    
                   
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Fecha de Inicio</label>
                        <div class="controls">
                            <input type="text" class="span2 typeahead" id="f_inicio" name="f_inicio" value="<?php echo Ymd_2_dmY($trabajo->f_inicio);?>" >
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Estado</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="estado" id="estado1" value="A" <?php if($trabajo->estado=="A") echo 'checked="checked"';?>>
                                Activo
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="estado" id="estado2" value="I" <?php if($trabajo->estado=="I") echo 'checked="checked"';?>>
                                Inactivo
                            </label>
                        </div>
                    </div>  
                    <div class="control-group">
                        <label class="control-label">Seleccione ENCUESTA</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="encuesta" id="encuesta1" value="1" <?php if($trabajo->encuesta=="1") echo 'checked="checked"';?>>
                                Encuesta 1
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="encuesta" id="encuesta2" value="2" <?php if($trabajo->encuesta=="2") echo 'checked="checked"';?>>
                                Encuesta 2
                            </label>
                        </div>
                    </div>                                      
                    <div class="control-group">
                        <label class="control-label">Clientes</label>
                        <div class="controls">
                            <div class="span5">
                                <div class="listaCli">
                                    <?php
                                    //var_dump($listaDetalle);

                                    foreach ($listaDetalle as $value) {
                                        $cliSelect[]=$value['id_cliente'];
                                    }
                                    

                                    foreach ($clientes as $key => $value) {
                                        if (in_array($value['id_cliente'], $cliSelect)) {
                                            echo '<input type="checkbox" name="cl" value="'.$value['id_cliente'].'" checked>'.$value['nombres'].' '.$value['apellidos'].' / Telf.'.$value['telefonos'].'<br>';
                                        }else{                                       
                                            echo '<input type="checkbox" name="cl" value="'.$value['id_cliente'].'">'.$value['nombres'].' '.$value['apellidos'].' / Telf.'.$value['telefonos'].'<br>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="span1">
                                <input type="hidden" id="cliconca" name="cliconca" value="<?php echo implode(",",$cliSelect)?>">
                            </div>
                                                        
                        </div>

                    </div>                      

                    <div class="form-actions">
                        <input type="hidden" name="id_trabajo" id="id_trabajo" value="<?php echo $trabajo->id_trabajo; ?>">
                        
                        <input type="submit" class="btn btn-primary" value="GRABAR">
                        &nbsp;&nbsp;
                        <a class="btn btn-danger" href="mainpanel/trabajos/listado">VOLVER AL LISTADO</a>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->