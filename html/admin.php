<!DOCTYPE html>
<html lang="en">

<head>
  <title>The Green Farm: Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- Include datatables -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <!-- Include Chart.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
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
        <a class="nav-link active" data-toggle="pill" href="#home">Sales Reports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu1">Export Transactions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu2">Delete Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu3">Export Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu4">Delete Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu5">Export Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu6">New Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu7">Delete Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu8">Log Out</a>
      </li>
    </ul><br>

    <!-- Tab panes -->
    <div class="tab-content" style="border: 1px solid #ddd;">
      <div id="home" class="container tab-pane fade show active"><br>
        <!-- Sales Reports -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Thie is a pie chart...</p>
              <!-- Pie -->





              <!-- Pie -->
            </div>
            <div class="col-sm-6">
              <p>This is a line chart...</p>
              <!-- Line -->




              
              <!-- Line -->
            </div>
          </div>
        </div>


        <!-- End here -->
      </div>

      <div id="menu1" class="container tab-pane fade"><br>
        <!-- Export Transactions -->
        <div class="container-fluid" style="background-color: lightcyan; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>Export Transactions</h3>
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
        <!-- Delete Product -->
        <div class="container-fluid" style="background-color: lavender; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>Delete Product</h3>
          <form action="action/del_prod.php" method="post">
            <div class="form-group">
              <label>Product To Be Deleted: </label>
              <select class="form-control" id="selectProduct" , name="prod_name">
              <option>
                  Choose A Product
              </option>
              <?php
                $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
                $query = "SELECT DISTINCT prod_name FROM products";
                $result = pg_query($conn,$query);
                while ($row = pg_fetch_array($result)) {
                  echo "<option value=" .$row['prod_name']. ">" .$row['prod_name']. "</option>";
                }
                pg_close($conn);
              ?>
              </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Delete Product</button>
          </form><br>
        </div><br>
      </div>

      <div id="menu3" class="container tab-pane fade"><br>
        <!-- Export Products -->
        <div class="container-fluid" style="background-color: lavender; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>Export Products</h3>
          <table id="prod_table" class="table table-bordered table-striped text-center" style="width: 75%; margin: auto;">
            <div class="table responsive">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Product Category</th>
                  <th>Product Cost</th>
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
                  echo "<td>".$row['prod_cost']. "</td>";
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
        <!-- Delete Customer -->
        <div class="container-fluid" style="background-color:lightblue; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>Delete Customer</h3>
          <form action="action/del_cust.php" method="post">
            <div class="form-group">
              <label>Customer To Be Deleted: </label>
              <select class="form-control" id="selectProduct" , name="cust_name">
              <option>
                  Choose A Customer
              </option>
              <?php
                $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
                $query = "SELECT DISTINCT cust_name FROM customers";
                $result = pg_query($conn,$query);
                while ($row = pg_fetch_array($result)) {
                  echo "<option value=" .$row['cust_name']. ">" .$row['cust_name']. "</option>";
                }
                pg_close($conn);
              ?>
              </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Delete Customer</button>
          </form><br>
        </div><br>
      </div>

      <div id="menu5" class="container tab-pane fade"><br>
        <!-- Export Customers -->
        <div class="container-fluid" style="background-color: lightblue; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>Export Customers</h3>
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
        <!-- New Account -->
        <div class="container-fluid" style="background-color:lightsalmon; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>New Account</h3>
          <form action="action/add_acco.php" method="post">
            <div class="form-group">
              <label>Account Name: </label>
              <input type="text" class="form-control" name="user_name" placeholder="Enter Account Name" required>
            </div>
            <div class="form-group">
              <label>Account Password: </label>
              <input type="password" class="form-control" name="user_pwd1" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
              <label>Repeat Password: </label>
              <input type="password" class="form-control" name="user_pwd2" placeholder="Repeat Password" required>
            </div>
            <label>Account Type: </label><br>
            <div class="form-check-inline">
              <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="radio1" name="user_group" value="administrator" checked>administrator
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label" for="radio2">
                <input type="radio" class="form-check-input" id="radio2" name="user_group" value="cashier" checked>cashier
              </label>
            </div><br><br>
            <button type="submit" name="submit" class="btn btn-primary">Add Account</button>
          </form><br>
        </div><br>
      </div>

      <div id="menu7" class="container tab-pane fade"><br>
        <!-- Delete Account -->
          <div class="container-fluid" style="background-color:lightsalmon; padding-block-end: 10px;">
          <h3 style="text-align: center"><br>Delete Account</h3>
          <form action="action/del_acco.php" method="post">
            <div class="form-group">
              <label>Account To Be Deleted: </label>
              <select class="form-control" id="selectAccount" , name="user_name">
              <option>
                  Choose An Account
              </option>
              <?php
                $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
                $query = "SELECT DISTINCT user_name FROM users";
                $result = pg_query($conn,$query);
                while ($row = pg_fetch_array($result)) {
                  echo "<option value=" .$row['user_name']. ">" .$row['user_name']. "</option>";
                }
                pg_close($conn);
              ?>
              </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Delete Account</button>
          </form><br>
        </div><br>
      </div>

      <div id="menu8" class="container tab-pane fade"><br>
        <p>Click the button to log out as an administrator :</p>
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
    $('#cust_table').DataTable( {
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    } );
    $('#prod_table').DataTable( {
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    } );
    $('#trans_table').DataTable( {
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    } );
  });
</script>
</html>