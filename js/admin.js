$(document).ready(function(){

       
    	$(".options li a").click(function(){
    		//get active option and corresponding menu
	        var data_id = $(this).attr('data-id');
        	var active_div=$(".nav-black ul.active");
        	var tobeactive_div=$("#"+data_id);
        	active_div.slideToggle(1000);
	        tobeactive_div.slideToggle(1000);
	        active_div.removeClass('active');	       
	        tobeactive_div.addClass('active');

        	//get active menu div
        	var active_classdiv=$(".edit_blocks>div.active");
        	var tobeactive_classdiv=$("."+data_id);
	       	tobeactive_classdiv.addClass('active');
	        active_classdiv.removeClass('active');
        });

        $(".nav-black li a").click(function(){
        	//get active menu option and corresponding div
	        var data_id = $(this).attr('data-id');
        	var active_div=$(".edit_blocks>div div.active");
        	var tobeactive_div=$("#"+data_id);
	       	
	        active_div.slideToggle(1000);
	        tobeactive_div.slideToggle(1000);
	        active_div.removeClass('active');	       
	        tobeactive_div.addClass('active');
        });

        $(".dp").datepicker();

});