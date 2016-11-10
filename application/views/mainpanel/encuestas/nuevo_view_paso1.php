
<div>
    <?php //echo $submenu_secciones;?>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Crear Encuesta</h2>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/encuesta/graba_paso1" method="post" >
                <fieldset>
                    <?php

                        if($this->session->userdata('error'))
                        {
                            echo '<div class="alert alert-error">';
                            echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                            echo $this->session->userdata('error');
                            echo '</div>';
                            $this->session->unset_userdata('error');
                        } 
                    ?>                 
                    <h4>T&iacute;tulo de la Encuenta</h4>
                    <input type="text" class="span12 typeahead" id="tit_encu" name="tit_encu" value="" required="">

                    <br>
                    <h4>Descripci&oacute;n</h4>
                    <textarea class="span12" style="" id="desc_encu" name="desc_encu"></textarea>                            

                    <br>
                    <a class="btn btn-danger" href="mainpanel/encuesta">CANCELAR</a>
                    <input type="submit" name="siguiente" class="btn btn-info" value="SIGUIENTE">
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->