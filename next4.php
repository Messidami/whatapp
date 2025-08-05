<?php
session_start();
include("db.php");

$user = $_SESSION["user"];




// if(!isset($user)){
//   header('location:signup.php');
// }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/next4.css">
    <title>Document</title>
</head>
<body>

  <div class="header">WhatsApp</div>

  <div class="chat-list">

  <?php
  
  $select = "SELECT* FROM users";
  $query = mysqli_query($con, $select);
  while($row = mysqli_fetch_array($query)){

  ?>

  <a href="chat.php? chat=<?php echo $row['id']; ?>">

    <div class="chat">
        <div class="avatar"><div class="image"><img src="image\OIP.webp" alt=""></div></div>
        <div class="chat-info">
          <h4><?php  echo $row ['phone_no'];  ?></h4>
          <p>you: Okay.</p>
        </div>
      <div class="chat-time">12:19 PM</div>
    </div>
    </a>
      
        <?php }
        ?>
 




    
   
      
  <div class="bottom-nav">
    <div class="active">Chats</div>
    <div>Updates</div>
    <div>Communities</div>
    <div>Calls</div>
  </div>
    
</body>
</html>