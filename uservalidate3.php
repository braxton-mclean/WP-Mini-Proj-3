<!DOCTYPE html>


<html>
	<head>
		<title>
		Account Deletion 
		</title>
	</head>
<body>

<!--This is the form for the users to input their data.-->

<link rel="stylesheet" type="text/css" href="Test3.css">

<div align="center" > 
	<div class="newUser"> <h1> Account Deletion </h1> </div>
		<p id="smallSize" id="diffFont"></p>
			<div id="makeBorder">  
						
			<form method="POST" action="delete.php">
				
				
				    <p> </p> 
					<p> We are sad to see you go! </p> 
			

					<label class="lbl">UserName: </label>
					<input class="usr lg-box" type="text/css" name="username" placeholder="Username" required><br><br>
					
					<label class="lbl">Password: </label>
					<input class="usr lg-box" type="text/css" name="password" placeholder="Password" required><br><br>
					
					<label class="lbl">Retype Password for Confirmation: </label>
					<input class="usr lg-box" type="text/css" name="password_2" placeholder="Confirm Password" required><br><br>
					
					<input class="usr"  type="submit" name="submit" value="Delete Account" > <br> <br>
					<input class="usr" type="button" value="Changed your mind? Return back home" onclick="history.back()"> <br><br> <br> 
				 <!-- <button type="submit" name="submit"> Sign Up </button> -->
					
			
			
					
				</form>
				
			</div>
</div>
</body>
</html>