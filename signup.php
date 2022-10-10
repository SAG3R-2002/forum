<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
        *{
            font-family: Bahnschrift;
        }

        body{
            background-image: url("img/achtergrond.jpg");

        }


        #text{

            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 95%;
        }

        #button{

            padding: 10px;
            width: 100px;
            color: white;
            background-color: #aaaaaa;
            border: none;
            margin: 0 32% 0 32%;
        }

        #button:hover{

            padding: 10px;
            width: 100px;
            color: white;
            background-color: #c2c2c2;
            border: none;
            cursor: pointer;
            margin: 0 32% 0 32%;
        }

        #box{
            border-radius: 20px;
            border-style: outset;
            background-color: #1f1f1f;
            margin: 10% 40% 10% 40%;
            width: 300px;
            padding: 20px;
        }
        #login{
            text-decoration: none;
            color: white;
            margin: 0 32% 0 32%;
        }

        #login:hover{
            text-decoration: none;
            color: #c2c2c2;
            margin: 0 32% 0 32%;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 20px 38% 20px 38%;color: white;">SIGNUP</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a id="login" href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>