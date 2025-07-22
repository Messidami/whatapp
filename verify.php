<?php
include "db.php";
session_start();

$error="";
$user = $_SESSION['user'];

if(!isset($user)){
  header('location:signup.php');
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_code = "";
    for ($i = 1; $i <= 6; $i++) {
        if (!isset($_POST["digit$i"])) {
            $error = "Please enter all digits.";
            break;
        }
        $entered_code .= mysqli_real_escape_string($con, $_POST["digit$i"]);
    }

    $sql="SELECT verify_code FROM users WHERE phone_no= $user";
    $query= mysqli_query($con, $sql);
    $list= mysqli_fetch_array($query);

    // echo $list['verify_code'];
    // die;

    if($list['verify_code'] == $entered_code){
      $sqli="UPDATE users SET verify_code='' WHERE phone_no= $user ";
      $query =mysqli_query($con, $sqli);
      $_SESSION['user']= $phone;

      header('location:profile.php');
    }else{
      $error="incorrect pin";
    }

    

    // if (!isset($error)) {
    //     $check = "SELECT * FROM users WHERE verify_code = '$entered_code'";
    //     $result = $con->query($check);

    //     if ($result && $result->num_rows > 0) {
    //         $user = $result->fetch_assoc();
    //         $user_id = $user['id'];

    //         $update = "UPDATE users SET verify_code = NULL, status = 1 WHERE id = $user_id";
    //         $con->query($update);

    //         $_SESSION['user_id'] = $user_id;
    //         $_SESSION['email'] = $user['email'];

    //         header("Location: profile.php");
    //         exit();
    //     } else {
    //         $error = "Invalid verification code.";
    //     }
    // }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Enter Code</title>
  <link rel="stylesheet" href="css/next2.css"/>
</head>
<body>
  <div class="house">
    <div class="container">
      <div class="header">
        <h1>Verifying your number</h1>
        <p class="subtext">
          Waiting to automatically detect 6-digit code sent by SMS to
          <strong><?php echo $user ;   ?></strong>.
          <a href="#" style="color:#0af;">Wrong number?</a>
        </p>
      </div>

      <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

      <form method="POST" action="">
        <div class="input-code">
          <?php for ($i = 1; $i <= 6; $i++): ?>
            <div class="digit-box">
              <input type="text" name="digit<?= $i ?>" maxlength="1" required />
            </div>
          <?php endfor; ?>
        </div>

        <a href="#" class="resend">Didn't receive code?</a>
        <button type="submit">Next</button>
      </form>
    </div>
  </div>

  <script>
    const inputs = document.querySelectorAll('.input-code input');

    inputs.forEach((input, index) => {
      input.addEventListener('input', () => {
        if (input.value.length === 1 && index < inputs.length - 1) {
          inputs[index + 1].focus();
        }
      });

      input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !input.value && index > 0) {
          inputs[index - 1].focus();
        }
      });
    });
  </script>
</body>
</html>