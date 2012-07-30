<?php

require('../php/db_login.php');

//connect to database
$dbc=mysql_connect($db_host,$db_username,$db_password);
$connection=mysql_select_db($db_database,$dbc);


$query="select distinct F1 from financialinstitutions order by f1 desc;";
$result=mysql_query($query);

	while($row=mysql_fetch_array($result)){
		echo '<li id="BankList">'.$row["F1"].'</li>';
			
	$query2='SELECT F3 from financialinstitutions where F1 = "'.$row["F1"].'";';
				$result2=mysql_query($query2);
					while($row2=mysql_fetch_array($result2)){
						echo '<li style="margin-left:10px;list-style-type:none;font-size:1em"><a id="ProductList" target="_blank" href="FpProfile.php?bank='.$row["F1"].'&product='.$row2["F3"].'">'.$row2["F3"].'</a></li>';
		}
	}
	
//mysql_close($connection);
?>
