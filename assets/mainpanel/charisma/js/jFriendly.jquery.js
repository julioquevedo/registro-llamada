/**
* jFriendly : jQuery Plugin to make friendly urls in your forms.
* by : ikhuerta (ikhuerta@gmail.com)
* more info : 
**/
(function($){
    $.fn.extend({
        jFriendly : function ( inputUri , notEditable ){
        	inputUri = $(inputUri);
			$(this).keyup(function(){
				inputUri.val( uriSanitize($(this).val()) );
			});
			if (notEditable){
				inputUri.css({display:"inline",border:0,background:"transparent",overflow:"visible"}).attr("disabled","disabled");
				$("form").submit(function(){if($(this).find(inputUri)) inputUri.removeAttr("disabled");});
			}
			return inputUri;
        }
    });
})(jQuery);  
uriSanitize = function(uri) { 
	return String(uri)
	.toLowerCase()
	.split(/[àáâãäå]/).join("a")
	.split(/æ/).join("ae")
	.split(/ç/).join("c")
	.split(/[èéêë]/).join("e")
	.split(/[ìíîï]/).join("i")
	.split(/ñ/).join("n")
	.split(/[òóôõö]/).join("o")
	.split(/œ/).join("oe")
	.split(/[ùúûü]/).join("u")
	.split(/[ýÿ]/).join("y")
	.split(/[\W_]+/).join("-")
	.split(/-+/).join("-");
}