<?php
  require "connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `admin` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginadmin.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/newfriend.css">
  <link rel="stylesheet" href="./CSS/another-one.css">
  <link rel="shortcut icon" href="./images/Capture.JPG" type="image/x-icon" class="link">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="./JS/jsfile.js"></script>
  <title>DASHBOARD</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
  <style>
    #main-contents{
      height: 250vh;
    }
  </style>
  <div class="sidebar">
      <ul class="menu">
        <div class="logout">
        <li>
          <a href="admindashboard.php">
            <i class="fa-solid fa-house-chimney"></i>
            <span>DASHBOARD</span>
          </a>
        </li>
        <li>
          <a href="case-details.php">
            <i class="fa-solid fa-suitcase"></i>
            <span>CASE DETAILS</span>
          </a>
        </li>
        <li>
          <a href="attorneys.php">
            <i class="fa-solid fa-people-group"></i>
            <span>ATTORNEYS</span>
          </a>
        </li>
        
        
        <li>
          <a href="documents.php">
            <i class="fa-solid fa-folder-open"></i>
            <span>DOCUMENTS</span>
          </a>
        </li>
        <li>
        <a href="./site/website.php">
            <i class="fa-solid fa-globe"></i>
            <span>HOME SITE</span>
          </a>
        </li>
        <li>
          <a href="adminprofile.php">
            <i class="fa-solid fa-gear"></i>
            <span>ADMIN SETTINGS</span>
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
          <img src="./images/Capture.JPG" alt="" class="image">
        </div>
        <div class="header-title">
          <h1>DASHBOARD</h1>
        </div>
        <div class="user-info">
        <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name from `admin`");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            ?>
          <h3 class="my-account-header">
          <?php echo $attorney?>
            </h3>
          <p>Manager</p></div> 
          <button name="submit" type="submit" class="btn-3" >
            <a href="logout.php">LOGOUT</a>
          </button>
        </div>       
         </div>
         <div class="fire-base">
          <div class="base-1">
            <h3>TOTAL CASES</h3>
            <div class="grill">
            <div class="peng-black">
              <i class="fa-solid fa-list"></i></div>
            <h1>
            <?php
                 $sql=mysqli_query($con,"SELECT * from `cases`" );
                 if($row=mysqli_num_rows($sql));
                 { 
               ?>
               <tr>
                 <td><?php echo $row?></td></tr>
                 <?php
               }
                ?>
              </h1></div>
          </div>
          <div class="base-1">
          <h3>TOTAL ATTORNEYS/USERS</h3>
          <div class="grill">
            <div class="peng-black">
              <i class="fa-solid fa-box"></i></div>
            <h1>
              <?php
                 $sql=mysqli_query($con,"SELECT * from `user`" );
                 if($row=mysqli_num_rows($sql));
                 { 
               ?>
               <tr>
                 <td><?php echo $row?></td></tr>
                 <?php
               }
                ?>
              </h1></div>
          </div>
          <div class="base-1">
          <h3>TOTAL SYSTEM ADMINS</h3>
          <div class="grill">
            <div class="peng-black">
              <i class="fa-solid fa-xmark"></i></div>
            <h1>
              <?php
                 $sql=mysqli_query($con,"SELECT * from `admin`" );
                 if($row=mysqli_num_rows($sql));
                 { 
               ?>
               <tr>
                 <td><?php echo $row?></td></tr>
                 <?php
               }
                ?>
              </h1></div>
          </div>
          <div class="base-1">
          <h3>ACTIVE ATTORNEYS</h3>
          <div class="grill">
            <div class="peng-black">
            <i class="fa-solid fa-person"></i></div>
            <h1>
               <?php
                 $sql=mysqli_query($con,"SELECT * from `user`" );
                 if($row=mysqli_num_rows($sql));
                 { 
               ?>
               <tr>
                 <td><?php echo $row?></td></tr>
                 <?php
               }
                ?>
              </h1>
          </div>
         </div>
        </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
