$(document).ready(function(){
    $('.next').on('click', function(){
      
    });
  
    $('.prev').on('click', function(){
      
    });

    setInterval(function(){
        $(".slides").animate({marginLeft:-800},800,function(){
           $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
        })
     }, 4000);
  });
  