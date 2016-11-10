//*********** MODALES **************//
function deleteCliente(id) {
    $('#capatituloModal').html('Esta a punto de borrar al Cliente!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/clientes/delete/'+id+'" class="btn btn-primary">BORRAR</a>';
    $('#botonModal').html(str);
    $('#botonModal').show();
    $('#myModal').modal('show');   
}
function anade_encuesta() {
    reset_modal();
    colocaActive('myModalAddPregunta');
    $('.myModalAddPregunta #tituloModal').html('Añadir Pregunta');
    str = '<a href="#" class="btn btn-danger" data-dismiss="modal">CANCELAR</a>';
    $('.myModalAddPregunta #botoneraModal').html(str);
    $('.myModalAddPregunta #botoneraModal').show();
    $('#myModalAddPregunta').modal('show');   
}
function iniciarEncuesta(id_cliente,id_trabajo,id_lista) {

    $('.modalEncuesta #tituloModalEn').html('Iniciar Encuesta');
    str = '<input type="hidden" name="id_cliente" id="id_cliente" value="'+id_cliente+'">';
    str += '<input type="hidden" name="id_trabajo" id="id_trabajo" value="'+id_trabajo+'">';    
    str += '<input type="hidden" name="id_lista" id="id_lista" value="'+id_lista+'">';        
    str += '<a href="#" class="btn" data-dismiss="modal">GRABAR</a>';
    $('.modalEncuesta #botoneraModalEn').html(str);
    $('.modalEncuesta #botoneraModalEn').show();
    $('#myModalEncuesta').modal('show');   
}

function update_anun(data) {
    var desc_enun=data[0]['desc_enun'];
    var obligatorio=data[0]['obligatorio'];
    var id_tip_enun=data[0]['id_tip_enun'];  
    var id_encu=data[0]['id_encu'];      
    var id_enun=data[0]['id_enun'];          
    var opciones_concat=new Array;          
    var str='';

    $('.myModalEditPregunta #tituloModal').html('Editar Enunciado');
    $('.myModalEditPregunta .modal-body #question_new').html(data[0]['desc_enun']);

    if(id_tip_enun != 3){
        
        $.each(data,function(key, value){
            desc_opc=value['desc_opc'];
            opciones_concat.push(desc_opc);
            str+='<div class="wr_opc_insert">';
            str+='<input type="text" class="opc_insert" value="'+desc_opc+'">';
            str+='<a class="delete_opc btn btn-danger"><i class="icon-trash icon-white"></i></a>';
            str+='</div>';
        });
        $('.myModalEditPregunta .wr_add_opc').show();
    }else{
        $('.myModalEditPregunta .wr_add_opc').hide();
    }

    btn = '<input type="submit" class="btn" value="GRABAR">';

    opciones_concat=opciones_concat.join("##^^##");
    $(".myModalEditPregunta .opc_agregadas").html(str);
    $('.myModalEditPregunta .modal-body #opciones_concat').val(opciones_concat);   
    $('.myModalEditPregunta .modal-body #id_tip_enun').val(id_tip_enun);       
    $('.myModalEditPregunta .modal-body #id_enun').val(id_enun);           
    $('.myModalEditPregunta .modal-body #id_encu').val(id_encu);
    colocaActive('myModalEditPregunta');
    $('.myModalEditPregunta #botoneraModal').html(btn);    

    // seteamos el Action del form
        action=$('.myModalEditPregunta form').attr('action');        
        action=action+id_enun;
        $('.myModalEditPregunta form').attr('action',action);   
    // seteamos el Action del form    

    $('.myModalEditPregunta #botoneraModal').show();
    $('#myModalEditPregunta').modal('show');   
}

function delRegistro(id) {
    $('#capatituloModal').html('Esta a punto de borrar al usuario!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/registros/delete/'+id+'" class="btn btn-primary">BORRAR</a>';
    $('#botonModal').html(str);
    $('#botonModal').show();
    $('#myModal').modal('show');   
}

function delCliente(id) {
    $('#tituloModal').html('Esta a punto de eliminar al cliente seleccionado');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/clientes/delete/'+id+'" class="btn btn-primary">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function delete_anun(id,encu) {
    $('#capatituloModal').html('Esta a punto de borrar el enunciado!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/encuesta/enunciado/delete/'+id+'/'+encu+'" class="btn btn-primary">BORRAR</a>';
    $('#botonModal').html(str);
    $('#botonModal').show();
    $('#myModal').modal('show');   
}

function deleteCotizacion(id) {
    $('#tituloModal').html('Esta a punto de borrar la soliciud de cotizacion!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/cotizaciones/delete/'+id+'" class="btn btn-primary">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function deleteFotografia(id) {
    $('#tituloModal').html('Esta a punto de borrar la Fotograf&iacute;a!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/fotografias/delete/'+id+'" class="btn btn-primary">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}
function deleteProducto(id) {
    $('#tituloModal').html('Esta a punto de borrar el producto !');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/productos/delete/'+id+'" class="btn btn-primary">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}


function deleteCategoria(id) {
    $('#tituloModal').html('Al eliminar la Categor&iacute;a eliminar&aacute; tambien sus categor&iacute;as HIJOS!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/categoria/delete/'+id+'" class="btn btn-primary">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}
function deleteSubCategoria(id) {
    $('#tituloModal').html('Al eliminar la Sub Categor&iacute;a eliminar&aacute; tambien sus categor&iacute;as HIJOS!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/subcategoria/delete/'+id+'" class="btn btn-primary">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function deleteBanner(id_banner) {
    $('#tituloModal').html('Esta a punto de borrar este banner!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/banners/delete/'+id_banner+'" class="btn btn-primary">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function showBanner(banner) {
    $('#tituloModal').html();
    img = '<img src="files/banners/'+banner+'" />';
    $('#cuerpoModal').html(img);
    $('#botoneraModal').hide();
    $('#myModal').modal('show'); 
}



function deleteMsgRecibido(id) {
    $('#tituloModal').html('Esta a punto de borrar este mensaje!');
    $('#cuerpoModal').html('');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/mensajes/delete/'+id+'" class="btn btn-primary">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');    
}


//*************  FUNCIONES ******////

function valida_banner() {
    orden=$("#orden").val();
    if(orden===""){
        alert("Ingrese el orden de presentación del Banner");
        $("#orden").focus();        
        return false;
    } 
    
    banner=$("#banner").val();
    if(banner===""){
        alert("Suba una imagen para el Banner");
        return false;
    }    
}
function valida_categoria() {
    nombre_categoria=$("#nombre_categoria").val();
    nombre_categoria=$.trim(nombre_categoria);
    if(nombre_categoria===''){
        alert("Ingrese el nombre de la Categoria");
        $("#nombre_categoria").focus();        
        return false;
    }
    
    orden=$("#orden").val();
    if(orden===""){
        alert("Debe ingresar un orden");
        $("#orden").focus();
        return false;
    }     
    
   
}

function valida_subcategoria() {
    padre=$("#padre").val();
    if(padre==="0"){
        alert("Seleccione una categoria");
        $("#padre").focus();        
        return false;
    }    
    nombre_categoria=$("#nombre_categoria").val();
    nombre_categoria=$.trim(nombre_categoria);
    if(nombre_categoria===''){
        alert("Ingrese el nombre de la Categoria");
        $("#nombre_categoria").focus();        
        return false;
    }
    
    orden=$("#orden").val();
    if(orden===""){
        alert("Debe ingresar un orden");
        $("#orden").focus();
        return false;
    }   
}

function valida_fotografia() {
    nombre=$("#nombre").val();
    nombre=$.trim(nombre);
    if(nombre===""){
        alert("Ingrese el nombre");
        $("#nombre").focus();        
        return false;
    }    

    
    orden=$("#orden").val();
    orden=$.trim(orden);
    if(orden===""){
        alert("Debe ingresar un orden para la fotografia");
        $("#orden").focus();
        return false;
    }   

    foto=$("#foto").val();
    foto=$.trim(foto);
    if(foto===""){
        alert("Debe subir un archivo");
        $("#foto").focus();
        return false;
    }      
}

function valida_producto() {
    categoria=$("#categoria").val();
    if(categoria==="0"){
        alert("Seleccione una categoria");
        $("#categoria").focus();        
        return false;
    }
  
    subcategoria=$("#subcategoria").val();
    if(subcategoria==="0"){
        alert("Seleccione una subcategoria");
        $("#subcategoria").focus();        
        return false;
    } 
    
    nombre=$("#nombre").val();
    nombre=$.trim(nombre);
    if(nombre===""){
        alert("Ingrese el nombre");
        $("#nombre").focus();        
        return false;
    }   

    foto=$("#foto").val();
    if(foto===""){
        alert("Debe subir una foto");
        $("#foto").focus();        
        return false;
    }  
     
}


function valida_seccion() {
    titulo=$("#titulo").val();
    if(titulo===""){
        alert("Debe ingresar el titulo de la Seccion");
        $("#titulo").focus();        
        return false;
    }

    imagen=$("#imagen").val();
    if(imagen===""){
        alert("Debe ingresar una imagen para la seccion");
        $("#imagen").focus();        
        return false;
    }    

//    var descripcion = CKEDITOR.instances['descripcion'].getData();
//    if(descripcion===""){
//        alert("Debe ingresar la descripcion del servicio");
//        CKEDITOR.instances['descripcion'].focus();
//        return false;
//    }     
}

function valida_novedad() {
    nombre=$("#nombre").val();
    if(nombre===""){
        alert("Debe ingresar el nombre");
        $("#nombre").focus();        
        return false;
    }

    orden=$("#orden").val();
    if(orden===""){
        alert("Debe ingresar orden");
        $("#orden").focus();        
        return false;
    }      
}

function valida_parametro() {
    tipo=$("#tipo").val();
    llave=$("#llave").val();
    if(llave===""){
        alert("El parametro no puede estar vacio");
        return false;
    }
    
    tipo=$("#tipo").val();
    if(tipo==0){
        valor=$("#valor").val();
        if(valor===""){
            alert("El valor no puede estar vacio");
            return false;
        }
    }
    if(tipo==1){
        var valor = CKEDITOR.instances['valor'].getData();
        if(valor===""){
            alert("El valor no puede estar vacio");
            CKEDITOR.instances['valor'].focus();
            return false;
        } 
    }    

    descripcion=$("#descripcion").val();
    if(descripcion===""){
        alert("La descripcion no puede estar vacio");
        return false;
    }  
        
}




function concatena(id)
{
    id_eliminar=$("#id_eliminar").val();
    id=$("#"+id).val();
    if($("#"+id).is(':checked')===false){
            cad=id_eliminar.split("##");
            rt=cad.length;
            cont2=0;
            for(e=0;e<rt;e++){
                    id_1=cad[e];
                    if(id!==id_1){
                            cont2+=1;
                            if(cont2===1){
                                    str=id_1;
                            }else{
                                    str=str+'##'+id_1;
                            }
                    }
            }
            if(cont2===0){str='';}
    }else{
            if(id_eliminar===''){
                    str=id;								
            }else{
                    str=id_eliminar+'##'+id;
            }
    }

    $("#id_eliminar").val(str);    
}

function concat_opc(){
    defecto=$(".modal.active").find('#opciones_concat').val();

    if(defecto!=''){
        defecto=new Array;
        $(".modal.active .opc_agregadas .wr_opc_insert").each(function(){
            valor=$(this).find("input.opc_insert").val();
            defecto.push(valor);
        });    
        cadena = defecto.join("##^^##");
    }else{
        cadena=valor;
    }

    $(".modal.active #opciones_concat").val(cadena);
}

function colocaActive(clas){
    $('.modal').removeClass('active');
    $('.' + clas).addClass('active');
}

function reset_modal(){
    $("#myModalAddPregunta .pasos").hide();
    $("#myModalAddPregunta .paso1").show();
}
$(document).ready(function(){
    $(".listaCli input[type='checkbox']").on('click',function(){
        var data = new Array;
        $("input[name='cl']:checked").each(function()
        {
            str=$(this).val();
            data.push(str);           
        }) 
        data.join(",");       
        $("#cliconca").val(data);
    });    
})

$(".tip_anun").on('click',function(e){
    e.preventDefault();
    id=$(this).data('id');
    span=$(this).find('span').html();
    $("#id_tip_enun").val(id);
    $("#myModalAddPregunta .pasos").hide();
    $(".myModalAddPregunta #tituloModal").append("<span style='display:block;font-size: 11px;'>Tipo de pregunta: "+span+"</span>");
    var btn="<a href='#' class='btn btn-info grabar_add_question'>GRABAR</a>";

    if(id==3){$(".wr_add_opc").hide();}else{$(".wr_add_opc").show();}
    $('.myModalAddPregunta #botoneraModal').append(btn);
    $("#myModalAddPregunta .paso2").show();
})

$(".fx_add_opc").on('click',function(e){
    e.preventDefault();
    valor=$(".opc_por_agregar #add_opc").val();
    valor=$(this).parent().find("input:eq(0)").val();
    str="<div class='wr_opc_insert'>";
    str+="<input type='text' class='opc_insert' value='"+valor+"'>";    
    str+="<a class='delete_opc btn btn-danger'><i class='icon-trash icon-white'></i></a>";
    str+="</div>";

    $(".opc_agregadas").append(str);   
    concat_opc();
    val=$(".opc_por_agregar #add_opc").val('');    
})

$(".delete_opc").live('click',function(e){
    div=$(this).parent();
    div.remove();
    concat_opc();
})

$(".opc_insert").live('keyup',function(e){
    
    concat_opc();
})


$(".grabar_add_question").live('click',function(e){
    e.preventDefault();
    id_tip_enun=$("#id_tip_enun").val();
    opciones_concat=$("#opciones_concat").val();  
    question_new=$("#question_new").val(); 
    if($("#obligatorio").is(':checked'))
        obligatorio=1;
    else
        obligatorio=0;
    id_encu=$("#id_encu").val(); 
             
    add_question(id_tip_enun,opciones_concat,question_new,obligatorio,id_encu);

})


$(".delete_anun").live('click',function(e){
    e.preventDefault();
    id=$(this).data("id");
    encu=$(this).data("encu");    
    delete_anun(id,encu);
})

$(".get_anun").live('click',function(e){
    e.preventDefault();
    id=$(this).data("id");
    encu=$(this).data("encu");    
    get_anun(id,encu);
})
