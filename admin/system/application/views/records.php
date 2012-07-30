<html>
<head>
	<title>Banking Products</title>
</head>




<body>
	<h1>Welcome to Banking Menu Admin Panel</h1>
	<table id="controlPanel">
		<?php foreach($institutions as $data):?>
			<tr><td><a href="attributes/<?php echo $data->ID; ?>">Edit Attributes</a> | <a href="logic/<?php echo $data->ID; ?>">Edit Logic</a></td><td><?php echo $data->F1; ?></td><td><?php echo $data->F3; ?></td></tr>
		<?php endforeach; ?>
	</table>
</body>

</html>