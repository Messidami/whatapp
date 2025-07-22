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

  <a href="chat.php?=<?php echo $row['id']; ?>">

    <div class="chat">
        <div class="avatar"><img src="css/image/WhatsApp Image 2025-06-11 at 10.44.35_2427341e.jpg" alt=""></div>
        <div class="chat-info">
          <h4><?php  echo $row ['phone_no'];  ?></h4>
          <p>you: Okay.</p>
        </div>
      <div class="chat-time">12:19 PM</div>
    </div>
    </a>
      
        <?php }
        ?>
 


    
    <div class="chat">
        <div class="avatar"><img src="css/image/WhatsApp Image 2025-06-11 at 10.44.35_2427341e.jpg" alt=""></div>
        <div class="chat-info">
          <h4>Proxy web design class change</h4>
          <p>~ jaykelly997: Okay.</p>
        </div>
      <div class="chat-time">12:19 PM</div>
    </div>

 
    <div class="chat">
             <div class="avatar"><img src="css/image/WhatsApp Image 2025-06-11 at 10.44.35_2427341e.jpg" alt=""></div>
      <div class="chat-info">
        <h4>‪+234 810 330 7048‬</h4>
        <p>Never mind again I have seen it</p>
      </div>
      <div class="chat-time">12:01 PM</div>
    </div>


    <div class="chat">
           <div class="avatar"><img src="css/image/WhatsApp Image 2025-06-11 at 10.44.35_2427341e.jpg" alt=""></div>
      <div class="chat-info">
        <h4>LCorrosiveU</h4>
        <p>~ Admin: GET TO BE A WINNER WITH...</p>
      </div>
      <div class="chat-time">11:56 AM</div>
    </div>


    <div class="chat">
       <div class="avatar"><img src="css/image/WhatsApp Image 2025-06-11 at 10.44.35_2427341e.jpg" alt=""></div>
      <div class="chat-info">
        <h4>C & S DOMINION CHAPEL INT</h4>
        <p>🎥 PARENTS - always talk...</p>
      </div>
      <div class="chat-time">11:46 AM</div>
    </div>


    <div class="chat">
             <div class="avatar"><img src="css/image/WhatsApp Image 2025-06-11 at 10.44.35_2427341e.jpg" alt=""></div>
      <div class="chat-info">
        <h4>‪+234 814 902 0649‬</h4>
        <p> where are you </p>
      </div>
      <div class="chat-time">11:22 AM</div>
    </div>
  </div>

  <div class="bottom-nav">
    <div class="active">Chats</div>
    <div>Updates</div>
    <div>Communities</div>
    <div>Calls</div>
  </div>
    
</body>
</html>