<?php
//  error_reporting(E_ALL);
//  ini_set("display_errors", 1);

 include('../class/crudRepas.php');
 
 $repas = new Repas;
 $email = $_SESSION['email'];
//  $date= date('Y-m-d');
//  $repas->getLastDays($email);
 
 $repas->getLastDays($email);

$dataPoints = array(
	array("label"=> "Aujourd'hui", "y"=> $_SESSION['today']),
	array("label"=> "hier", "y"=> $_SESSION['day1']),
	array("label"=> "Il y a 2j", "y"=> $_SESSION['day2']),
	array("label"=> "Il y a 3j", "y"=> $_SESSION['day3']),
	array("label"=> "Il y a 4j", "y"=> $_SESSION['day4']),
	array("label"=> "Il y a 5j", "y"=> $_SESSION['day5']),
	array("label"=> "Il y a 6j", "y"=> $_SESSION['day6']),
    array("label"=> "Il y a 7j", "y"=> $_SESSION['day7']),
    array("label"=> "Il y a 8j", "y"=> $_SESSION['day8']),
	array("label"=> "Il y a 9j", "y"=> $_SESSION['day9'])
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    
    animationEnabled: true,
	exportEnabled: true,
	theme: "dark2",
	title: {
		text: "Calories des 10 derniers jours"
	},
	axisY: {
		minimum: 0,
		maximum: 5000,
		suffix: "Cal"
	},
	data: [{
		type: "column",
		yValueFormatString: "#\" \"",
		indexLabel: "{y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
 
function updateChart() {
	var color,deltaY, yVal, nom;
	var dps = chart.options.data[0].dataPoints;
	for (var i = 0; i < dps.length; i++) {
		
		yVal =  Math.min(Math.max( dps[i].y, 0), 5000);
        nom =dps[i].label
        color = yVal > 2700 ? "rgb(155, 29, 29)" : yVal >= 2400 ? "rgb(212, 91, 10)" : yVal >= 2200 ? "rgb(216, 195, 7)" : yVal < 2499 ? "rgb(30, 112, 19)" : null;
		 dps[i] = {label: nom  , y: yVal, color: color};
	}
	chart.options.data[0].dataPoints = dps;
	chart.render();
};
updateChart();
 
setInterval(function () { updateChart() }, 1000);
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 60%;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  