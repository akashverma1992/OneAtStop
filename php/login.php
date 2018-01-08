<html>
<head>
    <?php require_once ("./headfiles/head.php");?>
</head>
<body>
    <form action='./classes/LoginProcess.php' method='post' name='login' role='form' style="margin-top:100px;">
        <div class="form-group" id="mydiv">
        	<table class='table-condensed'>
        		<tr>
        			<td>Username</td>
        			<td ><input type='text' name='username' 
        			value="<?php echo isset($_COOKIE["un"])?$_COOKIE["un"]:""; ?>" class="form-control" required></td>
        		</tr>
        		<tr>
        			<td>Password</td>
        			<td><input type='password' name='password' value="" class="form-control" required></td>
        		</tr>	
        		<tr>			
        			<td><input type='checkbox' name='remember' value='ok' checked> <label>Remember password/username</label></td>		
        			<td><input type='submit' id='button' name='submit' value="Login" class='btn btn-info btn-block'></td>
        		</tr>	
        		<tr>
        			<td><a href="./htmlPages/ForgotPassword.html">Forgot password?</a></td>
        		</tr>
        	</table>	
        </div>
    </form>
<style>
    body {
	    background: #eee !important;	
    }
    #mydiv{
        height: 170px;
        margin-left: 35%;
        margin-right: 40%;
        border: 1px solid #FFFFFF;
        border-radius: 10px;
        background: #FFFFFF;
    }
</style>
</body>
</html>
<!-- http://localhost/PHP/oneatstop/php/login.php -->