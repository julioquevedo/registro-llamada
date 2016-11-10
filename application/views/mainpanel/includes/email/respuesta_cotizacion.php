	<style type="text/css">
	.tabla{width:100%;}
	.tabla thead td{background:#738e39;color:white;padding:5px;}
	.tabla tbody td{border-bottom:#c0c0c0 solid 1px;border-left:#c0c0c0 solid 1px;padding:5px;}	
	.tabla tbody td:first-child{border:none;border-left:#c0c0c0 solid 1px;border-bottom:#c0c0c0 solid 1px;}		
	.tabla tbody td:last-child{border:none;border-left:#c0c0c0 solid 1px;border-right:#c0c0c0 solid 1px;border-bottom:#c0c0c0 solid 1px;}			
	</style>  

            <table class="tabla" cellpadding="10" cellspacing="0" border="1">
            <tr>
            	<td><strong>Cliente:</strong></td><td><?php echo $cotizacion['nombres'].' '.$cotizacion['apellidos']?></td>
            	<td><strong>Solicitado:</strong></td><td><?php echo $cotizacion['fecha_registro']; ?></td>            	
            </tr>
            </table>
            <br><br>
            <table class="tabla" cellpadding="10" cellspacing="0" border="1">
            <thead>
            <tr>
            <td style="background:#738e39;color:white;padding:5px;">Producto</td>
            <td style="background:#738e39;color:white;padding:5px;">Color</td>
            <td style="background:#738e39;color:white;padding:5px;">Impresi&oacute;n</td>
            <td style="background:#738e39;color:white;padding:5px;">Cantidad</td>            
            <td style="background:#738e39;color:white;padding:5px;">Precio</td>
            <td style="background:#738e39;color:white;padding:5px;">Importe</td>
            </tr>
            </thead>
            <tbody>            
                       
            <?php
            $total=0;
            foreach ($detalle as $key => $value) {
                $precio=$value['precio'];
                $cantidad=$value['cantidad'];                
                $subtotal=$value['subtotal'];
                $nombre_color=$value['nombre_color'];
                $codigo_color=$value['codigo_color'];
                $nombre_impresion=$value['nombre_impresion'];                                                
                //$subtotal=number_format($subtotal, 2, '.', ',');
                $td='<tr><td>'.$value['nombre'].'</td><td><div style="background:'.$codigo_color.';width:20px;height:20px;"></div>'.$nombre_color.'</td>';
                $td.='<td>'.$nombre_impresion.'</td><td>'.$cantidad.'</td>';                
                $td.='<td>'.$precio.'</td><td>'.$subtotal.'</td></tr>';
                echo $td;
            }
            ?>     
                        
            <tr>
            <td colspan="5" align="right">Total            
            </td>
            <td>
            <?php echo $cotizacion['total'];?>
            </td>
            </tr>

            <tr>
	            <td colspan="6" align="left"><strong>Observaicones</strong></td>
	        </tr>
	        <tr>
	            <td colspan="6" align="left">
	            <?php echo $cotizacion['obs'];?>
	            </td>
            </tr>    

            </tbody>
            </table>