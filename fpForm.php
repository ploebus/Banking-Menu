<?php
		require("../php/db_login.php");
		session_start();
		
		if($_SESSION['sid'] != session_id())
		{
		header('Location:http://alamedacountycan.org/FinancialProductsv2/index.php');
		}
		else{
				include("./behavior/FpPHP.php");
				recordUser($_SESSION['sid'],$_SESSION['user']);
			}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
		<head>
				<?php
						include("head.html");
				?>
				
				
			
				<script language="javascript" src="../js/jquery.simpletip-1.3.1.js"></script> 	
				<link type="text/css" href="../css/validationEngine.jquery.css" rel="stylesheet" media="screen">
				<script language="javascript" src="../js/jquery.validationEngine.js"></script>
				<script src="../accan2008.js"></script>
				<script language="javascript" src="../js/superfish.js" charset="utf-8"> </script>
				<link type="text/css" rel="stylesheet" href="../css/superfish.css">
				
		
				<script language="javascript">
				jQuery(function() {
							
							jQuery("#FIlist").click(
								function(){
										jQuery("#droplist").slideToggle("slow");
								});
							jQuery(".coach b").click(
								function(){
									jQuery(".coach>div").toggle();
								}
							);
					
						})
				</script>
				<script language="javascript">
				jQuery(function() {
					jQuery('img[src *= "Tip"]').click(function(e){
					var id=jQuery(this).attr('alt');
					jQuery('#tooltip').load("tooltip.php?tip="+id).css({"position":"absolute","left":e.pageX,"top":e.pageY,"z-index":"3"}).fadeIn("medium");	
					id="";
					});
					});
						
						
				</script>
				<script language="javascript">
						jQuery(function() {
								jQuery('#tooltip').click(function(){
								jQuery(this).fadeOut("medium")});
								jQuery('ul.sf-menu').superfish();
						})
				</script>
				<script language="javascript">
						_uacct = "UA-697750-4";
						urchinTracker();
				</script>
				
				
		</head>
		<body>
				<div class="container">
				     <?php include("FPheadernav.html");	?>
						<div id="tooltip">
								
						</div>			
		
						<div class="leftColumn">
								<div class="leftContent">
										<div id="droplist">
												<b>Select from below to view product details</b>
												<hr />
												<ul>
														<?php include('droplist.php'); ?>
												</ul>
										</div>
								</div>
						</div>
		
						<div class="midContent">
								<p><b>Make sure to answer each question. If you miss one, the computer will prompt you to enter missing data.</b><br />
								Questions with an * symbol eliminate institutions from results list</p>
								<div class="coach"><b style="color:green"> To see Coach's script, CLICK HERE:</b>
										<div style="display:none">We can help most people find a bank account or similar financial product that works for them. The purpose of these questions is to help you find the 'best-fit' product for you. So it doesn't matter if:
												<ul>
													<li>you are new to banking and have never had a bank account</li>
													<li>you have had a bank account and had problems with it</li>
													<li>have a bank account but just aren't happy with its cost or service.</li>
												</ul>
												<img alt="11" style="float:right;margin-right:20px;" src="../images/Tip.png" id="tip" />
									
												<br />
										So let's talk about your situation and what you need from a bank account.
										</div>
								</div>	
								<form method="post" class="FpForm" onsubmit="validate();" id="FpForm" name="FpForm" action="FpResults1.php" >
										<div class="formsection">		
												<Label for "begin">1. How much money do you have available to open an account? *<img alt="1" style="float:right" src="../images/Tip.png" id="tip" /></Label>
											      
												<select name="begin">
													      <option <?php if($_SESSION['begin']=="1"){echo "selected";} ?> value="1">	None to start</option>
													      <option <?php if($_SESSION['begin']=="2"){echo "selected";} ?> value="2">	$1 to $25</option>
													      <option <?php if($_SESSION['begin']=="3"){echo "selected";} ?> value="3">	$26 to $50</option>
													      <option <?php if($_SESSION['begin']=="4"){echo "selected";} ?> value="4">	$51 to $99</option>
													      <option <?php if($_SESSION['begin']=="5"){echo "selected";} ?> value="5">	$100 or more</option>   
												</select>
										</div>			    
										<div class="formsection">		
												<Label for "Mincheck">2. How much money would you regularly keep in this account?<img alt="2" style="float:right;" src="../images/Tip.png" id="tip" /></Label>
												<input <?php if(ISSET($_SESSION['maintain'])){echo "value='".$_SESSION['maintain']."'";} ?>type="textbox" class="validate[required]" name="maintain" />
									
										</div>
										<div class="formsection">
											<Label for "bounce">3. Do you find yourself running short at the end of your pay period? Are you concerned about possibly being charged a bounced check fee? *<img alt="3" style="float:right" src="../images/Tip.png" id="tip" /></label>
											<span class="buttongroup" id="bounce">
												<input id="radio1" <?php if($_SESSION['bounce']=="True"){echo "checked";} ?> name="bounce" class="validate[required]" type="radio" value="True" />
													<label for "radio1">Yes</label>
												<input id="radio2" <?php if($_SESSION['bounce']=="False"){echo "checked";} ?>  name="bounce" class="validate[required]" type="radio" value="False" />
													<label for "radio2">No</label>	 			
											</span>			
										</div>	   
			    
										<div class="formsection">
											<Label for "ssn"> 4. What form of identification do you have? (Select <em>ALL</em> that apply) *.
												<img alt="4" style="float:right" src="../images/Tip.png" id="tip" /> </label>
											<div  class="checkbox" id="ssn">
												<input id="check" <?php if($_SESSION['ssn'][0]=="true"){echo "checked";} ?> name="ssn[0]" type="checkbox" value="true" />
													<span style="font-size:90%">SSN/ITIN </span><br/>
												<input id="check" <?php if($_SESSION['ssn'][1]=="true"){echo "checked";} ?> name="ssn[1]" type="checkbox" value="true" />
													<span style="font-size:90%">Unexpired US Government ID w/ Picture</span><br />
												<input id="check" <?php if($_SESSION['ssn'][2]=="true"){echo "checked";} ?> name="ssn[2]" type="checkbox" value="true" />
													<span style="font-size:90%">Unexpired Foreign Government ID w/ Picture</span><br />
												<input id="check" <?php if($_SESSION['ssn'][3]=="not null"){echo "checked";} ?> name="ssn[3]" type="checkbox" value="not null"/>
													<span style="font-size:90%">An Additional ID with Address</span>
											</div>			
										</div>	  
				   
					  
										<div class="formsection">
											<Label for "dd">5. Can you have your income directly deposited into a banking account?<img alt="5" style="float:right" src="../images/Tip.png" id="tip" /></label>
											<div class="buttongroup" id="dd">
												<input id="radio1" <?php if($_SESSION['dd']=="1"){echo "checked";} ?> class="validate[required]" name="dd" type="radio" value="1"/>
													<label for "radio1">Yes</label>
												<input id="radio2" <?php if($_SESSION['dd']=="2"){echo "checked";} ?> class="validate[required]" name="dd" type="radio" value="2"/>
													<label for "radio2">No</label>	 			
											</div>			
										</div>	 
			 
										<div class="formsection">
											<Label for "intranet">6. Do you have access to a computer and the internet to manage your account?<img alt="6" style="float:right" src="../images/Tip.png" id="tip" /></label>
											<div class="buttongroup" id="intranet">
												<input id="radio1" <?php if($_SESSION['intranet']=="true"){echo "checked";} ?> class="validate[required]" name="intranet" type="radio" value="true" />
													<label for "radio1">Yes</label>
												<input id="radio2" <?php if($_SESSION['intranet']=="false"){echo "checked";} ?> class="validate[required]" name="intranet" type="radio" value="false" />
													<label for "radio2">No</label>	 			
											</div>			
										</div>	
				
			
		    
										<div class="formsection">
											<Label for "transfer">7. Do you remit/send money to family and friends? Where? Or do you travel internationally?<img alt="7" style="float:right" src="../images/Tip.png" id="tip" /></label>
											<div class="buttongroup" id="transfer">
												<input id="radio1" <?php if($_SESSION['transfer']=="true"){echo "checked";} ?> class="validate[required]" name="transfer" type="radio" value="true" />
													<label for "radio1">Yes</label>
												<input id="radio2" <?php if($_SESSION['transfer']=="false"){echo "checked";} ?> class="validate[required]" name="transfer" type="radio" value="false" />
													<label for "radio2">No</label>	 			
											</div>			
										</div>	 
					
										<div class="formsection">
											<Label for "bills">8a. How do you currently pay your bills?</label>
												<input type="text" <?php if(isset($_SESSION['bills'])){echo "value='".$_SESSION['bills']."'";} ?> style="width:300px;border:none;border-bottom:solid thin black" name="bills"/>
											
											<Label for "checks">8b. Do you need to use cashiers checks, money orders, or certified checks for payments because a personal check would not be accepted?<img alt="8" style="float:right" src="../images/Tip.png" id="tip" /></label>
												<div class="buttongroup" id="intranet">
													<input id="radio1" <?php if($_SESSION['checks']=="true"){echo "checked";} ?> class="validate[required]" name="checks" type="radio" value="true" />
													<label for "radio1">Yes</label>
													<input id="radio2" <?php if($_SESSION['checks']=="false"){echo "checked";} ?> class="validate[required]" name="checks" type="radio" value="false" />
													<label for "radio2">No</label>	 			
												</div>	
										</div>
					
										<div class="coach" style="font-size:small;font-style:italic;margin:10px 0 10px 0;">
											Now we have a few hard questions but it is important that we understand what challenges you may have in opening and managing a bank account. Everything you tell me is private, just between you and me. I want to help you get into a bank product that will help you increase your financial security.
										</div>
			
					
										<div class="formsection">
												<Label for "chex">9. Have you had problems with credit history, been previously denied an account, had an account closed by a bank, or been on ChexSystem within the last two years? *<img alt="9" style="float:right" src="../images/Tip.png" id="tip" /></label>
												<div class="buttongroup" id="chex">
														<input id="radio1" <?php if($_SESSION['chex']=="true"){echo "checked";} ?> class="validate[required]" name="chex" type="radio" value="true" />
														<label for "radio1">Yes</label>
														<input id="radio2" <?php if($_SESSION['chex']=="false"){echo "checked";} ?> class="validate[required]" name="chex" type="radio" value="false" />
														<label for "radio2">No</label>	 			
												</div>			
										</div>
										<div class="formsection">
												<Label for "legal">10. Has a bank ever accused you of fraud?*
												<img alt="10" style="float:right" src="../images/Tip.png" id="tip" /></label>
												<div class="buttongroup" id="legal">
														<input id="radio1" <?php if($_SESSION['legal']=="true"){echo "checked";} ?> class="validate[required]" name="legal" type="radio" value="true" />
															<label for "radio1">Yes</label>
														<input id="radio2" <?php if($_SESSION['legal']=="false"){echo "checked";} ?> class="validate[required]" name="legal" type="radio" value="false" />
															<label for "radio2">No</label>	 			
												</div>			
										</div>
										<div>
												<input type="image" value="Submit Form" src="../images/submit_button.png" />
										</div>
								</form>  
						</div>
						<div style="clear:both;width:90%;margin:auto">
								<?php
									include("../footer.php");
								?>
						</div>
		
						<br style="clear:both" />
				</div>
		</body>
</html>