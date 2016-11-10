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
            	<td><strong>FECHA DE REGISTRO:</strong></td><td><?php echo $datos['fecha_registro'];?></td>
            </tr>
            <tr>
            	<td><strong>NOMBRE:</strong></td><td><?php echo $datos['nombre']; ?></td>            	
            </tr>
            <tr>
                <td><strong>EMPRESA:</strong></td><td><?php echo $datos['empresa']; ?></td>               
            </tr>
            <tr>
                <td><strong>TELEFONO EMPRESA:</strong></td><td><?php echo $datos['telefono_empresa']; ?></td>               
            </tr>
            <tr>
                <td><strong>EMAIL EMPRESA:</strong></td><td><?php echo $datos['email_empresa']; ?></td>               
            </tr>
            <tr>
                <td><strong>USUARIO:</strong></td><td><?php echo $datos['usuario']; ?></td>                
            </tr>
            <tr>
                <td><strong>EMAIL:</strong></td><td><?php echo $datos['email']; ?></td>                
            </tr>
            <tr>
                <td><strong>ENLACE ACTIVAR CUENTA:</strong></td><td><a href='<?php echo base_url();?>activar-cuenta/<?php echo $datos['aleatorio'];?>'>Click para Activar tu cuenta</a></td>                
            </tr>            
            </table>

