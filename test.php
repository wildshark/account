<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 06-Aug-17
 * Time: 9:01 AM
 */

require_once "config/config.php";





?>
<!DOCTYPE html>
<html>
<head>
    <title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart()
        {
            var data = google.visualization.arrayToDataTable([
                ['Gender', 'Number'],
                <?php

                $query='select * from general_legder';
                $sql=$conn->query($query);
                while ($result=$sql->fetch_assoc()){
                    echo "['".$result["qouteDr"]."', ".$result["qouteCr"]."],";
                }
                echo json_encode($result);
                ?>
            ]);
            var options = {
                title: 'Percentage of Male and Female Employee',
                //is3D:true,
                pieHole: 0.4
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
<br /><br />
<div style="width:900px;">
    <h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>
    <br />
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>
</body>
</html>
