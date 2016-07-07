 // $(document).ready(function(){

    function add_cart() {
   
    var product_id = $("#pid").val();
    $.get("logout.php",{product_id:product_id},function(data,status){
      console.log("Inside");
      $(".cart a").html("<i class='fa fa-shopping-cart'></i>CART("+data.trim()+")");
      console.log(data);

    });


  
        var cart = $('.cart a');
       
        var imgtodrag = $('#h1 div.active').find("img").eq(0);
       
        if (imgtodrag) {
            var imgclone = imgtodrag.clone().offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            }).appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
 
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);
 
            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    }
// });