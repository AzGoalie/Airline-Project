 <html> 
 <head>

 	<link rel="stylesheet" type="text/css" href="css/normalize.css">  
 	<link rel="stylesheet" type="text/css" href="css/result-light.css">
 	<style type = 'text/css' >
 		h1{text-align: center;}
 		#login{text-align: center;}
 		#update{text-align: center;}
 		#pw{margin-left: 3px;}
 		#lb{margin-left: 60; width: 150px;}
 		.search1{ text-align:center;}
 		.scroll{width:700px;height:500px;overflow:auto;margin: 0 auto;}

 		body {padding: 20px;}
 		input:not(input[type="button"]) {margin-bottom: 5px; padding: 2px 3px; width: 209px;}
 		td {padding: 4px; border: 1px #CCC solid; width: 100px;}
 		h1 {font-size: 300%}
 	</style>

 	<script type='text/javascript' src='http://code.jquery.com/jquery-1.7.1.js'></script>

<script type='text/javascript'>//<![CDATA[ 
	$(window).load(function(){
		var $rows = $('#table tr');
		$('#search').keyup(function() {
			var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

			$rows.show().filter(function() {
				var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
				return !~text.indexOf(val);
			}).hide();
		});
});//]]>  
</script>

</head>

<title>Airline Ticket System</title>

<body>
	<h1><b>Mayday Airlines</b><br><br></h1>

	<?php
	session_start();
	$host = 'localhost';
	$database = 'cse360fa_t25-28';
	$table = 'team28_FlightInfo';
	$username = 'cse360fa_t25-28';
	$password = 'team25-28';

	if(!isset($_SESSION['myusername'])) {
		echo "<form id=\"login\" action=\"login.php\" method=\"post\">
		Username: <input type=\"text\" name=\"username\"><br>
		Password: <input type=\"password\" name=\"password\" id=\"pw\"><br>
		<input type=\"submit\" value=\"Login\" id=\"lb\">
		</form><br><br><br>";
}

else {
	$name = $_SESSION['myusername']; 
	echo "<p style=\"text-align:right\">Logged in as $name</p>";
	echo "<div style=\"text-align:right\"><a href='logout.php'>Log out</a></div>"; 
}

if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
{
	echo "<form action=\"upload.php\" method=\"post\"
	enctype=\"multipart/form-data\">
	<label for=\"file\">Filename:</label>
	<input type=\"file\" name=\"file\" id=\"file\"><br>
	<input type=\"submit\" name=\"submit\" value=\"Submit\">
</form>";
}

$link = mysql_connect($host, $username, $password);
if (!$link) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($database,$link);

$result = mysql_query("SELECT * FROM {$table}") or die('cannot show tables');


echo "<div class=\"search1\" align=\"center\"><input type=\"text\" id=\"search\" placeholder=\"Type to search\" style=\"margin-right: center;\"></div>";
echo "<div class='scroll'><table id=\"table\" align=\"center\">";
echo "<th>From</th><th>To</th><th>Price</th><th>Time</th><th>Seating</th>";

if(isset($_SESSION['myusername']))
	echo "<th>Book</th>";

echo "<tbody>";
while($row = mysql_fetch_row($result))
{
	echo "<tr>";

	echo "<td class=\"first\">$row[1]</td>";
	echo "<td class=\"to\">$row[2]</td>";
	echo "<td align='center'>$$row[3]</td>";
	echo "<td class=\"time\" align='center'>$row[4]</td>";
	echo "<td align='center'>$row[6]</td>";

	if(isset($_SESSION['myusername']))		
		echo "<td align='center'><form id= \"buy\" method=\"post\" action=\"confirm.php\">
	<input name=\"from\" type=\"hidden\" value=\"$row[1]\">
	<input name=\"to\" type=\"hidden\" value=\"$row[2]\">
	<input name=\"price\" type=\"hidden\" value=\"$row[3]\">
	<input name=\"time\" type=\"hidden\" value=\"$row[4]\">
	<input name=\"seating\" type=\"hidden\" value=\"$row[6]\">
	<input name=\"submit\" type=\"submit\" value=\"Buy\">
</form></td>";

echo "</tr>\n";
}
echo "</tbody>";
echo "</table></div>";

mysql_close($link);
?>



</body>
</html>