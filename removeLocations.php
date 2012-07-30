<?php

session_start();

$sid=session_id();
require('../php/db_login.php');
$name=$_POST['name'];

$con=mysql_connect($db_host,$db_username,$db_password);
$db=mysql_select_db($db_database,$con);
        
$query="DELETE From fp_interest WHERE  client='".$sid."' and product='".$name."'";
echo $query;
mysql_query($query) or die("this did not work well");

?>