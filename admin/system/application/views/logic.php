<!DOCTYPE html>
<html>
	<head>
		<title>Edit Logic of Product</title>
	<script src="http://code.jquery.com/jquery-1.7.2.min.js" type="text/javascript"></script>
	<style>
		fieldset {
			width:700px;
		}
		legend {
			font-size:20px;
			
		}
		label.field{
			text-align:right;
			float:left;
			
		}
		fieldset p {
			clear:both;
			padding: 5px;
		
		}
		input {
			padding:5px;
		}
		select {
			padding:5px;
		}
		div#guide {
			font-weight:bold;
			background-color:#333333;
			color:white;
			padding:10px
		}
		
		span#red{
			color:red;
		}
		span#yellow{
			color:yellow;
		}
		span#green{
			color:green;
		}
	
	</style>
	<script type="text/javascript">
	var parseId;
	
	$(document).ready(function(){
		$('#logicForm').submit(function(){
				//catch id variables and run for logic
				
				var idCode =  parseId();
				
				
				var jqxhr = $.post("../update",$('#logicForm').serialize(),function(){
					
				});
			
			return false;
		});
	});
	
	parseId=function(){
		
		var identificationCode = 4; //most restrictive category
		var idArray = array();
		//HANDLE if statements to determine
		$('input:checkbox').each(function(index){
			
			if($(this).is(":checked")){
				idArray['$(this).attr('value')'] = true; 
				alert($(this).attr('value'));
			}
		});
		return identificationCode;
	}
	</script>
	
	</head>
	
	<body>
		
		<form id="logicForm" method="post">
		
		<fieldset>
		<legend>Edit the Logic</legend>
		<div id="guide">1 = <span id="red">red </span>| 2 = <span id="yellow">yellow</span> | 3 = <span id="green">green</span></div>
		<?php foreach($logic as $element):?>
			<input type="hidden" name="productId" value="<?php echo $element->ID; ?>"/>
			<p><label class="field" for="begin">What is the minimum balance to open an account?</label><br /> 
			<select name="begin" autofocus="true">
			  <option <?php if($element->begin=="1"){echo "selected";} ?> value="1">None to start</option>
			  <option <?php if($element->begin=="2"){echo "selected";} ?> value="2">$1 to $25</option>
			  <option <?php if($element->begin=="3"){echo "selected";} ?> value="3">$26 to $50</option>
			  <option <?php if($element->begin=="4"){echo "selected";} ?> value="4">$51 to $99</option>
			  <option <?php if($element->begin=="5"){echo "selected";} ?> value="5">$100 or more</option>   
			</select></p>
			
			<p><label class="field" for="maintain">What is the minimum amount that needs to be maintained?</label><br />  
			
			<input type="text" name="maintain" value="<?php echo $element->maintain;?>" /></p>
			
			<p><label class="field" for="bounce">Does this product have overdraft fees?</label><br />  <input type="text" name="bounce" value="<?php echo $element->bounce;?>" /></p>
			
			<p><label class="field" for="id">What type(s) of identification does this account require? (Select all that apply) </label><br />	SSN: <input name="chxSSN" type="checkbox" value="true"/> 	ITIN: <input name="chxITIN" type="checkbox" value="true"/>
																	Gov't ID: <input name="chxGov" type="checkbox" value="true"/> Foreign Gov't ID: <input name="chxForeignGov" type="checkbox" value="true"/>
																	Other ID: <input name="chxOther" type="checkbox" value="true"/></p>
			
			<p><label class="field" for="dd">Does this account have good value for direct depositing?</label><br />  <input type="text" name="dd" value="<?php echo $element->dd;?>"/></p>
		
			<p><label class="field" for="internet">Does this account have good value if you use internet banking?</label> <br /> <input type="text" name="internet" value="<?php echo $element->internet;?>"/></p>
		
			<p><label class="field" for="transfer">Does this account have good value for transfering money</label><br />  <input type="text" name="transfer" value="<?php echo $element->transfer;?>"/></p>
		
			<p><label class="field" for="legal">Can you open an account if you have had legal problems?</label><br />  <input type="text" name="legal" value="<?php echo $element->legal;?>"/></p>
		
			<p><label class="field" for="chex">Can you open an account if you have a chex system history?</label><br />  <input type="text" name="chex" value="<?php echo $element->chex;?>"/></p>
		
			<p><label class="field" for="Q7A">What is the maintanance fee?</label><br />  <input type="text" name="Q7A" value="<?php echo $element->Q7A;?>"/></p>
		<?php endforeach; ?>
		
		
		<input type="submit"/>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		</fieldset>
		
		</form>
	</body>

</html>