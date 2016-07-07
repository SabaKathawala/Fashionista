$(document).ready(function()
{
	$('.butt1').click(function()
    {
    	$('.butt1').popover('show');
    });
    $('.butt2').click(function()
    {
    	$('.butt2').popover('show');
    });
    $('.butt3').click(function()
    {
    	$('.butt3').popover('show');
    });
    $('.butt4').click(function()
    {
    	$('.butt4').popover('show');
    });
});



// $(document).ready(function()
// {
//         $("#btn_r").click(function(){
//             var active_li=$("#slider-ul li.active1");
//             var next_li=(active_li.next().length>0)? active_li.next(): $("#slider-ul li:first");
//             active_li.fadeOut(1000);
//             next_li.fadeIn(1000);
//             active_li.removeClass('active1');
//             next_li.addClass('active1');
//         }); 
//         $("#btn_l").click(function(){
//             var active_li=$("#slider-ul li.active1");
//             var prev_li=(active_li.prev().length>0)? active_li.prev(): $("#slider-ul li:last");
//             active_li.fadeOut(1000);
//             prev_li.fadeIn(1000);
//             active_li.removeClass('active1');
//             prev_li.addClass('active1');
//         });
// });


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