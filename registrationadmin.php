<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/loginandregistration.css">
  <link rel="shortcut icon" href="./images/Capture.JPG" type="image/x-icon" class="link">
  <script src="./JS/jsfile.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
  <title>REGISTRATION PAGE</title>
</head>
<body>
  <div class="grided">  
  <div class="grid-1">
    <img src="./images/pexels-sora-shimazaki-5669619.jpg" alt="">
  </div>
  <div class="grid-2">
    <div class="text-2">
      <div class="mr-crabs">
        <img src="./images/Capture.JPG" alt="">
      <h1>CREATE AN ACCOUNT</h1>
    </div>
        <form action="" method="post">
          
          <div class="inputbox">
            <ion-icon name="person-outline"></ion-icon>
          <input type="text" name="u_name" required>
          <label for="">FULL NAMES</label></div>

          <div class="inputbox">
          <ion-icon name="mail-outline"></ion-icon>
          <input type="email" name="u_email" required>
          <label for="">E-MAIL</label></div>

          <div class="inputbox">
            <ion-icon name="phone-portrait-outline"></ion-icon>
          <input type="text" name="u_phonenumber" required maxlength="15">
          <label for="">PHONENUMBER</label></div>

          <div class="inputbox">
            <ion-icon name="location-outline"></ion-icon>
          <input type="text" name="u_address" required>
          <label for="">ADDRESS</label></div>

          <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="text" name="u_password" required>
          <label for="">PASSWORD</label></div>

          <div class="div">
          <button name="submit" type="submit" class="btn-2">SIGN UP</button>
          <h3 class="heading-3"> Do you have an account? <a href="loginadmin.php">Sign In</a></h3>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
  require 'connection.php';
  
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $phonenumber = $_POST['u_phonenumber'];
    $address = $_POST['u_address'];
    $password = $_POST['u_password'];
    $sql=mysqli_query($con,"INSERT INTO `admin` VALUES('','$name','$email','$phonenumber','$address','$password')");
    
    if($sql){
      echo "<script>alert('Registered Successfully| Please Head to the Login ')</script>";
    }
    else{
      echo "<script>alert('failed to register')</script>";
    }
  }
?>
