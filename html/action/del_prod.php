<?php

/* Connect PostgresSQL database */
$conn = pg_connect("host=localhost dbname=farm user=postgres password=123");

/* Delete data */
if(isset($_POST['submit'])){
  $prod_name = $_POST['prod_name'];

  pg_query($conn, "DELETE FROM products WHERE prod_name='$prod_name'");
}

pg_close($conn);

/* Redirect to previous location */
echo "<script>
alert('Product deleted.');
window.location.href='../admin.php';
</script>";
?>