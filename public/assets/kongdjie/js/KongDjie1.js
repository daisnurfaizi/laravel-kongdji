$(window).scroll(function(){
    if($(window).scrollTop()){
        $("navbar-nav").addClass("bgcolor");
    }
    else{
        $("navbar-nav").removeClass("bgcolor")
    }
});