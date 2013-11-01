<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Software Testing &raquo; oleh Rijalul Fikri - http://rijalulfikri.name</title>
	<style>
		* { margin: 0 auto; padding: 0; }
		body { font-family: sans-serif; background: #143937; padding: 30px; }
		#container { width: 70%; padding: 20px; background: #CCC; border-radius: 3px; }
	</style>
</head>
<body>
	<div id="container">
		<?php
		require "vendor/autoload.php";

		use \Statistic as Stats;

		$data = [1,3,5,7,10];

		$test = new Stats\Statistic($data);

		echo '<pre>';print_r($test->getData());echo '</pre>';
		echo 'Nilai rata-rata: '.$test->getAverage().'<br>';
		echo 'Nilai median: '.$test->getMedian();
		?>
	</div>
</body>
</html>