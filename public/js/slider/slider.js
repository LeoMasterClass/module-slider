$(function() {

   //settings for slider
   var width = 800;
   var animationSpeed = 1000;
   var pause = 3000;



   //cache DOM elements
   var $slider = $('#slider');
   var $slideContainer = $('.slides', $slider);
   var $slides = $('.slide', $slider);

   var interval;

   function startSlider() {
       interval = setInterval(function(){
         $("#slider ul").animate({marginLeft:-800},800,function(){
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
         })
      }, 4000);
   }
   function pauseSlider() {
       clearInterval(interval);
   }

   $slideContainer
       .on('mouseenter', pauseSlider)
       .on('mouseleave', startSlider);

   startSlider();

   largeurCache=$("#slider ").width();
   largeur=0;
   $("#slider  a").each(function(){
       largeur+=$("#slider  a").width();
       largeur+=parseInt($("#slider  a").css("padding-left"));
       largeur+=parseInt($("#slider  a").css("padding-right"));
       largeur+=parseInt($("#slider  a").css("margin-left"));
       largeur+=parseInt($("#slider  a").css("margin-right"));
   });
   saut = largeurCache/2;
   nbEtapes = Math.ceil(largeur/saut - largeurCache/saut);
   courant=0;
   $("#slider .next ").click(function(){
       if (courant<=self.nbEtapes){
           courant++;
           $("#slider .slides ").animate({
               left:-courant*saut
           },1000);
       }   
   });
   $("#slider .prev ").click(function(){
       if (courant>0){
           courant--;
           $("#slider .slides ").animate({
               left:-courant*saut
           },1000);
       }   
   });
});