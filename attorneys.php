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
  <link rel="stylesheet" href="./CSS/tables.css">
  <link rel="shortcut icon" href="./images/Capture.JPG" type="image/x-icon" class="link">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <title>ATTORNEYS</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
  
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

    <div class="main-content" id="main-content">
      <div class="header-wrapper">
        <div class="div">
          <img src="./images/Capture.JPG" alt="" class="image">
        </div>
        <div class="header-title">
        <h2 class="h2">AVAILABLE ATTORNEYS</h2>
        </div>
        <div class="user-info">
        <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name from `admin` WHERE id='$id' ");
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
         <div class="new-amounts"> 
          <div class="title">
          </div>
          <table><tr>
              <th>ID</th>
              <th>ATTORNEY'S NAMES</th>
              <th>EMAIL</th>
              <th>PHONENUMBER</th>
              <th>ADDRESS</th>
              </tr>
            <?php
            $number=0;
            $sql=mysqli_query($con,"SELECT * FROM `user`");
            $row = mysqli_num_rows($sql);
            if($row){
              
              $number++;
              while($row=mysqli_fetch_array($sql))
              {
            ?>
            <tr>
              <td><?php echo $number?></td>
              <td><?php echo $row['u_name']?></td>
              <td><?php echo $row['u_email']?></td>
              <td><?php echo $row['u_phonenumber']?></td>
              <td><?php echo $row['u_address']?></td>
          </tr>
        </table>
        <?php
        }}
        ?>
        <button class="abtn-1" id="abtni-1">
              <a href="./pdf/attorney.php">
              PRINT</a></button>
        </div>
        </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<STYle>
  table{
    margin-top: 4vh;
  }
  table th{
    background-color: rgb(245, 218, 218);;
    padding: .3rem;
  }
  td{
    font-weight:bolder;
    font-size:17px;
    padding-left: 13vh;
    padding-top: 2vh;
    background-color: rgb(248, 246, 246);
    opacity:1890%
  }
</STYle>