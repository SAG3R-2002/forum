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
            transition-duration: 0.4s;
        }

        .active:hover {
            background-color: #2c2c2c;
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

        table {
            border: 3px solid;
            border-color: #aaaaaa;
            border-bottom: 3px solid #ddd;
            border-bottom-color: #aaaaaa;
            color: white;

        }

        .topichref {
            text-decoration: none;
            transition-duration: 0.4s;
            color: #a2a2a2;
        }

        .topichref:hover{
            cursor: pointer;
            color: white;
        }

        tr:hover {background-color: rgba(90,90,90,0.15)}









    </style>
    </head>
    <body>

    <ul>
        <li><a href=""><?php echo $user_data['user_name']; ?></a></li>
        <li style="float:right"><a class="active" href="logout.php">Logout</li>
    </ul>

    <center class="size">
        <br />
        <a href="post.php"><button class="buttonstyletopic">Post topic</button></a>
        <br />
        <br />
        <?php echo '<table>' ?>
         <tr class="color">
             <td>
                <span>ID</span>
             </td>
             <td width="400px" style="text-align: center";>
                Name
             </td>
             <td width="400px" style="text-align: center";>
                 Views
             </td>
             <td width="400px" style="text-align: center";>
                 Date
             </td>
         </tr>
    </center>
    </body>
</html>
<?php
    $check = mysqli_query($con, "SELECT * FROM topics");

    if (mysqli_num_rows($check) != 0){
        while ($row = mysqli_fetch_assoc($check)){
            @$id = $row['topic_id'];
            echo "<tr>";
            echo "<td>".$row['topic_id']."</td>";
            echo "<td style = 'text-align: center;'><a class='topichref' href='topic.php?id=$id'> ".$row['topic_name']."</a></td>";
            echo "<td style = 'text-align: center;'>".$row['views']."</td>";

            echo "<td style = 'text-align: center;'>".$row['date']."</td>";
            echo "</tr>";

        }
    }else{
        echo "no topics found";
    }
    echo "<tr><td></td></tr>";
    echo "</table>";
    if (@$_GET ['action'] == "logout"){
        session_destroy();
        header("location: login.php");
    }

?>