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

    $("#cacc").click(function(){
    	$("#2").show();
    	$("#overlay").show();


    });

     $("#sign").click(function(){
    	$("#1").show();
    	$("#overlay").show();


    });
    $("#one").click(function()
	{
		$("#overlay").hide();
		$("#1").hide();
	// $(".click").hide();
	});//pop-up
	$("#two").click(function()
	{
		$("#overlay").hide();
		$("#2").hide();
	// $(".click").hide();
	});//pop-up 

    $("#idealink").click(function()
    {
        $("#idea").show();
    })
});
