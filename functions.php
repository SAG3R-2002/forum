<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}



//topics
function zetpostindatabase ($con, $topicnaam, $content){
    $date = date("y-m-d");
    $query = "INSERT INTO topics(`topic_name`, `topic_content`, `topic_creator`, `date` ) VALUES ('$topicnaam', '$content', '".$_SESSION['user_id']."', '".$date."')";
    mysqli_query($con,$query);
}




