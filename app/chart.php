<?php

include("init.php");

$user_id = $_SESSION['user_id'];

$sql = "
SELECT profit_expense, SUM(amount) AS amount 
FROM operations
WHERE user_id=32
AND MONTH(date) = MONTH(CURRENT_DATE()) 
AND YEAR(date) = YEAR(CURRENT_DATE()) 
GROUP BY profit_expense";

$result = $SW->Database->query($sql);

?>


 

 
 <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Profit/Expense', 'Amount'],
          
        <?php
            while($row = $result->fetch_array(MYSQL_ASSOC)){
                echo "['".$row['profit_expense']."' , ".$row['amount']."],";
            }
            
            
            
            ?>
        ]);

        var options = {
          title: 'Month Balance'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>