//Action Dropdown//
$(document).on("click", "._actionBox", function(){
    $("._actionList_open").not($(this).find("._actionList")).removeClass("_actionList_open")
    if ($(this).offset().top+$(this).height()+$(this).find("._actionList").height()>$(window).height()) {
        $(this).find("._actionList").css({"bottom" : "100%"});
    }else{ $(this).find("._actionList").css({"bottom" : "inherit"}); }
    $(this).find("._actionList").toggleClass("_actionList_open");
});

//Header Dropdown//
$(document).on("click", "._admin_assets li", function(){
    $(this).siblings("li").find(".other_apps").removeClass("other_apps_open");
    $(this).find(".other_apps").toggleClass("other_apps_open");
});

//Left Nav Width//
$(document).on("click", ".ope_icon",function(){
    $(this).toggleClass("ope_icon_rotate");
    $(".left_nav").toggleClass("left_nav_icon");
    $(".main_board").toggleClass("main_board_wid");
});
$(document).on("click", ".ope_mob_nav",function(){
    $(".left_nav").toggleClass("left_nav_open");
});


function alert_box_open(show_alert){
    $('.alert_bg').fadeIn(500);
    $('.'+show_alert).addClass('pop_up');
}
function alert_box_close(){
    $('.alert_bg').fadeOut(300);
    $('.alert_box').removeClass('pop_up');
}
$(window).on('click', function(event){
    var bondo=document.getElementsByClassName('alert_bg')[0];
    if(event.target==bondo){
        alert_box_close();
    }
})
$(document).on('click', '.alert_cancel', function(){
    alert_box_close();
});
function copyTextData(ele) {
  var copyText = document.getElementById(ele);
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}
function removeTags(text){
    if(text){        
        return text.replace(/<\/?[^>]+(>|$)/g, "");
    }else{
        return text;
    }
}
function urlify(text) {
  var urlRegex = /(https?:\/\/[^\s]+)/g;
  return text.replace(urlRegex, function(url) {
    return '<a href="' + url + '" target="_blank">' + url + '</a>';
  });
}
$(document).on('click', 'table tr td .showFullTxt', function(event){
    $("#showFullTxt").html($(this).html());
    alert_box_open('text_prev_modal');
});
$(document).on('click', 'table tr td .showFullHtml', function(event){
    $("#showFullHtml").html($(this).html());
    alert_box_open('html_prev_modal');
});
$(document).on('click', 'table tr>td>img', function(event){
    $('#imgPrv').attr('src', $(this).attr('src'));
    $('#img_link').val($(this).prop('src'));
    $('#caption').html($(this).attr('alt'));
    alert_box_open('img_prev_modal');
});




function addLoader() {
  $("body").append("<div style='position: fixed; top: 0; left: 0; right:0; bottom:0; z-index:99999999; display:grid; align-items:center; justify-content:center; background-color:#c0c0c038;' id='loader'><div class='spinner-border text-primary'></div></div>");
}
function removeLoader(ele){
  $(ele).remove();
}
$(document).ready(function(){
  removeLoader("#preloader");
});
$(document).on({
  ajaxStart: function(){
    addLoader();
  },
  ajaxStop: function(){
    removeLoader("#loader");
  }    
});