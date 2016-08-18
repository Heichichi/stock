<?php

$stepValue = 0.25;
$stockValue = 50;
$stock = array(array(),array());

for ($a = 0; $a <= 20; $a++) {
    $randResult = rand(0,1);
    if ($randResult == 0) {
        $stockValue -= $stepValue;
        $stock[] = $stockValue;
    } else {
        $stockValue += $stepValue;
        $stock[] = $stockValue;
    }
}

$js_stock = json_encode($stock);
echo $js_stock;
?>
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['line']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
            <?php echo "var stock_array = ". $js_stock .";"; ?>
            var data = new google.visualization.arrayToDataTable([
            [{label: 'Country', type: 'string'},
            {label: 'Population', type: 'number'},
            {label: 'Area', type: 'number'},
            {type: 'string', role: 'annotation'}],
            ['CN', 1324, 9640821, 'Annotated'],
            ['IN', 1133, 3287263, 'Annotated'],
            ['US', 304, 9629091, 'Annotated'],
            ['ID', 232, 1904569, 'Annotated'],
            ['BR', 187, 8514877, 'Annotated']
            ]);

            var options = {
                chart: {
                title: 'Stock Exchange',
                subtitle: 'Stock Example'
                },
                width: 900,
                height: 500
            };

            var chart = new google.charts.Line(document.getElementById('linechart_material'));

            chart.draw(data, options);
            }
    </script>
  </head>
  <body>
    <div id="linechart_material" style="width: 900px; height: 500px"></div>
  </body>
</html>