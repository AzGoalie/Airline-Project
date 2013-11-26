<?php
session_start();
$host="localhost"; // Host name 
$username="cse360fa_t25-28"; // Mysql username 
$password="team25-28"; // Mysql password 
$db_name="cse360fa_t25-28"; // Database name 
$tbl_name="team28_UserInfo"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "index.php"
	$_SESSION['myusername'] = $myusername;

	// check whether user is admin or not
	$sql="SELECT admin FROM $tbl_name WHERE username='$myusername'";
	$result =  mysql_query($sql);
	$row = mysql_fetch_array($result);
	$_SESSION['admin'] = $row['admin'];
	header("location:index.php");
}
else {
	echo "Wrong Username or Password";
}
?>