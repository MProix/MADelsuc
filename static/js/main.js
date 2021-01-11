$( window ).ready(function() {
    // define nav entry max-width
    var max = 0;
    for (let elt of $(".main_nav_entry")){
        if(parseInt($(elt).css("width")) > max){
            max = parseInt($(elt).css("width"));
        };
    };
    $(".main_nav_entry").css({"width": max+"px", "transition": "width 300ms ease", "-moz-transition": "width 300ms ease", "-o-transition" : "width 300ms ease"});

    // add toogleClass for min or max navbar
    $("#btn>img").mouseover(function(){
        $('#btn>img').attr('src','./static/img/menu.svg');
        $('#btn>img').css('height','6vh');
    });
    $("#btn>img").mouseout(function(){
        $('#btn>img').attr('src','./static/img/menu2.svg');
        $('#btn>img').css('height','4vh')
    });

    $("#btn").click(function(){
        $(".main_nav_entry").toggleClass("small_nav_entry");
        $("#without_btn").toggleClass("small");
        $(".mainnav_li_container").toggleClass("small_nav_li_container");
    });
    $("#age").text((getAge(new Date(1958, 06, 22))));
});