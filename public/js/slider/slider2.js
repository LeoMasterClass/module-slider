
$(document).ready(function() {
    slider.init() ;
    slider.play_defil();
    });
    
    slider = {
    init: function() {
    slider.elem = $(".slider_content");
    slider.nbSlide = slider.elem.find("div").length; //"div" = enfants de "slider_content"
    slider.current = 0;
    
    $(".fleche_droite").click(function() {
    slider.next();
    });
    
    $(".fleche_gauche").click(function() {
    slider.prev();
    });
    
    
    $(".container_slider").mouseover(function() {
    slider.stop_defil();
    });
    
    $(".container_slider").mouseout(function() {
    slider.play_defil();
    });
    
    },
    
    
    next: function() {
    slider.current++;
    if(slider.current > slider.nbSlide-1 )
    {
    slider.current = 0;
    slider.elem.stop().animate({marginLeft:-800},800,function(){
    $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
    })
    }
    else // 800 = largeur du slide
    {
    slider.elem.stop().animate({marginLeft: -slider.current*800+"px"},800);
    
    }
    },
    
    
    
    prev: function() {
    slider.current--;
    if(slider.current < 0)
    {
    slider.current = slider.nbSlide-1;
    // 800 = largeur du slide
    }
    slider.elem.stop().animate({marginLeft: -slider.current*800+"px"},800);
    },
    
    
    
    play_defil: function() {
    slider.timer = window.setInterval("slider.next()", 1000);
    
    },
    
    stop_defil: function() {
    window.clearInterval(slider.timer);
    
    }
    
    }