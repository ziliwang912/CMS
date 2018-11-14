<?php

/* Connect PostgresSQL database */
$conn = pg_connect("host=localhost dbname=farm user=postgres password=123");

/* Insert data */
if(isset($_POST['submit'])){
  $cust_name = $_POST['cust_name'];

  pg_query($conn, "INSERT INTO customers VALUES('$cust_name')");
}

pg_close($conn);

/* Redirect to previous location */
echo "<script>
alert('New customer added.');
window.location.href='../cashier.php';
</script>";

?>