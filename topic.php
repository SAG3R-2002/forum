<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>My website</title>
    </head>
    <body>
    <style type="text/css">

        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            scroll-behavior: smooth;
            font-family: Bahnschrift;
            color: white;

        }

        body{
            background-image: url("img/achtergrond.jpg");
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }


        .active {
            background-color: #aaaaaa;
        }

        .active:hover {
            background-color: #c2c2c2;
        }

        .size {
            margin: 0 200px 0 200px;
        }

        .buttonstyletopic {
            background-color: #aaaaaa;
            border: none;
            color: white;
            padding: 15px 32px;
            transition-duration: 0.4s;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .buttonstyletopic:hover {
            background-color: #bfbfbf;
            cursor: pointer;
            color: white;
        }







    </style>
    </head>
    <body>

    <ul>
        <li><a href="index.php"><?php echo $user_data['user_name']; ?></a></li>
        <li style="float:right"><a class="active" href="logout.php">Logout</li>
    </ul>

    <center class="size">
        <br />
        <a id="" href="post.php"><button class="buttonstyletopic">Post topic</button></a>
        <br />
        <br />
        <?php
            if ($_GET["id"]){
                $check = mysqli_query($con, "SELECT * FROM topics WHERE topic_id='".$_GET['id']."'");

                if (mysqli_num_rows($check)){
                    while ($row = mysqli_fetch_assoc($check)){
                        echo "<h1>".$row['topic_name']."</h1>";
                        echo "<h5>Date: ".$row['date']."</h5>";
                        echo "<br /><h3>".$row['topic_content']."</h3>";
                    }
                }else{
                    echo "topic not found";
                }
            }else{
                header("Location: index.php");
            }


        ?>
    </body>
    </html>
<?php


?>