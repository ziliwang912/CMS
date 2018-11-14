<?php

/* Connect PostgresSQL database */
$conn = pg_connect("host=localhost dbname=farm user=postgres password=123");

/* Delete data */
if(isset($_POST['submit'])){
  $user_name = $_POST['user_name'];

  pg_query($conn, "DELETE FROM users WHERE user_name='$user_name'");
}

pg_close($conn);

/* Redirect to previous location */
echo "<script>
alert('Account deleted.');
window.location.href='../admin.php';
</script>";
?>