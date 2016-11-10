	<style type="text/css">
	.tabla{width:100%;}
	.tabla thead td{background:#738e39;color:white;padding:5px;}
	.tabla tbody td{border-bottom:#c0c0c0 solid 1px;border-left:#c0c0c0 solid 1px;padding:5px;}	
	.tabla tbody td:first-child{border:none;border-left:#c0c0c0 solid 1px;border-bottom:#c0c0c0 solid 1px;}		
	.tabla tbody td:last-child{border:none;border-left:#c0c0c0 solid 1px;border-right:#c0c0c0 solid 1px;border-bottom:#c0c0c0 solid 1px;}			
	</style>  

            <table class="tabla" cellpadding="10" cellspacing="0" border="1">
            <tr>
                <td colspan="2">Se ha enviado el siguiente mensaje desde su Portal Web - Formulario Contáctenos.</td>
            </tr>
            <tr>
            	<td><strong>FECHA:</strong></td><td><?php echo $datos['fecha'];?></td>
            </tr>
            <tr>
            	<td><strong>NOMBRE:</strong></td><td><?php echo $datos['nombre']; ?></td>            	
            </tr>
            <tr>
                <td><strong>ASUNTO:</strong></td><td><?php echo $datos['asunto']; ?></td>                
            </tr>
            <tr>
                <td><strong>EMAIL:</strong></td><td><?php echo $datos['correo']; ?></td>                
            </tr>
            <tr>
                <td colspan="2"><strong>MENSAJE:</strong></td>
            </tr> 
            <tr>
                <td colspan="2"><?php echo $datos['mensaje']; ?></td>                
            </tr>                                                                                    
            </table>

