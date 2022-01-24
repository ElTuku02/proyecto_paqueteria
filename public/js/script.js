jQuery(document).ready(function($){

    // Parallax
    if ($('.parallax-background').length) {
      $(".parallax-background").parallax();
    }
    
    // Parallax
    if ($('.parallax-background-partners').length) {
      $(".parallax-background-partners").parallax();
    }  
    
    
    // Scroll +1px - big fix
    $(window).scrollTop($(window).scrollTop()+1);
    
    
    // niceScroll
    $("html").niceScroll();
      
      
    // Stick menu
    $(".menu").sticky({topSpacing:0});
  
  
  
  
    // Menu Scroll to content and Active menu
    var lastId,
      topMenu = $("#menu"),
      topMenuHeight = topMenu.outerHeight()+105,
      menuItems = topMenu.find("a"),
      scrollItems = menuItems.map(function(){
        var item = $($(this).attr("href"));
        if (item.length) { return item; }
      });
  
     $('a[href*=#]').bind('click', function(e) {
      e.preventDefault();
         
      var target = $(this).attr("href");
              
  
      $('html, body').stop().animate({ scrollTop: $(target).offset().top-140 }, 1000, function() {
  
      });
              
      return false;
     });
  
    $(window).scroll(function(){
     var fromTop = $(this).scrollTop()+topMenuHeight;
     var cur = scrollItems.map(function(){
       if ($(this).offset().top < fromTop)
         return this;
     });
  
     cur = cur[cur.length-1];
     var id = cur && cur.length ? cur[0].id : "";
     
     if (lastId !== id) {
         lastId = id;
         menuItems
           .parent().removeClass("active")
           .end().filter("[href=#"+id+"]").parent().addClass("active");
     }                   
    });  
    
  });
  