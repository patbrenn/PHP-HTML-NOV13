<?php


	
//usually include form.php here BUT see below for reason why section has moved --

//connect to database -----------------------------------------------------------
//$conn = mysqli_connect("localhost","prefects_rah", "rahrahrasputin1A!");
$conn = mysqli_connect("localhost", "root", "");
	
if(!$conn) {
	$error = 'Unable to connect to the database server.';
	include 'error.php';
	exit();
}

if(!mysqli_set_charset($conn, 'utf8')) {
	$error = 'Unable to set database connection encoding.';
	include 'error.php';
	exit();
}

if(!mysqli_select_db($conn,"prefects_primafood")) {

//if(!mysql_select_db("agapeencounter_org_calendar_of_events")) {
	$error = 'Unable to locate the database.';
	include 'error.php';
	exit();
}	

//--- usually, the next section goes on top, but -----------------------------------------------------------------

//--- because the form needs data from the database, cannot ------------------------------------------------------


//------------------------vendor login---------------------------------------------------

if(isset($_GET["vendor"])) {
	
	$vendor = $_GET["vendor"];
	
	if($vendor != "fred") {
		
		$error = 'Login error.';
		include 'error.php';
		exit();
	}
	
}
else if(isset($_POST["vendor"])) {
	
	$vendor = $_POST["vendor"];
	
	if($vendor != "fred") {
		
		$error = 'Login error.';
		include 'error.php';
		exit();

	}
}
else {
	
		$error = 'Login error.';
		include 'error.php';
		exit();
	
}


//--------------------------- image ul ------------------------------------------------------------


//--------------------------- add --------------------------------------------------------------------------------

if(isset($_GET["add"])) {

	$pagetitle 	= "New Menu Item";
	$action 	= "addevent";
	$name		= "";
	$date		= "";
	$category = "";
	
	$price 		= "";
	$description = "";
	
	$menuitem_id = "";
	
	$description_header = "";
	$start_time = "";
	$end_time = "";
	$vendor = $_GET["vendor"];

	$event_id = "vendor_id will be assigned automatically";
	$button 	= "Add event";

	include 'form.php';
	exit;
}

//-----------------------------------------------------------------------------------

//------------------- edit -----------------------------------------------------------

if(isset($_GET['editform'])) {
	$category = $_POST[category];
	$name = $_POST["name"];
	$description = $_POST["description"];	
	$price = $_POST["price"];
	

	$menuitem_id = $_POST["menuitem_id"];

	
	if($name == "" || $description == "" || $price == "" || $category == "") { 
		$error = 'Error: missing a required value. GO BACK.';
		include 'error.php';
		exit;
	}
	
	if(!is_numeric($price)) {
		$error = 'Error: integer value required for price.';
		include 'error.php';
		exit;
	}	
	

 	$sql = " UPDATE menuitems SET
	category = '$category', description = '$description', name = '$name', price = '$price' WHERE menuitem_id = '$menuitem_id'";
	 
	
 	if(!mysqli_query($conn, $sql)) { 
		$error = 'Error updating data: ' . mysqli_error();
		include 'error.php';
		exit;
	}
	
	header('Location: index.php');
	exit(); 	
}

//------------------ INSERT ---------------------------------------------------------

if(isset($_POST["name"])) {
	
	$name=$_POST["name"];
	
	$price=$_POST["price"];

	//$date=$_POST["date"];
	
	$description=$_POST["description"];
	
	$category=$_POST["category"];
	//echo $category;
	//exit;
	//$start_time=$_POST["start_time"];
	
	//$end_time=$_POST["end_time"];
	
	//$venue=$_POST["venue"];
	
	//$event_id=$_POST["id"];
	
	if($description=="" || $price=="" || $name=="" || $category == "") { 
		$error = 'Error: missing a required value. PRESS BACK.';
		include 'error.php';
		exit;
	}
	
/*	if(strlen($start_time)!=5 || strlen($end_time)!=5) {
		$error = 'Error: times should be in hh:mm format. PRESS BACK.';
		include 'error.php';
		exit;
		
		
		
	}*/
	
/*	if(strlen($date)!=10 || substr($date,4,1)!="-" || substr($date,7,1)!="-" ) {
		$error = 'Error: date should be in YYYY-MM-DD format. PRESS BACK.';
		include 'error.php';
		exit;
	}*/	
	
 	$sql = " INSERT INTO menuitems ( category, name, description, price )  VALUES ( '$category', '$name', '$description', '$price' ) ;"; 
//echo $sql;
//exit;
 	if(!mysqli_query($conn, $sql)) { 
		$error = 'Error inserting data: ' . mysqli_error($conn);
		include 'error.php';
		exit;
	}
	
	header('Location: index.php');
	exit; 	
}

//---------- del  ---------------------------------------------------------------------------------------

if( isset($_POST["action"]) && $_POST["action"] == "delete" ) {
	
	
	$menuitem_id = $_POST["menuitem_id"];
	
 	$sql = " DELETE FROM menuitems  WHERE menuitem_id='$menuitem_id' ";

 	if(!mysqli_query($conn, $sql)) { 
		$error = 'Error deleting data: ' . mysqli_error($conn);
		include 'error.php';
		exit;
	}
	
	header('Location: index.php');
	exit; 	
}


//--------- edit ------------------------------------------------------------------------------------

if( isset($_POST["action"]) && $_POST["action"] == "edit" ) {
	
	
	$menuitem_id = $_POST["menuitem_id"];
	
 	$sql = "SELECT category, name, description, price FROM menuitems WHERE menuitem_id = $menuitem_id";
 	
	$result = mysqli_query($conn, $sql);
	
	if($result==FALSE) {
		$error = 'Error obtaining data to edit: ' . mysqli_error($conn);
		include 'error.php';
		exit;
	}	

	$data = mysqli_fetch_array($result);
	
	//$date		= 			$data[0];
//	$start_time = 			$data[1];
	//$end_time 	= 			$data[2];
	//$description_header = 	$data[3];
		$category=$data[0];
	$name = 			$data[1];
	$description = 			$data[2];
	$price = 			$data[3];
	
	//$venue = $data[5];
	
	
	$pagetitle 	= "Edit Menu Item";
	$action 	= "editform";
	$button 	= "Add Menu Item";
	
	include 'form.php';	
	exit; 	
}


//---------- show--------------------------------------------------------------------------------------

	$sql= "SELECT category, name, description, price, menuitem_id 
			 FROM menuitems
			 ORDER BY category DESC, name";
			 

	$result = mysqli_query($conn, $sql);
	
	if($result==FALSE) {
		$error = 'Error selecting data: ' . mysqli_error($conn);
		include 'error.php';
		exit;
	}

	$numrows = mysqli_num_rows($result);
	$numcols = mysqli_num_fields($result);

//------- now bring in the HTML page that will display them ---------------------------------------------------	
	
	include 'menu_items.php';

?>
