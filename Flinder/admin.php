<!DOCTYPE html>
<html>
	<head>
		<script src="https://code.highcharts.com/highcharts.js"></script>
	    <title>admin</title>
	    <meta name="author" content="Barry Lagerburg">
	  
	</head>
	<body>
		<div id="container" style="width:100%; height:400px;"></div>
			<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<input type="file" name="file">
				<input type="submit" name="btn_submit" value="Upload File" />
				<input type="file" name="json">
				<input type="submit" name="btn_submit" value="make json" />
			<?php


			$fh = fopen($_FILES['file']['tmp_name'], 'r+');
			$lines = array();
			while( ($row = fgetcsv($fh, 8192)) !== FALSE ) {
				$lines[] = $row;
			}
			
			$keys = array_keys($lines);
		for($i = 0; $i < count($lines); $i++) {
		   		 echo $keys[$i] . "{<br>";
			    foreach($lines[$keys[$i]] as $key => $value) {
			      echo $key . " : " . $value . "<br>";
		    }
		    echo "}<br>";
		    
			}
				$file= $_POST["json"];
				$csv= file_get_contents($file);
				$array = array_map("str_getcsv", explode("\n", $csv));
				$json = json_encode($array);
				print_r($json);						
			//var_dump($lines);
			?>
			</form>
			<script>
					document.addEventListener('DOMContentLoaded', function () {
				    var myChart = Highcharts.chart('container', {
				        chart: {
				            type: 'line'
				        },
				        title: {
				            text: 'Fruit Consumption'
				        },
				        xAxis: {
				            categories: ['Apples', 'Bananas', 'Oranges']
				        },
				        yAxis: {
				            title: {
				                text: 'Fruit eaten'
				            }
				        },
				        series: [{
				            name: 'Jane',
				            data: [1, 0, 4]
				        }, {
				            name: 'John',
				            data: [5, 7, 3]
				        }]
				    });
				});
			 </script>
		</div>
	</body>
</html>