<?php

  $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE user_name='$username' AND user_pwd='$password' AND user_group='cashier'";
    $result = pg_query($conn,$query);
  }

  if($res=pg_num_rows($result) == 1) {
    header("location:../cashier.php");
    exit();
  } else {
    header("location:../index.php");
    exit();
  }
?>