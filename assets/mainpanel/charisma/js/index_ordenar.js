$(document).ready(function() {
      
    $("#capa_ordenamiento_productos").sortable({
        handle : '.handle',
        update : function () {
        var order = $(this).sortable('serialize');
        //alert(order);
        ordProductos(order);  
        //$("#capa_ordenamiento_productos").load("mainpanel/grabarorden/"+order);

      }

    });
});    
