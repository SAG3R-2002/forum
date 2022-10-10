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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
	#signup{
		text-decoration: none;
        color: white;
        margin: 0 32% 0 32%;
	}

    #signup:hover{
        text-decoration: none;
        color: #c2c2c2;
        margin: 0 32% 0 32%;
    }

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 20px 40% 20px 40%;color: white;">LOGIN</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a id="signup" href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>