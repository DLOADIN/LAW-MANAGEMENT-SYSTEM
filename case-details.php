
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/newfriend.css">
  <link rel="stylesheet" href="./CSS/tables.css">
  <link rel="shortcut icon" href="./images/Capture.JPG" type="image/x-icon" class="link">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <title>CASES</title>
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

    <div class="main-content" id="main-contents">
      <div class="header-wrapper">
        <div class="div">
          <img src="./images/Capture.JPG" alt="" class="image">
        </div>
        <div class="header-title">
          <h1>CASES</h1>
        </div>
        <div class="user-info">
        <div class="gango">
          <?php
            require 'connection.php';
            $sql=mysqli_query($con, "SELECT u_name from `admin` ");
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
          <h2 class="h2">CASES DETAILS</h2>
          </div>
          <table><tr>
              <th>#</th>
              <TH>ASSIGNED ATTORNEY</TH>
              <th>CLIENT FIRST NAME</th>
              <th>CLIENT LAST NAME</th>
              <th>EMAIL</th>
              <th>PHONENUMBER</th>
              <th>ID NUMBER</th>
              <th>RESIDENCE</th>
              <th>NATIONALITY</th>
              <th>DATE</th>
              <th>CASE DETAILS</th>
              </tr>
            <?php
            $number=0;
            $sql=mysqli_query($con,"SELECT `user`.u_name,`cases`.* FROM `cases` INNER JOIN `user` ON `cases`.user_id = `user`.`id`; ");
            $row = mysqli_num_rows($sql);
            if($row){
              while($row=mysqli_fetch_array($sql))
              { 
            $number++;
            ?>
            <tr>
              <td><?php echo $number?></td>
              <td><?php echo $row['u_name']?></td>
              <td><?php echo $row['u_firstname']?></td>
              <td><?php echo $row['u_lastname']?></td>
              <td><?php echo $row['u_email']?></td>
              <td><?php echo $row['u_phonenumber']?></td>
              <td><?php echo $row['u_nid']?></td>
              <td><?php echo $row['u_residence']?></td>
              <td><?php echo $row['u_nationality']?></td>
              <td><?php echo $row['u_date']?></td>
              <td><?php echo $row['u_casedetails']?></td>
              <td>  
              <button class="lebutton" onclick="alert('Are You Really Sure You Want To Delete This')"><a style="color: red;" href="./deletecasedetails.php?id=<?php echo $row['id']?>">DELETE</a></button>
              </td>
          </tr>
          <?php
          }
        }
          ?>
        </table>
        <button class="abtn-1" id="abtni-1">
              <a href="./pdf/admin-case-details.php">
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
  #main-contents{
    width:fit-content
  }
</STYle>