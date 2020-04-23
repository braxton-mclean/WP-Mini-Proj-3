<!DOCTYPE html>
<html>
<body>

<?php include "validateConfirm.php"; ?>

<link rel="stylesheet" type="text/css" href="Test.css">

<div align="center" > 
	<div class="newUser"> <h1>New User Log In: </h1> </div>
		<p id="smallSize" id="diffFont"></p>
			<div id="makeBorder">  
						
			<form method="POST" action="insertThis.php">
				
					<p> Fill in the information below. </p> 

					<label <?php echo ($vfname) ? "class='lbl'" : "class='lbl-red'" ?> >UserName: </label>
					<input class="usr lg-box" type="text/css" name="firstname" placeholder="First Name" required><br><br>
					
					<label <?php echo ($vpassword) ? "class='lbl'" : "class='lbl-red'" ?> >Password: </label>
					<input class="usr lg-box" type="text/css" name="password" placeholder="Password" required><br><br>
					
				
					<input class="usr"  type="submit" name="submit" value="Add to Database" > <br> <br> <br> 
					</a>
			
					
				</form>
				
			</div>
</div>



</body>
</html>