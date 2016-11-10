$(window).load(function(){
  style_swicher();
  dropdown_menus();
  slider_range();
  button_number();
  call_scroll();
});


function style_swicher(){
  $('.swtch-opener').click(function(e){
    if($('#style-switcher').hasClass('swclose'))
    {
      $('#style-switcher').removeClass('swclose');
      $('#style-switcher').addClass('swopen');
    }
    else
    {
      $('#style-switcher').removeClass('swopen');
      $('#style-switcher').addClass('swclose');
    }
    e.preventDefault();
  });
  
  if($.cookie("css")) {
    $('link[id="clrswitch"]').attr("href",$.cookie("css"));
  }
  
  $('.ul-colors li').click(function(){
    color=($(this).attr('id'));
    $('link[id="clrswitch"]').attr('href','css/switcher/'+color+'.css');
    $.cookie('css', 'css/switcher/'+color+'.css', {
      expires: 1
    });
  });
}

function dropdown_menus(){
  $(document).on('click', '#categories_menus ul li span', function(e) {
    $(this).toggleClass('glyphicon-minus');
  });
}

function slider_range(){
  if ($('#slider-range').length) {
    $("#slider-range").slider({
      range: true,
      min: 0,
      max: 500,
      values: [75, 300],
      slide: function(event, ui) {
        $("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
        $(".price").html("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
      }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
      " - $" + $("#slider-range").slider("values", 1));

    $(".price").html("$" + $("#slider-range").slider("values", 0) +
      " - $" + $("#slider-range").slider("values", 1));
  }
}

function button_number(){
  if ($('.btn-number').length) {
    $('.btn-number').click(function(e){
      e.stopPropagation()
    
      fieldName = $(this).attr('data-field');
      type      = $(this).attr('data-type');
      var input = $("input[name='"+fieldName+"']");
      var currentVal = parseInt(input.val());
      if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
          if(currentVal > input.attr('min')) {
            input.val(currentVal - 1).change();
          } 
          if(parseInt(input.val()) == input.attr('min')) {
            $(this).attr('disabled', true);
          }

        } else if(type == 'plus') {

          if(currentVal < input.attr('max')) {
            input.val(currentVal + 1).change();
          }
          if(parseInt(input.val()) == input.attr('max')) {
            $(this).attr('disabled', true);
          }

        }
      } else {
        input.val(0);
      }
    });
  } 
}


function call_scroll(){
  $(window).scroll(function () {
    if ($(this).scrollTop() > 250) {
      $('#back_to_top').fadeIn();
    } else {
      $("#nav_top").removeClass("transparent");
      $("#nav_top #back_active").css("height", "76px" );
      
      $('#back_to_top').fadeOut('fast');
    }
  });
  
  $("#back_to_top").click(function() {
    $("html, body").animate({
      scrollTop: 0
    }, "slow")
  })
  
 
}
  
  