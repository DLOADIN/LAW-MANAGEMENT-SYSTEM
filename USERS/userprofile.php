<?php
  require "connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `user` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginuser.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/newfriend.css">
  <link rel="stylesheet" href="../CSS/form.css">
  <link rel="stylesheet" href="../CSS/gravity.css">
  <link rel="stylesheet" href="../CSS/another-one.css">
  <link rel="shortcut icon" href="../images/Capture.JPG" type="image/x-icon" class="link">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="../JS/jsfile.js"></script>
  <title>USER PROFILE</title>
</head>
<body>
<style>
    #main-contents{
      height: 250vh;
    }
    .password{
    color:grey;
    font-style: italic;
    font-size:18px;
  }
  </style>
  <div class="sidebar">
    <ul class="menu">
      <div class="logout">
      <li>
        <a href="userdashboard.php">
          <i class="fa-solid fa-house-chimney"></i>
          <span>DASHBOARD</span>
        </a>
      </li>
      <li>
        <a href="add-case.php">
          <i class="fa-solid fa-plus"></i>
          <span>ADD CASE</span>
        </a>
      </li>
      <li>
        <a href="case-details.php">
          <i class="fa-solid fa-suitcase"></i>
          <span>CASE DETAILS</span>
        </a>
      </li>
      <li>
        <a href="documents.php">
          <i class="fa-solid fa-folder-open"></i>
          <span>DOCUMENTS</span>
        </a>
      </li>
      <li>
      <a href="../site/website.php">
          <i class="fa-solid fa-globe"></i>
          <span>HOME SITE</span>
        </a>
      </li>
      <li>
        <a href="userprofile.php">
          <i class="fa-solid fa-gear"></i>
          <span>USER SETTINGS</span>
        </a>
      </li>
      <li>
        <a href="logout.php">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          <span>LOGOUT</span>
        </a>
      </li>
    </div>
  </ul>
</div>

<div class="main-content" id="main-contents"> 
      <div class="header-wrapper">
        <div class="div">
          <img src="../images/Capture.JPG" alt="" class="image">
        </div>
        <div class="header-title">
          <h1>USER PROFILE</h1>
        </div>
        <div class="user-info">
        <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name from `user` WHERE id='$id'");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            ?>
          <h3 class="my-account-header">
          <?php echo $attorney?>
            </h3>
          <p>Attorney</p></div>  
          <button name="submit" type="submit" class="btn-3" >
            <a href="logout.php">LOGOUT</a>
          </button>
        </div>       
         </div>
         <div class="duke">
          <div class="hastings">
            <img src="../images/_ANTINOUS_ _ Oil on canvas _ 120 x 150 cm.jpg" alt="">
            <?php
            $sql=mysqli_query($con, "SELECT u_name from `user` WHERE id='$id' ");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            ?>
            <h2>
            <?php echo $attorney?>
            </h2>
            <h3>ATTORNEY</h3>
            <hr>
            <h3><i class="fa-solid fa-phone"></i>+91 7048119291</h3>
            <h3><i class="fa-regular fa-envelope"></i>yghori@asite.com</h3>
            <h3><i class="fa-regular fa-images"></i>PDT -I</h3>
          </div>

          <div class="hastings-1">
            <H1>YOUR OVERALL INFORMATION</H1>
            <?php
          if(isset($_GET['id'])){
          $id=$_GET['id'];
        }
          $sql=mysqli_query($con,"SELECT * FROM `user`");
          $row = mysqli_fetch_array($sql);
          ?> 
            <form action="" method="post" class="formation">
              <div class="real-form">
                <label for="">YOUR NAMES</label>
                <input type="text" name="u_name" value="<?php echo $row['u_name']?>" required>
                <label for="">E-MAIL</label>
                <input type="email" name="u_email" value="<?php echo $row['u_email']?>" required>
              </div>
              <div class="real-form">
                <label for="">PHONENUMBER</label>
                <input type="text" name="u_phonenumber" value="<?php echo $row['u_phonenumber']?>" required>
                <label for="">ADDRESS</label>
                <input type="text" name="u_address" value="<?php echo $row['u_address']?>" required>
              </div>
              <div class="real-form">
                <label for="">PASSWORD</label>
                <input type="text" name="u_password" class="password" value="<?php echo $row['u_password']?>" read-only>
                <button name="submit" type="submit" class="btn-2" id="btns">SAVE</button></div>
            </form>
          </div>

         </div>
        </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $phonenumber = $_POST['u_phonenumber'];
    $address = $_POST['u_address'];
    $sql=mysqli_query($con,"UPDATE `user` SET u_name='$name', u_email='$email', u_phonenumber='$phonenumber',u_address='$address' WHERE id='$id' ");
    
    if($sql){
      echo "<script>alert('Updated Successfully')</script>";
    }
    else{
      echo "<script>alert('failed to update')</script>";
    }
  }
?>
