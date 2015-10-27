(function($) { 
    $(window).load(function() {

     var url = $(location).attr('href');
     var res = url.split("/");

     if (res[res.length-1] == "index.php" || res[res.length-1] == "")
          $('#panelCalendar').show();
     else
          $('#panelCalendar').hide();
});
}(jQuery));