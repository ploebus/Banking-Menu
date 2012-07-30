<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Alameda County CAN</title>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		
<?php
include("head.html");
require("../php/db_login.php");
include("./behavior/FpPHP.php");

//insert session information into database
if(!($_SESSION['sid'])){
	header('Location:http://alamedacountycan.org/FinancialProductsv2/index.php');
}
else{
$_SESSION['begin']=$_POST['begin'];
$_SESSION['maintain']=$_POST['maintain'];
$_SESSION['ssn']=$_POST['ssn'];
$_SESSION['legal']=$_POST['legal'];
$_SESSION['chex']=$_POST['chex'];
$_SESSION['dd']=$_POST['dd'];
$_SESSION['intranet']=$_POST['intranet'];
$_SESSION['transfer']=$_POST['transfer'];
$_SESSION['bounce']=$_POST['bounce'];
$_SESSION['bills']=$_POST['bills'];
$_SESSION['checks']=$_POST['checks'];
}
?> 


 

		<script type="text/javascript" language="javascript">
			_uacct = "UA-697750-4";
			urchinTracker();
		</script>
		
	<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		
				
		$(".addToCart").click(
			function(){
				var name=addslashes($(this).attr("alt"));
				var bank=addslashes($(this).attr("id"));
				
				
			       	$("#selectedProduct>table").append("<tr style='border-bottom:solid thin green'><td class='myProducts' alt='"+bank+"' id='"+name+"'>"+bank+"--"+name+"</td><td><input style='margin-left:5px;' class='btn' type='button' value='remove' /></td></tr>"),
				$.post("storeProducts.php",{account:name, bank:bank});
				$(".btn[value='remove']").click(function(){
					$.post("removeLocations.php",{name:name});
					//atempted fix
					$('#'+name).remove();
					$(this).parent().parent().remove();
				});
				});
		$("#chkCredit").change(function(){
			$('.credit').toggle('slow');
			});
		$("#chkBank").change(function(){
			$('.bank').toggle('slow');
			});
		$("#printAccounts").click(function(){
			$(".myProducts").each(function(i){
				var bank=$(this).attr("alt");
				var product=$(this).attr("id");
				
				$("#hiddenAccounts").load("http://alamedacountycan.org/FinancialProductsv2/FpProfile.php",{"bank":bank,"product":product},
							  function(){$("#hiddenAccounts").print();});
			});
		});
		});
	</script>

<script type="text/javascript" language="javascript">

	var markersArray=[];
	$(document).ready(function() {
	var category="";
	var latlng=new google.maps.LatLng(37.6419, -121.9819);
	var myOptions={
					zoom:9,
					center:latlng,
					mapTypeId:google.maps.MapTypeId.ROADMAP
				};
	var map = new google.maps.Map(document.getElementById("FpMap"),myOptions);
		//map.setCenter(new GLatLng(37.6419, -121.9819), 10);
		//map.setUIToDefault();
	

	//var countyLayer=new google.maps.KmlLayer('http://INFOGIS:8399/arcgis/services/Cities/MapServer/KmlServer');
		//countyLayer.setMap(map);

	jQuery("#countySelector").change(function(){
		var thisText=$("#countySelector option:selected").val();
		$("#ResultTable tr").fadeOut();
		$('*.[class~='+thisText+']').fadeIn();
		
		switch(thisText)
		{
			case "Alameda":
				map.setCenter(new google.maps.LatLng(37.67094,-121.963463));
				map.setZoom(9);
				break; 
			case "Costa":
				map.setCenter(new google.maps.LatLng(37.983824,-122.06955));
				map.setZoom(10);
				break;
			case "Marin":
				map.setCenter(new google.maps.LatLng(38.165443,-122.552948));
				break;
			case "Clara":
				map.setCenter(new google.maps.LatLng(37.357141,-121.953793));
				break;
			case "Mateo":
				map.setCenter(new google.maps.LatLng(37.560718,-122.334881));
				break;
		}
	})
$('.mapClick').click(function(){
		//$('#FpMap').jmap('init', {'mapType':'hybrid','mapCenter':[37.6419, -121.9819],'mapZoom':9}),
	//Remove old markers in a crude way
			/*$('img[src*="marker.png"]').remove();
			$('img[src*="shadow"]').remove();
			$('img[src*="transparent"]').remove();*/
			
		if(markersArray){
					for (i in markersArray){
						markersArray[i].setMap();
						
						}
						}
					markersArray=[];
					
//Gather new  markers				
			var category=$(this).attr('alt');
				$.getJSON("getLocations.php","org="+category,function(data){
					var infoHTML="";
						$.each(data.marker, function(i,item) {
									
							var latitude=item.latitude;
							var longitude=item.longitude;
							var description=item.location+'<hr />'+item.address+'<br /> '+item.city+', '+item.zip+'<br /><a target="_blank" href="http://maps.google.com/maps?f=d&source=s_d&saddr=&daddr='+item.address+'+'+item.city+'">Get Directions</a>';
							var infoWindow=new google.maps.InfoWindow({content:description});
							var marker=new google.maps.Marker({position:new google.maps.LatLng(latitude,longitude),
																title:item.location,county:item.location});
							google.maps.event.addListener(marker,'click',function(){infoWindow.open(map,marker)});
							markersArray.push(marker);
							//marker.setMap(map);
							
							//marker.setMap(map);
							/*$("#FpMap").jmap('AddMarker', {'pointLatLng':[latitude,longitude],
							'pointHTML':item.location+'<hr />'+item.address+'<br /> '+item.city+', '+item.zip+'<br /><a target="_blank" href="http://maps.google.com/maps?f=d&source=s_d&saddr=&daddr='+item.address+'+'+item.city+'">Get Directions</a>'});*/
						});  // end of each()
					if(markersArray){
					for (i in markersArray){
						markersArray[i].setMap(map);
						}
						}
						
					});
				});
				
	
			
			
			});
</script>
<script language="javascript">
$(document).ready(function() {
	$("#printAll").click(function(){
		var newwindow=window.open("test.php");
		newwindow.print();
		
	})
})
</script>
</head>
<body>
		
		<div class="container">
			<div id="hiddenAccounts" style="display:none"></div>
			<div  style="border:solid black">
				<?php
					include("headernav.html");
				?>
			</div>
<div class="twocolumn-leftContent">
	<div id="geoSelection">
		<div style="margin-bottom:10px;">
		<label for="countySelector" style="margin:10px;color: #0C6C1A;font-weight:bold;font-size:larger">Select a County to search:</label>
			
				<select id="countySelector">
					<option value="" selected>Select a County </option>
					<option value="Alameda">Alameda County </option>
					<option value="Costa">Contra Costa County </option>
					<option value="Marin">Marin County </option>
					<option value="Clara">Santa Clara County </option>
					<option value="Mateo">San Mateo County </option>
				</select>
		</div>
		
		<div>
		<label style="margin-top:10px;color: #0C6C1A;font-weight:bold;font-size:larger">Select a type of institution:</label>
		<input type="checkbox" id="chkCredit" checked="Checked" value="credit"/>Credit Union <input value="bank" checked="Checked" id="chkBank" type="checkbox"/>Commercial Bank 
		</div>
		
	</div>
	<div>
		 
	</div>
<div id="FpResults">
<?php
	$connect=mysql_connect("$db_host","$db_username","$db_password");
	mysql_select_db("$db_database",$connect);
	$query=mysql_query($select);
//Select and Write output to results list
 //mysql_data_seek($query,0);
$i=1;
$letter='A';


while($result=@mysql_fetch_array($query, MYSQL_BOTH)){
			
			echo "<table id='ResultTable' class='".$result["county"]." ".$result["type"]."'>
					<colgroup>
					<col width='50%' />
					<col span='4' />
					</colgroup>";
			
			//first row
			echo '<tr id="FpSummary" class="'.$result["county"].'"><td class="bankName" alt="'.$result[1].'">'.$result[0].'</td>
			
			<td class="tableHeader">Direct Deposit</td>
			<td class="tableHeader">Internet Access</td>
			<td class="tableHeader">Money Transfers</td>
			<td class="tableHeader">Checks</td>
			</tr>';
			
			//second row
			
			echo '<tr id="FpSummary" class="'.$result["county"].'">
			<td align="center"><a target="_blank" href="FpProfile.php?bank='.$result[0].'&product='.$result[1].'">
			'.$result[1].'</a></td>';
			
	// stoplight colorscheme for results scoring s used to be 3 to 5 LOOK FOR ERROR
		for($s=3;$s<=6;$s++){
			switch($result[$s]){
				case "1":
					echo '<td><img src="red.png" /></td>';
					break;
				case "2":
					echo '<td><img src="yellow.png" /></td>';
					break;
				case "3":
					echo '<td><img src="green.png" /></td>';
					break;
				};
				}
	echo '</tr>';
	
	//determines whether to display the incremental fee warning. Is there direct deposit and is the maintained balance lower than the fee waiver
	$Maintfee='<tr class="'.$result["county"].'"><td  colspan="2" class="alert">'.$result["Q7a"].'</td>';
	$Maintfeewaived='<tr class="'.$result["county"].'"><td  colspan="3" class="alert">'.$result["Q7a"].' waived with Direct Deposit</td>';	
	if($result['waive']==0){
		echo $Maintfee;
		}
	elseif($result['dd']==3 && $_POST['dd']=="1"){
		echo $Maintfeewaived;
		}
	elseif($result['waive']==1 and $result['maintain']<>null and $_POST['MAINTAIN']<=$result['maintain']){
		echo $Maintfee;
		}
	elseif($_POST['Q7']==0 and $result['dd']==3){
		echo $Maintfee;
		}
	else{
	echo	'<tr><td colspan="2" class="alert"></td>';
	}
	
	if($result['maintain']){
	echo '<td colspan="2" style="text-align:center;">Minimum Balance to avoid fee: <b>$'.$result["maintain"].'</b></td></tr>';
	}
	else{
		echo '</tr>';
	}
	
	echo '<tr class="'.$result["county"].'" ><td colspan="5">'.$result['Assessment'].'</td></tr>';
	//last row
	echo '<tr id="resultHeader" class="'.$result["county"].'" style="border-bottom:solid thin green">
			
			<td colspan="2" id="'.$result[0].'" alt="'.$result[1].'" class="addToCart"><img width="20" height="20" src="../images/shoppingCart.png" style="margin-right:5px" />Click to add to Accounts of Interest</td>
			
			<td  colspan="3" alt="'.$result["BankID"].'" class="mapClick" style="text-align:right"><img width="20" height="20" src="../images/i_overview.png" style="margin-right:5px" />(Click Here to Map)</td>
			</tr>';
	echo "</table>";
	}

?>

</div>
</div>
<div class="twocolumn-rightContent">
	<div id="FpMap">
	</div>
	<br />
	<div id="selectedProduct">
		<b>Accounts of Interest</b><hr />
		
		<table>
		</table>
		<hr />
		<input type="button" class="btn" value="Print All Accounts of Interest" id="printAll" />
		
	</div>
	<div id="FpAnswers">
		<form style="position:relative;left:15px;top:50px" action="behavior/FpFlush.php" method="POST"> 
		<input type="image" value="submit" src="../images/submit_button.png" />
		</form>
	</div>
</div>
<?php
include("../footer.php");
?> 		
	</div>
</body>
</html>
