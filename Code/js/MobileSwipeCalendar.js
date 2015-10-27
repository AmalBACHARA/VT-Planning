(function($) {
    var calendar = $('#calendar');
    
    calendar.hammer().on("dragright swiperight", function(event){
        $( "#prevButton" ).click();
    });
    calendar.hammer().on("dragleft swipeleft", function(event){
        $( "#nextButton" ).click();
    });
    
    var boutonPanel = $('#panelCalendar');
    var panel = $('#panelFilter');
    var calendarContainer= $('#calendarContainer');
    var count = 0;
    
    var navBar = $('#bs-example-navbar-collapse-1');
    
    boutonPanel.click(function(){
        
        if (navBar.hasClass("in")) {
            $('#boutonNavBar').click();
        }
        
        if (count == 0)
        {
            panel.animate({
                left: "0px"
              }, 250 );
            calendarContainer.animate({
                opacity: "0.5"
              }, 250 );
            count = 1;
        }
        else
        {
            panel.animate({
                left: "-300px"
              }, 250 );
            calendarContainer.animate({
                opacity: "1"
              }, 250 );
            count = 0;
        }
    });
    
    $(document.body).click(function(e) {
        // Si ce n'est pas #boutonPanel ni un de ses enfants
        if( (!$(e.target).is(boutonPanel) && !$.contains(boutonPanel[0],e.target)) && ( !$(e.target).is(panel) && !$.contains(panel[0],e.target))  ) {
            panel.animate({
                left: "-300px"
              }, 250 );
            calendarContainer.animate({
                opacity: "1"
              }, 250 );
            count = 0;
        }
    });
}(jQuery));