<html>
<head>
<title>Banking Product Admin</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
<link href="/css/jquery-ui.css" rel="stylesheet"/>
<?php foreach ($javascript as $script): ?>
	<script src="<?= $script ?>" type="text/javascript"></script>
<?php endforeach; ?>


<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>

	
</head>
<body>

<h1>This is the usage page</h1>
<div style="width:1000px" >
<div style="width:30%;float:left" class="ui-widget,ui-corner-all">
<h3>By User Name</h3>
<ul>
<?php foreach($usage as $item): ?>
	<li><?= $item->user." : ".$item->count?></li>
<?php endforeach; ?>
</ul>
</div>
<div style="width:65%;float:left ">
<h3>By Time Period</h3>
	<img src="http://chart.apis.google.com/chart?cht=bvg&chco=4D89F9&chs=700x300&chxt=x,y&chxl=0:|<?php echo $monthList; ?>|1:50,100,150&chd=t:<?php echo $timeList; ?>"/>
</div>
</div>

<div style="clear:both"></div>
<h3>By Question</h3>
<div id="tabs">


<ul>
	<li><h3><a href="#tab-1">Q. 1</a></h3></li>
	<li><h3><a href="#tab-2">Q. 2</a></h3></li>
	<li><h3><a href="#tab-3">Q. 3</a></h3></li>
	<li><h3><a href="#tab-4">Q. 4</a></h3></li>
	<li><h3><a href="#tab-5">Q. 5</a></h3></li>
	<li><h3><a href="#tab-6">Q. 6</a></h3></li>
	<li><h3><a href="#tab-7">Q. 7</a></h3></li>
	<li><h3><a href="#tab-8">Q. 8</a></h3></li>
	<li><h3><a href="#tab-9">Q. 9</a></h3></li>
	<li><h3><a href="#tab-10">Q. 10</a></h3></li>
	
</ul>
<div id="tab-1">
	<h3>Question 1: How much can you start with in your account?</h3>
<ul>
<?php 
	$arr=array();
	$arr1=array();
	$arr2=array();
	$arr3=array();
	$arr4=array();
	$arr5=array();
	$arr6=array();
	$arr7=array();
	$arr8=array();
	$arr9=array();
	
foreach($begin as $row)
	{
		array_push($arr,$row ->begin) ;
		array_push($arr1,$row->maintain);
		array_push($arr2,$row->ssn);
		array_push($arr3,$row->bounce);
		array_push($arr4,$row->legal);
		array_push($arr5,$row->chex);
		array_push($arr6,$row->dd);
		array_push($arr7,$row->checks);
		array_push($arr8,$row->transfer);
		array_push($arr9,$row->internet);
	} ;
	
?>
<?php foreach(array_count_values($arr) as $key=>$value):?>
<li><?= "Answer ".$key." had  ". $value." responses." ?></li>
<?php endforeach; ?>

</ul>
</div>
<div id="tab-2">
<h3>Question 2: How much can you maintain in your account?</h3>
<ul>
<?php foreach(array_count_values($arr1) as $key=>$value):?>
<li><?= "Answer $".$key." had  ". $value." responses." ?></li>
<?php endforeach; ?>

</ul>
</div>
<div id="tab-3">
<h3>Question 3: Do you find that you run out of money?</h3>
<ul>
<?php foreach(array_count_values($arr3) as $key=>$value):?>
<li><?= "Answer <b>".$key."</b> had  ". $value." responses." ?></li>
<?php endforeach; ?>

</ul>
<p>*Figure incorrect due to data processing error</p>
</div>
<div id="tab-4">
<h3>Question 4: Do you have a ssn?</h3>
<ul>
<?php foreach(array_count_values($arr2) as $key=>$value):?>

<li><?= "Answer <b>".$key."</b> had  ". $value." responses." ?></li>

<?php endforeach; ?>


</ul>
<img src="http://chart.apis.google.com/chart?cht=p&chs=400x300&chl=true|false"/>
</div>
<div id="tab-5">
<h3>Question 5: Do you have direct deposit?</h3>
<ul>
<?php foreach(array_count_values($arr6) as $key=>$value):?>

<li><?= "Answer ".$key." had  ". $value." responses." ?></li>
<?php endforeach; ?>
</ul>
<p>*Two denotes that client does not have direct deposit</p>
</div>
<div id="tab-6">
<h3>Question 6: Do you have access to the internet?</h3>
<ul>
<?php foreach(array_count_values($arr9) as $key=>$value):?>

<li><?= "Answer <b>".$key."</b> had  ". $value." responses." ?></li>
<?php endforeach; ?>

</ul>
</div>
<div id="tab-7">
<h3>Question 7: Do you remit/send money to friends?</h3>
<ul>
<?php foreach(array_count_values($arr8) as $key=>$value):?>

<li><?= "Answer <b>".$key."</b> had  ". $value." responses." ?></li>
<?php endforeach; ?>

</ul>
</div>
<div id="tab-8">
<h3>Question 8: Do you use some form of guaranteed money?</h3>
<ul>
<?php foreach(array_count_values($arr7) as $key=>$value):?>

<li><?= "Answer <b>".$key."</b> had  ". $value." responses." ?></li>
<?php endforeach; ?>

</ul>
<p>*Figure incorrect due to data processing error</p>
</div>
<div id="tab-9">
<h3>Question 9: Have you had problems with an account?</h3>
<ul>
<?php foreach(array_count_values($arr5) as $key=>$value):?>

<li><?= "Answer <b>".$key."</b> had  ". $value." responses." ?></li>
<?php endforeach; ?>

</ul>
</div>
<div id="tab-10">
<h3>Question 10: Have you been accuses of fraud by a bank?</h3>
<ul>
<?php foreach(array_count_values($arr4) as $key=>$value):?>

<li><?= "Answer <b>".$key."</b> had  ". $value." responses." ?></li>
<?php endforeach; ?>

</ul>
</div>

</div>
</div>
</body>
</html>