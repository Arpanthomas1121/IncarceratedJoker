<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta http-equiv="Content-Security-Policy" content="script-src 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' ;">
    <link rel="stylesheet" href="style copy.css">

    <title>Demo CyberV</title>
</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <h1>Login</h1>
      <form method="POST" action="login.php">
        <div class="form-💢">
          <label class="🎛️">OTP</label>
          <input type="password" class="✨" name="OTP" placeholder="Enter OTP">
        </div>
        <div class="form-💢">
          <button class="button" type="submit">submit</button>
        </div>
      </form>
    </div>
  </div>
    <script></script>
</body>

<?php
$success = "";
$error_message = "";
include 'connection.php';
session_start();
$email=$_GET['id'];
if(!empty($email)) {
		$otp = rand(100000,999999);
        echo 'The OTP generated:'.$otp.' ';
		require_once("mail_function.php");
		$mail_status = sendOTP($email,$otp);
        echo $mail_status;
		if($mail_status == 1) {
			$result = mysqli_query($connection,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($connection);
			if(!empty($current_id)) {
				$success=1;
			}
		}
	} else {
		$error_message = "Email not exists!";
	}
if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($connection,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($connection,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;	
	} else {
		$success =1;
		$error_message = "Invalid OTP!";
	}	
}
?>

</html>