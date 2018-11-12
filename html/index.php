<?php
$db = pg_connect("host=localhost dbname=farm user=postgres password=123");
if(isset($_POST['cashierSub']))
{
  $userName = $_POST['userName'];
  $userPwd = $_POST['userPwd'];

  $query = "SELECT * FROM users WHERE user_name='{$userName}' AND user_pwd='{$userPwd}'";
  $result = pg_query($db,$query);

  if($res=pg_fetch_array($result)) 
  {
    echo "<script>alert(\"Login successful!\");</script>";
  }
  else
  {
    echo "<script>alert(\"Login Failed!\");</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
  <a class="navbar-brand" href="#">The Green Farm Sales System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">HELP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">MORE</a>
      </li>    
    </ul>
  </div>  
</nav>

<!-- Jumbotron -->
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>The Green Farm Sales System</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>

<!-- Login Forms -->
<div class="container">
  <div class="row">
    <!-- Cashier Login -->
    <div class="col" style="background-color:lavender;">
      <h3 style="text-align: center">Casher Login</h3>
      <form action="index.php" method="POST">
        <div class="form-group">
          <label for="usr">User Name:</label>
          <input type="text" class="form-control" id="usr" name="userName">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" name="userPwd">
        </div>
        <button type="submit" name="cashierSub" class="btn btn-primary">Login</button>
      </form>
    </div>

    <!-- Admin Login -->
    <div class="col" style="background-color:orange;">
      <h3 style="text-align: center">Admin Login</h3>
      <form action="index.php">
        <div class="form-group">
          <label for="usr">Name:</label>
          <input type="text" class="form-control" id="usr" name="userName">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" name="userPwd">
        </div>
        <button type="submit" name="adminSub" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>©2018 Zili Wang</p>
</div>

</body>
</html>