<?php
  $conn = pg_connect("host=localhost dbname=farm user=postgres password=123");
  if(isset($_POST['cashierSub']))
  {
    $userName = $_POST['userName'];
    $userPwd = $_POST['userPwd'];

    $query = "SELECT * FROM users WHERE user_name='$userName' AND user_pwd='$userPwd'";
    $result = pg_query($conn,$query);

    if($res=pg_num_rows($result) != 1) 
    {
    /* http://www.phpeasystep.com/workshopview.php?id=6 */
    }
    else
    {
      header("Location: http://localhost/cashier.php"); /* Redirect browser */
      exit();
    }
  }
?>  
    
    