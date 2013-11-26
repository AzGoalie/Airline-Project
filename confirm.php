 <html> 
 <head>
 	<link rel="stylesheet" type="text/css" href="css/normalize.css">  
 	<link rel="stylesheet" type="text/css" href="css/result-light.css">

 	<style type="text/css">
 		h1 { text-align: center; font-size: 40px; font-weight: bold; }
 		p { text-align: center; font-size: 25px; }

 		#confirm,#deny { display:inline-block;}

 	</style>
 </head>

 <body>
 	<?php
 	session_start();
 	$from=$_POST['from']; 
 	$to=$_POST['to']; 
 	$price=$_POST['price']; 
 	$time=$_POST['time']; 
 	$seat=$_POST['seating']; 

 	echo "<h1>Confirm Flight</h1><br>";
 	echo "<p>From: $from<br>";
 	echo "To: $to<br>";
 	echo "Departure Time: $time<br>";
 	echo "Price: $$price<br>";
 	echo "Seat: $seat<br></p>";

 	echo "<div style=\"text-align:center\">
 	<form id=\"confirm\" action=\"receipt.php\" method=\"post\">
 		<input name=\"from\" type=\"hidden\" value=\"$from\">
 		<input name=\"to\" type=\"hidden\" value=\"$to\">
 		<input name=\"price\" type=\"hidden\" value=\"$price\">
 		<input name=\"time\" type=\"hidden\" value=\"$time\">
 		<input name=\"seating\" type=\"hidden\" value=\"$seat\">
		<b>Number of Passengers: </b><input type=\"text\" name=\"numberOfPassengers\"><br>
 		<input type=\"submit\" style=\"width: 300px;\" value=\"Purchase\">
 	</form>";

 	echo "<div style=\"text-align:center\">
			<form id=\"deny\" action=\"index.php\" method=\"post\">
 			<input type=\"submit\" style=\"width: 300px;\" value=\"Back\">
 		</form></div>";
 ?>

</body>
</html>