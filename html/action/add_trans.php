<?php

/* Connect PostgresSQL database */
$conn = pg_connect("host=localhost dbname=farm user=postgres password=123");

/* Insert data */
if(isset($_POST['submit'])){
  $cust_name = $_POST['cust_name'];
  $prod_name = $_POST['prod_name'];
  $prod_qty = $_POST['prod_qty'];

  pg_query($conn, "INSERT INTO transactions VALUES(
    now(),
    '$cust_name',
    '$prod_name',
    $prod_qty,
    $prod_qty*(SELECT prod_price FROM products WHERE prod_name='$prod_name')    
  )");

  $query=pg_query($conn,"SELECT '$prod_qty' * prod_price AS total_price FROM products WHERE prod_name='$prod_name'");

  $result=pg_fetch_array($query);

  $total_price=$result['total_price'];
  $message="The total price of the last transaction is: $total_price";

  /* Redirect to previous location */
  echo "<script>
  alert('$message');
  window.location.href='../cashier.php';
  </script>";
}

pg_close($conn);

?>