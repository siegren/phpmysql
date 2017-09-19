<?php	
	if(isset($_POST["signup"])){

		// create a connection
		$con = new PDO("mysql:host=localhost; dbname=db_users;","root","");

		// INSERT INTO is ansql command to add new record to the databse
		$sql="INSERT INTO uuser VALUES('". $_POST["txtuname"] ."', '". $_POST["txtpword"] ."')";
		$con->query($sql); //the command will be executed and a new record will be added to the databse
		echo "New Record Saved!";
	}

?>