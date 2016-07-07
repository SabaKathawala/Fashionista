
$(document).ready(function(){

  $("#deliver_button").click(function(){
    $("#deliver").validate({
                rules: {
                     name:"required",
                     pin: "required",
                     addr: "required",
                     country:"required",
                     phone: "required"                                          
                },
                messages: {
                     name: "This is a required field.",
                     pin:  "This is a required field.",
                     addr:"This is a required field.",
                     country: "This is a required field.",
                     phone: "This is a required field."
                },
                submitHandler: function(form) {
             // $('#deliver_button').css('visibility','visible');
             $("#collapseFour").toggle();
           
        }//end of submit handler

         })
});


  $('.order_t td :radio').click(function(){ 
    
       if($('#conti').is(":checked"))
       {
          $('.continue').css('visibility','visible');
       }
       else
       {
          $('.continue').css('visibility','hidden');
       }
  
   });

   $('.order_t input').click(function(){ 
     
     if(!$("#view_acc").length)
     {
        
        if($("#sign_order").is(":checked"))
        {
          $("#1").show();
          $("#overlay").show();
        } 
        
        if($("#cacc_order").is(":checked"))
        {
           $("#2").show();
           $("#overlay").show();
        }
      }
      else{
           
          if($("#sign_order").is(":checked"))
              alert("You are already logged in. Please logout first to log in with a different account");
          
          if($("#cacc_order").is(":checked"))
              alert("Please logout first to sig up for a new account");
          

      }
    });

});
