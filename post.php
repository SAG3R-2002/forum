
<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);



$t_name = @$_POST['topic_name'];
$content = @$_POST['con'];

if (isset($_POST['submit'])){
    if ($t_name && $content){

    }else{
        
    }
}




if(isset($_POST['topic_name'])){
    echo "<p style='color:green; background-color: #0e501b; text-align: center;'> succesfully uploaded</p> ";
    zetpostindatabase($con, $_POST['topic_name'], $_POST['content']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>postpage</title>
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
    }

    .active:hover {
        background-color: #c2c2c2;
    }




</style>
</head>
<body>

<ul>
    <li><a href="index.php"><?php echo $user_data['user_name']; ?></a></li>
    <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
</ul>

<form action="post.php" method="post">
    <center>
        <br/>
        <p style="color: white">Topic name:</p> <br/><input type="text" name="topic_name" style="width:400px;"><br/>
        <br/>
        <p style="color: white">Content:</p> <br/>
        <textarea style="resize: none; width: 400px; height: 300px;" name="content"></textarea>
        <br/>
        <input type="submit" name="submit" value="post" style="background-color: #1f1f1f;color: white;width: 400px; cursor: pointer; border-radius: inherit">
    </center>
</form>
</body>
</html>

<?php
    $t_name = @$_POST['topic_name'];
    $content = @$_POST['con'];

    if (isset($_POST['submit'])){
        if ($t_name && $content){

        }else{
            echo "nog invullen test";
        }
    }


?>