<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cashier Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-right">
    <a class="navbar-brand" href="#">The Green Farm</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">New Customer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">New Transaction</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Search Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Search Transaction</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Jumbotron -->
  <div class="jumbotron text-center" style="margin-bottom:0">
    <h1>The Green Farm Sales System</h1>
  </div>

  <!-- New Customer -->
  <div class="container-fluid" style="background-color:lightblue; padding-block-end: 10px;">
    <h3 style="text-align: center">New Customer</h3>
    <form action="action/add_cust.php" method="post">
      <div class="form-group">
        <label>Customer Name: </label>
        <input type="text" class="form-control" name="cust_name" placeholder="Enter Customer Name" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Add Name</button>
    </form>
  </div>

  <!-- New Product -->
  <div class="container-fluid" style="background-color: lavender; padding-block-end: 10px;">
    <h3 style="text-align: center">New Product</h3>
    <form action="action/add_prod.php" method="post">
      <div class="form-group">
        <label>Product Name: </label>
        <input type="text" class="form-control" name="prod_name" placeholder="Enter Product Name" required>
      </div>
      <div class="form-group">
        <label for="selectCategory">Product Category: </label>
        <select class="form-control" id="selectCategory", name="prod_category">
          <option>
            Choose A Category
          </option>
          <?php
            $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
            $query = "SELECT DISTINCT prod_category FROM products";
            $result = pg_query($conn,$query);
            while ($row = pg_fetch_array($result)) {
              echo "<option value=" .$row['prod_category']. ">" .$row['prod_category']. "</option>";
            }
            pg_close($conn);
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Original Cost (USD): </label>
        <input type="number" min="0.00" step="0.01" class="form-control" name="prod_cost" placeholder="Enter Original Cost"
          required>
      </div>
      <div class="form-group">
        <label>Retail Price (USD): </label>
        <input type="number" min="0.00" step="0.01" class="form-control" name="prod_price" placeholder="Enter Original Cost"
          required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
    </form>
  </div>

  <!-- New Transaction -->
  <div class="container-fluid" style="background-color: lightcyan; padding-block-end: 10px;">
    <h3 style="text-align: center">New Transaction</h3>
    <form action="action/add_trans.php" method="post">
      <div class="form-group">
        <label for="selectCustomer">Customer Name: </label>
        <select class="form-control" id="selectCustomer" name="cust_name">
          <option>
            Choose A Customer
          </option>
          <?php
            $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
            $query = "SELECT cust_name FROM customers";
            $result = pg_query($conn,$query);        
            while ($row = pg_fetch_array($result)) {
              echo "<option value=" .$row['cust_name']. ">" .$row['cust_name']. "</option>";
            }
            pg_close($conn);
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="selectProduct">Product Name: </label>
        <select class="form-control" id="selectProduct", name="prod_name">
          <option>
            Choose A Product
          </option>
          <?php
            $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
            $query = "SELECT prod_name FROM products";
            $result = pg_query($conn,$query);
            while ($row = pg_fetch_array($result)) {
              echo "<option value=" .$row['prod_name']. ">" .$row['prod_name']. "</option>";
            }
            pg_close($conn);
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Product Quantity (pound): </label>
        <input type="number" min="0.00" step="0.01" class="form-control" name="prod_qty" placeholder="Enter Product Quantity"
          required> 
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Add Transaction</button>
    </form>
  </div>

  <!-- Footer -->
  <div class="jumbotron text-center" style="margin-bottom:0">
    <p>©2018 Zili Wang</p>
  </div>

</body>

</html>