<?php
session_start();
include "db.php";

$user = $_SESSION["user"];

// if(!isset($user)){
//   header('location:signup.php');




if (isset($_POST['signup'])) {
    $name = $_POST['uname'];
    $photo = $_FILES['image']['name'];
  
    
    $target = "image/". $photo;
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $update = "UPDATE users SET uname ='$name', photo= '$photo' WHERE phone_no='$user' ";
        $query = mysqli_query($con, $update);

       if($query) {


        $_SESSION['user']=$phone;

     header('location: next4.php');

    }else{
        echo "registration fail";
    }
  }

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="css/next3.css">
  <title>Profile Info</title>
</head>
<body>

<div class="house">
  <div class="container">
    <h1>Profile Info</h1>
    <p>Please provide your name and an optional profile photo</p>

    <form method="POST" enctype="multipart/form-data">
      <div class="profile-pic-wrapper">
        <img id="profileImage" src="css/image/WhatsApp Image 2025-06-11 at 10.44.35_2427341e.jpg" alt="Profile" style="width: 100px; height: 100px; border-radius: 50%;">
        <label for="uploadInput" class="upload-icon">+</label>
        <input type="file" name="image" id="uploadInput" accept="image/*" style="display:none;">
      </div>

      <div class="input-name">
        <input type="text" name="uname" placeholder="Type your name here" required />
      </div>

      <button class="next" type="submit" name="signup">Next</button>
    </form>
  </div>
</div>

<script>
  const uploadInput = document.getElementById("uploadInput");
  const profileImage = document.getElementById("profileImage");

  uploadInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        profileImage.src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });
</script>



    
</body>
</html>