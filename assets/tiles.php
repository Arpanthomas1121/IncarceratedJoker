<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CyberV</title>
        <link rel="stylesheet" href="tilesCss.css">
    </head>
    <body>
           <?php
        session_start();
        $id=$_GET['id'];
        ?>
       <form method="POST" action="tiles.php">
       <div class="container">
            <button class="option" name="subject" type="submit" value="1"></button>
            <button class="option" name="subject" type="submit" value="2"></button>
            <button class="option" name="subject" type="submit" value="3"></button>
            <button class="option" name="subject" type="submit" value="4"></button>      
        </div>
       </form>

       <?php
       if(isset($_POST['subject']))
       {
        $icaj = $_POST['subject'];
        $sql = "SELECT *  FROM `sensdata` WHERE `icaj` = $icaj AND Email=$id" or die("Query Unsuccessfull:" . mysqli_error($connection));
        if ($query_run) {
            header("Location: realIndex.php?id=".$_SESSION["id"]);
        } else {
            header("Location: fake.php?id=".$_SESSION["id"]);
            session_destroy();
         }
       }

?>
    </body>
</html>
