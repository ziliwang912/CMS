<?php

/* Connect PostgresSQL database */
$conn = pg_connect("host=localhost dbname=farm user=postgres password=123");

/* Insert data */
if(isset($_POST['submit'])){
  $user_name = $_POST['user_name'];
  $user_pwd1 = $_POST['user_pwd1'];
  $user_pwd2 = $_POST['user_pwd2'];
  $user_group = $_POST['user_group'];

  if ($user_pwd1 == $user_pwd2) {
    pg_query($conn, "INSERT INTO users VALUES('$user_name','$user_pwd1','$user_group')");

    echo "<script>
    alert('New account added.');
    window.location.href='../admin.php';
    </script>";

  } else {
    echo "<script>
    alert('Password not matching, please try again.');
    window.location.href='../admin.php';
    </script>";
  }

  pg_close($conn);
}

?>