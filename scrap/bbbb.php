<!DOCTYPE HTML PUBLIC "-/W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Example</title>
	</head>
	<body style="width: 960px; margin: 25px auto 0;">
		<?php
			if ( !empty ( $_GET ) ) {
				$get = $_GET['textinput1'];
				$get1 = $_GET['textinput2'];
				
				echo $get."  ".$get1;
			}
			
			if ( !empty ( $_POST ) ) {
				print_r($_POST);
			}
		?>
	</body>
</html>