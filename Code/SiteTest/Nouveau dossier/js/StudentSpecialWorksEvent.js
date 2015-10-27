(function($) {
    $(document).ready(function() {
        var WeekEndsAndHollidays = [];
       // console.log("toto : ");
       // console.log($('.cal-day-weekend').children().attr('data-cal-date'));
        /*console.log($('.cal-day-weekend').children().attr('data-cal-date',function(i, val) {
            return val;
            }
        )
                    
    
    );*/
        
    $('.cal-day-weekend').children().each(function(){
            WeekEndsAndHollidays.push($(this).attr('data-cal-date'));
            }
        )
    console.log(WeekEndsAndHollidays);
    
    $('.cal-day-holiday').children().each(function(){
            WeekEndsAndHollidays.push($(this).attr('data-cal-date'));
            }
        )
    console.log(WeekEndsAndHollidays);
    
    //var jsonString = JSON.stringify(WeekEndsAndHollidays);
    /*
    $.ajax({
       type: "POST",
       url: "script/EventCalendar.php",
       data: { "week[]" : WeekEndsAndHollidays },
        success: function () { },
        error: function () { }
    });*/
   //var test = "ertertretre";
    //$.post('index.php', { 'weekArray': test.serialize() });
    /*
    $.ajax({
        type: "POST",
        url: "index.php",
        data: { "weekArray" : test },
        success: function (data) {
            console.log(data);
        },
        error: function () {
            //gerer les erreur
        }
    });
    */
    
    /*$.ajax({
      type: "GET",
      url: "index.php",
      data: "{'fname':'dave','lname':'ward'}",
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function(data) {
        console.log("toto");
      }
    });*/
    
    
    //convert array to json
    //var jsonArray = JSON.stringify(WeekEndsAndHollidays);
    
    //prepare POST data
    //var dataToPost = { 'jsonArray':jsonArray };
    
    //send POST data to PHP and handle response
    /*$.ajax({
      type: 'POST',
      url: 'index.php',
      data: dataToPost
    });
    */
    /*
    var value1 = "toto";
    var value2 = "tata";
    var data = "var1=" + value1 +  "&var2=" + value2;
    
    if(window.XMLHttpRequest)
                { // Firefox
                xhr = new XMLHttpRequest();
                }
            else if(window.ActiveXObject)
                { // Internet Explorer
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
                }
                
    xhr.open("GET", "index.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhr.send(data);
    //ids.push($(this).attr('id'));
*/
    });
}(jQuery));  