(function($) { 
    $(window).resize(function(){
       //console.log('resize called');
       var width = $(window).width();
       if(width <= 1200){
           $('#calendarContainer').removeClass('container').addClass('container-fluid');
       }
       else{
           $('#calendarContainer').removeClass('container-fluid').addClass('container');
       }
    })
    .resize();
}(jQuery));