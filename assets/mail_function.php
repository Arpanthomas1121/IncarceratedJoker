<?php
use LDAP\Result;
function sendOTP($email,$otp){
$to      = $email;
$subject = 'Varification code';
$message = 'hello user, your varification code for the session on'.time().'is:'.$otp;
$headers = 'From: aabthomas1121@gmail.com';
if (mail($to, $subject, $message, $headers)) {
    echo "Email successfully sent to $to...";
} else {
    echo "<br><br> OPPS!! Email sending failed...";	
}
}
?>

