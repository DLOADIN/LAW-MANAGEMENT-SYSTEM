<?php
  require 'connection.php';
  
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $password = $_POST['u_password'];
    $sql=mysqli_query($con,"SELECT * FROM `user` WHERE u_name = '$name' AND u_password = '$password' ");
    $query=mysqli_fetch_array($sql);
    
    if(mysqli_num_rows($sql) > 0){
      if($password===$query["u_password"]);
      $_SESSION["login"] = true;
      $_SESSION["id"] = $query["id"];
      header('location:userdashboard.php');
    }
  
    else{
      echo "<script>alert('WRONG USERNAME OR PASSWORD')</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/loginandregistration.css">
  <link rel="shortcut icon" href="../images/Capture.JPG" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
  <title>LOGIN PAGE</title>
</head>
<body>
  <div class="grided">
    <div class="grid-1">
      <img src="../images/pexels-pavel-danilyuk-8112193.jpg" alt="">
    </div>
    <div class="grid-2">
      <div class="text-1">
        <div class="mr-crabs">
          <img src="../images/Capture.JPG" alt="">
        <h1>LOGIN</h1>
        <p>Welcome back! Please Enter Your Details</p>
      </div>
        <form action="" method="post">
          
        <div class="inputbox">
            <ion-icon name="person-outline"></ion-icon>
          <input type="text" name="u_name" required>
          <label for="">FULL NAMES</label></div>

          <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="text" name="u_password" required>
          <label for="">PASSWORD</label></div>

          <div class="div">
          <button name="submit" type="submit" class="btn-2">login</button>
          <h3 class="heading-3"> Not a member? <a href="registrationuser.php">Create Account</a></h3>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
