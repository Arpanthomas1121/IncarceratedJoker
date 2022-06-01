<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="Content-Security-Policy" content="script-src 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' ;">
  <link rel="stylesheet" href="style copy.css">

  <title>CyberV</title>
</head>

<body>
  <div class="container py-2">
    <div class="jumbotron">
      <h1>Register</h1>
      <form method="POST" action="register.php">
      <div class="form-💢">
          <label class="🎛️">Name</label>
          <input type="text" class="✨" name="Name" placeholder="Enter your name">
        </div>
        <div class="form-💢">
          <label class="🎛️">Username</label>
          <input type="text" class="✨" name="username" placeholder="Enter Username">
        </div>
        <div class="form-💢">
          <label class="🎛️">Password</label>
          <input type="password" class="✨" name="password" placeholder="Enter Password">
        </div>
        <div class="form-💢">
          <label class="🎛️">Email</label>
          <input type="email" class="✨" name="email" placeholder="Enter your email address">
        </div>
        <div class="form-💢">
          <button class="button" type="submit">Register</button>
        </div>
      </form>
    </div>
  </div>
 <?php
  include "connection.php";
  session_start();
  session_unset();
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $modpass =hash('sha256', $_POST['password']);
    $password = $modpass;
    $pattern = '/(\')|[ ]/i';// prevent SQL & white space
    $replacement = 'x';
    $uname = preg_replace($pattern, $replacement, $uname);
    $query = mysqli_query($connection, "INSERT INTO `sensdata` (`name`, `username`, `password`, `Email`) VALUES ('$name', '$uname', '$password','$email')") or die("Query Unsuccessfull:" . mysqli_error($connection));
    if (!$query_run) {
      echo 'Registration Successfull!! '.'<br> Welcome,'. $name.'!';
      $_SESSION['username']=$uname;
      header("Location: regtiles.php?id=$uname");
    } else {
      echo "Registration failed";
      session_destroy();
    }
}
  ?>


  <script></script>
</body>

</html>
