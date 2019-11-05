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

$numrows = mysqli_num_rows($result);
$numcols = mysqli_num_fields($result);

echo $numrows . ',';
echo $numcols;
?>

<table border="1px" cellspacing="1px">

<?php 
while ($data = mysqli_fetch_array($result)) {

		echo "<tr>";
	
		for ($i=0; $i < $numcols; $i++) {
				echo "<td>$data[$i]</td>";
		}

		echo "</tr>";

}

?>


</table>
</body>
</html>
