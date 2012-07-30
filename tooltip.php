<?php

//connect to db
require("../php/db_login.php");
$hello=$_GET['tip'];
//echo $hello
//Get results
$query=mysql_query('SELECT * from fp_tooltips where Question='.$hello);

while($results=mysql_fetch_array($query)){
	$tip=$results['Tip'];
	echo '<p>'.$tip.'</p><p id="close">Close</p>';
	}
?>