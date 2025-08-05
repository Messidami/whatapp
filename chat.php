<?php

session_start();
include("db.php");

$user = $_SESSION["user"];




// if(!isset($user)){
//   header('location:signup.php');
// }

$table2="CREATE TABLE IF NOT EXISTS whatapp_messages(
  id INT (11)  AUTO_INCREMENT PRIMARY KEY,
  sender_id INT (11),
  reciever_id INT (11),
  message VARCHAR (1024),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )";

  $query1= $con->query($table2);

  $reciever_id= $_GET['chat'];

if(isset($_POST['send'])){
  $text = mysqli_real_escape_string($con, $_POST['message']);
  
  if(!empty($text));

  $insert = "INSERT INTO  whatsapp_message (sender_id , reciever_id , message, created_at)
            VALUES ('$user' , '$reciever_id' , '$text')" ;
   mysqli_query($con, $insert) ;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/chat.css">
</head>
<body>
  <div class="house">
       <header>MESSIDAMI</header>
  <div class="chat">
    <div class="message received">Hello! How are you in class?</div>
    <div class="message sent">yes eating yam</div>
    <div class="message received">nice one. our tutor in class Already</div>
    <div class="message sent">Yes, okay coming soon.</div>
  </div>
   <form action="" method="post">
    <textarea name="message" id="" cols="30" rows="10"></textarea>
    <button type="submit" name="send">Send</button>
  </form>
  </div>
    
</body>
</html>