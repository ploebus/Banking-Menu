<?php

require('../php/db_login.php');

//connect to database
$dbc=mysql_connect($db_host,$db_username,$db_password);
$connection=mysql_select_db($db_database,$dbc);


$query="select distinct F1 from financialinstitutions order by f1 asc;";
$result=mysql_query($query);
echo '<ul id="droplist1" style="display:none">';
	while($row=mysql_fetch_array($result)){
		echo '<li id="BankList">'.$row["F1"].'</li>';
			}
	echo '</ul>';
//mysql_close($connection);
?>
