<!DOCTYPE html>
<html lang="en">

<head>
  <title>The Green Farm: Cashier Page</title>
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

  <!-- Jumbotron -->
  <div class="jumbotron text-center" style="margin-bottom:0">
    <h1>The Green Farm Sales System</h1>
  </div>

  <br>
  <div class="container-fluid">
    <!-- Nav pills -->
    <ul class="nav nav-pills" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#home">New Transaction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu1">Search Transaction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu2">New Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu3">Search Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu4">New Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu5">Search Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu6">Log Out</a>
      </li>
    </ul><br>

    <!-- Tab panes -->
    <div class="tab-content" style="border: 1px solid #ddd;">
      <div id="home" class="container tab-pane fade show active"><br>
        <!-- New Transaction -->
        <div class="container-fluid" style="background-color: lightcyan; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>New Transaction</h3>
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
          </form><br>
        </div><br>
      </div>

      <div id="menu1" class="container tab-pane fade"><br>
        <!-- Search Transactions -->
        <div class="container-fluid" style="background-color: lightcyan; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>Search Transactions</h3>
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
        </div><br>
      </div>

      <div id="menu2" class="container tab-pane fade"><br>
        <!-- New Product -->
        <div class="container-fluid" style="background-color: lavender; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>New Product</h3>
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
          </form><br>
        </div><br>
      </div>

      <div id="menu3" class="container tab-pane fade"><br>
        <!-- Search Products -->
        <div class="container-fluid" style="background-color: lavender; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>Search Products</h3>
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
          </table><br>
        </div><br>
      </div>

      <div id="menu4" class="container tab-pane fade"><br>
        <!-- New Customer -->
        <div class="container-fluid" style="background-color:lightblue; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>New Customer</h3>
          <form action="action/add_cust.php" method="post">
            <div class="form-group">
              <label>Customer Name: </label>
              <input type="text" class="form-control" name="cust_name" placeholder="Enter Customer Name" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Customer</button>
          </form><br>
        </div><br>
      </div>

      <div id="menu5" class="container tab-pane fade"><br>
        <!-- Search Customers -->
        <div class="container-fluid" style="background-color: lightblue; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>Search Customers</h3>
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
          </table><br>
        </div><br>
      </div>

      <div id="menu6" class="container tab-pane fade"><br>
        <p>Click the button to log out as a cashier :</p>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
          Log Out
        </button><br><br>
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Log Out</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                Are you sure you want to log out?
              </div>
              <div class="modal-footer">
                <button type="submit" onclick="location.href='../index.php';" class="btn btn-danger" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Footer -->
    <br>
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