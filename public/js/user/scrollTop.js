$(window).scroll(function() {
sessionStorage.scrolltop = $(this).scrolltop();
});

$(document).ready(function(){
if(sessionStorage.scrolltop != "undefined"){
    $(window).scrolltop(sessionStorage.scrolltop);
}
});