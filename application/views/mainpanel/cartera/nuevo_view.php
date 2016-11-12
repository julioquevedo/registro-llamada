<div>
    <?php echo $lista_sub_menu;?>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Generar una nueva Cartera</h2>
            <div class="box-icon">

            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/clientes/cartera/grabar" method="post" enctype="multipart/form-data" onsubmit="return valida_cartera()">
                <fieldset>
                    <legend>Ingrese los datos</legend>
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
                        <label class="control-label" for="typeahead">Nombre de la Cartera *</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="nombre" name="nombre" value=""  maxlength="100">
                        </div>
                    </div>
<?php
//var_dump($listado_operadores);
?>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Selecciona el teleoperador *</label>
                        <div class="controls">
                            <select name="usuarios_id" id="usuarios_id" required>
                            <option value="0">Seleccione ...</option>
                            <?php
                            foreach ($listado_operadores as $key => $value) {
                                echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                            }
                            ?>
                            </select>  
                        </div>
                    </div>                    

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Clientes: </label>
                        <div class="controls ">
                            <div class="wropccli">
                            <?php
                            foreach ($listado_clientes as $key => $value) {
                                echo '<div class="capaCli">';
                                echo '<input type="checkbox" value="'.$value['id_cliente'].'" name="clientes[]" class="checkCli">'.$value['nombre_comercial'];
                                echo '</div>';

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