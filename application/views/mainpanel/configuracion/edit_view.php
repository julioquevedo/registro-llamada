<div>
    <?php //echo $submenu_secciones;?>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Editar Parametro</h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>                
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/configuracion/actualizar" method="post" enctype="multipart/form-data" 
                  onsubmit="return valida_parametro()">
                <fieldset>
                    <legend>Modifique los valores del parametro</legend>
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
                        <label class="control-label" for="typeahead">Parametros</label>
                        <div class="controls">
                            <input type="text" class="span5 typeahead" id="llave" name="llave" readonly="readonly" value="<?php echo $configuracion->llave; ?>" >
                        </div>
                    </div>                  
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Valor</label>
                        <?php
                        if($configuracion->tipo==0){
                            ?>
                            <div class="controls">
                                 <input type="text" class="span5 typeahead" id="valor" name="valor" value="<?php echo $configuracion->valor; ?>" >
                            </div>                        
                            <?php
                        }else if($configuracion->tipo==1){
                            ?>
                            <div class="controls">
                                <textarea id="valor" name="valor" rows="3"><?php echo $configuracion->valor;; ?></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'valor',{height:'100px',width:'300px',toolbar:'Basic'} );
                                </script>
                            </div>                          
                            <?php
                        }else if($configuracion->tipo==2){
                            ?>
                            <div class="controls">
                                <label class="radio">
                                    <input type="radio" name="valor" value="no" <?php if($configuracion->valor=="no") echo ' checked="checked"'; ?>>
                                    No
                                </label>
                                <div style="clear:both"></div>
                                <label class="radio">
                                    <input type="radio" name="valor" value="si" <?php if($configuracion->valor=="si") echo ' checked="checked"'; ?>>
                                    Si
                                </label>                                
                            </div>
                            <?php
                        }
                        ?>
                      
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Descripci&oacute;n</label>
                        <div class="controls">
                            <input type="text" class="span7 typeahead" id="descripcion" readonly="readonly" name="descripcion" value="<?php echo $configuracion->descripcion; ?>" >
                        </div>
                        
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="id_configuracion" value="<?php echo $configuracion->id; ?>">
                        <input type="hidden" id="tipo" value="<?php echo $configuracion->tipo; ?>">                        
                        <input type="submit" class="btn btn-primary" value="GRABAR">
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->