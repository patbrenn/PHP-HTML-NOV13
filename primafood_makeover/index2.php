<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Dooocument</title>
</head>
<body>
<h1>hello</h1>
<?php

echo "<p>hello</p>";

//$conn = mysqli_connect("localhost","prefects_rah", "rahrahrasputin1A!");
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

$sql = "SELECT `name`, `description`, `price`FROM `starters` WHERE 1  \n"

. "ORDER BY `starters`.`name` ASC";


$result = mysqli_query($conn, $sql);

if(!$result) {
	$error = mysql_errno();
	include 'error.php';
	exit;
}

echo "<p>hello4</p>";

//echo mysqli_affected_rows($conn);
//echo $result->num_rows;

$numrows = mysqli_num_rows($result);
$numcols = mysqli_num_fields($result);


?>
<table border=1>

<?php

//while ($data =  $result->fetch_row()) {
//
//				echo "<tr>";
//				for ($i=0; $i<$result->field_count; $i++) {
//
//					echo "<td>" . $data[$i] . "</td>";
//				}
//
//
//		echo "</tr>";
//
//}

echo "<table border=\"1\" cellpadding=\"5px\">\n";

while ($data = mysqli_fetch_array($result)) {
	echo "<tr>";
	
	for ($i=0; $i<$numcols; $i++) {
			
		echo "<td>" . $data[$i] . "</td>";
	}

	echo "</tr>";
}
echo "</table>\n";


?>




</table>
</body>
</html>
