$(document).ready(function(){

       
    	$(".list li").click(function(){

	        var data_id = $(this).attr('data-id');
        	var active_div=$(".listimage div.active");
        	var tobeactive_div=$("#"+data_id);
	        active_div.slideToggle(1000);
	        tobeactive_div.animate({width:'toggle'},2000);
	        active_div.removeClass('active');
	        tobeactive_div.addClass('active');
        })



});
