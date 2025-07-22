<?php
include "db.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();

$table="CREATE TABLE IF NOT EXISTS users(
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  phone_no VARCHAR(15),
  country  VARCHAR(20),
  email VARCHAR(50),
  verify_code INT(11),  
  photo VARCHAR(100),
  status INT(11),
  created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$query= $con->query($table);

if(isset($_POST['signup'])){
  $country=mysqli_real_escape_string($con, $_POST['country']);
  $phone=mysqli_real_escape_string($con, $_POST['phone']);
  $email=mysqli_real_escape_string($con, $_POST['email']);
  $token=(1234567890);
  $token1=str_shuffle($token);
  $pin=substr($token1,0,6);

  // TO CHECK FROM DATEBASE FOR EXISTING PHONE NUMBER
  $check = "SELECT* FROM users WHERE phone_no = '$phone'";
  $phone_check= mysqli_fetch_array($con ->query($check));
  
  if($phone_check['phone_no'] == $phone){

    $u_email =$phone_check['email'];


    $sql= "UPDATE users SET verifycode =$pin WHERE phone_no = $phone";
    $query=$con->query($sql);

    require 'phpmailer/vendor/autoload.php'; // Composer autoload

$mail = new PHPMailer(true);

try {
    // Server settings
  //  $mail->isSMTP();                                      // Use SMTP
    // // $mail->Host       = 'smtp.gmail.com';
    //  $mail->Host   = '74.125.140.109';                  // SMTP server
    // $mail->SMTPAuth   = true;                             // Enable authentication
    // $mail->Username   = 'kodakblacksth@gmail.com';           // Your email
    // $mail->Password   = 'eihfhqbyanvlnnkj';              // Use App Password if 2FA enabled
    // // $mail->SMTPSecure = 'tls';                        // Encryption: tls or ssl
    //  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //  $mail->Port       = 587;

    $mail->isSMTP();                                      // ✅ Required!
$mail->Host       = 'smtp.gmail.com';                 // ✅ Do NOT use IP
$mail->SMTPAuth   = true;
$mail->Username   = 'kodakblacksth@gmail.com';        // ✅ Your Gmail
$mail->Password   = 'eihfhqbyanvlnnkj';               // ✅ Gmail App Password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;






    // Recipients
    $mail->setFrom('dammiemmanuel05@gmail.com', 'messidami');
    $mail->addAddress($u_email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Subject = 'verification code';
    $mail->Body    = 'use this code to verify you are the user echo $pin.';

    $mail->send();
    echo 'Email has been sent successfully!';

    $_SESSION['user'] = $phone;
    header('location:verify.php');

} catch (Exception $e) {
    echo "Email failed to send. Mailer Error: {$mail->ErrorInfo}";
}

  }else{

  $sql = "INSERT INTO users (country, phone_no, email, verify_code)
  VALUES ('$country','$phone','$email','$pin') ";
  $query= $con->query($sql);

$_SESSION['user']=$phone;

 require 'phpmailer/vendor/autoload.php'; // Composer autoload

$mail = new PHPMailer(true);

try {
  $mail->isSMTP();                                      // ✅ Required!
$mail->Host       = 'smtp.gmail.com';                 // ✅ Do NOT use IP
$mail->SMTPAuth   = true;
$mail->Username   = 'kodakblacksth@gmail.com';        // ✅ Your Gmail
$mail->Password   = 'eihfhqbyanvlnnkj';               // ✅ Gmail App Password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;

    // // Server settings
    // $mail->isSMTP();                                      // Use SMTP
    // // $mail->Host       = 'smtp.gmail.com';
    // $mail->Host   = '74.125.140.109';                // SMTP server
    // $mail->SMTPAuth   = true;                             // Enable authentication
    // $mail->Username   = 'kodakblacksth@gmail.com';           // Your email
    // $mail->Password   = 'eihfhqbyanvlnnkj';              // Use App Password if 2FA enabled
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                            // Encryption: tls or ssl
    // $mail->Port       = 587;                              // Port (587 for TLS, 465 for SSL)

    // Recipients
    $mail->setFrom('dammiemmanuel05@gmail.com', 'messidami');
    $mail->addAddress($email, 'new user');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'verification code';
    $mail->Body    = 'use this code to verify you are the user echo $pin.';
  

    $mail->send();
    echo 'Email has been sent successfully!';

     $_SESSION['user'] = $phone;
    header('location:verify.php');

} catch (Exception $e) {
    echo "Email failed to send. Mailer Error: {$mail->ErrorInfo}";
}

  }


}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title></title>
  <link rel="stylesheet" href="css/next1.css">
</head>
<body>
 <form action="" method="post">
  <div class="house">
   <div class="container">
    <h2>Enter your phone number</h2>
    <p class="info-text">
      WhatsApp will need to verify your phone number. Carrier charges may apply.
      <a href="#">What's my number?</a>
    </p>

    <div class="dropdown">
      <select name="country">
        <option selected>Nigeria</option>
        <option>United States</option>
        <option>India</option>
        <option>Kenya</option>
      </select>
    </div>

    <div class="phone-input">
      <span class="country-code">+234</span>
      <input type="tel" name="phone" placeholder="Phone number" />
    </div> <br>
    <div class="phone-input">
  <span class="country-code">@</span>
  <input type="email" name="email" placeholder="Email address" />
</div> <br>

    <button class="next" name="signup">Next</button>
  </div>
 </div>
 </form>
</body>
</html>