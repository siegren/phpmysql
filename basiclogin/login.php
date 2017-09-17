<?php	
	if(isset($_POST["login"])){

		// create a connection
		$con = new PDO("mysql:host=localhost; dbname=db_users;","root","");

		// this is sql command
		$sql="SELECT * FROM uuser WHERE uname='". $_POST["txtuname"] ."' and pword='". $_POST["txtpword"] ."'";
			$result=$con->query($sql); //the command will be executed and the result will be passed to the variable result
			$rows=$result->rowCount(); // get the rowcount and pass to variable rows.
			if($rows>=1){
				header("location: profile.php");
			}else{
				echo "Invalid username and password combination";
			}

	}

?>