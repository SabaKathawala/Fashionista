$(document).ready(function(){
       
    	$(".primary>li").click(function(){

        	var data_id = $(this).attr('data-id');
        	var active_div=$(".clothes_pics div.active");
        	var tobeactive_div=$("#"+data_id);
	        active_div.slideToggle(500);
	        active_div.removeClass('active');
	        // tobeactive_div.animate({width:'toggle'},1000);
	        // tobeactive_div.addClass('active');
            $("#"+data_id).animate({width:'toggle'},1000);
            $("#"+data_id).addClass('active');
	       
        })

});