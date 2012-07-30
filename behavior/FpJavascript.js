
		
function validate(){
	
       var form=window.document.FpForm;
				
		if (form.maintain.value==""){
		alert('Please select a minimum balance');
		return false;
		}
				
		else if ((form.bounce[0].checked==false) && (form.bounce[1].checked==false)){
		alert('Please select an option for need to avoid bounced checks');
		return false;
		}
		else if((form.ssn[1].checked==false) && ( form.ssn[2].checked==false) && ( form.ssn[2]=false)){
		alert('Please select a type of id that the client has');
			return false;
		}
		else if((form.dd[0].checked==false) && ( form.dd[1].checked==false)){
		alert('Please select an option for direct deposit');
			return false;
		}
		else if ((form.intranet[0].checked==false) && ( form.intranet[1].checked==false)){
		alert('Please select whether the client has access to internet');
			return false;
		}
		else if ((form.transfer[0].checked==false) && ( form.transfer[1].checked==false)){
		alert('Please select whether the client uses wire transfers');
			return false;
		}
		else if ((form.checks[0].checked==false) && ( form.checks[1].checked==false)){
		alert('Please select whether the client needs to use some form of guaranteed money');
			return false;
		}
		else if((form.legal[0].checked==false) && ( form.legal[1].checked==false)){
		alert('Please select whether the client has some legal barriers to opening an account');
			return false;
		}
		
		else if((form.chex[0].checked==false) && ( form.chex[1].checked==false)){
		alert('Please select whether the client has some chex history barriers');
			return false;
		}

		else{
		return true;}
		}
	



		
$(document).ready(function() {
			
			$("#FIlist").click(
		function(){
			$("#droplist").slideToggle("slow");
			
		});
		})
$(document).ready(function() {
			
			$("li #BankList").click(
		function(){
			$("#ProductList").slideToggle("slow");
			
		});
		});
		

		