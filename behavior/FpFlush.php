<?php
session_start();

require("../../php/db_login.php");

$query ="INSERT INTO fp_responses (begin,maintain,ssn,govid,otherid,legal,chex,dd,internet,transfer,bounce,bills,checks,sid) values('"
.$_SESSION[begin].
"','".$_SESSION[maintain].
"','".$_SESSION[ssn][0].
"','".$_SESSION[ssn][1].
"','".$_SESSION[ssn][2].
"','".$_SESSION[legal].
"','".$_SESSION[chex].
"','".$_SESSION[dd].
"','".$_SESSION[intranet].
"','".$_SESSION[transfer].
"','".$_SESSION[bounce].
"','".$_SESSION[bills].
"','".$_SESSION[checks].
"','".session_id().
"')";

if(!mysql_query($query)){
die($query);
}
else{ 
$user=$_SESSION['user'];
session_unset();
session_start();
session_register("hello");
$id=session_id();
$_SESSION['sid']=$id;
$_SESSION['user']=$user;
header('Location:http://www.alamedacountycan.org/FinancialProductsv2/fpForm.php');
}
?>