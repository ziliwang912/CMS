<?php

/* Connect PostgresSQL database */
$conn = pg_connect("host=localhost dbname=farm user=postgres password=123");

/* Delete data */
if(isset($_POST['submit'])){
  $cust_name = $_POST['cust_name'];

  pg_query($conn, "DELETE FROM customers WHERE cust_name='$cust_name'");
}

pg_close($conn);

/* Redirect to previous location */
echo "<script>
alert('Customer deleted.');
window.location.href='../admin.php';
</script>";
?>