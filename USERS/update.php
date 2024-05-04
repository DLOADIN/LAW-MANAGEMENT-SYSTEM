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
  <link rel="stylesheet" href="../CSS/another-one.css">
  <script src="../JS/jsfile.js"></script>
  <link rel="shortcut icon" href="../images/Capture.JPG" type="image/x-icon" class="link">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <title>ADD CASE</title>
</head>
<body>
  
<style>
    #main-contents{
      height: 250vh;
    }
    .formation-1{
  display: grid;
  grid-template-columns: 130px 700px 150px 300px;
  row-gap: 30px;
  column-gap: 30px;
  padding-top: 10vh;
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
          <h1>UPDATE CASE DETAILS</h1>
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
         <div class="catch">
          <form action="" method="post" class="form-form">
            <div class="formation-1">
            <?php
            if(isset($_GET['id'])){
              $id=$_GET['id'];
            }
            $sql=mysqli_query($con,"SELECT * FROM `cases` WHERE id='$id' ");
            $row = mysqli_fetch_array($sql);
          ?>
            <input type="text" name="user_id" value="<?php echo $row['user_id']?>" read-only hidden>
            <label for="">Client First Name</label>
            <input type="text" name="u_firstname" id="" value="<?php echo $row['u_firstname']?>" required>
            <label for="">Client Second Name</label>
            <input type="text" name="u_lastname" id="" value="<?php echo $row['u_lastname']?>" required>
            <label for="">Email</label>
            <input type="email" name="u_email" id="" value="<?php echo $row['u_email']?>" required>
            <label for="">Phone</label>
            <input type="number" name="u_phonenumber" id="" value="<?php echo $row['u_phonenumber']?>" maxlength="15" required>
            <label for="">Mother's Names</label>
            <input type="text" name="u_mother" id="" value="<?php echo $row['u_mother']?>" required>
            <label for="">Father's Names</label>
            <input type="text" name="u_father" id="" value="<?php echo $row['u_father']?>" required>
            <label for="">NID</label>
            <input type="number" name="u_nid" id="" value="<?php echo $row['u_nid']?>" required>
            <label for="">Place of Residence</label>
            <input type="text" name="u_residence" id="" value="<?php echo $row['u_residence']?>" required>
            <label for="">Nationality</label>
            <input type="text" name="u_nationality" id="" value="<?php echo $row['u_nationality']?>" required>
            <label for="">Convictions/Case Details</label>
            <input type="text" name="u_casedetails" id="" value="<?php echo $row['u_casedetails']?>" required>
            <label for="">Today's Date</label>
            <input type="text" name="u_date" value="<?php echo $row['u_date']?>" read-only>
          </div>
            <button name="submit" type="submit" class="btn-3" id="button-btn">UPDATE</a>
            </button>
          </form>
         </div>
        </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
  $user_id=$_POST['user_id'];
  $firstname=$_POST['u_firstname'];
  $lastname=$_POST['u_lastname'];
  $email=$_POST['u_email'];
  $phonenumber=$_POST['u_phonenumber'];
  $mother=$_POST['u_mother'];
  $father=$_POST['u_father'];
  $nid=$_POST['u_nid'];
  $residence=$_POST['u_residence'];
  $nationality=$_POST['u_nationality'];
  $casedetails=$_POST['u_casedetails'];
  $date = date('Y-m-d',strtotime($_POST['u_date']));

  $sql=mysqli_query($con,"UPDATE cases SET user_id='$user_id', u_firstname='$firstname', u_lastname='$lastname',u_email='$email',u_phonenumber='$phonenumber',u_mother='$mother',u_father='$father',u_nid='$nid',u_residence='$residence',u_nationality='$nationality',u_casedetails='$casedetails',u_date='$date' WHERE id='$id' ");
  
  if($sql){
    echo "<script>alert('Saved the records successfully')</script>";
  }
  else{
    echo "<script>alert('Failed to Save your records ')</script>";
  }
}
?>