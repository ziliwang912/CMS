<?php
  $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");

  if(isset($_POST['submit']))
  {
    $userName = $_POST['username'];
    $userPwd = $_POST['password'];

    $query = "SELECT * FROM users WHERE user_name='$username' AND user_pwd='$password'";
    $result = pg_query($conn,$query);

    if($res=pg_num_rows($result) == 1) 
    {
      header("location:admin.php");
      exit();
    }
    else
    {
      header("location:index.php");
      exit();
    }
  }
?> 