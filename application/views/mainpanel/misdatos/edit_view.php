

<div class="row-fluid sortable">
                        <div class="box span12">
                            <div class="box-header well" data-original-title>
                                <h2><i class="icon-edit"></i> Datos de acceso</h2>
                                <div class="box-icon">
                                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                                    <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form class="form-horizontal" action="javascript:void(0)" enctype="multipart/form-data">
                                    <fieldset>
                                        
                                        <?php
                                        if (isset($resultado)) {
                                            if ($resultado == "success") {
                                                echo '<div class="alert alert-success">';
                                                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                                                echo '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente';
                                                echo '</div>';
                                            }
                                            if ($resultado == "error") {
                                                echo '<div class="alert alert-error">';
                                                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                                                echo '<strong>RESULTADO:</strong> ERROR al procesar su informaicion';
                                                echo '</div>';
                                            }
                                            if ($resultado == "passincorrect") {
                                                echo '<div class="alert alert-error">';
                                                echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                                                echo '<strong>RESULTADO:</strong> EL PASSWORD ACTUAL ES INCORRECTO';
                                                echo '</div>';
                                            }                                            
                                        }
                                        ?>  
                                        <legend>Informaci&oacute;n</legend>
                                        <div class="control-group">
                                            <div class="span6">
                                                <label class="control-label" for="typeahead">Nombres</label>
                                                <div class="controls">
                                                    <input type="text" class="span8 typeahead" id="nombres" name="nombres" value="<?php echo $usuario->nombre;?>" >
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <legend>Datos de acceso</legend>
                                        
                                        <div class="control-group">
                                            <div class="span3">
                                                <label class="control-label" for="typeahead">Usuario</label>
                                                <div class="controls">
                                                    <input type="text" class="span12 typeahead" id="usuario" name="usuario" readonly="" value="<?php echo $usuario->usuario;?>" >
                                                </div>
                                            </div>                                            
                                            <div class="span3">
                                                <label class="control-label" for="typeahead">Password actual</label>
                                                <div class="controls">
                                                    <input type="password" class="span12 typeahead" id="password" name="password" value="" >
                                                </div>                                                
                                            </div>                                             
                                            <div class="span3">
                                                <label class="control-label" for="typeahead">Nuevo password</label>
                                                <div class="controls">
                                                    <input type="password" class="span12 typeahead" id="newpasw" name="newpasw" value="" >
                                                </div>
                                            </div>
                                            <div class="span3">
                                                <label class="control-label" for="typeahead">Confirmar password</label>
                                                <div class="controls">
                                                    <input type="password" class="span12 typeahead" id="repnewpasw" name="repnewpasw" value="" >
                                                </div>                                                
                                            </div>  
                                        </div>                                          

                                        <div class="form-actions">
                                            <input type="button" class="btn btn-primary" value="Actualizar" onclick="update_misdatos()">
                                        </div>
                                    </fieldset>
                                </form>   

                            </div>
                        </div><!--/span-->
                </div>




