<html>
<head>
<title><?php echo $_GET['bank']; ?></title>
<link type="text/css" href="FpStyles.css" rel="stylesheet">
<link type="text/css" href="FpPrint.css" rel="stylesheet" media="print" >

</head>
<body>
<div id="container">
          <div align="left">
            
             
<?php

require("../php/db_login.php");
$dbc=mysql_connect($db_host,$db_username,$db_password);
mysql_select_db($db_database,$dbc);

$query=mysql_query("Select * from financialinstitutions where F3 = '".$_GET['product']."' && F1 = '".$_GET['bank']."'");

$result[]=mysql_fetch_Array($query);
echo '<div id="FpProfile">';
echo '<table id="PrintProduct" colspan="3">';

	echo '<tr>';
		echo '<td class="printlabel1">Financial Institution Name</td>';
		echo '<td></td>';
		echo '<td class="printdescription">'.$result[0][F1].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1"></td>';
		echo '<td class="printlabel">Website to Open Account</td>';
		echo '<td class="printdescription">'.$result[0][F2].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Product Name</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription">'.$result[0][F3].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Assessment</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription">'.$result[0][F4].'</td>';
	echo '</tr>';
	
	echo '<tr>';
		echo '<td class="printlabel1">Entry level checking products "offer" channel</td>';
		echo '<td class="printlabel">How does someone find out about this product?</td>';
		echo '<td class="printdescription">'.$result[0][F5].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">ID Requirements</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription">'.$result[0][F6].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">SSN/ ITIN</td>';
		echo '<td class="printdescription">'.$result[0][F7].'</td>';
	echo '</tr>';	
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Foreign ID Cards</td>';
		echo '<td class="printdescription">'.$result[0][F8].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Residential Requirements/Mailing address</td>';
		echo '<td class="printdescription">'.$result[0][F9].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Can open with ChexSystems History?</td>';
		echo '<td class="printlabel">Any</td>';
		echo '<td class="printdescription">'.$result[0][F10].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Multiple Overdrafts</td>';
		echo '<td class="printdescription">'.$result[0][F11].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Fraud</td>';
		echo '<td class="printdescription">'.$result[0][F12].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Account Balance, Activity and Fee Requirements</td>';
		echo '<td class="printlabel">Minimum deposit required to open</td>';
		echo '<td class="printdescription">'.$result[0][F13].'</td>';
	echo '</tr>';
	//echo '<tr>';
	//	echo '<td class="printlabel1">Checking</td>';
	//	echo '<td class="printlabel">Minimum balance required to avoid //fee</td>';
//		echo '<td class="printdescription">'.$result[0][F14].'</td>';
//	echo '</tr>';
	
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Monthly Fee</td>';
		echo '<td class="printdescription">'.$result[0][F15].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Minimum balance required or activity required to avoid fee</td>';
		echo '<td class="printdescription">'.$result[0][F16].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Check Writing</td>';
		echo '<td class="printlabel">Unlimited or limited</td>';
		echo '<td class="printdescription">'.$result[0][F19].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Check Printing/Order Fee</td>';
		echo '<td class="printlabel">Printing Fee</td>';
		echo '<td class="printdescription">'.$result[0][F20].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Earns Interest or tied to</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription">'.$result[0][F21].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">ATM/Debit Card</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription">'.$result[0][F22].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">ATM Fees</td>';
		echo '<td class="printlabel">transaction fees</td>';
		echo '<td class="printdescription">'.$result[0][F23].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1"></td>';
		echo '<td class="printlabel">Other financial institution ATM usage fees</td>';
		echo '<td class="printdescription">'.$result[0][F24].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">International ATM fees</td>';
		echo '<td class="printdescription">'.$result[0][F25].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Foreign retail use fee</td>';
		echo '<td class="printdescription">'.$result[0][F26].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Monthly Statement/ Reconciliation</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription" ></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Statement fee</td>';
		echo '<td class="printdescription">'.$result[0][F27].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Check enclosure fee</td>';
		echo '<td class="printdescription">'.$result[0][F28].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Copies</td>';
		echo '<td class="printdescription">'.$result[0][F29].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Overdraft Fees</td>';
		echo '<td class="printlabel">Per occurance(day 1)</td>';
		echo '<td class="printdescription">'.$result[0][F30].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1"></td>';
		echo '<td class="printlabel">Daily limit (Cap on overdraft fees per day 1st day)</td>';
		echo '<td class="printdescription">'.$result[0][F31].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Per occurance subsequent day(s)</td>';
		echo '<td class="printdescription">'.$result[0][F32].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Subsequent day limit (cap on overdraft fees per 2nd and any subsequent days)</td>';
		echo '<td class="printdescription">'.$result[0][F33].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">In-Person Customer Service</td>';
		echo '<td class="printlabel">Languages offered at specific locations</td>';
		echo '<td class="printdescription">'.$result[0][F34].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Phone Customer Service</td>';
		echo '<td class="printlabel">Languages</td>';
		echo '<td class="printdescription">'.$result[0][F35].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1"></td>';
		echo '<td class="printlabel">Live operator fee</td>';
		echo '<td class="printdescription">'.$result[0][F36].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Voice response unit</td>';
		echo '<td class="printdescription">'.$result[0][F37].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Customer Service Website</td>';
		echo '<td class="printlabel">On-line banking</td>';
		echo '<td class="printdescription">'.$result[0][F38].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Languages</td>';
		echo '<td class="printdescription">'.$result[0][F39].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">Open Account On-line?</td>';
		echo '<td class="printdescription">'.$result[0]["webOpen"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel2"></td>';
		echo '<td class="printlabel">On-Line bill pay</td>';
		echo '<td class="printdescription">'.$result[0][F40].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Money Wire Receive</td>';
		echo '<td class="printlabel">Fee</td>';
		echo '<td class="printdescription">'.$result[0][F41].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Money Wire Send</td>';
		echo '<td class="printlabel">Fee</td>';
		echo '<td class="printdescription">'.$result[0][F42].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Special Money Transfer Program</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription">'.$result[0][F43].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Cashiers Check</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription">'.$result[0][F44].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Money Orders</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription">'.$result[0][F45].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Travelers Check</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription">'.$result[0][F46].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td class="printlabel1">Other Services</td>';
		echo '<td class="printlabel"></td>';
		echo '<td class="printdescription">'.$result[0][F47].'</td>';
	echo '</tr>';
	echo '</table>';
	echo '</div>';
	?>
	</body>
	</html>
	