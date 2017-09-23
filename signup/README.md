# Basic Signup using PHP and MySQL

### Getting Started

We will use the database from the basic login. Just like the first tutorial. Create a folder in the htdocs.
Folder name: signup
Files: index.php and signup.php

In the index.php, create a form.

```
<!DOCTYPE html>
<html>
<head>
	<title>Signup using PHP and MySql</title>
</head>
<body>
	<form method="post" action="signup.php"> 
		<input type="text" name="txtuname" />
		<input type="password" name="txtpword">
		<input type="submit" name="signup" value="Signup">
	</form>
</body>
</html>
```
The method is "post" and the action is "signup.php".

In the signup.php, put the following codes

```
<?php	
	if(isset($_POST["signup"])){

		// create a connection, just like in basic login
		$con = new PDO("mysql:host=localhost; dbname=db_users;","root","");

		// INSERT INTO is ansql command to add new record to the databse
		$sql="INSERT INTO uuser VALUES('". $_POST["txtuname"] ."', '". $_POST["txtpword"] ."')";
		$con->query($sql); //the command will be executed and a new record will be added to the databse
		echo "New Record Saved!";
	}

?>
```

For saving record in a database, use the sql command 'INSERT INTO'. The syntax is

```
	INSERT INTO table_name VALUES('value1', 'value2' ...)
```

So in my program it looks like this

```
$sql="INSERT INTO uuser VALUES('". $_POST["txtuname"] ."', '". $_POST["txtpword"] ."')";
```

The program will only out 'New Record Saved!'. But you can check the database coz the record is saved. You can combine this sign up program to the basic to create a simple program.



