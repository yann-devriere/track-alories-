<?php
//  error_reporting(E_ALL);
//  ini_set("display_errors", 1);

 include('../class/crudRepas.php');
 
 $repas = new Repas;
 $email = $_SESSION['email'];
 $date= date('Y-m-d');
 $repas->getLastDays($email);
 $repas->getLastDays($email);

 if($_SESSION['sexe']=="homme"){
	 $limite = "2700";
 }else{
	$limite = "2200";
 }

?>

<?php
 
$dataPoints = array(
	array("label"=> "Il y a 9j", "y"=> $_SESSION['day9']),
	array("label"=> "Il y a 8j", "y"=> $_SESSION['day8']),
	array("label"=> "Il y a 7j", "y"=> $_SESSION['day7']),
	array("label"=> "Il y a 6j", "y"=> $_SESSION['day6']),
	array("label"=> "Il y a 5j", "y"=> $_SESSION['day5']),
	array("label"=> "Il y a 4j", "y"=> $_SESSION['day4']),
	array("label"=> "Il y a 3j", "y"=> $_SESSION['day3']),
    array("label"=> "Il y a 2j", "y"=> $_SESSION['day2']),
    array("label"=> "Hier", "y"=> $_SESSION['day1']),
	array("label"=> "Aujourd'hui", "y"=> $_SESSION['today'])
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Nombre de calories consommées par jour"
	},
	axisY: {
		title: "Nombre de calories"
	},
	data: [{
		type: "line",
		lineColor: "green",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}
	,{
		type: "line",
		lineColor: "brown",
		showInLegend: true,
		markerSize: 2,
		legendMarkerType:"none",
		legendText:"Moyenne maximum conseillée",
		dataPoints:[
		    { label: "Il y a 9j", y: <?php echo $limite ?>},
			{ label: "Il y a 8j", y: <?php echo $limite ?>},
			{ label: "Il y a 7j", y: <?php echo $limite ?>},
			{ label: "Il y a 6j", y: <?php echo $limite ?>},
			{ label: "Il y a 5j", y: <?php echo $limite ?>},
			{ label: "Il y a 4j", y: <?php echo $limite ?>},
			{ label: "Il y a 3j", y: <?php echo $limite ?>},
			{ label: "Il y a 2j", y: <?php echo $limite ?>},
			{ label: "Hier", y: <?php echo $limite ?>},
		    {label: "Aujourd'hui", y: <?php echo $limite ?>}] 
	}
	]
	
});
chart.render();
 
}
</script>
</head>
<body>
	<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 