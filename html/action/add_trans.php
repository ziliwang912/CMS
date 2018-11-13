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

  $qurry_result=pg_query($conn,"SELECT prod_value FROM transactions ORDER BY trans_date DESC LIMIT 1");
  $row_result=pg_fetch_row($qurry_result);
}
pg_close($conn);

echo '<script type="text/javascript">alert("Total price is: '.$row_result.'");</script>';


?>