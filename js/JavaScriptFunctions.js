function checkMail(){
	var email = document.getElementById("UserEmail").value;
	if(email) {
		$.ajax({
			type:"post",
			url:"../php/classes/checkData.php",
			data:{
				userEmail:email,
			},
			success: function(response){
				$('#email_status').html(response);
				if(response == "OK"){
					return true;
				}else{
					return false;
				}
			}
		});
	}else{
		$("#email_status").html("");
		return false;
	}
}

function checkProduct(){
	var product = document.getElementById("");
}

function checkAll(){
	var emailHtml = document.getElementById("email_status").innerHTML;
	if(emailHtml == "OK")
		return true;
	else
		return false;
}