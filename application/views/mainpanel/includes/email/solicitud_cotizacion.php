	<style type="text/css">
	.tabla{width:100%;}
	.tabla thead td{background:#738e39;color:white;padding:5px;}
	.tabla tbody td{border-bottom:#c0c0c0 solid 1px;border-left:#c0c0c0 solid 1px;padding:5px;}	
	.tabla tbody td:first-child{border:none;border-left:#c0c0c0 solid 1px;border-bottom:#c0c0c0 solid 1px;}		
	.tabla tbody td:last-child{border:none;border-left:#c0c0c0 solid 1px;border-right:#c0c0c0 solid 1px;border-bottom:#c0c0c0 solid 1px;}			
	</style>  

            <table class="tabla" cellpadding="10" cellspacing="0" border="1">
            <tr>
                <td colspan="2"><?php echo $texto;?></td>
            </tr>            
            <tr>
                <td><strong>FECHA DE SOLICITUD:</strong></td><td><?php echo $datos['fecha_registro'];?></td>   
            </tr>         
            <tr>
            	<td><strong>NOMBRES:</strong></td><td><?php echo $cliente['nombres'].' '.$cliente['apellidos']?></td>
            </tr>         
            <tr>                
            	<td><strong>APELLIDOS:</strong></td><td><?php echo $cliente['apellidos']; ?></td>
            </tr>         
            <tr>                
                <td><strong>EMAIL:</strong></td><td><?php echo $cliente['email']; ?></td>
            </tr>         
            <tr>                
                <td><strong>TELEFONO:</strong></td><td><?php echo $cliente['telefono']; ?></td>
            </tr>
            </table>
            <br><br>
            <table class="tabla" cellpadding="10" cellspacing="0" border="1" width="100%">
            <thead>
            <tr>
            <td style="background:#738e39;color:white;padding:5px;">Producto</td>
            <td style="background:#738e39;color:white;padding:5px;">Cantidad</td>
            </tr>
            </thead>
            <tbody>            
                       
            <?php
            $total=0;
            foreach ($carrito as $key => $value) {
                $nombre=$value['nombre'];
                $cantidad=$value['cantidad'];
                echo '<tr><td>'.$nombre.'</td><td>'.$cantidad.'</td></tr>';
            }
            ?>     
   

            </tbody>
            </table>