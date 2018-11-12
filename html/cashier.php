<!DOCTYPE html>
<html lang="en">
<head>
  <title>Casher</title>
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
    </ul>
  </div>  
</nav>

<!-- Jumbotron -->
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>The Green Farm Sales System</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>

<div class="container">
  <form action="/action/add_trans.php">
  
  <div class="form-group row">
    <label for="cust_name" class="col-3 col-form-label">Customer</label>
    <div class="col-9">
      <input type="text" class="form-control" id="cust_name" name="cust_name">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="prod_name" class="col-3 col-form-label">Product</label>
    <div class="col-9">
      <input type="text" class="form-control" id="prod_name" name="prod_name">
    </div>
  </div>

  <div class="form-group row">
      <label for="sel1">Product list:</label>
      <select class="form-control" id="sel1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-3">Category</legend>
      <div class="col-9">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="legendRadio" id="legendRadio1" value="1">
            Fruit
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="legendRadio" id="legendRadio2" value="2" checked>
            Vegetable
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="legendRadio" id="legendRadio3" value="3">
            Grain
          </label>
        </div>
      </div>
    </div>
  </fieldset>
          
  <div class="form-group row">
    <label for="last_name" class="col-3 col-form-label">Last Name</label>
    <div class="col-9">
      <input type="text" class="form-control" id="last_name" name="last_name">
    </div>
  </div>
          
  <div class="form-group row">
    <div class="offset-3 col-9">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>

  </form>
</div>

<!-- Footer -->
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>©2018 Zili Wang</p>
</div>
  
</body>
</html>
