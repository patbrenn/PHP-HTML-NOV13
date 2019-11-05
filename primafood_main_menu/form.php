<!DOCTYPE html >
<html>
	<head>
		<title><?php echo $pagetitle; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<style type="text/css">
		input, textarea, label, p, h4 { font-family: verdana; font-size: small; }
			label { color: green; }
		</style>
		
	</head>
	<body>
	    <div align="center">
<!--	date, start_time, end_time, description_header, description -->
	<h4>Primafood - YOU ARE ADDING OR EDITING A MENU ITEM</h4>
<p><a href="index.php">Start over</a></p>
		<form action="?<?php echo $action; ?>" method="post" > 
	 	<!-- 
		<label>Date: YYYY-MM-DD format:<input type="text" name="date" value="<?php echo $date; ?>"></label><br /><br />
		
		<label>Start time: hh:mm 24 hr format:<input type="text" name="start_time" value="<?php echo $start_time; ?>"></label><br /><br />

		<label>End time: hh:mm 24 hr format: <input type="text" name="end_time" value="<?php echo $end_time; ?>"></label><br /><br />-->
	
<!--<p><b></>Tip: for these text boxes, you must use a \ character in front of  any ' or  " characters.</b><p>-->

 		<label>Category:
 		
		<input type="radio" name="category" size="10" value="Starter" <?php if($category == "Starter") echo "checked = true"?>>Starter
		 		
		
		<input type="radio" name="category" size="10" value="Main" <?php if($category == "Main") echo "checked = true"?>>Main
		
		
		<input type="radio" name="category" size="10" value="Dessert" <?php if($category == "Dessert") echo "checked = true"?>>Dessert
		
		
		<input type="radio" name="category" size="10" value="Beverage" <?php if($category == "Beverage") echo "checked = true"?>>Beverage
		
		
		</label><br /><br />



		<label>Name: <input type="text" size="50" name="name" value="<?php echo $name; ?>"></label><br /><br />


		<label>Description:<textarea name="description" rows="10" cols="40"><?php echo $description; ?></textarea></label><br /><br />

		<label>Price: <input type="text" name="price" size="50" value="<?php echo $price; ?>"></label><br /><br />
		
		<input type="hidden" name="vendor" value="<?php echo $vendor ?>">
<!--		Select a trainer_ID (UNDER THE NAME) from the list:<br>-->
     
<!--		<label>IGNORE THIS menuitem_id (read only):-->
			<input type="hidden" name="menuitem_id" size="80" value="<?php echo $menuitem_id; ?>" readonly="readonly">
<!-- </label>  -->

        
		<input type="submit" id="my_submit">
		</form>
		

		</div>
        
	</body>
</html>
