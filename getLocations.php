<?php
$Org=$_GET['org'];

include("../php/db_login.php");

$con=mysql_connect($db_host,$db_username,$db_password);
$db=mysql_select_db($db_database,$con);

$query="SELECT name, bg_lat as latitude, bg_long as longitude,address,city,zip FROM fp_locations WHERE BankID='".$Org."'";

$json='{
	"marker":[';
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	
	$json .= $joiner.'{"location":"'.$row["name"].'"';
	$json .= ',"address":"'.$row["address"].'"';
	$json .= ',"city":"'.$row["city"].'"';
	$json .= ',"zip":"'.$row["zip"].'"';
	$json .= ',"latitude":"'.$row["latitude"].'"';
	$json .= ',"longitude":"'.$row["longitude"].'"}';
	
	$joiner=",";
}


$json .= ']}';
echo $json;
//print_r($row);
//echo "var markers= ",json_encode($markers),"\n";


	//$hello=array_map(utf8_encode, $row);
	//echo "marker:".json_encode($hello)."\n";
	
	

?>

