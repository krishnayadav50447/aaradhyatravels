function addLoader() {
    $("body").append("<div style='position: fixed; top: 0; left: 0; right:0; bottom:0; z-index:99999999; display:grid; align-items:center; justify-content:center; background-color:#c0c0c038;' id='loader'><div class='spinner-border text-primary'></div></div>");
}
function removeLoader(ele){
    $(ele).remove();
}
$(document).on({
    ajaxStart: function(){
        addLoader();
    },
    ajaxStop: function(){
        removeLoader("#loader");
    }    
});

//Toggle Nav//
$(document).ready(function(){
    $('.toggleNav').click(function(){
        $('.menu').toggleClass('menu_open');
        $('.nav_bg').toggleClass('nav_bg_open');
        $('body').toggleClass('no_scroll');
        $('section, header, .bars').toggleClass('blur');
    });
});
//Toggle Nav Ends//


function nav_current_tap(){
    $("a[href='"+decodeURI(window.location.href)+"']").each(function(key, value){
        $(this).attr("href", "javascript:void(0)");
        $(this).closest('li').addClass('active');
        $(this).closest('li').closest('ul').closest('li').addClass('active');
    });
}
$(document).ready(function(){
  nav_current_tap();
  removeLoader("#preloader");
});


//Modal Open & Close//
function open_modal(self){
    $(self).addClass("modal_open");
    $("body").addClass("no_scroll");
}
function close_modal(self){
    $(self).closest(".modal_open").removeClass("modal_open");
    $("body").removeClass("no_scroll");
}
function close_modal_by_ele(ele){
    $(ele).removeClass("modal_open");
    $("body").removeClass("no_scroll");
}

$(document).on("click", ".input_flex input, .input_flex textarea", function(){
    $(this).prev("label").addClass("label_top");
});
$(document).on("blur", ".input_flex input, .input_flex textarea", function(){
    if ($(this).val()=="") {
        $(this).prev("label").removeClass("label_top");
    }
});