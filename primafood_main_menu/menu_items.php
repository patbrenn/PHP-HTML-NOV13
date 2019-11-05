<!DOCTYPE html>
<html>
	<head>
		<title>List of menu items</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<style>
		table, input, textarea, label, p, h4 { font-family: verdana; font-size: small; }
		th { background-color: azure;}
		
		</style>
	</head>

	<body>  
    <div align="center" > 
    
    <h4>Primafood Live Update Facility</h4>
    <p>
    
   
    
    <a href="?">View Vendor website</a>&nbsp;&nbsp;&nbsp;<a href="login.php">Logout</a><br/><br/><a href="?add=&vendor=<?php echo $vendor ?>">Add Menu Item</a>
    </p>

		<?php 
		
		if ($numrows>0) {
		
			echo "<p>Here are all the menu items in the database (" . $numrows . "):</p>";
			
			echo "<table border=\"1\" rules=\"rows\"  cellspacing=\"6px\" cellpadding=\"6px\" width=90%>";
			// date,start_time,end_time,description_header,description,venue,event_id
			echo "<tr><th align=left>Category</th><th align=left>Name</th><th align=left>Description</th><th align=left>Price</th><th align=left>Action</th></tr>";
						
			while ($data = mysqli_fetch_array($result)) {
		
			  echo "<tr>";
			  
			  for ($i=0; $i<$numcols-1; $i++) {
			  	echo "<td>" . $data[$i] . "</td>\n";
			  }
			  
				echo "<td><form action=\"?\" method=\"post\">";
				echo "<input type=\"hidden\" name=\"menuitem_id\" value=\"" . $data[$i] . "\"/>";
				
				echo "<input type=\"hidden\" name=\"vendor\" value=\"" . $vendor . "\"/>";
				
				echo "<input style=\"color: blue;\" type=\"submit\" name=\"action\" value=\"edit\"/>";
				echo  "<br/>";
				echo "<input style=\"color: red;\" type=\"submit\" name=\"action\" value=\"delete\" onClick=\" return check_delete();\" />";				
				//echo "<input style=\"color: green;\" type=\"submit\" name=\"action\" value=\"upload image\"  />";
				echo "</form></td>";
			  
			  echo "</tr>\n";
			}
			echo "</table>";
		}
		else {
			echo "<p>No items in database.</p>";
		}

		?> 
		<script>

	    	function check_delete() {
		    	return true;
			    return confirm("You are about to delete an event. Continue?");
		    }
			
		</script>
        
           </div> 
	</body>

</html>