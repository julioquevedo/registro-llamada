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
            <h2><i class="icon-edit"></i> Nuevo Banner</h2>
            <div class="box-icon">
                <a href="javascript:history.back(-1)" class="btn btn-round" title="VOLVER"><i class="icon-arrow-left"></i></a>                                                                
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/banners/grabar" method="post" enctype="multipart/form-data" onsubmit="return valida_banner()">
                <fieldset>
                    <legend>Ingrese los datos del nuevo banner</legend>
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
                        <label class="control-label" for="typeahead">Frase 1</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="frase_1" name="frase_1" value="" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Frase 2</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="frase_2" name="frase_2" value="" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Frase 3</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="frase_3" name="frase_3" value="" required="">
                        </div>
                    </div>                                      
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Orden</label>
                        <div class="controls">
                            <input type="text" class="span1 typeahead" id="orden" name="orden" value="<?php echo $ultimo;?>" required="">
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
                    <div class="control-group">
                        <div class="controls">
                            <div class="alert alert-block ">
                            <p>La imagen a subir debe tener 1889px de ancho y 600px de alto. Caso contrario la imagen se forzará al tamaño indicado.</p>                            </div> 
                        </div>
                    </div>                       
                    <div class="control-group">
                    <label class="control-label">Banner</label>
                        <div class="controls">
                          <input type="file" name="banner" id="banner">
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary" value="GRABAR">
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->