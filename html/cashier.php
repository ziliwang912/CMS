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
  <!-- Include datatables -->
  <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body>

  <!-- 
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
          <a class="nav-link" href="#">New Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">New Transaction</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Search Customer</a>
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
Navbar -->

  <!-- Jumbotron -->
  <div class="jumbotron text-center" style="margin-bottom:0">
    <h1>The Green Farm Sales System</h1>
  </div>

  <div class="container-fluid">
    <!-- Nav pills -->
    <ul class="nav nav-pills" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu1">New Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu2">New Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu3">New Transaction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu4">Search Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu5">Search Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu6">Search Transaction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu7">Log Out</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>
        <h3>HOME</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua.</p>
      </div>
      <div id="menu1" class="container tab-pane fade"><br>
        <!-- New Customer -->
        <h3>New Customer</h3>
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
      </div>
      <div id="menu2" class="container tab-pane fade"><br>
        <h3>New Product</h3>
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
              <select class="form-control" id="selectCategory" , name="prod_category">
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
      </div>
      <div id="menu3" class="container tab-pane fade"><br>
        <h3>New Transaction</h3>
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
              <select class="form-control" id="selectProduct" , name="prod_name">
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
      </div>
      <div id="menu4" class="container tab-pane fade"><br>
        <h3>New Customers</h3>
        <!-- Search Customers -->
        <div class="container-fluid" style="background-color: lightblue; padding-block-end: 10px;">
          <h3 style="text-align: center">Search Customers</h3>
          <table id="cust_table" class="table table-bordered table-striped text-center" style="width: 50%; margin: auto;">
            <div class="table responsive">
              <thead>
                <tr>
                  <th>Customer Name</th>
                </tr>
              </thead>
              <tbody>
                <?php
            $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
            $query = "SELECT * FROM customers";
            $result = pg_query($conn,$query); 
            while ($row=pg_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['cust_name']. "</td>";
                echo "</tr>";
            }
          ?>
              </tbody>
            </div>
          </table>
        </div>
      </div>
      <div id="menu5" class="container tab-pane fade"><br>
        <h3>New Product</h3>
        <!-- Search Products -->
        <div class="container-fluid" style="background-color: lavender; padding-block-end: 10px;">
          <h3 style="text-align: center">Search Products</h3>
          <table id="prod_table" class="table table-bordered table-striped text-center" style="width: 75%; margin: auto;">
            <div class="table responsive">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Product Category</th>
                  <th>Product Price</th>
                </tr>
              </thead>
              <tbody>
                <?php
            $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
            $query = "SELECT * FROM products";
            $result = pg_query($conn,$query); 
            while ($row=pg_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['prod_name']. "</td>";
                echo "<td>".$row['prod_category']. "</td>";
                echo "<td>".$row['prod_price']. "</td>";
                echo "</tr>";
            }
          ?>
              </tbody>
            </div>
          </table>
        </div>
      </div>
      <div id="menu6" class="container tab-pane fade"><br>
        <h3>New Product</h3>
        <!-- Search Transactions -->
        <div class="container-fluid" style="background-color: lightcyan; padding-block-end: 10px;">
          <h3 style="text-align: center">Search Transactions</h3>
          <table id="trans_table" class="table table-bordered table-striped text-center" style="width: 90%; margin: auto;">
            <div class="table responsive">
              <thead>
                <tr>
                  <th>Transaction Date</th>
                  <th>Customer Name</th>
                  <th>Product Name</th>
                  <th>Product Quantity</th>
                  <th>Product Value</th>
                </tr>
              </thead>
              <tbody>
                <?php
            $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
            $query = "SELECT * FROM transactions";
            $result = pg_query($conn,$query); 
            while ($row=pg_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['trans_date']. "</td>";
                echo "<td>".$row['cust_name']. "</td>";
                echo "<td>".$row['prod_name']. "</td>";
                echo "<td>".$row['prod_qty']. "</td>";
                echo "<td>".$row['prod_value']. "</td>";
                echo "</tr>";
            }
          ?>
              </tbody>
            </div>
          </table>
          <div class="col-md-12 text-center">
            <ul class="pagination pagination-lg pager" id="trans_page"></ul>
          </div>
        </div>
      </div>
      <div id="menu7" class="container tab-pane fade"><br>
        <h3>Log Out</h3>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
          aperiam.</p>
      </div>
    </div>













    <!-- Footer -->
    <div class="jumbotron text-center" style="margin-bottom:0">
      <p>©2018 Zili Wang</p>
    </div>

</body>

<!-- Call DataTable -->
<script>
  $(document).ready(function () {
    $('#cust_table').DataTable();
    $('#prod_table').DataTable();
    $('#trans_table').DataTable();
  });
</script>

</html>