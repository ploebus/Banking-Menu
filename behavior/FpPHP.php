<?php

//reverse eliminator variables

if($_POST['chex']=='true')
	{$chex='true';}
else
	{$chex="%";}
	
if($_POST['legal']=='true')
	{$legal='true';}
else
	{$legal="%";}

if($_POST['bounce']=='True')
	{$bounce='false';}
else
	{$bounce="%";}


//Eliminate institutions based on identification

$ID=$_POST['ssn'];




//has a ssn/itin and a Domestic gov ID
if(isset($ID['0']) && isset($ID['1']) && !isset($ID['2']) && !isset($ID['3']) ){
	$IDBin='3';
}
//has a ssn/itin and a Foreign gov ID
elseif(isset($ID['0']) && !isset($ID['1']) && isset($ID['2']) && !isset($ID['3']) ){
	$IDBin='3';
}
//has a ssn/itin and a Other Id
elseif(isset($ID['0']) && !isset($ID['1']) && !isset($ID['2']) && isset($ID['3']) ){
	$IDBin='2';
}
//has a ssn/itn and not other id
elseif(isset($ID['0']) && !isset($ID['1']) && !isset($ID['2']) && !isset($ID['3']) ){
	$IDBin='1';
}

//has an unexpired government id
elseif(!isset($ID['0']) && isset($ID['1']) && !isset($ID['2']) && !isset($ID['3']) ){
	$IDBin='1';
}

//has a ssn/itin and a Foreign gov ID and domestic ID
elseif(isset($ID['0']) && isset($ID['1']) && isset($ID['2']) && !isset($ID['3']) ){
	$IDBin='4';
}

//has a ssn/itin and a domestic ID and Other ID
elseif(isset($ID['0']) && isset($ID['1']) && !isset($ID['2']) && isset($ID['3']) ){
	$IDBin='4';
}

//has a ssn/itin and a foreign ID and Other ID
elseif(isset($ID['0']) && !isset($ID['1']) && isset($ID['2']) && isset($ID['3']) ){
	$IDBin='4';
}
//has all IDs
elseif(isset($ID['0']) && isset($ID['1']) && isset($ID['2']) && isset($ID['3']) ){
	$IDBin='4';
}

else{
	$IDBin='0';
	}

//sort through direct deposit;

if($_POST['dd']=='1'){
	$ddquestion="ddYes";
	}
else{
	$ddquestion="ddNo";
	}

//sort through internet;

$internetquestion="internetNo";

if($_POST['intranet']=="true"){
	$internetquestion="internetYes";
	}
//sort through money transfer;

$transferquestion="transferNo";

if($_POST['transfer']=="true"){
	$transferquestion="transferYes";
	}
	
//sort through money transfer;
$checksquestion="checksno";
if($_POST['checks']=="true"){
	$checksquestion="checksyes";
	};



$select='SELECT F1 as Name, F3 as Product,F4 as Assessment,'.$ddquestion.' as dd,'.$internetquestion.','.$transferquestion.','.$checksquestion.',waive,maintain,Q7a,'.$ddquestion.'+'.$internetquestion.'+'.$transferquestion.'+'.$checksquestion.' as score,BankID,county,type from financialinstitutions
 Where 
			begin <=' .$_POST["begin"]. 
			' && bounce like "'.$bounce.
			'" && legal like "'.$legal.  
			'" && chex like "'.$chex.
			'" && ssn <= '.$IDBin.
			' order by score DESC, Name ASC;';
//' && '.$ddquestion. ' >= '.$_POST["dd"].
//$query=mysql_query($select);


//Sort direct deposit

function recordUser($sid,$user){
	mysql_query("INSERT INTO fp_data (sid,user) VALUES ('".$sid."', '".$user."')");
	}

?>
