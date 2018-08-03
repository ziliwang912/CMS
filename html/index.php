<!DOCTYPE HTML>
<html>
    <head>
        <title>Example</title>
    </head>
    <body>

<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<div class="form-group row">
<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
</div>
</div>
<div class="form-group row">
<label for="inputUser" class="col-sm-2 col-form-label">User Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputUser" name="user" placeholder="Username">
</div>
</div>
<div class="form-group row">
<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
</div>
</div>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
<input type="submit" value="Sign in" name="submit" class="btn btn-primary"/>
</div>
</div>
</form>

</div>

    </body>
</html>
