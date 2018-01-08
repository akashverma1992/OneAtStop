function valid(){
	var username = document.signup.name.value;
	var pass = document.signup.password.value;
	var email = document.signup.email.value;
	var id = document.signup.identity.value;
	if(username == ''){
		alert("Enter Username");
		document.signup.name.focus();
		return false;		
	}
	if(pass == ''){
		alert("Enter Password");
		document.signup.password.focus();
		return false;		
	}
	if(email == ''){
		alert("Enter Email Address");
		document.signup.email.focus();
			return false;	
	}else{
		var atpos = email.indexOf('@');
		var dotpos = email.lastIndexOf('.');
		if( atpos < 1 || dotpos < atpos + 2 ){
			alert("Email ID Inccorrect");
			document.signup.email.focus();
			return false;	
		}	
	}
	
}