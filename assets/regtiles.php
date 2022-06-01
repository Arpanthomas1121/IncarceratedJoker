<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CyberV</title>
        <link rel="stylesheet" href="tilesCss.css">
    </head>
    <?php
    include "connection.php";
    session_start(); 
    if(isset($_GET))
    {
        $id=$_GET["id"];
    }
    else{
        echo 'fcuked up life!! fcukedup website!!';
        echo 'No issues register again!!';
        header("Location: register.php");
    }

    ?>  
    <body>
       <form method="POST" action="">
       <div class="container">
            <button class="option" name="subject" type="submit" value="1"></button>
            <button class="option" name="subject" type="submit" value="2"></button>
            <button class="option" name="subject" type="submit" value="3"></button>
            <button class="option" name="subject" type="submit" value="4"></button>      
        </div>
       </form>
       <?php
       if(isset($_POST['subject'])){
        $icaj = $_POST['subject'];

        echo $icaj;
        echo $id;
         $query = mysqli_query($connection, "UPDATE `sensdata` SET `icaj`=$icaj WHERE `username`='$id';") or die("Query Unsuccessfull:" . mysqli_error($connection));
        if (!$query_run) {
            header("Location:login.php");
        
        } else {
            header("Location: register.php");
            session_destroy();
         }
       }
?>
    </body>
</html>