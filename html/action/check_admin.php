<?php

  /* Connect PostgresSQL database */
  $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");

  /* Check credential */
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE user_name='$username' AND user_pwd='$password' AND user_group='administrator'";
    $result = pg_query($conn,$query);
  }

  pg_close($conn);

  /* Redirect to different pages depending on checking result */
  if($res=pg_num_rows($result) == 1) {
    echo "<script>
    alert('Logged in successfully.');
    window.location.href='../admin.php';
    </script>";

/*
    echo '<script type="text/javascript">alert("Logged in successfully.");</script>';
    header("location:../admin.php");
    exit();
*/
  } else {
    echo "<script>
    alert('Invalid username or password, please try again!');
    window.location.href='../index.php';
    </script>";

/*
    echo '<script type="text/javascript">alert("Invalid username or password, please try again!");</script>';
    header("location:../index.php");
    exit();
*/
  }

?>