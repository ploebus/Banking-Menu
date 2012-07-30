<?php
require('../php/db_login.php');



//store form inputs
$username = $_POST['username'];
$password = $_POST['password'];



//connect to and query databse
$connect=mysql_connect("$db_host","$db_username","$db_password");
mysql_select_db("$db_database",$connect);
$result=mysql_query('SELECT * from fp_users WHERE username like"'.$username.'" and passwd like "'.$password.'"');
$row=mysql_fetch_array($result);


//conditonal return

	If($row){
		session_unset();
		session_start();
		session_register("hello");
		$id=session_id();
		$_SESSION['sid']=$id;
		$_SESSION['user']=$_POST['username'];

	//header('Location:http://www.alamedacountycan.org/FinancialProductsv2/fpForm.php');
	
	
	//echo '<script language="javascript" type="text/javascript">
        //window.location="http://www.alamedacountycan.org/FinancialProductsv2/fpForm.php"</script>';
	echo '<script language="javascript" type="text/javascript">
        window.location="http://sql:85/alamedacountycan/FinancialProductsv2/fpForm.php"</script>';
	}
else
{
	print "<strong>Incorrect login. Have your registered for this service?</strong>";
}
function redirect(){
header('Location: http://alamedacountycan.org/FinancialProductsv2/fpForm.php');
}
?>