<!DOCTYPE html>
<html>
<body>

<link rel="stylesheet" type="text/css" href="Test.css">

<?php


  $firstname = $_POST["firstname"]; //look at the firstname and password values
  $password =$_POST["password"];

// the ones im using
$vfname = isValidName($firstname);
$vpassword = isValidName($password);


function isValidName($firstname){
	if ($firstname==""){
		return true;
	}else{
		if (!preg_match("/^[a-zA-Z ]*$/",$firstname)){
			return false;
		}else{
			return true;
		}
	}
}

$servername = "localhost"; 
$username = "mpalad1"; 	   
$password = "mpalad1";     
$dbname = "mpalad1";       
//Comment: The professor told us to use this code. It makes a connection variable called "conn". It passes the arguments. 
$conn = new mysqli($servername, $username, $password, $dbname);
//Comment: This checks the connection. If it fails, it will echo the fail result, otherwise it was successful. 
if ($conn->connect_error) {
    echo "Connection failed.";
}
echo "Connection Successful";


$sqlcommand = "INSERT INTO Userdata (UserID, Username,Password,CurrentCardBack, CardBackP1, CardBackP2,CardBackP3, CardBackP4, CardBackP5,
CardBackP6, CardBackP7, CardBackP8,LatestGameScore,Money,UserShortName) VALUES
('3', '$firstname', '$password', '0','0','0','0','0','0','0','0','0','10','10.00','$firstname')";


//if query is succesful -using object orientated over procedural.  
if ($conn->query($sqlcommand) === TRUE ) {
	echo "Sucessful addition. You are now registered!"
	}
	echo "Failed. Please try again";
}


$conn->close();


?> 

</body>
</html>
