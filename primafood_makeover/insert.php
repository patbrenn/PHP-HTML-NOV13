<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>insert example</title>
</head>
<body>
<h1>hello</h1>
<?php 

echo "<p>hello</p>"; 


$conn = mysqli_connect("localhost","root", "");

if(!$conn) { 
	$error = mysql_errno();
	include 'error.php';
	exit;
}

echo "<p>hello1</p>"; 


//set the character encoding for the database connection 
if(!mysqli_set_charset($conn,'utf8') ){
	$error = mysql_errno();
	include 'error.php';
	exit;
}

echo "<p>hello2</p>";

//connect to the database
if(!mysqli_select_db($conn, "prefects_primafood")) {
	$error = mysql_errno();
	include 'error.php';
	exit;
}

echo "<p>hello3</p>"; 


  $sql = "INSERT INTO starters (name, description, price, vendor_id, starter_id) VALUES ('Sausage Rolls.', 'AA serving of four sausage rolls.', '3.50', NULL, NULL)";

//$sql = " INSERT INTO events  ( date, description_header, description, start_time, end_time, venue )  VALUES ( '$date', '$description_header', '$description', '$start_time', '$end_time', '$venue' ) "; 

if(!mysqli_query($conn, $sql)) {
	echo mysqli_error($conn);
	exit;
//	include 'error.php';
	//exit;
}

echo "<p>done</p>";


?>


</body>
</html>
