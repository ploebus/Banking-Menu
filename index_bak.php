<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Alameda County CAN</title>
<?php
include("head.html");
?> 
		<script type="text/javascript" src="../js/jquery.js" />
		<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
		<script src="../accan2008.js"></script>
		<script type="text/javascript">
			_uacct = "UA-697750-4";
			urchinTracker();
		</script>
		<link type="text/css" rel="stylesheet" href="FpStyles.css">
<script type="text/javascript">
		$(document).ready(function() {
			$("#login_form").submit(function() {
				var unameval = $("#username").val();
				var pwordval = $("#password").val();
				
			$.post("backend.php", { username: unameval, 
				password: pwordval }, 
				function(data) {
					$("p#status").html(data);
				});
				return false;
			});
		});
</script>
	<script type="text/javascript">
		$(document).ready(function() {
			
			$("#FIlist").toggle(
		function(){
			$("#droplist1").fadeIn("slow");
			
		},
		function(){
		$("#droplist1").fadeOut("slow");
		}	
		);	
		});
	</script>

	<style type="text/css">
<!--
.style2 {
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
}

-->
    </style>
	</head>
	<body>
		<div id="container">
          <div align="left">
            <p style="margin-top: 0; margin-bottom: 0;">
              <?php
include("headernavTEMP.html");
?>
<div id="IntroContent">
<p><h2 style="margin-bottom: 0;"> Welcome to AC CAN's Online Banking Menu!</h2>
<p style="margin-top: 0;">This is a tool developed by AC CAN member organizations to help service providers connect their clients with the &quot;best fit&quot; financial product for that person's particular needs and preferences.   Our assessment is based on consumer research and feedback from providers and clients on the needs and experiences of low-income people in the financial system. </p>
<ul style="margin-bottom: 0;">
  <li class="style2">Answer the questions about financial product needs and preferences to help find a "best fit" product</li>
  <li class="style2">Find detailed information about product features and fees</li>
</ul>
<p><h3>Watch a How-to Demo</h3>
</p>
<div id="TrainingVideo">
	<h1 style="margin-bottom: 0">Training video</h1>
</div>

	<br/>
<br />
<br/>
<p style="clear:both;">&nbsp; </p>
<p style="clear:both;">&nbsp;</p>
<p style="clear:both;">&nbsp;</p>
</div>
<div id="RightColumn">
<img src='../images/bankmenu.png'/>

<div id="FpLoginForm">

	
	<p id="status" style="margin-bottom: 0">&nbsp;</p>
	<form method="post" id="login_form" style="margin-top: 0; margin-bottom: 0;">
		<p style="margin-top: 0;">Username: <input type="text" id="username" /></p>
		<p>Password:&nbsp <input type="password" id="password" /></p>
		<p style="margin-bottom: 0;"><input type="submit" value="Login" /></p>
	</form>
	
</div>
<p>Email Lisa Forti lisaf(at)urbanstrategies.org to join AC CAN or get a subscription* to the Banking Menu. </p>
<p style="margin-bottom: 0;">*For subscriptions, we accept payment via check made out to Urban Strategies Council with &quot;Banking Menu Subscription&quot; in the memo field. Payment must be received at 672 13th Street, Oakland CA 94612 before a password is administered.<br />
</p>
<div id="RightContent">
<h3>Information about the  Banking Menu</h3>
<br/>
<li id="FIlist">Click to See Financial Institutions</li>
	
		<?php include('droplist1.php'); ?>
	
<li><a href="documents/BankingMenuFAQJune2009.pdf" target="blank">Banking Menu FAQs</a></li>
<li><a href="http://www.alamedacountycan.org/about.shtml" target="blank">AC CAN Mission and Goals</a></li>
<p style="margin-bottom: 0">Have a product that isn't included here or have comments about how a product is presented? Email Lisa Forti
lisaf(at)urbanstrategies.org to find out how to include your product in the Banking Menu.&nbsp; </p>
</div>
<?php
include("footer.shtml");
?> 		
	</div>
</body>
</html>
