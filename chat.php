<?php

session_start();
include("db.php");

$user = $_SESSION["user"];




if(!isset($user)){
  header('location:signup.php');
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
  <form class="input-container" action="#">
    <input type="text" placeholder="Type a message"/>
    <button type="submit" disabled>Send</button>
  </form>
  </div>
    
</body>
</html>