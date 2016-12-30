<?php

//Checking for Secret key.
if (!isset($secretKey) || $secretKey !== 'jhbrfpbv') {exit();}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Log in</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>

<body>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="text-center">Welcome</h1>
    </div>
    <div class="modal-body">
      <form name="loginForm" method="POST" action="./index.php" autocomplete="off">
      <div class="form-group">
        <input type="text" name="loginName" class="form-control input-lg" placeholder="Username"/>
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control input-lg" placeholder="Password"/>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-block btn-lg btn-primary" value="Login"/></br>
        <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Forgot Password</a></span>
      </div>
      </form>
    </div>
  </div>
</div>

</body>

</html>