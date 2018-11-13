<?php
echo "start ";

$conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
$query = "SELECT * FROM products";
$result = pg_query($conn,$query);


while ($row = pg_fetch_array($result)) {
  echo "<option value=" .$row['prod_name']. ">" .$row['prod_name']. "</option>";
}

echo "end";
?>

