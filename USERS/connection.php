<?php
session_start();
$con=mysqli_connect('localhost','root','','law');

if(!$con){
  die(mysqli_error($con));
}
