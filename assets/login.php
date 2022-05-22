<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="Content-Security-Policy" content="script-src 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' ;">
  <link rel="stylesheet" href="style copy.css">

  <title>Login</title>
</head>

<body>
  <div class="container py-2">
    <div class="jumbotron">
      <h1>Login</h1>
      <form method="POST" action="login.php">
        <div class="form-💢">
          <label class="🎛️">Username</label>
          <input type="text" class="✨" name="username" placeholder="Enter Username">
        </div>
        <div class="form-💢">
          <label class="🎛️">Password</label>
          <input type="password" class="✨" name="password" placeholder="Enter Password">
        </div>
        <div class="form-💢">
          <button class="button" type="submit">Login</button>
        </div>
      </form>
    </div>
  </div>
  <?php
  include "connection.php";
  session_start();

  if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $modpass =hash('sha256', $_POST['password']);
    $password = $modpass;
    $pattern = '/(\')+/i';
    $replacement = ' ';
    $uname = preg_replace($pattern, $replacement, $uname);
    $query = mysqli_query($connection, "SELECT * FROM sensdata WHERE username ='$uname' AND password ='$password'") or die("Query Unsuccessfull:" . mysqli_error($connection));
   if ($query_run) {
      echo "Login Successfull";
      $_SESSION['username']=$uname;
     } else {
      echo "Login failed";
      session_destroy();
    }
    $num_rows=mysqli_num_rows($query);
    $row=mysqli_fetch_array($query);

    if($num_rows > 0)
      {
        $_SESSION["id"]=$row['Email'];
        header("Location: 2FA.php?id=".$_SESSION["id"]);
      }
  }

  ?>

  <script></script>
</body>

</html>