$(document).ready(function(){

/***************************************   new zoom   ******************************************************/

      jQuery(function(){

        $('.r93 ul>div.active .my-foto').imagezoomsl({ 

           zoomrange: [1, 12],
           zoomstart: 4,
           innerzoom: true,
           magnifierborder: "none"  
        });  
      });
   
      $(".primary1>li").click(function(){
          var data_id = $(this).attr('data-id');
          var active_div=$(".r93 ul>div.active");
          var tobeactive_div=$("#"+data_id);
          active_div.removeClass('active');
          tobeactive_div.addClass('active');// $("#"+data_id).addClass('active');  
          $('magnifier').remove();
          $('tracker').remove();         
          $('statusdiv').remove();
          $('.r93 ul>div.active .my-foto').imagezoomsl({ 

             zoomrange: [1, 12],
             zoomstart: 4,
             innerzoom: true,
             magnifierborder: "none"  
          });  

      });

/***************************************   new zoom   ******************************************************/

   // $('.aage').click(function(){ 
   //     window.location.href=("add_to_cart.php");
   // });

});





