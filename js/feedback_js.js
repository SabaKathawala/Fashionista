///////////////////////////////////////////    feedback     ///////////////////////////////////////////////////////
$(document).ready(function(){

    var action = 1;
    $(".fb_but").on("click", doSomething);
    function doSomething() {
        if ( action == 1 ) 
        {
            $('.muku').animate({right: "0"},500);
            $('.fb2_inner').css('display','block');
            $('.fb2_inner').animate({height: "435px"},1000);
            $('.fa-times').css('visibility','visible');
            // $('.fb2').animate({left: "1002px",width:'toggle'},1000);
            action = 2;
        } 
        else 
        {
            $('.fb2_inner').animate({height: "0"},800);
            $('.fb2_inner').css('display','none');
            $('.fa-times').css('visibility','hidden');
            $('.muku').animate({right: "-318px"},800);
            action = 1;
        }
    }

    $('.fb1>.fa-times').click(function(){
        $('.fb2_inner').animate({height: "0"},800);
        $('.fb2_inner').css('display','none');
        $('.fa-times').css('visibility','hidden');
        $('.muku').animate({right: "-318px"},800);
        action = 1;
    });

});

///////////////////////////////////////////    feedback     ///////////////////////////////////////////////////////