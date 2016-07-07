$(document).ready(function()
{
    $('.r2>.nav-tabs > li > a').hover( function(){
       $(this).preventDefault();
 
      $(this).tab('show');
    });

    $('.r2>.nav-tabs > li > a').mouseleave( function(){
       $(this).preventDefault();
      // $(this).r2_left.css('display','none');
      $(this).tab('hide');
    });


    $('.r4 .nav-tabs > li > a').hover( function(){
      $(this).tab('show');
    });

    $('.r4 .nav-tabs > li > a').mouseleave( function(){
      // $(this).r2_left.css('display','none');
      $(this).tab('hide');
    });



  // $(this).find('.r2_left').stop(true, true).delay(200).fadeIn();
  // $(this).find('.r2_left').stop(true, true).delay(200).fadeOut();

    // var fad=function(){
    //    $('.r2_left > ul > li > img').fadeOut(2000);
    //    $('.r2_left > ul > li > img').fadeIn(2000);
    // }
    // setInterval(fad,5000);
});


$(document).ready(function()
{
    var calling=function()
    {
        var active_li=$("#slider-ul li.active1");
        var next_li=(active_li.next().length>0)? active_li.next(): $("#slider-ul li:first");
        active_li.fadeOut(1000);
        next_li.fadeIn(1000);
        active_li.removeClass('active1');
        next_li.addClass('active1');
    }
    setInterval(calling,5000);
});



// $(document).ready(function()
// {
//     $('#spin_it').hover(
//     function()
//     {
//         $('#spin_it').rotate({animateTo:360,duration:1500});
//      }, 
//     function()
//     {
//         $('#spin_it').rotate({animateTo:0});
//     }

//     );
// });



$(document).ready(function()
{
    var call1=function()
    {
       $('.flip').find('.zoom_img').addClass('zoom-flipper');
    }
    setInterval(call1,2000);

    var call2=function()
    {
       $('.flip').find('.zoom_img').removeClass('zoom-flipper');
    }
    setInterval(call2,3000);

});



$(document).ready(function()
{
    $('#cart .heading a span ').hover(function()
    {
        $('#cart .content').css('display','block');
    }),
    $('#cart .heading a span ').mouseleave(function()
    {
        $('#cart .content').css('display','none');
    });
});