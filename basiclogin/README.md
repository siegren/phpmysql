# Basic Login using PHP and MySQL

### Prerequisites

You should know html and xampp (or lamp or mamp). In this tutorial I used xampp. You can download xampp [here](https://www.apachefriends.org/index.html).

### Getting Started

After you installed xampp, start the control panel and start apache and mysql. Apache is the web server which is needed to run php scripts and mysql is for the database.

##### Step 1. Create a database.

We will use phpmyadmin to create database. To create a database you can follow this [tutorial.](https://www.siteground.com/tutorials/phpmyadmin/phpmyadmin_create_database.htm)

In this program, my database name is "db_users" and the table name is "uuser". The table has only two(2) fields, uname and password. Populate your database after you're done creating it.

##### Step 2. Create the files.

After you installed the xampp, there will be a xampp folder in your drive C or which ever drive you installed the xampp.

Navigate to the xampp folder and go to the folder htdocs. Inside the "htdocs", create a folder "basiclogin". Add three(3) fildes, index.php, profile.php, and login.php.


##### Step 3. Create a form.

Open the index.php to any text editor (I prefer sublime or atom) and create a form using html.

```
<!DOCTYPE html>
<html>
<head>
	<title>Basic Login using PHP and MySql</title>
</head>
<body>
	<form method="post" action="login.php"> 
		<input type="text" name="txtuname" />
		<input type="password" name="txtpword">
		<input type="submit" name="login" value="login">
	</form>
</body>
</html>
```

If the form is submitted, the data will be send to "login.php" which is the action for the form. I used post so that the data will be hidden form the user. A form has to methods, post and get. I you use get, the data will be visible in the address bar and the password can be seen.


##### Step 4. Login

Open the login.php and put the following code:

```
<?php	
	if(isset($_POST["login"])){

		$con = new PDO("mysql:host=localhost; dbname=db_users;","root","");

		$sql="SELECT * FROM uuser WHERE uname='". $_POST["txtuname"] ."' and pword='". $_POST["txtpword"] ."'";
			$result=$con->query($sql); 
			$rows=$result->rowCount(); 
			if($rows>=1){
				header("location: profile.php");
			}else{
				echo "Invalid username and password combination";
			}

	}

?>
```

PHP code is always inside "<?php ... ?>" delimiter.

```
	if(isset($_POST["login"])){

	}
```

This function isset() will check if the button login is click. If a person tries to access login.php, the code won't be executed unless the button is clicked.

```
	$con = new PDO("mysql:host=localhost; dbname=db_users;","root","");
```

This is a connection string. I used PDO, because this is compatible to other databases. Change the host if you created the database in a different server. By default, if you are in your own computer, it's "localhost", change the dbname if you use other database name, root is the username and the last parameter is password. if you add username and password to your database, change the "root" and the password.


```
$sql="SELECT * FROM uuser WHERE uname='". $_POST["txtuname"] ."' and pword='". $_POST["txtpword"] ."'";
```

If you are familiar with sql, SELECT command is use to extract or get record from a database. If the method used in the html form is get use "$_GET["textbox name"]" and if post use "$_POST["textbox name"]". In my program is use post.

```
	$result=$con->query($sql); 
	$rows=$result->rowCount(); 
	if($rows>=1){
		header("location: profile.php");
	}else{
		echo "Invalid username and password combination";
	}
```

The "$con" is the variable where the connection to the database is passed and the "$sql" is the sql command. I executed the command using "query()" and pass the result to variable "$result". Result has rows, so we can check if there is a record in the databse by using the "rowCount()" and use the if..else statement to redirect the user to profile.php if existing or give an error message if not.

##### Step 5. Profile.

In my profile.php I just put:

```
<?php

	echo "Welcome to profile";

?>
```

or you can add more or html codes

##### Step 6. Run your program.

Go to your web browser and put "localhost/basiclogin" or localhost/yourfoldername. You need not to put "index.php" because the server will automatically look for the index filename.


### Hope you learn something. Thank you!







