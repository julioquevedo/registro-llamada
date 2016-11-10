
<div>
    <?php 
    //var_dump($encuesta);
    ?>
</div>
<div class="row-fluid paso2">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Crear Encuesta</h2>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="mainpanel/encuesta/paso3" method="post" >
                <fieldset>
                    <legend>T&iacute;tulo: <?php echo $encuesta->tit_encu?></legend>               
                    <div style="width:100%;padding: 5px 0; font-size: 11px;">Descripci&oacute;n: <?php echo $encuesta->desc_encu;?></div>

                          
                    <br>
                    <legend>Preguntas</legend> 
                    <br>

                    <?php
                    $id_encu=$encuesta->id_encu;
                    foreach ($anuncios as $key => $value) {
                        $id_enun        =$value['id_enun'];
                        $obligatorio    =$value['obligatorio'];
                        $desc_enun      =$value['desc_enun'];                                                
                        $id_tip_enun    =$value['id_tip_enun'];
                        $opciones       =$value['opciones'];  

                        echo "<div class='wr_pregunta' id='enunciado_".$id_enun."'>";
                            echo "<div class='header'>";                        
                                echo "<h4>".($key+1).". ".$desc_enun."</h4>";
                                echo "<a href='#' data-id='".$id_enun."' data-encu='".$id_encu."' class='botones_a delete_anun'><i class='icon-trash'></i></a>";

                                echo "<a href='#' data-id='".$id_enun."' data-encu='".$id_encu."' class='botones_a get_anun'><i class='icon-edit'></i></a>";                                
                            echo "</div>"; 

                            echo "<div class='body'>";     
                                switch ($id_tip_enun) {
                                    case 1:
                                        foreach ($opciones as $key2 => $value2) {
                                            $desc_opc   =$value2['desc_opc'];
                                                echo '<label class="radio">';
                                                echo '<div class="radio" id="uniform-estado1">
                                                        <span class="checked"><input type="radio" name="opcion_'.$id_enun.'" id="estado1" value="A" checked="checked" style="opacity: 0;" disabled></span>
                                                      </div>'.$desc_opc.'
                                                      </label>';
                                                echo '<div style="clear:both"></div>';
                                        }

                                    break;

                                    case 2:
                                        foreach ($opciones as $key2 => $value2) {
                                            $desc_opc   =$value2['desc_opc'];
                                                echo "<input type='checkbox' name='anunciado-".$id_enun."' disabled>".$desc_opc."";
                                                echo '<div style="clear:both"></div>';
                                               
                                        }

                                    break;

                                    default:
                                        echo "<textarea class='txta_padd' name='anunciado-".$id_enun."' disabled></textarea>";
                                        break;
                                }
                            echo "</div>"; 
                        echo "</div>";
                    }
                    ?>
                    <a class="btn btn-danger modal-anadir-pregunta" href="#" onclick="anade_encuesta()"> Añadir pregunta <i class="icon-th icon-white"></i></a>
                    <br>
                    <br>
<!--                     <a class="btn btn-danger" href="mainpanel/encuesta">CANCELAR</a>
                    <input type="submit" class="btn btn-info" href="mainpanel/encuesta/graba_paso1" value="SIGUIENTE"> -->
                    <input type="hidden" id="id_encu" value="<?php echo $encuesta->id_encu;?>">
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->