$(function() {

   var $slider = $('#slider'),//ciblage du bloc #slider
      $img = $('#slider img'),//ciblage des images du sliders 
      indexImg = $img.length - 1,//on définit l'index du dernier élément
      i = 0,//initialisation d'un compteur
      $currentImg = $img.eq(i);//ciblage de l'image acutel(current), qui possede l'index i(0 initialement)

   $('.next').click(function(){
      i++;
      if(i <= indexImg){
      $img.css('display','none');
      $currentImg = $img.eq(i);
      $currentImg.css('display','block');
      }else{
         i = -1;
      }
   });

   $('.prev').click(function(){
      i--;
      if(i >= 0){
      $img.css('display','none');
      $currentImg = $img.eq(i);
      $currentImg.css('display','block');
      }else{
         i = 5;
      }
   })

   function slideImg(){
      setTimeout(function(){
         if(i < indexImg){
            i++;
         }else{
            i=0;
         }

         $img.css('display','none');

         $currentImg = $img.eq(i);
         $currentImg.css('display','block');

         slideImg();
      },3000);
   }


   slideImg();

});