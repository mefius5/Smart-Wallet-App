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