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
    include "connection.php";
    session_start();
    if (isset($_GET)) {
        $id = $_GET["id"];
    } else {
        echo 'fcuked up life!! fcukedup website!!';
        echo 'No issues register again!!';
        header("Location: login.php");
    }

    ?>
    <form method="POST" action="">
        <div class="container">
            <button class="option" name="subject" type="submit" value="1"></button>
            <button class="option" name="subject" type="submit" value="2"></button>
            <button class="option" name="subject" type="submit" value="3"></button>
            <button class="option" name="subject" type="submit" value="4"></button>
        </div>
    </form>
    <?php
    if (isset($_POST['subject'])) {
        $icaj = $_POST['subject'];

        $query = mysqli_query($connection, "SELECT `icaj` FROM `sensdata` WHERE `Email`= '$id' AND `icaj`='$icaj';") or die("Query Unsuccessfull:" . mysqli_error($connection));
        $num_rows = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);
        if ($num_rows == 1) {
            header("Location: realIndex.php");
        } else {
            header("Location: fake.php");
            session_destroy();
        }
    }
    ?>
</body>

</html>
