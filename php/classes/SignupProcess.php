<?php
   if(isset($_POST['submit'])){
    $buyer = 'buyer';
    $vendor = 'vendor';
    if($_POST["identity"] === $buyer){
      session_start();
      $_SESSION['username'] = $_POST["name"];
      $_SESSION['password'] = $_POST["password"];
      $_SESSION['email'] = $_POST["email"];
      $_SESSION['identity'] = $_POST["identity"];
      header("location:../signup_buyer.php");
      exit();
    }
    elseif($_POST["identity"] === $vendor){
      session_start();
      $_SESSION['username'] = $_POST["name"];
      $_SESSION['password'] = $_POST["password"];
      $_SESSION['email'] = $_POST["email"];
      $_SESSION['identity'] = $_POST["identity"];
      header("location:../signup_vendor.php");
      exit();
    }
  }
?>