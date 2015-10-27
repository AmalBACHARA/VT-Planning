// Load the Visualization API and the piechart package.
google.load('visualization', '1', {
    'packages': ['corechart']
});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawChart);

function drawChart() {
    var jsonData = $.ajax({
        url: "./script/getTauxByZone.php",
        dataType: "json",
        async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.
    var data = new google.visualization.DataTable(jsonData);

    var options = {
        title: "Taux d\'occupation des salles",
    };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
