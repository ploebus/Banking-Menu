<?php
session_start();

	$name=$_POST['account'];
	$client=session_id();
	$bank=$_POST['bank'];
        include("../php/db_login.php");

$con=mysql_connect($db_host,$db_username,$db_password);
$db=mysql_select_db($db_database,$con);

$query="INSERT INTO fp_interest (product,client,bank) VALUES ('".$name."','".$client."','".$bank."')";

mysql_query($query);

?>