<html>
	<head>
	</head>
	
	<body>
		
		<form>
		<?php foreach($logic as $element):?>
			What is the minimum balance to open an account? 
															<select name="begin">
															  <option <?php if($element->begin=="1"){echo "selected";} ?> value="1">	None to start</option>
															  <option <?php if($element->begin=="2"){echo "selected";} ?> value="2">	$1 to $25</option>
															  <option <?php if($element->begin=="3"){echo "selected";} ?> value="3">	$26 to $50</option>
															  <option <?php if($element->begin=="4"){echo "selected";} ?> value="4">	$51 to $99</option>
															  <option <?php if($element->begin=="5"){echo "selected";} ?> value="5">	$100 or more</option>   
															</select>
			<br/>
			What is the minimum amount that needs to be maintiained? <input type="text" name="maintain" value="<?php echo $element->maintain; ?>" 
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<?php endforeach; ?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		</form>
	</body>

</html>