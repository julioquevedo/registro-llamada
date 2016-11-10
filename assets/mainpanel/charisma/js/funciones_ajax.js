function add_question(id_tip_enun,opciones_concat,question_new,obligatorio,id_encu) {
    var data=[];
    data={"id_tip_enun":id_tip_enun,"opciones_concat":opciones_concat,"question_new":question_new,
"obligatorio":obligatorio,"id_encu":id_encu}
//console.log(data);
    $.ajax({
        type: 'POST',
        url: 'mainpanel/controller_ajax/addQuestion',
        data: data,
        dataType : 'json',
        success: function(json) {
            result=json.result;
            
            if(result==true){
                location.reload();
            }
                  
        }
    });
}

function ordProductos(orden) {

    $.ajax({
        type: 'POST',
        url: 'mainpanel/controller_ajax/ordProd',
        data: {orden: orden},
        dataType : 'json',
        success: function(json) {
            result=json.result;
        }
    });
}

function get_anun(id_enun,id_encu) {
    var data= new Array();
    data={'id_enun':id_enun,'id_encu':id_encu}
    $.ajax({
        type: 'POST',
        url: 'mainpanel/controller_ajax/get_anun',
        data: data,
        dataType : 'json',
        success: function(json) {
            lista=json.lista;
            num=lista.length;
            if(num>0){
                
                update_anun(lista);
            }else{
                alert("No hay informacion");
                return false;
            }
            
        }
    });
}


function update_misdatos() {
    nombres=$("#nombres").val();
    if(nombres===""){
        alert("El campo nombres no puede estar vacio");
        $("#nombres").focus();        
        return false;
    }
    
    usuario=$("#usuario").val();
    if(usuario===""){
        alert("El campo usuario no puede estar vacio");
        $("#usuario").focus();
        return false;
    }
    
    password=$("#password").val();
    if(password===""){
        alert("Ingrese el password actual");
        $("#password").focus();
        return false;
    }
    
    repnewpasw=$("#repnewpasw").val();
    newpasw=$("#newpasw").val();
    if(repnewpasw !== newpasw){
        alert("Confirme bien su password, no coindicen");
        $("#newpasw").focus();
        return false;        
    }    

    $.ajax({
        type: 'POST',
        url: 'mainpanel/controller_ajax/updateusuario',
        data: {nombres: nombres,newpasw:newpasw,password:password},
        dataType : 'json',
        success: function(json) {
            result=json.result;

            switch (result){
                case true:
                    alert("Se modificó con exito !!");
                    location.reload();
                    break;
                case '':
                    alert("El password actual es Incorrecto");
                    break;
            }
        }
    });
}

function carga_subcategoria(padre) {

    if(padre==="0"){
        var str='<option value="0">------------------</option>';
        $("#subcategoria").html(str);
        return false;
    }
  

    $.ajax({
        type: 'POST',
        url: 'mainpanel/controller_ajax/carga_subcategoria',
        data: {padre: padre},
        dataType : 'json',
        success: function(json) {
            result=json.result;
            switch (result){
                case 1:
                    var str     = '';
                    str+='<option value="0">Seleccione...</option>';
                    lista       = json.lista;
                    var lista   = JSON.stringify(lista);
                    var lista   = $.parseJSON(lista);  
                    $.each( lista, function( key, val ) {
                        str+='<option value="'+val.id_categoria+'">'+val.nombre_categoria+'</option>';
                    });                    
                    $("#subcategoria").html(str);
                    break;
                case 0:
                    alert("El password actual es Incorrecto");
                    break;
            }
        }
    });
}

