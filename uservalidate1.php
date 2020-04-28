<!DOCTYPE html>

<?php include 'functionstuff.php';?>
<html>
	<head>
		<title>
		Returning User Form
		</title>
	</head>
<body>

<!--This is the form for the users to input their data.-->

<link rel="stylesheet" type="text/css" href="Test2.css">

<div align="center" > 
	<div class="newUser"> <h1>Welcome Back ! </h1> </div>
		<p id="smallSize" id="diffFont"></p>
			<div id="makeBorder">  
						
			<form method="POST" action="loggedin.php">
				
				
				    <p> </p> 
					<p> Please Enter your credentials.</p> 
			

					<label class="lbl">UserName: </label>
					<input class="usr lg-box" type="text/css" name="username" placeholder="Username" required><br><br>
					
					<label class="lbl">Password: </label>
					<input class="usr lg-box" type="text/css" name="password" placeholder="Password" required><br><br>
					
					<label class="lbl">Retype Password for Confirmation: </label>
					<input class="usr lg-box" type="text/css" name="password_2" placeholder="Confirm Password" required><br><br>
					
					<input class="usr"  type="submit" name="submit" value="Log In" > <br> <br>
					<input class="usr" type="button" value="Go Back" onclick="history.back()"> <br><br> <br> 
				 <!-- <button type="submit" name="submit"> Sign Up </button> -->
					
			
			
					
				</form>
				
			</div>
</div>
</body>
</html>