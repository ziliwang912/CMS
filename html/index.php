<!DOCTYPE html>
<html lang="en">

<head>
  <title>The Green Farm: Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>

  <!-- Jumbotron -->
  <div class="jumbotron text-center" style="margin-bottom:0; background-image: url(image/farm.jpg); background-size: cover;">
    <h1>The Green Farm Sales System</h1>
  </div>

  <!-- Login Forms -->
  <div class="container-fluid">
    <div class="row">
      <!-- Cashier Login -->
      <div class="col" style="background-color:green;">
        <h3 style="text-align: center"><br>Cashier Login</h3>
        <form action="action/check_cashier.php" method="post">
          <div class="form-group">
            <label>User Name:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter user name" required>
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
        <br>
      </div>

      <!-- Admin Login -->
      <div class="col" style="background-color:orange;">
        <h3 style="text-align: center"><br>Admin Login</h3>
        <form action="action/check_admin.php" method="post">
          <div class="form-group">
            <label>User Name:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter user name" required>
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="jumbotron text-center" style="margin-bottom:0;">
    <P class="font-weight-light">CISC 4900 Project: A Contend Management System<br>
      ©2018 Zili Wang
    </p>
  </div>

</body>

</html>