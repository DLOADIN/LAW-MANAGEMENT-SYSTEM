<?php
require 'connection.php';

$id=$_GET['id'];
  $sql=mysqli_query($con,"DELETE FROM `cases` WHERE id='$id'");
  header('location:case-details.php');

?>