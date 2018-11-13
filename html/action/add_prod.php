<?php

/* Connect PostgresSQL database */
$conn = pg_connect("host=localhost dbname=farm user=postgres password=123");

/* Insert data */
if(isset($_POST['submit'])){
  $prod_name = $_POST['prod_name'];
  $prod_category = $_POST['prod_category'];
  $prod_cost = $_POST['prod_cost'];
  $prod_price = $_POST['prod_price'];

  pg_query($conn, "INSERT INTO products VALUES('$prod_name','$prod_category',$prod_cost,$prod_price)");
}

pg_close($conn);

header("location:../cashier.php");
exit();

?>